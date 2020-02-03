//BackUp KIPPerchannel	
	$('#echartKIP').remove(); // this is my <canvas> element
	$('#content-chart-kip').append('<div id="echartKIP" class="chartsh-kip overflow-hidden"></div>');

	let category = []
	var arr_channel = []

	if (response.data.length != 0) {
		response.data.kip_channel.forEach(function (value) {
			arr_channel.push(value.channel_name);
		});
		// draw card yang ada datanya
		response.data.summary.forEach(function (value, index) {
			category.push(value.category);
		});
		var chartdata3 = []
		var i = 0;
		category.forEach(function (value, index) {
			var totalKip = []
			response.data.kip_channel.forEach(function (value) {
				var total = "";
				if (i == 0) {
					total = (value.total_1) ? value.total_1 : 0;
				} else if (i == 1) {
					total = (value.total_2) ? value.total_2 : 0;
				} else if (i == 2) {
					total = (value.total_3) ? value.total_3 : 0;
				}
				totalKip.push(total)

				// console.log(totalKip);
			});
			var dataKip = {
				name: value,
				type: 'bar',
				stack: "stack",
				data: totalKip
			}
			chartdata3.push(dataKip);
			i++;

		});

		// console.log(chartdata3);
		var option6 = {
			grid: {
				top: '30',
				right: '23',
				bottom: '20',
				left: '65',
			},
			xAxis: {
				type: 'value',
				axisLine: {
					lineStyle: {
						color: '#efefff'
					}
				},
				axisLabel: {
					fontSize: 10,
					color: '#7886a0'
				}
			},
			yAxis: {
				type: 'category',
				data: arr_channel,
				splitLine: {
					lineStyle: {
						color: '#efefff'
					}
				},
				axisLine: {
					lineStyle: {
						color: '#efefff'
					}
				},
				axisLabel: {
					fontSize: 10,
					color: '#7886a0',
					// formatter: function (value, index) {
					// 	if (/\s/.test(value)) {
					// 		var teks = '';
					// 		for(var i=0;i<value.length;i++){
					// 			if(value[i] == " "){
					// 				teks = teks + '\n';
					// 			}else{
					// 				teks = teks + value[i];
					// 			}
					// 		}
					// 		return teks;
					// 	}else{
					// 		return value;
					// 	} 
					// }
				}
			},
			legend:{
				data: ['KOMPLAIN', 'INFORMASI', 'PERMINTAAN'],
				top: 'auto'
			},
			series: chartdata3,
			color: ["#A5B0B6", "#009E8C", "#00436D"],
			tooltip: {
				show: true,
				showContent: true,
				alwaysShowContent: false,
				triggerOn: 'mousemove',
				trigger: 'axis',
				axisPointer: {
					label: {
						show: true,
						color: '#7886a0'
					}
				}
			},
		};
		var chart6 = document.getElementById('echartKIP');
		var barChart6 = echarts.init(chart6);
		barChart6.setOption(option6);
	} else {
		$('#echartKIP').append('<div id="chart-no-data" class="text-center mt-9"><span>No Data</span></div>');
	}

