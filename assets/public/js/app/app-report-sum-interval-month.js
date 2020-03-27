var base_url = $('#base_url').val();
var v_params_tenant = 'oct_telkomcare';
var d = new Date();
var o = d.getDate();
var n = d.getMonth()+1;
var m = d.getFullYear();
var monthFromFilter = '';
var intervalFromFilter = '';
var channelFromFilter = '';
var tenantFromFilter = '';
tenantNameFromFilter = '';
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

function monthNumToName(month) {
    if(month){
        return months[month - 1] || '';
    }
    return 'All Month';
}

var channels = [
    'Voice', 'Email', 'Live Chat', 'SMS', 'Telegram', 'Facebook',
    'Messenger', 'Twitter', '', 'Line', 'Instagram', 'Whatsapp', 'Twitter DM', '',
    'Chat Bot'
];

var v_params_today= m + '-' + n + '-' + (o);
const sessionParams = JSON.parse(localStorage.getItem('Auth-infomedia'));
const tokenSession = JSON.parse(localStorage.getItem('Auth-token'));
$(document).ready(function () {
    if(sessionParams){
        getTenant('')
        console.log(n);
        // $('#input-date').datepicker("setDate", '1');
        $('#month_name option[value=' + n + ']').attr('selected', 'selected');
        if(sessionParams.TENANT_ID[0].TENANT_ID != ''){
            getTenant('', sessionParams.USERID);
        }else{
            getTenant('', '');
        }
        drawTableSumInterval(tokenSession, n,'',$("#layanan_name").val());
        // $('#tableOperation2').dataTable();
        // callTablePerformOps(v_params_tenant, '', n);
        monthFromFilter = $('#month_name').val();
        intervalFromFilter = $('#interval').val();
        channelFromFilter = $('#channel_name').val();
        tenantNameFromFilter = $("#layanan_name option:selected").html();
    }else{
        window.location = base_url;
    }
});

function channelToName(channel_id){
    if (channel_id){
        return channels[channel_id - 1] || '';
    }
    return 'All Channel'
}

function drawTableSumInterval(token,month ,channel, tenant_id){
    $("#filter-loader").fadeIn("slow");
    $.fn.dataTable.ext.errMode = 'none';
	$('#tableReportSumIntervalMonth').on( 'error.dt', function ( e, settings, techNote, message ) {
        if(settings.jqXHR.status == 404){
            var notif = alert('Your Account Credential is Invalid. Maybe someone else has logon to your account.')
                if(notif){
                    localStorage.clear();
                    window.location = base_url+'main/login';
                }else{
                    localStorage.clear();
                    window.location = base_url+'main/login';
                }
        }
        } ).DataTable({
        ajax: {
            beforeSend: function (xhr) {
                xhr.setRequestHeader("token", token);
            },
            url : base_url + 'api/Reporting/ReportController/ReportingSIntervalMonth',
            type : 'POST',
            data :{
                month: month,
                channel: channel,
                tenant_id: tenant_id
            }
        },
        drawCallback: function (settings) { 
            // Here the response
            var response = settings.json;
            // console.log(response);
            if(response != undefined){
                if(response.status == false){
                    $('#btn-export').prop('disabled', true);
                }else{
                    $('#btn-export').prop('disabled', false);
                }
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
        paging: false,
        destroy: true
    });
    $("#filter-loader").fadeOut("slow");
    // console.log(data);
}

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

function exportTableSumIntervalMonth(month,channel,tenant_id,name,tenant_name){
    $("#filter-loader").fadeIn("slow");
    window.location = base_url + 'api/Reporting/ReportController/EXPORTSIMONTH?month='+month+'&channel='+channel+'&tenant_id='+tenant_id+'&channel='+channel+'&name='+name+'&channel_name='+channelToName(channel)+'&month_name='+monthNumToName(month)+'&tenant_name='+tenant_name;
    $("#filter-loader").fadeOut("slow");
    // $.ajax({
    //     type:'POST',
    //     url: base_url + 'api/Reporting/ReportController/EXPORTSIMONTH',
    //     data:{
    //         month: month,
    //         channel: channel,
    //         name: name,
    //         channel_name: channelToName(channel),
    //         month_name: monthNumToName(month)
    //     },

    //     success: function(r){
    //         var response = r;
            
    //         if (response.status != false) {
    //             window.location = response.Link
    //             // console.log(response);
    //         } else {
    //             alert("Can't Export Empty Table!");
    //         }
    //         $("#filter-loader").fadeOut("slow");
    //     },
    //     error: function(r){
    //         alert(error);
    //         $("#filter-loader").fadeOut("slow");
    //     }
    // })    
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
        exportTableSumIntervalMonth(monthFromFilter, channelFromFilter, tenantFromFilter, sessionParams.NAME, tenantNameFromFilter);
    });

    $('#btn-go').click(function(){
        monthFromFilter = $('#month_name').val();
        intervalFromFilter = $('#interval').val();
        channelFromFilter = $('#channel_name').val();
        tenantFromFilter = $('#layanan_name').val();
        tenantNameFromFilter = $("#layanan_name option:selected").html();
        drawTableSumInterval(tokenSession,$('#month_name').val(), $('#channel_name').val(), $('#layanan_name').val());
    });

    
})(jQuery);