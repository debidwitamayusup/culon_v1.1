var base_url = $('#base_url').val();
let items = JSON.parse(localStorage.getItem('Auth-infomedia'));
const tokenSessionNav = JSON.parse(localStorage.getItem('Auth-token'));
$(document).ready(function () {
    if(!items){
        window.location = base_url + 'main/login';
    }
    // logTabsForWindows();
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


function capitalize(input) {  
    return input.toLowerCase().split(' ').map(s => s.charAt(0).toUpperCase() + s.substring(1)).join(' ');  
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
      $('#NICKNAME_NAV').html(items.NAME)
      $('#PREVILAGE_NAV').html(items.PREVILAGE)
      $('#titleTab').html('Infomedia | '+capitalize(items.PREVILAGE))
      //add id
      $('#NICKNAME_NAV2').html(items.NAME);
      $('#PREVILAGE_NAV2').html(items.PREVILAGE);   
      $('#thumb-avatar').attr('src', items.PICTURE)

      // btn logout 
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

    // browser.browserAction.onClicked.addListener((tab) => {
    //     var getting = browser.windows.getAll({
    //       populate: true,
    //       windowTypes: ["normal"]
    //     });
    //     getting.then(logTabsForWindows, onError);
    //   });

})(jQuery);