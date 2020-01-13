var base_url = $('#base_url').val();
var params_time = '';
var category_kip = [];
var v_date='';
var v_month='';
var v_year='';

$(document).ready(function () {
    params_time = 'day';
    v_date = '2019-12-01';
	v_month = getMonth();
	v_year = getYear();
    //filter button active
    // $("#btn-month").prop("class","btn btn-light btn-sm");
    // $("#btn-year").prop("class","btn btn-light btn-sm");
    $("#btn-day").prop("class","btn btn-red btn-sm");

	loadContent(params_time, v_date, 0);

	// ------datepiker
	$('#input-date-filter').datepicker("setDate", v_date);
	$('#filter-date').show();
	$('#filter-month').hide();
	$('#filter-year').hide();
	setMonthPicker();
	setYearPicker();

});
	
$('#input-date-filter').datepicker({
    dateFormat: 'yy-mm-dd',
    onSelect: function(dateText) {
		// console.log(this.value);
		v_date = this.value;
		// callSummaryPie(params_time, v_date,0);
		loadContent(params_time, v_date,0);
    }
});

function loadContent(params, index, year){
    callSummaryPie(params, index, year);
    // callCategory1(params, index, year);
    // callCategory2(params, index, year);
    // callCategory3(params, index, year);
    // callSummaryTrafficChannel();
    // console.log(params);
    // console.log(index);
}

//thausands separator
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

//fungsi untuk sorting table
function sortTable() {
  var table, rows, switching, i, x, y, shouldSwitch;
  table = document.getElementById("table_avg_traffic");
  switching = true;
  while (switching) {
    switching = false;
    rows = table.rows;
    for (i = 1; i < (rows.length - 1); i++) {
      shouldSwitch = false;
      //sort berdasarkan index <td>
      x = rows[i].getElementsByTagName("TD")[1];
      y = rows[i + 1].getElementsByTagName("TD")[1];
      if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
        shouldSwitch = true;
        break;
      }
    }
    if (shouldSwitch) {
      rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
      switching = true;
    }
  }
}

function callSummaryPie(params, index, year){
	$("#filter-loader").fadeIn("slow");
    $.ajax({
        type: 'post',
        url: base_url + 'api/OperationPerformance/TrafficCategory/getSummaryPie',
        data: {
        	params: params,
        	index: index,
        	year: year
        },
        success: function (r) { 
            var response = JSON.parse(r);
            // console.log(response);
            drawPieChart(response);
            drawSummaryTrafficChannelChart(response);
            drawTableData(response);
            drawCategory1(response);
            drawCategory2(response);
            drawCategory3(response);
            // $("#filter-loader").fadeOut("slow");
        },
        error: function (r) {
            alert("error");
            $("#filter-loader").fadeOut("slow");
        },
    });
}

 
// function callCategory1(params, index, year){
// 	$.ajax({
//         type: 'post',
//         url: base_url + 'api/OperationPerformance/TrafficCategory/getCategory1',
//         data: {
//         	params: params,
//         	index: index,
//         	year: year
//         },
//         success: function (r) { 
//             var response = JSON.parse(r);
//             // console.log(response);
//             drawCategory1(response);
//         },
//         error: function (r) {
//             alert("error");
//             $("#filter-loader").fadeOut("slow");
//         },
//     });
// }

// function callCategory2(params, index, year){
// 	$.ajax({
//         type: 'post',
//         url: base_url + 'api/OperationPerformance/TrafficCategory/getCategory2',
//         data: {
//         	params: params,
//         	index: index,
//         	year: year
//         },
//         success: function (r) { 
//             var response = JSON.parse(r);
//             // console.log(response);
//             drawCategory2(response);
//         },
//         error: function (r) {
//             alert("error");
//             $("#filter-loader").fadeOut("slow");
//         },
//     });
// }

