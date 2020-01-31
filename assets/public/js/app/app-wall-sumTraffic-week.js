var base_url = $('#base_url').val();

Date.prototype.getWeek = function () {
    var date = new Date(this.getTime());
    date.setHours(0, 0, 0, 0);
    // Thursday in current week decides the year.
    date.setDate(date.getDate() + 3 - (date.getDay() + 6) % 7);
    // January 4 is always in week 1.
    var week1 = new Date(date.getFullYear(), 0, 4);
    // Adjust to Thursday in week 1 and count number of weeks from date to week1.
    return 1 + Math.round(((date.getTime() - week1.getTime()) / 86400000 -
        3 + (week1.getDay() + 6) % 7) / 7);
}

var d = new Date();
var params_week = d.getWeek() - 1;
// console.log(params_week);

$(document).ready(function () {
    // $("#filter-loader").fadeIn("slow");

    getSummTrafficByChannel(params_week,["Facebook", "Whatsapp", "Twitter", "Email", "Telegram", "Line", "Voice", "Instagram", "Messenger", "Twitter DM", "Live Chat", "SMS", "ChatBot"], '');
    getTrafficInterval(params_week,'', '');
    getTableChart(params_week,["Facebook", "Whatsapp", "Twitter", "Email", "Telegram", "Line", "Voice", "Instagram", "Messenger", "Twitter DM", "Live Chat", "SMS", "Chat Bot"], '');
    drawChartDaily(params_week,["Facebook", "Whatsapp", "Twitter", "Email", "Telegram", "Line", "Voice", "Instagram", "Messenger", "Twitter DM", "Live Chat", "SMS", "Chat Bot"], '');

    $('#check-all-channel').prop('checked', false);
    $("input:checkbox.checklist-channel").prop('checked', false);
    var checkboxes = document.querySelectorAll('input[name="example-checkbox2"]:checked'),
        values = [],
        type = [];
    Array.prototype.forEach.call(checkboxes, function (el) {
        values.push(el.value);
        type.push($(el).data('type'));
    });
    // console.log(values);
    list_channel = values;
});

