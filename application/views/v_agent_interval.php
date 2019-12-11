<body class="app  sidebar-mini">

    <!-- Global Loader-->
    <div id="global-loader"><img src="<?= base_url()?>assets/images/svgs/loader.svg" alt="loader"></div>
    <div class="page">
        <div class="page-main">
            <div class=" app-content mt-7">
                <div class="side-app">
                    <div class="page-header">
                        <h4 class="page-title"><i class="fe fe-user mr-1"></i>Agent Performance</h4>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item ml-2"><a href="#"></a></li>
                            <li class="breadcrumb-item active" aria-current="page">Agent Interval</li>
                        </ol>
                        <div class="card-options d-none d-sm-block">
                            <div class="btn-group btn-sm">
                                <a href="#" class="btn btn-light btn-sm">
                                    <span class="">Day</a></span>
                                <a href="#" class="btn btn-light btn-sm">
                                    <span class="">Month</a></span>
                                <a href="#" class="btn btn-light btn-sm">
                                    <span class="">Year</a></span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="card overflow-hidden">
                            <div class="col-xl-3 col-lg-12 col-md-12">
                                <a href="<?=base_url()?>main/agent_interval">
                                    <div class="list-agent-small">
                                        <div class="card-body text-center profile-user">
                                            <div><span class="avatar avatar-xxl brround cover-image m-2 bg-red"><i
                                                        class="fa fa-user text-light"></i></span></div>
                                            <h4 class="mb-2">Stacie Schaaf</h4>
                                            <p class="text-muted">Agent</p>
                                        </div>
                                        <div class="card-footer">
                                            <div class="row">
                                                <div class="col">
                                                    <p class="text-muted">Total Call</h4>
                                                </div>
                                                <div class="col col-auto">
                                                    <h4 class="mb-2">1200</h4>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card overflow-hidden">
                                        <div class="card-header">
                                            <h3 class="card-title">Performance Agent / Day</h3>
                                        </div>
                                        <div class="card-body">
                                            <canvas id="graphicAgent" height="300px"></canvas>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?php $this->load->view('temp/footer')?>
        <!-----chart-->
        <script src="<?=base_url()?>assets/plugins/echart/echart.js"></script>
        <script src="<?= base_url()?>assets/public/js/chart/GraphicAgent.js"></script>