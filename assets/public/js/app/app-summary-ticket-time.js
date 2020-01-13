var base_url = $('#base_url').val();
var v_params = 'day';
var v_index = '2020-01-10';
var v_month = '1';
var v_year = '2020';
$(document).ready(function () {
    loadContent(v_params, v_index, 0);
    // ini_finctiiin();
    $("#btn-month").prop("class","btn btn-light btn-sm");
    $("#btn-year").prop("class","btn btn-light btn-sm");
    $("#btn-day").prop("class","btn btn-red btn-sm");
});

function loadContent(index, params, params_year){
    simmiriStatusTicket(params, index, params_year);
    simmiriUnit(params, index, params_year);
    summaryStatusTicketPerUnit(params, index, params_year);
}

function summaryStatusTicketPerUnit(params, index, params_year){
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
        },
        error: function (r) {
            alert("error");
        },
    });
}

function drawTable(response){
    //destroy div piechart
    $('#mytbody').remove();
    $('#mytfoot').remove();
    $('#table_summary_ticket').append('<tbody style="font-size:12px !important;" id="mytbody"></tbody>');
    $('#table_summary_ticket').append('<tfoot class="font-weight-extrabold text-right bg-total" id="mytfoot"></tfoot>');

    var sum_new=0, sum_open=0, sum_onProgress=0, sum_resolved=0, sum_reopen=0, sum_pending=0, sum_return=0;
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

        $('#table_summary_ticket').find('tbody').append('<tr>'+
        '<td class="text-center">'+(i+1)+'</td>'+
        '<td class="text-left">'+value.unit+'</td>'+
        '<td class="text-right">'+addCommas(value.new)+'</td>'+
        '<td class="text-right">'+addCommas(value.open)+'</td>'+
        '<td class="text-right">'+addCommas(value.onProgress)+'</td>'+
        '<td class="text-right">'+addCommas(value.Resolved)+'</td>'+
        '<td class="text-right">'+addCommas(value.Reopen)+'</td>'+
        '<td class="text-right">'+addCommas(value.pending)+'</td>'+
        '<td class="text-right">'+addCommas(value.return)+'</td>'+
        '</tr>');

        i++;
    });

    $('#table_summary_ticket').find('tfoot').append('<th colspan="2" class="font-weight-extrabold">Total</th>'+
                                                    '<th>'+sum_new+'</th>'+
                                                    '<th>'+sum_open+'</th>'+
                                                    '<th>'+sum_onProgress+'</th>'+
                                                    '<th>'+sum_resolved+'</th>'+
                                                    '<th>'+sum_reopen+'</th>'+
                                                    '<th>'+sum_pending+'</th>'+
                                                    '<th>'+sum_return+'</th>');

    $("#filter-loader").fadeOut("slow");
}