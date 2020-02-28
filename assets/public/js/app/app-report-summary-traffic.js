var base_url = $('#base_url').val();
var v_params_tenant = 'oct_telkomcare';
var d = new Date();
var o = d.getDate();
var n = d.getMonth()+1;
var m = d.getFullYear();
var tenantFromFilter = '';
var v_start_date = '';
var v_end_date = '';
var pagingFilter = '';
var s = 0;
var tenants = [];
if (o < 10) {
  o = '0' + o;
} 
if (n < 10) {
  n = '0' + n;
}

var v_params_today= m + '-' + n + '-' + (o);
const sessionParams = JSON.parse(sessionStorage.getItem('Auth-infomedia'));

$(document).ready(function(){
	getTenant('');
	$('#start-date').datepicker("setDate", v_params_today);
	$('#end-date').datepicker("setDate", v_params_today);
	startDateFromFilter = v_params_today;
    endDateFromFilter = v_params_today;
    callTableSummaryTraffic('',v_params_today,v_params_today,'10', '0');
    pagingFilters = $('#pagingFilter').val();
});

function getTenant(date){
    $.ajax({
        type: 'POST',
        url: base_url + 'api/Wallboard/WallboardController/GetTennantFilter',
        data: {
            "date" : date
        },

        success: function (r) {
            var data_option = [];
            //dont parse response if using rest controller
            // var response = JSON.parse(r);
            var response = r;
            // console.log(response);
            // tenants = response.data;
            var html = '<option value="">All Tenant</option>';
            // var html = '';
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

function callTableSummaryTraffic(tenant_id,start_date,end_date,ammount,page){
    $("#filter-loader").fadeIn("slow");
	$.ajax({
		url : base_url + 'api/Reporting/ReportController/ReportingSTraffic',
        type : 'POST',
        data :{
            tenant_id: tenant_id,
            start_date: start_date,
            end_date: end_date,
            ammount: ammount,
            page: page
        },
        success: function (r) {
            var response = r;
            console.log(response);
            drawTableSumTraffic(response, tenant_id, start_date, end_date, ammount, page);
            // $("#filter-loader").fadeOut("slow");
        },
        error: function (r) {
            // console.log(r);
            alert("error");
            // $("#filter-loader").fadeOut("slow");
        },
	});
}

function drawTableSumTraffic(response, tenant_id, start_date, end_date, ammount, page){
    $("#mytbody").empty();
    var s = ammount;
    var h = 0;
    var t = 0;

    if (page == 0){
        h = 0;
    }else{
        h = (s*Number(page));
        t = (s*Number(page));
    }

	if (response.data.length != 0) {
		for (var i = 0; i < response.data.length; i++) {
            var tdCOFSCR = "";
            for (var j = 0; j < response.data[i].DATA.length; j++){
                tdCOFSCR += '<td class="text-right">'+response.data[i].DATA[j].COF+'</td>'+
                            '<td class="text-center">'+response.data[i].DATA[j].SCR+'</td>'
            }
			$('#tableSummaryTraffic').find('tbody').append('<tr>'+
                '<td class="text-center">'+(h+1)+'</td>'+
                '<td class="text-center">'+response.data[i].TANGGAL+'</td>'+
                tdCOFSCR
            +'</tr>');
            h++;
            $("#filter-loader").fadeOut("slow");
		}
	} else {
        $('#tableSummaryTraffic').find('tbody').append('<tr>'+
           '<td class="text-center" colspan=28> No Data Available </td>'+
        '</tr>');
        $("#paging").empty();
        $("#paging").append('<li class="page-item page-prev disabled">'+
        '<a>&laquo;</a>'+
        '</li>'+
        '<li class="page-item"><a class="page-link">1</a></li>'+
            '<li class="page-item page-next disabled">'+
            '<a>&raquo;</a>'+
            '</li>'
        );
        $("#filter-loader").fadeOut("slow");
    }   

    var totalPage = Math.ceil(response.max_row/$('#pagingFilter').val());
    var varA = "";
    var pagDot = pagination(page, totalPage, tenant_id, start_date, end_date, ammount);
    if (response.max_row != 0){
        $("#showing").html('Showing '+(t+1)+' to '+h+' of '+response.max_row+' entries');
    }else{
        $("#showing").html('Showing 0 to 0 of 0 entries');
    }
    // var indexDot = pagDot.indexOf('...');
    // console.log(pagDot);
    // for (var k = 0; k < totalPage; k++){
    //     // var callFunction = callTableSummaryTraffic(tenant_id, start_date, end_date, pagingFilters, k);
    //     if (k != indexDot){
    //         varA += '<a href="javascript:callTableSummaryTraffic('+"'"+tenant_id+"','"+start_date+"','"+end_date+"','"+$('#pagingFilter').val()+"','"+k+"'"+')">'+(k+1)+'</a>'
    //     }else{
    //         varA += '<a href="javascript:pagination('+"'"+(indexDot-1)+"','"+totalPage+"'"+')">...</a>'
    //     }
    //     // console.log(varA);
    //     // $("#paging").append("<a href='#' onclick='return callTableSummaryTraffic"+(tenant_id, start_date, end_date, pagingFilters, k)+"'>"+(k+1)+"</a>");
    // }
    // $("#paging").empty();
    // $("#paging").append('<a href="javascript:callTableSummaryTraffic('+"'"+tenant_id+"','"+start_date+"','"+end_date+"','"+$('#pagingFilter').val()+"','"+0+"'"+')">&laquo;</a>'+
    //     varA+
    //     '<a href="javascript:callTableSummaryTraffic('+"'"+tenant_id+"','"+start_date+"','"+end_date+"','"+$('#pagingFilter').val()+"','"+totalPage+"'"+')">&raquo;</a>'
    // );
    

    
    // var config = {
    //     table: document.getElementById("tableSummaryTraffic"),
    //     box: document.getElementById("index_native"),
    //     active_class: "color_page"
    // };
    // paginator(config);
    
}

function pagination(currentPage, nrOfPages, tenant_id, start_date, end_date) {
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
    console.log(rangeWithDots);
    console.log('rangewithdotlength= '+rangeWithDots.length);
    for (var k = 0; k < rangeWithDots.length; k++){
        if (k != indexDot){
            varA += '<li class="page-item" id="li'+rangeWithDots[k]+'"><a class="page-link" href="javascript:callTableSummaryTraffic('+"'"+tenant_id+"','"+start_date+"','"+end_date+"','"+$('#pagingFilter').val()+"','"+(rangeWithDots[k]-1)+"'"+')">'+rangeWithDots[k]+'</a></li>'
        }else{
            varA += '<li class="page-item"><a class="page-link" href="javascript:pagination('+"'"+(indexDot-1)+"','"+nrOfPages+"','"+tenant_id+"','"+start_date+"','"+end_date+"','"+$('#pagingFilter').val()+"','"+k+"'"+')">...</a></li>'
        }
    }
    $("#paging").empty();
    $("#paging").append('<li class="page-item page-prev">'+
    '<a href="javascript:callTableSummaryTraffic('+"'"+tenant_id+"','"+start_date+"','"+end_date+"','"+$('#pagingFilter').val()+"','"+0+"'"+')">&laquo;</a>'+
    '</li>'+
        varA+
        '<li class="page-item page-next">'+
        '<a href="javascript:callTableSummaryTraffic('+"'"+tenant_id+"','"+start_date+"','"+end_date+"','"+$('#pagingFilter').val()+"','"+(nrOfPages-1)+"'"+')">&raquo;</a>'+
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

function exportTableSumTraffic(start_date, end_date, tenant_id, name, ammount, page){
    $("#filter-loader").fadeIn("slow");
    // window.location = base_url + 'api/Reporting/ReportController/EXPORTSC?tenant_id='+tenant_id+'&start_time='+start_time+'&end_time='+end_time+'&name='+name;
    $.ajax({
        type: 'POST',
        url: base_url + 'api/Reporting/ReportController/EXPORTTRF',
        data: {
            start_date: start_date,
            end_date: end_date,
            tenant_id: tenant_id,
            name: name,
            ammount: ammount,
            page: page
        }
        ,
        success: function (r) {
            if (r.status != false){
                window.location = r.Link;
            }else{
                alert("Can't Export Empty Data");
            }
            $("#filter-loader").fadeOut("slow");
        },
        error: function (r) {
            //console.log(r);
            alert("can't export");
            $("#filter-loader").fadeOut("slow");
        },
    });
}

function setDatePicker() {
    $(".datepicker").datepicker({
        format: "yyyy-mm-dd",
        todayHighlight: true,
        autoclose: true
    }).attr("readonly", "readonly").css({
        "cursor": "pointer",
        "background": "white"
    });
}

(function ($) {
    

    var date = new Date();
    date.setDate(date.getDate() > 0);
    $('#start-date').datepicker({
        dateFormat: 'yy-mm-dd',
        maxDate: 'now',
        showTodayButton: true,
        showClear: true,
        // minDate: date,
        // onSelect: function (dateText) {
        //  // console.log(this.value);
        //  v_start_date = this.value;
        // }
    });

    $('#end-date').datepicker({
        dateFormat: 'yy-mm-dd',
        maxDate: 'now',
        showTodayButton: true,
        showClear: true,
        // minDate: date,
        // onSelect: function (dateText) {
        //  // console.log(this.value);
        //  v_end_date = this.value;
        // }
    });

    $('#btn-export').click(function(){
        // exportTablePerformOps(v_params_tenant, '2', n, sessionParams.NAME);
        exportTableSumTraffic(startDateFromFilter, endDateFromFilter, tenantFromFilter, sessionParams.NAME,'','');
    });

    $('#btn-go').click(function(){
        tenantFromFilter = $('#layanan_name').val();
        startDateFromFilter = $('#start-date').val();
        endDateFromFilter = $("#end-date").val();
        
        callTableSummaryTraffic($('#layanan_name').val(), $('#start-date').val(), $('#end-date').val(), $('#pagingFilter').val(), '0');
    });

    // change date picker
        $("select#pagingFilter").change(function(){
            callTableSummaryTraffic($('#layanan_name').val(), $('#start-date').val(), $('#end-date').val(), $(this).children("option:selected").val(), '0');
        });

    // $('#tableSummaryTraffic').dataTable();    
})(jQuery);

// $(function($){
//     $('#tableSummaryTraffic').dataTable();
// })