 <!-- Global Loader-->
 <div id="global-loader"><img src="<?= base_url()?>assets/images/svgs/loader.svg" alt="loader"></div>
 <div class="page">
     <div class="page-main">
         <div class=" app-content mt-6">
             <div class="side-app">
                 <div class="page-header d-flex p-2 bd-highlight">
                     <ol class="breadcrumb">
                         <li class="breadcrumb-item active" aria-current="page">
                             <h4 class="page-title"><i class="fe fe-home mr-1"></i>Dashboard</h4>
                         </li>
                         <!-- <li class="breadcrumb-item active mt-2" aria-current="page">Operation Performance</li> -->
                         <li class="breadcrumb-item active mt-2" aria-current="page">Agent Performance</li>
                     </ol>
                     <div class="d-flex align-items-end flex-column bd-highlight">
                         <div class="bd-highlight">
                             <div class="card-options d-none d-sm-block">
                                 <div class="btn-group text-center btn-sm">
                                     <a href="#" class="btn btn-light btn-sm" id="btn-day">
                                         <span class="">Day</a></span>
                                     <a href="#" class="btn btn-light btn-sm" id="btn-month">
                                         <span class="">Month</a></span>
                                     <a href="#" class="btn btn-light btn-sm" id="btn-year">
                                         <span class="">Year</a></span>
                                 </div>
                             </div>
                         </div>
                         <div class="bd-highlight">
                             <!-- daily -->
                             <div id="filter-date" class="mt-1 mr-0">
                                 <input id="input-date-filter" class="w-50 ml-auto form-control fc-datepicker"
                                     placeholder="MM/DD/YYYY" type="text">
                             </div>

                             <!-- monthly -->
                             <div id="filter-month" class="row mt-1 mr-0">
                                 <div class="col-md-auto">
                                     <select name="select-month" id="select-month" class="form-control">
                                         <option value="1">January</option>
                                         <option value="2">February</option>
                                         <option value="3">March</option>
                                         <option value="4">April</option>
                                         <option value="5">May</option>
                                         <option value="6">June</option>
                                         <option value="7">July</option>
                                         <option value="8">August</option>
                                         <option value="9">September</option>
                                         <option value="10">October</option>
                                         <option value="11">November</option>
                                         <option value="12">December</option>
                                     </select>
                                 </div>
                                 <div>
                                     <select name="select-year-on-month" id="select-year-on-month" class="form-control">
                                         <option value="2020">2020</option>
                                         <option value="2019">2019</option>

                                     </select>
                                 </div>
                             </div>

                             <!-- yearly -->
                             <div id="filter-year" class="mt-1 mr-0">
                                 <select name="select-year-only" id="select-year-only" class="form-control">
                                     <option value="2020">2020</option>
                                     <option value="2019" selected>2019</option>

                                 </select>
                             </div>
                         </div>
                     </div>
                     <!--Page Header-->
                 </div>

                 <!----First Rows--->

                 <!---Next Rows---->
                 <div class="row">
                     <div class="col-md-3">
                         <div class="card">
                             <div class="card-header-small bg-red">
                                 <h5 class="card-title-small card-pt10">Performance by Skill</h5>
                             </div>
                             <div class="table-responsive table-pt10">
                                 <table class="table card-table table-striped table-vcenter table-hover table-pt10"
                                     style="height:310px" id="tableSkill">
                                     <thead class="text-center text-white bg-gray1">
                                         <tr>
                                             <th>Skill</th>
                                             <th>ART</th>
                                             <th>AHT</th>
                                             <th>AST</th>
                                         </tr>
                                     </thead>
                                     <tbody class="text-center" style="font-size:12px !important;" id="mytbody_skill">

                                     </tbody>
                                 </table>
                             </div>
                             <!-- table-responsive -->
                         </div>
                     </div>
                     <div class="col-md-9">
                         <div class="card">
                             <div class="card-header-small bg-red">
                                 <h5 class="card-title-small card-pt10">Best Agent Performance</h5>
                             </div>
                             <div class="card-body height-agent">
                                 <div class="row">
                                     <div class="col-md-4">
                                         <div class="card height-card">
                                             <div class="card-header-small bg-red">
                                                 <h5 class="card-title-small card-pt10" id="drawCOF">The Best 5 COF</h5>
                                             </div>
                                             <div class="card-body" id="classDrawCOF" style="padding:10px">
                                                 <div class="row mb-3" id="dataDrawCOF">

                                                 </div>
                                             </div>
                                         </div>
                                     </div>

                                     <div class="col-md-4">
                                         <div class="card height-card">
                                             <div class="card-header-small bg-red">
                                                 <h5 class="card-title-small card-pt10" id="drawAHT">The Best 5 AHT</h5>
                                             </div>
                                             <div class="card-body" id="classDrawAHT" style="padding:10px">
                                                 <div class="row mb-3" id="dataDrawAHT">

                                                 </div>
                                             </div>
                                         </div>
                                     </div>

                                     <div class="col-md-4">
                                         <div class="card height-card">
                                             <div class="card-header-small bg-red">
                                                 <h5 class="card-title-small card-pt10" id="drawART">The Best 5 ART</h5>
                                             </div>
                                             <div class="card-body" id="classDrawART" style="padding:10px">
                                                 <div class="row mb-3" id="dataDrawART">

                                                 </div>
                                             </div>
                                         </div>
                                     </div>

                                 </div>
                             </div>
                         </div>
                     </div>
                 </div>
                 <div class="row">
                     <div class="col-md-12 col-lg-12">
                         <div class="card">
                             <div class="card-header-small bg-red">
                                 <h5 class="card-title-small card-pt10">Summary Agent Performance Skill</h5>
                             </div>
                             <div class="card-body">
                                 <!-- <div class="row mb-5">
                                 <div class="col-md-3">
                                     <div class="w-75 input-group">
                                         <div class="input-group-prepend">
                                             <div class="input-group-text">
                                                 <i class="fe fe-activity tx-16 lh-0 op-6"></i>
                                             </div>
                                         </div>
                                         <select name="select-channel" id="select-channel" class="w-75 form-control">
                                             <option value="#">All Channel</option>
                                             <option value="1">Whatsapp</option>
                                             <option value="2">Instagram</option>
                                             <option value="3">Facebook</option>
                                             <option value="4">Twitter</option>
                                             <option value="5">Messenger</option>
                                             <option value="6">Telegram</option>
                                             <option value="7">Twitter DM</option>
                                             <option value="8">Email</option>
                                             <option value="9">Voice</option>
                                             <option value="10">Line</option>
                                             <option value="11">SMS</option>
                                             <option value="12">Live Chat</option>
                                         </select>
                                     </div>
                                 </div>
                             </div> -->
                                 <div class="table-responsive">
                                     <table id="tableAgent" class="table table-striped table-bordered"
                                         style="width:100%">
                                         <thead class="text-center">
                                             <tr>
                                                 <th class="wd-15p border-bottom-0">No</th>
                                                 <th class="wd-15p border-bottom-0" style="width:10%">Agent ID</th>
                                                 <th class="wd-15p border-bottom-0" style="width:30%">Agent Name</th>
                                                 <th class="wd-15p border-bottom-0">Skill</th>
                                                 <th class="wd-15p border-bottom-0">COF
                                                 </th>
                                                 <th class="wd-15p border-bottom-0" style="width:10%">ART</th>
                                                 <th class="wd-15p border-bottom-0" style="width:10%">AHT</th>
                                                 <th class="wd-15p border-bottom-0" style="width:10%">AST</th>
                                             </tr>
                                         </thead>
                                         <tbody style="font-size:12px !important;" id="mytbody">
                                         </tbody>
                                     </table>
                                 </div>
                             </div>
                         </div>
                     </div>
                 </div>
                 <?php $this->load->view('temp/footer');?>
                 <!--Plugin -->
                 <script src="<?=base_url()?>assets/public/js/app/app-agent-performance.js"></script>