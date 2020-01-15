var base_url = $('#base_url').val();

$(document).ready(function () {
    performanceBySkill();
});

function performanceBySkill(){
    $.ajax({
        type: 'post',
        url: base_url + 'api/AgentPerformance/AgentPerformController/getSAgentperformBYskill',
        success: function (r) { 
            var response = JSON.parse(r);
            console.log(response);
            drawTable(response);
            // drawDataTable(response);
        },
        error: function (r) {
            alert("error");
        },
    });
}

function drawTable(response){
	$('#mytbody_skill').remove();
    $('#tableSkill').append('<tbody style="font-size:12px !important;" id="mytbody_skill"></tbody>');

    $("#mytbody_skill").empty();
    if(response.data.length != 0){
        response.data.forEach(function (value, index) {
            $('#tableSkill').find('tbody').append('<tr>'+
            '<td class="text-left">'+value.skill_name+'</td>'+
            '<td class="text-right">'+value.avg_aht+'</td>'+
            '<td class="text-right">'+value.avg_art+'</td>'+
            '<td class="text-right">'+value.avg_ast+'</td>'+
            '</tr>');
        });
    }else{
        $('#tableSkill').find('tbody').append('<tr>'+
            '<td colspan=6> No Data </td>'+
            '</tr>');
    }
    // console.log(response.data)
    
}

$(function(e) {
    //sample datatable	
    $('#tableAgent').DataTable();
    // $('#tableSkill').DataTable();
});