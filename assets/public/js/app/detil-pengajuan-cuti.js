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

var url = new URL(document.URL);
var search_params = url.searchParams;
var idUnikCuti = search_params.get('id');
// const tokenSessionNav = JSON.parse(localStorage.getItem('Auth-token'));
$(document).ready(function() {
    // getDataKaryawan(items.userId)
    getDropdownJenisCuti(items.jenisKelamin)
    // getDetilCuti(idUnikCuti)
    getStatusApproval(idUnikCuti)
    $('#durasiCuti').prop('disabled', true)
    $('#startDate').prop('disabled', true)
    $('#endDate').prop('disabled', true)
    $('#namaPengganti').prop('disabled', true)
    $('#alasan').prop('disabled', true)
    $('#btn-submit').prop('disabled', true)
});

function getStatusApproval(idUnikCuti){
    $.ajax({
        type: 'POST',
        url: base_url + 'api/CutiController/getStatusApproval',
        data: {
            "idUnikCuti": idUnikCuti
        },

        success: function(r) {
            //dont parse response if using rest controller
            var response = JSON.parse(r);
            // var response = r;
            console.log(response);
            // tenants = response.data;
            if(response.data[0].approveLeader == 'Y' && response.data[0].approveHRD == 'Y'){
                $('#btn-cetak').prop('disabled', false)
            }else{
                $('#btn-cetak').prop('disabled', true)
            }
            
        },
        error: function(r) {
            //console.log(r);
            alert("error");
        },
    });
}

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
            // tenants = response.data;
            let date1 = new Date(response.data.tglGabung)
            let date2 = new Date(v_params_this_year)
            let beda_tgl = date2.getTime() - date1.getTime()
            let durasi_hari = beda_tgl / (1000 * 3600 * 24)
            // console.log(durasi_hari)
            $('#id_karyawan').val(response.data.nomorInduk);
            $('#nama_karyawan').val(response.data.nama);
            $('#tgl_gabung').val(response.data.tglGabung);
            // $('#lama_gabung').val(durasi_hari + " hari");
            $('#lama_gabung').val(getAge(new Date(response.data[0].dataKaryawan.tglGabung), new Date()));
            $('#id_leader').val(response.data.dataLeader.nomorIndukLeader);
            $('#nama_leader').val(response.data.dataLeader.namaLeader);

            $('#pemohon').html(response.data.nama)
            $('#leader').html(response.data.dataLeader.namaLeader);
        },
        error: function(r) {
            //console.log(r);
            alert("error");
        },
    });
}

function getDetilCuti(idUnikCuti) {
    $.ajax({
        type: 'POST',
        url: base_url + 'api/CutiController/getDetilPengajuanCUti',
        data: {
            "idUnikCuti": idUnikCuti
        },

        success: function(r) {
            var response = JSON.parse(r);
            $('#dropdownCuti').find('option[value="'+response.data[0].idCuti+'"]').attr('selected','selected');
            $('#durasiCuti').val(response.data[0].durasiPengajuan)
            $('#startDate').val(response.data[0].dariTanggal)
            $('#endDate').val(response.data[0].keTanggal)
            $('#idPengganti').val(response.data[0].idPengganti)
            $('#namaPengganti').val(response.data[0].namaPengganti[0].namaPengganti)
            $('#alasan').val(response.data[0].alasanPengajuan)
            $('#dropdownCuti').prop('disabled', true)
            $('#durasiCuti').prop('disabled', true)
            $('#startDate').prop('disabled', true)
            $('#endDate').prop('disabled', true)
            $('#namaPengganti').prop('disabled', true)
            $('#alasan').prop('disabled', true)
            $('#btn-submit').prop('disabled', true)

            $('#id_karyawan').val(response.data[0].dataKaryawan.nomorInduk);
            $('#nama_karyawan').val(response.data[0].dataKaryawan.nama);
            $('#tgl_gabung').val(response.data[0].dataKaryawan.tglGabung);

            let date1 = new Date(response.data[0].dataKaryawan.tglGabung)
            let date2 = new Date(v_params_this_year)
            let beda_tgl = date2.getTime() - date1.getTime()
            let durasi_hari = beda_tgl / (1000 * 3600 * 24)
            // $('#lama_gabung').val(durasi_hari + " hari");
            $('#lama_gabung').val(getAge(new Date(response.data[0].dataKaryawan.tglGabung), new Date()));
            $('#id_leader').val(response.data[0].dataKaryawan.dataLeader.nomorIndukLeader);
            $('#nama_leader').val(response.data[0].dataKaryawan.dataLeader.namaLeader);

            $('#pemohon').html(response.data[0].dataKaryawan.nama);
            $('#leader').html(response.data[0].dataKaryawan.dataLeader.namaLeader);
            $('#hrd').html(response.data[0].dataApproveHRD.nama);
            
            if(response.data[0].approvePekerjaPengganti === 'Y'){
                $('#yaPengganti').attr('checked', 'checked');
            }else{
                $('#tidakPengganti').attr('checked', 'checked');
            }

            if(response.data[0].approveLeader === 'Y'){
                $('#yaLeader').attr('checked', 'checked');
            }else{
                $('#tidakLeader').attr('checked', 'checked');
            }

            if(response.data[0].approveKepalaBagian === 'Y'){
                $('#yaKabag').attr('checked', 'checked');
            }else{
                $('#tidakKabag').attr('checked', 'checked');
            }

            if(response.data[0].approveHrd === 'Y'){
                $('#yaHrd').attr('checked', 'checked');
            }else{
                $('#tidakHrd').attr('checked', 'checked');
            }
        },
        error: function(r) {
            //console.log(r);
            alert("error");
        },
    });
}

