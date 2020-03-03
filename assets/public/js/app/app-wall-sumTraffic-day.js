var base_url = $('#base_url').val();

var d = new Date();
var o = d.getDate();
var n = d.getMonth()+1;
var m = d.getFullYear();
if (o < 10) {
  o = '0' + o;
} 
if (n < 10) {
  n = '0' + n;
}

//get today
var v_params_today= m + '-' + n + '-' + (o);
//get yesterday
var v_params_yesterday =m + '-' + n + '-' + (o-1);
const sessionParams = JSON.parse(sessionStorage.getItem('Auth-infomedia'));
$(document).ready(function () {
    if(sessionParams){
        $("#filter-loader").fadeIn("slow");
        // fromTemplate();
        // callTableInterval('2020-02-24',["Facebook", "Whatsapp", "Twitter", "Email", "Telegram", "Line", "Voice", "Instagram", "Messenger", "Twitter DM", "Live Chat", "SMS", "ChatBot"], '');
        if(sessionParams.TENANT_ID[0].TENANT_ID != ''){
            getTenant('', sessionParams.USERID);
        }else{
            getTenant('', '');
        }
            callDataPercentage(v_params_yesterday, $("#layanan_name").val());
            callIntervalTraffic(v_params_yesterday,["Voice", "Live Chat", "Twitter DM", "Messenger", "Whatsapp", "Line", "Telegram", "ChatBot", "Instagram", "Facebook", "Twitter", "Email", "SMS"], $("#layanan_name").val());
        $("#filter-loader").fadeOut("slow");

        // $('#check-all-channel').prop('checked',false);
        // $("input:checkbox.checklist-channel").prop('checked',false);
        // var checkboxes = document.querySelectorAll('input[name="example-checkbox2"]:checked'), values = [], type = [];
        // Array.prototype.forEach.call(checkboxes, function(el) {
        //     values.push(el.value);
        //     type.push($(el).data('type'));
        // });
        // console.log(values);
        // list_channel = values;
    }else{
        window.location = base_url;
    }
});

function getTenant(date, userid){
    $.ajax({
        type: 'POST',
        url: base_url + 'api/Wallboard/WallboardController/GetTennantFilter',
        data: {
            "date" : date,
            "userid" : userid
        },

        success: function (r) {
            var data_option = [];
            //dont parse response if using rest controller
            // var response = JSON.parse(r);
            var response = r;
            // console.log(response);
            // tenants = response.data;
                var html = '';
                for(i=0; i<response.data.length; i++){
                    html += '<option value='+response.data[i].TENANT_ID+'>'+response.data[i].TENANT_NAME+'</option>';
                }
                $('#layanan_name').html(html);
        },
        error: function (r) {
            //console.log(r);
            alert("error");
        },
    });
}

function addCommas(commas)
{
    commas += '';
    x = commas.split('.');
    x1 = x[0];
    x2 = x.length > 1 ? '.' + x[1] : '';
    var rgx = /(\d+)(\d{3})/;
    while (rgx.test(x1)) {
        x1 = x1.replace(rgx, '$1' + '.' + '$2');
    }
    return x1 + x2;
}

//function get data and draw
function getColorChannel(channel){
    var color = [];
    color['Email'] = '#e41313';
    color['Facebook'] = '#467fcf';
    color['Instagram'] = '#fbc0d5';
    color['Line'] = '#31a550';
    color['Live Chat'] = '#607d8b';
    color['Messenger'] = '#3866a6';
    color['SMS'] = '#80cbc4';
    color['Telegram'] = '#343a40';
    color['Twitter'] = '#45aaf2';
    color['Twitter DM'] = '#6574cd';
    color['Voice'] = '#ff9933';
    color['Whatsapp'] = '#089e60';
    color['ChatBot'] = '#6e273e';

    return color[channel];
}

function destroyChartPercentage(){
    //destroy chart percentage
    $('#barWallTrafficDay').remove(); // this is my <canvas> element
    $('#barWallTrafficDayDiv').append('<canvas id="barWallTrafficDay"></canvas>');
}

