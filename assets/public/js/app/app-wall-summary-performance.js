var base_url = $('#base_url').val();

var d = new Date();
var o = d.getDate();
var n = d.getMonth()+1;
var m = d.getFullYear();
if (o < 10) {
  o = '0' + o;
} 
if (n < 10) {
  n = '0' + n;
}

var v_params_this_year = m + '-' + n + '-' + (o);

$(document).ready(function(){
    $("#filter-loader").fadeIn("slow");
    callThreeTable('');
    callPieChartSummary('');
    callBarLayanan('');
    callLineChart('');
    callTotalTable('');
    $("#filter-loader").fadeOut("slow");
});

function addCommas(commas)
{
    commas += '';
    x = commas.split('.');
    x1 = x[0];
    x2 = x.length > 1 ? '.' + x[1] : '';
    var rgx = /(\d+)(\d{3})/;
    while (rgx.test(x1)) {
        x1 = x1.replace(rgx, '$1' + '.' + '$2');
    }
    return x1 + x2;
}

function callThreeTable(date){
    $.ajax({
        type: 'POST',
        url: base_url + 'api/Wallboard/WallboardController/summaryPerformanceNasional',
        data: {
            date: date,
        },
        success: function (r) {
            var response = r;
            $('#modalError').modal('hide');
            setTimeout(function(){callThreeTable(date);},5000);
            drawTableRealTime(response);
        },
        error: function (r) {
            // console.log(r);
            $('#modalError').modal('show');
            setTimeout(function(){callThreeTable(date);},5000);
            // $("#filter-loader").fadeOut("slow");
        },
    });
}

function drawTableRealTime(response){
    // for (var i = 0; i < 10; i++) {
    //     console.log(response.data[i].TENANT_NAME);
    // }
    // console.log(response.data[0].TENANT_NAME);
    $('#mytbody_1').empty();
    if (response.data.length != 0) {
        for (var i = 0; i < 10; i++) {
            if (response.data[i]){
                $('#mytable_1').find('tbody').append('<tr>'+
                        '<td class="text-center">'+(i+1)+'</td>'+
                        '<td class="text-left">'+(response.data[i].TENANT_NAME || 0)+'</td>'+
                        '<td class="text-right">'+(response.data[i].QUEUE || 0)+'</td>'+
                        '<td class="text-center">'+(response.data[i].WAITING || 0)+'</td>'+
                        '<td class="text-center">'+(response.data[i].AHT || 0)+'</td>'+
                        '<td class="text-right">'+(addCommas(response.data[i].OFFERED) || 0)+'</td>'+
                        '<td class="text-right">'+(response.data[i].SCR || 0)+'%</td>'+
                    '</tr>');
            }else{
                $('#mytable_1').find('tbody').append(
                '<tr>'+
                    '<td class="text-center">'+(i+1)+'</td>'+
                    '<td class="text-left"></td>'+
                    '<td class="text-right"></td>'+
                    '<td class="text-center"></td>'+
                    '<td class="text-center"></td>'+
                    '<td class="text-right"></td>'+
                    '<td class="text-right"></td>'+
                '</tr>');
            }
        }
    }

    $('#mytbody_2').empty();
    if (response.data.length != 0) {
        for (var i = 10; i < 20; i++) {
            if (response.data[i]){
                $('#mytable_2').find('tbody').append('<tr>'+
                        '<td class="text-center">'+(i+1)+'</td>'+
                        '<td class="text-left">'+(response.data[i].TENANT_NAME || 0)+'</td>'+
                        '<td class="text-right">'+(response.data[i].QUEUE || 0)+'</td>'+
                        '<td class="text-center">'+(response.data[i].WAITING || 0)+'</td>'+
                        '<td class="text-center">'+(response.data[i].AHT || 0)+'</td>'+
                        '<td class="text-right">'+(addCommas(response.data[i].OFFERED) || 0)+'</td>'+
                        '<td class="text-right">'+(response.data[i].SCR || 0)+'%</td>'+
                    '</tr>');
            }else{
                $('#mytable_2').find('tbody').append(
                '<tr>'+
                    '<td class="text-center">'+(i+1)+'</td>'+
                    '<td class="text-left"></td>'+
                    '<td class="text-right"></td>'+
                    '<td class="text-center"></td>'+
                    '<td class="text-center"></td>'+
                    '<td class="text-right"></td>'+
                    '<td class="text-right"></td>'+
                '</tr>');
            }
        }
    }

    $('#mytbody_3').empty();
    if (response.data.length != 0) {
        for (var i = 20; i < 30; i++) {
            if (response.data[i]){
                $('#mytable_3').find('tbody').append('<tr>'+
                        '<td class="text-center">'+(i+1)+'</td>'+
                        '<td class="text-left">'+(response.data[i].TENANT_NAME || 0)+'</td>'+
                        '<td class="text-right">'+(response.data[i].QUEUE || 0)+'</td>'+
                        '<td class="text-center">'+(response.data[i].WAITING || 0)+'</td>'+
                        '<td class="text-center">'+(response.data[i].AHT || 0)+'</td>'+
                        '<td class="text-right">'+(addCommas(response.data[i].OFFERED) || 0)+'</td>'+
                        '<td class="text-right">'+(response.data[i].SCR || 0)+'%</td>'+
                    '</tr>');
            }else{
                $('#mytable_3').find('tbody').append(
                '<tr>'+
                    '<td class="text-center">'+(i+1)+'</td>'+
                    '<td class="text-left"></td>'+
                    '<td class="text-right"></td>'+
                    '<td class="text-center"></td>'+
                    '<td class="text-center"></td>'+
                    '<td class="text-right"></td>'+
                    '<td class="text-right"></td>'+
                '</tr>');
            }
        }
    }
}

