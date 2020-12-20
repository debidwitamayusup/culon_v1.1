var base_url = $('#base_url').val();
// const sessionParams = JSON.parse(localStorage.getItem('Auth-token'));
// const sessionEdit = JSON.parse(sessionStorage.getItem('editUser'));
$(document).ready(function(){
    getJabatan();
    getLatestID();
    $("#inputIdLeader").attr('readonly', true);
});

function getJabatan(){
    $.ajax({
        type: 'GET',
        url: base_url + 'api/CutiController/getJabatanApp',
        // data: {
        //     "date" : date,
        //     "userid" : userid
        // },

        success: function (r) {
            var data_option = [];
            //dont parse response if using rest controller
            var response = JSON.parse(r);
            // var response = r;
            // console.log(response);
            // console.log(response.data);
            // tenants = response.data;
                var html = '';
                for(i=0; i<response.data.length; i++){
                    html += '<option value='+response.data[i].idJabatan+'>'+response.data[i].namaJabatan+'</option>';
                }
                console.log(html);
                $('#inputJabatan').html(html);
        },
        error: function (r) {
            //console.log(r);
            alert("error");
        },
    });
}

function callAddUser(nomorInduk, nama, idJabatan, tempatLahir, idLeader, tglLahir, jenisKelamin, agama, 
                    nik, noKK, kwn, status, alamatKTP, alamatSekarang, noTelp, noBPJSTK, noBPJSKES, npwp, tglGabung){
    $.ajax({
        type: 'POST',
        url: base_url + 'api/CutiController/simpanKaryawanApp',
        data: {
            nomorInduk : nomorInduk,
            nama : nama,
            idJabatan : idJabatan,
            tempatLahir : tempatLahir,
            idLeader : idLeader,
            tglLahir : tglLahir,
            jenisKelamin : jenisKelamin,
            agama : agama,
            nik : nik,
            noKK : noKK,
            kwn : kwn,
            status : status,
            alamatKTP : alamatKTP,
            alamatSekarang : alamatSekarang,
            noTelp : noTelp,
            noBPJSTK : noBPJSTK,
            noBPJSKES : noBPJSKES,
            npwp : npwp,
            tglGabung: tglGabung
        },
        success: function (r) {
            // var response = r;
            var response = JSON.parse(r);
            if(response.status == true){
                alert("Input Data Berhasil");
                window.location = base_url+'main/v_home';
                // alert(response.message);
                // callAssignTenant(token, username, tenant_id);
            }else{
                alert(response.message);
            }
        },
        error: function (r) {
            // $('#error-password').show();
            // $( "#passwordDiv" ).addClass( "error" );
            // $('#btn-cancel').attr('disabled', false);
            // $('#password').attr('disabled', false);
            // $("#btn-confirm-password").html('Submit')
            alert(r.message);
        },
    });
}


function getNamaLeader(namaPengganti) {
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
            autocomplete(document.getElementById("inputNamaLeader"), namaArr);
        },
        error: function(r) {
            //console.log(r);
            alert("error");
        },
    });
}

