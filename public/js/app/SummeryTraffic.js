$(document).ready(function(){
	// console.log("test");
	var data = "";
	$.ajax({
		type:'get',
		url:'api/ApiAgentPerformance/summarycase',
		data:{},
		success:function(r){
			var response = JSON.parse(r);
			// console.log(response.data);
			data = response;
			drawchart(data);
		},
		error:function(r){
			alert("error");
		},
	});

	function drawchart(r){
		/*----Echart2----*/
		// console.log(r.data.length);
		//proses pengelompokan
		var data_x = [];
		var data_y = [];
		var data_msg_in = [];
		var i = 0;
		for(i = 0; i < r.data.length; i++){
			data_x.push(r.data[i].row_date);
			data_y.push(r.data[i].case_in);
			data_msg_in.push(r.data[i].msg_in);
		}
		// 
		// console.log(label);

		// draw chart
		var chart = document.getElementById('echart_tes');
		var barChart = echarts.init(chart);
		var option = {
			grid: {
				top: '6',
				right: '0',
				bottom: '17',
				left: '25',
			},
			xAxis: {
				// data: ['2014', '2015', '2016', '2017', '2018'],
				data: data_x,
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
				alwaysShowContent: true,
				triggerOn: 'mousemove',
				trigger: 'axis',
				axisPointer: {
					label: {
						show: false,
					}
				}
			},
			yAxis: {
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
			// series: chartdata,
			series: [
				{
					name: 'case in',
					type: 'bar',
					data: data_y
				}, 
				{
					name: 'msg in',
					type: 'bar',
					data: data_msg_in
				},
			],
			color: ['#089e60', '#ff9933', ]
		};
		barChart.setOption(option);
	}
	
});