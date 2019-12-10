var base_url = $('#base_url').val();
var v_date = '';
var list_channel= [];

$(document).ready(function () {
    v_date = getToday();
    // var data_chart = callIntervalTraffic('2019-05-22', []);
    // var data_table_avg = callDataTableAvg('2019-11-02');
    // var data_percentage = callDataPercentage('2019-05-22');
    var data_chart = callIntervalTraffic(v_date, []);
    var data_table_avg = callDataTableAvg(v_date);
    var data_percentage = callDataPercentage(v_date);
    
});

//function get data and draw
function getColorChannel(channel){
    var color = [];
    color['Email'] = '#e41313';
    color['Facebook'] = '#467fcf';
    color['Instagram'] = '#fbc0d5';
    color['Line'] = '#31a550';
    color['Live Chat'] = '#607d8b';
    color['Facebook Messenger'] = '#3866a6';
    color['SMS'] = '#80cbc4';
    color['Telegram'] = '#343a40';
    color['Twitter'] = '#45aaf2';
    color['Twitter DM'] = '#6574cd';
    color['Voice'] = '#ff9933';
    color['Whatsapp'] = '#089e60';

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
    destroyChartInterval();
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

    // draw chart
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
            console.log(response);
            drawTableToday(response);
        },
        error: function (r) {
            console.log(r);
            alert("error");
        },
    });
}

function drawTableToday(response){
    $("#mytbody").empty();
    if(response.data.length != 0){
        response.data.forEach(function (value, index) {
            $('#table-avg-interval').find('tbody').append('<tr>'+
            '<td>'+(index+1)+'</td>'+
            '<td>'+value.channel_name+'</td>'+
            '<td>'+value.sla+'%</td>'+
            '<td>'+value.art+'</td>'+
            '<td>'+value.aht+'</td>'+
            '<td>'+value.ast+'</td>'+
            '</tr>');
        });
    }else{
        $('#table-avg-interval').find('tbody').append('<tr>'+
            '<td colspan=6> No Data </td>'+
            '</tr>');
    }
    
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
    destroyChartPercentage();
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

// function destroy element canvas
function destroyChartInterval(){
    // destroy chart interval 
    $('#customerChartToday').remove(); // this is my <canvas> element
    $('#chart-interval').append('<canvas id="customerChartToday"  class="h-400"><canvas>');
}

function destroyChartPercentage(){
    //destroy chart percentage
    $('#echartPercentageToday').remove(); // this is my <canvas> element
    $('#chart-percentage').append('<canvas id="echartPercentageToday"><canvas>');
}

//jquery
(function ($) {
    // change date picker
    $('#input-date').datepicker({
        dateFormat: 'yy-mm-dd',
        onSelect: function(dateText) {
            // console.log(this.value);
            v_date = this.value;
            
            //re draw
            callIntervalTraffic(this.value, []);
            callDataTableAvg(this.value);
            callDataPercentage(this.value);
        }
    });

    // checked all channel
    $('#check-all-channel').click(function(){
        $("input:checkbox.checklist-channel").prop('checked',this.checked);
        var checkboxes = document.querySelectorAll('input[name="example-checkbox2"]:checked'), values = [], type = [];
        Array.prototype.forEach.call(checkboxes, function(el) {
            values.push(el.value);
            type.push($(el).data('type'));
        });
        // console.log(values);
        list_channel = values;

        // call data
        callIntervalTraffic(v_date, list_channel);
    });

    //checked channel
    $('.checklist-channel').click(function(){
        $('#check-all-channel').prop( "checked", false );
        var checkboxes = document.querySelectorAll('input[name="example-checkbox2"]:checked'), values = [], type = [];
        Array.prototype.forEach.call(checkboxes, function(el) {
            values.push(el.value);
            type.push($(el).data('type'));
        });
        // console.log(values);
        list_channel = values;
        // call data
        callIntervalTraffic(v_date, list_channel);
    });
    
})(jQuery);