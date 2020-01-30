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
var v_params_this_year = m + '-' + n + '-' + (o);

$(document).ready(function () {
    $("#filter-loader").fadeIn("slow");
    // fromTemplate();
    callDataPercentage(n,'oct_telkomcare',m);
    callIntervalTraffic(n,'');
    callTableInterval(n,'');
    $("#filter-loader").fadeOut("slow");

    $('#check-all-channel').prop('checked',false);
    $("input:checkbox.checklist-channel").prop('checked',false);
    var checkboxes = document.querySelectorAll('input[name="example-checkbox2"]:checked'), values = [], type = [];
    Array.prototype.forEach.call(checkboxes, function(el) {
        values.push(el.value);
        type.push($(el).data('type'));
    });
    // console.log(values);
    list_channel = values;
});

function addCommas(commas)
{
    commas += '';
    x = commas.split('.');
    x1 = x[0];
    x2 = x.length > 1 ? '.' + x[1] : '';
    var rgx = /(\d+)(\d{3})/;
    while (rgx.test(x1)) {
        x1 = x1.replace(rgx, '$1' + ',' + '$2');
    }
    return x1 + x2;
}

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

function destroyChartInterval(){
    // destroy chart interval 
    $('#lineWallsumTrafficMonth').remove(); // this is my <canvas> element
    $('#lineWallsumTrafficMonthDiv').append('<canvas id="lineWallsumTrafficMonth" class="h-400"></canvas>');
}

function destroyChartPercentage(){
    //destroy chart percentage
    $('#barWallTrafficMonth').remove(); // this is my <canvas> element
    $('#barWallTrafficMonthDiv').append('<canvas id="barWallTrafficMonth"></canvas>');
}

function callIntervalTraffic(month, arr_channel){
    // console.log(+arr_channel);
    // $("#filter-loader").fadeIn("slow");
    $.ajax({
        type: 'post',
        url: base_url+'api/SummaryTraffic/SummaryMonth/getIntervalTrafficMonthly',
        data: {
            month: month,
            arr_channel: arr_channel
        },
        success: function (r) {
            var response = JSON.parse(r);
            // console.log(response);
            //hit url for interval 900000 (15 minutes)
            // setTimeout(function(){callIntervalTraffic(month, ["Facebook", "Whatsapp", "Twitter", "Email", "Telegram", "Line", "Voice", "Instagram", "Messenger", "Twitter DM", "Live Chat", "SMS"]);},900000);
            drawChartToday(response);
            // drawTableData(response);
            // $("#filter-loader").fadeOut("slow");
        },
        error: function (r) {
            // console.log(r);
            alert("error");
            // $("#filter-loader").fadeOut("slow");
        },
    });
}
function callTableInterval(month, tennant_id){
    // console.log(+arr_channel);
    // $("#filter-loader").fadeIn("slow");
    $.ajax({
        type: 'post',
        url: base_url+'api/Wallboard/WallboardController/GetInvalMonthTable',
        data: {
            month: month,
            tennant_id: tennant_id            
        },
        success: function (r) {
            var response = r;
            // console.log(response);
            //hit url for interval 900000 (15 minutes)
            // setTimeout(function(){callTableInterval(month, ["Facebook", "Whatsapp", "Twitter", "Email", "Telegram", "Line", "Voice", "Instagram", "Messenger", "Twitter DM", "Live Chat", "SMS"]);},900000);
            // drawChartToday(response);
            drawTableData(response);
            // $("#filter-loader").fadeOut("slow");
        },
        error: function (r) {
            // console.log(r);
            alert("error");
            // $("#filter-loader").fadeOut("slow");
        },
    });
}

