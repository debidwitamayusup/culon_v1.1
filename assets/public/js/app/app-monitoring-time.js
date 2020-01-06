(function($) {
    "use strict";
    
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
	var chartTicketTime = document.getElementById('echartTicketTime');
	var barChartTicketTime = echarts.init(chartTicketTime);
	barChartTicketTime.setOption(optionTicketTime);


    // pie monitoring ticket by time
    //pie chart summary status ticket
    var ctx = document.getElementById( "pieMonitoringTime" );
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

	 //line chart monitoring ticket by time
    var ctx = document.getElementById( "TimeLineChart" );
    var myChart = new Chart( ctx, {
        type: 'line',
        data: {
            labels: [ "00:00", "01:00", "02:00", "03:00", "04:00", "05:00", "06:00","07:00","08:00","09:00","10:00","11:00","12:00","13:00","14:00","15:00","16:00","17:00","18:00","19:00","20:00","21:00","22:00","23:00","24:00"],
            datasets: [ {
                        label: "New",
                        data: [ 0, 30, 10, 120, 50, 63, 10 ,40,60,30,60,70,30,20,70,40,30,60,20,50,67,50,30,20],
                        backgroundColor: 'transparent',
                        borderColor: '#778899',
                        borderWidth: 3,
                        pointStyle: 'circle',
                        pointRadius: 5,
                        pointBorderColor: 'transparent',
                        pointBackgroundColor: '#778899',
                    },{
                        label: "Open",
                        data: [ 0, 70,90,50,30,50,60,40,30,60,50,70,30,60,50,80,90,30,50,40,50,60,60,90],
                        backgroundColor: 'transparent',
                        borderColor: '#8FBC8F',
                        borderWidth: 3,
                        pointStyle: 'circle',
                        pointRadius: 5,
                        pointBorderColor: 'transparent',
                        pointBackgroundColor: '#8FBC8F',
                    },{
                        label: "Reject",
                        data: [ 0, 30, 10, 120, 50, 40,60,70,90,40,30,60,30,20,70,40,30,60,20,50,67,50,30,20],
                        backgroundColor: 'transparent',
                        borderColor: '#B22222',
                        borderWidth: 3,
                        pointStyle: 'circle',
                        pointRadius: 5,
                        pointBorderColor: 'transparent',
                        pointBackgroundColor: '#B22222',
                    },{
                        label: "On Progress",
                        data: [ 0,100,40,60,40,50,80,40,60,30,60,70,30,20,70,40,30,60,20,50,67,50,30,20],
                        backgroundColor: 'transparent',
                        borderColor: '#20B2AA',
                        borderWidth: 3,
                        pointStyle: 'circle',
                        pointRadius: 5,
                        pointBorderColor: 'transparent',
                        pointBackgroundColor: '#20B2AA',
                    },{
                        label: "Pending",
                        data: [ 0,60,40,30,60,70,30,100,60,30,60,70,30,20,70,40,30,60,20,50,67,50,30,20],
                        backgroundColor: 'transparent',
                        borderColor: '#B0C4DE',
                        borderWidth: 3,
                        pointStyle: 'circle',
                        pointRadius: 5,
                        pointBorderColor: 'transparent',
                        pointBackgroundColor: '#B0C4DE',
                    },{
                        label: "Reopen",
                        data: [ 0, 30, 10, 120, 50, 63, 10 ,90,50,70,90,40,90,30,70,40,30,60,20,50,67,50,30,20],
                        backgroundColor: 'transparent',
                        borderColor: '#008B8B',
                        borderWidth: 3,
                        pointStyle: 'circle',
                        pointRadius: 5,
                        pointBorderColor: 'transparent',
                        pointBackgroundColor: '#008B8B',
                    },{
                        label: "Resolve",
                        data: [ 0, 30, 10, 120, 50, 63, 10 ,40,60,30,60,70,30,20,70,40,30,60,20,80,90,40,60,50],
                        backgroundColor: 'transparent',
                        borderColor: '#1B64BB',
                        borderWidth: 3,
                        pointStyle: 'circle',
                        pointRadius: 5,
                        pointBorderColor: 'transparent',
                        pointBackgroundColor: '#1B64BB',
                    },{
                        label: "Close",
                        data: [ 0, 30, 10, 120, 50, 63, 10 ,40,60,30,60,70,30,20,70,40,30,60,20,60,40,30,20,50],
                        backgroundColor: 'transparent',
                        borderColor: 'rgba(8, 158, 96,0.75)',
                        borderWidth: 3,
                        pointStyle: 'circle',
                        pointRadius: 5,
                        pointBorderColor: 'transparent',
                        pointBackgroundColor: '#2F4F4F',
                    }]
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