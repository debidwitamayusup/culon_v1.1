var months = [
    'January', 'February', 'March', 'April', 'May',
    'June', 'July', 'August', 'September',
    'October', 'November', 'December'
];
var base_url = $('#base_url').val();
var d = new Date();
var n = d.getMonth() + 1;
var m = d.getFullYear();
const sessionParams = JSON.parse(sessionStorage.getItem('Auth-infomedia'));
$(document).ready(function () {
    if(sessionParams){
        if(sessionParams.TENANT_ID[0].TENANT_ID != ''){
            getTenant('', sessionParams.USERID);
        }else{
            getTenant('', '');
        }
        drawStackedBar('month', '10', '2019', $("#layanan_name").val());
    }else{
        window.location = base_url
    }
});

function addCommas(commas) {
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

function destroyChartInterval() {
    // destroy chart interval 
    $('#BarWallTicketCloseMonth').remove(); // this is my <canvas> element
    $('#BarWallTicketCloseMonthDiv').append('<canvas id="BarWallTicketCloseMonth" height="452"></canvas>');
}

function getTenant(date, userid){
    $.ajax({
        type: 'POST',
        url: base_url + 'api/Wallboard/WallboardController/GetTennantFilter',
        data: {
            "date" : date,
            "userid" : userid
        },

        success: function (r) {
            var data_option = [];
            //dont parse response if using rest controller
            // var response = JSON.parse(r);
            var response = r;
            // console.log(response);
            // tenants = response.data;
                var html = '';
                for(i=0; i<response.data.length; i++){
                    html += '<option value='+response.data[i].TENANT_ID+'>'+response.data[i].TENANT_NAME+'</option>';
                }
                $('#layanan_name').html(html);
        },
        error: function (r) {
            //console.log(r);
            alert("error");
        },
    });
}


function drawStackedBar(params, index, params_year, tenant_id) {
    // destroyChartInterval();
    // $("#filter-loader").fadeIn("slow");
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
            "tenant_id": tenant_id
        },
        success: function (r) {
            // var response = JSON.parse(r);
            $('#BarWallTicketCloseMonth').remove(); // this is my <canvas> element
            $('#BarWallTicketCloseMonthDiv').append('<canvas id="BarWallTicketCloseMonth" height="452"></canvas>');
            $('#modalError').modal('hide');
            var response = r;
            setTimeout(function(){drawStackedBar('month', '10', '2019', $("#layanan_name").val());}, 5000);
            drawHorizontalChart(response);

            console.log(response);
            
            var numberWithCommas = function (x) {
                return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
            };

            var dataStacked = [];
            var datasetsStacked = "";

            response.data.forEach(function(value){
                datasetsStacked = {
                    label: value.channel_name,
                    data: value.total_traffic,
                    backgroundColor: value.channel_color,
                    hoverBackgroundColor: value.channel_color,
                    hoverBorderWidth: 0
                },
                dataStacked.push(datasetsStacked)
            })
            
            var bar_ctx = document.getElementById('BarWallTicketCloseMonth');

            var bar_chart = new Chart(bar_ctx, {
                type: 'bar',
                data: {
                    labels: response.dates,
                    datasets: dataStacked,
                },
                options: {
                    responsive :true,
                    maintainAspectRatio: false,
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
                                display: false
                            },
                        }],
                        yAxes: [{
                            stacked: true,
                            ticks: {
                                callback: function (value) {
                                    return numberWithCommas(value);
                                },
                            },
                        }],
                    },
                    legend: {
                        display: true,
                        labels: {
                            boxWidth: 10
                        }
                    }
                },
                // plugins: [{
                //     beforeInit: function (chart) {
                //         chart.data.labels.forEach(function (value, index, array) {
                //             var a = [];
                //             a.push(value.slice(0, 5));
                //             var i = 1;
                //             while (value.length > (i * 5)) {
                //                 a.push(value.slice(i * 5, (i + 1) * 5));
                //                 i++;
                //             }
                //             array[index] = a;
                //         })
                //     }
                // }]
            });
        },
        error: function (r) {
            $('#modalError').modal('show');
            setTimeout(function(){drawStackedBar('month', '10', '2019', $("#layanan_name").val());}, 5000);
            $("#filter-loader").fadeOut("slow");
        },
    });
}

