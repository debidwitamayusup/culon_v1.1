var base_url = $('#base_url').val();
var v_params = 'day';
var v_index = '2020-01-16';
var v_month = '1';
var v_year = '2020';
// var v_params = 'day';
// var v_index = '2020-01-01';
var params_time='';
var v_date='';
var v_month = '';
var v_year = '';
var months = [
    'January', 'February', 'March', 'April', 'May',
    'June', 'July', 'August', 'September',
    'October', 'November', 'December'
    ];
var d = new Date();
var o = d.getDate();
var n = d.getMonth()+1;
var m = d.getFullYear();
if (o < 10) {
  o = '0' + o;
} 
if (n < 10) {
  n = '0' + n;
}

//get yesterday
var v_params_this_year = m + '-' + n + '-' + (o-1);

// console.log(v_params_this_year);

// console.log(d);
$(document).ready(function () {
    loadContent(v_params, v_params_this_year, 0);
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
    $("#btn-month").prop("class","btn btn-light btn-sm");
    $("#btn-year").prop("class","btn btn-light btn-sm");
    $("#btn-day").prop("class","btn btn-red btn-sm");
    sessionStorage.removeItem('paramsSession');
    sessionStorage.setItem('paramsSession', 'day');
	// loadContent(params_time, v_date, 0);
	loadContent(params_time, v_params_this_year, 0);
	// ------datepiker
	$('#input-date-filter').datepicker("setDate", v_params_this_year);
	$('#select-month option[value='+n+']').attr('selected','selected');
	$('#select-year-on-month option[value='+m+']').attr('selected','selected');
	$('#select-year-only option[value='+m+']').attr('selected','selected');
	
	$('#filter-date').show();
	$('#filter-month').hide();
	$('#filter-year').hide();
	setMonthPicker();
	setYearPicker();

});


function loadContent(params, index, params_year){
    drawDataTable2(params, index, params_year);
    summaryService(params, index, params_year);
	summaryChannel(params, index, params_year);
	// callSummaryInteraction(params, index,0);
}

function monthNumToName(month) {
    return months[month - 1] || '';
}

