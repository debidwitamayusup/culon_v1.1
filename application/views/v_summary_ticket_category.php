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
                                <h4 class="page-title"><i class="fe fe-home mr-1"></i>Dashboard</h4>
                            </li>
                            <li class="breadcrumb-item active mt-2" aria-current="page">Summary Status / Kategori
                            </li>
                        </ol>
                    </div>
                </div>
                <!----Baris Pertama----!-->
                <div class="row">
                    <div class="col-xl-3 col-lg-3 col-md-12">
                        <div class="card overflow-hidden">
                            <div class="card-header-small bg-red">
                                <h5 class="card-title-small card-pt10">Today</h5>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <canvas id="pieTodayCat" class="donutShadow overflow-hidden"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-12">
                        <div class="card overflow-hidden">
                            <div class="card-header-small bg-red">
                                <h5 class="card-title-small card-pt10">Week</h5>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <canvas id="pieWeekCat" class="donutShadow overflow-hidden"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-12">
                        <div class="card overflow-hidden">
                            <div class="card-header-small bg-red">
                                <h5 class="card-title-small card-pt10">Month</h5>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <canvas id="pieMonthCat" class="donutShadow overflow-hidden"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-12">
                        <div class="card overflow-hidden">
                            <div class="card-header-small bg-red">
                                <h5 class="card-title-small card-pt10">Year</h5>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <canvas id="pieYearCat" class="donutShadow overflow-hidden"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="d-flex align-items-end flex-column bd-highlight">
                        <div class="bd-highlight">
                            <div class="card-options d-none d-sm-block">
                                <div class="btn-group text-center btn-sm mb-2 mt-2">
                                    <a href="#" class="btn btn-light btn-sm" id="btn-day">
                                        <span class="">Day</a></span>
                                    <a href="#" class="btn btn-light btn-sm" id="btn-week">
                                        <span class="">Week</a></span>
                                    <a href="#" class="btn btn-light btn-sm" id="btn-month">
                                        <span class="">Month</a></span>
                                    <a href="#" class="btn btn-light btn-sm" id="btn-year">
                                        <span class="">Year</a></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-header-small bg-red">
                        <h5 class="card-title-small card-pt10">Summary Status Ticket / All Category</h5>
                    </div>
                    <div class="card-body">
                        <div id="echartTicket" class="chartsh overflow-hidden"></div>
                    </div>
                </div>

                <?php $this->load->view('temp/footer');?>
                <script src="<?= base_url()?>assets/public/js/app/app-summary-ticket-cat.js"></script>