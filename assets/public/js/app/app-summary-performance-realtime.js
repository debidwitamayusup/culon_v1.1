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

// var dataset = [];
var dataset = {
    "status": true,
    "message": "Data available!",
    "data_amt": 61,
    "data": [
        {
            "TENANT_NAME": "Adira Finance",
            "ART": "1:26:59",
            "AHT": "0:07:26",
            "AST": "1:34:26",
            "COF": "15439",
            "SCR": "85.67"
        },
        {
            "TENANT_NAME": "ASDP Ferry",
            "ART": "0:00:39",
            "AHT": "0:00:03",
            "AST": "0:00:44",
            "COF": "6",
            "SCR": "0.00"
        },
        {
            "TENANT_NAME": "Bank Jateng",
            "ART": "0:57:04",
            "AHT": "0:05:45",
            "AST": "1:02:51",
            "COF": "30",
            "SCR": "50.00"
        },
        {
            "TENANT_NAME": "Biofarma",
            "ART": "1:06:04",
            "AHT": "0:05:12",
            "AST": "1:11:17",
            "COF": "160",
            "SCR": "56.05"
        },
        {
            "TENANT_NAME": "The Body Shop",
            "ART": "3:23:51",
            "AHT": "0:06:19",
            "AST": "3:28:00",
            "COF": "21879",
            "SCR": "60.16"
        },
        {
            "TENANT_NAME": "BPRD Jakarta",
            "ART": "7:19:43",
            "AHT": "0:01:45",
            "AST": "7:12:09",
            "COF": "6220",
            "SCR": "42.35"
        },
        {
            "TENANT_NAME": "Ditjen Dukcapil Kemandagri",
            "ART": "1:17:23",
            "AHT": "0:38:35",
            "AST": "1:55:59",
            "COF": "74792",
            "SCR": "82.99"
        },
        {
            "TENANT_NAME": "Erajaya Swasembada",
            "ART": "8:44:37",
            "AHT": "0:24:22",
            "AST": "9:07:43",
            "COF": "12393",
            "SCR": "95.44"
        },
        {
            "TENANT_NAME": "Indomaret",
            "ART": "5:52:59",
            "AHT": "0:02:05",
            "AST": "5:55:04",
            "COF": "1",
            "SCR": "100.00"
        },
        {
            "TENANT_NAME": "Jalin Pembayaran Nusantara",
            "ART": "0:00:00",
            "AHT": "0:00:00",
            "AST": "0:00:02",
            "COF": "93",
            "SCR": "0.00"
        },
        {
            "TENANT_NAME": "Jakrindo",
            "ART": "0:34:51",
            "AHT": "0:00:24",
            "AST": "0:35:15",
            "COF": "1",
            "SCR": "0.00"
        },
        {
            "TENANT_NAME": "Kimiafarma",
            "ART": "4:08:07",
            "AHT": "0:08:19",
            "AST": "4:16:27",
            "COF": "143",
            "SCR": "4.10"
        },
        {
            "TENANT_NAME": "LPS",
            "ART": "4:02:45",
            "AHT": "0:02:44",
            "AST": "3:56:19",
            "COF": "369",
            "SCR": "92.44"
        },
        {
            "TENANT_NAME": "Melon",
            "ART": "1:23:28",
            "AHT": "0:01:25",
            "AST": "1:24:06",
            "COF": "4590",
            "SCR": "99.27"
        },
        {
            "TENANT_NAME": "Mandiri Tunas Finance",
            "ART": "1:04:36",
            "AHT": "0:12:42",
            "AST": "1:17:18",
            "COF": "2621",
            "SCR": "81.45"
        },
        {
            "TENANT_NAME": "BPBD Padang Pariaman",
            "ART": "2:45:13",
            "AHT": "0:00:13",
            "AST": "2:45:26",
            "COF": "84",
            "SCR": "2.94"
        },
        {
            "TENANT_NAME": "Pegadaian",
            "ART": "0:38:31",
            "AHT": "0:07:11",
            "AST": "0:45:43",
            "COF": "5865",
            "SCR": "61.41"
        },
        {
            "TENANT_NAME": "Perum Perhutani",
            "ART": "2:38:17",
            "AHT": "0:02:18",
            "AST": "2:40:34",
            "COF": "1081",
            "SCR": "70.59"
        },
        {
            "TENANT_NAME": "Pertamina",
            "ART": "0:15:02",
            "AHT": "0:01:53",
            "AST": "0:15:10",
            "COF": "10901",
            "SCR": "49.14"
        },
        {
            "TENANT_NAME": "Pos Indonesia",
            "ART": "0:23:46",
            "AHT": "0:06:14",
            "AST": "0:29:14",
            "COF": "171689",
            "SCR": "76.51"
        },
        {
            "TENANT_NAME": "Prima Armada",
            "ART": "0:00:00",
            "AHT": "0:00:00",
            "AST": "0:00:02",
            "COF": "8",
            "SCR": "0.00"
        },
        {
            "TENANT_NAME": "PTSP Badung Bali",
            "ART": "1:37:34",
            "AHT": "0:12:11",
            "AST": "1:49:45",
            "COF": "5",
            "SCR": "0.00"
        },
        {
            "TENANT_NAME": "TDSCC Pertamina",
            "ART": "1:15:37",
            "AHT": "3:33:32",
            "AST": "4:49:09",
            "COF": "1506",
            "SCR": "95.60"
        },
        {
            "TENANT_NAME": "Telkom Care",
            "ART": "1:58:10",
            "AHT": "0:06:59",
            "AST": "2:03:12",
            "COF": "999698",
            "SCR": "58.36"
        },
        {
            "TENANT_NAME": "Telkomsel",
            "ART": "0:06:23",
            "AHT": "0:09:42",
            "AST": "0:15:27",
            "COF": "234995",
            "SCR": "70.26"
        },
        {
            "TENANT_NAME": "Tugu Insurance Brokers",
            "ART": "0:15:28",
            "AHT": "0:00:30",
            "AST": "0:15:51",
            "COF": "12655",
            "SCR": "30.94"
        },
        {
            "TENANT_NAME": "Volvo",
            "ART": "0:12:34",
            "AHT": "0:01:48",
            "AST": "0:13:47",
            "COF": "667",
            "SCR": "90.00"
        },
        {
            "TENANT_NAME": "Volvo",
            "ART": "0:12:34",
            "AHT": "0:01:48",
            "AST": "0:13:47",
            "COF": "667",
            "SCR": "90.00"
        },
        {
            "TENANT_NAME": "Volvo",
            "ART": "0:12:34",
            "AHT": "0:01:48",
            "AST": "0:13:47",
            "COF": "667",
            "SCR": "90.00"
        },
        {
            "TENANT_NAME": "Volvo",
            "ART": "0:12:34",
            "AHT": "0:01:48",
            "AST": "0:13:47",
            "COF": "667",
            "SCR": "90.00"
        },
        {
            "TENANT_NAME": "Volvo",
            "ART": "0:12:34",
            "AHT": "0:01:48",
            "AST": "0:13:47",
            "COF": "667",
            "SCR": "90.00"
        },
        {
            "TENANT_NAME": "Volvo",
            "ART": "0:12:34",
            "AHT": "0:01:48",
            "AST": "0:13:47",
            "COF": "667",
            "SCR": "90.00"
        },
        {
            "TENANT_NAME": "Volvo",
            "ART": "0:12:34",
            "AHT": "0:01:48",
            "AST": "0:13:47",
            "COF": "667",
            "SCR": "90.00"
        },
        {
            "TENANT_NAME": "Volvo",
            "ART": "0:12:34",
            "AHT": "0:01:48",
            "AST": "0:13:47",
            "COF": "667",
            "SCR": "90.00"
        },
        {
            "TENANT_NAME": "Volvo",
            "ART": "0:12:34",
            "AHT": "0:01:48",
            "AST": "0:13:47",
            "COF": "667",
            "SCR": "90.00"
        },
        {
            "TENANT_NAME": "Volvo",
            "ART": "0:12:34",
            "AHT": "0:01:48",
            "AST": "0:13:47",
            "COF": "667",
            "SCR": "90.00"
        },
        {
            "TENANT_NAME": "Volvo",
            "ART": "0:12:34",
            "AHT": "0:01:48",
            "AST": "0:13:47",
            "COF": "667",
            "SCR": "90.00"
        },
        {
            "TENANT_NAME": "Volvo",
            "ART": "0:12:34",
            "AHT": "0:01:48",
            "AST": "0:13:47",
            "COF": "667",
            "SCR": "90.00"
        },
        {
            "TENANT_NAME": "Volvo",
            "ART": "0:12:34",
            "AHT": "0:01:48",
            "AST": "0:13:47",
            "COF": "667",
            "SCR": "90.00"
        },
        {
            "TENANT_NAME": "Volvo",
            "ART": "0:12:34",
            "AHT": "0:01:48",
            "AST": "0:13:47",
            "COF": "667",
            "SCR": "90.00"
        },
        {
            "TENANT_NAME": "Volvo",
            "ART": "0:12:34",
            "AHT": "0:01:48",
            "AST": "0:13:47",
            "COF": "667",
            "SCR": "90.00"
        },
        {
            "TENANT_NAME": "Volvo",
            "ART": "0:12:34",
            "AHT": "0:01:48",
            "AST": "0:13:47",
            "COF": "667",
            "SCR": "90.00"
        },
        {
            "TENANT_NAME": "Volvo",
            "ART": "0:12:34",
            "AHT": "0:01:48",
            "AST": "0:13:47",
            "COF": "667",
            "SCR": "90.00"
        },
        {
            "TENANT_NAME": "Volvo",
            "ART": "0:12:34",
            "AHT": "0:01:48",
            "AST": "0:13:47",
            "COF": "667",
            "SCR": "90.00"
        },
        {
            "TENANT_NAME": "Volvo",
            "ART": "0:12:34",
            "AHT": "0:01:48",
            "AST": "0:13:47",
            "COF": "667",
            "SCR": "90.00"
        },
        {
            "TENANT_NAME": "Volvo",
            "ART": "0:12:34",
            "AHT": "0:01:48",
            "AST": "0:13:47",
            "COF": "667",
            "SCR": "90.00"
        },
        {
            "TENANT_NAME": "Volvo",
            "ART": "0:12:34",
            "AHT": "0:01:48",
            "AST": "0:13:47",
            "COF": "667",
            "SCR": "90.00"
        },
        {
            "TENANT_NAME": "Volvo",
            "ART": "0:12:34",
            "AHT": "0:01:48",
            "AST": "0:13:47",
            "COF": "667",
            "SCR": "90.00"
        },
        {
            "TENANT_NAME": "Volvo",
            "ART": "0:12:34",
            "AHT": "0:01:48",
            "AST": "0:13:47",
            "COF": "667",
            "SCR": "90.00"
        },
        {
            "TENANT_NAME": "Volvo",
            "ART": "0:12:34",
            "AHT": "0:01:48",
            "AST": "0:13:47",
            "COF": "667",
            "SCR": "90.00"
        },
        {
            "TENANT_NAME": "Volvo",
            "ART": "0:12:34",
            "AHT": "0:01:48",
            "AST": "0:13:47",
            "COF": "667",
            "SCR": "90.00"
        },
        {
            "TENANT_NAME": "Volvo",
            "ART": "0:12:34",
            "AHT": "0:01:48",
            "AST": "0:13:47",
            "COF": "667",
            "SCR": "90.00"
        },
        {
            "TENANT_NAME": "Volvo",
            "ART": "0:12:34",
            "AHT": "0:01:48",
            "AST": "0:13:47",
            "COF": "667",
            "SCR": "90.00"
        },
        {
            "TENANT_NAME": "Volvo",
            "ART": "0:12:34",
            "AHT": "0:01:48",
            "AST": "0:13:47",
            "COF": "667",
            "SCR": "90.00"
        },
        {
            "TENANT_NAME": "Volvo",
            "ART": "0:12:34",
            "AHT": "0:01:48",
            "AST": "0:13:47",
            "COF": "667",
            "SCR": "90.00"
        },
        {
            "TENANT_NAME": "Volvo",
            "ART": "0:12:34",
            "AHT": "0:01:48",
            "AST": "0:13:47",
            "COF": "667",
            "SCR": "90.00"
        },
        {
            "TENANT_NAME": "Volvo",
            "ART": "0:12:34",
            "AHT": "0:01:48",
            "AST": "0:13:47",
            "COF": "667",
            "SCR": "90.00"
        },
        {
            "TENANT_NAME": "Volvo",
            "ART": "0:12:34",
            "AHT": "0:01:48",
            "AST": "0:13:47",
            "COF": "667",
            "SCR": "90.00"
        },
        {
            "TENANT_NAME": "Volvo",
            "ART": "0:12:34",
            "AHT": "0:01:48",
            "AST": "0:13:47",
            "COF": "667",
            "SCR": "90.00"
        },
        {
            "TENANT_NAME": "Volvo",
            "ART": "0:12:34",
            "AHT": "0:01:48",
            "AST": "0:13:47",
            "COF": "667",
            "SCR": "90.00"
        },
        {
            "TENANT_NAME": "Volvo",
            "ART": "0:12:34",
            "AHT": "0:01:48",
            "AST": "0:13:47",
            "COF": "667",
            "SCR": "90.00"
        }
    ]
}