//BackUpSummaryServiceByChannel (Performance By Channel)
		let channelName = [];
		let art = [];
		let aht = [];
		let ast = [];
		// console.log(response.data);
		response.data.forEach(function (value, index) {
			channelName.push(value.CHANNEL_NAME);
			art.push(value.SUM_ART);
			aht.push(value.SUM_AHT);
			ast.push(value.SUM_AST);

		});
		// console.log(channelName);
		var chartdataTicket = [{
			name: 'ART',
			type: 'bar',
			stack: 'Stack',
			data: art
		}, {
			name: 'AHT',
			type: 'bar',
			stack: 'Stack',
			data: aht
		}, {
			name: 'AST',
			type: 'bar',
			stack: 'Stack',
			data: ast
		}];
		/*----echart performance by channel----*/
		var optionTicket = {
			// responsive: {
			// 	rules: {
			// 		condition: {
			// 			maxWidth: "500",
			// 		}
			// 	}
			// },
			grid: {
				top: '10%',
				right: '5%',
				bottom: '3%',
				left: '5%',
				width: '100%',
				containLabel: true
			},
			xAxis: {
				type: 'value',
				axisLine: {
					lineStyle: {
						color: '#efefff'
					}
				},
				axisLabel: {
					fontSize: 10,
					color: '#7886a0'
				}
			},
			yAxis: {
				type: 'category',
				// data: ['Live Chat','SMS','Messenger','Email','Voice','Twitter DM','Twitter','Whatsapp','Line','Telegram','Facebook','Instagram'],
				data: channelName,
				splitLine: {
					lineStyle: {
						color: '#efefff'
					}
				},
				axisLine: {
					lineStyle: {
						color: '#efefff'
					}
				},
				axisLabel: {
					fontSize: 10,
					color: '#7886a0'
				}
			},
			tooltip: {
				show: true,
				showContent: true,
				alwaysShowContent: false,
				triggerOn: 'mousemove',
				trigger: 'axis',
				axisPointer: {
					label: {
						show: true,
						color: '#7886a0'
					}
				},

				// position: function (pos, params, dom, rect, size) {
				// 	// tooltip will be fixed on the right if mouse hovering on the left,
				// 	// and on the left if hovering on the right.
				// 	// console.log(pos);
				// 	var obj = {top: pos[0]};
				// 	obj[['left', 'right'][+(pos[0] < size.viewSize[0] / 2)]] = 5;
				// 	return obj;
				// },
			},
			legend: {
				data: ['ART', 'AHT', 'AST'],
			},
			series: chartdataTicket,
			color: ["#A5B0B6", "#009E8C", "#00436D"]
		};
		var chartTicket = document.getElementById('echartService');
		var barChartTicket = echarts.init(chartTicket);
		barChartTicket.setOption(optionTicket);
		// window.onresize = function(){
		// 	barChartTicket.responsive();
		// 	// barChartTicket.resize();
		// }
		function myFunction(x) {
			if (x.matches) { // If media query matches
				barChartTicket;
			} else {
				barChartTicket;
			}
		}

		var x = window.matchMedia("(min-width: 450px)")
		myFunction(x) // Call listener function at run time
		x.addListener(myFunction)

// Backup graphic interval year app-traffic-year
			var chartdata = [{
                name: 'total',
                type: 'bar',
                data: response.data.total_traffic
            }];

			var chart = document.getElementById('echartYear');
            var barChart = echarts.init(chart);
            var option = {
                grid: {
                    top: '10%',
                    right: '3%',
                    bottom: '3%',
                    left: '2%',
                    containLabel: true,
                    width: '100%'
                },
                xAxis: {
                    data: response.data.month_x_axis,
                    axisLine: {
                        lineStyle: {
                            color: '#efefff'
                        }
                    },
                    axisLabel: {
                        fontSize: 10,
                        color: '#7886a0'
                    }
                },
                tooltip: {
                    show: true,
                    showContent: true,
                    alwaysShowContent: false,
                    triggerOn: 'mousemove',
                    trigger: 'axis',
                    axisPointer: {
                        label: {
                            show: false,
                        }
                    }
                },
                yAxis: {
                    splitLine: {
                        lineStyle: {
                            color: '#efefff'
                        }
                    },
                    axisLine: {
                        lineStyle: {
                            color: '#efefff'
                        }
                    },
                    axisLabel: {
                        fontSize: 8,
                        color: '#7886a0'
                    }
                },
                series: chartdata,
                color: ['' + response.data.channel_color + '']
            };
            barChart.setOption(option);
            $("#filter-loader").fadeOut("slow");
        },
        error: function (r) {
            alert("error");
            $("#filter-loader").fadeOut("slow");
        },
    });

