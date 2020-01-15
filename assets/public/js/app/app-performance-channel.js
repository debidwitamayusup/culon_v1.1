var base_url = $('#base_url').val();
var v_params = 'day';
var v_index = '2020-01-10';
var v_month = '1';
var v_year = '2020';

$(document).ready(function () {
    loadContent(v_params, v_index, 0);
    // fromTemplate();
    $("#btn-month").prop("class","btn btn-light btn-sm");
    $("#btn-year").prop("class","btn btn-light btn-sm");
    $("#btn-day").prop("class","btn btn-red btn-sm");
});

function loadContent(index, params, params_year){
    drawDataTable2(params, index, params_year);
    summaryService(index, params, params_year)
}

function summaryService(params, index, params_year){
    $.ajax({
        type: 'post',
        url: base_url+'api/OperationPerformance/PerformanceByChannel/BarSummaryService',
        data: {
            params: params,
            index: index,
            params_year: params_year
        },
        success: function (r) {
            var response = JSON.parse(r);
            // console.log(response);
            drawChartSumService(response);
        },
        error: function (r) {
            console.log(r);
            alert("error");
        },
    });
}

function drawDataTable2(params, index, params_year){

    $('#mytbody').remove();
    // $('#mytfoot').remove();
    $('#tablesPerformance').append('<tbody class="text-center" id="mytbody" style="font-size:12px !important;">');

    $('#tablesPerformance').DataTable({
        processing : true,
        ajax: {
            url : base_url + 'api/AgentPerformance/AgentPerformController/getSTsallchannel',
            type : 'POST'
        },
        data: {
            params: params,
            index: index,
            params_year: params_year
        },
        destroy: true,
    });
}
function drawChartSumService(response){

	var MeSeContext = document.getElementById("barService");
    MeSeContext.height =200;
    var MeSeData = {
        labels : [
                    "ART",
                    "AHT",
                    "AST"
        ],
        datasets : [{
            label : "test",
            data :[response.data.SUMART, response.data.SUM_AHT, response.data.SUM_AST],
            backgroundColor : [
                                "#A5B0B6",
                                "#009E8C",
                                "#00436D"
                            ],
            hoverBackgroundColor : [
                             "#A5B0B6",
                             "#009E8C",
                             "#00436D"
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
}

function fromTemplate() {
    "use strict";
    
     /*----echart summary ticket category----*/
	var chartdataTicket= [{
		name: 'ART',
		type: 'bar',
		stack: 'Stack',
		data: [14, 18, 20, 14, 29, 21, 25, 14,15,15,20,20]
	}, {
		name: 'AHT',
		type: 'bar',
		stack: 'Stack',
		data: [12, 14, 15, 50, 24, 24, 10, 20,30,30,30,30]
	}, {
		name: 'AST',
		type: 'bar',
		stack: 'Stack',
		data: [12, 14, 15, 50, 24, 24, 10, 20,40,40,40,40]
	}];
	/*----echart summary ticket category----*/
	var optionTicket = {
		grid: {
			top: '6',
			right: '10',
			bottom: '17',
			left: '70',
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
			data: ['Live Chat','SMS','Messenger','Email','Voice','Twitter DM','Twitter','Whatsapp','Line','Telegram','Facebook','Instagram'],
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
		series: chartdataTicket,
		color: ["#A5B0B6","#009E8C","#00436D"]
	};
	var chartTicket = document.getElementById('echartService');
	var barChartTicket = echarts.init(chartTicket);
    barChartTicket.setOption(optionTicket);
    
    // Horizontal Bar

    var MeSeContext = document.getElementById("barService");
    MeSeContext.height =200;
    var MeSeData = {
        labels : [
                    "ART",
                    "AHT",
                    "AST"
        ],
        datasets : [{
            label : "test",
            data :[50,60,70],
            backgroundColor : [
                                "#A5B0B6",
                                "#009E8C",
                                "#00436D"
                            ],
            hoverBackgroundColor : [
                             "#A5B0B6",
                             "#009E8C",
                             "#00436D"
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



 //    //sample datatable	
	// $('#tablesPerformance').DataTable();
}

//jquery
(function ($) {

    // btn day
    $('#btn-day').click(function(){
        params_time = 'day';
        // console.log(params_time);
        loadContent(params_time , '2020-01-10');
        // $('#tag-time').html(v_date);
        $("#btn-week").prop("class","btn btn-light btn-sm");
        $("#btn-month").prop("class","btn btn-light btn-sm");
        $("#btn-year").prop("class","btn btn-light btn-sm");
        $(this).prop("class","btn btn-red btn-sm");
    });

    // btn day
    // $('#btn-week').click(function(){
    //     params_time = 'week';
    //     // console.log(params_time);
    //     loadContent(params_time , '2020-01-10', v_year);
    //     // $('#tag-time').html(v_date);
    //     $("#btn-day").prop("class","btn btn-light btn-sm");
    //     $("#btn-month").prop("class","btn btn-light btn-sm");
    //     $("#btn-year").prop("class","btn btn-light btn-sm");
    //     $(this).prop("class","btn btn-red btn-sm");
    // });

    // btn month
    $('#btn-month').click(function(){
        params_time = 'month';
        // console.log(params_time);
        loadContent(params_time , '1', v_year)
        // $('#tag-time').html(monthNumToName(v_month)+' '+v_year);
        $("#btn-week").prop("class","btn btn-light btn-sm");
        $("#btn-day").prop("class","btn btn-light btn-sm");
        $("#btn-year").prop("class","btn btn-light btn-sm");
        $(this).prop("class","btn btn-red btn-sm");
    });

    // btn year
    $('#btn-year').click(function(){
        params_time = 'year';
        // console.log(params_time);
        loadContent(params_time , '2020');
        // $('#tag-time').html(v_year);
        $("#btn-week").prop("class","btn btn-light btn-sm");
        $("#btn-month").prop("class","btn btn-light btn-sm");
        $("#btn-day").prop("class","btn btn-light btn-sm");
        $(this).prop("class","btn btn-red btn-sm");
    });


    
})(jQuery);