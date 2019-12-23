var base_url = $('#base_url').val();

$(document).ready(function () {

});

//jquery
(function ($) {

    // btn login
    $('#btn-login').click(function(){
        var tenant_id = $('#select-tenant-id').val();
        // console.log(tenant_id);
        $.ajax({
            type: 'post',
            url: base_url+'api/AuthController/doLogin',
            data: {
                tenant_id: tenant_id,
            },
            success: function (r) {
                var response = JSON.parse(r);
                console.log(response);
            },
            error: function (r) {
                console.log(r);
                alert("error");
            },
        });
    });
})(jQuery);