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
    //bar chart
    // var ctx = document.getElementById( "barChartSummary" );
    //    ctx.height = 400;
    // var myChart = new Chart( ctx, {
    //     type: 'horizontalBar',
    //     data: {
    //         labels: [ "Whatsapp", "Twitter", "Facebook", "Email", "Telegram", "Line", "Voice", "Instagram", "Messenger", "Twitter DM","SMS","Live Chat"],
    //         datasets: [
    //             {
    //                 label: "Whatsapp",
    //                 data: [60],
	// 				borderColor:"#31a550",
	// 				borderWidth:"0",
    //                 backgroundColor:"#31a550"
    //             },
    //             {
    //                 label: "Twitter",
    //                 data: [48],
    //                 borderColor: "#45aaf2",
    //                 borderWidth: "0",
    //                 backgroundColor: "#45aaf2"},
	// 			{
    //                 label: "Facebook",
    //                 data: [50],
    //                 borderColor: "#316cbe",
    //                 borderWidth: "0",
    //                 backgroundColor: "#316cbe"},
	// 			{
    //                 label: "Email",
    //                 data: [60],
    //                 borderColor: "#e41313",
    //                 borderWidth: "0",
    //                 backgroundColor: "#e41313"},
	// 			{
    //                 label: "Telegram",
    //                 data: [48],
    //                 borderColor: "#343a40",
    //                 borderWidth: "0",
    //                 backgroundColor: "#343a40"},
	// 			{
    //                 label: "Line",
    //                 data: [48],
    //                 borderColor: "#31a550",
    //                 borderWidth: "0",
    //                 backgroundColor: "#31a550"},
	// 			{
    //                 label: "Voice",
    //                 data: [48],
    //                 borderColor: "#ff9933",
    //                 borderWidth: "0",
    //                 backgroundColor: "#ff9933"
    //             },
	// 			{
    //                 label: "Instagram",
    //                 data: [48],
    //                 borderColor: "#fbc0d5",
    //                 borderWidth: "0",
    //                 backgroundColor: "#fbc0d5"
    //             },
	// 			{
    //                 label: "Messenger",
    //                 data: [48],
    //                 borderColor: "#3866a6",
    //                 borderWidth: "0",
    //                 backgroundColor: "#3866a6"
    //             },
	// 			{
    //                 label: "Twitter DM",
    //                 data: [48],
    //                 borderColor: "#6574cd",
    //                 borderWidth: "0",
    //                 backgroundColor: "#45aaf2"
    //             },
	// 			{
    //                 label: "SMS",
    //                 data: [48],
    //                 borderColor: "#80cbc4",
    //                 borderWidth: "0",
    //                 backgroundColor: "#80cbc4"
    //             },
    //             {
    //                 label: "Live Chat",
    //                 data: [48],
    //                 borderColor: "#607d8b",
    //                 borderWidth: "0",
    //                 backgroundColor: "#607d8b"
    //             },	
    //             ]
    //     },
    //     options: {
	// 		responsive: true,
    //         maintainAspectRatio: false,
    //         scales: {
    //             yAxes: [{
    //                 ticks: {
    //                     beginAtZero: true
    //                 }
    //             }],
    //             xAxes: [{
    //                 ticks: {
    //                     min: 60
    //                 }
    //             }]

    //         },
    //         legend: {
    //             display: false
    //         }
    //     }
    // } );
	

} )( jQuery );