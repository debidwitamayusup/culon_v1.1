<body class="app  sidebar-mini">

    <!-- Global Loader-->
    <div id="global-loader"><img src="<?= base_url()?>assets/images/svgs/loader.svg" alt="loader"></div>
    <div class="page">
        <div class="page-main">
            <div class=" app-content mt-7">
                <div class="side-app">
                    <div class="page-header">
                        <h4 class="page-title"><i class="fe fe-home mr-1"></i>Dashboard</h4>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#"></a></li>
                            <li class="breadcrumb-item active" aria-current="page">Summary Ticket Status</li>
                        </ol>
                        <div class="card-options d-none d-sm-block">
                        </div>
                    </div>
                    <!--Page Header-->
                </div>
                <!----Baris Pertama----!-->
                <div class="row">
                    <div class="col-xl-8 col-lg-8 col-md-12">
                        <div class="card overflow-hidden border-0">
                            <div class="card-header-small bg-red">
                                <h5 class="card-title-small card-pt10">Summary Ticket Status Month</h5>
                            </div>
                            <div class="card-body">
                                <div class="d-flex flex-row bd-highlight">
                                    <div class="p-2 bd-highlight">
                                        <div class="wd-200 mb-3">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <select class="form-control" id="month">
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
                                        </div>
                                    </div>
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
                                </div>
                                <!-- <canvas id="echartTicket" class="h-300"></canvas> -->
                                <div class="table-responsive">
                                    <table id="example-2" class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th class="border-bottom-0">No</th>
                                                <th class="border-bottom-0" width="130">Departement
                                                </th>
                                                <th class="border-bottom-0">New</th>
                                                <th class="border-bottom-0">Open</th>
                                                <th class="border-bottom-0">On Progress</th>
                                                <th class="border-bottom-0">Resolve</th>
                                                <th class="border-bottom-0">Reopen</th>
                                                <th class="border-bottom-0">Pending</th>
                                                <th class="border-bottom-0">Close</th>
                                            </tr>
                                        </thead>
                                        <tbody style="font-size:12px !important;">
                                            <tr>
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
                                                <td class="text-left">Data Kontrol</td>
                                                <td class="text-right">10</td>
                                                <td class="text-right">10</td>
                                                <td class="text-right">10</td>
                                                <td class="text-right">10</td>
                                                <td class="text-right">10</td>
                                                <td class="text-right">10</td>
                                                <td class="text-right">10</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-12">
                        <div class="card overflow-hidden">
                            <div class="card-header-small bg-red">
                                <h5 class="card-title-small card-pt10">Proportion Status Ticket</h5>
                            </div>

                            <div class="card-body">
                                <div class="d-flex flex-row bd-highlight">
                                    <div class="p-2 bd-highlight">
                                        <div class="w-75 mb-3">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text">
                                                        <i class="fas fa-calendar tx-16 lh-0 op-6"></i>
                                                    </div>
                                                </div><input id="input-date" class="form-control fc-datepicker"
                                                    placeholder="MM/DD/YYYY" type="text">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <canvas id="pieChart" class="donutShadow overflow-hidden"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <?php $this->load->view('temp/footer');?>
                <!-- <script src="<?=base_url()?>assets/plugins/echart/echart.js"></script> -->
                <script src="<?= base_url()?>assets/public/js/app/app-summary-ticket.js"></script>