var base_url = $('#base_url').val();
var v_params_tenant = 'oct_telkomcare';
var d = new Date();
var o = d.getDate();
var n = d.getMonth()+1;
var m = d.getFullYear();
if (o < 10) {
  o = '0' + o;
} 
if (n < 10) {
  n = '0' + n;
}

//get today
var v_params_today= m + '-' + n + '-' + (o);
const sessionParams = JSON.parse(sessionStorage.getItem('Auth-infomedia'));

$(document).ready(function () {
    getTenant('')
    drawTablePerformOps(v_params_tenant,'','');
    // $('#tableOperation2').dataTable();
    // callTablePerformOps(v_params_tenant, '', n);
});

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

function drawTablePerformOps(tenant_id, channel_id, month){
	$('#tableOperation2').DataTable({
        // processing : true,
        // serverSide : true,
        ajax: {
            url : base_url + 'api/Reporting/ReportController/ReportingSPO',
            type : 'POST',
            data :{
                tenant_id: tenant_id,
                channel_id: channel_id,
                month: month
            }
        },
        columnDefs: [
			{ className: "text-center", targets: 0 },
			{ className: "text-center", targets: 1 },
			{ className: "text-right", targets: 2 },
			{ className: "text-center", targets: 3 },
			{ className: "text-center", targets: 4 },
			{ className: "text-center", targets: 5 },
			{ className: "text-right", targets: 6 }
		], 
        destroy: true
    });
}

function exportTablePerformOps(tenant_id, channel_id, month, name){
    window.location = base_url + 'api/Reporting/ReportController/EXPORTSPO?tenant_id='+tenant_id+'&channel_id='+channel_id+'&month='+month+'&name='+name
}

//jquery
(function ($) {
    $('#btn-export').click(function(){
        exportTablePerformOps(v_params_tenant, '2', n, sessionParams.NAME);
    });

    $('#btn-go').click(function(){
        drawTablePerformOps($('#layanan_name').val(), $('#channel_name').val(), $('#month_name').val());
    });
})(jQuery);
