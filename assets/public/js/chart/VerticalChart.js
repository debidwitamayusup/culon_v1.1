(function ($) {
	"use strict";
	//bar chart
	if (window.location.pathname.indexOf("/main/this_day") > -1) {
		var ctx = document.getElementById("echartVerticalDay");
		ctx.height = 538;
		var myChart = new Chart(ctx, {
			type: 'horizontalBar',
			data: {
				labels: [
					"Whatsapp",
					"Twitter",
					"Facebook",
					"Email",
					"Telegram",
					"Line",
					"Voice",
					"Instagram",
					"Messenger",
					"Twitter DM",
					"Live Chat",
					"Pesan"
				],
				datasets: [{
					label: "Data awal",
					data: [85, 48, 59, 37, 12, 16, 18, 30, 40, 10, 40, 12],
					borderColor: [
						"#31a550 ",
						"#45aaf2",
						"#316cbe",
						"#e41313",
						"#343a40",
						"#31a550",
						"#ff9933",
						"#fbc0d5",
						"#3866a6",
						"#6574cd",
						"#42265e",
						"#1c3353"
					],
					borderWidth: "0",
					backgroundColor: [
						"#31a550",
						"#45aaf2",
						"#316cbe",
						"#e41313",
						"#343a40",
						"#31a550",
						"#ff9933",
						"#fbc0d5",
						"#3866a6",
						"#6574cd",
						"#42265e",
						"#1c3353"
					]
				}, ]
			},
			options: {
				responsive: true,
				maintainAspectRatio: false,
				scales: {
					yAxes: [{
						ticks: {
							beginAtZero: true
						}
					}]
				},
				legend: {
					display: false
				}
			}
		});
	} else if (window.location.pathname.indexOf("/main/this_month") > -1) {
		//bar chart
		var ctxMotnh = document.getElementById("echartVerticalMonth");
		ctxMotnh.height = 538;
		var myChartMotnh = new Chart(ctxMotnh, {
			type: 'horizontalBar',
			data: {
				labels: [
					"Whatsapp",
					"Twitter",
					"Facebook",
					"Email",
					"Telegram",
					"Line",
					"Voice",
					"Instagram",
					"Messenger",
					"Twitter DM",
					"Live Chat",
					"Pesan"
				],
				datasets: [{
					label: "Data awal",
					data: [85, 48, 59, 37, 12, 16, 18, 30, 40, 10, 40, 12],
					borderColor: [
						"#31a550 ",
						"#45aaf2",
						"#316cbe",
						"#e41313",
						"#343a40",
						"#31a550",
						"#ff9933",
						"#fbc0d5",
						"#3866a6",
						"#6574cd",
						"#42265e",
						"#1c3353"
					],
					borderWidth: "0",
					backgroundColor: [
						"#31a550",
						"#45aaf2",
						"#316cbe",
						"#e41313",
						"#343a40",
						"#31a550",
						"#ff9933",
						"#fbc0d5",
						"#3866a6",
						"#6574cd",
						"#42265e",
						"#1c3353"
					]
				}, ]
			},
			options: {
				responsive: true,
				maintainAspectRatio: false,
				scales: {
					yAxes: [{
						ticks: {
							beginAtZero: true
						}
					}]
				},
				legend: {
					display: false
				}
			}
		});
	} else if (window.location.pathname.indexOf("/main/this_year") > -1){
		//bar chart
		var ctxYear = document.getElementById("echartVerticalYear");
		ctxYear.height = 539;
		var myChartYear = new Chart(ctxYear, {
			type: 'horizontalBar',
			data: {
				labels: [
					"Whatsapp",
					"Twitter",
					"Facebook",
					"Email",
					"Telegram",
					"Line",
					"Voice",
					"Instagram",
					"Messenger",
					"Twitter DM",
					"Live Chat",
					"Pesan"
				],
				datasets: [{
					label: "Data awal",
					data: [85, 48, 59, 37, 12, 16, 18, 30, 40, 10, 40, 12],
					borderColor: [
						"#31a550 ",
						"#45aaf2",
						"#316cbe",
						"#e41313",
						"#343a40",
						"#31a550",
						"#ff9933",
						"#fbc0d5",
						"#3866a6",
						"#6574cd",
						"#42265e",
						"#1c3353"
					],
					borderWidth: "0",
					backgroundColor: [
						"#31a550",
						"#45aaf2",
						"#316cbe",
						"#e41313",
						"#343a40",
						"#31a550",
						"#ff9933",
						"#fbc0d5",
						"#3866a6",
						"#6574cd",
						"#42265e",
						"#1c3353"
					]
				}, ]
			},
			options: {
				responsive: true,
				maintainAspectRatio: false,
				scales: {
					yAxes: [{
						ticks: {
							beginAtZero: true
						}
					}]
				},
				legend: {
					display: false
				}
			}
		});
	}
})(jQuery);