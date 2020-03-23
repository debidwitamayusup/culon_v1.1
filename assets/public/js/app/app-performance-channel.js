var base_url = $('#base_url').val();
var v_params = 'day';
var v_index = '2020-01-16';
var v_month = '1';
var v_year = '2020';
// var v_params = 'day';
// var v_index = '2020-01-01';
var params_time = '';
var v_date = '';
var v_month = '';
var v_year = '';
var months = [
	'January', 'February', 'March', 'April', 'May',
	'June', 'July', 'August', 'September',
	'October', 'November', 'December'
];
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
var v_params_tenant = 'oct_telkomcare';
//get yesterday
var v_params_this_year = m + '-' + n + '-' + (o - 1);

// console.log(v_params_this_year);
const sessionParams = JSON.parse(localStorage.getItem('Auth-infomedia'));
const tokenSession = JSON.parse(localStorage.getItem('Auth-token'));
// console.log(n);
$(document).ready(function () {
	if(sessionParams){
		// loadContent(v_params, v_params_this_year, 0);
		// loadContent(v_params, v_params_this_year, 0);

		params_time = 'day';
		v_date = getToday();
		v_month = getMonth();
		v_year = getYear();
		v_date = '2019-12-01';
		// loadContent(v_params, v_index, 0);
		//for current time
		// loadContent(v_params, v_params_this_year, 0);
		// fromTemplate();
		// drawChartSumChannel();
		$("#btn-month").prop("class", "btn btn-light btn-sm");
		$("#btn-year").prop("class", "btn btn-light btn-sm");
		$("#btn-day").prop("class", "btn btn-red btn-sm");
		sessionStorage.removeItem('paramsSession');
		sessionStorage.setItem('paramsSession', 'day');
		// loadContent(params_time, v_date, 0);
		if(sessionParams.TENANT_ID[0].TENANT_ID != ''){
            getTenant('', sessionParams.USERID);
        }else{
            getTenant('', '');
        }
		loadContent(tokenSession, params_time, v_params_this_year, 0, $('#layanan_name').val());
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
	}else{
		window.location = base_url
	}

});

