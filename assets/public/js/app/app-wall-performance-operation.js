var base_url = $('#base_url').val();

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
var arr_tenant = []
//get today
var v_params_today= m + '-' + n + '-' + (o);
var tembak = '2020-03-02';
//get yesterday
var v_params_yesterday =m + '-' + n + '-' + (o-1);
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
    if(sessionParams){
        $("#filter-loader").fadeIn("slow");
        callTableCOFByChannel(tokenSession, v_params_yesterday,arr_tenant);
        callTableStatusTicket(tokenSession, v_params_yesterday, arr_tenant);
        // getTenant(v_params_today);
        // callTableCOFByChannel(v_params_today);

        $("#filter-loader").fadeOut("slow");
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

function callTableCOFByChannel(token, date, search){
    $.ajax({
        beforeSend: function (xhr) {
            xhr.setRequestHeader("token", token);
        },
        type: 'post',
        url: base_url+'api/Wallboard/WallboardController/SummPerformOps',
        data: {
            date: date,
            search: search
        },
        success: function (r) {
            var response = r;

            if(response.status != false){
                $('#modalError').modal('hide');
                setTimeout(function(){callTableCOFByChannel(token, date, arr_tenant);},5000);
                drawTableCOFByChannel(response);
                // $("#filter-loader").fadeOut("slow");
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
            if(r.status == 404){
                var notif = alert('Your Account Credential is Invalid. Maybe someone else has logon to your account.')
                if(notif){
                    localStorage.clear();
                    window.location = base_url+'main/login';
                }else{
                    localStorage.clear();
                    window.location = base_url+'main/login';
                }
            }
            $('#modalError').modal('show');
            setTimeout(function(){callTableCOFByChannel(token, date, arr_tenant);},5000);
            // $("#filter-loader").fadeOut("slow");
        },
    });
}

function callTableStatusTicket(token, date, tenant_id){
    $.ajax({
        beforeSend: function (xhr) {
            xhr.setRequestHeader("token", token);
        },
        type: 'post',
        url: base_url+'api/Wallboard/WallboardController/SPOKIP',
        data: {
            date: date,
            tenant_id: tenant_id
        },
        success: function (r) {
            // var response = JSON.parse(r);
            var response = r;
            // console.log(response);
            //hit url for interval 900000 (15 minutes)
            $('#modalError').modal('hide');
            setTimeout(function(){callTableStatusTicket(token, date, arr_tenant);},5000);
            drawTableStatusTicket(response);
            // $("#filter-loader").fadeOut("slow");
        },
        error: function (r) {
            // console.log(r);
            $('#modalError').modal('show');
            setTimeout(function(){callTableStatusTicket(token, date, arr_tenant);},5000);
            // $("#filter-loader").fadeOut("slow");
        },
    });
}

function drawTableStatusTicket(response){
    $("#mytbody2").empty();
    $("#mytfoot2").empty();
    if(response.data.length != 0){
        if(response.data[0].SUMMARY.length != 0){ 
        // console.log(response.data[4].SUMMARY[0].TOTAL)
            for (var i = 0; i < response.data.length; i++) {
                $('#tableStatusTicket').find('tbody').append('<tr>'+
                        '<td>'+(i+1)+'</td>'+
                        '<td class="text-left">'+response.data[i].TENANT_ID+'</td>'+
                        '<td class="text-right">'+addCommas(response.data[i].SUMMARY[0]['TOTAL'] || 0)+'</td>'+
                        '<td class="text-right">'+addCommas(response.data[i].SUMMARY[1]['TOTAL'] || 0)+'</td>'+
                        '<td class="text-right">'+addCommas(response.data[i].SUMMARY[2]['TOTAL'] || 0)+'</td>'+
                        '<td class="text-center">-</td>'+
                        '<td class="text-center">-</td>'+
                        '<td class="text-center">-</td>'+
                        '<td class="text-center">-</td>'+
                        '<td class="text-center">-</td>'+
                        '<td class="text-center">-</td>'+
                        // '<td class="text-center">-</td>'+
                        '<td class="text-center">-</td>'+  
                        '</tr>');
            }
        }else{
            $('#tableStatusTicket').find('tbody').append('<tr>'+
                '<td colspan=18> No Data </td>'+
                '</tr>');
        }
    }else{
        $('#tableStatusTicket').find('tbody').append('<tr>'+
                '<td colspan=6> No Data </td>'+
                '</tr>');
    }
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

function drawTableCOFByChannel(response){
    // console.log(response);
    $("#mytbody").empty();
    $("#mytfoot").empty();
    if(response.data.length != 0){   
        var i = 0;
        var sumFb = 0;
        var sumWA = 0;
        var sumTw = 0;
        var sumEmail = 0;
        var sumTel = 0;
        var sumLine = 0;
        var sumVoice = 0;
        var sumInst = 0;
        var sumMes = 0;
        var sumTwDM = 0;
        var sumLive = 0;
        var sumSms = 0;
        var sumCOF = 0;
        var sumART = 0;
        var sumAHT = 0;
        var sumAST = 0;
        var sumSCR =0;
        var sumCB = 0;
        for (var i = 0; i < response.data.length; i++) {
            $('#tabelCOFByChannel').find('tbody').append('<tr>'+
                '<td class="text-center">'+(i+1)+'</td>'+
                '<td class="text-left">'+addCommas(response.data[i].TENANT_ID || 0)+'</td>'+
                '<td class="text-right">'+addCommas(response.data[i]['Live Chat'] || 0)+'</td>'+
                '<td class="text-right">'+addCommas(response.data[i]['Twitter DM'] || 0)+'</td>'+
                '<td class="text-right">'+addCommas(response.data[i].Messenger || 0)+'</td>'+
                '<td class="text-right">'+addCommas(response.data[i].Whatsapp || 0)+'</td>'+
                '<td class="text-right">'+addCommas(response.data[i].Line || 0)+'</td>'+
                '<td class="text-right">'+addCommas(response.data[i].Telegram || 0)+'</td>'+
                '<td class="text-right">'+addCommas(response.data[i].ChatBot || 0)+'</td>'+
                '<td class="text-right">'+addCommas(response.data[i].Instagram || 0)+'</td>'+
                '<td class="text-right">'+addCommas(response.data[i].Facebook || 0)+'</td>'+
                '<td class="text-right">'+addCommas(response.data[i].Twitter || 0)+'</td>'+
                '<td class="text-right">'+addCommas(response.data[i].Email || 0)+'</td>'+
                // '<td class="text-right">'+addCommas(response.data[i].Voice || 0)+'</td>'+
                '<td class="text-right">'+addCommas(response.data[i].SMS || 0)+'</td>'+
                '<td class="text-right">'+addCommas(response.data[i].SUMCOF || 0)+'</td>'+
                '<td class="text-right">'+addCommas(response.data[i].SUMART || 0)+'</td>'+
                '<td class="text-right">'+addCommas(response.data[i].SUMAHT || 0)+'</td>'+
                '<td class="text-right">'+addCommas(response.data[i].SUMAST || 0)+'</td>'+
                '<td class="text-right font-weight-extrabold">'+(response.data[i].SUMSCR).replace(".",",")+' %</td>'+
                '</tr>');

             sumFb+= parseInt((response.data[i].Facebook || 0));
             sumWA+= parseInt((response.data[i].Whatsapp || 0));
             sumTw+= parseInt((response.data[i].Twitter || 0));
             sumEmail+= parseInt((response.data[i].Email || 0));
             sumTel+= parseInt((response.data[i].Telegram || 0));
             sumLine+= parseInt((response.data[i].Line || 0));
            //  sumVoice+= parseInt((response.data[i].Voice || 0));
             sumInst+= parseInt((response.data[i].Instagram || 0));
             sumMes+= parseInt((response.data[i].Messenger || 0));
             sumTwDM+= parseInt((response.data[i]['Twitter DM'] || 0));
             sumLive+= parseInt((response.data[i]['Live Chat'] || 0));
             sumSms+= parseInt((response.data[i].SMS || 0));
             sumCB+= parseInt((response.data[i].ChatBot || 0));
             sumCOF+= parseInt((response.data[i].SUMCOF || 0));
             sumART+= Number(timestrToSec(response.data[i].SUMART || 0));
             sumAHT+= Number(timestrToSec(response.data[i].SUMAHT || 0));
             sumAST+= Number(timestrToSec(response.data[i].SUMAST || 0));
             sumSCR+= parseFloat((response.data[i].SUMSCR || 0));
             var avgSCR = parseFloat(sumSCR / response.data.length).toFixed(2);
             var avgART = Math.round((sumART / response.data.length)); 
             var avgAHT = Math.round((sumAHT / response.data.length));
             var avgAST = Math.round((sumAST / response.data.length));  

            // time1 = response.data[i].SUMART;
            // time2 = response.data[i].SUMAHT;
            // time3 = response.data[i].SUMAST;
            // var sumTime = formatTime(timestrToSec(time1) + timestrToSec(time2) + timestrToSec(time3));

            // console.log(sumTime);
        }

        
        $('#tabelCOFByChannel').find('tfoot').append('<tr>'+
            '<td colspan="2" class="text-center">TOTAL</td>'+
            '<td class="text-right">'+addCommas(sumLive)+'</td>'+
            '<td class="text-right">'+addCommas(sumTwDM)+'</td>'+
            '<td class="text-right">'+addCommas(sumMes)+'</td>'+
            '<td class="text-right">'+addCommas(sumWA)+'</td>'+
            '<td class="text-right">'+addCommas(sumLine)+'</td>'+
            '<td class="text-right">'+addCommas(sumTel)+'</td>'+
            '<td class="text-right">'+addCommas(sumCB)+'</td>'+
            '<td class="text-right">'+addCommas(sumInst)+'</td>'+
            '<td class="text-right">'+addCommas(sumFb)+'</td>'+
            '<td class="text-right">'+addCommas(sumTw)+'</td>'+
            '<td class="text-right">'+addCommas(sumEmail)+'</td>'+
            // '<td class="text-right">'+addCommas(sumVoice)+'</td>'+
            '<td class="text-right">'+addCommas(sumSms)+'</td>'+
            '<td class="text-right">'+addCommas(sumCOF)+'</td>'+
            '<td class="text-center">'+formatTime(avgART).toString().substring(1)+'</td>'+
            '<td class="text-center">'+formatTime(avgAHT).toString().substring(1)+'</td>'+
            '<td class="text-center">'+formatTime(avgAST).toString().substring(1)+'</td>'+
            '<td class="text-right">'+(avgSCR).toString().replace(".",",")+' %</td>'+
            '</tr>');
    }else{
        $('#tabelCOFByChannel').find('tbody').append('<tr>'+
            '<td colspan=6> No Data </td>'+
            '</tr>');
    }
}

(function ($) {
    $("select#tenant_name").change(function(){
        // destroyChartInterval();
         // destroyChartInterval();
        var selectedTenant = $(this).children("option:selected").val();
        // callTableCOFByChannel(v_params_yesterday, selectedTenant);
        callTableCOFByChannel(tokenSession, v_params_yesterday, selectedTenant);
    });
})(jQuery);

