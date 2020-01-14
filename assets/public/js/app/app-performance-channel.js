$(function($) {
    "use strict";
    
     /*----echart summary ticket category----*/
	var chartdataTicket= [{
		name: 'ART',
		type: 'bar',
		stack: 'Stack',
		data: [14, 18, 20, 14, 29, 21, 25, 14,15,15,20,20]
	}, {
		name: 'AHT',
		type: 'bar',
		stack: 'Stack',
		data: [12, 14, 15, 50, 24, 24, 10, 20,30,30,30,30]
	}, {
		name: 'AST',
		type: 'bar',
		stack: 'Stack',
		data: [12, 14, 15, 50, 24, 24, 10, 20,40,40,40,40]
	}];
	/*----echart summary ticket category----*/
	var optionTicket = {
		grid: {
			top: '6',
			right: '10',
			bottom: '17',
			left: '70',
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
			data: ['Live Chat','SMS','Messenger','Email','Voice','Twitter DM','Twitter','Whatsapp','Line','Telegram','Facebook','Instagram'],
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
		series: chartdataTicket,
		color: ["#A5B0B6","#009E8C","#00436D"]
	};
	var chartTicket = document.getElementById('echartService');
	var barChartTicket = echarts.init(chartTicket);
    barChartTicket.setOption(optionTicket);
    
    // Horizontal Bar

    var MeSeContext = document.getElementById("barService");
    MeSeContext.height =200;
    var MeSeData = {
        labels : [
                    "ART",
                    "AHT",
                    "AST"
        ],
        datasets : [{
            label : "test",
            data :[50,60,70],
            backgroundColor : [
                                "#A5B0B6",
                                "#009E8C",
                                "#00436D"
                            ],
            hoverBackgroundColor : [
                             "#A5B0B6",
                             "#009E8C",
                             "#00436D"
            ]
        }]
    };
    var MeSeChart = new Chart(MeSeContext,{
        type : 'horizontalBar',
        data : MeSeData,
        options : {
            responsive: true,
            maintainAspectRatio: false,
            scales : {
                xAxes : [{
                    ticks : {
                        min : 0
                    }
                }],
                yAxes : [{
                    stacked : true
                }]
            },
            legend: {
                display: false
                }
        }
    });



    //sample datatable	
	$('#tablesPerformance').DataTable();
});