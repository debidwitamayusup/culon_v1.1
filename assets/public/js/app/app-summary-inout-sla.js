( function ( $ ) {
    "use strict";
    
    var ctx = document.getElementById( "pieSummarySla" );
    ctx.height = 300;
    var myChart = new Chart( ctx, {
        type: 'pie',
        data: {
            datasets: [ {
                data: [15,35],
                backgroundColor: [
                                    "#8EA2D4",
                                    "#3C64AB"
                                ],
                hoverBackgroundColor: [
                                    "#8EA2D4",
                                    "#3C64AB"
                                ]

                            } ],
            labels: [
                                    "In SLA",
                                    "Out SLA",
                    ]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            legend:{
                position:"bottom",
                labels:{
					boxWidth:10
			   }
            }
        }
    } );
    
	  /*----echart summary in out sla----*/
      var chartTicketTime= [{
		name: 'In SLA',
		type: 'bar',
		stack: 'Stack',
		data: [12, 14, 15, 50, 24, 24, 10, 20, 30,30]
	}, {
		name: 'Out SLA',
		type: 'bar',
		stack: 'Stack',
		data: [12, 14, 15, 50, 24, 24, 10, 20, 30,10]
	}];
	/*----echartTicketTime----*/
	var optionTicketTime = {
		grid: {
			top: '6',
			right: '10',
			bottom: '17',
			left: '95',
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
			data: ['Agency Help Line','Call Center','Claim Non Health','Claim Health','Credit Control','Provider Relation','Post Link','Keuangan','Data Control','CRM'],
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
		series: chartTicketTime,
		color: ["#8EA2D4","#3C64AB"]
	};
	var chartTicketTime = document.getElementById('echartTopUnit');
	var barChartTicketTime = echarts.init(chartTicketTime);
    barChartTicketTime.setOption(optionTicketTime);
    
    /*----echart monitoring ticket by time----*/
    var chartTicketTime= [{
		name: 'In SLA',
		type: 'bar',
		stack: 'Stack',
		data: [12, 14, 15, 50, 24, 24, 10, 20, 30,30]
	}, {
		name: 'Out SLA',
		type: 'bar',
		stack: 'Stack',
		data: [12, 14, 15, 50, 24, 24, 10, 20, 30,10]
	}];
	/*----echartTicketTime----*/
	var optionTicketTime = {
		grid: {
			top: '6',
			right: '10',
			bottom: '17',
			left: '95',
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
			data: ['Agency Help Line','Call Center','Claim Non Health','Claim Health','Credit Control','Provider Relation','Post Link','Request','Information','Complaint'],
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
		series: chartTicketTime,
		color: ["#8EA2D4","#3C64AB"]
	};
	var chartTicketTime = document.getElementById('echartTopCategory');
	var barChartTicketTime = echarts.init(chartTicketTime);
	barChartTicketTime.setOption(optionTicketTime);
} )( jQuery );