function addCommas(commas)
{
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

function summaryService(params, index, params_year){
	$("#filter-loader").fadeIn("slow");
    $.ajax({
        type: 'post',
        url: base_url+'api/OperationPerformance/PerformanceByChannel/BarSummaryService',
        data: {
            params: params,
            index: index,
            params_year: params_year
        },
        success: function (response) {
            // var response = JSON.parse(r);
            // console.log(response);
            drawChartSumService(response);
			$("#filter-loader").fadeOut("slow");
        },
        error: function (r) {
            // console.log(r);
            alert("error");
			$("#filter-loader").fadeOut("slow");
        },
    });
}

function summaryChannel(params, index, params_year){
	$("#filter-loader").fadeIn("slow");
	$.ajax({
        type: 'post',
        url: base_url+'api/OperationPerformance/PerformanceByChannel/BarSummaryServiceByChannel',
        data: {
            params: params,
            index: index,
            params_year: params_year
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
function drawDataTable2(params, index, params_year){
	// console.log(params);
	$("#filter-loader").fadeIn("slow");

    $('#mytbody').remove();
    // $('#mytfoot').remove();
    $('#tablesPerformance').append('<tbody class="text-center" id="mytbody" style="font-size:12px !important;">');

    $('#tablesPerformance').DataTable({
        processing : true,
        ajax: {
            url : base_url + 'api/AgentPerformance/AgentPerformController/getSTsallchannel',
            type : 'POST',
            data: {
            	params: params,
            	index: index,
            	params_year, params_year
            }
        },
        columnDefs: [
			{ className: "text-right", targets: 5 },
			{ className: "text-right", targets: 6 }
		],   
        destroy: true,
    });
}
function drawChartSumService(response){
	// console.log(response);
	$('#barService').remove();
    $('#barServiceDiv').append('<canvas id="barService"></canvas>');

	if (response.status != false) {
		var MeSeContext = document.getElementById("barService");
	    MeSeContext.height =180;
		MeSeContext.width= 430;
	    var MeSeData = {
	        labels : [
	                    "ART",
	                    "AHT",
	                    "AST"
	        ],
	        datasets : [{
	            label : "data",
	            data :[response.data.SUM_ART, response.data.SUM_AHT, response.data.SUM_AST],
	            backgroundColor : [
	                                "#A5B0B6",
	                                "#009E8C",
	                                "#00436D"
	                            ],
	            hoverBackgroundColor : [
	                             "#A5B0B6",
	                             "#009E8C",
	                             "#00436D"
	            ]
	        }]
	    };
	    var MeSeChart = new Chart(MeSeContext,{
	        type : 'horizontalBar',
	        data : MeSeData,
	        options : {
	        	tooltips: {
	        		callbacks: {
		                label: function(tooltipItem, data) {
		                    var value = data.datasets[0].data[tooltipItem.index];
		                    if(parseInt(value) >= 1000){
		                               return 'seconds: ' + value.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
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
				            ctx.fillStyle = "#ffffff";

			            this.data.datasets.forEach(function (dataset, i) {
			                var meta = chartInstance.controller.getDatasetMeta(i);
			                meta.data.forEach(function (bar, index) {
			                    var data = addCommas(dataset.data[index])+' seconds';
			                    ctx.fillText(data, bar._model.x-150, bar._model.y);
			                });
			            });
			        }
			    },
	            responsive: true,
	            maintainAspectRatio: false,
	            scales : {
	                xAxes : [{
	                    ticks : {
	                        min : 0,
	                        callback: function(value, index, values) {
						   //      if(parseInt(value) >= 1000){
						   //          var res = (value/1000);
									// return res+'K'
						   //      } else
						   //      	return value;
							value = value.toString();
							value = value.split(/(?=(?:...)*$)/);
							value = value.join(',');
							return value;
						        }
	                    },
	                }],
	                yAxes : [{
	                    stacked : true,
	                    ticks: {
	                        beginAtZero:true,
	                        callback: function(value, index, values) {
	                            if(parseInt(value) >= 1000){
	                               return value.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
	                            } else {
	                               return value;
	                            }
	                       }                            
	                    }
	                }]
	            },
	            legend: {
	                display: false,
	                labels:{
			        	fontColor: '#666'
	                }
	        	},
	        	plugins: {
	            		datalabels: {
	                		formatter: function(value, context) {
	                    	return context.chart.data.labels[context.dataIndex];
	                	}
	            	}
	        	}
	        }
	    });
	}else{
		$('#barService').append('<div id="chart-no-data" class="text-center mt-9"><span>No Data</span></div>');
	}
}

function drawChartSumChannel(response){

		// console.log(response.status);
	$('#echartService').remove();
    $('#echartServiceDiv').append('<div id="echartService" class="chartsh-services overflow-hidden"></div>');
    if (response.status != false) {
		let channelName = [];
		let art = [];
		let aht = [];
		let ast = [];
		response.data.forEach(function (value, index) {
			channelName.push(value.CHANNEL_NAME);
			art.push(value.SUM_ART);
			aht.push(value.SUM_AHT);
			ast.push(value.SUM_AST);

	    });
	    // console.log(channelName);
		var chartdataTicket= [{
			name: 'ART',
			type: 'bar',
			stack: 'Stack',
			data: art
		}, {
			name: 'AHT',
			type: 'bar',
			stack: 'Stack',
			data: aht
		}, {
			name: 'AST',
			type: 'bar',
			stack: 'Stack',
			data: ast
		}];
		/*----echart performance by channel----*/
		var optionTicket = {
			// responsive: {
			// 	rules: {
			// 		condition: {
			// 			maxWidth: "500",
			// 		}
			// 	}
			// },
			grid: {
				top: '30',
				right: '25',
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
				// data: ['Live Chat','SMS','Messenger','Email','Voice','Twitter DM','Twitter','Whatsapp','Line','Telegram','Facebook','Instagram'],
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
				},
				
				// position: function (pos, params, dom, rect, size) {
				// 	// tooltip will be fixed on the right if mouse hovering on the left,
				// 	// and on the left if hovering on the right.
				// 	// console.log(pos);
				// 	var obj = {top: pos[0]};
				// 	obj[['left', 'right'][+(pos[0] < size.viewSize[0] / 2)]] = 5;
				// 	return obj;
				// },
			},
			legend:{
				data: ['ART','AHT','AST'],
				top: 'auto'
			},
			series: chartdataTicket,
			color: ["#A5B0B6","#009E8C","#00436D"]
		};
		var chartTicket = document.getElementById('echartService');
		var barChartTicket = echarts.init(chartTicket);
		barChartTicket.setOption(optionTicket);
		// window.onresize = function(){
		// 	barChartTicket.responsive();
		// 	// barChartTicket.resize();
		// }
		function myFunction(x) {
			if (x.matches) { // If media query matches
				barChartTicket;
			} else {
				barChartTicket;
			}
		  }
		  
		  var x = window.matchMedia("(min-width: 450px)")
		  myFunction(x) // Call listener function at run time
		  x.addListener(myFunction)
	}else{
		$('#echartService').append('<div id="chart-no-data" class="text-center mt-9"><span>No Data</span></div>');
	}
}
function fromTemplate() {
    "use strict";
    
     /*----echart summary ticket category----*/
	var chartdataTicket= [{
		name: 'ART',
		type: 'bar',
		stack: 'Stack',
		data: [14, 18, 20, 14, 29, 21, 25, 14,15,15,20,20]
	}, {
		name: 'AHT',
		type: 'bar',
		stack: 'Stack',
		data: [12, 14, 15, 50, 24, 24, 10, 20,30,30,30,30]
	}, {
		name: 'AST',
		type: 'bar',
		stack: 'Stack',
		data: [12, 14, 15, 50, 24, 24, 10, 20,40,40,40,40]
	}];
	/*----echart summary ticket category----*/
	var optionTicket = {
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
			data: ['Live Chat','SMS','Messenger','Email','Voice','Twitter DM','Twitter','Whatsapp','Line','Telegram','Facebook','Instagram'],
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
		series: chartdataTicket,
		color: ["#A5B0B6","#009E8C","#00436D"]
	};
	var chartTicket = document.getElementById('echartService');
	var barChartTicket = echarts.init(chartTicket);
    barChartTicket.setOption(optionTicket);
    
    // Horizontal Bar

    var MeSeContext = document.getElementById("barService");
    MeSeContext.height =200;
    var MeSeData = {
        labels : [
                    "ART",
                    "AHT",
                    "AST"
        ],
        datasets : [{
            label : "data",
            data :[50,60,70],
            backgroundColor : [
                                "#A5B0B6",
                                "#009E8C",
                                "#00436D"
                            ],
            hoverBackgroundColor : [
                             "#A5B0B6",
                             "#009E8C",
                             "#00436D"
            ]
        }]
    };
    var MeSeChart = new Chart(MeSeContext,{
        type : 'horizontalBar',
        data : MeSeData,
        options : {
            responsive: true,
            maintainAspectRatio: false,
            scales : {
                xAxes : [{
                    ticks : {
                        min : 0
                    }
                }],
                yAxes : [{
                    stacked : true
                }]
            },
            legend: {
                display: false
                }
        }
    });



 //    //sample datatable	
	// $('#tablesPerformance').DataTable();
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

function setDatePicker(){
	$(".datepicker").datepicker({
		format: "yyyy-mm-dd",
		todayHighlight: true,
		autoclose: true
	}).attr("readonly", "readonly").css({"cursor":"pointer", "background":"white"});
}

//jquery
(function ($) {
	$(window).on('resize', function(){
		if(echartService != null && echartService != undefined){
			echartService.resize();
		}
	}); 

    // btn day
    $('#btn-day').click(function(){
		params_time = 'day';
		// v_date = getToday();
		// v_date = '2019-12-01';
        // console.log(params_time);

		loadContent(params_time, v_date);
        $("#btn-month").prop("class","btn btn-light btn-sm");
		$("#btn-year").prop("class","btn btn-light btn-sm");
		$('#input-date-filter').datepicker("setDate", v_params_this_year);
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
    $('#btn-month').click(function(){
        params_time = 'month';
        // console.log(params_time);

		// v_date = getMonth();
		// callSummaryInteraction(params_time, v_date);
		// callSummaryInteraction(params_time, $("#select-month").val(), $("#select-year-on-month").val());
		loadContent(params_time, n, m);
		// callSummaryInteraction('month', '12', '2019');
		// console.log($("#select-year-only").val());
        $("#btn-day").prop("class","btn btn-light btn-sm");
        $("#btn-year").prop("class","btn btn-light btn-sm");
		$(this).prop("class","btn btn-red btn-sm");
		

		$('#filter-date').hide();
		$('#filter-month').show();
		// $('.ui-datepicker-calendar').css('display','none');
		$('#filter-year').hide();
    });

    // btn year
    $('#btn-year').click(function(){
        params_time = 'year';
        // console.log(params_time);

		// v_date = getYear();
		loadContent(params_time, $("#select-year-only").val(), 0);
        $("#btn-day").prop("class","btn btn-light btn-sm");
        $("#btn-month").prop("class","btn btn-light btn-sm");
		$(this).prop("class","btn btn-red btn-sm");
		
		$('#filter-date').hide();
		$('#filter-month').hide();
		$('#filter-year').show();
	});

	$('#input-date-filter').datepicker({
        dateFormat: 'yy-mm-dd',
        onSelect: function(dateText) {
			// console.log(this.value);
			v_date = this.value;
			loadContent(params_time, v_date,0);
        }
	});

	/*select option month*/ 
	$('#select-month').change(function(){
		v_month = $(this).val();
		// console.log(value);
		// callSummaryInteraction(params_time, v_month,v_year);
		loadContent('month', v_month, $("#select-year-on-month").val());
	});
	$('#select-year-on-month').change(function(){
		v_year = $(this).val();
		// console.log(value);
		loadContent('month', $("#select-month").val(), v_year);
	});
	/**/ 

	// select option year
	$('#select-year-only').change(function(){
		v_year = $(this).val();
		// console.log(this.value);
		loadContent('year', v_year, 0);
	});

    
})(jQuery);