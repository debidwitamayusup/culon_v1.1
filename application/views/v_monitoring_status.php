<body class="app  sidebar-mini">

    <!-- Global Loader-->
    <div id="global-loader"><img src="<?= base_url()?>assets/images/svgs/loader.svg" alt="loader"></div>
    <div class="page">
        <div class="page-main">
            <div class=" app-content mt-7">
                <div class="side-app">
                    <div class="page-header d-flex bd-highlight">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item active" aria-current="page">
                                <h4 class="page-title"><i class="fe fe-grid mr-1"></i>Wallboard</h4>
                            </li>
                            <li class="breadcrumb-item active mt-2" aria-current="page">Monitoring Ticket Status (Non
                                Close)
                            </li>
                        </ol>

                    </div>
                </div>
                <!----Baris Pertama----!-->
                <div class="row">
                    <div class="col-lg-4 col-md-12">
                        <div class="card">
                            <div class="card-header-small bg-red">
                                <h5 class="card-title-small card-pt10">Summary Status Ticket</h5>
                            </div>
                            <div class="card-body">
                                <canvas id="pieChartTicketStatus" class="donutShadow overflow-hidden"></canvas>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8 col-md-12">
                        <div class="card">
                            <div class="card-header-small bg-red">
                                <h5 class="card-title-small card-pt10">Summary Ticket / Unit</h5>
                            </div>
                            <div class="card-body">
                                <div id="echartTicketUnit" class="chartsh-monitoring overflow-hidden"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4 col-md-12">
                        <div class="card">
                            <div class="card-header-small bg-red">
                                <h5 class="card-title-small card-pt10">Summary Ticket / Channel</h5>
                            </div>
                            <div class="card-pie">
                                <div class="canvas-con">
                                    <div class="canvas-con-inner" id="canvas-pie">
                                        <canvas id="pieChartTicketChannel" class="donutShadow overflow-hidden"></canvas>
                                    </div>
                                    <div id="legend" class="legend-con"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8 col-md-12">
                        <div class="card">
                            <div class="card-header-small bg-red">
                                <h5 class="card-title-small card-pt10">Summary Status Ticket / Channel</h5>
                            </div>
                            <div class="card-body">
                                <div id="echartTicketChannel" class="chartsh-status overflow-hidden"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php $this->load->view('temp/footer');?>
                <script src="<?= base_url()?>assets/public/js/app/app-monitoring-status.js"></script>