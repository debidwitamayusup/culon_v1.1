var base_url = $('#base_url').val();

$(document).ready(function () {
    loadContent();
});

function loadContent(){
    callNfcrPie();
    callNfcrInfo();
    callNfcrComplaint();
    callNfcrRequest();
    callNfcrPerCategory();
    callNfcrSummaryTraffic();
}

function callNfcrPie(){
    $("#filter-loader").fadeIn("slow");
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
            // console.log(response);
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
            // console.log(response);
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
            // console.log(response);
            drawSummaryTrafficNfcr(response);
        },
        error: function (r) {
            alert("error");
        },
    });
}

function callNfcrPerCategory(){
    $.ajax({
        type: 'post',
        url: base_url + 'api/OperationPerformance/NfcrController/getNfcrPerCategory',
        success: function (r) { 
            var response = JSON.parse(r);
            // console.log(response);
            drawTableData(response);
        },
        error: function (r) {
            alert("error");
        },
    });
}

function drawPieChart(response){
    let totalNfcr = []

    //pie chart
    var ctx = document.getElementById( "pieNFCR");
    ctx.height = 374;
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

                            }],
            labels: ['FCR', 'N-FCR']
        },
        options: {
            responsive: true,
			maintainAspectRatio: false,
			legend :{
				position : "bottom"
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
			  }
			},
			pieceLabel: {
                render: 'legend',
                fontColor: '#000',
                position: 'outside',
                segment: true
            }
        }
    } );
}

function drawInfoChart(response){
	let channelName = []
    let totalNfcr = []
    let totalFcr = []

    // draw card yang ada datanya
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
   
	var option_info = {
		grid: {
			top: '6',
			right: '13',
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
		series: chartdata3,
		color: ["#31A550","#3866A6"]
	};

	var chart_info = document.getElementById('echartNFCR-info');
	var barChart6 = echarts.init(chart_info);
    barChart6.setOption(option_info);
}

function drawComplaintChart(response){
	let channelName = []
    let totalNfcr = []
    let totalFcr = []

    // draw card yang ada datanya
    response.data.forEach(function (value, index) {
		channelName.push(value.channel_name);
		totalNfcr.push(value.nfcr);
		totalFcr.push(value.fcr);
    });
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
	var option_info = {
		grid: {
			top: '6',
			right: '13',
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
		series: chartdata3,
		color: ["#31A550","#3866A6"]
	};

	var chart_info = document.getElementById('echartNFCR-comp');
	var barChart6 = echarts.init(chart_info);
    barChart6.setOption(option_info);

}

function drawRequestChart(response){
	let channelName = []
    let totalNfcr = []
    let totalFcr = []

    // draw card yang ada datanya
    response.data.forEach(function (value, index) {
		channelName.push(value.channel_name);
		totalNfcr.push(value.nfcr);
		totalFcr.push(value.fcr);
    });
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
	var option_info = {
		grid: {
			top: '6',
			right: '13',
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
		series: chartdata3,
		color: ["#31A550","#3866A6"]
	};

	var chart_info = document.getElementById('echartNFCR-req');
	var barChart6 = echarts.init(chart_info);
    barChart6.setOption(option_info);

    $('#category3').html(response.data[0].category);
}

function drawSummaryTrafficNfcr(response){
	let channelName = []
    let totalNfcr = []
    let totalFcr = []

    // draw card yang ada datanya
    response.data.forEach(function (value, index) {
		channelName.push(value.channel_name);
		totalNfcr.push(value.nfcr);
		totalFcr.push(value.fcr);
    });
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
			right:'20',
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
			}
		},
		series: chartdata3,
		color: ["#31A550","#3866A6"]
	};

	var chart_summary = document.getElementById('echartNFCR-summary');
	var barChart_summary = echarts.init(chart_summary);
	// barChart_summary.height=800;
	barChart_summary.setOption(option_summary);	
}

