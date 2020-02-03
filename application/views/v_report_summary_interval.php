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
                        <li class="breadcrumb-item active mt-2" aria-current="page">Summary Interval</li>
                    </ol>
                </div>
                <!--Page Header-->
            </div>
            <div class="row">

                <div class="col-md-12 col-lg-7 col-xl-7">
                    <div class="card">
                        <div class="card-header-small">
                            <h5 class="card-title-small card-pt10">Summary Interval All Channel</h5>
                        </div>
                        <div class="card-body">
                        <div class="row">
                                             <div class="col-sm-auto">
                                                 <div class="form-group row">
                                                     <select class="form-control" id="channel_name">
                                                         <option value="ShowAll">All Channel</option>
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
                                             <div class="col-xs-auto ml-1">
                                                 <div class="input-group" style="width:150px">
                                                     <div class="input-group-prepend">
                                                         <div class="input-group-text">
                                                             <i class="fas fa-calendar tx-16 lh-0 op-6"></i>
                                                         </div>
                                                     </div><input class="form-control fc-datepicker"
                                                         placeholder="DD/MM/YYYY" type="text">
                                                 </div>
                                             </div>
                                             <div class="col-xs-auto ml-1">
                                                 <button class="btn btn-sm btn-dark" type="button" style="height:35px"
                                                     id="btn-go"><i class="fas fa-filter"></i></button>

                                             </div>
                                             <div class="col-xs-auto ml-1">
                                                 <button class="btn btn-sm btn-primary" type="button"
                                                     style="height:35px" id="btn-go"><i
                                                         class="fas fa-download mr-2"></i>Export</button>

                                             </div>
                                         </div>
                        </div>
                        <div class="table-responsive" style="padding:8px;">
                            <table id="tableReportSumInterval" class="table table-striped table-bordered fontNunito9"
                                width="100%">
                                <thead class="text-center text-white bg-head">
                                    <tr>
                                        <td class="wd-15p border-bottom-0">No</td>
                                        <td class="wd-15p border-bottom-0" width="130">Date</td>
                                        <td class="wd-15p border-bottom-0">Channel</td>
                                        <td class="wd-15p border-bottom-0">Message In</td>
                                        <td class="wd-15p border-bottom-0">Message Out</td>
                                        <td class="wd-15p border-bottom-0">ART</td>
                                        <td class="wd-15p border-bottom-0">AHT</td>
                                        <td class="wd-15p border-bottom-0">AST</td>
                                    </tr>
                                </thead>
                                <tbody style="font-size:12px !important;">
                                    <tr>
                                        <td class="text-center">1</td>
                                        <td class="text-center">2020-01-01</td>
                                        <td class="text-left">Facebook</td>
                                        <td class="text-center">200</td>
                                        <td class="text-center">200</td>
                                        <td class="text-right">00:00:00</td>
                                        <td class="text-right">00:00:00</td>
                                        <td class="text-right">00:00:00</td>
                                    </tr>
                                    <tr>
                                        <td class="text-center">2</td>
                                        <td class="text-center">2020-01-01</td>
                                        <td class="text-left">Facebook</td>
                                        <td class="text-center">200</td>
                                        <td class="text-center">200</td>
                                        <td class="text-right">00:00:00</td>
                                        <td class="text-right">00:00:00</td>
                                        <td class="text-right">00:00:00</td>
                                    </tr>
                                    <tr>
                                        <td class="text-center">3</td>
                                        <td class="text-center">2020-01-01</td>
                                        <td class="text-left">Facebook</td>
                                        <td class="text-center">200</td>
                                        <td class="text-center">200</td>
                                        <td class="text-right">00:00:00</td>
                                        <td class="text-right">00:00:00</td>
                                        <td class="text-right">00:00:00</td>
                                    </tr>
                                    <tr>
                                        <td class="text-center">4</td>
                                        <td class="text-center">2020-01-01</td>
                                        <td class="text-left">Facebook</td>
                                        <td class="text-center">200</td>
                                        <td class="text-center">200</td>
                                        <td class="text-right">00:00:00</td>
                                        <td class="text-right">00:00:00</td>
                                        <td class="text-right">00:00:00</td>
                                    </tr>
                                    <tr>
                                        <td class="text-center">5</td>
                                        <td class="text-center">2020-01-01</td>
                                        <td class="text-left">Facebook</td>
                                        <td class="text-center">200</td>
                                        <td class="text-center">200</td>
                                        <td class="text-right">00:00:00</td>
                                        <td class="text-right">00:00:00</td>
                                        <td class="text-right">00:00:00</td>
                                    </tr>
                                    <tr>
                                        <td class="text-center">6</td>
                                        <td class="text-center">2020-01-01</td>
                                        <td class="text-left">Facebook</td>
                                        <td class="text-center">200</td>
                                        <td class="text-center">200</td>
                                        <td class="text-right">00:00:00</td>
                                        <td class="text-right">00:00:00</td>
                                        <td class="text-right">00:00:00</td>
                                    </tr>
                                    <tr>
                                        <td class="text-center">7</td>
                                        <td class="text-center">2020-01-01</td>
                                        <td class="text-left">Facebook</td>
                                        <td class="text-center">200</td>
                                        <td class="text-center">200</td>
                                        <td class="text-right">00:00:00</td>
                                        <td class="text-right">00:00:00</td>
                                        <td class="text-right">00:00:00</td>
                                    </tr>
                                    <tr>
                                        <td class="text-center">8</td>
                                        <td class="text-center">2020-01-01</td>
                                        <td class="text-left">Facebook</td>
                                        <td class="text-center">200</td>
                                        <td class="text-center">200</td>
                                        <td class="text-right">00:00:00</td>
                                        <td class="text-right">00:00:00</td>
                                        <td class="text-right">00:00:00</td>
                                    </tr>
                                    <tr>
                                        <td class="text-center">9</td>
                                        <td class="text-center">2020-01-01</td>
                                        <td class="text-left">Facebook</td>
                                        <td class="text-center">200</td>
                                        <td class="text-center">200</td>
                                        <td class="text-right">00:00:00</td>
                                        <td class="text-right">00:00:00</td>
                                        <td class="text-right">00:00:00</td>
                                    </tr>
                                    <tr>
                                        <td class="text-center">10</td>
                                        <td class="text-center">2020-01-01</td>
                                        <td class="text-left">Facebook</td>
                                        <td class="text-center">200</td>
                                        <td class="text-center">200</td>
                                        <td class="text-right">00:00:00</td>
                                        <td class="text-right">00:00:00</td>
                                        <td class="text-right">00:00:00</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
                <div class="col-md-12 col-lg-5 col-xl-5">
                    <div class="card overflow-hidden">
                        <div class="card-header-small">
                            <h5 class="card-title-small card-pt10">Summary Interval</h5>
                        </div>
                        <div id="legend" class="legend-con"></div>
                        <div class="card-body mb-9 mt-6">
                            <canvas id="pieChartReportSumInterval" class="donutShadow overflow-hidden"></canvas>
                        </div>

                    </div>
                </div>
            </div>

            <?php $this->load->view('temp/footer');?>
            <!--Plugin -->
            <script src="<?=base_url()?>assets/public/js/app/app-report-sum-interval.js"></script>