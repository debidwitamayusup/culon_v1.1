var base_url = $('#base_url').val();
var v_params_tenant = 'oct_telkomcare';
var d = new Date();
var o = d.getDate();
var n = d.getMonth()+1;
var m = d.getFullYear();
var tenantFromFilter = '';
var v_start_date = '';
var v_end_date = '';
var tenants = [];
var baseImg = '';
if (o < 10) {
  o = '0' + o;
} 
if (n < 10) {
  n = '0' + n;
}

var v_params_today= m + '-' + n + '-' + (o);
var startDateFromFilter = v_params_today;
var endDateFromFilter = v_params_today;
const sessionParams = JSON.parse(sessionStorage.getItem('Auth-infomedia'));

$(document).ready(function () {
    getTenant('')
    $('#start-date').datepicker("setDate", v_params_today);
    $('#end-date').datepicker("setDate", v_params_today);
    startDateFromFilter = v_params_today;
    endDateFromFilter = v_params_today;
    drawTableSumChannel('',v_params_today,v_params_today);
    callDrawPieChart('',v_params_today,v_params_today);
    // $('#tableOperation2').dataTable();
    // callTablePerformOps(v_params_tenant, '', n);
});

function getTenant(date){
    $.ajax({
        type: 'POST',
        url: base_url + 'api/Wallboard/WallboardController/GetTennantscr',
        data: {
            "date" : date
        },

        success: function (r) {
            var data_option = [];
            //dont parse response if using rest controller
            // var response = JSON.parse(r);
            var response = r;
            // console.log(response);
            // tenants = response.data;
            var html = '<option value="">All Tenant</option>';
            // var html = '';
                for(i=0; i<response.data.length; i++){
                    html += '<option value='+response.data[i]+'>'+response.data[i]+'</option>';
                }
                $('#tenant-id').html(html);
        },
        error: function (r) {
            //console.log(r);
            alert("error");
        },
    });
}

function drawTableSumChannel(tenant_id, start_time, end_time, baseImg){
    // $("#filter-loader").fadeIn("slow");
    $('#tableSumChannel').DataTable({
        // processing : true,
        // serverSide : true,
        ajax: {
            url : base_url + 'api/Reporting/ReportController/ReportingSC',
            type : 'POST',
            data :{
                tenant_id: tenant_id,
                start_time: start_time,
                end_time: end_time,
                baseImg: baseImg
            }
        },
        columnDefs: [
            { className: "text-center", targets: 0 },
            { className: "text-left", targets: 1 },
            { className: "text-right", targets: 2 },
            { className: "text-right", targets: 3 },
            { className: "text-right", targets: 4 },
            { className: "text-right", targets: 5 }
        ],
        lengthMenu: [ 13, 25, 50, 75, 100 ],
        destroy: true
    });
    // $("#filter-loader").fadeOut("slow");
}

