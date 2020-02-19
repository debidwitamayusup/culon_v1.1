var base_url = $('#base_url').val();
var v_params_tenant = 'oct_telkomcare';
var d = new Date();
var o = d.getDate();
var n = d.getMonth()+1;
var m = d.getFullYear();
var tenantFromFilter = '';
var channelFromFilter = '';
var monthFromFilter = '';
var tenants = [];
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

var channels = [
    'Voice', 'Email', 'Live Chat', 'SMS', 'Telegram', 'Facebook',
    'Messenger', 'Twitter', '', 'Line', 'Instagram', 'Whatsapp', 'Twitter DM', '',
    'Chat Bot'
];

//get today
var v_params_today= m + '-' + n + '-' + (o);
const sessionParams = JSON.parse(sessionStorage.getItem('Auth-infomedia'));

$(document).ready(function () {
    getTenant('')
    drawTablePerformOps('','','');
    // $('#tableOperation2').dataTable();
    // callTablePerformOps(v_params_tenant, '', n);
});

function monthNumToName(month) {
    if(month){
        return months[month - 1] || '';
    }
    return 'All Month';
}

function channelToName(channel_id){
    if (channel_id){
        return channels[channel_id - 1] || '';
    }
    return 'All Channel'
}

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
            // tenants = response.data;
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
    $("#filter-loader").fadeIn("slow");
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
    $("#filter-loader").fadeOut("slow");
}

function exportTablePerformOps(tenant_id, channel_id, month, name){
    // window.location = base_url + 'api/Reporting/ReportController/EXPORTSPO?tenant_id='+tenant_id+'&channel_id='+channel_id+'&month='+month+'&name='+name+'&month_name='+monthNumToName(month)+'&channel_name='+channelToName(channel_id)
    $("#filter-loader").fadeIn("slow");
    $.ajax({
        type: 'POST',
        url: base_url + 'api/Reporting/ReportController/EXPORTSPO',
        data: {
            tenant_id: tenant_id,
            channel_id: channel_id,
            month: month,
            name: name,
            channel_name: channelToName(channel_id),
            month_name: monthNumToName(month)
        },

        success: function (r) {
            //dont parse response if using rest controller
            // var response = JSON.parse(r);
            var response = r;
            if (response.status != false){
                window.location = response.Link
            }else{
                alert("Can't Export Empty Table!");
            }
            $("#filter-loader").fadeOut("slow");
        },
        error: function (r) {
            //console.log(r);
            alert("error");
            $("#filter-loader").fadeOut("slow");
        },
    });
}

//jquery
(function ($) {
    $('#btn-export').click(function(){
        // exportTablePerformOps(v_params_tenant, '2', n, sessionParams.NAME);
        exportTablePerformOps(tenantFromFilter, channelFromFilter, monthFromFilter, sessionParams.NAME);
    });

    $('#btn-go ').click(function(){
        tenantFromFilter = $('#layanan_name').val();
        channelFromFilter = $('#channel_name').val();
        monthFromFilter = $('#month_name').val();
        
        drawTablePerformOps($('#layanan_name').val(), $('#channel_name').val(), $('#month_name').val());
    });

    $('#tableOperationPerform1').dataTable();

    $('#tableOperationPerform2').dataTable();

    
})(jQuery);