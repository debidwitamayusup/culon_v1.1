var base_url = $('#base_url').val();

$(document).ready(function () {
    // loadContent();
    simmiriStatusTicket();
    simmiriUnit();
    ini_finctiiin();
});

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

// function loadContent(params, index_time){
//     $("#filter-loader").fadeIn("slow");
//     callSummaryScrCof();
//     $("#filter-loader").fadeOut("slow");
// }

function simmiriStatusTicket(){
    $.ajax({
        type: 'post',
        url: base_url + 'api/SummaryTicket/SummaryTicketUnit/getSummaryTicket',
        // data: {
        //     params: params,
        //     index: index_time
        // },
        success: function (r) { 
            var response = JSON.parse(r);
            // console.log(response.data[0].new);
            drawPie(response);
        },
        error: function (r) {
            alert("error");
        },
    });
}

function simmiriUnit(){
    $.ajax({
        type: 'post',
        url: base_url + 'api/SummaryTicket/SummaryTicketUnit/getSummaryUnit',
        // data: {
        //     params: params,
        //     index: index_time
        // },
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
                legendHtml.push('<ul><div class="row ml-3">');
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
                    legendHtml.push('<li class="col-md-6 col-lg-6 col-sm-12 col-xl-6">');
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
                legendHtml.push('<ul><div class="row ml-3">');
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
                    legendHtml.push('<li class="col-md-6 col-lg-6 col-sm-12 col-xl-6">');
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