<div class=" app-content">
    <div class="side-app">
        <div class="page-header d-flex p-2 bd-highlight">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active" aria-current="page">
                    <h4 class="page-title"><i class="si si-layers mr-1"></i>Report</h4>
                </li>
                <li class="breadcrumb-item active mt-2" aria-current="page">Summary Interval by Month<li>
            </ol>
        </div>
        <!--Page Header-->

        <div class="row">

            <div class="col-md-12 col-lg-12 col-xl-12">
                <div class="card">
                    <div class="card-header-small">
                        <h5 class="card-title-small card-pt10">Summary Interval by Month</h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-auto ml-1">
                                <div class="form-group row">
                                    <select class="form-control" id="month_name">
                                        <option value="01">January</option>
                                        <option value="02">February</option>
                                        <option value="03">March</option>
                                        <option value="04">April</option>
                                        <option value="05">May</option>
                                        <option value="06">June</option>
                                        <option value="07">July</option>
                                        <option value="08">August</option>
                                        <option value="09">September</option>
                                        <option value="10">October</option>
                                        <option value="11">November</option>
                                        <option value="12">December</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-auto ml-2">
                                <div class="form-group row">
                                    <select class="form-control" id="layanan_name">
                                        <!-- <option value="ShowAll">All Layanan</option>
                                        <option value="1">Telkom</option>
                                        <option value="2">Telkomsel</option>
                                        <option value="3">BRI</option> -->
                                    </select>
                                </div>
                            </div>
                            <!-- <div class="col-sm-auto ml-2">
                                 <div class="form-group row">
                                     <select class="form-control" id="interval">
                                         <option value="1">1 Jam</option>
                                         <option value="3">3 Jam</option>
                                         <option value="6">6 Jam</option>
                                     </select>
                                 </div>
                             </div> -->
                            <div class="col-sm-auto ml-1">
                                <div class="form-group row">
                                    <select class="form-control" id="channel_name">
                                        <option value="">All Channel</option>
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
                                        <option value="15">Chatbot</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-xs-auto ml-1">
                                <button class="btn btn-sm btn-grey" type="button" style="height:35px" id="btn-go"><i
                                        class="fas fa-filter"></i></button>

                            </div>
                            <div class="col-xs-auto ml-1">
                                <button class="btn btn-sm btn-primary" type="button" style="height:35px"
                                    id="btn-export"><i class="fas fa-download mr-2"></i>Export</button>

                            </div>
                        </div>

                        <div class="table-responsive">
                            <table id="tableReportSumIntervalMonth" class="table-sm table table-striped table-bordered fontNunito12"
                                width="100%">
                                <thead class="text-center text-white bg-head">
                                    <tr>
                                        <td class="wd-15p border-bottom-0 text-center" width="20">No.</td>
                                        <!-- <td class="wd-15p border-bottom-0 text-center" width="75">Date</td> -->
                                        <td class="wd-15p border-bottom-0 text-center" width="50">Days</td>
                                        <td class="wd-15p border-bottom-0 text-center" width="80">ART</td>
                                        <td class="wd-15p border-bottom-0 text-center" width="80">AHT</td>
                                        <td class="wd-15p border-bottom-0 text-center" width="80">AST</td>
                                        <td class="wd-15p border-bottom-0 text-center" width="100">Message In</td>
                                        <td class="wd-15p border-bottom-0 text-center" width="100">Message Out</td>
                                        <td class="wd-15p border-bottom-0 text-center" width="80">SCR
                                        </td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- <tr>
                                        <td class="text-center">1</td>
                                        <td class="text-center">10-11</td>
                                        <td class="text-right">00:00:00</td>
                                        <td class="text-right">00:00:00</td>
                                        <td class="text-right">00:00:00</td>
                                        <td class="text-center">200</td>
                                        <td class="text-center">200</td>
                                        <td class="text-center">90%</td>
                                    </tr>
                                    <tr>
                                        <td class="text-center">2</td>
                                        <td class="text-center">11-12</td>
                                        <td class="text-right">00:00:00</td>
                                        <td class="text-right">00:00:00</td>
                                        <td class="text-right">00:00:00</td>
                                        <td class="text-center">200</td>
                                        <td class="text-center">200</td>
                                        <td class="text-center">90%</td>
                                    </tr>
                                    <tr>
                                        <td class="text-center">3</td>
                                        <td class="text-center">12-13</td>
                                        <td class="text-right">00:00:00</td>
                                        <td class="text-right">00:00:00</td>
                                        <td class="text-right">00:00:00</td>
                                        <td class="text-center">200</td>
                                        <td class="text-center">200</td>
                                        <td class="text-center">90%</td>
                                    </tr>
                                    <tr>
                                        <td class="text-center">4</td>
                                        <td class="text-center">13-14</td>
                                        <td class="text-right">00:00:00</td>
                                        <td class="text-right">00:00:00</td>
                                        <td class="text-right">00:00:00</td>
                                        <td class="text-center">200</td>
                                        <td class="text-center">200</td>
                                        <td class="text-center">90%</td>
                                    </tr>
                                    <tr>
                                        <td class="text-center">5</td>
                                        <td class="text-center">15-16</td>
                                        <td class="text-right">00:00:00</td>
                                        <td class="text-right">00:00:00</td>
                                        <td class="text-right">00:00:00</td>
                                        <td class="text-center">200</td>
                                        <td class="text-center">200</td>
                                        <td class="text-center">90%</td>
                                    </tr>
                                    <tr>
                                        <td class="text-center">6</td>
                                        <td class="text-center">17-18</td>
                                        <td class="text-right">00:00:00</td>
                                        <td class="text-right">00:00:00</td>
                                        <td class="text-right">00:00:00</td>
                                        <td class="text-center">200</td>
                                        <td class="text-center">200</td>
                                        <td class="text-center">90%</td>
                                    </tr>
                                    <tr>
                                        <td class="text-center">7</td>
                                        <td class="text-center">18-19</td>
                                        <td class="text-right">00:00:00</td>
                                        <td class="text-right">00:00:00</td>
                                        <td class="text-right">00:00:00</td>
                                        <td class="text-center">200</td>
                                        <td class="text-center">200</td>
                                        <td class="text-center">90%</td>
                                    </tr>
                                    <tr>
                                        <td class="text-center">8</td>
                                        <td class="text-center">20-21</td>
                                        <td class="text-right">00:00:00</td>
                                        <td class="text-right">00:00:00</td>
                                        <td class="text-right">00:00:00</td>
                                        <td class="text-center">200</td>
                                        <td class="text-center">200</td>
                                        <td class="text-center">90%</td>
                                    </tr>
                                    <tr>
                                        <td class="text-center">9</td>
                                        <td class="text-center">22-23</td>
                                        <td class="text-right">00:00:00</td>
                                        <td class="text-right">00:00:00</td>
                                        <td class="text-right">00:00:00</td>
                                        <td class="text-center">200</td>
                                        <td class="text-center">200</td>
                                        <td class="text-center">90%</td>
                                    </tr>
                                    <tr>
                                        <td class="text-center">10</td>
                                        <td class="text-center">24-25</td>
                                        <td class="text-right">00:00:00</td>
                                        <td class="text-right">00:00:00</td>
                                        <td class="text-right">00:00:00</td>
                                        <td class="text-center">200</td>
                                        <td class="text-center">200</td>
                                        <td class="text-center">90%</td>
                                    </tr> -->
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- <div class="col-md-12 col-lg-5 col-xl-5">
                    <div class="card overflow-hidden">
                        <div class="card-header-small">
                            <h5 class="card-title-small card-pt10">Summary Interval</h5>
                        </div>
                        <div id="legend" class="legend-con"></div>
                        <div class="card-body mb-9 mt-6">
                            <canvas id="pieChartReportSumInterval" class="donutShadow overflow-hidden"></canvas>
                        </div>

                    </div>
                </div> -->
        </div>
    </div>
    <?php $this->load->view('temp/footer');?>
    <!--Plugin -->
    <script src="<?=base_url()?>assets/public/js/app/app-report-sum-interval-month.js"></script>