function exportTableSumChannel(tenant_id, start_time, end_time, name, baseImg){
    $("#filter-loader").fadeIn("slow");
    // window.location = base_url + 'api/Reporting/ReportController/EXPORTSC?tenant_id='+tenant_id+'&start_time='+start_time+'&end_time='+end_time+'&name='+name;
    $.ajax({
        type: 'POST',
        url: base_url + 'api/Reporting/ReportController/EXPORTSC',
        data: {
            "tenant_id" : tenant_id,
            "start_time": start_time,
            "end_time": end_time,
            "name": name,
            "chart_img": baseImg
        }
        ,
        success: function (r) {
            // alert("exported")
            // console.log(r);
            if (r.status != false){
                window.location = r.Link;
            }else{
                alert("Can't Export Empty Data");
            }
            $("#filter-loader").fadeOut("slow");
        },
        error: function (r) {
            //console.log(r);
            alert("can't export");
            $("#filter-loader").fadeOut("slow");
        },
    });
    // const Url = base_url + 'api/Reporting/ReportController/EXPORTSC';
    // const data = {
    //     tenant_id : tenant_id,
    //     start_time: start_time,
    //     end_time: end_time,
    //     name: name,
    //     chart_img: baseImg
    // }
    //  $.post({
    //     url: base_url + 'api/Reporting/ReportController/EXPORTSC',
    //     data: {
    //         "tenant_id" : tenant_id,
    //         "start_time": start_time,
    //         "end_time": end_time,
    //         "name": name,
    //         "chart_img": baseImg
    //     }
    //  });
    // $.post(Url,data, function(data, status){
    //     // console.log(`${data} and status is ${status}`)
    //     // window.location = Url
    // });
    // const Http = new XMLHttpRequest();
    // const url=base_url + 'api/Reporting/ReportController/EXPORTSC';
    // const data = {
    //         tenant_id : tenant_id,
    //         start_time: start_time,
    //         end_time: end_time,
    //         name: name,
    //         chart_img: baseImg
    //     }
    // Http.open("POST", url, data);
    // Http.send();

    // Http.onreadystatechange = (e) => {
    // console.log(Http.responseText)
    // var postData = { checkOne:  tenant_id, start_time, end_time, baseImg};
    // $.ajax({
    //     type: "POST",
    //     url: base_url + 'api/Reporting/ReportController/EXPORTSC',
    //     data: postData,
    //     success: function (data) {
    //         SuccessMessage("file download will start in few second..");
    //         var url = base_url + 'api/Reporting/ReportController/EXPORTSC?data=' + data;
    //         window.location = url;
    //     },
       
    //     traditional: true,
    //     error: function (xhr, status, p3, p4) {
    //         var err = "Error " + " " + status + " " + p3 + " " + p4;
    //         if (xhr.responseText && xhr.responseText[0] == "{")
    //             err = JSON.parse(xhr.responseText).Message;
    //         ErrorMessage(err);
    //     }
    // });
    // var formdata = new FormData();
    // formdata.append("base64image", baseImg)

    // $.ajax({
    //     url: base_url + 'api/Reporting/ReportController/EXPORTSC',
    //     type: "POST",
    //     data: {
    //         tenant_id : tenant_id,
    //         start_time: start_time,
    //         end_time: end_time,
    //         name: name,
    //         chart_img: formdata,
    //         processData: false,
    //         contentType: false
    //     }
    // });
}

function callDrawPieChart(tenant_id, start_time, end_time){
    // $("#filter-loader").fadeIn("slow");
    $.ajax({
        type: 'post',
        url: base_url+'api/Reporting/ReportDiagramsController/ReportingDiagramsSC',
        data: {
            tenant_id: tenant_id,
            start_time: start_time,
            end_time: end_time
        },
        success: function (r) {
            var response = r;
            // console.log(response.data.TOTAL);
            drawPieChartSumChannel(response);
            // $("#filter-loader").fadeOut("slow");
        },
        error: function (r) {
            // console.log(r);
            alert("error");
            // $("#filter-loader").fadeOut("slow");
        },
    });
}

