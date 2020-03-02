var base_url = $('#base_url').val();
var v_params_tenant = 'oct_telkomcare';
const sessionParams = JSON.parse(sessionStorage.getItem('Auth-infomedia'));
var d = new Date();
var n = d.getFullYear();
$(document).ready(function () {
    if(sessionParams){
        $('#dateTahun option[value = ' + n + ']').attr('selected', 'selected');
        
        var data_year = callYear();
        if(sessionParams.TENANT_ID[0].TENANT_ID != ''){
            getTenant('', sessionParams.USERID);
        }else{
            getTenant('', '');
        }
        var data_chart = callGraphYear('ShowAll', n, $('#layanan_name').val());
        var data_graph = callDataPercentage(n, $('#layanan_name').val());
        var data_table = callDataTableAvg(n, $('#layanan_name').val());
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

function addCommas(commas) {
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

function callYear() {
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
            var dateTahun = $("#dateTahun");
            var response = JSON.parse(r);

            // var html = '<option value="2020">2020</option>';
            var html = '';
            var i;
            for (i = 0; i < response.data.niceDate.length; i++) {
                html += '<option value=' + response.data.niceDate[i] + '>' + response.data.niceDate[i] + '</option>';
            }
            $('#dateTahun').html(html);

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

function callGraphYear(channel_name, year, tenant_id) {
    // $("#filter-loader").fadeIn("slow");
    destroyChartInterval();
    var data = "";
    var base_url = $('#base_url').val();
    // console.log(year);

    $.ajax({
        type: 'POST',
        url: base_url + 'api/SummaryTraffic/SummaryYear/gInterval',
        data: {
            "channel_name": channel_name,
            "year": year,
            "tenant_id": tenant_id
        },

        success: function (r) {
            var response = JSON.parse(r);
            // var chartdata = [{
            //     name: 'total',
            //     type: 'bar',
            //     data: response.data.total_traffic
            // }];
            console.log(response);

            var numberWithCommas = function (x) {
                return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
            };

            var dataStacked = [];
            var datasetsStacked = "";
                datasetsStacked = {
                        label: response.data.channel_name,
                        data: response.data.total_traffic,
                        backgroundColor: response.data.channel_color,
                        hoverBackgroundColor: response.data.channel_color,
                        hoverBorderWidth: 0
                    },

                dataStacked.push(datasetsStacked);

            
            // console.log(dataStacked);
            var ctx = document.getElementById('BarChartYear');

            var myChart = new Chart( ctx, {
                type: 'bar',
                data: {
                    labels: response.data.month_x_axis,
                    datasets: dataStacked
                },
                options: {
                 responsive: true,
                    maintainAspectRatio: false,
                    legend:{
                        display : false
                    },
                 layout: {
                         padding: {
                         left: 20,
                         right: 20,
                         top: 25,
                         bottom: 10
                     }
                 },
                 tooltips: {
                      callbacks: {
                            label: function(tooltipItem, data) {
                                var value = data.datasets[0].data[tooltipItem.index];
                                if(parseInt(value) >= 1000){
                                           return 'Total: ' + value.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
                                        } else {
                                           return 'Total: ' + value;
                                        }
                            }
                      } // end callbacks:
                    },
                    scales: {
                        yAxes: [ {
                            ticks: {
                            callback: function (value) {
                                return numberWithCommas(value);
                                },
                            },
                                        } ]
                    },
                }
            } );
            $("#filter-loader").fadeOut("slow");
        },
        error: function (r) {
            alert("error");
            $("#filter-loader").fadeOut("slow");
        },
    });
}

//function get data and draw
function getColorChannel(channel_name) {
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
    color['ChatBot'] = '#6e273e';

    return color[channel_name];
}

function callDataPercentage(year, tenant_id) {
    $.ajax({
        type: 'post',
        url: base_url + 'api/SummaryTraffic/SummaryYear/summaryIntervalYear',
        data: {
            year: year,
            tenant_id: tenant_id
        },
        success: function (r) {
            var response = JSON.parse(r);
            //console.log(response);
            drawChartPercentageYear(response);
        },
        error: function (r) {
            //console.log(r);
            alert("error");
        },
    });
}

function drawChartPercentageYear(response) {
    var data_label = [];
    var data_rate = [];
    var data_color = [];;
    response.data.forEach(function (value, index) {
        data_label.push(value.channel_name);
        data_rate.push(value.rate);
        data_color.push(getColorChannel(value.channel_name));
    });
    // console.log(data_label);
    var obj = [{
        label: "data",
        data: data_rate,
        borderColor: data_color,
        borderWidth: "0",
        backgroundColor: data_color
    }];

    // draw chart
    var ctx_percentage = document.getElementById("echartVerticalYear");
    ctx_percentage.height = 610;
    var percentageChart = new Chart(ctx_percentage, {
        type: 'horizontalBar',
        data: {
            labels: data_label,
            datasets: obj,
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }],
                xAxes: [{
                    ticks: {
                        min: 0, // Edit the value according to what you need
                        callback: function (value, index, values) {
                            //      if(parseInt(value) >= 1000){
                            //          var res = (value/1000);
                            // return res+'K'
                            //      } else
                            //       return value;
                            value = value.toString();
                            value = value.split(/(?=(?:...)*$)/);
                            value = value.join('.');
                            return value;
                        }
                    }
                }]

            },
            legend: {
                display: false
            },
            tooltips: {
                callbacks: {
                    label: function (tooltipItem, data) {
                        var value = data_rate[tooltipItem.index];
                        // value = value.toString();
                        // value = value.split(/(?=(?:...)*$)/);
                        // value = value.join(',');
                        value = addCommas(value);
                        return value;
                    }
                }
            },
        }
    });
}

function callDataTableAvg(year, tenant_id) {
    $.ajax({
        type: 'post',
        url: base_url + 'api/SummaryTraffic/SummaryYear/averageInterval',
        data: {
            year: year,
            tenant_id: tenant_id
        },
        success: function (r) {
            var response = JSON.parse(r);
            // console.log(response);
            drawTableYear(response);
        },
        error: function (r) {
            //console.log(r);
            alert("error");
        },
    });
}

function drawTableYear(response) {
    $("#mytbody_year").empty();
    if (response.data.length != 0) {
        response.data.forEach(function (value, index) {
            $('#table_avg_year').find('tbody').append('<tr>' +
                '<td class="text-center">' + (index + 1) + '</td>' +
                '<td class="text-left">' + value.channel_name + '</td>' +
                '<td class="text-right">' + value.scr + '</td>' +
                '<td class="text-right">' + value.art + '</td>' +
                '<td class="text-right">' + value.aht + '</td>' +
                '<td class="text-right">' + value.ast + '</td>' +
                '</tr>');
        });
    } else {
        $('#table_avg_year').find('tbody').append('<tr>' +
            '<td colspan=6> No Data </td>' +
            '</tr>');
    }

}

function stackedBarIntervalYear(channel_name, tenant_id) {
    destroyChartInterval();
    $("#filter-loader").fadeIn("slow");
    var getMontName = monthNumToName(month);
    var data = "";
    var base_url = $('#base_url').val();
    //call traffic per month
    $.ajax({
        type: 'POST',
        url: base_url + 'api/SummaryTraffic/SummaryYear/gInterval',
        data: {
            "channel_name": channel_name,
            "year": year,
            "tenant_id": tenant_id
        },
        success: function (r) {
            var response = JSON.parse(r);
            console.log(response);
            // Vertical Stacked Bar All Channel Dashboard Traffic Interval Month yang baru 
            // Return with commas in between
            var numberWithCommas = function (x) {
                return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
            };

            var dataStacked = [];
            var datasetsStacked = "";

            response.data.forEach(function (value) {
                datasetsStacked = {
                        label: value.channel_name,
                        data: value.total_traffic,
                        backgroundColor: value.channel_color,
                        hoverBackgroundColor: value.channel_color,
                        hoverBorderWidth: 0
                    },

                    dataStacked.push(datasetsStacked);
            });


            // console.log(dataStacked);
            var bar_ctx = document.getElementById('BarTrafficMonth');

            var bar_chart = new Chart(bar_ctx, {
                type: 'bar',
                // type: 'horizontalBar',
                data: {
                    labels: response.data.month_x_axis,
                    datasets: dataStacked,
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    animation: {
                        duration: 10,
                    },
                    tooltips: {
                        mode: 'label',
                        callbacks: {
                            label: function (tooltipItem, data) {
                                return data.datasets[tooltipItem.datasetIndex].label + ": " + numberWithCommas(tooltipItem.yLabel);
                            }
                        }
                    },
                    scales: {
                        xAxes: [{
                            stacked: true,
                            gridLines: {
                                display: false
                            },
                        }],
                        yAxes: [{
                            stacked: true,
                            ticks: {
                                callback: function (value) {
                                    return numberWithCommas(value);
                                },
                            },
                        }],
                    },
                    legend: {
                        display: true,
                        labels: {
                            boxWidth: 10,
                        }
                    }
                },
                // plugins: [{
                // 	beforeInit: function (chart) {
                // 		chart.data.labels.forEach(function (value, index, array) {
                // 			var a = [];
                // 			a.push(value.slice(0, 5));
                // 			var i = 1;
                // 			while (value.length > (i * 5)) {
                // 				a.push(value.slice(i * 5, (i + 1) * 5));
                // 				i++;
                // 			}
                // 			array[index] = a;
                // 		})
                // 	}
                // }]
            });
            $("#filter-loader").fadeOut("slow");
        },
        error: function (r) {
            alert("error");
            $("#filter-loader").fadeOut("slow");
        },
    });
}

function destroyChartInterval() {
    // destroy chart interval 
    $('#BarChartYear').remove(); // this is my <canvas> element
    $('#customerChartYear').append('<canvas id="BarChartYear" class="h-300"></canvas>');
}

function destroyChartPercentage() {
    //destroy chart percentage
    $('#echartVerticalYear').remove(); // this is my <canvas> element
    $('#chartPercentage').append('<canvas id="echartVerticalYear"></canvas>');
}

//jquery
(function ($) {
    $('#layanan_name').change(function(){
        //set check all channel
        callYear();
        callGraphYear($("#channel_name").val(), $("#dateTahun").val(), $('#layanan_name').val());
        callDataPercentage($("#dateTahun").val(), $('#layanan_name').val());
        callDataTableAvg($("#dateTahun").val(), $('#layanan_name').val());
    });
    // change date picker
    // $("select#dateTahun").change(function(){
    //     destroyChartInterval();
    //     destroyChartPercentage();
    //       var selectedYear = $(this).children("option:selected").val();

    //       //console.log(selectedYear);
    //       // console.log($("#channel_name").val());
    //     callGraphYear($("#channel_name").val(), selectedYear);
    //     callDataPercentage(selectedYear);
    //     callDataTableAvg(selectedYear);
    //     // callDataTableAvg(selectedYear);
    //     });
    // $("select#channel_name").change(function(){
    //       var selectedName = $(this).children("option:selected").val();
    //       //console.log(selectedName);
    //       // console.log($("#channel_name").val());
    //     callGraphYear(selectedName, $("#dateTahun").val());
    //     });

    //btn go
    $('#btn-go').click(function () {
        destroyChartInterval();
        destroyChartPercentage();
        callGraphYear($("#channel_name").val(), $("#dateTahun").val(), $('#layanan_name').val());
        callDataPercentage($("#dateTahun").val(), $('#layanan_name').val());
        callDataTableAvg($("#dateTahun").val(), $('#layanan_name').val());
    });
})(jQuery);