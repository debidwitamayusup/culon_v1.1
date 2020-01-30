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
                            <li class="breadcrumb-item active" aria-current="page">Operation Performance</li>
                            <li class="breadcrumb-item active" aria-current="page">Summary FCR N-FCR </li>
                        </ol>
                        <div class="card-options d-none d-sm-block">
                        </div>
                    </div>
                    <!--Page Header-->
                </div>
                <!----Baris Pertama----!-->
                <div class="row">
                    <div class="col-lg-5 col-md-12">
                        <div class="card overflow-hidden border-0">
                            <div class="card-header-small bg-red">
                                <h5 class="card-title-small card-pt10">Summary Status FCR N-FCR</h5>
                            </div>
                            <div class="card-body card-ptss">
                                <canvas id="pieNFCR" class="donutShadow overflow-hidden"></canvas>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-7 col-md-12">
                        <div class="card overflow-hidden border-0">
                            <div class="card-header-small bg-red">
                                <h5 class="card-title-small card-pt10">Summary Traffic FCR N-FCR ALL Channel</h5>
                            </div>
                            <div class="card-body" id="chart-percentage">
                                <div id="echartNFCR-summary" class="chartsh-nfcr overflow-hidden mb-1"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-lg-4 col-md-12">
                                <div class="card overflow-hidden border-0">
                                    <div class="card-header-small bg-red">
                                        <h6 class="card-title-small card-pt10" id="titleCategory1"></h6>
                                    </div>
                                    <div class="card-body">
                                        <div id="echartNFCR-info" class="chartsh-fcr overflow-hidden"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-12">
                                <div class="card overflow-hidden border-0">
                                    <div class="card-header-small bg-red">
                                        <h6 class="card-title-small card-pt10" id="titleCategory2"></h6>
                                    </div>
                                    <div class="card-body">
                                        <div id="echartNFCR-comp" class="chartsh-fcr overflow-hidden"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-12">
                                <div class="card overflow-hidden border-0">
                                    <div class="card-header-small bg-red">
                                        <h6 class="card-title-small card-pt10" id="titleCategory3"></h6>
                                    </div>
                                    <div class="card-body">
                                        <div id="echartNFCR-req" class="chartsh-fcr overflow-hidden"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="card overflow-hidden border-0">
                            <div class="card-header-small bg-red">
                                <h5 class="card-title-small card-pt10">Average Interval</h5>
                            </div>
                            <!-- <div class="card-body"> -->
                            <div class="table-responsive table-bordered table-pt10">
                                <table class="table card-table table-vcenter table-hover" id="table-avg-interval">
                                    <thead class="text-center bg-gray2" id="mythead_nfcr">
                                    </thead>
                                    <tbody style="font-size:12px !important;" id="mytbody_nfcr">
                                    </tbody>
                                </table>
                            </div>
                            <!-- table-responsive -->
                            <!-- </div> -->
                        </div>
                    </div>
                </div>
                <?php $this->load->view('temp/footer');?>
                <script src="<?= base_url()?>assets/public/js/app/app-nfcr.js"></script>