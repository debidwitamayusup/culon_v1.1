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

    //sample datatable	
	// $('#table_summary_ticket').DataTable();

    //pie chart summary status ticket
function loadContent(index, params, params_year){
    simmiriStatusTicket(params, index, params_year);
    simmiriUnit(params, index, params_year);
    // summaryStatusTicketPerUnit(params, index, params_year);
    drawDataTable2(params, index, params_year);

    //datatable config
    // $('#table_summary_ticket thead tr:eq(0) th:eq(2)').html("Status");
     // Wrap the colspan'ing header cells with a span so they can be positioned
    // absolutely - filling the available space, and no more.
    // $('#table_summary_ticket thead th[colspan]').wrapInner( '<span/>' ).append( '&nbsp;' );
    // $('#table_summary_ticket').DataTable( {
    //     responsive: true,
    //     paging: false
    // } );

    // tabel = $('#table_summary_ticket').DataTable({
    //         processing: true,
    //         serverSide: true,
    //         ordering: true, // Set true agar bisa di sorting
    //         order: [[ 0, 'asc' ]], // Default sortingnya berdasarkan kolom / field ke 0 (paling pertama)
    //         ajax:
    //         {
    //             url: base_url+'api/SummaryTicket/SummaryTicketUnit/filterTable', // URL file untuk proses select datanya
    //             type: "POST"
    //         },
    //         deferRender: true,
    //         aLengthMenu: [[5, 10, 50],[ 5, 10, 50]], // Combobox Limit
    //         columns: [
    //             { data: "unit" }, // Tampilkan nis
    //             { data: "sNew" }, // Tampilkan nis
    //             { data: "sOpen" },  // Tampilkan nama
    //             { data: "sOnProgress" }, // Tampilkan telepon
    //             { data: "sResolved" }, // Tampilkan alamat
    //             { data: "sReopen"},
    //             { data: "sPending"},
    //             { data: "sReturn"},
    //             { data: "sReject"}
    //         ],
    //     });

}

function getColor(channel){
    var color = [];
    color['New'] = '#FEC88C';
    color['Open'] = '#FFA07A';
    color['Reject'] = '#87CEFA';
    color['On Progress'] = '#ADD8E6';
    color['Pending'] = '#B0C4DE';
    color['Reopen'] = '#778899';
    color['Close'] = '#8FBC8F';
    color['Resolved'] = '#BDB76B';

    return color[channel];
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
// function loadContent(params, index_time){
//     $("#filter-loader").fadeIn("slow");
//     callSummaryScrCof();
//     $("#filter-loader").fadeOut("slow");
// }

function simmiriStatusTicket(params, index, params_year){
    $("#filter-loader").fadeIn("slow");
    $.ajax({
        type: 'post',
        url: base_url + 'api/SummaryTicket/SummaryTicketUnit/getSummaryTicket',
        data: {
            params: params,
            index: index,
            params_year: params_year
        },
        success: function (r) { 
            var response = JSON.parse(r);
            // console.log(response.data[0].new);
            drawPie(response);
            $("#filter-loader").fadeOut("slow");
        },
        error: function (r) {
            alert("error");
            $("#filter-loader").fadeOut("slow");
        },
    });
}

function simmiriUnit(params, index, params_year){
    $.ajax({
        type: 'post',
        url: base_url + 'api/SummaryTicket/SummaryTicketUnit/getSummaryUnit',
        data: {
            params: params,
            index: index,
            params_year, params_year
        },
        success: function (r) { 
            var response = JSON.parse(r);
            // console.log(response.data[0].new);
            drawPieUnit(response);
        },
        error: function (r) {
            alert("error");
        },
    });
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
            // drawDataTable(response);
        },
        error: function (r) {
            alert("error");
        },
    });
}