function drawChartToday(response){
    destroyChartInterval();
    var data = [];
    if(!response.data.series){
        $('#lineWallsumTrafficMonth').remove(); // this is my <canvas> element
        $('#lineWallsumTrafficMonthDiv').append('<canvas id="lineWallsumTrafficMonth" class="h-400"></canvas>');
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
        var ctx = document.getElementById( "lineWallsumTrafficMonth" );
        var myChart = new Chart( ctx, {
            type: 'line',
            data: {
                labels: response.data.label_time,
                datasets: data
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
                legend : {
                    display : false
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

function callDataPercentage(month, tenant_id, params_year){
    $.ajax({
        type: 'post',
        url: base_url+'api/Wallboard/WallboardController/GetBarchannelPerMonth',
        data: {
            month: month,
            tenant_id: tenant_id,
            params_year: params_year
        },
        success: function (r) {
            var response = r;
            console.log(response);
            // setTimeout(function(){callDataPercentage(date);},900000);
            drawChartPercentageMonth(response);
        },
        error: function (r) {
            // console.log(r);
            alert("error");
        },
    });
}


function drawChartPercentageMonth(response){
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
    var ctx_percentage = document.getElementById("barWallTrafficMonth");
    ctx_percentage.height =501;
    var percentageChart = new Chart(ctx_percentage, {
        type: 'horizontalBar',
        data: {
            labels: data_label,
            datasets: obj,
        },
        options: {
            responsive: true,
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
                            value = value.join(',');
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
    // var tagTime=["00 - 01", "01 - 02", "02 - 03", "03 - 04", "04 - 05", "05 - 06", "06 - 07", "07 - 08", "08 - 09", "09 - 10", "10 - 11", "11 - 12", "12 - 13", "13 - 14", "14 - 15", "15 - 16", "16 - 17", "17 - 18", "18 - 19", "19 - 20", "20 - 21", "21 - 22", "22 - 23", "23 - 00"];

    var sumFb = response.data[5].total_interval.map(Number).reduce(summarize);
    var sumWA = response.data[10].total_interval.map(Number).reduce(summarize);
    var sumTw = response.data[7].total_interval.map(Number).reduce(summarize);
    var sumEmail = response.data[1].total_interval.map(Number).reduce(summarize);
    var sumTel = response.data[4].total_interval.map(Number).reduce(summarize);
    var sumLine = response.data[8].total_interval.map(Number).reduce(summarize);
    var sumVoice = response.data[0].total_interval.map(Number).reduce(summarize);
    var sumInst = response.data[9].total_interval.map(Number).reduce(summarize);
    var sumMes = response.data[6].total_interval.map(Number).reduce(summarize);
    var sumTwDM = response.data[11].total_interval.map(Number).reduce(summarize);
    var sumLive = response.data[2].total_interval.map(Number).reduce(summarize);
    var sumSms = response.data[3].total_interval.map(Number).reduce(summarize);
    var sumChat = response.data[12].total_interval.map(Number).reduce(summarize);
    // var sumTotAgent = response.data.total_interval.map(Number).reduce(summarize);
    //summarize per channel
    function summarize(total, num) {
          return total + num;
    }
    
    $("#mytbody").empty();
    // $("#mytfoot").empty();
    if(response.data.length != 0){ 
        // console.log(response)
        // console.log(response.data[12].total_interval)  
        // var i = 0;
        console.log(response);
        for (var i = 0; i < response.dates.length; i++) {
            $('#wall-month-tbl').find('tbody').append('<tr>'+
            '<td>'+response.dates[i]+'</td>'+
            '<td class="text-right">'+addCommas(response.total_agent[i])+'</td>'+
            '<td class="text-right">'+addCommas(response.data[5].total_interval[i])+'</td>'+
            '<td class="text-right">'+addCommas(response.data[10].total_interval[i])+'</td>'+
            '<td class="text-right">'+addCommas(response.data[7].total_interval[i])+'</td>'+
            '<td class="text-right">'+addCommas(response.data[1].total_interval[i])+'</td>'+
            '<td class="text-right">'+addCommas(response.data[4].total_interval[i])+'</td>'+
            '<td class="text-right">'+addCommas(response.data[8].total_interval[i])+'</td>'+
            '<td class="text-right">'+addCommas(response.data[0].total_interval[i])+'</td>'+
            '<td class="text-right">'+addCommas(response.data[9].total_interval[i])+'</td>'+
            '<td class="text-right">'+addCommas(response.data[6].total_interval[i])+'</td>'+
            '<td class="text-right">'+addCommas(response.data[11].total_interval[i])+'</td>'+
            '<td class="text-right">'+addCommas(response.data[2].total_interval[i])+'</td>'+
            '<td class="text-right">'+addCommas(response.data[3].total_interval[i])+'</td>'+
            '<td class="text-right">'+addCommas(response.data[12].total_interval[i])+'</td>'+
            '</tr>');
        }

        $('#wall-month-tbl').find('tfoot').append('<tr>'+
            '<td class="text-center" colspan="2">TOTAL</td>'+
            '<td class="text-right">'+addCommas(sumFb)+'</td>'+
            '<td class="text-right">'+addCommas(sumWA)+'</td>'+
            '<td class="text-right">'+addCommas(sumTw)+'</td>'+
            '<td class="text-right">'+addCommas(sumEmail)+'</td>'+
            '<td class="text-right">'+addCommas(sumTel)+'</td>'+
            '<td class="text-right">'+addCommas(sumLine)+'</td>'+
            '<td class="text-right">'+addCommas(sumVoice)+'</td>'+
            '<td class="text-right">'+addCommas(sumInst)+'</td>'+
            '<td class="text-right">'+addCommas(sumMes)+'</td>'+
            '<td class="text-right">'+addCommas(sumTwDM)+'</td>'+
            '<td class="text-right">'+addCommas(sumLive)+'</td>'+
            '<td class="text-right">'+addCommas(sumSms)+'</td>'+
            '<td class="text-right">'+addCommas(sumChat)+'</td>'+
            '</tr>');

    }else{
        $('#table_avg_traffic').find('tbody').append('<tr>'+
            '<td colspan=6> No Data </td>'+
            '</tr>');
    }
    //fade out loading
    $("#filter-loader").fadeOut("slow");
}

(function ($) {
    
    // checked all channel
    $('#check-all-channel').click(function(){
        $("input:checkbox.checklist-channel").prop('checked',this.checked);
        var checkboxes = document.querySelectorAll('input[name="example-checkbox2"]:checked'), values = [], type = [];
        Array.prototype.forEach.call(checkboxes, function(el) {
            values.push(el.value);
            type.push($(el).data('type'));
        });
        // console.log(values);
        list_channel = values;

        // call data
        callIntervalTraffic(n,list_channel);
    });

    //checked channel
    $('.checklist-channel').click(function(){
        $('#check-all-channel').prop( "checked", false );
        
        var checkedValues = $('input:checkbox:checked').map(function() {
            return this.value;
        }).get();

        var checkboxes = document.querySelectorAll('input[name="example-checkbox2"]:checked'), values = [], type = [];
        Array.prototype.forEach.call(checkboxes, function(el) {
            values.push(el.value);
            type.push($(el).data('type'));
        });
        // console.log(values);
        list_channel = values;
        // call data
        callIntervalTraffic(n, list_channel);
    });
    
})(jQuery);

function fromTemplate(){
    "use strict";
    // Horizontal Bar

    var MeSeContext = document.getElementById("barWallTrafficMonth");
    MeSeContext.height = 400;
    var MeSeData = {
        labels: [
            "Whatsapp",
            "Facebook",
            "Line",
            "Twitter",
            "Twitter DM",
            "Instagram",
            "Messenger",
            "Telegram",
            "Email",
            "Voice",
            "SMS",
            "Live Chat"
        ],
        datasets: [{
            label: "test",
            data: [1000,5000,4300,6000,7000,5000,10000,3500,6000,7000,2000,2500],
            backgroundColor: [
                "#31a550",
                "#467fcf",
                "#31a550",
                "#45aaf2",
                "#6574cd",
                "#fbc0d5",
                "#3866a6",
                "#343a40",
                "#e41313",
                "#ff9933",
                "#80cbc4",
                "#607d8b"
            ],
            hoverBackgroundColor: [
                "#A5B0B6",
                "#009E8C",
                "#00436D",
                "#31a550",
                "#467fcf",
                "#31a550",
                "#45aaf2",
                "#6574cd",
                "#fbc0d5",
                "#3866a6",
                "#343a40",
                "#e41313",
                "#ff9933",
                "#80cbc4",
                "#607d8b"
            ]
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
    

    var ctx = document.getElementById( "lineWallsumTrafficMonth" );
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
            legend :{
                display : false
            },
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