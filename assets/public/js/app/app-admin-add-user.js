var base_url = $('#base_url').val();
const sessionParams = JSON.parse(localStorage.getItem('Auth-token'));
const sessionEdit = JSON.parse(sessionStorage.getItem('editUser'));
$(document).ready(function(){
    if(sessionParams){
        $('#tenantUser').prop('disabled', true);
        $( "#nameDiv" ).removeClass( "error" );
        $('#errorName').hide();
        $( "#idDiv" ).removeClass( "error" );
        $('#errorID').hide();
        $( "#telpDiv" ).removeClass( "error" );
        $('#errorTelp').hide();
        $( "#emailDiv" ).removeClass( "error" );
        $('#errorEmail').hide();
        $("#btn-add").attr('disabled', true);
    }else{
        window.location = base_url
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
                for(i=1; i<response.data.length; i++){
                    html += '<option value='+response.data[i].TENANT_ID+'>'+response.data[i].TENANT_NAME+'</option>';
                }
                $('#tenantUser').html(html);
        },
        error: function (r) {
            //console.log(r);
            alert("error");
        },
    });
}

function callAddUser(token, username, email, phone, name, previlage, tenant_id){
    $.ajax({
        type: 'POST',
        beforeSend: function (xhr) {
            xhr.setRequestHeader("token", token);
        },
        url: base_url + 'api/Auth/AuthController/addusr',
        data: {
            username: username,
            email: email,
            phone: phone,
            name: name,
            previlage: previlage
        },
        success: function (r) {
            var response = r;
            if(response.status == true){
                // alert("change profile succed");
                // window.location = base_url+'main/v_home';
                // alert(response.message);
                callAssignTenant(token, username, tenant_id);
            }else{
                alert(response.message);
            }
        },
        error: function (r) {
            // $('#error-password').show();
            // $( "#passwordDiv" ).addClass( "error" );
            // $('#btn-cancel').attr('disabled', false);
            // $('#password').attr('disabled', false);
            // $("#btn-confirm-password").html('Submit')
            alert(r.message);
        },
    });
}

function callAssignTenant(token, username, tenant_id){
    $.ajax({
        type: 'POST',
        beforeSend: function (xhr) {
            xhr.setRequestHeader("token", token);
        },
        url: base_url + 'api/Auth/AuthController/settenanttouser',
        data: {
            username: username,
            tenant_id: tenant_id
        },
        success: function (r) {
            var response = r;
            if(response.status == true){
                // alert("change profile succed");
                var answer = alert ("Add User Success")
                    if (answer){
                        window.location = base_url+'admin/admin_user';
                    } else{
                        window.location = base_url+'admin/admin_user';
                    }
                // alert(response.message);
            }else{
                alert(response.message);
            }
        },
        error: function (r) {
            // $('#error-password').show();
            // $( "#passwordDiv" ).addClass( "error" );
            // $('#btn-cancel').attr('disabled', false);
            // $('#password').attr('disabled', false);
            // $("#btn-confirm-password").html('Submit')
            alert(r.responseJSON.message);
        },
    });
}

(function ($) {

    $('#levelUser').change(function(){
        if($(this).val() == 'supervisor'){
            $('#tenantUser').prop('disabled', false);
            getTenant('','');
        }else{
            $('#tenantUser option[value=""]').attr('selected', 'selected');
            $('#tenantUser').html('<option value="">All Tenant</option>');
            $('#tenantUser').prop('disabled', true);
        }
    });

    var inputID = document.getElementById("idUser");
    inputID.addEventListener("keyup", function(event) {
        event.preventDefault();
        if($('#idUser').val() == "" ||  $('#idUser').val().length > 20){
            $('#errorID').show();
            $( "#idDiv" ).addClass( "error" );
            $("#btn-add").attr('disabled', true);           
        }else{
            $('#errorID').hide();
            $( "#idDiv" ).removeClass( "error" );
            $("#btn-add").attr('disabled', false);
        }
    });

    var inputName = document.getElementById("nameUser");
    inputName.addEventListener("keyup", function(event) {
        event.preventDefault();
        if($('#nameUser').val() == "" ||  $('#nameUser').val().length > 20){
            $('#errorName').show();
            $( "#nameDiv" ).addClass( "error" );
            $("#btn-add").attr('disabled', true);           
        }else{
            $('#errorName').hide();
            $( "#nameDiv" ).removeClass( "error" );
            $("#btn-add").attr('disabled', false);
        }
    });

    var inputEmail = document.getElementById("Email");
    inputEmail.addEventListener("keyup", function(event) {
      var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
        event.preventDefault();
        if(!emailReg.test($('#Email').val()) || $.trim($('#Email').val()).length == 0){
            $('#errorEmail').show();
            $( "#emailDiv" ).addClass( "error" );
            $("#btn-add").attr('disabled', true);
        }else{
            $('#errorEmail').hide();
            $( "#emailDiv" ).removeClass( "error" );
            $("#btn-add").attr('disabled', false);
        }
    });

    var inputPhone = document.getElementById("noTelp");
    inputPhone.addEventListener("keyup", function(event) {
        event.preventDefault();
        if($.isNumeric($('#noTelp').val()) == false ||  $('#noTelp').val().length > 13){
            $('#errorTelp').show();
            $( "#telpDiv" ).addClass( "error" );
            $("#btn-add").attr('disabled', true);           
        }else{
            $('#errorTelp').hide();
            $( "#telpDiv" ).removeClass( "error" );
            $("#btn-add").attr('disabled', false);
        }
    });
    
    $('#btn-add').click(function(){
        callAddUser(sessionParams, $('#idUser').val(), $('#Email').val(), $('#noTelp').val(), $('#nameUser').val(), $('#levelUser').val(), $('#tenantUser').val());
    });

    $('#btn-cancel').click(function(){
        window.location = base_url+'admin/admin_user';
    });
})(jQuery);