var base_url = $('#base_url').val();
const sessionParams = JSON.parse(localStorage.getItem('Auth-token'));
$(document).ready(function(){
    if(sessionParams){
        callTableUser(sessionParams);
    }else{
        window.location = base_url
    }
});

function callTableUser(token){
    $("#filter-loader").fadeIn("slow");
	var thisTable = $('#tableAdmin_user').DataTable({
        ajax: {
            beforeSend: function (xhr) {
                xhr.setRequestHeader("token", token);
            },
            url : base_url + 'api/Auth/AuthController/usrlst',
            type : 'POST',
        },
        columnDefs: [
			{ className: "text-center", targets: 0 },
			{ className: "text-center", targets: 1 },
			{ className: "text-left", targets: 2 },
			{ className: "text-center", targets: 3 },
            { className: "text-center", targets: 4 },
            { className: "text-center", targets: 5 },
            {
                className: "text-center",
                targets: -1,
                defaultContent: ['<a href="'+base_url+'admin/edit_user" class="btn btn-sm btn-grey-1 style-btn mr-2 editButton">Edit User</a><a class="btn btn-sm btn-blue style-btn">Reset Password</a>']
                // defaultContent: ['<a href="#" class="btn btn-sm btn-grey-1 style-btn mr-2 editButton">Edit User</a><a class="btn btn-sm btn-blue style-btn">Reset Password</a>']
                
            }
			
		], 
        destroy: true,
        fnInfoCallback: function( oSettings, iStart, iEnd, iMax, iTotal, sPre ) {
            return "Showing "+addCommas(iStart) +" to "+ addCommas(iEnd) +" from " + addCommas(iTotal)+" entries";
        },
    });
    $('body').on('click', '#tableAdmin_user tbody tr .editButton', function () {
        var rowData = thisTable.row( $(this).parents('tr')).data();
        // console.log("Rows data : ",  rowData);
        sessionStorage.setItem('editUser',JSON.stringify(rowData));
});
    $("#filter-loader").fadeOut("slow");
}

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

// (function(){
//     $('#tableAdmin_user').dataTable();
// })(jQuery);