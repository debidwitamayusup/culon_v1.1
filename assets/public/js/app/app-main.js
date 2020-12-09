var base_url = $('#base_url').val();

$(document).ready(function() {

});

//jquery
(function($) {
    // Get the input field
    var input = document.getElementById("password");
    var usernameInput = document.getElementById("username");
    // Execute a function when the user releases a key on the keyboard
    input.addEventListener("keyup", function(event) {
        event.preventDefault();
        if ($("#username").val() == "" || $("#password").val() == "") {
            $("#btn-login").attr("disabled", true);
            // Number 13 is the "Enter" key on the keyboard
        } else {
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
        if ($("#username").val() == "" || $("#password").val() == "") {
            $("#btn-login").attr("disabled", true);
        } else {
            $("#btn-login").attr("disabled", false);
            if (event.keyCode === 13) {
                // Cancel the default action, if needed
                // Trigger the button element with a click
                $("#btn-login").click();
            }
        }
    });



    // btn login
    $('#btn-login').click(function() {
        let username = $("input[name='username']").val();
        let password = $("input[name='password']").val();

        if (username == '' || password == '') return;

        $("#btn-login").attr('disabled', true);
        $("#btn-login").html('Processing...')
        $.ajax({
            type: 'post',
            url: base_url + 'api/AuthController/doLogin',
            data: {
                id_user: username,
                password: password
            },
            success: function(r) {
                var response = JSON.parse(r);
                if (response.status != false) {
                    localStorage.setItem('Auth-data', JSON.stringify(response.data))
                        // console.log(response)
                    window.location = base_url + 'main/index'
                    $("#btn-login").attr('disabled', false);
                    $("#btn-login").html('Sign in')
                } else {
                    // alert(r.message)
                    alert("Login Failed. Please check your Username and Password")
                    $("#btn-login").attr('disabled', false);
                    $("#btn-login").html('Sign in')
                }
            },
            fail: function(r) {
                // alert("error");
                $("#btn-login").attr('disabled', false);
                $("#btn-login").html('Sign in')
            },
            error: function(r) {
                console.log(r)
                alert("error");
                $("#btn-login").attr('disabled', false);
                $("#btn-login").html('Sign in')
            },
        });
    });


})(jQuery);