var base_url = $('#base_url').val();

$(document).ready(function () {
    loadContent();
    // template();
});


//function 
function getColorChannel(channel){
    var color = [];
    color['Email'] = '#e41313';
    color['Facebook'] = '#467fcf';
    color['Instagram'] = '#fbc0d5';
    color['Line'] = '#31a550';
    color['Live Chat'] = '#607d8b';
    color['Messenger'] = '#3866a6';
    color['SMS'] = '#80cbc4';
    color['Telegram'] = '#343a40';
    color['Twitter'] = '#45aaf2';
    color['Twitter DM'] = '#6574cd';
    color['Voice'] = '#ff9933';
    color['Whatsapp'] = '#31a550';

    return color[channel];
}

//thausands separator
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

function loadContent(params, index_time){
    $("#filter-loader").fadeIn("slow");
    callSummaryScrCof();
    $("#filter-loader").fadeOut("slow");
}

function callSummaryScrCof(){
    $.ajax({
        type: 'post',
        url: base_url + 'api/AgentPerformance/AgentPerformController/getscrcof',
        // data: {
        //     params: params,
        //     index: index_time
        // },
        success: function (r) { 
            var response = JSON.parse(r);
            // console.log(response);
            drawPie(response);
            drawBarChart(response);
            drawTable(response);
        },
        error: function (r) {
            alert("error");
        },
    });
}

function drawPie(response){
    //destroy div piechart
    $('#pieTrafficPerformance').remove(); // this is my <canvas> element
    $('#canvas-pie').append('<canvas id="pieTrafficPerformance" class="donutShadow overflow-hidden"></canvas>');

    // //destroy div card content
    // $('#row-baru').remove(); // this is my <div> element
    // $('#card-baru').append('<div id="row-baru" class="row"></div>');

    let arrCof = []
    let arrColor = []
    let arrChannel = []

    // draw card yang ada datanya
    response.data.forEach(function (value, index) {
        arrCof.push(value.cof);
        arrChannel.push(value.channel)
        arrColor.push(getColorChannel(value.channel));
    });

    // draw chart
    var ctx = document.getElementById( "pieTrafficPerformance" );
    ctx.height = 300;
    var myChart = new Chart( ctx, {
        type: 'pie',
        data: {
            datasets: [ {
                labels: arrCof,
                data: arrCof,
                backgroundColor: arrColor,
                hoverBackgroundColor: arrColor
                            } ],
            labels: arrChannel
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            legend:{
            //     position:"bottom",
            //     labels:{
            //      boxWidth:10
            //    }
                display : false
            },
            tooltips: {
              callbacks: {
                    label: function(tooltipItem, data) {
                        var value = data.datasets[0].data[tooltipItem.index];
                        value = value.toString();
                        value = value.split(/(?=(?:...)*$)/);
                        value = value.join(',');
                        return value;
                    }
              } // end callbacks:
            }, //end tooltips
            pieceLabel : {
                render : 'legend',
                fontColor : '#000',
                position : 'outside',
                segment : true,
                precision: 0,
                showActualPercentages: true,                
            },
            legendCallback : function (chart, index){
                var allData = chart.data.datasets[0].data;
                // console.log(chart)
                var legendHtml = [];
                legendHtml.push('<ul><div class="row ml-2">');
                allData.forEach(function(data,index){
                    var label = chart.data.labels[index];
                    var dataLabel = allData[index];
                    var background = chart.data.datasets[0].backgroundColor[index]
                    var total = 0;
                    for(var i in allData){
                        total += parseInt(allData[i]);
                    }

                    if(dataLabel != 0){
                        var percentage = parseFloat((dataLabel / total)*100).toFixed(1);
                    }else{
                        var percentage = Math.round((dataLabel / total) * 100);
                    }
                    legendHtml.push('<li class="col-md-4 col-lg-4 col-sm-6 col-xl-4">');
                    legendHtml.push('<span class="chart-legend"><div style="background-color : '+background+'" class="box-legend"></div>'+label+': '+percentage+'%</span>')
                    legendHtml.push('</li>');
                })
                legendHtml.push('</ul></div>');
                return legendHtml.join("");
            },
        }
    } );
    var mylegendContainer = document.getElementById("legend");
    mylegendContainer.innerHTML=myChart.generateLegend();
}

function drawBarChart(response){
    // destroyChartPercentage();
    var data_label = [];
    var data_scr = [];
    var data_color = [];
    response.data.forEach(function (value, index) {
        data_label.push(value.channel);
        data_scr.push(value.scr);
        data_color.push(getColorChannel(value.channel));
    });
    var obj = [{
        label: "data",
        data: data_scr,
        borderColor: data_color,
        borderWidth: "0",
        backgroundColor: data_color
    }];

    // draw chart
    var MeSeContext = document.getElementById("MeSeStatusCanvas");
    MeSeContext.height = 500;
    var MeSeData = {
        labels : data_label,
        datasets : [{
            label : "SCR",
            data :data_scr,
            backgroundColor : data_color,
            hoverBackgroundColor : data_color
        }]
    };
    // console.log(data_scr);
    var MeSeChart = new Chart(MeSeContext,{
        type : 'horizontalBar',
        data : MeSeData,
        options : {
            responsive: true,
            maintainAspectRatio: false,
            scales : {
                xAxes : [{
                    ticks : {
                        min : 0
                    }
                }],
                yAxes : [{
                    stacked : true
                }]
            },
            legend: {
                display: false
                }
        }
    });
}