if(sessionParams.TENANT_ID[0].TENANT_ID != ''){
    for(var i=0; i < sessionParams.TENANT_ID.length; i++){
        arr_tenant.push(sessionParams.TENANT_ID[i].TENANT_ID);
    }
}else{
    arr_tenant = [];
}
$(document).ready(function(){
    if(sessionParams){
        $('#select-month option[value='+n+']').attr('selected','selected');
        $('#dateTahun option[value='+m+']').attr('selected','selected');

        params_time = 'day';
        v_date = getToday();
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

        $("#filter-loader").fadeIn("slow");
        callThreeTable(params_time, v_params_this_year, 0, arr_tenant, 0, 30);
        callPieChartSummary(params_time, v_params_this_year, 0, arr_tenant);
        callBarLayanan(params_time, v_params_this_year, 0, arr_tenant);
        callLineChart(params_time, v_params_this_year, 0, arr_tenant);
        // callTotalTable(params_time, v_params_this_year, 0, arr_tenant);
        $("#filter-loader").fadeOut("slow");

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
            alert("error");
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
            alert("error");
        },
    });
}

//for convert numeric month to lettering month name
function monthNumToName(month) {
    return months[month - 1] || '';
}

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

function callThreeTable(params, index_time, params_year, tenant_id, offset, limit){
    $.ajax({
        type: 'POST',
        url: base_url + 'api/OperationPerformance/SummaryPerformance/summaryPerformanceDashboard',
        data: {
            params: params,
            index: index_time,
            params_year: params_year,
            tenant_id: tenant_id,
            offset: offset,
            limit: limit
        },
        success: function (r) {
            var response = r;
            // var response = dataset;
            $('#modalError').modal('hide');
            // setTimeout(function(){callThreeTable(date, arr_tenant);},5000);
            drawTableRealTime(response, params, index_time, params_year, tenant_id, offset, limit);
            drawTotalTable(response);
        },
        error: function (r) {
            // console.log(r);
            $('#modalError').modal('show');
            // setTimeout(function(){callThreeTable(date, arr_tenant);},5000);
            // $("#filter-loader").fadeOut("slow");
        },
    });
}

