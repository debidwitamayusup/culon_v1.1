var base_url = $('#base_url').val();
const sessionParams = JSON.parse(localStorage.getItem('Auth-infomedia'));
$(document).ready(function(){
    if(sessionParams){
        callTableUser();
    }else{
        window.location = base_url
    }
});

function callTableUser(){
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

(function(){
    $('#tableAdmin_user').dataTable();
})(jQuery);