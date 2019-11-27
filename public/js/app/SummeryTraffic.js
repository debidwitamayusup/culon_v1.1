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
			alert();
			drawchart(data);
		},
		error:function(r){
			alert("error");
		},
	});

	function drawchart(r){
		/*----Echart2----*/
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
				data: r.data.row_date,
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
					data: r.data.case_in
				}, 
				{
					name: 'msg in',
					type: 'bar',
					data: r.data.msg_in
				},
			],
			color: ['#089e60', '#ff9933', ]
		};
		barChart.setOption(option);
	}
	
});