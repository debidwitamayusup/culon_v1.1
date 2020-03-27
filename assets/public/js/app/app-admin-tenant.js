var base_url = $('#base_url').val();
const sessionParams = JSON.parse(localStorage.getItem('Auth-token'));
const userParams = JSON.parse(localStorage.getItem('Auth-infomedia'));
$(document).ready(function(){
    if(sessionParams){
        if(userParams.PREVILAGE != "admin"){
            window.location = base_url
        }else{
            callTableTenant(sessionParams);
        }
    }else{
        window.location = base_url
    }
});

function callTableTenant(token){
    $("#filter-loader").fadeIn("slow");
	var thisTable = $('#tableListTenant').DataTable({
        ajax: {
            beforeSend: function (xhr) {
                xhr.setRequestHeader("token", token);
            },
            url : base_url + 'api/Superadmin/SuperadminController/tntlst',
            type : 'POST',
        },
        columnDefs: [
			{ className: "text-center", targets: 0 },
			{ className: "text-left", targets: 1 },
            { className: "text-left", targets: 2 }
            // { className: "text-left", targets: 3 }
			
		], 
        destroy: true
    });
    $("#filter-loader").fadeOut("slow");
}


// (function(){
//     $('#tableListTenant').dataTable();
// })(jQuery);