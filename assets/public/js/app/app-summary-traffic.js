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
    color['Facebook Messenger'] = '#3866a6';
    color['SMS'] = '#80cbc4';
    color['Telegram'] = '#343a40';
    color['Twitter'] = '#45aaf2';
    color['Twitter DM'] = '#6574cd';
    color['Voice'] = '#ff9933';
    color['Whatsapp'] = '#31a550';

    return color[channel];
}

function getToday(){
    var today = new Date();
    var dd = String(today.getDate()).padStart(2, '0');
    var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
    var yyyy = today.getFullYear();

    today = yyyy  + '-' + mm + '-' + dd;
    return today;
}

function getMonth(){
    var today = new Date();
    var dd = String(today.getDate()).padStart(2, '0');
    var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
    var yyyy = today.getFullYear();

    var month = mm;
    return month;
}

function getYear(){
    var today = new Date();
    var dd = String(today.getDate()).padStart(2, '0');
    var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
    var yyyy = today.getFullYear();

    var year = yyyy;
    return year;
}

function loadContent(params, index_time){
    callSummaryInteraction(params, index_time);
    callTotalInteraction(params, index_time);
    callTotalUniqueCustomer(params, index_time);
    callAverageCustomer(params, index_time);
    callUniqueCustomerPerChannel(params, index_time);
}

function drawCardInteraction(value){
    let classBg = value.channel == "Whatsapp" ? "bg-primary" : value.channel == "Email" ? "bg-danger" : value.channel == "Twitter" ? "bg-info" : value.channel == "Facebook" ? "bg-blue" : value.channel == "Telegram" ? "bg-dark" : value.channel == "Voice" ? "bg-warning" : value.channel == "Instagram" ? "bg-pink" : value.channel == "Facebook Messenger" ? "bg-blue-dark" : value.channel == "Twitter DM" ? "bg-indigo" : value.channel == "Line" ? "bg-success" : value.channel == "Live Chat" ? "bg-gray1" : value.channel == "SMS" ? "bg-blue-teal" : "";
    
    let classIcon = value.channel == "Whatsapp" ? "fab fa-whatsapp text-primary" : value.channel == "Email" ? "fa fa-envelope text-danger" : value.channel == "Twitter" ? "fab fa-twitter text-info" : value.channel == "Facebook" ? "fab fa-facebook text-blue" : value.channel == "Telegram" ? "fab fa-telegram text-dark" : value.channel == "Voice" ? "fa fa-microphone text-warning" : value.channel == "Instagram" ? "fab fa-instagram text-pink" : value.channel == "Facebook Messenger" ? "fab fa-facebook-messenger text-blue" : value.channel == "Twitter DM" ? "fa fa-mail-bulk text-indigo" : value.channel == "Line" ? "fab fa-line text-success" : value.channel == "Live Chat" ? "fa fa-comments text-gray1" : value.channel == "SMS" ? "fa fa-envelope-open text-blue-teal" : "";
    
    var channel_name = (value.channel==='Facebook Messenger')?'Messenger':value.channel;
    
    $("#retres").append('<div class="col-md-4"><div class="mini-stat clearfix ' + classBg + ' rounded"><span class="mini-stat-icon"><i class="' + classIcon + '"></i></span> <div class = "mini-stat-info text-white float-right"><h3> ' + value.total + '</h3> ' + channel_name + '</div></div></div>')
}

function callSummaryInteraction(params, index_time){
    $.ajax({
        type: 'post',
        url: base_url + 'Summary-Traffic/cardMain',
        data: {
            params: params,
            index: index_time
        },
        success: function (r) {
            var response = JSON.parse(r);
            console.log(response);
            drawChartAndCard(response);
        },
        error: function (r) {
            alert("error");
        },
    });
}

