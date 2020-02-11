var base_url = $('#base_url').val();
var v_params_tenant = 'oct_telkomcare';
var d = new Date();
var o = d.getDate();
var n = d.getMonth()+1;
var m = d.getFullYear();
var dateFromFilter = '';
var intervalFromFilter = '';
var channelFromFilter = '';
if (o < 10) {
  o = '0' + o;
} 
if (n < 10) {
  n = '0' + n;
}

var channels = [
    'Voice', 'Email', 'Live Chat', 'SMS', 'Telegram', 'Facebook',
    'Messenger', 'Twitter', '', 'Line', 'Instagram', 'Whatsapp', 'Twitter DM', '',
    'Chat Bot'
];

var v_params_today= m + '-' + n + '-' + (o);
const sessionParams = JSON.parse(sessionStorage.getItem('Auth-infomedia'));

$(document).ready(function () {
    // getTenant('')
    $('#input-date').datepicker("setDate", v_params_today);
    drawTableSumInterval(v_params_today,'','');
    // $('#tableOperation2').dataTable();
    // callTablePerformOps(v_params_tenant, '', n);
});

function channelToName(channel_id){
    if (channel_id){
        return channels[channel_id - 1] || '';
    }
    return 'All Channel'
}

function drawTableSumInterval(tanggal,interval,channel){
	$('#tableReportSumInterval').DataTable({
        ajax: {
            url : base_url + 'api/Reporting/ReportController/ReportingSInterval',
            type : 'POST',
            data :{
                tanggal: tanggal,
                interval: interval,
                channel: channel
            }
        },
        columnDefs: [
			{ className: "text-center", targets: 0 },
			{ className: "text-center", targets: 1 },
			{ className: "text-center", targets: 2 },
			{ className: "text-center", targets: 3 },
			{ className: "text-center", targets: 4 },
			{ className: "text-center", targets: 5 },
			{ className: "text-right", targets: 6 },
            { className: "text-right", targets: 7},
            { className: "text-right", targets: 8}
		], 
        destroy: true
    });
    // console.log(data);
}

function exportTableSumInterval(tanggal,interval,channel,name){
    $.ajax({
        type:'POST',
        url: base_url + 'api/Reporting/ReportController/ReportingSInterval',
        data:{
            tanggal: tanggal,
            interval: interval,
            channel: channel
        },

        success: function(r){
            var response = r;
            if (response.status != false) {
                window.location = base_url + 'api/Reporting/ReportController/EXPORTSI?tanggal='+tanggal+'&interval='+interval+'&channel='+channel+'&name='+name+'&channel_name='+channelToName(channel);
            } else {
                alert("Can't Export Empty Table!");
            }
        }
    })    
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
    $('#input-date').datepicker({
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
    $('#btn-export').click(function(){
        dateFromFilter = $('#input-date').val();
        intervalFromFilter = $('#interval').val();
        channelFromFilter = $('#channel_name').val();

        exportTableSumInterval(dateFromFilter, intervalFromFilter, channelFromFilter, sessionParams.NAME);
    });

    $('#btn-go').click(function(){
        dateFromFilter = $('#input-date').val();
        intervalFromFilter = $('#interval').val();
        channelFromFilter = $('#channel_name').val();
        
        drawTableSumInterval($('#input-date').val(), $('#interval').val(), $('#channel_name').val());
    });

    
})(jQuery);


// $(function ($) {
// 	$('#tableReportSumInterval').dataTable();

//     //pie chart report summary channel
//     var ctx = document.getElementById( "pieChartReportSumInterval" );
//     ctx.height = 333;
//     var myChart = new Chart( ctx, {
//         type: 'pie',
//         data: {
//             datasets: [ {
//                 data: [ 15, 35, 40],
//                 backgroundColor: [
//                                 "#A5B0B6",
//                                 "#009E8C",
//                                 "#00436D"
//                                 ],
//                 hoverBackgroundColor: [
//                                 "#A5B0B6",
//                                 "#009E8C",
//                                 "#00436D"
//                                 ]

//                             } ],
//             labels: [
//                                 "ART",
//                                 "AHT",
//                                 "AST"
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
// 				legendHtml.push('<ul><div class="row mt-9 ml-6">');
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
// 					legendHtml.push('<li class="col-md-12 col-lg-4 col-sm-6 col-xl-4">');
// 					legendHtml.push('<span style="margin-top:40px" class="chart-legend"><div style="background-color :'+background+'" class="box-legend"></div>'+label+':'+percentage+ '%</span>');
// 				})
// 				legendHtml.push('</ul></div>');
// 				return legendHtml.join("");
// 			},
//         }
// 	});
// 	var myLegendContainer = document.getElementById("legend");
// 	myLegendContainer.innerHTML = myChart.generateLegend();
// });
