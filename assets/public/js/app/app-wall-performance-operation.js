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

$(document).ready(function () {
    $("#filter-loader").fadeIn("slow");
    callTableCOFByChannel('2020-01-24');
    // callTableCOFByChannel(v_params_today);

   $("#filter-loader").fadeOut("slow");
});

function callTableCOFByChannel(date){
    $.ajax({
        type: 'post',
        url: base_url+'api/Wallboard/WallboardController/SummPerformOps',
        data: {
            date: date
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
        for (var i = 0; i < response.data.length; i++) {
            $('#tabelCOFByChannel').find('tbody').append('<tr>'+
                '<td>'+(i+1)+'</td>'+
                '<td>'+(response.data[i].TENANT_ID || 0)+'</td>'+
                '<td>'+(response.data[i].Facebook || 0)+'</td>'+
                '<td>'+(response.data[i].Whatsapp || 0)+'</td>'+
                '<td>'+(response.data[i].Twitter || 0)+'</td>'+
                '<td>'+(response.data[i].Email || 0)+'</td>'+
                '<td>'+(response.data[i].Telegram || 0)+'</td>'+
                '<td>'+(response.data[i].Line || 0)+'</td>'+
                '<td>'+(response.data[i].Voice || 0)+'</td>'+
                '<td>'+(response.data[i].Instagram || 0)+'</td>'+
                '<td>'+(response.data[i].Messenger || 0)+'</td>'+
                '<td>'+(response.data[i]['Twitter DM'] || 0)+'</td>'+
                '<td>'+(response.data[i]['Live Chat'] || 0)+'</td>'+
                '<td>'+(response.data[i].SMS || 0)+'</td>'+
                '<td>'+(response.data[i].SUMCOF || 0)+'</td>'+
                '<td>'+(response.data[i].SUMART || 0)+'</td>'+
                '<td>'+(response.data[i].SUMAHT || 0)+'</td>'+
                '<td>'+(response.data[i].SUMAST || 0)+'</td>'+
                '<td>'+(response.data[i].SUMSCR || 0)+'</td>'+
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
             sumART+= parseInt((response.data[i].SUMART || 0));
             sumAHT+= parseInt((response.data[i].SUMAHT || 0));
             sumAST+= parseInt((response.data[i].SUMAST || 0));
             sumSCR+= parseInt((response.data[i].SUMSCR || 0));
        }
        
        $('#tabelCOFByChannel').find('tfoot').append('<tr>'+
            '<td colspan="2">TOTAL</td>'+
            '<td>'+sumFb+'</td>'+
            '<td>'+sumWA+'</td>'+
            '<td>'+sumTw+'</td>'+
            '<td>'+sumEmail+'</td>'+
            '<td>'+sumTel+'</td>'+
            '<td>'+sumLine+'</td>'+
            '<td>'+sumVoice+'</td>'+
            '<td>'+sumInst+'</td>'+
            '<td>'+sumMes+'</td>'+
            '<td>'+sumTwDM+'</td>'+
            '<td>'+sumLive+'</td>'+
            '<td>'+sumSms+'</td>'+
            '<td>'+sumCOF+'</td>'+
            '<td>'+sumART+'</td>'+
            '<td>'+sumAHT+'</td>'+
            '<td>'+sumAST+'</td>'+
            '<td>'+sumSCR+'</td>'+
            '</tr>');
    }else{
        $('#table_avg_traffic').find('tbody').append('<tr>'+
            '<td colspan=6> No Data </td>'+
            '</tr>');
    }
}

