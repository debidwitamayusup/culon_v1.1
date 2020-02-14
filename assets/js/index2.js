(function ($) {
	"use strict";

	$(".sparkline_bar1").sparkline([5, 4, 5, 4, 3, 4, 5, 6, 4, 5, 6, 3, 2], {
		type: 'bar',
		height: 50,
		width: 180,
		barSpacing: 5,
		colorMap: {
			'9': '#a1a1a1'
		},
		barColor: '#089e60'
	});

	$(".sparkline_bar2").sparkline([5, 4, 5, 4, 3, 4, 5, 6, 4, 5, 6, 3, 2], {
		type: 'bar',
		height: 50,
		width: 180,
		barSpacing: 5,
		colorMap: {
			'9': '#a1a1a1'
		},
		barColor: '#1396cc'
	});

	$(".sparkline_bar3").sparkline([5, 4, 5, 4, 3, 4, 5, 6, 4, 5, 6, 3, 2], {
		type: 'bar',
		height: 50,
		width: 180,
		barSpacing: 5,
		colorMap: {
			'9': '#a1a1a1'
		},
		barColor: '#cc66ff'
	});

	$(".sparkline_bar4").sparkline([5, 4, 5, 4, 3, 4, 5, 6, 4, 5, 6, 3, 2], {
		type: 'bar',
		height: 50,
		width: 180,
		barSpacing: 5,
		colorMap: {
			'9': '#a1a1a1'
		},
		barColor: '#ff9933'
	});

	//document.getElementById('legend').innerHTML = myChart.generateLegend();

	/*---Morris (#graph5)---*/
	/*
	Comment date : 12/2/2019
	Morris.Bar({
		barGap:4,
		barSizeRatio:0.33,
		element: 'graph5',
		data: [{
			x: '2012',
			y: 3407,
			z: 2660
		}, {
			x: '2013',
			y: 3351,
			z: 3629
		}, {
			x: '2014',
			y: 3269,
			z: 2618
		}, {
			x: '2015',
			y: 3246,
			z: 1661
		}, {
			x: '2016',
			y: 3517,
			z: 2660
		}, {
			x: '2017',
			y: 3051,
			z: 2620

		}, {
			x: '2018',
			y: 3276,
			z: 2661
		}],
		barThickness : 10,
		xkey: 'x',
		ykeys: ['y', 'z'],
		labels: ['Expenses', 'Earning'],
		barColors: ['#089e60', '#1396cc']
	});
	/*---Morris (#graph5) closed---*/

})(jQuery);