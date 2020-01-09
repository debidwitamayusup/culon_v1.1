var base_url = $('#base_url').val();

$(document).ready(function () {

});

//jquery
(function ($) {

    // btn login
    $('#btn-login').click(function(){
        let username = $("input[name='username']").val();
        let password = $("input[name='password']").val();

        if(username == '' || password == '') return;

        $("#btn-login").attr('disabled', true);
        $("#btn-login").html('Sedang memproses...')
        $.ajax({
            type: 'post',
            url: base_url+'api/Auth/AuthController/doLogin',
            data: {
                username: username,
                password: password
            },
            success: function (r) {
                if(r.status) {
                    window.location = base_url
                    $("#btn-login").attr('disabled', false);
                    $("#btn-login").html('Sign in')
                } else {
                    alert(r.message)
                }
            },
            fail: function (r) {
                alert("error");
                $("#btn-login").attr('disabled', false);
                $("#btn-login").html('Sign in')
            },
            error: function (r) {
                alert("error");
                $("#btn-login").attr('disabled', false);
                $("#btn-login").html('Sign in')
            },
        });
    });

    // btn logout 
    $('#btn-logout').click(function(){
        $.ajax({
            type: 'post',
            url: base_url+'api/AuthController/doLogout',
            data: {
                
            },
            success: function (r) {
                var response = JSON.parse(r);
                console.log(response);
            },
            error: function (r) {
                console.log(r);
                alert("error");
            },
        });
    });
})(jQuery);