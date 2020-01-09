var base_url = $('#base_url').val();
var params_time = '';
var v_date = '';
var v_month = '';
var v_year = '';
var months = [
    'January', 'February', 'March', 'April', 'May',
    'June', 'July', 'August', 'September',
    'October', 'November', 'December'
    ];

$(document).ready(function () {
    // v_date = getToday();
    // v_month = getMonth();
    // v_year = getYear();
    params_time = 'day';
    v_date = '2019-12-02';
    v_month = '12';
    v_year = '2019';


    loadContent(params_time, v_date);
    $('#tag-time').html(v_date);
    $("#btn-month").prop("class","btn btn-light btn-sm");
    $("#btn-year").prop("class","btn btn-light btn-sm");
    $("#btn-day").prop("class","btn btn-red btn-sm");

});

//for convert numeric month to lettering month name
function monthNumToName(month) {
    return months[month - 1] || '';
}

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

function getToday(){
    var today = new Date();
    var dd = String(today.getDate()).padStart(2, '0');
    var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
    var yyyy = today.getFullYear();

    today = yyyy  + '-' + mm + '-' + (dd-1);
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
    $("#filter-loader").fadeIn("slow");
    callSummaryInteraction(params, index_time);
    callTotalInteraction(params, index_time);
    callTotalUniqueCustomer(params, index_time);
    callAverageCustomer(params, index_time);
    callUniqueCustomerPerChannel(params, index_time);
    callSummaryCaseTotAgent(params, index_time);
    $("#filter-loader").fadeOut("slow");
}

function drawCardInteraction(value){
    let classBg = value.channel == "Whatsapp" ? "bg-primary" : value.channel == "Email" ? "bg-danger" : value.channel == "Twitter" ? "bg-info" : value.channel == "Facebook" ? "bg-blue" : value.channel == "Telegram" ? "bg-dark" : value.channel == "Voice" ? "bg-warning" : value.channel == "Instagram" ? "bg-pink" : value.channel == "Facebook Messenger" ? "bg-blue-dark" : value.channel == "Twitter DM" ? "bg-indigo" : value.channel == "Line" ? "bg-success" : value.channel == "Live Chat" ? "bg-gray1" : value.channel == "SMS" ? "bg-blue-teal" : "";
    
    let classIcon = value.channel == "Whatsapp" ? "fab fa-whatsapp text-primary" : value.channel == "Email" ? "fa fa-envelope text-danger" : value.channel == "Twitter" ? "fab fa-twitter text-info" : value.channel == "Facebook" ? "fab fa-facebook text-blue" : value.channel == "Telegram" ? "fab fa-telegram text-dark" : value.channel == "Voice" ? "fa fa-microphone text-warning" : value.channel == "Instagram" ? "fab fa-instagram text-pink" : value.channel == "Facebook Messenger" ? "fab fa-facebook-messenger text-blue" : value.channel == "Twitter DM" ? "fa fa-mail-bulk text-indigo" : value.channel == "Line" ? "fab fa-line text-success" : value.channel == "Live Chat" ? "fa fa-comments text-gray1" : value.channel == "SMS" ? "fa fa-envelope-open text-blue-teal" : "";
    
    var channel_name = (value.channel==='Facebook Messenger')?'Messenger':value.channel;
    
    $("#retres").append('<div class="col-md-4"><div class="mini-stat clearfix ' + classBg + ' rounded"><span class="mini-stat-icon"><i class="' + classIcon + '"></i></span> <div class = "mini-stat-info text-white text-right"><h3> ' + value.total + '</h3> ' + channel_name + '</div></div></div>')
}

function drawCardInteractionNew(value){
    // draw
    $('#row-baru').append(''+
    '<div class="col-xl-4 col-lg-6 col-md-12">'+
        '<div class="mini-stat-summary clearfix rounded" style="background-color: '+value.channel_color+'">'+
            '<div class="row">'+
                '<div class="col-lg-4 ml-1">'+
                    '<div class="d-flex flex-row text-center">'+
                        '<div class="bd-highlight">'+
                            '<span class="mini-stat-icon bg-light">'+
                                '<i class="'+value.icon_dashboard+'" style="color: '+value.channel_color+'"></i>'+
                            '</span>'+  
                        '</div>'+
                    '</div>'+
                    '<div class="d-flex">'+
                        '<div class="mt-2 ml-1 text-white font-weight-extrabold">'+value.channel+'</div>'+
                    '</div>'+
                '</div>'+
                '<div class="col-md-auto mb-2">'+
                    '<h6 class="text-white font-weight-normal font-13">Unique Customer</h6>'+
                    '<h6 class="text-white font-weight-normal font-13">Total Session</h6>'+
                    '<h6 class="text-white font-weight-normal font-13">Message In</h6>'+
                    '<h6 class="text-white font-weight-normal font-13">Message Out</h6>'+
                    '<h6 class="text-white font-weight-normal font-13">SLA</h6>'+
                '</div>'+
                '<div class="col-md-auto text-right ml-1">'+
                    '<h6 class="text-white font-13">'+addCommas(value.total)+'</h6>'+
                    '<h6 class="text-white font-13">'+addCommas(value.total_session)+'</h6>'+
                    '<h6 class="text-white font-13">'+addCommas(value.msg_in)+'</h6>'+
                    '<h6 class="text-white font-13">'+addCommas(value.msg_out)+'</h6>'+
                    '<h6 class="text-white font-13">'+parseFloat((value.sla > 100) ? 100 : value.sla).toFixed(2)+' %</h6>'+
                '</div>'+
            '</div>'+
        '</div>'+
    '</div>');
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
            // console.log(response);
            drawChartAndCard(response);
        },
        error: function (r) {
            alert("error");
        },
    });
}

