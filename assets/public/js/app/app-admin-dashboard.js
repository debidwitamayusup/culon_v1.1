var base_url = $('#base_url').val();
var d = new Date();
var o = d.getDate();
var n = d.getMonth() + 1;
var m = d.getFullYear();
var getTime = d.getTime();
if (o < 10) {
    o = '0' + o;
}
if (n < 10) {
    n = '0' + n;
}

var v_params_this_year = m + '-' + n + '-' + (o - 1);
var historiCuti = 0
var totalBalance, startDate, endDate
// let items = JSON.parse(localStorage.getItem('Auth-data'));
// const tokenSessionNav = JSON.parse(localStorage.getItem('Auth-token'));
$(document).ready(function() {
    drawDataTable2()
});

function drawDataTable2(){

    $('#listKaryawanTbl').DataTable({
        processing : true,
        ajax: {
			// beforeSend: function (xhr) {
			// 	xhr.setRequestHeader("token", token);
			// },
            url : base_url + 'api/AdminController/listKaryawan',
            type : 'POST'
        },
        // columnDefs: [
		//  	{ className: "text-right", targets: 6 },
		// // 	{ className: "text-right", targets: 6 }
		//  ],   
        destroy: true,
    });
    // console.log(response);
}

//jquery
(function($) {
    $('#btn-tambah').click(function(){
        window.location = base_url + 'main/add_user'
    });
})(jQuery);