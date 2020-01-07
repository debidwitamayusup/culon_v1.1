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
                                <h4 class="page-title"><i class="fe fe-home mr-1"></i>Dashboard</h4>
                            </li>
                            <li class="breadcrumb-item active mt-2" aria-current="page">Agent Performance</li>
                            <li class="breadcrumb-item active mt-2" aria-current="page">Traffic Performance</li>
                        </ol>
                    </div>
                    <!--Page Header-->
                </div>

                <!----First Rows--->

                <!---Next Rows---->
                <div class="row">
                    <div class="col-md-12 col-lg-6">
                        <div class="card">
                            <div class="card-header-small bg-red">
                                <h5 class="card-title-small card-pt10">Summary SCR / Channel</h5>
                            </div>
                            <div class="card-body">
                                <canvas id="MeSeStatusCanvas" class="h-300"></canvas>
                                <!-- <div id="echart3" class="chartsh overflow-hidden"></div> -->
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 col-lg-6">
                        <div class="card">
                            <div class="card-header-small bg-red">
                                <h5 class="card-title-small card-pt10">Summary COF / Channel</h5>
                            </div>
                            <div class="card-body">
                                <canvas id="pieTrafficPerformance" class="donutShadow overflow-hidden"></canvas>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 col-lg-12">
                        <div class="card">
                            <div class="card-header-small bg-red">
                                <h5 class="card-title-small card-pt10">Summary Service OPS</h5>
                            </div>
                            <div class="table-responsive table-bordered table-pt10">
                                <table class="table card-table table-vcenter table-hover"
                                    style="height:616px !important;">
                                    <thead class="text-center text-white bg-gray1">
                                        <tr>
                                            <th>No</th>
                                            <th>Channel</th>
                                            <th>COF</th>
                                            <th>ABD</th>
                                            <th>ART</th>
                                            <th>AHT</th>
                                            <th>AST</th>
                                            <th>SL</th>
                                            <th>SCR</th>
                                        </tr>
                                    </thead>
                                    <tbody style="font-size:12px !important;">
                                        <tr>
                                            <td class="text-center">1</td>
                                            <td class="text-left">Whatsapp</td>
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
                                            <td class="text-left">Instagram</td>
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
                                            <td class="text-left">Facebook</td>
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
                                            <td class="text-left">Twitter</td>
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
                                            <td class="text-left">Messenger</td>
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
                                            <td class="text-left">Twitter DM</td>
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
                                            <td class="text-left">Email</td>
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
                                            <td class="text-left">Telegram</td>
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
                                            <td class="text-left">Line</td>
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
                                            <td class="text-left">Voice</td>
                                            <td class="text-right">10</td>
                                            <td class="text-right">10</td>
                                            <td class="text-right">10</td>
                                            <td class="text-right">10</td>
                                            <td class="text-right">10</td>
                                            <td class="text-right">10</td>
                                            <td class="text-right">10</td>
                                        </tr>
                                        <tr>
                                            <td class="text-center">11</td>
                                            <td class="text-left">SMS</td>
                                            <td class="text-right">10</td>
                                            <td class="text-right">10</td>
                                            <td class="text-right">10</td>
                                            <td class="text-right">10</td>
                                            <td class="text-right">10</td>
                                            <td class="text-right">10</td>
                                            <td class="text-right">10</td>
                                        </tr>
                                        <tr>
                                            <td class="text-center">12</td>
                                            <td class="text-left">Live Chat</td>
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
            </div>
            <?php $this->load->view('temp/footer');?>
            <!--Plugin -->
            <script src="<?=base_url()?>assets/public/js/app/app-traffic-performance.js"></script>