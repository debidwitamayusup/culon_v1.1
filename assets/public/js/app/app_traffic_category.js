var base_url = $('#base_url').val();

$(document).ready(function () {
    
    loadContent();

});

function loadContent(){
    callSummaryPie();
    callInfoTraffic();
    callComplalintTraffic();
    callRequestTraffic();
    callSummaryTrafficChannel();
}

function callSummaryPie(){
    $.ajax({
        type: 'post',
        url: base_url + 'api/OperationPerformance/TrafficCategory/getSummaryPie',
        success: function (r) { 
            var response = JSON.parse(r);
            // console.log(response);
            drawPieChart(response);
        },
        error: function (r) {
            alert("error");
        },
    });
}

function callInfoTraffic(){
	$.ajax({
        type: 'post',
        url: base_url + 'api/OperationPerformance/TrafficCategory/getInfoTraffic',
        success: function (r) { 
            var response = JSON.parse(r);
            // console.log(response);
            drawInfoChart(response);
        },
        error: function (r) {
            alert("error");
        },
    });
}

function callComplalintTraffic(){
	$.ajax({
        type: 'post',
        url: base_url + 'api/OperationPerformance/TrafficCategory/getComplaintTraffic',
        success: function (r) { 
            var response = JSON.parse(r);
            // console.log(response);
            drawComplaintChart(response);
        },
        error: function (r) {
            alert("error");
        },
    });
}

function callRequestTraffic(){
	$.ajax({
        type: 'post',
        url: base_url + 'api/OperationPerformance/TrafficCategory/getRequestTraffic',
        success: function (r) { 
            var response = JSON.parse(r);
            // console.log(response);
            drawRequestChart(response);
        },
        error: function (r) {
            alert("error");
        },
    });
}

function callSummaryTrafficChannel(){
	$.ajax({
        type: 'post',
        url: base_url + 'api/OperationPerformance/TrafficCategory/summaryTrafficChannel',
        success: function (r) { 
            var response = JSON.parse(r);
            // console.log(response);
            drawSummaryTrafficChannelChart(response);
        },
        error: function (r) {
            alert("error");
        },
    });
}

