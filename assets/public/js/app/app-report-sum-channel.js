var base_url = $('#base_url').val();
var v_params_tenant = 'oct_telkomcare';
var d = new Date();
var o = d.getDate();
var n = d.getMonth()+1;
var m = d.getFullYear();
var tenantFromFilter = '';
var v_start_date = '';
var v_end_date = '';
var tenants = [];
if (o < 10) {
  o = '0' + o;
} 
if (n < 10) {
  n = '0' + n;
}

var v_params_today= m + '-' + n + '-' + (o);
var startDateFromFilter = v_params_today;
var endDateFromFilter = v_params_today;
const sessionParams = JSON.parse(sessionStorage.getItem('Auth-infomedia'));

$(document).ready(function () {
    getTenant('')
    $('#start-date').datepicker("setDate", v_params_today);
    $('#end-date').datepicker("setDate", v_params_today);
    startDateFromFilter = v_params_today;
    endDateFromFilter = v_params_today;
    drawTableSumChannel(v_params_tenant,v_params_today,v_params_today);
    callDrawPieChart(v_params_tenant,v_params_today,v_params_today);
    // $('#tableOperation2').dataTable();
    // callTablePerformOps(v_params_tenant, '', n);
});

function getTenant(date){
    $.ajax({
        type: 'POST',
        url: base_url + 'api/Wallboard/WallboardController/GetTennantscr',
        data: {
            "date" : date
        },

        success: function (r) {
            var data_option = [];
            //dont parse response if using rest controller
            // var response = JSON.parse(r);
            var response = r;
            // console.log(response);
            // tenants = response.data;
            var html = '<option value="">All Tenant</option>';
            // var html = '';
                for(i=0; i<response.data.length; i++){
                    html += '<option value='+response.data[i]+'>'+response.data[i]+'</option>';
                }
                $('#tenant-id').html(html);
        },
        error: function (r) {
            //console.log(r);
            alert("error");
        },
    });
}

function drawTableSumChannel(tenant_id, start_time, end_time){
    // console.log(tenantFromFilter);
    // console.log(channelFromFilter);
    // console.log(monthFromFilter);
    $('#tableSumChannel').DataTable({
        // processing : true,
        // serverSide : true,
        ajax: {
            url : base_url + 'api/Reporting/ReportController/ReportingSC',
            type : 'POST',
            data :{
                tenant_id: tenant_id,
                start_time: start_time,
                end_time: end_time
            }
        },
        columnDefs: [
            { className: "text-center", targets: 0 },
            { className: "text-center", targets: 1 },
            { className: "text-center", targets: 2 },
            { className: "text-center", targets: 3 },
            { className: "text-center", targets: 4 },
            { className: "text-center", targets: 5 }
        ], 
        destroy: true
    });
}

function callDrawPieChart(tenant_id, start_time, end_time){
    $.ajax({
        type: 'post',
        url: base_url+'api/Reporting/ReportDiagramsController/ReportingDiagramsSC',
        data: {
            tenant_id: tenant_id,
            start_time: start_time,
            end_time: end_time
        },
        success: function (r) {
            var response = r;
            // console.log(response.data.TOTAL);

            drawPieChartSumChannel(response);
        },
        error: function (r) {
            // console.log(r);
            alert("error");
            // $("#filter-loader").fadeOut("slow");
        },
    });
}

