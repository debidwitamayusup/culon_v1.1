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
                            <li class="breadcrumb-item active" aria-current="page">Summary KIP All Channel</li>
                        </ol>
                        <div class="card-options d-none d-sm-block">
                            <div class="btn-group btn-sm">
                                <a href="#" class="btn btn-light btn-sm" id="btn-day">
                                    <span class="">Day</a></span>
                                <a href="#" class="btn btn-light btn-sm" id="btn-month">
                                    <span class="">Month</a></span>
                                <a href="#" class="btn btn-light btn-sm" id="btn-year">
                                    <span class="">Year</a></span>
                            </div>
                        </div>
                    </div>
                    <!--Page Header-->
                </div>
                <!----Baris Pertama----!-->
                <div class="row">
                    <div class="col-xl-5 col-lg-5 col-md-12">
                        <div class="card overflow-hidden">
                            <div class="card-header bg-gray1">
                                <h3 class="card-title text-white">Summary KIP </h3>
                            </div>
                            <div class="card-body" id="canvas-pie">
                                <canvas id="pieKIP" class="donutShadow overflow-hidden"></canvas>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-7 col-md-12">
                        <div class="card">
                            <div class="card-header bg-gray1">
                                <h4 class="card-title text-white">KIP per Channel</h4>
                            </div>
                            <div class="card-body">
                                <div id="echartKIP" class="chartsh overflow-hidden"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                            <div class="row ml-1">
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
                                <div class="row">
                                    <div class="col-lg-4 col-md-12">
                                        <div class="card">
                                            <div class="card-header bg-gray1">
                                                <h4 class="card-title text-white">Information</h4>
                                            </div>
                                            <div class="card-body">
                                                <div id="echartInfo" class="chartsh overflow-hidden"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-12">
                                        <div class="card">
                                            <div class="card-header bg-gray1">
                                                <h4 class="card-title text-white">Complaint</h4>
                                            </div>
                                            <div class="card-body">
                                                <div id="echartComp" class="chartsh overflow-hidden"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-12">
                                        <div class="card">
                                            <div class="card-header bg-gray1">
                                                <h4 class="card-title text-white">Request</h4>
                                            </div>
                                            <div class="card-body">
                                                <div id="echartReq" class="chartsh overflow-hidden"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php $this->load->view('temp/footer');?>
                <!-- <script src="<?= base_url()?>assets/public/js/app/api.js"></script> -->
                <script src="<?= base_url()?>assets/public/js/app/app-kip.js"></script>