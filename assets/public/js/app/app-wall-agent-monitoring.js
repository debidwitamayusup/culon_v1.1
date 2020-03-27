var base_url = $('#base_url').val();
const sessionParams = JSON.parse(localStorage.getItem('Auth-infomedia'));
const tokenSession = JSON.parse(localStorage.getItem('Auth-token'));

$(document).ready(function () {
    if(sessionParams){
        $("#filter-loader").fadeIn("slow");
        if(sessionParams.TENANT_ID[0].TENANT_ID != ''){
            getTenant(tokenSession, '', sessionParams.USERID);
        }else{
            getTenant(tokenSession, '', '');
        }
        drawTableAgentMonitoring(tokenSession, $("#layanan_name").val());
        // $('#tableOperation2').dataTable();
        // callTablePerformOps(v_params_tenant, '', n);
        $("#filter-loader").fadeOut("slow");
    }else{
        window.location = base_url;
    }
});

function getTenant(token, date, userid){
    $.ajax({
        beforeSend: function (xhr) {
            xhr.setRequestHeader("token", token);
        },
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
            // console.log(r);
            var notif = alert('Your Account Credential is Invalid. Maybe someone else has logon to your account.')
            if(notif){
                localStorage.clear();
                window.location = base_url+'main/login';
            }else{
                localStorage.clear();
                window.location = base_url+'main/login';
            }
        },
    });
}

function drawTableAgentMonitoring(token, tenant_id){
    // setTimeout(function(){drawTableAgentMonitoring(token, tenant_id);},5000);
    $.fn.dataTable.ext.errMode = 'none';
	$('#tableWallAgent').on( 'error.dt', function ( e, settings, techNote, message ) {
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
            url : base_url + 'api/Wallboard/WallboardController/agentMonitoring',
            type : 'POST',
            data :{
                tenant_id: tenant_id
            }
        },
        columnDefs: [
			{ className: "text-center", targets: 0 },
			{ className: "text-center", targets: 1 },
            { className: "text-left", targets: 2 },
            { className: "text-left", target: 3},
			{ className: "text-left", targets: 4 },
			{ className: "text-right", targets: 5 },
			{ className: "text-right", targets: 6 },
			{ className: "text-center", targets: 7 },
			{ className: "text-center", targets: 8 }
		], 
        destroy: true,
        lengthMenu: [[50, 100, -1], [50, 100, "All"]]
        // deferLoading: false
    });
    // $('#tableWallAgent').on("preXhr.dt", function (e, settings, data) {
    //     $(this).DataTable().clear();
    //     settings.iDraw = 0;
    //     $(this).DataTable().draw();
    // });
    
}

(function($){
    $("select#layanan_name").change(function(){
        // destroyChartInterval();
         // destroyChartInterval();
        var selectedTenant = $(this).children("option:selected").val();
        // callTableCOFByChannel(v_params_yesterday, selectedTenant);
        drawTableAgentMonitoring(tokenSession, selectedTenant);
    });
})(jQuery);