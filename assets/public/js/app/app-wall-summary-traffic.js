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

//get today
var v_params_today= m + '-' + n + '-' + (o);
//get yesterday
var v_params_yesterday =m + '-' + n + '-' + (o-1);
$(document).ready(function () {
    $("#filter-loader").fadeIn("slow");
    // fromTemplate();
    callSumAllTenant('day', v_params_yesterday, 0, '');
    callSumPerTenant('day', v_params_yesterday, 0, '');
    // drawIntervalChart();
    callIntervalTraffic('day',v_params_yesterday,0, '', '');
    getTenant(v_params_yesterday);

    $('#check-all-channel').prop('checked',false);
    $("input:checkbox.checklist-channel").prop('checked',false);
    var checkboxes = document.querySelectorAll('input[name="example-checkbox2"]:checked'), values = [], type = [];
    Array.prototype.forEach.call(checkboxes, function(el) {
        values.push(el.value);
        type.push($(el).data('type'));
    });
    // console.log(values);
    list_channel = values;

   $("#filter-loader").fadeOut("slow");
});

function getTenant(date){
    $.ajax({
        type: 'POST',
        url: base_url + 'api/Wallboard/WallboardController/GetTennantscr',
        data: {
            "date" : date
        },

        success: function (r) {
            var data_option = [];
            // var response = JSON.parse(r);
            var response = r;
            // console.log(response);
            var html = '<option value="">Semua Layanan</option>';
            // var html = '';
            var i;
            // console.log(response);
                for(i=0; i<response.data.length; i++){
                    html += '<option value='+response.data[i]+'>'+response.data[i]+'</option>';
                }
                $('#tenant_id').html(html);
            
            // var option = $ ("<option />");
            //     option.html(i);
            //     option.val(i);
            //     dateTahun.append(option);
        },
        error: function (r) {
            //console.log(r);
            alert("error");
        },
    });
}

//function get data and draw
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
    color['ChatBot'] = '#6e273e';

    return color[channel];
}

function callSumAllTenant(params, index, params_year, tenant_id){
    $.ajax({
        type: 'post',
        url: base_url+'api/Wallboard/WallboardController/TrafficOPSPieChart',
        data: {
            params: params,
            index: index,
            params_year: params_year,
            tenant_id: tenant_id
        },
        success: function (r) {
            // var response = JSON.parse(r);
            //hit url for interval 900000 (15 minutes)
            setTimeout(function(){callSumAllTenant(params, index, params_year, tenant_id);},900000);
            drawPieChartSumAllTenant(r);
            // $("#filter-loader").fadeOut("slow");
        },
        error: function (r) {
            // console.log(r);
            alert("error");
            // $("#filter-loader").fadeOut("slow");
        },
    });
}

function callSumPerTenant(params, index, params_year, tenant_id){
    $.ajax({
        type: 'post',
        url: base_url+'api/Wallboard/WallboardController/TrafficOPS',
        data: {
            params: params,
            index: index,
            params_year: params_year,
            tenant_id: tenant_id
        },
        success: function (r) {
            // var response = JSON.parse(r);
            var response = r;
            // console.log(response);
            //hit url for interval 900000 (15 minutes)
            setTimeout(function(){callSumPerTenant(params, index, params_year, tenant_id);},900000);
            drawChartPerTenant(response);
            // $("#filter-loader").fadeOut("slow");
        },
        error: function (r) {
            // console.log(r);
            alert("error");
            // $("#filter-loader").fadeOut("slow");
        },
    });
}

function callIntervalTraffic(params, index, params_year, channel, tenant_id){
    // console.log(+arr_channel);
    // $("#filter-loader").fadeIn("slow");
    $.ajax({
        type: 'post',
        url: base_url+'api/Wallboard/WallboardController/IntervalToday',
        data: {
            params: params,
            index: index,
            params_year: params_year,
            channel: channel,
            tenant_id: tenant_id
        },
        success: function (r) {
            // var response = JSON.parse(r);
            // console.log(response);
            //hit url for interval 900000 (15 minutes)
            setTimeout(function(){callIntervalTraffic(params, index, params_year, '', tenant_id);},900000);
            drawLineChart(r);
            // drawTableData(response);
            // $("#filter-loader").fadeOut("slow");
        },
        error: function (r) {
            // console.log(r);
            alert("error");
            // $("#filter-loader").fadeOut("slow");
        },
    });
}

