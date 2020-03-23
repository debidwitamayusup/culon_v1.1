var base_url = $('#base_url').val();

Date.prototype.getWeek = function () {
    var date = new Date(this.getTime());
    date.setHours(0, 0, 0, 0);
    // Thursday in current week decides the year.
    date.setDate(date.getDate() + 3 - (date.getDay() + 6) % 7);
    // January 4 is always in week 1.
    var week1 = new Date(date.getFullYear(), 0, 4);
    // Adjust to Thursday in week 1 and count number of weeks from date to week1.
    return 1 + Math.round(((date.getTime() - week1.getTime()) / 86400000 -
        3 + (week1.getDay() + 6) % 7) / 7);
}

var d = new Date();
var params_week = d.getWeek() - 1;
// console.log(params_week);
const sessionParams = JSON.parse(localStorage.getItem('Auth-infomedia'));
const tokenSession = JSON.parse(localStorage.getItem('Auth-token'));
$(document).ready(function () {
    if(sessionParams){
        // $("#filter-loader").fadeIn("slow");
        if(sessionParams.TENANT_ID[0].TENANT_ID != ''){
            getTenant(tokenSession, '', sessionParams.USERID);
        }else{
            getTenant(tokenSession, '', '');
        }
        getSummTrafficByChannel(tokenSession, params_week,["Email", "Live Chat", "SMS", "Telegram", "Facebook", "Messenger", "Twitter", "Line", "Instagram", "Whatsapp", "Twitter DM", "ChatBot"], $("#layanan_name").val());
        getTrafficInterval(tokenSession, params_week,["Email", "Live Chat", "SMS", "Telegram", "Facebook", "Messenger", "Twitter", "Line", "Instagram", "Whatsapp", "Twitter DM", "ChatBot"], $("#layanan_name").val());
        drawChartDaily(tokenSession, params_week,["Email", "Live Chat", "SMS", "Telegram", "Facebook", "Messenger", "Twitter", "Line", "Instagram", "Whatsapp", "Twitter DM", "ChatBot"], $("#layanan_name").val());
        

        // $('#check-all-channel').prop('checked', false);
        // $("input:checkbox.checklist-channel").prop('checked', false);
        // var checkboxes = document.querySelectorAll('input[name="example-checkbox2"]:checked'),
        //     values = [],
        //     type = [];
        // Array.prototype.forEach.call(checkboxes, function (el) {
        //     values.push(el.value);
        //     type.push($(el).data('type'));
        // });
        // // console.log(values);
        // list_channel = values;
    }else{
        window.location = base_url
    }
});

