var base_url = $('#base_url').val();
const sessionParams = JSON.parse(localStorage.getItem('Auth-token'));
const sessionEdit = JSON.parse(sessionStorage.getItem('editUser'));
$(document).ready(function(){
    if(sessionParams){
        $('#idUser').prop('disabled',true);
        $('#idUser').val(sessionEdit[1]);
        $('#nameUser').val(sessionEdit[2]);
        $('#levelUser').val(sessionEdit[3]);
        if($('#levelUser').val() == 'manager'){
            $('#tenantUser').prop('disabled', true);
        }else{
            $('#tenantUser').prop('disabled', false);
            getTenant('','');
        }
        $('#levelUser option[value="' + sessionEdit[3] + '"]').attr('selected', 'selected');
        $('#noTelp').val(sessionEdit[4]);
        $('#emailUser').val(sessionEdit[5]);
    }else{
        window.location = base_url
    }
});

function getTenant(date, userid){
    $.ajax({
        type: 'POST',
        url: base_url + 'api/Wallboard/WallboardController/GetTennantFilter',
        data: {
            "date" : date,
            "userid" : userid
        },

        success: function (r) {
            var data_option = [];
            //dont parse response if using rest controller
            // var response = JSON.parse(r);
            var response = r;
            // console.log(response);
            // tenants = response.data;
                var html = '';
                for(i=1; i<response.data.length; i++){
                    html += '<option value='+response.data[i].TENANT_ID+'>'+response.data[i].TENANT_NAME+'</option>';
                }
                $('#tenantUser').html(html);
        },
        error: function (r) {
            //console.log(r);
            alert("error");
        },
    });
}

