( function ( $ ) {
    "use strict";
	var chartdata = [{
		name: 'whatsapp',
		type: 'bar',
		data: [10, 15, 9, 18, 10, 15]
	}, {
		name: 'twitter',
		type: 'bar',
		data: [10, 14, 10, 15, 9, 25]
	}];
	/*----Echart3----*/
	var option3 = {
		grid: {
			top: '6',
			right: '30',
			bottom: '17',
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
			data: ['Whatsapp', 'Twitter', 'Facebook', 'Email', 'Telegram', 'Line', 'Voice', 'Instagram', 'Messenger', 'Twitter DM', 'Live Chat','Insta DM'],
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
		color: ['#1396cc', '#1389jc']
	};
	var chart3 = document.getElementById('echartVertical');
	var barChart3 = echarts.init(chart3);
	barChart3.setOption(option3);
} )( jQuery );