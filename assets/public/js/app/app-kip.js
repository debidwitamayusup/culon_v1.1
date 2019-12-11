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
    
    //pie chart
    var ctx = document.getElementById( "pieKIP");
    ctx.height = 300;
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
				position : "bottom"
			}
        }
    } );

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
	var chart6 = document.getElementById('echartKIP');
	var barChart6 = echarts.init(chart6);
    barChart6.setOption(option6);

    ///chartInformation
    var chartdataInfo = [{
		name: 'Information',
		type: 'bar',
		stack: 'Stack',
		data: [14, 18, 20, 14,100]
	}];
    var optionInfo = {
		grid: {
			top: '6',
			right: '10',
			bottom: '20',
			left: '96',
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
			data: ['Informasi Produk','Informasi','Informasi Promo','Informasi Cabut','Informasi Member'],
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
	var chartInfo = document.getElementById('echartInfo');
	var barChartInfo = echarts.init(chartInfo);
    barChartInfo.setOption(optionInfo);

    //chartComplaint
    var chartdataComp = [{
		name: 'Complaint',
		type: 'bar',
		stack: 'Stack',
		data: [14, 18, 20, 14,100]
	}];
    var optionComp = {
		grid: {
			top: '6',
			right: '10',
			bottom: '20',
			left: '98',
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
			data: ['Internet Lambat','Lampu Tidak Nyala','Internet Putus','Telepon Putus','Tidak Bisa Internet'],
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
	var chartComp = document.getElementById('echartComp');
	var barChartComp = echarts.init(chartComp);
    barChartComp.setOption(optionComp);

    //chartRequest
    var chartdataReq = [{
		name: 'Request',
		type: 'bar',
		stack: 'Stack',
		data: [14, 18, 20, 14,100]
	}];
    var optionReq = {
		grid: {
			top: '6',
			right: '10',
			bottom: '20',
			left: '80',
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
			data: ['Data Member','Reset Account','Pasang Produk','Cabut Produk','Maaf'],
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
	var chartReq = document.getElementById('echartReq');
	var barChartReq = echarts.init(chartReq);
    barChartReq.setOption(optionReq);

})(jQuery);