$(function($){
    $('#tableReportSumChannel').dataTable();

    //pie chart Ticket Channel
    var ctx = document.getElementById( "pieChartReportSumChannel" );
    ctx.height = 280;
    var myChart = new Chart( ctx, {
        type: 'pie',
        data: {
            datasets: [ {
                data: [ 15, 35, 40,20,50,30,15,30,40,50,70,90],
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

                            } ],
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
					legendHtml.push('<li class="col-md-12 col-lg-6 col-sm-6 col-xl-6">');
					legendHtml.push('<span class="chart-legend"><div style="background-color :'+background+'" class="box-legend-large"></div>'+label+':'+percentage+ '%</span>');
				})
				legendHtml.push('</ul></div>');
				return legendHtml.join("");
			},
        }
	});
	var myLegendContainer = document.getElementById("legend");
	myLegendContainer.innerHTML = myChart.generateLegend();
});