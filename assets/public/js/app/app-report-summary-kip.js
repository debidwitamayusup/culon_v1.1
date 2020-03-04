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
const sessionParams = JSON.parse(localStorage.getItem('Auth-infomedia'));

$(document).ready(function () {
    if(sessionParams){
        $('#start-date').datepicker("setDate", v_params_today);
        $('#end-date').datepicker("setDate", v_params_today);
        if(sessionParams.TENANT_ID[0].TENANT_ID != ''){
            getTenant('', sessionParams.USERID);
        }else{
            getTenant('', '');
        }
        callTableKIP(v_params_today,v_params_today, $("#layanan_name").val(), '');
        startDateFromFilter = v_params_today;
        endDateFromFilter = v_params_today;
    }else{
        window.location = base_url;
    }
});

function getTenant(date, userid){
    $.ajax({
        type: 'POST',
        url: base_url + 'api/Wallboard/WallboardController/GetTennantFilter',
        data: {
            "date" : date,
            "userid" : userid
        },

        success: function (r) {
            var data_option = [];
            //dont parse response if using rest controller
            // var response = JSON.parse(r);
            var response = r;
            // console.log(response);
            // tenants = response.data;
                var html = '';
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

function addCommas(commas) {
    commas += '';
    x = commas.split('.');
    x1 = x[0];
    x2 = x.length > 1 ? '.' + x[1] : '';
    var rgx = /(\d+)(\d{3})/;
    while (rgx.test(x1)) {
        x1 = x1.replace(rgx, '$1' + '.' + '$2');
    }
    return x1 + x2;
}

function channelToName(channel_id){
    if (channel_id){
        return channels[channel_id - 1] || '';
    }
    return 'All Channel'

}

function callTableKIP(start_date,end_date, tenant_id, channel_id){
    $("#filter-loader").fadeIn("slow");
	$.ajax({
		url : base_url + 'api/Reporting/ReportController/ReportingKIP',
        type : 'POST',
        data :{
            start_date: start_date,
            end_date: end_date,
            tenant_id: tenant_id,
            channel_id: channel_id
        },
        success: function (r) {
            var response = r;
            drawTableKIP(response);
            // $("#filter-loader").fadeOut("slow");
        },
        error: function (r) {
            // console.log(r);
            alert("error");
            // $("#filter-loader").fadeOut("slow");
        },
	});
}

function drawTableKIP(response){
    $("#mytbody").empty();
    $("#mytfoot").empty();
	if (response.data.length != 0) {
        var total=0;
		for (var i = 0; i < response.data.length; i++) {
			$('#tableReportKIP').find('tbody').append('<tr>'+
                '<td class="text-center">'+(i+1)+'</td>'+
                '<td class="text-left">'+response.data[i].CATEGORY+'</td>'+
                '<td class="text-right">'+addCommas(response.data[i].JUMLAH)+'</td>'+
            +'</tr>')
            total += parseInt(response.data[i].JUMLAH || 0)
        }
        $('#tableReportKIP').find('tfoot').append('<th colspan="2" class="wd-15p border-bottom-0 font-weight-extrabold text-center" width="20">Total</th>'+
        '<th class="wd-15p border-bottom-0 font-weight-extrabold">'+addCommas(total)+'</th>')
        $("#filter-loader ").fadeOut("slow");
	} else {
        $('#tableReportKIP').find('tbody').append('<tr>'+
           '<td class="text-center" colspan=28> No Data Available </td>'+
        '</tr>');
        $("#filter-loader ").fadeOut("slow");
	}
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


function exportTableKIP(start_date, end_date, tenant_id, channel_id, name){
    $("#filter-loader").fadeIn("slow");
    // window.location = base_url + 'api/Reporting/ReportController/EXPORTSC?tenant_id='+tenant_id+'&start_time='+start_time+'&end_time='+end_time+'&name='+name;
    $.ajax({
        type: 'POST',
        url: base_url + 'api/Reporting/ReportController/EXPORTKIP',
        data: {
            start_date: start_date,
            end_date: end_date,
            tenant_id: tenant_id,
            channel_id: channel_id,
            name: name,
            channel_name: channelToName(channel_id)
        }
        ,
        success: function (r) {
            if (r.status != false){
                window.location = r.Link;
            }else{
                alert("Can't Export Empty Data");
            }
            $("#filter-loader").fadeOut("slow");
        },
        error: function (r) {
            //console.log(r);
            alert("can't export");
            $("#filter-loader").fadeOut("slow");
        },
    });
}

(function($) {
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
        //  v_start_date = this.value;
        // }
    });
    $('#btn-export').click(function(){
        dateFromFilter = $('#input-date').val();
        intervalFromFilter = $('#interval').val();
        channelFromFilter = $('#channel_name').val();

        exportTableKIP(startDateFromFilter, endDateFromFilter, tenantFromFilter, channelFromFilter, sessionParams.NAME);
    });

    $('#btn-go').click(function(){
        startDateFromFilter = $("#start-date").val();
        endDateFromFilter = $("#end-date").val();
        channelFromFilter = $('#channel_name').val();
        tenantFromFilter = $("#layanan_name").val();
        callTableKIP($('#start-date').val(), $('#end-date').val(), $('#layanan_name').val(), $('#channel_name').val());
    });
})(jQuery);