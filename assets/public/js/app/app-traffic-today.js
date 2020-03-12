var base_url = $('#base_url').val();
var v_date = '';
var list_channel= [];
var v_params_tenant = 'oct_telkomcare'
const sessionParams = JSON.parse(localStorage.getItem('Auth-infomedia'));
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
var v_params_yesterday = m + '-' + n + '-' + (o-1);
$(document).ready(function () {
    if(sessionParams){
        // set date
        // v_date = getToday();
        v_date = getToday();
        $('#input-date').datepicker("setDate", v_params_yesterday);
        //set check all channel
        $('#check-all-channel').prop('checked',false);
        $("input:checkbox.checklist-channel").prop('checked',false);
        var checkboxes = document.querySelectorAll('input[name="example-checkbox2"]:checked'), values = [], type = [];
        Array.prototype.forEach.call(checkboxes, function(el) {
            values.push(el.value);
            type.push($(el).data('type'));
        });
        // console.log(values);
        list_channel = values;
        if(sessionParams.TENANT_ID[0].TENANT_ID != ''){
            getTenant('', sessionParams.USERID);
        }else{
            getTenant('', '');
        }
        var data_chart = callIntervalTraffic(v_params_yesterday, list_channel, $('#layanan_name').val());
        var data_table_avg = callDataTableAvg(v_params_yesterday, $('#layanan_name').val());
        var data_percentage = callDataPercentage(v_params_yesterday, $('#layanan_name').val());
        
    }else{
        window.location = base_url
    }
    
});

function timestrToSec(timestr) {
    var parts = timestr.split(":");
    return (parts[0] * 3600) +
           (parts[1] * 60) +
           (+parts[2]);
  }
  
  function pad(num) {
    if(num < 10) {
      return "0" + num;
    } else {
      return "" + num;
    }
  }
  
  function formatTime(seconds) {
    return [pad(Math.floor(seconds/3600)),
            pad(Math.floor(seconds/60)%60),
            pad(seconds%60),
            ].join(":");
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

function getYesterday(){
    var today = new Date();
    var dd = String(today.getDate()).padStart(2, '0');
    var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
    var yyyy = today.getFullYear();

    today = yyyy  + '-' + mm + '-' + (dd-1);
    // today = '2019-05-22';
    return today;
}

function getToday(){
    var today = new Date();
    var dd = String(today.getDate()).padStart(2, '0');
    var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
    var yyyy = today.getFullYear();

    today = yyyy  + '-' + mm + '-' + (dd);
    // today = '2019-05-22';
    return today;
}

function getToday(){
    var today = new Date();
    var dd = String(today.getDate()).padStart(2, '0');
    var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
    var yyyy = today.getFullYear();

    today = yyyy  + '-' + mm + '-' + dd;
    // today = '2019-05-22';
    return today;
}

function callIntervalTraffic(date, arr_channel, tenant_id){
    // console.log(+arr_channel);
    $("#filter-loader").fadeIn("slow");
    $.ajax({
        type: 'post',
        url: base_url+'api/SummaryTraffic/SummaryToday/getIntervalTrafficToday2',
        data: {
            date: date,
            arr_channel: arr_channel,
            tenant_id: tenant_id,
            dashboard: '1',
        },
        success: function (r) {
            var response = JSON.parse(r);
            // console.log(response);
            drawChartToday(response);
            $("#filter-loader").fadeOut("slow");
        },
        error: function (r) {
            // console.log(r);
            alert("error");
            $("#filter-loader").fadeOut("slow");
        },
    });
}

function drawChartToday(response){
    destroyChartInterval();
    var data = [];
    if(!response.data.series){
        $('#customerChartToday').remove(); // this is my <canvas> element
        $('#chart-interval').append('<div id="chart-no-data" class="h-400"><h6>No Data</h6></div>');
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
        var ctx = document.getElementById( "customerChartToday" );
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
                legend : false,
                tooltips: {
                    callbacks: {
                        label: function (tooltipItem, data) {
                            return data.datasets[tooltipItem.datasetIndex].label + ": " + addCommas(tooltipItem.yLabel);
                        }
                    }
                },
                barRoundness:  1,
                scales: {
                    yAxes: [ {
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                },
                //untuk onclick pada chart javascript
                onClick: function(event, array) {
                    let element = this.getElementAtEvent(event);
                    if (element.length > 0) {
                    var series= element[0]._model.datasetLabel;
                    var label = element[0]._chart.data.labels;
                    var labeling = this.data.datasets[element[0]._datasetIndex].label;
                    var value = this.data.datasets[element[0]._datasetIndex].data[element[0]._index];
                    alert("Sessions of "+labeling+" is "+value);
                    }
                },
            }
        } );
    }
}

function callDataTableAvg(date, tenant_id){
    $.ajax({
        type: 'post',
        url: base_url+'api/SummaryTraffic/SummaryToday/getAverageInterval',
        data: {
            date: date,
            tenant_id: tenant_id
        },
        success: function (r) {
            var response = JSON.parse(r);
            // console.log(response);
            drawTableToday(response);
        },
        error: function (r) {
            // console.log(r);
            alert("error");
        },

    });
    
}