function drawTableRealTime(response, params, index_time, params_year, tenant_id, offset, limit){
    // for (var i = 0; i < 10; i++) {
    //     console.log(response.data[i].TENANT_NAME);
    // }
    var s = limit;
    var h = 0;
    var t = 0;

    if (offset == 0){
        h = 0;
    }else{
        h = (s*Number(offset));
        t = (s*Number(offset));
    }
    $('#mytbody_1').empty();
    if (response.data.length != 0) {
        for (var i = 0; i < 10; i++) {
            if (response.data[i]){
                $('#mytable_1').find('tbody').append('<tr>'+
                        '<td class="text-center">'+(h+1)+'</td>'+
                        '<td class="text-left">'+(response.data[i].TENANT_NAME || 0)+'</td>'+
                        '<td class="text-right">'+(response.data[i].ART || 0)+'</td>'+
                        '<td class="text-center">'+(response.data[i].AHT || 0)+'</td>'+
                        '<td class="text-center">'+(response.data[i].AST || 0)+'</td>'+
                        '<td class="text-right">'+(addCommas(response.data[i].COF) || 0)+'</td>'+
                        '<td class="text-right font-weight-extrabold">'+((response.data[i].SCR.toString()).replace('.',',') || 0)+'%</td>'+
                    '</tr>');
            }else{
                $('#mytable_1').find('tbody').append(
                '<tr>'+
                    '<td class="text-center">'+(h+1)+'</td>'+
                    '<td class="text-left"></td>'+
                    '<td class="text-right"></td>'+
                    '<td class="text-center"></td>'+
                    '<td class="text-center"></td>'+
                    '<td class="text-right"></td>'+
                    '<td class="text-right"></td>'+
                '</tr>');
            }
            h++;
        }
    }

    var h2 = (h +10)
    $('#mytbody_2').empty();
    if (response.data.length != 0) {
        for (var j = 10; j < 20; j++) {
            if (response.data[j]){
                $('#mytable_2').find('tbody').append('<tr>'+
                        '<td class="text-center">'+(h+1)+'</td>'+
                        '<td class="text-left">'+(response.data[j].TENANT_NAME || 0)+'</td>'+
                        '<td class="text-right">'+(response.data[i].ART || 0)+'</td>'+
                        '<td class="text-center">'+(response.data[j].AHT || 0)+'</td>'+
                        '<td class="text-center">'+(response.data[j].AST || 0)+'</td>'+
                        '<td class="text-right">'+(addCommas(response.data[j].COF) || 0)+'</td>'+
                        '<td class="text-right font-weight-extrabold">'+((response.data[j].SCR.toString()).replace('.',',') || 0)+'%</td>'+
                    '</tr>');
            }else{
                $('#mytable_2').find('tbody').append(
                '<tr>'+
                    '<td class="text-center">'+(h+1)+'</td>'+
                    '<td class="text-left"></td>'+
                    '<td class="text-right"></td>'+
                    '<td class="text-center"></td>'+
                    '<td class="text-center"></td>'+
                    '<td class="text-right"></td>'+
                    '<td class="text-right"></td>'+
                '</tr>');
            }
            h++;
        }   
    }

    var h3 = (h2+10)
    $('#mytbody_3').empty();
    if (response.data.length != 0) {
        for (var k = 20; k < 30; k++) {
            if (response.data[k]){
                $('#mytable_3').find('tbody').append('<tr>'+
                        '<td class="text-center">'+(h+1)+'</td>'+
                        '<td class="text-left">'+(response.data[k].TENANT_NAME || 0)+'</td>'+
                        '<td class="text-right">'+(response.data[i].ART || 0)+'</td>'+
                        '<td class="text-center">'+(response.data[k].AHT || 0)+'</td>'+
                        '<td class="text-center">'+(response.data[k].AST || 0)+'</td>'+
                        '<td class="text-right">'+(addCommas(response.data[k].COF) || 0)+'</td>'+
                        '<td class="text-right font-weight-extrabold">'+((response.data[k].SCR.toString()).replace('.',',') || 0)+'%</td>'+
                    '</tr>');
            }else{
                $('#mytable_3').find('tbody').append(
                '<tr>'+
                    '<td class="text-center">'+(h+1)+'</td>'+
                    '<td class="text-left"></td>'+
                    '<td class="text-right"></td>'+
                    '<td class="text-center"></td>'+
                    '<td class="text-center"></td>'+
                    '<td class="text-right"></td>'+
                    '<td class="text-right"></td>'+
                '</tr>');
            }
            h++;
        }
    }

    var totalPage = Math.ceil(response.data_amt/limit);
    console.log(totalPage)
    console.log(offset)
    var varA = "";
    var pagDot = pagination(offset, totalPage, params, index_time, params_year, tenant_id, limit);
}

