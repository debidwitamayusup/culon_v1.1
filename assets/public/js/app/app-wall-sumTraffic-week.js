var base_url = $('#base_url').val();

Date.prototype.getWeek = function() {
  var date = new Date(this.getTime());
  date.setHours(0, 0, 0, 0);
  // Thursday in current week decides the year.
  date.setDate(date.getDate() + 3 - (date.getDay() + 6) % 7);
  // January 4 is always in week 1.
  var week1 = new Date(date.getFullYear(), 0, 4);
  // Adjust to Thursday in week 1 and count number of weeks from date to week1.
  return 1 + Math.round(((date.getTime() - week1.getTime()) / 86400000
                        - 3 + (week1.getDay() + 6) % 7) / 7);
}

var d = new Date();
var params_week = d.getWeek()-1;
// console.log(params_week);

$(document).ready(function(){
    // $("#filter-loader").fadeIn("slow");

    getSummTrafficByChannel(params_week,["Facebook", "Whatsapp", "Twitter", "Email", "Telegram", "Line", "Voice", "Instagram", "Messenger", "Twitter DM", "Live Chat", "SMS"]);
    getTrafficInterval(params_week,["Facebook", "Whatsapp", "Twitter", "Email", "Telegram", "Line", "Voice", "Instagram", "Messenger", "Twitter DM", "Live Chat", "SMS"]);
    getTableChart(params_week,["Facebook", "Whatsapp", "Twitter", "Email", "Telegram", "Line", "Voice", "Instagram", "Messenger", "Twitter DM", "Live Chat", "SMS"]);
    drawChartDaily();
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

function getColorChannel(channel){
    var color = [];
    color['Email'] = '#e41313';
    color['Facebook'] = '#467fcf';
    color['Instagram'] = '#fbc0d5';
    color['Line'] = '#31a550';
    color['Live Chat'] = '#607d8b';
    color['Messenger'] = '#3866a6';
    color['SMS'] = '#80cbc4';
    color['Telegram'] = '#343a40';
    color['Twitter'] = '#45aaf2';
    color['Twitter DM'] = '#6574cd';
    color['Voice'] = '#ff9933';
    color['Whatsapp'] = '#089e60';

    return color[channel];
}

function getSummTrafficByChannel(week, arr_channel){
    $.ajax({
        type: 'post',
        url: base_url+'api/SummaryTraffic/SummaryToday/getIntervalTrafficWeeklyBar',
        data: {
            week: week,
            arr_channel: arr_channel
        },
        success: function (r) {
            var response = JSON.parse(r);
            // console.log(response);
            //hit url for interval 900000 (15 minutes)
            // setTimeout(function(){callDataPercentage(date);},900000);
            drawSummTrafficByChannel(response);
            // fromTemplate(response);
        },
        error: function (r) {
            // console.log(r);
            alert("error");
        },
    });
}

function drawSummTrafficByChannel(response){
    $('#barWallTrafficWeek').remove(); // this is my <canvas> element
    $('#barWallTrafficWeekDiv').append('<canvas id="barWallTrafficWeek"></canvas>');

    var data_label = [];
    var data_rate = [];
    var data_color = [];
    response.data.forEach(function (value, index) {
        data_label.push(value.channel_name);
        data_rate.push(value.total);
        data_color.push(getColorChannel(value.channel_name));
    });

    var obj = [{
        label: "data",
        data: data_rate,
        borderColor: data_color,
        borderWidth: "0",
        backgroundColor: data_color
    }];
    // console.log(data_rate);

    // draw chart
    var ctx_percentage = document.getElementById("barWallTrafficWeek");
    ctx_percentage.height =400;
    var percentageChart = new Chart(ctx_percentage, {
        type: 'horizontalBar',
        data: {
            labels: data_label,
            datasets: obj,
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    },
                    axisLabel: {
                    fontSize: 10,
                    color: '#7886a0',
                }
                }],
                xAxes: [{
                    ticks: {
                        min: 0, // Edit the value according to what you need
                        callback: function(value, index, values) {
                            value = value.toString();
                            value = value.split(/(?=(?:...)*$)/);
                            value = value.join(',');
                            return value;
                        }
                    }
                }]
            },
            legend: {
                display: false
            },
            tooltips: {
              callbacks: {
                    label: function(tooltipItem, data) {
                        var value = data_rate[tooltipItem.index];
                        value = addCommas(value);
                        return value;
                    }
              }
            },
        }
    });
}