function getLatestID(){
    $.ajax({
        type: 'GET',
        url: base_url + 'api/CutiController/getLatestID',

        success: function (r) {
            //dont parse response if using rest controller
            var response = JSON.parse(r);
            // console.log(response)
            var oldNomorInduk, newNomorInduk, depan, belakang;
            oldNomorInduk = response.data.nomorInduk;
            newNomorInduk = oldNomorInduk.substring(0,5)+(parseInt(oldNomorInduk.substring(5,6))+1)
            // console.log(newNomorInduk)
            $('#inputUsername').val(newNomorInduk);
            $('#inputNomorInduk').val(newNomorInduk);
            $('#errorUsername').hide();
            $( "#divUsername" ).removeClass( "error" );
            $('#errorNomorInduk').hide();
            $( "#divNomorInduk" ).removeClass( "error" );
        },
        error: function (r) {
            //console.log(r);
            alert("error");
        },
    });
}
function autocomplete(inp, arr) {
    /*the autocomplete function takes two arguments,
    the text field element and an array of possible autocompleted values:*/
    // console.log(inp)
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
                $('#inputIdLeader').val((this.getElementsByTagName("input")[0].value).substring(untukSubstrStart+1, panjangNama));
                $('#errorIdLeader').hide();
                $( "#divIdLeader" ).removeClass( "error" );
                // $('#alasan').prop('disabled', false);
                // $('#btn-submit').prop('disabled', false);
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

(function ($) {
    var inputName = document.getElementById("inputNamaKaryawan");
    inputName.addEventListener("keyup", function(event) {
        event.preventDefault();
        if($('#inputNamaKaryawan').val() == "" ||  $('#inputNamaKaryawan').val().length > 20){
            $('#errorNamaKaryawan').show();
            $( "#divNamaKaryawan" ).addClass( "error" );
            $("#btn-add").attr('disabled', true);           
        }else{
            $('#errorNamaKaryawan').hide();
            $( "#divNamaKaryawan" ).removeClass( "error" );
            $("#btn-add").attr('disabled', false);
        }
    });

    var inputUsername = document.getElementById("inputUsername");
    inputUsername.addEventListener("keyup", function(event) {
        event.preventDefault();
        if($('#inputUsername').val() == "" ||  $('#inputUsername').val().length > 20){
            $('#errorUsername').show();
            $( "#divUsername" ).addClass( "error" );
            $("#btn-add").attr('disabled', true);           
        }else{
            $('#errorUsername').hide();
            $( "#divUsername" ).removeClass( "error" );
            $("#btn-add").attr('disabled', false);
        }
    });

    var inputNomorInduk = document.getElementById("inputNomorInduk");
    inputNomorInduk.addEventListener("keyup", function(event) {
        event.preventDefault();
        if($('#inputNomorInduk').val() == "" ||  $('#inputNomorInduk').val().length > 20){
            $('#errorNomorInduk').show();
            $( "#divNomorInduk" ).addClass( "error" );
            $("#btn-add").attr('disabled', true);           
        }else{
            $('#errorNomorInduk').hide();
            $( "#divNomorInduk" ).removeClass( "error" );
            $("#btn-add").attr('disabled', false);
        }
    });

    var inputNamaLeader = document.getElementById("inputNamaLeader");
    inputNamaLeader.addEventListener("keyup", function(event) {
        event.preventDefault();
        if($('#inputNamaLeader').val() == "" ||  $('#inputNamaLeader').val().length > 20){
            $('#errorNamaLeader').show();
            $( "#divNamaLeader" ).addClass( "error" );
            $("#btn-add").attr('disabled', true);           
        }else{
            $('#errorNamaLeader').hide();
            $( "#divNamaLeader" ).removeClass( "error" );
            $("#btn-add").attr('disabled', false);
        }
    });

    var dates = new Date();
    dates.setDate(dates.getDate()>0);
    $('#inputTglLahir').datepicker({
        dateFormat: 'yy-mm-dd',
        maxDate: 'now',
        showTodayButton: true,
        showClear: true,
        // minDate: 'now',
        // onSelect: function(dateText) {
        //     // console.log(this.value);
        //     v_date = this.value;
        //     startDate = v_date
        //     $('#endDate').prop('disabled', false)
            
        // }
    });

    $('#inputTglGabung').datepicker({
        dateFormat: 'yy-mm-dd',
        maxDate: 'now',
        showTodayButton: true,
        showClear: true,
        // minDate: 'now',
        // onSelect: function(dateText) {
        //     // console.log(this.value);
        //     v_date = this.value;
        //     startDate = v_date
        //     $('#endDate').prop('disabled', false)
            
        // }
    });

    /*
    var inputEmail = document.getElementById("Email");
    inputEmail.addEventListener("keyup", function(event) {
      var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
        event.preventDefault();
        if(!emailReg.test($('#Email').val()) || $.trim($('#Email').val()).length == 0){
            $('#errorEmail').show();
            $( "#emailDiv" ).addClass( "error" );
            $("#btn-add").attr('disabled', true);
        }else{
            $('#errorEmail').hide();
            $( "#emailDiv" ).removeClass( "error" );
            $("#btn-add").attr('disabled', false);
        }
    });

    var inputPhone = document.getElementById("noTelp");
    inputPhone.addEventListener("keyup", function(event) {
        event.preventDefault();
        if($.isNumeric($('#noTelp').val()) == false ||  $('#noTelp').val().length > 13){
            $('#errorTelp').show();
            $( "#telpDiv" ).addClass( "error" );
            $("#btn-add").attr('disabled', true);           
        }else{
            $('#errorTelp').hide();
            $( "#telpDiv" ).removeClass( "error" );
            $("#btn-add").attr('disabled', false);
        }
    });
    */

   var leader = document.getElementById("inputNamaLeader");
   leader.addEventListener("keyup", function(event) {
       event.preventDefault();
       $('#inputIdLeader').val('');
       getNamaLeader($('#inputNamaLeader').val())
   });

    $('#btn-add').click(function(){
        callAddUser($('#inputNomorInduk').val(), $('#inputNamaKaryawan').val(), $('#inputJabatan').val(), $('#inputTempatLahir').val(), 
        $('#inputIdLeader').val(), $('#inputTglLahir').val(), $('#inputJenisKelamin').val(), $('#inputAgama').val(), $('#inputNik').val(),
        $('#inputKK').val(), $('#inputKewarganegaraan').val(), $('#inputStatus').val(), $('#inputAlamatKTP').val(), $('#inputAlamatSekarang').val(),
        $('#inputNoTelp').val(), $('#inputBPJSTK').val(), $('#inputBPJS').val(), $('#inputNPWP').val(), $('#inputTglGabung').val());
    });

    $('#btn-cancel').click(function(){
        window.location = base_url+'main/v_home';
    });
})(jQuery);