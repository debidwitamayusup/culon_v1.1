var base_url = $('#base_url').val();

$(document).ready(function () {
    summaryStatusTicketPerUnit();
});

function summaryStatusTicketPerUnit(){
    $.ajax({
        type: 'post',
        url: base_url + 'api/AgentPerformance/AgentPerformController/getSAgentperformBYskill',
        data: {
        },
        success: function (r) { 
            var response = JSON.parse(r);
            // console.log(response.data[0].new);
            drawTable(response);
            // drawDataTable(response);
        },
        error: function (r) {
            alert("error");
        },
    });
}

function drawTable(response){
    //destroy div piechart

    $('#tableSkill').DataTable();
    $('#mytbody').remove();
    $('#table_summary_ticket').append('<tbody style="font-size:12px !important;" id="mytbody"></tbody>');

    var skill_id=0, skill_name=0, avg_aht=0, avg_art=0, avg_ast=0;
    $("#mytbody").empty();
    response.data.forEach(function (value, index) {
        $('#tableSkill').find('tbody').append('<tr>'+
        '<td class="text-center">'+(value.skill_id)+'</td>'+
        '<td class="text-left">'+value.skill_name+'</td>'+
        '<td class="text-right">'+(value.aht)+'</td>'+
        '<td class="text-right">'+(value.art)+'</td>'+
        '<td class="text-right">'+(value.ast)+'</td>'+
        '</tr>');

        i++;
    });
    console.log(response.data);
}

$(function(e) {
    //sample datatable	
    $('#tableAgent').DataTable();
    // $('#tableSkill').DataTable();
});