function drawChartAndCard(response){
    //destroy div piechart
    $('#pieSummary').remove(); // this is my <canvas> element
    $('#canvas-pie').append('<canvas id="pieSummary" class="donutShadow overflow-hidden"></canvas>');

    //destroy div card content
    $('#row-baru').remove(); // this is my <div> element
    $('#card-baru').append('<div id="row-baru" class="row"></div>');

    let arrTotal = []
    let arrChannel = []
    let arrColor = []

    // draw card yang ada datanya
    response.data.forEach(function (value, index) {
        drawCardInteractionNew(value);
        arrTotal.push(value.total);
        arrChannel.push(value.channel);
        arrColor.push(getColorChannel(value.channel));
    });

    // draw chart
    var ctx = document.getElementById("pieSummary");
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
            tooltips: {
              callbacks: {
                    label: function(tooltipItem, data) {
                        // var value = data.datasets[0].data[tooltipItem.index];
                        var value = data.datasets[0].data[tooltipItem.index];
                        value = value.toString();
                        value = value.split(/(?=(?:...)*$)/);
                        value = value.join(',');
                        return value;
                    }
              } // end callbacks:
            }, //end tooltips
            pieceLabel: {
                render: 'legend',
                fontColor: '#000',
                position: 'outside',
                segment: true,
                precision: 0,
                showActualPercentages: true,
            },
            legendCallback: function (chart, index) {
                var allData = chart.data.datasets[0].data;
                var legendHtml = [];
                legendHtml.push('<ul><div class="row ml-2">');
                allData.forEach(function (data, index) {
                    var label = chart.data.labels[index];
                    var dataLabel = allData[index];
                    var background = chart.data.datasets[0].backgroundColor[index];
                    var total = 0;
                    for (var i in allData) {
                        total += parseInt(allData[i]);
                    }
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

function addCommas(commas)
{
    commas += '';
    x = commas.split('.');
    x1 = x[0];
    x2 = x.length > 1 ? ',' + x[1] : '';
    var rgx = /(\d+)(\d{3})/;
    while (rgx.test(x1)) {
        x1 = x1.replace(rgx, '$1' + ',' + '$2');
    }
    return x1 + x2;
}

function numberWithCommas(x) {
    return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
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
            var commas = response.data.total_interaction;
            var functionCommas = addCommas(commas);
            // console.log(commas);
            // console.log(response);
            $("#total-interaction").html(functionCommas);  
            // console.log(functionCommas);
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
            var commas2 = response.data.total_unique_customer;
            var functionCommas2 = addCommas(commas2);
            // console.log(response);
            $("#unique-customer").html(functionCommas2);
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
            // console.log(response.data[0].total_unique);
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

function callSummaryCaseTotAgent(params, index_time){
    $.ajax({
        type: 'post',
        url: base_url + 'api/SummaryTraffic/SummaryTrafficChannel/getTotalCaseInCaseOut',
        data: {
            params: params,
            index: index_time
        },
        success: function (r) {
            var response = JSON.parse(r);
            // console.log(response);
            $('#msg-in').html(addCommas(response.data.msg_in));
            $('#msg-out').html(addCommas(response.data.msg_out));
            $('#tot-agent').html(addCommas(response.data.tot_agent));
            var sla = parseFloat(response.data.sla);
            $('#sla').html(sla.toFixed(2)+" %");
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
        loadContent(params_time , '2019-12-02');
        $('#tag-time').html(v_date);
        $("#btn-month").prop("class","btn btn-light btn-sm");
        $("#btn-year").prop("class","btn btn-light btn-sm");
        $(this).prop("class","btn btn-red btn-sm");
    });

    // btn month
    $('#btn-month').click(function(){
        params_time = 'month';
        // console.log(params_time);
        loadContent(params_time , '12')
        $('#tag-time').html(monthNumToName(v_month)+' '+v_year);
        $("#btn-day").prop("class","btn btn-light btn-sm");
        $("#btn-year").prop("class","btn btn-light btn-sm");
        $(this).prop("class","btn btn-red btn-sm");
    });

    // btn year
    $('#btn-year').click(function(){
        params_time = 'year';
        // console.log(params_time);
        loadContent(params_time , '2019')
        $('#tag-time').html(v_year);
        $("#btn-month").prop("class","btn btn-light btn-sm");
        $("#btn-day").prop("class","btn btn-light btn-sm");
        $(this).prop("class","btn btn-red btn-sm");
    });

})(jQuery);