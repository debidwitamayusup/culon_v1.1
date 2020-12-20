var base_url = $('#base_url').val();
let items = JSON.parse(localStorage.getItem('Auth-data'));
$(document).ready(function () {
    if(!items){
        window.location = base_url + 'main/v_login';
    }
    // logTabsForWindows();
    if(items.idJabatan == 'ADMD'){
         var html = '';
         html += '<div class="drop-heading"> <div class="text-left"> <h5 class="text-dark mb-1" id="NICKNAME_NAV"></h5> <small class="text-muted" id="PREVILAGE_NAV"></small> </div> </div>';
         html += '<a class="dropdown-item" href="add_user"><i class="dropdown-icon fe fe-settings"></i>Add User</a>';
         html += '<button class="dropdown-item" id="btn-logout" onclick="logout()"><i class="dropdown-icon fe fe-power"></i>Log Out</button>';
        $('#dropdown-menu').html(html);
    }
});

function logout(){
    localStorage.removeItem('Auth-data');
        localStorage.clear();
        window.location = base_url+'main/v_login';
}


//jquery
(function ($) {
    $('#NICKNAME_NAV').html(items.userId)
      $('#PREVILAGE_NAV').html(items.namaJabatan)
    //   $('#titleTab').html('Infomedia | '+capitalize(items.PREVILAGE))
      //add id
      $('#NICKNAME_NAV2').html(items.userId);
      $('#PREVILAGE_NAV2').html(items.idJabatan);   
      $('#thumb-avatar').attr('src', items.PICTURE)

      // btn logout 
      $('#btn-logout').click(function(){
        //   console.log('masup')
        localStorage.removeItem('Auth-data');
        localStorage.clear();
        window.location = base_url+'main/v_login';
      });   

})(jQuery);