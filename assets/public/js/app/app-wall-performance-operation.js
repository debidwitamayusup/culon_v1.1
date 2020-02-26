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

//get today
var v_params_today= m + '-' + n + '-' + (o);
//get yesterday
var v_params_yesterday =m + '-' + n + '-' + (o-1);

$(document).ready(function () {
    $("#filter-loader").fadeIn("slow");
    callTableCOFByChannel('2020-02-24', '');
    // callTableStatusTicket('2020-01-20');
    getTenant('2020-02-24');
    // getTenant(v_params_today);
    // callTableCOFByChannel(v_params_today);

   $("#filter-loader").fadeOut("slow");
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

function getTenant(date){
    $.ajax({
        type: 'POST',
        url: base_url + 'api/Wallboard/WallboardController/GetTennantFilter',
        data: {
            "date" : date
        },

        success: function (r) {
            var data_option = [];
            // var response = JSON.parse(r);
            var response = r;
            // console.log(response);
            var html = '<option value="">Semua Layanan</option>';
            // var html = '';
            var i;
            // console.log(response);
                for(i=0; i<response.data.length; i++){
                    html += '<option value='+response.data[i].TENANT_ID+'>'+response.data[i].TENANT_NAME+'</option>';
                }
                $('#tenant_name').html(html);
            
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

function callTableCOFByChannel(date, search){
    $.ajax({
        type: 'post',
        url: base_url+'api/Wallboard/WallboardController/SummPerformOps',
        data: {
            date: date,
            search: search
        },
        success: function (r) {
            // var response = JSON.parse(r);
            var response = r;
            // console.log(response);
            //hit url for interval 900000 (15 minutes)
            setTimeout(function(){callTableCOFByChannel(date);},900000);
            drawTableCOFByChannel(response);
            // $("#filter-loader").fadeOut("slow");
        },
        error: function (r) {
            // console.log(r);
            alert("error");
            // $("#filter-loader").fadeOut("slow");
        },
    });
}

function callTableStatusTicket(date){
    $.ajax({
        type: 'post',
        url: base_url+'api/Wallboard/WallboardController/SPOKIP',
        data: {
            date: date,
        },
        success: function (r) {
            // var response = JSON.parse(r);
            var response = r;
            // console.log(response);
            //hit url for interval 900000 (15 minutes)
            // setTimeout(function(){callTableStatusTicket(date);},5000);
            drawTableStatusTicket(response);
            // $("#filter-loader").fadeOut("slow");
        },
        error: function (r) {
            // console.log(r);
            alert("error");
            // $("#filter-loader").fadeOut("slow");
        },
    });
}

function drawTableStatusTicket(response){
    $("#mytbody2").empty();
    $("#mytfoot2").empty();
    console.log(response.data[4].SUMMARY[0].TOTAL)
    for (var i = 0; i < response.data.length; i++) {
        $('#tableStatusTicket').find('tbody').append('<tr>'+
                '<td>'+(i+1)+'</td>'+
                '<td class="text-left">'+response.data[i].TENANT_ID+'</td>'+
                '<td class="text-right">'+addCommas(response.data[i].SUMMARY[i].TOTAL || 0)+'</td>'+
                '<td class="text-right">'+addCommas(response.data[i].SUMMARY[i].TOTAL || 0)+'</td>'+
                '<td class="text-right">'+addCommas(response.data[i].SUMMARY[i].TOTAL || 0)+'</td>'+
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
    console.log(response);
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
        for (var i = 0; i < response.data.length; i++) {
            $('#tabelCOFByChannel').find('tbody').append('<tr>'+
                '<td>'+(i+1)+'</td>'+
                '<td class="text-left">'+addCommas(response.data[i].TENANT_ID || 0)+'</td>'+
                '<td class="text-right">'+addCommas(response.data[i].Facebook || 0)+'</td>'+
                '<td class="text-right">'+addCommas(response.data[i].Whatsapp || 0)+'</td>'+
                '<td class="text-right">'+addCommas(response.data[i].Twitter || 0)+'</td>'+
                '<td class="text-right">'+addCommas(response.data[i].Email || 0)+'</td>'+
                '<td class="text-right">'+addCommas(response.data[i].Telegram || 0)+'</td>'+
                '<td class="text-right">'+addCommas(response.data[i].Line || 0)+'</td>'+
                '<td class="text-right">'+addCommas(response.data[i].Voice || 0)+'</td>'+
                '<td class="text-right">'+addCommas(response.data[i].Instagram || 0)+'</td>'+
                '<td class="text-right">'+addCommas(response.data[i].Messenger || 0)+'</td>'+
                '<td class="text-right">'+addCommas(response.data[i]['Twitter DM'] || 0)+'</td>'+
                '<td class="text-right">'+addCommas(response.data[i]['Live Chat'] || 0)+'</td>'+
                '<td class="text-right">'+addCommas(response.data[i].SMS || 0)+'</td>'+
                '<td class="text-right">'+addCommas(response.data[i].SUMCOF || 0)+'</td>'+
                '<td class="text-right">'+addCommas(response.data[i].SUMART || 0)+'</td>'+
                '<td class="text-right">'+addCommas(response.data[i].SUMAHT || 0)+'</td>'+
                '<td class="text-right">'+addCommas(response.data[i].SUMAST || 0)+'</td>'+
                '<td class="text-right">'+addCommas(response.data[i].SUMSCR || 0)+' %</td>'+
                '</tr>');

             sumFb+= parseInt((response.data[i].Facebook || 0));
             sumWA+= parseInt((response.data[i].Whatsapp || 0));
             sumTw+= parseInt((response.data[i].Twitter || 0));
             sumEmail+= parseInt((response.data[i].Email || 0));
             sumTel+= parseInt((response.data[i].Telegram || 0));
             sumLine+= parseInt((response.data[i].Line || 0));
             sumVoice+= parseInt((response.data[i].Voice || 0));
             sumInst+= parseInt((response.data[i].Instagram || 0));
             sumMes+= parseInt((response.data[i].Messenger || 0));
             sumTwDM+= parseInt((response.data[i]['Twitter DM'] || 0));
             sumLive+= parseInt((response.data[i]['Live Chat'] || 0));
             sumSms+= parseInt((response.data[i].SMS || 0));
             sumCOF+= parseInt((response.data[i].SUMCOF || 0));
             sumART+= formatTime(timestrToSec(response.data[i].SUMART || 0));
             sumAHT+= formatTime(timestrToSec(response.data[i].SUMAHT || 0));
             sumAST+= formatTime(timestrToSec(response.data[i].SUMAST || 0));
             sumSCR+= parseFloat((response.data[i].SUMSCR || 0));

            // time1 = response.data[i].SUMART;
            // time2 = response.data[i].SUMAHT;
            // time3 = response.data[i].SUMAST;
            // var sumTime = formatTime(timestrToSec(time1) + timestrToSec(time2) + timestrToSec(time3));

            // console.log(sumTime);
        }

        
        $('#tabelCOFByChannel').find('tfoot').append('<tr>'+
            '<td colspan="2" class="text-right">TOTAL</td>'+
            '<td class="text-right">'+addCommas(sumFb)+'</td>'+
            '<td class="text-right">'+addCommas(sumWA)+'</td>'+
            '<td class="text-right">'+addCommas(sumTw)+'</td>'+
            '<td class="text-right">'+addCommas(sumEmail)+'</td>'+
            '<td class="text-right">'+addCommas(sumTel)+'</td>'+
            '<td class="text-right">'+addCommas(sumLine)+'</td>'+
            '<td class="text-right">'+addCommas(sumVoice)+'</td>'+
            '<td class="text-right">'+addCommas(sumInst)+'</td>'+
            '<td class="text-right">'+addCommas(sumMes)+'</td>'+
            '<td class="text-right">'+addCommas(sumTwDM)+'</td>'+
            '<td class="text-right">'+addCommas(sumLive)+'</td>'+
            '<td class="text-right">'+addCommas(sumSms)+'</td>'+
            '<td class="text-right">'+addCommas(sumCOF)+'</td>'+
            '<td class="text-right">'+sumART+'</td>'+
            '<td class="text-right">'+sumAHT+'</td>'+
            '<td class="text-right">'+sumAST+'</td>'+
            '<td class="text-right">'+addCommas(sumSCR)+' %</td>'+
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
        callTableCOFByChannel(v_params_yesterday, selectedTenant);
    });
})(jQuery);