function callPieChartSummary(){
    $.ajax({
        type: 'POST',
        url: base_url + 'api/Wallboard/WallboardController/summaryPerformanceNasionalPie',
        data:{

        },
        success: function (r) {
            var response = r;
            $('#modalError').modal('hide');
            setTimeout(function(){callPieChartSummary();},5000);
            // console.log(response);
            drawPieChartSummary(response);
        },
        error: function (r) {
            // console.log(r);
            $('#modalError').modal('show');
            setTimeout(function(){callPieChartSummary();},5000);
            // $("#filter-loader").fadeOut("slow");
        },
    });
}

function drawPieChartSummary(response){
    $('#pieChartChannel').remove();
    $('#canvas-pie').append('<canvas id="pieChartChannel" class="donutShadow overflow-hidden"></canvas>');
    var ctx = document.getElementById( "pieChartChannel" );
    ctx.height = 266;
    var myChart = new Chart( ctx, {
        type: 'pie',
        data: {
            datasets: [{
                data: response.data.total,
                backgroundColor: response.data.color,
                hoverBackgroundColor: response.data.color
            }],
            labels: response.data.channel_name
        },
        options: {
            animation: false,
            responsive: true,
            maintainAspectRatio: false,
            
            legend:{
                    display : false
            },
            tooltips: {
              callbacks: {
                    label: function(tooltipItem, data) {
                        var value = data.datasets[0].data[tooltipItem.index];
                        value = value.toString();
                        value = value.split(/(?=(?:...)*$)/);
                        value = value.join('.');
                        return data.labels[tooltipItem.index]+': '+ value;
                    }
              } // end callbacks:
            },
            pieceLabel:{
                render : 'legend',
                fontColor : '#000',
                position : 'outside',
                segment : true
            },
            legendCallback : function (chart, index){
                var allData = chart.data.datasets[0].data;
                // console.log(chart)
                var legendHtml = [];
                legendHtml.push('<ul><div class="row">');
                allData.forEach(function(data,index){
                    var label = chart.data.labels[index];
                    var dataLabel = allData[index];
                    var background = chart.data.datasets[0].backgroundColor[index]
                    var total = 0;
                    for (var i in allData){
                        total += parseInt(allData[i]);
                    }

                    // console.log(total)
                    var percentage = Math.round((dataLabel / total) * 100);
                    legendHtml.push('<li class="col-md-4 col-lg-4 col-sm-6 col-xl-4">');
                    legendHtml.push('<span class="chart-legend"><div style="background-color :'+background+'" class="box-legend"></div>'+label+':'+percentage+ '%</span>');
                })
                legendHtml.push('</ul></div>');
                return legendHtml.join("");
            },
        }
    });
    var myLegendContainer = document.getElementById("legend");
    myLegendContainer.innerHTML = myChart.generateLegend();
}

