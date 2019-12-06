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


    loadContent(params_time, v_date);

});

//function
function getColorChannel(channel){
    var color = [];
    color['Email'] = '#e41313';
    color['Facebook'] = '#467fcf';
    color['Instagram'] = '#fbc0d5';
    color['Line'] = '#31a550';
    color['Live Chat'] = '#607d8b';
    color['Messenger'] = '#3866a6';
    color['SMS'] = '#80cbc4';
    color['Telegram'] = '#343a40';
    color['Twitter'] = '#45aaf2';
    color['Twitter DM'] = '#6574cd';
    color['Voice'] = '#ff9933';
    color['Whatsapp'] = '#31a550';

    return color[channel];
}

function loadContent(params, index_time){
    callSummaryInteraction(params, index_time);
    // callTotalInteraction(params, index_time);
    // callTotalUniqueCustomer(params, index_time);
    // callAverageCustomer(params, index_time);
    // callUniqueCustomerPerChannel(params, index_time);
}


function callSummaryInteraction(params, index_time){
    $.ajax({
        type: 'post',
        url: base_url + 'api/SummaryTraffic/AverageTime/getAT',
        data: {
            params: params,
            index: index_time
        },
        success: function (r) {
            var response = JSON.parse(r);
            drawCard(response);
        },
        error: function (r) {
            alert("error");
        },
    });
}

function drawCardInteraction(value){
    let classBg = value.channel == "Whatsapp" ? "bg-primary" : value.channel == "Email" ? "bg-danger" : value.channel == "Twitter" ? "bg-info" : value.channel == "Facebook" ? "bg-blue" : value.channel == "Telegram" ? "bg-dark" : value.channel == "Voice" ? "bg-warning" : value.channel == "Instagram" ? "bg-pink" : value.channel == "Messenger" ? "bg-blue-dark" : value.channel == "Twitter DM" ? "bg-indigo" : value.channel == "Line" ? "bg-success" : value.channel == "Live Chat" ? "bg-gray1" : value.channel == "SMS" ? "bg-blue-teal" : "";
    let classIcon = value.channel == "Whatsapp" ? "fab fa-whatsapp text-primary" : value.channel == "Email" ? "fa fa-envelope text-danger" : value.channel == "Twitter" ? "fab fa-twitter text-info" : value.channel == "Facebook" ? "fab fa-facebook text-blue" : value.channel == "Telegram" ? "fab fa-telegram text-dark" : value.channel == "Voice" ? "fa fa-microphone text-warning" : value.channel == "Instagram" ? "fab fa-instagram text-pink" : value.channel == "Messenger" ? "fab fa-facebook-messenger text-blue" : value.channel == "Twitter DM" ? "fa fa-mail-bulk text-indigo" : value.channel == "Line" ? "fab fa-line text-success" : value.channel == "Live Chat" ? "fa fa-comments text-gray1" : value.channel == "SMS" ? "fa fa-envelope-open text-blue-teal" : "";
        
    $("#retres").append('<div class="col-md-4"><div class="mini-stat clearfix ' + classBg + ' rounded"><span class="mini-stat-icon"><i class="' + classIcon + '"></i></span> <div class = "mini-stat-info text-white float-right"><h3> ' + value.total + '</h3> ' + value.channel + '</div></div></div>')
}

function drawCard(response){
    // destroy div card interaction channel
    $('#retres').remove(); // this is my <canvas> element
    $('#card-average').append('<div class="d-flex align-items-center justify-content-center" id="retres"></div>');

    let arrTotal = []
    let arrChannel = []
    let arrColor = []

    // draw card yang ada datanya
    response.data.forEach(function (value, index) {
        drawCardInteraction(value);
        arrTotal.push(value.total);
        arrChannel.push(value.channel);
        arrColor.push(getColorChannel(value.channel));
    });
    
    // draw card yg datanya 0
    response.data_empty.forEach(function (value, index) {
        drawCardInteraction(value);
        arrTotal.push(value.total);
        arrChannel.push(value.channel);
        arrColor.push(getColorChannel(value.channel));
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