var base_url = $('#base_url').val();
const sessionParams = JSON.parse(localStorage.getItem('Auth-token'));
const sessionEdit = JSON.parse(sessionStorage.getItem('editUser'));
$(document).ready(function(){
    if(sessionParams){
        $( "#nameDiv" ).removeClass( "error" );
        $('#errorName').hide();
        $( "#idDiv" ).removeClass( "error" );
        $('#errorID').hide();
        $( "#groupDiv" ).removeClass( "error" );
        $('#errorGroup').hide();
        $("#btn-add").attr('disabled', true);
    }else{
        window.location = base_url
    }
});

function callAddTenant(token, id, name, group){
    $.ajax({
        type: 'POST',
        beforeSend: function (xhr) {
            xhr.setRequestHeader("token", token);
        },
        url: base_url + 'api/Superadmin/SuperadminController/addtnt',
        data: {
            id: id,
            name: name,
            group: group
        },
        success: function (r) {
            var response = r;
            if(response.status == true){
                // alert("change profile succed");
                var answer = alert ("Add Tenant Success")
                    if (answer){
                        window.location = base_url+'admin/list_tenant';
                    } else{
                        window.location = base_url+'admin/list_tenant';
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
            alert(r.message);
        },
    });
}

(function ($) {

    var inputID = document.getElementById("idTenant");
    inputID.addEventListener("keyup", function(event) {
        event.preventDefault();
        if($('#idTenant').val() == "" ||  $('#idTenant').val().length > 20){
            $('#errorID').show();
            $( "#idDiv" ).addClass( "error" );
            $("#btn-add").attr('disabled', true);           
        }else{
            $('#errorID').hide();
            $( "#idDiv" ).removeClass( "error" );
            $("#btn-add").attr('disabled', false);
        }
    });

    var inputName = document.getElementById("nameTenant");
    inputName.addEventListener("keyup", function(event) {
        event.preventDefault();
        if($('#nameTenant').val() == "" ||  $('#nameTenant').val().length > 50){
            $('#errorName').show();
            $( "#nameDiv" ).addClass( "error" );
            $("#btn-add").attr('disabled', true);           
        }else{
            $('#errorName').hide();
            $( "#nameDiv" ).removeClass( "error" );
            $("#btn-add").attr('disabled', false);
        }
    });

    var inputGroup = document.getElementById("groupTenant");
    inputGroup.addEventListener("keyup", function(event) {
        event.preventDefault();
        if($('#groupTenant').val() == "" ||  $('#groupTenant').val().length > 50){
            $('#errorGroup').show();
            $( "#groupDiv" ).addClass( "error" );
            $("#btn-add").attr('disabled', true);           
        }else{
            $('#errorGroup').hide();
            $( "#groupDiv" ).removeClass( "error" );
            $("#btn-add").attr('disabled', false);
        }
    });

    
    $('#btn-add').click(function(){
        callAddTenant(sessionParams, $('#idTenant').val(), $('#nameTenant').val(), $('#groupTenant').val());
    });

    $('#btn-cancel').click(function(){
        window.location = base_url+'admin/list_tenant';
    });
})(jQuery);