function callIntervalTraffic(date, arr_channel, tenant_id){
    // console.log(+arr_channel);
    // $("#filter-loader").fadeIn("slow");
    $.ajax({
        type: 'post',
        url: base_url+'api/SummaryTraffic/SummaryToday/getIntervalTrafficToday2',
        data: {
            date: date,
            arr_channel: arr_channel,
            tenant_id: tenant_id
        },
        success: function (r) {
            var response = JSON.parse(r);
            // console.log(response);
            //hit url for interval 900000 (15 minutes)
            $('#modalError').modal('hide');
            setTimeout(function(){callIntervalTraffic(date, arr_channel, $("#layanan_name").val());},5000);
            drawChartToday(response);
            drawTableData(response);
            // $("#filter-loader").fadeOut("slow");
        },
        error: function (r) {
            // console.log(r);
            $('#modalError').modal('show');
                setTimeout(function(){callIntervalTraffic(date, arr_channel, $("#layanan_name").val());},5000);
            // $("#filter-loader").fadeOut("slow");
        },
    });
}

function destroyChartInterval(){
    // destroy chart interval 
    $('#lineWallsumTrafficDay').remove(); // this is my <canvas> element
    // $('#chart-no-data').remove(); // this is my <canvas> element
    $('#lineWallsumTrafficDayDiv').append('<canvas id="lineWallsumTrafficDay"  class="h-500"></canvas>');
}

function drawChartToday(response){
    // console.log(response.data.series);
    destroyChartInterval();
    var data = [];
    if(!response.data.series){
        $('#lineWallsumTrafficDay').remove(); // this is my <canvas> element
        $('#lineWallsumTrafficDayDiv').append('<canvas id="lineWallsumTrafficDay" class="h-500"></canvas>');
    }else{
        response.data.series.forEach(function (value, index) {
            var obj = {
                label: value.label,
                data: value.data,
                backgroundColor: 'transparent',
                borderColor: getColorChannel(value.label),
                borderWidth: 3,
                pointStyle: 'circle',
                pointRadius: 4,
                pointBorderColor: 'transparent',
                pointBackgroundColor: getColorChannel(value.label),
            };
            data.push(obj);
        });

        // draw chart
        var ctx = document.getElementById( "lineWallsumTrafficDay" );
        var myChart = new Chart( ctx, {
            type: 'line',
            data: {
                labels: response.data.label_time,
                datasets: data
            },
            options: {
                layout: {
                    padding: {
                        left: 5,
                        right: 0,
                        top: 20,
                        bottom:10
                    }
                },
                animation: false,
                responsive: true,
                maintainAspectRatio: false,
                legend:{
                    display: true,
                    position:'bottom',
                    labels:{
                        boxWidth:10
                    }
                },
                barRoundness:  1,
                scales: {
                    yAxes: [ {
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        } );
    }
}

function callDataPercentage(date, tenant_id){
    $.ajax({
        type: 'post',
        url: base_url+'api/SummaryTraffic/SummaryToday/getPercentageTrafficTodayWallDay',
        data: {
            date: date,
            tenant_id: tenant_id
        },
        success: function (r) {
            var response = JSON.parse(r);
            // console.log(response);
            //hit url for interval 900000 (15 minutes)
            $('#modalError').modal('hide');
            setTimeout(function(){callDataPercentage(date, $("#layanan_name").val());},5000);
            drawChartPercentageToday(response);
            // fromTemplate(response);
        },
        error: function (r) {
            // console.log(r);
            $('#modalError').modal('show');
            setTimeout(function(){callDataPercentage(date, $("#layanan_name").val());},5000);
        },
    });
}

function drawChartPercentageToday(response){
    destroyChartPercentage();
    var data_label = [];
    var data_rate = [];
    var data_color = [];
    response.data.forEach(function (value, index) {
        data_label.push(value.channel_name);
        data_rate.push(value.rate);
        data_color.push(getColorChannel(value.channel_name));
    });
    var obj = [{
        label: "data",
        data: data_rate,
        borderColor: data_color,
        borderWidth: "0",
        backgroundColor: data_color
    }];
    // console.log(data_rate);

    // draw chart
    var ctx_percentage = document.getElementById("barWallTrafficDay");
    ctx_percentage.height =501;
    var percentageChart = new Chart(ctx_percentage, {
        type: 'horizontalBar',
        data: {
            labels: data_label,
            datasets: obj,
        },
        options: {
            animation: false,
            responsive: true,
            layout: {
                padding: {
                    left: 0,
                    right: 0,
                    top: 10,
                    bottom: 5
                }
            },
            maintainAspectRatio: false,
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    },
                    axisLabel: {
                    fontSize: 10,
                    color: '#7886a0',
                    // formatter: function (value, index) {
                    //  if (/\s/.test(value)) {
                    //      var teks = '';
                    //      for(var i=0;i<value.length;i++){
                    //          // if(value[i] == " "){
                    //          //     teks = teks + '%';
                    //          // }else{
                    //          //     teks = teks + value[i];
                    //          // }
                    //          teks = value[i] + '%';
                    //      }
                    //      return teks;
                    //  } 
                    // }
                }
                }],
                xAxes: [{
                    ticks: {
                        min: 0, // Edit the value according to what you need
                        callback: function(value, index, values) {
                           //      if(parseInt(value) >= 1000){
                           //          var res = (value/1000);
                                    // return res+'K'
                           //      } else
                           //       return value;
                            value = value.toString();
                            value = value.split(/(?=(?:...)*$)/);
                            value = value.join('.');
                            return value;
                        }
                    }
                }]
            },
            legend: {
                display: false
            },
            tooltips: {
              callbacks: {
                    label: function(tooltipItem, data) {
                        var value = data_rate[tooltipItem.index];
                        // value = value.toString();
                        // value = value.split(/(?=(?:...)*$)/);
                        // value = value.join(',');
                        value = addCommas(value);
                        return value;
                    }
              }
            },
        }
    });
}