function drawPieChart(response){
	//destroy div piechart
    // $('#pieSummary').remove(); // this is my <canvas> element
    // $('#canvas-pie').append('<canvas id="pieSummary" height="250px" class="donutShadow overflow-hidden"></canvas>');

    // //destroy div card content
    // $('#row-baru').remove(); // this is my <div> element
    // $('#card-baru').append('<div id="row-baru" class="row"></div>');

    let trafficName = []
    let totalTraffic = []

    // draw card yang ada datanya
    // console.log(response.data);
    response.data.trafficName.forEach(function (value, index) {
		trafficName.push(value);
    });
    response.data.totalTraffic.forEach(function (value, index) {
		totalTraffic.push(value);
    });

    //pie chart
    var ctx = document.getElementById( "pieTCategory");
    ctx.height = 358;
    var myChart = new Chart( ctx, {
        type: 'pie',
        data: {
            datasets: [ {
                data: totalTraffic,
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
            labels: trafficName
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
}

function drawInfoChart(response){
	let channelName = []
    let totalTraffic = []

    // draw card yang ada datanya
    // console.log(response.data);
    response.data.channelName.forEach(function (value, index) {
		channelName.push(value);
    });
    response.data.totalTraffic.forEach(function (value, index) {
		totalTraffic.push(value);
    });

     ///chartInformation
    var chartdataInfo = [{
		name: 'Information',
		type: 'bar',
		stack: 'Stack',
		data: totalTraffic,
	}];
    var optionInfo = {
		grid: {
			top: '6',
			right: '12',
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
			data: channelName,
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
		color: ["#A5B0B6"]
	};
	var chartInfo = document.getElementById('echartInfoTraffic');
	var barChartInfo = echarts.init(chartInfo);
    barChartInfo.setOption(optionInfo);

}

function drawComplaintChart(response){
	let channelName = []
    let totalTraffic = []

    // draw card yang ada datanya
    // console.log(response.data);
    response.data.channelName.forEach(function (value, index) {
		channelName.push(value);
    });
    response.data.totalTraffic.forEach(function (value, index) {
		totalTraffic.push(value);
    });

    //chartComplaint
    var chartdataComp = [{
		name: 'Complaint',
		type: 'bar',
		stack: 'Stack',
		data: totalTraffic
	}];
    var optionComp = {
		grid: {
			top: '6',
			right: '12',
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
			data: channelName,
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
		color: ["#009E8C"]
	};
	var chartComp = document.getElementById('echartCompTraffic');
	var barChartComp = echarts.init(chartComp);
    barChartComp.setOption(optionComp);

}

function drawRequestChart(response){
	let channelName = []
    let totalTraffic = []

    // draw card yang ada datanya
    // console.log(response.data);
    response.data.channelName.forEach(function (value, index) {
		channelName.push(value);
    });
    response.data.totalTraffic.forEach(function (value, index) {
		totalTraffic.push(value);
    });

    //chartRequest
    var chartdataReq = [{
		name: 'Request',
		type: 'bar',
		stack: 'Stack',
		data: totalTraffic
	}];
    var optionReq = {
		grid: {
			top: '6',
			right: '12',
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
			data: channelName,
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
		color: ["#00436D"]
	};
	var chartReq = document.getElementById('echartReqTraffic');
	var barChartReq = echarts.init(chartReq);
    barChartReq.setOption(optionReq);

}

function drawSummaryTrafficChannelChart(response){
	let channelName = []
    let totalTraffic = []

    // draw card yang ada datanya
    // console.log(response.data);
    response.data.channelName.forEach(function (value, index) {
		channelName.push(value);
    });
    response.data.totalTraffic.forEach(function (value, index) {
		totalTraffic.push(value);
    });

   /*----Echart6----*/
   var chartdata3 = [{
		name: 'Information',
		type: 'bar',
		stack: 'Stack',
		data: totalTraffic
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
			data: channelName,
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
		color: [ "#A5B0B6","#009E8C","#00436D"]
	};
	var chart6 = document.getElementById('echartTraffic');
	var barChart6 = echarts.init(chart6);
    barChart6.setOption(option6);

}

// (function ($) {
	// "use strict";
	// var chartdata3 = [{
	// 	name: 'Information',
	// 	type: 'bar',
	// 	stack: 'Stack',
	// 	data: [14, 18, 20, 14, 29, 21, 25, 14, 24,14, 24]
	// }, {
	// 	name: 'Request',
	// 	type: 'bar',
	// 	stack: 'Stack',
	// 	data: [12, 14, 15, 50, 24, 24, 10, 20, 30,20, 30]
 //    },{
	// 	name: 'Complaint',
	// 	type: 'bar',
	// 	stack: 'Stack',
	// 	data: [10, 12, 13, 60, 16, 13, 30, 40,40,40,70]
	// }];
	
	// /*----Echart6----*/
	// var option6 = {
	// 	grid: {
	// 		top: '6',
	// 		right: '10',
	// 		bottom: '20',
	// 		left: '60',
	// 	},
	// 	xAxis: {
	// 		type: 'value',
	// 		axisLine: {
	// 			lineStyle: {
	// 				color: '#efefff'
	// 			}
	// 		},
	// 		axisLabel: {
	// 			fontSize: 10,
	// 			color: '#7886a0'
	// 		}
	// 	},
	// 	yAxis: {
	// 		type: 'category',
	// 		data: ['Whatsapp','Instagram','Twitter','Facebook','Messenger','Telegram','Twitter DM','Voice','Live Chat','Line','SMS'],
	// 		splitLine: {
	// 			lineStyle: {
	// 				color: '#efefff'
	// 			}
	// 		},
	// 		axisLine: {
	// 			lineStyle: {
	// 				color: '#efefff'
	// 			}
	// 		},
	// 		axisLabel: {
	// 			fontSize: 10,
	// 			color: '#7886a0'
	// 		}
	// 	},
	// 	series: chartdata3,
	// 	color: [ "#A5B0B6","#009E8C","#00436D"]
	// };
	// var chart6 = document.getElementById('echartTraffic');
	// var barChart6 = echarts.init(chart6);
 //    barChart6.setOption(option6);

   //  //pie chart
   //  var ctx = document.getElementById( "pieTCategory");
   //  ctx.height = 359;
   //  var myChart = new Chart( ctx, {
   //      type: 'pie',
   //      data: {
   //          datasets: [ {
   //              data: [ 85, 48, 59 ],
   //              backgroundColor: [
			// 					"#A5B0B6",
			// 					"#009E8C",
			// 					"#00436D"
   //                              ],
   //              hoverBackgroundColor: [
			// 					"#A5B0B6",
			// 					"#009E8C",
			// 					"#00436D"
   //                              ]

   //                          } ],
   //          labels: [
   //                          "Complaint",
   //                          "Request",
   //                          "Information"
   //                      ]
   //      },
   //      options: {
   //          responsive: true,
			// maintainAspectRatio: false,
			// legend :{
			// 	position : 'bottom',
			// 	labels:{
			// 		boxWidth:10
			//    }
			// }
   //      }
   //  } );

 //    ///chartInformation
 //    var chartdataInfo = [{
	// 	name: 'Information',
	// 	type: 'bar',
	// 	stack: 'Stack',
	// 	data: [14, 18, 20, 14,50,14, 18, 20, 14, 29, 21, 25],
	// }];
 //    var optionInfo = {
	// 	grid: {
	// 		top: '6',
	// 		right: '10',
	// 		bottom: '20',
	// 		left: '60',
	// 	},
	// 	xAxis: {
	// 		type: 'value',
	// 		axisLine: {
	// 			lineStyle: {
	// 				color: '#efefff'
	// 			}
	// 		},
	// 		axisLabel: {
	// 			fontSize: 10,
	// 			color: '#7886a0'
	// 		}
	// 	},
	// 	yAxis: {
	// 		type: 'category',
	// 		data: ['Whatsapp','Instagram','Twitter','Facebook','Messenger','Telegram','Twitter DM','Voice','Live Chat','Line','SMS'],
	// 		splitLine: {
	// 			lineStyle: {
	// 				color: '#efefff'
	// 			}
	// 		},
	// 		axisLine: {
	// 			lineStyle: {
	// 				color: '#efefff'
	// 			}
	// 		},
	// 		axisLabel: {
	// 			fontSize: 10,
	// 			color: '#7886a0'
	// 		}
	// 	},
	// 	series: chartdataInfo,
	// 	color: ["#A5B0B6"]
	// };
	// var chartInfo = document.getElementById('echartInfoTraffic');
	// var barChartInfo = echarts.init(chartInfo);
 //    barChartInfo.setOption(optionInfo);

 //    //chartComplaint
 //    var chartdataComp = [{
	// 	name: 'Complaint',
	// 	type: 'bar',
	// 	stack: 'Stack',
	// 	data: [14, 18, 20, 14,100,14, 18, 20, 14, 29, 21, 25]
	// }];
 //    var optionComp = {
	// 	grid: {
	// 		top: '6',
	// 		right: '10',
	// 		bottom: '20',
	// 		left: '60',
	// 	},
	// 	xAxis: {
	// 		type: 'value',
	// 		axisLine: {
	// 			lineStyle: {
	// 				color: '#efefff'
	// 			}
	// 		},
	// 		axisLabel: {
	// 			fontSize: 10,
	// 			color: '#7886a0'
	// 		}
	// 	},
	// 	yAxis: {
	// 		type: 'category',
	// 		data: ['Whatsapp','Instagram','Twitter','Facebook','Messenger','Telegram','Twitter DM','Voice','Live Chat','Line','SMS'],
	// 		splitLine: {
	// 			lineStyle: {
	// 				color: '#efefff'
	// 			}
	// 		},
	// 		axisLine: {
	// 			lineStyle: {
	// 				color: '#efefff'
	// 			}
	// 		},
	// 		axisLabel: {
	// 			fontSize: 10,
	// 			color: '#7886a0'
	// 		}
	// 	},
	// 	series: chartdataComp,
	// 	color: ["#009E8C"]
	// };
	// var chartComp = document.getElementById('echartCompTraffic');
	// var barChartComp = echarts.init(chartComp);
 //    barChartComp.setOption(optionComp);

 //    //chartRequest
 //    var chartdataReq = [{
	// 	name: 'Request',
	// 	type: 'bar',
	// 	stack: 'Stack',
	// 	data:[14, 18, 20, 14,100,14, 18, 20, 14, 29, 21, 25]
	// }];
 //    var optionReq = {
	// 	grid: {
	// 		top: '6',
	// 		right: '10',
	// 		bottom: '20',
	// 		left: '60',
	// 	},
	// 	xAxis: {
	// 		type: 'value',
	// 		axisLine: {
	// 			lineStyle: {
	// 				color: '#efefff'
	// 			}
	// 		},
	// 		axisLabel: {
	// 			fontSize: 10,
	// 			color: '#7886a0'
	// 		}
	// 	},
	// 	yAxis: {
	// 		type: 'category',
	// 		data: ['Whatsapp','Instagram','Twitter','Facebook','Messenger','Telegram','Twitter DM','Voice','Live Chat','Line','SMS'],
	// 		splitLine: {
	// 			lineStyle: {
	// 				color: '#efefff'
	// 			}
	// 		},
	// 		axisLine: {
	// 			lineStyle: {
	// 				color: '#efefff'
	// 			}
	// 		},
	// 		axisLabel: {
	// 			fontSize: 10,
	// 			color: '#7886a0'
	// 		}
	// 	},
	// 	series: chartdataReq,
	// 	color: ["#00436D"]
	// };
	// var chartReq = document.getElementById('echartReqTraffic');
	// var barChartReq = echarts.init(chartReq);
 //    barChartReq.setOption(optionReq);

// })(jQuery);