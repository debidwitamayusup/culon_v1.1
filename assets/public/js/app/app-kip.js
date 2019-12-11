(function ($) {
    "use strict";
    //pie chart
    var ctx = document.getElementById( "pieKIP");
    ctx.height = 290;
    var myChart = new Chart( ctx, {
        type: 'pie',
        data: {
            datasets: [ {
                data: [ 85, 48, 59 ],
                backgroundColor: [
                                    "#B22222",
                                    "#316cbe",
                                    "#ff9933"
                                ],
                hoverBackgroundColor: [
                                    "#B22222",
                                    "#316cbe",
                                    "#ff9933"
                                ]

                            } ],
            labels: [
                            "Complaint",
                            "Request",
                            "Information"
                        ]
        },
        options: {
            responsive: true,
			maintainAspectRatio: false,
			legend :{
				position : "bottom"
			}
        }
    } );
})(jQuery);