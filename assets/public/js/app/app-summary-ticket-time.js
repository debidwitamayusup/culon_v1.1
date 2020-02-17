var base_url = $('#base_url').val();
var v_params = 'day';
var v_index = '2020-01-10';
var v_month = '1';
var v_year = '2020';

$('#tablesummary').DataTable();

$(document).ready(function () {
    loadContent(v_params, v_index, 0);
    drawTableSumAgentPeformSkill();
    callPieTicketNonClose();
    // ini_finctiiin();
});

function loadContent(index, params, params_year){
    // summaryStatusTicketPerUnit(params, index, params_year);
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

function callPieTicketNonClose(){
	$("#filter-loader").fadeIn("slow");
    $.ajax({
        type: 'post',
        url: base_url + 'api/SummaryTicket/SummaryTicketTime/SAgentPerformSkill',
        success: function (r) { 
            var response = JSON.parse(r);
			// console.log(response);
			drawPieChart(response);
			$("#filter-loader").fadeOut("slow");
        },
        error: function (r) {
			alert("error");
			$("#filter-loader").fadeOut("slow");
        },
    });
}

function drawTableSumAgentPeformSkill(){
	$('#tablesummary').DataTable({
        // processing : true,
        // serverSide : true,
        ajax: {
            url : base_url + 'api/SummaryTicket/SummaryTicketTime/SAgentPerformSkill',
            type : 'POST'
        },
        columnDefs: [
			{ className: "text-center", targets: 0 },
			{ className: "text-right", targets: 2 },
			{ className: "text-right", targets: 3 },
			{ className: "text-right", targets: 4 },
			{ className: "text-right font-weight-extrabold", targets: 5 }
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
            var hari1 = api
                .column( 2 )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );
				
	    	var hari2 = api
                .column( 3 )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );
				
            var hari3 = api
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
            pageTotalTot = api
                .column( 5, { page: 'current'} )
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
            $( api.column( 5 ).footer() ).html(pageTotalTot);
        },
        destroy: true
    });
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

function drawPieChart(response){

//pie chart summary ticket time
var ctx = document.getElementById( "pieTicketTime" );
ctx.height =300;
var myChart = new Chart( ctx, {
    type: 'pie',
    data: {
        datasets: [ {
            data: response.total,
            backgroundColor: [
                                "#009E8C",
                                "#00436D",
                                "#A5B0B6",                                
                            ],
            hoverBackgroundColor: [
                                "#009E8C",
                                "#00436D",
                                "#A5B0B6",  
                            ]

                        } ],
        labels: [
                            "1-2 Hari",
                            "3-5 Hari",
                            " > 5 Hari ",
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
        },
        pieceLabel: {
                render: 'legend',
                fontColor: '#000',
                position: 'outside',
                segment: true,
                precision: 0,
                showActualPercentages: true,
        },
    }
} );
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
}(jQuery);