var base_url = $('#base_url').val();
var category_kip = [];
var channel_id = '';
var params_time= '';
var v_date='';

$(document).ready(function () {
    params_time = 'day';
	v_date = '2019-12-01';
	channel_id= 2; //default channel email
    loadContent(params_time, v_date);

});

function loadContent(params, index){
    callSummaryInteraction(params, index);
}

function callSummaryInteraction(params, index){
	$("#filter-loader").fadeIn("slow");
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
			callDataSubCategory(params, index);
			$("#filter-loader").fadeOut("slow");
        },
        error: function (r) {
			alert("error");
			$("#filter-loader").fadeOut("slow");
        },
    });
}

function callDataSubCategory(params, index){
	// $("#filter-loader").fadeIn("slow");
	console.log(category_kip);
    $.ajax({
        type: 'post',
        url: base_url + 'api/OperationPerformance/KipController/getDetailKip',
        data: {
        	params: params,
			index: index,
			channel_id: channel_id,
			category: category_kip
        },
        success: function (r) { 
            var response = JSON.parse(r);
			console.log(response);
			drawChartSubCategory(response);
			// $("#filter-loader").fadeOut("slow");
        },
        error: function (r) {
			alert("error");
			// $("#filter-loader").fadeOut("slow");
        },
    });
}

function drawChartSubCategory(response){
	//destroy div row content
	$('#content-sub-category').remove(); // this is my <div> element
	$('#row-sub-category').append('<div id="content-sub-category" class="row"></div>');
	var color = [];
	color[0] = "#A5B0B6";
	color[1] = "#009E8C";
	color[2] = "#00436D";

	var i = 0;
	category_kip.forEach(function(value, index){
		$('#content-sub-category').append(''+
		'<div class="col-lg-4 col-md-12">'+
			'<div class="card">'+
				'<div class="card-header bg-red">'+
					'<h4 class="card-title text-white">'+value+'</h4>'+
				'</div>'+
				'<div class="card-body">'+
					'<div id="echart'+value+'" class="chartsh overflow-hidden"></div>'+
				'</div>'+
			'</div>'+
		'</div>'+
		'');
		var label = [];
		var data = [];
		response.data[i].forEach(function(value, index){
			label.push(value.sub_category);
			data.push(value.total_kip);
		});
		// draw chart
		var chartdataInfo = [{
			name: value,
			type: 'bar',
			stack: 'Stack',
			data: data
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
				data: label,
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
			// color: ["#A5B0B6"]
			color: [color[i]]
		};
		var chartInfo = document.getElementById('echart'+value);
		var barChartInfo = echarts.init(chartInfo);
		barChartInfo.setOption(optionInfo);
		i++;
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
    category_kip = summaryKipName;
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
    let category = []
	var arr_channel = []
	response.data.kip_channel.forEach(function(value){
		arr_channel.push(value.channel_name);
	});
    // draw card yang ada datanya
    response.data.summary.forEach(function (value, index) {
		category.push(value.category);
    });
	var chartdata3 = []
	var i = 0;
    category.forEach(function (value, index) {
		var totalKip = []
		response.data.kip_channel.forEach(function (value) {
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
		var dataKip = {
			name: value,
			type: 'bar',
			stack: "stack",
			data: totalKip
		}
		chartdata3.push(dataKip);
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