function drawTableData(response){
	var sum_fcr1=0, sum_nfcr1=0,sum_fcr2=0,sum_nfcr2=0,sum_fcr3=0, sum_nfcr3=0,summarize = 0,t_summarize =0;
	//for append title on echart
    $('#titleCategory1').html(response.data[0].category_1);
    $('#titleCategory2').html(response.data[0].category_2);
    $('#titleCategory3').html(response.data[0].category_3);

	$("#mytbody_nfcr").empty();
	$("#mythead_nfcr").empty();
    if(response.data.length != 0){
    	$('#table-avg-interval').find('thead').append('<tr>'+
	            '<th rowspan="2" class="align-middle">No.</th>'+
	            '<th rowspan="2" class="align-middle">Channel</th>'+
	            '<th colspan="2" class="bg-blue-1 align-content-md-center text-white">'+response.data[0].category_1+'</th>'+
	            '<th colspan="2" class="bg-dark">'+response.data[0].category_2+'</th>'+
				'<th colspan="2" class="bg-primary text-white">'+response.data[0].category_3+'</th>'+
				'<th rowspan="2" class="align-middle font-weight-extrabold"> TOTAL </th>'+
				
            '</tr>'+
            '<tr>'+
                '<th class="bg-green text-white">FCR</th>'+
                '<th class="bg-blue-dark text-white">N-FCR</th>'+
                '<th class="bg-green text-white">FCR</th>'+
                '<th class="bg-blue-dark text-white">N-FCR</th>'+
                '<th class="bg-green text-white">FCR</th>'+
				'<th class="bg-blue-dark text-white">N-FCR</th>'+
				
            '</tr>');

    	var i = 0;
        response.data.forEach(function (value, index) {
			summarize = parseInt(value.fcr_1)+parseInt(value.nfcr_1)+parseInt(value.fcr_2)+parseInt(value.nfcr_2)+parseInt(value.fcr_3)+parseInt(value.nfcr_3);
			t_summarize = parseInt(summarize)+parseInt(t_summarize);
			sum_fcr1=parseInt(sum_fcr1)+parseInt(value.fcr_1);
			sum_nfcr1=parseInt(sum_nfcr1)+parseInt(value.nfcr_1);
			sum_fcr2=parseInt(sum_fcr2)+parseInt(value.fcr_2);
			sum_nfcr2=parseInt(sum_nfcr2)+parseInt(value.nfcr_2);
			sum_fcr3=parseInt(sum_fcr3)+parseInt(value.fcr_3);
			sum_nfcr3=parseInt(sum_nfcr3)+parseInt(value.nfcr_3);
            $('#table-avg-interval').find('tbody').append('<tr>'+
            '<td class="text-center">'+(i+1)+'</td>'+
            '<td class="text-left">'+value.channel_name+'</td>'+
            '<td class="text-right">'+addCommas(value.fcr_1)+'</td>'+
            '<td class="text-right">'+addCommas(value.nfcr_1)+'</td>'+
            '<td class="text-right">'+addCommas(value.fcr_2)+'</td>'+
            '<td class="text-right">'+addCommas(value.nfcr_2)+'</td>'+
            '<td class="text-right">'+addCommas(value.fcr_3)+'</td>'+
			'<td class="text-right">'+addCommas(value.nfcr_3)+'</td>'+
			'<td class="text-right font-weight-extrabold bg-total">'+addCommas(summarize)+'</td>'+
            '</tr>');
			i++;
			
		});
		$('#table-avg-interval').find('tbody').append('<tr class="bg-total font-weight-extrabold">'+
            '<td colspan="2" class="text-right">TOTAL</td>'+
            '<td class="text-right">'+addCommas(sum_fcr1)+'</td>'+
            '<td class="text-right">'+addCommas(sum_nfcr1)+'</td>'+
            '<td class="text-right">'+addCommas(sum_fcr2)+'</td>'+
            '<td class="text-right">'+addCommas(sum_nfcr2)+'</td>'+
            '<td class="text-right">'+addCommas(sum_fcr3)+'</td>'+
			'<td class="text-right">'+addCommas(sum_nfcr3)+'</td>'+
			'<td class="text-right">'+addCommas(t_summarize)+'</td>'+
            '</tr>');
    }else{
        $('#table_avg_traffic').find('tbody').append('<tr>'+
            '<td colspan=6> No Data </td>'+
            '</tr>');
    }
    //fade out loading
    $("#filter-loader").fadeOut("slow");
}