function drawTable(response){
    $("#mytbody").empty();
    if(response.data.length != 0){
        response.data.forEach(function (value, index) {
            $('#table-traffic-performance').find('tbody').append('<tr>'+
            '<td class="text-center">'+(index+1)+'</td>'+
            '<td class="text-left">'+value.channel+'</td>'+
            '<td class="text-right">'+addCommas(value.cof)+'</td>'+
            '<td class="text-right">'+value.abd+'</td>'+
            '<td class="text-right">'+value.art+'</td>'+
            '<td class="text-right">'+value.aht+'</td>'+
            '<td class="text-right">'+value.ast+'</td>'+
            '<td class="text-right">'+value.sl+'%</td>'+
            '<td class="text-right">'+value.scr+'%</td>'+
            '</tr>');
        });
    }else{
        $('#table-avg-interval').find('tbody').append('<tr>'+
            '<td colspan=6> No Data </td>'+
            '</tr>');
    }
}

function template() {
    "use strict";
    
    var ctx = document.getElementById( "pieTrafficPerformance" );
    ctx.height = 300;
    var myChart = new Chart( ctx, {
        type: 'pie',
        data: {
            datasets: [ {
                data: [ 15,35,40,50,80,90,100,40,50,80,30,40],
                backgroundColor: [
                                    "#089e60",
                                    "#fbc0d5",
                                    "#467fcf",
                                    "#45aaf2",
                                    "#31a550",
                                    "#3866a6",
                                    "#6574cd",
                                    "#343a40",
                                    "#e41313",
                                    "#ff9933",
                                    "#80cbc4",
                                    "#607d8b"
                                ],
                hoverBackgroundColor: [
                                    "#089e60",
                                    "#fbc0d5",
                                    "#467fcf",
                                    "#45aaf2",
                                    "#31a550",
                                    "#3866a6",
                                    "#6574cd",
                                    "#343a40",
                                    "#e41313",
                                    "#ff9933",
                                    "#80cbc4",
                                    "#607d8b"
                                ]

                            } ],
            labels: [
                                "Whatsapp",
                                "Instagram",
                                "Faceboook",
                                "Twitter",
                                "Line",
                                "Messenger",
                                "Twitter DM",
                                "Telegram",
                                "Email",
                                "Voice",
                                "SMS",
                                "Live Chat"
                    ]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            legend:{
            //     position:"bottom",
            //     labels:{
			// 		boxWidth:10
            //    }
                display : false
            },
            pieceLabel : {
                render : 'legend',
                fontColor : '#000',
                position : 'outside',
                segment : true
            },
            legendCallback : function (chart, index){
                var allData = chart.data.datasets[0].data;
                // console.log(chart)
                var legendHtml = [];
                legendHtml.push('<ul><div class="row ml-2">');
                allData.forEach(function(data,index){
                    var label = chart.data.labels[index];
                    var dataLabel = allData[index];
                    var background = chart.data.datasets[0].backgroundColor[index]
                    var total = 0;
                    for(var i in allData){
                        total += parseInt(allData[i]);
                    }

                    // console.log(total)
                    var percentage = Math.round((dataLabel / total)*100);
                    legendHtml.push('<li class="col-md-4 col-lg-4 col-sm-6 col-xl-4">');
                    legendHtml.push('<span class="chart-legend"><div style="background-color : '+background+'" class="box-legend"></div>'+label+': '+percentage+'%</span>')
                })
                legendHtml.push('</ul></div>');
                return legendHtml.join("");
            },
        }
    } );
    var mylegendContainer = document.getElementById("legend");
    mylegendContainer.innerHTML=myChart.generateLegend();

    // Horizontal Bar

    var MeSeContext = document.getElementById("MeSeStatusCanvas");
    MeSeContext.height = 500;
    var MeSeData = {
        labels : [
                    "Whatsapp",
                    "Instagram",
                    "Faceboook",
                    "Twitter",
                    "Line",
                    "Messenger",
                    "Twitter DM",
                    "Telegram",
                    "Email",
                    "Voice",
                    "SMS",
                    "Live Chat"
        ],
        datasets : [{
            label : "test",
            data :[50,60,70,80,90,50,100,120,150,160,180,200],
            backgroundColor : [
                                "#089e60",
                                "#fbc0d5",
                                "#467fcf",
                                "#45aaf2",
                                "#31a550",
                                "#3866a6",
                                "#6574cd",
                                "#343a40",
                                "#e41313",
                                "#ff9933",
                                "#80cbc4",
                                "#607d8b"
                            ],
            hoverBackgroundColor : [
                                "#089e60",
                                "#fbc0d5",
                                "#467fcf",
                                "#45aaf2",
                                "#31a550",
                                "#3866a6",
                                "#6574cd",
                                "#343a40",
                                "#e41313",
                                "#ff9933",
                                "#80cbc4",
                                "#607d8b"
            ]
        }]
    };
    var MeSeChart = new Chart(MeSeContext,{
        type : 'horizontalBar',
        data : MeSeData,
        options : {
            responsive: true,
            maintainAspectRatio: false,
            scales : {
                xAxes : [{
                    ticks : {
                        min : 0
                    }
                }],
                yAxes : [{
                    stacked : true
                }]
            },
            legend: {
                display: false
                }
        }
    });


}