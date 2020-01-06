(function ($) {
    "use strict";

    //pie chart summary status ticket
    var ctx = document.getElementById( "pieChart" );
    ctx.height = 273;
    var myChart = new Chart( ctx, {
        type: 'pie',
        data: {
            datasets: [ {
                data: [ 15, 35, 40,20,50,30,15,30 ],
                backgroundColor: ["#778899","#5F9EA0","#87CEFA","#ADD8E6","#8FBC8F","#008B8B","#6495ED","#20B2AA"],
                hoverBackgroundColor: ["#778899","#5F9EA0","#87CEFA","#ADD8E6","#8FBC8F","#008B8B","#6495ED","#20B2AA"]
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
                position:"bottom",
                labels:{
					boxWidth:10
			   }
            }
        }
    } );

    //pie chart summary unit
    var ctx = document.getElementById( "pieChartUnit" );
    ctx.height = 273;
    var myChart = new Chart( ctx, {
        type: 'pie',
        data: {
            datasets: [ {
                data: [ 15, 35, 40,20,50,30,15,30,90,100 ],
                backgroundColor: [
                                    "#2F5596",
                                    "#01B0F1",
                                    "#F07D2D",
                                    "#F3AE8F",
                                    "#44546B",
                                    "#70AC48",
                                    "#9EC2E4",
                                    "#00AF50",
                                    "#FDC100",
                                    "#C20006"
                                ],
                hoverBackgroundColor: [
                                    "#2F5596",
                                    "#01B0F1",
                                    "#F07D2D",
                                    "#F3AE8F",
                                    "#44546B",
                                    "#70AC48",
                                    "#9EC2E4",
                                    "#00AF50",
                                    "#FDC100",
                                    "#C20006"
                                ]

                            } ],
            labels: [
                            "Agency Help Line",
                            "Keuangan",
                            "CRM",
                            "Post Line",
                            "Provider Relation",
                            "Data Control",
                            "Credit Control",
                            "Claim Health",
                            "Claim Non Health",
                            "Call Center"
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

})(jQuery);