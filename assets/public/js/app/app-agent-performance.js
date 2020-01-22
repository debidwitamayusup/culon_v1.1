var base_url = $('#base_url').val();
v_date='';
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
var v_params_this_year = m + '-' + n + '-' + (o-1);

$(document).ready(function () {
    performanceBySkill('day', v_params_this_year, 0);
    drawDataTable('day', v_params_this_year, 0);
    bestOfFiveCOF('COF','day', v_params_this_year, 0);
    bestOfFiveAHT('AHT','day', v_params_this_year, 0);
    bestOfFiveART('ART','day', v_params_this_year, 0);
    $('#btn-day').prop("class","btn btn-red btn-sm");
    $('#input-date-filter').datepicker("setDate", v_params_this_year);
    $('#select-month option[value='+n+']').attr('selected','selected');
    $('#select-year-on-month option[value='+m+']').attr('selected','selected');
    $('#select-year-only option[value='+m+']').attr('selected','selected');
    $('#filter-date').show();
    $('#filter-month').hide();
    $('#filter-year').hide();
    setMonthPicker();
    setYearPicker();
});

function setDatePicker(){
    $(".datepicker").datepicker({
        format: "yyyy-mm-dd",
        todayHighlight: true,
        autoclose: true
    }).attr("readonly", "readonly").css({"cursor":"pointer", "background":"white"});
}