function drawTableData(response){
    var tagTime=["00:00:00 - 01:00:00", "01:00:00 - 02:00:00", "02:00:00 - 03:00:00", "03:00:00 - 04:00:00", "04:00:00 - 05:00:00", "05:00:00 - 06:00:00", "06:00:00 - 07:00:00", "07:00:00 - 08:00:00", "08:00:00 - 09:00:00", "09:00:00 - 10:00:00", "10:00:00 - 11:00:00", "11:00:00 - 12:00:00", "12:00:00 - 13:00:00", "13:00:00 - 14:00:00", "14:00:00 - 15:00:00", "15:00:00 - 16:00:00", "16:00:00 - 17:00:00", "17:00:00 - 18:00:00", "18:00:00 - 19:00:00", "19:00:00 - 20:00:00", "20:00:00 - 21:00:00", "21:00:00 - 22:00:00", "22:00:00 - 23:00:00", "23:00:00 - 00:00:00"];
    var sumVoice = response.data.series[0].data.map(Number).reduce(summarize);
    var sumLive = response.data.series[1].data.map(Number).reduce(summarize);
    var sumTwDM = response.data.series[2].data.map(Number).reduce(summarize);
    var sumMes = response.data.series[3].data.map(Number).reduce(summarize);
    var sumWA = response.data.series[4].data.map(Number).reduce(summarize);
    var sumLine = response.data.series[5].data.map(Number).reduce(summarize);
    var sumTel = response.data.series[6].data.map(Number).reduce(summarize);
    var sumChatBot = response.data.series[7].data.map(Number).reduce(summarize);
    var sumInst = response.data.series[8].data.map(Number).reduce(summarize);
    var sumFb = response.data.series[9].data.map(Number).reduce(summarize);
    var sumTw = response.data.series[10].data.map(Number).reduce(summarize);
    var sumEmail = response.data.series[11].data.map(Number).reduce(summarize); 
    var sumSms = response.data.series[12].data.map(Number).reduce(summarize); 
    

    //summarize per channel
    function summarize(total, num) {
          return total + num;
    }
    
    $("#mytbody").empty();
    $("#mytfoot").empty();
    if(response.data.series.length != 0){   
        var i = 0;
        for (var i = 0; i < 24; i++) {
            $('#wall-today-tbl').find('tbody').append('<tr>'+
            '<td>'+tagTime[i]+'</td>'+
            '<td class="text-right">'+response.data.series[0].data[i]+'</td>'+
            '<td class="text-right">'+response.data.series[1].data[i]+'</td>'+
            '<td class="text-right">'+response.data.series[2].data[i]+'</td>'+
            '<td class="text-right">'+response.data.series[3].data[i]+'</td>'+
            '<td class="text-right">'+response.data.series[4].data[i]+'</td>'+
            '<td class="text-right">'+response.data.series[5].data[i]+'</td>'+
            '<td class="text-right">'+response.data.series[6].data[i]+'</td>'+
            '<td class="text-right">'+response.data.series[7].data[i]+'</td>'+
            '<td class="text-right">'+response.data.series[8].data[i]+'</td>'+
            '<td class="text-right">'+response.data.series[9].data[i]+'</td>'+
            '<td class="text-right">'+response.data.series[10].data[i]+'</td>'+
            '<td class="text-right">'+response.data.series[11].data[i]+'</td>'+
            '<td class="text-right">'+response.data.series[12].data[i]+'</td>'+
            '</tr>');
        }

        $('#wall-today-tbl').find('tfoot').append('<tr>'+
            '<td>TOTAL</td>'+
            '<td class="text-right">'+addCommas(sumVoice)+'</td>'+
            '<td class="text-right">'+addCommas(sumLive)+'</td>'+
            '<td class="text-right">'+addCommas(sumTwDM)+'</td>'+
            '<td class="text-right">'+addCommas(sumMes)+'</td>'+
            '<td class="text-right">'+addCommas(sumWA)+'</td>'+
            '<td class="text-right">'+addCommas(sumLine)+'</td>'+
            '<td class="text-right">'+addCommas(sumTel)+'</td>'+
            '<td class="text-right">'+addCommas(sumChatBot)+'</td>'+
            '<td class="text-right">'+addCommas(sumInst)+'</td>'+
            '<td class="text-right">'+addCommas(sumFb)+'</td>'+
            '<td class="text-right">'+addCommas(sumTw)+'</td>'+
            '<td class="text-right">'+addCommas(sumEmail)+'</td>'+
            '<td class="text-right">'+addCommas(sumSms)+'</td>'+
            '</tr>');

    }else{
        $('#table_avg_traffic').find('tbody').append('<tr>'+
            '<td colspan=6> No Data </td>'+
            '</tr>');
    }
    //fade out loading
    $("#filter-loader").fadeOut("slow");
}

