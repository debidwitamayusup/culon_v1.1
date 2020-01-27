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

//get today
var v_params_today= m + '-' + n + '-' + (o);

$(document).ready(function () {
    $("#filter-loader").fadeIn("slow");
    // fromTemplate();
    callSumNonClose();
   $("#filter-loader").fadeOut("slow");
});

function callSumNonClose(){
    // console.log(+arr_channel);
    // $("#filter-loader").fadeIn("slow");
    $.ajax({
        type: 'post',
        url: base_url+'api/Wallboard/WallboardController/SummAllTicketStatusNC',
        success: function (r) {
            // var response = JSON.parse(r);
            // console.log(response);
            //hit url for interval 900000 (15 minutes)
           drawCard(r);
            // $("#filter-loader").fadeOut("slow");
        },
        error: function (r) {
            // console.log(r);
            alert("error");
            // $("#filter-loader").fadeOut("slow");
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
        x1 = x1.replace(rgx, '$1' + ',' + '$2');
    }
    return x1 + x2;
}

function drawCard(response){
	$('#cardNonClose').append(''+
        '<div class="row mt-2">'+
            '<div class="col-md-12 col-lg-3 col-xl-3 text-center">'+
                '<div class="card-custom-ticket overflow-hidden">'+
                    '<div class="card-header-small bg-red">'+
                        '<h6 class="text-white card-body">New</h6>'+
                    '</div>'+
                    '<div class="card-body">'+
                        '<h2 class="mb-4 mt-3 num-font">'+parseInt(response.data.sumNew)+'</h2>'+
                        '<span class="text-muted mb-5"></span>'+
                    '</div>'+
                '</div>'+
            '</div>'+
            '<div class="col-md-12 col-lg-3 col-xl-3 text-center">'+
                '<div class="card-custom-ticket overflow-hidden">'+
                    '<div class="card-header-small bg-red">'+
                        '<h6 class="text-white card-body">Open</h6>'+
                    '</div>'+
                    '<div class="card-body">'+
                        '<h2 class="mb-4 mt-3 num-font">'+parseInt(response.data.sumOpen)+'</h2>'+
                        '<span class="text-muted mb-5"></span>'+
                    '</div>'+
                '</div>'+
            '</div>'+

            '<div class="col-md-12 col-lg-3 col-xl-3 text-center">'+
                '<div class="card-custom-ticket overflow-hidden">'+
                    '<div class="card-header-small bg-red">'+
                        '<h6 class="card-body text-white">Reopen</h6>'+
                    '</div>'+
                    '<div class="card-body">'+
                        '<h2 class="mb-4 mt-3 num-font">'+parseInt(response.data.sumReOpen)+'</h2>'+
                        '<span class="text-muted mb-5"></span>'+
                    '</div>'+
                '</div>'+
            '</div>'+
            '<div class="col-md-12 col-lg-3 col-xl-3 text-center">'+
                '<div class="card-custom-ticket overflow-hidden">'+
                    '<div class="card-header-small bg-red">'+
                        '<h6 class="card-body text-white">Reprocess</h6>'+
                    '</div>'+
                    '<div class="card-body">'+
                        '<h2 class="mb-4 mt-3 num-font">'+parseInt(response.data.sumReProses)+'</h2>'+
                        '<span class="text-muted mb-5"></span>'+
                    '</div>'+
                '</div>'+
            '</div>'+
        '</div>'+
        '<div class="row mt-2 mb-2">'+
            '<div class="col-md-12 col-lg-3 col-xl-3 text-center">'+
                '<div class="card-custom-ticket overflow-hidden">'+
                    '<div class="card-header-small bg-red">'+
                        '<h6 class="card-body text-white">Pending</h6>'+
                    '</div>'+
                    '<div class="card-body">'+
                        '<h2 class="mb-4 mt-3 num-font">200</h2>'+
                        '<span class="text-muted mb-5"></span>'+
                    '</div>'+
                '</div>'+
            '</div>'+
            '<div class="col-md-12 col-lg-3 col-xl-3 text-center">'+
                '<div class="card-custom-ticket overflow-hidden">'+
                    '<div class="card-header-small bg-red">'+
                        '<h6 class="card-body text-white">Reject</h6>'+
                    '</div>'+
                    '<div class="card-body">'+
                        '<h2 class="mb-4 mt-3 num-font">200</h2>'+
                        '<span class="text-muted mb-5"></span>'+
                    '</div>'+
                '</div>'+
            '</div>'+
            '<div class="col-md-12 col-lg-3 col-xl-3 text-center">'+
                '<div class="card-custom-ticket overflow-hidden">'+
                    '<div class="card-header-small bg-red">'+
                        '<h6 class="card-body text-white">Reassign</h6>'+
                    '</div>'+
                    '<div class="card-body">'+
                        '<h2 class="mb-4 mt-3 num-font">'+parseInt(response.data.sumReAssign)+'</h2>'+
                        '<span class="text-muted mb-5"></span>'+
                    '</div>'+
                '</div>'+
            '</div>'+
            '<div class="col-md-12 col-lg-3 col-xl-3 text-center">'+
                '<div class="card-custom-ticket overflow-hidden">'+
                    '<div class="card-header-small bg-red">'+
                        '<h6 class="card-body text-white">Preclose</h6>'+
                    '</div>'+
                    '<div class="card-body">'+
                        '<h2 class="mb-4 mt-3 num-font">'+parseInt(response.data.sumPreClose)+'</h2>'+
                        '<span class="text-muted mb-5"></span>'+
                    '</div>'+
                '</div>'+
            '</div>'+
        '</div>');
}

$(function (e) {
    $('#tableTicket').DataTable();
})