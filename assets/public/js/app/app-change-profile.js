var base_url = $('#base_url').val();
const sessionParams = JSON.parse(localStorage.getItem('Auth-infomedia'));
const tokenSession = JSON.parse(localStorage.getItem('Auth-Token'));

$(document).ready(function () {
    if(sessionParams){
        $("#filter-loader").fadeIn("slow");
        
        getDataProf(tokenSession);
        $("#filter-loader").fadeOut("slow");
    }else{
        window.location = base_url
    }
});

function getDataProf(token){
    $.ajax({
        type: 'POST',
        beforeSend: function (xhr) {
            xhr.setRequestHeader("token", token);
        },
        url: base_url + 'api/Auth/AuthController/getdataupdate',
        success: function (r) {
            var response = r;
            $('#username').prop("disabled", true);
            $('#username').val(response.data.ID);
            $('#phone_number').val(response.data.PHONE);
            $('#email').val(response.data.EMAIL);
        },
        error: function (r) {
            alert("error");
        },
    });
}

function callChangeProfile(username, phone_number, email){
    $.ajax({
        type: 'POST',
        beforeSend: function (xhr) {
            xhr.setRequestHeader("token", token);
        },
        url: base_url + 'api/Auth/AuthController/getdataupdate',
        data: {
            username: username,
            phone: phone_number,
            email: email
        },
        success: function (r) {
            var response = r;

        },
        error: function (r) {
            alert("error");
        },
    });
}

(function ($) {
    $('#btn-submit').click(function(){
        var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;

        if($('#phone_number').val() == "" || $.trim($('#email').val()).length == 0){
            alert("please fill all fields");
        }
        else if($.isNumeric($('#phone_number').val()) == false ||  $('#phone_number').val().length > 13){
            alert("phone number must numbers and has 13 max length");
        }else if(!emailReg.test($('#email').val())){
            alert("format email not valid")
        }else{
            $('#modalConfirmPassword').modal('show')
        }
    });

    $('#btn-confirm-password').click(function(){
        $('#password').val();
        callChangeProfile($('#username').val(), $('#phone_number').val(), $('#email').val());
    });
   
    $('#btn-cancel').click(function(){
        window.location = base_url+'main/v_home';
    });
})(jQuery);