function callBarLayanan(date){
    $.ajax({
        type: 'POST',
        url: base_url + 'api/Wallboard/WallboardController/summaryPerformanceNasionalBar',
        data: {
            date: date,
        },
        success: function (r) {
            var response = r;
            // console.log(response);
            $('#modalError').modal('hide');
            setTimeout(function(){callBarLayanan(date);},5000);
            drawBarLayanan(response);
        },
        error: function (r) {
            // console.log(r);
            $('#modalError').modal('show');
            setTimeout(function(){callBarLayanan(date);},5000);
            // $("#filter-loader").fadeOut("slow");
        },
    });
}

function drawBarLayanan(response){
    $('#BarWallPerformance').remove(); // this is my <canvas> element
    $('#BarWallPerformanceDiv').append('<canvas id="BarWallPerformance" class="h-400"></canvas>');

    var numberWithCommas = function (x) {
        return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
    };

    // console.log(response);
    var dataLayanan = [];
    var LabelX = [];
    response.data.forEach(function(value){
        dataLayanan.push(value.TOTAL);
        LabelX.push(value.TENANT_NAME);
    });
    // console.log(response.data[0].TOTAL);
    for (var i = LabelX.length; i < 30; i++){
        LabelX.push("");
    }
    var bar_ctx = document.getElementById('BarWallPerformance');
    // console.log(dataLayanan);
    var bar_chart = new Chart(bar_ctx, {
        type: 'bar',
        // type: 'horizontalBar',
        data: {
            labels: LabelX,
            datasets: [{
                    label: 'Layanan',
                    data: dataLayanan,
                    backgroundColor: "#ff0000",
                    hoverBackgroundColor: "#ff0000",
                    hoverBorderWidth: 0
                }
            ],
        },
        options: {
            animation: false,
            responsive: true,
            maintainAspectRatio: false,
            layout: {
                padding: {
                    left: 5,
                    right: 12,
                    top:0,
                    bottom: 0
                }
            },
            title: {
                display: true,
                text: 'Traffic by Layanan',
                fontSize:14
            },
            animation: {
                duration: 10,
            },
            tooltips: {
                mode: 'label',
                callbacks: {
                    label: function (tooltipItem, data) {
                        return data.datasets[tooltipItem.datasetIndex].label + ": " + numberWithCommas(tooltipItem.yLabel);
                    }
                }
            },
            scales: {
                xAxes: [{
                    stacked: true,
                    gridLines: {
                        display: true
                    },
                    ticks: {
                        fontSize: 10
                    },
                    barPercentage: 1,
                    // barThickness: 30,
                    maxBarThickness: 40
                }],
                yAxes: [{
                    stacked: true,
                    gridLines: {
                        display: true
                    },
                    ticks: {
                        callback: function (value) {
                            return numberWithCommas(value);
                        },
                    },
                }],
            },
            legend: {
                display: false,
                labels: {
                    boxWidth: 10,
                }
            }
        },
        // plugins: [{
        //  beforeInit: function (chart) {
        //      chart.data.labels.forEach(function (value, index, array) {
        //          var a = [];
        //          a.push(value.slice(0, 5));
        //          var i = 1;
        //          while (value.length > (i * 5)) {
        //              a.push(value.slice(i * 5, (i + 1) * 5));
        //              i++;
        //          }
        //          array[index] = a;
        //      })
        //  }
        // }]
    });
    // console.log(dataLayanan);
}

function callLineChart(channel){
    $.ajax({
        type: 'POST',
        url: base_url + 'api/Wallboard/WallboardController/summaryPerformanceNasionalInterval',
        data:{
            channel: channel
        },
        success: function (r) {
            var response = r;
            // console.log(response);
            $('#modalError').modal('hide');
            setTimeout(function(){callLineChart(channel);},5000);
            drawLineChart(response);
        },
        error: function (r) {
            // console.log(r);
            $('#modalError').modal('show');
            setTimeout(function(){callLineChart(channel);},5000);
            // $("#filter-loader").fadeOut("slow");
        },
    });
}

