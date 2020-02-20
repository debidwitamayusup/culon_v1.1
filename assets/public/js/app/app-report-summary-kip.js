var base_url = $('#base_url').val();
var v_params_tenant = 'oct_telkomcare';
var d = new Date();
var o = d.getDate();
var n = d.getMonth()+1;
var m = d.getFullYear();
var tenantFromFilter = '';
var channelFromFilter = '';
var tenants = [];
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
var startDateFromFilter = v_params_today;
var endDateFromFilter = v_params_today;
const sessionParams = JSON.parse(sessionStorage.getItem('Auth-infomedia'));

$(document).ready(function () {
    getTenant('')
    $('#start-date').datepicker("setDate", v_params_today);
    $('#end-date').datepicker("setDate", v_params_today);
    startDateFromFilter = v_params_today;
    endDateFromFilter = v_params_today;

});

function getTenant(date){
    $.ajax({
        type: 'POST',
        url: base_url + 'api/Wallboard/WallboardController/GetTennantFilter',
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
                    html += '<option value='+response.data[i].TENANT_ID+'>'+response.data[i].TENANT_NAME+'</option>';
                }
                $('#layanan_name').html(html);
        },
        error: function (r) {
            //console.log(r);
            alert("error");
        },
    });
}

function channelToName(channel_id){
    if (channel_id){
        return channels[channel_id - 1] || '';
    }
    return 'All Channel'
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

$(function($){
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
        channelFromFilter = $('#channel_name').val();
        startDateFromFilter = $('#start-date').val();
        endDateFromFilter = $('#end-date').val();
        // console.log(startDateFromFilter);
        // exportTableAgentPerform(tenantFromFilter, startDateFromFilter, endDateFromFilter, sessionParams.NAME);
    });

    $('#btn-go').click(function(){
        tenantFromFilter = $('#layanan_name').val();
        channelFromFilter = $('#channel_name').val();
        startDateFromFilter = $('#start-date').val();
        endDateFromFilter = $('#end-date').val();
        
        // drawTableAgentPerform($('#layanan_name').val(), $('#start-date').val(), $('#end-date').val());
    });

    $('#tableReportKIP').dataTable();
})