// function callCategory3(params, index, year){
// 	$.ajax({
//         type: 'post',
//         url: base_url + 'api/OperationPerformance/TrafficCategory/getCategory3',
//         data: {
//         	params: params,
//         	index: index,
//         	year: year
//         },
//         success: function (r) { 
//             var response = JSON.parse(r);
//             // console.log(response);
//             drawCategory3(response);
//         },
//         error: function (r) {
//             alert("error");
//             $("#filter-loader").fadeOut("slow");
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
    if (response.data.length!=0) {
	    response.data.summary.forEach(function (value, index) {
			trafficName.push(value.category);
			totalTraffic.push(value.total_kip);

	    });
	    category_kip = trafficName;
	    //pie chart
    
	    var ctx = document.getElementById( "pieTCategory");
	    ctx.height = 322;
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
				},
				tooltips: {
				  callbacks: {
						label: function(tooltipItem, data) {
							var value = data.datasets[0].data[tooltipItem.index];
							value = value.toString();
							value = value.split(/(?=(?:...)*$)/);
							value = value.join(',');
							return value;
						}
				  } // end callbacks:
				}, //end tooltips
				pieceLabel: {
	                render: 'legend',
	                fontColor: '#000',
	                position: 'outside',
	                segment: true
	            }
	        }
	    } );

	    //set header for echart
	    $('#category1').html(trafficName[0]);
	    $('#category2').html(trafficName[1]);
	    $('#category3').html(trafficName[2]);
	    // console.log(trafficName[0]);
	}else{
		$('#pieTCategory').append('<div id="chart-no-data" class="text-center mt-9"><span>No Data</span></div>');
	}
}



function drawCategory1(response){
	//destroy div 
    $('#echartInfoTraffic').remove(); // this is my <canvas> element
    $('#canvas-cat1').append('<div id="echartInfoTraffic" class="chartsh-horizontal overflow-hidden">');

	let channelName = []
    let totalTraffic = []

    if (response.data.length!=0) {
	    // draw card yang ada datanya
	    // console.log(response.data);
	    response.data.traffic_channel.forEach(function (value, index) {
			channelName.push(value.channel_name);
			totalTraffic.push(value.total_1);
	    });
	     ///chartInformation
	    var chartdataInfo = [{
			name: response.data.summary[0].category,
			type: 'bar',
			stack: 'Stack',
			data: totalTraffic,
		}];
	    var optionInfo = {
			grid: {
				top: '6',
				right: '11',
				bottom: '20',
				left: '65',
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
					color: '#7886a0',
					formatter: function (value, index) {
						if(value >= 1000){
							var res = (value/1000);
							return res+'K'
						}else {
							return value;
						}
					}
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
					// formatter: function (value, index) {
					// 	if (/\s/.test(value)) {
					// 		var teks = '';
					// 		for(var i=0;i<value.length;i++){
					// 			if(value[i] == " "){
					// 				teks = teks + '\n';
					// 			}else{
					// 				teks = teks + value[i];
					// 			}
					// 		}
					// 		return teks;
					// 	}else{
					// 		return value;
					// 	} 
					// }
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
				position: function (pos, params, dom, rect, size) {
					// tooltip will be fixed on the right if mouse hovering on the left,
					// and on the left if hovering on the right.
					// console.log(pos);
					var obj = {top: pos[0]};
					obj[['left', 'right'][+(pos[0] < size.viewSize[0] / 2)]] = 5;
					return obj;
				},
			},
			series: chartdataInfo,
			color: ["#A5B0B6"]
		};

		var chartInfo = document.getElementById('echartInfoTraffic');
		var barChartInfo = echarts.init(chartInfo);
	    barChartInfo.setOption(optionInfo);
	}else{
		// console.log("kosong")
		$('#echartInfoTraffic').append('<div id="chart-no-data" class="text-center mt-9"><span>No Data</span></div>');
	}
}

