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
                    sessionStorage.setItem('Auth-infomedia',JSON.stringify(r.data));
                    window.location = base_url+'main/home'
                    $("#btn-login").attr('disabled', false);
                    $("#btn-login").html('Sign in')
                } else {
                    alert(r.message)
                    $("#btn-login").attr('disabled', false);
                    $("#btn-login").html('Sign in')
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

})(jQuery);