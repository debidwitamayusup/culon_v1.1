var base_url = $('#base_url').val();

$(document).ready(function () {
    var d = new Date();
    var n = d.getFullYear();
    $('#dateTahun option[value = '+n+']').attr('selected','selected');
    var data_chart = callGraphYear('ShowAll', n);
    var data_graph = callDataPercentage('2019');
    var data_table = callDataTableAvg('2019');
});

function callGraphYear(channel_name,year) {
    var data = "";
    var base_url = $('#base_url').val();
    // console.log(year);

    $.ajax({
        type: 'POST',
        url: base_url + 'api/SummaryTraffic/SummaryYear/gInterval',
        data: {
            "channel_name": channel_name,
            "year": year
        },

        success: function (r) {
            var response = JSON.parse(r);
            var chartdata = [{
                name: 'total',
                type: 'bar',
                data: response.data.total_traffic
            }];
        console.log(response);

        var chart = document.getElementById('echartYear');
        var barChart = echarts.init(chart);
        var option = {
            grid: {
                top: '6',
                right: '5',
                bottom: '17',
                left: '35',
            },
            xAxis: {
                data: response.data.month_x_axis,
                axisLine: {
                    lineStyle: {
                        color: '#efefff'
                    }
                },
                axisLabel: {
                    fontSize: 10,
                    color: '#7886a0'
                }
            },
            tooltip: {
                show: true,
                showContent: true,
                alwaysShowContent: true,
                triggerOn: 'mousemove',
                trigger: 'axis',
                axisPointer: {
                    label: {
                        show: false,
                    }
                }
            },
            yAxis: {
                splitLine: {
                    lineStyle: {
                        color: '#efefff'
                    }
                },
                axisLine: {
                    lineStyle: {
                        color: '#efefff'
                    }
                },
                axisLabel: {
                    fontSize: 8,
                    color: '#7886a0'
                }
            },
            series: chartdata,
            color: ['#B22222']
        };
        barChart.setOption(option);
        },
        error: function (r) {
            alert("error");
        },
    });    
}   

//function get data and draw
function getColorChannel(channel_name){
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
    color['Whatsapp'] = '#31a550';

    return color[channel_name];
}

function callDataPercentage(year){
    $.ajax({
        type: 'post',
        url: base_url+'api/SummaryTraffic/SummaryYear/summaryIntervalYear',
        data: {
            year: year
        },
        success: function (r) {
            var response = JSON.parse(r);
            //console.log(response);
            drawChartPercentageYear(response);
        },
        error: function (r) {
            //console.log(r);
            alert("error");
        },
    });
}

function drawChartPercentageYear(response){
    var data_label = [];
    var data_rate = [];
    var data_color = [];;
    response.data.forEach(function (value, index) {
        data_label.push(value.channel_name);
        data_rate.push(value.rate);
        data_color.push(getColorChannel(value.channel_name));
    });
    console.log(data_label);
    var obj = [{
        label: "data",
        data: data_rate,
        borderColor: data_color,
        borderWidth: "0",
        backgroundColor: data_color
    }];

    // draw chart
    var ctx_percentage = document.getElementById("echartVerticalYear");
    ctx_percentage.height = 573;
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
                    }
                }]
            },
            legend: {
                display: false
            }
        }
    });
}

function callDataTableAvg(year){
    $.ajax({
        type: 'post',
        url: base_url+'api/SummaryTraffic/SummaryYear/averageInterval',
        data: {
            year: year
        },
        success: function (r) {
            var response = JSON.parse(r);
            console.log(response);
            drawTableYear(response);
        },
        error: function (r) {
            //console.log(r);
            alert("error");
        },
    });
}

function drawTableYear(response){
    $("#mytbody_year").empty();
    if(response.data.length != 0){
        response.data.forEach(function (value, index) {
            $('#table_avg_year').find('tbody').append('<tr>'+
            '<td>'+(index+1)+'</td>'+
            '<td>'+value.channel_name+'</td>'+
            '<td>'+value.sla+'%</td>'+
            '<td>'+value.art+'</td>'+
            '<td>'+value.aht+'</td>'+
            '<td>'+value.ast+'</td>'+
            '</tr>');
        });
    }else{
        $('#table_avg_year').find('tbody').append('<tr>'+
            '<td colspan=6> No Data </td>'+
            '</tr>');
    }
    
}

function destroyChartInterval(){
    // destroy chart interval 
    $('#echartYear').remove(); // this is my <canvas> element
    $('#customerChartYear').append('<div id="echartYear"  class="h-400"></div>');
}

function destroyChartPercentage(){
    //destroy chart percentage
    $('#echartVerticalYear').remove(); // this is my <canvas> element
    $('#chartPercentage').append('<canvas id="echartVerticalYear"></canvas>');
}

//jquery
(function ($) {
    // change date picker
    $("select#dateTahun").change(function(){
        destroyChartInterval();
        destroyChartPercentage();
          var selectedYear = $(this).children("option:selected").val();

          //console.log(selectedYear);
          // console.log($("#channel_name").val());
        callGraphYear($("#channel_name").val(), selectedYear);
        callDataPercentage(selectedYear);
        callDataTableAvg(selectedYear);
        // callDataTableAvg(selectedYear);
        });
    $("select#channel_name").change(function(){
          var selectedName = $(this).children("option:selected").val();
          //console.log(selectedName);
          // console.log($("#channel_name").val());
        callGraphYear(selectedName, $("#dateTahun").val());
        });
    })(jQuery);
