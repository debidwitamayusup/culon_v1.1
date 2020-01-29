var months = [
    'January', 'February', 'March', 'April', 'May',
    'June', 'July', 'August', 'September',
    'October', 'November', 'December'
    ];
var base_url = $('#base_url').val();
var d = new Date();
var n = d.getMonth()+1;
var m = d.getFullYear();

$(document).ready(function () {
    drawStackedBar('month', '10', '2019');
});

function addCommas(commas)
{
    commas += '';
    x = commas.split('.');
    x1 = x[0];
    x2 = x.length > 1 ? '.' + x[1] : '';
    var rgx = /(\d+)(\d{3})/;
    while (rgx.test(x1)) {
        x1 = x1.replace(rgx, '$1' + ',' + '$2');
    }
    return x1 + x2;
}

function destroyChartInterval(){
    // destroy chart interval 
    $('#echartWeek').remove(); // this is my <canvas> element
    $('#echartWeekDiv').append('<div id="echartWeek" class="chartsh-ticket overflow-hidden"></div>');
}

function drawStackedBar(params,index, params_year){
	destroyChartInterval();
     $("#filter-loader").fadeIn("slow");
    // var getMontName = monthNumToName(month);
    var data = "";
    var base_url = $('#base_url').val();
    //call traffic per month
    $.ajax({
        type: 'POST',
        url: base_url + 'api/Wallboard/WallboardController/summaryTicketCloseWall',
        data: {
            "params": params,
            // "channel_name": channel_name,
            "index": index,
            "params_year": params_year,
        },
        success: function (r) {
            // var response = JSON.parse(r);
            var response = r;
            drawHorizontalChart(response);
            console.log(response);
        var chartdata3 = [{
            name: 'Whatsapp',
            type: 'bar',
            stack: 'Stack',
            data: response.data[10].total_traffic
        }, {
            name: 'Facebook',
            type: 'bar',
            stack: 'Stack',
            data: response.data[5].total_traffic
        },{
            name: 'Twitter',
            type: 'bar',
            stack: 'Stack',
            data: response.data[7].total_traffic
        },{
            name: 'Twitter DM',
            type: 'bar',
            stack: 'Stack',
            data: response.data[11].total_traffic
        },{
            name: 'Instagram',
            type: 'bar',
            stack: 'Stack',
            data: response.data[9].total_traffic
        },{
            name: 'Messenger',
            type: 'bar',
            stack: 'Stack',
            data: response.data[6].total_traffic
        },{
            name: 'Telegram',
            type: 'bar',
            stack: 'Stack',
            data: response.data[4].total_traffic
        },{
            name: 'Line',
            type: 'bar',
            stack: 'Stack',
            data: response.data[8].total_traffic
        },{
            name: 'Email',
            type: 'bar',
            stack: 'Stack',
            data: response.data[1].total_traffic
        },{
            name: 'Voice',
            type: 'bar',
            stack: 'Stack',
            data: response.data[0].total_traffic
        },{
            name: 'SMS',
            type: 'bar',
            stack: 'Stack',
            data: response.data[3].total_traffic
        },{
            name: 'Live Chat',
            type: 'bar',
            stack: 'Stack',
            data: response.data[2].total_traffic
        },{
            name: 'Chat Bot',
            type: 'bar',
            stack: 'Stack',
            data: response.data[12].total_traffic
        }];
        /*----EchartMonth*/
        var option6 = {
            // grid: {
            //  top: '6',
            //  right: '15',
            //  bottom: '17',
            //  left: '32',
            // },
            tooltip: {
                trigger: 'axis',
                 show: true,
                 showContent: true,
                 alwaysShowContent: false,
                 triggerOn: 'mousemove',
                 trigger: 'axis',
                 axisPointer: {
                     label: {
                         show: true,
                         color: '#7886a0',
                         type: 'shadow',
                         fontSize: 8
                         // formatter : function (){
                         //     return label_lng;
                         // }
                     }
                 },
                 // position: ['86%', '0%']
                 position: function (pos, params, dom, rect, size) {
                     // tooltip will be fixed on the right if mouse hovering on the left,
                     // and on the left if hovering on the right.
                     // console.log(pos);
                     var obj = {top: pos[6]};
                     obj[['left', 'right'][+(pos[0] < size.viewSize[0] / 2)]] = 5;
                     return obj;
                 },
            },
            legend:{
                data: ['Whatsapp','Facebook','Twitter','Twitter DM','Instagram','Messenger','Telegram','Line','Email','Voice','SMS','Live Chat', 'Chat Bot'],
                left: 'center',
                // top: 'bottom',
                itemWidth :12,
                padding: [10, 10,40, 10]
            },

            grid: {
                // top:'2%',
                // left: '1%',
                // right: '2%',
                // bottom: '3%',
                top: '19%',
                right: '3%',
                bottom: '7%',
                left: '3%',
                containLabel: true
            },
            xAxis: {
                type: 'category',
                data: response.dates,
                
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
            color: ['#089e60', '#467fcf', '#45aaf2', '#6574cd', '#fbc0d5', '#3866a6', '#343a40', '#31a550', '#e41313', '#ff9933', '#80cbc4', '#607d8b', '#6e273e']
        };
        var chart6 = document.getElementById('echartWeek');
        var barChart6 = echarts.init(chart6);
        barChart6.setOption(option6);
        $("#filter-loader").fadeOut("slow");
    },
        error: function (r) {
            alert("error");
             $("#filter-loader").fadeOut("slow");
        },
    });
}

function drawHorizontalChart(response){
 	var data_label = [];
    var data_total = [];
    var data_color = [];
    console.log(response.data);
 	response.data.forEach(function (value, index) {
        data_label.push(value.channel_name);
        data_total.push(value.total_traffic.map(Number).reduce(summarize));
        data_color.push(value.channel_color);
    });

 	//summarize per channel
    function summarize(total, num) {
          return total + num;
    }

	var MeSeContext = document.getElementById("barWallTicketClose");
    MeSeContext.height = 450;
    var MeSeData = {
        labels: data_label,
        datasets: [{
            label: "total",
            data: data_total,
            backgroundColor: data_color,
            hoverBackgroundColor: data_color
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
                        min: 0, // Edit the value according to what you need
                        callback: function(value, index, values) {
                           //      if(parseInt(value) >= 1000){
                           //          var res = (value/1000);
                                    // return res+'K'
                           //      } else
                           //       return value;
                            value = value.toString();
                            value = value.split(/(?=(?:...)*$)/);
                            value = value.join(',');
                            return value;
                        }
                    }
                }],
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            },
            legend: {
                display: false
            },
            tooltips: {
              callbacks: {
                    label: function(tooltipItem, data) {
                        var value = data_total[tooltipItem.index];
                        // value = value.toString();
                        // value = value.split(/(?=(?:...)*$)/);
                        // value = value.join(',');
                        value = addCommas(value);
                        return value;
                    }
              }
            },
        }
    });
}

function fromTemplate(){

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
}