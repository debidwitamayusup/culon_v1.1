var base_url = $('#base_url').val();
var arr_tenant = [];
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
const sessionParams = JSON.parse(localStorage.getItem('Auth-infomedia'));
if(sessionParams.TENANT_ID[0].TENANT_ID != ''){
    for(var i=0; i < sessionParams.TENANT_ID.length; i++){
        arr_tenant.push(sessionParams.TENANT_ID[i].TENANT_ID);
    }
}else{
    arr_tenant = [];
}
$(document).ready(function () {
    if(sessionParams){
        $("#filter-loader").fadeIn("slow");
        // if(sessionParams.TENANT_ID[0].TENANT_ID != ''){
        //     getTenant('', sessionParams.USERID);
        // }else{
        //     getTenant('', '');
        // }
        callSumAllTenant('day', v_params_today, 0,  arr_tenant);
        callSumPerGroupTelkom('day', v_params_today, 0, arr_tenant, 'TELKOM');
        callSumPerGroupGovernment('day', v_params_today, 0, arr_tenant, 'GOVERNMENT');
        callSumPerGroupBfsi('day', v_params_today, 0, arr_tenant, 'BFSI');
        callSumPerGroupEnterprise('day', v_params_today, 0, arr_tenant, 'ENTERPRISE');
        callTop5('day', v_params_today,0, arr_tenant);
        
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

function addCommas(commas)
{
    commas += '';
    x = commas.split(',');
    x1 = x[0];
    x2 = x.length > 1 ? ',' + x[1] : '';
    var rgx = /(\d+)(\d{3})/;
    while (rgx.test(x1)) {
        x1 = x1.replace(rgx, '$1' + ',' + '$2');
    }
    return x1 + x2;
}

function addCommas2(commas)
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

function callSumPerGroupTelkom(params, index, params_year, tenant_id, grup){
    $.ajax({
        type: 'post',
        url: base_url+'api/Wallboard/WallboardController/TrafficOPS',
        data: {
            params: params,
            index: index,
            params_year: params_year,
            tenant_id: tenant_id,
            grup: grup
        },
        success: function (r) {
            // var response = JSON.parse(r);
            var response = r;
            // console.log(response);
            //hit url for interval 900000 (15 minutes)
            // setTimeout(function(){callSumPerTenant(date);},900000);
            drawChartPerGroupTelkom(response);
            // $("#filter-loader").fadeOut("slow");
        },
        error: function (r) {
            // console.log(r);
            alert("error");
            // $("#filter-loader").fadeOut("slow");
        },
    });
}

function callSumPerGroupGovernment(params, index, params_year, tenant_id, grup){
    $.ajax({
        type: 'post',
        url: base_url+'api/Wallboard/WallboardController/TrafficOPS',
        data: {
            params: params,
            index: index,
            params_year: params_year,
            tenant_id: tenant_id,
            grup: grup
        },
        success: function (r) {
            // var response = JSON.parse(r);
            var response = r;
            // console.log(response);
            //hit url for interval 900000 (15 minutes)
            // setTimeout(function(){callSumPerTenant(date);},900000);
            drawChartPerGroupGovernment(response);
            // $("#filter-loader").fadeOut("slow");
        },
        error: function (r) {
            // console.log(r);
            alert("error");
            // $("#filter-loader").fadeOut("slow");
        },
    });
}

function callSumPerGroupBfsi(params, index, params_year, tenant_id, grup){
    $.ajax({
        type: 'post',
        url: base_url+'api/Wallboard/WallboardController/TrafficOPS',
        data: {
            params: params,
            index: index,
            params_year: params_year,
            tenant_id: tenant_id,
            grup: grup
        },
        success: function (r) {
            // var response = JSON.parse(r);
            var response = r;
            // console.log(response);
            //hit url for interval 900000 (15 minutes)
            // setTimeout(function(){callSumPerTenant(date);},900000);
            drawChartPerGroupBfsi(response);
            // $("#filter-loader").fadeOut("slow");
        },
        error: function (r) {
            // console.log(r);
            alert("error");
            // $("#filter-loader").fadeOut("slow");
        },
    });
}

function callSumPerGroupEnterprise(params, index, params_year, tenant_id, grup){
    $.ajax({
        type: 'post',
        url: base_url+'api/Wallboard/WallboardController/TrafficOPS',
        data: {
            params: params,
            index: index,
            params_year: params_year,
            tenant_id: tenant_id,
            grup: grup
        },
        success: function (r) {
            // var response = JSON.parse(r);
            var response = r;
            // console.log(response);
            //hit url for interval 900000 (15 minutes)
            // setTimeout(function(){callSumPerTenant(date);},900000);
            drawChartPerGroupEnterprise(response);
            // $("#filter-loader").fadeOut("slow");
        },
        error: function (r) {
            // console.log(r);
            alert("error");
            // $("#filter-loader").fadeOut("slow");
        },
    });
}

function callTop5(params, index, params_year, tenant_id){
    $.ajax({
        type: 'post',
        url: base_url+'api/Wallboard/WallboardController/TrafficOPStop5',
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
            drawChartTop5(response);
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

    var ctx = document.getElementById("pieDashSummaryTraffic");
    ctx.height = 260;
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
                        value = value.join('.');
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
                // console.log(chart)
                var legendHtml = [];
                legendHtml.push('<ul><div id="mylegend" class="row ml-4">');
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
                            var total = dataLabel.toString();
                        }else{
                            var percentage = parseFloat((dataLabel / total) * 100).toFixed(1);
                            var total = dataLabel.toString();
                        }
                        if(isNaN(percentage) == true){
                            percentage = 0;
                        }
                        legendHtml.push('<li class="col-md-12">');
                        legendHtml.push('<span class="chart-legend"><div style="background-color :' + background + '" class="box-legend"></div>' + label + ': '+ addCommas2(total) +' (' + percentage.replace('.',',') + '%)</span>');
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
                        legendHtml.push('<li class="col-md-12">');
                        legendHtml.push('<span class="chart-legend"><div style="background-color :' + background + '" class="box-legend"></div>' + label + ': 0 ' + '(0)' + '%</span>');
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

function drawChartPerGroupTelkom(response){
    // $('#lineWallsumTrafficWeek').remove(); // this is my <canvas> element
    // $('#lineWallsumTrafficWeekDiv').append('<canvas id="lineWallsumTrafficWeek"  class="h-500"></canvas>');

    var whatsapp = [];
    var facebook = [];
    var twitter = [];
    var twitterdm = [];
    var instagram = [];
    var messenger = [];
    var telegram = [];
    var line = [];
    var email = [];
    var twitter = [];
    var voice = [];
    var sms = [];
    var livechat = [];
    var chatbot = [];
    var LabelX = [];
    var arrData = [];
    var arrChannel = response.channel.name;
    var arrColor = response.channel.color;

    response.data[0].DATA.forEach(function (value){
        livechat.push(value.DATA[0].total);
        line.push(value.DATA[1].total);
        whatsapp.push(value.DATA[2].total);
        telegram.push(value.DATA[3].total);
        facebook.push(value.DATA[4].total);
        messenger.push(value.DATA[5].total);
        // voice.push(value.DATA[6].total);
        email.push(value.DATA[6].total);
        sms.push(value.DATA[7].total);
        twitter.push(value.DATA[8].total);
        twitterdm.push(value.DATA[9].total);
        instagram.push(value.DATA[10].total);
        chatbot.push(value.DATA[11].total);
        LabelX.push(value.TENANT_ID);
    });

    arrData.push(livechat);
    arrData.push(line);
    arrData.push(whatsapp);
    arrData.push(telegram);
    arrData.push(facebook);
    arrData.push(messenger);
    // arrData.push(voice);
    arrData.push(email);
    arrData.push(sms);
    arrData.push(twitter);
    arrData.push(twitterdm);
    arrData.push(instagram);
    arrData.push(facebook);
    
    var x=0;
    var dataStacked = [];
    var datasetsStacked = "";

    arrChannel.forEach(function (value){
       datasetsStacked =  {
            label: arrChannel[x],
            data: arrData[x],
            backgroundColor: arrColor[x],
            hoverBackgroundColor: arrColor[x],
            hoverBorderWidth: 0
        },
        dataStacked.push(datasetsStacked);
        x++;
    });
       var bar_ctx = document.getElementById('barTelkomGroup');
    
       var bar_chart = new Chart(bar_ctx, {
           // type: 'bar',
           type: 'horizontalBar',
           data: {
               labels: LabelX,
               datasets: dataStacked,
           },
           options: {
               responsive: true,
               maintainAspectRatio: false,
               animation: {
                   duration: 10,
               },
               tooltips: {
                enabled: false,
                custom: function(tooltip) {
                    var tooltipEl = document.getElementById('chartjs-tooltip-telkom');

                    if (tooltip.opacity === 0) {
                      tooltipEl.style.opacity = 0;
                      return;
                    }
                    console.log(this)
                    if (tooltip.body) {
                      var total = 0;
                      var innerHTML = '<table><thead>';
                      for (var c = 0; i < this._data.labels.length; c++){
                         innerHTML+= '<tr><th>'+this._data.labels[c]+'</th></tr>';
                      }
                      innerHTML += '</thead><tbody>';
                      for (var r = 0; r < this._data.datasets.length; r++){
                        innerHTML += '<tr><td style="padding-top:0px;padding-bottom:0px;">'+this._data.datasets[r].label+': '+numberWithCommas(this._data.datasets[tooltip.dataPoints[r].datasetIndex].data[tooltip.dataPoints[r].index].toLocaleString())+'</td></tr>';
                      }
                      innerHTML += '</tbody></table>';
                      tooltipEl.innerHTML = innerHTML;
                    }
                  
                    var centerX = ((this._chartInstance.chartArea.left + this._chartInstance.chartArea.right) / 2);
                    var centerY = -50;
                  
                    tooltipEl.style.opacity = 1;
                    tooltipEl.style.left = centerX + 'px';
                    tooltipEl.style.top = centerY + 'px';
                    tooltipEl.style.fontFamily = tooltip._fontFamily;
                    tooltipEl.style.fontSize = tooltip.fontSize;
                    tooltipEl.style.fontStyle = tooltip._fontStyle;
                    tooltipEl.style.padding = tooltip.yPadding + 'px ' + tooltip.xPadding + 'px';
                    tooltipEl.style.opacity = 1;
                }
               },
               scales: {
                   xAxes: [{
                       stacked: true,
                       gridLines: {
                           display: false
                       },
                       ticks: {
                           callback: function (value) {
                               return numberWithCommas(value);
                           },
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
                   display: false,
                   labels: {
                       boxWidth: 10,
                   }
               }
           },    
    });
}

function drawChartPerGroupGovernment(response){
    // $('#lineWallsumTrafficWeek').remove(); // this is my <canvas> element
    // $('#lineWallsumTrafficWeekDiv').append('<canvas id="lineWallsumTrafficWeek"  class="h-500"></canvas>');

    var whatsapp = [];
    var facebook = [];
    var twitter = [];
    var twitterdm = [];
    var instagram = [];
    var messenger = [];
    var telegram = [];
    var line = [];
    var email = [];
    var twitter = [];
    var voice = [];
    var sms = [];
    var livechat = [];
    var chatbot = [];
    var LabelX = [];
    var arrData = [];
    var arrChannel = response.channel.name;
    var arrColor = response.channel.color;

    response.data[0].DATA.forEach(function (value){
        livechat.push(value.DATA[0].total);
        line.push(value.DATA[1].total);
        whatsapp.push(value.DATA[2].total);
        telegram.push(value.DATA[3].total);
        facebook.push(value.DATA[4].total);
        messenger.push(value.DATA[5].total);
        // voice.push(value.DATA[6].total);
        email.push(value.DATA[6].total);
        sms.push(value.DATA[7].total);
        twitter.push(value.DATA[8].total);
        twitterdm.push(value.DATA[9].total);
        instagram.push(value.DATA[10].total);
        chatbot.push(value.DATA[11].total);
        LabelX.push(value.TENANT_ID);
    });

    arrData.push(livechat);
    arrData.push(line);
    arrData.push(whatsapp);
    arrData.push(telegram);
    arrData.push(facebook);
    arrData.push(messenger);
    // arrData.push(voice);
    arrData.push(email);
    arrData.push(sms);
    arrData.push(twitter);
    arrData.push(twitterdm);
    arrData.push(instagram);
    arrData.push(facebook);
    
    var x=0;
    var dataStacked = [];
    var datasetsStacked = "";

    arrChannel.forEach(function (value){
       datasetsStacked =  {
            label: arrChannel[x],
            data: arrData[x],
            backgroundColor: arrColor[x],
            hoverBackgroundColor: arrColor[x],
            hoverBorderWidth: 0
        },
        dataStacked.push(datasetsStacked);
        x++;
    });
       var bar_ctx = document.getElementById('barGovermentGroup');
       var bar_chart = new Chart(bar_ctx, {
           // type: 'bar',
           type: 'horizontalBar',
           data: {
               labels: LabelX,
               datasets: dataStacked,
           },
           options: {
               responsive: true,
               maintainAspectRatio: false,
               animation: {
                   duration: 10,
               },
                tooltips: {
                //     yAlign: 'center',
                //    mode: 'label',
                //    callbacks: {
                //        label: function (tooltipItem, data) {
                //            return data.datasets[tooltipItem.datasetIndex].label + ": " + numberWithCommas(tooltipItem.xLabel);
                //        }
                //    }
                enabled: false,
                custom: function(tooltip) {
                    var tooltipEl = document.getElementById('chartjs-tooltip-government');

                    
                    if (tooltip.opacity === 0) {
                      tooltipEl.style.opacity = 0;
                      return;
                    }
                    
                    if (tooltip.body) {
                      var total = 0;
                      var innerHTML = '<table><thead>';
                      for (var c = 0; i < this._data.labels.length; c++){
                         innerHTML+= '<tr><th>'+this._data.labels[c]+'</th></tr>';
                      }
                      innerHTML += '</thead><tbody>';
                      for (var r = 0; r < this._data.datasets.length; r++){
                        innerHTML += '<tr><td style="padding-top:0px;padding-bottom:0px;">'+this._data.datasets[r].label+': '+numberWithCommas(this._data.datasets[tooltip.dataPoints[r].datasetIndex].data[tooltip.dataPoints[r].index].toLocaleString())+'</td></tr>';
                      }
                      innerHTML += '</tbody></table>';
                      
                      tooltipEl.innerHTML = innerHTML;
                    }
                  
                    
                    var centerX = (this._chartInstance.chartArea.left + this._chartInstance.chartArea.right) / 2;
                    var centerY = -50;
                  
                    
                    tooltipEl.style.opacity = 1;
                    tooltipEl.style.left = centerX + 'px';
                    tooltipEl.style.top = centerY + 'px';
                    tooltipEl.style.fontFamily = tooltip._fontFamily;
                    tooltipEl.style.fontSize = tooltip.fontSize;
                    tooltipEl.style.fontStyle = tooltip._fontStyle;
                    tooltipEl.style.padding = tooltip.yPadding + 'px ' + tooltip.xPadding + 'px';
                    tooltipEl.style.opacity = 1;
                }
               },
               scales: {
                   xAxes: [{
                       stacked: true,
                       gridLines: {
                           display: false
                       },
                       ticks: {
                           callback: function (value) {
                               return numberWithCommas(value);
                           },
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
                   display: false,
                   labels: {
                       boxWidth: 10,
                   }
               }
           },    
    });
}

function drawChartPerGroupBfsi(response){
    // $('#lineWallsumTrafficWeek').remove(); // this is my <canvas> element
    // $('#lineWallsumTrafficWeekDiv').append('<canvas id="lineWallsumTrafficWeek"  class="h-500"></canvas>');

    var whatsapp = [];
    var facebook = [];
    var twitter = [];
    var twitterdm = [];
    var instagram = [];
    var messenger = [];
    var telegram = [];
    var line = [];
    var email = [];
    var twitter = [];
    var voice = [];
    var sms = [];
    var livechat = [];
    var chatbot = [];
    var LabelX = [];
    var arrData = [];
    var arrChannel = response.channel.name;
    var arrColor = response.channel.color;

    response.data[0].DATA.forEach(function (value){
        livechat.push(value.DATA[0].total);
        line.push(value.DATA[1].total);
        whatsapp.push(value.DATA[2].total);
        telegram.push(value.DATA[3].total);
        facebook.push(value.DATA[4].total);
        messenger.push(value.DATA[5].total);
        email.push(value.DATA[6].total);
        sms.push(value.DATA[7].total);
        twitter.push(value.DATA[8].total);
        twitterdm.push(value.DATA[9].total);
        instagram.push(value.DATA[10].total);
        chatbot.push(value.DATA[11].total);
        LabelX.push(value.TENANT_ID);
    });

    arrData.push(livechat);
    arrData.push(line);
    arrData.push(whatsapp);
    arrData.push(telegram);
    arrData.push(facebook);
    arrData.push(messenger);
    // arrData.push(voice);
    arrData.push(email);
    arrData.push(sms);
    arrData.push(twitter);
    arrData.push(twitterdm);
    arrData.push(instagram);
    arrData.push(facebook);
    
    var x=0;
    var dataStacked = [];
    var datasetsStacked = "";

    arrChannel.forEach(function (value){
       datasetsStacked =  {
            label: arrChannel[x],
            data: arrData[x],
            backgroundColor: arrColor[x],
            hoverBackgroundColor: arrColor[x],
            hoverBorderWidth: 0
        },
        dataStacked.push(datasetsStacked);
        x++;
    });
       var bar_ctx = document.getElementById('barBFSIGroup');
   
       var bar_chart = new Chart(bar_ctx, {
           // type: 'bar',
           type: 'horizontalBar',
           data: {
               labels: LabelX,
               datasets: dataStacked,
           },
           options: {
               responsive: true,
               maintainAspectRatio: false,
               animation: {
                   duration: 10,
               },
               tooltips: {
                enabled: false,
                custom: function(tooltip) {
                    var tooltipEl = document.getElementById('chartjs-tooltip-bfsi');

                    if (tooltip.opacity === 0) {
                      tooltipEl.style.opacity = 0;
                      return;
                    }

                    if (tooltip.body) {
                      var total = 0;
                      var innerHTML = '<table><thead>';
                      for (var c = 0; i < this._data.labels.length; c++){
                         innerHTML+= '<tr><th>'+this._data.labels[c]+'</th></tr>';
                      }
                      innerHTML += '</thead><tbody>';
                      for (var r = 0; r < this._data.datasets.length; r++){
                        innerHTML += '<tr><td style="padding-top:0px;padding-bottom:0px;">'+this._data.datasets[r].label+': '+numberWithCommas(this._data.datasets[tooltip.dataPoints[r].datasetIndex].data[tooltip.dataPoints[r].index].toLocaleString())+'</td></tr>';
                      }
                      innerHTML += '</tbody></table>';
                      tooltipEl.innerHTML = innerHTML;
                    }
                  
                    var centerX = (this._chartInstance.chartArea.left + this._chartInstance.chartArea.right) / 2;
                    var centerY = -50;
                  
                    tooltipEl.style.opacity = 1;
                    tooltipEl.style.left = centerX + 'px';
                    tooltipEl.style.top = centerY + 'px';
                    tooltipEl.style.fontFamily = tooltip._fontFamily;
                    tooltipEl.style.fontSize = tooltip.fontSize;
                    tooltipEl.style.fontStyle = tooltip._fontStyle;
                    tooltipEl.style.padding = tooltip.yPadding + 'px ' + tooltip.xPadding + 'px';
                    tooltipEl.style.opacity = 1;
                }
               },
               scales: {
                   xAxes: [{
                       stacked: true,
                       gridLines: {
                           display: false
                       },
                       ticks: {
                           callback: function (value) {
                               return numberWithCommas(value);
                           },
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
                   display: false,
                   labels: {
                       boxWidth: 10,
                   }
               }
           },    
    });
}



function drawChartPerGroupEnterprise(response){

    var whatsapp = [];
    var facebook = [];
    var twitter = [];
    var twitterdm = [];
    var instagram = [];
    var messenger = [];
    var telegram = [];
    var line = [];
    var email = [];
    var twitter = [];
    var voice = [];
    var sms = [];
    var livechat = [];
    var chatbot = [];
    var LabelX = [];
    var arrData = [];
    var arrChannel = response.channel.name;
    var arrColor = response.channel.color;

    response.data[0].DATA.forEach(function (value){
        livechat.push(value.DATA[0].total);
        line.push(value.DATA[1].total);
        whatsapp.push(value.DATA[2].total);
        telegram.push(value.DATA[3].total);
        facebook.push(value.DATA[4].total);
        messenger.push(value.DATA[5].total);
        email.push(value.DATA[6].total);
        sms.push(value.DATA[7].total);
        twitter.push(value.DATA[8].total);
        twitterdm.push(value.DATA[9].total);
        instagram.push(value.DATA[10].total);
        chatbot.push(value.DATA[11].total);
        LabelX.push(value.TENANT_ID);
    });

    arrData.push(livechat);
    arrData.push(line);
    arrData.push(whatsapp);
    arrData.push(telegram);
    arrData.push(facebook);
    arrData.push(messenger);
    // arrData.push(voice);
    arrData.push(email);
    arrData.push(sms);
    arrData.push(twitter);
    arrData.push(twitterdm);
    arrData.push(instagram);
    arrData.push(facebook);
    
    var x=0;
    var dataStacked = [];
    var datasetsStacked = "";

    arrChannel.forEach(function (value){
       datasetsStacked =  {
            label: arrChannel[x],
            data: arrData[x],
            backgroundColor: arrColor[x],
            hoverBackgroundColor: arrColor[x],
            hoverBorderWidth: 0
        },
        dataStacked.push(datasetsStacked);
        x++;
    });

       var bar_ctx = document.getElementById('barEnterpriseGroup');
   
       var bar_chart = new Chart(bar_ctx, {
           // type: 'bar',
           type: 'horizontalBar',
           data: {
               labels: LabelX,
               datasets: dataStacked,
           },
           options: {
               responsive: true,
               maintainAspectRatio: false,
               animation: {
                   duration: 10,
               },
               tooltips: {
                enabled: false,
                custom: function(tooltip) {
                    var tooltipEl = document.getElementById('chartjs-tooltip-enterprise');

                    if (tooltip.opacity === 0) {
                      tooltipEl.style.opacity = 0;
                      return;
                    }

                    if (tooltip.body) {
                      var innerHTML = '<table><thead>';
                      for (var c = 0; i < this._data.labels.length; c++){
                         innerHTML+= '<tr><th>'+this._data.labels[c]+'</th></tr>';
                      }
                      innerHTML += '</thead><tbody>';
                      for (var r = 0; r < this._data.datasets.length; r++){
                        innerHTML += '<tr><td style="padding-top:0px;padding-bottom:0px;">'+this._data.datasets[r].label+': '+numberWithCommas(this._data.datasets[tooltip.dataPoints[r].datasetIndex].data[tooltip.dataPoints[r].index].toLocaleString())+'</td></tr>';
                      }
                      innerHTML += '</tbody></table>';
                      tooltipEl.innerHTML = innerHTML;
                    }
                  
                    var centerX = (this._chartInstance.chartArea.left + this._chartInstance.chartArea.right) / 2;
                    var centerY = -50;
                  
                    tooltipEl.style.opacity = 1;
                    tooltipEl.style.left = centerX + 'px';
                    tooltipEl.style.top = centerY + 'px';
                    tooltipEl.style.fontFamily = tooltip._fontFamily;
                    tooltipEl.style.fontSize = tooltip.fontSize;
                    tooltipEl.style.fontStyle = tooltip._fontStyle;
                    tooltipEl.style.padding = tooltip.yPadding + 'px ' + tooltip.xPadding + 'px';
                    tooltipEl.style.opacity = 1;
                }
               },
               scales: {
                   xAxes: [{
                       stacked: true,
                       gridLines: {
                           display: false
                       },
                       ticks: {
                           callback: function (value) {
                               return numberWithCommas(value);
                           },
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
                   display: false,
                   labels: {
                       boxWidth: 10,
                   }
               }
           },    
    });
}
 
    //    Return with commas in between
    var numberWithCommas = function (x) {
        return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
    };
    
function drawChartTop5(response){
    // horizontal bar chart
    var arrLabelTop5 = [], arrDataTop5 = [], arrColorTop5 = [];
    response.data.forEach(function(value){
        arrLabelTop5.push(value.tenant);
        arrDataTop5.push(value.total);
        arrColorTop5.push(value.color);
    });
    var barHorizontal = document.getElementById("barTop5Traffic");
    var barData = {
        labels: arrLabelTop5,
        datasets: [{
            label: "Total",
            data: arrDataTop5,
            backgroundColor: arrColorTop5,
            // hoverBackgroundColor: ["#66A2EB", "#FCCE56"]
        }]
    };

    var barChart = new Chart(barHorizontal, {
        type: 'horizontalBar',
        data: barData,
        options: {
            legend:{
                display:false
            },
            responsive:true,
            maintainAspectRatio:false,
            tooltips: {
              callbacks: {
                    label: function(tooltipItem, data) {
                        // var value = data.datasets[0].data[tooltipItem.index];
                        var value = data.datasets[0].data[tooltipItem.index];
                        value = value.toString();
                        value = value.split(/(?=(?:...)*$)/);
                        value = value.join('.');
                        return data.labels[tooltipItem.index]+': '+ value;
                    }
              } // end callbacks:
            },
            scales: {
                xAxes: [{
                    ticks: {
                        min: 0, // Edit the value according to what you need
                        callback: function (value, index, values) {
                            value = value.toString();
                            value = value.split(/(?=(?:...)*$)/);
                            value = value.join('.');
                            return value;
                        }
                    }
                }],
                yAxes: [{
                    stacked: true
                }]
            }

        }
    });
}

function destroyPieChart(){
    $('#pieDashSummaryTraffic').remove(); // this is my <canvas> element
    $('#canvas-pie').append('<canvas id="pieDashSummaryTraffic" class="donutShadow overflow-hidden"></canvas>');
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

            callSumAllTenant('day', v_date, 0,  arr_tenant);
            callSumPerGroupTelkom('day', v_date, 0, arr_tenant, 'TELKOM');
            callSumPerGroupGovernment('day', v_date, 0, arr_tenant, 'GOVERNMENT');
            callSumPerGroupBfsi('day', v_date, 0, arr_tenant, 'BFSI');
            callSumPerGroupEnterprise('day', v_date, 0, arr_tenant, 'ENTERPRISE');
            callTop5('day', v_date,0, arr_tenant);

            $('#check-all-channel').prop('checked',false);
            $("input:checkbox.checklist-channel").prop('checked',false);
        }
    });

    $('#layanan_name').change(function(){
        let fromParams = sessionStorage.getItem('paramsSession');
        if(fromParams == 'day'){
            callSumAllTenant('day',  $('#input-date-filter').val(), 0, arr_tenant);
            callSumPerTenant('day', $('#input-date-filter').val(), 0,  arr_tenant);
            callIntervalTraffic('day',$('#input-date-filter').val(),0,'',  arr_tenant);
        }else if(fromParams == 'month'){
            callSumAllTenant('month',$("#select-month").val(), $("#select-year-on-month").val(), arr_tenant);
            callSumPerTenant('month',$("#select-month").val(), $("#select-year-on-month").val(), arr_tenant);
            callIntervalTraffic('month',$("#select-month").val(), $("#select-year-on-month").val(), '',arr_tenant);
        }else if(fromParams == 'year'){
            callSumAllTenant('year',  $('#select-year-only').val(), 0, arr_tenant);
            callSumPerTenant('year', $('#select-year-only').val(), 0,  arr_tenant);
            callIntervalTraffic('year',$('#select-year-only').val(),0,'',  arr_tenant);
        }
    });

    // btn day
    $('#btn-day').click(function () {
        params_time = 'day';
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

        callSumAllTenant('day', v_params_today, 0,  arr_tenant);
        callSumPerGroupTelkom('day', v_params_today, 0, arr_tenant, 'TELKOM');
        callSumPerGroupGovernment('day', v_params_today, 0, arr_tenant, 'GOVERNMENT');
        callSumPerGroupBfsi('day', v_params_today, 0, arr_tenant, 'BFSI');
        callSumPerGroupEnterprise('day', v_params_today, 0, arr_tenant, 'ENTERPRISE');
        callTop5('day', v_params_today,0, arr_tenant);

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
        callYearOnMonth();

        callSumAllTenant('month', n, m,  arr_tenant);
        callSumPerGroupTelkom('month', n, m, arr_tenant, 'TELKOM');
        callSumPerGroupGovernment('month', n, m, arr_tenant, 'GOVERNMENT');
        callSumPerGroupBfsi('month', n, m, arr_tenant, 'BFSI');
        callSumPerGroupEnterprise('month', n, m, arr_tenant, 'ENTERPRISE');
        callTop5('month', n,m, arr_tenant);

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

        callSumAllTenant('year', m, 0,  arr_tenant);
        callSumPerGroupTelkom('year', m, 0, arr_tenant, 'TELKOM');
        callSumPerGroupGovernment('year', m, 0, arr_tenant, 'GOVERNMENT');
        callSumPerGroupBfsi('year', m, 0, arr_tenant, 'BFSI');
        callSumPerGroupEnterprise('year', m, 0, arr_tenant, 'ENTERPRISE');
        callTop5('year', m, 0, arr_tenant);

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
        
        callSumAllTenant('year',v_year, 0,  arr_tenant);
        callSumPerGroupTelkom('year',v_year, 0, arr_tenant, 'TELKOM');
        callSumPerGroupGovernment('year',v_year, 0, arr_tenant, 'GOVERNMENT');
        callSumPerGroupBfsi('year',v_year, 0, arr_tenant, 'BFSI');
        callSumPerGroupEnterprise('year',v_year, 0, arr_tenant, 'ENTERPRISE');
        callTop5('year',v_year, 0, arr_tenant);

        $('#check-all-channel').prop('checked',false);
        $("input:checkbox.checklist-channel").prop('checked',false);
        $('#filter-date').hide();
        $('#filter-month').hide();
        $('#filter-year').show();
    });

    $('#btn-go').click(function(){
        callSumAllTenant('month', $("#select-month").val(), $("#select-year-on-month").val(),  arr_tenant);
        callSumPerGroupTelkom('month', $("#select-month").val(), $("#select-year-on-month").val(), arr_tenant, 'TELKOM');
        callSumPerGroupGovernment('month', $("#select-month").val(), $("#select-year-on-month").val(), arr_tenant, 'GOVERNMENT');
        callSumPerGroupBfsi('month', $("#select-month").val(), $("#select-year-on-month").val(), arr_tenant, 'BFSI');
        callSumPerGroupEnterprise('month', $("#select-month").val(), $("#select-year-on-month").val(), arr_tenant, 'ENTERPRISE');
        callTop5('month', $("#select-month").val(), $("#select-year-on-month").val(), arr_tenant);
        sessionStorage.removeItem('monthSession');
        sessionStorage.setItem('monthSession', $("#select-month").val());

        sessionStorage.removeItem('yearSession');
        sessionStorage.setItem('yearSession', $("#select-year-on-month").val());

        $('#check-all-channel').prop('checked',false);
        $("input:checkbox.checklist-channel").prop('checked',false);
    });
})(jQuery);