function drawChartAndCard(response){
    //destroy div piechart
    $('#pieChart').remove(); // this is my <canvas> element
    $('#canvas-pie').append('<canvas id="pieChart" height="250px" class="donutShadow overflow-hidden"></canvas>');

    // destroy div card interaction channel
    $('#retres').remove(); // this is my <canvas> element
    $('#card-interaction-channel').append('<div id="retres"  class="row"></div>');

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
    // response.data_empty.forEach(function (value, index) {
    //     drawCardInteraction(value);
    //     arrTotal.push(value.total);
    //     arrChannel.push(value.channel);
    //     arrColor.push(getColorChannel(value.channel));
    // });

    // draw chart
    var ctx = document.getElementById("pieChart");
    ctx.height = 296;
    var myChart = new Chart(ctx, {
        type: 'pie',
        data: {
            datasets: [{
                labels: arrTotal,
                data: arrTotal,
                backgroundColor: arrColor,
                hoverBackgroundColor: arrColor
            }],
            labels: arrChannel
        },
        options: {
            maintainAspectRatio: false,
            responsive: true,
            legend: {
                display: false
            },
            pieceLabel: {
                render: 'legend',
                fontColor: '#000',
                position: 'outside',
                segment: true
            },
            legendCallback: function (chart, index) {
                var allData = chart.data.datasets[0].data;
                // console.log(chart)
                var legendHtml = [];
                legendHtml.push('<ul><div class="row">');
                allData.forEach(function (data, index) {
                    var label = chart.data.labels[index];
                    var dataLabel = allData[index];
                    var background = chart.data.datasets[0].backgroundColor[index]
                    var total = 0;
                    for (var i in allData) {
                        total += parseInt(allData[i]);
                    }
                    // console.log(total)
                    // var percentage = Math.round((dataLabel / total) * 100);
                    if(dataLabel != 0){
                        var percentage = parseFloat((dataLabel / total)*100).toFixed(1);
                    }else{
                        var percentage = Math.round((dataLabel / total) * 100);
                    }

                    legendHtml.push('<li class="col-md-4 col-lg-4 col-sm-6 col-xl-4">');
                    legendHtml.push('<span class="chart-legend"><div style="background-color:' + background + '" class="box-legend"></div>' + label + ' : ' + percentage + '%</span>');
                    legendHtml.push('</li>');
                })
                legendHtml.push('</ul></div>');
                return legendHtml.join("");
            },
        }
    });
    var myLegendContainer = document.getElementById("legend");
    myLegendContainer.innerHTML = myChart.generateLegend();
}

function callTotalInteraction(params, index_time){
    //call total interaction
    $.ajax({
        type: 'post',
        url: base_url + 'api/SummaryTraffic/SummaryTrafficChannel/total_interaction',
        data: {
            params: params,
            index: index_time
        },
        success: function (r) {
            var response = JSON.parse(r);
            // console.log(response);
            $("#total-interaction").html(response.data.total_interaction);
        },
        error: function (r) {
            // alert("error");
            console.log(r);
        },
    });
}

function callTotalUniqueCustomer(params, index_time){
       //call total unique customer
       $.ajax({
        type: 'post',
        url: base_url + 'api/SummaryTraffic/SummaryTrafficChannel/total_unique_customer',
        data: {
            params: params,
            index: index_time
        },
        success: function (r) {
            var response = JSON.parse(r);
            // console.log(response);
            $("#unique-customer").html(response.data.total_unique_customer);
        },
        error: function (r) {
            // alert("error");
            console.log(r);
        },
    });
}

function callAverageCustomer(params, index_time){
       //call avg customer
       $.ajax({
        type: 'post',
        url: base_url + 'api/SummaryTraffic/SummaryTrafficChannel/average_customer',
        data: {
            params: params,
            index: index_time
        },
        success: function (r) {
            var response = JSON.parse(r);
            // console.log(response);
            $("#avg-customer").html(response.data.average_customer);
        },
        error: function (r) {
            // alert("error");
            console.log(r);
        },
    });
}

