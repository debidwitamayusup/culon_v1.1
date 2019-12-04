var base_url = $('#base_url').val();
$(document).ready(function () {
    
    // console.log(getToday());
    var data_chart = callIntervalTraffic('2019-05-22', []);
    var data_table_avg = callDataTableAvg('2019-11-02');
    var data_percentage = callDataPercentage('2019-05-22')

});
function getColorChannel(channel){
    var color = [];
    color['Email'] = '#e41313';
    color['Facebook'] = '#467fcf';
    color['Instagram'] = '#fbc0d5';
    color['Line'] = '#31a550';
    color['Live Chat'] = '#42265e';
    color['Messenger'] = '#3866a6';
    color['SMS'] = '#1c3353';
    color['Telegram'] = '#343a40';
    color['Twitter'] = '#45aaf2';
    color['Twitter DM'] = '#6574cd';
    color['Voice'] = '#ff9933';
    color['Whatsapp'] = '#31a550';

    return color[channel];
}

function getToday(){
    var today = new Date();
    var dd = String(today.getDate()).padStart(2, '0');
    var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
    var yyyy = today.getFullYear();

    today = yyyy  + '-' + mm + '-' + dd;
    // today = '2019-05-22';
    return today;
}

function callIntervalTraffic(date, arr_channel){
    // console.log(+arr_channel);
    $.ajax({
        type: 'post',
        url: base_url+'api/SummaryTraffic/SummaryToday/getIntervalTrafficToday',
        data: {
            date: date,
            arr_channel: arr_channel
        },
        success: function (r) {
            var response = JSON.parse(r);
            // console.log(response);
            drawChartToday(response);
        },
        error: function (r) {
            console.log(r);
            alert("error");
        },
    });
}

function drawChartToday(response){
    var data = [];
    response.data.series.forEach(function (value, index) {
        var obj = {
            label: value.label,
            data: value.data,
            backgroundColor: 'transparent',
            borderColor: getColorChannel(value.label),
            borderWidth: 3,
            pointStyle: 'circle',
            pointRadius: 4,
            pointBorderColor: 'transparent',
            pointBackgroundColor: getColorChannel(value.label),
        };
        data.push(obj);
    });
    var ctx = document.getElementById( "customerChartToday" );
    var myChart = new Chart( ctx, {
        type: 'line',
        data: {
            labels: response.data.label_time,
            datasets: data
        },
        options: {
			responsive: true,
			maintainAspectRatio: false,
			legend:{
				position:'bottom',
                labels:{
                     boxWidth:10
                }
			},
			barRoundness:  1,
            scales: {
                yAxes: [ {
                    ticks: {
                        beginAtZero: true
						}
                    }]
            }
        }
    } );
}

function callDataTableAvg(date){
    $.ajax({
        type: 'post',
        url: base_url+'api/SummaryTraffic/SummaryToday/getAverageInterval',
        data: {
            date: date
        },
        success: function (r) {
            var response = JSON.parse(r);
            // console.log(response);
            drawTableToday(response);
        },
        error: function (r) {
            console.log(r);
            alert("error");
        },
    });
}

function drawTableToday(response){
    response.data.forEach(function (value, index) {
        $('#table-avg-interval').find('tbody').append('<tr>'+
        '<td>'+(index+1)+'</td>'+
        '<td>'+value.channel_id+'</td>'+
        '<td>'+value.sla+'%</td>'+
        '<td>'+value.art+'</td>'+
        '<td>'+value.ast+'</td>'+
        '<td>'+value.ast+'</td>'+
        '</tr>');
    });
}

function callDataPercentage(date){
    $.ajax({
        type: 'post',
        url: base_url+'api/SummaryTraffic/SummaryToday/getPercentageTrafficToday',
        data: {
            date: date
        },
        success: function (r) {
            var response = JSON.parse(r);
            // console.log(response);
            drawChartPercentageToday(response);
        },
        error: function (r) {
            console.log(r);
            alert("error");
        },
    });
}

function drawChartPercentageToday(response){
    var data_label = [];
    var data_rate = [];
    var data_color = [];
    response.data.forEach(function (value, index) {
        data_label.push(value.channel_name);
        data_rate.push(value.rate);
        data_color.push(getColorChannel(value.channel_name));
    });
    var obj = [{
        label: "data",
        data: data_rate,
        borderColor: data_color,
        borderWidth: "0",
        backgroundColor: data_color
    }];

    // draw chart
    var ctx_percentage = document.getElementById("echartPercentageToday");
    ctx_percentage.height = 573;
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
                }]
            },
            legend: {
                display: false
            }
        }
    });
}