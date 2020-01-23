$(function ($){

    var MeSeContext = document.getElementById("barWallTicketClose");
    MeSeContext.height = 450;
    var MeSeData = {
        labels: [
            "Whatsapp",
            "Facebook",
            "Line",
            "Twitter",
            "Twitter DM",
            "Instagram",
            "Messenger",
            "Telegram",
            "Email",
            "Voice",
            "SMS",
            "Live Chat"
        ],
        datasets: [{
            label: "test",
            data: [1000,5000,4300,6000,7000,5000,10000,3500,6000,7000,2000,2500],
            backgroundColor: [
                "#31a550",
                "#467fcf",
                "#31a550",
                "#45aaf2",
                "#6574cd",
                "#fbc0d5",
                "#3866a6",
                "#343a40",
                "#e41313",
                "#ff9933",
                "#80cbc4",
                "#607d8b"
            ],
            hoverBackgroundColor: [
                "#A5B0B6",
                "#009E8C",
                "#00436D",
                "#31a550",
                "#467fcf",
                "#31a550",
                "#45aaf2",
                "#6574cd",
                "#fbc0d5",
                "#3866a6",
                "#343a40",
                "#e41313",
                "#ff9933",
                "#80cbc4",
                "#607d8b"
            ]
        }]
    };
    var MeSeChart = new Chart(MeSeContext, {
        type: 'horizontalBar',
        data: MeSeData,
        options: {
            responsive: true,
            maintainAspectRatio: false,
            scales: {
                xAxes: [{
                    ticks: {
                        min: 0
                    }
                }],
                yAxes: [{
                    stacked: true
                }]
            },
            legend: {
                display: false
            }
        }
    });



    // stacked bar this week
    var chartdata3 = [{
		name: 'Whatsapp',
		type: 'bar',
		stack: 'Stack',
		data: [10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10]
	}, {
		name: 'Facebook',
		type: 'bar',
		stack: 'Stack',
		data: [30,30,30,30,30,30,30,30,30,30,30,30,30,30,30,30,30,30,30,30,30,30,30,30,30,30,30,30,30,30,30]
	},{
		name: 'Twitter',
		type: 'bar',
		stack: 'Stack',
		data: [40,40,40,40,40,40,40,40,40,40,40,40,40,40,40,40,40,40,40,40,40,40,40,40,40,40,40,40,40,40,40]
	},{
		name: 'Twitter DM',
		type: 'bar',
		stack: 'Stack',
		data: [50,50,50,50,50,50,50,50,50,50,50,50,50,50,50,50,50,50,50,50,50,50,50,50,50,50,50,50,50,50,50]
	},{
		name: 'Instagram',
		type: 'bar',
		stack: 'Stack',
		data: [60,60,60,60,60,60,60,60,60,60,60,60,60,60,60,60,60,60,60,60,60,60,60,60,60,60,60,60,60,60,60]
	},{
		name: 'Messenger',
		type: 'bar',
		stack: 'Stack',
		data: [70,70,70,70,70,70,70,70,70,70,70,70,70,70,70,70,70,70,70,70,70,70,70,70,70,70,70,70,70,70,70]
	},{
		name: 'Telegram',
		type: 'bar',
		stack: 'Stack',
		data: [80,80,80,80,80,80,80,80,80,80,80,80,80,80,80,80,80,80,80,80,80,80,80,80,80,80,80,80,80,80,80]
	},{
		name: 'Line',
		type: 'bar',
		stack: 'Stack',
		data: [90,90,90,90,90,90,90,90,90,90,90,90,90,90,90,90,90,90,90,90,90,90,90,90,90,90,90,90,90,90,90]
	},{
		name: 'Email',
		type: 'bar',
		stack: 'Stack',
		data: [100,100,100,100,100,100,100,100,100,100,100,100,100,100,100,100,100,100,100,100,100,100,100,100,100,100,100,100,100,100,100]
	},{
		name: 'Voice',
		type: 'bar',
		stack: 'Stack',
		data: [120, 120, 120, 120, 120, 120, 120, 120, 120, 120, 120, 120, 120, 120, 120, 120, 120, 120, 120, 120, 120, 120, 120, 120, 120, 120, 120, 120, 120, 120, 120]
	},{
		name: 'SMS',
		type: 'bar',
		stack: 'Stack',
		data:  [140, 140, 140, 140, 140, 140, 140, 140, 140, 140, 140, 140, 140, 140, 140, 140, 140, 140, 140, 140, 140, 140, 140, 140, 140, 140, 140, 140, 140, 140, 140]
	},{
		name: 'Live Chat',
		type: 'bar',
		stack: 'Stack',
		data:  [160, 160, 160, 160, 160, 160, 160, 160, 160, 160, 160, 160, 160, 160, 160, 160, 160, 160, 160, 160, 160, 160, 160, 160, 160, 160, 160, 160, 160, 160, 160]
	}];
    /*----EchartThisWeek----*/
	var option6 = {
		grid: {
			top: '6',
			right: '10',
			bottom: '17',
			left: '32',
		},
		xAxis: {
			type: 'category',
			data: ['1','2','3','4','5','6','7','8','9','10','11','12','13','14','15','16','17','18','19','20','21','22','23','24','25','26','27','28','29','30','31'],
			
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
			type: 'value',
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
		series: chartdata3,
		color: ['#089e60', '#467fcf', '#45aaf2', '#6574cd', '#fbc0d5', '#3866a6', '#343a40', '#31a550', '#e41313', '#ff9933', '#80cbc4', '#607d8b']
	};
	var chart6 = document.getElementById('echartWeek');
	var barChart6 = echarts.init(chart6);
    barChart6.setOption(option6);
    // window.onresize = function() {
    //     barChart6.resize();
    // };

});