function drawPieChartSumAllTenant(response){
    $('#pieWallSummaryTraffic').remove();
    $('#canvas-pie').append('<canvas id="pieWallSummaryTraffic" class="donutShadow overflow-hidden"></canvas>');

    var ctx = document.getElementById("pieWallSummaryTraffic");
    ctx.height = 250;
    var myChart = new Chart(ctx, {
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
            responsive: true,
            maintainAspectRatio: false,

            legend: {
                display: false
            },
            tooltips: {
              callbacks: {
                    label: function(tooltipItem, data) {
                        var value = data.datasets[0].data[tooltipItem.index];
                        value = value.toString();
                        value = value.split(/(?=(?:...)*$)/);
                        value = value.join(',');
                        return data.labels[tooltipItem.index]+': '+ value;
                    }
              } // end callbacks:
            },
            pieceLabel: {
                render: 'legend',
                fontColor: '#000',
                position: 'outside',
                segment: true
            },
            legendCallback: function (chart, index) {
                var allData = chart.data.datasets[0].data;
                // console.log(chart)
                var legendHtml = [];
                legendHtml.push('<ul><div class="row ml-2">');
                allData.forEach(function (data, index) {
                    var label = chart.data.labels[index];
                    var dataLabel = allData[index];
                    var background = chart.data.datasets[0].backgroundColor[index]
                    var total = 0;
                    for (var i in allData) {
                        total += parseInt(Number(allData[i]));
                    }

                    // console.log(total)
                    // var percentage = Math.round((dataLabel / total) * 100);
                    if(dataLabel != 0){
                        var percentage = parseFloat((dataLabel / total)*100).toFixed(1);
                    }else{
                        var percentage = Math.round((dataLabel / total) * 100);
                    }
                    legendHtml.push('<li class="col-md-4 col-lg-4 col-sm-6 col-xl-4">');
                    legendHtml.push('<span class="chart-legend"><div style="background-color :' + background + '" class="box-legend"></div>' + label + ':' + percentage + '%</span>');
                })
                legendHtml.push('</ul></div>');
                return legendHtml.join("");
            },
        }
    });
    var myLegendContainer = document.getElementById("legend");
    myLegendContainer.innerHTML = myChart.generateLegend();
}

// function drawChartPerTenant(response){
//     let arrTenant = [], dataTotal = [], dataChannel = [];

//     var j=0;
//     response.data.forEach(function(value,index){
//         arrTenant.push(value.TENANT_ID);
//         // value.forEach(function(value,index){
//         //     dataTotal.push(value.DATA);
//         // });
//         // for (var i = 0; i < response.data['0']['DATA'].length; i++) {
//         // response.data[i].DATA.forEach(function(value, index){
//         j.toString();
//         dataTotal.push(response.data[j]['DATA']);
//         // });
//         j++;
//         // }        
//     });
//     console.log(dataTotal)
//     // response.data.DATA.forEach(function(value,index){
//     //     dataTotal.push(value.DATA);
//     // });
//     dataChannel = response.channel;
//     // response.channel.forEach(function(value,index){
//     //     dataChannel.push(value.channel);
//     // });
//     console.log(response.data[0].DATA[0]);
//     var color = ['#e41313','#467fcf','#fbc0d5','#31a550','#607d8b','#3866a6','#80cbc4','#343a40','#45aaf2','#6574cd','#ff9933','#089e60','#6e273e'];

//     var dataStacked = [];
//     var datasetStacked = "";
//     for (var i = 0; i < response.data.length; i++) {
//         datasetStacked = {
//                     label: dataChannel[i],
//                     data: dataTotal[i],
//                     backgroundColor: color[i],
//                     hoverBackgroundColor: color[i],
//                     hoverBorderWidth: 0
//                 }
//                 dataStacked.push(datasetStacked);
//     }
//     console.log(color);

//     // console.log(response.data);
//     var numberWithCommas = function (x) {
//         return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
//     };

//     var bar_ctx = document.getElementById('horizontalBarWallSummary');

//     var bar_chart = new Chart(bar_ctx, {
//         // type: 'bar',
//         type: 'horizontalBar',
//         data: {
//             labels: arrTenant,
//             datasets: dataStacked
//         },
//         options: {
//             responsive: true,
//             maintainAspectRatio: false,
//             animation: {
//                 duration: 10,
//             },
//             // tooltips: {
//             //     mode: 'label',
//             //     callbacks: {
//             //         label: function (tooltipItem, data) {
//             //             return data.datasets[tooltipItem.datasetIndex].label + ": " + numberWithCommas(tooltipItem.xLabel);
//             //         }
//             //     }
//             // },
//             scales: {
//                 xAxes: [{
//                     stacked: true,
//                     gridLines: {
//                         display: false
//                     },
//                 }],
//                 yAxes: [{
//                     stacked: true,
//                     ticks: {
//                         callback: function (value) {
//                             return numberWithCommas(value);
//                         },
//                     },
//                 }],
//             },
//             legend: {
//                 display: true,
//                 position: "top",
//                 align: "start",
//                 labels: {
//                     boxWidth: 10
//                 }
//             }
//         },
//         // plugins: [{
//         //  beforeInit: function (chart) {
//         //      chart.data.labels.forEach(function (value, index, array) {
//         //          var a = [];
//         //          a.push(value.slice(0, 5));
//         //          var i = 1;
//         //          while (value.length > (i * 5)) {
//         //              a.push(value.slice(i * 5, (i + 1) * 5));
//         //              i++;
//         //          }
//         //          array[index] = a;
//         //      })
//         //  }
//         // }]
//     });

// }