function getTenant(token, date, userid){
    $.ajax({
        beforeSend: function (xhr) {
            xhr.setRequestHeader("token", token);
        },
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

function getColorChannel(channel) {
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
    color['Whatsapp'] = '#089e60';
    color['ChatBot'] = '#6e273e';

    return color[channel];
}

function getSummTrafficByChannel(token, week, arr_channel, tenant_id){
    $.ajax({
        beforeSend: function (xhr) {
            xhr.setRequestHeader("token", token);
        },
        type: 'post',
        url: base_url + 'api/SummaryTraffic/SummaryToday/getIntervalTrafficWeeklyBar',
        data: {
            week: week,
            arr_channel: arr_channel,
            tenant_id
        },
        success: function (r) {
            $('#modalError').modal('hide');
            var response = JSON.parse(r);
            if(response.status != false){
                setTimeout(function(){getSummTrafficByChannel(token, week, arr_channel, $("#layanan_name").val());},5000);
                drawSummTrafficByChannel(response);
            }else{
                var notif = alert('Your Account Credential is Invalid. Maybe someone else has logon to your account.')
                if(notif){
                    localStorage.clear();
                    window.location = base_url+'main/login';
                }else{
                    localStorage.clear();
                    window.location = base_url+'main/login';
                }
            }
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
            // console.log(r);
            setTimeout(function(){getSummTrafficByChannel(token, week, arr_channel, $("#layanan_name").val());},5000)
        },
    });
}

function drawSummTrafficByChannel(response){
    // console.log(response);
    $('#barWallTrafficWeek').remove(); // this is my <canvas> element
    $('#barWallTrafficWeekDiv').append('<canvas id="barWallTrafficWeek"></canvas>');

    var data_label = [];
    var data_rate = [];
    var data_color = [];
    response.data.forEach(function (value, index) {
        data_label.push(value.channel_name);
        data_rate.push(value.total);
        data_color.push(getColorChannel(value.channel_name));
    });

    var obj = [{
        label: "data",
        data: data_rate,
        borderColor: data_color,
        borderWidth: "0",
        backgroundColor: data_color
    }];
    // console.log(data_rate);

    // draw chart
    var ctx_percentage = document.getElementById("barWallTrafficWeek");
    ctx_percentage.height = 501;
    var percentageChart = new Chart(ctx_percentage, {
        type: 'horizontalBar',
        data: {
            labels: data_label,
            datasets: obj,
        },
        options: {
            animation: false,
            layout: {
                padding: {
                    left: 0,
                    right: 0,
                    top: 10,
                    bottom: 5
                }
            },
            responsive: true,
            maintainAspectRatio: false,
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    },
                    axisLabel: {
                        fontSize: 10,
                        color: '#7886a0',
                    }
                }],
                xAxes: [{
                    ticks: {
                        fontSize:10,
                        min: 0, // Edit the value according to what you need
                        callback: function (value, index, values) {
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
                intersect: false,
                callbacks: {
                    label: function (tooltipItem, data) {
                        var value = data_rate[tooltipItem.index];
                        value = addCommas(value);
                        return value;
                    }
                }
            },
        }
    });
}

function getTrafficInterval(token, week,arr_channel, tenant_id){
    $.ajax({
        beforeSend: function (xhr) {
            xhr.setRequestHeader("token", token);
        },
        type: 'post',
        url: base_url + 'api/SummaryTraffic/SummaryToday/getIntervalTrafficWeekly',
        data: {
            week: week,
            arr_channel: arr_channel,
            tenant_id: tenant_id
        },
        success: function (r) {
            var response = JSON.parse(r);
            // console.log(response);
            $('#modalError').modal('hide');
            setTimeout(function(){getTrafficInterval(token, week, arr_channel, $("#layanan_name").val());},5000);
            drawTrafficInterval(response);
            // drawTableTraffic(response);
            // $("#filter-loader").fadeOut("slow");
        },
        error: function (r) {
            // console.log(r);
            $('#modalError').modal('show');
            setTimeout(function(){getTrafficInterval(token, week, arr_channel, $("#layanan_name").val());},5000);
            // $("#filter-loader").fadeOut("slow");
        },
    });
}

function drawTrafficInterval(response) {
    // destroy chart interval 
    $('#lineWallsumTrafficWeek').remove(); // this is my <canvas> element
    $('#lineWallsumTrafficWeekDiv').append('<canvas id="lineWallsumTrafficWeek"  class="h-500"></canvas>');
    var data = [];
    if (!response.data.series) {
        $('#lineWallsumTrafficWeek').remove(); // this is my <canvas> element
        $('#lineWallsumTrafficWeekDiv').append('<canvas id="lineWallsumTrafficWeek" class="h-500"></canvas>');
    } else {
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
        var ctx = document.getElementById("lineWallsumTrafficWeek");
        var myChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: response.data.label_time,
                datasets: data
            },
            options: {
                animation: false,
                responsive: true,
                layout: {
                    padding: {
                        left: 5,
                        right: 5,
                        top: 18,
                        bottom:10
                    }
                },
                tooltips: {
                    callbacks: {
                        label: function (tooltipItem, data) {
                            return data.datasets[tooltipItem.datasetIndex].label + ": " + addCommas(Math.round(tooltipItem.yLabel));
                        }
                    }
                },
                maintainAspectRatio: false,
                legend:{
                    display: true,
                    position:'bottom',
                    labels:{
                        boxWidth:10
                    }
                },
                barRoundness: 1,
                scales: {
                    xAxes:[{
                        ticks:{
                            fontSize:10
                        }
                    }],
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        });
    }
}

function getTableChart(token, week,arr_channel, tenant_id){
    $.ajax({
        beforeSend: function (xhr) {
            xhr.setRequestHeader("token", token);
        },
        type: 'post',
        url: base_url + 'api/SummaryTraffic/SummaryToday/getIntervalTrafficWeeklyBarAvg',
        data: {
            week: week,
            arr_channel: arr_channel,
            tenant_id: tenant_id
        },
        success: function (r) {
            var response = JSON.parse(r);
            // console.log(response);
            $('#modalError').modal('hide');
            setTimeout(function(){getTableChart(week, arr_channel, tenant_id);},5000);
            drawTableTraffic(response);
            // drawChartDaily(response);
            // $("#filter-loader").fadeOut("slow");
        },
        error: function (r) {
            // console.log(r);
            $('#modalError').modal('show');
            setTimeout(function(){getTableChart(week, arr_channel, tenant_id);},5000);
            // $("#filter-loader").fadeOut("slow");
        },
    });
}

function drawTableTraffic(response) {
    var mon = response.data[0].DATA.map(Number).reduce(summarize);
    var tue = response.data[1].DATA.map(Number).reduce(summarize);;
    var wed = response.data[2].DATA.map(Number).reduce(summarize);;
    var thu = response.data[3].DATA.map(Number).reduce(summarize);;
    var fri = response.data[4].DATA.map(Number).reduce(summarize);;
    var sat = response.data[5].DATA.map(Number).reduce(summarize);;
    var sun = response.data[6].DATA.map(Number).reduce(summarize);;

    function summarize(total, num) {
        return total + num;
    }

    // console.log(response.data[0].data);
    $('#mytbody').empty();
    if (response.data.length != 0) {
        for (var i = 0; i < 12; i++) {
            // console.log(response.channel[i]);
            $('#mytable').find('tbody').append('<tr>' +
                '<td class="text-center">' + (i + 1) + '</td>' +
                '<td class="text-left">' + response.channel[i] + '</td>' +
                '<td class="text-right">' + addCommas(response.data[0].DATA[i]) + '</td>' +
                '<td class="text-right">' + addCommas(response.data[1].DATA[i]) + '</td>' +
                '<td class="text-right">' + addCommas(response.data[2].DATA[i]) + '</td>' +
                '<td class="text-right">' + addCommas(response.data[3].DATA[i]) + '</td>' +
                '<td class="text-right">' + addCommas(response.data[4].DATA[i]) + '</td>' +
                '<td class="text-right">' + addCommas(response.data[5].DATA[i]) + '</td>' +
                '<td class="text-right">' + addCommas(response.data[6].DATA[i]) + '</td>' +
                '</tr>');
        };
        $('#mytable').find('tbody').append('<tr class="bg-total font-weight-extrabold">' +
            '<td colspan="2" class="text-center">TOTAL</td>' +
            '<td class="text-right">' + addCommas(mon) + '</td>' +
            '<td class="text-right">' + addCommas(tue) + '</td>' +
            '<td class="text-right">' + addCommas(wed) + '</td>' +
            '<td class="text-right">' + addCommas(thu) + '</td>' +
            '<td class="text-right">' + addCommas(fri) + '</td>' +
            '<td class="text-right">' + addCommas(sat) + '</td>' +
            '<td class="text-right">' + addCommas(sun) + '</td>' +
            '</tr>');
    } else {
        $('#mytable').find('tbody').append('<tr>' +
            '<td colspan=6> No Data </td>' +
            '</tr>');
    }

    // $("#filter-loader").fadeOut("slow");
}

function drawChartDaily(token, week,arr_channel, tenant_id){
    // Horizontal Bar
    var base_url = $('#base_url').val();

    $.ajax({
        beforeSend: function (xhr) {
            xhr.setRequestHeader("token", token);
        },
        type: 'post',
        url: base_url + 'api/SummaryTraffic/SummaryToday/getIntervalTrafficWeeklyBarAvg',
        data: {
            week: week,
            arr_channel: arr_channel,
            tenant_id: tenant_id
        },
        success: function (r) {
            var response = JSON.parse(r);
            $('#modalError').modal('hide');
            setTimeout(function(){drawChartDaily(token, week, arr_channel, $("#layanan_name").val());},5000);
            
            drawTableTraffic(response);
            // $('#echartWeek').remove();
            // $('#echartWeekDiv').append('<div id="echartWeek" class="chartsh-wall overflow-hidden"></div>');
            $('#BarWallSummaryWeek').remove();
            $('#BarWallSummaryWeekDiv').append('<canvas id="BarWallSummaryWeek" width="600" height="391"></canvas>');
            let dataWa = [],
                dataFB = [],
                dataDM = [],
                dataIg = [],
                dataMessenger = [],
                dataTelegram = [],
                dataLine = [],
                dataEmail = [],
                dataVoice = [],
                dataSMS = [],
                dataLive = [],
                dataTwitter = [],
                dataChatBot = [];
            for (var i = 0; i < response.data.length; i++) {
                // console.log()
                // dataVoice.push(response.data[i].DATA[0]);
                dataEmail.push(response.data[i].DATA[0]);
                dataLive.push(response.data[i].DATA[1]);
                dataSMS.push(response.data[i].DATA[2]);
                dataTelegram.push(response.data[i].DATA[3]);
                dataFB.push(response.data[i].DATA[4]);
                dataMessenger.push(response.data[i].DATA[5]);
                dataTwitter.push(response.data[i].DATA[6]);
                dataLine.push(response.data[i].DATA[7]);
                dataIg.push(response.data[i].DATA[8]);
                dataWa.push(response.data[i].DATA[9]);
                dataDM.push(response.data[i].DATA[10]);
                dataChatBot.push(response.data[i].DATA[11]);
            }

            var numberWithCommas = function (y) {
                return y.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
            };

            var arrChannel = []
            var dataStacked = [];
            var datasetsStacked = "";
            arrChannel.push(dataEmail, dataLive, dataSMS, dataTelegram, dataFB, dataMessenger, dataTwitter,
                dataLine, dataIg, dataWa, dataDM, dataChatBot);
            // console.log(numberWithCommas(arrChannel));
            var x = 0;
            
            response.channel.forEach(function (value){
                datasetsStacked = {
                    label: response.channel[x],
                    data: arrChannel[x],
                    backgroundColor: response.channel_color[x],
                    hoverBackgroundColor: response.channel_color[x],
                    hoverBorderWidth: 0
                },
                dataStacked.push(datasetsStacked);
                x++;
            });

            var bar_ctx = document.getElementById('BarWallSummaryWeek');

    var bar_chart = new Chart(bar_ctx, {
        type: 'bar',
        // type: 'horizontalBar',
        data: {
            labels: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'],
            datasets: dataStacked
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
                    ticks:{
                        fontSize:10
                    }
                }],
                yAxes: [{
                    stacked: true,
                    gridLines: {
                        display: true
                    },
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
        },
        error: function (r) {
            $('#modalError').modal('show');
            setTimeout(function(){drawChartDaily(token, week, arr_channel, $("#layanan_name").val());},5000);
            // $("#filter-loader").fadeOut("slow");
        }
    });
}

(function ($) {

    // checked all channel
    $('#check-all-channel').click(function () {
        $("input:checkbox.checklist-channel").prop('checked', this.checked);
        var checkboxes = document.querySelectorAll('input[name="example-checkbox2"]:checked'),
            values = [],
            type = [];
        Array.prototype.forEach.call(checkboxes, function (el) {
            values.push(el.value);
            type.push($(el).data('type'));
        });
        // console.log(values);
        list_channel = values;

        // call data
        getTrafficInterval(tokenSession, params_week, list_channel);
    });

    //checked channel
    $('.checklist-channel').click(function () {
        $('#check-all-channel').prop("checked", false);

        var checkedValues = $('input:checkbox:checked').map(function () {
            return this.value;
        }).get();

        var checkboxes = document.querySelectorAll('input[name="example-checkbox2"]:checked'),
            values = [],
            type = [];
        Array.prototype.forEach.call(checkboxes, function (el) {
            values.push(el.value);
            type.push($(el).data('type'));
        });
        // console.log(values);
        list_channel = values;
        // call data
        getTrafficInterval(tokenSession, params_week, list_channel);
    });

    // Vertical Bar Wallboard Summary Traffic Week yang baru 
    // Return with commas in between
    var numberWithCommas = function (x) {
        return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
    };

    $("select#layanan_name").change(function(){
        var selectedTenant = $(this).children("option:selected").val();
        getSummTrafficByChannel(tokenSession, params_week,["Email", "Live Chat", "SMS", "Telegram", "Facebook", "Messenger", "Twitter", "Line", "Instagram", "Whatsapp", "Twitter DM", "ChatBot"], $("#layanan_name").val());
        getTrafficInterval(tokenSession, params_week,["Email", "Live Chat", "SMS", "Telegram", "Facebook", "Messenger", "Twitter", "Line", "Instagram", "Whatsapp", "Twitter DM", "ChatBot"], $("#layanan_name").val());
        drawChartDaily(tokenSession, params_week,["Email", "Live Chat", "SMS", "Telegram", "Facebook", "Messenger", "Twitter", "Line", "Instagram", "Whatsapp", "Twitter DM", "ChatBot"], $("#layanan_name").val());
    });

})(jQuery);