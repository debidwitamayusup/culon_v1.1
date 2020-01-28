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

//get yesterday
var v_params_today= m + '-' + n + '-' + (o-1);

$(document).ready(function () {
    $("#filter-loader").fadeIn("slow");
    // fromTemplate();
    callSumAllTenant('day', v_params_today, 0);
    callSumPerTenant('day', v_params_today, 0);
    callIntervalTraffic('day',v_params_today,0, '');

    $('#check-all-channel').prop('checked',false);
    $("input:checkbox.checklist-channel").prop('checked',false);
    var checkboxes = document.querySelectorAll('input[name="example-checkbox2"]:checked'), values = [], type = [];
    Array.prototype.forEach.call(checkboxes, function(el) {
        values.push(el.value);
        type.push($(el).data('type'));
    });
    // console.log(values);
    list_channel = values;

    $('#input-date-filter').datepicker("setDate", v_params_today);
    $("#btn-month").prop("class", "btn btn-light btn-sm");
    $("#btn-year").prop("class", "btn btn-light btn-sm");
    $("#btn-day").prop("class", "btn btn-red btn-sm");

    sessionStorage.removeItem('paramsSession');
    sessionStorage.setItem('paramsSession', 'day');

    $('#filter-date').show();
    $('#filter-month').hide();
    $('#filter-year').hide();
    $("#filter-loader").fadeOut("slow");
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

//for dinamic dropdown year on month
function callYearOnMonth()
{
    var data = "";
    var base_url = $('#base_url').val();
    // console.log(year);

    $.ajax({
        type: 'POST',
        url: base_url + 'api/SummaryTraffic/SummaryYear/optionYear',
        // data: {
        //     "niceDate" : niceDate
        // },

        success: function (r) {
            var data_option = [];
            var dateTahun = $("#select-year-on-month");
            var response = JSON.parse(r);

            // var html = '<option value="2020">2020</option>';
            var html = '';
            var i;
                for(i=0; i<response.data.niceDate.length; i++){
                    html += '<option value='+response.data.niceDate[i]+'>'+response.data.niceDate[i]+'</option>';
                }
                $('#select-year-on-month').html(html);
            
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

//for dinamic dropdown year on year
function callYear()
{
    var data = "";
    var base_url = $('#base_url').val();
    // console.log(year);

    $.ajax({
        type: 'POST',
        url: base_url + 'api/SummaryTraffic/SummaryYear/optionYear',
        // data: {
        //     "niceDate" : niceDate
        // },

        success: function (r) {
            var data_option = [];
            var dateTahun = $("#select-year-only");
            var response = JSON.parse(r);

            // var html = '<option value="2020">2020</option>';
            var html = '';
            var i;
                for(i=0; i<response.data.niceDate.length; i++){
                    html += '<option value='+response.data.niceDate[i]+'>'+response.data.niceDate[i]+'</option>';
                }
                $('#select-year-only').html(html);
            
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

function callSumAllTenant(params, index, params_year){
    $.ajax({
        type: 'post',
        url: base_url+'api/Wallboard/WallboardController/TrafficOPSPieChart',
        data: {
            params: params,
            index: index,
            params_year: params_year
        },
        success: function (r) {
            // var response = JSON.parse(r);
            //hit url for interval 900000 (15 minutes)
            // setTimeout(function(){callSumAllTenant(date);},900000);
            drawPieChartSumAllTenant(r);
            // $("#filter-loader").fadeOut("slow");
        },
        error: function (r) {
            // console.log(r);
            alert("error");
            // $("#filter-loader").fadeOut("slow");
        },
    });
}

function callSumPerTenant(params, index, params_year){
    $.ajax({
        type: 'post',
        url: base_url+'api/Wallboard/WallboardController/TrafficOPS',
        data: {
            params: params,
            index: index,
            params_year: params_year
        },
        success: function (r) {
            // var response = JSON.parse(r);
            var response = r;
            // console.log(response);
            //hit url for interval 900000 (15 minutes)
            // setTimeout(function(){callSumPerTenant(date);},900000);
            drawChartPerTenant(response);
            // $("#filter-loader").fadeOut("slow");
        },
        error: function (r) {
            // console.log(r);
            alert("error");
            // $("#filter-loader").fadeOut("slow");
        },
    });
}

function callIntervalTraffic(params, index, params_year, channel){
    // console.log(+arr_channel);
    // $("#filter-loader").fadeIn("slow");
    $.ajax({
        type: 'post',
        url: base_url+'api/Wallboard/WallboardController/IntervalToday',
        data: {
            params: params,
            index: index,
            params_year: params_year,
            channel: channel
        },
        success: function (r) {
            var response = r;
            // var response = JSON.parse(r);
            // console.log(response);
            //hit url for interval 900000 (15 minutes)
            setTimeout(function(){callIntervalTraffic(params, index, params_year, ["Facebook", "Whatsapp", "Twitter", "Email", "Telegram", "Line", "Voice", "Instagram", "Messenger", "Twitter DM", "Live Chat", "SMS"]);},900000);
            drawLineChart(response);
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

function drawPieChartSumAllTenant(response){
    destroyPieChart();
    //pie chart Ticket Channel
    // $('#legend').remove();
    // $('#mylegend').append('<div id="legend" class="legend-con"></div>');

    var ctx = document.getElementById("pieWallSummaryTraffic");
    ctx.height = 250;
    var myChart = new Chart(ctx, {
        type: 'pie',
        data: {
            datasets: [{
                data: response.data.total,
                backgroundColor: response.data.color,
                hoverBackgroundColor: response.data.color
            }],
            labels: response.data.channel_name
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,

            legend: {
                display: false
            },
            tooltips: {
              callbacks: {
                    label: function(tooltipItem, data) {
                        var value = data.datasets[0].data[tooltipItem.index];
                        value = value.toString();
                        value = value.split(/(?=(?:...)*$)/);
                        value = value.join(',');
                        return data.labels[tooltipItem.index]+': '+ value;
                    }
              } // end callbacks:
            },
            pieceLabel: {
                render: 'legend',
                fontColor: '#000',
                position: 'outside',
                segment: true
            },
            legendCallback: function (chart, index) {
                var allData = chart.data.datasets[0].data;
                // console.log(chart)
                var legendHtml = [];
                legendHtml.push('<ul><div id="mylegend" class="row ml-2">');
                allData.forEach(function (data, index) {
                    if (allData[index] != 0) {
                        var label = chart.data.labels[index];
                        var dataLabel = allData[index];
                        var background = chart.data.datasets[0].backgroundColor[index]
                        var total = 0;
                        for (var i in allData) {
                            total += parseInt(allData[i]);
                        }

                        // console.log(total)
                        var percentage = Math.round((dataLabel / total) * 100);
                        legendHtml.push('<li class="col-md-4 col-lg-4 col-sm-6 col-xl-4">');
                        legendHtml.push('<span class="chart-legend"><div style="background-color :' + background + '" class="box-legend"></div>' + label + ':' + percentage + '%</span>');
                    }else{
                        var label = chart.data.labels[index];
                        var dataLabel = allData[index];
                        var background = chart.data.datasets[0].backgroundColor[index]
                        var total = 0;
                        for (var i in allData) {
                            total += parseInt(allData[i]);
                        }

                        // console.log(total)
                        var percentage = Math.round((dataLabel / total) * 100);
                        legendHtml.push('<li class="col-md-4 col-lg-4 col-sm-6 col-xl-4">');
                        legendHtml.push('<span class="chart-legend"><div style="background-color :' + background + '" class="box-legend"></div>' + label + ':' + '0' + '%</span>');
                    }
                })
                legendHtml.push('</ul></div>');
                return legendHtml.join("");
            },
        }
    });
    var myLegendContainer = document.getElementById("legend");
    myLegendContainer.innerHTML = myChart.generateLegend();
}

function drawChartPerTenant(response){
    destroyHorizontalChart();
    let arrTenant = [], arrART =[], arrAHT = [], arrAST = [], arrSCR = []



    response.data.forEach(function (value, index) {
            arrTenant.push(value.TENANT_ID);
            arrART.push(value.ART);
            arrAHT.push(value.AHT);
            arrAST.push(value.AST);
            arrSCR.push(value.SCR);
        });
    /*----echart Wallboard Summary Traffic----*/
    var chartWallSummary = [{
        name: 'ART',
        type: 'bar',
        stack: 'Stack',
        data: arrART
    }, {
        name: 'AST',
        type: 'bar',
        stack: 'Stack',
        data: arrAST
    }, {
        name: 'AHT',
        type: 'bar',
        stack: 'Stack',
        data: arrAHT
    }, {
        name: 'SCR',
        type: 'bar',
        stack: 'Stack',
        data: arrSCR
    }];
    /*----echartTicketUnit----*/
    var optionWallSummary = {
        tooltip: {
            trigger: 'axis',
            axisPointer: {       
                // type: 'shadow'
                label: {
                    show: false,
                    formatter: function (value, index) {
                            var teks = '';
                            // console.log(value)
                            if(value.value == "oct_telkomcare"){
                                teks = teks + "TELKOMCARE";
                            }
                            else if(value.value == "oct_telkomsel")
                            {
                                teks = teks + "TELKOMSEL";
                            }
                            else{
                                return value.value
                            }
                            return teks;
                    }
                }
            }
        },
        legend: {
            // bottom: 10,
            left: 'center',
            data: ['ART', 'AST', 'AHT', 'SCR'],
            // labels:{
            //     boxWidth:10
            // }
        },
        grid: {
            top: '10%',
            right: '5%',
            bottom: '10%',
            left: '16%'
        },
        xAxis: {
            type: 'value',
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
        yAxis: {
            type: 'category',
            data: arrTenant,
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
                color: '#7886a0',
                formatter: function (value, index) {
                            var teks = '';
                            if(value == "oct_telkomcare"){
                                teks = teks + "TELKOMCARE";
                            }
                            else if(value == "oct_telkomsel")
                            {
                                teks = teks + "TELKOMSEL";
                            }
                            else{
                                return value
                            }
                            return teks;
                    }
            }
        },
        series: chartWallSummary,
        color: ["#00206C", "#007C7A", "#0038DE", "#00CBC9"]
    };
    var chartWallSummary = document.getElementById('echartWallSummaryTraffic');
    var barChartWallSummary = echarts.init(chartWallSummary);
    barChartWallSummary.setOption(optionWallSummary);
}

function destroyChartInterval(){
    // destroy chart interval 
    $('#lineWallSummaryTraffic').remove(); // this is my <canvas> element
    // $('#chart-no-data').remove(); // this is my <canvas> element
    $('#lineWallSummaryTrafficDiv').append('<canvas id="lineWallSummaryTraffic"  class="h-400"></canvas>');
}

function destroyPieChart(){
    $('#pieWallSummaryTraffic').remove(); // this is my <canvas> element
    $('#canvas-pie').append('<canvas id="pieWallSummaryTraffic" class="donutShadow overflow-hidden"></canvas>');
}

function destroyHorizontalChart(){
    $('#echartWallSummaryTraffic').remove(); // this is my <canvas> element
    $('#echartWallSummaryTrafficDiv').append('<div id="echartWallSummaryTraffic" class="chartsh-traffic-ops overflow-hidden"></div>');
}

function drawLineChart(response){
    destroyChartInterval();
    var data = [];
    if(!response.data.series){
        $('#lineWallSummaryTraffic').remove(); // this is my <canvas> element
        $('#lineWallSummaryTrafficDiv').append('<canvas id="lineWallSummaryTraffic" class="h-400"></canvas>');
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
        var ctx = document.getElementById( "lineWallSummaryTraffic" );
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

function drawIntervalChart(){
    // Line Wall
    var ctx = document.getElementById( "lineWallSummaryTraffic" );
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
            legend:{
                position:'bottom',
                labels:{
                    boxWidth:10
                }
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

function fromTemplate(){
    "use strict";

    //pie chart Ticket Channel
    var ctx = document.getElementById("pieWallSummaryTraffic");
    ctx.height = 250;
    var myChart = new Chart(ctx, {
        type: 'pie',
        data: {
            datasets: [{
                data: [15, 35, 40, 20, 50, 30, 15, 30, 40, 50, 70, 90],
                backgroundColor: [
                    "#467fcf",
                    "#fbc0d5",
                    "#31a550",
                    "#e41313",
                    "#3866a6",
                    "#45aaf2",
                    "#6574cd",
                    "#343a40",
                    "#607d8b",
                    "#31a550",
                    "#ff9933",
                    "#80cbc4"
                ],
                hoverBackgroundColor: [
                    "#467fcf",
                    "#fbc0d5",
                    "#31a550",
                    "#e41313",
                    "#3866a6",
                    "#45aaf2",
                    "#6574cd",
                    "#343a40",
                    "#607d8b",
                    "#31a550",
                    "#ff9933",
                    "#80cbc4"
                ]

            }],
            labels: [
                "Facebook",
                "Instagram",
                "Line",
                "Email",
                "Messenger",
                "Twitter",
                "Twitter DM",
                "Telegram",
                "Live Chat",
                "Whatsapp",
                "Voice",
                "SMS"
            ]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,

            legend: {
                display: false
            },
            pieceLabel: {
                render: 'legend',
                fontColor: '#000',
                position: 'outside',
                segment: true
            },
            legendCallback: function (chart, index) {
                var allData = chart.data.datasets[0].data;
                // console.log(chart)
                var legendHtml = [];
                legendHtml.push('<ul><div class="row ml-2">');
                allData.forEach(function (data, index) {
                    var label = chart.data.labels[index];
                    var dataLabel = allData[index];
                    var background = chart.data.datasets[0].backgroundColor[index]
                    var total = 0;
                    for (var i in allData) {
                        total += parseInt(allData[i]);
                    }

                    // console.log(total)
                    var percentage = Math.round((dataLabel / total) * 100);
                    legendHtml.push('<li class="col-md-4 col-lg-4 col-sm-6 col-xl-4">');
                    legendHtml.push('<span class="chart-legend"><div style="background-color :' + background + '" class="box-legend"></div>' + label + ':' + percentage + '%</span>');
                })
                legendHtml.push('</ul></div>');
                return legendHtml.join("");
            },
        }
    });
    var myLegendContainer = document.getElementById("legend");
    myLegendContainer.innerHTML = myChart.generateLegend();


    /*----echart Wallboard Summary Traffic----*/
    var chartWallSummary = [{
        name: 'ART',
        type: 'bar',
        stack: 'Stack',
        data: [12, 12, 12, 12, 12, 12, 12, 12, 12, 12,12,12]
    }, {
        name: 'AST',
        type: 'bar',
        stack: 'Stack',
        data: [25, 25, 25, 25, 25, 25, 25, 25, 25, 25,25,25]
    }, {
        name: 'AHT',
        type: 'bar',
        stack: 'Stack',
        data: [40, 40, 40, 40, 40, 40, 40, 40, 40, 40,40,40]
    }, {
        name: 'SCR',
        type: 'bar',
        stack: 'Stack',
        data: [60, 60, 60, 60, 60, 60, 60, 60, 60, 60,60,60]
    }];
    /*----echartTicketUnit----*/
    var optionWallSummary = {
        tooltip: {
            trigger: 'axis',
            axisPointer: {       
                type: 'shadow'
            }
        },
        legend: {
            bottom: 10,
            left: 'center',
            data: ['ART', 'AST', 'AHT', 'SCR'],
            labels:{
                boxWidth:10
            }
        },
        grid: {
            top: '3%',
            right: '3%',
            bottom: '15%',
            left: '10%',
        },
        xAxis: {
            type: 'value',
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
        yAxis: {
            type: 'category',
            data: ['Garuda', 'Pegadaian', 'Pegadaian', 'BRI', 'Garuda', 'Pegadaian', 'BRI', 'Garuda', 'Pegadaian', 'BRI', 'Garuda', 'Telkom'],
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
        series: chartWallSummary,
        color: ["#00206C", "#007C7A", "#0038DE", "#00CBC9"]
    };
    var chartWallSummary = document.getElementById('echartWallSummaryTraffic');
    var barChartWallSummary = echarts.init(chartWallSummary);
    barChartWallSummary.setOption(optionWallSummary);

// Line Wall
    var ctx = document.getElementById( "lineWallSummaryTraffic" );
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
            legend:{
                position:'bottom',
                labels:{
                    boxWidth:10
                }
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

function setDatePicker(){
    $(".datepicker").datepicker({
        format: "yyyy-mm-dd",
        todayHighlight: true,
        autoclose: true
    }).attr("readonly", "readonly").css({"cursor":"pointer", "background":"white"});
}

// jquery
(function ($) {
    // change date picker
    var dates = new Date();
    dates.setDate(dates.getDate()>0);
    $('#input-date-filter').datepicker({
        dateFormat: 'yy-mm-dd',
        maxDate: 'now',
        showTodayButton: true,
        showClear: true,
        // minDate: date,
        onSelect: function(dateText) {
            // console.log(this.value);
            v_date = this.value;

            callSumAllTenant('day', v_date, 0);
            callSumPerTenant('day', v_date, 0);
            callIntervalTraffic('day',v_date,0, '');

            $('#check-all-channel').prop('checked',false);
            $("input:checkbox.checklist-channel").prop('checked',false);
        }
    });

    // btn day
    $('#btn-day').click(function () {
        params_time = 'day';
        v_date = '2019-12-01';
        $('#input-date-filter').datepicker("setDate", v_params_today);

        callSumAllTenant('day', v_params_today, 0);
        callSumPerTenant('day', v_params_today, 0);
        callIntervalTraffic('day',v_params_today,0, '');

        $("#btn-month").prop("class", "btn btn-light btn-sm");
        $("#btn-year").prop("class", "btn btn-light btn-sm");
        $(this).prop("class", "btn btn-red btn-sm");

        $('#check-all-channel').prop('checked',false);
        $("input:checkbox.checklist-channel").prop('checked',false);
        var checkboxes = document.querySelectorAll('input[name="example-checkbox2"]:checked'), values = [], type = [];
        Array.prototype.forEach.call(checkboxes, function(el) {
            values.push(el.value);
            type.push($(el).data('type'));
        });
        // console.log(values);
        list_channel = values;

        $('#check-all-channel').prop('checked',false);
        $("input:checkbox.checklist-channel").prop('checked',false);
        var checkboxes = document.querySelectorAll('input[name="example-checkbox2"]:checked'), values = [], type = [];
        Array.prototype.forEach.call(checkboxes, function(el) {
            values.push(el.value);
            type.push($(el).data('type'));
        });
        // console.log(values);
        list_channel = values;

        sessionStorage.removeItem('paramsSession');
        sessionStorage.setItem('paramsSession', 'day');

        sessionStorage.removeItem('monthSession');
        // sessionStorage.setItem('monthSession', n);

        sessionStorage.removeItem('yearSession');
        // sessionStorage.setItem('yearSession', m);

        $('#filter-date').show();
        $('#filter-month').hide();
        $('#filter-year').hide();
    });

    // btn month
    $('#btn-month').click(function () {
        params_time = 'month';
        callSumAllTenant('month', n, m);
        callSumPerTenant('month', n, m);
        callIntervalTraffic('month',n,m, '');
        callYearOnMonth();

        $("#btn-day").prop("class", "btn btn-light btn-sm");
        $("#btn-year").prop("class", "btn btn-light btn-sm");
        $(this).prop("class", "btn btn-red btn-sm");

        $('#check-all-channel').prop('checked',false);
        $("input:checkbox.checklist-channel").prop('checked',false);
        var checkboxes = document.querySelectorAll('input[name="example-checkbox2"]:checked'), values = [], type = [];
        Array.prototype.forEach.call(checkboxes, function(el) {
            values.push(el.value);
            type.push($(el).data('type'));
        });
        // console.log(values);
        list_channel = values;

        sessionStorage.removeItem('paramsSession');
        sessionStorage.setItem('paramsSession', 'month');

        sessionStorage.removeItem('monthSession');
        sessionStorage.setItem('monthSession', n);

        sessionStorage.removeItem('yearSession');
        sessionStorage.setItem('yearSession', m);

        $('#filter-date').hide();
        $('#filter-month').show();
        $('#filter-year').hide();
    });

    // btn year
    $('#btn-year').click(function () {
        params_time = 'year';
        callSumAllTenant('year', m, 0);
        callSumPerTenant('year', m, 0);
        callIntervalTraffic('year',m,0, '');
        callYear();

        $('#check-all-channel').prop('checked',false);
        $("input:checkbox.checklist-channel").prop('checked',false);
        var checkboxes = document.querySelectorAll('input[name="example-checkbox2"]:checked'), values = [], type = [];
        Array.prototype.forEach.call(checkboxes, function(el) {
            values.push(el.value);
            type.push($(el).data('type'));
        });
        // console.log(values);
        list_channel = values;

        sessionStorage.removeItem('paramsSession');
        sessionStorage.setItem('paramsSession', 'year');

        sessionStorage.removeItem('monthSession');

        sessionStorage.removeItem('yearSession');
        sessionStorage.setItem('yearSession', m);

        $("#btn-day").prop("class", "btn btn-light btn-sm");
        $("#btn-month").prop("class", "btn btn-light btn-sm");
        $(this).prop("class", "btn btn-red btn-sm");

        $('#filter-date').hide();
        $('#filter-month').hide();
        $('#filter-year').show();
    });


    $('#select-year-only').change(function () {
        v_year = $(this).val();
        callSumAllTenant('year', v_year, 0);
        callSumPerTenant('year', v_year, 0);
        callIntervalTraffic('year',v_year,0, '');
        
        $('#check-all-channel').prop('checked',false);
        $("input:checkbox.checklist-channel").prop('checked',false);
        $('#filter-date').hide();
        $('#filter-month').hide();
        $('#filter-year').show();
    });

    $('#btn-go').click(function(){
        callSumAllTenant('month',$("#select-month").val(), $("#select-year-on-month").val());
        callSumPerTenant('month',$("#select-month").val(), $("#select-year-on-month").val());
        callIntervalTraffic('month',$("#select-month").val(), $("#select-year-on-month").val(), '');

        sessionStorage.removeItem('monthSession');
        sessionStorage.setItem('monthSession', $("#select-month").val());

        sessionStorage.removeItem('yearSession');
        sessionStorage.setItem('yearSession', $("#select-year-on-month").val());

        $('#check-all-channel').prop('checked',false);
        $("input:checkbox.checklist-channel").prop('checked',false);
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
        let fromParams = sessionStorage.getItem('paramsSession');
        // console.log(fromParams);
        // call data
        if (fromParams == 'day') {
            callIntervalTraffic(fromParams, $("#input-date-filter").val(),0,list_channel);
        }else if (fromParams == 'month') {
            let monthFromParams = sessionStorage.getItem('monthSession');
            let yearFromParams = sessionStorage.getItem('yearSession');
            // console.log('ini month params:'+monthFromParams);
            // console.log('ini year params:'+yearFromParams);
            callIntervalTraffic(fromParams, monthFromParams, yearFromParams,list_channel);
        }else if (fromParams == 'year') {
            callIntervalTraffic(fromParams, $("#select-year-only").val(),0,list_channel);
            // console.log($("#select-year-only").val());  
        }
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
        let fromParams = sessionStorage.getItem('paramsSession');
        // console.log(fromParams);
        if (fromParams == 'day') {
            callIntervalTraffic(fromParams, $("#input-date-filter").val(),0,list_channel);
        }else if (fromParams == 'month') {
            let monthFromParams = sessionStorage.getItem('monthSession');
            let yearFromParams = sessionStorage.getItem('yearSession');
            // console.log('ini month params:'+monthFromParams);
            // console.log('ini year params:'+yearFromParams);
            callIntervalTraffic(fromParams, monthFromParams, yearFromParams,list_channel);
        }else if (fromParams == 'year') {
            callIntervalTraffic(fromParams, $("#select-year-only").val(),0,list_channel);
        }
    });
})(jQuery);