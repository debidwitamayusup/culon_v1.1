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
const sessionParams = JSON.parse(localStorage.getItem('Auth-infomedia'));
const tokenSession = JSON.parse(localStorage.getItem('Auth-token'));

$(document).ready(function () {
    if(sessionParams){
        $("#filter-loader").fadeIn("slow");
        // fromTemplate();
        if(sessionParams.TENANT_ID[0].TENANT_ID != ''){
            getTenant(tokenSession, '', sessionParams.USERID);
        }else{
            getTenant(tokenSession, '', '');
        }

        callDataPercentage(tokenSession, n, $("#layanan_name").val(),m);
        callIntervalTraffic(tokenSession, n, ["Facebook", "Whatsapp", "Twitter", "Email", "Telegram", "Line", "Instagram", "Messenger", "Twitter DM", "Live Chat", "SMS", "ChatBot"], $("#layanan_name").val());
        callTableInterval(tokenSession, n, $("#layanan_name").val());
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
        window.location = base_url
    }
});

function getTenant(token, date, userid){
    $.ajax({
        beforeSend: function (xhr) {
            xhr.setRequestHeader("token", token);
        },
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
            if(r.status == 404){
                var notif = alert('Your Account Credential is Invalid. Maybe someone else has logon to your account.')
                if(notif){
                    localStorage.clear();
                    window.location = base_url+'main/login';
                }else{
                    localStorage.clear();
                    window.location = base_url+'main/login';
                }
            }
            $('#modalError').modal('show');
            setTimeout(function(){getTenant(token, date, userid);},5000);
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
    $('#lineWallsumTrafficMonthDiv').append('<canvas id="lineWallsumTrafficMonth" class="h-500"></canvas>');
}

function destroyChartPercentage(){
    //destroy chart percentage
    $('#barWallTrafficMonth').remove(); // this is my <canvas> element
    $('#barWallTrafficMonthDiv').append('<canvas id="barWallTrafficMonth"></canvas>');
}

function callIntervalTraffic(token, month, arr_channel, tenant_id){
    // console.log(+arr_channel);
    // $("#filter-loader").fadeIn("slow");
    $.ajax({
        beforeSend: function (xhr) {
            xhr.setRequestHeader("token", token);
        },
        type: 'post',
        url: base_url+'api/SummaryTraffic/SummaryMonth/getIntervalTrafficMonthly',
        data: {
            month: month,
            arr_channel: arr_channel,
            tenant_id: tenant_id
        },
        success: function (r) {
            var response = JSON.parse(r);
            $('#modalError').modal('hide');
            // console.log(response);
            //hit url for interval 900000 (15 minutes)
            setTimeout(function(){callIntervalTraffic(token, month, arr_channel, $("#layanan_name").val() );},5000);
            drawChartToday(response);
            // drawTableData(response);
            // $("#filter-loader").fadeOut("slow");
        },
        error: function (r) {
            if(r.status == 404){
                var notif = alert('Your Account Credential is Invalid. Maybe someone else has logon to your account.')
                if(notif){
                    localStorage.clear();
                    window.location = base_url+'main/login';
                }else{
                    localStorage.clear();
                    window.location = base_url+'main/login';
                } 
            }
            $('#modalError').modal('show');
            setTimeout(function(){callTableInterval(token, month, $("#layanan_name").val());}, 5000);
        },
    });
}

function callTableInterval(token, month, tennant_id){
    // console.log(+arr_channel);
    // $("#filter-loader").fadeIn("slow");
    $.ajax({
        beforeSend: function (xhr) {
            xhr.setRequestHeader("token", token);
        },
        type: 'post',
        url: base_url+'api/Wallboard/WallboardController/GetInvalMonthTable',
        data: {
            month: month,
            tenant_id: tennant_id            
        },
        success: function (r) {
            var response = r;
            $('#modalError').modal('hide');
            // console.log(response);
            //hit url for interval 900000 (15 minutes)
            setTimeout(function(){callTableInterval(token, month, $("#layanan_name").val());}, 5000);
            // drawChartToday(response);
            drawTableData(response);
            // $("#filter-loader").fadeOut("slow");
        },
        error: function (r) {
            // console.log(r);
            // setTimeout(function(){ alert("Oops Something Went Wrong..."); }, 3000);
            $('#modalError').modal('show');
            setTimeout(function(){callTableInterval(token, month, $("#layanan_name").val());}, 5000);
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
                animation: false,
                responsive: true,
                maintainAspectRatio: false,
                layout: {
                    padding: {
                        left: 5,
                        right: 0,
                        top: 20,
                        bottom:10
                    }
                },
                tooltips: {
                    callbacks: {
                        label: function (tooltipItem, data) {
                            return data.datasets[tooltipItem.datasetIndex].label + ": " + addCommas(tooltipItem.yLabel);
                        }
                    }
                },
                legend:{
                    display: true,
                    position:'bottom',
                    labels:{
                        boxWidth:10
                    }
                },
                barRoundness:  1,
                scales: {
                    xAxes:[{
                        ticks:{
                            fontSize:10
                        }
                    }],
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

function callDataPercentage(token, month, tenant_id, params_year){
    $.ajax({
        beforeSend: function (xhr) {
            xhr.setRequestHeader("token", token);
        },
        type: 'post',
        url: base_url+'api/Wallboard/WallboardController/GetBarchannelPerMonth',
        data: {
            month: month,
            tenant_id: tenant_id,
            params_year: params_year
        },
        success: function (r) {
            var response = r;
            if(response.status != false){
                $('#modalError').modal('hide');
                setTimeout(function(){callDataPercentage(token, month, $("#layanan_name").val(),m);},5000);
                drawChartPercentageMonth(response);
            }else{
                var notif = alert('Your Account Credential is Invalid. Maybe someone else has logon to your account.')
                if(notif){
                    localStorage.clear();
                    window.location = base_url+'main/login';
                }else{
                    localStorage.clear();
                    window.location = base_url+'main/login';
                }
            }
        },
        error: function (r) {
            if(r.status == 404){
                var notif = alert('Your Account Credential is Invalid. Maybe someone else has logon to your account.')
                if(notif){
                    localStorage.clear();
                    window.location = base_url+'main/login';
                }else{
                    localStorage.clear();
                    window.location = base_url+'main/login';
                } 
            }
            $('#modalError').modal('show');
            setTimeout(function(){callDataPercentage(token, month, $("#layanan_name").val(),m);},5000);
        },
    });
}


function drawChartPercentageMonth(response){
    destroyChartPercentage();
    // console.log(response);
    var data_label = [];
    var data_rate = [];
    var data_color = [];
    response.data.forEach(function (value, index) {
        data_label.push(value.channel_name);
        data_rate.push(value.rate);
        data_color.push(getColorChannel(value.channel_name));
    });
    // console.log(data_rate);
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
            animation: false,
            layout: {
                padding: {
                    left: 0,
                    right: 0,
                    top: 10,
                    bottom: 5
                }
            },
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
                        fontSize:10,
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

    // var sumVoice = response.data[12].total_interval.map(Number).reduce(summarize);
    var sumLive = response.data[0].total_interval.map(Number).reduce(summarize);
    var sumTwDM = response.data[1].total_interval.map(Number).reduce(summarize);
    var sumMes = response.data[2].total_interval.map(Number).reduce(summarize);
    var sumWA = response.data[3].total_interval.map(Number).reduce(summarize);
    var sumLine = response.data[4].total_interval.map(Number).reduce(summarize);
    var sumTel = response.data[5].total_interval.map(Number).reduce(summarize);
    var sumChat = response.data[6].total_interval.map(Number).reduce(summarize);
    var sumInst = response.data[7].total_interval.map(Number).reduce(summarize);
    var sumFb = response.data[8].total_interval.map(Number).reduce(summarize);
    var sumTw = response.data[9].total_interval.map(Number).reduce(summarize);
    var sumEmail = response.data[10].total_interval.map(Number).reduce(summarize);
    var sumSms = response.data[11].total_interval.map(Number).reduce(summarize);
    // var sumTotAgent = response.data.total_interval.map(Number).reduce(summarize);
    //summarize per channel
    function summarize(total, num) {
          return total + num;
    }
    
    $("#mytbody").empty();
    $("#mytfoot").empty();
    // $("#mytfoot").empty();
    if(response.data.length != 0){ 
        // console.log(response);
        for (var i = 0; i < response.dates.length; i++) {
            $('#wall-month-tbl').find('tbody').append('<tr>'+
            '<td>'+response.dates[i]+'</td>'+
            // '<td class="text-right">'+addCommas(response.total_agent[i])+'</td>'+
            // '<td class="text-right">'+addCommas(response.data[12].total_interval[i])+'</td>'+
            '<td class="text-right">'+addCommas(response.data[0].total_interval[i])+'</td>'+
            '<td class="text-right">'+addCommas(response.data[1].total_interval[i])+'</td>'+
            '<td class="text-right">'+addCommas(response.data[2].total_interval[i])+'</td>'+
            '<td class="text-right">'+addCommas(response.data[3].total_interval[i])+'</td>'+
            '<td class="text-right">'+addCommas(response.data[4].total_interval[i])+'</td>'+
            '<td class="text-right">'+addCommas(response.data[5].total_interval[i])+'</td>'+
            '<td class="text-right">'+addCommas(response.data[6].total_interval[i])+'</td>'+
            '<td class="text-right">'+addCommas(response.data[7].total_interval[i])+'</td>'+
            '<td class="text-right">'+addCommas(response.data[8].total_interval[i])+'</td>'+
            '<td class="text-right">'+addCommas(response.data[9].total_interval[i])+'</td>'+
            '<td class="text-right">'+addCommas(response.data[10].total_interval[i])+'</td>'+
            '<td class="text-right">'+addCommas(response.data[11].total_interval[i])+'</td>'+
            '</tr>');
        }

        $('#wall-month-tbl').find('tfoot').append('<tr>'+
            '<td class="text-center">TOTAL</td>'+
            // '<td class="text-right">'+addCommas(sumVoice)+'</td>'+
            '<td class="text-right">'+addCommas(sumLive)+'</td>'+
            '<td class="text-right">'+addCommas(sumTwDM)+'</td>'+
            '<td class="text-right">'+addCommas(sumMes)+'</td>'+
            '<td class="text-right">'+addCommas(sumWA)+'</td>'+
            '<td class="text-right">'+addCommas(sumLine)+'</td>'+
            '<td class="text-right">'+addCommas(sumTel)+'</td>'+
            '<td class="text-right">'+addCommas(sumChat)+'</td>'+
            '<td class="text-right">'+addCommas(sumInst)+'</td>'+
            '<td class="text-right">'+addCommas(sumFb)+'</td>'+
            '<td class="text-right">'+addCommas(sumTw)+'</td>'+
            '<td class="text-right">'+addCommas(sumEmail)+'</td>'+
            '<td class="text-right">'+addCommas(sumSms)+'</td>'+
            '</tr>');

        // setTimeout(function(){callTableInterval(n, '');}, 5000);
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
    //     callIntervalTraffic(n,list_channel);
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
    //     callIntervalTraffic(n, list_channel);
    // });
    $("select#layanan_name").change(function(){
        var selectedTenant = $(this).children("option:selected").val();
        callDataPercentage(tokenSession, n, $("#layanan_name").val(),m);
        callIntervalTraffic(tokenSession, n, ["Facebook", "Whatsapp", "Twitter", "Email", "Telegram", "Line", "Instagram", "Messenger", "Twitter DM", "Live Chat", "SMS", "ChatBot"], $("#layanan_name").val());
        callTableInterval(tokenSession, n, $("#layanan_name").val());
    });
})(jQuery);