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
    drawDataTable2(items.nomorInduk)
});

function drawDataTable2(nomorInduk){

    $('#listPengajuanTbl').DataTable({
        processing : true,
        ajax: {
			// beforeSend: function (xhr) {
			// 	xhr.setRequestHeader("token", token);
			// },
            url : base_url + 'api/CutiController/listPengajuanCuti',
            type : 'POST',
            data: {
            	nomorInduk: nomorInduk
            }
        },
            columnDefs : [
                { targets : [6],
                render : function (data, type, row) {
                    return data == 'Y' ? '<button class="btn-xsm btn-success">Diterima</button>' : '<button class="btn-xsm btn-danger">Ditolak</button>'
                }
                },
                { className: "text-center", targets: 6 },
                { targets : [7],
                    render : function (data, type, row) {
                        return data == 'Y' ? '<button class="btn-xsm btn-success">Diterima</button>' : '<button class="btn-xsm btn-danger">Ditolak</button>'
                    }
                    },
                    { className: "text-center", targets: 7 }

        ],
        destroy: true,
    });
    // console.log(response);
    // var rowData = table.rows( { selected: true } ).data()[6]['approve_leader'];
    // console.log(rowData)
}

//jquery
(function($) {
    $('#btn-tambah').click(function(){
        window.location = base_url + 'main/v_pengajuan'
    });
})(jQuery);