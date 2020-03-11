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
    
    $('#error-phone').hide();
    $('#error-email').hide();
    $('#error-password').hide();
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
                alert(response.message);
            }
        },
        error: function (r) {
            $('#error-current-password').show();
            $( "#currentPwdDiv" ).addClass( "error" );
            $("#btn-confirm-password").html('Submit')
            // alert(r.responseJSON.message);
        },
    });
}

(function ($) {
    var inputCurrentPwd = document.getElementById("current-password");
    inputCurrentPwd.addEventListener("keyup", function(event) {
        event.preventDefault();
        if($.isNumeric($('#phone_number').val()) == false ||  $('#phone_number').val().length > 13){
            $('#error-phone').show();
            $( "#phoneDiv" ).addClass( "error" );
            $("#btn-submit").attr('disabled', true);           
        }else{
            $('#error-phone').hide();
            $( "#phoneDiv" ).removeClass( "error" );
            $("#btn-submit").attr('disabled', false);
        }
    });

    var inputEmail = document.getElementById("current-password");
    inputEmail.addEventListener("keyup", function(event) {
      var pwdReg = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).{8,16}$/;
        event.preventDefault();
        if(!pwdReg.test($('#current-password').val()) || $.trim($('#email').val()).length == 0){
            $('#error-email').show();
            $( "#emailDiv" ).addClass( "error" );
            $("#btn-submit").attr('disabled', true);
        }else{
            $('#error-email').hide();
            $( "#emailDiv" ).removeClass( "error" );
            $("#btn-submit").attr('disabled', false);
        }
    });


    var inputPassword = document.getElementById("password");
    inputPassword.addEventListener("keyup", function(event) {
        event.preventDefault();
            $('#error-phone').hide();
            $( "#phoneDiv" ).removeClass( "error" );
            $("#btn-confirm-password").attr('disabled', false);
    });

    $('#btn-submit').click(function(){
        $('#modalConfirmPassword').modal({
    		backdrop: 'static',
    		keyboard: false
		});
    });

    $('#btn-confirm-password').click(function(){
        $(this).attr('disabled', true);
        $(this).html('Processing...')
        $('#password').attr('disabled', true);
        $('#btn-cancel').attr('disabled', true);
        callChangeProfile(tokenSession, $('#username').val(), $('#phone_number').val(), $('#email').val(), $('#password').val());
    });
   
    $('#btn-cancel').click(function(){
        window.location = base_url+'main/v_home';
    });
})(jQuery);