function drawPie(response){
    //destroy div piechart
    $('#pieChart').remove(); // this is my <canvas> element
    $('#canvas-pie').append('<canvas id="pieChart" class="donutShadow overflow-hidden"></canvas>');

    // //destroy div card content
    // $('#row-baru').remove(); // this is my <div> element
    // $('#card-baru').append('<div id="row-baru" class="row"></div>');

    let arrNew = response.data[0].new;
    let arrOpen = response.data[0].open;
    let arrReject = response.data[0].reject;
    let arrOnProgress = response.data[0].onProgress;
    let arrPending = response.data[0].pending;
    let arrReopen = response.data[0].reOpen;
    let arrClose = response.data[0].close;
    let arrResolved = response.data[0].resolved;

    // draw card yang ada datanya
    // response.data.forEach(function (value, index) {
    //     arrCof.push(value.cof);
    //     arrChannel.push(value.channel)
    //     arrColor.push(getColorChannel(value.channel));
    // });

    // draw chart
    var ctx = document.getElementById( "pieChart" );
    ctx.height = 300;
    var myChart = new Chart( ctx, {
        type: 'pie',
        data: {
            datasets: [ {
                labels: [ arrNew, arrOpen, arrReject, arrOnProgress, arrPending, arrReopen, arrClose, arrResolved],
                data: [arrNew, arrOpen, arrReject, arrOnProgress, arrPending, arrReopen, arrClose, arrResolved],
                 backgroundColor: [
                                    "#FEC88C",
                                    "#FFA07A",
                                    "#87CEFA",
                                    "#ADD8E6",
                                    "#B0C4DE",
                                    "#778899",
                                    "#8FBC8F",
                                    "#BDB76B",
                                    
                                ],
                hoverBackgroundColor: [
                                    "#FEC88C",
                                    "#FFA07A",
                                    "#87CEFA",
                                    "#ADD8E6",
                                    "#B0C4DE",
                                    "#778899",
                                    "#8FBC8F",
                                    "#BDB76B",
                                ]
            } ],
            labels: [
                        "New",
                        "Open",
                        "Reject",
                        "On Progress",
                        "Pending",
                        "Reopen",
                        "Close",
                        "Resolved"
                    ]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            legend:{
                // position:"bottom",
                // labels:{
                //   boxWidth:10
                display : false
            },pieceLabel : {
                render : 'legend',
                fontColor : '#000',
                position : 'outside',
                segment : true,
                precision: 0,
                showActualPercentages: true,                
            },
            legendCallback : function (chart,index){
                var allData = chart.data.datasets[0].data;
                // console.log(chart)
                var legendHtml = [];
                legendHtml.push('<ul><div class="row">');
                allData.forEach(function(data,index){
                    var label = chart.data.labels[index];
                    var dataLabel = allData[index];
                    var background = chart.data.datasets[0].backgroundColor[index]
                    var total = 0;
                    for (var i in allData){
                        total += parseInt(allData[i]);
                    }

                    // console.log(total)
                    var percentage = Math.round((dataLabel / total)*100);
                    legendHtml.push('<li class="col-md-3 col-lg-3 col-sm-12 col-xl-3">');
                    legendHtml.push('<span class="chart-legend"><div style="background-color : '+background+'" class="box-legend"></div>'+label+'</span>')
                })
                legendHtml.push('</ul></div>');
                return legendHtml.join("");
            },
        }
    } );
    var myLegendContainer = document.getElementById("legend");
    myLegendContainer.innerHTML = myChart.generateLegend();
}


function drawPieUnit(response){
    //destroy div piechart
    $('#pieChartUnit').remove(); // this is my <canvas> element
    $('#canvas-pie-unit').append('<canvas id="pieChartUnit" class="donutShadow overflow-hidden"></canvas>');

    // //destroy div card content
    // $('#row-baru').remove(); // this is my <div> element
    // $('#card-baru').append('<div id="row-baru" class="row"></div>');

    let arrUnit = [];
    let arrTotal = [];

    // draw card yang ada datanya
    response.data.forEach(function (value, index) {
        arrUnit.push(value.unit);
        arrTotal.push(value.total);
    });

    // draw chart
    var ctx = document.getElementById( "pieChartUnit" );
    ctx.height = 300;
    var myChart = new Chart( ctx, {
        type: 'pie',
        data: {
            datasets: [ {
                labels: [arrUnit, arrTotal],
                data: arrTotal,
                 backgroundColor: [
                                    "#FEC88C",
                                    "#FFA07A",
                                    "#87CEFA",
                                    "#ADD8E6",
                                    
                                ],
                hoverBackgroundColor: [
                                    "#FEC88C",
                                    "#FFA07A",
                                    "#87CEFA",
                                    "#ADD8E6",
                                ]
            } ],
            labels: arrUnit
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            legend:{
                // position:"bottom",
                // labels:{
                //   boxWidth:10
                display : false
            },pieceLabel : {
                render : 'legend',
                fontColor : '#000',
                position : 'outside',
                segment : true,
                precision: 0,
                showActualPercentages: true,                
            },
            legendCallback : function (chart,index){
                var allData = chart.data.datasets[0].data;
                // console.log(chart)
                var legendHtml = [];
                legendHtml.push('<ul><div class="row ml-8">');
                allData.forEach(function(data,index){
                    var label = chart.data.labels[index];
                    var dataLabel = allData[index];
                    var background = chart.data.datasets[0].backgroundColor[index]
                    var total = 0;
                    for (var i in allData){
                        total += parseInt(allData[i]);
                    }

                    // console.log(total)
                    var percentage = Math.round((dataLabel / total)*100);
                    legendHtml.push('<li class="col-md-6 col-lg-6 col-xl-6 col-12">');
                    legendHtml.push('<span class="chart-legend"><div style="background-color : '+background+'" class="box-legend"></div>'+label+'</span>')
                })
                legendHtml.push('</ul></div>');
                return legendHtml.join("");
            },
        }
    } );
    var myLegendContainer = document.getElementById("legendUnit");
    myLegendContainer.innerHTML = myChart.generateLegend();
}

