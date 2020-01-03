(function ($) {
    "use strict";
    
     /*----echartTicket Status----*/
	var chartTicketUnit= [{
		name: 'New',
		type: 'bar',
		stack: 'Stack',
		data: [14, 18, 20, 14, 29, 21, 25, 14, 24,90]
	}, {
		name: 'Open',
		type: 'bar',
		stack: 'Stack',
		data: [12, 14, 15, 50, 24, 24, 10, 20, 30,90]
	}, {
		name: 'Reject',
		type: 'bar',
		stack: 'Stack',
		data: [12, 14, 15, 50, 24, 24, 10, 20, 30,80]
	}, {
		name: 'On Progress',
		type: 'bar',
		stack: 'Stack',
		data: [12, 14, 15, 50, 24, 24, 10, 20, 30,60]
	}, {
		name: 'Pending',
		type: 'bar',
		stack: 'Stack',
		data: [12, 14, 15, 50, 24, 24, 10, 20, 30,40]
	}, {
		name: 'Reopen',
		type: 'bar',
		stack: 'Stack',
		data: [12, 14, 15, 50, 24, 24, 10, 20, 30,20]
	}, {
		name: 'Resolve',
		type: 'bar',
		stack: 'Stack',
		data: [12, 14, 15, 50, 24, 24, 10, 20, 30,30]
	}, {
		name: 'Close',
		type: 'bar',
		stack: 'Stack',
		data: [12, 14, 15, 50, 24, 24, 10, 20, 30,10]
	}];
	/*----echartTicketUnit----*/
	var optionTicketUnit = {
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
		series: chartTicketUnit,
		color: ["#778899","#8FBC8F","#B22222","#20B2AA","#B0C4DE","#008B8B","#1B64BB","#2F4F4F"]
	};
	var chartTicketUnit = document.getElementById('echartTicketUnit');
	var barChartTicketUnit = echarts.init(chartTicketUnit);
	barChartTicketUnit.setOption(optionTicketUnit);
    
    //pie chart Ticket Unit
    var ctx = document.getElementById( "pieChartTicketStatus" );
    ctx.height = 287;
    var myChart = new Chart( ctx, {
        type: 'pie',
        data: {
            datasets: [ {
                data: [ 15, 35, 40,20,50,30,15,30 ],
                backgroundColor: [
                                "#778899",
                                "#8FBC8F",
                                "#B22222",
                                "#20B2AA",
                                "#B0C4DE",
                                "#008B8B",
                                "#1B64BB",
                                "#2F4F4F"
                                ],
                hoverBackgroundColor: [
                                "#778899",
                                "#8FBC8F",
                                "#B22222",
                                "#20B2AA",
                                "#B0C4DE",
                                "#008B8B",
                                "#1B64BB",
                                "#2F4F4F"
                                ]

                            } ],
            labels: [
                                "New",
                                "Open",
                                "Reject",
                                "On Progress",
                                "Pending",
                                "Reopen",
                                "Close",
                                "Resolve"
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


    /*----echartTicket Channel----*/
	var chartTicketChannel= [{
		name: 'New',
		type: 'bar',
		stack: 'Stack',
		data: [14, 18, 20, 14, 29, 21, 25, 14, 24,90,60,80]
	}, {
		name: 'Open',
		type: 'bar',
		stack: 'Stack',
		data: [12, 14, 15, 50, 24, 24, 10, 20, 30,90,50,40]
	}, {
		name: 'Reject',
		type: 'bar',
		stack: 'Stack',
		data: [12, 14, 15, 50, 24, 24, 10, 20, 30,80,50,60]
	}, {
		name: 'On Progress',
		type: 'bar',
		stack: 'Stack',
		data: [12, 14, 15, 50, 24, 24, 10, 20, 30,60,70,40]
	}, {
		name: 'Pending',
		type: 'bar',
		stack: 'Stack',
		data: [12, 14, 15, 50, 24, 24, 10, 20, 30,40,50,40]
	}, {
		name: 'Reopen',
		type: 'bar',
		stack: 'Stack',
		data: [12, 14, 15, 50, 24, 24, 10, 20, 30,20,30,40]
	}, {
		name: 'Resolve',
		type: 'bar',
		stack: 'Stack',
		data: [12, 14, 15, 50, 24, 24, 10, 20, 30,30,40,50]
	}, {
		name: 'Close',
		type: 'bar',
		stack: 'Stack',
		data: [12, 14, 15, 50, 24, 24, 10, 20, 30,10,30,20]
    }];
    
	/*----echartTicketChannel----*/
	var optionTicketChannel = {
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
			data: ['Live Chat','SMS','Email','Voice','Twitter DM','Twitter','Whatsapp','Line','Telegram','Facebook','Instagram','Messenger'],
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
		series: chartTicketChannel,
		color: ["#778899","#8FBC8F","#B22222","#20B2AA","#B0C4DE","#008B8B","#1B64BB","#2F4F4F"]
	};
	var chartTicketChannel = document.getElementById('echartTicketChannel');
	var barChartTicketChannel = echarts.init(chartTicketChannel);
    barChartTicketChannel.setOption(optionTicketChannel);
    
    //pie chart Ticket Channel
    var ctx = document.getElementById( "pieChartTicketChannel" );
    ctx.height = 287;
    var myChart = new Chart( ctx, {
        type: 'pie',
        data: {
            datasets: [ {
                data: [ 15, 35, 40,20,50,30,15,30,40,50,70,90],
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

                            } ],
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
            legend:{
                position:"bottom",
                labels:{
					boxWidth:10
			   }
            }
        }
    } );
})(jQuery);