function getTenant(date, userid){
    $.ajax({
        type: 'POST',
        url: base_url + 'api/Wallboard/WallboardController/GetTennantFilter',
        data: {
            "date" : date,
            "userid" : userid
        },

        success: function (r) {
            var data_option = [];
            //dont parse response if using rest controller
            // var response = JSON.parse(r);
            var response = r;
            // console.log(response);
            // tenants = response.data;
                var html = '';
                for(i=0; i<response.data.length; i++){
                    html += '<option value='+response.data[i].TENANT_ID+'>'+response.data[i].TENANT_NAME+'</option>';
                }
                $('#layanan_name').html(html);
        },
        error: function (r) {
            //console.log(r);
            alert("error");
        },
    });
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

			monthOption = '<option value="01">January</option>' +
				'<option value="02">February</option>' +
				'<option value="03">March</option>' +
				'<option value="04">April</option>' +
				'<option value="05">May</option>' +
				'<option value="06">June</option>' +
				'<option value="07">July</option>' +
				'<option value="08">August</option>' +
				'<option value="09">September</option>' +
				'<option value="10">October</option>' +
				'<option value="11">November</option>' +
				'<option value="12">December</option>';
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

async function loadContent(token, params, index, params_year, tenant_id){
    summaryService(token, params, index, params_year, tenant_id);
	summaryChannel(token, params, index, params_year, tenant_id);
	drawDataTable2(token, params, index, params_year, tenant_id);
	// callSummaryInteraction(params, index,0);
}

function monthNumToName(month) {
	return months[month - 1] || '';
}

function addCommas(commas) {
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

function summaryService(token, params, index, params_year, tenant_id){
	$("#filter-loader").fadeIn("slow");
    $.ajax({
		beforeSend: function (xhr) {
            xhr.setRequestHeader("token", token);
        },
        type: 'post',
        url: base_url+'api/OperationPerformance/PerformanceByChannel/BarSummaryService',
        data: {
            params: params,
            index: index,
            params_year: params_year,
            tenant_id: tenant_id
        },
        success: function (response) {
			// var responses = JSON.parse(response);

            if(response.status != false){
				drawChartSumService(response);
				$("#filter-loader").fadeOut("slow");
			}else{
				var notif = alert('Your Account Credential is Invalid. Maybe someone else has logon to your account.')
                if(notif){
                    localStorage.clear();
                    window.location = base_url+'main/login';
                }else{
                    localStorage.clear();
                    window.location = base_url+'main/login';
                }
			}
		},
		error: function (r) {
			// console.log(r);
			var notif = alert('Your Account Credential is Invalid. Maybe someone else has logon to your account.')
                if(notif){
                    localStorage.clear();
                    window.location = base_url+'main/login';
                }else{
                    localStorage.clear();
                    window.location = base_url+'main/login';
                }
			$("#filter-loader").fadeOut("slow");
		},
	});
}

function summaryChannel(token, params, index, params_year, tenant_id){
	$("#filter-loader").fadeIn("slow");
	$.ajax({
		beforeSend: function (xhr) {
            xhr.setRequestHeader("token", token);
        },
        type: 'post',
        url: base_url+'api/OperationPerformance/PerformanceByChannel/BarSummaryServiceByChannel',
        data: {
            params: params,
            index: index,
            params_year: params_year,
            tenant_id: tenant_id
        },
        success: function (response) {
            // var response = JSON.parse(r);
            // console.log(response);
            drawChartSumChannel(response);
        },
        error: function (r) {
            // console.log(r);
            alert("error");
        },
    });
}
function drawDataTable2(token, params, index, params_year, tenant_id){
	// console.log(params);
	$("#filter-loader").fadeIn("slow");

    $('#mytbody').remove();
    // $('#mytfoot').remove();
    $('#tablesPerformance').append('<tbody class="text-center" id="mytbody">');

    $('#tablesPerformance').DataTable({
        processing : true,
        ajax: {
			beforeSend: function (xhr) {
				xhr.setRequestHeader("token", token);
			},
            url : base_url + 'api/AgentPerformance/AgentPerformController/getSTsallchannel',
            type : 'POST',
            data: {
            	params: params,
            	index: index,
            	params_year: params_year,
            	tenant_id: tenant_id
            }
        },
        columnDefs: [
			{ className: "text-right", targets: 5 },
			{ className: "text-right", targets: 6 }
		],   
        destroy: true,
    });
    // console.log(response);
}

function drawChartSumService(response) {
	// console.log(response);
	$('#barService').remove();
	$('#barServiceDiv').append('<canvas id="barService"></canvas>');

	if (response.status != false) {
		var MeSeContext = document.getElementById("barService");
		MeSeContext.height = 326;
		MeSeContext.width = 430;
		var MeSeData = {
			labels: [
				"ART",
				"AHT",
				"AST"
			],
			datasets: [{
				label: "data",
				data: [response.data.SUM_ART, response.data.SUM_AHT, response.data.SUM_AST],
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
			}]
		};
		var MeSeChart = new Chart(MeSeContext, {
			type: 'horizontalBar',
			data: MeSeData,
			options: {
				tooltips: {
					callbacks: {
						label: function (tooltipItem, data) {
							var value = data.datasets[0].data[tooltipItem.index];
							if (parseInt(value) >= 1000) {
								return 'seconds: ' + value.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
							} else {
								return 'seconds: ' + value;
							}
						}
					}
				},
				hover: {
					animationDuration: 0
				},
				animation: {
					duration: 1,
					onComplete: function () {
						var chartInstance = this.chart,
							ctx = chartInstance.ctx;
						ctx.font = Chart.helpers.fontString(Chart.defaults.global.defaultFontSize, Chart.defaults.global.defaultFontStyle, Chart.defaults.global.defaultFontFamily);
						ctx.textAlign = 'center';
						ctx.textBaseline = 'middle';
						ctx.fillStyle = "#000000";

						this.data.datasets.forEach(function (dataset, i) {
							var meta = chartInstance.controller.getDatasetMeta(i);
							meta.data.forEach(function (bar, index) {
								var data = addCommas(dataset.data[index]) + ' seconds';
								ctx.fillText(data, (bar._model.x - bar._model.x) + 80, (bar._model.y - 27));
							});
						});
					}
				},
				responsive: true,
				maintainAspectRatio: false,
				scales: {
					xAxes: [{
						gridLines:{
							display:true,
						},
						ticks: {
							fontSize: 10,
							min: 0,
							callback: function (value, index, values) {
								//      if(parseInt(value) >= 1000){
								//          var res = (value/1000);
								// return res+'K'
								//      } else
								//      	return value;
								value = value.toString();
								value = value.split(/(?=(?:...)*$)/);
								value = value.join('.');
								return value;
							}
						},
					}],
					yAxes: [{
						stacked: true,
						maxBarThickness: 20,
						gridLines:{
							display:false,
						},
						ticks: {
							beginAtZero: true,
							callback: function (value, index, values) {
								if (parseInt(value) >= 1000) {
									return value.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
								} else {
									return value;
								}
							}
						}
					}]
				},
				legend: {
					display: false,
					labels: {
						fontColor: '#666'
					}
				},
				plugins: {
					datalabels: {
						formatter: function (value, context) {
							return context.chart.data.labels[context.dataIndex];
						}
					}
				}
			}
		});
	} else {
		$('#barService').append('<div id="chart-no-data" class="text-center mt-9"><span>No Data</span></div>');
	}
}

function drawChartSumChannel(response) {

	// console.log(response.status);
	$('#horizontalBarPerformanceChannel').remove();
	$('#horizontalBarPerformanceChannelDiv').append('<canvas id="horizontalBarPerformanceChannel" width="600" height="350"></canvas>');
	if (response.status != false) {
		
		let channelName = [];
		let art = [];
		let aht = [];
		let ast = [];
		
		var color = ["#A5B0B6", "#009E8C", "#00436D"];
		var labeling = ["ART", "AHT", "AST"];

		var numberWithCommas = function (x) {
            return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
        };

        response.data.forEach(function(value, index){
        	channelName.push(value.CHANNEL_NAME);
			art.push(value.SUM_ART);
			aht.push(value.SUM_AHT);
			ast.push(value.SUM_AST);
		});
		var total = [art,aht,ast];
		// console.log(total);
		var dataStacked = [];
		var datasetStacked = "";
		for (var i = 0; i < 3; i++) {
			datasetStacked = {
						label: labeling[i],
						data: total[i],
						backgroundColor: color[i],
						hoverBackgroundColor: color[i],
						hoverBorderWidth: 0
					}
					dataStacked.push(datasetStacked);
		}		
			
		// console.log(dataStacked);
		var bar_ctx = document.getElementById('horizontalBarPerformanceChannel');

		var bar_chart = new Chart(bar_ctx, {
			// type: 'bar',
			type: 'horizontalBar',
			data: {
				labels: channelName,
				datasets: dataStacked
			},
			options: {
				responsive: true,
				maintainAspectRatio: false,
				animation: {
					duration: 10,
				},
				tooltips: {
					intersect: false,
					mode: 'label',
					callbacks: {
						label: function (tooltipItem, data) {
							return data.datasets[tooltipItem.datasetIndex].label + ": " + numberWithCommas(tooltipItem.xLabel) + " Seconds";
						}
					}
				},
				scales: {
					xAxes: [{
						stacked: true,
						gridLines: {
							display: true
						},
						ticks: {
							fontSize: 10,
							callback: function (value) {
								return numberWithCommas(value);
							},
						},
					}],
					yAxes: [{
						stacked: true,
						gridLines: {
							display: false
						},
						ticks: {
							callback: function (value) {
								return numberWithCommas(value);
							},
						},
					}],
				},
				legend: {
					display: true,
					// data: labeling,
					labels: {
						boxWidth: 10
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
	} else {
		$('#horizontalBarPerformanceChannel').append('<div id="chart-no-data" class="text-center mt-9"><span>No Data</span></div>');
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

function remove_hash_from_url()
{
    var uri = window.location.toString();
    if (uri.indexOf("#") > 0) {
        var clean_uri = uri.substring(0, uri.indexOf("#"));
        window.history.replaceState({}, document.title, clean_uri);
    }
}

//jquery
(function ($) {
	// $(window).on('resize', function () {
	// 	if (echartService != null && echartService != undefined) {
	// 		echartService.resize();
	// 	}
	// });

	// btn day
	$('#btn-day').click(function () {
		params_time = 'day';
		// v_date = getToday();
		// v_date = '2019-12-01';
		// console.log(params_time);
		if(sessionParams.TENANT_ID != null){
            loadContent(tokenSession, params_time, v_params_this_year, 0, sessionParams.TENANT_ID[0].TENANT_ID);
        }else{
			loadContent(tokenSession, params_time, v_params_this_year, 0, $('#layanan_name').val());
		}
		sessionStorage.removeItem('paramsSession');
        sessionStorage.setItem('paramsSession', 'day');
        $("#btn-month").prop("class","btn btn-light btn-sm");
		$("#btn-year").prop("class","btn btn-light btn-sm");
		$('#input-date-filter').datepicker("setDate", v_params_this_year, '');
		$(this).prop("class","btn btn-red btn-sm");

		$('#filter-date').show();
		$('#filter-month').hide();
		$('#filter-year').hide();
	});

	// btn day
	// $('#btn-week').click(function(){
	//     params_time = 'week';
	//     // console.log(params_time);
	//     loadContent(params_time , '2020-01-10', v_year);
	//     // $('#tag-time').html(v_date);
	//     $("#btn-day").prop("class","btn btn-light btn-sm");
	//     $("#btn-month").prop("class","btn btn-light btn-sm");
	//     $("#btn-year").prop("class","btn btn-light btn-sm");
	//     $(this).prop("class","btn btn-red btn-sm");
	// });

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
		loadContent(tokenSession, params_time, n,m, $('#layanan_name').val());
		// callSummaryInteraction('month', '12', '2019');
		// console.log($("#select-year-only").val());
		callYearOnMonth();
		sessionStorage.removeItem('paramsSession');
        sessionStorage.setItem('paramsSession', 'month');
		$('#select-month option[value=' + n + ']').attr('selected', 'selected');
		$('#select-year-on-month option[value=' + m + ']').attr('selected', 'selected');
		$("#btn-day").prop("class", "btn btn-light btn-sm");
		$("#btn-year").prop("class", "btn btn-light btn-sm");
		$(this).prop("class", "btn btn-red btn-sm");


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
		loadContent(tokenSession, params_time, m, 0, $('#layanan_name').val());
		callYear();
		$("#btn-day").prop("class", "btn btn-light btn-sm");
		$("#btn-month").prop("class", "btn btn-light btn-sm");
		$(this).prop("class", "btn btn-red btn-sm");
		sessionStorage.removeItem('paramsSession');
        sessionStorage.setItem('paramsSession', 'year');
		$('#filter-date').hide();
		$('#filter-month').hide();
		$('#filter-year').show();
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
			loadContent(tokenSession, 'day', v_date, 0, $('#layanan_name').val());
        }
	});

	/*select option month*/
	// $('#select-month').change(function(){
	// 	v_month = $(this).val();
	// 	// console.log(value);
	// 	// callSummaryInteraction(params_time, v_month,v_year);
	// 	loadContent('month', v_month, $("#select-year-on-month").val());
	// });
	// $('#select-year-on-month').change(function(){
	// 	v_year = $(this).val();
	// 	// console.log(value);
	// 	loadContent('month', $("#select-month").val(), v_year);
	// });
	/**/

	// select option year
	$('#select-year-only').change(function () {
		v_year = $(this).val();
		loadContent(tokenSession, 'year', v_year, 0, $('#layanan_name').val());
	});

	$('#btn-go').click(function () {
		loadContent(tokenSession, 'month', $("#select-month").val(), $("#select-year-on-month").val(), $('#layanan_name').val());
	});

	$('#layanan_name').change(function () {
		channel_id = $('#channel_name').val();
		let fromParams = sessionStorage.getItem('paramsSession');
        if(fromParams == 'day'){
			loadContent(tokenSession, 'day', $('#input-date-filter').val(),0, $('#layanan_name').val(), $("#layanan_name").val());
        }else if(fromParams == 'month'){
			loadContent(tokenSession, 'month', $("#select-month").val(), $("#select-year-on-month").val(), $('#layanan_name').val());
        }else if(fromParams == 'year'){
			loadContent(tokenSession, 'year', $('#select-year-only').val(), 0, $('#layanan_name').val());
        }
	});

	var numberWithCommas = function (x) {
		return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
	};
})(jQuery);