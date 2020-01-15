 <!-- Global Loader-->
 <div id="global-loader"><img src="<?= base_url()?>assets/images/svgs/loader.svg" alt="loader"></div>
 <div class="page">
     <div class="page-main">
         <div class=" app-content mt-7">
             <div class="side-app">
                 <div class="page-header d-flex p-2 bd-highlight">
                     <ol class="breadcrumb">
                         <li class="breadcrumb-item active" aria-current="page">
                             <h4 class="page-title"><i class="fe fe-home mr-1"></i>Dashboard</h4>
                         </li>
                         <li class="breadcrumb-item active mt-2" aria-current="page">Operation Performance</li>
                         <li class="breadcrumb-item active mt-2" aria-current="page">Agent Performance</li>
                     </ol>
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
                                 style="height:349px" id="tableSkill">
                                 <thead class="text-center text-white bg-gray1">
                                     <tr>
                                         <th>Skill</th>
                                         <th>ART</th>
                                         <th>AHT</th>
                                         <th>AST</th>
                                     </tr>
                                 </thead>
                                 <tbody class="text-center" style="font-size:12px !important;" id="mytbody_skill">
                                     <!-- <tr>
                                         <td>1</td>
                                         <td>00:00:00</td>
                                         <td>00:00:00</td>
                                         <td>00:00:00</td>
                                     </tr>
                                     <tr>
                                         <td>2</td>
                                         <td>00:00:00</td>
                                         <td>00:00:00</td>
                                         <td>00:00:00</td>
                                     </tr>
                                     <tr>
                                         <td>3</td>
                                         <td>00:00:00</td>
                                         <td>00:00:00</td>
                                         <td>00:00:00</td>
                                     </tr> -->
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
                         <div class="card-body" style="padding:4px;">
                             <div class="row">
                                 <div class="col-md-4">
                                     <div class="card">
                                         <div class="card-header-small bg-red">
                                             <h5 class="card-title-small card-pt10">The Best 5 COF</h5>
                                         </div>
                                         <div class="card-body" style="padding:10px">
                                             <div class="row mb-2">
                                                 <div class="col-2 text-center">
                                                     <span class="avatar avatar-md brround cover-image"
                                                         data-image-src="<?= base_url()?>assets/images/brand/user.jpg"></span>
                                                 </div>
                                                 <div class="col-7 text-center">
                                                     <h5 class="font14 mt-1 mb-3">Jhon Dyer</h5>
                                                     <h6 class="text-muted font10">Agent Name</h6>
                                                 </div>
                                                 <div class="col-3 text-right">
                                                     <h4 class="font-weight-extrabold">90</h4>
                                                     <h6 class="text-muted font10">Handling</h6>
                                                 </div>
                                             </div>
                                             <div class="row mb-2">
                                                 <div class="col-2 text-center">
                                                     <span class="avatar avatar-md brround cover-image"
                                                         data-image-src="<?= base_url()?>assets/images/brand/user.jpg"></span>
                                                 </div>
                                                 <div class="col-7 text-center">
                                                     <h5 class="font14 mt-1 mb-3">Jhon Dyer</h5>
                                                     <h6 class="text-muted font10">Agent Name</h6>
                                                 </div>
                                                 <div class="col-3 text-right">
                                                     <h4 class="font-weight-extrabold">90</h4>
                                                     <h6 class="text-muted font10">Handling</h6>
                                                 </div>
                                             </div>
                                             <div class="row mb-2">
                                                 <div class="col-2 text-center">
                                                     <span class="avatar avatar-md brround cover-image"
                                                         data-image-src="<?= base_url()?>assets/images/brand/user.jpg"></span>
                                                 </div>
                                                 <div class="col-7 text-center">
                                                     <h5 class="font14 mt-1 mb-3">Jhon Dyer</h5>
                                                     <h6 class="text-muted font10">Agent Name</h6>
                                                 </div>
                                                 <div class="col-3 text-right">
                                                     <h4 class="font-weight-extrabold">90</h4>
                                                     <h6 class="text-muted font10">Handling</h6>
                                                 </div>
                                             </div>
                                             <div class="row mb-2">
                                                 <div class="col-2 text-center">
                                                     <span class="avatar avatar-md brround cover-image"
                                                         data-image-src="<?= base_url()?>assets/images/brand/user.jpg"></span>
                                                 </div>
                                                 <div class="col-7 text-center">
                                                     <h5 class="font14 mt-1 mb-3">Jhon Dyer</h5>
                                                     <h6 class="text-muted font10">Agent Name</h6>
                                                 </div>
                                                 <div class="col-3 text-right">
                                                     <h4 class="font-weight-extrabold">90</h4>
                                                     <h6 class="text-muted font10">Handling</h6>
                                                 </div>
                                             </div>
                                             <div class="row mb-2">
                                                 <div class="col-2 text-center">
                                                     <span class="avatar avatar-md brround cover-image"
                                                         data-image-src="<?= base_url()?>assets/images/brand/user.jpg"></span>
                                                 </div>
                                                 <div class="col-7 text-center">
                                                     <h5 class="font14 mt-1 mb-3">Jhon Dyer</h5>
                                                     <h6 class="text-muted font10">Agent Name</h6>
                                                 </div>
                                                 <div class="col-3 text-right">
                                                     <h4 class="font-weight-extrabold">90</h4>
                                                     <h6 class="text-muted font10">Handling</h6>
                                                 </div>
                                             </div>
                                         </div>
                                     </div>
                                 </div>

                                 <div class="col-md-4">
                                     <div class="card">
                                         <div class="card-header-small bg-red">
                                             <h5 class="card-title-small card-pt10">The Best 5 AHT</h5>
                                         </div>
                                         <div class="card-body" style="padding:10px">
                                             <div class="row mb-2">
                                                 <div class="col-2 text-center">
                                                     <span class="avatar avatar-md brround cover-image"
                                                         data-image-src="<?= base_url()?>assets/images/brand/user.jpg"></span>
                                                 </div>
                                                 <div class="col-7 text-center">
                                                     <h5 class="font14 mt-1 mb-3">Jhon Dyer</h5>
                                                     <h6 class="text-muted font10">Agent Name</h6>
                                                 </div>
                                                 <div class="col-3 text-right">
                                                     <h4 class="font-weight-extrabold">90</h4>
                                                     <h6 class="text-muted font10">Handling</h6>
                                                 </div>
                                             </div>
                                             <div class="row mb-2">
                                                 <div class="col-2 text-center">
                                                     <span class="avatar avatar-md brround cover-image"
                                                         data-image-src="<?= base_url()?>assets/images/brand/user.jpg"></span>
                                                 </div>
                                                 <div class="col-7 text-center">
                                                     <h5 class="font14 mt-1 mb-3">Jhon Dyer</h5>
                                                     <h6 class="text-muted font10">Agent Name</h6>
                                                 </div>
                                                 <div class="col-3 text-right">
                                                     <h4 class="font-weight-extrabold">90</h4>
                                                     <h6 class="text-muted font10">Handling</h6>
                                                 </div>
                                             </div>
                                             <div class="row mb-2">
                                                 <div class="col-2 text-center">
                                                     <span class="avatar avatar-md brround cover-image"
                                                         data-image-src="<?= base_url()?>assets/images/brand/user.jpg"></span>
                                                 </div>
                                                 <div class="col-7 text-center">
                                                     <h5 class="font14 mt-1 mb-3">Jhon Dyer</h5>
                                                     <h6 class="text-muted font10">Agent Name</h6>
                                                 </div>
                                                 <div class="col-3 text-right">
                                                     <h4 class="font-weight-extrabold">90</h4>
                                                     <h6 class="text-muted font10">Handling</h6>
                                                 </div>
                                             </div>
                                             <div class="row mb-2">
                                                 <div class="col-2 text-center">
                                                     <span class="avatar avatar-md brround cover-image"
                                                         data-image-src="<?= base_url()?>assets/images/brand/user.jpg"></span>
                                                 </div>
                                                 <div class="col-7 text-center">
                                                     <h5 class="font14 mt-1 mb-3">Jhon Dyer</h5>
                                                     <h6 class="text-muted font10">Agent Name</h6>
                                                 </div>
                                                 <div class="col-3 text-right">
                                                     <h4 class="font-weight-extrabold">90</h4>
                                                     <h6 class="text-muted font10">Handling</h6>
                                                 </div>
                                             </div>
                                             <div class="row mb-2">
                                                 <div class="col-2 text-center">
                                                     <span class="avatar avatar-md brround cover-image"
                                                         data-image-src="<?= base_url()?>assets/images/brand/user.jpg"></span>
                                                 </div>
                                                 <div class="col-7 text-center">
                                                     <h5 class="font14 mt-1 mb-3">Jhon Dyer</h5>
                                                     <h6 class="text-muted font10">Agent Name</h6>
                                                 </div>
                                                 <div class="col-3 text-right">
                                                     <h4 class="font-weight-extrabold">90</h4>
                                                     <h6 class="text-muted font10">Handling</h6>
                                                 </div>
                                             </div>
                                         </div>
                                     </div>
                                 </div>

                                 <div class="col-md-4">
                                     <div class="card">
                                         <div class="card-header-small bg-red">
                                             <h5 class="card-title-small card-pt10">The Best 5 ART</h5>
                                         </div>
                                         <div class="card-body" style="padding:10px">
                                             <div class="row mb-2">
                                                 <div class="col-2 text-center">
                                                     <span class="avatar avatar-md brround cover-image"
                                                         data-image-src="<?= base_url()?>assets/images/brand/user.jpg"></span>
                                                 </div>
                                                 <div class="col-7 text-center">
                                                     <h5 class="font14 mt-1 mb-3">Jhon Dyer</h5>
                                                     <h6 class="text-muted font10">Agent Name</h6>
                                                 </div>
                                                 <div class="col-3 text-right">
                                                     <h4 class="font-weight-extrabold">90</h4>
                                                     <h6 class="text-muted font10">Handling</h6>
                                                 </div>
                                             </div>
                                             <div class="row mb-2">
                                                 <div class="col-2 text-center">
                                                     <span class="avatar avatar-md brround cover-image"
                                                         data-image-src="<?= base_url()?>assets/images/brand/user.jpg"></span>
                                                 </div>
                                                 <div class="col-7 text-center">
                                                     <h5 class="font14 mt-1 mb-3">Jhon Dyer</h5>
                                                     <h6 class="text-muted font10">Agent Name</h6>
                                                 </div>
                                                 <div class="col-3 text-right">
                                                     <h4 class="font-weight-extrabold">90</h4>
                                                     <h6 class="text-muted font10">Handling</h6>
                                                 </div>
                                             </div>
                                             <div class="row mb-2">
                                                 <div class="col-2 text-center">
                                                     <span class="avatar avatar-md brround cover-image"
                                                         data-image-src="<?= base_url()?>assets/images/brand/user.jpg"></span>
                                                 </div>
                                                 <div class="col-7 text-center">
                                                     <h5 class="font14 mt-1 mb-3">Jhon Dyer</h5>
                                                     <h6 class="text-muted font10">Agent Name</h6>
                                                 </div>
                                                 <div class="col-3 text-right">
                                                     <h4 class="font-weight-extrabold">90</h4>
                                                     <h6 class="text-muted font10">Handling</h6>
                                                 </div>
                                             </div>
                                             <div class="row mb-2">
                                                 <div class="col-2 text-center">
                                                     <span class="avatar avatar-md brround cover-image"
                                                         data-image-src="<?= base_url()?>assets/images/brand/user.jpg"></span>
                                                 </div>
                                                 <div class="col-7 text-center">
                                                     <h5 class="font14 mt-1 mb-3">Jhon Dyer</h5>
                                                     <h6 class="text-muted font10">Agent Name</h6>
                                                 </div>
                                                 <div class="col-3 text-right">
                                                     <h4 class="font-weight-extrabold">90</h4>
                                                     <h6 class="text-muted font10">Handling</h6>
                                                 </div>
                                             </div>
                                             <div class="row mb-2">
                                                 <div class="col-2 text-center">
                                                     <span class="avatar avatar-md brround cover-image"
                                                         data-image-src="<?= base_url()?>assets/images/brand/user.jpg"></span>
                                                 </div>
                                                 <div class="col-7 text-center">
                                                     <h5 class="font14 mt-1 mb-3">Jhon Dyer</h5>
                                                     <h6 class="text-muted font10">Agent Name</h6>
                                                 </div>
                                                 <div class="col-3 text-right">
                                                     <h4 class="font-weight-extrabold">90</h4>
                                                     <h6 class="text-muted font10">Handling</h6>
                                                 </div>
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
                             <h5 class="card-title-small card-pt10">Summary Agent Performance SKill</h5>
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
                                 <table id="tableAgent" class="table table-striped table-bordered">
                                     <thead class="text-center">
                                         <tr>
                                             <th class="wd-15p border-bottom-0">ID</th>
                                             <th class="wd-15p border-bottom-0">Agent ID</th>
                                             <th class="wd-15p border-bottom-0" width="130">Agent Name
                                             </th>
                                             <th class="wd-15p border-bottom-0">Skill</th>
                                             <th class="wd-15p border-bottom-0">COF</th>
                                             <th class="wd-15p border-bottom-0">ART</th>
                                             <th class="wd-15p border-bottom-0">AHT</th>
                                             <th class="wd-15p border-bottom-0">AST</th>
                                         </tr>
                                     </thead>
                                     <tbody style="font-size:12px !important;">
                                         <tr>
                                             <td class="text-center">1</td>
                                             <td class="text-center">A28921</td>
                                             <td class="text-left">
                                                 <a href="<?=base_url()?>main/agent_interval">Agent
                                                     Name</a>
                                             </td>
                                             <td class="text-right">
                                                 40
                                             </td>
                                             <td class="text-right">
                                                 90
                                             </td>
                                             <td class="text-right">
                                                 90
                                             </td>
                                             <td class="text-right">
                                                 100
                                             </td>
                                             <td class="text-right">
                                                 100
                                             </td>
                                         </tr>
                                         <tr>
                                             <td class="text-center">2</td>
                                             <td class="text-center">A28921</td>
                                             <td class="text-left">
                                                 <a href="<?=base_url()?>main/agent_interval">Agent
                                                     Name</a>
                                             </td>
                                             <td class="text-right">
                                                 90
                                             </td>
                                             <td class="text-right">
                                                 90
                                             </td>
                                             <td class="text-right">
                                                 90
                                             </td>
                                             <td class="text-right">
                                                 100
                                             </td>
                                             <td class="text-right">
                                                 100
                                             </td>
                                         </tr>
                                         <tr>
                                             <td class="text-center">3</td>
                                             <td class="text-center">A28921</td>
                                             <td class="text-left">Agent Name
                                             </td>
                                             <td class="text-right">
                                                 80
                                             </td>
                                             <td class="text-right">
                                                 80
                                             </td>
                                             <td class="text-right">
                                                 90
                                             </td>
                                             <td class="text-right">
                                                 100
                                             </td>
                                             <td class="text-right">
                                                 100
                                             </td>
                                         </tr>
                                         <tr>
                                             <td class="text-center">4</td>
                                             <td class="text-center">A28921</td>
                                             <td class="text-left">Agent Name
                                             </td>
                                             <td class="text-right">
                                                 90
                                             </td>
                                             <td class="text-right">
                                                 90
                                             </td>
                                             <td class="text-right">
                                                 100
                                             </td>
                                             <td class="text-right">
                                                 100
                                             </td>
                                             <td class="text-right">
                                                 100
                                             </td>
                                         </tr>
                                         <tr>
                                             <td class="text-center">5</td>
                                             <td class="text-center">A28921</td>
                                             <td class="text-left">Agent Name
                                             </td>
                                             <td class="text-right">
                                                 90
                                             </td>
                                             <td class="text-right">
                                                 90
                                             </td>
                                             <td class="text-right">
                                                 90
                                             </td>
                                             <td class="text-right">
                                                 100
                                             </td>
                                             <td class="text-right">
                                                 100
                                             </td>
                                         </tr>
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