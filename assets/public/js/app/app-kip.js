var base_url = $('#base_url').val();
var category_kip = [];
var channel_id = '';
var params_time= '';
var v_date='';

$(document).ready(function () {
    params_time = 'day';
	v_date = '2019-12-01';
	channel_id= 2; //default channel email
	$('#btn-day').prop("class","btn btn-danger btn-sm");
    loadContent(params_time, v_date);

});

function loadContent(params, index){
	loadAllChannel();
    callSummaryInteraction(params, index);
}
function loadAllChannel(){
	$.ajax({
        type: 'post',
        url: base_url + 'api/OperationPerformance/KipController/getAllChannel',
        data: {

        },
        success: function (r) { 
            var response = JSON.parse(r);
			// console.log(response);
			response.data.forEach(function(value, index){
				var o = new Option(value.channel_name, value.channel_id);
				/// jquerify the DOM object 'o' so we can use the html method
				$(o).html(value.channel_name);
				$("#channel_name").append(o);
			});
        },
        error: function (r) {
			alert("error");
        },
    });
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
			// $("#filter-loader").fadeOut("slow");
        },
        error: function (r) {
			alert("error");
			$("#filter-loader").fadeOut("slow");
        },
    });
}

function callDataSubCategory(params, index){
	$("#filter-loader").fadeIn("slow");
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
			// console.log(response);
			drawChartSubCategory(response);
			$("#filter-loader").fadeOut("slow");
        },
        error: function (r) {
			alert("error");
			$("#filter-loader").fadeOut("slow");
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
					fontSize: 9,
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
					color: '#7886a0', 
					// rotate:35, 
				},
			},
			series: chartdataInfo,
			show : 'data',
			// color: ["#A5B0B6"]
			color: [color[i]],
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

	//destroy div piechart
    $('#echartKIP').remove(); // this is my <canvas> element
    $('#content-chart-kip').append('<div id="echartKIP" class="chartsh overflow-hidden"></div>');

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
		color: ["#A5B0B6","#009E8C","#00436D"],
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
	};
	var chart6 = document.getElementById('echartKIP');
	var barChart6 = echarts.init(chart6);
    barChart6.setOption(option6);
}

function getToday(){
    var today = new Date();
    var dd = String(today.getDate()).padStart(2, '0');
    var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
    var yyyy = today.getFullYear();

    today = yyyy  + '-' + mm + '-' + dd;
    return today;
}

function getMonth(){
    var today = new Date();
    var dd = String(today.getDate()).padStart(2, '0');
    var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
    var yyyy = today.getFullYear();

    var month = mm;
    return month;
}

function getYear(){
    var today = new Date();
    var dd = String(today.getDate()).padStart(2, '0');
    var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
    var yyyy = today.getFullYear();

    var year = yyyy;
    return year;
}

//jquery
(function ($) {

    // btn day
    $('#btn-day').click(function(){
		params_time = 'day';
		v_date = getToday();
		v_date = '2019-12-01';
        // console.log(params_time);
		callSummaryInteraction(params_time, v_date);
        $("#btn-month").prop("class","btn btn-light btn-sm");
        $("#btn-year").prop("class","btn btn-light btn-sm");
        $(this).prop("class","btn btn-danger btn-sm");
    });

    // btn month
    $('#btn-month').click(function(){
        params_time = 'month';
        // console.log(params_time);
		v_date = getMonth();
		callSummaryInteraction(params_time, v_date);
        $("#btn-day").prop("class","btn btn-light btn-sm");
        $("#btn-year").prop("class","btn btn-light btn-sm");
        $(this).prop("class","btn btn-danger btn-sm");
    });

    // btn year
    $('#btn-year').click(function(){
        params_time = 'year';
        // console.log(params_time);
		v_date = getYear();
		callSummaryInteraction(params_time, v_date);
        $("#btn-day").prop("class","btn btn-light btn-sm");
        $("#btn-month").prop("class","btn btn-light btn-sm");
        $(this).prop("class","btn btn-danger btn-sm");
	});
	
	// select channel
	$('#channel_name').change(function(){
		channel_id = $('#channel_name').val();
		// console.log(value);
		callDataSubCategory(params_time, v_date);
	});
   
})(jQuery);
