var base_url = $('#base_url').val();
const sessionParams = JSON.parse(localStorage.getItem('Auth-token'));
const userParams = JSON.parse(localStorage.getItem('Auth-infomedia'));
$(document).ready(function(){
    if(sessionParams){
        if(userParams.PREVILAGE != "admin"){
            window.location = base_url
        }else{
            callTableUser(sessionParams);
        }
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
			{ className: "text-left", targets: 1 },
			{ className: "text-left", targets: 2 },
			{ className: "text-left", targets: 3 },
            { className: "text-center", targets: 4 },
            { className: "text-left", targets: 5 },
            {
                className: "text-center",
                targets: -1,
                defaultContent: ['<a href="'+base_url+'admin/edit_user" class="btn btn-sm btn-grey-1 style-btn mr-2 editButton">Edit User</a><a class="btn btn-sm btn-blue style-btn resetButton">Reset Password</a>']
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

    $('body').on('click', '#tableAdmin_user tbody tr .resetButton', function () {
        var rowData = thisTable.row( $(this).parents('tr')).data();
        callResetPassword(sessionParams,rowData[1])
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

function callResetPassword(token,username){
    $.ajax({
        type: 'POST',
        beforeSend: function (xhr) {
            xhr.setRequestHeader("token", token);
        },
        url: base_url + 'api/Auth/AuthController/changeusrpwd',
        data: {
            username: username,
        },
        success: function (r) {
            var response = r;

            if(response.status == true){
                var answer = alert ("Reset "+username+" Password Success")
                // if (answer){
                //     window.location = base_url+'admin/admin_user';
                // } else{
                //     window.location = base_url+'admin/admin_user';
                // }
                // window.location = base_url+'main/v_home';
            }else{
                alert(response.message);
            }
        },
        error: function (r) {
            alert(r.message);
        },
    });
}