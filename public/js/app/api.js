$(document).ready(function () {
    console.log("test");
    var data = "";
    $.ajax({
        type: 'get',
        url: 'http://localhost/dashboard_on4/Summary-Traffic/cardMain',
        data: {},
        success: function (r) {
            var response = JSON.parse(r);
            response.data.forEach(function (value, index) {
                let classBg = value.channel == "Whatsapp" ? "bg-primary" : value.channel == "Email" ? "bg-danger" : value.channel == "Twitter" ? "bg-info" : value.channel == "Facebook" ? "bg-blue" : value.channel == "Telegram" ? "bg-dark" : value.channel == "Voice" ? "bg-warning" : value.channel == "Instagram" ? "bg-pink" : value.channel == "Messenger" ? "bg-blue-dark" : value.channel == "Twitter DM" ? "bg-indigo" : value.channel == "Line" ? "bg-success" : value.channel == "Live Chat" ? "bg-indigo-dark" : value.channel == "SMS" ? "bg-indigo-darker" : "";
                let classIcon = value.channel == "Whatsapp" ? "fab fa-whatsapp text-primary" : value.channel == "Email" ? "fa fa-envelope text-danger" : value.channel == "Twitter" ? "fab fa-twitter text-info" : value.channel == "Facebook" ? "fab fa-facebook text-blue" : value.channel == "Telegram" ? "fab fa-telegram text-dark" : value.channel == "Voice" ? "fa fa-microphone text-warning" : value.channel == "Instagram" ? "fab fa-instagram text-pink" : value.channel == "Messenger" ? "fab fa-facebook-messenger text-blue" : value.channel == "Twitter DM" ? "fa fa-mail-bulk text-indigo" : value.channel == "Line" ? "fab fa-line text-success" : value.channel == "Live Chat" ? "fa fa-comments text-indigo" : value.channel == "SMS" ? "fa fa-envelope-open text-indigo" : "";

                $("#retres").append('<div class="col-md-3"><div class="mini-stat clearfix ' + classBg + ' rounded"><span class="mini-stat-icon"><i class="' + classIcon + '"></i></span> <div class = "mini-stat-info text-white float-right"><h3> ' + value.total + '</h3> ' + value.channel + '</div></div></div>')
            });
        },
        error: function (r) {
            alert("error");
        },
    });
});