function fromTemplate(response) {
    "use strict";
    // Horizontal Bar
     var data_label = [];
    var data_rate = [];
    var data_color = [];
    response.data.forEach(function (value, index) {
        data_label.push(value.channel_name);
        data_rate.push(value.rate);
        data_color.push(getColorChannel(value.channel_name));
    });

    var MeSeContext = document.getElementById("barWallTrafficDay");
    MeSeContext.height = 400;
    var MeSeData = {
        labels: data_label,
        datasets: [{
            label: "test",
            data: data_rate,
            backgroundColor: data_color,
            hoverBackgroundColor: data_color
        }]
    };
    var MeSeChart = new Chart(MeSeContext, {
        type: 'horizontalBar',
        data: MeSeData,
        options: {
            responsive: true,
            maintainAspectRatio: false,
            scales: {
                xAxes: [{
                    ticks: {
                        min: 0
                    }
                }],
                yAxes: [{
                    stacked: true
                }]
            },
            legend: {
                display: false
            }
        }
    });


    var ctx = document.getElementById( "lineWallsumTrafficDay" );
    var myChart = new Chart( ctx, {
        type: 'line',
        data: {
            labels: [ "00:00", "01:00", "02:00", "03:00", "04:00", "05:00", "06:00", "07:00", "08:00", "09:00", "10:00", "11:00", "12:00", "13:00", "14:00", "15:00","16:00","17:00","18:00","19:00","20:00","21:00","22:00","23:00","24:00"],
            datasets: [ {
                label: "Whatsapp",
                data: [ 0,90,80,70,80,90,80,60,40,90,100,120,150,190,200,280,300,350,90,50,60,40,80,90,100],
                backgroundColor: 'transparent',
                borderColor: '#089e60',
                borderWidth: 3,
                pointStyle: 'circle',
                pointRadius: 5,
                pointBorderColor: 'transparent',
                pointBackgroundColor: '#089e60',
                    }, {
                label: "Facebook",
                data: [ 0,100,50,30,50,40,30,60,90,100,30,40,50,90,100,180,200,550,90,90,30,40,50,100,130 ],
                backgroundColor: 'transparent',
                borderColor: '#467fcf',
                borderWidth: 3,
                pointStyle: 'circle',
                pointRadius: 5,
                pointBorderColor: 'transparent',
                pointBackgroundColor: '#467fcf',
                 }, {
                label: "Twitter",
                data: [ 0,60,90,60,50,40,40,40,90,30,30,150,170,200,290,240,340,190,40,50,40,30,90,40,120],
                backgroundColor: 'transparent',
                borderColor: '#45aaf2',
                borderWidth: 3,
                pointStyle: 'circle',
                pointRadius: 5,
                pointBorderColor: 'transparent',
                pointBackgroundColor: '#45aaf2',
                    }, {
                label: "Twitter DM",
                data: [ 0,40,50,60,90,100,70,90,40,100,150,180,120,130,100,250,310,250,80,150,160,140,180,50,300 ],
                backgroundColor: 'transparent',
                borderColor: '#6574cd',
                borderWidth: 3,
                pointStyle: 'circle',
                pointRadius: 5,
                pointBorderColor: 'transparent',
                pointBackgroundColor: '#6574cd',
                    }, {
                label: "Line",
                data: [ 0,190,180,170,180,190,90,80,60,100,180,90,110,120,130,230,250,250,190,150,160,140,90,180,140 ],
                backgroundColor: 'transparent',
                borderColor: '#31a550',
                borderWidth: 3,
                pointStyle: 'circle',
                pointRadius: 5,
                pointBorderColor: 'transparent',
                pointBackgroundColor: '#31a550',
                    }, {
                label: "Messenger",
                data: [ 0,30,180,170,180,190,180,160,140,190,110,110,120,100,210,180,200,250,200,150,160,290,180,180,130 ],
                backgroundColor: 'transparent',
                borderColor: '#3866a6',
                borderWidth: 3,
                pointStyle: 'circle',
                pointRadius: 5,
                pointBorderColor: 'transparent',
                pointBackgroundColor: '#3866a6',
                    }, {
                label: "Telegram",
                data: [ 0,10,30,40,10,70,30,40,50,70,80,110,130,120,200,180,100,150,190,240,160,120,200,130,120],
                backgroundColor: 'transparent',
                borderColor: '#343a40',
                borderWidth: 3,
                pointStyle: 'circle',
                pointRadius: 5,
                pointBorderColor: 'transparent',
                pointBackgroundColor: '#343a40',
                    }, {
                label: "Instagram",
                data: [ 0,10,70,10,30,70,60,70,10,100,120,140,120,130,240,140,320,230,40,520,260,200,30,40,300 ],
                backgroundColor: 'transparent',
                borderColor: '#fbc0d5',
                borderWidth: 3,
                pointStyle: 'circle',
                pointRadius: 5,
                pointBorderColor: 'transparent',
                pointBackgroundColor: '#fbc0d5',
                    }, {
                label: "Email",
                data: [ 0,70,60,20,50,40,180,160,140,100,130,150,160,180,230,270,350,250,50,400,260,240,280,290,400 ],
                backgroundColor: 'transparent',
                borderColor: '#e41313',
                borderWidth: 3,
                pointStyle: 'circle',
                pointRadius: 5,
                pointBorderColor: 'transparent',
                pointBackgroundColor: '#e41313',
                    }, {
                label: "Voice",
                data: [ 0,70,50,60,70,80,90,60,60,50,130,130,100,200,250,260,100,50,70,150,160,140,180,190,120 ],
                backgroundColor: 'transparent',
                borderColor: '#ff9933',
                borderWidth: 3,
                pointStyle: 'circle',
                pointRadius: 5,
                pointBorderColor: 'transparent',
                pointBackgroundColor: '#ff9933',
                    },{
                label: "SMS",
                data: [ 0,190,180,170,180,190,180,160,140,100,150,150,180,180,250,200,350,150,100,90,80,50,70,60,120 ],
                backgroundColor: 'transparent',
                borderColor: '#80cbc4',
                borderWidth: 3,
                pointStyle: 'circle',
                pointRadius: 5,
                pointBorderColor: 'transparent',
                pointBackgroundColor: '#80cbc4',
                },{
                label: "Live Chat",
                data: [ 0,10,70,50,60,90,340,150,150,160,200,220,250,150,210,250,310,320,70,60,90,60,50,100,140 ],
                backgroundColor: 'transparent',
                borderColor: '#607d8b',
                borderWidth: 3,
                pointStyle: 'circle',
                pointRadius: 5,
                pointBorderColor: 'transparent',
                pointBackgroundColor: '#607d8b',
                    } ]
        },
        options: {
			responsive: true,
			maintainAspectRatio: false,
			// legend:{
            //     position:'bottom',
            //     labels:{
            //         boxWidth:10
            //     }
            // },
            legend: false,
            barRoundness: 1,
            scales: {
                yAxes: [ {
                    ticks: {
                        beginAtZero: true
						}
                    }]
            }
        }
    } );
	
}

