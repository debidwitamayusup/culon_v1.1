var base_url = $('#base_url').val();
const sessionParams = JSON.parse(localStorage.getItem('Auth-infomedia'));
const tokenSession = JSON.parse(localStorage.getItem('Auth-token'));

$(document).ready(function () {
    if(sessionParams){
        $("#filter-loader").fadeIn("slow");
        
        $("#filter-loader").fadeOut("slow");
    }else{
        window.location = base_url
    }
    
    $('#error-current-password').hide();
    $('#error-new-password').hide();
    $('#error-confirm-password').hide();
    $( "#currentPwdDiv" ).removeClass( "error" );
    $( "#newPwdDiv" ).removeClass( "error" );
    $( "#confirmPwdDiv" ).removeClass( "error" );
});

function callChangePwd(password, new_password, token){
    $.ajax({
        type: 'POST',
        beforeSend: function (xhr) {
            xhr.setRequestHeader("token", token);
        },
        url: base_url + 'api/Auth/AuthController/updatepwd',
        data: {
            password: password,
            new_password: new_password
        },
        success: function (r) {
            var response = r;
            if(response.status == true){
                window.location = base_url+'main/v_home';
            }else{
                // alert(response.message);
                $('#error-current-password').show();
                $( "#currentPwdDiv" ).addClass( "error" );
                $("#btn-submit").html('Submit')
                $('#current-password').attr('disabled', false);
                $('#new-password').attr('disabled', false);
                $('#confirm-password').attr('disabled', false);
                $('#current-password').val('');
                $('#new-password').val('');
                $('#confirm-password').val('');
                $('#btn-cancel').attr('disabled', false);
                $('#btn-submit').attr('disabled', false);
            }
        },
        error: function (r) {
            $('#error-current-password').show();
            $( "#currentPwdDiv" ).addClass( "error" );
            $("#btn-confirm-password").html('Submit')
            $('#current-password').attr('disabled', false);
            $('#new-password').attr('disabled', false);
            $('#confirm-password').attr('disabled', false);
            $('#btn-cancel').attr('disabled', false);
            $('#btn-submit').attr('disabled', false);
            // alert(r.responseJSON.message);
        },
    });
}

(function ($) {
    var inputCurrentPwd = document.getElementById("current-password");
    inputCurrentPwd.addEventListener("keyup", function(event) {
        event.preventDefault();
        $('#error-current-password').hide();
        $( "#currentPwdDiv" ).removeClass( "error" );
        // if($.isNumeric($('#phone_number').val()) == false ||  $('#phone_number').val().length > 13){
        //     $('#error-phone').show();
        //     $( "#phoneDiv" ).addClass( "error" );
        //     $("#btn-submit").attr('disabled', true);           
        // }else{
        //     $('#error-phone').hide();
        //     $( "#phoneDiv" ).removeClass( "error" );
        //     $("#btn-submit").attr('disabled', false);
        // }
    });

    var inputNewPwd = document.getElementById("new-password");
    inputNewPwd.addEventListener("keyup", function(event) {
      var pwdReg = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}$/
        event.preventDefault();
        if(!pwdReg.test($('#new-password').val()) || $.trim($('#new-password').val()).length == 0){
            $("#btn-submit").attr('disabled', true);
            $('#error-new-password').show();
            $( "#newPwdDiv" ).addClass( "error" );
            $('#btn-submit').attr('disabled', true);
        }else{
            $("#btn-submit").attr('disabled', false);
            $('#error-new-password').hide();
            $( "#newPwdDiv" ).removeClass( "error" );
            $('#btn-submit').attr('disabled', false);
        }
    });

    var inputconfirmPwd = document.getElementById("confirm-password");
    inputconfirmPwd.addEventListener("keyup", function(event) {
        event.preventDefault();
        if($('#new-password').val() != $('#confirm-password').val() || $.trim($('#new-password').val()).length == 0){
            $("#btn-submit").attr('disabled', true);
            $('#error-confirm-password').show();
            $( "#confirmPwdDiv" ).addClass( "error" );
            $('#btn-submit').attr('disabled', true);
        }else{
            $("#btn-submit").attr('disabled', false);
            $('#error-confirm-password').hide();
            $( "#confirmPwdDiv" ).removeClass( "error" );
            $('#btn-submit').attr('disabled', false);
        }
    });


    $('#btn-submit').click(function(){
        $(this).attr('disabled', true);
        $(this).html('Processing...')
        $('#current-password').attr('disabled', true);
        $('#new-password').attr('disabled', true);
        $('#confirm-password').attr('disabled', true);
        $('#btn-cancel').attr('disabled', true);
        callChangePwd($('#current-password').val(), $('#new-password').val(), tokenSession);
    });
   
    $('#btn-cancel').click(function(){
        window.location = base_url+'main/v_home';
    });
})(jQuery);