function getCutiBalance(username, idCuti) {
    $.ajax({
        type: 'POST',
        url: base_url + 'api/CutiController/getBalanceCuti',
        data: {
            "id_user": username,
            "id_cuti": idCuti
        },

        success: function(r) {
            var response = JSON.parse(r);
            if (response.status != false) {
                var i = 0;
                for (let i = 0; i < response.data.length; i++) {
                    historiCuti += parseInt(response.data[i].banyakPengajuan);
                    
                }
                console.log(historiCuti)
                getLimitCuti(idCuti, historiCuti)
            } else {
                getLimitCuti(idCuti, 0)
            }
        },
        error: function(r) {
            //console.log(r);
            alert("error");
        },
    });
}

function getLimitCuti(idCuti, historiCuti) {
    $.ajax({
        type: 'POST',
        url: base_url + 'api/CutiController/getLimitCuti',
        data: {
            "id_cuti": idCuti
        },

        success: function(r) {
            var response = JSON.parse(r);
            if (historiCuti != 0) {
                totalBalance = response.data[0].limitCuti - historiCuti
                // console.log(totalBalance)
                $('#sisaCuti').html(totalBalance + " hari");
                $('#durasiCuti').prop("max", totalBalance);
                if (totalBalance == 0){
                    $('#durasiCuti').prop('disabled', true)
                    alert('Sisa Jatah Cuti Anda Telah Habis')
                }
            } else {
                console.log(totalBalance)
                totalBalance = response.data[0].limitCuti
                $('#sisaCuti').html(totalBalance + " hari");
                if (totalBalance == 0){
                    $('#durasiCuti').prop('disabled', true)
                    alert('Sisa Jatah Cuti Anda Telah Habis')
                }
            }
        },
        error: function(r) {
            //console.log(r);
            alert("error");
        },
    });
}

function getDropdownJenisCuti(jenis_kelamin) {
    $.ajax({
        type: 'POST',
        url: base_url + 'api/CutiController/GetDropdownCuti',
        data: {
            "jenis_kelamin": jenis_kelamin
        },

        success: function(r) {
            var response = JSON.parse(r);
            var data_option = [];
            var html = '<option value="">Pilih Jenis Cuti</option>';
            for (i = 0; i < response.data.length; i++) {
                html += '<option value=' + response.data[i].idCuti + '>' + response.data[i].descCuti + '</option>';
            }
            $('#dropdownCuti').html(html);
            getDetilCuti(idUnikCuti)
        },
        error: function(r) {
            //console.log(r);
            alert("error");
        },
    });
}

function getLimitCuti(idCuti, historiCuti) {
    $.ajax({
        type: 'POST',
        url: base_url + 'api/CutiController/getLimitCuti',
        data: {
            "id_cuti": idCuti
        },

        success: function(r) {
            var response = JSON.parse(r);
            if (historiCuti != 0) {
                totalBalance = response.data[0].limitCuti - historiCuti
                // console.log(totalBalance)
                $('#sisaCuti').html(totalBalance + " hari");
                $('#durasiCuti').prop("max", totalBalance);
                if (totalBalance == 0){
                    $('#durasiCuti').prop('disabled', true)
                    alert('Sisa Jatah Cuti Anda Telah Habis')
                }
            } else {
                console.log(totalBalance)
                totalBalance = response.data[0].limitCuti
                $('#sisaCuti').html(totalBalance + " hari");
                if (totalBalance == 0){
                    $('#durasiCuti').prop('disabled', true)
                    alert('Sisa Jatah Cuti Anda Telah Habis')
                }
            }
        },
        error: function(r) {
            //console.log(r);
            alert("error");
        },
    });
}

function getNamaPengganti(namaPengganti) {
    $.ajax({
        type: 'POST',
        url: base_url + 'api/CutiController/getPengganti',
        data: {
            "namaPengganti": namaPengganti
        },

        success: function(r) {
            var response = JSON.parse(r);
            let namaArr = []
            response.data.forEach(function (value, index) {
				namaArr.push(value.nama+"|"+value.nomorInduk)
			});
            console.log(namaArr)
            autocomplete(document.getElementById("namaPengganti"), namaArr);
        },
        error: function(r) {
            //console.log(r);
            alert("error");
        },
    });
}