function drawDataTable(response){
    console.log(response.data);
     var i = 0;
     let jkjkj = [];
    response.data.forEach(function (value, index) {
        jkjkj.push(i+1);
    i++;
    
    });
    console.log(jkjkj);
         tabel = $('#table_summary_ticket').DataTable({
            processing: true,
            serverSide: true,
            ordering: true, // Set true agar bisa di sorting
            order: [[ 0, 'asc' ]], // Default sortingnya berdasarkan kolom / field ke 0 (paling pertama)
            ajax:
            {
                url: base_url+'api/SummaryTicket/SummaryTicketUnit/filterTable', // URL file untuk proses select datanya
                type: "POST"
            },
            deferRender: true,
            aLengthMenu: [[5, 10, 50],[ 5, 10, 50]], // Combobox Limit
            columns: [
                { render: function (data, type, row){
                    var html=""
                     
                    html = row.a

                    return html;

                    }
                },
                { data: "unit"},
                { data: "sNew" }, // Tampilkan nis
                { data: "sOpen" }, // Tampilkan nis
                { data: "sOnProgress" },  // Tampilkan nama
                { data: "sReopen" }, // Tampilkan telepon
                { data: "sResolved" }, // Tampilkan alamat
                { data: "sPending"},
                { data: "sReturn"},
                { data: "sReject"}
            ],
        });

}

function drawDataTable2(params, index, params_year){

    
    $('#mytbody').remove();
    $('#mytfoot').remove();
    $('#table_summary_ticket').append('<tbody style="font-size:12px !important;" id="mytbody"></tbody>');

    $('#table_summary_ticket').DataTable({
        processing : true,
        serverSide : true,
        ajax: {
            url : base_url + 'api/SummaryTicket/SummaryTicketUnit/filterTable',
            type : 'POST'
        },
        data: {
            params: params,
            index: index,
            params_year: params_year
        },
        destroy: true,
        drawCallback:function(settings)
        {
            $('#total_new').html(settings.json.totalnew);
            console.log(settings.json.totalnew);
        },
         // footerCallback: function ( row, data, start, end, display) {
         //    var api = this.api(), data;
 
         //    // Remove the formatting to get integer data for summation
         //    var intVal = function ( i ) {
         //        return typeof i === 'string' ?
         //            i.replace(/[\$,]/g, '')*1 :
         //            typeof i === 'number' ?
         //                i : 0;
         //    };

         //    // Total over all pages
         //    total = api
         //        .column( 2 )
         //        .data()
         //        .reduce( function (a, b) {
         //            return intVal(a) + intVal(b);
         //        } );
 
         //    // Total over this page
         //    pageTotal = api
         //        .column( 2, { page: 'current'} )
         //        .data()
         //        .reduce( function (a, b) {
         //            return intVal(a) + intVal(b);
         //        }, 0 );
 
         //    // Update footer
         //    $( api.column( 2 ).footer() ).html(
         //        total,
         //        console.log(total)

         //    );
            // $(api.column(3),footer()).html(total)
        // },
        // "footerCallback": function(row, data, start, end, display) {
        //   var api = this.api();
         
        //   api.columns('.sum', {
        //     page: 'current'
        //   }).every(function() {
        //     var sum = this
        //       .data()
        //       .reduce(function(a, b) {
        //         var x = parseFloat(a) || 0;
        //         var y = parseFloat(b) || 0;
        //         return x + y;
        //       }, 0);
        //     console.log(sum); //alert(sum);
        //     $(this.footer()).html(sum);
        //   });
        // }
    });
}

