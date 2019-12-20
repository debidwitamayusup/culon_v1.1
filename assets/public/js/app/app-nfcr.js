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
    ctx.height = 312;
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

                            } ],
            labels: ['FCR', 'N-FCR']
        },
        options: {
            responsive: true,
			maintainAspectRatio: false,
			legend :{
				position : "bottom"
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
			right: '5',
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
			right: '5',
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
			right: '5',
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
		series: chartdata3,
		color: ["#31A550","#3866A6"]
	};

	var chart_summary = document.getElementById('echartNFCR-summary');
	var barChart_summary = echarts.init(chart_summary);
	barChart_summary.height=800;
	barChart_summary.setOption(option_summary);	
}

function drawTableData(response){
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
	            '<th colspan="2" class="bg-gray2 text-black">'+response.data[0].category_2+'</th>'+
	            '<th colspan="2" class="bg-green-2 text-white">'+response.data[0].category_3+'</th>'+
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
            $('#table-avg-interval').find('tbody').append('<tr>'+
            '<td>'+(i+1)+'</td>'+
            '<td>'+value.channel_name+'</td>'+
            '<td>'+addCommas(value.fcr_1)+'</td>'+
            '<td>'+addCommas(value.nfcr_1)+'</td>'+
            '<td>'+addCommas(value.fcr_2)+'</td>'+
            '<td>'+addCommas(value.nfcr_2)+'</td>'+
            '<td>'+addCommas(value.fcr_3)+'</td>'+
            '<td>'+addCommas(value.nfcr_3)+'</td>'+
            '</tr>');
            i++;
        });
    }else{
        $('#table_avg_traffic').find('tbody').append('<tr>'+
            '<td colspan=6> No Data </td>'+
            '</tr>');
    }
    //fade out loading
    $("#filter-loader").fadeOut("slow");
}