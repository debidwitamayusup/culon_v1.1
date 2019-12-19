(function ($) {
    "use strict";
    //pie chart
    var ctx = document.getElementById( "pieChart" );
    ctx.height = 299;
    var myChart = new Chart( ctx, {
        type: 'pie',
        data: {
            datasets: [ {
                data: [ 15, 35, 40,20,50,30,15 ],
                backgroundColor: [
                                    "#60D67B",
                                    "#FF2A29",
                                    "#138184",
                                    "#113EBF",
                                    "#808D84",
                                    "#1B64BB",
                                    "#E2E1E6"
                                ],
                hoverBackgroundColor: [
                                    "#60D67B",
                                    "#FF2A29",
                                    "#138184",
                                    "#113EBF",
                                    "#808D84",
                                    "1B64BB",
                                    "#E2E1E6"
                                ]

                            } ],
            labels: [
                            "Open",
                            "Reject",
                            "Close",
                            "Return",
                            "New",
                            "Resolve",
                            "Pending"
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
                "Return",
                "New",
                "Resolve",
                "Pending"
            ],
            datasets: [{
                // label: data.labels,
                data: [85, 48, 59, 37, 12, 16, 18],
                borderColor: [
                    "#60D67B",
                    "#FF2A29",
                    "#138184",
                    "#113EBF",
                    "#808D84",
                    "#1B64BB",
                    "#E2E1E6"
                ],
                borderWidth: "0",
                backgroundColor: [
                    "#60D67B",
                    "#FF2A29",
                    "#138184",
                    "#113EBF",
                    "#808D84",
                    "#1B64BB",
                    "#E2E1E6"
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
                borderColor: '#60D67B',
                borderWidth: 3,
                pointStyle: 'circle',
                pointRadius: 4,
                pointBorderColor: 'transparent',
                pointBackgroundColor: '#60D67B',
            }, {
                label: "Reject",
                data: [0, 5, 12, 14, 30, 40, 60, 90, 19, 90, 80, 80, 70, 80, 90, 20, 25, 60, 18, 80, 60, 40, 76, 70, 60],
                backgroundColor: 'transparent',
                borderColor: '#FF2A29',
                borderWidth: 3,
                pointStyle: 'circle',
                pointRadius: 4,
                pointBorderColor: 'transparent',
                pointBackgroundColor: '#FF2A29',
            }, {
                label: "Close",
                data: [0, 5, 12, 14, 30, 40, 60, 90, 19, 40, 50, 80, 70, 60, 60, 20, 25, 20, 18, 40, 50, 40, 70, 50, 60],
                backgroundColor: 'transparent',
                borderColor: '#138184',
                borderWidth: 3,
                pointStyle: 'circle',
                pointRadius: 4,
                pointBorderColor: 'transparent',
                pointBackgroundColor: '#138184',
            }, {
                label: "Return",
                data: [0, 5, 30, 40, 30, 40, 50, 40, 30, 50, 60, 30, 70, 80, 90, 20, 30, 60, 20, 40, 70, 50, 60, 70, 50],
                backgroundColor: 'transparent',
                borderColor: '#113EBF',
                borderWidth: 3,
                pointStyle: 'circle',
                pointRadius: 4,
                pointBorderColor: 'transparent',
                pointBackgroundColor: '#113EBF',
            }, {
                label: "New",
                data: [0, 5, 12, 14, 20, 30, 35, 32, 40, 45, 50, 55, 60, 70, 80, 20, 25, 60, 25, 70, 60, 60, 76, 70, 60],
                backgroundColor: 'transparent',
                borderColor: '#808D84',
                borderWidth: 3,
                pointStyle: 'circle',
                pointRadius: 4,
                pointBorderColor: 'transparent',
                pointBackgroundColor: '#808D84',
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
                borderColor: '#E2E1E6',
                borderWidth: 3,
                pointStyle: 'circle',
                pointRadius: 4,
                pointBorderColor: 'transparent',
                pointBackgroundColor: '#E2E1E6',
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