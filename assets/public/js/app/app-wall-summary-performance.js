var base_url = $('#base_url').val();
var responseTotal = "";
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

var v_params_this_year = m + '-' + n + '-' + (o);
var arr_tenant = [];
const sessionParams = JSON.parse(localStorage.getItem('Auth-infomedia'));
const tokenSession = JSON.parse(localStorage.getItem('Auth-token'));
var dataset = {
    "status":true,
    "message":"Data available!",
    "data_amt":40,
    "data":[
        {"TENANT_NAME":"Pos Indonesia","QUEUE":"222","HANDLING":"726","MESSAGE_IN":"2471","MESSAGE_OUT":"1959","ABANDON":"277","ART":"00:42:54","AHT":"00:07:51","AST":"01:34:37","OFFERED":"1003","SCR":50},
        {"TENANT_NAME":"Telkom Care","QUEUE":"11","HANDLING":"2486","MESSAGE_IN":"6392","MESSAGE_OUT":"5228","ABANDON":"1468","ART":"00:21:31","AHT":"00:06:21","AST":"00:22:59","OFFERED":"3954","SCR":58},
        {"TENANT_NAME":"Telkomsel","QUEUE":"21","HANDLING":"2003","MESSAGE_IN":"3622","MESSAGE_OUT":"2011","ABANDON":"1086","ART":"00:06:09","AHT":"00:02:42","AST":"00:05:18","OFFERED":"3089","SCR":58.6},
        {"TENANT_NAME":"Pos Indonesia","QUEUE":"222","HANDLING":"726","MESSAGE_IN":"2471","MESSAGE_OUT":"1959","ABANDON":"277","ART":"00:42:54","AHT":"00:07:51","AST":"01:34:37","OFFERED":"1003","SCR":50},
        {"TENANT_NAME":"Telkom Care","QUEUE":"11","HANDLING":"2486","MESSAGE_IN":"6392","MESSAGE_OUT":"5228","ABANDON":"1468","ART":"00:21:31","AHT":"00:06:21","AST":"00:22:59","OFFERED":"3954","SCR":58},
        {"TENANT_NAME":"Pos Indonesia","QUEUE":"222","HANDLING":"726","MESSAGE_IN":"2471","MESSAGE_OUT":"1959","ABANDON":"277","ART":"00:42:54","AHT":"00:07:51","AST":"01:34:37","OFFERED":"1003","SCR":50},
        {"TENANT_NAME":"Telkom Care","QUEUE":"11","HANDLING":"2486","MESSAGE_IN":"6392","MESSAGE_OUT":"5228","ABANDON":"1468","ART":"00:21:31","AHT":"00:06:21","AST":"00:22:59","OFFERED":"3954","SCR":58},
        {"TENANT_NAME":"Telkomsel","QUEUE":"21","HANDLING":"2003","MESSAGE_IN":"3622","MESSAGE_OUT":"2011","ABANDON":"1086","ART":"00:06:09","AHT":"00:02:42","AST":"00:05:18","OFFERED":"3089","SCR":58.6},
        {"TENANT_NAME":"Pos Indonesia","QUEUE":"222","HANDLING":"726","MESSAGE_IN":"2471","MESSAGE_OUT":"1959","ABANDON":"277","ART":"00:42:54","AHT":"00:07:51","AST":"01:34:37","OFFERED":"1003","SCR":50},
        {"TENANT_NAME":"Telkom Care","QUEUE":"11","HANDLING":"2486","MESSAGE_IN":"6392","MESSAGE_OUT":"5228","ABANDON":"1468","ART":"00:21:31","AHT":"00:06:21","AST":"00:22:59","OFFERED":"3954","SCR":58},
        {"TENANT_NAME":"Pos Indonesia","QUEUE":"222","HANDLING":"726","MESSAGE_IN":"2471","MESSAGE_OUT":"1959","ABANDON":"277","ART":"00:42:54","AHT":"00:07:51","AST":"01:34:37","OFFERED":"1003","SCR":50},
        {"TENANT_NAME":"Telkom Care","QUEUE":"11","HANDLING":"2486","MESSAGE_IN":"6392","MESSAGE_OUT":"5228","ABANDON":"1468","ART":"00:21:31","AHT":"00:06:21","AST":"00:22:59","OFFERED":"3954","SCR":58},
        {"TENANT_NAME":"Telkomsel","QUEUE":"21","HANDLING":"2003","MESSAGE_IN":"3622","MESSAGE_OUT":"2011","ABANDON":"1086","ART":"00:06:09","AHT":"00:02:42","AST":"00:05:18","OFFERED":"3089","SCR":58.6},
        {"TENANT_NAME":"Pos Indonesia","QUEUE":"222","HANDLING":"726","MESSAGE_IN":"2471","MESSAGE_OUT":"1959","ABANDON":"277","ART":"00:42:54","AHT":"00:07:51","AST":"01:34:37","OFFERED":"1003","SCR":50},
        {"TENANT_NAME":"Telkom Care","QUEUE":"11","HANDLING":"2486","MESSAGE_IN":"6392","MESSAGE_OUT":"5228","ABANDON":"1468","ART":"00:21:31","AHT":"00:06:21","AST":"00:22:59","OFFERED":"3954","SCR":58},
        {"TENANT_NAME":"Pos Indonesia","QUEUE":"222","HANDLING":"726","MESSAGE_IN":"2471","MESSAGE_OUT":"1959","ABANDON":"277","ART":"00:42:54","AHT":"00:07:51","AST":"01:34:37","OFFERED":"1003","SCR":50},
        {"TENANT_NAME":"Telkom Care","QUEUE":"11","HANDLING":"2486","MESSAGE_IN":"6392","MESSAGE_OUT":"5228","ABANDON":"1468","ART":"00:21:31","AHT":"00:06:21","AST":"00:22:59","OFFERED":"3954","SCR":58},
        {"TENANT_NAME":"Telkomsel","QUEUE":"21","HANDLING":"2003","MESSAGE_IN":"3622","MESSAGE_OUT":"2011","ABANDON":"1086","ART":"00:06:09","AHT":"00:02:42","AST":"00:05:18","OFFERED":"3089","SCR":58.6},
        {"TENANT_NAME":"Pos Indonesia","QUEUE":"222","HANDLING":"726","MESSAGE_IN":"2471","MESSAGE_OUT":"1959","ABANDON":"277","ART":"00:42:54","AHT":"00:07:51","AST":"01:34:37","OFFERED":"1003","SCR":50},
        {"TENANT_NAME":"Telkom Care","QUEUE":"11","HANDLING":"2486","MESSAGE_IN":"6392","MESSAGE_OUT":"5228","ABANDON":"1468","ART":"00:21:31","AHT":"00:06:21","AST":"00:22:59","OFFERED":"3954","SCR":58},
        {"TENANT_NAME":"Pos Indonesia","QUEUE":"222","HANDLING":"726","MESSAGE_IN":"2471","MESSAGE_OUT":"1959","ABANDON":"277","ART":"00:42:54","AHT":"00:07:51","AST":"01:34:37","OFFERED":"1003","SCR":50},
        {"TENANT_NAME":"Telkom Care","QUEUE":"11","HANDLING":"2486","MESSAGE_IN":"6392","MESSAGE_OUT":"5228","ABANDON":"1468","ART":"00:21:31","AHT":"00:06:21","AST":"00:22:59","OFFERED":"3954","SCR":58},
        {"TENANT_NAME":"Telkomsel","QUEUE":"21","HANDLING":"2003","MESSAGE_IN":"3622","MESSAGE_OUT":"2011","ABANDON":"1086","ART":"00:06:09","AHT":"00:02:42","AST":"00:05:18","OFFERED":"3089","SCR":58.6},
        {"TENANT_NAME":"Pos Indonesia","QUEUE":"222","HANDLING":"726","MESSAGE_IN":"2471","MESSAGE_OUT":"1959","ABANDON":"277","ART":"00:42:54","AHT":"00:07:51","AST":"01:34:37","OFFERED":"1003","SCR":50},
        {"TENANT_NAME":"Telkom Care","QUEUE":"11","HANDLING":"2486","MESSAGE_IN":"6392","MESSAGE_OUT":"5228","ABANDON":"1468","ART":"00:21:31","AHT":"00:06:21","AST":"00:22:59","OFFERED":"3954","SCR":58},
        {"TENANT_NAME":"Pos Indonesia","QUEUE":"222","HANDLING":"726","MESSAGE_IN":"2471","MESSAGE_OUT":"1959","ABANDON":"277","ART":"00:42:54","AHT":"00:07:51","AST":"01:34:37","OFFERED":"1003","SCR":50},
        {"TENANT_NAME":"Telkom Care","QUEUE":"11","HANDLING":"2486","MESSAGE_IN":"6392","MESSAGE_OUT":"5228","ABANDON":"1468","ART":"00:21:31","AHT":"00:06:21","AST":"00:22:59","OFFERED":"3954","SCR":58},
        {"TENANT_NAME":"Telkomsel","QUEUE":"21","HANDLING":"2003","MESSAGE_IN":"3622","MESSAGE_OUT":"2011","ABANDON":"1086","ART":"00:06:09","AHT":"00:02:42","AST":"00:05:18","OFFERED":"3089","SCR":58.6},
        {"TENANT_NAME":"Pos Indonesia","QUEUE":"222","HANDLING":"726","MESSAGE_IN":"2471","MESSAGE_OUT":"1959","ABANDON":"277","ART":"00:42:54","AHT":"00:07:51","AST":"01:34:37","OFFERED":"1003","SCR":50},
        {"TENANT_NAME":"Telkom Care","QUEUE":"11","HANDLING":"2486","MESSAGE_IN":"6392","MESSAGE_OUT":"5228","ABANDON":"1468","ART":"00:21:31","AHT":"00:06:21","AST":"00:22:59","OFFERED":"3954","SCR":58},
        {"TENANT_NAME":"Pos Indonesia","QUEUE":"222","HANDLING":"726","MESSAGE_IN":"2471","MESSAGE_OUT":"1959","ABANDON":"277","ART":"00:42:54","AHT":"00:07:51","AST":"01:34:37","OFFERED":"1003","SCR":50},
        {"TENANT_NAME":"Telkom Care","QUEUE":"11","HANDLING":"2486","MESSAGE_IN":"6392","MESSAGE_OUT":"5228","ABANDON":"1468","ART":"00:21:31","AHT":"00:06:21","AST":"00:22:59","OFFERED":"3954","SCR":58},
        {"TENANT_NAME":"Telkomsel","QUEUE":"21","HANDLING":"2003","MESSAGE_IN":"3622","MESSAGE_OUT":"2011","ABANDON":"1086","ART":"00:06:09","AHT":"00:02:42","AST":"00:05:18","OFFERED":"3089","SCR":58.6},
        {"TENANT_NAME":"Pos Indonesia","QUEUE":"222","HANDLING":"726","MESSAGE_IN":"2471","MESSAGE_OUT":"1959","ABANDON":"277","ART":"00:42:54","AHT":"00:07:51","AST":"01:34:37","OFFERED":"1003","SCR":50},
        {"TENANT_NAME":"Telkom Care","QUEUE":"11","HANDLING":"2486","MESSAGE_IN":"6392","MESSAGE_OUT":"5228","ABANDON":"1468","ART":"00:21:31","AHT":"00:06:21","AST":"00:22:59","OFFERED":"3954","SCR":58},
        {"TENANT_NAME":"Pos Indonesia","QUEUE":"222","HANDLING":"726","MESSAGE_IN":"2471","MESSAGE_OUT":"1959","ABANDON":"277","ART":"00:42:54","AHT":"00:07:51","AST":"01:34:37","OFFERED":"1003","SCR":50},
        {"TENANT_NAME":"Telkom Care","QUEUE":"11","HANDLING":"2486","MESSAGE_IN":"6392","MESSAGE_OUT":"5228","ABANDON":"1468","ART":"00:21:31","AHT":"00:06:21","AST":"00:22:59","OFFERED":"3954","SCR":58},
        {"TENANT_NAME":"Telkomsel","QUEUE":"21","HANDLING":"2003","MESSAGE_IN":"3622","MESSAGE_OUT":"2011","ABANDON":"1086","ART":"00:06:09","AHT":"00:02:42","AST":"00:05:18","OFFERED":"3089","SCR":58.6},
        {"TENANT_NAME":"Pos Indonesia","QUEUE":"222","HANDLING":"726","MESSAGE_IN":"2471","MESSAGE_OUT":"1959","ABANDON":"277","ART":"00:42:54","AHT":"00:07:51","AST":"01:34:37","OFFERED":"1003","SCR":50},
        {"TENANT_NAME":"Telkom Care","QUEUE":"11","HANDLING":"2486","MESSAGE_IN":"6392","MESSAGE_OUT":"5228","ABANDON":"1468","ART":"00:21:31","AHT":"00:06:21","AST":"00:22:59","OFFERED":"3954","SCR":58},
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
        $("#filter-loader").fadeIn("slow");
        callThreeTable(tokenSession, '', arr_tenant, 0, 30);
        callPieChartSummary(tokenSession, '', arr_tenant);
        callBarLayanan(tokenSession, '', arr_tenant);
        // callLineChart('', arr_tenant);
        callTotalTable(tokenSession, '', arr_tenant);
        callTableChannel(tokenSession);
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

function callThreeTable(token, date, tenant_id, offset, limit){
    $.ajax({
        beforeSend: function (xhr) {
            xhr.setRequestHeader("token", token);
        },
        type: 'POST',
        url: base_url + 'api/Wallboard/WallboardController/summaryPerformanceNasional',
        data: {
            date: date,
            tenant_id: tenant_id,
            offset: offset,
            limit: limit
        },
        success: function (r) {
            var response = r;
            // if(response.status != false){
                $('#modalError').modal('hide');
                setTimeout(function(){callThreeTable(token, date, arr_tenant, offset, limit);},5000);
                drawTableRealTime(token, response, date, tenant_id, offset, limit);
            // }else{
            //     // var notif = alert('Your Account Credential is Invalid. Maybe someone else has logon to your account.')
            //     // if(notif){
            //     //     localStorage.clear();
            //     //     window.location = base_url+'main/login';
            //     // }else{
            //     //     localStorage.clear();
            //     //     window.location = base_url+'main/login';
            //     // }
            //     console.log(response)
            // }
        },
        error: function (r) {
            if(r.responseJSON.status == false && r.responseJSON.message == "404 Not found."){
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
            // setTimeout(function(){callThreeTable(token, date, arr_tenant, offset, limit);},5000);
            // $("#filter-loader").fadeOut("slow");
        },
    });
}

function drawTableRealTime(token, response, date, tenant_id, offset, limit){
    // for (var i = 0; i < 10; i++) {
    //     console.log(response.data[i].TENANT_NAME);
    // }
    // console.log(response.data[0].TENANT_NAME);
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
        for (var i = 0; i < 15; i++) {
            if (response.data[i]){
                $('#mytable_1').find('tbody').append('<tr>'+
                        '<td class="text-center">'+(h+1)+'</td>'+
                        '<td class="text-left" style="font-size:8px;">'+(response.data[i].TENANT_NAME || 0)+'</td>'+
                        '<td class="text-right">'+(response.data[i].QUEUE || 0)+'</td>'+
                        '<td class="text-center">'+(response.data[i].ART || 0)+'</td>'+
                        '<td class="text-center">'+(response.data[i].AHT || 0)+'</td>'+
                        '<td class="text-center">'+(response.data[i].AST || 0)+'</td>'+
                        '<td class="text-right">'+(addCommas(response.data[i].MESSAGE_IN) || 0)+'</td>'+
                        '<td class="text-right">'+(addCommas(response.data[i].MESSAGE_OUT) || 0)+'</td>'+
                        '<td class="text-right">'+(addCommas(response.data[i].ABANDON) || 0)+'</td>'+
                        '<td class="text-right">'+(addCommas(response.data[i].HANDLING) || 0)+'</td>'+
                        '<td class="text-right">'+(addCommas(response.data[i].OFFERED) || 0)+'</td>'+
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
                    '<td class="text-center"></td>'+
                    '<td class="text-center"></td>'+
                    '<td class="text-right"></td>'+
                    '<td class="text-right"></td>'+
                    '<td class="text-right"></td>'+
                    '<td class="text-right"></td>'+
                    '<td class="text-right"></td>'+
                '</tr>');
            }
            h++;
        }
    }

    $('#mytbody_2').empty();
    if (response.data.length != 0) {
        for (var i = 15; i < 30; i++) {
            if (response.data[i]){
                $('#mytable_2').find('tbody').append('<tr>'+
                '<td class="text-center">'+(h+1)+'</td>'+
                '<td class="text-left" style="font-size:8px;">'+(response.data[i].TENANT_NAME || 0)+'</td>'+
                '<td class="text-right">'+(response.data[i].QUEUE || 0)+'</td>'+
                '<td class="text-center">'+(response.data[i].ART || 0)+'</td>'+
                '<td class="text-center">'+(response.data[i].AHT || 0)+'</td>'+
                '<td class="text-center">'+(response.data[i].AST || 0)+'</td>'+
                '<td class="text-right">'+(addCommas(response.data[i].MESSAGE_IN) || 0)+'</td>'+
                '<td class="text-right">'+(addCommas(response.data[i].MESSAGE_OUT) || 0)+'</td>'+
                '<td class="text-right">'+(addCommas(response.data[i].ABANDON) || 0)+'</td>'+
                '<td class="text-right">'+(addCommas(response.data[i].HANDLING) || 0)+'</td>'+
                '<td class="text-right">'+(addCommas(response.data[i].OFFERED) || 0)+'</td>'+
                '<td class="text-right font-weight-extrabold">'+((response.data[i].SCR.toString()).replace('.',',') || 0)+'%</td>'+
                '</tr>');
            }else{
                $('#mytable_2').find('tbody').append(
                '<tr>'+
                '<td class="text-center">'+(h+1)+'</td>'+
                '<td class="text-left"></td>'+
                '<td class="text-right"></td>'+
                '<td class="text-center"></td>'+
                '<td class="text-center"></td>'+
                '<td class="text-center"></td>'+
                '<td class="text-center"></td>'+
                '<td class="text-right"></td>'+
                '<td class="text-right"></td>'+
                '<td class="text-right"></td>'+
                '<td class="text-right"></td>'+
                '<td class="text-right"></td>'+
                '</tr>');
            }
            h++;
        }
    }
    console.log(response)
    var totalPage = Math.ceil(response.data_amt/limit);
    console.log(totalPage)
    console.log(offset)
    var varA = "";
    var pagDot = pagination(token, offset, totalPage, date, tenant_id, limit);
}

function pagination(token, currentPage, nrOfPages, date, tenant_id, limit) {
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
            varA += '<li class="page-item" id="li'+rangeWithDots[k]+'"><a class="page-link" href="javascript:callThreeTable('+"'"+token+"','"+date+"','"+tenant_id+"','"+(rangeWithDots[k]-1)+"','"+limit+"'"+')">'+rangeWithDots[k]+'</a></li>'
        }else{
            varA += '<li class="page-item"><a class="page-link" href="javascript:pagination('+"'"+token+"','"+(indexDot-1)+"','"+nrOfPages+"','"+date+"','"+tenant_id+"','"+limit+"'"+')">...</a></li>'
        }
    }
    $("#paging").empty();
    $("#paging").append('<li class="page-item">'+
    '<a class="page-link" href="javascript:callThreeTable('+"'"+token+"','"+date+"','"+tenant_id+"','"+0+"','"+limit+"'"+')">&laquo;</a>'+
    '</li>'+
        varA+
        '<li class="page-item">'+
        '<a class="page-link" href="javascript:callThreeTable('+"'"+token+"','"+date+"','"+tenant_id+"','"+(nrOfPages-1)+"','"+limit+"'"+')">&raquo;</a>'+
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


function callPieChartSummary(token, date, tenant_id){
    $.ajax({
        beforeSend: function (xhr) {
            xhr.setRequestHeader("token", token);
        },
        type: 'POST',
        url: base_url + 'api/Wallboard/WallboardController/summaryPerformanceNasionalPie',
        data:{
            tenant_id: tenant_id,
            date: date
        },
        success: function (r) {
            var response = r;
            $('#modalError').modal('hide');
            setTimeout(function(){callPieChartSummary(token, date, arr_tenant);},5000);
            // console.log(response);
            drawPieChartSummary(response);  
        },
        error: function (r) {
            // console.log(r);
            $('#modalError').modal('show');
            setTimeout(function(){callPieChartSummary(token, date, arr_tenant);},5000);
            // $("#filter-loader").fadeOut("slow");
        },
    });
}

function drawPieChartSummary(response){
    $('#pieChartChannel').remove();
    $('#canvas-pie').append('<canvas id="pieChartChannel" class="donutShadow overflow-hidden"></canvas>');
    var ctx = document.getElementById( "pieChartChannel" );
    ctx.height = 245;
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
                segment : true,
                fontSize:10
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

function callBarLayanan(token, date, tenant_id){
    $.ajax({
        beforeSend: function (xhr) {
            xhr.setRequestHeader("token", token);
        },
        type: 'POST',
        url: base_url + 'api/Wallboard/WallboardController/summaryPerformanceNasionalBar',
        data: {
            date: date,
            tenant_id: tenant_id
        },
        success: function (r) {
            var response = r;
            // console.log(response);
            $('#modalError').modal('hide');
            setTimeout(function(){callBarLayanan(token, date, arr_tenant);},5000);
            drawBarLayanan(response);
        },
        error: function (r) {
            // console.log(r);
            $('#modalError').modal('show');
            setTimeout(function(){callBarLayanan(token, date, arr_tenant);},5000);
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

    // console.log(response);
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
                    top:5,
                    bottom: 0
                }
            },
            title: {
                display: false,
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


function callTotalTable(token, date, tenant_id){
    $.ajax({
        beforeSend: function (xhr) {
            xhr.setRequestHeader("token", token);
        },
        type: 'POST',
        url: base_url + 'api/Wallboard/WallboardController/summaryPerformanceNasionalDANK',
        data: {
            date: date,
            tenant_id: tenant_id
        },
        success: function (r) {
            var response = r;
            $('#modalError').modal('hide');
            setTimeout(function(){callTotalTable(token, date, arr_tenant);},5000);
            drawTotalTable(response);
            responseTotal = response;
        },
        error: function (r) {
            // console.log(r);
            $('#modalError').modal('show');
            setTimeout(function(){callTotalTable(token, date, arr_tenant);},5000);
            // $("#filter-loader").fadeOut("slow");
        },
    });
}

function callTotalTable_old(date, tenant_id){
    $.ajax({
        type: 'POST',
        url: base_url + 'api/Wallboard/WallboardController/summaryPerformanceNasional',
        data: {
            date: date,
            tenant_id: tenant_id
        },
        success: function (r) {
            var response = r;
            $('#modalError').modal('hide');
            setTimeout(function(){callTotalTable(date, arr_tenant);},5000);
            drawTotalTable(response);
        },
        error: function (r) {
            // console.log(r);
            $('#modalError').modal('show');
            setTimeout(function(){callTotalTable(date, arr_tenant);},5000);
            // $("#filter-loader").fadeOut("slow");
        },
    });
}

function callTableChannel(token){
    $.ajax({
        beforeSend: function (xhr) {
            xhr.setRequestHeader("token", token);
        },
        type: 'POST',
        url: base_url + 'api/Wallboard/WallboardController/DataTableNasional',
        success: function (r) {
            var response = r;
            $('#modalError').modal('hide');
            setTimeout(function(){ callTableChannel(token);},5000);
            drawTableChannel(response);
        },
        error: function (r) {
            // console.log(r);
            $('#modalError').modal('show');
            setTimeout(function(){ callTableChannel(token);},5000);
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
        // var sumCOF = 0;
        // var sumSCR = 0;
        // var sumWaiting = 0;
        // var sumAHT = 0;
        // var avgSCR = 0;
        // var avgWaiting = 0;
        // var avgAHT = 0;

        // for (var i = 0; i < response.data.length; i++) {
        //     sumCOF+= parseInt((response.data[i].OFFERED || 0));
            // console.log(sumCOF);
            // sumSCR+= parseFloat((response.data[i].SCR || 0));
            // sumWaiting+= Number(timestrToSec(response.data[i].ART || 0));
            // sumAHT+= Number(timestrToSec(response.data[i].AHT || 0));
            // avgSCR = parseFloat((sumSCR / response.data.length)).toFixed(2);
            // avgWaiting = Math.round(sumWaiting / response.data.length);
            // avgAHT = Math.round(sumAHT / response.data.length);

        $('#rowDiv').empty();
        $('#rowDiv').append(''+
            '<div class="col-md-3">'+
                '<h6 class="font12 ml-7" id="totalCOF">Summary COF : '+addCommas(response.data.OFFERED)+'</h6>'+
            '</div>'+
            '<div class="col-md-3">'+
                '<h6 class="font12" id="rataSCR">Average SCR : '+response.data.SCR+'%</h6>'+
            '</div>'+
            '<div class="col-md-3">'+
                '<h6 class="font12" id="avgWaiting">Average Waiting Time : '+response.data.ART+'</h6>'+
            '</div>'+
            '<div class="col-md-3">'+
                '<h6 class="font12" id="avgHT">Average Handling Time : '+response.data.AHT+'</h6>'+
            '</div>'
        );
        // }
        // console.log('luhur:'+sumSCR+'/'+response.data.length);
}

function drawTableChannel(response){
    // console.log(responseTotal)
    $("#table_channel_body").empty();
    $("#table_channel_foot").empty();
    var k=0;
    var sumChnQueue = 0, sumChnArt = 0, sumChnAht = 0, sumChnAst = 0, sumChnMsgIn = 0, sumChnMsgOut = 0, sumChnAbd = 0, sumChnHandling = 0, sumchnOffered = 0, sumChnScr = 0;
    var AvgChnArt = 0;
    var AvgChnAht = 0;
    var AvgChnAst = 0;
    var AvgChnScr = 0;
    for (var i =0; i < response.channels.length; i++){
        // response.data.forEach(function(value){
        // for (var j = 0; j < response.data.length; j++){
            if(response.channels[i] == response.data[k].CHANNEL_NAME){
                $('#table_channel').find('tbody').append('<tr>'+
                    '<td class="text-center">'+(i+1)+'</td>'+
                    '<td class="text-left">'+(response.data[k].CHANNEL_NAME)+'</td>'+
                    '<td class="text-right">'+(response.data[k].QUEUE || 0)+'</td>'+
                    '<td class="text-center">'+(response.data[k].ART || 0)+'</td>'+
                    '<td class="text-center">'+(response.data[k].AHT || 0)+'</td>'+
                    '<td class="text-center">'+(response.data[k].AST || 0)+'</td>'+
                    '<td class="text-right">'+(addCommas(response.data[k].MESSAGE_IN) || 0)+'</td>'+
                    '<td class="text-right">'+(addCommas(response.data[k].MESSAGE_OUT) || 0)+'</td>'+
                    '<td class="text-right">'+(addCommas(response.data[k].ABANDON) || 0)+'</td>'+
                    '<td class="text-right">'+(addCommas(response.data[k].HANDLING) || 0)+'</td>'+
                    '<td class="text-right">'+(addCommas(response.data[k].OFFERED) || 0)+'</td>'+
                    '<td class="text-right font-weight-extrabold">'+((response.data[k].SCR.toString()).replace('.',',') || 0)+'%</td>'+
                '</tr>');

                sumChnQueue += Number(response.data[k].QUEUE);
                sumChnArt += Number(timestrToSec(response.data[k].ART));
                sumChnAht += Number(timestrToSec(response.data[k].AHT));
                sumChnAst += Number(timestrToSec(response.data[k].AST));
                sumChnMsgIn += Number(response.data[k].MESSAGE_IN);
                sumChnMsgOut =+ Number(response.data[k].MESSAGE_OUT);
                sumChnAbd += Number(response.data[k].ABANDON);
                sumChnHandling += Number(response.data[k].HANDLING);
                sumchnOffered += Number(response.data[k].OFFERED);
                sumChnScr += Number(response.data[k].SCR);
                AvgChnArt = Math.round((sumChnArt / response.data.length));
                AvgChnAht = Math.round((sumChnAht / response.data.length));
                AvgChnAst = Math.round((sumChnAst / response.data.length));
                AvgChnScr = parseFloat((sumChnScr / response.data.length)).toFixed(2);
                k++;
            }else{
                $('#table_channel').find('tbody').append('<tr>'+
                    '<td class="text-center">'+(i+1)+'</td>'+
                    '<td class="text-left">'+(response.channels[i])+'</td>'+
                    '<td class="text-right">-</td>'+
                    '<td class="text-center">--:--:--</td>'+
                    '<td class="text-center">--:--:--</td>'+
                    '<td class="text-center">--:--:--</td>'+
                    '<td class="text-right">-</td>'+
                    '<td class="text-right">-</td>'+
                    '<td class="text-right">-</td>'+
                    '<td class="text-right">-</td>'+
                    '<td class="text-right">-</td>'+
                    '<td class="text-right">-</td>'+
                '</tr>');
            }
        // }

            // sumChnQueue += Number(value.QUEUE);
            // sumChnArt += Number(timestrToSec(value.ART));
            // sumChnAht += Number(timestrToSec(value.AHT));
            // sumChnAst += Number(timestrToSec(value.AST));
            // sumChnMsgIn += Number(value.MESSAGE_IN);
            // sumChnMsgOut =+ Number(value.MESSAGE_OUT);
            // sumChnAbd += Number(value.ABANDON);
            // sumChnHandling += Number(value.HANDLING);
            // sumchnOffered += Number(value.OFFERED);
            // sumChnScr += Number(value.SCR);
            // AvgChnArt = Math.round((sumChnArt / response.data.length));
            // AvgChnAht = Math.round((sumChnAht / response.data.length));
            // AvgChnAst = Math.round((sumChnAst / response.data.length));
            // AvgChnScr = parseFloat((sumChnScr / response.data.length)).toFixed(2);
        // });
    // });
    }
    // console.log(sumChnScr+'/'+response.data.length);
    $('#table_channel').find('tfoot').append('<tr>'+
        '<td colspan="2" class="text-center">Total</td>'+
        '<td class="text-right">'+(addCommas(responseTotal.data.QUEUE) || 0)+'</td>'+
        '<td class="text-center">'+(responseTotal.data.ART || 0)+'</td>'+
        '<td class="text-center">'+(responseTotal.data.AHT || 0)+'</td>'+
        '<td class="text-center">'+(responseTotal.data.AST || 0)+'</td>'+
        '<td class="text-right">'+(addCommas(responseTotal.data.MESSAGE_IN) || 0)+'</td>'+
        '<td class="text-right">'+(addCommas(responseTotal.data.MESSAGE_OUT) || 0)+'</td>'+
        '<td class="text-right">'+(addCommas(responseTotal.data.ABANDON) || 0)+'</td>'+
        '<td class="text-right">'+(addCommas(responseTotal.data.HANDLING) || 0)+'</td>'+
        '<td class="text-right">'+(addCommas(responseTotal.data.OFFERED) || 0)+'</td>'+
        '<td class="text-right">'+((responseTotal.data.SCR.toString()).replace('.',',') || 0)+'%</td>'+
    '</tr>');
}