function drawPieChartSumChannel(response){
    $('#pieChartReportSumChannel1').remove(); // this is my <canvas> element
    $('#pieChartReportSumChannelDiv').append('<canvas id="pieChartReportSumChannel1" class="donutShadow overflow-hidden"></canvas>');

    // console.log(response);

    var ctx1 = document.getElementById( "pieChartReportSumChannel1" );
    ctx1.height = 290;
    var myChart1 = new Chart( ctx1, {
        type: 'pie',
        data: {
            datasets: [{
                data: response.data.TOTAL,
                backgroundColor: response.data.CHANNEL_COLOR,
                hoverBackgroundColor: response.data.CHANNEL_COLOR
            } ],
            labels: response.data.CHANNEL_NAME
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            
            legend:{
                    display : false
            },
            tooltips: {
              callbacks: {
                    label: function(tooltipItem, data) {
                        var value = data.datasets[0].data[tooltipItem.index];
                        value = value.toString();
                        value = value.split(/(?=(?:...)*$)/);
                        value = value.join(',');
                        return data.labels[tooltipItem.index]+': '+ value;
                    }
              } // end callbacks:
            },
            pieceLabel:{
                render : 'legend',
                fontColor : '#000',
                position : 'outside',
                segment : true
            },
            legendCallback : function (chart, index){
                var allData = chart.data.datasets[0].data;
                // console.log(chart)
                var legendHtml = [];
                legendHtml.push('<ul><div class="row mt-2 ml-5">');
                allData.forEach(function(data,index){
                    if (allData[index] !=0) {
                        var label = chart.data.labels[index];
                        var dataLabel = allData[index];
                        var background = chart.data.datasets[0].backgroundColor[index]
                        var total = 0;
                        for (var i in allData){
                            total += parseInt(allData[i]);
                        }

                        // console.log(total)
                        var percentage = Math.round((dataLabel / total) * 100);
                        legendHtml.push('<li class="col-md-12 col-lg-4 col-sm-4 col-xl-4">');
                        legendHtml.push('<span class="chart-legend"><div style="background-color :'+background+'" class="box-legend"></div>'+label+':'+percentage+ '%</span>');
                    } else {
                        var label = chart.data.labels[index];
                        var dataLabel = allData[index];
                        var background = chart.data.datasets[0].backgroundColor[index]
                        var total = 0;
                        for (var i in allData){
                            total += parseInt(allData[i]);
                        }

                        // console.log(total)
                        var percentage = Math.round((dataLabel / total) * 100);
                        legendHtml.push('<li class="col-md-12 col-lg-4 col-sm-4 col-xl-4">');
                        legendHtml.push('<span class="chart-legend"><div style="background-color :'+background+'" class="box-legend"></div>'+label+':'+'0'+ '%</span>');
                    }
                    
                })
                legendHtml.push('</ul></div>');
                return legendHtml.join("");
            },
        }
    });
    var myLegendContainer1 = document.getElementById("legend1");
    myLegendContainer1.innerHTML = myChart1.generateLegend();
}

function exportTableSumChannel(tenant_id, start_time, end_time, name){
    window.location = base_url + 'api/Reporting/ReportController/EXPORTSC?tenant_id='+tenant_id+'&start_time='+start_time+'&end_time='+end_time+'&name='+name;
}

function setDatePicker() {
    $(".datepicker").datepicker({
        format: "yyyy-mm-dd",
        todayHighlight: true,
        autoclose: true
    }).attr("readonly", "readonly").css({
        "cursor": "pointer",
        "background": "white"
    });
}

(function ($) {
    var date = new Date();
    date.setDate(date.getDate() > 0);
    $('#start-date').datepicker({
        dateFormat: 'yy-mm-dd',
        maxDate: 'now',
        showTodayButton: true,
        showClear: true,
        // minDate: date,
        // onSelect: function (dateText) {
        //  // console.log(this.value);
        //  v_start_date = this.value;
        // }
    });

    $('#end-date').datepicker({
        dateFormat: 'yy-mm-dd',
        maxDate: 'now',
        showTodayButton: true,
        showClear: true,
        // minDate: date,
        // onSelect: function (dateText) {
        //  // console.log(this.value);
        //  v_end_date = this.value;
        // }
    });
    
    $('#btn-export').click(function(){
        // exportTablePerformOps(v_params_tenant, '2', n, sessionParams.NAME);
        tenantFromFilter = $('#tenant-id').val();
        startDateFromFilter = $('#start-date').val();
        endDateFromFilter = $('#end-date').val();
        // console.log(startDateFromFilter);
        exportTableSumChannel(tenantFromFilter, startDateFromFilter, endDateFromFilter, sessionParams.NAME);
    });

    $('#btn-go').click(function(){
        tenantFromFilter = $('#tenant-id').val();
        startDateFromFilter = $('#start-date').val();
        endDateFromFilter = $('#end-date').val();
        
        drawTableSumChannel($('#tenant-id').val(), $('#start-date').val(), $('#end-date').val());
        callDrawPieChart($('#tenant-id').val(), $('#start-date').val(), $('#end-date').val());
    });

    
})(jQuery);

