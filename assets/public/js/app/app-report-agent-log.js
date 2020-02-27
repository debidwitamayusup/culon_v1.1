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
const sessionParams = JSON.parse(sessionStorage.getItem('Auth-infomedia'));

$(document).ready(function(){
    getTenant('');
    $('#start-date').datepicker("setDate", v_params_today);
    $('#end-date').datepicker("setDate", v_params_today);
    startDateFromFilter = v_params_today;
    endDateFromFilter = v_params_today;
    callTableAgentLog(v_params_today, v_params_today, '');
    $('#tableAgent').dataTable();
});

function addCommas(commas)
{
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

function getTenant(date){
    $.ajax({
        type: 'POST',
        url: base_url + 'api/Wallboard/WallboardController/GetTennantFilter',
        data: {
            "date" : date
        },

        success: function (r) {
            var data_option = [];
            var response = r;
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

function callTableAgentLog(start_date, end_date, tenant_id){
    console.log('asup')
    $("#filter-loader").fadeIn("slow");
	$('#tableAgent').DataTable({
        ajax: {
            url : base_url + 'api/Reporting/ReportController/ReportingAL',
            type : 'POST',
            data :{
                tenant_id: tenant_id,
                start_date: start_date,
                end_date: end_date
            }
        },
        columnDefs: [
			{ className: "text-center", targets: 0 },
			{ className: "text-center", targets: 1 },
			{ className: "text-center", targets: 2 },
			{ className: "text-left", targets: 3 },
			{ className: "text-center", targets: 4 },
			{ className: "text-center", targets: 5 },
			{ className: "text-center", targets: 6 },
			{ className: "text-center", targets: 7 },
			{ className: "text-center", targets: 8 },
			{ className: "text-center", targets: 9 },
			{ className: "text-center", targets: 10 },
			{ className: "text-center", targets: 11 },
		], 
        destroy: true,
        fnInfoCallback: function( oSettings, iStart, iEnd, iMax, iTotal, sPre ) {
            return "Showing "+addCommas(iStart) +" to "+ addCommas(iEnd) +" from " + addCommas(iTotal)+" entries";
        },
    });
    $("#filter-loader").fadeOut("slow");
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

    // $('#btn-export').click(function(){
    //     // exportTablePerformOps(v_params_tenant, '2', n, sessionParams.NAME);
    //     exportTablePerformOps(tenantFromFilter, channelFromFilter, monthFromFilter, sessionParams.NAME);
    // });

    $('#btn-go').click(function(){
        tenantFromFilter = $('#layanan_name').val();
        startDateFromFilter = $('#start-date').val();
        endDateFromFilter = $('#end-date').val();
        
        callTableAgentLog($('#start-date').val(), $('#end-date').val(), $('#layanan_name').val());
    });

    // $('#tableSummaryTraffic').dataTable();    
})(jQuery);