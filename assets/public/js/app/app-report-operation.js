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
const sessionParams = JSON.parse(sessionStorage.getItem('Auth-infomedia'));


//get today
var v_params_today= m + '-' + n + '-' + (o);

$(document).ready(function () {
    // console.log(sessionParams);
    // console.log(sessionParams.NAME);
    $('#tableOperation2').dataTable();
    // callTablePerformOps(v_params_tenant, '', n);
});

function callTablePerformOps(tenant_id, channel_id, month, name){
    window.location = base_url + 'api/Reporting/ReportController/EXPORTSPO?tenant_id='+tenant_id+'&channel_id='+channel_id+'&month='+month+'&name='+name
}

//jquery
(function ($) {
    $('#btn-export').click(function(){
        callTablePerformOps(v_params_tenant, '2', n, sessionParams.NAME);
    });
})(jQuery);