function drawCategory2(response){
	//destroy div chart
	$('#echartCompTraffic').remove(); // this is my <canvas> element
    $('#canvas-cat2').append('<div id="echartCompTraffic" class="chartsh-horizontal overflow-hidden">');

	let channelName = []
    let totalTraffic = []

    if (response.data.length!=0) {
	    // draw card yang ada datanya
	    // console.log(response.data);
	    response.data.traffic_channel.forEach(function (value, index) {
			channelName.push(value.channel_name);
			totalTraffic.push(value.total_2);
	    });

	    //chartComplaint
	    var chartdataComp = [{
			name: response.data.summary[1].category,
			type: 'bar',
			stack: 'Stack',
			data: totalTraffic
		}];
	    var optionComp = {
			grid: {
				top: '6',
				right: '11',
				bottom: '20',
				left: '65',
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
					color: '#7886a0',
					formatter: function (value, index) {
						if(value >= 1000){
							var res = (value/1000);
							return res+'K'
						}else {
							return value;
						}
					}
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
					// formatter: function (value, index) {
					// 	if (/\s/.test(value)) {
					// 		var teks = '';
					// 		for(var i=0;i<value.length;i++){
					// 			if(value[i] == " "){
					// 				teks = teks + '\n';
					// 			}else{
					// 				teks = teks + value[i];
					// 			}
					// 		}
					// 		return teks;
					// 	}else{
					// 		return value;
					// 	} 
					// }
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
				position: function (pos, params, dom, rect, size) {
					// tooltip will be fixed on the right if mouse hovering on the left,
					// and on the left if hovering on the right.
					// console.log(pos);
					var obj = {top: pos[0]};
					obj[['left', 'right'][+(pos[0] < size.viewSize[0] / 2)]] = 5;
					return obj;
				},
			},
			series: chartdataComp,
			color: ["#009E8C"]
		};
		var chartComp = document.getElementById('echartCompTraffic');
		var barChartComp = echarts.init(chartComp);
	    barChartComp.setOption(optionComp);
	}else{
		$('#echartCompTraffic').append('<div id="chart-no-data" class="text-center mt-9"><span>No Data</span></div>');
	}

}

function drawCategory3(response){
	//destroy div chart
	$('#echartReqTraffic').remove(); // this is my <canvas> element
    $('#canvas-cat3').append('<div id="echartReqTraffic" class="chartsh-horizontal overflow-hidden">');

	let channelName = []
    let totalTraffic = []

    if (response.data.length!=0) {
	    // draw card yang ada datanya
	    // console.log(response.data);
	    response.data.traffic_channel.forEach(function (value, index) {
			channelName.push(value.channel_name);
			totalTraffic.push(value.total_3);
	    });

	    //chartRequest
	    var chartdataReq = [{
			name: response.data.summary[2].category,
			type: 'bar',
			stack: 'Stack',
			data: totalTraffic
		}];
	    var optionReq = {
			grid: {
				top: '6',
				right: '11',
				bottom: '20',
				left: '65',
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
					color: '#7886a0',
					formatter: function (value, index) {
						if(value >= 1000){
							var res = (value/1000);
							return res+'K'
						}else {
							return value;
						}
					}
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
					// formatter: function (value, index) {
					// 	if (/\s/.test(value)) {
					// 		var teks = '';
					// 		for(var i=0;i<value.length;i++){
					// 			if(value[i] == " "){
					// 				teks = teks + '\n';
					// 			}else{
					// 				teks = teks + value[i];
					// 			}
					// 		}
					// 		return teks;
					// 	}else{
					// 		return value;
					// 	} 
					// }
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
				position: function (pos, params, dom, rect, size) {
					// tooltip will be fixed on the right if mouse hovering on the left,
					// and on the left if hovering on the right.
					// console.log(pos);
					var obj = {top: pos[0]};
					obj[['left', 'right'][+(pos[0] < size.viewSize[0] / 2)]] = 5;
					return obj;
				},
			},
			series: chartdataReq,
			color: ["#00436D"]
		};
		var chartReq = document.getElementById('echartReqTraffic');
		var barChartReq = echarts.init(chartReq);
	    barChartReq.setOption(optionReq);
	}else{
		$('#echartReqTraffic').append('<div id="chart-no-data" class="text-center mt-9"><span>No Data</span></div>');
	}

}

function drawSummaryTrafficChannelChart(response){
	//destroy div chart
	$('#echartTraffic').remove(); // this is my <canvas> element
    $('#Summary-channel').append('<div id="echartTraffic" class="chartsh-category overflow-hidden"></div>');
	"use strict"
	let category = []
    let arr_channel = []

    if (response.data.length!=0) {
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
				right: '20',
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
					color: '#7886a0',
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
					// formatter: function (value, index) {
					// 	if (/\s/.test(value)) {
					// 		var teks = '';
					// 		for(var i=0;i<value.length;i++){
					// 			if(value[i] == " "){
					// 				teks = teks + '\n';
					// 			}else{
					// 				teks = teks + value[i];
					// 			}
					// 		}
					// 		return teks;
					// 	}else{
					// 		return value;
					// 	} 
					// }
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
			color: [ "#A5B0B6","#009E8C","#00436D"]
		};
		var chart6 = document.getElementById('echartTraffic');
		var barChart6 = echarts.init(chart6);
	    barChart6.setOption(option6);
	}else{
		$('#echartTraffic').append('<div id="chart-no-data" class="text-center mt-9"><span>No Data</span></div>');
	}

}

