<!-- Global Loader-->
<div id="global-loader"><img src="<?= base_url()?>assets/images/svgs/loader.svg" alt="loader"></div>
<div class="page">
    <div class="page-main">
        <div class=" app-content mt-7">
            <div class="side-app">
                <div class="page-header d-flex bd-highlight">
                    <div class="flex-grow-1 bd-highlight">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item active" aria-current="page">
                                <h4 class="page-title"><i class="fe fe-home mr-1"></i>Dashboard</h4>
                            </li>
                            <li class="breadcrumb-item active mt-2" aria-current="page">Operation Performance</li>
                            <li class="breadcrumb-item active mt-2" aria-current="page">Performance by Channel</li>
                        </ol>
                    </div>
                    <div class="bd-highlight text-right">
                        <div class="d-flex align-items-end flex-column bd-highlight">
                            <div class="card-options d-none d-sm-block">
                                <div class="btn-group btn-sm">
                                    <a href="#" class="btn btn-light btn-sm" id="btn-day">
                                        <span class="">Day</a></span>
                                    <a href="#" class="btn btn-light btn-sm" id="btn-month">
                                        <span class="">Month</a></span>
                                    <a href="#" class="btn btn-light btn-sm" id="btn-year">
                                        <span class="">Year</a></span>
                                </div>
                                <div class="bd-highlight text-center text-muted tags">
                                            <span class="tag tag-grey justify-content-center box-filter-time"
                                                id="tag-time"></span>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <!--Page Header-->
            </div>

            <!----First Rows--->

            <!---Next Rows---->
            <div class="row">
                <div class="col-md-12 col-lg-5">
                    <div class="card">
                        <div class="card-header-small bg-red">
                            <h5 class="card-title-small card-pt10">Summary Service</h5>
                        </div>
                        <div class="card-body" style="margin:60px 0px 60px 0px !important" id="barServiceDiv">
                        <canvas id="barService"></canvas>

                        </div>
                    </div>
                </div>
                <div class="col-md-12 col-lg-7">
                    <div class="card">
                        <div class="card-header-small bg-red">
                            <h5 class="card-title-small card-pt10">Summary by Channel</h5>
                        </div>
                        <div class="card-body" id="echartServiceDiv">
                        <div id="echartService" class="chartsh overflow-hidden"></div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 col-lg-12">
                    <div class="card">
                        <div class="card-header-small bg-red">
                            <h5 class="card-title-small card-pt10">Summary Service All Channel</h5>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="tablesPerformance" class="table table-striped table-bordered">
                                    <thead class="text-center">
                                        <tr>
                                            <th class="wd-15p border-bottom-0">No</th>
                                            <th class="wd-15p border-bottom-0">Date</th>
                                            <th class="wd-15p border-bottom-0">ART</th>
                                            <th class="wd-15p border-bottom-0">AHT</th>
                                            <th class="wd-15p border-bottom-0">AST</th>
                                            <th class="wd-15p border-bottom-0">SCR</th>
                                            <th class="wd-15p border-bottom-0" width=150>Total Session (COF)</th>
                                        </tr>
                                    </thead>
                                    <tbody class="text-center" id="mytbody" style="font-size:12px !important;">
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php $this->load->view('temp/footer');?>
            <!--Plugin -->
            <script src="<?=base_url()?>assets/public/js/app/app-performance-channel.js"></script>