//Backup wall ticket close drawstackedbar

		var chartdata3 = [{
                name: 'Whatsapp',
                type: 'bar',
                stack: 'Stack',
                data: response.data[10].total_traffic
            }, {
                name: 'Facebook',
                type: 'bar',
                stack: 'Stack',
                data: response.data[5].total_traffic
            }, {
                name: 'Twitter',
                type: 'bar',
                stack: 'Stack',
                data: response.data[7].total_traffic
            }, {
                name: 'Twitter DM',
                type: 'bar',
                stack: 'Stack',
                data: response.data[11].total_traffic
            }, {
                name: 'Instagram',
                type: 'bar',
                stack: 'Stack',
                data: response.data[9].total_traffic
            }, {
                name: 'Messenger',
                type: 'bar',
                stack: 'Stack',
                data: response.data[6].total_traffic
            }, {
                name: 'Telegram',
                type: 'bar',
                stack: 'Stack',
                data: response.data[4].total_traffic
            }, {
                name: 'Line',
                type: 'bar',
                stack: 'Stack',
                data: response.data[8].total_traffic
            }, {
                name: 'Email',
                type: 'bar',
                stack: 'Stack',
                data: response.data[1].total_traffic
            }, {
                name: 'Voice',
                type: 'bar',
                stack: 'Stack',
                data: response.data[0].total_traffic
            }, {
                name: 'SMS',
                type: 'bar',
                stack: 'Stack',
                data: response.data[3].total_traffic
            }, {
                name: 'Live Chat',
                type: 'bar',
                stack: 'Stack',
                data: response.data[2].total_traffic
            }, {
                name: 'Chat Bot',
                type: 'bar',
                stack: 'Stack',
                data: response.data[12].total_traffic
            }];
            /*----EchartMonth*/
            var option6 = {
                // grid: {
                //  top: '6',
                //  right: '15',
                //  bottom: '17',
                //  left: '32',
                // },
                tooltip: {
                    trigger: 'axis',
                    show: true,
                    showContent: true,
                    alwaysShowContent: false,
                    triggerOn: 'mousemove',
                    trigger: 'axis',
                    axisPointer: {
                        label: {
                            show: true,
                            color: '#7886a0',
                            type: 'shadow',
                            fontSize: 8
                            // formatter : function (){
                            //     return label_lng;
                            // }
                        }
                    },
                    // position: ['86%', '0%']
                    position: function (pos, params, dom, rect, size) {
                        // tooltip will be fixed on the right if mouse hovering on the left,
                        // and on the left if hovering on the right.
                        // console.log(pos);
                        var obj = {
                            top: pos[6]
                        };
                        obj[['left', 'right'][+(pos[0] < size.viewSize[0] / 2)]] = 5;
                        return obj;
                    },
                },
                legend: {
                    data: ['Whatsapp', 'Facebook', 'Twitter', 'Twitter DM', 'Instagram', 'Messenger', 'Telegram', 'Line', 'Email', 'Voice', 'SMS', 'Live Chat', 'Chat Bot'],
                    left: 'center',
                    // top: 'bottom',
                    itemWidth: 12,
                    padding: [10, 10, 40, 10]
                },

                grid: {
                    // top:'2%',
                    // left: '1%',
                    // right: '2%',
                    // bottom: '3%',
                    top: '19%',
                    right: '3%',
                    bottom: '7%',
                    left: '3%',
                    containLabel: true
                },
                xAxis: {
                    type: 'category',
                    data: response.dates,

                    axisLine: {
                        lineStyle: {
                            color: '#efefff'
                        }
                    },
                    axisLabel: {
                        fontSize: 10,
                        color: '#7886a0'
                    }
                },
                yAxis: {
                    type: 'value',
                    splitLine: {
                        lineStyle: {
                            color: '#efefff'
                        }
                    },
                    axisLine: {
                        lineStyle: {
                            color: '#efefff'
                        }
                    },
                    axisLabel: {
                        fontSize: 10,
                        color: '#7886a0'
                    }
                },
                series: chartdata3,
                color: ['#089e60', '#467fcf', '#45aaf2', '#6574cd', '#fbc0d5', '#3866a6', '#343a40', '#31a550', '#e41313', '#ff9933', '#80cbc4', '#607d8b', '#6e273e']
            };
            var chart6 = document.getElementById('echartWeek');
            var barChart6 = echarts.init(chart6);
            barChart6.setOption(option6);
            $("#filter-loader").fadeOut("slow");