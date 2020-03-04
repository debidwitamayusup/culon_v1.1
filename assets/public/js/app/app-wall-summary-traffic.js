var base_url = $('#base_url').val();
var params_time = '';
var v_date = '';
var v_month = '';
var v_year = '';
var v_params_tenant = 'oct_telkomcare';
var arr_tenant = [];
var months = [
    'January', 'February', 'March', 'April', 'May',
    'June', 'July', 'August', 'September',
    'October', 'November', 'December'
    ];
var d = new Date();
var o = d.getDate();
var n = d.getMonth()+1;
var m = d.getFullYear();
if (o < 10) {
  o = '0' + o;
} 
if (n < 10) {
  n = '0' + n;
}

//get yesterday
var v_params_this_year = m + '-' + n + '-' + (o-1);
const sessionParams = JSON.parse(localStorage.getItem('Auth-infomedia'));
for(var i=0; i < sessionParams.TENANT_ID.length; i++){
    arr_tenant.push(sessionParams.TENANT_ID[i].TENANT_ID);
}
$(document).ready(function () {
    console.log(arr_tenant);
    if(sessionParams){
        $('#select-month option[value='+n+']').attr('selected','selected');
        $('#dateTahun option[value='+m+']').attr('selected','selected');

        // v_date = getToday();
        // v_month = getMonth();
        // v_year = getYear();
        params_time = 'day';
        v_date = '2019-12-02';
        v_month = getMonth();
        v_year = getYear();

        $("#btn-day").prop("class","btn btn-red btn-sm");
        sessionStorage.removeItem('paramsSession');
        sessionStorage.setItem('paramsSession', 'day');

        if(sessionParams.TENANT_ID[0].TENANT_ID != ''){
            getTenant('', sessionParams.USERID);
        }else{
            getTenant('', '');
        }
        loadContent(params_time, v_params_this_year, 0, $('#layanan_name').val());
        
        $('#input-date-filter').datepicker("setDate", v_params_this_year);
        $('#filter-date').show();
        $('#filter-month').hide();
        $('#filter-year').hide();
        setMonthPicker();
        setYearPicker();
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
                for(i=0; i<response.data.length; i++){
                    html += '<option value='+response.data[i].TENANT_ID+'>'+response.data[i].TENANT_NAME+'</option>';
                }
                $('#layanan_name').html(html);
        },
        error: function (r) {
            //console.log(r);
            alert("error");
        },
    });
}


//for dinamic dropdown year on month
function callYearOnMonth()
{
    var data = "";
    var base_url = $('#base_url').val();
    // console.log(year);

    $.ajax({
        type: 'POST',
        url: base_url + 'api/SummaryTraffic/SummaryYear/optionYear',
        // data: {
        //     "niceDate" : niceDate
        // },

        success: function (r) {
            $('#modalError').modal('hide');
            var data_option = [];
            var dateTahun = $("#select-year-on-month");
            var response = JSON.parse(r);

            // var html = '<option value="2020">2020</option>';
            var html = '';
            var monthOption = '';
            var i;
                for(i=0; i<response.data.niceDate.length; i++){
                    html += '<option value='+response.data.niceDate[i]+'>'+response.data.niceDate[i]+'</option>';
                }
                $('#select-year-on-month').html(html);

                // monthOption = '<option value="01">January</option>'+
                //                 '<option value="02">February</option>'+
                //                 '<option value="03">March</option>'+
                //                 '<option value="04">April</option>'+
                //                 '<option value="05">May</option>'+
                //                 '<option value="06">June</option>'+
                //                 '<option value="07">July</option>'+
                //                 '<option value="08">August</option>'+
                //                 '<option value="09">September</option>'+
                //                 '<option value="10">October</option>'+
                //                 '<option value="11">November</option>'+
                //                 '<option value="12">December</option>';
                // $('#select-month').html(monthOption);                            
            // var option = $ ("<option />");
            //     option.html(i);
            //     option.val(i);
            //     dateTahun.append(option);
        },
        error: function (r) {
            //console.log(r);
            $('#modalError').modal('show');
            setTimeout(function(){callYearOnMonth();},5000);
        },
    });
}

