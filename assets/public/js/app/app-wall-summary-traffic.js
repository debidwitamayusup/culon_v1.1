(function ($) {
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
            boxWidth : '10'
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
})(jQuery);