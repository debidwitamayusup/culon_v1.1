var base_url = $('#base_url').val();
var v_date = '';
var list_channel= [];

$(document).ready(function () {
    // set date
    // v_date = getToday();
    v_date = getYesterday();
    $('#input-date').datepicker("setDate", v_date);
    //set check all channel
    $('#check-all-channel').prop('checked',true);
    $("input:checkbox.checklist-channel").prop('checked',true);
    var checkboxes = document.querySelectorAll('input[name="example-checkbox2"]:checked'), values = [], type = [];
    Array.prototype.forEach.call(checkboxes, function(el) {
        values.push(el.value);
        type.push($(el).data('type'));
    });
    // console.log(values);
    list_channel = values;

    // var data_chart = callIntervalTraffic(v_date, []);
    var data_chart = callIntervalTraffic(v_date, list_channel);
    var data_table_avg = callDataTableAvg(v_date);
    var data_percentage = callDataPercentage(v_date);
    
});

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

    today = yyyy  + '-' + mm + '-' + dd;
    // today = '2019-05-22';
    return today;
}

function callIntervalTraffic(date, arr_channel){
    // console.log(+arr_channel);
    $("#filter-loader").fadeIn("slow");
    $.ajax({
        type: 'post',
        url: base_url+'api/SummaryTraffic/SummaryToday/getIntervalTrafficToday2',
        data: {
            date: date,
            arr_channel: arr_channel
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
                legend:{
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

function callDataTableAvg(date){
    $.ajax({
        type: 'post',
        url: base_url+'api/SummaryTraffic/SummaryToday/getAverageInterval',
        data: {
            date: date
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
    if(response.data.length != 0){
        response.data.forEach(function (value, index) {
            $('#table-avg-interval').find('tbody').append('<tr>'+
            '<td class="text-center">'+(index+1)+'</td>'+
            '<td class="text-left">'+value.channel_name+'</td>'+
            '<td class="text-right">'+parseFloat((value.scr > 100) ? 100 : value.scr).toFixed(2)+'%</td>'+
            '<td class="text-right">'+value.art+'</td>'+
            '<td class="text-right">'+value.aht+'</td>'+
            '<td class="text-right">'+value.ast+'</td>'+
            '</tr>');
        });
    }else{
        $('#table-avg-interval').find('tbody').append('<tr>'+
            '<td colspan=6> No Data </td>'+
            '</tr>');
    }
    
}

function callDataPercentage(date){
    $.ajax({
        type: 'post',
        url: base_url+'api/SummaryTraffic/SummaryToday/getPercentageTrafficToday',
        data: {
            date: date
        },
        success: function (r) {
            var response = JSON.parse(r);
            // console.log(response);
            drawChartPercentageToday(response);
        },
        error: function (r) {
            console.log(r);
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
    console.log(data_rate);

    // draw chart
    var ctx_percentage = document.getElementById("echartPercentageToday");
    ctx_percentage.height = 568;
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
                        min: 0 // Edit the value according to what you need
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
    $('#input-date').datepicker({
        dateFormat: 'yy-mm-dd',
        onSelect: function(dateText) {
            // console.log(this.value);
            v_date = this.value;
            
            //re draw
            callIntervalTraffic(this.value, list_channel);
            callDataTableAvg(this.value);
            callDataPercentage(this.value);
        }
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

        // call data
        callIntervalTraffic(v_date, list_channel);
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
        callIntervalTraffic(v_date, list_channel);
    });
    
})(jQuery);