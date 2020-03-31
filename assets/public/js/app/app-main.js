var base_url = $('#base_url').val();

$(document).ready(function () {

});

//jquery
(function ($) {
    // Get the input field
    var input = document.getElementById("password");
    var usernameInput = document.getElementById("username");
    // Execute a function when the user releases a key on the keyboard
    input.addEventListener("keyup", function(event) {
        event.preventDefault();
        if($("#username").val() == "" || $("#password").val() == ""){
            $("#btn-login").attr("disabled", true);
        // Number 13 is the "Enter" key on the keyboard
        }else{
            $("#btn-login").attr("disabled", false);
            if (event.keyCode === 13) {
                // Cancel the default action, if needed
                // Trigger the button element with a click
                $("#btn-login").click();
            }
      }
    });

    usernameInput.addEventListener("keyup", function(event) {
        event.preventDefault();
        // Number 13 is the "Enter" key on the keyboard
        if($("#username").val() == "" || $("#password").val() == ""){
                $("#btn-login").attr("disabled", true);
            }else{
                $("#btn-login").attr("disabled", false);
                if (event.keyCode === 13) {
                    // Cancel the default action, if needed
                    // Trigger the button element with a click
                    $("#btn-login").click();
                }
        }
      });



    // btn login
    $('#btn-login').click(function(){
        let username = $("input[name='username']").val();
        let password = $("input[name='password']").val();

        if(username == '' || password == '') return;

        $("#btn-login").attr('disabled', true);
        $("#btn-login").html('Processing...')
        $.ajax({
            type: 'post',
            url: base_url+'api/Auth/AuthController/doLogin',
            data: {
                username: username,
                password: password
            },
            success: function (r) {
                if(r.status != false) {
                    // sessionStorage.setItem('Auth-infomedia',JSON.stringify(r.data));
                    localStorage.setItem('Auth-infomedia',JSON.stringify(r.data))
                    localStorage.setItem('Auth-token',JSON.stringify(r.token))
                    if(r.data.PREVILAGE == 'admin'){
                        window.location = base_url+'admin/admin_user'
                    }else{
                        window.location = base_url+'main/v_home'
                    }
                    $("#btn-login").attr('disabled', false);
                    $("#btn-login").html('Sign in')
                } else {
                    if(r.message == "User has logged in!"){
                        $('#h6ModalError').html('User already logged in');
                        $('#pModalError').html('Please contact your admin');
                        $('#modalError').modal('show');
                    }else{
                        // alert(r.message)
                        alert("Login Failed. Please check your Username and Password")
                        $("#btn-login").attr('disabled', false);
                        $("#btn-login").html('Sign in')
                    }
                }
            },
            fail: function (r) {
                // alert("error");
                $("#btn-login").attr('disabled', false);
                $("#btn-login").html('Sign in')
            },
            error: function (r) {
                console.log(r)
                if(r.responseJSON.message == "User has logged in!"){
                    alert("This Username is already logged in!");
                }else{
                    alert("error");
                }
                $("#btn-login").attr('disabled', false);
                $("#btn-login").html('Sign in')
            },
        });
    });
    

})(jQuery);
