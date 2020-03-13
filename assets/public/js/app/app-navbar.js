var base_url = $('#base_url').val();
let items = JSON.parse(localStorage.getItem('Auth-infomedia'));
$(document).ready(function () {
    if(!items){
        window.location = base_url;
    }
});

// window.onunload = () => {
//     window.localStorage.clear()
//  }

function capitalize(input) {  
    return input.toLowerCase().split(' ').map(s => s.charAt(0).toUpperCase() + s.substring(1)).join(' ');  
} 

//jquery
(function ($) {
     
      $('#NICKNAME_NAV').html(items.NAME)
      $('#PREVILAGE_NAV').html(items.PREVILAGE)
      $('#titleTab').html('Infomedia | '+capitalize(items.PREVILAGE))
      //add id
      $('#NICKNAME_NAV2').html(items.NAME);
      $('#PREVILAGE_NAV2').html(items.PREVILAGE);   

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
                localStorage.removeItem('Auth-infomedia');
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