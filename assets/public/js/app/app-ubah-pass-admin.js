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
var url = new URL(document.URL);
var search_params = url.searchParams;
var username = search_params.get('id');
// let items = JSON.parse(localStorage.getItem('Auth-data'));
// const tokenSessionNav = JSON.parse(localStorage.getItem('Auth-token'));
$(document).ready(function() {
    getDataKaryawan(username)
    $('#btn-submit').prop('disabled', true)
});

function getDataKaryawan(username) {
    $.ajax({
        type: 'POST',
        url: base_url + 'api/CutiController/getDataKaryawan',
        data: {
            "id_user": username
        },

        success: function(r) {
            //dont parse response if using rest controller
            var response = JSON.parse(r);
            // var response = r;
            // console.log(response);
           
            $('#id_karyawan').val(response.data.nomorInduk);
            $('#nama_karyawan').val(response.data.nama);
            $('#tgl_gabung').val(response.data.tglGabung);
            $('#lama_gabung').val(getAge(new Date(response.data.tglGabung), new Date()));
            // $('#lama_gabung').val(durasi_hari + " hari");
            $('#id_leader').val(response.data.dataLeader.nomorIndukLeader);
            $('#nama_leader').val(response.data.dataLeader.namaLeader);
        },
        error: function(r) {
            //console.log(r);
            alert("error");
        },
    });
}

  function getAge(date_1, date_2)
    {
    
        //convert to UTC
        var date2_UTC = new Date(Date.UTC(date_2.getUTCFullYear(), date_2.getUTCMonth(), date_2.getUTCDate()));
        var date1_UTC = new Date(Date.UTC(date_1.getUTCFullYear(), date_1.getUTCMonth(), date_1.getUTCDate()));


        var yAppendix, mAppendix, dAppendix;


        //--------------------------------------------------------------
        var days = date2_UTC.getDate() - date1_UTC.getDate();
        if (days < 0)
        {

            date2_UTC.setMonth(date2_UTC.getMonth() - 1);
            days += DaysInMonth(date2_UTC);
        }
        //--------------------------------------------------------------
        var months = date2_UTC.getMonth() - date1_UTC.getMonth();
        if (months < 0)
        {
            date2_UTC.setFullYear(date2_UTC.getFullYear() - 1);
            months += 12;
        }
        //--------------------------------------------------------------
        var years = date2_UTC.getFullYear() - date1_UTC.getFullYear();




        if (years > 1) yAppendix = " tahun";
        else yAppendix = " tahun";
        if (months > 1) mAppendix = " bulan";
        else mAppendix = " bulan";
        if (days > 1) dAppendix = " hari";
        else dAppendix = " hari";


        return years + yAppendix + ", " + months + mAppendix + ", " + days + dAppendix;
    }

    function ubahPassword(username, password){
        $.ajax({
            type: 'POST',
            url: base_url + 'api/AdminController/ubahPasswordUser',
            data: {
                id_user: username,
                password: password
            },
            success: function (r) {
                // var response = r;
                var response = JSON.parse(r);
                if(response.status == true){
                    // alert(response.message);
                    alert('Ubah Password Berhasil!')
                   window.location = base_url+'main/index_admin';
                }else{
                    // alert(response.message);
                }
            },
            error: function (r) {
                alert(r.message);
            },
        });
    }

//jquery
(function($) {
    
    var pengganti = document.getElementById("password");
    pengganti.addEventListener("keyup", function(event) {
        event.preventDefault();
        if($.trim($('#password').val()).length == 0){
            $('#btn-submit').prop('disabled', true)
        }else{
            $('#btn-submit').prop('disabled', false)
        }
    });


    $('#btn-submit').click(function(){
        ubahPassword(username, $('#password').val())
    });
})(jQuery);