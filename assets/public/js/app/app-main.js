var base_url = $('#base_url').val();

$(document).ready(function () {

});

function doLogoutInLogin(){
        
    $.ajax({
        beforeSend: function (xhr) {
            xhr.setRequestHeader("token", tokenSessionNav);
        },
      type: 'post',
      url: base_url+'api/Auth/AuthController/doLogout',
      data: {
          username: items.USERID
      },
      success: function (r) {
          if(r.status) {
            localStorage.removeItem('Auth-infomedia');
            localStorage.clear();
            window.location = base_url+'main/login';
          } else {
              alert(r.message)
              $("#btn-logout").attr('disabled', false);
              $("#btn-logout").html('Log Out')
          }
      },
      fail: function (r) {
          alert("error");
          $("#btn-logout").attr('disabled', false);
          $("#btn-logout").html('Log Out')
      },
      error: function (r) {
          alert("error");
          $("#btn-logout").attr('disabled', false);
          $("#btn-logout").html('Log Out')
      },
    });
    
}

//jquery
(function ($) {
    // Get the input field
    var input = document.getElementById("password");

    // Execute a function when the user releases a key on the keyboard
    input.addEventListener("keyup", function(event) {
      // Number 13 is the "Enter" key on the keyboard
      if (event.keyCode === 13) {
        // Cancel the default action, if needed
        event.preventDefault();
        // Trigger the button element with a click
        document.getElementById("btn-login").click();
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
