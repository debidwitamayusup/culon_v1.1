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
                position:"bottom",
                labels:{
					boxWidth:10
			   }
            }
        }
    } );


    var MeSeContext = document.getElementById("MeSeStatusCanvas");
    MeSeContext.height = 400;
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