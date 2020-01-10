var base_url = $('#base_url').val();

$(document).ready(function () {

});

//jquery
(function ($) {
      let items = JSON.parse(sessionStorage.getItem('Auth-infomedia'));
      $('#NICKNAME_NAV').html(items.NAME)
      $('#PREVILAGE_NAV').html(items.PREVILAGE)

      // btn logout 
      $('#btn-logout').click(function(){
        
        $.ajax({
          type: 'post',
          url: base_url+'api/Auth/AuthController/doLogout',
          data: {
              username: items.USERID
          },
          success: function (r) {
              if(r.status) {
                sessionStorage.removeItem('Auth-infomedia');
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
        
    });
   

})(jQuery);