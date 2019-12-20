var base_url = $('#base_url').val();
var params_time = '';

$(document).ready(function () {
    params_time = 'day';
    v_date = '2019-12-01';
    $("#btn-month").prop("class","btn btn-light btn-sm");
    $("#btn-year").prop("class","btn btn-light btn-sm");
    $("#btn-day").prop("class","btn btn-red btn-sm");
    loadContent(params_time, v_date);

});

function loadContent(params, index){
    callSummaryPie(params, index);
    callInfoTraffic(params, index);
    callComplalintTraffic(params, index);
    callRequestTraffic(params, index);
    // callSummaryTrafficChannel();
}

function callSummaryPie(params, index){
	$("#filter-loader").fadeIn("slow");
    $.ajax({
        type: 'post',
        url: base_url + 'api/OperationPerformance/TrafficCategory/getSummaryPie',
        data: {
        	params: params,
        	index: index
        },
        success: function (r) { 
            var response = JSON.parse(r);
            // console.log(response);
            drawPieChart(response);
            drawSummaryTrafficChannelChart(response);
            drawTableData(response);
            // $("#filter-loader").fadeOut("slow");
        },
        error: function (r) {
            alert("error");
            $("#filter-loader").fadeOut("slow");
        },
    });
}

function callInfoTraffic(params, index){
	$.ajax({
        type: 'post',
        url: base_url + 'api/OperationPerformance/TrafficCategory/getCategory1',
        data: {
        	params: params,
        	index: index
        },
        success: function (r) { 
            var response = JSON.parse(r);
            // console.log(response);
            drawInfoChart(response);
        },
        error: function (r) {
            alert("error");
            $("#filter-loader").fadeOut("slow");
        },
    });
}

function callComplalintTraffic(params, index){
	$.ajax({
        type: 'post',
        url: base_url + 'api/OperationPerformance/TrafficCategory/getCategory2',
        data: {
        	params: params,
        	index: index
        },
        success: function (r) { 
            var response = JSON.parse(r);
            // console.log(response);
            drawComplaintChart(response);
        },
        error: function (r) {
            alert("error");
            $("#filter-loader").fadeOut("slow");
        },
    });
}

function callRequestTraffic(params, index){
	$.ajax({
        type: 'post',
        url: base_url + 'api/OperationPerformance/TrafficCategory/getCategory3',
        data: {
        	params: params,
        	index: index
        },
        success: function (r) { 
            var response = JSON.parse(r);
            // console.log(response);
            drawRequestChart(response);
        },
        error: function (r) {
            alert("error");
            $("#filter-loader").fadeOut("slow");
        },
    });
}

// function callSummaryTrafficChannel(){
// 	$.ajax({
//         type: 'post',
//         url: base_url + 'api/OperationPerformance/TrafficCategory/summaryTrafficChannel',

//         success: function (r) { 
//             var response = JSON.parse(r);
//             // console.log(response);
//             drawSummaryTrafficChannelChart(response);
//         },
//         error: function (r) {
//             alert("error");
//         },
//     });
// }

// function callTableData(params, index){
// 	$.ajax({
//         type: 'post',
//         url: base_url + 'api/OperationPerformance/TrafficCategory/getTableData',
//         data: {
//         	params: params,
//         	index: index
//         },
//         success: function (r) { 
//             var response = JSON.parse(r);
//             // console.log(response);
//             drawTableData(response);
//         },
//         error: function (r) {
//             alert("error");
//         },
//     });
// }

