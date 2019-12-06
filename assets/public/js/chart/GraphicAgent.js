(function ($) {
    "use strict";
    //bar chart year
    var chartdata = [{
        name: 'channel',
        type: 'bar',
        data: [10, 15, 9, 18, 10, 10, 15, 9, 18, 10, 10, 35]
    }];
    var chart = document.getElementById('barChartYear');
    var barChart = echarts.init(chart);
    var option = {
        grid: {
            top: '6',
            right: '0',
            bottom: '17',
            left: '25',
        },

        xAxis: {
            data: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
            title: "axisX Title",
            gridThickness: 1,
            tickLength: 10,
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
            show: true,
            showContent: true,
            alwaysShowContent: true,
            triggerOn: 'mousemove',
            trigger: 'axis',
            axisPointer: {
                label: {
                    show: false,
                }
            }
        },
        yAxis: {
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
        series: chartdata,
        color: ['#B22222']
    };
    barChart.setOption(option);

    //Bar Chart Month
    var chartdata = [{
        name: 'channel',
        type: 'bar',
        data: [10, 15, 9, 18, 10, 10, 15, 9, 18, 10, 10, 35, 40, 30, 10, 20, 15, 9, 48, 60, 40, 35, 10, 20, 30, 30, 55, 49, 68, 70]
    }];
    var chart = document.getElementById('barChartMonth');
    var barChart = echarts.init(chart);
    var option = {
        grid: {
            top: '6',
            right: '0',
            bottom: '17',
            left: '25',
        },
        xAxis: {
            data: ['1', '2', '3', '4', '5', '6', '7', '8', '9', '10', '11', '12', '13', '14', '15', '16', '17', '18', '19', '20', '21', '22', '23', '24', '25', '26', '27', '28', '29', '30'],
            axisLine: {
                lineStyle: {
                    color: '#efefff'
                }
            },

            axisLabel: {
                fontSize: 10,
                color: '#7886a0',

            }
        },
        tooltip: {
            show: true,
            showContent: true,
            alwaysShowContent: true,
            triggerOn: 'mousemove',
            trigger: 'axis',
            axisPointer: {
                label: {
                    show: false,
                }
            }
        },
        yAxis: {
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
            },

        },
        series: chartdata,
        color: ['#B22222']
    };
    barChart.setOption(option);

    //line chart agent
    var ctx = document.getElementById("graphicAgent");
    var myChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: ["00:00", "01:00", "02.00", "03.00", "04:00", "05:00", "06:00", "07:00", "08:00", "09:00", "10:00", "11:00", "12:00", "13:00", "14:00", "15:00", "16:00", "17:00", "18:00", "19:00", "20:00", "21:00", "22:00", "23:00"],
            datasets: [{
                label: "Whatsapp",
                data: [0, 10, 12, 14, 30, 40, 80, 120, 19, 90, 60, 80, 30, 50, 16, 20, 25, 30, 18, 30, 20, 40, 46, 30, 50],
                backgroundColor: 'transparent',
                borderColor: '#31a550',
                borderWidth: 3,
                pointStyle: 'circle',
                pointRadius: 4,
                pointBorderColor: 'transparent',
                pointBackgroundColor: '#31a550',
            }, {
                label: "Twitter",
                data: [0, 5, 12, 14, 30, 40, 60, 90, 19, 90, 80, 80, 70, 80, 90, 20, 25, 60, 18, 80, 60, 40, 76, 70, 60],
                backgroundColor: 'transparent',
                borderColor: '#45aaf2',
                borderWidth: 3,
                pointStyle: 'circle',
                pointRadius: 4,
                pointBorderColor: 'transparent',
                pointBackgroundColor: '#45aaf2',
            }, {
                label: "Facebook",
                data: [0, 5, 12, 14, 30, 40, 60, 90, 19, 40, 50, 80, 70, 60, 60, 20, 25, 20, 18, 40, 50, 40, 70, 50, 60],
                backgroundColor: 'transparent',
                borderColor: '#467fcf',
                borderWidth: 3,
                pointStyle: 'circle',
                pointRadius: 4,
                pointBorderColor: 'transparent',
                pointBackgroundColor: '#316cbe',
            }, {
                label: "Email",
                data: [0, 5, 30, 40, 30, 40, 50, 40, 30, 50, 60, 30, 70, 80, 90, 20, 30, 60, 20, 40, 70, 50, 60, 70, 50],
                backgroundColor: 'transparent',
                borderColor: '#e41313',
                borderWidth: 3,
                pointStyle: 'circle',
                pointRadius: 4,
                pointBorderColor: 'transparent',
                pointBackgroundColor: '#e41313',
            }, {
                label: "Telegram",
                data: [0, 5, 12, 14, 20, 30, 35, 32, 40, 45, 50, 55, 60, 70, 80, 20, 25, 60, 25, 70, 60, 60, 76, 70, 60],
                backgroundColor: 'transparent',
                borderColor: '#343a40',
                borderWidth: 3,
                pointStyle: 'circle',
                pointRadius: 4,
                pointBorderColor: 'transparent',
                pointBackgroundColor: '#343a40',
            }, {
                label: "Line",
                data: [0, 10, 12, 25, 35, 40, 50, 60, 40, 50, 60, 80, 60, 80, 60, 40, 50, 60, 69, 90, 60, 40, 36, 40, 50],
                backgroundColor: 'transparent',
                borderColor: '#31a550',
                borderWidth: 3,
                pointStyle: 'circle',
                pointRadius: 4,
                pointBorderColor: 'transparent',
                pointBackgroundColor: '#31a550',
            }, {
                label: "Voice",
                data: [0, 5, 12, 14, 30, 40, 60, 40, 60, 70, 60, 30, 40, 50, 60, 30, 25, 40, 38, 40, 20, 60, 66, 80, 80],
                backgroundColor: 'transparent',
                borderColor: '#ff9933',
                borderWidth: 3,
                pointStyle: 'circle',
                pointRadius: 4,
                pointBorderColor: 'transparent',
                pointBackgroundColor: '#ff9933',
            }, {
                label: "Instagram",
                data: [0, 5, 12, 14, 20, 50, 40, 50, 20, 40, 50, 60, 30, 40, 50, 30, 40, 30, 40, 50, 50, 40, 90, 40, 50],
                backgroundColor: 'transparent',
                borderColor: '#fbc0d5',
                borderWidth: 3,
                pointStyle: 'circle',
                pointRadius: 4,
                pointBorderColor: 'transparent',
                pointBackgroundColor: '#fbc0d5',
            }, {
                label: "Messenger",
                data: [0, 5, 12, 23, 20, 40, 66, 50, 59, 60, 70, 60, 60, 50, 30, 20, 25, 40, 18, 80, 60, 70, 56, 50, 40],
                backgroundColor: 'transparent',
                borderColor: '#3866a6',
                borderWidth: 3,
                pointStyle: 'circle',
                pointRadius: 4,
                pointBorderColor: 'transparent',
                pointBackgroundColor: '#3866a6',
            }, {
                label: "Twitter DM",
                data: [0, 2, 12, 14, 90, 20, 30, 50, 39, 30, 80, 60, 40, 70, 60, 30, 40, 50, 98, 70, 80, 40, 56, 60, 50],
                backgroundColor: 'transparent',
                borderColor: '#6574cd',
                borderWidth: 3,
                pointStyle: 'circle',
                pointRadius: 4,
                pointBorderColor: 'transparent',
                pointBackgroundColor: '#6574cd',
            }, {
                label: "Live Chat",
                data: [0, 5, 10, 18, 20, 30, 40, 60, 30, 80, 70, 50, 60, 40, 40, 40, 30, 40, 130, 80, 60, 50, 90, 80, 100],
                backgroundColor: 'transparent',
                borderColor: '#42265e',
                borderWidth: 3,
                pointStyle: 'circle',
                pointRadius: 4,
                pointBorderColor: 'transparent',
                pointBackgroundColor: '#42265e',
            }, {
                label: "Pesan",
                data: [0, 3, 20, 48, 60, 30, 50, 30, 20, 30, 60, 40, 70, 80, 60, 70, 35, 42, 30, 50, 40, 50, 90, 50, 40],
                backgroundColor: 'transparent',
                borderColor: '#1c3353',
                borderWidth: 2,
                pointStyle: 'circle',
                pointRadius: 4,
                pointBorderColor: 'transparent',
                pointBackgroundColor: '#1c3353',
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            legend: {
                position: 'bottom',
                labels: {
                    boxWidth: 10
                }
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


    // single bar chart
    var ctx = document.getElementById("singelBarChart");
    ctx.height = 100;
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ["Sun", "Mon", "Tu", "Wed", "Th", "Fri", "Sat"],
            datasets: [{
                label: "My First dataset",
                data: [40, 55, 75, 81, 56, 55, 40],
                borderColor: "rgba(19, 150, 204, 0.9)",
                borderWidth: "0",
                backgroundColor: "rgba(19, 150, 204, 0.8)"
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        }
    });

})(jQuery);