function drawTable(response){
    //destroy div piechart

    $('#table_summary_ticket').DataTable();
    $('#mytbody').remove();
    $('#mytfoot').remove();
    $('#table_summary_ticket').append('<tbody style="font-size:12px !important;" id="mytbody"></tbody>');
    $('#table_summary_ticket').append('<tfoot class="font-weight-extrabold text-right bg-total" id="mytfoot"></tfoot>');

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
        sum_reject = parseInt(sum_reject)+parseInt(value.reject);

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
        '<td class="text-right">'+addCommas(value.reject)+'</td>'+
        '</tr>');

        i++;
    });
    console.log(response.data);

    $('#table_summary_ticket').find('tfoot').append('<th colspan="2" class="font-weight-extrabold">Total</th>'+
                                                    '<th>'+sum_new+'</th>'+
                                                    '<th>'+sum_open+'</th>'+
                                                    '<th>'+sum_onProgress+'</th>'+
                                                    '<th>'+sum_resolved+'</th>'+
                                                    '<th>'+sum_reopen+'</th>'+
                                                    '<th>'+sum_pending+'</th>'+
                                                    '<th>'+sum_return+'</th>'+
                                                    '<th>'+sum_reject+'</th>');

    $("#filter-loader").fadeOut("slow");
}
function ini_finctiiin () {
    "use strict";

    //pie chart summary status ticket
    // var ctx = document.getElementById( "pieChart" );
    // ctx.height = 250;
    // var myChart = new Chart( ctx, {
    //     type: 'pie',
    //     data: {
    //         datasets: [ {
    //             data: [ 15, 35, 40,20,50,30,15,30 ],
    //             backgroundColor: [
    //                                 "#FEC88C",
    //                                 "#FFA07A",
    //                                 "#87CEFA",
    //                                 "#ADD8E6",
    //                                 "#B0C4DE",
    //                                 "#778899",
    //                                 "#8FBC8F",
    //                                 "#BDB76B",
                                    
    //                             ],
    //             hoverBackgroundColor: [
    //                                 "#FEC88C",
    //                                 "#FFA07A",
    //                                 "#87CEFA",
    //                                 "#ADD8E6",
    //                                 "#B0C4DE",
    //                                 "#778899",
    //                                 "#8FBC8F",
    //                                 "#BDB76B",
    //                             ]
    //         } ],
    //         labels: [
    //                             "New",
    //                             "Open",
    //                             "Reject",
    //                             "On Progress",
    //                             "Pending",
    //                             "Reopen",
    //                             "Close",
    //                             "Resolved"
    //                 ]
    //     },
    //     options: {
    //         responsive: true,
    //         maintainAspectRatio: false,
    //         legend:{
    //             // position:"bottom",
    //             // labels:{
    //             // 	boxWidth:10
    //             display : false
    //         },
    //         legendCallback : function (chart,index){
    //             var allData = chart.data.datasets[0].data;
    //             // console.log(chart)
    //             var legendHtml = [];
    //             legendHtml.push('<ul><div class="row ml-3">');
    //             allData.forEach(function(data,index){
    //                 var label = chart.data.labels[index];
    //                 var dataLabel = allData[index];
    //                 var background = chart.data.datasets[0].backgroundColor[index]
    //                 var total = 0;
    //                 for (var i in allData){
    //                     total += parseInt(allData[i]);
    //                 }

    //                 // console.log(total)
    //                 var percentage = Math.round((dataLabel / total)*100);
    //                 legendHtml.push('<li class="col-md-6 col-lg-6 col-sm-12 col-xl-6">');
    //                 legendHtml.push('<span class="chart-legend"><div style="background-color : '+background+'" class="box-legend"></div>'+label+'</span>')
    //             })
    //             legendHtml.push('</ul></div>');
    //             return legendHtml.join("");
    //         },
    //     }
    // } );
    // var myLegendContainer = document.getElementById("legend");
    // myLegendContainer.innerHTML = myChart.generateLegend();

    //pie chart summary unit
    // var ctx = document.getElementById( "pieChartUnit" );
    // ctx.height = 250;
    // var myChart = new Chart( ctx, {
    //     type: 'pie',
    //     data: {
    //         datasets: [ {
    //             data: [ 15, 35, 40,20,50,30,15,30,90,100 ],
    //             backgroundColor: [
    //                                 "#2F5596",
    //                                 "#01B0F1",
    //                                 "#F07D2D",
    //                                 "#F3AE8F",
    //                                 "#44546B",
    //                                 "#70AC48",
    //                                 "#9EC2E4",
    //                                 "#00AF50",
    //                                 "#FDC100",
    //                                 "#C20006"
    //                             ],
    //             hoverBackgroundColor: [
    //                                 "#2F5596",
    //                                 "#01B0F1",
    //                                 "#F07D2D",
    //                                 "#F3AE8F",
    //                                 "#44546B",
    //                                 "#70AC48",
    //                                 "#9EC2E4",
    //                                 "#00AF50",
    //                                 "#FDC100",
    //                                 "#C20006"
    //                             ]

    //                         } ],
    //         labels: [
    //                         "Agency Help Line",
    //                         "Keuangan",
    //                         "CRM",
    //                         "Post Line",
    //                         "Provider Relation",
    //                         "Data Control",
    //                         "Credit Control",
    //                         "Claim Health",
    //                         "Claim Non Health",
    //                         "Call Center"
    //                     ]
    //     },
    //     options: {
    //         responsive: true,
    //         maintainAspectRatio: false,
    //         legend:{
    //             // position:"bottom",
    //             // labels:{
    //             // 	boxWidth:10
    //             display : false                
    //         },
    //         legendCallback : function(chart,index){
    //             var allData = chart.data.datasets[0].data;
    //             // console.log(chart)
    //             var legendHtml = [];
    //             legendHtml.push('<ul><div class="row ml-2">');
    //             allData.forEach(function(data,index){
    //                 var label = chart.data.labels[index];
    //                 var dataLabel = allData[index];
    //                 var background = chart.data.datasets[0].backgroundColor[index]
    //                 var total = 0;
    //                 for (var i in allData){
    //                     total += parseInt(allData[i]);
    //                 }

    //                 // console.log(total)
    //                 var percentage = Math.round((dataLabel / total)*100);
    //                 legendHtml.push('<li class="col-md-6 col-lg-6 col-sm-12 col-xl-6">');
    //                 legendHtml.push('<span class="chart-legend"><div style="background-color : '+background+'" class="box-legend"></div>'+label+'</span>')
    //             })
    //             legendHtml.push('</ul></div>');
    //             return legendHtml.join("");
    //         },
    //     }
    
    // });
    // var myLegendContainer = document.getElementById("legendUnit");
    // myLegendContainer.innerHTML = myChart.generateLegend();

}

