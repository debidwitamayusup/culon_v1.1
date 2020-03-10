var base_url = $('#base_url').val();
const sessionParams = JSON.parse(localStorage.getItem('Auth-infomedia'));
const tokenSession = JSON.parse(localStorage.getItem('Auth-Token'));

$(document).ready(function () {
    if(sessionParams){
        $("#filter-loader").fadeIn("slow");
        
        getDataProf(tokenSession);

        $("#filter-loader").fadeOut("slow");
    }else{
        window.location = base_url
    }
});

function getDataProf(token){
    $.ajax({
        type: 'POST',
        beforeSend: function (xhr) {
            xhr.setRequestHeader("token", token);
        },
        url: base_url + 'api/Auth/AuthController/getdataupdate',
        success: function (r) {
            console.log(token);
            var response = r;
            console.log(response)
            $('#username').prop("disabled", true);
            $('#username').val(response.data.ID);
            $('#phone_number').val(response.data.PHONE);
            $('#email').val(response.data.EMAIL);
        },
        error: function (r) {
            //console.log(r);
            alert("error");
        },
    });
}

(function ($) {
    $('#btn-submit').click(function(){
       $('#modalConifrmPassword').show();
    });
   
})(jQuery);