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

                <div class="col-md-12 col-lg-12 col-xl-12">
                    <div class="card">
                        <div class="card-header-small">
                            <h5 class="card-title-small card-pt10">Summary Interval All Channel</h5>
                        </div>
                        <div class="card-body">
                            <div class="row">
                            <div class="col-xs-auto ml-1">
                                    <div class="input-group" style="width:150px">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                <i class="fas fa-calendar tx-16 lh-0 op-6"></i>
                                            </div>
                                        </div><input class="form-control fc-datepicker" placeholder="DD/MM/YYYY"
                                            type="text" id="input-date">
                                    </div>
                                </div>
                                
                                <div class="col-sm-auto ml-2">
                                    <div class="form-group row">
                                        <select class="form-control" id="interval">
                                            <option value="1">1 Jam</option>
                                            <option value="2">3 Jam</option>
                                            <option value="3">6 Jam</option>
                                        </select>
                                    </div>
                                </div>
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
                                    <button class="btn btn-sm btn-dark" type="button" style="height:35px" id="btn-go"><i
                                            class="fas fa-filter"></i></button>

                                </div>
                                <div class="col-xs-auto ml-1">
                                    <button class="btn btn-sm btn-primary" type="button" style="height:35px"
                                        id="btn-export"><i class="fas fa-download mr-2"></i>Export</button>

                                </div>
                            </div>
                        
                        <div class="table-responsive">
                            <table id="tableReportSumInterval" class="table table-striped table-bordered fontNunito12"
                                width="100%">
                                <thead class="text-center text-white bg-head">
                                    <tr>
                                        <td class="wd-15p border-bottom-0 text-center" width="20">No.</td>
                                        <td class="wd-15p border-bottom-0 text-center" width="75">Date</td>
                                        <td class="wd-15p border-bottom-0 text-center" width="100">Interval</td>
                                        <td class="wd-15p border-bottom-0 text-center" width="60">ART</td>
                                        <td class="wd-15p border-bottom-0 text-center" width="60">AHT</td>
                                        <td class="wd-15p border-bottom-0 text-center" width="60">AST</td>
                                        <td class="wd-15p border-bottom-0 text-center">Message In</td>
                                        <td class="wd-15p border-bottom-0 text-center">Message Out</td>
                                        <td class="wd-15p border-bottom-0 text-center">Total Session (COF)</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- <tr>
                                        <td class="text-center">00:00:00</td>
                                        <td class="text-right">00:00:00</td>
                                        <td class="text-right">00:00:00</td>
                                        <td class="text-right">00:00:00</td>
                                        <td class="text-center">200</td>
                                        <td class="text-center">200</td>
                                        <td class="text-center">200</td>
                                    </tr>
                                    <tr>
                                        <td class="text-center">03:00:00</td>
                                        <td class="text-right">00:00:00</td>
                                        <td class="text-right">00:00:00</td>
                                        <td class="text-right">00:00:00</td>
                                        <td class="text-center">200</td>
                                        <td class="text-center">200</td>
                                        <td class="text-center">200</td>
                                    </tr>
                                    <tr>
                                        <td class="text-center">06:00:00</td>
                                        <td class="text-right">00:00:00</td>
                                        <td class="text-right">00:00:00</td>
                                        <td class="text-right">00:00:00</td>
                                        <td class="text-center">200</td>
                                        <td class="text-center">200</td>
                                        <td class="text-center">200</td>
                                    </tr>
                                    <tr>
                                        <td class="text-center">09:00:00</td>
                                        <td class="text-right">00:00:00</td>
                                        <td class="text-right">00:00:00</td>
                                        <td class="text-right">00:00:00</td>
                                        <td class="text-center">200</td>
                                        <td class="text-center">200</td>
                                        <td class="text-center">200</td>
                                    </tr>
                                    <tr>
                                        <td class="text-center">12:00:00</td>
                                        <td class="text-right">00:00:00</td>
                                        <td class="text-right">00:00:00</td>
                                        <td class="text-right">00:00:00</td>
                                        <td class="text-center">200</td>
                                        <td class="text-center">200</td>
                                        <td class="text-center">200</td>
                                    </tr>
                                    <tr>
                                        <td class="text-center">15:00:00</td>
                                        <td class="text-right">00:00:00</td>
                                        <td class="text-right">00:00:00</td>
                                        <td class="text-right">00:00:00</td>
                                        <td class="text-center">200</td>
                                        <td class="text-center">200</td>
                                        <td class="text-center">200</td>
                                    </tr>
                                    <tr>
                                        <td class="text-center">18:00-10.30</td>
                                        <td class="text-right">00:00:00</td>
                                        <td class="text-right">00:00:00</td>
                                        <td class="text-right">00:00:00</td>
                                        <td class="text-center">200</td>
                                        <td class="text-center">200</td>
                                        <td class="text-center">200</td>
                                    </tr>
                                    <tr>
                                        <td class="text-center">21:00-10.30</td>
                                        <td class="text-right">00:00:00</td>
                                        <td class="text-right">00:00:00</td>
                                        <td class="text-right">00:00:00</td>
                                        <td class="text-center">200</td>
                                        <td class="text-center">200</td>
                                        <td class="text-center">200</td>
                                    </tr>
                                    <tr>
                                        <td class="text-center">24:00-10.30</td>
                                        <td class="text-right">00:00:00</td>
                                        <td class="text-right">00:00:00</td>
                                        <td class="text-right">00:00:00</td>
                                        <td class="text-center">200</td>
                                        <td class="text-center">200</td>
                                        <td class="text-center">200</td>
                                    </tr>
                                    <tr>
                                        <td class="text-center">27:00-10.30</td>
                                        <td class="text-right">00:00:00</td>
                                        <td class="text-right">00:00:00</td>
                                        <td class="text-right">00:00:00</td>
                                        <td class="text-center">200</td>
                                        <td class="text-center">200</td>
                                        <td class="text-center">200</td>
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

            <?php $this->load->view('temp/footer');?>
            <!--Plugin -->
            <script src="<?=base_url()?>assets/public/js/app/app-report-sum-interval.js"></script>