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
    callTableSummaryTraffic('',v_params_today,v_params_today);
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

function callTableSummaryTraffic(tenant_id,start_date,end_date){
    $("#filter-loader").fadeIn("slow");
	$.ajax({
		url : base_url + 'api/Reporting/ReportController/ReportingSTraffic',
        type : 'POST',
        data :{
            tenant_id: tenant_id,
            start_date: start_date,
            end_date: end_date
        },
        success: function (r) {
            var response = r;
            console.log(response);
            drawTableSumTraffic(response);
            // $("#filter-loader").fadeOut("slow");
        },
        error: function (r) {
            // console.log(r);
            alert("error");
            // $("#filter-loader").fadeOut("slow");
        },
	});
}

function drawTableSumTraffic(response){
    $("#mytbody").empty();
    
    

	if (response.data.length != 0) {
		for (var i = 0; i < response.data.length; i++) {
            var tdCOFSCR = "";
            for (var j = 0; j < response.data[i].DATA.length; j++){
                tdCOFSCR += '<td class="text-right">'+response.data[i].DATA[j].COF+'</td>'+
                            '<td class="text-center">'+response.data[i].DATA[j].SCR+'</td>'
            }
            console.log(tdCOFSCR);
			$('#tableSummaryTraffic').find('tbody').append('<tr>'+
                '<td class="text-center">'+(i+1)+'</td>'+
                '<td class="text-center">'+response.data[i].TANGGAL+'</td>'+
                tdCOFSCR
            +'</tr>');
            $("#filter-loader").fadeOut("slow");
		}
	} else {
        $('#tableSummaryTraffic').find('tbody').append('<tr>'+
           '<td class="text-center" colspan=28> No Data Available </td>'+
        '</tr>');
        $("#filter-loader").fadeOut("slow");
	}
}

function exportTableSumTraffic(start_date, end_date, tenant_id, name){
    $("#filter-loader").fadeIn("slow");
    // window.location = base_url + 'api/Reporting/ReportController/EXPORTSC?tenant_id='+tenant_id+'&start_time='+start_time+'&end_time='+end_time+'&name='+name;
    $.ajax({
        type: 'POST',
        url: base_url + 'api/Reporting/ReportController/EXPORTTRF',
        data: {
            start_date: start_date,
            end_date: end_date,
            tenant_id: tenant_id,
            name: name
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

    $('#btn-export').click(function(){
        // exportTablePerformOps(v_params_tenant, '2', n, sessionParams.NAME);
        exportTableSumTraffic(startDateFromFilter, endDateFromFilter, tenantFromFilter, sessionParams.NAME);
    });

    $('#btn-go').click(function(){
        tenantFromFilter = $('#layanan_name').val();
        startDateFromFilter = $('#start-date').val();
        endDateFromFilter = $("#end-date").val();
        
        callTableSummaryTraffic($('#layanan_name').val(), $('#start-date').val(), $('#end-date').val());
    });

    // $('#tableSummaryTraffic').dataTable();    
})(jQuery);

// $(function($){
//     $('#tableSummaryTraffic').dataTable();
// })