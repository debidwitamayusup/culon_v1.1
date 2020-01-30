( function ( $ ) {
    "use strict";
	
	//bar chart
    var ctx = document.getElementById( "barChartSummary" );
    //    ctx.height = 200;
    var myChart = new Chart( ctx, {
        type: 'horizontalBar',
        data: {
            labels: [ "Whatsapp", "Twitter", "Facebook", "Email", "Telegram", "Line", "Voice", "Instagram", "Messenger", "Twitter DM", "Live Chat", "Insta DM" ],
            datasets: [
                {
                    label: "Whatsapp",
                    data: [ 60],
					borderColor:"#31a550",
					borderWidth:"0",
					backgroundColor:"#31a550",
					height:"30"},
                {
                    label: "Twitter",
                    data: [ 0, 48],
                    borderColor: "#45aaf2",
                    borderWidth: "0",
                    backgroundColor: "#45aaf2"},
				{
                    label: "Facebook",
                    data: [ 0,0,50],
                    borderColor: "#316cbe",
                    borderWidth: "0",
                    backgroundColor: "#316cbe"},
				{
                    label: "Email",
                    data: [ 0,0,0,60],
                    borderColor: "#e41313",
                    borderWidth: "0",
                    backgroundColor: "#e41313"},
				{
                    label: "Twitter",
                    data: [ 0, 48],
                    borderColor: "#45aaf2",
                    borderWidth: "0",
                    backgroundColor: "#45aaf2"},
				{
                    label: "Twitter",
                    data: [ 0, 48],
                    borderColor: "#45aaf2",
                    borderWidth: "0",
                    backgroundColor: "#45aaf2"},
				{
                    label: "Twitter",
                    data: [ 0, 48],
                    borderColor: "#45aaf2",
                    borderWidth: "0",
                    backgroundColor: "#45aaf2"},
				{
                    label: "Twitter",
                    data: [ 0, 48],
                    borderColor: "#45aaf2",
                    borderWidth: "0",
                    backgroundColor: "#45aaf2"},
				{
                    label: "Twitter",
                    data: [ 0, 48],
                    borderColor: "#45aaf2",
                    borderWidth: "0",
                    backgroundColor: "#45aaf2"},
				{
                    label: "Twitter",
                    data: [ 0, 48],
                    borderColor: "#45aaf2",
                    borderWidth: "0",
                    backgroundColor: "#45aaf2"},
					
                ]
        },
        options: {
			responsive: true,
			maintainAspectRatio: false,
            scales: {
                yAxes: [ {
                    ticks: {
                        beginAtZero: true
                    }
                                } ]
            }
        }
    } );
	

} )( jQuery );