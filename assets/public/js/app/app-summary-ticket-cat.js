(function ($) {
    "use strict";
    
     /*----echart summary ticket category----*/
	var chartdataTicket= [{
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
	/*----echart summary ticket category----*/
	var optionTicket = {
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
		series: chartdataTicket,
		color: ["#A5B0B6","#009E8C","#00436D"]
	};
	var chartTicket = document.getElementById('echartTicket');
	var barChartTicket = echarts.init(chartTicket);
	barChartTicket.setOption(optionTicket);
    
    //pie chart summary status ticket
    var ctx = document.getElementById( "pieTodayCat" );
    ctx.height = 200;
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
                                "Respond",
                                "Complaint",
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

    var ctx = document.getElementById( "pieWeekCat" );
    ctx.height = 200;
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
                                "Respond",
                                "Complaint",
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
    
    var ctx = document.getElementById( "pieMonthCat" );
    ctx.height = 200;
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
                                "Respond",
                                "Complaint",
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

    var ctx = document.getElementById( "pieYearCat" );
    ctx.height = 200;
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
                                "Respond",
                                "Complaint",
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