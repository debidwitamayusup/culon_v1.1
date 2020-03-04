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
var v_parmas_tenant = 'oct_telkomcare';
var v_params_this_year = m + '-' + n + '-' + (o-1);
const sessionParams = JSON.parse(localStorage.getItem('Auth-infomedia'));
$(document).ready(function () {
    if(sessionParams){
        if(sessionParams.TENANT_ID[0].TENANT_ID != ''){
            getTenant('', sessionParams.USERID);
        }else{
            getTenant('', '');
        }
        performanceBySkill('day', v_params_this_year, 0, $('#layanan_name').val());
        drawDataTable('day', v_params_this_year, 0, $('#layanan_name').val());
        bestOfFiveCOF('COF','day', v_params_this_year, 0, $('#layanan_name').val());
        bestOfFiveAHT('AHT','day', v_params_this_year, 0, $('#layanan_name').val());
        bestOfFiveART('ART','day', v_params_this_year, 0, $('#layanan_name').val());
        sessionStorage.setItem('paramsSession', 'day');
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
    }else{
        window.location = base_url
    }
});

function getTenant(date, userid){
    $.ajax({
        type: 'POST',
        url: base_url + 'api/Wallboard/WallboardController/GetTennantFilter',
        data: {
            "date" : date,
            "userid" : userid
        },

        success: function (r) {
            var data_option = [];
            //dont parse response if using rest controller
            // var response = JSON.parse(r);
            var response = r;
            // console.log(response);
            // tenants = response.data;
                var html = '';
                for(i=0; i<response.data.length; i++){
                    html += '<option value='+response.data[i].TENANT_ID+'>'+response.data[i].TENANT_NAME+'</option>';
                }
                $('#layanan_name').html(html);
        },
        error: function (r) {
            //console.log(r);
            alert("error");
        },
    });
}