function addCommas(commas) {
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

function getColorChannel(channel) {
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

function getSummTrafficByChannel(week, arr_channel, tenant_id){
    $.ajax({
        type: 'post',
        url: base_url + 'api/SummaryTraffic/SummaryToday/getIntervalTrafficWeeklyBar',
        data: {
            week: week,
            arr_channel: arr_channel,
            tenant_id
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
    // console.log(response);
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
    ctx_percentage.height = 501;
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
                        callback: function (value, index, values) {
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
                    label: function (tooltipItem, data) {
                        var value = data_rate[tooltipItem.index];
                        value = addCommas(value);
                        return value;
                    }
                }
            },
        }
    });
}

function getTrafficInterval(week,arr_channel, tenant_id){
    $.ajax({
        type: 'post',
        url: base_url + 'api/SummaryTraffic/SummaryToday/getIntervalTrafficWeekly',
        data: {
            week: week,
            arr_channel: arr_channel,
            tenant_id: tenant_id
        },
        success: function (r) {
            var response = JSON.parse(r);
            // console.log(response);
            setTimeout(function(){callIntervalTraffic(week, '');},900000);
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

function drawTrafficInterval(response) {
    // destroy chart interval 
    $('#lineWallsumTrafficWeek').remove(); // this is my <canvas> element
    $('#lineWallsumTrafficWeekDiv').append('<canvas id="lineWallsumTrafficWeek"  class="h-400"></canvas>');
    var data = [];
    if (!response.data.series) {
        $('#lineWallsumTrafficWeek').remove(); // this is my <canvas> element
        $('#lineWallsumTrafficWeekDiv').append('<canvas id="lineWallsumTrafficWeek" class="h-400"></canvas>');
    } else {
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
        var ctx = document.getElementById("lineWallsumTrafficWeek");
        var myChart = new Chart(ctx, {
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
                legend: {
                    display: false
                },
                barRoundness: 1,
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        });
    }
}

function getTableChart(week,arr_channel, tenant_id){
    $.ajax({
        type: 'post',
        url: base_url + 'api/SummaryTraffic/SummaryToday/getIntervalTrafficWeeklyBarAvg',
        data: {
            week: week,
            arr_channel: arr_channel,
            tenant_id: tenant_id
        },
        success: function (r) {
            var response = JSON.parse(r);
            // console.log(response);
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

function drawTableTraffic(response) {
    var mon = response.data[0].DATA.map(Number).reduce(summarize);
    var tue = response.data[1].DATA.map(Number).reduce(summarize);;
    var wed = response.data[2].DATA.map(Number).reduce(summarize);;
    var thu = response.data[3].DATA.map(Number).reduce(summarize);;
    var fri = response.data[4].DATA.map(Number).reduce(summarize);;
    var sat = response.data[5].DATA.map(Number).reduce(summarize);;
    var sun = response.data[6].DATA.map(Number).reduce(summarize);;

    function summarize(total, num) {
        return total + num;
    }

    // console.log(response.data[0].data);
    $('#mytbody').empty();
    if (response.data.length != 0) {
        for (var i = 0; i < 13; i++) {
            // console.log(response.channel[i]);
            $('#mytable').find('tbody').append('<tr>' +
                '<td class="text-center">' + (i + 1) + '</td>' +
                '<td class="text-left">' + response.channel[i] + '</td>' +
                '<td class="text-right">' + response.data[0].DATA[i] + '</td>' +
                '<td class="text-right">' + response.data[1].DATA[i] + '</td>' +
                '<td class="text-right">' + response.data[2].DATA[i] + '</td>' +
                '<td class="text-right">' + response.data[3].DATA[i] + '</td>' +
                '<td class="text-right">' + response.data[4].DATA[i] + '</td>' +
                '<td class="text-right">' + response.data[5].DATA[i] + '</td>' +
                '<td class="text-right">' + response.data[6].DATA[i] + '</td>' +
                '</tr>');
        };
        $('#mytable').find('tbody').append('<tr class="bg-total font-weight-extrabold">' +
            '<td colspan="2" class="text-center">TOTAL</td>' +
            '<td class="text-right">' + addCommas(mon) + '</td>' +
            '<td class="text-right">' + addCommas(tue) + '</td>' +
            '<td class="text-right">' + addCommas(wed) + '</td>' +
            '<td class="text-right">' + addCommas(thu) + '</td>' +
            '<td class="text-right">' + addCommas(fri) + '</td>' +
            '<td class="text-right">' + addCommas(sat) + '</td>' +
            '<td class="text-right">' + addCommas(sun) + '</td>' +
            '</tr>');
    } else {
        s
        $('#mytable').find('tbody').append('<tr>' +
            '<td colspan=6> No Data </td>' +
            '</tr>');
    }

    // $("#filter-loader").fadeOut("slow");
}

function drawChartDaily(week,arr_channel, tenant_id){
    // Horizontal Bar
    $('#echartWeek').remove();
    $('#echartWeekDiv').append('<div id="echartWeek" class="chartsh-wall overflow-hidden"></div>');

    var base_url = $('#base_url').val();

    $.ajax({
        type: 'post',
        url: base_url + 'api/SummaryTraffic/SummaryToday/getIntervalTrafficWeeklyBarAvg',
        data: {
            'week': week,
            'arr_channel': arr_channel,
            "tenant_id": tenant_id
        },
        success: function (r) {
            var response = JSON.parse(r);
            // console.log(response);

            let dataWa = [],
                dataFB = [],
                dataDM = [],
                dataIg = [],
                dataMessenger = [],
                dataTelegram = [],
                dataLine = [],
                dataEmail = [],
                dataVoice = [],
                dataSMS = [],
                dataLive = [],
                dataTwitter = [],
                dataChatBot = [];
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
                dataChatBot.push(response.data[i].DATA[12]);
            }

            var chartdata3 = [{
                name: 'Whatsapp',
                type: 'bar',
                stack: 'Stack',
                data: dataWa
            }, {
                name: 'Facebook',
                type: 'bar',
                stack: 'Stack',
                data: dataFB
            }, {
                name: 'Twitter',
                type: 'bar',
                stack: 'Stack',
                data: dataTwitter
            }, {
                name: 'Twitter DM',
                type: 'bar',
                stack: 'Stack',
                data: dataDM
            }, {
                name: 'Instagram',
                type: 'bar',
                stack: 'Stack',
                data: dataIg
            }, {
                name: 'Messenger',
                type: 'bar',
                stack: 'Stack',
                data: dataMessenger
            }, {
                name: 'Telegram',
                type: 'bar',
                stack: 'Stack',
                data: dataTelegram
            }, {
                name: 'Line',
                type: 'bar',
                stack: 'Stack',
                data: dataLine
            }, {
                name: 'Email',
                type: 'bar',
                stack: 'Stack',
                data: dataEmail
            }, {
                name: 'Voice',
                type: 'bar',
                stack: 'Stack',
                data: dataVoice
            }, {
                name: 'SMS',
                type: 'bar',
                stack: 'Stack',
                data: dataSMS
            }, {
                name: 'Live Chat',
                type: 'bar',
                stack: 'Stack',
                data: dataLive
            }, {
                name: 'Chat Bot',
                type: 'bar',
                stack: 'Stack',
                data: dataChatBot
            }];

            var option6 = {
                grid: {
                    top: '25%',
                    right: '3%',
                    bottom: '5%',
                    left: '3%',
                    width: '100%',
                    containLabel: true
                },
                xAxis: {
                    type: 'category',
                    data: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'],

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
                        var obj = {
                            top: pos[6]
                        };
                        obj[['left', 'right'][+(pos[0] < size.viewSize[0] / 2)]] = 5;
                        return obj;
                    },
                },
                legend: {
                    // bottom: 10,
                    left: 'center',
                    top: 'auto',
                    data: ['Whatsapp', 'Facebook', 'Twitter', 'Twitter DM', 'Instagram', 'Messenger', 'Telegram', 'Line', 'Email', 'Voice', 'SMS', 'Live Chat', 'Chat Bot'],
                    itemWidth: 12
                },
                series: chartdata3,
                color: ['#089e60', '#467fcf', '#45aaf2', '#6574cd', '#fbc0d5', '#3866a6', '#343a40', '#31a550', '#e41313', '#ff9933', '#80cbc4', '#607d8b', '#6e273e']
            };
            var chart6 = document.getElementById('echartWeek');
            var barChart6 = echarts.init(chart6);
            barChart6.setOption(option6);
        },
        error: function (r) {
            alert("error");
            // $("#filter-loader").fadeOut("slow");
        }
    });
}

(function ($) {

    // checked all channel
    $('#check-all-channel').click(function () {
        $("input:checkbox.checklist-channel").prop('checked', this.checked);
        var checkboxes = document.querySelectorAll('input[name="example-checkbox2"]:checked'),
            values = [],
            type = [];
        Array.prototype.forEach.call(checkboxes, function (el) {
            values.push(el.value);
            type.push($(el).data('type'));
        });
        // console.log(values);
        list_channel = values;

        // call data
        getTrafficInterval(params_week, list_channel);
    });

    //checked channel
    $('.checklist-channel').click(function () {
        $('#check-all-channel').prop("checked", false);

        var checkedValues = $('input:checkbox:checked').map(function () {
            return this.value;
        }).get();

        var checkboxes = document.querySelectorAll('input[name="example-checkbox2"]:checked'),
            values = [],
            type = [];
        Array.prototype.forEach.call(checkboxes, function (el) {
            values.push(el.value);
            type.push($(el).data('type'));
        });
        // console.log(values);
        list_channel = values;
        // call data
        getTrafficInterval(params_week, list_channel);
    });

    // Vertical Bar Wallboard Summary Traffic Week yang baru 
    // Return with commas in between
    var numberWithCommas = function (x) {
        return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
    };

    var whatsapp = [20, 20, 20, 20, 20, 20, 20];
    var facebook = [40, 40, 40, 40, 40, 40, 40];
    var twitter = [60, 60, 60, 60, 60, 60, 60];
    var twitterdm = [80, 80, 80, 80, 80, 80, 80];
    var instagram = [90, 90, 90, 90, 90, 90, 90];
    var messenger = [100, 100, 100, 100, 100, 100, 100];
    var telegram = [110, 110, 110, 110, 110, 110, 110];
    var line = [120, 120, 120, 120, 120, 120, 120];
    var email = [130, 130, 130, 130, 130, 130, 130];
    var twitter = [140, 140, 140, 140, 140, 140, 140];
    var voice = [150, 150, 150, 150, 150, 150, 150];
    var sms = [160, 160, 160, 160, 160, 160, 160];
    var livechat = [170, 170, 170, 170, 170, 170, 170];
    var chatbot = [180, 180, 180, 180, 180, 180, 180];
    var LabelX = ["Mon", "Tue", "Wed", "Thu", "Fri", "Sat", "Sun"];

    var bar_ctx = document.getElementById('BarWallSummaryWeek');

    var bar_chart = new Chart(bar_ctx, {
        type: 'bar',
        // type: 'horizontalBar',
        data: {
            labels: LabelX,
            datasets: [{
                    label: 'Whatsapp',
                    data: whatsapp,
                    backgroundColor: "#089e60",
                    hoverBackgroundColor: "#089e60",
                    hoverBorderWidth: 0
                },
                {
                    label: 'Facebook',
                    data: facebook,
                    backgroundColor: "#467fcf",
                    hoverBackgroundColor: "#467fcf",
                    hoverBorderWidth: 0
                },
                {
                    label: 'Twitter',
                    data: twitter,
                    backgroundColor: "#45aaf2",
                    hoverBackgroundColor: "#45aaf2",
                    hoverBorderWidth: 0
                },
                {
                    label: 'Twitter DM',
                    data: twitterdm,
                    backgroundColor: "#6574cd",
                    hoverBackgroundColor: "#6574cd",
                    hoverBorderWidth: 0
                },
                {
                    label: 'Instagram',
                    data: instagram,
                    backgroundColor: "#fbc0d5",
                    hoverBackgroundColor: "#fbc0d5",
                    hoverBorderWidth: 0
                },
                {
                    label: 'Messenger',
                    data: messenger,
                    backgroundColor: "#3866a6",
                    hoverBackgroundColor: "#3866a6",
                    hoverBorderWidth: 0
                },
                {
                    label: 'Telegram',
                    data: telegram,
                    backgroundColor: "#343a40",
                    hoverBackgroundColor: "#343a40",
                    hoverBorderWidth: 0
                },
                {
                    label: 'Line',
                    data: line,
                    backgroundColor: "#31a550",
                    hoverBackgroundColor: "#31a550",
                    hoverBorderWidth: 0
                },
                {
                    label: 'Email',
                    data: email,
                    backgroundColor: "#e41313",
                    hoverBackgroundColor: "#e41313",
                    hoverBorderWidth: 0
                },
                {
                    label: 'Voice',
                    data: voice,
                    backgroundColor: "#ff9933",
                    hoverBackgroundColor: "#ff9933",
                    hoverBorderWidth: 0
                },
                {
                    label: 'SMS',
                    data: sms,
                    backgroundColor: "#80cbc4",
                    hoverBackgroundColor: "#80cbc4",
                    hoverBorderWidth: 0
                },
                {
                    label: 'Live Chat',
                    data: livechat,
                    backgroundColor: "#607d8b",
                    hoverBackgroundColor: "#607d8b",
                    hoverBorderWidth: 0
                },
                {
                    label: 'ChatBot',
                    data: chatbot,
                    backgroundColor: "#6e273e",
                    hoverBackgroundColor: "#6e273e",
                    hoverBorderWidth: 0
                }
            ]
        },
        options: {
            responsive: true,
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
                    boxWidth: 10,
                }
            }
        },
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
    });

})(jQuery);

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