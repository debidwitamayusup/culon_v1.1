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
    if(sessionParams){
        $('#input-date').datepicker("setDate", v_params_today);
        if(sessionParams.TENANT_ID[0].TENANT_ID != ''){
            getTenant('', sessionParams.USERID);
        }else{
            getTenant('', '');
        }
        drawTableSumInterval(v_params_today,'1','', $("#layanan_name").val());
        
        // $('#tableOperation2').dataTable();
        // callTablePerformOps(v_params_tenant, '', n);
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

function channelToName(channel_id){
    if (channel_id){
        return channels[channel_id - 1] || '';
    }
    return 'All Channel'
}

function drawTableSumInterval(tanggal,interval,channel, tenant_id){
    $("#filter-loader").fadeIn("slow");
	$('#tableReportSumInterval').DataTable({
        ajax: {
            url : base_url + 'api/Reporting/ReportController/ReportingSInterval',
            type : 'POST',
            data :{
                tanggal: tanggal,
                interval: interval,
                channel: channel,
                tenant_id: tenant_id
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

(function($) {
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

        exportTableSumInterval(dateFromFilter, '1', channelFromFilter, sessionParams.NAME);
    });

    $('#btn-go').click(function(){
        dateFromFilter = $('#input-date').val();
        intervalFromFilter = $('#interval').val();
        channelFromFilter = $('#channel_name').val();
        drawTableSumInterval($('#input-date').val(), '1', $('#channel_name').val(), $('#layanan_name').val());
    });

    
})(jQuery);
