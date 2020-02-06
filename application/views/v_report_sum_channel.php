 <!-- Global Loader-->
 <div id="global-loader"><img src="<?= base_url()?>assets/images/svgs/loader.svg" alt="loader"></div>
 <div class="page">
     <div class="page-main">
         <div class=" app-content mt-6">
             <div class="side-app">
                 <div class="page-header d-flex p-2 bd-highlight">
                     <ol class="breadcrumb">
                         <li class="breadcrumb-item active" aria-current="page">
                             <h4 class="page-title"><i class="fe fe-book mr-1"></i>Report</h4>
                         </li>
                         <li class="breadcrumb-item active mt-2" aria-current="page">Summary Channel</li>
                     </ol>
                 </div>
                 <!--Page Header-->
             </div>

             <!----First Rows--->
             <div class="row">
                 <div class="col-md-12 col-lg-12">
                     <div class="card">
                         <div class="card-header-small">
                             <h5 class="card-title-small card-pt10">Summary Channel</h5>
                         </div>
                         <div class="row">
                             <div class="col-md-12 col-lg-7 col-xl-7">
                                 <div class="card overflow-hidden">
                                     <div class="card-body">
                                         <div class="row">
                                             <div class="col-sm-auto">
                                                 <div class="form-group row">
                                                     <select class="form-control" id="tenant-id">
                                                         <!-- <option value="">All Channel</option>
                                                        <option value="12">Whatsapp</option>
                                                        <option value="6">Facebook</option>
                                                        <option value="8">Twitter</option>
                                                        <option value="13">Twitter DM</option>
                                                        <option value="11">Instagram</option>
                                                        <option value="7">Messenger</option>
                                                        <option value="5">Telegram</option>
                                                        <option value="10">Line</option>
                                                        <option value="2">Email</option>
                                                        <option value="1">Voice</option>
                                                        <option value="3">Live Chat</option>
                                                        <option value="4">SMS</option>
                                                        <option value="15">Chatbot</option>  -->
                                                     </select>
                                                 </div>
                                             </div>
                                             <div class="col-xs-auto ml-1">
                                                 <div class="input-group" style="width:130px">
                                                     <div class="input-group-prepend">
                                                         <div class="input-group-text">
                                                             <i class="fa fa-calendar tx-16 lh-0 op-6"></i>
                                                         </div>
                                                     </div><input class="form-control fc-datepicker" id="start-date"
                                                         placeholder="Start Date" type="text">
                                                 </div>
                                             </div>
                                             <div class="col-xs-auto ml-1">
                                                 <div class="input-group" style="width:130px">
                                                     <div class="input-group-prepend">
                                                         <div class="input-group-text">
                                                             <i class="fas fa-calendar tx-16 lh-0 op-6"></i>
                                                         </div>
                                                     </div><input class="form-control fc-datepicker" id="end-date"
                                                         placeholder="End Date" type="text">
                                                 </div>
                                             </div>
                                             <div class="col-xs-auto ml-1">
                                                 <button class="btn btn-sm btn-dark" type="button" style="height:35px"
                                                     id="btn-go"><i class="fas fa-filter"></i></button>

                                             </div>
                                             <div class="col-xs-auto ml-1">
                                                 <button class="btn btn-sm btn-primary" type="button"
                                                     style="height:35px" id="btn-export"><i
                                                         class="fas fa-download mr-2"></i>Export</button>

                                             </div>
                                         </div>
                                     </div>
                                     <div class="table-responsive" style="padding:10px 15px 10px 15px;">
                                         <table id="tableSumChannel"
                                             class="table table-striped table-bordered fontNunito10">
                                             <thead class="bg-head text-white text-center">
                                                 <tr>
                                                     <td>Channel</td>
                                                     <td>Message In</td>
                                                     <td>Message Out</td>
                                                     <td>Unique Customers</td>
                                                     <td>Total Sessions</td>
                                                 </tr>
                                             </thead>
                                             <tbody class="table-sm">

                                             </tbody>
                                         </table>
                                     </div>
                                 </div>
                             </div>
                             <!-- <div class="col-md-12 col-lg-5 col-xl-5">
                                 <div class="card-pie overflow-hidden">
                                     <div id="legend1" class="legend-con"></div>
                                     <div class="card-body">
                                         <canvas id="pieChartReportSumChannel1"
                                             class="donutShadow overflow-hidden"></canvas>
                                     </div>
                                 </div>
                             </div> -->
                             <div class="col-md-12 col-lg-5 col-xl-5">
                                 <div class="card overflow-hidden">
                                 <div id="legend1" class="legend-con"></div>
                                     <div class="card-body">
                                     <canvas id="pieChartReportSumChannel1"
                                             class="donutShadow overflow-hidden"></canvas>
                                     </div>
                                 </div>
                             </div>
                         </div>

                     </div>
                 </div>
             </div>

             <?php $this->load->view('temp/footer');?>
             <!--Plugin -->
             <script src="<?=base_url()?>assets/public/js/app/app-report-sum-channel.js"></script>