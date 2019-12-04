$(document).ready(function () {
    // console.log("test");
    var data = "";
    var base_url = $('#base_url').val();
    // console.log(base_url);
    $.ajax({
        type: 'get',
        url: base_url + 'Summary-Traffic/cardMain',
        data: {},
        success: function (r) {
            var response = JSON.parse(r);
            let arrTotal = []
            let arrChannel = []
            response.data.forEach(function (value, index) {
                let classBg = value.channel == "Whatsapp" ? "bg-primary" : value.channel == "Email" ? "bg-danger" : value.channel == "Twitter" ? "bg-info" : value.channel == "Facebook" ? "bg-blue" : value.channel == "Telegram" ? "bg-dark" : value.channel == "Voice" ? "bg-warning" : value.channel == "Instagram" ? "bg-pink" : value.channel == "Messenger" ? "bg-blue-dark" : value.channel == "Twitter DM" ? "bg-indigo" : value.channel == "Line" ? "bg-success" : value.channel == "Live Chat" ? "bg-indigo-dark" : value.channel == "SMS" ? "bg-indigo-darker" : "";
                let classIcon = value.channel == "Whatsapp" ? "fab fa-whatsapp text-primary" : value.channel == "Email" ? "fa fa-envelope text-danger" : value.channel == "Twitter" ? "fab fa-twitter text-info" : value.channel == "Facebook" ? "fab fa-facebook text-blue" : value.channel == "Telegram" ? "fab fa-telegram text-dark" : value.channel == "Voice" ? "fa fa-microphone text-warning" : value.channel == "Instagram" ? "fab fa-instagram text-pink" : value.channel == "Messenger" ? "fab fa-facebook-messenger text-blue" : value.channel == "Twitter DM" ? "fa fa-mail-bulk text-indigo" : value.channel == "Line" ? "fab fa-line text-success" : value.channel == "Live Chat" ? "fa fa-comments text-indigo" : value.channel == "SMS" ? "fa fa-envelope-open text-indigo" : "";
                arrTotal.push(value.total);
                arrChannel.push(value.channel);
                $("#retres").append('<div class="col-md-4"><div class="mini-stat clearfix ' + classBg + ' rounded"><span class="mini-stat-icon"><i class="' + classIcon + '"></i></span> <div class = "mini-stat-info text-white float-right"><h3> ' + value.total + '</h3> ' + value.channel + '</div></div></div>')
            });
            var ctx = document.getElementById("pieChart");
            ctx.height = 296;
            var myChart = new Chart(ctx, {
                type: 'pie',
                data: {
                    datasets: [{
                        labels: arrTotal,
                        data: arrTotal,
                        backgroundColor: [
                            "#e41313",
                            "#316cbe",
                            "#D56DFC",
                            "#31a550",
                            "#6574cd",
                            "#3866a6",
                            "#1c3353",
                            "#343a40",
                            "#45aaf2",
                            "#6574cd",
                            "#ff9933",
                            "#089e60"
                        ],
                        hoverBackgroundColor: [
                            "#e41313 ",
                            "#316cbe",
                            "#D56DFC",
                            "#31a550",
                            "#6574cd",
                            "#3866a6",
                            "#1c3353",
                            "#343a40",
                            "#45aaf2",
                            "#6574cd",
                            "#ff9933",
                            "#089e60"
                        ]

                    }],
                    labels: arrChannel
                },
                options: {
                    maintainAspectRatio: false,
                    responsive: true,
                    legend: {
                        display: false
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
                        legendHtml.push('<ul><div class="row">');
                        allData.forEach(function (data, index) {
                            var label = chart.data.labels[index];
                            var dataLabel = allData[index];
                            var background = chart.data.datasets[0].backgroundColor[index]
                            var total = 0;
                            for (var i in allData) {
                                total += parseInt(allData[i]);
                            }
                            console.log(total)
                            var percentage = Math.round((dataLabel / total) * 100);
                            legendHtml.push('<li class="col-md-4 col-lg-4 col-sm-6 col-xl-4">');
                            legendHtml.push('<span class="chart-legend"><div style="background-color:' + background + '" class="box-legend"></div>' + label + ' : ' + percentage + '%</span>');
                            legendHtml.push('</li>');
                        })
                        legendHtml.push('</ul></div>');
                        return legendHtml.join("");
                    },
                }
            });
            var myLegendContainer = document.getElementById("legend");
            myLegendContainer.innerHTML = myChart.generateLegend();
        },
        error: function (r) {
            alert("error");
        },
    });

    //call total interaction
    $.ajax({
        type: 'get',
        url: base_url + 'api/SummaryTraffic/SummaryTrafficChannel/total_interaction',
        data: {},
        success: function (r) {
            var response = JSON.parse(r);
            // console.log(response);
            $("#total-interaction").html(response.data.total_interaction);
        },
        error: function (r) {
            alert("error");
        },
    });

    //call total unique customer
    $.ajax({
        type: 'get',
        url: base_url + 'api/SummaryTraffic/SummaryTrafficChannel/total_unique_customer',
        data: {},
        success: function (r) {
            var response = JSON.parse(r);
            // console.log(response);
            $("#unique-customer").html(response.data.total_unique_customer);
        },
        error: function (r) {
            alert("error");
        },
    });
    //call avg customer
    $.ajax({
        type: 'get',
        url: base_url + 'api/SummaryTraffic/SummaryTrafficChannel/average_customer',
        data: {},
        success: function (r) {
            var response = JSON.parse(r);
            // console.log(response);
            $("#avg-customer").html(response.data.average_customer);
        },
        error: function (r) {
            alert("error");
        },
    });

    //Call Interaction

    $.ajax({
        type: 'get',
        url: base_url + 'api/SummaryTraffic/SummaryTrafficChannel/uniqueCustomerPerChannel',
        data: {},
        success: function (r) {
            var response = JSON.parse(r);
            response.data.forEach(function (value, index) {
                let classBg = value.channel_name == "Whatsapp" ? "text-primary" : value.channel_name == "Email" ? "text-danger" : value.channel_name == "Twitter" ? "text-info" : value.channel_name == "Facebook" ? "text-blue" : value.channel_name == "Telegram" ? "text-dark" : value.channel_name == "Voice" ? "text-warning" : value.channel_name == "Instagram" ? "text-pink" : value.channel_name == "Messenger" ? "text-blue-dark" : value.channel_name == "Twitter DM" ? "text-indigo" : value.channel_name == "Line" ? "text-success" : value.channel_name == "Live Chat" ? "text-indigo-dark" : value.channel_name == "SMS" ? "text-indigo-darker" : "";
                let classIcon = value.channel_name == "Whatsapp" ? "fab fa-whatsapp text-primary plan-icon" : value.channel_name == "Email" ? "fa fa-envelope text-danger plan-icon" : value.channel_name == "Twitter" ? "fab fa-twitter text-info plan-icon" : value.channel_name == "Facebook" ? "fab fa-facebook text-blue plan-icon" : value.channel_name == "Telegram" ? "fab fa-telegram text-dark plan-icon" : value.channel_name == "Voice" ? "fa fa-microphone text-warning plan-icon" : value.channel_name == "Instagram" ? "fab fa-instagram text-pink plan-icon" : value.channel_name == "Messenger" ? "fab fa-facebook-messenger text-blue plan-icon" : value.channel_name == "Twitter DM" ? "fa fa-mail-bulk text-indigo plan-icon" : value.channel_name == "Line" ? "fab fa-line text-success plan-icon" : value.channel_name == "Live Chat" ? "fa fa-comments text-indigo plan-icon" : value.channel_name == "SMS" ? "fa fa-envelope-open text-indigo plan-icon" : "";

                $("#retres-unique").append('<div class="col-xl-3 border-right"><div class="card-body text-center"><i class="' + classIcon + '"></i><div class="dash3"><h5 class="text-muted">' + value.channel_name + '</h5><h4 class="counter ' + classBg + ' num-font">' + value.total_unique + '</h4></div></div></div>')
            });
        },
        error: function (r) {
            alert("error");
        },
    });
});