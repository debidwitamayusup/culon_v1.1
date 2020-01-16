var base_url = $('#base_url').val();

$(document).ready(function () {
    performanceBySkill();
    drawDataTable();
    bestOfFiveCOF();
    bestOfFiveAHT();
    bestOfFiveART();
});

function performanceBySkill(){
	$("#filter-loader").fadeIn("slow");
    $.ajax({
        type: 'post',
        url: base_url + 'api/AgentPerformance/AgentPerformController/getSAgentperformBYskill',
        success: function (r) { 
            var response = JSON.parse(r);
            // console.log(response);
            drawTable(response);
            // drawDataTable(response);
            $("#filter-loader").fadeOut("slow");
        },
        error: function (r) {
            alert("error");
            $("#filter-loader").fadeOut("slow");
        },
    });
}

function bestOfFiveCOF(params){
	$("#filter-loader").fadeIn("slow");
    $.ajax({
        type: 'post',
        url: base_url + 'api/AgentPerformance/AgentPerformController/getSAgentperformskill',
        data: {
        	params: 'COF',
        },
        success: function (r) { 
            var response = JSON.parse(r);
            // console.log(response.data[0][2]);
        	// $('#nameAgent').html(response.data[0][2]);
        	// $('#nilaiAgent').html(response.data[0][5]);
        	// $('#nameAgent2').html(response.data[1][2]);
        	// $('#nilaiAgent2').html(response.data[1][5]);
        	// $('#nameAgent3').html(response.data[2][2]);
        	// $('#nilaiAgent3').html(response.data[2][5]);
        	// $('#nameAgent4').html(response.data[3][2]);
        	// $('#nilaiAgent4').html(response.data[3][5]);
        	// $('#nameAgent5').html(response.data[4][2]);
        	// $('#nilaiAgent5').html(response.data[4][5]);
  			dataCardCOF(response);
  			// dataCardART(response);
  			// dataCardAHT(response);
  			$("#filter-loader").fadeOut("slow");
        },
        error: function (r) {
            alert("error");
            $("#filter-loader").fadeOut("slow");
        },
    });
}

function bestOfFiveAHT(params){
	$("#filter-loader").fadeIn("slow");
    $.ajax({
        type: 'post',
        url: base_url + 'api/AgentPerformance/AgentPerformController/getSAgentperformskill',
        data: {
        	params: 'AHT',
        },
        success: function (r) { 
            var response = JSON.parse(r);
  			dataCardAHT(response);
  			$("#filter-loader").fadeOut("slow");
        },
        error: function (r) {
            alert("error");
            $("#filter-loader").fadeOut("slow");
        },
    });
}

function bestOfFiveART(params){
	$("#filter-loader").fadeIn("slow");
    $.ajax({
        type: 'post',
        url: base_url + 'api/AgentPerformance/AgentPerformController/getSAgentperformskill',
        data: {
        	params: 'ART',
        },
        success: function (r) { 
            var response = JSON.parse(r);
  			dataCardART(response);
  			$("#filter-loader").fadeOut("slow");
        },
        error: function (r) {
            alert("error");
            $("#filter-loader").fadeOut("slow");
        },
    });
}

function dataCardCOF(response)
{
	// console.log(response.data);
	var i=1;
	response.data.forEach(function(value,index){
		$('#dataDrawCOF').append('<div class="col-2 text-center">'+
                                 // '<span class="avatar avatar-md brround cover-image"></span>'+
                                 	// '<img src="'+value[8]+'" style="border-radius:100%; width: 200px; height: 40px;">'+
                                 	'<div style="background-repeat: no-repeat; backgroud-size: cover; overflow:hidde; -webkit-border-radius:25px; -moz-border-radius:25px; width:40px; height:auto; border-radius:50px ;">'+
                                 		'<img src='+value[8]+' style="border-radius:75%;">'+
                                 	'</div>'+
                             '</div>'+
                             '<div class="col-7 text-center">'+
                                 '<h5 class="font14 mt-1 mb-3">Agent '+i+'</h5>'+
                                 '<h6 class="text-muted font10" id="nameAgent">'+value[2]+'</h6>'+
                             '</div>'+
                             '<div class="col-3 text-right">'+
                                 '<h5 class="font-weight-extrabold" id="nilaiAgent">'+value[4]+'</h5>'+
                                 '<h6 class="text-muted font10">Handling</h6>'+
                             '</div>');
		i++;
		// console.log(value[2]);
	});
}

function dataCardAHT(response)
{
	// console.log(response.data);
	var i=1;
	response.data.forEach(function(value,index){
		$('#dataDrawAHT').append('<div class="col-2 text-center">'+
                                 '<div style="background-repeat: no-repeat; backgroud-size: cover; overflow:hidde; -webkit-border-radius:25px; -moz-border-radius:25px; width:40px; height:auto; border-radius:50px ;">'+
                                 	'<img src='+value[8]+' style="border-radius:75%;">'+
                                 '</div>'+
                             '</div>'+
                             '<div class="col-7 text-center">'+
                                 '<h5 class="font14 mt-1 mb-3">Agent '+i+'</h5>'+
                                 '<h6 class="text-muted font10" id="nameAgent">'+value[2]+'</h6>'+
                             '</div>'+
                             '<div class="col-3 text-right">'+
                                 '<h5 class="font-weight-extrabold" id="nilaiAgent">'+value[6]+'</h5>'+
                                 '<h6 class="text-muted font10">Handling</h6>'+
                             '</div>');
		i++;
		// console.log(value[2]);
	});
}

function dataCardART(response)
{
	// console.log(response.data);
	var i=1;
	response.data.forEach(function(value,index){
		$('#dataDrawART').append('<div class="col-2 text-center">'+
                                 '<div style="background-repeat: no-repeat; backgroud-size: cover; overflow:hidde; -webkit-border-radius:25px; -moz-border-radius:25px; width:40px; height:auto; border-radius:50px ;">'+
                                 	'<img src='+value[8]+' style="border-radius:75%;">'+
                                 '</div>'+
                             '</div>'+
                             '<div class="col-7 text-center">'+
                                 '<h5 class="font14 mt-1 mb-3">Agent '+i+'</h5>'+
                                 '<h6 class="text-muted font10" id="nameAgent">'+value[2]+'</h6>'+
                             '</div>'+
                             '<div class="col-3 text-right">'+
                                 '<h5 class="font-weight-extrabold" id="nilaiAgent">'+value[5]+'</h5>'+
                                 '<h6 class="text-muted font10">Handling</h6>'+
                             '</div>');
		i++;
		// console.log(value[2]);
	});
}

function drawTable(response){
	$('#mytbody_skill').remove();
    $('#tableSkill').append('<tbody style="font-size:12px !important;" id="mytbody_skill"></tbody>');
    // console.log(response.data);
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
        columnDefs: [
			{ className: "text-center", targets: 0 },
			{ className: "text-right", targets: 4 },
			{ className: "text-center", targets: 5 },
			{ className: "text-center", targets: 6 },
			{ className: "text-center", targets: 7 }
			// { className: "text-right font-weight-extrabold", targets: 5 }
		], 
        destroy: true,
	});
}


$(function(e) {
    //sample datatable	
    $('#tableAgent').DataTable();
    // $('#tableSkill').DataTable();
});