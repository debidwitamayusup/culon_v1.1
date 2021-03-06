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
    console.log(items.idJabatan)
    if(items.idJabatan == 'HRD'){
        drawDataTable2(items.nomorInduk)
    }else{
        alert("Anda Tidak Memiliki Hak Akses untuk Halaman Ini")
        window.location = base_url + '/main/v_home'
    }
});

function drawDataTable2(nomorInduk){

    $('#listPengajuanTbl').DataTable({
        processing : true,
        ajax: {
			// beforeSend: function (xhr) {
			// 	xhr.setRequestHeader("token", token);
			// },
            url : base_url + 'api/CutiController/listApprovalPengajuanCutiHRD',
            type : 'POST'
        },
        columnDefs : [
            { targets : [7],
            render : function (data, type, row) {
                return data == 'Y' ? '<span class="badge-md rounded-pill bg-success" style="padding:0px 4px 0px 4px;">Diterima</span>' : (data == 'N' ? '<span class="badge-md rounded-pill bg-danger" style="padding:0px 4px 0px 4px;">Ditolak</span>' : '<span class="badge-md rounded-pill bg-warning" style="padding:0px 4px 0px 4px;">Belum Diproses</span>')
            }
            },
            { className: "text-center", targets: 7 },
            { targets : [8],
                render : function (data, type, row) {
                return data == 'Y' ? '<span class="badge-md rounded-pill bg-success" style="padding:0px 4px 0px 4px;">Diterima</span>' : (data == 'N' ? '<span class="badge-md rounded-pill bg-danger" style="padding:0px 4px 0px 4px;">Ditolak</span>' : '<span class="badge-md rounded-pill bg-warning" style="padding:0px 4px 0px 4px;">Belum Diproses</span>')
                }
                },
                { className: "text-center", targets: 8 }

        ],     
        destroy: true,
    });
    // console.log(response);
}

//jquery
(function($) {
    // $('#btn-tambah').click(function(){
    //     window.location = base_url + '/main/v_pengajuan'
    // });
})(jQuery);