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

    //bar chart
    var ctx = document.getElementById( "barChartSummary" );
       ctx.height = 400;
    var myChart = new Chart( ctx, {
        type: 'horizontalBar',
        data: {
            labels: [ "Whatsapp", "Twitter", "Facebook", "Email", "Telegram", "Line", "Voice", "Instagram", "Messenger", "Twitter DM","SMS","Live Chat"],
            datasets: [
                {
                    label: "Whatsapp",
                    data: [60],
					borderColor:"#31a550",
					borderWidth:"0",
                    backgroundColor:"#31a550"
                },
                {
                    label: "Twitter",
                    data: [48],
                    borderColor: "#45aaf2",
                    borderWidth: "0",
                    backgroundColor: "#45aaf2"},
				{
                    label: "Facebook",
                    data: [50],
                    borderColor: "#316cbe",
                    borderWidth: "0",
                    backgroundColor: "#316cbe"},
				{
                    label: "Email",
                    data: [60],
                    borderColor: "#e41313",
                    borderWidth: "0",
                    backgroundColor: "#e41313"},
				{
                    label: "Telegram",
                    data: [48],
                    borderColor: "#45aaf2",
                    borderWidth: "0",
                    backgroundColor: "#45aaf2"},
				{
                    label: "Line",
                    data: [ 0, 48],
                    borderColor: "#45aaf2",
                    borderWidth: "0",
                    backgroundColor: "#45aaf2"},
				{
                    label: "Voice",
                    data: [ 0, 48],
                    borderColor: "#45aaf2",
                    borderWidth: "0",
                    backgroundColor: "#45aaf2"
                },
				{
                    label: "Instagram",
                    data: [ 0, 48],
                    borderColor: "#45aaf2",
                    borderWidth: "0",
                    backgroundColor: "#45aaf2"
                },
				{
                    label: "Messenger",
                    data: [ 0, 48],
                    borderColor: "#45aaf2",
                    borderWidth: "0",
                    backgroundColor: "#45aaf2"
                },
				{
                    label: "Twitter DM",
                    data: [ 0, 48],
                    borderColor: "#45aaf2",
                    borderWidth: "0",
                    backgroundColor: "#45aaf2"
                },
				{
                    label: "Twitter DM",
                    data: [ 0, 48],
                    borderColor: "#45aaf2",
                    borderWidth: "0",
                    backgroundColor: "#45aaf2"
                },	
                ]
        },
        options: {
			responsive: true,
            maintainAspectRatio: false,
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }],
                xAxes: [{
                    ticks: {
                        min: 0 // Edit the value according to what you need
                    }
                }]

            },
            legend: {
                display: false
            }
        }
    } );
	

} )( jQuery );