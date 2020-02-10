var base_url = $('#base_url').val();
var v_params_tenant = 'oct_telkomcare';
var d = new Date();
var o = d.getDate();
var n = d.getMonth()+1;
var m = d.getFullYear();
var tenantFromFilter = '';
var channelFromFilter = '';
var monthFromFilter = '';
var tenants = [];
if (o < 10) {
  o = '0' + o;
} 
if (n < 10) {
  n = '0' + n;
}

var months = [
    'January', 'February', 'March', 'April', 'May',
    'June', 'July', 'August', 'September',
    'October', 'November', 'December'
];

var channels = [
    'Voice', 'Email', 'Live Chat', 'SMS', 'Telegram', 'Facebook',
    'Messenger', 'Twitter', '', 'Line', 'Instagram', 'Whatsapp', 'Twitter DM', '',
    'Chat Bot'
];

//get today
var v_params_today= m + '-' + n + '-' + (o);
const sessionParams = JSON.parse(sessionStorage.getItem('Auth-infomedia'));

$(document).ready(function () {
    getTenant('')
    $('#start-date').datepicker("setDate", v_params_today);
    $('#end-date').datepicker("setDate", v_params_today);
    drawTableCloseTicket(v_params_today, v_params_today, '', '');
    drawTableCloseTicketPerChannel(v_params_today, v_params_today, '', '');
});

function monthNumToName(month) {
    if(month){
        return months[month - 1] || '';
    }
    return 'All Month';
}

function channelToName(channel_id){
    if (channel_id){
        return channels[channel_id - 1] || '';
    }
    return 'All Channel'
}

function getTenant(date){
    $.ajax({
        type: 'POST',
        url: base_url + 'api/Wallboard/WallboardController/GetTennantscr',
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
                    html += '<option value='+response.data[i]+'>'+response.data[i]+'</option>';
                }
                $('#layanan_name').html(html);
        },
        error: function (r) {
            //console.log(r);
            alert("error");
        },
    });
}

function drawTableCloseTicket(tenant_id, start_date, end_date, channel){
    $('#tableSumClose').DataTable({
        ajax: {
            url : base_url + 'api/Reporting/ReportController/ReportingSCloseTicket',
            type : 'POST',
            data :{
                tenant_id: tenant_id,
                start_date: start_date,
                end_date: end_date,
                channel: channel
            }
        },
        columnDefs: [
			{ className: "text-center", targets: 0 },
			{ className: "text-center", targets: 1 },
			{ className: "text-center", targets: 2 },
			{ className: "text-center", targets: 3 },
			{ className: "text-right", targets: 4 }
		], 
        destroy: true
    });
}

function drawTableCloseTicketPerChannel(tenant_id, start_date, end_date, channel){
    $('#tableSumChannel').DataTable({
        ajax: {
            url : base_url + 'api/Reporting/ReportController/ReportingSClosePerCh',
            type : 'POST',
            data :{
                tenant_id: tenant_id,
                start_date: start_date,
                end_date: end_date,
                channel: channel
            }
        },
        columnDefs: [
			{ className: "text-center", targets: 0 },
			{ className: "text-center", targets: 1 },
			{ className: "text-right", targets: 2 }
		], 
        destroy: true
    });
}

function setDatePicker() {
    $(".datepicker").datepicker({
        format: "yyyy-mm-dd",
        todayHighlight: true,
        autoclose: true
    }).attr("readonly", "readonly").css({
        "cursor": "pointer",
        "background": "white"
    });
}

//jquery
(function ($) {
    var date = new Date();
    date.setDate(date.getDate() > 0);
    $('#start-date').datepicker({
        dateFormat: 'yy-mm-dd',
        maxDate: 'now',
        showTodayButton: true,
        showClear: true,
        // minDate: date,
        // onSelect: function (dateText) {
        //  // console.log(this.value);
        //  v_start_date = this.value;
        // }
    });

    $('#end-date').datepicker({
        dateFormat: 'yy-mm-dd',
        maxDate: 'now',
        showTodayButton: true,
        showClear: true,
        // minDate: date,
        // onSelect: function (dateText) {
        //  // console.log(this.value);
        //  v_end_date = this.value;
        // }
    });

    // $('#btn-export').click(function(){
    //     // exportTablePerformOps(v_params_tenant, '2', n, sessionParams.NAME);
    //     exportTablePerformOps(tenantFromFilter, channelFromFilter, monthFromFilter, sessionParams.NAME);
    // });

    $('#btn-go ').click(function(){
        tenantFromFilter = $('#tenant-id').val();
        startDateFromFilter = $('#start-date').val();
        endDateFromFilter = $('#end-date').val();
        channelFromFilter = $('#channel_name').val();
        
        drawTableCloseTicket($('#layanan_name').val(),  $('#start-date').val(), $('#end-date').val(), $('#channel_name').val());
        drawTableCloseTicketPerChannel($('#layanan_name').val(),  $('#start-date').val(), $('#end-date').val(), $('#channel_name').val());
    });

    
})(jQuery);

