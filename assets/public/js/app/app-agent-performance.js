var base_url = $('#base_url').val();
var v_src = '';
var v_params = 'day';

$(document).ready(function () {
    performanceBySkill();
    drawDataTable();
    bestOfFive(src, params);
});

function performanceBySkill(){
    $.ajax({
        type: 'post',
        url: base_url + 'api/AgentPerformance/AgentPerformController/getSAgentperformBYskill',
        success: function (r) { 
            var response = JSON.parse(r);
            // console.log(response);
            drawTable(response);
            // drawDataTable(response);
        },
        error: function (r) {
            alert("error");
        },
    });
}

function bestOfFive(src, params){
    $.ajax({
        type: 'post',
        url: base_url + 'api/AgentPerformance/AgentPerformController/getSAgentperformskill',
        data: {
        	params: params,
        	src: src
        },
        success: function (r) { 
            var response = JSON.parse(r);
            // console.log(response);
            drawCardCOF(response);
            drawCardAHT(response);
            drawCardART(response);
            // $("#filter-loader").fadeOut("slow");
        },
        error: function (r) {
            alert("error");
        },
    });
}

function drawTable(response){
	$('#mytbody_skill').remove();
    $('#tableSkill').append('<tbody style="font-size:12px !important;" id="mytbody_skill"></tbody>');
    console.log(response.data);
    $("#mytbody_skill").empty();
    if(response.data.length != 0){
        response.data.forEach(function (value, index) {
            $('#tableSkill').find('tbody').append('<tr>'+
            '<td class="text-left">'+value.SKILLNAME+'</td>'+
            '<td class="text-right">'+value.AHT+'</td>'+
            '<td class="text-right">'+value.ART+'</td>'+
            '<td class="text-right">'+value.AST+'</td>'+
            '</tr>');
        });
    }else{
        $('#tableSkill').find('tbody').append('<tr>'+
            '<td colspan=6> No Data </td>'+
            '</tr>');
    }
    // console.log(response.data)
    
}

function drawDataTable(){
    $('#mytbody').remove();
    $('#tableAgent').append('<tbody style="font-size:12px !important;" id="mytbody"></tbody>');

    $('#tableAgent').DataTable({
        processing : true,
        ajax: {
            url : base_url + 'api/AgentPerformance/AgentPerformController/getSAgentperformskill',
            type : 'POST'
        },
        destroy: true,
	});
}


$(function(e) {
    //sample datatable	
    $('#tableAgent').DataTable();
    // $('#tableSkill').DataTable();
});