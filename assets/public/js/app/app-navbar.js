var base_url = $('#base_url').val();
let items = JSON.parse(localStorage.getItem('Auth-infomedia'));
$(document).ready(function () {
    // if(items.TENANT_ID != null){
    //     $('#layanan_name_parent').remove();
    // }else{
    //     getTenant('');
    // }
    if(!items){
        window.location = base_url;
    }
});

// window.onunload = () => {
//     window.localStorage.clear()
//  }

function getTenant(date){
    $.ajax({
        type: 'POST',
        url: base_url + 'api/Wallboard/WallboardController/GetTennantFilter',
        data: {
            "date" : date
        },

        success: function (r) {
            var data_option = [];
            //dont parse response if using rest controller
            // var response = JSON.parse(r);
            var response = r;
            // console.log(response);
            // tenants = response.data;
            var html = '<option value="">All Tenant</option>';
            // var html = '';
                for(i=0; i<response.data.length; i++){
                    html += '<option value='+response.data[i].TENANT_ID+'>'+response.data[i].TENANT_NAME+'</option>';
                }
                $('#layanan_name').html(html);
        },
        error: function (r) {
            //console.log(r);
            alert("error");
        },
    });
}

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
    

    //   $('#layanan_name').change(function(){
    //       loadContent('month', $("#select-month").val(), $("#select-year-on-month").val(), $('#layanan_name').val());
    //   });

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