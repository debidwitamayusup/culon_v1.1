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
var startDateFromFilter = v_params_today;
var endDateFromFilter = v_params_today;
const sessionParams = JSON.parse(sessionStorage.getItem('Auth-infomedia'));

$(document).ready(function () {
    if(sessionParams){
        // getTenant('');
        $('#start-date').datepicker("setDate", v_params_today);
        $('#end-date').datepicker("setDate", v_params_today);
        startDateFromFilter = v_params_today;
        endDateFromFilter = v_params_today;
        drawTableAgentPerform('',v_params_today,v_params_today);
        // $('#tableOperation2').dataTable();
        // callTablePerformOps(v_params_tenant, '', n);
    }else{
        window.location = base_url;
    }
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

function drawTableAgentPerform(tenant_id, start_time, end_time){
    // console.log(tenantFromFilter);
    // console.log(channelFromFilter);
    // console.log(monthFromFilter);
	$('#reportAgentPerformance').DataTable({
        // processing : true,
        // serverSide : true,
        ajax: {
            url : base_url + 'api/Reporting/ReportController/ReportingAP',
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
			{ className: "text-right", targets: 4 },
			{ className: "text-right", targets: 5 },
			{ className: "text-right", targets: 6 },
			{ className: "text-center", targets: 7 },
			{ className: "text-center", targets: 8 },
			{ className: "text-center", targets: 9 },
			{ className: "text-right", targets: 10 },
		], 
        destroy: true
    });
}

function exportTableAgentPerform(tenant_id, start_time, end_time, name){
    $("#filter-loader").fadeIn("slow");
    window.location = base_url + 'api/Reporting/ReportController/EXPORTSPA?tenant_id='+tenant_id+'&start_time='+start_time+'&end_time='+end_time+'&name='+name;
    $("#filter-loader").fadeOut("slow");
    // $.ajax({
    //     type: 'POST',
    //     url: base_url + 'api/Reporting/ReportController/EXPORTSPA',
    //     data: {
    //         tenant_id: tenant_id,
    //         start_time: start_time,
    //         end_time: end_time,
    //         name: name
    //     },

    //     success: function (r) {
    //         //dont parse response if using rest controller
    //         // var response = JSON.parse(r);
    //         var response = r;
    //         if (response.status != false){
    //             window.location = response.Link
    //         }else{
    //             alert("Can't Export Empty Table!");
    //         }
    //     },
    //     error: function (r) {
    //         //console.log(r);
    //         alert("error");
    //     },
    // });
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
		// 	// console.log(this.value);
		// 	v_start_date = this.value;
        // }
    });

    $('#end-date').datepicker({
		dateFormat: 'yy-mm-dd',
		maxDate: 'now',
		showTodayButton: true,
		showClear: true,
		// minDate: date,
		// onSelect: function (dateText) {
		// 	// console.log(this.value);
		// 	v_end_date = this.value;
        // }
    });
    
    $('#btn-export').click(function(){
        // exportTablePerformOps(v_params_tenant, '2', n, sessionParams.NAME);
        tenantFromFilter = $('#layanan_name').val();
        startDateFromFilter = $('#start-date').val();
        endDateFromFilter = $('#end-date').val();
        // console.log(startDateFromFilter);
        exportTableAgentPerform(tenantFromFilter, startDateFromFilter, endDateFromFilter, sessionParams.NAME);
    });

    $('#btn-go').click(function(){
        tenantFromFilter = $('#layanan_name').val();
        startDateFromFilter = $('#start-date').val();
        endDateFromFilter = $('#end-date').val();
        
        drawTableAgentPerform($('#layanan_name').val(), $('#start-date').val(), $('#end-date').val());
    });

    $('#reportAgentPerformance').dataTable();
    
})(jQuery);