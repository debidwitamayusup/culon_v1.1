$(function($) {
    "use strict";

    var chartdata = [{
		name: 'Total',
		type: 'bar',
        data: [15000, 10000, 25000, 40000, 50000, 25000,40000]
	}];
	var chart = document.getElementById('echartGraphicWeek');
	var barChart = echarts.init(chart);
	var option = {
        scales: {
            xAxes: [{
              maxBarThickness: 100,
            }],
        },
		grid: {
			top: '6',
			right: '0',
			bottom: '17',
			left: '40',
		},
		xAxis: {
			data: ['Monday','Tuesday','Wednesday','Thursday','Friday','Saturday','Sunday'],
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
		color: ['#46AFB2']
	};
	barChart.setOption(option);

    
    // Horizontal Bar

    var MeSeContext = document.getElementById("barIntervalWeek");
	MeSeContext.height =356;
	// MeSeContext.width= 450;
    var MeSeData = {
        labels : [
                    "Twitter",
                    "Whatsapp",
                    "Telegram",
                    "Messenger",
                    "Instagram",
                    "Voice",
                    "Email",
                    "Line",
                    "Live Chat",
                    "Facebook",
                    "Twitter DM",
                    "SMS"
        ],
        datasets : [{
            label : "test",
            data :[50,60,70,80,90,100,200,400,300,250,350,100],
            backgroundColor : [
                                "#45aaf2",
                                "#31a550",
                                "#343a40",
                                "#3866a6",
                                "#fbc0d5",
                                "#ff9933",
                                "#e41313",
                                "#31a550",
                                "#607d8b",
                                "#467fcf",
                                "#6574cd",
                                "#80cbc4"
                            ],
            hoverBackgroundColor : [
                                "#45aaf2",
                                "#31a550",
                                "#343a40",
                                "#3866a6",
                                "#fbc0d5",
                                "#ff9933",
                                "#e41313",
                                "#31a550",
                                "#607d8b",
                                "#467fcf",
                                "#6574cd",
                                "#80cbc4"
            ]
        }]
    };
    var MeSeChart = new Chart(MeSeContext,{
        type : 'horizontalBar',
        data : MeSeData,
        options : {
            responsive: true,
            maintainAspectRatio: true,
            scales : {
                xAxes : [{
                    ticks : {
                        min : 0
                    }
                }],
                yAxes : [{
                    stacked : true
                }]
            },
            legend: {
                display: false
                }
        }
    });

});