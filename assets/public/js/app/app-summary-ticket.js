(function ($) {
    "use strict";

    //sample datatable	
	$('#example-2').DataTable();

    //pie chart summary status ticket
    var ctx = document.getElementById( "pieChart" );
    ctx.height = 250;
    var myChart = new Chart( ctx, {
        type: 'pie',
        data: {
            datasets: [ {
                data: [ 15, 35, 40,20,50,30,15,30 ],
                backgroundColor: [
                                    "#FEC88C",
                                    "#FFA07A",
                                    "#87CEFA",
                                    "#ADD8E6",
                                    "#B0C4DE",
                                    "#778899",
                                    "#8FBC8F",
                                    "#BDB76B",
                                    
                                ],
                hoverBackgroundColor: [
                                    "#FEC88C",
                                    "#FFA07A",
                                    "#87CEFA",
                                    "#ADD8E6",
                                    "#B0C4DE",
                                    "#778899",
                                    "#8FBC8F",
                                    "#BDB76B",
                                ]
            } ],
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
            legend:{
                // position:"bottom",
                // labels:{
                // 	boxWidth:10
                display : false
            },
            legendCallback : function (chart,index){
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
                    var percentage = Math.round((dataLabel / total)*100);
                    legendHtml.push('<li class="col-md-3 col-lg-3 col-sm-12 col-xl-3">');
                    legendHtml.push('<span class="chart-legend"><div style="background-color : '+background+'" class="box-legend"></div>'+label+'</span>')
                })
                legendHtml.push('</ul></div>');
                return legendHtml.join("");
            },
        }
    } );
    var myLegendContainer = document.getElementById("legend");
    myLegendContainer.innerHTML = myChart.generateLegend();

    //pie chart summary unit
    var ctx = document.getElementById( "pieChartUnit" );
    ctx.height = 250;
    var myChart = new Chart( ctx, {
        type: 'pie',
        data: {
            datasets: [ {
                data: [ 15, 35, 40,20],
                backgroundColor: [
                                    "#2F5596",
                                    // "#01B0F1",
                                    // "#F07D2D",
                                    // "#F3AE8F",
                                    "#44546B",
                                    // "#70AC48",
                                    "#9EC2E4",
                                    // "#00AF50",
                                    "#FDC100",
                                    // "#C20006"
                                ],
                hoverBackgroundColor: [
                                    "#2F5596",
                                    // "#01B0F1",
                                    // "#F07D2D",
                                    // "#F3AE8F",
                                    "#44546B",
                                    // "#70AC48",
                                    "#9EC2E4",
                                    // "#00AF50",
                                    "#FDC100",
                                    // "#C20006"
                                ]

                            } ],
            labels: [
                            "Agency Help Line",
                            // "Keuangan",
                            // "CRM",
                            // "Post Line",
                            "Provider Relation",
                            // "Data Control",
                            "Credit Control",
                            // "Claim Health",
                            "Claim Non Health",
                            // "Call Center"
                        ]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            legend:{
                // position:"bottom",
                // labels:{
                // 	boxWidth:10
                display : false                
            },
            legendCallback : function(chart,index){
                var allData = chart.data.datasets[0].data;
                // console.log(chart)
                var legendHtml = [];
                legendHtml.push('<ul><div class="row ml-8">');
                allData.forEach(function(data,index){
                    var label = chart.data.labels[index];
                    var dataLabel = allData[index];
                    var background = chart.data.datasets[0].backgroundColor[index]
                    var total = 0;
                    for (var i in allData){
                        total += parseInt(allData[i]);
                    }

                    // console.log(total)
                    var percentage = Math.round((dataLabel / total)*100);
                    legendHtml.push('<li class="col-md-6 col-lg-6 col-sm-12 col-xl-6">');
                    legendHtml.push('<span class="chart-legend"><div style="background-color : '+background+'" class="box-legend"></div>'+label+'</span>')
                })
                legendHtml.push('</ul></div>');
                return legendHtml.join("");
            },
        }
    
    });
    var myLegendContainer = document.getElementById("legendUnit");
    myLegendContainer.innerHTML = myChart.generateLegend();

})(jQuery);