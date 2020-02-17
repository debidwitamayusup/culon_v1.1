(function ($) {
    "use strict";
    
     /*----echartTicket Status----*/
	var chartTicketUnit= [{
		name: 'New',
		type: 'bar',
		stack: 'Stack',
		data: [12, 12, 12, 12, 12, 12, 12, 12, 12,12]
	}, {
		name: 'Open',
		type: 'bar',
		stack: 'Stack',
		data: [25, 25, 25, 25, 25, 25, 25, 25, 25,25]
	}, {
		name: 'Reject',
		type: 'bar',
		stack: 'Stack',
		data: [40, 40, 40, 40, 40, 40, 40, 40,40,40]
	}, {
		name: 'On Progress',
		type: 'bar',
		stack: 'Stack',
		data: [60, 60, 60, 60, 60, 60, 60, 60, 60,60]
	}, {
		name: 'Pending',
		type: 'bar',
		stack: 'Stack',
		data: [80, 80, 80, 80, 80, 80, 80, 80, 80,80]
	}, {
		name: 'Reopen',
		type: 'bar',
		stack: 'Stack',
		data: [90, 90, 90, 90, 90, 90, 90, 90, 90,90]
	}, {
		name: 'Resolve',
		type: 'bar',
		stack: 'Stack',
		data: [100, 100, 100, 100, 100, 100, 100, 100, 100,100]
	}, 
	// {
	// 	name: 'Close',
	// 	type: 'bar',
	// 	stack: 'Stack',
	// 	data: [12, 14, 15, 50, 24, 24, 10, 20, 30,10]
	// }
	];
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
		color :["#FEC88C","#FFA07A","#87CEFA","#ADD8E6","#B0C4DE","#778899","#BDB76B"]
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
									"#FEC88C",
									"#FFA07A",
									"#87CEFA",
									"#ADD8E6",
									"#B0C4DE",
									"#778899",
									// "#8FBC8F",
									"#BDB76B"
								],
                hoverBackgroundColor: [
									"#FEC88C",
									"#FFA07A",
									"#87CEFA",
									"#ADD8E6",
									"#B0C4DE",
									"#778899",
									// "#8FBC8F",
									"#BDB76B"
									]
			} ],
            labels: [
						"New",
						"Open",
						"Reject",
						"On Progress",
						"Pending",
						"Reopen",
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
		data: [12, 12, 12, 12, 12, 12, 12, 12, 12,12,12,12]
	}, {
		name: 'Open',
		type: 'bar',
		stack: 'Stack',
		data: [25, 25, 25, 25, 25, 25, 25, 25, 25,25,25,25]
	}, {
		name: 'Reject',
		type: 'bar',
		stack: 'Stack',
		data: [40, 40, 40, 40, 40, 40, 40, 40,40,40,40,40]
	}, {
		name: 'On Progress',
		type: 'bar',
		stack: 'Stack',
		data: [60, 60, 60, 60, 60, 60, 60, 60, 60,60,60,60]
	}, {
		name: 'Pending',
		type: 'bar',
		stack: 'Stack',
		data: [80, 80, 80, 80, 80, 80, 80, 80, 80,80,80,80]
	}, {
		name: 'Reopen',
		type: 'bar',
		stack: 'Stack',
		data: [90, 90, 90, 90, 90, 90, 90, 90, 90,90,90,90]
	}, {
		name: 'Resolve',
		type: 'bar',
		stack: 'Stack',
		data: [100, 100, 100, 100, 100, 100, 100, 100, 100,100,100,100]
	},
	//  {
	// 	name: 'Close',
	// 	type: 'bar',
	// 	stack: 'Stack',
	// 	data: [14, 18, 20, 14, 29, 21, 25, 14, 24,90,60,80]
	// }
	];
    
	/*----echartTicketChannel----*/
	var optionTicketChannel = {
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
		color: ["#FEC88C","#FFA07A","#87CEFA","#ADD8E6","#B0C4DE","#778899","#BDB76B"]
	};
	var chartTicketChannel = document.getElementById('echartTicketChannel');
	var barChartTicketChannel = echarts.init(chartTicketChannel);
    barChartTicketChannel.setOption(optionTicketChannel);
    
    //pie chart Ticket Channel
    var ctx = document.getElementById( "pieChartTicketChannel" );
    ctx.height = 250;
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
					display : false
			},
			pieceLabel:{
				render : 'legend',
				fontColor : '#000',
				position : 'outside',
				segment : true
			},
			legendCallback : function (chart, index){
				var allData = chart.data.datasets[0].data;
				// console.log(chart)
				var legendHtml = [];
				legendHtml.push('<ul><div class="row">');
				allData.forEach(function(data,index){
					var label = chart.data.labels[index];
					var dataLabel = allData[index];
					var background = chart.data.datasets[0].backgroundColor[index]
					var total = 0;
					for (var i in allData){
						total += parseInt(allData[i]);
					}

					// console.log(total)
					var percentage = Math.round((dataLabel / total) * 100);
					legendHtml.push('<li class="col-md-4 col-lg-4 col-sm-6 col-xl-4">');
					legendHtml.push('<span class="chart-legend"><div style="background-color :'+background+'" class="box-legend"></div>'+label+':'+percentage+ '%</span>');
				})
				legendHtml.push('</ul></div>');
				return legendHtml.join("");
			},
        }
	});
	var myLegendContainer = document.getElementById("legend");
	myLegendContainer.innerHTML = myChart.generateLegend();

})(jQuery);