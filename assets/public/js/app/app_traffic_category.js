var base_url = $('#base_url').val();
var params_time = '';
var category_kip = [];

$(document).ready(function () {
    params_time = 'day';
    v_date = '2019-12-01';

    //filter button active
    $("#btn-month").prop("class","btn btn-light btn-sm");
    $("#btn-year").prop("class","btn btn-light btn-sm");
    $("#btn-day").prop("class","btn btn-danger btn-sm");
    loadContent(params_time, v_date);

});

function loadContent(params, index){
    callSummaryPie(params, index);
    callCategory1(params, index);
    callCategory2(params, index);
    callCategory3(params, index);
    // callSummaryTrafficChannel();
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

function callCategory1(params, index){
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
            drawCategory1(response);
        },
        error: function (r) {
            alert("error");
            $("#filter-loader").fadeOut("slow");
        },
    });
}

function callCategory2(params, index){
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
            drawCategory2(response);
        },
        error: function (r) {
            alert("error");
            $("#filter-loader").fadeOut("slow");
        },
    });
}

function callCategory3(params, index){
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
            drawCategory3(response);
        },
        error: function (r) {
            alert("error");
            $("#filter-loader").fadeOut("slow");
        },
    });
}


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
    category_kip = trafficName;
    //pie chart
    var ctx = document.getElementById( "pieTCategory");
    ctx.height = 358;
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

function drawCategory1(response){
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
		name: category_kip[0],
		type: 'bar',
		stack: 'Stack',
		data: totalTraffic,
	}];
    var optionInfo = {
		grid: {
			top: '6',
			right: '12',
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
		series: chartdataInfo,
		color: ["#A5B0B6"]
	};
	var chartInfo = document.getElementById('echartInfoTraffic');
	var barChartInfo = echarts.init(chartInfo);
    barChartInfo.setOption(optionInfo);

}

function drawCategory2(response){
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
		name: category_kip[1],
		type: 'bar',
		stack: 'Stack',
		data: totalTraffic
	}];
    var optionComp = {
		grid: {
			top: '6',
			right: '12',
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
		series: chartdataComp,
		color: ["#009E8C"]
	};
	var chartComp = document.getElementById('echartCompTraffic');
	var barChartComp = echarts.init(chartComp);
    barChartComp.setOption(optionComp);

}

function drawCategory3(response){
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
		name: category_kip[2],
		type: 'bar',
		stack: 'Stack',
		data: totalTraffic
	}];
    var optionReq = {
		grid: {
			top: '6',
			right: '12',
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
		series: chartdataReq,
		color: ["#00436D"]
	};
	var chartReq = document.getElementById('echartReqTraffic');
	var barChartReq = echarts.init(chartReq);
    barChartReq.setOption(optionReq);

}

function drawSummaryTrafficChannelChart(response){
	//destroy div chart
	$('#echartTraffic').remove(); // this is my <canvas> element
    $('#Summary-channel').append('<div id="echartTraffic" class="chartsh-category overflow-hidden"></div>');
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

//jquery
(function ($) {

    // btn day
    $('#btn-day').click(function(){
        params_time = 'day';
        // console.log(params_time);

        loadContent(params_time , '2019-12-01');
        $("#btn-month").prop("class","btn btn-light btn-sm");
        $("#btn-year").prop("class","btn btn-light btn-sm");
        $(this).prop("class","btn btn-danger btn-sm");
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
        $(this).prop("class","btn btn-danger btn-sm");
    });

    // btn year
    $('#btn-year').click(function(){
        params_time = 'year';
        // console.log(params_time);
        // thisYears = getThisYear();
        loadContent(params_time , '2019');
        $("#btn-day").prop("class","btn btn-light btn-sm");
        $("#btn-month").prop("class","btn btn-light btn-sm");
        $(this).prop("class","btn btn-danger btn-sm");
    });
   
})(jQuery);