function pagination(currentPage, nrOfPages, params, index_time, params_year, tenant_id, limit) {
    var delta = 2,
        range = [],
        rangeWithDots = [],
        l,
        varA = "",
        indexDot;

    range.push(1);  

    if (nrOfPages <= 1){
 	return range;
    }

    for (let i = currentPage - delta; i <= currentPage + delta; i++) {
        if (i < nrOfPages && i > 1) {
            range.push(i);
        }
    }  
    
    range.push(nrOfPages);

    for (let i of range) {
        if (l) {
            if (i - l === 2) {
                rangeWithDots.push(l + 1);
            } else if (i - l !== 1) {
                rangeWithDots.push('...');
            }
        }
        rangeWithDots.push(i);
        l = i;
    }

    indexDot = rangeWithDots.indexOf('...');
    console.log('indexDot='+indexDot);
    // console.log(rangeWithDots);
    console.log('rangewithdotlength= '+rangeWithDots.length);
    for (var k = 0; k < rangeWithDots.length; k++){
        if (k != indexDot){
            varA += '<li class="page-item" id="li'+rangeWithDots[k]+'"><a class="page-link" href="javascript:callThreeTable('+"'"+params+"','"+index_time+"','"+params_year+"','"+tenant_id+"','"+(rangeWithDots[k]-1)+"','"+limit+"'"+')">'+rangeWithDots[k]+'</a></li>'
        }else{
            varA += '<li class="page-item"><a class="page-link" href="javascript:pagination('+"'"+(indexDot-1)+"','"+nrOfPages+"','"+params+"','"+index_time+"','"+params_year+"','"+tenant_id+"','"+limit+"'"+')">...</a></li>'
        }
    }
    $("#paging").empty();
    $("#paging").append('<li class="page-item">'+
    '<a class="page-link" href="javascript:callThreeTable('+"'"+params+"','"+index_time+"','"+params_year+"','"+tenant_id+"','"+0+"','"+limit+"'"+')">&laquo;</a>'+
    '</li>'+
        varA+
        '<li class="page-item">'+
        '<a class="page-link" href="javascript:callThreeTable('+"'"+params+"','"+index_time+"','"+params_year+"','"+tenant_id+"','"+(nrOfPages-1)+"','"+limit+"'"+')">&raquo;</a>'+
        '</li>'
    );
    
    var forID = "#li"+(Number(currentPage)+1).toString();
    $(""+forID+"").prop("class","page-item active");
    $("#app-content").on('mouseover', 'a', function (e) {
        var $link = $(this),
            href = $link.attr('href') || $link.data("href");
    
        $link.off('click.chrome');
        $link.on('click.chrome', function () {
            window.location.href = href;
        })
        .attr('data-href', href) 
        .css({ cursor: 'pointer' })
        .removeAttr('href'); 
    });
    // return rangeWithDots;
}