function drawChartPerTenant(response){
    // destroyHorizontalChart();
    $('#echartWallSummaryTraffic').remove(); // this is my <canvas> element
    $('#echartWallSummaryTrafficDiv').append('<div id="echartWallSummaryTraffic" class="chartsh-traffic-ops overflow-hidden"></div>');
    let arrTenant = [], dataWa = [], dataFB = [], dataDM = [], dataIg = [], dataMessenger = [], dataTelegram = [], dataLine = [], dataEmail = [], dataVoice = [], dataSMS = [], dataLive = [], dataTwitter = [], dataChatbot=[];

    response.data.forEach(function (value, index) {
            arrTenant.push(value.TENANT_ID);
            // arrART.push(value.ART);
            // arrAHT.push(value.AHT);
            // arrAST.push(value.AST);
            // arrSCR.push(value.SCR);
        });
    for (var i = 0; i < response.data.length; i++) {
        // console.log()
        dataWa.push(response.data[i].DATA[10]);
        dataFB.push(response.data[i].DATA[5]);
        dataDM.push(response.data[i].DATA[11]);
        dataTwitter.push(response.data[i].DATA[7]);
        dataIg.push(response.data[i].DATA[9]);
        dataMessenger.push(response.data[i].DATA[6]);
        dataTelegram.push(response.data[i].DATA[4]);
        dataLine.push(response.data[i].DATA[8]);
        dataEmail.push(response.data[i].DATA[1]);
        dataVoice.push(response.data[i].DATA[0]);
        dataSMS.push(response.data[i].DATA[3]);
        dataLive.push(response.data[i].DATA[2]);
        dataChatbot.push(response.data[i].DATA[12]);
    }
    /*----echart Wallboard Summary Traffic----*/
    var chartWallSummary = [{
         name: 'Whatsapp',
         type: 'bar',
         stack: 'Stack',
         data: dataWa
     }, {
         name: 'Facebook',
         type: 'bar',
         stack: 'Stack',
         data: dataFB
     },{
         name: 'Twitter',
         type: 'bar',
         stack: 'Stack',
         data: dataTwitter
     },{
         name: 'Twitter DM',
         type: 'bar',
         stack: 'Stack',
         data: dataDM
     },{
         name: 'Instagram',
         type: 'bar',
         stack: 'Stack',
         data: dataIg
     },{
         name: 'Messenger',
         type: 'bar',
         stack: 'Stack',
         data: dataMessenger
     },{
         name: 'Telegram',
         type: 'bar',
         stack: 'Stack',
         data: dataTelegram
     },{
         name: 'Line',
         type: 'bar',
         stack: 'Stack',
         data: dataLine
     },{
         name: 'Email',
         type: 'bar',
         stack: 'Stack',
         data: dataEmail
     },{
         name: 'Voice',
         type: 'bar',
         stack: 'Stack',
         data: dataVoice
     },{
         name: 'SMS',
         type: 'bar',
         stack: 'Stack',
         data: dataSMS
     },{
         name: 'Live Chat',
         type: 'bar',
         stack: 'Stack',
         data: dataLive
    },{
         name: 'Chat Bot',
         type: 'bar',
         stack: 'Stack',
         data: dataChatbot
    }];
    /*----echartTicketUnit----*/
    var optionWallSummary = {
        tooltip: {
            trigger: 'axis',
            axisPointer: {       
                // type: 'shadow'
                label: {
                    show: false,
                    formatter: function (value, index) {
                            var teks = '';
                            // console.log(value)
                            if(value.value == "oct_telkomcare"){
                                teks = teks + "TELKOMCARE";
                            }
                            else if(value.value == "oct_telkomsel")
                            {
                                teks = teks + "TELKOMSEL";
                            }
                            else if(value.value == "oct_bodyshop")
                            {
                                teks = teks + "BODYSHOP";
                            }
                            else{
                                return value.value
                            }
                            return teks;
                    }
                }
            },
            position: function (pos, params, dom, rect, size) {
                 // tooltip will be fixed on the right if mouse hovering on the left,
                 // and on the left if hovering on the right.
                 // console.log(pos);
                 var obj = {top: pos[6]};
                 obj[['left', 'right'][+(pos[0] < size.viewSize[0] / 2)]] = 5;
                 return obj;
             },
        },
        legend: {
            // bottom: 10,
            left: 'center',
            top: 'auto',
            data: ['Whatsapp', 'Facebook', 'Twitter', 'Twitter DM', 'Instagram', 'Messenger', 'Telegram', 'Line', 'Email', 'Voice', 'SMS', 'Live Chat', 'Chat Bot'],
            itemWidth :12,
            padding: [10, 10,40, 10]
            
        },
        grid: {
            top: '25%',
            right: '3%',
            bottom: '5%',
            left: '1%',
            containLabel: true,
            width: 'auto'
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
            data: arrTenant,
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
                color: '#7886a0',
                formatter: function (value, index) {
                            var teks = '';
                            if(value == "oct_telkomcare"){
                                teks = teks + "TELKOMCARE";
                            }
                            else if(value == "oct_telkomsel")
                            {
                                teks = teks + "TELKOMSEL";
                            }
                            else if(value == "oct_bodyshop")
                            {
                                teks = teks + "BODYSHOP";
                            }
                            else{
                                return value
                            }
                            return teks;
                    }
            }
        },
        series: chartWallSummary,
        color: ['#089e60', '#467fcf', '#45aaf2', '#6574cd', '#fbc0d5', '#3866a6', '#343a40', '#31a550', '#e41313', '#ff9933', '#80cbc4', '#607d8b', '#6e273e']
    };
    var chartWallSummary = document.getElementById('echartWallSummaryTraffic');
    var barChartWallSummary = echarts.init(chartWallSummary);
    barChartWallSummary.setOption(optionWallSummary);
}