function drawLineChart(response){
    $('#lineWallSumPerform').remove();
    $('#lineWallSumPerformDiv').append('<canvas id="lineWallSumPerform"  style="height:438px"></canvas>');
    var ctx = document.getElementById( "lineWallSumPerform" );
    var myChart = new Chart( ctx, {
        type: 'line',
        data: {
            labels: response.data.label_time,
            datasets: [ {
                label: "Total",
                data: response.data.series,
                backgroundColor: 'transparent',
                borderColor: '#089e60',
                borderWidth: 3,
                pointStyle: 'circle',
                pointRadius: 5,
                pointBorderColor: 'transparent',
                pointBackgroundColor: '#089e60',
                }]
        },
        options: {
            animation: false,
            responsive: true,
            maintainAspectRatio: false,
            layout: {
                padding: {
                    left: 7,
                    right: 5,
                    top: 20,
                    bottom: 0
                }
            },
            legend:{
                display:false
            },
            // legend:{
            //     position:'top',
            //     labels:{
            //         boxWidth:10
            //     }
            // },
            barRoundness: 1,
            scales: {
                yAxes: [ {
                    ticks: {
                        beginAtZero: true
                        }
                    }]
            }
        }
    });
}

function callTotalTable(date){
    $.ajax({
        type: 'POST',
        url: base_url + 'api/Wallboard/WallboardController/summaryPerformanceNasional',
        data: {
            date: date
        },
        success: function (r) {
            var response = r;
            $('#modalError').modal('hide');
            setTimeout(function(){callTotalTable(date);},5000);
            drawTotalTable(response);
        },
        error: function (r) {
            // console.log(r);
            $('#modalError').modal('show');
            setTimeout(function(){callTotalTable(date);},5000);
            // $("#filter-loader").fadeOut("slow");
        },
    });
}

function timestrToSec(timestr) {
  var parts = timestr.split(":");
  return (parts[0] * 3600) +
         (parts[1] * 60) +
         (+parts[2]);
}

function pad(num) {
  if(num < 10) {
    return "0" + num;
  } else {
    return "" + num;
  }
}

function formatTime(seconds) {
  return [pad(Math.floor(seconds/3600)),
          pad(Math.floor(seconds/60)%60),
          pad(seconds%60),
          ].join(":");
}

function drawTotalTable(response){
        var sumCOF = 0;
        var sumSCR = '';
        var sumWaiting = '';
        var sumAHT = '';

        for (var i = 0; i < response.data.length; i++) {
            sumCOF+= parseInt((response.data[i].OFFERED || 0));
            // console.log(sumCOF);
            sumSCR+= parseFloat((response.data[i].SCR || 0));
            sumWaiting+= formatTime(timestrToSec(response.data[i].WAITING || 0));
            sumAHT+= formatTime(timestrToSec(response.data[i].AHT || 0));
            $('#rowDiv').empty();
            $('#rowDiv').append(''+
                '<div class="col-md-3">'+
                    '<h6 class="font12 ml-7" id="totalCOF">Total COF : '+addCommas(sumCOF)+'</h6>'+
                '</div>'+
                '<div class="col-md-3">'+
                    '<h6 class="font12" id="rataSCR">Rata-rata SCR : '+sumSCR+'%</h6>'+
                '</div>'+
                '<div class="col-md-3">'+
                    '<h6 class="font12" id="avgWaiting">Average Waiting Time : '+sumWaiting+'</h6>'+
                '</div>'+
                '<div class="col-md-3">'+
                    '<h6 class="font12" id="avgHT">Average Handling Time : '+sumAHT+'</h6>'+
                '</div>'
            );
        }
}

