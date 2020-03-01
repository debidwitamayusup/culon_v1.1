var base_url = $('#base_url').val();

var d = new Date();
var o = d.getDate();
var n = d.getMonth()+1;
var m = d.getFullYear();
if (o < 10) {
  o = '0' + o;
} 
if (n < 10) {
  n = '0' + n;
}

//get yesterday
var v_params_today= m + '-' + n + '-' + (o-1);
const sessionParams = JSON.parse(sessionStorage.getItem('Auth-infomedia'));
$(document).ready(function () {
    getTenant('');
    $('#check-all-channel').prop('checked',false);
    $("input:checkbox.checklist-channel").prop('checked',false);
    var checkboxes = document.querySelectorAll('input[name="example-checkbox2"]:checked'), values = [], type = [];
    Array.prototype.forEach.call(checkboxes, function(el) {
        values.push(el.value);
        type.push($(el).data('type'));
    });
    // console.log(values);
    list_channel = values;

    if(sessionParams){
        $("#filter-loader").fadeIn("slow");
        // fromTemplate();
        if(sessionParams.TENANT_ID != null){
            callSumAllTenant('day', v_params_today, 0,  sessionParams.TENANT_ID);
            callSumPerTenant('day', v_params_today, 0,  sessionParams.TENANT_ID);
            callIntervalTraffic('day',v_params_today,0, list_channel,  sessionParams.TENANT_ID);
        }else{
            callSumAllTenant('day', v_params_today, 0,  '');
            callSumPerTenant('day', v_params_today, 0,  '');
            callIntervalTraffic('day',v_params_today,0,  list_channel, '');
        }
        
        $('#input-date-filter').datepicker("setDate", v_params_today);
        $("#btn-month").prop("class", "btn btn-light btn-sm");
        $("#btn-year").prop("class", "btn btn-light btn-sm");
        $("#btn-day").prop("class", "btn btn-red btn-sm");

        sessionStorage.removeItem('paramsSession');
        sessionStorage.setItem('paramsSession', 'day');

        $('#filter-date').show();
        $('#filter-month').hide();
        $('#filter-year').hide();
        $("#filter-loader").fadeOut("slow");
    }else{
        window.location = base_url
    }
});