function cetakPengajuan(id_karyawan, namaCuti, durasiCuti, startDate, endDate, alasan, hrd){
    // window.location = base_url + 'api/ReportController/printSuratPengajuanCUti?id_karyawan='+id_karyawan+'&namaCuti='+namaCuti+'&durasiCuti='+durasiCuti+'&startDate='+startDate+'&endDate='+endDate+'&alasan='+alasan+'&hrd='+hrd;
    window.open(base_url + 'api/ReportController/printSuratPengajuanCUti?id_karyawan='+id_karyawan+'&namaCuti='+namaCuti+'&durasiCuti='+durasiCuti+'&startDate='+startDate+'&endDate='+endDate+'&alasan='+alasan+'&hrd='+hrd+'&idCuti='+idUnikCuti, '_blank')
    /*
    $.ajax({
        type: 'POST',
        url: base_url + 'api/ReportController/printSuratPengajuanCUti',
        data: {
            "id_karyawan": id_karyawan,
            "namaCuti": namaCuti,
            "durasiCuti": durasiCuti,
            "startDate": startDate,
            "endDate": endDate,
            "alasan": alasan
        },

        success: function(r) {
            var response = JSON.parse(r);
            let namaArr = []
            response.data.forEach(function (value, index) {
				namaArr.push(value.nama+"|"+value.nomorInduk)
			});
            console.log(namaArr)
            autocomplete(document.getElementById("namaPengganti"), namaArr);
        },
        error: function(r) {
            //console.log(r);
            alert("error");
        },
    });
    */
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

//jquery
(function($) {
    $('#dropdownCuti').change(function() {
        historiCuti = 0;
        getCutiBalance(items.nomorInduk, $('#dropdownCuti').val());
        cekApproval($('#dropdownCuti').val(), $('#id_karyawan').val())
        console.log("val dropdown: "+$('#dropdownCuti').val())
        if($('#dropdownCuti').val() != ''){
            $('#durasiCuti').prop('disabled', false)
            $('#startDate').prop('disabled', true)
            $('#endDate').prop('disabled', true)
            $('#namaPengganti').prop('disabled', true)
            $('#alasan').prop('disabled', true)
            $('#btn-submit').prop('disabled', true)
            
        }else{
            $('#durasiCuti').prop('disabled', true)
        }
    });

    var inputDurasiCuti = document.getElementById("durasiCuti");
    inputDurasiCuti.addEventListener("keyup", function(event) {
        event.preventDefault();
        // console.log($('#durasiCuti').val())
        // console.log(totalBalance)
        // $('#startDate').prop('disabled', false)
        if ($('#durasiCuti').val() > totalBalance) {
            alert("Saldo Cuti Tidak Mencukupi!")
            $('#startDate').prop('disabled', true)
        }else if ($('#durasiCuti').val() === ''){
            $('#startDate').prop('disabled', true)
        }else{
            $('#startDate').prop('disabled', false)
        }

        // if($('#durasiCuti').val() != ''){
        //     $('#startDate').prop('disabled', false)
        // }else{
        //     $('#startDate').prop('disabled', ture)
        // }
    });

    var dates = new Date();
    dates.setDate(dates.getDate()>0);
    $('#startDate').datepicker({
        dateFormat: 'yy-mm-dd',
        // maxDate: 'now',
        showTodayButton: true,
        showClear: true,
        minDate: 'now',
        onSelect: function(dateText) {
            // console.log(this.value);
            v_date = this.value;
            startDate = v_date
            
            
        }
    });

    $('#endDate').datepicker({
        dateFormat: 'yy-mm-dd',
        // maxDate: 'now',
        showTodayButton: true,
        showClear: true,
        minDate: 'now',
        onSelect: function(dateText) {
            // console.log(this.value);
            console.log(v_date)
            let datestartDate = new Date(startDate)
            let dateendDate = new Date(this.value)
            let beda_tglDate = dateendDate.getTime() - datestartDate.getTime()
            let durasi_hariDate = beda_tglDate / (1000 * 3600 * 24)
            console.log(durasi_hariDate)
            if (totalBalance < durasi_hariDate){
                alert('Durasi Melebihi Batas Jatah Cuti')
            }
            
            
        }
    });

    var pengganti = document.getElementById("namaPengganti");
    pengganti.addEventListener("keyup", function(event) {
        event.preventDefault();
        $('#idPengganti').val('');
        getNamaPengganti($('#namaPengganti').val())
    });
    
    $('#btn-submit').click(function(){
        $('#dropdownCuti').val()
        submitPengajuan($('#dropdownCuti').val(), $('#id_karyawan').val(), $('#alasan').val(), $('#durasiCuti').val(), 
        $('#startDate').val(), $('#endDate').val(), $('#idPengganti').val(), $('#namaPengganti').val())
    });

    $('#btn-cetak').click(function(){
        $('#dropdownCuti').val()
        cetakPengajuan($('#id_karyawan').val(), $('#dropdownCuti option:selected').text(), $('#durasiCuti').val(), $('#startDate').val(),
        $('#endDate').val(), $('#alasan').val(), $('#hrd').html())
    });
})(jQuery);