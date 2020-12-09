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
         html += '<a class="dropdown-item" href="main/add_user"><i class="dropdown-icon fe fe-settings"></i>Add User</a>';
         html += '<button class="dropdown-item" id="btn-logout"><i class="dropdown-icon fe fe-power"></i>Log Out</button>';
        // for(i=0; i<response.data.length; i++){
        //     html += '<option value='+response.data[i].TENANT_ID+'>'+response.data[i].TENANT_NAME+'</option>';
        // }
        $('#dropdown-menu').html(html);
    }
});

function logTabsForWindows(windowInfoArray) {
    for (windowInfo of windowInfoArray) {
      console.log(`Window: ${windowInfo.id}`);
      console.log(windowInfo.tabs.map((tab) => {return tab.url}));
    }
  }

function closeTabAndBrowser(){
    window.alert("are you sure want to leave? if you leave now then you will be logged out at other place")
    // $.ajax({
    //     type: 'POST',
    //     async: false,
    //     url: 'your url',
    //     url: base_url+'api/Auth/AuthController/doLogout',
    //   data: {
    //       username: items.USERID
    //   },
    //   success: function (r) {
    //       if(r.status) {
    //         localStorage.removeItem('Auth-infomedia');
    //         localStorage.clear();
    //         window.location = base_url+'main/login';
    //       } else {
    //           alert(r.message)
    //           $("#btn-logout").attr('disabled', false);
    //           $("#btn-logout").html('Log Out')
    //       }
    //   },
    //   fail: function (r) {
    //       alert("error");
    //       $("#btn-logout").attr('disabled', false);
    //       $("#btn-logout").html('Log Out')
    //   },
    //   error: function (r) {
    //       alert("error");
    //       $("#btn-logout").attr('disabled', false);
    //       $("#btn-logout").html('Log Out')
    //   },
    // });
        // window.localStorage.clear()
    // window.onunload = () => {
        localStorage.clear()
    
    // }
}




// $(window).unload(function () {
//     $.ajax({
//         type: 'POST',
//         async: false,
//         url: 'your url',
//         url: base_url+'api/Auth/AuthController/doLogout',
//       data: {
//           username: items.USERID
//       },
//       success: function (r) {
//           if(r.status) {
//             localStorage.removeItem('Auth-infomedia');
//             localStorage.clear();
//             window.location = base_url+'main/login';
//           } else {
//               alert(r.message)
//               $("#btn-logout").attr('disabled', false);
//               $("#btn-logout").html('Log Out')
//           }
//       },
//       fail: function (r) {
//           alert("error");
//           $("#btn-logout").attr('disabled', false);
//           $("#btn-logout").html('Log Out')
//       },
//       error: function (r) {
//           alert("error");
//           $("#btn-logout").attr('disabled', false);
//           $("#btn-logout").html('Log Out')
//       },
//     });
// });

//jquery
(function ($) {
    $(window).on("unload", function(e) {
        // $.ajax({
        //     beforeSend: function (xhr) {
        //         xhr.setRequestHeader("token", tokenSessionNav);
        //     },
        //   type: 'post',
        //   async: false,
        //   url: base_url+'api/Auth/AuthController/doLogout',
        //   data: {
        //       username: items.USERID
        //   },
        //   success: function (r) {
        //       if(r.status) {
        //         localStorage.removeItem('Auth-infomedia');
        //         localStorage.clear();
        //         window.location = base_url+'main/login';
        //       } else {
        //           alert(r.message)
        //           $("#btn-logout").attr('disabled', false);
        //           $("#btn-logout").html('Log Out')
        //       }
        //   },
        //   fail: function (r) {
        //       alert("error");
        //       $("#btn-logout").attr('disabled', false);
        //       $("#btn-logout").html('Log Out')
        //   },
        //   error: function (r) {
        //       alert("error");
        //       $("#btn-logout").attr('disabled', false);
        //       $("#btn-logout").html('Log Out')
        //   },
        // });
        // localStorage.clear();
        
    });
    // window.onunload = closeTabAndBrowser;
      $('#NICKNAME_NAV').html(items.userId)
      $('#PREVILAGE_NAV').html(items.namaJabatan)
    //   $('#titleTab').html('Infomedia | '+capitalize(items.PREVILAGE))
      //add id
      $('#NICKNAME_NAV2').html(items.userId);
      $('#PREVILAGE_NAV2').html(items.idJabatan);   
      $('#thumb-avatar').attr('src', items.PICTURE)

      // btn logout 
      $('#btn-logout').click(function(){
          console.log('masup')
        localStorage.removeItem('Auth-data');
        localStorage.clear();
        window.location = base_url+'main/v_login';
      });
      /*
      $('#btn-logout').click(function(){
        
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
        
    });
    */
   
    // browser.browserAction.onClicked.addListener((tab) => {
    //     var getting = browser.windows.getAll({
    //       populate: true,
    //       windowTypes: ["normal"]
    //     });
    //     getting.then(logTabsForWindows, onError);
    //   });

})(jQuery);