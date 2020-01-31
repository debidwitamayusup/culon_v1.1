var base_url = $('#base_url').val();

$(document).ready(function () {
    callCardWall();
});

function callCardWall(){
    $.ajax({
        type: 'post',
        url: base_url + 'api/Wallboard/WallboardController/WallboardMain',
        success: function (r) { 
            // var response = JSON.parse(r);
            var response = r;
            setTimeout(function(){callCardWall();},20000);
            drawCard(response);
        },
        error: function (r) {
            alert("error");
        },
    });
}

function drawCard(response){
    $('#rowCardWall').remove(); // this is my <canvas> element
    $('#parentCard').append('<div class="row ml-1 mr-1 mt-2" id="rowCardWall">');
    response.data.forEach(function (value, index) {
        // draw
        $('#rowCardWall').append(''+
        '<div class="col-xl-3 col-md-12">'+
        '<div class="card box-widget widget-user bg-header-box">'+
            '<div class="widget-user-header">'+
                '<h3 class="widget-user-username font-weight-bold">'+value.CHANNEL_NAME+'</h3>'+
            '</div>'+
            '<div class="widget-user-image">'+
                '<div class="plan-icon-70 bg-light text-center">'+
                    '<i class="fab fa-facebook-messenger color-icon-dark"></i>'+
                '</div>'+
            '</div>'+
            '<div class="box-footer text-white bg-gradient-RedOcean lrRadius">'+
                '<div class="row no-gutters border-bottom">'+
                    '<div class="col-sm-4 border-right">'+
                        '<div class="description-block">'+
                            '<h5 class="description-header num-font">'+value.QUEUE+'</h5><span class="text-muted text-white">Queue</span>'+
                        '</div>'+
                    '</div>'+
                    '<div class="col-sm-4 border-right">'+
                        '<div class="description-block">'+
                            '<h5 class="description-header num-font">'+value.COF+'</h5><span class="text-muted text-white">COF</span>'+
                        '</div>'+
                    '</div>'+
                    '<div class="col-sm-4">'+
                        '<div class="description-block">'+
                            '<h5 class="description-header num-font">'+value.SCR+'</h5><span class="text-muted text-white">SCR</span>'+
                        '</div>'+
                    '</div>'+
                '</div>'+
                '<div class="row no-gutters border-bottom">'+
                    '<div class="col-sm-4 border-right">'+
                        '<div class="description-block">'+
                            '<h5 class="description-header num-font">'+value.WAITING+'</h5><span class="text-muted text-white">Waiting</span>'+
                        '</div>'+
                    '</div>'+
                    '<div class="col-sm-4 border-right">'+
                        '<div class="description-block">'+
                            '<h5 class="description-header num-font">'+value.ART+'</h5><span class="text-muted text-white">ART</span>'+
                        '</div>'+
                    '</div>'+
                    '<div class="col-sm-4">'+
                        '<div class="description-block">'+
                            '<h5 class="description-header num-font">'+value.AHT+'</h5><span class="text-muted text-white">AHT</span>'+
                        '</div>'+
                    '</div>'+
                '</div>'+
                '<div class="row no-gutters">'+
                    '<div class="col-sm-4 border-right">'+
                        '<div class="description-block">'+
                            '<h5 class="description-header num-font">'+value.MSG_IN+'</h5><span class="text-muted text-white">Message in</span>'+
                        '</div>'+
                    '</div>'+
                    '<div class="col-sm-4 border-right">'+
                        '<div class="description-block">'+
                            '<h5 class="description-header num-font">'+value.MSG_OUT+'</h5><span class="text-muted text-white">Message Out</span>'+
                        '</div>'+
                    '</div>'+
                    '<div class="col-sm-4">'+
                        '<div class="description-block">'+
                            '<h5 class="description-header num-font">'+value.SLA+'</h5><span class="text-muted text-white">SLA</span>'+
                        '</div>'+
                    '</div>'+
                '</div>'+
            '</div>'+
        '</div>'+
    '</div>');
    });
}