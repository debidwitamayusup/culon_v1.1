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
                             <div class="col-md-6 col-lg-6">
                                 <div class="card overflow-hidden">
                                     <div class="card-body">
                                         <canvas id="pieChartReportSumChannel1"
                                             class="donutShadow overflow-hidden"></canvas>
                                     </div>
                                     <div id="legend1" class="legend-con"></div>
                                 </div>
                             </div>
                             <div class="col-md-6 col-lg-6">
                                 <div class="card overflow-hidden">
                                     <div class="card-body">
                                         <div class="d-flex flex-row bd-highlight mb-1">
                                             <div class="p-2 bd-highlight">
                                                 <div class="form-group row">
                                                     <select class="form-control" id="channel_name">
                                                         <option value="ShowAll">Show All</option>
                                                         <option value="Whatsapp">Whatsapp</option>
                                                         <option value="Twitter">Twitter</option>
                                                         <option value="Facebook">Facebook</option>
                                                         <option value="Email">Email</option>
                                                         <option value="Telegram">Telegram</option>
                                                         <option value="Line">Line</option>
                                                         <option value="Voice">Voice</option>
                                                         <option value="Instagram">Instagram</option>
                                                         <option value="Messenger">Messenger</option>
                                                         <option value="Twitter DM">Twitter DM</option>
                                                         <option value="Live Chat">Live Chat</option>
                                                         <option value="SMS">SMS</option>
                                                     </select>
                                                 </div>
                                             </div>
                                             <div class="p-2 bd-highlight">
                                                 <div class="w-70 input-group">
                                                     <div class="input-group-prepend">
                                                         <div class="input-group-text">
                                                             <i class="fas fa-calendar tx-16 lh-0 op-6"></i>
                                                         </div>
                                                     </div><input class="w-55 form-control fc-datepicker"
                                                         placeholder="MM/DD/YYYY" type="text">
                                                 </div>
                                             </div>
                                             <div class="p-2 bd-highlight mt-1">
                                                 <button class="btn btn-sm btn-dark" type="button" id="btn-go"><i
                                                         class="fas fa-filter"></i></button>

                                             </div>
                                             <div class="p-2 bd-highlight mt-1">

                                                 <button class="btn btn-sm btn-primary" type="button" id="btn-go"><i
                                                         class="fas fa-download mr-2"></i>Export</button>

                                             </div>
                                         </div>
                                         <div class="table-responsive">
                                             <table class="table table-striped table-bordered" style="font-size:11px">
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
                                                     <tr>
                                                         <td class="bg-total text-left">Whatsapp</td>
                                                         <td class="text-right">2000</td>
                                                         <td class="text-right">2000</td>
                                                         <td class="text-right">00:30:00</td>
                                                         <td class="text-right">00:30:00</td>
                                                     </tr>
                                                     <tr>
                                                         <td class="bg-total text-left">Facebook</td>
                                                         <td class="text-right">2000</td>
                                                         <td class="text-right">2000</td>
                                                         <td class="text-right">00:30:00</td>
                                                         <td class="text-right">00:30:00</td>
                                                     </tr>
                                                     <tr>
                                                         <td class="bg-total text-left">Twitter</td>
                                                         <td class="text-right">2000</td>
                                                         <td class="text-right">2000</td>
                                                         <td class="text-right">00:30:00</td>
                                                         <td class="text-right">00:30:00</td>
                                                     </tr>
                                                     <tr>
                                                         <td class="bg-total text-left">Twitter DM</td>
                                                         <td class="text-right">2000</td>
                                                         <td class="text-right">2000</td>
                                                         <td class="text-right">00:30:00</td>
                                                         <td class="text-right">00:30:00</td>
                                                     </tr>
                                                     <tr>
                                                         <td class="bg-total text-left">Messenger</td>
                                                         <td class="text-right">2000</td>
                                                         <td class="text-right">2000</td>
                                                         <td class="text-right">00:30:00</td>
                                                         <td class="text-right">00:30:00</td>
                                                     </tr>
                                                     <tr>
                                                         <td class="bg-total text-left">Instagram</td>
                                                         <td class="text-right">2000</td>
                                                         <td class="text-right">2000</td>
                                                         <td class="text-right">00:30:00</td>
                                                         <td class="text-right">00:30:00</td>
                                                     </tr>
                                                     <tr>
                                                         <td class="bg-total text-left">Line</td>
                                                         <td class="text-right">2000</td>
                                                         <td class="text-right">2000</td>
                                                         <td class="text-right">00:30:00</td>
                                                         <td class="text-right">00:30:00</td>
                                                     </tr>
                                                     <tr>
                                                         <td class="bg-total text-left">Telegram</td>
                                                         <td class="text-right">2000</td>
                                                         <td class="text-right">2000</td>
                                                         <td class="text-right">00:30:00</td>
                                                         <td class="text-right">00:30:00</td>
                                                     </tr>
                                                     <tr>
                                                         <td class="bg-total text-left">Email</td>
                                                         <td class="text-right">2000</td>
                                                         <td class="text-right">2000</td>
                                                         <td class="text-right">00:30:00</td>
                                                         <td class="text-right">00:30:00</td>
                                                     </tr>
                                                     <tr>
                                                         <td class="bg-total text-left">Voice</td>
                                                         <td class="text-right">2000</td>
                                                         <td class="text-right">2000</td>
                                                         <td class="text-right">00:30:00</td>
                                                         <td class="text-right">00:30:00</td>
                                                     </tr>
                                                     <tr>
                                                         <td class="bg-total text-left">SMS</td>
                                                         <td class="text-right">2000</td>
                                                         <td class="text-right">2000</td>
                                                         <td class="text-right">00:30:00</td>
                                                         <td class="text-right">00:30:00</td>
                                                     </tr>
                                                     <tr>
                                                         <td class="bg-total text-left">Live Chat</td>
                                                         <td class="text-right">2000</td>
                                                         <td class="text-right">2000</td>
                                                         <td class="text-right">00:30:00</td>
                                                         <td class="text-right">00:30:00</td>
                                                     </tr>
                                                 </tbody>
                                             </table>
                                         </div>
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