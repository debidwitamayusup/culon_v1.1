var months = [
    'January', 'February', 'March', 'April', 'May',
    'June', 'July', 'August', 'September',
    'October', 'November', 'December'
    ];
var base_url = $('#base_url').val();
var d = new Date();
var n = d.getMonth()+1;
var m = d.getFullYear();

$(document).ready(function () {
    
    //for dropdown selected
    destroyChartInterval();
    destroyChartPercentage();
    callYear();
    $('#month option[value='+n+']').attr('selected','selected');
    // $('#dropdownYear option[value='+m+']').attr('selected','selected');
    // console.log('"'+n+'"');
    // console.log(m);
    callGraphicInterval('ShowAll', $("#month").val(), m);
    // callGraphicInterval('ShowAll', '1', '2020');
    callDataPercentage($("#month").val(), m);
    callDataTableAvg($("#month").val(), m);
});

function monthNumToName(month) {
    return months[month - 1] || '';
}

function callGraphicInterval(channel_name, month, year){
    // console.log(parseInt(new Date().getMonth()) + 1)
    // $("#month").val(parseInt(new Date().getMonth()) + 1)
    // console.log("selectedMonthst");
    console.log(month);
    console.log(year);
    destroyChartInterval();
     $("#filter-loader").fadeIn("slow");
    var getMontName = monthNumToName(month);
    var data = "";
    var base_url = $('#base_url').val();
    //call traffic per month
    $.ajax({
        type: 'POST',
        url: base_url + 'api/SummaryTraffic/SummaryMonth/lineChartPerMonth',
        data: {
            "channel_name": channel_name,
            "month": month,
            "year": year,
        },
        success: function (r) {
            var response = JSON.parse(r);
            // console.log(response);
            var chartdata = [{
                name: getMontName,
                type: 'bar',
                data: response.data.total_traffic
            }];

            // console.log(response.data.channel_color)
            var chart = document.getElementById('echart1');
            var barChart = echarts.init(chart);
            var option = {
                grid: {
                    top: '6',
                    right: '0',
                    bottom: '17',
                    left: '45',
                },
                xAxis: {
                    data: response.data.param_date,
                    axisLine: {
                        lineStyle: {
                            color: '#efefff'
                        }
                    },
                    axisLabel: {
                        fontSize: 10,
                        color: '#7886a0'
                    },
                },
                tooltip: {
                    show: true,
                    showContent: true,
                    alwaysShowContent: false,
                    triggerOn: 'mousemove',
                    trigger: 'axis',
                    axisPointer: {
                        label: {
                            show: true,
                            color: '#7886a0'
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
                color: [''+response.data.channel_color+'']
            };
            barChart.setOption(option);
        $("#filter-loader").fadeOut("slow");
        },
        error: function (r) {
            alert("error");
             $("#filter-loader").fadeOut("slow");
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

function callDataPercentage(month, year){
    $.ajax({
        type: 'post',
        url: base_url+'api/SummaryTraffic/SummaryMonth/getPercentageTrafficMonth',
        data: {
            month: month,
            year: year
        },
        success: function (r) {
            var response = JSON.parse(r);
            // console.log(response);
            drawChartPercentageMonth(response);
        },
        error: function (r) {
            console.log(r);
            alert("error");
        },
    });
}

function drawChartPercentageMonth(response){
    var data_label = [];
    var data_rate = [];
    var data_color = [];;
    response.data.forEach(function (value, index) {
        data_label.push(value.channel_name);
        data_rate.push(value.rate);
        data_color.push(getColorChannel(value.channel_name));
    });
    // console.log(data_color);
    var obj = [{
        label: "data",
        data: data_rate,
        borderColor: data_color,
        borderWidth: "0",
        backgroundColor: data_color
    }];

    // draw chart
    var ctx_percentage = document.getElementById("echartVerticalMonth");
    ctx_percentage.height = 300;
    // ctx_percentage.width = 180;
    var percentageChart = new Chart(ctx_percentage, {
        type: 'horizontalBar',
        data: {
            labels: data_label,
            datasets: obj,
        },
        options: {
            responsive: true,
            maintainAspectRatio: true,
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
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
                        value = value + '%';
                        return value;
                    }
              }
            },
        }
    });
}

function callDataTableAvg(month, year){
    $.ajax({
        type: 'post',
        url: base_url+'api/SummaryTraffic/SummaryMonth/averageIntervalTable',
        data: {
            month: month,
            year: year
        },
        success: function (r) {
            var response = JSON.parse(r);
            // console.log(response);
            drawTableMonth(response);
        },
        error: function (r) {
            console.log(r);
            alert("error");
        },
    });
}

function drawTableMonth(response){
    $("#mytbody_month").empty();
    if(response.data.length != 0){
        response.data.forEach(function (value, index) {
            $('#tabel_average_month').find('tbody').append('<tr>'+
            '<td class="text-center">'+(index+1)+'</td>'+
            '<td class="text-left">'+value.channel_name+'</td>'+
            '<td class="text-right">'+parseFloat((value.scr > 100) ? 100 : value.scr).toFixed(2)+'%</td>'+
            '<td class="text-right">'+value.art+'</td>'+
            '<td class="text-right">'+value.aht+'</td>'+
            '<td class="text-right">'+value.ast+'</td>'+
            '</tr>');
        });
    }else{
        $('#tabel_average_month').find('tbody').append('<tr>'+
            '<td colspan=6> No Data </td>'+
            '</tr>');
    }
    
}

//for dinamic dropdown year value
function callYear()
{
    var data = "";
    var base_url = $('#base_url').val();
    // console.log(year);

    $.ajax({
        type: 'POST',
        url: base_url + 'api/SummaryTraffic/SummaryMonth/optionYear',
        // data: {
        //     "niceDate" : niceDate
        // },

        success: function (r) {
            var data_option = [];
            var dateTahun = $("#dropdownYear");
            var response = JSON.parse(r);

            // var html = '<option value="2020">2020</option>';
            var html = '';
            var i;
            console.log(response);
                for(i=0; i<response.data.niceDate.length; i++){
                    html += '<option value='+response.data.niceDate[i]+'>'+response.data.niceDate[i]+'</option>';
                }
                $('#dropdownYear').html(html);
            
            // var option = $ ("<option />");
            //     option.html(i);
            //     option.val(i);
            //     dateTahun.append(option);
        },
        error: function (r) {
            //console.log(r);
            alert("error");
        },
    });
}

// function destroy element canvas
function destroyChartInterval(){
    // destroy chart interval 
    $('#echart1').remove(); // this is my <canvas> element
    $('#customerChartMonth').append('<div id="echart1" class="chartsh overflow-hidden"></div>');
}

function destroyChartPercentage(){
    //destroy chart percentage
    $('#echartVerticalMonth').remove(); // this is my <canvas> element
    $('#chartPercentage').append('<canvas id="echartVerticalMonth"></canvas>');
}

    (function ($) {
        $("select#month").change(function(){
            //destroy chart
            destroyChartInterval();
            destroyChartPercentage();

            var selectedMonth = $(this).children("option:selected").val();
              // console.log(selectedMonth);
              // console.log($("#dropdownYear").val());
            callGraphicInterval($("#channel_name").val(), selectedMonth, $("#dropdownYear").val());
            callDataPercentage(selectedMonth, $("#dropdownYear").val());
            callDataTableAvg(selectedMonth, $("#dropdownYear").val());
        });

        $("select#channel_name").change(function(){
            destroyChartInterval();
             // destroyChartInterval();
            var selectedChannel = $(this).children("option:selected").val();
              // console.log(selectedMonth);
              // console.log($("#channel_name").val());
            callGraphicInterval(selectedChannel, $("#month").val(), $("#dropdownYear").val());
        });

        // change date picker
        $("select#dropdownYear").change(function(){
            destroyChartInterval();
            destroyChartPercentage();
              var selectedYear = $(this).children("option:selected").val();

            //console.log(selectedYear);
            callGraphicInterval($("#channel_name").val(), $("#month").val(), selectedYear);
            callDataPercentage($("#month").val(), selectedYear);
            callDataTableAvg($("#month").val(), selectedYear);
        });
})(jQuery);
