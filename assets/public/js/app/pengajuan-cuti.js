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
    getDataKaryawan(items.userId)
    getDropdownJenisCuti(items.jenisKelamin)
    $('#durasiCuti').prop('disabled', true)
    $('#startDate').prop('disabled', true)
    $('#endDate').prop('disabled', true)
    $('#namaPengganti').prop('disabled', true)
    // $('#alasan').prop('disabled', true)
    $('#btn-submit').prop('disabled', true)
    getLimitCutiHariIni()
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
            let date1 = new Date(response.data.tglGabung)
            let date2 = new Date(v_params_this_year)
            let beda_tgl = date2.getTime() - date1.getTime()
            let durasi_hari = beda_tgl / (1000 * 3600 * 24)
            if(durasi_hari <= 365){
                alert('Minimal Lama bergabung adalah 1 tahun untuk dapat mengajukan cuti! \nLama Bergabung Anda:'+getAge(new Date(response.data.tglGabung),new Date()))
                window.location = base_url+'main/v_home';
            }
            // console.log(durasi_hari)
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
            if(response.status != false){
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
        }else{
            $('#durasiCuti').prop('disabled', true)
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

function autocomplete(inp, arr) {
    /*the autocomplete function takes two arguments,
    the text field element and an array of possible autocompleted values:*/
    console.log(inp)
    var currentFocus;
    /*execute a function when someone writes in the text field:*/
    inp.addEventListener("input", function(e) {
        var a, b, i, val = this.value;
        /*close any already open lists of autocompleted values*/
        closeAllLists();
        if (!val) { return false;}
        currentFocus = -1;
        /*create a DIV element that will contain the items (values):*/
        a = document.createElement("DIV");
        a.setAttribute("id", this.id + "autocomplete-list");
        a.setAttribute("class", "autocomplete-items");
        /*append the DIV element as a child of the autocomplete container:*/
        this.parentNode.appendChild(a);
        /*for each item in the array...*/
        for (i = 0; i < arr.length; i++) {
          /*check if the item starts with the same letters as the text field value:*/
          if (arr[i].substr(0, val.length).toUpperCase() == val.toUpperCase()) {
            /*create a DIV element for each matching element:*/
            b = document.createElement("DIV");
            /*make the matching letters bold:*/
            b.innerHTML = "<strong>" + arr[i].substr(0, val.length) + "</strong>";
            b.innerHTML += arr[i].substr(val.length);
            /*insert a input field that will hold the current array item's value:*/
            b.innerHTML += "<input type='hidden' value='" + arr[i] + "'>";
            /*execute a function when someone clicks on the item value (DIV element):*/
            b.addEventListener("click", function(e) {
                /*insert the value for the autocomplete text field:*/
                let panjangNama = (this.getElementsByTagName("input")[0].value).length
                let untukSubstrStart = panjangNama - 7
                let namaPenggantiAssign = (this.getElementsByTagName("input")[0].value).substring(0, untukSubstrStart)
                inp.value = namaPenggantiAssign;
                $('#idPengganti').val((this.getElementsByTagName("input")[0].value).substring(untukSubstrStart+1, panjangNama));
                $('#alasan').prop('disabled', false);
                $('#btn-submit').prop('disabled', false);
                /*close the list of autocompleted values,
                (or any other open lists of autocompleted values:*/
                closeAllLists();
            });
            a.appendChild(b);
          }
        }
    });
    /*execute a function presses a key on the keyboard:*/
    inp.addEventListener("keydown", function(e) {
        var x = document.getElementById(this.id + "autocomplete-list");
        if (x) x = x.getElementsByTagName("div");
        if (e.keyCode == 40) {
          /*If the arrow DOWN key is pressed,
          increase the currentFocus variable:*/
          currentFocus++;
          /*and and make the current item more visible:*/
          addActive(x);
        } else if (e.keyCode == 38) { //up
          /*If the arrow UP key is pressed,
          decrease the currentFocus variable:*/
          currentFocus--;
          /*and and make the current item more visible:*/
          addActive(x);
        } else if (e.keyCode == 13) {
          /*If the ENTER key is pressed, prevent the form from being submitted,*/
          e.preventDefault();
          if (currentFocus > -1) {
            /*and simulate a click on the "active" item:*/
            if (x) x[currentFocus].click();
          }
        }
    });
    function addActive(x) {
      /*a function to classify an item as "active":*/
      if (!x) return false;
      /*start by removing the "active" class on all items:*/
      removeActive(x);
      if (currentFocus >= x.length) currentFocus = 0;
      if (currentFocus < 0) currentFocus = (x.length - 1);
      /*add class "autocomplete-active":*/
      x[currentFocus].classList.add("autocomplete-active");
    }
    function removeActive(x) {
      /*a function to remove the "active" class from all autocomplete items:*/
      for (var i = 0; i < x.length; i++) {
        x[i].classList.remove("autocomplete-active");
      }
    }
    function closeAllLists(elmnt) {
      /*close all autocomplete lists in the document,
      except the one passed as an argument:*/
      var x = document.getElementsByClassName("autocomplete-items");
      for (var i = 0; i < x.length; i++) {
        if (elmnt != x[i] && elmnt != inp) {
          x[i].parentNode.removeChild(x[i]);
        }
      }
    }
    /*execute a function when someone clicks in the document:*/
    document.addEventListener("click", function (e) {
        closeAllLists(e.target);
    });
  }
  
  function submitPengajuan(idCuti, nomorInduk, alasanPengajuan, durasiPengajuan, dariTanggal, keTanggal, idPengganti, namaPengganti){
    $.ajax({
        type: 'POST',
        url: base_url + 'api/CutiController/insertPengajuan',
        data: {
            "idCuti": idCuti,
            "nomorInduk": nomorInduk,
            "alasanPengajuan": alasanPengajuan,
            "durasiPengajuan": durasiPengajuan,
            "dariTanggal": dariTanggal,
            "keTanggal": keTanggal,
            "idPengganti": idPengganti,
            "namaPengganti": namaPengganti
        },

        success: function(r) {
            var response = JSON.parse(r);
            insertHistorisPengajuan(idCuti, nomorInduk, $('#dropdownCuti option:selected').text(), durasiPengajuan)
            // alert(response.data.message);
        },
        error: function(r) {
            //console.log(r);
            alert("error");
        },
    });
  }

  function insertHistorisPengajuan(idCuti, nomorInduk, descCuti, durasiPengajuan){
    $.ajax({
        type: 'POST',
        url: base_url + 'api/CutiController/insertHistorisPengajuan',
        data: {
            "idCuti": idCuti,
            "nomorInduk": nomorInduk,
            "descCuti": descCuti,
            "durasiPengajuan": durasiPengajuan
        },

        success: function(r) {
            var response = JSON.parse(r);
            alert("Pengajuan Cuti Berhasil Dilakukan");
            window.location = base_url+'main/v_home';
        },
        error: function(r) {
            //console.log(r);
            alert("error");
        },
    });
  }

  function cekApproval(idCuti, nomorInduk){
    $.ajax({
        type: 'POST',
        url: base_url + 'api/CutiController/cekApprovalCuti',
        data: {
            "idCuti": idCuti,
            "nomorInduk": nomorInduk
        },

        success: function(r) {
            var response = JSON.parse(r);
            // var response = r;
            console.log(response)
            if(response.status == true){
                alert('Anda masih memiliki cuti yang belum di approve');
                $('#durasiCuti').prop('disabled', true)
            }else{
                $('#durasiCuti').prop('disabled', false)
            }
            // insertHistorisPengajuan(idCuti, nomorInduk, $('#dropdownCuti option:selected').text(), durasiPengajuan)
            // alert(response.data.message);
        },
        error: function(r) {
            //console.log(r);
            alert("error");
        },
    });
  }

  function getLimitCutiHariIni(){
    $.ajax({
        type: 'GET',
        url: base_url + 'api/CutiController/getLimitCutiHariIni',

        success: function(r) {
            var response = JSON.parse(r);
            $('#pegajuanCutiHariIni').html(response.data.sisaCuti)
            $('#sisaCutiHariIni').html(100 - response.data.sisaCuti)
            if(response.data.sisaCuti > 100){
                alert('Kuota pengajuan cuti hari ini untuk seluruh karyawan telah melebihi batas (100 pengajuan). Harap coba esok hari')
                $('#dropdownCuti').prop('disabled', true);
            }
            // alert(response.data.message);
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

//jquery
(function($) {
    $('#dropdownCuti').change(function() {
        historiCuti = 0;
        getCutiBalance(items.nomorInduk, $('#dropdownCuti').val());
        cekApproval($('#dropdownCuti').val(), $('#id_karyawan').val())
        // console.log("val dropdown: "+$('#dropdownCuti').val())
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
        console.log(totalBalance)
        console.log($('#durasiCuti').val()+'>'+totalBalance)
        // $('#startDate').prop('disabled', false)
        if (parseInt($('#durasiCuti').val()) > parseInt(totalBalance)) {
            alert("Saldo Cuti Tidak Mencukupi!")
            $('#startDate').prop('disabled', true)
        }else if ($('#durasiCuti').val() === ''){
            $('#startDate').prop('disabled', true)
        }else{
            $('#startDate').prop('disabled', false)
            $('#startDate').val('')
            $('#namaPengganti').prop('disabled', true);
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
            startDate = new Date(v_date)
            var myCurrentDate=new Date();
            console.log(myCurrentDate)
            var myCurrentDates=new Date(this.value);
            console.log(myCurrentDates)
            var myFutureDate=new Date(myCurrentDates);
            myFutureDate.setDate(myFutureDate.getDate()+ parseInt($('#durasiCuti').val())-1);
            console.log(myFutureDate)
            dd = myFutureDate.getDate();
            mm = myFutureDate.getMonth() + 1;
            if (dd < 10) {
                dd = '0' + dd;
            }
            if (mm < 10) {
                mm = '0' + mm;
            }
            y = myFutureDate.getFullYear();
            $('#endDate').val(y+'-'+mm+'-'+dd)
            $('#namaPengganti').prop('disabled', false);
            
            
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
            console.log(durasi_hariDate +'>'+ $('#durasiCuti').val())
            if (durasi_hariDate+1 > $('#durasiCuti').val()){
                alert('Durasi Melebihi Batas Jatah Cuti')
                $('#namaPengganti').prop('disabled', true);
            }else{
                $('#namaPengganti').prop('disabled', false);
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
})(jQuery);