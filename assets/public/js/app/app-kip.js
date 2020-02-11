var base_url = $('#base_url').val();
var category_kip = [];
var channel_id = '';
var params_time = '';
var v_date = '';
var v_month = '';
var v_year = '';
var d = new Date();
var o = d.getDate();
var n = d.getMonth() + 1;
var m = d.getFullYear();
if (o < 10) {
	o = '0' + o;
}
if (n < 10) {
	n = '0' + n;
}
console.log(n);
var v_params_this_year = m + '-' + n + '-' + (o-1);
var v_params_tenant = 'oct_telkomcare';
$(document).ready(function () {

	params_time = 'day';
	v_date = getToday();
	v_month = getMonth();
	v_year = getYear();
	v_date = '2020-01-16';
	channel_id = '';
	$('#btn-day').prop("class", "btn btn-red btn-sm");
	// loadContent(params_time, v_date, 0);
	loadContent(params_time, v_params_this_year, 0, v_params_tenant);
	// ------datepiker
	$('#input-date-filter').datepicker("setDate", v_params_this_year);
	$('#select-month option[value=' + n + ']').attr('selected', 'selected');
	$('#select-year-on-month option[value=' + m + ']').attr('selected', 'selected');
	$('#select-year-only option[value=' + m + ']').attr('selected', 'selected');

	$('#filter-date').show();
	$('#filter-month').hide();
	$('#filter-year').hide();
	setMonthPicker();
	setYearPicker();
});


function loadContent(params, index, tenant_id){
	loadAllChannel();
    callSummaryInteraction(params, index, 0, tenant_id);
    // callSummaryInteraction('month' , '12', '2019');
}

//for dinamic dropdown year on month
function callYearOnMonth() {
	var data = "";
	var base_url = $('#base_url').val();
	// console.log(year);

	$.ajax({
		type: 'POST',
		url: base_url + 'api/SummaryTraffic/SummaryYear/optionYear',
		// data: {
		//     "niceDate" : niceDate
		// },

		success: function (r) {
			var data_option = [];
			var dateTahun = $("#select-year-on-month");
			var response = JSON.parse(r);

			// var html = '<option value="2020">2020</option>';
			var monthOption = '';
			var html = '';
			var i;
			for (i = 0; i < response.data.niceDate.length; i++) {
				html += '<option value=' + response.data.niceDate[i] + '>' + response.data.niceDate[i] + '</option>';
			}
			$('#select-year-on-month').html(html);

			// monthOption = '<option value="01">January</option>' +
			// 	'<option value="02">February</option>' +
			// 	'<option value="03">March</option>' +
			// 	'<option value="04">April</option>' +
			// 	'<option value="05">May</option>' +
			// 	'<option value="06">June</option>' +
			// 	'<option value="07">July</option>' +
			// 	'<option value="08">August</option>' +
			// 	'<option value="09">September</option>' +
			// 	'<option value="10">October</option>' +
			// 	'<option value="11">November</option>' +
			// 	'<option value="12">December</option>';
			// $('#select-month').html(monthOption);
			// var option = $ ("<option />");
			//     option.html(i);
			//     option.val(i);
			//     dateTahun.append(option);
		},
		error: function (r) {
			//console.log(r);
			alert("error");
		},
	});
}

//for dinamic dropdown year on year
function callYear() {
	var data = "";
	var base_url = $('#base_url').val();
	// console.log(year);

	$.ajax({
		type: 'POST',
		url: base_url + 'api/SummaryTraffic/SummaryYear/optionYear',
		// data: {
		//     "niceDate" : niceDate
		// },

		success: function (r) {
			var data_option = [];
			var dateTahun = $("#select-year-only");
			var response = JSON.parse(r);

			// var html = '<option value="2020">2020</option>';
			var html = '';
			var i;
			for (i = 0; i < response.data.niceDate.length; i++) {
				html += '<option value=' + response.data.niceDate[i] + '>' + response.data.niceDate[i] + '</option>';
			}
			$('#select-year-only').html(html);

			// var option = $ ("<option />");
			//     option.html(i);
			//     option.val(i);
			//     dateTahun.append(option);
		},
		error: function (r) {
			//console.log(r);
			alert("error");
		},
	});
}

