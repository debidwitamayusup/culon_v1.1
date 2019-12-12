(function ($) {
	"use strict";
	
	var chartdata3 = [{
		name: 'Information',
		type: 'bar',
		stack: 'Stack',
		data: [14, 18, 20, 14, 29, 21, 25, 14, 24,14, 24]
	}, {
		name: 'Request',
		type: 'bar',
		stack: 'Stack',
		data: [12, 14, 15, 50, 24, 24, 10, 20, 30,20, 30]
    },{
		name: 'Complaint',
		type: 'bar',
		stack: 'Stack',
		data: [10, 12, 13, 60, 16, 13, 30, 40,40,40,70]
	}];
	
	/*----Echart6----*/
	var option6 = {
		grid: {
			top: '6',
			right: '10',
			bottom: '20',
			left: '60',
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
			data: ['Whatsapp','Instagram','Twitter','Facebook','Messenger','Telegram','Twitter DM','Voice','Live Chat','Line','SMS'],
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
		series: chartdata3,
		color: ["#B22222","#316cbe","#ff9933"]
	};
	var chart6 = document.getElementById('echartTraffic');
	var barChart6 = echarts.init(chart6);
    barChart6.setOption(option6);

    //pie chart
    var ctx = document.getElementById( "pieTCategory");
    ctx.height = 359;
    var myChart = new Chart( ctx, {
        type: 'pie',
        data: {
            datasets: [ {
                data: [ 85, 48, 59 ],
                backgroundColor: [
                                    "#B22222",
                                    "#316cbe",
                                    "#ff9933"
                                ],
                hoverBackgroundColor: [
                                    "#B22222",
                                    "#316cbe",
                                    "#ff9933"
                                ]

                            } ],
            labels: [
                            "Complaint",
                            "Request",
                            "Information"
                        ]
        },
        options: {
            responsive: true,
			maintainAspectRatio: false,
			legend :{
				position : 'bottom',
				labels:{
					boxWidth:10
			   }
			}
        }
    } );

    ///chartInformation
    var chartdataInfo = [{
		name: 'Information',
		type: 'bar',
		stack: 'Stack',
		data: [14, 18, 20, 14,50,14, 18, 20, 14, 29, 21, 25],
	}];
    var optionInfo = {
		grid: {
			top: '6',
			right: '10',
			bottom: '20',
			left: '60',
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
			data: ['Whatsapp','Instagram','Twitter','Facebook','Messenger','Telegram','Twitter DM','Voice','Live Chat','Line','SMS'],
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
		series: chartdataInfo,
		color: ["#ff9933"]
	};
	var chartInfo = document.getElementById('echartInfoTraffic');
	var barChartInfo = echarts.init(chartInfo);
    barChartInfo.setOption(optionInfo);

    //chartComplaint
    var chartdataComp = [{
		name: 'Complaint',
		type: 'bar',
		stack: 'Stack',
		data: [14, 18, 20, 14,100,14, 18, 20, 14, 29, 21, 25]
	}];
    var optionComp = {
		grid: {
			top: '6',
			right: '10',
			bottom: '20',
			left: '60',
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
			data: ['Whatsapp','Instagram','Twitter','Facebook','Messenger','Telegram','Twitter DM','Voice','Live Chat','Line','SMS'],
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
		series: chartdataComp,
		color: ["#B22222"]
	};
	var chartComp = document.getElementById('echartCompTraffic');
	var barChartComp = echarts.init(chartComp);
    barChartComp.setOption(optionComp);

    //chartRequest
    var chartdataReq = [{
		name: 'Request',
		type: 'bar',
		stack: 'Stack',
		data:[14, 18, 20, 14,100,14, 18, 20, 14, 29, 21, 25]
	}];
    var optionReq = {
		grid: {
			top: '6',
			right: '10',
			bottom: '20',
			left: '60',
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
			data: ['Whatsapp','Instagram','Twitter','Facebook','Messenger','Telegram','Twitter DM','Voice','Live Chat','Line','SMS'],
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
		series: chartdataReq,
		color: ["#316cbe"]
	};
	var chartReq = document.getElementById('echartReqTraffic');
	var barChartReq = echarts.init(chartReq);
    barChartReq.setOption(optionReq);

})(jQuery);