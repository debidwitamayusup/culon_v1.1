var base_url = $('#base_url').val();
const sessionParams = JSON.parse(localStorage.getItem('Auth-infomedia'));
const tokenSession = JSON.parse(localStorage.getItem('Auth-token'));

$(document).ready(function () {
    if(sessionParams){
        $("#filter-loader").fadeIn("slow");
        
        getDataProf(tokenSession);
        $("#filter-loader").fadeOut("slow");
    }else{
        window.location = base_url
    }
    $('#username').prop("readonly", true);
    $('#phone_number').prop("disabled", true);
    $('#email').prop("disabled", true);
    $('#error-phone').hide();
    $('#error-email').hide();
    $('#error-password').hide();
    $( "#emailDiv" ).removeClass( "error" );
    $( "#phoneDiv" ).removeClass( "error" );
    $( "#passwordDiv" ).removeClass( "error" );
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
            $('#username').prop("readonly", true);
            $('#username').val(response.data.ID);
            $('#phone_number').prop("disabled", false);
            $('#email').prop("disabled", false);
            $('#phone_number').val(response.data.PHONE);
            $('#email').val(response.data.EMAIL);
        },
        error: function (r) {
            alert("error");
        },
    });
}

function callChangeProfile(token,username, phone_number, email, password){
    $.ajax({
        type: 'POST',
        beforeSend: function (xhr) {
            xhr.setRequestHeader("token", token);
        },
        url: base_url + 'api/Auth/AuthController/updateprof',
        data: {
            username: username,
            phone: phone_number,
            email: email,
            password: password
        },
        success: function (r) {
            var response = r;
            if(response.status == true){
                // alert("change profile succed");
                window.location = base_url+'main/v_home';
            }else{
                alert(response.message);
            }
        },
        error: function (r) {
            $('#error-password').show();
            $( "#passwordDiv" ).addClass( "error" );
            $('#btn-cancel').attr('disabled', false);
            $('#password').attr('disabled', false);
            $("#btn-confirm-password").html('Submit')
            // alert(r.responseJSON.message);
        },
    });
}

(function ($) {
    var inputEmail = document.getElementById("email");
    inputEmail.addEventListener("keyup", function(event) {
      var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
        event.preventDefault();
        if(!emailReg.test($('#email').val()) || $.trim($('#email').val()).length == 0){
            $('#error-email').show();
            $( "#emailDiv" ).addClass( "error" );
            $("#btn-submit").attr('disabled', true);
        }else{
            $('#error-email').hide();
            $( "#emailDiv" ).removeClass( "error" );
            $("#btn-submit").attr('disabled', false);
        }
    });

    var inputPhone = document.getElementById("phone_number");
    inputPhone.addEventListener("keyup", function(event) {
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

    // $('#btn-confirm-password').click(function(){
    //     $(this).attr('disabled', true);
    //     $(this).html('Processing...')
    //     $('#password').attr('disabled', true);
    //     $('#btn-cancel').attr('disabled', true);
    //     var image_users =  new FormData($('#form')[0])
    //     // console.log(user_image)
    //     // callChangeProfile(tokenSession, $('#username').val(), $('#phone_number').val(), $('#email').val(), image_user, $('#password').val());
    // });

    $("#btn-confirm-password").on('click',(function(e) {
        $(this).attr('disabled', true);
        $(this).html('Processing...')
        $('#password').attr('readonly', true);
        $('#btn-cancel').attr('disabled', true);
        var formData = new FormData($('#form')[0])
        e.preventDefault();
        $.ajax({
            beforeSend: function (xhr) {
                xhr.setRequestHeader("token", tokenSession);
            },
            url: base_url + 'api/Auth/AuthController/updateprof',
            type: "POST",
            data:  formData,
            contentType: false,
            cache: false,
            processData:false,
            success: function(r)
                {
                    var response = r;
                    if(response.status == true){
                        // alert("change profile succed");
                        window.location = base_url+'main/v_home';
                    }else{
                        alert(response.message);
                    }
                },
            error: function (r) {
                $('#error-password').show();
                $( "#passwordDiv" ).addClass( "error" );
                $('#btn-cancel').attr('disabled', false);
                $('#password').attr('disabled', false);
                $("#btn-confirm-password").html('Submit')
                // alert(r.responseJSON.message);
                },       
            });
       }));
   
       // Function to preview image after validation\
    $("#uploadImage").change(function() {
    
    var file = this.files[0];
    var imagefile = file.type;
    var match= ["image/jpeg","image/png","image/jpg"];
    if(!((imagefile==match[0]) || (imagefile==match[1]) || (imagefile==match[2])))
    {
        $('#previewing').attr('src','noimage.png');
        return false;
        }
    else
    {
        var reader = new FileReader();
        reader.onload = imageIsLoaded;
        reader.readAsDataURL(this.files[0]);
    }
    });


    function imageIsLoaded(e) {
    $('#previewing').attr('src', e.target.result);
    $('#previewing').attr('width', '100px');
    $('#previewing').attr('height', '150px');
    };

    $('#uploadImageLink').click(function(){
        $('#uploadImage').click();
    });

    $('#btn-cancel').click(function(){
        window.location = base_url+'main/v_home';
    });
})(jQuery);