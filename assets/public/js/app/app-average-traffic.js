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
    $("#btn-month").prop("class","btn btn-light btn-sm");
    $("#btn-year").prop("class","btn btn-light btn-sm");
    $("#btn-day").prop("class","btn btn-danger btn-sm");
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

function loadContent($params_time, $index){
    
    callDataAvg(params_time, $index);
}

function getThisMonth(){
    var date = new Date();
    var thisMonth = String(date.getMonth() + 1).padStart(2, '0'); //January is 0!
    return thisMonth;
}

function getThisYear()
{
    var date = new Date();
    var thisYear = date.getFullYear();
    return thisYear;
}

function callDataAvg(params, index){
    $("#filter-loader").fadeIn("slow");
    $.ajax({
        type: 'post',
        url: base_url + 'api/SummaryTraffic/AverageTime/getAT',
        data: {
            params: params,
            index: index
        },
        success: function (r) {
            var response = JSON.parse(r);
           // console.log(response);
            drawCard(response);
        },
        error: function (r) {
            alert("error");
        },
    });
    $("#filter-loader").fadeOut("slow");
}

function drawCard(response){
     //destroy div card content
     $('#card-avg').remove(); // this is my <div> element
     $('#content-card').append('<div id="card-avg" class="row"></div>');

    //  draw card
    response.data.forEach(function (value, index) {
        $('#card-avg').append(''+
        '<div class="col-xl-3 col-lg-4 col-md-12">'+
            '<div class="mini-stat clearfix rounded" style="background-color:'+value.channel_color+'">'+
                '<div class="row mt-2">'+
                    '<div class="col col-lg-4">'+
                        '<div class="card-box text-center">'+
                            ' <div class="icon icon-shape bg-light rounded-circle">'+
                                '<i class="'+value.channel_icon+'" style="color: '+value.channel_color+'"></i>'+
                            '</div>'+
                            '<h6 class="mt-4 text-white">'+ value.channel_name+'</h6>'+
                        '</div>'+
                    '</div>'+
                    '<div class="col-md-auto ml-2 mt-2">'+
                        '<h6 class="text-white">ART</h6>'+
                        '<h6 class="text-white">AHT</h6>'+
                        '<h6 class="text-white">AST</h6>'+
                        '<h4 class="text-white mt-4">Total</h4>'+
                    '</div>'+
                    '<div class="col-md-auto mt-2">'+
                        '<h6 class="text-white">'+value.art+'</h6>'+
                        '<h6 class="text-white">'+value.aht+'</h6>'+
                        '<h6 class="text-white">'+value.ast+'</h6>'+
                        ' <h4 class="text-white mt-4">'+value.total+'</h4>'+
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

    // btn month
    $('#btn-month').click(function(){
        params_time = 'month';
        // console.log(params_time);
        thisMonths = getThisMonth();
        // console.log(thisMonths);
        // loadContent(params_time , thisMonths);
        loadContent(params_time , '11');
        $("#btn-day").prop("class","btn btn-light btn-sm");
        $("#btn-year").prop("class","btn btn-light btn-sm");
        $(this).prop("class","btn btn-danger btn-sm");
    });

    // btn year
    $('#btn-year').click(function(){
        params_time = 'year';
        // console.log(params_time);
        thisYears = getThisYear();
        loadContent(params_time , ''+thisYears+'');
        $("#btn-day").prop("class","btn btn-light btn-sm");
        $("#btn-month").prop("class","btn btn-light btn-sm");
        $(this).prop("class","btn btn-danger btn-sm");
    });
   
})(jQuery);

/*.getContext("2d");
if(chart){
    chart.destroy();
}*/