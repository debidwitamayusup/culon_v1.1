var base_url = $('#base_url').val();
var category_kip = [];
var channel_id = '';
var params_time= '';
var v_date='';

$(document).ready(function () {
    params_time = 'day';
	v_date = '2019-12-01';
	channel_id= 2; //default channel email
	$('#btn-day').prop("class","btn btn-red btn-sm");
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
	$('#chart-no-data').remove(); 
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
				'<div class="card-header-small bg-red">'+
					'<h6 class="card-title-small card-pt10">'+value+'</h6>'+
				'</div>'+
				'<div class="card-body">'+
					'<div id="echart'+value+'" class="chartsh overflow-hidden"></div>'+
					// '<canvas id="echart'+value+'" class="chartsh overflow-hidden"></canvas>'+
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
				right: '20',
				bottom: '20',
				left: '55',
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
					// rotate:45,
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
				},
				position: function (pos, params, dom, rect, size) {
					// tooltip will be fixed on the right if mouse hovering on the left,
					// and on the left if hovering on the right.
					// console.log(pos);
					var obj = {top: pos[0]};
					obj[['left', 'right'][+(pos[0] < size.viewSize[0] / 2)]] = 5;
					return obj;
				},
			},
		};

		if(label.length==0){
			console.log("kosong")
			$('#echart'+value).append('<div id="chart-no-data" class="text-center mt-9"><span>No Data</span></div>');
		}else {
			console.log("masuk")
			var chartInfo = document.getElementById('echart'+value);
			var barChartInfo = echarts.init(chartInfo);
			barChartInfo.setOption(optionInfo);
		}

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
    ctx.height = 377;
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
			},
			tooltips: {
			  callbacks: {
					label: function(tooltipItem, data) {
						var value = data.datasets[0].data[tooltipItem.index];
						value = value.toString();
						value = value.split(/(?=(?:...)*$)/);
						value = value.join('.');
						return value;
					}
			  } // end callbacks:
			}, //end tooltips
        }
    } );
}

function drawKipPerChannelChart(response){

	//destroy div piechart
    $('#echartKIP').remove(); // this is my <canvas> element
    $('#content-chart-kip').append('<div id="echartKIP" class="chartsh-kip overflow-hidden"></div>');

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
			right: '23',
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

function addCommas(commas)
{
    commas += '';
    x = commas.split('.');
    x1 = x[0];
    x2 = x.length > 1 ? '.' + x[1] : '';
    var rgx = /(\d+)(\d{3})/;
    while (rgx.test(x1)) {
        x1 = x1.replace(rgx, '$1' + '.' + '$2');
    }
    return x1 + x2;
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
        $(this).prop("class","btn btn-red btn-sm");
    });

    // btn month
    $('#btn-month').click(function(){
        params_time = 'month';
        // console.log(params_time);
		v_date = getMonth();
		callSummaryInteraction(params_time, v_date);
        $("#btn-day").prop("class","btn btn-light btn-sm");
        $("#btn-year").prop("class","btn btn-light btn-sm");
        $(this).prop("class","btn btn-red btn-sm");
    });

    // btn year
    $('#btn-year').click(function(){
        params_time = 'year';
        // console.log(params_time);
		v_date = getYear();
		callSummaryInteraction(params_time, v_date);
        $("#btn-day").prop("class","btn btn-light btn-sm");
        $("#btn-month").prop("class","btn btn-light btn-sm");
        $(this).prop("class","btn btn-red btn-sm");
	});
	
	// select channel
	$('#channel_name').change(function(){
		channel_id = $('#channel_name').val();
		// console.log(value);
		callDataSubCategory(params_time, v_date);
	});
   
})(jQuery);
