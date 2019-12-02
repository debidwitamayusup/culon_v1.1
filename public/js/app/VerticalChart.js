( function ( $ ) {
    "use strict";
	var chartdata = [{
		name: 'Insta DM',
		type: 'bar',
		data: [10]
	}, {
		name: 'Live Chat',
		type: 'bar',
		data: [7]
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
			data: ['Whatsapp', 'Twitter', 'Facebook', 'Email', 'Telegram', 'Line', 'Voice', 'Instagram', 'Messenger', 'Twitter DM', 'Live Chat','Pesan'],
			splitLine: {
				lineStyle: {
					color: '#efefff'
				}
			},
			axisLine: {
				lineStyle: {
					color: '#1396cc'
				}
			},
			axisLabel: {
				fontSize: 10,
				color: '#7886a0'
			}
		},
		series: chartdata,
		color: ['#1c3353', '#42265e']
	};
	var chart3 = document.getElementById('echartVertical');
	var barChart3 = echarts.init(chart3);
	barChart3.setOption(option3);
	
} )( jQuery );