$(function ($) {

    $('#tableSumClose').dataTable();
    $('#tableSumChannel').dataTable();


//pie chart Ticket Channel
var ctx = document.getElementById( "pieChartSumChannel" );
ctx.height = 262;
var myChart = new Chart( ctx, {
    type: 'pie',
    data: {
        datasets: [ {
            data: [ 15, 35, 40,20,50,30,15,30,40,50,70,90],
            backgroundColor: [
                            "#467fcf",
                            "#fbc0d5",
                            "#31a550",
                            "#e41313",
                            "#3866a6",
                            "#45aaf2",
                            "#6574cd",
                            "#343a40",
                            "#607d8b",
                            "#31a550",
                            "#ff9933",
                            "#80cbc4"
                            ],
            hoverBackgroundColor: [
                            "#467fcf",
                            "#fbc0d5",
                            "#31a550",
                            "#e41313",
                            "#3866a6",
                            "#45aaf2",
                            "#6574cd",
                            "#343a40",
                            "#607d8b",
                            "#31a550",
                            "#ff9933",
                            "#80cbc4"
                            ]

                        } ],
        labels: [
                            "Facebook",
                            "Instagram",
                            "Line",
                            "Email",
                            "Messenger",
                            "Twitter",
                            "Twitter DM",
                            "Telegram",
                            "Live Chat",
                            "Whatsapp",
                            "Voice",
                            "SMS"
                ]
    },
    options: {
        responsive: true,
        maintainAspectRatio: false,
        
        legend:{
                display : false
        },
        pieceLabel:{
            render : 'legend',
            fontColor : '#000',
            position : 'outside',
            segment : true
        },
        legendCallback : function (chart, index){
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
                var percentage = Math.round((dataLabel / total) * 100);
                legendHtml.push('<li class="col-md-4 col-lg-4 col-sm-6 col-xl-4">');
                legendHtml.push('<span class="chart-legend"><div style="background-color :'+background+'" class="box-legend"></div>'+label+':'+percentage+ '%</span>');
            })
            legendHtml.push('</ul></div>');
            return legendHtml.join("");
        },
    }
});
var myLegendContainer = document.getElementById("legend");
myLegendContainer.innerHTML = myChart.generateLegend();