function callPieChartSummary(params, index_time, params_year, tenant_id){
    $.ajax({
        type: 'POST',
        url: base_url + 'api/OperationPerformance/SummaryPerformance/summaryPerformanceDashboardPie',
        data:{
            params: params,
            index: index_time,
            params_year: params_year,
            tenant_id: tenant_id
        },
        success: function (r) {
            var response = r;
            $('#modalError').modal('hide');
            // setTimeout(function(){callPieChartSummary(arr_tenant);},5000);
            // console.log(response);
            drawPieChartSummary(response);
        },
        error: function (r) {
            // console.log(r);
            $('#modalError').modal('show');
            // setTimeout(function(){callPieChartSummary(arr_tenant);},5000);
            // $("#filter-loader").fadeOut("slow");
        },
    });
}

function drawPieChartSummary(response){
    $('#pieChartChannel').remove();
    $('#canvas-pie').append('<canvas id="pieChartChannel" class="donutShadow overflow-hidden"></canvas>');
    var ctx = document.getElementById( "pieChartChannel" );
    ctx.height = 254;
    var myChart = new Chart( ctx, {
        type: 'pie',
        data: {
            datasets: [{
                data: response.data.total,
                backgroundColor: response.data.color,
                hoverBackgroundColor: response.data.color
            }],
            labels: response.data.channel_name
        },
        options: {
            animation: false,
            responsive: true,
            maintainAspectRatio: false,
            
            legend:{
                    display : false
            },
            tooltips: {
              callbacks: {
                    label: function(tooltipItem, data) {
                        var value = data.datasets[0].data[tooltipItem.index];
                        value = value.toString();
                        value = value.split(/(?=(?:...)*$)/);
                        value = value.join('.');
                        return data.labels[tooltipItem.index]+': '+ value;
                    }
              } // end callbacks:
            },
            pieceLabel:{
                render : 'legend',
                fontColor : '#000',
                position : 'outside',
                segment : true
            },
            legendCallback : function (chart, index){
                var allData = chart.data.datasets[0].data;
                // console.log(chart)
                var legendHtml = [];
                legendHtml.push('<ul><div class="row">');
                allData.forEach(function(data,index){
                    var label = chart.data.labels[index];
                    var dataLabel = allData[index];
                    var background = chart.data.datasets[0].backgroundColor[index]
                    var total = 0;
                    for (var i in allData){
                        total += parseInt(allData[i]);
                    }

                    // console.log(total)
                    var percentage = parseFloat((dataLabel / total) * 100).toFixed(1);
                    var total = dataLabel.toString();
                    legendHtml.push('<li class="col-md-6 col-lg-6">');
                    legendHtml.push('<span class="chart-legend"><div style="background-color :'+background+'" class="box-legend"></div>'+label+': '+ addCommas(total) +' (' + percentage.replace('.',',') + '%)</span>');
                })
                legendHtml.push('</ul></div>');
                return legendHtml.join("");
            },
        }
    });
    var myLegendContainer = document.getElementById("legend");
    myLegendContainer.innerHTML = myChart.generateLegend();
}

