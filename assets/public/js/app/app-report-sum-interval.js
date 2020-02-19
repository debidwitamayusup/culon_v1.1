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
    drawTableSumInterval('day', v_params_today,'1','');
    // $('#tableOperation2').dataTable();
    // callTablePerformOps(v_params_tenant, '', n);
});

function channelToName(channel_id){
    if (channel_id){
        return channels[channel_id - 1] || '';
    }
    return 'All Channel'
}

function drawTableSumInterval(params, index,interval,channel){
    $("#filter-loader").fadeIn("slow");
	$('#tableReportSumInterval').DataTable({
        ajax: {
            url : base_url + 'api/Reporting/ReportController/ReportingSInterval',
            type : 'POST',
            data :{
                params: params,
                index: index,
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
			{ className: "text-right", targets: 5 },
			{ className: "text-right", targets: 6 },
            { className: "text-right", targets: 7},
            // { className: "text-right", targets: 8}
		], 
        destroy: true
    });
    $("#filter-loader").fadeOut("slow");
    // console.log(data);
}

function exportTableSumInterval(tanggal,interval,channel,name){
    $("#filter-loader").fadeIn("slow");
    $.ajax({
        type:'POST',
        url: base_url + 'api/Reporting/ReportController/EXPORTSI',
        data:{
            tanggal: tanggal,
            interval: interval,
            channel: channel,
            name: name,
            channel_name: channelToName(channel)
        },

        success: function(r){
            var response = r;
            
            if (response.status != false) {
                window.location = response.Link
            } else {
                alert("Can't Export Empty Table!");
            }
            $("#filter-loader").fadeOut("slow");
        },
        error: function(r){
            alert(error);
            $("#filter-loader").fadeOut("slow");
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
        
        drawTableSumInterval('day',$('#input-date').val(), '1', $('#channel_name').val());
    });

    
})(jQuery);