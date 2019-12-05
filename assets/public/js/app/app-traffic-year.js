var base_url = $('#base_url').val();

$(document).ready(function () {
    var data_chart = callGraphYear('Email', '2019');
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
                name: 'channel',
                type: 'bar',
                data: response.data.total_traffic
            }];
        console.log(response);

        var chart = document.getElementById('echartYear');
        var barChart = echarts.init(chart);
        var option = {
            grid: {
                top: '6',
                right: '0',
                bottom: '17',
                left: '25',
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
                    fontSize: 10,
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

function destroyChartInterval(){
    // destroy chart interval 
    $('#echartYear').remove(); // this is my <canvas> element
    $('#customerChartYear').append('<div id="echartYear"  class="h-400"></div>');
}


//jquery
(function ($) {
    // change date picker
    $("select#dateTahun").change(function(){
        destroyChartInterval();
          var selectedYear = $(this).children("option:selected").val();

          // console.log(selectedYear);
          // console.log($("#channel_name").val());
        callGraphYear($("#channel_name").val(), selectedYear);
        });
    $("select#channel_name").change(function(){
          var selectedName = $(this).children("option:selected").val();
          //console.log(selectedName);
          // console.log($("#channel_name").val());
        callGraphYear(selectedName, $("#dateTahun").val());
        });
    })(jQuery);