function drawTableToday(response){
    // console.log(response);
    $("#mytbody").empty();
    $("#mytfoot").empty();
    var sumSCR =0, sumART =0, sumAHT =0, sumAST =0; lengtData =0;
    if(response.data.length != 0){
        response.data.forEach(function (value, index) {
            if(value.scr != '-'){
                var tdSCR = parseFloat(value.scr).toFixed(2)+'%';
            }else{
                var tdSCR = '-';
            }
            $('#table-avg-interval').find('tbody').append('<tr>'+
            '<td class="text-center">'+(index+1)+'</td>'+
            '<td class="text-left">'+value.channel_name+'</td>'+
            // '<td class="text-right">'+parseFloat((value.scr > 100) ? 100 : value.scr).toFixed(2)+'%</td>'+
            '<td class="text-right">'+tdSCR.toString().replace(".",",")+'</td>'+
            '<td class="text-center">'+value.art+'</td>'+
            '<td class="text-center">'+value.aht+'</td>'+
            '<td class="text-center">'+value.ast+'</td>'+
            '</tr>');

            if(value.scr != '-'){
                sumSCR += parseFloat(value.scr)
            }

            if(value.art != '-'){
                sumART += timestrToSec(value.art);
            }

            if(value.aht != '-'){
                sumAHT += timestrToSec(value.aht);
            }

            if(value.ast != '-'){
                sumAST += timestrToSec(value.ast);
            }

            if(value.scr != '-' || value.art != '-' || value.aht != '-' || value.ast != '-'){
                lengtData++;
            }
        });
        
        if(lengtData != 0){
            var avgSCR = (sumSCR / lengtData);
            var avgART = Math.round(sumART / lengtData);
            var avgAHT = Math.round(sumAHT / lengtData);
            var avgAST = Math.round(sumAST / lengtData);
            $('#table-avg-interval').find('tfoot').append('<tr>'+
            '<td class="text-center" colspan="2">Average</td>'+
            // '<td class="text-right">'+parseFloat((value.scr > 100) ? 100 : value.scr).toFixed(2)+'%</td>'+
            '<td class="text-right">'+(avgSCR.toFixed(2)).toString().replace(".",",")+'%</td>'+
            '<td class="text-center">'+formatTime(avgART).toString().substring(1)+'</td>'+
            '<td class="text-center">'+formatTime(avgAHT).toString().substring(1)+'</td>'+
            '<td class="text-center">'+formatTime(avgAST).toString().substring(1)+'</td>'+
            '</tr>');
        }else{
            $('#table-avg-interval').find('tfoot').append('<tr>'+
            '<td class="text-center" colspan="2">Average</td>'+
            // '<td class="text-right">'+parseFloat((value.scr > 100) ? 100 : value.scr).toFixed(2)+'%</td>'+
            '<td class="text-right">-</td>'+
            '<td class="text-center">-</td>'+
            '<td class="text-center">-</td>'+
            '<td class="text-center">-</td>'+
            '</tr>');
        }

        
    }else{
        $('#table-avg-interval').find('tbody').append('<tr>'+
            '<td colspan=6> No Data </td>'+
            '</tr>');
    }
    
}

function callDataPercentage(date, tenant_id){
    $.ajax({
        type: 'post',
        url: base_url+'api/SummaryTraffic/SummaryToday/getPercentageTrafficToday',
        data: {
            date: date,
            tenant_id: tenant_id
        },
        success: function (r) {
            var response = JSON.parse(r);
            // console.log(response);
            drawChartPercentageToday(response);
        },
        error: function (r) {
            // console.log(r);
            alert("error");
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
    var ctx_percentage = document.getElementById("echartPercentageToday");
    ctx_percentage.height = 507;
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
                intersect: false,
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
            //untuk onclick pada chart javascript
            onClick: function(event, array) {
                let element = this.getElementAtEvent(event);
                if (element.length > 0) {
                var series= element[0]._model.label;
                var label = element[0]._chart.data.labels;
                var labeling = this.data.datasets[element[0]._datasetIndex].label;
                var value = this.data.datasets[element[0]._datasetIndex].data[element[0]._index];
                alert("Sessions of "+series+" is "+value);
                }
            },
        }
    });
}

// function destroy element canvas
function destroyChartInterval(){
    // destroy chart interval 
    $('#customerChartToday').remove(); // this is my <canvas> element
    $('#chart-no-data').remove(); // this is my <canvas> element
    $('#chart-interval').append('<canvas id="customerChartToday"  class="h-400"></canvas>');
}

function destroyChartPercentage(){
    //destroy chart percentage
    $('#echartPercentageToday').remove(); // this is my <canvas> element
    $('#chart-percentage').append('<canvas id="echartPercentageToday"></canvas>');
}

//jquery
(function ($) {
    // change date picker
    var dates = new Date();
    dates.setDate(dates.getDate()>0);
    $('#input-date').datepicker({
        dateFormat: 'yy-mm-dd',
        maxDate: 'now',
        showTodayButton: true,
        showClear: true,
        // minDate: date,
        onSelect: function(dateText) {
            // console.log(this.value);
            v_date = this.value;
            callIntervalTraffic(this.value, list_channel, $('#layanan_name').val());
            callDataTableAvg(this.value, $('#layanan_name').val());
            callDataPercentage(this.value, $('#layanan_name').val());
            
        }
    });

    $('#layanan_name').change(function(){
        //set check all channel
        $('#check-all-channel').prop('checked',false);
        $("input:checkbox.checklist-channel").prop('checked',false);
        var checkboxes = document.querySelectorAll('input[name="example-checkbox2"]:checked'), values = [], type = [];
        Array.prototype.forEach.call(checkboxes, function(el) {
            values.push(el.value);
            type.push($(el).data('type'));
        });
        // console.log(values);
        list_channel = values;
        callIntervalTraffic($('#input-date').val(), list_channel, $('#layanan_name').val());
        callDataTableAvg($('#input-date').val(), $('#layanan_name').val());
        callDataPercentage($('#input-date').val(), $('#layanan_name').val());
    });

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
        callIntervalTraffic($('#input-date').val(), list_channel, $('#layanan_name').val());
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
        callIntervalTraffic($('#input-date').val(), list_channel, $('#layanan_name').val());
    });
    
})(jQuery);