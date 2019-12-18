var base_url = $('#base_url').val();

$(document).ready(function () {
    
    loadContent();

});

function loadContent(){
    callNfcrPie();
    callNfcrInfo();
    callNfcrComplaint();
    callNfcrRequest();
    callNfcrSummaryTraffic();
}

function callNfcrPie(){
    $.ajax({
        type: 'post',
        url: base_url + 'api/OperationPerformance/NfcrController/getNfcrPie',
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

function callNfcrInfo(){
    $.ajax({
        type: 'post',
        url: base_url + 'api/OperationPerformance/NfcrController/getNfcrCategory1',
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

function callNfcrComplaint(){
    $.ajax({
        type: 'post',
        url: base_url + 'api/OperationPerformance/NfcrController/getNfcrCategory2',
        success: function (r) { 
            var response = JSON.parse(r);
            console.log(response);
            drawComplaintChart(response);
        },
        error: function (r) {
            alert("error");
        },
    });
}

function callNfcrRequest(){
    $.ajax({
        type: 'post',
        url: base_url + 'api/OperationPerformance/NfcrController/getNfcrCategory3',
        success: function (r) { 
            var response = JSON.parse(r);
            console.log(response);
            drawRequestChart(response);
        },
        error: function (r) {
            alert("error");
        },
    });
}

function callNfcrSummaryTraffic(){
    $.ajax({
        type: 'post',
        url: base_url + 'api/OperationPerformance/NfcrController/getSummaryTrafficNfcr',
        success: function (r) { 
            var response = JSON.parse(r);
            console.log(response);
            drawSummaryTrafficNfcr(response);
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

    
    let totalNfcr = []
    // draw card yang ada datanya
    // console.log(response.data);
    
    
  //   console.log(z)
  	console.log(response.data[0].nfcr);
    //pie chart
    var ctx = document.getElementById( "pieNFCR");
    ctx.height = 312;
    var myChart = new Chart( ctx, {
        type: 'pie',
        data: {
            datasets: [ {
                data: [response.data[0].fcr, response.data[0].nfcr],
                backgroundColor: [
                                    "#31A550",
                                    "#3866A6"
                                ],
                hoverBackgroundColor: [
                                    "#31A550",
                                    "#3866A6"
                                ]

                            } ],
            labels: ['FCR', 'N-FCR']
        },
        options: {
            responsive: true,
			maintainAspectRatio: false,
			legend :{
				position : "bottom"
			}
        }
    } );
}

function drawInfoChart(response){
	//destroy div piechart
    // $('#pieSummary').remove(); // this is my <canvas> element
    // $('#canvas-pie').append('<canvas id="pieSummary" height="250px" class="donutShadow overflow-hidden"></canvas>');

    // //destroy div card content
    // $('#row-baru').remove(); // this is my <div> element
    // $('#card-baru').append('<div id="row-baru" class="row"></div>');

    let channelName = []
    let totalNfcr = []
    let totalFcr = []

    // draw card yang ada datanya
    // console.log(response.data);
    response.data.forEach(function (value, index) {
		channelName.push(value.channel_name);
		totalNfcr.push(value.nfcr);
		totalFcr.push(value.fcr);
    });
    // console.log(totalNfcr);
    "use strict";

    var chartdata3 = [{
		name: 'FCR',
		type: 'bar',
		stack: 'Stack',
		data: totalFcr
	}, {
		name: 'NFCR',
		type: 'bar',
		stack: 'Stack',
		data: totalNfcr
    }];
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
		tooltip: {
			show: true,
			showContent: true,
			alwaysShowContent: false,
			triggerOn: 'mousemove',
			trigger: 'axis',
			axisPointer: {
				label: {
					show: true,
					color: '#7886a0'
				}
			}
		},
		series: chartdata3,
		color: ["#31A550","#3866A6"]
	};

	var chart_info = document.getElementById('echartNFCR-info');
	var barChart6 = echarts.init(chart_info);
    barChart6.setOption(option_info);

    $('#category1').html(response.data[0].category);
}

function drawComplaintChart(response){
	//destroy div piechart
    // $('#pieSummary').remove(); // this is my <canvas> element
    // $('#canvas-pie').append('<canvas id="pieSummary" height="250px" class="donutShadow overflow-hidden"></canvas>');

    // //destroy div card content
    // $('#row-baru').remove(); // this is my <div> element
    // $('#card-baru').append('<div id="row-baru" class="row"></div>');

    let channelName = []
    let totalNfcr = []
    let totalFcr = []

    // draw card yang ada datanya
    // console.log(response.data);
    response.data.forEach(function (value, index) {
		channelName.push(value.channel_name);
		totalNfcr.push(value.nfcr);
		totalFcr.push(value.fcr);
    });
    // console.log(totalNfcr);
    "use strict";

    var chartdata3 = [{
		name: 'FCR',
		type: 'bar',
		stack: 'Stack',
		data: totalFcr
	}, {
		name: 'NFCR',
		type: 'bar',
		stack: 'Stack',
		data: totalNfcr
    }];
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
		tooltip: {
			show: true,
			showContent: true,
			alwaysShowContent: false,
			triggerOn: 'mousemove',
			trigger: 'axis',
			axisPointer: {
				label: {
					show: true,
					color: '#7886a0'
				}
			}
		},
		series: chartdata3,
		color: ["#31A550","#3866A6"]
	};

	var chart_info = document.getElementById('echartNFCR-comp');
	var barChart6 = echarts.init(chart_info);
    barChart6.setOption(option_info);

    $('#category2').html(response.data[0].category);
}

function drawRequestChart(response){
	//destroy div piechart
    // $('#pieSummary').remove(); // this is my <canvas> element
    // $('#canvas-pie').append('<canvas id="pieSummary" height="250px" class="donutShadow overflow-hidden"></canvas>');

    // //destroy div card content
    // $('#row-baru').remove(); // this is my <div> element
    // $('#card-baru').append('<div id="row-baru" class="row"></div>');

   	let channelName = []
    let totalNfcr = []
    let totalFcr = []

    // draw card yang ada datanya
    // console.log(response.data);
    response.data.forEach(function (value, index) {
		channelName.push(value.channel_name);
		totalNfcr.push(value.nfcr);
		totalFcr.push(value.fcr);
    });
    // console.log(totalNfcr);
    "use strict";

    var chartdata3 = [{
		name: 'FCR',
		type: 'bar',
		stack: 'Stack',
		data: totalFcr
	}, {
		name: 'NFCR',
		type: 'bar',
		stack: 'Stack',
		data: totalNfcr
    }];
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
		tooltip: {
			show: true,
			showContent: true,
			alwaysShowContent: false,
			triggerOn: 'mousemove',
			trigger: 'axis',
			axisPointer: {
				label: {
					show: true,
					color: '#7886a0'
				}
			}
		},
		series: chartdata3,
		color: ["#31A550","#3866A6"]
	};

	var chart_info = document.getElementById('echartNFCR-req');
	var barChart6 = echarts.init(chart_info);
    barChart6.setOption(option_info);

    $('#category3').html(response.data[0].category);
}

function drawSummaryTrafficNfcr(response){
	//destroy div piechart
    // $('#pieSummary').remove(); // this is my <canvas> element
    // $('#canvas-pie').append('<canvas id="pieSummary" height="250px" class="donutShadow overflow-hidden"></canvas>');

    // //destroy div card content
    // $('#row-baru').remove(); // this is my <div> element
    // $('#card-baru').append('<div id="row-baru" class="row"></div>');

    let channelName = []
    let totalNfcr = []
    let totalFcr = []

    // draw card yang ada datanya
    // console.log(response.data);
    response.data.forEach(function (value, index) {
		channelName.push(value.channel_name);
		totalNfcr.push(value.nfcr);
		totalFcr.push(value.fcr);
    });
    // console.log(totalNfcr);
    "use strict";

    var chartdata3 = [{
		name: 'FCR',
		type: 'bar',
		stack: 'Stack',
		data: totalFcr
	}, {
		name: 'NFCR',
		type: 'bar',
		stack: 'Stack',
		data: totalNfcr
    }];
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
		tooltip: {
			show: true,
			showContent: true,
			alwaysShowContent: false,
			triggerOn: 'mousemove',
			trigger: 'axis',
			axisPointer: {
				label: {
					show: true,
					color: '#7886a0'
				}
			}
		},
		series: chartdata3,
		color: ["#31A550","#3866A6"]
	};

	var chart_summary = document.getElementById('echartNFCR-summary');
	var barChart_summary = echarts.init(chart_summary);
	barChart_summary.height=800;
	barChart_summary.setOption(option_summary);	
}

function drawTableData(response){
	$("#mytbody_avg_traffic").empty();
	$("#mythead_avg_traffic").empty();
    if(response.data.length != 0){
    	$('#table_avg_traffic').find('thead').append('<tr>'+
            '<td>No.</td>'+
            '<td>Channel</td>'+
            '<td>'+response.data.summary[0].category+'</td>'+
            '<td>'+response.data.summary[1].category+'</td>'+
            '<td>'+response.data.summary[2].category+'</td>'+
            '</tr>');

    	var i = response.data.traffic_channel.length+1;
        response.data.traffic_channel.forEach(function (value, index) {
            $('#table_avg_traffic').find('tbody').append('<tr>'+
            '<td class="text-sm font-weight-600 text-center">'+(i-1)+'</td>'+
            '<td class="text-sm font-weight-600 text-left">'+value.channel_name+'</td>'+
            '<td class="text-sm font-weight-600 text-center">'+value.total_1+'</td>'+
            '<td class="text-sm font-weight-600 text-center">'+value.total_2+'</td>'+
            '<td class="text-sm font-weight-600 text-center">'+value.total_3+'</td>'+
            '</tr>');
            i--;
        });
        sortTable();
    }else{
        $('#table_avg_traffic').find('tbody').append('<tr>'+
            '<td colspan=6> No Data </td>'+
            '</tr>');
    }
    $("#filter-loader").fadeOut("slow");
}

// (function ($) {
 //    "use strict";

 //    var chartdata3 = [{
	// 	name: 'FCR',
	// 	type: 'bar',
	// 	stack: 'Stack',
	// 	data: [14, 18, 20, 14, 29, 21, 25, 14, 24,14, 24]
	// }, {
	// 	name: 'NFCR',
	// 	type: 'bar',
	// 	stack: 'Stack',
	// 	data: [12, 14, 15, 50, 24, 24, 10, 20, 30,20, 30]
 //    }];
    
   //  //pie chart
   //  var ctx = document.getElementById( "pieNFCR");
   //  ctx.height = 312;
   //  var myChart = new Chart( ctx, {
   //      type: 'pie',
   //      data: {
   //          datasets: [ {
   //              data: [ 75, 25 ],
   //              backgroundColor: [
   //                                  "#31A550",
   //                                  "#3866A6"
   //                              ],
   //              hoverBackgroundColor: [
   //                                  "#31A550",
   //                                  "#3866A6"
   //                              ]

   //                          } ],
   //          labels: [
   //                          "FCR",
   //                          "N-FCR"
   //                      ]
   //      },
   //      options: {
   //          responsive: true,
			// maintainAspectRatio: false,
			// legend :{
			// 	position : "bottom"
			// }
   //      }
   //  } );

/*----BarChart Information----*/
	// var option_info = {
	// 	grid: {
	// 		top: '6',
	// 		right: '5',
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
	// 	color: ["#31A550","#3866A6"]
	// };

	// var chart_info = document.getElementById('echartNFCR-info');
	// var barChart6 = echarts.init(chart_info);
 //    barChart6.setOption(option_info);

// /*----BarChart Complaint----*/
// 	var option_comp = {
// 		grid: {
// 			top: '6',
// 			right: '5',
// 			bottom: '20',
// 			left: '60',
// 		},
// 		xAxis: {
// 			type: 'value',
// 			axisLine: {
// 				lineStyle: {
// 					color: '#efefff'
// 				}
// 			},
// 			axisLabel: {
// 				fontSize: 10,
// 				color: '#7886a0'
// 			}
// 		},
// 		yAxis: {
// 			type: 'category',
// 			data: ['Whatsapp','Instagram','Twitter','Facebook','Messenger','Telegram','Twitter DM','Voice','Live Chat','Line','SMS'],
// 			splitLine: {
// 				lineStyle: {
// 					color: '#efefff'
// 				}
// 			},
// 			axisLine: {
// 				lineStyle: {
// 					color: '#efefff'
// 				}
// 			},
// 			axisLabel: {
// 				fontSize: 10,
// 				color: '#7886a0'
// 			}
// 		},
// 		series: chartdata3,
// 		color: ["#31A550","#3866A6"]
// 	};

// 	var chart_comp = document.getElementById('echartNFCR-comp');
// 	var barChart_comp = echarts.init(chart_comp);
// 	barChart_comp.setOption(option_comp);
	
/*----BarChart Request----*/
	// var option_req = {
	// 	grid: {
	// 		top: '6',
	// 		right: '5',
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
	// 	color: ["#31A550","#3866A6"]
	// };

	// var chart_req = document.getElementById('echartNFCR-req');
	// var barChart_req = echarts.init(chart_req);
	// barChart_req.setOption(option_req);	

/*----BarChart Summary----*/
	// var option_summary = {
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
	// 	color: ["#31A550","#3866A6"]
	// };

	// var chart_summary = document.getElementById('echartNFCR-summary');
	// var barChart_summary = echarts.init(chart_summary);
	// barChart_summary.height=800;
	// barChart_summary.setOption(option_summary);	
	
// })(jQuery);