$(function ($) {
    $('#tableReportSumInterval').dataTable();

    //pie chart report summary channel
    var ctx = document.getElementById( "pieChartReportSumInterval" );
    ctx.height = 333;
    var myChart = new Chart( ctx, {
        type: 'pie',
        data: {
            datasets: [ {
                data: [ 15, 35, 40],
                backgroundColor: [
                                "#A5B0B6",
                                "#009E8C",
                                "#00436D"
                                ],
                hoverBackgroundColor: [
                                "#A5B0B6",
                                "#009E8C",
                                "#00436D"
                                ]

                            } ],
            labels: [
                                "ART",
                                "AHT",
                                "AST"
                    ]
        },
        options: {
            responsive: true,
			maintainAspectRatio: false,
			
            legend:{
					display : false
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
				legendHtml.push('<ul><div class="row mt-9 ml-6">');
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
					legendHtml.push('<li class="col-md-12 col-lg-4 col-sm-6 col-xl-4">');
					legendHtml.push('<span style="margin-top:40px" class="chart-legend"><div style="background-color :'+background+'" class="box-legend"></div>'+label+':'+percentage+ '%</span>');
				})
				legendHtml.push('</ul></div>');
				return legendHtml.join("");
			},
        }
	});
	var myLegendContainer = document.getElementById("legend");
	myLegendContainer.innerHTML = myChart.generateLegend();
});