//for dinamic dropdown year on year
function callYear()
{
    var data = "";
    var base_url = $('#base_url').val();
    // console.log(year);

    $.ajax({
        type: 'POST',
        url: base_url + 'api/SummaryTraffic/SummaryYear/optionYear',
        // data: {
        //     "niceDate" : niceDate
        // },

        success: function (r) {
            $('#modalError').modal('hide');
            var data_option = [];
            var dateTahun = $("#select-year-only");
            var response = JSON.parse(r);

            // var html = '<option value="2020">2020</option>';
            var html = '';
            var i;
                for(i=0; i<response.data.niceDate.length; i++){
                    html += '<option value='+response.data.niceDate[i]+'>'+response.data.niceDate[i]+'</option>';
                }
                $('#select-year-only').html(html);
            
            // var option = $ ("<option />");
            //     option.html(i);
            //     option.val(i);
            //     dateTahun.append(option);
        },
        error: function (r) {
            //console.log(r);
            $('#modalError').modal('show');
            setTimeout(function(){callYear();},5000);
        },
    });
}

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
    color['ChatBot'] = '#6e273e';

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

async function loadContent(params, index_time, params_year, tenant_id){
    $("#filter-loader").fadeIn("slow");
    callSummaryInteraction(params, index_time, params_year, tenant_id);
    callTotalInteraction(params, index_time, params_year, tenant_id);
    callTotalUniqueCustomer(params, index_time, params_year, tenant_id);
    // callAverageCustomer(params, index_time);
    callUniqueCustomerPerChannel(params, index_time, params_year, tenant_id);
    callSummaryCaseTotAgent(params, index_time, params_year, tenant_id);
    $("#filter-loader").fadeOut("slow");
}

function drawCardInteraction(value){
    let classBg = value.channel == "Whatsapp" ? "bg-primary" : value.channel == "Email" ? "bg-danger" : value.channel == "Twitter" ? "bg-info" : value.channel == "Facebook" ? "bg-blue" : value.channel == "Telegram" ? "bg-dark" : value.channel == "Voice" ? "bg-warning" : value.channel == "Instagram" ? "bg-pink" : value.channel == "Facebook Messenger" ? "bg-blue-dark" : value.channel == "Twitter DM" ? "bg-indigo" : value.channel == "Line" ? "bg-success" : value.channel == "Live Chat" ? "bg-gray1" : value.channel == "SMS" ? "bg-blue-teal" : "";
    
    let classIcon = value.channel == "Whatsapp" ? "fab fa-whatsapp text-primary" : value.channel == "Email" ? "fa fa-envelope text-danger" : value.channel == "Twitter" ? "fab fa-twitter text-info" : value.channel == "Facebook" ? "fab fa-facebook text-blue" : value.channel == "Telegram" ? "fab fa-telegram text-dark" : value.channel == "Voice" ? "fa fa-microphone text-warning" : value.channel == "Instagram" ? "fab fa-instagram text-pink" : value.channel == "Facebook Messenger" ? "fab fa-facebook-messenger text-blue" : value.channel == "Twitter DM" ? "fa fa-mail-bulk text-indigo" : value.channel == "ChatBot" ? "fe fe-messenger-square text-indigo" : value.channel == "Line" ? "fab fa-line text-success" : value.channel == "Live Chat" ? "fa fa-comments text-gray1" : value.channel == "SMS" ? "fa fa-envelope-open text-blue-teal" : "";
    
    var channel_name = (value.channel==='Facebook Messenger')?'Messenger':value.channel;
    
    $("#retres").append('<div class="col-md-4"><div class="mini-stat clearfix ' + classBg + ' rounded"><span class="mini-stat-icon"><i class="' + classIcon + '"></i></span> <div class = "mini-stat-info text-white text-right"><h3> ' + value.total + '</h3> ' + channel_name + '</div></div></div>')
}

function drawCardInteractionNew(value){
    // draw
    $('#row-baru').append(''+
    '<div class="col-xl-4 col-lg-4 col-md-12">'+
        '<div class="mini-stat-summary clearfix rounded" style="background: '+value.channel_color+'">'+
            '<div class="row">'+
                '<div class="col-sm-3 mr-1 ml-2">'+
                    '<div class="d-flex flex-row text-center">'+
                        '<div class="bd-highlight">'+
                            '<img src="'+value.image_icon+'" style="height:50px">'+
                        '</div>'+
                    '</div>'+
                    '<div class="d-flex">'+
                        '<div class="mt-2 text-white font10 font-weight-extrabold">'+value.channel+'</div>'+
                    '</div>'+
                '</div>'+
                '<div class="col-sm-auto mb-2">'+
                    '<h6 class="text-white font-weight-normal font10">Unique Customer </h6>'+
                    '<h6 class="text-white font-weight-normal font10">Total Session</h6>'+
                    '<h6 class="text-white font-weight-normal font10">Message In</h6>'+
                    '<h6 class="text-white font-weight-normal font10">Message Out</h6>'+
                    '<h6 class="text-white font-weight-normal font10">SLA</h6>'+
                '</div>'+
                '<div class="col-sm-auto text-right">'+
                    '<h6 class="text-white font10">'+addCommas(value.total)+'</h6>'+
                    '<h6 class="text-white font10">'+addCommas(value.total_session)+'</h6>'+
                    '<h6 class="text-white font10">'+addCommas(value.msg_in)+'</h6>'+
                    '<h6 class="text-white font10">'+addCommas(value.msg_out)+'</h6>'+
                    '<h6 class="text-white font10">'+parseFloat((value.sla > 100) ? 100 : value.sla).toFixed(2)+' %</h6>'+
                '</div>'+
            '</div>'+
        '</div>'+
    '</div>');
}

