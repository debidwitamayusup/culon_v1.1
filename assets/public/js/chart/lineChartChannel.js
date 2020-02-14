( function ( $ ) {
    "use strict";
	var chartdata = [{
		name: 'channel',
		type: 'bar',
		data: [10, 15, 9, 18, 10,10, 15, 9, 18, 10,10, 35, 40, 30, 10,20, 15, 9, 48, 60,40, 35, 10, 20, 30,30, 55, 49, 68, 70]
	}];
	var chart = document.getElementById('barChartMonth');
	var barChart = echarts.init(chart);
	var option = {
		grid: {
			top: '6',
			right: '0',
			bottom: '17',
			left: '25',
		},
		xAxis: {
			data: ['1', '2', '3', '4', '5','6','7','8','9','10','11','12','13','14','15','16','17','18','19','20','21','22','23','24','25','26','27','28','29','30'],
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
		series: chartdata,
		color: ['#B22222']
	};
	barChart.setOption(option);

} )( jQuery );