function getTenant(date){
    $.ajax({
        type: 'POST',
        url: base_url + 'api/Wallboard/WallboardController/GetTennantFilter',
        data: {
            "date" : date
        },

        success: function (r) {
            var data_option = [];
            //dont parse response if using rest controller
            // var response = JSON.parse(r);
            var response = r;
            // console.log(response);
            // tenants = response.data;
            var html = '<option value="">All Tenant</option>';
            // var html = '';
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

//function get data and draw
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
    color['Whatsapp'] = '#089e60';
    color['ChatBot'] = '#6e273e';

    return color[channel];
}

//for dinamic dropdown year on month
function callYearOnMonth()
{
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
            var dateTahun = $("#select-year-on-month");
            var response = JSON.parse(r);

            // var html = '<option value="2020">2020</option>';
            var monthOption='';
            var html = '';
            var i;
                for(i=0; i<response.data.niceDate.length; i++){
                    html += '<option value='+response.data.niceDate[i]+'>'+response.data.niceDate[i]+'</option>';
                }
                $('#select-year-on-month').html(html);
            
            // monthOption = '<option value="01">January</option>'+
            //                     '<option value="02">February</option>'+
            //                     '<option value="03">March</option>'+
            //                     '<option value="04">April</option>'+
            //                     '<option value="05">May</option>'+
            //                     '<option value="06">June</option>'+
            //                     '<option value="07">July</option>'+
            //                     '<option value="08">August</option>'+
            //                     '<option value="09">September</option>'+
            //                     '<option value="10">October</option>'+
            //                     '<option value="11">November</option>'+
            //                     '<option value="12">December</option>';
            // $('#select-month').html(monthOption);
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

//for dinamic dropdown year on year
function callYear()
{
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
            var dateTahun = $("#select-year-only");
            var response = JSON.parse(r);

            // var html = '<option value="2020">2020</option>';
            var html = '';
            var i;
                for(i=0; i<response.data.niceDate.length; i++){
                    html += '<option value='+response.data.niceDate[i]+'>'+response.data.niceDate[i]+'</option>';
                }
                $('#select-year-only').html(html);
            
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

function callSumAllTenant(params, index, params_year, tenant_id){
    $.ajax({
        type: 'post',
        url: base_url+'api/Wallboard/WallboardController/TrafficOPSPieChart',
        data: {
            params: params,
            index: index,
            params_year: params_year,
            tenant_id: tenant_id
        },
        success: function (r) {
            // var response = JSON.parse(r);
            //hit url for interval 900000 (15 minutes)
            // setTimeout(function(){callSumAllTenant(date);},900000);
            drawPieChartSumAllTenant(r);
            // $("#filter-loader").fadeOut("slow");
        },
        error: function (r) {
            // console.log(r);
            alert("error");
            // $("#filter-loader").fadeOut("slow");
        },
    });
}

function callSumPerTenant(params, index, params_year, tenant_id){
    $.ajax({
        type: 'post',
        url: base_url+'api/Wallboard/WallboardController/TrafficOPS',
        data: {
            params: params,
            index: index,
            params_year: params_year,
            tenant_id: tenant_id
        },
        success: function (r) {
            // var response = JSON.parse(r);
            var response = r;
            // console.log(response);
            //hit url for interval 900000 (15 minutes)
            // setTimeout(function(){callSumPerTenant(date);},900000);
            drawChartPerTenant(response);
            // $("#filter-loader").fadeOut("slow");
        },
        error: function (r) {
            // console.log(r);
            alert("error");
            // $("#filter-loader").fadeOut("slow");
        },
    });
}

function callIntervalTraffic(params, index, params_year, channel, tenant_id){
    // console.log(+arr_channel);
    // $("#filter-loader").fadeIn("slow");
    $.ajax({
        type: 'post',
        url: base_url+'api/Wallboard/WallboardController/IntervalToday',
        data: {
            params: params,
            index: index,
            params_year: params_year,
            channel: channel,
            tenant_id: tenant_id
        },
        success: function (r) {
            var response = r;
            // var response = JSON.parse(r);
            // console.log(response);
            //hit url for interval 900000 (15 minutes)
            // setTimeout(function(){callIntervalTraffic(params, index, params_year, ["Facebook", "Whatsapp", "Twitter", "Email", "Telegram", "Line", "Voice", "Instagram", "Messenger", "Twitter DM", "Live Chat", "SMS"]);},900000);
            drawLineChart(response);
            // drawTableData(response);
            // $("#filter-loader").fadeOut("slow");
        },
        error: function (r) {
            // console.log(r);
            alert("error");
            // $("#filter-loader").fadeOut("slow");
        },
    });
}

function drawPieChartSumAllTenant(response){
    destroyPieChart();
    //pie chart Ticket Channel
    // $('#legend').remove();
    // $('#mylegend').append('<div id="legend" class="legend-con"></div>');

    var ctx = document.getElementById("pieWallSummaryTraffic");
    ctx.height = 250;
    var myChart = new Chart(ctx, {
        type: 'pie',
        data: {
            datasets: [{
                data: response.data.total,
                backgroundColor: response.data.color,
                hoverBackgroundColor: response.data.color
            }],
            labels: response.data.channel_name
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,

            legend: {
                display: false
            },
            tooltips: {
              callbacks: {
                    label: function(tooltipItem, data) {
                        var value = data.datasets[0].data[tooltipItem.index];
                        value = value.toString();
                        value = value.split(/(?=(?:...)*$)/);
                        value = value.join(',');
                        return data.labels[tooltipItem.index]+': '+ value;
                    }
              } // end callbacks:
            },
            pieceLabel: {
                render: 'legend',
                fontColor: '#000',
                position: 'outside',
                segment: true
            },
            legendCallback: function (chart, index) {
                var allData = chart.data.datasets[0].data;
                console.log(chart)
                var legendHtml = [];
                legendHtml.push('<ul><div id="mylegend" class="row ml-2">');
                allData.forEach(function (data, index) {
                    if (allData[index] != 0) {
                        var label = chart.data.labels[index];
                        var dataLabel = Number(allData[index]);
                        var background = chart.data.datasets[0].backgroundColor[index]
                        var total = 0;
                        for (var i in allData) {
                            total += parseInt(Number(allData[i]));
                        }

                        // console.log(Number(dataLabel))
                        // console.log(dataLabel+":")
                        // console.log(total);
                        if(dataLabel != 0){
                            var percentage = parseFloat((dataLabel / total)*100).toFixed(1);
                        }else{
                            var percentage = Math.round((dataLabel / total) * 100);
                        }
                        if(isNaN(percentage) == true){
                            percentage = 0;
                        }
                        legendHtml.push('<li class="col-md-4 col-lg-4 col-sm-6 col-xl-4">');
                        legendHtml.push('<span class="chart-legend"><div style="background-color :' + background + '" class="box-legend"></div>' + label + ':' + percentage + '%</span>');
                    }else{
                        var label = chart.data.labels[index];
                        var dataLabel = allData[index];
                        var background = chart.data.datasets[0].backgroundColor[index]
                        var total = 0;
                        for (var i in allData) {
                            total += parseInt(Number(allData[i]));
                        }

                        // console.log(dataLabel+"/")
                        // console.log(total);
                        
                        // var percentage = Math.round((dataLabel / total) * 100);
                        if(dataLabel != 0){
                        var percentage = parseFloat((dataLabel / total)*100).toFixed(1);
                        }else{
                            // var percentage = Math.round((dataLabel / total) * 100);
                            percentage = 0;
                        }
                        legendHtml.push('<li class="col-md-4 col-lg-4 col-sm-6 col-xl-4">');
                        legendHtml.push('<span class="chart-legend"><div style="background-color :' + background + '" class="box-legend"></div>' + label + ':' + '0' + '%</span>');
                    }
                })
                legendHtml.push('</ul></div>');
                return legendHtml.join("");
            },
            //untuk onclick pada chart javascript
            onClick: function(event, array) {
                let element = this.getElementAtEvent(event);
                if (element.length > 0) {
                var series= element[0]._model.datasetLabel;
                var label = element[0]._model.label;
                var value = this.data.datasets[element[0]._datasetIndex].data[element[0]._index];
                alert("Sessions of "+label+" is "+value);
                }
            },
        }
    });
    var myLegendContainer = document.getElementById("legend");
    myLegendContainer.innerHTML = myChart.generateLegend();
}

function drawChartPerTenant(response){
    destroyHorizontalChart();
    let arrTenant = [], dataWa = [], dataFB = [], dataDM = [], dataIg = [], dataMessenger = [], dataTelegram = [], dataLine = [], dataEmail = [], dataVoice = [], dataSMS = [], dataLive = [], dataTwitter = [], dataChatbot=[];

    response.data.forEach(function (value, index) {
            arrTenant.push(value.TENANT_ID);
            // arrART.push(value.ART);
            // arrAHT.push(value.AHT);
            // arrAST.push(value.AST);
            // arrSCR.push(value.SCR);
        });
    for (var i = 0; i < response.data.length; i++) {
        // console.log()
        dataWa.push(response.data[i].DATA[10]);
        dataFB.push(response.data[i].DATA[5]);
        dataDM.push(response.data[i].DATA[11]);
        dataTwitter.push(response.data[i].DATA[7]);
        dataIg.push(response.data[i].DATA[9]);
        dataMessenger.push(response.data[i].DATA[6]);
        dataTelegram.push(response.data[i].DATA[4]);
        dataLine.push(response.data[i].DATA[8]);
        dataEmail.push(response.data[i].DATA[1]);
        dataVoice.push(response.data[i].DATA[0]);
        dataSMS.push(response.data[i].DATA[3]);
        dataLive.push(response.data[i].DATA[2]);
        dataChatbot.push(response.data[i].DATA[12]);
    }
    /*----echart Wallboard Summary Traffic----*/
    var chartWallSummary = [{
         name: 'Whatsapp',
         type: 'bar',
         stack: 'Stack',
         data: dataWa
     }, {
         name: 'Facebook',
         type: 'bar',
         stack: 'Stack',
         data: dataFB
     },{
         name: 'Twitter',
         type: 'bar',
         stack: 'Stack',
         data: dataTwitter
     },{
         name: 'Twitter DM',
         type: 'bar',
         stack: 'Stack',
         data: dataDM
     },{
         name: 'Instagram',
         type: 'bar',
         stack: 'Stack',
         data: dataIg
     },{
         name: 'Messenger',
         type: 'bar',
         stack: 'Stack',
         data: dataMessenger
     },{
         name: 'Telegram',
         type: 'bar',
         stack: 'Stack',
         data: dataTelegram
     },{
         name: 'Line',
         type: 'bar',
         stack: 'Stack',
         data: dataLine
     },{
         name: 'Email',
         type: 'bar',
         stack: 'Stack',
         data: dataEmail
     },{
         name: 'Voice',
         type: 'bar',
         stack: 'Stack',
         data: dataVoice
     },{
         name: 'SMS',
         type: 'bar',
         stack: 'Stack',
         data: dataSMS
     },{
         name: 'Live Chat',
         type: 'bar',
         stack: 'Stack',
         data: dataLive
    },{
         name: 'Chat Bot',
         type: 'bar',
         stack: 'Stack',
         data: dataChatbot
    }];
    /*----echartTicketUnit----*/
    var optionWallSummary = {
        tooltip: {
            trigger: 'axis',
            axisPointer: {       
                // type: 'shadow'
                label: {
                    show: false,
                    formatter: function (value, index) {
                            var teks = '';
                            // console.log(value)
                            if(value.value == "oct_telkomcare"){
                                teks = teks + "TELKOMCARE";
                            }
                            else if(value.value == "oct_telkomsel")
                            {
                                teks = teks + "TELKOMSEL";
                            }
                            else if(value.value == "oct_bodyshop")
                            {
                                teks = teks + "BODYSHOP";
                            }
                            else{
                                return value.value
                            }
                            return teks;
                    }
                }
            },
            position: function (pos, params, dom, rect, size) {
                 // tooltip will be fixed on the right if mouse hovering on the left,
                 // and on the left if hovering on the right.
                 // console.log(pos);
                 var obj = {top: pos[6]};
                 obj[['left', 'right'][+(pos[0] < size.viewSize[0] / 2)]] = 5;
                 return obj;
             },
        },
        legend: {
            // bottom: 10,
            left: 'center',
            top: 'auto',
            data: ['Whatsapp', 'Facebook', 'Twitter', 'Twitter DM', 'Instagram', 'Messenger', 'Telegram', 'Line', 'Email', 'Voice', 'SMS', 'Live Chat', 'Chat Bot'],
            itemWidth :12,
            padding: [10, 10,40, 10]
            
        },
        grid: {
            top: '25%',
            right: '3%',
            bottom: '5%',
            left: '1%',
            containLabel: true,
            width: 'auto'
        },
        xAxis: {
            type: 'value',
            axisLine: {
                lineStyle: {
                    color: '#efefff'
                }
            },
            axisLabel: {
                fontSize: 10,
                color: '#7886a0'
            }
        },
        yAxis: {
            type: 'category',
            data: arrTenant,
            splitLine: {
                lineStyle: {
                    color: '#efefff'
                }
            },
            axisLine: {
                lineStyle: {
                    color: '#efefff'
                }
            },
            axisLabel: {
                fontSize: 10,
                color: '#7886a0',
                formatter: function (value, index) {
                            var teks = '';
                            if(value == "oct_telkomcare"){
                                teks = teks + "TELKOMCARE";
                            }
                            else if(value == "oct_telkomsel")
                            {
                                teks = teks + "TELKOMSEL";
                            }
                            else if(value == "oct_bodyshop")
                            {
                                teks = teks + "BODYSHOP";
                            }
                            else{
                                return value
                            }
                            return teks;
                    }
            }
        },
        series: chartWallSummary,
        color: ['#089e60', '#467fcf', '#45aaf2', '#6574cd', '#fbc0d5', '#3866a6', '#343a40', '#31a550', '#e41313', '#ff9933', '#80cbc4', '#607d8b', '#6e273e']
    };
    var chartWallSummary = document.getElementById('echartWallSummaryTraffic');
    var barChartWallSummary = echarts.init(chartWallSummary);
    barChartWallSummary.setOption(optionWallSummary);
}

function destroyChartInterval(){
    // destroy chart interval 
    $('#lineWallSummaryTraffic').remove(); // this is my <canvas> element
    // $('#chart-no-data').remove(); // this is my <canvas> element
    $('#lineWallSummaryTrafficDiv').append('<canvas id="lineWallSummaryTraffic"  class="h-400"></canvas>');
}

function destroyPieChart(){
    $('#pieWallSummaryTraffic').remove(); // this is my <canvas> element
    $('#canvas-pie').append('<canvas id="pieWallSummaryTraffic" class="donutShadow overflow-hidden"></canvas>');
}

function destroyHorizontalChart(){
    $('#echartWallSummaryTraffic').remove(); // this is my <canvas> element
    $('#echartWallSummaryTrafficDiv').append('<div id="echartWallSummaryTraffic" class="chartsh-traffic-ops overflow-hidden"></div>');
}

function drawLineChart(response){
    destroyChartInterval();
    var data = [];
    if(!response.data.series){
        $('#lineWallSummaryTraffic').remove(); // this is my <canvas> element
        $('#lineWallSummaryTrafficDiv').append('<canvas id="lineWallSummaryTraffic" class="h-400"></canvas>');
    }else{
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
        var ctx = document.getElementById( "lineWallSummaryTraffic" );
        var myChart = new Chart( ctx, {
            type: 'line',
            data: {
                labels: response.data.label_time,
                datasets: data
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                // legend:{
                //     position:'bottom',
                //     labels:{
                //         boxWidth:10
                //     }
                // },
                legend :{
                    display: false
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
}

function setDatePicker(){
    $(".datepicker").datepicker({
        format: "yyyy-mm-dd",
        todayHighlight: true,
        autoclose: true
    }).attr("readonly", "readonly").css({"cursor":"pointer", "background":"white"});
}

// jquery
(function ($) {
    // change date picker
    var dates = new Date();
    dates.setDate(dates.getDate()>0);
    $('#input-date-filter').datepicker({
        dateFormat: 'yy-mm-dd',
        maxDate: 'now',
        showTodayButton: true,
        showClear: true,
        // minDate: date,
        onSelect: function(dateText) {
            // console.log(this.value);
            v_date = this.value;

            if(sessionParams.TENANT_ID != null){
                callSumAllTenant('day', v_date, 0,  sessionParams.TENANT_ID);
                callSumPerTenant('day', v_date, 0,  sessionParams.TENANT_ID);
                callIntervalTraffic('day',v_date,0, '',  sessionParams.TENANT_ID);
            }else{
                callSumAllTenant('day', v_date, 0,  '');
                callSumPerTenant('day', v_date, 0,  '');
                callIntervalTraffic('day',v_date,0,  '', '');
            }

            $('#check-all-channel').prop('checked',false);
            $("input:checkbox.checklist-channel").prop('checked',false);
        }
    });

    $('#layanan_name').change(function(){
        let fromParams = sessionStorage.getItem('paramsSession');
        if(fromParams == 'day'){
            callSumAllTenant('day',  $('#input-date-filter').val(), 0, $('#layanan_name').val());
            callSumPerTenant('day', $('#input-date-filter').val(), 0,  $('#layanan_name').val());
            callIntervalTraffic('day',$('#input-date-filter').val(),0,'',  $('#layanan_name').val());
        }else if(fromParams == 'month'){
            callSumAllTenant('month',$("#select-month").val(), $("#select-year-on-month").val(), $('#layanan_name').val());
            callSumPerTenant('month',$("#select-month").val(), $("#select-year-on-month").val(), $('#layanan_name').val());
            callIntervalTraffic('month',$("#select-month").val(), $("#select-year-on-month").val(), '',$('#layanan_name').val());
        }else if(fromParams == 'year'){
            callSumAllTenant('year',  $('#select-year-only').val(), 0, $('#layanan_name').val());
            callSumPerTenant('year', $('#select-year-only').val(), 0,  $('#layanan_name').val());
            callIntervalTraffic('year',$('#select-year-only').val(),0,'',  $('#layanan_name').val());
        }
    });

    // btn day
    $('#btn-day').click(function () {
        sessionStorage.removeItem('paramsSession');
        sessionStorage.setItem('paramsSession', 'day');
        params_time = 'day';
        v_date = '2019-12-01';
        $('#input-date-filter').datepicker("setDate", v_params_today);

        $("#btn-month").prop("class", "btn btn-light btn-sm");
        $("#btn-year").prop("class", "btn btn-light btn-sm");
        $(this).prop("class", "btn btn-red btn-sm");

        $('#check-all-channel').prop('checked',false);
        $("input:checkbox.checklist-channel").prop('checked',false);
        var checkboxes = document.querySelectorAll('input[name="example-checkbox2"]:checked'), values = [], type = [];
        Array.prototype.forEach.call(checkboxes, function(el) {
            values.push(el.value);
            type.push($(el).data('type'));
        });
        // console.log(values);
        list_channel = values;

        sessionStorage.removeItem('paramsSession');
        sessionStorage.setItem('paramsSession', 'day');

        sessionStorage.removeItem('monthSession');
        // sessionStorage.setItem('monthSession', n);

        sessionStorage.removeItem('yearSession');
        // sessionStorage.setItem('yearSession', m);

        if(sessionParams.TENANT_ID != null){
            callSumAllTenant('day', v_params_today, 0,  sessionParams.TENANT_ID);
            callSumPerTenant('day', v_params_today, 0,  sessionParams.TENANT_ID);
            callIntervalTraffic('day',v_params_today,0, list_channel,  sessionParams.TENANT_ID);
        }else{
            callSumAllTenant('day', v_params_today, 0,  '');
            callSumPerTenant('day', v_params_today, 0,  '');
            callIntervalTraffic('day',v_params_today,0,  list_channel, '');
        }

        $('#filter-date').show();
        $('#filter-month').hide();
        $('#filter-year').hide();
    });

    // btn month
    $('#btn-month').click(function () {
        var d = new Date();
        var o = d.getDate();
        var n = d.getMonth()+1;
        var m = d.getFullYear();
        params_time = 'month';

        $('#check-all-channel').prop('checked',false);
        $("input:checkbox.checklist-channel").prop('checked',false);
        var checkboxes = document.querySelectorAll('input[name="example-checkbox2"]:checked'), values = [], type = [];
        Array.prototype.forEach.call(checkboxes, function(el) {
            values.push(el.value);
            type.push($(el).data('type'));
        });
        // console.log(values);
        list_channel = values;

        callYearOnMonth();

        if(sessionParams.TENANT_ID != null){
            callSumAllTenant('month', n, m,  sessionParams.TENANT_ID);
            callSumPerTenant('month', n, m,  sessionParams.TENANT_ID);
            callIntervalTraffic('month',n,m, list_channel,  sessionParams.TENANT_ID);
        }else{
            callSumAllTenant('month', n, m,  '');
            callSumPerTenant('month', n, m,  '');
            callIntervalTraffic('month',n,m,  list_channel, '');
        }


        sessionStorage.removeItem('paramsSession');
        sessionStorage.setItem('paramsSession', 'month');
        $('#select-month option[value='+n+']').attr('selected','selected');
        $('#select-year-on-month option[value='+m+']').attr('selected','selected');
        $("#btn-day").prop("class", "btn btn-light btn-sm");
        $("#btn-year").prop("class", "btn btn-light btn-sm");
        $(this).prop("class", "btn btn-red btn-sm");

        sessionStorage.removeItem('monthSession');
        sessionStorage.setItem('monthSession', n);

        sessionStorage.removeItem('yearSession');
        sessionStorage.setItem('yearSession', m);

        $('#filter-date').hide();
        $('#filter-month').show();
        $('#filter-year').hide();
    });

    // btn year
    $('#btn-year').click(function () {
        params_time = 'year';
        callYear();

        sessionStorage.removeItem('paramsSession');
        sessionStorage.setItem('paramsSession', 'year');
        $('#check-all-channel').prop('checked',false);
        $("input:checkbox.checklist-channel").prop('checked',false);
        var checkboxes = document.querySelectorAll('input[name="example-checkbox2"]:checked'), values = [], type = [];
        Array.prototype.forEach.call(checkboxes, function(el) {
            values.push(el.value);
            type.push($(el).data('type'));
        });
        // console.log(values);
        list_channel = values;

        if(sessionParams.TENANT_ID != null){
            callSumAllTenant('year',m,0, sessionParams.TENANT_ID);
            callSumPerTenant('year',m,0, sessionParams.TENANT_ID);
            callIntervalTraffic('year',m,0, list_channel,sessionParams.TENANT_ID);
        }else{
            callSumAllTenant('year',m,0, '');
            callSumPerTenant('year',m,0, '');
            callIntervalTraffic('year',m,0, list_channel,'');
        }

        sessionStorage.removeItem('monthSession');

        sessionStorage.removeItem('yearSession');
        sessionStorage.setItem('yearSession', m);

        $("#btn-day").prop("class", "btn btn-light btn-sm");
        $("#btn-month").prop("class", "btn btn-light btn-sm");
        $(this).prop("class", "btn btn-red btn-sm");

        $('#filter-date').hide();
        $('#filter-month').hide();
        $('#filter-year').show();
    });


    $('#select-year-only').change(function () {
        v_year = $(this).val();       
        if(sessionParams.TENANT_ID != null){
            callSumAllTenant('year',v_year,0, sessionParams.TENANT_ID);
            callSumPerTenant('year',v_year,0, sessionParams.TENANT_ID);
            callIntervalTraffic('year',v_year,0, '',sessionParams.TENANT_ID);
        }else{
            callSumAllTenant('year',v_year,0, '');
            callSumPerTenant('year',v_year,0, '');
            callIntervalTraffic('year',v_year,0, '','');
        }

        $('#check-all-channel').prop('checked',false);
        $("input:checkbox.checklist-channel").prop('checked',false);
        $('#filter-date').hide();
        $('#filter-month').hide();
        $('#filter-year').show();
    });

    $('#btn-go').click(function(){
        if(sessionParams.TENANT_ID != null){
            callSumAllTenant('month',$("#select-month").val(), $("#select-year-on-month").val(), sessionParams.TENANT_ID);
            callSumPerTenant('month',$("#select-month").val(), $("#select-year-on-month").val(), sessionParams.TENANT_ID);
            callIntervalTraffic('month',$("#select-month").val(), $("#select-year-on-month").val(), '',sessionParams.TENANT_ID);
        }else{
            callSumAllTenant('month',$("#select-month").val(), $("#select-year-on-month").val(), '');
            callSumPerTenant('month',$("#select-month").val(), $("#select-year-on-month").val(), '');
            callIntervalTraffic('month',$("#select-month").val(), $("#select-year-on-month").val(), '','');
        }

        sessionStorage.removeItem('monthSession');
        sessionStorage.setItem('monthSession', $("#select-month").val());

        sessionStorage.removeItem('yearSession');
        sessionStorage.setItem('yearSession', $("#select-year-on-month").val());

        $('#check-all-channel').prop('checked',false);
        $("input:checkbox.checklist-channel").prop('checked',false);
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
        let fromParams = sessionStorage.getItem('paramsSession');
        // console.log(fromParams);
        // call data
        if (fromParams == 'day') {
            if(sessionParams.TENANT_ID != null){
                callIntervalTraffic(fromParams,$("#input-date-filter").val(),0, list_channel,sessionParams.TENANT_ID);
            }else{
                callIntervalTraffic(fromParams,$("#input-date-filter").val(),0, list_channel,'');
            }
        }else if (fromParams == 'month') {
            let monthFromParams = sessionStorage.getItem('monthSession');
            let yearFromParams = sessionStorage.getItem('yearSession');
            // console.log('ini month params:'+monthFromParams);
            // console.log('ini year params:'+yearFromParams);
            if(sessionParams.TENANT_ID != null){
                callIntervalTraffic(fromParams,monthFromParams, yearFromParams, list_channel,sessionParams.TENANT_ID);
            }else{
                callIntervalTraffic(fromParams,monthFromParams, yearFromParams, list_channel,'');
            }
        }else if (fromParams == 'year') {
            callIntervalTraffic(fromParams, $("#select-year-only").val(),0,list_channel, $('#layanan_name').val());
            // console.log($("#select-year-only").val());  
        }
    });

    //checked channel
    $('.checklist-channel').click(function(){
        $('#check-all-channel').prop( "checked", false );
        
        var checkedValues = $('input:checkbox:checked').map(function() {
            return this.value;
        }).get();

        var checkboxes = document.querySelectorAll('input[name="example-checkbox2"]:checked'), values = [], type = [];
        Array.prototype.forEach.call(checkboxes, function(el) {
            values.push(el.value);
            type.push($(el).data('type'));
        });
        // console.log(values);
        list_channel = values;
        // call data
        let fromParams = sessionStorage.getItem('paramsSession');
        // console.log(fromParams);
        if (fromParams == 'day') {
            callIntervalTraffic(fromParams, $("#input-date-filter").val(),0,list_channel,  $('#layanan_name').val());
        }else if (fromParams == 'month') {
            let monthFromParams = sessionStorage.getItem('monthSession');
            let yearFromParams = sessionStorage.getItem('yearSession');
            // console.log('ini month params:'+monthFromParams);
            // console.log('ini year params:'+yearFromParams);
            callIntervalTraffic(fromParams, monthFromParams, yearFromParams,list_channel,  $('#layanan_name').val());
        }else if (fromParams == 'year') {
            callIntervalTraffic(fromParams, $("#select-year-only").val(),0,list_channel,  $('#layanan_name').val());
        }
    });


    // Horizontal Bar Dashboard Summary Traffic yang baru 
	// Return with commas in between
	var numberWithCommas = function (x) {
		return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
	};
})(jQuery);