$(function ($) {
        // Return with commas in between
        var numberWithCommas = function (x) {
            return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
        };
    
        var whatsapp = [20, 20, 20, 20, 20, 20, 20, 20, 20, 20, 20, 20, 20, 20, 20, 20, 20, 20, 20, 20, 20, 20, 20, 20, 20, 20, 20, 20, 20, 20, 20];
        var facebook = [40, 40, 40, 40, 40, 40, 40, 40, 40, 40, 40, 40, 40, 40, 40, 40, 40, 40, 40, 40, 40, 40, 40, 40, 40, 40, 40, 40, 40, 40, 40];
        var twitter = [60, 60, 60, 60, 60, 60, 60, 60, 60, 60, 60, 60, 60, 60, 60, 60, 60, 60, 60, 60, 60, 60, 60, 60, 60, 60, 60, 60, 60, 60, 60];
        var twitterdm = [80, 80, 80, 80, 80, 80, 80, 80, 80, 80, 80, 80, 80, 80, 80, 80, 80, 80, 80, 80, 80, 80, 80, 80, 80, 80, 80, 80, 80, 80, 80];
        var instagram = [90, 90, 90, 90, 90, 90, 90, 90, 90, 90, 90, 90, 90, 90, 90, 90, 90, 90, 90, 90, 90, 90, 90, 90, 90, 90, 90, 90, 90, 90, 90];
        var messenger = [100, 100, 100, 100, 100, 100, 100, 100, 100, 100, 100, 100, 100, 100, 100, 100, 100, 100, 100, 100, 100, 100, 100, 100, 100, 100, 100, 100, 100, 100, 100];
        var telegram = [110, 110, 110, 110, 110, 110, 110, 110, 110, 110, 110, 110, 110, 110, 110, 110, 110, 110, 110, 110, 110, 110, 110, 110, 110, 110, 110, 110, 110, 110, 110];
        var line = [120, 120, 120, 120, 120, 120, 120, 120, 120, 120, 120, 120, 120, 120, 120, 120, 120, 120, 120, 120, 120, 120, 120, 120, 120, 120, 120, 120, 120, 120, 120];
        var email = [130, 130, 130, 130, 130, 130, 130, 130, 130, 130, 130, 130, 130, 130, 130, 130, 130, 130, 130, 130, 130, 130, 130, 130, 130, 130, 130, 130, 130, 130, 130];
        var twitter = [140, 140, 140, 140, 140, 140, 140, 140, 140, 140, 140, 140, 140, 140, 140, 140, 140, 140, 140, 140, 140, 140, 140, 140, 140, 140, 140, 140, 140, 140, 140];
        var voice = [150, 150, 150, 150, 150, 150, 150, 150, 150, 150, 150, 150, 150, 150, 150, 150, 150, 150, 150, 150, 150, 150, 150, 150, 150, 150, 150, 150, 150, 150, 150];
        var sms = [160, 160, 160, 160, 160, 160, 160, 160, 160, 160, 160, 160, 160, 160, 160, 160, 160, 160, 160, 160, 160, 160, 160, 160, 160, 160, 160, 160, 160, 160, 160];
        var livechat = [170, 170, 170, 170, 170, 170, 170, 170, 170, 170, 170, 170, 170, 170, 170, 170, 170, 170, 170, 170, 170, 170, 170, 170, 170, 170, 170, 170, 170, 170, 170];
        var chatbot = [180, 180, 180, 180, 180, 180, 180, 180, 180, 180, 180, 180, 180, 180, 180, 180, 180, 180, 180, 180, 180, 180, 180, 180, 180, 180, 180, 180, 180, 180, 180];
        var LabelX = ['1', '2', '3', '4', '5', '6', '7', '8', '9', '10', '11', '12', '13', '14', '15', '16', '17', '18', '19', '20', '21', '22', '23', '24', '25', '26', '27', '28', '29', '30', '31'];
        var bar_ctx = document.getElementById('BarReportTicketClose');
    
        var bar_chart = new Chart(bar_ctx, {
            type: 'bar',
            data: {
                labels: LabelX,
                datasets: [
                    {
                        label: 'Whatsapp',
                        data: whatsapp,
                        backgroundColor: "#089e60",
                        hoverBackgroundColor: "#089e60",
                        hoverBorderWidth: 0
                    },
                    {
                        label: 'Facebook',
                        data: facebook,
                        backgroundColor: "#467fcf",
                        hoverBackgroundColor: "#467fcf",
                        hoverBorderWidth: 0
                    },
                    {
                        label: 'Twitter',
                        data: twitter,
                        backgroundColor: "#45aaf2",
                        hoverBackgroundColor: "#45aaf2",
                        hoverBorderWidth: 0
                    },
                    {
                        label: 'Twitter DM',
                        data: twitterdm,
                        backgroundColor: "#6574cd",
                        hoverBackgroundColor: "#6574cd",
                        hoverBorderWidth: 0
                    },
                    {
                        label: 'Instagram',
                        data: instagram,
                        backgroundColor: "#fbc0d5",
                        hoverBackgroundColor: "#fbc0d5",
                        hoverBorderWidth: 0
                    },
                    {
                        label: 'Messenger',
                        data: messenger,
                        backgroundColor: "#3866a6",
                        hoverBackgroundColor: "#3866a6",
                        hoverBorderWidth: 0
                    },
                    {
                        label: 'Telegram',
                        data: telegram,
                        backgroundColor: "#343a40",
                        hoverBackgroundColor: "#343a40",
                        hoverBorderWidth: 0
                    },
                    {
                        label: 'Line',
                        data: line,
                        backgroundColor: "#31a550",
                        hoverBackgroundColor: "#31a550",
                        hoverBorderWidth: 0
                    },
                    {
                        label: 'Email',
                        data: email,
                        backgroundColor: "#e41313",
                        hoverBackgroundColor: "#e41313",
                        hoverBorderWidth: 0
                    },
                    {
                        label: 'Voice',
                        data: voice,
                        backgroundColor: "#ff9933",
                        hoverBackgroundColor: "#ff9933",
                        hoverBorderWidth: 0
                    },
                    {
                        label: 'SMS',
                        data: sms,
                        backgroundColor: "#80cbc4",
                        hoverBackgroundColor: "#80cbc4",
                        hoverBorderWidth: 0
                    },
                    {
                        label: 'Live Chat',
                        data: livechat,
                        backgroundColor: "#607d8b",
                        hoverBackgroundColor: "#607d8b",
                        hoverBorderWidth: 0
                    },
                    {
                        label: 'ChatBot',
                        data: chatbot,
                        backgroundColor: "#6e273e",
                        hoverBackgroundColor: "#6e273e",
                        hoverBorderWidth: 0
                    }
                ]
            },
            options: {
                responsive : true,
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
    });
})