function performanceBySkill(params, index, params_year){
	$("#filter-loader").fadeIn("slow");
    $.ajax({
        type: 'post',
        url: base_url + 'api/AgentPerformance/AgentPerformController/getSAgentperformBYskill',
        data: {
            params: params,
            index, index,
            params_year: params_year
        },
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

function bestOfFiveCOF(params, params_time, index, params_year){
	$("#filter-loader").fadeIn("slow");
    $.ajax({
        type: 'post',
        url: base_url + 'api/AgentPerformance/AgentPerformController/getSAgentperformskill',
        data: {
        	params: 'COF',
            params_time: params_time,
            index: index,
            params_year: params_year
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

function bestOfFiveAHT(params,  params_time, index, params_year){
	$("#filter-loader").fadeIn("slow");
    $.ajax({
        type: 'post',
        url: base_url + 'api/AgentPerformance/AgentPerformController/getSAgentperformskill',
        data: {
        	params: 'AHT',
            params_time: params_time,
            index: index,
            params_year: params_year
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

function bestOfFiveART(params,  params_time, index, params_year){
	$("#filter-loader").fadeIn("slow");
    $.ajax({
        type: 'post',
        url: base_url + 'api/AgentPerformance/AgentPerformController/getSAgentperformskill',
        data: {
        	params: 'ART',
            params_time: params_time,
            index: index,
            params_year: params_year
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
    $('#dataDrawCOF').remove(); 
    $('#classDrawCOF').append(' <div class="row mb-3" id="dataDrawCOF"></div>');
	var i=1;
	response.data.forEach(function(value,index){
		$('#dataDrawCOF').append('<div class="col-2 text-center" style="margin-bottom : 9px">'+
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
    $('#dataDrawAHT').remove(); 
    $('#classDrawAHT').append(' <div class="row mb-3" id="dataDrawAHT"></div>');
	var i=1;
	response.data.forEach(function(value,index){
		$('#dataDrawAHT').append('<div class="col-2 mb-2 text-center">'+
                                 '<div style="background-repeat: no-repeat; backgroud-size: cover; overflow:hidden; -webkit-border-radius:25px; -moz-border-radius:25px; width:40px; height:auto; border-radius:50px ;">'+
                                 	'<img src='+value[8]+' style="border-radius:75%;">'+
                                 '</div>'+
                             '</div>'+
                             '<div class="col-6 text-center">'+
                                 '<h5 class="font14 mt-1 mb-3">Agent '+i+'</h5>'+
                                 '<h6 class="text-muted font10" id="nameAgent">'+value[2]+'</h6>'+
                             '</div>'+
                             '<div class="col-4 text-right">'+
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
    $('#dataDrawART').remove(); 
    $('#classDrawART').append(' <div class="row mb-3" id="dataDrawART"></div>');
	var i=1;
	response.data.forEach(function(value,index){
		$('#dataDrawART').append('<div class="col-2 mb-2 text-center">'+
                                 '<div style="background-repeat: no-repeat; backgroud-size: cover; overflow:hidden; -webkit-border-radius:25px; -moz-border-radius:25px; width:40px; height:auto; border-radius:50px ;">'+
                                 	'<img src='+value[8]+' style="border-radius:75%;">'+
                                 '</div>'+
                             '</div>'+
                             '<div class="col-6 text-center">'+
                                 '<h5 class="font14 mt-1 mb-3">Agent '+i+'</h5>'+
                                 '<h6 class="text-muted font10" id="nameAgent">'+value[2]+'</h6>'+
                             '</div>'+
                             '<div class="col-4 text-right">'+
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
            '<td class="text-center">'+value.SKILLNAME+'</td>'+
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

function drawDataTable(params_time, index, params_year){
    $('#mytbody').remove();
    $('#tableAgent').append('<tbody style="font-size:12px !important;" id="mytbody"></tbody>');

    $('#tableAgent').DataTable({
        processing : true,
        ajax: {
            url : base_url + 'api/AgentPerformance/AgentPerformController/getSAgentperformskill',
            type : 'POST',
            data: {
                params_time: params_time,
                index: index,
                params_year: params_year
            }
        },
        columnDefs: [
			{ className: "text-center", targets: 0 },
            { className: "text-center", targets: 1 },
            { className: "text-center", targets: 3 },
			{ className: "text-center", targets: 4 },
			{ className: "text-center", targets: 5 },
			{ className: "text-center", targets: 6 },
			{ className: "text-center", targets: 7 }
			// { className: "text-right font-weight-extrabold", targets: 5 }
		], 
        destroy: true,
	});
}


// $(function(e) {
//     //sample datatable	
//     $('#tableAgent').DataTable();
//     // $('#tableSkill').DataTable();
// });

//jquery
(function ($) {

    // btn day
    $('#btn-day').click(function(){
        v_params_time = 'day';
        // v_date = getToday();
        v_date = '2019-12-01';
        // console.log(params_time);
        performanceBySkill('day', v_params_this_year, 0);
        drawDataTable('day', v_params_this_year, 0);
        bestOfFiveCOF('COF','day', v_params_this_year, 0);
        bestOfFiveAHT('AHT','day', v_params_this_year, 0);
        bestOfFiveART('ART','day', v_params_this_year, 0);

        $("#btn-month").prop("class","btn btn-light btn-sm");
        $("#btn-year").prop("class","btn btn-light btn-sm");
        $('#input-date-filter').datepicker("setDate", v_params_this_year);
        $(this).prop("class","btn btn-red btn-sm");

        $('#filter-date').show();
        $('#filter-month').hide();
        $('#filter-year').hide();
    });

    // btn month
    $('#btn-month').click(function(){
        v_params_time = 'month';
        // console.log(params_time);
        // v_date = getMonth();
        // callSummaryInteraction(params_time, v_date);
        // callSummaryInteraction(params_time, $("#select-month").val(), $("#select-year-on-month").val());
        performanceBySkill('month', $("#select-month").val(), $("#select-year-on-month").val());
        drawDataTable('month',  $("#select-month").val(), $("#select-year-on-month").val());
        bestOfFiveCOF('COF','month',  $("#select-month").val(), $("#select-year-on-month").val());
        bestOfFiveAHT('AHT','month',  $("#select-month").val(), $("#select-year-on-month").val());
        bestOfFiveART('ART','month',  $("#select-month").val(), $("#select-year-on-month").val());
        // callSummaryInteraction('month', '12', '2019');
        // console.log($("#select-year-only").val());
        $("#btn-day").prop("class","btn btn-light btn-sm");
        $("#btn-year").prop("class","btn btn-light btn-sm");
        $(this).prop("class","btn btn-red btn-sm");
        

        $('#filter-date').hide();
        $('#filter-month').show();
        // $('.ui-datepicker-calendar').css('display','none');
        $('#filter-year').hide();
    });

    // btn year
    $('#btn-year').click(function(){
        v_params_time = 'year';
        // console.log(params_time);
        // v_date = getYear();
        performanceBySkill('year', $("#select-year-only").val(), 0);
        drawDataTable('year',  $("#select-year-only").val(), 0);
        bestOfFiveCOF('COF','year',  $("#select-year-only").val(), 0);
        bestOfFiveAHT('AHT','year', $("#select-year-only").val(), 0);
        bestOfFiveART('ART','year',  $("#select-year-only").val(), 0);
        $("#btn-day").prop("class","btn btn-light btn-sm");
        $("#btn-month").prop("class","btn btn-light btn-sm");
        $(this).prop("class","btn btn-red btn-sm");
        
        $('#filter-date').hide();
        $('#filter-month').hide();
        $('#filter-year').show();
    });
       

    $('#input-date-filter').datepicker({
        dateFormat: 'yy-mm-dd',
        onSelect: function(dateText) {
            // console.log(this.value);
            v_date = this.value;
            performanceBySkill('day', v_date, 0);
            drawDataTable('day',  v_date, 0);
            bestOfFiveCOF('COF','day',  v_date, 0);
            bestOfFiveAHT('AHT','day', v_date, 0);
            bestOfFiveART('ART','day',  v_date, 0);
        }
    });

    /*select option month*/ 
    $('#select-month').change(function(){
        v_month = $(this).val();
        // console.log(value);
        // callSummaryInteraction(params_time, v_month,v_year);
        performanceBySkill('month', v_month, $("#select-year-on-month").val());
        drawDataTable('month',  v_month, $("#select-year-on-month").val());
        bestOfFiveCOF('COF','month', v_month, $("#select-year-on-month").val());
        bestOfFiveAHT('AHT','month',  v_month, $("#select-year-on-month").val());
        bestOfFiveART('ART','month',  v_month, $("#select-year-on-month").val());
    });
    $('#select-year-on-month').change(function(){
        v_year = $(this).val();
        // console.log(value);
        performanceBySkill('month', $("#select-month").val(), v_year);
        drawDataTable('month',  $("#select-month").val(),v_year);
        bestOfFiveCOF('COF','month',  $("#select-month").val(), v_year);
        bestOfFiveAHT('AHT','month',  $("#select-month").val(), v_year);
        bestOfFiveART('ART','month',  $("#select-month").val(), v_year);

    });
    /**/ 

    // select option year
    $('#select-year-only').change(function(){
        v_year = $(this).val();
        // console.log(this.value);
        performanceBySkill('year',v_year, 0);
        drawDataTable('year',  v_year, 0);
        bestOfFiveCOF('COF','year',  v_year, 0);
        bestOfFiveAHT('AHT','year', v_year, 0);
        bestOfFiveART('ART','year',  v_year, 0);
    });
})(jQuery);