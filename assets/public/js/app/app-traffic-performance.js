( function ( $ ) {
    "use strict";
    
    var ctx = document.getElementById( "pieTrafficPerformance" );
    ctx.height = 300;
    var myChart = new Chart( ctx, {
        type: 'pie',
        data: {
            datasets: [ {
                data: [ 15,35,40,50,80,90,100,40,50,80,30,40],
                backgroundColor: [
                                    "#089e60",
                                    "#fbc0d5",
                                    "#467fcf",
                                    "#45aaf2",
                                    "#31a550",
                                    "#3866a6",
                                    "#6574cd",
                                    "#343a40",
                                    "#e41313",
                                    "#ff9933",
                                    "#80cbc4",
                                    "#607d8b"
                                ],
                hoverBackgroundColor: [
                                    "#089e60",
                                    "#fbc0d5",
                                    "#467fcf",
                                    "#45aaf2",
                                    "#31a550",
                                    "#3866a6",
                                    "#6574cd",
                                    "#343a40",
                                    "#e41313",
                                    "#ff9933",
                                    "#80cbc4",
                                    "#607d8b"
                                ]

                            } ],
            labels: [
                                "Whatsapp",
                                "Instagram",
                                "Faceboook",
                                "Twitter",
                                "Line",
                                "Messenger",
                                "Twitter DM",
                                "Telegram",
                                "Email",
                                "Voice",
                                "SMS",
                                "Live Chat"
                    ]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            legend:{
            //     position:"bottom",
            //     labels:{
			// 		boxWidth:10
            //    }
                display : false
            },
            pieceLabel : {
                render : 'legend',
                fontColor : '#000',
                position : 'outside',
                segment : true
            },
            legendCallback : function (chart, index){
                var allData = chart.data.datasets[0].data;
                // console.log(chart)
                var legendHtml = [];
                legendHtml.push('<ul><div class="row ml-2">');
                allData.forEach(function(data,index){
                    var label = chart.data.labels[index];
                    var dataLabel = allData[index];
                    var background = chart.data.datasets[0].backgroundColor[index]
                    var total = 0;
                    for(var i in allData){
                        total += parseInt(allData[i]);
                    }

                    // console.log(total)
                    var percentage = Math.round((dataLabel / total)*100);
                    legendHtml.push('<li class="col-md-4 col-lg-4 col-sm-6 col-xl-4">');
                    legendHtml.push('<span class="chart-legend"><div style="background-color : '+background+'" class="box-legend"></div>'+label+': '+percentage+'%</span>')
                })
                legendHtml.push('</ul></div>');
                return legendHtml.join("");
            },
        }
    } );
    var mylegendContainer = document.getElementById("legend");
    mylegendContainer.innerHTML=myChart.generateLegend();

    // Horizontal Bar

    var MeSeContext = document.getElementById("MeSeStatusCanvas");
    MeSeContext.height = 500;
    var MeSeData = {
        labels : [
                    "Whatsapp",
                    "Instagram",
                    "Faceboook",
                    "Twitter",
                    "Line",
                    "Messenger",
                    "Twitter DM",
                    "Telegram",
                    "Email",
                    "Voice",
                    "SMS",
                    "Live Chat"
        ],
        datasets : [{
            label : "test",
            data :[50,60,70,80,90,50,100,120,150,160,180,200],
            backgroundColor : [
                                "#089e60",
                                "#fbc0d5",
                                "#467fcf",
                                "#45aaf2",
                                "#31a550",
                                "#3866a6",
                                "#6574cd",
                                "#343a40",
                                "#e41313",
                                "#ff9933",
                                "#80cbc4",
                                "#607d8b"
                            ],
            hoverBackgroundColor : [
                                "#089e60",
                                "#fbc0d5",
                                "#467fcf",
                                "#45aaf2",
                                "#31a550",
                                "#3866a6",
                                "#6574cd",
                                "#343a40",
                                "#e41313",
                                "#ff9933",
                                "#80cbc4",
                                "#607d8b"
            ]
        }]
    };
    var MeSeChart = new Chart(MeSeContext,{
        type : 'horizontalBar',
        data : MeSeData,
        options : {
            responsive: true,
            maintainAspectRatio: false,
            scales : {
                xAxes : [{
                    ticks : {
                        min : 0
                    }
                }],
                yAxes : [{
                    stacked : true
                }]
            },
            legend: {
                display: false
                }
        }
    });


} )( jQuery );