// $(function($){
//     $('#tableReportSumChannel').dataTable();


//     //pie chart report summary channel
//     var ctx1 = document.getElementById( "pieChartReportSumChannel1" );
//     ctx1.height = 290;
//     var myChart1 = new Chart( ctx1, {
//         type: 'pie',
//         data: {
//             datasets: [ {
//                 data: [ 15, 35, 40,20,50,30,15,30,40,50,70,90,100],
//                 backgroundColor: [
//                                 "#467fcf",
//                                 "#fbc0d5",
//                                 "#31a550",
//                                 "#e41313",
//                                 "#3866a6",
//                                 "#45aaf2",
//                                 "#6574cd",
//                                 "#343a40",
//                                 "#607d8b",
//                                 "#31a550",
//                                 "#ff9933",
//                                 "#80cbc4",
//                                 "#6E273E"
//                                 ],
//                 hoverBackgroundColor: [
//                                 "#467fcf",
//                                 "#fbc0d5",
//                                 "#31a550",
//                                 "#e41313",
//                                 "#3866a6",
//                                 "#45aaf2",
//                                 "#6574cd",
//                                 "#343a40",
//                                 "#607d8b",
//                                 "#31a550",
//                                 "#ff9933",
//                                 "#80cbc4",
//                                 "#6E273E"
//                                 ]

//                             } ],
//             labels: [       
//                                 "Facebook",
//                                 "Instagram",
//                                 "Line",
//                                 "Email",
//                                 "Messenger",
//                                 "Twitter",
//                                 "Twitter DM",
//                                 "Telegram",
//                                 "Live Chat",
//                                 "Whatsapp",
//                                 "Voice",
//                                 "SMS",
//                                 "Chatbot"
//                     ]
//         },
//         options: {
//             responsive: true,
// 			maintainAspectRatio: false,
			
//             legend:{
// 					display : false
// 			},
// 			pieceLabel:{
// 				render : 'legend',
// 				fontColor : '#000',
// 				position : 'outside',
// 				segment : true
// 			},
// 			legendCallback : function (chart, index){
// 				var allData = chart.data.datasets[0].data;
// 				// console.log(chart)
// 				var legendHtml = [];
// 				legendHtml.push('<ul><div class="row mt-2 ml-5">');
// 				allData.forEach(function(data,index){
// 					var label = chart.data.labels[index];
// 					var dataLabel = allData[index];
// 					var background = chart.data.datasets[0].backgroundColor[index]
// 					var total = 0;
// 					for (var i in allData){
// 						total += parseInt(allData[i]);
// 					}

// 					// console.log(total)
// 					var percentage = Math.round((dataLabel / total) * 100);
// 					legendHtml.push('<li class="col-md-12 col-lg-4 col-sm-4 col-xl-4">');
// 					legendHtml.push('<span class="chart-legend"><div style="background-color :'+background+'" class="box-legend"></div>'+label+':'+percentage+ '%</span>');
// 				})
// 				legendHtml.push('</ul></div>');
// 				return legendHtml.join("");
// 			},
//         }
// 	});
// 	var myLegendContainer1 = document.getElementById("legend1");
// 	myLegendContainer1.innerHTML = myChart1.generateLegend();
// });