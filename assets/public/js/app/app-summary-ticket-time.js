var base_url = $('#base_url').val();
var v_params = 'day';
var v_index = '2020-01-10';
var v_month = '1';
var v_year = '2020';

$('#tablesummary').DataTable();

$(document).ready(function () {
    loadContent(v_params, v_index, 0);
    // ini_finctiiin();
});

function loadContent(index, params, params_year){
    summaryStatusTicketPerUnit(params, index, params_year);
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

function summaryStatusTicketPerUnit(params, index, params_year){
    $("#filter-loader").fadeIn("slow");
    $.ajax({
        type: 'post',
        url: base_url + 'api/SummaryTicket/SummaryTicketUnit/getSummaryStatusperUnit',
        data: {
            params: params,
            index: index,
            params_year: params_year
        },
        success: function (r) { 
            var response = JSON.parse(r);
            // console.log(response.data[0].new);
            drawTable(response);
    		$("#filter-loader").fadeOut("slow");
        },
        error: function (r) {
            alert("error");
    		$("#filter-loader").fadeOut("slow");
        },
    });
}

function drawTable(response){
    //destroy div piechart
    $('#mytbody').remove();
    $('#summ_status_ticket_unit').append('<tbody style="font-size:12px !important;" id="mytbody"></tbody>');

    var sum_new=0, sum_open=0, sum_onProgress=0, sum_resolved=0, sum_reopen=0, sum_pending=0, sum_return=0; sum_reject=0;
    $("#mytbody").empty();
    var i = 0;
    response.data.forEach(function (value, index) {
        sum_new = parseInt(sum_new)+parseInt(value.new);
        sum_open = parseInt(sum_open)+parseInt(value.open);
        sum_onProgress = parseInt(sum_onProgress)+parseInt(value.onProgress);
        sum_reopen = parseInt(sum_reopen)+parseInt(value.Reopen);
        sum_resolved = parseInt(sum_resolved)+parseInt(value.Resolved);
        sum_pending = parseInt(sum_pending)+parseInt(value.pending);
        sum_return = parseInt(sum_return)+parseInt(value.return);
        sum_reject = parseInt(sum_reject)+parseInt(value.reject)
        summarize = parseInt(value.new)+parseInt(value.open)+parseInt(value.onProgress)+parseInt(value.Resolved)+parseInt(value.Reopen)+parseInt(value.pending)+parseInt(value.return)+parseInt(value.reject);

        $('#summ_status_ticket_unit').find('tbody').append('<tr>'+
        '<td class="text-center">'+(i+1)+'</td>'+
        '<td class="text-left">'+value.unit+'</td>'+
        '<td class="text-right">'+addCommas(value.new)+'</td>'+
        '<td class="text-right">'+addCommas(value.open)+'</td>'+
        '<td class="text-right">'+addCommas(value.onProgress)+'</td>'+
        '<td class="text-right">'+addCommas(value.Resolved)+'</td>'+
        '<td class="text-right">'+addCommas(value.Reopen)+'</td>'+
        '<td class="text-right">'+addCommas(value.pending)+'</td>'+
        '<td class="text-right">'+addCommas(value.return)+'</td>'+
        '<td class="text-right">'+addCommas(value.reject)+'</td>'+
        '<td class="text-right font-weight-extrabold">'+addCommas(summarize)+'</td>'+
        '</tr>');

        i++;
    });

    $("#filter-loader").fadeOut("slow");
}

//pie chart summary ticket time
var ctx = document.getElementById( "pieTicketTime" );
ctx.height = 385;
var myChart = new Chart( ctx, {
    type: 'pie',
    data: {
        datasets: [ {
            data: [ 15, 35, 40],
            backgroundColor: [
                                "#A5B0B6",
                                "#009E8C",
                                "#00436D"
                            ],
            hoverBackgroundColor: [
                                "#A5B0B6",
                                "#009E8C",
                                "#00436D"
                            ]

                        } ],
        labels: [
                            "Information",
                            "Respond",
                            "Complaint",
                ]
    },
    options: {
        responsive: true,
        maintainAspectRatio: false,
        legend:{
            position:"bottom",
            labels:{
                boxWidth:10
           }
        }
    }
} );




(jQuery);