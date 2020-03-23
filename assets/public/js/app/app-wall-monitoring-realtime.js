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

var v_params_this_year = m + '-' + n + '-' + (o-1);
var arr_tenant = [];
const sessionParams = JSON.parse(localStorage.getItem('Auth-infomedia'));
const tokenSession = JSON.parse(localStorage.getItem('Auth-token'));
if(sessionParams.TENANT_ID[0].TENANT_ID != ''){
    for(var i=0; i < sessionParams.TENANT_ID.length; i++){
        arr_tenant.push(sessionParams.TENANT_ID[i].TENANT_ID);
    }
}else{
    arr_tenant = [];
}
$(document).ready(function () {
    // console.log(arr_tenant);
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
        loadContent(tokenSession, arr_tenant);
        // drawBoxMonitoring();
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

async function loadContent(token, tenant_id){
    $("#filter-loader").fadeIn("slow");
    // callBoxMonitoring(tenant_id);
    callTableMonitoring(token, tenant_id);
    $("#filter-loader").fadeOut("slow");
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

function callTableMonitoring(token, tenant_id){
    $.ajax({
        beforeSend: function (xhr) {
            xhr.setRequestHeader("token", token);
        },
        type: 'post',
        url: base_url + 'api/Wallboard/WallboardController/getAvaildatawallmon',
        data: {
            tenant_id: tenant_id 
        },
        success: function (r) { 
            var response = r;
            
            if(response.status != false){
                $('#modalError').modal('hide');
                setTimeout(function(){callTableMonitoring(tenant_id);},10000);
                drawTableMonitoring(response);
            }else{
                var notif = alert('Your Account Credential is Invalid. Maybe someone else has logon to your account.')
                if(notif){
                    localStorage.clear();
                    window.location = base_url+'main/login';
                }else{
                    localStorage.clear();
                    window.location = base_url+'main/login';
                }
            }
        },
        error: function (r) {
            $('#modalError').modal('show');
            // setTimeout(function(){loopingBoxMonitoring(tenant_id);},5000);
        },
    });
}

function callBoxMonitoring(tenant_id){
	$.ajax({
        type: 'post',
        url: base_url + 'api/Wallboard/WallboardController/getAvaildatawallmon',
        data: {
            tenant_id: tenant_id 
        },
        success: function (r) { 
            var response = r;
            // console.log(response);
            $('#modalError').modal('hide');
            // setTimeout(function(){loopingBoxMonitoring(tenant_id);},5000);
            loopingBoxMonitoring(response);
        },
        error: function (r) {
            $('#modalError').modal('show');
            // setTimeout(function(){loopingBoxMonitoring(tenant_id);},5000);
        },
    });
}

function loopingBoxMonitoring(response)
{
	$('#parent-row').remove(); // this is my <div> element
    $('#parent-card').append('<div class="row" id="parent-row"></div>');

    // console.log(response.data)
    var i = 0;
    response.data.forEach(function(value,index){
    	drawBoxMonitoring(response.data[i]);
    	//console.log(value)
    i++;
    });
    // console.log(response.data[0].DATA[0]);
}

function drawBoxMonitoring(response)
{
	// console.log(response);
    $('#parent-row').append(''+
    '<div class="col-md-6">'+
        '<div class="card">'+
            '<div class="row">'+
                '<div class="col-md-3 ml-1">'+
                    '<img src='+response.TENANT_ICON+' class="rounded-circle2">'+
                    '<h6 class="font-weight-bold text-red text-center">'+response.TENANT_NAME+'</h6>'+
                    '<div class="row">'+
                        '<div class="ml-1 col-sm-7">'+
                            '<h6 class="font11 font-normal">Total Queue</h6>'+
                        '</div>'+
                        '<div class="col-sm-4">'+
                            '<h6 class="font11 font-bold">'+response.TOTAL_QUEUE+'</h6>'+
                        '</div>'+
                    '</div>'+
                    '<div class="row">'+
                        '<div class="ml-1 col-sm-7">'+
                            '<h6 class="font11 font-normal">Average SCR</h6>'+
                        '</div>'+
                        '<div class="col-sm-auto">'+
                            '<h6 class="font11 font-bold">'+response.TOTAL_SCR+'%</h6>'+
                        '</div>'+
                    '</div>'+
                    '<div class="row">'+
                        '<div class="ml-1 col-sm-7">'+
                            '<h6 class="font11 font-normal">Total COF</h6>'+
                        '</div>'+
                        '<div class="col-sm-auto">'+
                            '<h6 class="font11 font-bold">'+response.TOTAL_COF+'</h6>'+
                        '</div>'+
                    '</div>'+
                '</div>'+
                '<div class="col-md-4">'+
                    '<div class="card-box box-widget widget-user" style="border:0px; border-radius:0px; box-shadow:0 0 0 0; ">'+
                        '<div class="widget-user-header">'+
                            '<h3 class="widget-user-rtc font-weight-bold text-center">RTC</h3>'+
                        '</div>'+
                        '<div class="box-footer">'+
                            '<div class="row no-gutters">'+
                                '<div class="col-sm-4">'+
                                    '<div class="description-box">'+
                                        '<span class="text-muted font10">Queue</span>'+
                                        '<h6 class="description-header num-font mt-1">'+response.DATA[1].QUEUE+'</h6>'+
                                    '</div>'+
                                '</div>'+
                                '<div class="col-sm-4">'+
                                    '<div class="description-box">'+
                                        '<span class="text-muted font10">COF</span>'+
                                        '<h6 class="description-header num-font mt-1">'+response.DATA[1].COF+'</h6>'+
                                    '</div>'+
                                '</div>'+
                                '<div class="col-sm-4">'+
                                    '<div class="description-box">'+
                                        '<span class="text-muted font10">SCR</span>'+
                                        '<h6 class="description-header num-font mt-1">'+response.DATA[1].SCR+'%</h6>'+
                                    '</div>'+
                                '</div>'+
                            '</div>'+
                            '<div class="row no-gutters">'+
                                '<div class="col-sm-4">'+
                                    '<div class="description-box">'+
                                        '<span class="text-muted font10">ART</span>'+
                                        '<h6 class="description-header num-font mt-1">'+response.DATA[1].ART+'</h6>'+
                                    '</div>'+
                                '</div>'+
                                '<div class="col-sm-4">'+
                                    '<div class="description-box">'+
                                        '<span class="text-muted font10">AHT</span>'+
                                        '<h6 class="description-header num-font mt-1">'+response.DATA[1].AHT+'</h6>'+
                                    '</div>'+
                                '</div>'+
                                '<div class="col-sm-4">'+
                                    '<div class="description-box">'+
                                        '<span class="text-muted font10">AST</span>'+
                                        '<h6 class="description-header num-font mt-1">'+response.DATA[1].AST+'</h6>'+
                                   '</div>'+
                                '</div>'+
                            '</div>'+
                        '</div>'+
                    '</div>'+
                '</div>'+
                '<div class="col-md-4">'+
                    '<div class="card-box box-widget widget-user" style="border:0px; border-radius:0px; box-shadow:0 0 0 0; ">'+
                        '<div class="widget-user-header">'+
                            '<h3 class="widget-user-rtc font-weight-bold text-center">NON RTC</h3>'+
                        '</div>'+
                        '<div class="box-footer">'+
                            '<div class="row no-gutters">'+
                                '<div class="col-sm-4">'+
                                    '<div class="description-box">'+
                                        '<span class="text-muted font10">Queue</span>'+
                                        '<h6 class="description-header num-font mt-1">'+response.DATA[0].QUEUE+'</h6>'+
                                    '</div>'+
                                '</div>'+
                                '<div class="col-sm-4">'+
                                    '<div class="description-box">'+
                                        '<span class="text-muted font10">COF</span>'+
                                        '<h6 class="description-header num-font mt-1">'+response.DATA[0].COF+'</h6>'+
                                    '</div>'+
                                '</div>'+
                                '<div class="col-sm-4">'+
                                    '<div class="description-box">'+
                                        '<span class="text-muted font10">SCR</span>'+
                                        '<h6 class="description-header num-font mt-1">'+response.DATA[0].SCR+'%</h6>'+
                                    '</div>'+
                                '</div>'+
                            '</div>'+
                            '<div class="row no-gutters">'+
                                '<div class="col-sm-4">'+
                                    '<div class="description-box">'+
                                        '<span class="text-muted font10">ART</span>'+
                                        '<h6 class="description-header num-font mt-1">'+response.DATA[0].ART+'</h6>'+
                                    '</div>'+
                                '</div>'+
                                '<div class="col-sm-4">'+
                                    '<div class="description-box">'+
                                        '<span class="text-muted font10">AHT</span>'+
                                        '<h6 class="description-header num-font mt-1">'+response.DATA[0].AHT+'</h6>'+
                                    '</div>'+
                                '</div>'+
                                '<div class="col-sm-4">'+
                                    '<div class="description-box">'+
                                        '<span class="text-muted font10">AST</span>'+
                                        '<h6 class="description-header num-font mt-1">'+response.DATA[0].AST+'</h6>'+
                                    '</div>'+
                                '</div>'+
                            '</div>'+
                        '</div>'+
                    '</div>'+
                '</div>'+
            '</div>'+
        '</div>'+
    '</div>');
}

function drawTableMonitoring(response){
    $("#mytbody").empty();
	if (response.data.length != 0) {
        var total=0;
		for (var i = 0; i < response.data.length; i++) {
			$('#tableWallMonitoring').find('tbody').append('<tr>'+
                '<td class="text-center">'+(i+1)+'</td>'+
                '<td class="text-left"><img src="'+response.data[i].TENANT_ICON+'" class="img-tenant">'+response.data[i].TENANT_NAME+'</td>'+
                '<td class="text-right">'+response.data[i].TOTAL_QUEUE+'</td>'+
                '<td class="text-right">'+response.data[i].TOTAL_COF+'</td>'+
                '<td class="text-right">'+response.data[i].TOTAL_SCR+'%</td>'+
                '<td class="text-right">'+response.data[i].DATA[0].QUEUE+'</td>'+
                '<td class="text-right">'+response.data[i].DATA[0].COF+'</td>'+
                '<td class="text-right">'+response.data[i].DATA[0].SCR+'%</td>'+
                '<td class="text-right">'+response.data[i].DATA[0].ART+'</td>'+
                '<td class="text-right">'+response.data[i].DATA[0].AST+'</td>'+
                '<td class="text-right">'+response.data[i].DATA[0].AHT+'</td>'+
                '<td class="text-right">'+response.data[i].DATA[1].QUEUE+'</td>'+
                '<td class="text-right">'+response.data[i].DATA[1].COF+'</td>'+
                '<td class="text-right">'+response.data[i].DATA[1].SCR+'%</td>'+
                '<td class="text-right">'+response.data[i].DATA[1].ART+'</td>'+
                '<td class="text-right">'+response.data[i].DATA[1].AST+'</td>'+
                '<td class="text-right">'+response.data[i].DATA[1].AHT+'</td>'+
            +'</tr>')
        }
        
        $("#filter-loader ").fadeOut("slow");
	} else {
        $('#tableWallMonitoring').find('tbody').append('<tr>'+
           '<td class="text-center" colspan=28> No Data Available </td>'+
        '</tr>');
        $("#filter-loader ").fadeOut("slow");
	}
}