function callSummaryInteraction(params, index_time, params_year, tenant_id){
    $.ajax({
        type: 'post',
        url: base_url + 'Summary-Traffic/cardMain',
        data: {
            params: params,
            index: index_time,
            params_year: params_year,
            tenant_id: $("#layanan_name").val()
        },
        success: function (r) { 
            var response = JSON.parse(r);
            // console.log(response);
            $('#modalError').modal('hide');
            setTimeout(function(){callSummaryInteraction(params, index_time, params_year, $("#layanan_name").val());},5000);
            drawChartAndCard(response);
        },
        error: function (r) {
            $('#modalError').modal('show');
            setTimeout(function(){callSummaryInteraction(params, index_time, params_year, $("#layanan_name").val());},5000);
        },
    });
}

function drawChartAndCard(response){
    //destroy div piechart
    $('#pieWallSummaryTraffic').remove(); // this is my <canvas> element
    $('#canvas-pie').append('<canvas id="pieWallSummaryTraffic" class="donutShadow overflow-hidden"></canvas>');

    //destroy div card content
    $('#row-baru').remove(); // this is my <div> element
    $('#card-baru').append('<div id="row-baru" class="row"></div>');

    let arrTotal = []
    let arrChannel = []
    let arrColor = []
    
    // draw card yang ada datanya
    response.data.forEach(function (value, index) {
        drawCardInteractionNew(value);
        arrTotal.push(value.total_session);
        arrChannel.push(value.channel);
        arrColor.push(getColorChannel(value.channel));
    });

    // draw chart
    var ctx = document.getElementById("pieWallSummaryTraffic");
    ctx.height = 294;
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
            animation: false,
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
                        value = value.join('.');
                        return data.labels[tooltipItem.index]+': '+ value;
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
                // console.log(chart);
                var allData = chart.data.datasets[0].data;
                var legendHtml = [];
                legendHtml.push('<ul><div class="row mb-3 mt-2 ml-2">');
                allData.forEach(function (data, index) {
                    if (allData[index] != 0) {
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

                        legendHtml.push('<li class="col-md-6 col-lg-6">');
                        legendHtml.push('<span class="chart-legend"><div style="background-color:' + background + '" class="box-legend"></div>' + label + ' : ' + percentage + '%</span>');
                        legendHtml.push('</li>');
                    }else{
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

                        legendHtml.push('<li class="col-md-6 col-lg-6">');
                        legendHtml.push('<span class="chart-legend"><div style="background-color:' + background + '" class="box-legend"></div>' + label + ' : ' + '0' + '%</span>');
                        legendHtml.push('</li>');
                    }
                })
                legendHtml.push('</ul></div>');
                return legendHtml.join("");
            },
            //untuk onclick pada chart javascript
            onClick: function(event, array) {
                let element = this.getElementAtEvent(event);
                if (element.length > 0) {
                var series= element[0]._model.datasetLabel;
                var label = element[0]._model.label;
                var value = this.data.datasets[element[0]._datasetIndex].data[element[0]._index];
                alert("Sessions of "+label+" is "+value);
                }
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
    x2 = x.length > 1 ? '.' + x[1] : '';
    var rgx = /(\d+)(\d{3})/;
    while (rgx.test(x1)) {
        x1 = x1.replace(rgx, '$1' + '.' + '$2');
    }
    return x1 + x2;
}

function numberWithCommas(x) {
    return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
}

function callTotalInteraction(params, index_time, params_year, tenant_id){
    //call total interaction
    $.ajax({
        type: 'post',
        url: base_url + 'api/SummaryTraffic/SummaryTrafficChannel/total_interaction',
        data: {
            params: params,
            index: index_time,
            params_year: params_year,
            tenant_id: tenant_id
        },
        success: function (r) {
            var response = JSON.parse(r);
            var commas = response.data.total_interaction;
            var functionCommas = addCommas(commas);
            // console.log(commas);
            $('#modalError').modal('hide');
            setTimeout(function(){callTotalInteraction(params, index_time, params_year, $("#layanan_name").val());},5000);
            $("#total-interaction").html(functionCommas);  
            // console.log(functionCommas);
        },
        error: function (r) {
            // alert("error");
            // console.log(r);
            $('#modalError').modal('show');
            setTimeout(function(){callTotalInteraction(params, index_time, params_year, $("#layanan_name").val());},5000);
        },
    });
}

