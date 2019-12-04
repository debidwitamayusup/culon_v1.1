var base_url = $('#base_url').val();
$(document).ready(function () {
    
    // console.log(getToday());
    var data_chart = callIntervalTraffic('2019-05-22', []);
    var data_table_avg = callDataTableAvg('2019-11-02');

    //
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
