 <!-- Global Loader-->
 <div id="global-loader"><img src="<?= base_url()?>assets/images/svgs/loader.svg" alt="loader"></div>
 <div class="page">
     <div class="page-main">
         <div class=" app-content mt-7">
             <div class="side-app">
                 <div class="page-header d-flex bd-highlight">
                     <div class="flex-grow-1 bd-highlight">
                         <ol class="breadcrumb">
                             <li class="breadcrumb-item active" aria-current="page">
                                 <h4 class="page-title"><i class="fe fe-home mr-1"></i>Dashboard</h4>
                             </li>
                             <li class="breadcrumb-item active mt-2" aria-current="page">Ticketing
                             <li class="breadcrumb-item active mt-2" aria-current="page">Ticketing by Unit
                             </li>
                         </ol>
                     </div>
                     <!-- <div class="bd-highlight text-right">
                         <div class="d-flex align-items-end flex-column bd-highlight">
                             <div class="card-options d-none d-sm-block">
                                 <div class="btn-group btn-sm">
                                     <a href="#" class="btn btn-light btn-sm" id="btn-day">
                                         <span class="">Day</a></span>
                                     <a href="#" class="btn btn-light btn-sm" id="btn-month">
                                         <span class="">Month</a></span>
                                     <a href="#" class="btn btn-light btn-sm" id="btn-year">
                                         <span class="">Year</a></span>
                                 </div>
                                 <div class="bd-highlight text-center text-muted tags">
                                     <span class="tag tag-grey justify-content-center box-filter-time">2019-01-29</span>
                                 </div>
                             </div>

                         </div>
                     </div> -->
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
                                         <option value="12" selected>December</option>
                                     </select>
                                 </div>
                                 <div>
                                     <select name="select-year-on-month" id="select-year-on-month" class="form-control">
                                         <option value="2020">2020</option>
                                         <option value="2019" selected>2019</option>
                                         <!-- <option value="2018">2018</option>
                                            <option value="2017">2017</option>
                                            <option value="2016">2016</option>
                                            <option value="2015">2015</option> -->
                                     </select>
                                 </div>
                             </div>

                             <!-- yearly -->
                             <div id="filter-year" class="mt-1 mr-0">
                                 <select name="select-year-only" id="select-year-only" class="form-control">
                                     <option value="2020">2020</option>
                                     <option value="2019" selected>2019</option>
                                     <!-- <option value="2018">2018</option>
                                    <option value="2017">2017</option>
                                    <option value="2016">2016</option>
                                    <option value="2015">2015</option> -->
                                 </select>
                             </div>
                         </div>

                     </div>
                 </div>
             </div>
             <!----Baris Pertama----!-->
             <div class="row">
                 <div class="col-xl-6 col-lg-6 col-md-12">
                     <div class="card overflow-hidden">
                         <div class="card-header-small bg-red">
                             <h5 class="card-title-small card-pt10">Summary Status</h5>
                         </div>
                         <div class="card-pie mt-5">
                             <div class="canvas-con">
                                 <div class="canvas-con-inner" id="canvas-pie">
                                     <canvas id="pieChart" class="donutShadow overflow-hidden"></canvas>
                                 </div>
                                 <div id="legend" class="legend-con"></div>
                             </div>
                         </div>
                     </div>
                 </div>
                 <div class="col-xl-6 col-lg-6 col-md-12">
                     <div class="card">
                         <div class="card-header-small bg-red">
                             <h5 class="card-title-small card-pt10">Ticket Status / Unit</h5>
                         </div>
                         <div class="card-body">
                             <div id="echartTicketUnit" class="chartsh-unit overflow-hidden"></div>
                         </div>
                     </div>

                 </div>
             </div>

             <div class="row">
                 <div class="col-md-12 col-lg-12">
                     <div class="card overflow-hidden">
                         <div class="card-header-small bg-red">
                             <h5 class="card-title-small card-pt10">Summary Close Ticket</h5>
                         </div>
                         <div class="d-flex align-items-end flex-column bd-highlight">
                             <div class="row mb-5 mr-3 mt-2">
                                 <div class="col-md-auto">
                                     <div class="w-100 input-group">
                                         <div class="input-group-prepend">
                                             <div class="input-group-text">
                                                 <i class="fe fe-chrome tx-16 lh-0 op-6"></i>
                                             </div>
                                         </div>
                                         <select name="select-status" id="select-unit" class="w-50 form-control">
                                            <!-- <option value="">All Unit</option>
                                            <option value="1">CC Agent</option>
                                            <option value="2">sads</option> -->
                                             <!-- <option value="#">All Unit</option>
                                             <option value="1">New</option>
                                             <option value="2">Open</option>
                                             <option value="3">Reject</option>
                                             <option value="4">On Progress</option>
                                             <option value="5">Pending</option>
                                             <option value="6">Reopen</option>
                                             <option value="7">Resolve</option>
                                             <option value="8">Close</option> -->
                                         </select>
                                     </div>
                                 </div>
                             </div>
                             <!-- </div> -->
                             <!-- </div> -->
                             <!-- </div> -->
                             <!-- </div> -->



                             <!--    <div class="col-md-12 col-lg-12">

                        <div class="card overflow-hidden border-0">
                            <div class="card-header-small bg-red">
                                <h5 class="card-title-small card-pt10">Status Ticket / Unit</h5>
                            </div>
                            <div class="table-responsive table-bordered table-pt10" id="div_table_ticket">
                                <table class="table card-table table-vcenter table-striped table-hover" id="table_summary_ticket">
                                    <thead class="text-center text-white bg-gray1">
                                        <tr>
                                            <th rowspan="2" class="align-middle">No</th>
                                            <th rowspan="2" class="align-middle">Unit</th>
                                            <th colspan="8">Status</th>
                                        </tr>
                                        <tr>
                                            <th>New</th>
                                            <th>Open</th>
                                            <th>On Progress</th>
                                            <th>Resolve</th>
                                            <th>Reopen</th>
                                            <th>Pending</th>
                                            <th>Close</th>
                                            <th>Reject</th>
                                        </tr>
                                    </thead>
                                    <tbody style="font-size:12px !important;" id="mytbody"> -->
                             <!-- <tr>
                                            <td class="text-center">1</td>
                                            <td class="text-left">Call Center</td>
                                            <td class="text-right">10</td>
                                            <td class="text-right">10</td>
                                            <td class="text-right">10</td>
                                            <td class="text-right">10</td>
                                            <td class="text-right">10</td>
                                            <td class="text-right">10</td>
                                            <td class="text-right">10</td>
                                        </tr>
                                        <tr>
                                            <td class="text-center">2</td>
                                            <td class="text-left">CRM</td>
                                            <td class="text-right">10</td>
                                            <td class="text-right">10</td>
                                            <td class="text-right">10</td>
                                            <td class="text-right">10</td>
                                            <td class="text-right">10</td>
                                            <td class="text-right">10</td>
                                            <td class="text-right">10</td>
                                        </tr>
                                        <tr>
                                            <td class="text-center">3</td>
                                            <td class="text-left">Credit Control</td>
                                            <td class="text-right">10</td>
                                            <td class="text-right">10</td>
                                            <td class="text-right">10</td>
                                            <td class="text-right">10</td>
                                            <td class="text-right">10</td>
                                            <td class="text-right">10</td>
                                            <td class="text-right">10</td>
                                        </tr>
                                        <tr>
                                            <td class="text-center">4</td>
                                            <td class="text-left">Post Link</td>
                                            <td class="text-right">10</td>
                                            <td class="text-right">10</td>
                                            <td class="text-right">10</td>
                                            <td class="text-right">10</td>
                                            <td class="text-right">10</td>
                                            <td class="text-right">10</td>
                                            <td class="text-right">10</td>
                                        </tr>
                                        <tr>
                                            <td class="text-center">5</td>
                                            <td class="text-left">Keuangan</td>
                                            <td class="text-right">10</td>
                                            <td class="text-right">10</td>
                                            <td class="text-right">10</td>
                                            <td class="text-right">10</td>
                                            <td class="text-right">10</td>
                                            <td class="text-right">10</td>
                                            <td class="text-right">10</td>
                                        </tr>
                                        <tr>
                                            <td class="text-center">6</td>
                                            <td class="text-left">Provider Relation</td>
                                            <td class="text-right">10</td>
                                            <td class="text-right">10</td>
                                            <td class="text-right">10</td>
                                            <td class="text-right">10</td>
                                            <td class="text-right">10</td>
                                            <td class="text-right">10</td>
                                            <td class="text-right">10</td>
                                        </tr>
                                        <tr>
                                            <td class="text-center">7</td>
                                            <td class="text-left">Clean Non Health</td>
                                            <td class="text-right">10</td>
                                            <td class="text-right">10</td>
                                            <td class="text-right">10</td>
                                            <td class="text-right">10</td>
                                            <td class="text-right">10</td>
                                            <td class="text-right">10</td>
                                            <td class="text-right">10</td>
                                        </tr>
                                        <tr>
                                            <td class="text-center">8</td>
                                            <td class="text-left">Claim Health</td>
                                            <td class="text-right">10</td>
                                            <td class="text-right">10</td>
                                            <td class="text-right">10</td>
                                            <td class="text-right">10</td>
                                            <td class="text-right">10</td>
                                            <td class="text-right">10</td>
                                            <td class="text-right">10</td>
                                        </tr>
                                        <tr>
                                            <td class="text-center">9</td>
                                            <td class="text-left">Agency Help Line</td>
                                            <td class="text-right">10</td>
                                            <td class="text-right">10</td>
                                            <td class="text-right">10</td>
                                            <td class="text-right">10</td>
                                            <td class="text-right">10</td>
                                            <td class="text-right">10</td>
                                            <td class="text-right">10</td>
                                        </tr>
                                        <tr>
                                            <td class="text-center">10</td>
                                            <td class="text-left">Data Control</td>
                                            <td class="text-right">10</td>
                                            <td class="text-right">10</td>
                                            <td class="text-right">10</td>
                                            <td class="text-right">10</td>
                                            <td class="text-right">10</td>
                                            <td class="text-right">10</td>
                                            <td class="text-right">10</td>
                                        </tr> -->
                             <!--   </tbody>
                                    <tfoot class="font-weight-extrabold text-right bg-total" id="mytfoot">
                                        <tr>
                                            <th colspan="2" class="font-weight-extrabold">Total:</th>
                                            <th id="total_new"></th> -->
                             <!-- <th></th>
                                            <th>100</th>
                                            <th>100</th>
                                            <th>100</th>
                                            <th>100</th>
                                            <th>100</th> -->
                             <!--  </tr>
                                    </tfoot>
                                </table>
                            </div> -->
                             <!-- table-responsive -->
                             <!-- </div>
                    </div>
                </div> -->
                         </div>
                         <div class="card-body" id="echartTicketCloseDiv">
                             <div id="echartTicketClose" class="chartsh overflow-hidden"></div>
                         </div>
                     </div>
                 </div>
             </div>

             <?php $this->load->view('temp/footer');?>
             <!-- <script src="<?=base_url()?>assets/plugins/echart/echart.js"></script> -->
             <script src="<?= base_url()?>assets/public/js/app/app-summary-ticket.js"></script>