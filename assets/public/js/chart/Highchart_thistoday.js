(function($) {
    "use strict";
	/* ---hightchart5----*/

	Highcharts.chart('highchart5', {
		chart: {
			type: 'bar'
		},
		title: {
			text: ''
		},
		exporting: { enabled: false },
		credits: {
			enabled: false
		},
		subtitle: {
			text: ''
		},
		xAxis: {
			categories: ['Whatsapp', 'Twitter', 'Facebook', 'Email', 'Telegram', 'Line', 'Voice', 'Instagram', 'Messenger', 'Twitter DM', 'Live Chat','Insta DM'],
			title: {
				text: null
			}
		},
		yAxis: {
			min: 0,
			title: {
				text: '',
				align: 'high'
			},
			labels: {
				overflow: 'justify'
			}
		},
		tooltip: {
			valueSuffix: ' millions'
		},
		plotOptions: {
			bar: {
				dataLabels: {
					enabled: true
				}
			}
		},
		legend: {
			layout: 'vertical',
			align: 'right',
			verticalAlign: 'top',
			x: -40,
			y: 80,
			enabled: false,
			floating: true,
			borderWidth: 1,
			backgroundColor: ((Highcharts.theme && Highcharts.theme.legendBackgroundColor) || '#FFFFFF'),
			shadow: true
		},
		colors: ['#8c31e4', '#ff9933', '#cc66ff', '#089e60', '#1396cc'],
		credits: {
			enabled: false
		},
		series: [{
			name: 'Year 1800',
			data: [107, 31, 635, 203]
		}, {
			name: 'Year 1900',
			data: [133, 156, 947, 408]
		}, {
			name: 'Year 2000',
			data: [814, 841, 3714, 727]
		}, {
			name: 'Year 2010',
			data: [1216, 1001, 4436, 738]
		}, {
			name: 'Year 2018',
			data: [1500, 2051, 3526, 968]
		}]
	});

})(jQuery);