//for dinamic dropdown year on month
function callYearOnMonth()
{
    var data = "";
    var base_url = $('#base_url').val();
    // console.log(year);

    $.ajax({
        type: 'POST',
        url: base_url + 'api/SummaryTraffic/SummaryYear/optionYear',
        // data: {
        //     "niceDate" : niceDate
        // },

        success: function (r) {
            var data_option = [];
            var dateTahun = $("#select-year-on-month");
            var response = JSON.parse(r);

            // var html = '<option value="2020">2020</option>';
            var monthOption='';
            var html = '';
            var i;
                for(i=0; i<response.data.niceDate.length; i++){
                    html += '<option value='+response.data.niceDate[i]+'>'+response.data.niceDate[i]+'</option>';
                }
                $('#select-year-on-month').html(html);
            
            monthOption = '<option value="01">January</option>'+
                                '<option value="02">February</option>'+
                                '<option value="03">March</option>'+
                                '<option value="04">April</option>'+
                                '<option value="05">May</option>'+
                                '<option value="06">June</option>'+
                                '<option value="07">July</option>'+
                                '<option value="08">August</option>'+
                                '<option value="09">September</option>'+
                                '<option value="10">October</option>'+
                                '<option value="11">November</option>'+
                                '<option value="12">December</option>';
            $('#select-month').html(monthOption);
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

//for dinamic dropdown year on year
function callYear()
{
    var data = "";
    var base_url = $('#base_url').val();
    // console.log(year);

    $.ajax({
        type: 'POST',
        url: base_url + 'api/SummaryTraffic/SummaryYear/optionYear',
        // data: {
        //     "niceDate" : niceDate
        // },

        success: function (r) {
            var data_option = [];
            var dateTahun = $("#select-year-only");
            var response = JSON.parse(r);

            // var html = '<option value="2020">2020</option>';
            var html = '';
            var i;
                for(i=0; i<response.data.niceDate.length; i++){
                    html += '<option value='+response.data.niceDate[i]+'>'+response.data.niceDate[i]+'</option>';
                }
                $('#select-year-only').html(html);
            
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

var date = new Date();
date.setDate(date.getDate()>0);
function setDatePicker(){
    $(".datepicker").datepicker({
        format: "yyyy-mm-dd",
        maxDate: 'now',
        // showTodayButton: true,
        showClear: true,
        // minDate: date,
        todayHighlight: true,
        autoclose: true
    }).attr("readonly", "readonly").css({"cursor":"pointer", "background":"white"});
}

function performanceBySkill(params, index, params_year, tenant_id){
	$("#filter-loader").fadeIn("slow");
    $.ajax({
        type: 'post',
        url: base_url + 'api/AgentPerformance/AgentPerformController/getSAgentperformBYskill',
        data: {
            params: params,
            index, index,
            params_year: params_year,
            tenant_id: tenant_id
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

function bestOfFiveCOF(params, params_time, index, params_year, tenant_id){
	$("#filter-loader").fadeIn("slow");
    $.ajax({
        type: 'post',
        url: base_url + 'api/AgentPerformance/AgentPerformController/getSAgentperformskill',
        data: {
        	params: 'COF',
            params_time: params_time,
            index: index,
            params_year: params_year,
            tenant_id: tenant_id
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

function bestOfFiveAHT(params,  params_time, index, params_year, tenant_id){
	$("#filter-loader").fadeIn("slow");
    $.ajax({
        type: 'post',
        url: base_url + 'api/AgentPerformance/AgentPerformController/getSAgentperformskill',
        data: {
        	params: 'AHT',
            params_time: params_time,
            index: index,
            params_year: params_year,
            tenant_id: tenant_id
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

function bestOfFiveART(params,  params_time, index, params_year, tenant_id){
	$("#filter-loader").fadeIn("slow");
    $.ajax({
        type: 'post',
        url: base_url + 'api/AgentPerformance/AgentPerformController/getSAgentperformskill',
        data: {
        	params: 'ART',
            params_time: params_time,
            index: index,
            params_year: params_year,
            tenant_id: tenant_id
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
                                 	'<div style="background-repeat: no-repeat; backgroud-size: cover; overflow:hidden; -webkit-border-radius:25px; -moz-border-radius:25px; width:40px; height:auto; border-radius:50px ;">'+
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

function drawDataTable(params_time, index, params_year, tenant_id){
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
                params_year: params_year,
                tenant_id: tenant_id
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
        performanceBySkill('day', v_params_this_year, 0, $('#layanan_name').val());
        drawDataTable('day', v_params_this_year, 0, $('#layanan_name').val());
        bestOfFiveCOF('COF','day', v_params_this_year, 0, $('#layanan_name').val());
        bestOfFiveAHT('AHT','day', v_params_this_year, 0, $('#layanan_name').val());
        bestOfFiveART('ART','day', v_params_this_year, 0, $('#layanan_name').val());
        sessionStorage.removeItem('paramsSession');
        sessionStorage.setItem('paramsSession', 'day');
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
        performanceBySkill('month', n,m, $('#layanan_name').val());
        drawDataTable('month', n,m, $('#layanan_name').val());
        bestOfFiveCOF('COF','month', n,m, $('#layanan_name').val());
        bestOfFiveAHT('AHT','month', n,m, $('#layanan_name').val());
        bestOfFiveART('ART','month', n,m, $('#layanan_name').val());
        callYearOnMonth();
        sessionStorage.removeItem('paramsSession');
        sessionStorage.setItem('paramsSession', 'month');
        $("#btn-day").prop("class","btn btn-light btn-sm");
        $("#btn-year").prop("class","btn btn-light btn-sm");
        $(this).prop("class","btn btn-red btn-sm");
        $('#select-month option[value='+n+']').attr('selected','selected');
        $('#select-year-on-month option[value='+m+']').attr('selected','selected');

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
        performanceBySkill('year', m, 0, $('#layanan_name').val());
        drawDataTable('year', m, 0, $('#layanan_name').val());
        bestOfFiveCOF('COF','year', m, 0, $('#layanan_name').val());
        bestOfFiveAHT('AHT','year', m, 0, $('#layanan_name').val());
        bestOfFiveART('ART','year', m, 0, $('#layanan_name').val());
        callYear();
        sessionStorage.removeItem('paramsSession');
        sessionStorage.setItem('paramsSession', 'year');
        $("#btn-day").prop("class","btn btn-light btn-sm");
        $("#btn-month").prop("class","btn btn-light btn-sm");
        $(this).prop("class","btn btn-red btn-sm");
        
        $('#filter-date').hide();
        $('#filter-month').hide();
        $('#filter-year').show();
    });
       
    var date = new Date();
    date.setDate(date.getDate() > 0);
    $('#input-date-filter').datepicker({
        dateFormat: 'yy-mm-dd',
        maxDate: 'now',
        showTodayButton: true,
        showClear: true,
        onSelect: function(dateText) {
            // console.log(this.value);
            v_date = this.value;
            performanceBySkill('day', v_date, 0, $('#layanan_name').val());
            drawDataTable('day', v_date, 0, $('#layanan_name').val());
            bestOfFiveCOF('COF','day', v_date, 0, $('#layanan_name').val());
            bestOfFiveAHT('AHT','day', v_date, 0, $('#layanan_name').val());
            bestOfFiveART('ART','day', v_date, 0, $('#layanan_name').val());
        }
    });

    /*select option month*/ 
    // $('#select-month').change(function(){
    //     v_month = $(this).val();
    //     // console.log(value);
    //     // callSummaryInteraction(params_time, v_month,v_year);
    //     performanceBySkill('month', v_month, $("#select-year-on-month").val());
    //     drawDataTable('month',  v_month, $("#select-year-on-month").val());
    //     bestOfFiveCOF('COF','month', v_month, $("#select-year-on-month").val());
    //     bestOfFiveAHT('AHT','month',  v_month, $("#select-year-on-month").val());
    //     bestOfFiveART('ART','month',  v_month, $("#select-year-on-month").val());
    // });
    // $('#select-year-on-month').change(function(){
    //     v_year = $(this).val();
    //     // console.log(value);
    //     performanceBySkill('month', $("#select-month").val(), v_year);
    //     drawDataTable('month',  $("#select-month").val(),v_year);
    //     bestOfFiveCOF('COF','month',  $("#select-month").val(), v_year);
    //     bestOfFiveAHT('AHT','month',  $("#select-month").val(), v_year);
    //     bestOfFiveART('ART','month',  $("#select-month").val(), v_year);

    // });
    /**/ 

    // select option year
    $('#select-year-only').change(function(){
        v_year = $(this).val();
        // console.log(this.value);
        performanceBySkill('year', v_year, 0, $('#layanan_name').val());
        drawDataTable('year', v_year, 0, $('#layanan_name').val());
        bestOfFiveCOF('COF','year', v_year, 0, $('#layanan_name').val());
        bestOfFiveAHT('AHT','year', v_year, 0, $('#layanan_name').val());
        bestOfFiveART('ART','year', v_year, 0, $('#layanan_name').val());
    });

    $('#btn-go').click(function(){
        performanceBySkill('month', $("#select-month").val(), $("#select-year-on-month").val(), $('#layanan_name').val());
        drawDataTable('month', $("#select-month").val(), $("#select-year-on-month").val(), $('#layanan_name').val());
        bestOfFiveCOF('COF','month', $("#select-month").val(), $("#select-year-on-month").val(), $('#layanan_name').val());
        bestOfFiveAHT('AHT','month', $("#select-month").val(), $("#select-year-on-month").val(), $('#layanan_name').val());
        bestOfFiveART('ART','month', $("#select-month").val(), $("#select-year-on-month").val(), $('#layanan_name').val());
    });

    $('#layanan_name').change(function () {
		channel_id = $('#channel_name').val();
		let fromParams = sessionStorage.getItem('paramsSession');
        if(fromParams == 'day'){
            performanceBySkill('day', $("#input-date-filter").val(), 0, $('#layanan_name').val());
            drawDataTable('day', $("#input-date-filter").val(), 0, $('#layanan_name').val());
            bestOfFiveCOF('COF','day', $("#input-date-filter").val(), 0, $('#layanan_name').val());
            bestOfFiveAHT('AHT','day', $("#input-date-filter").val(), 0, $('#layanan_name').val());
            bestOfFiveART('ART','day', $("#input-date-filter").val(), 0, $('#layanan_name').val());
        }else if(fromParams == 'month'){
            performanceBySkill('month', $("#select-month").val(), $("#select-year-on-month").val(), $('#layanan_name').val());
            drawDataTable('month', $("#select-month").val(), $("#select-year-on-month").val(), $('#layanan_name').val());
            bestOfFiveCOF('COF','month', $("#select-month").val(), $("#select-year-on-month").val(), $('#layanan_name').val());
            bestOfFiveAHT('AHT','month', $("#select-month").val(), $("#select-year-on-month").val(), $('#layanan_name').val());
            bestOfFiveART('ART','month', $("#select-month").val(), $("#select-year-on-month").val(), $('#layanan_name').val());
        }else if(fromParams == 'year'){
            performanceBySkill('year', $('#select-year-only').val(), 0, $('#layanan_name').val());
            drawDataTable('year', $('#select-year-only').val(), 0, $('#layanan_name').val());
            bestOfFiveCOF('COF','year', $('#select-year-only').val(), 0, $('#layanan_name').val());
            bestOfFiveAHT('AHT','year', $('#select-year-only').val(), 0, $('#layanan_name').val());
            bestOfFiveART('ART','year', $('#select-year-only').val(), 0, $('#layanan_name').val());
        }
	});
})(jQuery);