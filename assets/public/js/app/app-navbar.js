var base_url = $('#base_url').val();

$(document).ready(function () {

});

//jquery
(function ($) {

      // btn logout 
      $('#btn-logout').click(function(){
       // let username = $("input[name='username']").val();


        sessionStorage.removeItem('Auth-infomedia');
        window.location = base_url+'main/login';
            
    });

})(jQuery);