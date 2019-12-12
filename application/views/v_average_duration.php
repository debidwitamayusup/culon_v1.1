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
                            <li class="breadcrumb-item active" aria-current="page">Summary FCR N-FCR </li>
                        </ol>
                        <div class="card-options d-none d-sm-block">
                            <!-- <div class="btn-group btn-sm">
                                <a href="#" class="btn btn-light btn-sm" id="btn-day">
                                    <span class="">Day</a></span>
                                <a href="#" class="btn btn-light btn-sm" id="btn-month">
                                    <span class="">Month</a></span>
                                <a href="#" class="btn btn-light btn-sm" id="btn-year">
                                    <span class="">Year</a></span>
                            </div> -->
                        </div>
                    </div>
                    <!--Page Header-->
                </div>
                <!----Baris Pertama----!-->
                <div class="row">
                    <div class="col-lg-12 col-md-12">
                        <div class="card overflow-hidden">
                            <div class="row">
                                <div class="col-xl-3 col-md-12">
                                    <div class="card box-widget widget-user">
                                        <div class="widget-user-header bg-secondary">
                                            <h4 class="widget-user-desc">Instagram</h4>
                                        </div>
                                        <div class="widget-user-image">
                                            <div class="icon icon-shape bg-primary rounded-circle text-white mb-3">
                                                <i class="fas fa-share-alt text-blue plan-icon"></i>
                                            </div>
                                        </div>
                                        <div class="box-footer">
                                            <div class="row">
                                                <div class="col-sm-4 border-right">
                                                    <div class="description-block">
                                                        <span class="text-muted">Jumlah Interaksi</span>
                                                        <h5 class="description-header num-font">1,234</h5>
                                                    </div>
                                                </div>
                                                <div class="col-sm-4 border-right">
                                                    <div class="description-block">
                                                        <span class="text-muted">Rata-rata Durasi</span>
                                                        <h5 class="description-header num-font">2,234</h5>
                                                    </div>
                                                </div>
                                                <div class="col-sm-4">
                                                    <div class="description-block">
                                                        <h5 class="description-header num-font">23</h5><span
                                                            class="text-muted">LOSS</span>
                                                    </div>
                                                </div>
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
                <script src="<?= base_url()?>assets/public/js/app/app-nfcr.js"></script>