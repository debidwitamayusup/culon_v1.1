( function ( $ ) {
    "use strict";
	var chartdata = [{
		name: 'channel',
		type: 'bar',
		data: [10, 15, 9, 18, 10,10, 15, 9, 18, 10,10, 35]
	}];
	var chart = document.getElementById('echartYear');
	var barChart = echarts.init(chart);
	var option = {
		grid: {
			top: '6',
			right: '0',
			bottom: '17',
			left: '25',
		},
		xAxis: {
			data: ['1', '2', '3', '4', '5','6','7','8','9','10','11','12'],
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