(function ($) {
    
    // checked all channel
    // $('#check-all-channel').click(function(){
    //     $("input:checkbox.checklist-channel").prop('checked',this.checked);
    //     var checkboxes = document.querySelectorAll('input[name="example-checkbox2"]:checked'), values = [], type = [];
    //     Array.prototype.forEach.call(checkboxes, function(el) {
    //         values.push(el.value);
    //         type.push($(el).data('type'));
    //     });
    //     // console.log(values);
    //     list_channel = values;

    //     // call data
    //     callIntervalTraffic(v_params_yesterday,list_channel);
    // });

    //checked channel
    // $('.checklist-channel').click(function(){
    //     $('#check-all-channel').prop( "checked", false );
        
    //     var checkedValues = $('input:checkbox:checked').map(function() {
    //         return this.value;
    //     }).get();

    //     var checkboxes = document.querySelectorAll('input[name="example-checkbox2"]:checked'), values = [], type = [];
    //     Array.prototype.forEach.call(checkboxes, function(el) {
    //         values.push(el.value);
    //         type.push($(el).data('type'));
    //     });
    //     // console.log(values);
    //     list_channel = values;
    //     // call data
    //     callIntervalTraffic(v_params_yesterday, list_channel);
    // });

    $("#layanan_name").change(function(){
        // destroyChartInterval();
         // destroyChartInterval();
        var selectedTenant = $(this).children("option:selected").val();
        $('#check-all-channel').prop( "checked", false );
        $("input:checkbox.checklist-channel").prop('checked',false);
        // callTableCOFByChannel('2020-01-24', selectedTenant);
        callDataPercentage(v_params_yesterday, $("#layanan_name").val());
        callIntervalTraffic(v_params_yesterday,["Voice", "Live Chat", "Twitter DM", "Messenger", "Whatsapp", "Line", "Telegram", "ChatBot", "Instagram", "Facebook", "Twitter", "Email", "SMS"], $("#layanan_name").val());
        $('#tenant_id option[value='+selectedTenant+']').attr('selected','selected');
        // getTenant('2020-01-24');
    });
    
})(jQuery);