function callTotalUniqueCustomer(params, index_time, params_year, tenant_id){
       //call total unique customer
       $.ajax({
        type: 'post',
        url: base_url + 'api/SummaryTraffic/SummaryTrafficChannel/total_unique_customer',
        data: {
            params: params,
            index: index_time,
            params_year: params_year,
            tenant_id: tenant_id
        },
        success: function (r) {
            var response = JSON.parse(r);
            var commas2 = response.data.total_unique_customer;
            $('#modalError').modal('hide');
            setTimeout(function(){callTotalUniqueCustomer(params, index_time, params_year, $("#layanan_name").val());},5000);
            var functionCommas2 = addCommas(commas2);
            // console.log(response);
            $("#unique-customer").html(functionCommas2);
        },
        error: function (r) {
            // alert("error");
            // console.log(r);
            $('#modalError').modal('hide');
            setTimeout(function(){callTotalUniqueCustomer(params, index_time, params_year, $("#layanan_name").val());},5000);
        },
    });
}

function callAverageCustomer(params, index_time, params_year, tenant_id){
       //call avg customer
    $.ajax({
        type: 'post',
        url: base_url + 'api/SummaryTraffic/SummaryTrafficChannel/average_customer',
        data: {
            params: params,
            index: index_time,
            params_year: params_year,
            tenant_id: tenant_id
        },
        success: function (r) {
            var response = JSON.parse(r);
            // console.log(response);
            $('#modalError').modal('hide');
            setTimeout(function(){callAverageCustomer(params, index_time, params_year, $("#layanan_name").val());},5000);
            $("#avg-customer").html(response.data.average_customer);
        },
        error: function (r) {
            // alert("error");
            // console.log(r);
            $('#modalError').modal('hide');
            setTimeout(function(){callAverageCustomer(params, index_time, params_year, $("#layanan_name").val());},5000);
        },
    });
}

function callUniqueCustomerPerChannel(params, index_time, params_year, tenant_id){
    // destroy div card unique customer per channel
    $('#retres-unique').remove(); // this is my <canvas> element
    $('#card-unique-customer-per-channel').append('<div class="row" id="retres-unique"></div>');
    $.ajax({
        type: 'post',
        url: base_url + 'api/SummaryTraffic/SummaryTrafficChannel/uniqueCustomerPerChannel',
        data: {
            params: params,
            index: index_time,
            params_year,
            tenant_id: tenant_id
        },
        success: function (r) {
            var response = JSON.parse(r);
            $('#modalError').modal('hide');
            setTimeout(function(){callUniqueCustomerPerChannel(params, index_time, params_year, $("#layanan_name").val());},5000);
            // console.log(response.data[0].total_unique);
            // console.log(response.data);
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
            // console.log(r);
            $('#modalError').modal('show');
            setTimeout(function(){callUniqueCustomerPerChannel(params, index_time, params_year, $("#layanan_name").val());},5000);
        },
    });
}

function callSummaryCaseTotAgent(params, index_time, params_year, tenant_id){
    $.ajax({
        type: 'post',
        url: base_url + 'api/SummaryTraffic/SummaryTrafficChannel/getTotalCaseInCaseOut',
        data: {
            params: params,
            index: index_time,
            params_year,
            tenant_id: tenant_id
        },
        success: function (r) {
            var response = JSON.parse(r);
            $('#modalError').modal('hide');
            setTimeout(function(){callSummaryCaseTotAgent(params, index_time, params_year, $("#layanan_name").val());},5000);
            // console.log(response);
            $('#msg-in').html(addCommas(response.data.msg_in));
            $('#msg-out').html(addCommas(response.data.msg_out));
            $('#tot-agent').html(addCommas(response.data.tot_agent));
            var sla = parseFloat(response.data.sla);
            $('#sla').html(sla.toFixed(2)+" %");
        },
        error: function (r) {
            $('#modalError').modal('show');
            setTimeout(function(){callSummaryCaseTotAgent(params, index_time, params_year, $("#layanan_name").val());},5000);
            // console.log(r);
        },
    });
}

function setDatePicker(){
    $(".datepicker").datepicker({
        format: "yyyy-mm-dd",
        todayHighlight: true,
        autoclose: true
    }).attr("readonly", "readonly").css({"cursor":"pointer", "background":"white"});
}

//jquery
(function ($) {
    $('#layanan_name').change(function(){
        loadContent('day', v_params_this_year, 0, $('#layanan_name').val());
    });
})(jQuery);