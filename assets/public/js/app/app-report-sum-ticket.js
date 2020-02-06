$(function ($) {

    $('#tableSumTicket').dataTable();


    //pie chart Ticket Unit
    var ctx = document.getElementById("pieChartStatus");
    ctx.height = 264;
    var myChart = new Chart(ctx, {
        type: 'pie',
        data: {
            datasets: [{
                data: [15, 35, 40, 20, 50, 30, 30, 40],
                backgroundColor: [
                    "#FEC88C",
                    "#FFA07A",
                    "#87CEFA",
                    "#ADD8E6",
                    "#B0C4DE",
                    "#778899",
                    "#8FBC8F",
                    "#BDB76B"
                ],
                hoverBackgroundColor: [
                    "#FEC88C",
                    "#FFA07A",
                    "#87CEFA",
                    "#ADD8E6",
                    "#B0C4DE",
                    "#778899",
                    "#8FBC8F",
                    "#BDB76B"
                ]
            }],
            labels: [
                "New",
                "Open",
                "Reject",
                "On Progress",
                "Pending",
                "Reopen",
                "Close",
                "Resolve"
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
                segment: true,
            },
            legendCallback: function (chart, index) {
                var allData = chart.data.datasets[0].data;
                // console.log(chart)
                var legendHtml = [];
                legendHtml.push('<ul><div class="row mt-4 ml-5">');
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
                    legendHtml.push('<li class="col-md-12 col-lg-6 col-sm-8 col-xl-6">');
                    legendHtml.push('<span class="chart-legend"><div style="background-color :' + background + '" class="box-legend"></div>' + label + ':' + percentage + '%</span>');
                })
                legendHtml.push('</ul></div>');
                return legendHtml.join("");
            },
        }
    });
    var myLegendContainer = document.getElementById("legend");
    myLegendContainer.innerHTML = myChart.generateLegend();
})