function loadAllChannel() {
	$.ajax({
		type: 'post',
		url: base_url + 'api/OperationPerformance/KipController/getAllChannel',
		data: {

		},
		success: function (r) {
			var response = JSON.parse(r);
			// console.log(response);
			response.data.forEach(function (value, index) {
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

function callSummaryInteraction(params, index, year, tenant_id){
	$("#filter-loader").fadeIn("slow");
	// console.log(params)
	// console.log(index)
	// console.log(year)
	$.ajax({
		type: 'post',
		url: base_url + 'api/OperationPerformance/KipController/getSummaryKip',
		data: {
			params: params,
			index: index,
			year: year,
			tenant_id: tenant_id
        },
        success: function (r) { 
            var response = JSON.parse(r);
            // console.log(response);
            drawPieChart(response);
			drawKipPerChannelChart(response);
			callDataSubCategory(params, index, year, tenant_id);
			// $("#filter-loader").fadeOut("slow");
		},
		error: function (r) {
			alert("error");
			$("#filter-loader").fadeOut("slow");
		},
	});
}

function callDataSubCategory(params, index,year,tenant_id){
	$("#filter-loader").fadeIn("slow");
	$.ajax({
		type: 'post',
		url: base_url + 'api/OperationPerformance/KipController/getDetailKip',
		data: {
			params: params,
			index: index,
			channel_id: channel_id,
			category: category_kip,
			year: year,
			tenant_id: tenant_id
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
	color = ['#A5B0B6', '#009E8C','#00436D'];

	var i = 0;
	category_kip.forEach(function (value, index) {
		$('#content-sub-category').append('' +
			'<div class="col-lg-4 col-md-12">' +
			'<div class="card">' +
			'<div class="card-header-small bg-red">' +
			'<h6 class="card-title-small card-pt10">' + value + '</h6>' +
			'</div>' +
			'<div class="card-body">' +
			'<canvas id="echart' + value + '" class="chartsh overflow-hidden"></canvas>' +
			// '<canvas id="echart'+value+'" class="chartsh overflow-hidden"></canvas>'+
			'</div>' +
			'</div>' +
			'</div>' +
			'');
		
		var label = [];
		var label_lng = [];
		var data = [];
		response.data[i].forEach(function (value, index) {
			label_lng.push(value.sub_category_lng);
			label.push(value.sub_category);
			data.push(value.total_kip);
		});
		
		if (fromResponse[i].length == 0){
			$('#echart' + value).append('<div id="chart-no-data" class="text-center mt-9"><span>No Data</span></div>');
		}else{
			var chartdatasub = [{
				label: label_lng,
				data: data,
				backgroundColor: color[i],
				hoverBackgroundColor: color[i],
				hoverBorderWidth: 0
			}]

			var numberWithCommas = function (x) {
				return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
			};
			
			var bar_ctx = document.getElementById('echart' + value);
			
			var bar_chart = new Chart(bar_ctx, {
				// type: 'bar',
				type: 'horizontalBar',
				data: {
					labels: label,
					datasets: chartdatasub
				},
				options: {
					responsive: true,
					maintainAspectRatio: false,
					layout: {
							padding: {
							left: 50,
							right: 0,
							top: 0,
							bottom: 0
						}
					},
					tooltips: {
						mode: 'label',
						callbacks: {
							label: function (tooltipItem, data) {
								return numberWithCommas(tooltipItem.xLabel) + ": " +  data.datasets[tooltipItem.datasetIndex].label;
							}
						}
					},
					scales: {
						yAxes: [ {
							ticks: {
								beginAtZero: true,
								//padding:50,
							}
										} ]
					},
					legend:{
						display:false
					}
				}
			} );;		
		}
		i++;
	});
}

function drawChartSubCategory_old(response) {
	//destroy div row content
	$('#content-sub-category').remove(); // this is my <div> element
	$('#chart-no-data').remove();
	$('#row-sub-category').append('<div id="content-sub-category" class="row"></div>');
	var color = [];
	color[0] = "#A5B0B6";
	color[1] = "#009E8C";
	color[2] = "#00436D";

	var i = 0;
	category_kip.forEach(function (value, index) {
		$('#content-sub-category').append('' +
			'<div class="col-lg-4 col-md-12">' +
			'<div class="card">' +
			'<div class="card-header-small bg-red">' +
			'<h6 class="card-title-small card-pt10">' + value + '</h6>' +
			'</div>' +
			'<div class="card-body">' +
			'<div id="echart' + value + '" class="chartsh overflow-hidden"></div>' +
			// '<canvas id="echart'+value+'" class="chartsh overflow-hidden"></canvas>'+
			'</div>' +
			'</div>' +
			'</div>' +
			'');
		var label = [];
		var label_lng = [];
		var data = [];
		response.data[i].forEach(function (value, index) {
			label_lng.push(value.sub_category_lng);
			label.push(value.sub_category_lng);
			data.push(value.total_kip);
		});
		// draw chart
		var chartdataInfo = [{
			name: value,
			type: 'bar',
			stack: 'Stack',
			data: data,
			label_lng: label_lng
		}];
		var optionInfo = {
			grid: {
				top: '6',
				right: '20',
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
							for (var i = 0; i < value.length; i++) {
								if (value[i] == " ") {
									teks = teks + '\n';

								} else if (value[i] == "|") {
									break;

								} else {
									teks = teks + value[i];
								}
								if (i == 11) {
									break;
								}
							}
							return teks;
						} else {
							return value;
						}
					}
				},
			},
			series: chartdataInfo,
			show: 'data',
			// color: ["#A5B0B6"]
			color: [color[i]],
			// tooltip: {
			// 	callbacks: {
			//             label: function(tooltipItem) {
			//                 return tooltipItem.label_lng;
			//             }
			//         },
			// 	show: true,
			// 	showContent: true,
			// 	alwaysShowContent: false,
			// 	triggerOn: 'mousemove',
			// 	trigger: 'axis',
			// 	axisPointer: {
			// 		label: {
			// 			show: true,
			// 			color: '#7886a0',
			// 			formatter : function (){
			// 				return label_lng;
			// 			}
			// 		}
			// 	},
			// 	position: function (pos, params, dom, rect, size) {
			// 		// tooltip will be fixed on the right if mouse hovering on the left,
			// 		// and on the left if hovering on the right.
			// 		// console.log(pos);
			// 		var obj = {top: pos[0]};
			// 		obj[['left', 'right'][+(pos[0] < size.viewSize[0] / 2)]] = 5;
			// 		return obj;
			// 	},
			// },
			tooltip: {
				show: true,
				showContent: true,
				alwaysShowContent: false,
				triggerOn: 'mousemove',
				trigger: 'axis',
				// formatter : function (){
				// 			return label_lng[index];
				// 		},
				axisPointer: {
					label: {
						show: false,
						color: '#7886a0',
						formatter: function (label, index) {
							//var item = data.datasets[tooltipItem.datasetIndex].data[tooltipItem.index];
							return label.value; //label_lng[data.index];
							// return label_lng[value[index]];
						}
					}
				},
				position: function (pos, params, dom, rect, size) {
					// tooltip will be fixed on the right if mouse hovering on the left,
					// and on the left if hovering on the right.
					// console.log(pos);
					var obj = {
						top: pos[0]
					};
					obj[['left', 'right'][+(pos[0] < size.viewSize[0] / 2)]] = 5;
					return obj;
				},
			},
			callbacks: {
				label: function (tooltipItem) {
					return tooltipItem.label_lng;
				}
			},
		};

		if (label.length == 0) {
			// console.log("kosong")
			$('#echart' + value).append('<div id="chart-no-data" class="text-center mt-9"><span>No Data</span></div>');
		} else {
			// console.log("masuk")
			var chartInfo = document.getElementById('echart' + value);
			var barChartInfo = echarts.init(chartInfo);
			barChartInfo.setOption(optionInfo);
		}

		i++;
	});
}

function drawPieChart(response) {
	//destroy div piechart
	$('#pieKIP').remove(); // this is my <canvas> element
	$('#canvas-pie').append('<canvas id="pieKIP" class="donutShadow overflow-hidden"></canvas>');

	$('#mylegend').remove();
	$('#legend').append('<div id="legend" class="legend-con"></div>');

	let summaryKipName = []
	let summaryKip = []

	if (response.data.length != 0) {
		// draw card yang ada datanya
		// console.log(response.data);
		response.data.summary.forEach(function (value, index) {
			summaryKipName.push(value.category);
			summaryKip.push(value.total_kip);

		});
		category_kip = summaryKipName;
		//pie chart
		var ctx = document.getElementById("pieKIP");
		ctx.height = 319;
		var myChart = new Chart(ctx, {
			type: 'pie',
			data: {
				datasets: [{
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

				}],
				labels: summaryKipName
			},
			options: {
				responsive: true,
				maintainAspectRatio: false,
				legend: {
					display: false
				},
				tooltips: {
					callbacks: {
						label: function (tooltipItem, data) {
							var value = data.datasets[0].data[tooltipItem.index];
							// console.log(data);
							value = value.toString();
							value = value.split(/(?=(?:...)*$)/);
							value = value.join(',');
							return data.labels[tooltipItem.index] + ': ' + value;
						}
					} // end callbacks:
				}, //end tooltips
				pieceLabel: {
					render: 'legend',
					fontColor: '#000',
					position: 'outside',
					segment: true,
					precision: 0
				},
				legendCallback: function (chart, index) {
					var allData = chart.data.datasets[0].data;
					var legendHtml = [];
					legendHtml.push('<ul><div id="mylegend" class="row ml-3">');
					allData.forEach(function (data, index) {
						if (allData[index] != 0) {
							var label = chart.data.labels[index];
							var dataLabel = allData[index];
							var background = chart.data.datasets[0].backgroundColor[index];
							var total = 0;
							for (var i in allData) {
								total += parseInt(allData[i]);
							}
							legendHtml.push('<li class="col-md-auto">');
							legendHtml.push('<span class="chart-legend"><div style="background-color:' + background + '" class="box-legend"></div>' + label + ' : ' + addCommas(dataLabel) + '</span>');
							legendHtml.push('</li>');
						} else if (allData[index] == 0) {
							var label = chart.data.labels[index];
							var dataLabel = allData[index];
							var background = chart.data.datasets[0].backgroundColor[index];
							var total = 0;
							for (var i in allData) {
								total += parseInt(allData[i]);
							}
							legendHtml.push('<li class="col-md-auto">');
							legendHtml.push('<span class="chart-legend"><div style="background-color:' + background + '" class="box-legend"></div>' + label + ' : ' + '0' + '</span>');
							legendHtml.push('</li>');
						}
					})
					legendHtml.push('</ul></div>');
					return legendHtml.join("");
				},
			}
		});
		var myLegendContainer = document.getElementById("legend");
		myLegendContainer.innerHTML = myChart.generateLegend();
	} else {
		$('#pieKIP').append('<div id="chart-no-data" class="text-center mt-9"><span>No Data</span></div>');
	}
}

function drawKipPerChannelChart(response) {

	$('#horizontalBarKIP').remove(); // this is my <canvas> element
    $('#horizontalBarKIPDiv').append('<canvas id="horizontalBarKIP" width="600" height="378"></canvas>');

    let category = []
	var arr_channel = []

    if (response.data.length != 0) {
		response.data.kip_channel.forEach(function (value) {
			arr_channel.push(value.channel_name);
		});
		// draw card yang ada datanya
		response.data.summary.forEach(function (value, index) {
			category.push(value.category);
		});
		var chartdata3 = []
		var color = ["#A5B0B6", "#009E8C", "#00436D"];
		var i = 0;
		category.forEach(function (value, index) {
			var totalKip = []
			response.data.kip_channel.forEach(function (value) {
				var total = "";
				if (i == 0) {
					total = (value.total_1) ? value.total_1 : 0;
				} else if (i == 1) {
					total = (value.total_2) ? value.total_2 : 0;
				} else if (i == 2) {
					total = (value.total_3) ? value.total_3 : 0;
				}
				totalKip.push(total)

				// console.log(totalKip);
			});
			var dataKip = {
				label: category[i],
				data: totalKip,
				backgroundColor: color[i],
				hoverBackgroundColor: color[i],
				hoverBorderWidth: 0
				// name: value,
				// type: 'bar',
				// stack: "stack",
				// data: totalKip
			}
			chartdata3.push(dataKip);
			i++;

		});
		var numberWithCommas = function (x) {
            return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
        };
		var bar_ctx = document.getElementById('horizontalBarKIP');
		
		var bar_chart = new Chart(bar_ctx, {
			// type: 'bar',
			type: 'horizontalBar',
			data: {
				labels: arr_channel,
				datasets: chartdata3
			},
			options: {
				responsive : true,
				maintainAspectRatio:false,
				animation: {
					duration: 10,
				},
				tooltips: {
					mode: 'label',
					callbacks: {
						label: function (tooltipItem, data) {
							return data.datasets[tooltipItem.datasetIndex].label + ": " + numberWithCommas(tooltipItem.xLabel);
						}
					}
				},
				scales: {
					xAxes: [{
						stacked: true,
						gridLines: {
							display: false
						},
					}],
					yAxes: [{
						stacked: true,
						ticks: {
							callback: function (value) {
								return numberWithCommas(value);
							},
						},
					}],
				},
				legend: {
					display: true,
                    labels: {
                        boxWidth: 10,
                    }
					
				}
			},
			// plugins: [{
			// 	beforeInit: function (chart) {
			// 		chart.data.labels.forEach(function (value, index, array) {
			// 			var a = [];
			// 			a.push(value.slice(0, 5));
			// 			var i = 1;
			// 			while (value.length > (i * 5)) {
			// 				a.push(value.slice(i * 5, (i + 1) * 5));
			// 				i++;
			// 			}
			// 			array[index] = a;
			// 		})
			// 	}
			// }]
		});
	}
}

function getToday() {
	var today = new Date();
	var dd = String(today.getDate()).padStart(2, '0');
	var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
	var yyyy = today.getFullYear();

	today = yyyy + '-' + mm + '-' + dd;
	return today;
}

function getMonth() {
	var today = new Date();
	var dd = String(today.getDate()).padStart(2, '0');
	var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
	var yyyy = today.getFullYear();

	var month = mm;
	return month;
}

function getYear() {
	var today = new Date();
	var dd = String(today.getDate()).padStart(2, '0');
	var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
	var yyyy = today.getFullYear();

	var year = yyyy;
	return year;
}

function setDatePicker() {
	$(".datepicker").datepicker({
		format: "yyyy-mm-dd",
		todayHighlight: true,
		autoclose: true
	}).attr("readonly", "readonly").css({
		"cursor": "pointer",
		"background": "white"
	});
}

function addCommas(commas) {
	commas += '';
	x = commas.split('.');
	x1 = x[0];
	x2 = x.length > 1 ? '.' + x[1] : '';
	var rgx = /(\d+)(\d{3})/;
	while (rgx.test(x1)) {
		x1 = x1.replace(rgx, '$1' + ',' + '$2');
	}
	return x1 + x2;
}

//jquery
(function ($) {

	// btn day
	$('#btn-day').click(function () {
		params_time = 'day';
		// v_date = getToday();
		v_date = '2019-12-01';
        // console.log(params_time);
		callSummaryInteraction(params_time, v_params_this_year, v_params_tenant);
		$('#input-date-filter').datepicker("setDate", v_params_this_year, v_params_tenant);
        $("#btn-month").prop("class","btn btn-light btn-sm");
        $("#btn-year").prop("class","btn btn-light btn-sm");
		$(this).prop("class","btn btn-red btn-sm");

		$('#filter-date').show();
		$('#filter-month').hide();
		$('#filter-year').hide();
	});

	// btn month
	$('#btn-month').click(function () {
		var d = new Date();
		var o = d.getDate();
		var n = d.getMonth() + 1;
		var m = d.getFullYear();
		params_time = 'month';
		// console.log(params_time);
		// v_date = getMonth();
		// callSummaryInteraction(params_time, v_date);
		// callSummaryInteraction(params_time, $("#select-month").val(), $("#select-year-on-month").val());
		callSummaryInteraction(params_time, n, m, v_params_tenant);
		callYearOnMonth();
		// callSummaryInteraction('month', '12', '2019');
		// console.log($("#select-year-only").val());
		$("#btn-day").prop("class", "btn btn-light btn-sm");
		$("#btn-year").prop("class", "btn btn-light btn-sm");
		$(this).prop("class", "btn btn-red btn-sm");

		$('#select-month option[value=' + n + ']').attr('selected', 'selected');
		$('#select-year-on-month option[value=' + m + ']').attr('selected', 'selected');

		$('#filter-date').hide();
		$('#filter-month').show();
		// $('.ui-datepicker-calendar').css('display','none');
		$('#filter-year').hide();
	});

	// btn year
	$('#btn-year').click(function () {
		params_time = 'year';
		// console.log(params_time);
		// v_date = getYear();
		callSummaryInteraction(params_time, m, 0, v_params_tenant);
		callYear();
		$("#btn-day").prop("class", "btn btn-light btn-sm");
		$("#btn-month").prop("class", "btn btn-light btn-sm");
		$(this).prop("class", "btn btn-red btn-sm");

		$('#select-year-only option[value=' + m + ']').attr('selected', 'selected');

		$('#filter-date').hide();
		$('#filter-month').hide();
		$('#filter-year').show();
	});

	// select channel
	$('#channel_name').change(function () {
		channel_id = $('#channel_name').val();
		// console.log(value);
		callDataSubCategory(params_time, v_date, v_params_tenant);
	});

	var date = new Date();
	date.setDate(date.getDate() > 0);
	$('#input-date-filter').datepicker({
		dateFormat: 'yy-mm-dd',
		maxDate: 'now',
		showTodayButton: true,
		showClear: true,
		// minDate: date,
		onSelect: function (dateText) {
			// console.log(this.value);
			v_date = this.value;
			callSummaryInteraction(params_time, v_date,0,v_params_tenant);
        }
	});

	/*select option month*/
	// $('#select-month').change(function(){
	// 	v_month = $(this).val();
	// 	// console.log(value);
	// 	// callSummaryInteraction(params_time, v_month,v_year);
	// 	callSummaryInteraction('month', v_month, $("#select-year-on-month").val());
	// });
	// $('#select-year-on-month').change(function(){
	// 	v_year = $(this).val();
	// 	// console.log(value);
	// 	callSummaryInteraction('month', $("#select-month").val(), v_year);
	// });
	/**/

	// select option year
	$('#select-year-only').change(function () {
		v_year = $(this).val();
		// console.log(this.value);
		callSummaryInteraction('year', v_year, 0, v_params_tenant);
	});

	$('#btn-go').click(function () {
		callSummaryInteraction('month', $("#select-month").val(), $("#select-year-on-month").val(), v_params_tenant);
	});


	// Horizontal Bar KIP yang baru 
	// Return with commas in between
	var numberWithCommas = function (x) {
		return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
	};
	$('#btn-go').click(function(){
        callSummaryInteraction('month', $("#select-month").val(), $("#select-year-on-month").val(), v_params_tenant);
    });

	// // horizontal bar chart komplain
    // var ctx = document.getElementById( "horizontaklBarKomplain" );
    // ctx.height = 100;
    // var myChart = new Chart( ctx, {
    //     type: 'horizontalBar',
    //     data: {
    //         labels: [ "TV/UseeTV", "Wifi ID", "Bisa Browsing", "Wed", "Internet" ],
    //         datasets: [
    //             {
    //                 label: "Total",
    //                 data: [ 15000, 6000, 6000, 9000, 10000],
    //                 borderColor: "#A5B0B6",
    //                 borderWidth: "0",
    //                 backgroundColor: "#A5B0B6"
    //                         }
    //                     ]
    //     },
    //     options: {
	// 		responsive: true,
	// 		maintainAspectRatio: false,
	// 		layout: {
	// 				padding: {
	// 				left: 50,
	// 				right: 0,
	// 				top: 0,
	// 				bottom: 0
	// 			}
	// 		},
    //         scales: {
    //             yAxes: [ {
    //                 ticks: {
    //                     beginAtZero: true,
	// 					//padding:50,
    //                 }
    //                             } ]
	// 		},
	// 		legend:{
	// 			display:false
	// 		}
    //     }
	// } );

	// Horizontal Bar Chart Informasi
	// var ctx = document.getElementById( "horizontaklBarInformasi" );
    // ctx.height = 100;
    // var myChart = new Chart( ctx, {
    //     type: 'horizontalBar',
    //     data: {
    //         labels: [ "TV/UseeTV", "Wifi ID", "Bisa Browsing", "Wed", "Internet" ],
    //         datasets: [
    //             {
    //                 label: "Total",
    //                 data: [ 15000, 6000, 6000, 9000, 10000],
    //                 borderColor: "#009E8C",
    //                 borderWidth: "0",
    //                 backgroundColor: "#009E8C"
    //                         }
    //                     ]
    //     },
    //     options: {
	// 		responsive: true,
	// 		maintainAspectRatio: false,
	// 		layout: {
	// 				padding: {
	// 				left: 50,
	// 				right: 0,
	// 				top: 0,
	// 				bottom: 0
	// 			}
	// 		},
    //         scales: {
    //             yAxes: [ {
    //                 ticks: {
    //                     beginAtZero: true,
	// 					//padding:50,
    //                 }
    //                             } ]
	// 		},
	// 		legend:{
	// 			display:false
	// 		}
    //     }
	// } );

	// // Horizontal Bar Chart Permintaan
	// var ctx = document.getElementById( "horizontaklBarPermintaan" );
    // ctx.height = 100;
    // var myChart = new Chart( ctx, {
    //     type: 'horizontalBar',
    //     data: {
    //         labels: [ "TV/UseeTV", "Wifi ID", "Bisa Browsing", "Wed", "Internet" ],
    //         datasets: [
    //             {
    //                 label: "Total",
    //                 data: [ 15000, 6000, 6000, 9000, 10000],
    //                 borderColor: "#00436D",
    //                 borderWidth: "0",
    //                 backgroundColor: "#00436D"
    //                         }
    //                     ]
    //     },
    //     options: {
	// 		responsive: true,
	// 		maintainAspectRatio: false,
	// 		layout: {
	// 				padding: {
	// 				left: 50,
	// 				right: 0,
	// 				top: 0,
	// 				bottom: 0
	// 			}
	// 		},
    //         scales: {
    //             yAxes: [ {
    //                 ticks: {
    //                     beginAtZero: true,
	// 					//padding:50,
    //                 }
    //                             } ]
	// 		},
	// 		legend:{
	// 			display:false
	// 		}
    //     }
	// } );
	
})(jQuery);