function drawPieChart(response){
	//destroy div piechart
    $('#pieTCategory').remove(); // this is my <canvas> element
    $('#canvas-pie').append('<canvas id="pieTCategory" class="donutShadow overflow-hidden"></canvas>');

    // //destroy div card content
    // $('#row-baru').remove(); // this is my <div> element
    // $('#card-baru').append('<div id="row-baru" class="row"></div>');

    let trafficName = []
    let totalTraffic = []

    // draw card yang ada datanya
    // console.log(response.data);
    response.data.summary.forEach(function (value, index) {
		trafficName.push(value.category);
		totalTraffic.push(value.total_kip);

    });
    
    //pie chart
    var ctx = document.getElementById( "pieTCategory");
    ctx.height = 429;
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

    //set header for echart
    $('#category1').html(trafficName[0]);
    $('#category2').html(trafficName[1]);
    $('#category3').html(trafficName[2]);
    // console.log(trafficName[0]);
}

function drawInfoChart(response){
	//destroy div 
    $('#echartInfoTraffic').remove(); // this is my <canvas> element
    $('#canvas-cat1').append('<div id="echartInfoTraffic" class="chartsh-horizontal overflow-hidden">');

	let channelName = []
    let totalTraffic = []

    // draw card yang ada datanya
    // console.log(response.data);
    response.data.forEach(function (value, index) {
		channelName.push(value.channel_name);
		totalTraffic.push(value.total);
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
				color: '#7886a0',
				formatter: function (value, index) {
					if (/\s/.test(value)) {
						var teks = '';
						for(var i=0;i<value.length;i++){
							if(value[i] == " "){
								teks = teks + '\n';
							}else{
								teks = teks + value[i];
							}
						}
						return teks;
					}else{
						return value;
					} 
				}
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
	//destroy div chart
	$('#echartCompTraffic').remove(); // this is my <canvas> element
    $('#canvas-cat2').append('<div id="echartCompTraffic" class="chartsh-horizontal overflow-hidden">');

	let channelName = []
    let totalTraffic = []

    // draw card yang ada datanya
    // console.log(response.data);
    response.data.forEach(function (value, index) {
		channelName.push(value.channel_name);
		totalTraffic.push(value.total);
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
			right: '10',
			bottom: '20',
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
				color: '#7886a0',
				formatter: function (value, index) {
					if (/\s/.test(value)) {
						var teks = '';
						for(var i=0;i<value.length;i++){
							if(value[i] == " "){
								teks = teks + '\n';
							}else{
								teks = teks + value[i];
							}
						}
						return teks;
					}else{
						return value;
					} 
				}
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
	//destroy div chart
	$('#echartReqTraffic').remove(); // this is my <canvas> element
    $('#canvas-cat3').append('<div id="echartReqTraffic" class="chartsh-horizontal overflow-hidden">');

	let channelName = []
    let totalTraffic = []

    // draw card yang ada datanya
    // console.log(response.data);
    response.data.forEach(function (value, index) {
		channelName.push(value.channel_name);
		totalTraffic.push(value.total);
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
			right: '10',
			bottom: '20',
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
				color: '#7886a0',
				formatter: function (value, index) {
					if (/\s/.test(value)) {
						var teks = '';
						for(var i=0;i<value.length;i++){
							if(value[i] == " "){
								teks = teks + '\n';
							}else{
								teks = teks + value[i];
							}
						}
						return teks;
					}else{
						return value;
					} 
				}
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
	"use strict"
	let category = []
    let arr_channel = []
    // console.log(response.data.traffic_channel);
    response.data.traffic_channel.forEach(function(value){
		arr_channel.push(value.channel_name);
	});
    // draw card yang ada datanya
    response.data.summary.forEach(function (value, index) {
		category.push(value.category);
    });

   /*----Echart6----*/
 //   var chartdata3 = [{
	// 	name: 'Information',
	// 	type: 'bar',
	// 	stack: 'Stack',
 //       data: [23, 12, 14, 15, 50, 24, 24, 10, 20, 30, 20, 30]
	// }, {
	// 	name: 'Request',
	// 	type: 'bar',
	// 	stack: 'Stack',
	// 	data: [23,12, 14, 15, 50, 24, 24, 10, 20, 30,20, 30]
 //    },{
	// 	name: 'Complaint',
	// 	type: 'bar',
	// 	stack: 'Stack',
	// 	data: [23,10, 12, 13, 60, 16, 13, 30, 40,40,40,70]
	// }];
	var chartdata3 = []
	var i = 0;
    category.forEach(function (value, index) {
		var totalKip = []
		response.data.traffic_channel.forEach(function (value) {
			var total = "";
			if(i == 0){
				total = (value.total_1)?value.total_1:0;
			}else if(i == 1){
				total = (value.total_2)?value.total_2:0;
			}else if(i == 2){
				total = (value.total_3)?value.total_3:0;
			}
			totalKip.push(total)
		});
		var dataTraffic = {
			name: value,
			type: 'bar',
			stack: "stack",
			data: totalKip
		}
		chartdata3.push(dataTraffic);
		i++;
    });
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
			data: arr_channel,
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
				color: '#7886a0',
				formatter: function (value, index) {
					if (/\s/.test(value)) {
						var teks = '';
						for(var i=0;i<value.length;i++){
							if(value[i] == " "){
								teks = teks + '\n';
							}else{
								teks = teks + value[i];
							}
						}
						return teks;
					}else{
						return value;
					} 
				}
			}
		},
		series: chartdata3,
		color: [ "#A5B0B6","#009E8C","#00436D"]
	};
	var chart6 = document.getElementById('echartTraffic');
	var barChart6 = echarts.init(chart6);
    barChart6.setOption(option6);

}

function drawTableData(response){
	$("#mytbody_avg_traffic").empty();
	$("#mythead_avg_traffic").empty();
    if(response.data.length != 0){
    	$('#table_avg_traffic').find('thead').append('<tr>'+
            '<td>ID</td>'+
            '<td>CHANNEL</td>'+
            '<td>'+response.data.summary[0].category+'</td>'+
            '<td>'+response.data.summary[1].category+'</td>'+
            '<td>'+response.data.summary[2].category+'</td>'+
            '</tr>');
        response.data.traffic_channel.forEach(function (value, index) {
            $('#table_avg_traffic').find('tbody').append('<tr>'+
            '<td class="text-sm font-weight-600 text-center">'+(index+1)+'</td>'+
            '<td class="text-sm font-weight-600">'+value.channel_name+'</td>'+
            '<td class="text-sm font-weight-600 text-center">'+value.total_1+'</td>'+
            '<td class="text-sm font-weight-600 text-center">'+value.total_2+'</td>'+
            '<td class="text-sm font-weight-600 text-center">'+value.total_3+'</td>'+
            '</tr>');
        });
    }else{
        $('#table_avg_traffic').find('tbody').append('<tr>'+
            '<td colspan=6> No Data </td>'+
            '</tr>');
    }
    $("#filter-loader").fadeOut("slow");
}
//jquery
(function ($) {

    // btn day
    $('#btn-day').click(function(){
        params_time = 'day';
        // console.log(params_time);

        loadContent(params_time , '2019-12-01');
        $("#btn-month").prop("class","btn btn-light btn-sm");
        $("#btn-year").prop("class","btn btn-light btn-sm");
        $(this).prop("class","btn btn-red btn-sm");
    });

    // btn month
    $('#btn-month').click(function(){
        params_time = 'month';
        // console.log(params_time);
        // thisMonths = getThisMonth();
        // console.log(thisMonths);
        // loadContent(params_time , thisMonths);
        loadContent(params_time , '12');
        $("#btn-day").prop("class","btn btn-light btn-sm");
        $("#btn-year").prop("class","btn btn-light btn-sm");
        $(this).prop("class","btn btn-red btn-sm");
    });

    // btn year
    $('#btn-year').click(function(){
        params_time = 'year';
        // console.log(params_time);
        // thisYears = getThisYear();
        loadContent(params_time , '2019');
        $("#btn-day").prop("class","btn btn-light btn-sm");
        $("#btn-month").prop("class","btn btn-light btn-sm");
        $(this).prop("class","btn btn-red btn-sm");
    });
   
})(jQuery);
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