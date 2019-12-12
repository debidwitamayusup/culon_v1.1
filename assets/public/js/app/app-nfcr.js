(function ($) {
    "use strict";

    var chartdata3 = [{
		name: 'FCR',
		type: 'bar',
		stack: 'Stack',
		data: [14, 18, 20, 14, 29, 21, 25, 14, 24,14, 24]
	}, {
		name: 'NFCR',
		type: 'bar',
		stack: 'Stack',
		data: [12, 14, 15, 50, 24, 24, 10, 20, 30,20, 30]
    }];
    
    //pie chart
    var ctx = document.getElementById( "pieNFCR");
    ctx.height = 312;
    var myChart = new Chart( ctx, {
        type: 'pie',
        data: {
            datasets: [ {
                data: [ 75, 25 ],
                backgroundColor: [
                                    "#31A550",
                                    "#3866A6"
                                ],
                hoverBackgroundColor: [
                                    "#31A550",
                                    "#3866A6"
                                ]

                            } ],
            labels: [
                            "FCR",
                            "N-FCR"
                        ]
        },
        options: {
            responsive: true,
			maintainAspectRatio: false,
			legend :{
				position : "bottom"
			}
        }
    } );

/*----BarChart Information----*/
	var option_info = {
		grid: {
			top: '6',
			right: '5',
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
		color: ["#31A550","#3866A6"]
	};

	var chart_info = document.getElementById('echartNFCR-info');
	var barChart6 = echarts.init(chart_info);
    barChart6.setOption(option_info);

/*----BarChart Complaint----*/
	var option_comp = {
		grid: {
			top: '6',
			right: '5',
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
		color: ["#31A550","#3866A6"]
	};

	var chart_comp = document.getElementById('echartNFCR-comp');
	var barChart_comp = echarts.init(chart_comp);
	barChart_comp.setOption(option_comp);
	
/*----BarChart Request----*/
	var option_req = {
		grid: {
			top: '6',
			right: '5',
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
		color: ["#31A550","#3866A6"]
	};

	var chart_req = document.getElementById('echartNFCR-req');
	var barChart_req = echarts.init(chart_req);
	barChart_req.setOption(option_req);	

/*----BarChart Summary----*/
	var option_summary = {
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
		color: ["#31A550","#3866A6"]
	};

	var chart_summary = document.getElementById('echartNFCR-summary');
	var barChart_summary = echarts.init(chart_summary);
	barChart_summary.height=800;
	barChart_summary.setOption(option_summary);	
	
})(jQuery);