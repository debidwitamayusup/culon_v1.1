var base_url = $('#base_url').val();

$(document).ready(function () {
    params_time = 'day';
    v_date = '2019-12-01';
    loadContent(params_time, v_date);

});

function loadContent(params, index){
    callSummaryInteraction(params, index);
    // callKipPerChannel();
    callChartInfo();
    callChartComp();
    callChartReq();
}

function callSummaryInteraction(params, index){
    $.ajax({
        type: 'post',
        url: base_url + 'api/OperationPerformance/KipController/getSummaryKip',
        data: {
        	params: params,
        	index: index
        },
        success: function (r) { 
            var response = JSON.parse(r);
            // console.log(response);
            drawPieChart(response);
            drawKipPerChannelChart(response);
        },
        error: function (r) {
            alert("error");
        },
    });
}

// function callKipPerChannel(){
//     $.ajax({
//         type: 'post',
//         url: base_url + 'api/OperationPerformance/KipController/getKipPerChannel',
//         success: function (r) { 
//             var response = JSON.parse(r);
//             // console.log(response);
//             drawKipPerChannelChart(response);
//         },
//         error: function (r) {
//             alert("error");
//         },
//     });
// }

function callChartInfo(){
    $.ajax({
        type: 'post',
        url: base_url + 'api/OperationPerformance/KipController/getKipInfo',
        success: function (r) { 
            var response = JSON.parse(r);
            // console.log(response);
            drawChartInfo(response);
        },
        error: function (r) {
            alert("error");
        },
    });
}

function callChartComp(){
    $.ajax({
        type: 'post',
        url: base_url + 'api/OperationPerformance/KipController/getKipComp',
        success: function (r) { 
            var response = JSON.parse(r);
            // console.log(response);
            drawChartComp(response);
        },
        error: function (r) {
            alert("error");
        },
    });
}

function callChartReq(){
    $.ajax({
        type: 'post',
        url: base_url + 'api/OperationPerformance/KipController/getKipReq',
        success: function (r) { 
            var response = JSON.parse(r);
            // console.log(response);
            drawChartReq(response);
        },
        error: function (r) {
            alert("error");
        },
    });
}

function drawPieChart(response){
	//destroy div piechart
    $('#pieKIP').remove(); // this is my <canvas> element
    $('#canvas-pie').append('<canvas id="pieKIP" class="donutShadow overflow-hidden"></canvas>');

    let summaryKipName = []
    let summaryKip = []

    // draw card yang ada datanya
    // console.log(response.data);
    response.data.summary.forEach(function (value, index) {
		summaryKipName.push(value.category);
		summaryKip.push(value.total_kip);

    });
    
    //pie chart
    var ctx = document.getElementById( "pieKIP");
    ctx.height = 300;
    var myChart = new Chart( ctx, {
        type: 'pie',
        data: {
            datasets: [ {
                data: summaryKip,
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
            labels: summaryKipName
        },
        options: {
            responsive: true,
			maintainAspectRatio: false,
			legend :{
				position : "bottom",
				labels:{
					boxWidth:10
			   }
			}
        }
    } );
}

function drawKipPerChannelChart(response){
	 "use strict";
	let summaryKipName = []
    let summaryKip = []
    let category = []
	var arr_channel = []
	response.data.kip_channel.forEach(function(value){
		arr_channel.push(value.channel_name);
	});
    // draw card yang ada datanya
    // console.log(response.data);
    response.data.summary.forEach(function (value, index) {
		category.push(value.category);
    });
	var chartdata3 = []
	var i = 0;
    category.forEach(function (value, index) {
		var totalKip = []
		response.data.kip_channel.forEach(function (value) {
			// var baba = (value.)?value:0;
			var baba = "";
			if(i == 0){
				baba = (value.total_1)?value.total_1:0;
			}else if(i == 1){
				baba = (value.total_2)?value.total_2:0;
			}else if(i == 2){
				baba = (value.total_3)?value.total_3:0;
			}
			
			totalKip.push(baba)
			// console.log(baba);
		});
		var dataKip = {
			name: value,
			type: 'bar',
			stack: "stack",
			data: totalKip
		}
		chartdata3.push(dataKip);
		i++;
    });
    console.log(chartdata3);

 //    var chartdata3 = [{
	// 	name: 'Information',
	// 	type: 'bar',
	// 	stack: 'Stack',
	// 	data: [14, 18, 20, 14, 29, 21, 25, 14, 24,14, 24]
	// },
	//  {
	// 	name: 'Request',
	// 	type: 'bar',
	// 	stack: 'Stack',
	// 	data: [12, 14, 15, 50, 24, 24, 10, 20, 30,20, 30]
 //    },{
	// 	name: 'Complaint',
	// 	type: 'bar',
	// 	stack: 'Stack',
	// 	data: [10, 12, 13, 60, 16, 13, 30, 40,40,40,70]
 //    }];
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
			// data: ['Whatsapp','Instagram','Twitter','Facebook','Messenger','Telegram','Twitter DM','Voice','Live Chat','Line','SMS'],
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
				color: '#7886a0'
			}
		},
		series: chartdata3,
		color: ["#A5B0B6","#009E8C","#00436D"]
	};
	var chart6 = document.getElementById('echartKIP');
	var barChart6 = echarts.init(chart6);
    barChart6.setOption(option6);

}

