var base_url = $('#base_url').val();
const sessionParams = JSON.parse(localStorage.getItem('Auth-infomedia'));

$(document).ready(function () {
    if(sessionParams){
        getTenant('')
        if(sessionParams.TENANT_ID[0].TENANT_ID != ''){
            getTenant('', sessionParams.USERID);
        }else{
            getTenant('', '');
        }
        drawTableAgentMonitoring($("#layanan_name").val());
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

function drawTableAgentMonitoring(tenant_id){
    $("#filter-loader").fadeIn("slow");
	$('#tableWallAgent').DataTable({
        ajax: {
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
			{ className: "text-center", targets: 3 },
			{ className: "text-right", targets: 4 },
			{ className: "text-right", targets: 5 },
			{ className: "text-center", targets: 6 },
			{ className: "text-center", targets: 7 }
		], 
        destroy: true
    });
    $("#filter-loader").fadeOut("slow");
}

(function($){
    $("select#layanan_name").change(function(){
        // destroyChartInterval();
         // destroyChartInterval();
        var selectedTenant = $(this).children("option:selected").val();
        // callTableCOFByChannel(v_params_yesterday, selectedTenant);
        drawTableAgentMonitoring(selectedTenant);
    });
})(jQuery);