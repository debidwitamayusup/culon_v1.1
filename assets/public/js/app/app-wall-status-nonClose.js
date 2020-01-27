var base_url = $('#base_url').val();

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

//get today
var v_params_today= m + '-' + n + '-' + (o);

$(document).ready(function () {
    $("#filter-loader").fadeIn("slow");
    // fromTemplate();
    callSumNonClose();
    drawTableSumAgentPeformSkill();
   $("#filter-loader").fadeOut("slow");
});

function callSumNonClose(){
    // console.log(+arr_channel);
    // $("#filter-loader").fadeIn("slow");
    $.ajax({
        type: 'post',
        url: base_url+'api/Wallboard/WallboardController/SummAllTicketStatusNC',
        success: function (r) {
            // var response = JSON.parse(r);
            // console.log(response);
            //hit url for interval 900000 (15 minutes)
            setTimeout(function(){callSumNonClose();},900000);
           	drawCard(r);
            // $("#filter-loader").fadeOut("slow");
        },
        error: function (r) {
            // console.log(r);
            alert("error");
            // $("#filter-loader").fadeOut("slow");
        },
    });
}

function addCommas(commas)
{
    commas += '';
    x = commas.split('.');
    x1 = x[0];
    x2 = x.length > 1 ? '.' + x[1] : '';
    var rgx = /(\d+)(\d{3})/;
    while (rgx.test(x1)) {
        x1 = x1.replace(rgx, '$1' + ',' + '$2');
    }
    return x1 + x2;
}

function drawCard(response){
	$('#cardNonClose').append(''+
        '<div class="row mt-2">'+
            '<div class="col-md-12 col-lg-3 col-xl-3 text-center">'+
                '<div class="card-custom-ticket overflow-hidden">'+
                    '<div class="card-header-small bg-red">'+
                        '<h6 class="text-white card-body">New</h6>'+
                    '</div>'+
                    '<div class="card-body">'+
                        '<h2 class="mb-4 mt-3 num-font">'+parseInt(response.data.sumNew)+'</h2>'+
                        '<span class="text-muted mb-5"></span>'+
                    '</div>'+
                '</div>'+
            '</div>'+
            '<div class="col-md-12 col-lg-3 col-xl-3 text-center">'+
                '<div class="card-custom-ticket overflow-hidden">'+
                    '<div class="card-header-small bg-red">'+
                        '<h6 class="text-white card-body">Open</h6>'+
                    '</div>'+
                    '<div class="card-body">'+
                        '<h2 class="mb-4 mt-3 num-font">'+parseInt(response.data.sumOpen)+'</h2>'+
                        '<span class="text-muted mb-5"></span>'+
                    '</div>'+
                '</div>'+
            '</div>'+

            '<div class="col-md-12 col-lg-3 col-xl-3 text-center">'+
                '<div class="card-custom-ticket overflow-hidden">'+
                    '<div class="card-header-small bg-red">'+
                        '<h6 class="card-body text-white">Reopen</h6>'+
                    '</div>'+
                    '<div class="card-body">'+
                        '<h2 class="mb-4 mt-3 num-font">'+parseInt(response.data.sumReOpen)+'</h2>'+
                        '<span class="text-muted mb-5"></span>'+
                    '</div>'+
                '</div>'+
            '</div>'+
            '<div class="col-md-12 col-lg-3 col-xl-3 text-center">'+
                '<div class="card-custom-ticket overflow-hidden">'+
                    '<div class="card-header-small bg-red">'+
                        '<h6 class="card-body text-white">Reprocess</h6>'+
                    '</div>'+
                    '<div class="card-body">'+
                        '<h2 class="mb-4 mt-3 num-font">'+parseInt(response.data.sumReProses)+'</h2>'+
                        '<span class="text-muted mb-5"></span>'+
                    '</div>'+
                '</div>'+
            '</div>'+
        '</div>'+
        '<div class="row mt-2 mb-2">'+
            '<div class="col-md-12 col-lg-3 col-xl-3 text-center">'+
                '<div class="card-custom-ticket overflow-hidden">'+
                    '<div class="card-header-small bg-red">'+
                        '<h6 class="card-body text-white">Pending</h6>'+
                    '</div>'+
                    '<div class="card-body">'+
                        '<h2 class="mb-4 mt-3 num-font">200</h2>'+
                        '<span class="text-muted mb-5"></span>'+
                    '</div>'+
                '</div>'+
            '</div>'+
            '<div class="col-md-12 col-lg-3 col-xl-3 text-center">'+
                '<div class="card-custom-ticket overflow-hidden">'+
                    '<div class="card-header-small bg-red">'+
                        '<h6 class="card-body text-white">Reject</h6>'+
                    '</div>'+
                    '<div class="card-body">'+
                        '<h2 class="mb-4 mt-3 num-font">200</h2>'+
                        '<span class="text-muted mb-5"></span>'+
                    '</div>'+
                '</div>'+
            '</div>'+
            '<div class="col-md-12 col-lg-3 col-xl-3 text-center">'+
                '<div class="card-custom-ticket overflow-hidden">'+
                    '<div class="card-header-small bg-red">'+
                        '<h6 class="card-body text-white">Reassign</h6>'+
                    '</div>'+
                    '<div class="card-body">'+
                        '<h2 class="mb-4 mt-3 num-font">'+parseInt(response.data.sumReAssign)+'</h2>'+
                        '<span class="text-muted mb-5"></span>'+
                    '</div>'+
                '</div>'+
            '</div>'+
            '<div class="col-md-12 col-lg-3 col-xl-3 text-center">'+
                '<div class="card-custom-ticket overflow-hidden">'+
                    '<div class="card-header-small bg-red">'+
                        '<h6 class="card-body text-white">Preclose</h6>'+
                    '</div>'+
                    '<div class="card-body">'+
                        '<h2 class="mb-4 mt-3 num-font">'+parseInt(response.data.sumPreClose)+'</h2>'+
                        '<span class="text-muted mb-5"></span>'+
                    '</div>'+
                '</div>'+
            '</div>'+
        '</div>');
}