function callBarLayanan(params, index_time, params_year, tenant_id){
    $.ajax({
        type: 'POST',
        url: base_url + 'api/OperationPerformance/SummaryPerformance/summaryPerformanceDashboardBar',
        data: {
            params: params,
            index: index_time,
            params_year: params_year,
            tenant_id: tenant_id
        },
        success: function (r) {
            var response = r;
            // console.log(response);
            $('#modalError').modal('hide');
            // setTimeout(function(){callBarLayanan(date, arr_tenant);},5000);
            drawBarLayanan(response);
        },
        error: function (r) {
            // console.log(r);
            $('#modalError').modal('show');
            // setTimeout(function(){callBarLayanan(date, arr_tenant);},5000);
            // $("#filter-loader").fadeOut("slow");
        },
    });
}

function drawBarLayanan(response){
    $('#BarWallPerformance').remove(); // this is my <canvas> element
    $('#BarWallPerformanceDiv').append('<canvas id="BarWallPerformance" class="h-400"></canvas>');

    var numberWithCommas = function (x) {
        return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
    };

    console.log(response);
    var dataLayanan = [];
    var LabelX = [];
    var arrColor = [];
    response.data.forEach(function(value){
        dataLayanan.push(value.TOTAL);
        LabelX.push(value.TENANT_NAME);
        arrColor.push(value.COLOR);
    });
    // console.log(response.data[0].TOTAL);
    for (var i = LabelX.length; i < 30; i++){
        LabelX.push("");
    }
    var bar_ctx = document.getElementById('BarWallPerformance');
    // console.log(dataLayanan);
    var bar_chart = new Chart(bar_ctx, {
        type: 'bar',
        // type: 'horizontalBar',
        data: {
            labels: LabelX,
            datasets: [{
                    label: 'Layanan',
                    data: dataLayanan,
                    backgroundColor: arrColor,
                    hoverBackgroundColor: arrColor,
                    hoverBorderWidth: 0
                }
            ],
        },
        options: {
            animation: false,
            responsive: true,
            maintainAspectRatio: false,
            layout: {
                padding: {
                    left: 5,
                    right: 12,
                    top:0,
                    bottom: 0
                }
            },
            title: {
                display: false
                // text: 'Traffic by Layanan',
                // fontSize:14
            },
            animation: {
                duration: 10,
            },
            tooltips: {
                intersect: false,
                mode: 'label',
                callbacks: {
                    label: function (tooltipItem, data) {
                        return data.datasets[tooltipItem.datasetIndex].label + ": " + numberWithCommas(tooltipItem.yLabel);
                    }
                }
            },
            scales: {
                xAxes: [{
                    stacked: true,
                    gridLines: {
                        display: false
                    },
                    ticks: {
                        fontSize: 10,
                        autoSkip: false,
                        maxTicksLimit: 30
                    },
                    barPercentage: 1,
                    // barThickness: 30,
                    maxBarThickness: 40
                }],
                yAxes: [{
                    stacked: true,
                    gridLines: {
                        display: true
                    },
                    ticks: {
                        callback: function (value) {
                            return numberWithCommas(value);
                        },
                    },
                }],
            },
            legend: {
                display: false,
                labels: {
                    boxWidth: 10,
                }
            }
        },
        // plugins: [{
        //  beforeInit: function (chart) {
        //      chart.data.labels.forEach(function (value, index, array) {
        //          var a = [];
        //          a.push(value.slice(0, 5));
        //          var i = 1;
        //          while (value.length > (i * 5)) {
        //              a.push(value.slice(i * 5, (i + 1) * 5));
        //              i++;
        //          }
        //          array[index] = a;
        //      })
        //  }
        // }]
    });
    // console.log(dataLayanan);
}

function callLineChart(params, index_time, params_year, tenant_id){
    $.ajax({
        type: 'POST',
        url: base_url + 'api/OperationPerformance/SummaryPerformance/summaryPerformanceDashboardInterval',
        data:{
            params: params,
            index: index_time,
            params_year: params_year,
            tenant_id: tenant_id
        },
        success: function (r) {
            var response = r;
            // console.log(response);
            $('#modalError').modal('hide');
            // setTimeout(function(){callLineChart(channel, arr_tenant);},5000);
            drawLineChart(response);
        },
        error: function (r) {
            // console.log(r);
            $('#modalError').modal('show');
            // setTimeout(function(){callLineChart(channel, arr_tenant);},5000);
            // $("#filter-loader").fadeOut("slow");
        },
    });
}

function drawLineChart(response){
    $('#lineWallSumPerform').remove();
    $('#lineWallSumPerformDiv').append('<canvas id="lineWallSumPerform"  style="height:438px"></canvas>');
    var ctx = document.getElementById( "lineWallSumPerform" );
    var myChart = new Chart( ctx, {
        type: 'line',
        data: {
            labels: response.data.label_time,
            datasets: [ {
                label: "Total",
                data: response.data.series,
                backgroundColor: 'transparent',
                borderColor: '#089e60',
                borderWidth: 3,
                pointStyle: 'circle',
                pointRadius: 5,
                pointBorderColor: 'transparent',
                pointBackgroundColor: '#089e60',
                }]
        },
        options: {
            animation: false,
            responsive: true,
            maintainAspectRatio: false,
            layout: {
                padding: {
                    left: 7,
                    right: 5,
                    top: 20,
                    bottom: 0
                }
            },
            tooltips: {
                callbacks: {
                    label: function (tooltipItem, data) {
                        return data.datasets[tooltipItem.datasetIndex].label + ": " + addCommas(tooltipItem.yLabel);
                    }
                }
            },
            legend:{
                display:false
            },
            // legend:{
            //     position:'top',
            //     labels:{
            //         boxWidth:10
            //     }
            // },
            barRoundness: 1,
            scales: {
                yAxes: [ {
                    ticks: {
                        beginAtZero: true
                        }
                    }]
            }
        }
    });
}