function drawPieChartSumChannel(response){
    $('#pieChartReportSumChannel1').remove(); // this is my <canvas> element
    $('#pieChartReportSumChannelDiv').append('<canvas id="pieChartReportSumChannel1" class="donutShadow overflow-hidden"></canvas>');

    // console.log(response);

    var ctx1 = document.getElementById( "pieChartReportSumChannel1" );
    ctx1.height = 340;
    var myChart1 = new Chart( ctx1, {
        type: 'pie',
        data: {
            datasets: [{
                data: response.data.TOTAL,
                backgroundColor: response.data.CHANNEL_COLOR,
                hoverBackgroundColor: response.data.CHANNEL_COLOR
            } ],
            labels: response.data.CHANNEL_NAME
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            
            legend:{
                    display : false
            },
            tooltips: {
              callbacks: {
                    label: function(tooltipItem, data) {
                        var value = data.datasets[0].data[tooltipItem.index];
                        value = value.toString();
                        value = value.split(/(?=(?:...)*$)/);
                        value = value.join(',');
                        return data.labels[tooltipItem.index]+': '+ value;
                    }
              } // end callbacks:
            },
            pieceLabel:{
                render : 'legend',
                fontColor : '#000',
                position : 'outside',
                segment : true
            },
            legendCallback : function (chart, index){
                var allData = chart.data.datasets[0].data;
                // console.log(chart)
                var legendHtml = [];
                legendHtml.push('<ul><div class="row mt-1 ml-5">');
                allData.forEach(function(data,index){
                    if (allData[index] !=0) {
                        var label = chart.data.labels[index];
                        var dataLabel = allData[index];
                        var background = chart.data.datasets[0].backgroundColor[index]
                        var total = 0;
                        for (var i in allData){
                            total += parseInt(allData[i]);
                        }
                         if(dataLabel != 0){
                            var percentage = parseFloat((dataLabel / total) * 100).toFixed(1);  
                        }else{   
                            var percentage = Math.round((dataLabel / total) * 100);                            
                         }
                        // console.log(total)
                        
                        legendHtml.push('<li class="col-md-12 col-lg-4 col-sm-4 col-xl-4">');
                        legendHtml.push('<span class="chart-legend"><div style="background-color :'+background+'" class="box-legend"></div>'+label+':'+percentage+ '%</span>');
                    } else {
                        var label = chart.data.labels[index];
                        var dataLabel = allData[index];
                        var background = chart.data.datasets[0].backgroundColor[index]
                        var total = 0;
                        for (var i in allData){
                            total += parseInt(allData[i]);
                        }
                        if(dataLabel != 0){
                            var percentage = parseFloat((dataLabel / total) * 100).toFixed(1);     
                         }else{
                            var percentage = Math.round((dataLabel / total) * 100);                            
                         }
                        // console.log(total)
                        // var percentage = Math.round((dataLabel / total) * 100);
                        legendHtml.push('<li class="col-md-12 col-lg-4 col-sm-4 col-xl-4">');
                        legendHtml.push('<span class="chart-legend"><div style="background-color :'+background+'" class="box-legend"></div>'+label+':'+'0'+ '%</span>');
                    }
                    
                })
                legendHtml.push('</ul></div>');
                return legendHtml.join("");
            },
            animation: {
                onComplete : done
            }
        }
    });
    var myLegendContainer1 = document.getElementById("legend1");
    myLegendContainer1.innerHTML = myChart1.generateLegend();

    //generate chart to base 64 image
    function done(){
        baseImg = myChart1.toBase64Image();
    }
}


function setDatePicker() {
    $(".datepicker").datepicker({
        format: "yyyy-mm-dd",
        todayHighlight: true,
        autoclose: true
    }).attr("readonly", "readonly").css({
        "cursor": "pointer",
        "background": "white"
    });
}

function getBase64Image(img) {
    var canvas = document.createElement("canvas");
    canvas.width = img.width;
    canvas.height = img.height;
    var ctx = canvas.getContext("2d");
    ctx.drawImage(img, 0, 0);
    var dataURL = canvas.toDataURL("image/png");
    return dataURL.replace(/^data:image\/(png|jpg);base64,/, "");
  }


(function ($) {
    var date = new Date();
    date.setDate(date.getDate() > 0);
    $('#start-date').datepicker({
        dateFormat: 'yy-mm-dd',
        maxDate: 'now',
        showTodayButton: true,
        showClear: true,
        // minDate: date,
        // onSelect: function (dateText) {
        //  // console.log(this.value);
        //  v_start_date = this.value;
        // }
    });

    $('#end-date').datepicker({
        dateFormat: 'yy-mm-dd',
        maxDate: 'now',
        showTodayButton: true,
        showClear: true,
        // minDate: date,
        // onSelect: function (dateText) {
        //  // console.log(this.value);
        //  v_end_date = this.value;
        // }
    });
    
    $('#btn-export').click(function(){
        // exportTablePerformOps(v_params_tenant, '2', n, sessionParams.NAME);
        tenantFromFilter = $('#tenant-id').val();
        startDateFromFilter = $('#start-date').val();
        endDateFromFilter = $('#end-date').val();
        // var base64 = getBase64Image(document.getElementById("legend1"));
        // console.log(base64);
        exportTableSumChannel(tenantFromFilter, startDateFromFilter, endDateFromFilter, sessionParams.NAME, baseImg.substr(22));
    });

    $('#btn-go').click(function(){
        tenantFromFilter = $('#tenant-id').val();
        startDateFromFilter = $('#start-date').val();
        endDateFromFilter = $('#end-date').val();
        $("#filter-loader").fadeIn("slow");
        drawTableSumChannel($('#tenant-id').val(), $('#start-date').val(), $('#end-date').val());
        callDrawPieChart($('#tenant-id').val(), $('#start-date').val(), $('#end-date').val());
        $("#filter-loader").fadeOut("slow");
    });

    
})(jQuery);