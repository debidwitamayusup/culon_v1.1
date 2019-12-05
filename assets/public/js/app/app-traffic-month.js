
function callGraphicInterval(date){
    // console.log(+arr_channel);
    $.ajax({
        type: 'post',
        url: base_url+'api/SummaryTraffic/SummaryMonth/lineChartPerMonth',
        data: {
            channel_name: "Voice",
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

//jquery
(function ($) {
    // change date picker
    $('#month').datepicker({
        onSelect: function() {
            //destroy chart
            destroyChartInterval();
            destroyChartPercentage();
            // console.log(this.value);
            
            //re draw
            callGraphicInterval(this.value, []);
            callDataTableAvg(this.value);
            callDataPercentage(this.value);
        }
    });
})(jQuery);