function callTotalTable(params, index_time, params_year, tenant_id){
    $.ajax({
        type: 'POST',
        url: base_url + 'api/OperationPerformance/SummaryPerformance/summaryPerformanceDashboard',
        data: {
            params: params,
            index: index_time,
            params_year: params_year,
            tenant_id: tenant_id
        },
        success: function (r) {
            var response = r;
            $('#modalError').modal('hide');
            // setTimeout(function(){callTotalTable(date, arr_tenant);},5000);
            drawTotalTable(response);
        },
        error: function (r) {
            // console.log(r);
            $('#modalError').modal('show');
            // setTimeout(function(){callTotalTable(date, arr_tenant);},5000);
            // $("#filter-loader").fadeOut("slow");
        },
    });
}

function timestrToSec(timestr) {
  var parts = timestr.split(":");
  return (parts[0] * 3600) +
         (parts[1] * 60) +
         (+parts[2]);
}

function pad(num) {
  if(num < 10) {
    return "0" + num;
  } else {
    return "" + num;
  }
}

function formatTime(seconds) {
  return [pad(Math.floor(seconds/3600)),
          pad(Math.floor(seconds/60)%60),
          pad(seconds%60),
          ].join(":");
}

function drawTotalTable(response){
        var sumCOF = 0;
        var sumSCR = 0;
        var sumART = 0;
        var sumAHT = 0;
        var sumAST = 0;
        var avgART = 0, avgAHT = 0, avgAST = 0;

        for (var i = 0; i < response.data.length; i++) {
            sumCOF+= parseInt((response.data[i].COF || 0));
            // console.log(response.data[i].SCR);
            sumSCR+= parseFloat((response.data[i].SCR || 0));
            sumART+= Number(timestrToSec(response.data[i].ART || 0));
            sumAHT+= Number(timestrToSec(response.data[i].AHT || 0));
            sumAST+= Number(timestrToSec(response.data[i].AST || 0));
            var avgSCR = (sumSCR / response.data.length)
            avgART = Math.round(sumART / response.data.length);
            avgAHT = Math.round(sumAHT / response.data.length);
            avgAST = Math.round(sumAST / response.data.length);
            $('#rowDiv').empty();
            $('#rowDiv').append(''+                
                '<div class="col-md-2">'+
                    '<h6 class="font12" id="avgRT">ART : '+formatTime(avgART)+'</h6>'+
                '</div>'+
                '<div class="col-md-2">'+
                    '<h6 class="font12" id="avgHT">AHT : '+formatTime(avgAHT)+'</h6>'+
                '</div>'+
                '<div class="col-md-2">'+
                    '<h6 class="font12" id="avgST">AST : '+formatTime(avgAST)+'</h6>'+
                '</div>'+
                '<div class="col-md-3">'+
                    '<h6 class="font12" id="totalCOF">Summary COF : '+addCommas(sumCOF)+'</h6>'+
                '</div>'+
                '<div class="col-md-3">'+
                    '<h6 class="font12" id="rataSCR">Average SCR : '+(parseFloat(avgSCR).toFixed(2).toString()).replace('.',',')+'%</h6>'+
                '</div>'
            );
        }
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

function setDatePicker(){
    $(".datepicker").datepicker({
        format: "yyyy-mm-dd",
        todayHighlight: true,
        autoclose: true
    }).attr("readonly", "readonly").css({"cursor":"pointer", "background":"white"});
}

function remove_hash_from_url()
{
    var uri = window.location.toString();
    if (uri.indexOf("#") > 0) {
        var clean_uri = uri.substring(0, uri.indexOf("#"));
        window.history.replaceState({}, document.title, clean_uri);
    }
}

(function ($) {
var date = new Date();
    date.setDate(date.getDate() > 0);
    $('#input-date-filter').datepicker({
        dateFormat: 'yy-mm-dd',
        maxDate: 'now',
        showTodayButton: true,
        showClear: true,
        // minDate: date,

        onSelect: function (dateText) {
            // console.log(this.value);
            v_date = this.value;
            callThreeTable('day', v_date, 0, arr_tenant,0,30);
            callPieChartSummary('day', v_date, 0, arr_tenant);
            callBarLayanan('day', v_date, 0, arr_tenant);
            callLineChart('day', v_date, 0, arr_tenant);
            callTotalTable('day', v_date, 0, arr_tenant);
            // loadContent('day', v_date, 0, $('#layanan_name').val());
        }
    });

    // btn day
    $('#btn-day').click(function(){
        params_time = 'day';
        callThreeTable('day',  v_params_this_year, 0, arr_tenant,0,30);
        callPieChartSummary('day',  v_params_this_year, 0, arr_tenant);
        callBarLayanan('day',  v_params_this_year, 0, arr_tenant);
        callLineChart('day',  v_params_this_year, 0, arr_tenant);
        callTotalTable('day',  v_params_this_year, 0, arr_tenant);
        // loadContent('day', v_params_this_year, 0, $('#layanan_name').val());
        v_date='2019-12-01';
        $('#input-date-filter').datepicker("setDate", v_params_this_year);
        $("#btn-month").prop("class","btn btn-light btn-sm");
        $("#btn-year").prop("class","btn btn-light btn-sm");
        $(this).prop("class","btn btn-red btn-sm");

        $('#filter-date').show();
        $('#filter-month').hide();
        $('#filter-year').hide();
    });

    // btn month
    $('#btn-month').click(function(){
        var d = new Date();
        var o = d.getDate();
        var n = d.getMonth()+1;
        var m = d.getFullYear();
        params_time = 'month';
        sessionStorage.removeItem('paramsSession');
        sessionStorage.setItem('paramsSession', 'month');
        $('#select-month option[value='+n+']').attr('selected','selected');
        $('#select-year-on-month option[value='+m+']').attr('selected','selected');
        callThreeTable('month', n,m, arr_tenant,0,30);
        callPieChartSummary('month', n,m, arr_tenant);
        callBarLayanan('month', n,m, arr_tenant);
        callLineChart('month', n,m, arr_tenant);
        callTotalTable('month', n,m, arr_tenant);
        // loadContent('month', n,m, $('#layanan_name').val());
        callYearOnMonth();
        $("#btn-day").prop("class","btn btn-light btn-sm");
        $("#btn-year").prop("class","btn btn-light btn-sm");
        $(this).prop("class","btn btn-red btn-sm");
        $('#filter-date').hide();
        $('#filter-month').show();
        $('#filter-year').hide();
    });

    // btn year
    $('#btn-year').click(function(){
        sessionStorage.removeItem('paramsSession');
        sessionStorage.setItem('paramsSession', 'year');
        params_time = 'year';
        callYear();
        callThreeTable('year', m,0, arr_tenant,0,30);
        callPieChartSummary('year', m,0, arr_tenant);
        callBarLayanan('year', m,0, arr_tenant);
        callLineChart('year', m,0, arr_tenant);
        callTotalTable('year', m,0, arr_tenant);
        // loadContent('year', m,0, $('#layanan_name').val());
        $("#btn-month").prop("class","btn btn-light btn-sm");
        $("#btn-day").prop("class","btn btn-light btn-sm");
        $(this).prop("class","btn btn-red btn-sm");
        $('#select-year-on-month option[value='+m+']').attr('selected','selected');
        $('#filter-date').hide();
        $('#filter-month').hide();
        $('#filter-year').show();
    });

    // var date = new Date();
    // date.setDate(date.getDate()>0);
    // $('#input-date-filter').datepicker({
    //     dateFormat: 'yy-mm-dd',
    //     maxDate: 'now',
    //     showTodayButton: true,
    //     showClear: true,
    //     // minDate: date,
        
    //     onSelect: function(dateText) {
    //         v_date = this.value;
    //         callThreeTable('day', v_date,0, arr_tenant);
    //         callPieChartSummary('day', v_date,0, arr_tenant);
    //         callBarLayanan('day', v_date,0, arr_tenant);
    //         callLineChart('day', v_date,0, arr_tenant);
    //         callTotalTable('day', v_date,0, arr_tenant);
    //         // loadContent('day', v_date,0, $('#layanan_name').val());
    //     }
    // });

    // $('#layanan_name').change(function(){
    //     let fromParams = sessionStorage.getItem('paramsSession');
    //     if(fromParams == 'day'){
    //         loadContent('day',  $('#input-date-filter').val(),0, $('#layanan_name').val());
    //     }else if(fromParams == 'month'){
    //         loadContent('month', $("#select-month").val(), $("#select-year-on-month").val(), $('#layanan_name').val());
    //     }else if(fromParams == 'year'){
    //         loadContent('year', $('#select-year-only').val(), 0, $('#layanan_name').val());
    //     }
    // });

    // select option year
    $('#select-year-only').change(function(){
        v_year = $(this).val();
        let fromParams = sessionStorage.getItem('paramsSession');
        callThreeTable('year', v_year,0, arr_tenant,0,30);
        callPieChartSummary('year', v_year,0, arr_tenant);
        callBarLayanan('year', v_year,0, arr_tenant);
        callLineChart('year', v_year,0, arr_tenant);
        callTotalTable('year', v_year,0, arr_tenant);
        // loadContent('year', v_year,0, $('#layanan_name').val());
        $("#filter-date").hide();
        $("#filter-month").hide();
        $("#filter-year").show();
    });

    $('#btn-go').click(function(){
        callThreeTable('month', $("#select-month").val(), $("#select-year-on-month").val(), arr_tenant,0,30);
        callPieChartSummary('month', $("#select-month").val(), $("#select-year-on-month").val(), arr_tenant);
        callBarLayanan('month', $("#select-month").val(), $("#select-year-on-month").val(), arr_tenant);
        callLineChart('month', $("#select-month").val(), $("#select-year-on-month").val(), arr_tenant);
        callTotalTable('month', $("#select-month").val(), $("#select-year-on-month").val(), arr_tenant);
        // loadContent('month', $("#select-month").val(), $("#select-year-on-month").val(), $('#layanan_name').val());
        
        
    });

})(jQuery);