function drawChartInfo(response){

	let summaryKipName = [];
	let summaryKip = [];
	///chartInformation
    // console.log(response.data);
    response.data.summaryKip.forEach(function (value, index) {
		summaryKip.push(value);
    });
    response.data.summaryKipName.forEach(function (value, index) {
		summaryKipName.push(value);
    });
    var chartdataInfo = [{
		name: 'Information',
		type: 'bar',
		stack: 'Stack',
		data: summaryKip
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
			data: summaryKipName,
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
		show : 'data',
		color: ["#A5B0B6"]
	};
	var chartInfo = document.getElementById('echartInfo');
	var barChartInfo = echarts.init(chartInfo);
    barChartInfo.setOption(optionInfo);
}

function drawChartComp(response){
	let summaryKipName = []
    let summaryKip = []

     // draw card yang ada datanya
    // console.log(response.data);
    response.data.summaryKip.forEach(function (value, index) {
		summaryKip.push(value);
    });
    response.data.summaryKipName.forEach(function (value, index) {
		summaryKipName.push(value);
    });

	var chartdataComp = [{
		name: 'Complaint',
		type: 'bar',
		stack: 'Stack',
		data: summaryKip
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
			data: summaryKipName,
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
	var chartComp = document.getElementById('echartComp');
	var barChartComp = echarts.init(chartComp);
    barChartComp.setOption(optionComp);
}

function drawChartReq(response){

	let summaryKipName = []
    let summaryKip = []

     // draw card yang ada datanya
    // console.log(response.data);
    response.data.summaryKip.forEach(function (value, index) {
		summaryKip.push(value);
    });
    response.data.summaryKipName.forEach(function (value, index) {
		summaryKipName.push(value);
    });

	var chartdataReq = [{
		name: 'Request',
		type: 'bar',
		stack: 'Stack',
		data: summaryKip
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
			data: summaryKipName,
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
	var chartReq = document.getElementById('echartReq');
	var barChartReq = echarts.init(chartReq);
    barChartReq.setOption(optionReq);

}
// (function ($) {
//     "use strict";

//     var chartdata3 = [{
// 		name: 'Information',
// 		type: 'bar',
// 		stack: 'Stack',
// 		data: [14, 18, 20, 14, 29, 21, 25, 14, 24,14, 24]
// 	}, {
// 		name: 'Request',
// 		type: 'bar',
// 		stack: 'Stack',
// 		data: [12, 14, 15, 50, 24, 24, 10, 20, 30,20, 30]
//     },{
// 		name: 'Complaint',
// 		type: 'bar',
// 		stack: 'Stack',
// 		data: [10, 12, 13, 60, 16, 13, 30, 40,40,40,70]
//     }];
    

//     /*----Echart6----*/
// 	var option6 = {
// 		grid: {
// 			top: '6',
// 			right: '10',
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
// 		color: ["#B22222","#316cbe","#ff9933"]
// 	};
// 	var chart6 = document.getElementById('echartKIP');
// 	var barChart6 = echarts.init(chart6);
//     barChart6.setOption(option6);

//     ///chartInformation
//     var chartdataInfo = [{
// 		name: 'Information',
// 		type: 'bar',
// 		stack: 'Stack',
// 		data: [14, 18, 20, 14,100]
// 	}];
//     var optionInfo = {
// 		grid: {
// 			top: '6',
// 			right: '10',
// 			bottom: '20',
// 			left: '96',
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
// 			data: ['Informasi Produk','Informasi','Informasi Promo','Informasi Cabut','Informasi Member'],
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
// 		series: chartdataInfo,
// 		color: ["#ff9933"]
// 	};
// 	var chartInfo = document.getElementById('echartInfo');
// 	var barChartInfo = echarts.init(chartInfo);
//     barChartInfo.setOption(optionInfo);

//     //chartComplaint
//     var chartdataComp = [{
// 		name: 'Complaint',
// 		type: 'bar',
// 		stack: 'Stack',
// 		data: [14, 18, 20, 14,100]
// 	}];
//     var optionComp = {
// 		grid: {
// 			top: '6',
// 			right: '10',
// 			bottom: '20',
// 			left: '98',
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
// 			data: ['Internet Lambat','Lampu Tidak Nyala','Internet Putus','Telepon Putus','Tidak Bisa Internet'],
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
// 		series: chartdataComp,
// 		color: ["#B22222"]
// 	};
// 	var chartComp = document.getElementById('echartComp');
// 	var barChartComp = echarts.init(chartComp);
//     barChartComp.setOption(optionComp);

//     //chartRequest
//     var chartdataReq = [{
// 		name: 'Request',
// 		type: 'bar',
// 		stack: 'Stack',
// 		data: [14, 18, 20, 14,100]
// 	}];
//     var optionReq = {
// 		grid: {
// 			top: '6',
// 			right: '10',
// 			bottom: '20',
// 			left: '80',
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
// 			data: ['Data Member','Reset Account','Pasang Produk','Cabut Produk','Maaf'],
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
// 		series: chartdataReq,
// 		color: ["#316cbe"]
// 	};
// 	var chartReq = document.getElementById('echartReq');
// 	var barChartReq = echarts.init(chartReq);
//     barChartReq.setOption(optionReq);

// })(jQuery);