function destroyChartInterval(){
    // destroy chart interval 
    $('#lineWallSummaryTraffic').remove(); // this is my <canvas> element
    // $('#chart-no-data').remove(); // this is my <canvas> element
    $('#lineWallSummaryTrafficDiv').append('<canvas id="lineWallSummaryTraffic"  class="h-400"></canvas>');
}

function drawLineChart(response){
    destroyChartInterval();
    var data = [];
    if(!response.data.series){
        $('#lineWallSummaryTraffic').remove(); // this is my <canvas> element
        $('#lineWallSummaryTrafficDiv').append('<canvas id="lineWallSummaryTraffic" class="h-400"></canvas>');
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
        var ctx = document.getElementById( "lineWallSummaryTraffic" );
        var myChart = new Chart( ctx, {
            type: 'line',
            data: {
                labels: response.data.label_time,
                datasets: data
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                // legend:{
                //     position:'bottom',
                //     labels:{
                //         boxWidth:10
                //     }
                // },
                legend : false,
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

function drawIntervalChart(){
    // Line Wall
    var ctx = document.getElementById( "lineWallSummaryTraffic" );
    var myChart = new Chart( ctx, {
        type: 'line',
        data: {
            labels: [ "00:00", "01:00", "02:00", "03:00", "04:00", "05:00", "06:00", "07:00", "08:00", "09:00", "10:00", "11:00", "12:00", "13:00", "14:00", "15:00","16:00","17:00","18:00","19:00","20:00","21:00","22:00","23:00","24:00"],
            datasets: [ {
                label: "Whatsapp",
                data: [ 0,90,80,70,80,90,80,60,40,90,100,120,150,190,200,280,300,350,90,50,60,40,80,90,100],
                backgroundColor: 'transparent',
                borderColor: '#089e60',
                borderWidth: 3,
                pointStyle: 'circle',
                pointRadius: 5,
                pointBorderColor: 'transparent',
                pointBackgroundColor: '#089e60',
                    }, {
                label: "Facebook",
                data: [ 0,100,50,30,50,40,30,60,90,100,30,40,50,90,100,180,200,550,90,90,30,40,50,100,130 ],
                backgroundColor: 'transparent',
                borderColor: '#467fcf',
                borderWidth: 3,
                pointStyle: 'circle',
                pointRadius: 5,
                pointBorderColor: 'transparent',
                pointBackgroundColor: '#467fcf',
                 }, {
                label: "Twitter",
                data: [ 0,60,90,60,50,40,40,40,90,30,30,150,170,200,290,240,340,190,40,50,40,30,90,40,120],
                backgroundColor: 'transparent',
                borderColor: '#45aaf2',
                borderWidth: 3,
                pointStyle: 'circle',
                pointRadius: 5,
                pointBorderColor: 'transparent',
                pointBackgroundColor: '#45aaf2',
                    }, {
                label: "Twitter DM",
                data: [ 0,40,50,60,90,100,70,90,40,100,150,180,120,130,100,250,310,250,80,150,160,140,180,50,300 ],
                backgroundColor: 'transparent',
                borderColor: '#6574cd',
                borderWidth: 3,
                pointStyle: 'circle',
                pointRadius: 5,
                pointBorderColor: 'transparent',
                pointBackgroundColor: '#6574cd',
                    }, {
                label: "Line",
                data: [ 0,190,180,170,180,190,90,80,60,100,180,90,110,120,130,230,250,250,190,150,160,140,90,180,140 ],
                backgroundColor: 'transparent',
                borderColor: '#31a550',
                borderWidth: 3,
                pointStyle: 'circle',
                pointRadius: 5,
                pointBorderColor: 'transparent',
                pointBackgroundColor: '#31a550',
                    }, {
                label: "Messenger",
                data: [ 0,30,180,170,180,190,180,160,140,190,110,110,120,100,210,180,200,250,200,150,160,290,180,180,130 ],
                backgroundColor: 'transparent',
                borderColor: '#3866a6',
                borderWidth: 3,
                pointStyle: 'circle',
                pointRadius: 5,
                pointBorderColor: 'transparent',
                pointBackgroundColor: '#3866a6',
                    }, {
                label: "Telegram",
                data: [ 0,10,30,40,10,70,30,40,50,70,80,110,130,120,200,180,100,150,190,240,160,120,200,130,120],
                backgroundColor: 'transparent',
                borderColor: '#343a40',
                borderWidth: 3,
                pointStyle: 'circle',
                pointRadius: 5,
                pointBorderColor: 'transparent',
                pointBackgroundColor: '#343a40',
                    }, {
                label: "Instagram",
                data: [ 0,10,70,10,30,70,60,70,10,100,120,140,120,130,240,140,320,230,40,520,260,200,30,40,300 ],
                backgroundColor: 'transparent',
                borderColor: '#fbc0d5',
                borderWidth: 3,
                pointStyle: 'circle',
                pointRadius: 5,
                pointBorderColor: 'transparent',
                pointBackgroundColor: '#fbc0d5',
                    }, {
                label: "Email",
                data: [ 0,70,60,20,50,40,180,160,140,100,130,150,160,180,230,270,350,250,50,400,260,240,280,290,400 ],
                backgroundColor: 'transparent',
                borderColor: '#e41313',
                borderWidth: 3,
                pointStyle: 'circle',
                pointRadius: 5,
                pointBorderColor: 'transparent',
                pointBackgroundColor: '#e41313',
                    }, {
                label: "Voice",
                data: [ 0,70,50,60,70,80,90,60,60,50,130,130,100,200,250,260,100,50,70,150,160,140,180,190,120 ],
                backgroundColor: 'transparent',
                borderColor: '#ff9933',
                borderWidth: 3,
                pointStyle: 'circle',
                pointRadius: 5,
                pointBorderColor: 'transparent',
                pointBackgroundColor: '#ff9933',
                    },{
                label: "SMS",
                data: [ 0,190,180,170,180,190,180,160,140,100,150,150,180,180,250,200,350,150,100,90,80,50,70,60,120 ],
                backgroundColor: 'transparent',
                borderColor: '#80cbc4',
                borderWidth: 3,
                pointStyle: 'circle',
                pointRadius: 5,
                pointBorderColor: 'transparent',
                pointBackgroundColor: '#80cbc4',
                },{
                label: "Live Chat",
                data: [ 0,10,70,50,60,90,340,150,150,160,200,220,250,150,210,250,310,320,70,60,90,60,50,100,140 ],
                backgroundColor: 'transparent',
                borderColor: '#607d8b',
                borderWidth: 3,
                pointStyle: 'circle',
                pointRadius: 5,
                pointBorderColor: 'transparent',
                pointBackgroundColor: '#607d8b',
                    } ]
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
            barRoundness: 1,
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

function fromTemplate(){
    "use strict";

    //pie chart Ticket Channel
    var ctx = document.getElementById("pieWallSummaryTraffic");
    ctx.height = 250;
    var myChart = new Chart(ctx, {
        type: 'pie',
        data: {
            datasets: [{
                data: [15, 35, 40, 20, 50, 30, 15, 30, 40, 50, 70, 90],
                backgroundColor: [
                    "#467fcf",
                    "#fbc0d5",
                    "#31a550",
                    "#e41313",
                    "#3866a6",
                    "#45aaf2",
                    "#6574cd",
                    "#343a40",
                    "#607d8b",
                    "#31a550",
                    "#ff9933",
                    "#80cbc4"
                ],
                hoverBackgroundColor: [
                    "#467fcf",
                    "#fbc0d5",
                    "#31a550",
                    "#e41313",
                    "#3866a6",
                    "#45aaf2",
                    "#6574cd",
                    "#343a40",
                    "#607d8b",
                    "#31a550",
                    "#ff9933",
                    "#80cbc4"
                ]

            }],
            labels: [
                "Facebook",
                "Instagram",
                "Line",
                "Email",
                "Messenger",
                "Twitter",
                "Twitter DM",
                "Telegram",
                "Live Chat",
                "Whatsapp",
                "Voice",
                "SMS"
            ]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,

            legend: {
                display: false
            },
            pieceLabel: {
                render: 'legend',
                fontColor: '#000',
                position: 'outside',
                segment: true
            },
            legendCallback: function (chart, index) {
                var allData = chart.data.datasets[0].data;
                // console.log(chart)
                var legendHtml = [];
                legendHtml.push('<ul><div class="row ml-2">');
                allData.forEach(function (data, index) {
                    var label = chart.data.labels[index];
                    var dataLabel = allData[index];
                    var background = chart.data.datasets[0].backgroundColor[index]
                    var total = 0;
                    for (var i in allData) {
                        total += parseInt(allData[i]);
                    }

                    // console.log(total)
                    var percentage = Math.round((dataLabel / total) * 100);
                    legendHtml.push('<li class="col-md-4 col-lg-4 col-sm-6 col-xl-4">');
                    legendHtml.push('<span class="chart-legend"><div style="background-color :' + background + '" class="box-legend"></div>' + label + ':' + percentage + '%</span>');
                })
                legendHtml.push('</ul></div>');
                return legendHtml.join("");
            },
        }
    });
    var myLegendContainer = document.getElementById("legend");
    myLegendContainer.innerHTML = myChart.generateLegend();


    /*----echart Wallboard Summary Traffic----*/
    var chartWallSummary = [{
        name: 'ART',
        type: 'bar',
        stack: 'Stack',
        data: [12, 12, 12, 12, 12, 12, 12, 12, 12, 12,12,12]
    }, {
        name: 'AST',
        type: 'bar',
        stack: 'Stack',
        data: [25, 25, 25, 25, 25, 25, 25, 25, 25, 25,25,25]
    }, {
        name: 'AHT',
        type: 'bar',
        stack: 'Stack',
        data: [40, 40, 40, 40, 40, 40, 40, 40, 40, 40,40,40]
    }, {
        name: 'SCR',
        type: 'bar',
        stack: 'Stack',
        data: [60, 60, 60, 60, 60, 60, 60, 60, 60, 60,60,60]
    }];
    /*----echartTicketUnit----*/
    var optionWallSummary = {
        tooltip: {
            trigger: 'axis',
            axisPointer: {       
                type: 'shadow'
            }
        },
        legend: {
            bottom: 10,
            left: 'center',
            data: ['ART', 'AST', 'AHT', 'SCR'],
            labels:{
                boxWidth:10
            }
        },
        grid: {
            top: '3%',
            right: '3%',
            bottom: '15%',
            left: '20%',
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
            data: ['Garuda', 'Pegadaian', 'Pegadaian', 'BRI', 'Garuda', 'Pegadaian', 'BRI', 'Garuda', 'Pegadaian', 'BRI', 'Garuda', 'Telkom'],
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
        series: chartWallSummary,
        color: ["#00206C", "#007C7A", "#0038DE", "#00CBC9"]
    };
    var chartWallSummary = document.getElementById('echartWallSummaryTraffic');
    var barChartWallSummary = echarts.init(chartWallSummary);
    barChartWallSummary.setOption(optionWallSummary);

// Line Wall
    var ctx = document.getElementById( "lineWallSummaryTraffic" );
    var myChart = new Chart( ctx, {
        type: 'line',
        data: {
            labels: [ "00:00", "01:00", "02:00", "03:00", "04:00", "05:00", "06:00", "07:00", "08:00", "09:00", "10:00", "11:00", "12:00", "13:00", "14:00", "15:00","16:00","17:00","18:00","19:00","20:00","21:00","22:00","23:00","24:00"],
            datasets: [ {
                label: "Whatsapp",
                data: [ 0,90,80,70,80,90,80,60,40,90,100,120,150,190,200,280,300,350,90,50,60,40,80,90,100],
                backgroundColor: 'transparent',
                borderColor: '#089e60',
                borderWidth: 3,
                pointStyle: 'circle',
                pointRadius: 5,
                pointBorderColor: 'transparent',
                pointBackgroundColor: '#089e60',
                    }, {
                label: "Facebook",
                data: [ 0,100,50,30,50,40,30,60,90,100,30,40,50,90,100,180,200,550,90,90,30,40,50,100,130 ],
                backgroundColor: 'transparent',
                borderColor: '#467fcf',
                borderWidth: 3,
                pointStyle: 'circle',
                pointRadius: 5,
                pointBorderColor: 'transparent',
                pointBackgroundColor: '#467fcf',
                 }, {
                label: "Twitter",
                data: [ 0,60,90,60,50,40,40,40,90,30,30,150,170,200,290,240,340,190,40,50,40,30,90,40,120],
                backgroundColor: 'transparent',
                borderColor: '#45aaf2',
                borderWidth: 3,
                pointStyle: 'circle',
                pointRadius: 5,
                pointBorderColor: 'transparent',
                pointBackgroundColor: '#45aaf2',
                    }, {
                label: "Twitter DM",
                data: [ 0,40,50,60,90,100,70,90,40,100,150,180,120,130,100,250,310,250,80,150,160,140,180,50,300 ],
                backgroundColor: 'transparent',
                borderColor: '#6574cd',
                borderWidth: 3,
                pointStyle: 'circle',
                pointRadius: 5,
                pointBorderColor: 'transparent',
                pointBackgroundColor: '#6574cd',
                    }, {
                label: "Line",
                data: [ 0,190,180,170,180,190,90,80,60,100,180,90,110,120,130,230,250,250,190,150,160,140,90,180,140 ],
                backgroundColor: 'transparent',
                borderColor: '#31a550',
                borderWidth: 3,
                pointStyle: 'circle',
                pointRadius: 5,
                pointBorderColor: 'transparent',
                pointBackgroundColor: '#31a550',
                    }, {
                label: "Messenger",
                data: [ 0,30,180,170,180,190,180,160,140,190,110,110,120,100,210,180,200,250,200,150,160,290,180,180,130 ],
                backgroundColor: 'transparent',
                borderColor: '#3866a6',
                borderWidth: 3,
                pointStyle: 'circle',
                pointRadius: 5,
                pointBorderColor: 'transparent',
                pointBackgroundColor: '#3866a6',
                    }, {
                label: "Telegram",
                data: [ 0,10,30,40,10,70,30,40,50,70,80,110,130,120,200,180,100,150,190,240,160,120,200,130,120],
                backgroundColor: 'transparent',
                borderColor: '#343a40',
                borderWidth: 3,
                pointStyle: 'circle',
                pointRadius: 5,
                pointBorderColor: 'transparent',
                pointBackgroundColor: '#343a40',
                    }, {
                label: "Instagram",
                data: [ 0,10,70,10,30,70,60,70,10,100,120,140,120,130,240,140,320,230,40,520,260,200,30,40,300 ],
                backgroundColor: 'transparent',
                borderColor: '#fbc0d5',
                borderWidth: 3,
                pointStyle: 'circle',
                pointRadius: 5,
                pointBorderColor: 'transparent',
                pointBackgroundColor: '#fbc0d5',
                    }, {
                label: "Email",
                data: [ 0,70,60,20,50,40,180,160,140,100,130,150,160,180,230,270,350,250,50,400,260,240,280,290,400 ],
                backgroundColor: 'transparent',
                borderColor: '#e41313',
                borderWidth: 3,
                pointStyle: 'circle',
                pointRadius: 5,
                pointBorderColor: 'transparent',
                pointBackgroundColor: '#e41313',
                    }, {
                label: "Voice",
                data: [ 0,70,50,60,70,80,90,60,60,50,130,130,100,200,250,260,100,50,70,150,160,140,180,190,120 ],
                backgroundColor: 'transparent',
                borderColor: '#ff9933',
                borderWidth: 3,
                pointStyle: 'circle',
                pointRadius: 5,
                pointBorderColor: 'transparent',
                pointBackgroundColor: '#ff9933',
                    },{
                label: "SMS",
                data: [ 0,190,180,170,180,190,180,160,140,100,150,150,180,180,250,200,350,150,100,90,80,50,70,60,120 ],
                backgroundColor: 'transparent',
                borderColor: '#80cbc4',
                borderWidth: 3,
                pointStyle: 'circle',
                pointRadius: 5,
                pointBorderColor: 'transparent',
                pointBackgroundColor: '#80cbc4',
                },{
                label: "Live Chat",
                data: [ 0,10,70,50,60,90,340,150,150,160,200,220,250,150,210,250,310,320,70,60,90,60,50,100,140 ],
                backgroundColor: 'transparent',
                borderColor: '#607d8b',
                borderWidth: 3,
                pointStyle: 'circle',
                pointRadius: 5,
                pointBorderColor: 'transparent',
                pointBackgroundColor: '#607d8b',
                    } ]
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
            barRoundness: 1,
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

//jquery
(function ($) {
    
    // checked all channel
    $('#check-all-channel').click(function(){
        $("input:checkbox.checklist-channel").prop('checked',this.checked);
        var checkboxes = document.querySelectorAll('input[name="example-checkbox2"]:checked'), values = [], type = [];
        Array.prototype.forEach.call(checkboxes, function(el) {
            values.push(el.value);
            type.push($(el).data('type'));
        });
        // console.log(values);
        list_channel = values;

        // call data
        callIntervalTraffic('day', v_params_yesterday,0,list_channel, $('#tenant_id').val());
    });

    //checked channel
    $('.checklist-channel').click(function(){
        $('#check-all-channel').prop( "checked", false );
        
        var checkedValues = $('input:checkbox:checked').map(function() {
            return this.value;
        }).get();

        var checkboxes = document.querySelectorAll('input[name="example-checkbox2"]:checked'), values = [], type = [];
        Array.prototype.forEach.call(checkboxes, function(el) {
            values.push(el.value);
            type.push($(el).data('type'));
        });
        // console.log(values);
        list_channel = values;
        // call data
        callIntervalTraffic('day',v_params_yesterday,0, list_channel, $('#tenant_id').val());
    });

    $("select#tenant_id").change(function(){
        // destroyChartInterval();
         // destroyChartInterval();
        var selectedTenant = $(this).children("option:selected").val();
        // callTableCOFByChannel(v_params_yesterday, selectedTenant);
        callSumAllTenant('day', v_params_yesterday, 0, selectedTenant);
        callSumPerTenant('day', v_params_yesterday, 0, selectedTenant);
        // drawIntervalChart();
        callIntervalTraffic('day',v_params_yesterday,0, '', selectedTenant);
        $('#tenant_id option[value='+selectedTenant+']').attr('selected','selected');
        $('#check-all-channel').prop('checked',false);
        $("input:checkbox.checklist-channel").prop('checked',false);
        // getTenant(v_params_yesterday);
    });
    
    // Horizontal Bar Wallboard Summary Traffic yang baru 
	// Return with commas in between
	// var numberWithCommas = function (x) {
	// 	return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
	// };

	// var whatsapp = [20, 20, 20];
	// var facebook = [40, 40, 40];
 //    var twitter = [60, 60, 60];
 //    var twitterdm = [80, 80, 80];
 //    var instagram = [90, 90, 90];
 //    var messenger = [100, 100, 100];
 //    var telegram = [110, 110, 110];
 //    var line = [120, 120, 120];
 //    var email = [130, 130, 130];
 //    var twitter = [140, 140, 140];
 //    var voice = [150,150, 150];
 //    var sms = [160, 160, 160];
 //    var livechat = [170, 170, 170];
 //    var chatbot = [180, 180, 180];
	// var LabelX = ["Telkom Care", "Telkom", "BRI"];

	// var bar_ctx = document.getElementById('horizontalBarWallSummary');

	// var bar_chart = new Chart(bar_ctx, {
	// 	// type: 'bar',
	// 	type: 'horizontalBar',
	// 	data: {
	// 		labels: LabelX,
	// 		datasets: [{
	// 				label: 'Whatsapp',
	// 				data: whatsapp,
	// 				backgroundColor: "#089e60",
	// 				hoverBackgroundColor: "#089e60",
	// 				hoverBorderWidth: 0
	// 			},
	// 			{
	// 				label: 'Facebook',
	// 				data: facebook,
	// 				backgroundColor: "#467fcf",
	// 				hoverBackgroundColor: "#467fcf",
	// 				hoverBorderWidth: 0
	// 			},
	// 			{
	// 				label: 'Twitter',
	// 				data: twitter,
	// 				backgroundColor: "#45aaf2",
	// 				hoverBackgroundColor: "#45aaf2",
	// 				hoverBorderWidth: 0
 //                },
 //                {
	// 				label: 'Twitter DM',
	// 				data: twitterdm,
	// 				backgroundColor: "#6574cd",
	// 				hoverBackgroundColor: "#6574cd",
	// 				hoverBorderWidth: 0
 //                },
 //                {
	// 				label: 'Instagram',
	// 				data: instagram,
	// 				backgroundColor: "#fbc0d5",
	// 				hoverBackgroundColor: "#fbc0d5",
	// 				hoverBorderWidth: 0
 //                },
 //                {
	// 				label: 'Messenger',
	// 				data: messenger,
	// 				backgroundColor: "#3866a6",
	// 				hoverBackgroundColor: "#3866a6",
	// 				hoverBorderWidth: 0
 //                },
 //                {
	// 				label: 'Telegram',
	// 				data: telegram,
	// 				backgroundColor: "#343a40",
	// 				hoverBackgroundColor: "#343a40",
	// 				hoverBorderWidth: 0
 //                },
 //                {
	// 				label: 'Line',
	// 				data:line,
	// 				backgroundColor: "#31a550",
	// 				hoverBackgroundColor: "#31a550",
	// 				hoverBorderWidth: 0
 //                },
 //                {
	// 				label: 'Email',
	// 				data: email,
	// 				backgroundColor: "#e41313",
	// 				hoverBackgroundColor: "#e41313",
	// 				hoverBorderWidth: 0
 //                },
 //                {
	// 				label: 'Voice',
	// 				data: voice,
	// 				backgroundColor: "#ff9933",
	// 				hoverBackgroundColor: "#ff9933",
	// 				hoverBorderWidth: 0
 //                },
 //                {
	// 				label: 'SMS',
	// 				data: sms,
	// 				backgroundColor: "#80cbc4",
	// 				hoverBackgroundColor: "#80cbc4",
	// 				hoverBorderWidth: 0
 //                },
 //                {
	// 				label: 'Live Chat',
	// 				data: livechat,
	// 				backgroundColor: "#607d8b",
	// 				hoverBackgroundColor: "#607d8b",
	// 				hoverBorderWidth: 0
 //                },
 //                {
	// 				label: 'ChatBot',
	// 				data: chatbot,
	// 				backgroundColor: "#6e273e",
	// 				hoverBackgroundColor: "#6e273e",
	// 				hoverBorderWidth: 0
	// 			}
	// 		]
	// 	},
	// 	options: {
	// 		responsive: true,
	// 		maintainAspectRatio: false,
	// 		animation: {
	// 			duration: 10,
	// 		},
	// 		tooltips: {
	// 			mode: 'label',
	// 			callbacks: {
	// 				label: function (tooltipItem, data) {
	// 					return data.datasets[tooltipItem.datasetIndex].label + ": " + numberWithCommas(tooltipItem.xLabel);
	// 				}
	// 			}
	// 		},
	// 		scales: {
	// 			xAxes: [{
	// 				stacked: true,
	// 				gridLines: {
	// 					display: false
	// 				},
	// 			}],
	// 			yAxes: [{
	// 				stacked: true,
	// 				ticks: {
	// 					callback: function (value) {
	// 						return numberWithCommas(value);
	// 					},
	// 				},
	// 			}],
	// 		},
	// 		legend: {
	// 			display: true,
	// 			labels: {
	// 				boxWidth: 10
	// 			}
	// 		}
	// 	},
		// plugins: [{
		// 	beforeInit: function (chart) {
		// 		chart.data.labels.forEach(function (value, index, array) {
		// 			var a = [];
		// 			a.push(value.slice(0, 5));
		// 			var i = 1;
		// 			while (value.length > (i * 5)) {
		// 				a.push(value.slice(i * 5, (i + 1) * 5));
		// 				i++;
		// 			}
		// 			array[index] = a;
		// 		})
		// 	}
		// }]
	// });
})(jQuery);