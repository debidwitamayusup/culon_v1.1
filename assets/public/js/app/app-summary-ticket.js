(function ($) {
    "use strict";
    $('#example-2').DataTable();
    //pie chart
    var ctx = document.getElementById( "pieChart" );
    ctx.height = 580;
    var myChart = new Chart( ctx, {
        type: 'pie',
        data: {
            datasets: [ {
                data: [ 15, 35, 40,20,50,30,15,30 ],
                backgroundColor: [
                                    "#8FBC8F",
                                    "#B22222",
                                    "#008B8B",
                                    "#2F4F4F",
                                    "#778899",
                                    "#1B64BB",
                                    "#B0C4DE",
                                    "#20B2AA"
                                ],
                hoverBackgroundColor: [
                                    "#8FBC8F",
                                    "#B22222",
                                    "#008B8B",
                                    "#2F4F4F",
                                    "#778899",
                                    "#1B64BB",
                                    "#B0C4DE",
                                    "#20B2AA"
                                ]

                            } ],
            labels: [
                            "Open",
                            "Reject",
                            "Close",
                            "Reopen",
                            "New",
                            "Resolve",
                            "Pending",
                            "On Progress"
                        ]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            legend:{
                position:"bottom",
                labels:{
					boxWidth:10
			   }
            }
        }
    } );

    var ctx = document.getElementById("echartTicket");
    // ctx.height = 600;
    var myChart = new Chart(ctx, {
        type: 'horizontalBar',
        data: {
            labels: [
                "Open",
                "Reject",
                "Close",
                "Reopen",
                "New",
                "Resolve",
                "Pending",
                "On Progress"
            ],
            datasets: [{
                // label: data.labels,
                data: [85, 48, 59, 37, 12, 16, 18],
                borderColor: [
                    "#8FBC8F",
                    "#B22222",
                    "#008B8B",
                    "#2F4F4F",
                    "#778899",
                    "#1B64BB",
                    "#B0C4DE",
                    "#20B2AA"
                ],
                borderWidth: "0",
                backgroundColor: [
                    "#8FBC8F",
                    "#B22222",
                    "#008B8B",
                    "#2F4F4F",
                    "#778899",
                    "#1B64BB",
                    "#B0C4DE",
                    "#20B2AA"
                ]
            }, ]
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
            },
            legend: {
                display: false
            }
        }
    });

         //line chart agent
    var ctx = document.getElementById("graphicTicket");
    var myChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: ["00:00", "01:00", "02.00", "03.00", "04:00", "05:00", "06:00", "07:00", "08:00", "09:00", "10:00", "11:00", "12:00", "13:00", "14:00", "15:00", "16:00", "17:00", "18:00", "19:00", "20:00", "21:00", "22:00", "23:00"],
            datasets: [{
                label: "Open",
                data: [0, 10, 12, 14, 30, 40, 80, 120, 19, 90, 60, 80, 30, 50, 16, 20, 25, 30, 18, 30, 20, 40, 46, 30, 50],
                backgroundColor: 'transparent',
                borderColor: '#8FBC8F',
                borderWidth: 3,
                pointStyle: 'circle',
                pointRadius: 4,
                pointBorderColor: 'transparent',
                pointBackgroundColor: '#8FBC8F',
            }, {
                label: "Reject",
                data: [0, 5, 12, 14, 30, 40, 60, 90, 19, 90, 80, 80, 70, 80, 90, 20, 25, 60, 18, 80, 60, 40, 76, 70, 60],
                backgroundColor: 'transparent',
                borderColor: '#B22222',
                borderWidth: 3,
                pointStyle: 'circle',
                pointRadius: 4,
                pointBorderColor: 'transparent',
                pointBackgroundColor: '#B22222',
            }, {
                label: "Close",
                data: [0, 5, 12, 14, 30, 40, 60, 90, 19, 40, 50, 80, 70, 60, 60, 20, 25, 20, 18, 40, 50, 40, 70, 50, 60],
                backgroundColor: 'transparent',
                borderColor: '#008B8B',
                borderWidth: 3,
                pointStyle: 'circle',
                pointRadius: 4,
                pointBorderColor: 'transparent',
                pointBackgroundColor: '#008B8B',
            }, {
                label: "Reopen",
                data: [0, 5, 30, 40, 30, 40, 50, 40, 30, 50, 60, 30, 70, 80, 90, 20, 30, 60, 20, 40, 70, 50, 60, 70, 50],
                backgroundColor: 'transparent',
                borderColor: '#2F4F4F',
                borderWidth: 3,
                pointStyle: 'circle',
                pointRadius: 4,
                pointBorderColor: 'transparent',
                pointBackgroundColor: '#2F4F4F',
            }, {
                label: "New",
                data: [0, 5, 12, 14, 20, 30, 35, 32, 40, 45, 50, 55, 60, 70, 80, 20, 25, 60, 25, 70, 60, 60, 76, 70, 60],
                backgroundColor: 'transparent',
                borderColor: '#778899',
                borderWidth: 3,
                pointStyle: 'circle',
                pointRadius: 4,
                pointBorderColor: 'transparent',
                pointBackgroundColor: '#778899',
            }, {
                label: "Resolve",
                data: [0, 10, 12, 25, 35, 40, 50, 60, 40, 50, 60, 80, 60, 80, 60, 40, 50, 60, 69, 90, 60, 40, 36, 40, 50],
                backgroundColor: 'transparent',
                borderColor: '#1B64BB',
                borderWidth: 3,
                pointStyle: 'circle',
                pointRadius: 4,
                pointBorderColor: 'transparent',
                pointBackgroundColor: '#1B64BB',
            }, {
                label: "Pending",
                data: [0, 5, 12, 14, 30, 40, 60, 40, 60, 70, 60, 30, 40, 50, 60, 30, 25, 40, 38, 40, 20, 60, 66, 80, 80],
                backgroundColor: 'transparent',
                borderColor: '#B0C4DE',
                borderWidth: 3,
                pointStyle: 'circle',
                pointRadius: 4,
                pointBorderColor: 'transparent',
                pointBackgroundColor: '#B0C4DE',
            }, {
                label: "On Progress",
                data: [0, 5, 12, 14, 30, 40, 60, 40, 60, 70, 60, 30,100, 50, 60, 30, 25, 40, 38, 40, 20, 60, 66, 80, 80],
                backgroundColor: 'transparent',
                borderColor: '#20B2AA',
                borderWidth: 3,
                pointStyle: 'circle',
                pointRadius: 4,
                pointBorderColor: 'transparent',
                pointBackgroundColor: '#20B2AA',
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

    
})(jQuery);