function getTrafficInterval(week,arr_channel){
    $.ajax({
        type: 'post',
        url: base_url+'api/SummaryTraffic/SummaryToday/getIntervalTrafficWeekly',
        data: {
            week: week,
            arr_channel: arr_channel
        },
        success: function (r) {
            var response = JSON.parse(r);
            // console.log(response);
            // setTimeout(function(){callIntervalTraffic(week, ["Facebook", "Whatsapp", "Twitter", "Email", "Telegram", "Line", "Voice", "Instagram", "Messenger", "Twitter DM", "Live Chat", "SMS"]);},20000);
            drawTrafficInterval(response);
            // drawTableTraffic(response);
            // $("#filter-loader").fadeOut("slow");
        },
        error: function (r) {
            // console.log(r);
            alert("error");
            // $("#filter-loader").fadeOut("slow");
        },
    });
}

function drawTrafficInterval(response){
    // destroy chart interval 
    $('#lineWallsumTrafficWeek').remove(); // this is my <canvas> element
    // $('#chart-no-data').remove(); // this is my <canvas> element
    $('#lineWallsumTrafficWeekDiv').append('<canvas id="lineWallsumTrafficWeek"  class="h-400"></canvas>');
    var data = [];
    if(!response.data.series){
        $('#lineWallsumTrafficWeek').remove(); // this is my <canvas> element
        $('#lineWallsumTrafficWeekDiv').append('<canvas id="lineWallsumTrafficWeek" class="h-400"></canvas>');
    }else{
        response.data.series.forEach(function (value, index) {
            var obj = {
                label: value.label,
                data: value.data,
                backgroundColor: 'transparent',
                borderColor: getColorChannel(value.label),
                borderWidth: 3,
                pointStyle: 'circle',
                pointRadius: 4,
                pointBorderColor: 'transparent',
                pointBackgroundColor: getColorChannel(value.label),
            };
            data.push(obj);
        });

        // draw chart
        var ctx = document.getElementById( "lineWallsumTrafficWeek" );
        var myChart = new Chart( ctx, {
            type: 'line',
            data: {
                labels: response.data.label_time,
                datasets: data
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                legend:{
                    position:'bottom',
                    labels:{
                        boxWidth:10
                    }
                },
                barRoundness:  1,
                scales: {
                    yAxes: [ {
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        } );
    }
}

function getTableChart(week,arr_channel){
    $.ajax({
        type: 'post',
        url: base_url+'api/SummaryTraffic/SummaryToday/getIntervalTrafficWeeklyBarAvg',
        data: {
            week: week,
            arr_channel: arr_channel
        },
        success: function (r) {
            var response = JSON.parse(r);
            console.log(response);
            // setTimeout(function(){callIntervalTraffic(week, ["Facebook", "Whatsapp", "Twitter", "Email", "Telegram", "Line", "Voice", "Instagram", "Messenger", "Twitter DM", "Live Chat", "SMS"]);},20000);
            drawTableTraffic(response);
            // drawChartDaily(response);
            // $("#filter-loader").fadeOut("slow");
        },
        error: function (r) {
            // console.log(r);
            alert("error");
            // $("#filter-loader").fadeOut("slow");
        },
    });
}

function drawTableTraffic(response){
    var channel_name = [];
    var data = [];
    var sun=0,mon=0,tue=0,wed=0,thu=0,fri=0,sat=0;
    // console.log(response.data[0].data);
    $('#mytbody').empty();
    if (response.data.length != 0) {
        var i = 0;
        console.log(response.data[i].datas);
        response.data[i].datas.forEach(function (value, index) {
            // sun=parseInt(sun)+parseInt(value.data[0]);
            // mon=parseInt(mon)+parseInt(value.data[1]);
            // tue=parseInt(tue)+parseInt(value.data[2]);
            // wed=parseInt(wed)+parseInt(value.data[3]);
            // thu=parseInt(thu)+parseInt(value.data[4]);
            // fri=parseInt(fri)+parseInt(value.data[5]);
            // sat=parseInt(sat)+parseInt(value.data[6]);
            $('#mytable').find('tbody').append('<tr>'+
            '<td class="text-center">'+(i+1)+'</td>'+
            '<td class="text-left">'+value.channel_name+'</td>'+
            '<td class="text-right">'+addCommas(value.total)+'</td>'+
            '<td class="text-right">'+addCommas(value.total)+'</td>'+
            // '<td class="text-right">'+addCommas(value.data[2])+'</td>'+
            // '<td class="text-right">'+addCommas(value.data[3])+'</td>'+
            // '<td class="text-right">'+addCommas(value.data[4])+'</td>'+
            // '<td class="text-right">'+addCommas(value.data[5])+'</td>'+
            // '<td class="text-right">'+addCommas(value.data[6])+'</td>'+
            '</tr>');
            i++;
            
        });
        // $('#mytable').find('tbody').append('<tr class="bg-total font-weight-extrabold">'+
        //     '<td colspan="2" class="text-right">TOTAL</td>'+
        //     '<td class="text-right">'+addCommas(sun)+'</td>'+
        //     '<td class="text-right">'+addCommas(mon)+'</td>'+
        //     '<td class="text-right">'+addCommas(tue)+'</td>'+
        //     '<td class="text-right">'+addCommas(wed)+'</td>'+
        //     '<td class="text-right">'+addCommas(thu)+'</td>'+
        //     '<td class="text-right">'+addCommas(fri)+'</td>'+
        //     '<td class="text-right">'+addCommas(sat)+'</td>'+
        //     '</tr>');
    }else{
        $('#mytable').find('tbody').append('<tr>'+
            '<td colspan=6> No Data </td>'+
            '</tr>');
    }

    // $("#filter-loader").fadeOut("slow");
}

function drawChartDaily(response){
    // Horizontal Bar
    $('#echartWeek').remove();
    $('#echartWeekDiv').append('<div id="echartWeek" class="chartsh-wall overflow-hidden"></div>');
    // stacked bar this week
    let channel_name = [];
    let total = [];
    var day = [];

    if(response.data.length != 0){
        response.data.day.forEach(function(value, index){
            day.push(value.day);
        });
        response.data.chart.forEach(function(value, index){
            channel_name.push(value.channel_name);
            total.push(value.total);
        });

        var chartData = [];
        var i = 0;
        var dataChart = [{
             name: channel_name,
             type: 'bar',
             stack: 'Stack',
             data: total
         }];
         chartData.push(dataChart);
         i++
            /*----EchartThisWeek----*/
         var option6 = {
             grid: {
                 top: '6',
                 right: '15',
                 bottom: '17',
                 left: '32',
             },
             xAxis: {
                 type: 'category',
                 data: ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'],
                    
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
    }
}

// $(function ($) {
//     "use strict";
//     // Horizontal Bar

//     var MeSeContext = document.getElementById("barWallTrafficWeek");
//     MeSeContext.height = 400;
//     var MeSeData = {
//         labels: [
//             "Whatsapp",
//             "Facebook",
//             "Line",
//             "Twitter",
//             "Twitter DM",
//             "Instagram",
//             "Messenger",
//             "Telegram",
//             "Email",
//             "Voice",
//             "SMS",
//             "Live Chat"
//         ],
//         datasets: [{
//             label: "test",
//             data: [1000,5000,4300,6000,7000,5000,10000,3500,6000,7000,2000,2500],
//             backgroundColor: [
//                 "#31a550",
//                 "#467fcf",
//                 "#31a550",
//                 "#45aaf2",
//                 "#6574cd",
//                 "#fbc0d5",
//                 "#3866a6",
//                 "#343a40",
//                 "#e41313",
//                 "#ff9933",
//                 "#80cbc4",
//                 "#607d8b"
//             ],
//             hoverBackgroundColor: [
//                 "#A5B0B6",
//                 "#009E8C",
//                 "#00436D",
//                 "#31a550",
//                 "#467fcf",
//                 "#31a550",
//                 "#45aaf2",
//                 "#6574cd",
//                 "#fbc0d5",
//                 "#3866a6",
//                 "#343a40",
//                 "#e41313",
//                 "#ff9933",
//                 "#80cbc4",
//                 "#607d8b"
//             ]
//         }]
//     };
//     var MeSeChart = new Chart(MeSeContext, {
//         type: 'horizontalBar',
//         data: MeSeData,
//         options: {
//             responsive: true,
//             maintainAspectRatio: false,
//             scales: {
//                 xAxes: [{
//                     ticks: {
//                         min: 0
//                     }
//                 }],
//                 yAxes: [{
//                     stacked: true
//                 }]
//             },
//             legend: {
//                 display: false
//             }
//         }
//     });
//     // stacked bar this week
//     var chartdata3 = [{
// 		name: 'Whatsapp',
// 		type: 'bar',
// 		stack: 'Stack',
// 		data: [14, 18, 20, 14, 29, 21, 25]
// 	}, {
// 		name: 'Facebook',
// 		type: 'bar',
// 		stack: 'Stack',
// 		data: [20, 30, 35, 30, 50, 30, 30]
// 	},{
// 		name: 'Twitter',
// 		type: 'bar',
// 		stack: 'Stack',
// 		data: [30, 40, 45, 50, 60, 40, 40]
// 	},{
// 		name: 'Twitter DM',
// 		type: 'bar',
// 		stack: 'Stack',
// 		data: [40, 50, 55, 60, 70, 60, 60]
// 	},{
// 		name: 'Instagram',
// 		type: 'bar',
// 		stack: 'Stack',
// 		data: [50, 60, 70, 70, 80, 70, 70]
// 	},{
// 		name: 'Messenger',
// 		type: 'bar',
// 		stack: 'Stack',
// 		data: [60, 70, 80, 80, 90, 80, 80]
// 	},{
// 		name: 'Telegram',
// 		type: 'bar',
// 		stack: 'Stack',
// 		data: [70, 80, 90, 90, 100, 90, 90]
// 	},{
// 		name: 'Line',
// 		type: 'bar',
// 		stack: 'Stack',
// 		data: [80, 90, 100, 100, 120, 100, 100]
// 	},{
// 		name: 'Email',
// 		type: 'bar',
// 		stack: 'Stack',
// 		data: [90, 100, 120, 110, 130, 130, 130]
// 	},{
// 		name: 'Voice',
// 		type: 'bar',
// 		stack: 'Stack',
// 		data: [100, 120, 130, 150, 140, 150, 160]
// 	},{
// 		name: 'SMS',
// 		type: 'bar',
// 		stack: 'Stack',
// 		data: [120, 140, 150, 160, 160, 170, 180]
// 	},{
// 		name: 'Live Chat',
// 		type: 'bar',
// 		stack: 'Stack',
// 		data: [130, 150, 160, 170, 180, 190, 200]
// 	}];
//     /*----EchartThisWeek----*/
// 	var option6 = {
// 		grid: {
// 			top: '6',
// 			right: '15',
// 			bottom: '17',
// 			left: '32',
// 		},
// 		xAxis: {
// 			type: 'category',
// 			data: ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'],
			
// 			axisLine: {
// 				lineStyle: {
// 					color: '#efefff'
// 				}
// 			},
// 			axisLabel: {
// 				fontSize: 10,
// 				color: '#7886a0'
// 			}
// 		},
// 		yAxis: {
// 			type: 'value',
// 			splitLine: {
// 				lineStyle: {
// 					color: '#efefff'
// 				}
// 			},
// 			axisLine: {
// 				lineStyle: {
// 					color: '#efefff'
// 				}
// 			},
// 			axisLabel: {
// 				fontSize: 10,
// 				color: '#7886a0'
// 			}
// 		},
// 		series: chartdata3,
// 		color: ['#089e60', '#467fcf', '#45aaf2', '#6574cd', '#fbc0d5', '#3866a6', '#343a40', '#31a550', '#e41313', '#ff9933', '#80cbc4', '#607d8b']
// 	};
// 	var chart6 = document.getElementById('echartWeek');
// 	var barChart6 = echarts.init(chart6);
//     barChart6.setOption(option6);
// stacked bar this week 
//     var ctx = document.getElementById( "lineWallsumTrafficWeek" );
//     var myChart = new Chart( ctx, {
//         type: 'line',
//         data: {
//             labels: [ "00:00", "01:00", "02:00", "03:00", "04:00", "05:00", "06:00", "07:00", "08:00", "09:00", "10:00", "11:00", "12:00", "13:00", "14:00", "15:00","16:00","17:00","18:00","19:00","20:00","21:00","22:00","23:00","24:00"],
//             datasets: [ {
//                 label: "Whatsapp",
//                 data: [ 0,90,80,70,80,90,80,60,40,90,100,120,150,190,200,280,300,350,90,50,60,40,80,90,100],
//                 backgroundColor: 'transparent',
//                 borderColor: '#089e60',
//                 borderWidth: 3,
//                 pointStyle: 'circle',
//                 pointRadius: 5,
//                 pointBorderColor: 'transparent',
//                 pointBackgroundColor: '#089e60',
//                     }, {
//                 label: "Facebook",
//                 data: [ 0,100,50,30,50,40,30,60,90,100,30,40,50,90,100,180,200,550,90,90,30,40,50,100,130 ],
//                 backgroundColor: 'transparent',
//                 borderColor: '#467fcf',
//                 borderWidth: 3,
//                 pointStyle: 'circle',
//                 pointRadius: 5,
//                 pointBorderColor: 'transparent',
//                 pointBackgroundColor: '#467fcf',
//                  }, {
//                 label: "Twitter",
//                 data: [ 0,60,90,60,50,40,40,40,90,30,30,150,170,200,290,240,340,190,40,50,40,30,90,40,120],
//                 backgroundColor: 'transparent',
//                 borderColor: '#45aaf2',
//                 borderWidth: 3,
//                 pointStyle: 'circle',
//                 pointRadius: 5,
//                 pointBorderColor: 'transparent',
//                 pointBackgroundColor: '#45aaf2',
//                     }, {
//                 label: "Twitter DM",
//                 data: [ 0,40,50,60,90,100,70,90,40,100,150,180,120,130,100,250,310,250,80,150,160,140,180,50,300 ],
//                 backgroundColor: 'transparent',
//                 borderColor: '#6574cd',
//                 borderWidth: 3,
//                 pointStyle: 'circle',
//                 pointRadius: 5,
//                 pointBorderColor: 'transparent',
//                 pointBackgroundColor: '#6574cd',
//                     }, {
//                 label: "Line",
//                 data: [ 0,190,180,170,180,190,90,80,60,100,180,90,110,120,130,230,250,250,190,150,160,140,90,180,140 ],
//                 backgroundColor: 'transparent',
//                 borderColor: '#31a550',
//                 borderWidth: 3,
//                 pointStyle: 'circle',
//                 pointRadius: 5,
//                 pointBorderColor: 'transparent',
//                 pointBackgroundColor: '#31a550',
//                     }, {
//                 label: "Messenger",
//                 data: [ 0,30,180,170,180,190,180,160,140,190,110,110,120,100,210,180,200,250,200,150,160,290,180,180,130 ],
//                 backgroundColor: 'transparent',
//                 borderColor: '#3866a6',
//                 borderWidth: 3,
//                 pointStyle: 'circle',
//                 pointRadius: 5,
//                 pointBorderColor: 'transparent',
//                 pointBackgroundColor: '#3866a6',
//                     }, {
//                 label: "Telegram",
//                 data: [ 0,10,30,40,10,70,30,40,50,70,80,110,130,120,200,180,100,150,190,240,160,120,200,130,120],
//                 backgroundColor: 'transparent',
//                 borderColor: '#343a40',
//                 borderWidth: 3,
//                 pointStyle: 'circle',
//                 pointRadius: 5,
//                 pointBorderColor: 'transparent',
//                 pointBackgroundColor: '#343a40',
//                     }, {
//                 label: "Instagram",
//                 data: [ 0,10,70,10,30,70,60,70,10,100,120,140,120,130,240,140,320,230,40,520,260,200,30,40,300 ],
//                 backgroundColor: 'transparent',
//                 borderColor: '#fbc0d5',
//                 borderWidth: 3,
//                 pointStyle: 'circle',
//                 pointRadius: 5,
//                 pointBorderColor: 'transparent',
//                 pointBackgroundColor: '#fbc0d5',
//                     }, {
//                 label: "Email",
//                 data: [ 0,70,60,20,50,40,180,160,140,100,130,150,160,180,230,270,350,250,50,400,260,240,280,290,400 ],
//                 backgroundColor: 'transparent',
//                 borderColor: '#e41313',
//                 borderWidth: 3,
//                 pointStyle: 'circle',
//                 pointRadius: 5,
//                 pointBorderColor: 'transparent',
//                 pointBackgroundColor: '#e41313',
//                     }, {
//                 label: "Voice",
//                 data: [ 0,70,50,60,70,80,90,60,60,50,130,130,100,200,250,260,100,50,70,150,160,140,180,190,120 ],
//                 backgroundColor: 'transparent',
//                 borderColor: '#ff9933',
//                 borderWidth: 3,
//                 pointStyle: 'circle',
//                 pointRadius: 5,
//                 pointBorderColor: 'transparent',
//                 pointBackgroundColor: '#ff9933',
//                     },{
//                 label: "SMS",
//                 data: [ 0,190,180,170,180,190,180,160,140,100,150,150,180,180,250,200,350,150,100,90,80,50,70,60,120 ],
//                 backgroundColor: 'transparent',
//                 borderColor: '#80cbc4',
//                 borderWidth: 3,
//                 pointStyle: 'circle',
//                 pointRadius: 5,
//                 pointBorderColor: 'transparent',
//                 pointBackgroundColor: '#80cbc4',
//                 },{
//                 label: "Live Chat",
//                 data: [ 0,10,70,50,60,90,340,150,150,160,200,220,250,150,210,250,310,320,70,60,90,60,50,100,140 ],
//                 backgroundColor: 'transparent',
//                 borderColor: '#607d8b',
//                 borderWidth: 3,
//                 pointStyle: 'circle',
//                 pointRadius: 5,
//                 pointBorderColor: 'transparent',
//                 pointBackgroundColor: '#607d8b',
//                     } ]
//         },
//         options: {
// 			responsive: true,
// 			maintainAspectRatio: false,
// 			legend:{
//                 position:'bottom',
//                 labels:{
//                     boxWidth:10
//                 }
//             },
//             barRoundness: 1,
//             scales: {
//                 yAxes: [ {
//                     ticks: {
//                         beginAtZero: true
// 						}
//                     }]
//             }
//         }
//     } );
	
// });