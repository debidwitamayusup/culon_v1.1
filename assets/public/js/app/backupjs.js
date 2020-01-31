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