function callUniqueCustomerPerChannel(params, index_time){
    // destroy div card unique customer per channel
    $('#retres-unique').remove(); // this is my <canvas> element
    $('#card-unique-customer-per-channel').append('<div class="row" id="retres-unique"></div>');
    $.ajax({
        type: 'post',
        url: base_url + 'api/SummaryTraffic/SummaryTrafficChannel/uniqueCustomerPerChannel',
        data: {
            params: params,
            index: index_time
        },
        success: function (r) {
            var response = JSON.parse(r);
            response.data.forEach(function (value, index) {
                let classBg = value.channel_name == "Whatsapp" ? "text-primary" : value.channel_name == "Email" ? "text-danger" : value.channel_name == "Twitter" ? "text-info" : value.channel_name == "Facebook" ? "text-blue" : value.channel_name == "Telegram" ? "text-dark" : value.channel_name == "Voice" ? "text-warning" : value.channel_name == "Instagram" ? "text-pink" : value.channel_name == "Facebook Messenger" ? "text-blue" : value.channel_name == "Twitter DM" ? "text-indigo" : value.channel_name == "Line" ? "text-success" : value.channel_name == "Live Chat" ? "text-gray1" : value.channel_name == "SMS" ? "text-blue-teal" : "";
                let classIcon = value.channel_name == "Whatsapp" ? "fab fa-whatsapp text-primary plan-icon" : value.channel_name == "Email" ? "fa fa-envelope text-danger plan-icon" : value.channel_name == "Twitter" ? "fab fa-twitter text-info plan-icon" : value.channel_name == "Facebook" ? "fab fa-facebook text-blue plan-icon" : value.channel_name == "Telegram" ? "fab fa-telegram text-dark plan-icon" : value.channel_name == "Voice" ? "fa fa-microphone text-warning plan-icon" : value.channel_name == "Instagram" ? "fab fa-instagram text-pink plan-icon" : value.channel_name == "Facebook Messenger" ? "fab fa-facebook-messenger text-blue plan-icon" : value.channel_name == "Twitter DM" ? "fa fa-mail-bulk text-indigo plan-icon" : value.channel_name == "Line" ? "fab fa-line text-success plan-icon" : value.channel_name == "Live Chat" ? "fa fa-comments text-gray1 plan-icon" : value.channel_name == "SMS" ? "fa fa-envelope-open text-blue-teal plan-icon" : "";

                $("#retres-unique").append('<div class="col-xl-3 border-right"><div class="card-body text-center"><i class="' + classIcon + '"></i><div class="dash3"><h5 class="text-muted">' + value.channel_name + '</h5><h4 class="counter ' + classBg + ' num-font">' + value.total_unique + '</h4></div></div></div>')
            });

            response.data_empty.forEach(function (value, index) {
                let classBg = value.channel == "Whatsapp" ? "text-primary" : value.channel == "Email" ? "text-danger" : value.channel == "Twitter" ? "text-info" : value.channel == "Facebook" ? "text-blue" : value.channel == "Telegram" ? "text-dark" : value.channel == "Voice" ? "text-warning" : value.channel == "Instagram" ? "text-pink" : value.channel == "Facebook Messenger" ? "text-blue" : value.channel== "Twitter DM" ? "text-indigo" : value.channel == "Line" ? "text-success" : value.channel == "Live Chat" ? "text-gray1" : value.channel == "SMS" ? "text-blue-teal" : "";
                let classIcon = value.channel == "Whatsapp" ? "fab fa-whatsapp text-primary plan-icon" : value.channel == "Email" ? "fa fa-envelope text-danger plan-icon" : value.channel == "Twitter" ? "fab fa-twitter text-info plan-icon" : value.channel == "Facebook" ? "fab fa-facebook text-blue plan-icon" : value.channel == "Telegram" ? "fab fa-telegram text-dark plan-icon" : value.channel == "Voice" ? "fa fa-microphone text-warning plan-icon" : value.channel == "Instagram" ? "fab fa-instagram text-pink plan-icon" : value.channel == "Facebook Messenger" ? "fab fa-facebook-messenger text-blue plan-icon" : value.channel == "Twitter DM" ? "fa fa-mail-bulk text-indigo plan-icon" : value.channel == "Line" ? "fab fa-line text-success plan-icon" : value.channel == "Live Chat" ? "fa fa-comments text-gray1 plan-icon" : value.channel == "SMS" ? "fa fa-envelope-open text-blue-teal plan-icon" : "";

                $("#retres-unique").append('<div class="col-xl-3 border-right"><div class="card-body text-center"><i class="' + classIcon + '"></i><div class="dash3"><h5 class="text-muted">' + value.channel + '</h5><h4 class="counter ' + classBg + ' num-font">' + value.total + '</h4></div></div></div>')
            });
        },
        error: function (r) {
            // alert("error");
            console.log(r);
        },
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
        loadContent(params_time , '11')
        $("#btn-day").prop("class","btn btn-light btn-sm");
        $("#btn-year").prop("class","btn btn-light btn-sm");
        $(this).prop("class","btn btn-danger btn-sm");
    });

    // btn year
    $('#btn-year').click(function(){
        params_time = 'year';
        // console.log(params_time);
        loadContent(params_time , '2019')
        $("#btn-month").prop("class","btn btn-light btn-sm");
        $("#btn-day").prop("class","btn btn-light btn-sm");
        $(this).prop("class","btn btn-danger btn-sm");
    });

})(jQuery);