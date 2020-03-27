var months = [
    'January', 'February', 'March', 'April', 'May',
    'June', 'July', 'August', 'September',
    'October', 'November', 'December'
];
var base_url = $('#base_url').val();
var d = new Date();
var n = d.getMonth() + 1;
var m = d.getFullYear();
const sessionParams = JSON.parse(localStorage.getItem('Auth-infomedia'));
const tokenSession = JSON.parse(localStorage.getItem('Auth-token'));
$(document).ready(function () {
    if(sessionParams){
        if(sessionParams.TENANT_ID[0].TENANT_ID != ''){
            getTenant(tokenSession, '', sessionParams.USERID);
        }else{
            getTenant(tokenSession, '', '');
        }
        drawStackedBar(tokenSession, 'month', '10', '2019', $("#layanan_name").val());
    }else{
        window.location = base_url
    }
});

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

function destroyChartInterval() {
    // destroy chart interval 
    $('#BarWallTicketCloseMonth').remove(); // this is my <canvas> element
    $('#BarWallTicketCloseMonthDiv').append('<canvas id="BarWallTicketCloseMonth" height="452"></canvas>');
}

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
            var notif = alert('Your Account Credential is Invalid. Maybe someone else has logon to your account.')
            if(notif){
                localStorage.clear();
                window.location = base_url+'main/login';
            }else{
                localStorage.clear();
                window.location = base_url+'main/login';
            }
        },
    });
}


function drawStackedBar(token, params, index, params_year, tenant_id) {
    // destroyChartInterval();
    // $("#filter-loader").fadeIn("slow");
    // var getMontName = monthNumToName(month);
    var data = "";
    var base_url = $('#base_url').val();
    //call traffic per month
    $.ajax({
        beforeSend: function (xhr) {
            xhr.setRequestHeader("token", token);
        },
        type: 'POST',
        url: base_url + 'api/Wallboard/WallboardController/summaryTicketCloseWall',
        data: {
            "params": params,
            // "channel_name": channel_name,
            "index": index,
            "params_year": params_year,
            "tenant_id": tenant_id
        },
        success: function (r) {
            // var response = JSON.parse(r);
            $('#BarWallTicketCloseMonth').remove(); // this is my <canvas> element
            $('#BarWallTicketCloseMonthDiv').append('<canvas id="BarWallTicketCloseMonth" height="452"></canvas>');
            $('#modalError').modal('hide');
            var response = r;
            setTimeout(function(){drawStackedBar(token, 'month', '10', '2019', $("#layanan_name").val());}, 5000);
            drawHorizontalChart(response);

            // console.log(response);
            
            var numberWithCommas = function (x) {
                return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
            };

            var dataStacked = [];
            var datasetsStacked = "";
            var indexTanggal = [];
            var g= 0;
            response.data.forEach(function(value){
                datasetsStacked = {
                    label: value.channel_name,
                    data: value.total_traffic,
                    backgroundColor: value.channel_color,
                    hoverBackgroundColor: value.channel_color,
                    hoverBorderWidth: 0
                },
                dataStacked.push(datasetsStacked)
            })

            response.data[0].total_traffic.forEach(function(value){
                    indexTanggal.push((g+1));
                    g++;
            });

            // console.log(indexTanggal);
            var bar_ctx = document.getElementById('BarWallTicketCloseMonth');

            var bar_chart = new Chart(bar_ctx, {
                type: 'bar',
                data: {
                    labels: indexTanggal,
                    datasets: dataStacked,
                },
                options: {
                    responsive :true,
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
                            ticks:{
                                fontSize:10
                            }
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
                            boxWidth: 10
                        }
                    }
                },
                // plugins: [{
                //     beforeInit: function (chart) {
                //         chart.data.labels.forEach(function (value, index, array) {
                //             var a = [];
                //             a.push(value.slice(0, 5));
                //             var i = 1;
                //             while (value.length > (i * 5)) {
                //                 a.push(value.slice(i * 5, (i + 1) * 5));
                //                 i++;
                //             }
                //             array[index] = a;
                //         })
                //     }
                // }]
            });
        },
        error: function (r) {
            if(r.status == 404){
                var notif = alert('Your Account Credential is Invalid. Maybe someone else has logon to your account.')
                if(notif){
                    localStorage.clear();
                    window.location = base_url+'main/login';
                }else{
                    localStorage.clear();
                    window.location = base_url+'main/login';
                } 
            }
            $('#modalError').modal('show');
            setTimeout(function(){drawStackedBar(token, 'month', '10', '2019', $("#layanan_name").val());}, 5000);
            $("#filter-loader").fadeOut("slow");
        },
    });
}

function drawHorizontalChart(response) {
    $('#barWallTicketClose').remove(); // this is my <canvas> element
    $('#barWallTicketCloseDiv').append('<canvas id="barWallTicketClose"></canvas>');
    var data_label = [];
    var data_total = [];
    var data_color = [];
    // console.log(response.data);
    response.data.forEach(function (value, index) {
        data_label.push(value.channel_name);
        data_total.push(value.total_traffic.map(Number).reduce(summarize));
        data_color.push(value.channel_color);
    });

    //summarize per channel
    function summarize(total, num) {
        return total + num;
    }

    var MeSeContext = document.getElementById("barWallTicketClose");
    MeSeContext.height = 450;
    var MeSeData = {
        labels: data_label,
        datasets: [{
            label: "total",
            data: data_total,
            backgroundColor: data_color,
            hoverBackgroundColor: data_color
        }]
    };
    var MeSeChart = new Chart(MeSeContext, {
        type: 'horizontalBar',
        data: MeSeData,
        options: {
            animation: false,
            responsive: true,
            maintainAspectRatio: false,
            scales: {
                xAxes: [{
                    ticks: {
                        fontSize:10,
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
                }],
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            },
            legend: {
                display: false
            },
            tooltips: {
                intersect: false,
                callbacks: {
                    label: function (tooltipItem, data) {
                        var value = data_total[tooltipItem.index];
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