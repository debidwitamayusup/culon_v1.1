var base_url = $('#base_url').val();
var v_params_tenant = 'oct_telkomcare';
var d = new Date();
var o = d.getDate();
var n = d.getMonth()+1;
var m = d.getFullYear();
var tenantFromFilter = '';
var channelFromFilter = '';
var startDateFromFilter = '';
var endDateFromFilter = '';
var tenants = [];
if (o < 10) {
  o = '0' + o;
} 
if (n < 10) {
  n = '0' + n;
}

var months = [
    'January', 'February', 'March', 'April', 'May',
    'June', 'July', 'August', 'September',
    'October', 'November', 'December'
];

var channels = [
    'Voice', 'Email', 'Live Chat', 'SMS', 'Telegram', 'Facebook',
    'Messenger', 'Twitter', '', 'Line', 'Instagram', 'Whatsapp', 'Twitter DM', '',
    'Chat Bot'
];

//get today
var v_params_today= m + '-' + n + '-' + (o);
const sessionParams = JSON.parse(sessionStorage.getItem('Auth-infomedia'));

$(document).ready(function () {
    getTenant('')
    $('#start-date').datepicker("setDate", v_params_today);
    $('#end-date').datepicker("setDate", v_params_today);
    drawTableCloseTicket(v_params_today, v_params_today, '', '');
    drawTableCloseTicketPerChannel(v_params_today, v_params_today, '', '');

    tenantFromFilter = $('#layanan_name').val();
    startDateFromFilter = $('#start-date').val();
    endDateFromFilter = $('#end-date').val();
    channelFromFilter = $('#channel_name').val();
});

function monthNumToName(month) {
    if(month){
        return months[month - 1] || '';
    }
    return 'All Month';
}

function channelToName(channel_id){
    if (channel_id){
        return channels[channel_id - 1] || '';
    }
    return 'All Channel'
}

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
                $('#layanan_name').html(html);
        },
        error: function (r) {
            //console.log(r);
            alert("error");
        },
    });
}

function drawTableCloseTicket(tenant_id, start_date, end_date, channel){
    $('#tableSumClose').DataTable({
        ajax: {
            url : base_url + 'api/Reporting/ReportController/ReportingSCloseTicket',
            type : 'POST',
            data :{
                tenant_id: tenant_id,
                start_date: start_date,
                end_date: end_date,
                channel: channel
            }
        },
        columnDefs: [
			{ className: "text-center", targets: 0 },
			{ className: "text-center", targets: 1 },
			{ className: "text-center", targets: 2 },
			{ className: "text-center", targets: 3 },
			{ className: "text-right", targets: 4 }
		], 
        destroy: true
    });
}

function drawTableCloseTicketPerChannel(tenant_id, start_date, end_date, channel){
    $('#tableSumChannel').DataTable({
        ajax: {
            url : base_url + 'api/Reporting/ReportController/ReportingSClosePerCh',
            type : 'POST',
            data :{
                tenant_id: tenant_id,
                start_date: start_date,
                end_date: end_date,
                channel: channel
            }
        },
        columnDefs: [
			{ className: "text-center", targets: 0 },
			{ className: "text-center", targets: 1 },
			{ className: "text-right", targets: 2 }
		], 
        destroy: true
    });
}

function exportTableCloseTicket(tenant_id, start_date, end_date, channel_id, name){
    $.ajax({
        type: 'POST',
        url: base_url + 'api/Reporting/ReportController/ReportingSCloseTicket',
        data: {
            tenant_id: tenant_id,
            start_date: start_date,
            end_date: end_date,
            channel_id: channel_id
        },

        success: function (r) {
            //dont parse response if using rest controller
            // var response = JSON.parse(r);
            var response = r;
            if (response.status != false){
                window.location = base_url + 'api/Reporting/ReportController/EXPORTSCLOSE?tenant_id='+tenant_id+'&channel_id='+channel_id+'&start_date='+start_date+'&end_date='+end_date+'&name='+name+'&channel_name='+channelToName(channel_id)
            }else{
                alert("Can't Export Empty Table!");
            }
        },
        error: function (r) {
            //console.log(r);
            alert("error");
        },
    });
    
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

//jquery
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
        exportTableCloseTicket(tenantFromFilter, startDateFromFilter, endDateFromFilter, channelFromFilter, sessionParams.NAME);
    });

    $('#btn-go ').click(function(){
        tenantFromFilter = $('#layanan_name').val();
        startDateFromFilter = $('#start-date').val();
        endDateFromFilter = $('#end-date').val();
        channelFromFilter = $('#channel_name').val();
        
        drawTableCloseTicket($('#layanan_name').val(),  $('#start-date').val(), $('#end-date').val(), $('#channel_name').val());
        drawTableCloseTicketPerChannel($('#layanan_name').val(),  $('#start-date').val(), $('#end-date').val(), $('#channel_name').val());
    });

    
})(jQuery);

$(function ($) {

    $('#tableSumClose').dataTable();
    $('#tableSumChannel').dataTable();


//pie chart Ticket Channel
var ctx = document.getElementById( "pieChartSumChannel" );
ctx.height = 262;
var myChart = new Chart( ctx, {
    type: 'pie',
    data: {
        datasets: [ {
            data: [ 15, 35, 40,20,50,30,15,30,40,50,70,90],
            backgroundColor: [
                            "#467fcf",
                            "#fbc0d5",
                            "#31a550",
                            "#e41313",
                            "#3866a6",
                            "#45aaf2",
                            "#6574cd",
                            "#343a40",
                            "#607d8b",
                            "#31a550",
                            "#ff9933",
                            "#80cbc4"
                            ],
            hoverBackgroundColor: [
                            "#467fcf",
                            "#fbc0d5",
                            "#31a550",
                            "#e41313",
                            "#3866a6",
                            "#45aaf2",
                            "#6574cd",
                            "#343a40",
                            "#607d8b",
                            "#31a550",
                            "#ff9933",
                            "#80cbc4"
                            ]

                        } ],
        labels: [
                            "Facebook",
                            "Instagram",
                            "Line",
                            "Email",
                            "Messenger",
                            "Twitter",
                            "Twitter DM",
                            "Telegram",
                            "Live Chat",
                            "Whatsapp",
                            "Voice",
                            "SMS"
                ]
    },
    options: {
        responsive: true,
        maintainAspectRatio: false,
        
        legend:{
                display : false
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
            legendHtml.push('<ul><div class="row ml-3">');
            allData.forEach(function(data,index){
                var label = chart.data.labels[index];
                var dataLabel = allData[index];
                var background = chart.data.datasets[0].backgroundColor[index]
                var total = 0;
                for (var i in allData){
                    total += parseInt(allData[i]);
                }

                // console.log(total)
                var percentage = Math.round((dataLabel / total) * 100);
                legendHtml.push('<li class="col-md-4 col-lg-4 col-sm-6 col-xl-4">');
                legendHtml.push('<span class="chart-legend"><div style="background-color :'+background+'" class="box-legend"></div>'+label+':'+percentage+ '%</span>');
            })
            legendHtml.push('</ul></div>');
            return legendHtml.join("");
        },
    }
});
var myLegendContainer = document.getElementById("legend");
myLegendContainer.innerHTML = myChart.generateLegend();
})