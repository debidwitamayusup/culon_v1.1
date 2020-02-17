<div class=" app-content">
    <div class="side-app">
        <div class="page-header d-flex p-2 bd-highlight">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active" aria-current="page">
                    <h4 class="page-title"><i class="fe fe-book mr-1"></i>Report</h4>
                </li>
                <li class="breadcrumb-item active mt-2" aria-current="page">Summary Performance Operation</li>
            </ol>
        </div>
        <!--Page Header-->

        <div class="row">
            <div class="col-md-12 col-lg-12 col-xl-12">
                <div class="card">
                    <div class="card-header-small">
                        <h5 class="card-title-small card-pt10">Summary Performance Operation</h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-auto ml-1">
                                <div class="form-group row">
                                    <select class="form-control" id="layanan_name">
                                        <!-- <option value="">Semua Layanan</option>
                                            <option value="oct_telkomcare">Telkom Care</option>
                                            <option value="oct_bri">BRI</option>
                                            <option value="oct_telkomsel">Telkomsel</option> -->
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
                            <div class="col-sm-auto ml-1">
                                <div class="form-group row">
                                    <select class="form-control" id="month_name">
                                        <option value="">All Month</option>
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
                    </div>
                    <div class="table-responsive" style="padding:12px;">
                        <table id="tableOperation2" class="table table-striped table-bordered fontNunito12"
                            width="100%">
                            <thead class="text-center text-white bg-head">
                                <tr>
                                    <td class="wd-15p border-bottom-0 text-center" width="20">No</td>
                                    <td class="wd-15p border-bottom-0 text-center">Date</td>
                                    <td class="wd-15p border-bottom-0 text-center">COF</td>
                                    <td class="wd-15p border-bottom-0 text-center">ART</td>
                                    <td class="wd-15p border-bottom-0 text-center">AHT</td>
                                    <td class="wd-15p border-bottom-0 text-center">AST</td>
                                    <td class="wd-15p border-bottom-0 text-center">SCR</td>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- <tr>
                                        <td class="text-center">1</td>
                                        <td class="text-center">2020-01-01</td>
                                        <td class="text-right">200</td>
                                        <td class="text-center">00:00:00</td>
                                        <td class="text-center">00:00:00</td>
                                        <td class="text-center">00:00:00</td>
                                        <td class="text-center">100%</td>
                                    </tr>
                                    <tr>
                                        <td class="text-center">2</td>
                                        <td class="text-center">2020-01-01</td>
                                        <td class="text-right">200</td>
                                        <td class="text-center">00:00:00</td>
                                        <td class="text-center">00:00:00</td>
                                        <td class="text-center">00:00:00</td>
                                        <td class="text-center">100%</td>
                                    </tr>
                                    <tr>
                                        <td class="text-center">3</td>
                                        <td class="text-center">2020-01-01</td>
                                        <td class="text-right">200</td>
                                        <td class="text-center">00:00:00</td>
                                        <td class="text-center">00:00:00</td>
                                        <td class="text-center">00:00:00</td>
                                        <td class="text-center">100%</td>
                                    </tr>
                                    <tr>
                                        <td class="text-center">4</td>
                                        <td class="text-center">2020-01-01</td>
                                        <td class="text-right">200</td>
                                        <td class="text-center">00:00:00</td>
                                        <td class="text-center">00:00:00</td>
                                        <td class="text-center">00:00:00</td>
                                        <td class="text-center">100%</td>
                                    </tr>
                                    <tr>
                                        <td class="text-center">5</td>
                                        <td class="text-center">2020-01-01</td>
                                        <td class="text-right">200</td>
                                        <td class="text-center">00:00:00</td>
                                        <td class="text-center">00:00:00</td>
                                        <td class="text-center">00:00:00</td>
                                        <td class="text-center">100%</td>
                                    </tr>
                                    <tr>
                                        <td class="text-center">6</td>
                                        <td class="text-center">2020-01-01</td>
                                        <td class="text-right">200</td>
                                        <td class="text-center">00:00:00</td>
                                        <td class="text-center">00:00:00</td>
                                        <td class="text-center">00:00:00</td>
                                        <td class="text-center">100%</td>
                                    </tr>
                                    <tr>
                                        <td class="text-center">7</td>
                                        <td class="text-center">2020-01-01</td>
                                        <td class="text-right">200</td>
                                        <td class="text-center">00:00:00</td>
                                        <td class="text-center">00:00:00</td>
                                        <td class="text-center">00:00:00</td>
                                        <td class="text-center">100%</td>
                                    </tr>
                                    <tr>
                                        <td class="text-center">8</td>
                                        <td class="text-center">2020-01-01</td>
                                        <td class="text-right">200</td>
                                        <td class="text-center">00:00:00</td>
                                        <td class="text-center">00:00:00</td>
                                        <td class="text-center">00:00:00</td>
                                        <td class="text-center">100%</td>
                                    </tr>
                                    <tr>
                                        <td class="text-center">9</td>
                                        <td class="text-center">2020-01-01</td>
                                        <td class="text-right">200</td>
                                        <td class="text-center">00:00:00</td>
                                        <td class="text-center">00:00:00</td>
                                        <td class="text-center">00:00:00</td>
                                        <td class="text-center">100%</td>
                                    </tr>
                                    <tr>
                                        <td class="text-center">10</td>
                                        <td class="text-center">2020-01-01</td>
                                        <td class="text-right">200</td>
                                        <td class="text-center">00:00:00</td>
                                        <td class="text-center">00:00:00</td>
                                        <td class="text-center">00:00:00</td>
                                        <td class="text-center">100%</td>
                                    </tr> -->
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <?php $this->load->view('temp/footer');?>
    <!--Plugin -->
    <script src="<?=base_url()?>assets/public/js/app/app-report-perform-operation.js"></script>