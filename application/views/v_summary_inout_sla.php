<body class="app  sidebar-mini">

    <!-- Global Loader-->
    <div id="global-loader"><img src="<?= base_url()?>assets/images/svgs/loader.svg" alt="loader"></div>
    <div class="page">
        <div class="page-main">
            <div class=" app-content mt-7">
                <div class="side-app">
                    <div class="page-header d-flex p-2 bd-highlight">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item active" aria-current="page">
                                <h4 class="page-title"><i class="fe fe-grid mr-1"></i>Wallboard</h4>
                            </li>
                            <li class="breadcrumb-item active mt-2" aria-current="page">Summary In / Out SLA</li>
                        </ol>
                    </div>
                    <!--Page Header-->
                </div>
                <!---Next Rows---->
                <div class="row">
                    <div class="col-md-12 col-lg-4">
                        <div class="card">
                            <div class="card-header-small bg-red">
                                <h5 class="card-title-small card-pt10">Summary SLA</h5>
                            </div>
                            <div class="card-body">
                                <canvas id="pieSummarySla" class="donutShadow overflow-hidden"></canvas>

                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 col-lg-4">
                        <div class="card">
                            <div class="card-header-small bg-red">
                                <h5 class="card-title-small card-pt10">Top ten by unit</h5>
                            </div>
                            <div class="card-body">
                                <div id="echartTopUnit" class="chartsh overflow-hidden"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 col-lg-4">
                        <div class="card">
                            <div class="card-header-small bg-red">
                                <h5 class="card-title-small card-pt10">Top ten by category</h5>
                            </div>
                            <div class="card-body">
                                <div id="echartTopCategory" class="chartsh overflow-hidden"></div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="row">
                    <div class="col-md-12 col-lg-6">
                        <div class="card">
                            <div class="card-header-small bg-red">
                                <h5 class="card-title-small card-pt10">Ticket In SLA</h5>
                            </div>
                            <div class="table-responsive table-bordered table-pt10">
                                <table class="table card-table table-vcenter table-hover"
                                    style="height:616px !important;">
                                    <thead class="text-center text-white bg-sign">
                                        <tr>
                                            <th>No</th>
                                            <th>Ticket ID</th>
                                            <th>Create Date</th>
                                            <th>Status</th>
                                            <th>Durasi</th>
                                        </tr>
                                    </thead>
                                    <tbody style="font-size:12px !important;">
                                        <tr>
                                            <td class="text-center">1</td>
                                            <td class="text-left">TD205A</td>
                                            <td class="text-right">2020-01-01</td>
                                            <td class="text-right">Open</td>
                                            <td class="text-right">10:18:10</td>
                                        </tr>
                                        <tr>
                                            <td class="text-center">2</td>
                                            <td class="text-left">TD205A</td>
                                            <td class="text-right">2020-01-01</td>
                                            <td class="text-right">Close</td>
                                            <td class="text-right">10:18:10</td>
                                        </tr>
                                        <tr>
                                            <td class="text-center">3</td>
                                            <td class="text-left">TD205A</td>
                                            <td class="text-right">2020-01-01</td>
                                            <td class="text-right">Reopen</td>
                                            <td class="text-right">10:18:10</td>
                                        </tr>
                                        <tr>
                                            <td class="text-center">4</td>
                                            <td class="text-left">TD205A</td>
                                            <td class="text-right">2020-01-01</td>
                                            <td class="text-right">Pending</td>
                                            <td class="text-right">10:18:10</td>
                                        </tr>
                                        <tr>
                                            <td class="text-center">5</td>
                                            <td class="text-left">TD205A</td>
                                            <td class="text-right">2020-01-01</td>
                                            <td class="text-right">Resolve</td>
                                            <td class="text-right">10:18:10</td>
                                        </tr>
                                        <tr>
                                            <td class="text-center">6</td>
                                            <td class="text-left">TD205A</td>
                                            <td class="text-right">2020-01-01</td>
                                            <td class="text-right">Reject</td>
                                            <td class="text-right">10:18:10</td>
                                        </tr>
                                        <tr>
                                            <td class="text-center">7</td>
                                            <td class="text-left">TD205A</td>
                                            <td class="text-right">2020-01-01</td>
                                            <td class="text-right">Open</td>
                                            <td class="text-right">10:18:10</td>
                                        </tr>
                                        <tr>
                                            <td class="text-center">8</td>
                                            <td class="text-left">TD205A</td>
                                            <td class="text-right">2020-01-01</td>
                                            <td class="text-right">Close</td>
                                            <td class="text-right">10:18:10</td>
                                        </tr>
                                        <tr>
                                            <td class="text-center">9</td>
                                            <td class="text-left">TD205A</td>
                                            <td class="text-right">2020-01-01</td>
                                            <td class="text-right">Reopen</td>
                                            <td class="text-right">10:18:10</td>
                                        </tr>
                                        <tr>
                                            <td class="text-center">10</td>
                                            <td class="text-left">TD205A</td>
                                            <td class="text-right">2020-01-01</td>
                                            <td class="text-right">Reject</td>
                                            <td class="text-right">10:18:10</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12 col-lg-6">
                        <div class="card">
                            <div class="card-header-small bg-red">
                                <h5 class="card-title-small card-pt10">Ticket Out SLA</h5>
                            </div>
                            <div class="table-responsive table-bordered table-pt10">
                                <table class="table card-table table-vcenter table-hover"
                                    style="height:616px !important;">
                                    <thead class="text-center text-white bg-sign">
                                        <tr>
                                            <th>No</th>
                                            <th>Ticket ID</th>
                                            <th>Create Date</th>
                                            <th>Status</th>
                                            <th>Durasi</th>
                                        </tr>
                                    </thead>
                                    <tbody style="font-size:12px !important;">
                                        <tr>
                                            <td class="text-center">1</td>
                                            <td class="text-left">TD205A</td>
                                            <td class="text-right">2020-01-01</td>
                                            <td class="text-right">Open</td>
                                            <td class="text-right">10:18:10</td>
                                        </tr>
                                        <tr>
                                            <td class="text-center">2</td>
                                            <td class="text-left">TD205A</td>
                                            <td class="text-right">2020-01-01</td>
                                            <td class="text-right">Close</td>
                                            <td class="text-right">10:18:10</td>
                                        </tr>
                                        <tr>
                                            <td class="text-center">3</td>
                                            <td class="text-left">TD205A</td>
                                            <td class="text-right">2020-01-01</td>
                                            <td class="text-right">Reopen</td>
                                            <td class="text-right">10:18:10</td>
                                        </tr>
                                        <tr>
                                            <td class="text-center">4</td>
                                            <td class="text-left">TD205A</td>
                                            <td class="text-right">2020-01-01</td>
                                            <td class="text-right">Pending</td>
                                            <td class="text-right">10:18:10</td>
                                        </tr>
                                        <tr>
                                            <td class="text-center">5</td>
                                            <td class="text-left">TD205A</td>
                                            <td class="text-right">2020-01-01</td>
                                            <td class="text-right">Resolve</td>
                                            <td class="text-right">10:18:10</td>
                                        </tr>
                                        <tr>
                                            <td class="text-center">6</td>
                                            <td class="text-left">TD205A</td>
                                            <td class="text-right">2020-01-01</td>
                                            <td class="text-right">Reject</td>
                                            <td class="text-right">10:18:10</td>
                                        </tr>
                                        <tr>
                                            <td class="text-center">7</td>
                                            <td class="text-left">TD205A</td>
                                            <td class="text-right">2020-01-01</td>
                                            <td class="text-right">Open</td>
                                            <td class="text-right">10:18:10</td>
                                        </tr>
                                        <tr>
                                            <td class="text-center">8</td>
                                            <td class="text-left">TD205A</td>
                                            <td class="text-right">2020-01-01</td>
                                            <td class="text-right">Close</td>
                                            <td class="text-right">10:18:10</td>
                                        </tr>
                                        <tr>
                                            <td class="text-center">9</td>
                                            <td class="text-left">TD205A</td>
                                            <td class="text-right">2020-01-01</td>
                                            <td class="text-right">Reopen</td>
                                            <td class="text-right">10:18:10</td>
                                        </tr>
                                        <tr>
                                            <td class="text-center">10</td>
                                            <td class="text-left">TD205A</td>
                                            <td class="text-right">2020-01-01</td>
                                            <td class="text-right">Reject</td>
                                            <td class="text-right">10:18:10</td>
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
            <script src="<?=base_url()?>assets/public/js/app/app-summary-inout-sla.js"></script>