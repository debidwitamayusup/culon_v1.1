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
    $('#tableAgent').dataTable();
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
        // channelFromFilter = $('#channel_name').val();
        // monthFromFilter = $('#month_name').val();
        
        callTableSummaryTraffic($('#layanan_name').val(), $('#start-date').val(), $('#end-date').val());
    });

    // $('#tableSummaryTraffic').dataTable();    
})(jQuery);