function drawHorizontalChart(response) {
    $('#barWallTicketClose').remove(); // this is my <canvas> element
    $('#barWallTicketCloseDiv').append('<canvas id="barWallTicketClose"></canvas>');
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
            animation: false,
            responsive: true,
            maintainAspectRatio: false,
            scales: {
                xAxes: [{
                    ticks: {
                        min: 0, // Edit the value according to what you need
                        callback: function (value, index, values) {
                            //      if(parseInt(value) >= 1000){
                            //          var res = (value/1000);
                            // return res+'K'
                            //      } else
                            //       return value;
                            value = value.toString();
                            value = value.split(/(?=(?:...)*$)/);
                            value = value.join('.');
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
                    label: function (tooltipItem, data) {
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

function fromTemplate() {

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
            data: [1000, 5000, 4300, 6000, 7000, 5000, 10000, 3500, 6000, 7000, 2000, 2500],
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
        data: [10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10]
    }, {
        name: 'Facebook',
        type: 'bar',
        stack: 'Stack',
        data: [30, 30, 30, 30, 30, 30, 30, 30, 30, 30, 30, 30, 30, 30, 30, 30, 30, 30, 30, 30, 30, 30, 30, 30, 30, 30, 30, 30, 30, 30, 30]
    }, {
        name: 'Twitter',
        type: 'bar',
        stack: 'Stack',
        data: [40, 40, 40, 40, 40, 40, 40, 40, 40, 40, 40, 40, 40, 40, 40, 40, 40, 40, 40, 40, 40, 40, 40, 40, 40, 40, 40, 40, 40, 40, 40]
    }, {
        name: 'Twitter DM',
        type: 'bar',
        stack: 'Stack',
        data: [50, 50, 50, 50, 50, 50, 50, 50, 50, 50, 50, 50, 50, 50, 50, 50, 50, 50, 50, 50, 50, 50, 50, 50, 50, 50, 50, 50, 50, 50, 50]
    }, {
        name: 'Instagram',
        type: 'bar',
        stack: 'Stack',
        data: [60, 60, 60, 60, 60, 60, 60, 60, 60, 60, 60, 60, 60, 60, 60, 60, 60, 60, 60, 60, 60, 60, 60, 60, 60, 60, 60, 60, 60, 60, 60]
    }, {
        name: 'Messenger',
        type: 'bar',
        stack: 'Stack',
        data: [70, 70, 70, 70, 70, 70, 70, 70, 70, 70, 70, 70, 70, 70, 70, 70, 70, 70, 70, 70, 70, 70, 70, 70, 70, 70, 70, 70, 70, 70, 70]
    }, {
        name: 'Telegram',
        type: 'bar',
        stack: 'Stack',
        data: [80, 80, 80, 80, 80, 80, 80, 80, 80, 80, 80, 80, 80, 80, 80, 80, 80, 80, 80, 80, 80, 80, 80, 80, 80, 80, 80, 80, 80, 80, 80]
    }, {
        name: 'Line',
        type: 'bar',
        stack: 'Stack',
        data: [90, 90, 90, 90, 90, 90, 90, 90, 90, 90, 90, 90, 90, 90, 90, 90, 90, 90, 90, 90, 90, 90, 90, 90, 90, 90, 90, 90, 90, 90, 90]
    }, {
        name: 'Email',
        type: 'bar',
        stack: 'Stack',
        data: [100, 100, 100, 100, 100, 100, 100, 100, 100, 100, 100, 100, 100, 100, 100, 100, 100, 100, 100, 100, 100, 100, 100, 100, 100, 100, 100, 100, 100, 100, 100]
    }, {
        name: 'Voice',
        type: 'bar',
        stack: 'Stack',
        data: [120, 120, 120, 120, 120, 120, 120, 120, 120, 120, 120, 120, 120, 120, 120, 120, 120, 120, 120, 120, 120, 120, 120, 120, 120, 120, 120, 120, 120, 120, 120]
    }, {
        name: 'SMS',
        type: 'bar',
        stack: 'Stack',
        data: [140, 140, 140, 140, 140, 140, 140, 140, 140, 140, 140, 140, 140, 140, 140, 140, 140, 140, 140, 140, 140, 140, 140, 140, 140, 140, 140, 140, 140, 140, 140]
    }, {
        name: 'Live Chat',
        type: 'bar',
        stack: 'Stack',
        data: [160, 160, 160, 160, 160, 160, 160, 160, 160, 160, 160, 160, 160, 160, 160, 160, 160, 160, 160, 160, 160, 160, 160, 160, 160, 160, 160, 160, 160, 160, 160]
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
            data: ['1', '2', '3', '4', '5', '6', '7', '8', '9', '10', '11', '12', '13', '14', '15', '16', '17', '18', '19', '20', '21', '22', '23', '24', '25', '26', '27', '28', '29', '30', '31'],

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

// $(function ($) {
//     // Return with commas in between
//     var numberWithCommas = function (x) {
//         return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
//     };

//     var whatsapp = [20, 20, 20, 20, 20, 20, 20, 20, 20, 20, 20, 20, 20, 20, 20, 20, 20, 20, 20, 20, 20, 20, 20, 20, 20, 20, 20, 20, 20, 20, 20];
//     var facebook = [40, 40, 40, 40, 40, 40, 40, 40, 40, 40, 40, 40, 40, 40, 40, 40, 40, 40, 40, 40, 40, 40, 40, 40, 40, 40, 40, 40, 40, 40, 40];
//     var twitter = [60, 60, 60, 60, 60, 60, 60, 60, 60, 60, 60, 60, 60, 60, 60, 60, 60, 60, 60, 60, 60, 60, 60, 60, 60, 60, 60, 60, 60, 60, 60];
//     var twitterdm = [80, 80, 80, 80, 80, 80, 80, 80, 80, 80, 80, 80, 80, 80, 80, 80, 80, 80, 80, 80, 80, 80, 80, 80, 80, 80, 80, 80, 80, 80, 80];
//     var instagram = [90, 90, 90, 90, 90, 90, 90, 90, 90, 90, 90, 90, 90, 90, 90, 90, 90, 90, 90, 90, 90, 90, 90, 90, 90, 90, 90, 90, 90, 90, 90];
//     var messenger = [100, 100, 100, 100, 100, 100, 100, 100, 100, 100, 100, 100, 100, 100, 100, 100, 100, 100, 100, 100, 100, 100, 100, 100, 100, 100, 100, 100, 100, 100, 100];
//     var telegram = [110, 110, 110, 110, 110, 110, 110, 110, 110, 110, 110, 110, 110, 110, 110, 110, 110, 110, 110, 110, 110, 110, 110, 110, 110, 110, 110, 110, 110, 110, 110];
//     var line = [120, 120, 120, 120, 120, 120, 120, 120, 120, 120, 120, 120, 120, 120, 120, 120, 120, 120, 120, 120, 120, 120, 120, 120, 120, 120, 120, 120, 120, 120, 120];
//     var email = [130, 130, 130, 130, 130, 130, 130, 130, 130, 130, 130, 130, 130, 130, 130, 130, 130, 130, 130, 130, 130, 130, 130, 130, 130, 130, 130, 130, 130, 130, 130];
//     var twitter = [140, 140, 140, 140, 140, 140, 140, 140, 140, 140, 140, 140, 140, 140, 140, 140, 140, 140, 140, 140, 140, 140, 140, 140, 140, 140, 140, 140, 140, 140, 140];
//     var voice = [150, 150, 150, 150, 150, 150, 150, 150, 150, 150, 150, 150, 150, 150, 150, 150, 150, 150, 150, 150, 150, 150, 150, 150, 150, 150, 150, 150, 150, 150, 150];
//     var sms = [160, 160, 160, 160, 160, 160, 160, 160, 160, 160, 160, 160, 160, 160, 160, 160, 160, 160, 160, 160, 160, 160, 160, 160, 160, 160, 160, 160, 160, 160, 160];
//     var livechat = [170, 170, 170, 170, 170, 170, 170, 170, 170, 170, 170, 170, 170, 170, 170, 170, 170, 170, 170, 170, 170, 170, 170, 170, 170, 170, 170, 170, 170, 170, 170];
//     var chatbot = [180, 180, 180, 180, 180, 180, 180, 180, 180, 180, 180, 180, 180, 180, 180, 180, 180, 180, 180, 180, 180, 180, 180, 180, 180, 180, 180, 180, 180, 180, 180];
//     var LabelX = ['1', '2', '3', '4', '5', '6', '7', '8', '9', '10', '11', '12', '13', '14', '15', '16', '17', '18', '19', '20', '21', '22', '23', '24', '25', '26', '27', '28', '29', '30', '31'];
//     var bar_ctx = document.getElementById('BarWallTicketCloseMonth');

//     var bar_chart = new Chart(bar_ctx, {
//         type: 'bar',
//         data: {
//             labels: LabelX,
//             datasets: [
//                 {
//                     label: 'Whatsapp',
//                     data: whatsapp,
//                     backgroundColor: "#089e60",
//                     hoverBackgroundColor: "#089e60",
//                     hoverBorderWidth: 0
//                 },
//                 {
//                     label: 'Facebook',
//                     data: facebook,
//                     backgroundColor: "#467fcf",
//                     hoverBackgroundColor: "#467fcf",
//                     hoverBorderWidth: 0
//                 },
//                 {
//                     label: 'Twitter',
//                     data: twitter,
//                     backgroundColor: "#45aaf2",
//                     hoverBackgroundColor: "#45aaf2",
//                     hoverBorderWidth: 0
//                 },
//                 {
//                     label: 'Twitter DM',
//                     data: twitterdm,
//                     backgroundColor: "#6574cd",
//                     hoverBackgroundColor: "#6574cd",
//                     hoverBorderWidth: 0
//                 },
//                 {
//                     label: 'Instagram',
//                     data: instagram,
//                     backgroundColor: "#fbc0d5",
//                     hoverBackgroundColor: "#fbc0d5",
//                     hoverBorderWidth: 0
//                 },
//                 {
//                     label: 'Messenger',
//                     data: messenger,
//                     backgroundColor: "#3866a6",
//                     hoverBackgroundColor: "#3866a6",
//                     hoverBorderWidth: 0
//                 },
//                 {
//                     label: 'Telegram',
//                     data: telegram,
//                     backgroundColor: "#343a40",
//                     hoverBackgroundColor: "#343a40",
//                     hoverBorderWidth: 0
//                 },
//                 {
//                     label: 'Line',
//                     data: line,
//                     backgroundColor: "#31a550",
//                     hoverBackgroundColor: "#31a550",
//                     hoverBorderWidth: 0
//                 },
//                 {
//                     label: 'Email',
//                     data: email,
//                     backgroundColor: "#e41313",
//                     hoverBackgroundColor: "#e41313",
//                     hoverBorderWidth: 0
//                 },
//                 {
//                     label: 'Voice',
//                     data: voice,
//                     backgroundColor: "#ff9933",
//                     hoverBackgroundColor: "#ff9933",
//                     hoverBorderWidth: 0
//                 },
//                 {
//                     label: 'SMS',
//                     data: sms,
//                     backgroundColor: "#80cbc4",
//                     hoverBackgroundColor: "#80cbc4",
//                     hoverBorderWidth: 0
//                 },
//                 {
//                     label: 'Live Chat',
//                     data: livechat,
//                     backgroundColor: "#607d8b",
//                     hoverBackgroundColor: "#607d8b",
//                     hoverBorderWidth: 0
//                 },
//                 {
//                     label: 'ChatBot',
//                     data: chatbot,
//                     backgroundColor: "#6e273e",
//                     hoverBackgroundColor: "#6e273e",
//                     hoverBorderWidth: 0
//                 }
//             ]
//         },
//         options: {
//             animation: {
//                 duration: 10,
//             },
//             tooltips: {
//                 mode: 'label',
//                 callbacks: {
//                     label: function (tooltipItem, data) {
//                         return data.datasets[tooltipItem.datasetIndex].label + ": " + numberWithCommas(tooltipItem.yLabel);
//                     }
//                 }
//             },
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
//                 labels: {
// 					boxWidth: 10
// 				}
//             }
//         },
//         // plugins: [{
//         //     beforeInit: function (chart) {
//         //         chart.data.labels.forEach(function (value, index, array) {
//         //             var a = [];
//         //             a.push(value.slice(0, 5));
//         //             var i = 1;
//         //             while (value.length > (i * 5)) {
//         //                 a.push(value.slice(i * 5, (i + 1) * 5));
//         //                 i++;
//         //             }
//         //             array[index] = a;
//         //         })
//         //     }
//         // }]
//     });
// });