var base_url = $('#base_url').val();
let items = JSON.parse(localStorage.getItem('Auth-infomedia'));
$(document).ready(function () {
    if(!items){
        window.location = base_url;
    }
    // logTabsForWindows();
});

function logTabsForWindows(windowInfoArray) {
    for (windowInfo of windowInfoArray) {
      console.log(`Window: ${windowInfo.id}`);
      console.log(windowInfo.tabs.map((tab) => {return tab.url}));
    }
  }
// window.onunload = () => {
//     window.localStorage.clear()
//  }

function capitalize(input) {  
    return input.toLowerCase().split(' ').map(s => s.charAt(0).toUpperCase() + s.substring(1)).join(' ');  
} 

function onWindowClosing() {
    if (window.event.clientX < 0 || window.event.clientY < 0) {
        localStorage.clear();
        $.ajax({
            type: "POST",
            url: base_url+'api/Auth/AuthController/doLogout'
        });
    }
};

function onKeydown(evt) {
    if (evt != undefined && evt.altKey && evt.keyCode == 115) //Alt + F4 
    {
        $.ajax({
            type: "POST",
            url: base_url+'api/Auth/AuthController/doLogout'
        });
    }
};

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

    browser.browserAction.onClicked.addListener((tab) => {
        var getting = browser.windows.getAll({
          populate: true,
          windowTypes: ["normal"]
        });
        getting.then(logTabsForWindows, onError);
      });

})(jQuery);