function drawTableSumAgentPeformSkill(){
	//hit url for every 15 minutes
	setTimeout(function(){drawTableSumAgentPeformSkill();},900000);
	$('#tableTicket').DataTable({
        // processing : true,
        // serverSide : true,
        ajax: {
            url : base_url + 'api/Wallboard/WallboardController/SummaryTicketStatusNC',
            type : 'POST'
        },
        columnDefs: [
			{ className: "text-center", targets: 0 },
			{ className: "text-right", targets: 2 },
			{ className: "text-right", targets: 3 },
			{ className: "text-right", targets: 4 },
			{ className: "text-right", targets: 5 },
			{ className: "text-right", targets: 6 },
			{ className: "text-right", targets: 7 },
			{ className: "text-right font-weight-extrabold bg-total", targets: 8 }
		],    
        "footerCallback": function ( row, data, start, end, display ) {
            var api = this.api(), data;
 
            // converting to interger to find total
            var intVal = function ( i ) {
                return typeof i === 'string' ?
                    i.replace(/[\$,]/g, '')*1 :
                    typeof i === 'number' ?
                        i : 0;
            };
 			            
	    	// Total over this page
            var sumNew = api
                .column( 2 )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );
				
	    	var sumOpen = api
                .column( 3 )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );
				
            var sumReOpen = api
                .column( 4 )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );

            var totalTot = api
                .column( 5 )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );
				
            // computing column Total of the complete result 
            pageTotal1 = api
                .column( 2, { page: 'current'} )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );
            pageTotal2 = api
                .column( 3, { page: 'current'} )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );
            pageTotal3 = api
                .column( 4, { page: 'current'} )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );
            pageTotal4 = api
                .column( 5, { page: 'current'} )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );
            pageTotal5 = api
                .column( 6, { page: 'current'} )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );
            pageTotal6 = api
                .column( 7, { page: 'current'} )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );
            pageTotalTot = api
                .column( 8, { page: 'current'} )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );
				
            // Update footer by showing the total with the reference of the column index 
	    	$( api.column( 0 ).footer() ).html('Total');
            // $( api.column( 2 ).footer() ).html(
            // 	'Total Current Page: '+pageTotal1+'(Total All Pages: '+hari1+')');
            $( api.column( 2 ).footer() ).html(pageTotal1);
            $( api.column( 3 ).footer() ).html(pageTotal2);
            $( api.column( 4 ).footer() ).html(pageTotal3);
            $( api.column( 5 ).footer() ).html(pageTotal4);
            $( api.column( 6 ).footer() ).html(pageTotal5);
            $( api.column( 7 ).footer() ).html(pageTotal6);
            $( api.column( 8 ).footer() ).html(pageTotalTot);
        },
        destroy: true
    });
}

// $(function (e) {
//     setTimeout(function(){drawTableSumAgentPeformSkill();},10000);
// })