$(function($){
    //pie chart Ticket Channel
 //    var ctx = document.getElementById( "pieChartChannel" );
 //    ctx.height = 266;
 //    var myChart = new Chart( ctx, {
 //        type: 'pie',
 //        data: {
 //            datasets: [ {
 //                data: [ 15, 35, 40,20,50,30,15,30,40,50,70,90],
 //                backgroundColor: [
 //                                "#467fcf",
 //                                "#fbc0d5",
 //                                "#31a550",
 //                                "#e41313",
 //                                "#3866a6",
 //                                "#45aaf2",
 //                                "#6574cd",
 //                                "#343a40",
 //                                "#607d8b",
 //                                "#31a550",
 //                                "#ff9933",
 //                                "#80cbc4"
 //                                ],
 //                hoverBackgroundColor: [
 //                                "#467fcf",
 //                                "#fbc0d5",
 //                                "#31a550",
 //                                "#e41313",
 //                                "#3866a6",
 //                                "#45aaf2",
 //                                "#6574cd",
 //                                "#343a40",
 //                                "#607d8b",
 //                                "#31a550",
 //                                "#ff9933",
 //                                "#80cbc4"
 //                                ]

 //                            } ],
 //            labels: [
 //                                "Facebook",
 //                                "Instagram",
 //                                "Line",
 //                                "Email",
 //                                "Messenger",
 //                                "Twitter",
 //                                "Twitter DM",
 //                                "Telegram",
 //                                "Live Chat",
 //                                "Whatsapp",
 //                                "Voice",
 //                                "SMS"
 //                    ]
 //        },
 //        options: {
 //            responsive: true,
	// 		maintainAspectRatio: false,
			
 //            legend:{
	// 				display : false
	// 		},
	// 		pieceLabel:{
	// 			render : 'legend',
	// 			fontColor : '#000',
	// 			position : 'outside',
	// 			segment : true
	// 		},
	// 		legendCallback : function (chart, index){
	// 			var allData = chart.data.datasets[0].data;
	// 			// console.log(chart)
	// 			var legendHtml = [];
	// 			legendHtml.push('<ul><div class="row">');
	// 			allData.forEach(function(data,index){
	// 				var label = chart.data.labels[index];
	// 				var dataLabel = allData[index];
	// 				var background = chart.data.datasets[0].backgroundColor[index]
	// 				var total = 0;
	// 				for (var i in allData){
	// 					total += parseInt(allData[i]);
	// 				}

	// 				// console.log(total)
	// 				var percentage = Math.round((dataLabel / total) * 100);
	// 				legendHtml.push('<li class="col-md-4 col-lg-4 col-sm-6 col-xl-4">');
	// 				legendHtml.push('<span class="chart-legend"><div style="background-color :'+background+'" class="box-legend"></div>'+label+':'+percentage+ '%</span>');
	// 			})
	// 			legendHtml.push('</ul></div>');
	// 			return legendHtml.join("");
	// 		},
 //        }
	// });
	// var myLegendContainer = document.getElementById("legend");
 //    myLegendContainer.innerHTML = myChart.generateLegend();
    

    // Line chart 
   //  var ctx = document.getElementById( "lineWallSumPerform" );
   //  var myChart = new Chart( ctx, {
   //      type: 'line',
   //      data: {
   //          labels: [ "00:00", "01:00", "02:00", "03:00", "04:00", "05:00", "06:00", "07:00", "08:00", "09:00", "10:00", "11:00", "12:00", "13:00", "14:00", "15:00","16:00","17:00","18:00","19:00","20:00","21:00","22:00","23:00","24:00"],
   //          datasets: [ {
   //              label: "Whatsapp",
   //              data: [ 0,90,80,70,80,90,80,60,40,90,100,120,150,190,200,280,300,350,90,50,60,40,80,90,100],
   //              backgroundColor: 'transparent',
   //              borderColor: '#089e60',
   //              borderWidth: 3,
   //              pointStyle: 'circle',
   //              pointRadius: 5,
   //              pointBorderColor: 'transparent',
   //              pointBackgroundColor: '#089e60',
   //                  }, {
   //              label: "Facebook",
   //              data: [ 0,100,50,30,50,40,30,60,90,100,30,40,50,90,100,180,200,550,90,90,30,40,50,100,130 ],
   //              backgroundColor: 'transparent',
   //              borderColor: '#467fcf',
   //              borderWidth: 3,
   //              pointStyle: 'circle',
   //              pointRadius: 5,
   //              pointBorderColor: 'transparent',
   //              pointBackgroundColor: '#467fcf',
   //               }, {
   //              label: "Twitter",
   //              data: [ 0,60,90,60,50,40,40,40,90,30,30,150,170,200,290,240,340,190,40,50,40,30,90,40,120],
   //              backgroundColor: 'transparent',
   //              borderColor: '#45aaf2',
   //              borderWidth: 3,
   //              pointStyle: 'circle',
   //              pointRadius: 5,
   //              pointBorderColor: 'transparent',
   //              pointBackgroundColor: '#45aaf2',
   //                  }, {
   //              label: "Twitter DM",
   //              data: [ 0,40,50,60,90,100,70,90,40,100,150,180,120,130,100,250,310,250,80,150,160,140,180,50,300 ],
   //              backgroundColor: 'transparent',
   //              borderColor: '#6574cd',
   //              borderWidth: 3,
   //              pointStyle: 'circle',
   //              pointRadius: 5,
   //              pointBorderColor: 'transparent',
   //              pointBackgroundColor: '#6574cd',
   //                  }, {
   //              label: "Line",
   //              data: [ 0,190,180,170,180,190,90,80,60,100,180,90,110,120,130,230,250,250,190,150,160,140,90,180,140 ],
   //              backgroundColor: 'transparent',
   //              borderColor: '#31a550',
   //              borderWidth: 3,
   //              pointStyle: 'circle',
   //              pointRadius: 5,
   //              pointBorderColor: 'transparent',
   //              pointBackgroundColor: '#31a550',
   //                  }, {
   //              label: "Messenger",
   //              data: [ 0,30,180,170,180,190,180,160,140,190,110,110,120,100,210,180,200,250,200,150,160,290,180,180,130 ],
   //              backgroundColor: 'transparent',
   //              borderColor: '#3866a6',
   //              borderWidth: 3,
   //              pointStyle: 'circle',
   //              pointRadius: 5,
   //              pointBorderColor: 'transparent',
   //              pointBackgroundColor: '#3866a6',
   //                  }, {
   //              label: "Telegram",
   //              data: [ 0,10,30,40,10,70,30,40,50,70,80,110,130,120,200,180,100,150,190,240,160,120,200,130,120],
   //              backgroundColor: 'transparent',
   //              borderColor: '#343a40',
   //              borderWidth: 3,
   //              pointStyle: 'circle',
   //              pointRadius: 5,
   //              pointBorderColor: 'transparent',
   //              pointBackgroundColor: '#343a40',
   //                  }, {
   //              label: "Instagram",
   //              data: [ 0,10,70,10,30,70,60,70,10,100,120,140,120,130,240,140,320,230,40,520,260,200,30,40,300 ],
   //              backgroundColor: 'transparent',
   //              borderColor: '#fbc0d5',
   //              borderWidth: 3,
   //              pointStyle: 'circle',
   //              pointRadius: 5,
   //              pointBorderColor: 'transparent',
   //              pointBackgroundColor: '#fbc0d5',
   //                  }, {
   //              label: "Email",
   //              data: [ 0,70,60,20,50,40,180,160,140,100,130,150,160,180,230,270,350,250,50,400,260,240,280,290,400 ],
   //              backgroundColor: 'transparent',
   //              borderColor: '#e41313',
   //              borderWidth: 3,
   //              pointStyle: 'circle',
   //              pointRadius: 5,
   //              pointBorderColor: 'transparent',
   //              pointBackgroundColor: '#e41313',
   //                  }, {
   //              label: "Voice",
   //              data: [ 0,70,50,60,70,80,90,60,60,50,130,130,100,200,250,260,100,50,70,150,160,140,180,190,120 ],
   //              backgroundColor: 'transparent',
   //              borderColor: '#ff9933',
   //              borderWidth: 3,
   //              pointStyle: 'circle',
   //              pointRadius: 5,
   //              pointBorderColor: 'transparent',
   //              pointBackgroundColor: '#ff9933',
   //                  },{
   //              label: "SMS",
   //              data: [ 0,190,180,170,180,190,180,160,140,100,150,150,180,180,250,200,350,150,100,90,80,50,70,60,120 ],
   //              backgroundColor: 'transparent',
   //              borderColor: '#80cbc4',
   //              borderWidth: 3,
   //              pointStyle: 'circle',
   //              pointRadius: 5,
   //              pointBorderColor: 'transparent',
   //              pointBackgroundColor: '#80cbc4',
   //              },{
   //              label: "Live Chat",
   //              data: [ 0,10,70,50,60,90,340,150,150,160,200,220,250,150,210,250,310,320,70,60,90,60,50,100,140 ],
   //              backgroundColor: 'transparent',
   //              borderColor: '#607d8b',
   //              borderWidth: 3,
   //              pointStyle: 'circle',
   //              pointRadius: 5,
   //              pointBorderColor: 'transparent',
   //              pointBackgroundColor: '#607d8b',
   //                  } ]
   //      },
   //      options: {
			// responsive: true,
			// maintainAspectRatio: false,
			// legend:{
   //              position:'top',
   //              labels:{
   //                  boxWidth:10
   //              }
   //          },
   //          barRoundness: 1,
   //          scales: {
   //              yAxes: [ {
   //                  ticks: {
   //                      beginAtZero: true
			// 			}
   //                  }]
   //          }
   //      }
   //  } );

    // Bar chart

     // Vertical Bar Wallboard Summary Traffic Week yang baru 
    // Return with commas in between
    // var numberWithCommas = function (x) {
    //     return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
    // };

    // var dataLayanan = [20, 10, 15, 13, 9, 12, 14,12, 11, 10, 20, 23, 20, 12,11, 14, 16, 17, 13, 18, 12,20, 7, 18, 11, 20, 11, 10,9,20];
    // var LabelX = ["Telkom", "Telkomsel", "BRI", "Lay 4", "Lay 5", "Lay 6", "Lay 7", "Lay 8", "Lay 9", "Lay 10", "Lay 11", "Lay 12", "Lay 13", "Lay 14", "Lay 15", "Lay 16", "Lay 17", "Lay 18", "Lay 19", "Lay 20", "Lay 21", "Lay 22", "Lay 23", "Lay 24", "Lay 25", "Lay 26", "Lay 27", "Lay 28", "Lay 29", "Lay 30"];

    // var bar_ctx = document.getElementById('BarWallPerformance');

    // var bar_chart = new Chart(bar_ctx, {
    //     type: 'bar',
    //     // type: 'horizontalBar',
    //     data: {
    //         labels: LabelX,
    //         datasets: [{
    //                 label: 'Layanan',
    //                 data: dataLayanan,
    //                 backgroundColor: "#3866a6",
    //                 hoverBackgroundColor: "#3866a6",
    //                 hoverBorderWidth: 0
    //             }
    //         ]
    //     },
    //     options: {
    //         responsive: true,
    //         maintainAspectRatio: false,
    //         title: {
    //             display: true,
    //             text: 'Traffic by Layanan',
    //             fontSize:14
    //         },
    //         animation: {
    //             duration: 10,
    //         },
    //         tooltips: {
    //             mode: 'label',
    //             callbacks: {
    //                 label: function (tooltipItem, data) {
    //                     return data.datasets[tooltipItem.datasetIndex].label + ": " + numberWithCommas(tooltipItem.yLabel);
    //                 }
    //             }
    //         },
    //         scales: {
    //             xAxes: [{
    //                 stacked: true,
    //                 gridLines: {
    //                     display: false
    //                 },
    //                 ticks: {
    //                     fontSize: 10
    //                 }
    //             }],
    //             yAxes: [{
    //                 stacked: true,
    //                 ticks: {
    //                     callback: function (value) {
    //                         return numberWithCommas(value);
    //                     },
    //                 },
    //             }],
    //         },
    //         legend: {
    //             display: false,
    //             labels: {
    //                 boxWidth: 10,
    //             }
    //         }
    //     },
    //     // plugins: [{
    //     // 	beforeInit: function (chart) {
    //     // 		chart.data.labels.forEach(function (value, index, array) {
    //     // 			var a = [];
    //     // 			a.push(value.slice(0, 5));
    //     // 			var i = 1;
    //     // 			while (value.length > (i * 5)) {
    //     // 				a.push(value.slice(i * 5, (i + 1) * 5));
    //     // 				i++;
    //     // 			}
    //     // 			array[index] = a;
    //     // 		})
    //     // 	}
    //     // }]
    // });

});