//jquery
(function ($) {

    // btn day
    $('#btn-day').click(function(){
        params_time = 'day';
        // console.log(params_time);
        loadContent(params_time , '2020-01-10');
        // $('#tag-time').html(v_date);
        $("#btn-week").prop("class","btn btn-light btn-sm");
        $("#btn-month").prop("class","btn btn-light btn-sm");
        $("#btn-year").prop("class","btn btn-light btn-sm");
        $(this).prop("class","btn btn-red btn-sm");
    });

    // btn day
    $('#btn-week').click(function(){
        params_time = 'week';
        // console.log(params_time);
        loadContent(params_time , '2020-01-10', v_year);
        // $('#tag-time').html(v_date);
        $("#btn-day").prop("class","btn btn-light btn-sm");
        $("#btn-month").prop("class","btn btn-light btn-sm");
        $("#btn-year").prop("class","btn btn-light btn-sm");
        $(this).prop("class","btn btn-red btn-sm");
    });

    // btn month
    $('#btn-month').click(function(){
        params_time = 'month';
        // console.log(params_time);
        loadContent(params_time , '1', v_year)
        // $('#tag-time').html(monthNumToName(v_month)+' '+v_year);
        $("#btn-week").prop("class","btn btn-light btn-sm");
        $("#btn-day").prop("class","btn btn-light btn-sm");
        $("#btn-year").prop("class","btn btn-light btn-sm");
        $(this).prop("class","btn btn-red btn-sm");
    });

    // btn year
    $('#btn-year').click(function(){
        params_time = 'year';
        // console.log(params_time);
        loadContent(params_time , '2020');
        // $('#tag-time').html(v_year);
        $("#btn-week").prop("class","btn btn-light btn-sm");
        $("#btn-month").prop("class","btn btn-light btn-sm");
        $("#btn-day").prop("class","btn btn-light btn-sm");
        $(this).prop("class","btn btn-red btn-sm");
    });

})(jQuery);