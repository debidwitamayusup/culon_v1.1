(function($) {
    "use strict";
    /*----Echart2----*/
    var chartdata = [{
        name: 'Ticket',
        type: 'bar',
        data: [10, 15, 9, 18, 10, 15,90,50,40,30,50,40,30,40,60,50,30,80,90,30,40,50,60,40,70,40,70,40,30,30,40]
    }];
    var chart = document.getElementById('echartMonitoringTimeMonth');
    var barChart = echarts.init(chart);
    var option = {
        grid: {
            top: '6',
            right: '0',
            bottom: '17',
            left: '25',
        },
        xAxis: {
            data: ['1', '2', '3', '4', '5', '6', '7','8','9','10','11','12','13','14','15','16','17','18','19','20','21','22','23','24','25','26','27','28','29','30','31'],
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
        color: ['#5F9EA0']
    };
    barChart.setOption(option);

     /*----echart monitoring ticket by time----*/
	var chartTicketTime= [{
		name: 'Information',
		type: 'bar',
		stack: 'Stack',
		data: [14, 18, 20, 14, 29, 21, 25, 14]
	}, {
		name: 'Respond',
		type: 'bar',
		stack: 'Stack',
		data: [12, 14, 15, 50, 24, 24, 10, 20]
	}, {
		name: 'Complaint',
		type: 'bar',
		stack: 'Stack',
		data: [12, 14, 15, 50, 24, 24, 10, 20]
	}];
	/*----echartTicketTime----*/
	var optionTicketTime = {
		grid: {
			top: '6',
			right: '10',
			bottom: '17',
			left: '70',
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
			data: ['Resolve','Close','Reopen','Pending','On Progress','Reject','Open','New'],
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
		color: ["#A5B0B6","#009E8C","#00436D"]
	};
	var chartTicketTime = document.getElementById('echartTicketTimeMonth');
	var barChartTicketTime = echarts.init(chartTicketTime);
	barChartTicketTime.setOption(optionTicketTime);


    // pie monitoring ticket by time
    //pie chart summary status ticket
    var ctx = document.getElementById( "pieTicketTimeMonth" );
    ctx.height = 299;
    var myChart = new Chart( ctx, {
        type: 'pie',
        data: {
            datasets: [ {
                data: [ 15, 35, 40],
                backgroundColor: [
                                    "#A5B0B6",
                                    "#009E8C",
                                    "#00436D"
                                ],
                hoverBackgroundColor: [
                                    "#A5B0B6",
                                    "#009E8C",
                                    "#00436D"
                                ]

                            } ],
            labels: [
                                "Information",
                                "Respect",
                                "Compalaint",
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
})(jQuery);