var base_url = $('#base_url').val();
var params_time = '';
var v_date = '';
var v_month = '';
var v_year = '';

$(document).ready(function () {
    // v_date = getToday();
    // v_month = getMonth();
    // v_year = getYear();
    params_time = 'day';
    v_date = '2019-11-02';
    v_month = '11';
    v_year = '2019';

    callDataAvg(params_time, v_date);
    // loadContent(params_time, v_date);

});

//function
function getColorChannel(channel){
    var color = [];
    color['Email'] = '#e41313';
    color['Facebook'] = '#467fcf';
    color['Instagram'] = '#fbc0d5';
    color['Line'] = '#31a550';
    color['Live Chat'] = '#607d8b';
    color['Facebook Messenger'] = '#3866a6';
    color['SMS'] = '#80cbc4';
    color['Telegram'] = '#343a40';
    color['Twitter'] = '#45aaf2';
    color['Twitter DM'] = '#6574cd';
    color['Voice'] = '#ff9933';
    color['Whatsapp'] = '#31a550';

    return color[channel];
}

function loadContent(){

}

function callDataAvg(params, index){
    $.ajax({
        type: 'post',
        url: base_url + 'api/SummaryTraffic/AverageTime/getAT',
        data: {
            params: params,
            index: index
        },
        success: function (r) {
            var response = JSON.parse(r);
            console.log(response);
            drawCard(response);
        },
        error: function (r) {
            alert("error");
        },
    });
}
function drawCard(response){
     //destroy div card content
     $('#card-avg').remove(); // this is my <div> element
     $('#content-card').append('<div id="card-avg" class="row"></div>');

    //  draw card
    response.data.forEach(function (value, index) {
        $('#card-avg').append(''+
        '<div class="col-xl-3 col-md-12 col-lg-6" >'+
            '<div class="card" style="background-color:'+value.channel_color+'">'+
                '<div class="card-body">'+
                    '<div class="d-flex align-items-center justify-content-center">'+
                        '<div class="plan-card mr-3">'+
                            '<i class="'+value.channel_icon+' text-white text-center plan-icon"></i>'+
                            '<h6 class="text-drak text-uppercase mt-2">'+ value.channel_name+'</h6>'+
                            '<h2 class="mb-2 num-font text-center">'+value.total+'</h2>'+
                        '</div>'+
                        '<div class="plan-card ">'+
                            '<h4 class="text-drak text-uppercase ml-5">ART :'+value.art+'</h4>'+
                            '<h4 class="text-drak text-uppercase ml-5">AHT :'+value.aht+'</h4>'+
                            '<h4 class="text-drak text-uppercase ml-5">AST :'+value.ast+'</h4>'+
                        '</div>'+
                    '</div>'+
                '</div>'+
            '</div>'+
        '</div>');
    });
}
//jquery
(function ($) {

    // btn day
    $('#btn-day').click(function(){
        params_time = 'day';
        // console.log(params_time);
        loadContent(params_time , '2019-11-02');
        $("#btn-month").prop("class","btn btn-light btn-sm");
        $("#btn-year").prop("class","btn btn-light btn-sm");
        $(this).prop("class","btn btn-danger btn-sm");
    });

   
})(jQuery);