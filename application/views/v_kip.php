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
                    <div class="col-xl-4 col-lg-4 col-md-12">
                        <div class="card overflow-hidden">
                            <div class="card-header">
                                <h3 class="card-title">Web Traffic</h3>
                                <div class="card-options">
                                    <span class="dropdown-toggle fs-16" data-toggle="dropdown" role="button"
                                        aria-haspopup="true" aria-expanded="true"><i
                                            class="fe fe-more-vertical "></i></span>
                                    <ul class="dropdown-menu dropdown-menu-right" role="menu">
                                        <li><a href="#"><i class="si si-plus mr-2"></i>Add</a></li>
                                        <li><a href="#"><i class="si si-trash mr-2"></i>Remove</a></li>
                                        <li><a href="#"><i class="si si-eye mr-2"></i>View</a></li>
                                        <li><a href="#"><i class="si si-settings mr-2"></i>More</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="card-body">
                                <canvas id="pieKIP" class="donutShadow overflow-hidden"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
                <?php $this->load->view('temp/footer');?>
                <!-- <script src="<?= base_url()?>assets/public/js/app/api.js"></script> -->
                <script src="<?= base_url()?>assets/public/js/app/app-kip.js"></script>