function drawTableData(response){
	$("#mytbody_avg_traffic").empty();
	$("#mythead_avg_traffic").empty();
    if(response.data.length != 0){
    	$('#table_avg_traffic').find('thead').append('<tr>'+
            '<td class="text-center">No.</td>'+
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
            '<td class="text-sm font-weight-600 text-right">'+addCommas(value.total_1)+'</td>'+
            '<td class="text-sm font-weight-600 text-right">'+addCommas(value.total_2)+'</td>'+
            '<td class="text-sm font-weight-600 text-right">'+addCommas(value.total_3)+'</td>'+
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

    // btn day
    $('#btn-day').click(function(){
		params_time = 'day';
		// v_date = getToday();
		v_date = '2019-12-01';
        // console.log(params_time);

        // loadContent(params_time , '2019-12-01');
		loadContent(params_time, v_date, 0);
        $("#btn-month").prop("class","btn btn-light btn-sm");
        $("#btn-year").prop("class","btn btn-light btn-sm");
		$(this).prop("class","btn btn-red btn-sm");
		
		$('#filter-date').show();
		$('#filter-month').hide();
		$('#filter-year').hide();
    });

    // btn month
    $('#btn-month').click(function(){
        params_time = 'month';
        // console.log(params_time);
        // thisMonths = getThisMonth();
        // console.log(thisMonths);
        // loadContent(params_time , thisMonths);
        // loadContent(params_time , '12');
		loadContent(params_time, $("#select-month").val(), $("#select-year-on-month").val());
        $("#btn-day").prop("class","btn btn-light btn-sm");
        $("#btn-year").prop("class","btn btn-light btn-sm");
		$(this).prop("class","btn btn-red btn-sm");
		
		$('#filter-date').hide();
		$('#filter-month').show();
		$('#filter-year').hide();
    });

    // btn year
    $('#btn-year').click(function(){
        params_time = 'year';
        // console.log(params_time);
        // thisYears = getThisYear();
        // loadContent(params_time , '2019');
        loadContent(params_time, $("#select-year-only").val(), 0);
        $("#btn-day").prop("class","btn btn-light btn-sm");
        $("#btn-month").prop("class","btn btn-light btn-sm");
		$(this).prop("class","btn btn-red btn-sm");
		
		$('#filter-date').hide();
		$('#filter-month').hide();
		$('#filter-year').show();
    });

    /*select option month on month*/ 
	$('#select-month').change(function(){
		v_month = $(this).val();
		// console.log(value);
		// callSummaryInteraction(params_time, v_month,v_year);
		// console.log($("#select-year-on-month").val());
		// console.log(v_month);
		loadContent('month', v_month, $("#select-year-on-month").val());
		// loadContent('month', v_month, '2019');
	});

	/*select option year on month*/ 
	$('#select-year-on-month').change(function(){
		v_year_on_month = $(this).val();
		// console.log(value);
		// callSummaryInteraction(params_time, v_month,v_year);
		// console.log($("#select-year-on-month").val());
		// console.log(v_month);
		loadContent('month', $("#select-month").val(), v_year_on_month);
		// loadContent('month', v_month, '2019');
	});
	
	/*select option year on year*/ 
	$('#select-year-only').change(function(){
		v_year_on_year = $(this).val();
		// console.log(value);
		// callSummaryInteraction(params_time, v_month,v_year);
		// console.log($("#select-year-on-month").val());
		// console.log(v_month);
		loadContent('year', v_year_on_year, 0);
		// loadContent('month', v_month, '2019');
	});

	$('#input-date-filter').datepicker({
        dateFormat: 'yy-mm-dd',
        onSelect: function(dateText) {
			// console.log(this.value);
			v_date = this.value;
			loadContent(params_time, v_date,0);
        }
	});
})(jQuery);