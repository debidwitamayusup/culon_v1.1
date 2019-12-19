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
                            <li class="breadcrumb-item active mr-60" aria-current="page">Summary Ticket Status</li>
                        </ol>
                        <!-- <div class="card-options d-none d-sm-block">
                            <div class="btn-group btn-sm">
                                <a href="#" class="btn btn-light btn-sm" id="btn-day">
                                    <span class="">Day</a></span>
                                <a href="#" class="btn btn-light btn-sm" id="btn-month">
                                    <span class="">Month</a></span>
                                <a href="#" class="btn btn-light btn-sm" id="btn-year">
                                    <span class="">Year</a></span>
                            </div>
                        </div> -->
                    </div>
                    <!--Page Header-->
                </div>
                <!----Baris Pertama----!-->
                <div class="row">
                    <div class="col-xl-6 col-lg-6 col-md-12">
                        <div class="card">
                            <div class="card-header bg-red">
                                <h4 class="card-title">Summary Ticket Status Month</h4>
                            </div>
                            <div class="card-body">
                                <div class="d-flex order-lg-2 ml-auto float-right">
                                    <div class="wd-200 mb-3">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <select class="form-control" id="month">
                                                    <option value="1">January</option>
                                                    <option value="2">February</option>
                                                    <option value="3">March</option>
                                                    <option value="4">April</option>
                                                    <option value="5">May</option>
                                                    <option value="6">June</option>
                                                    <option value="7">July</option>
                                                    <option value="8">August</option>
                                                    <option value="9">September</option>
                                                    <option value="10">October</option>
                                                    <option value="11">November</option>
                                                    <option value="12">December</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <canvas id="echartTicket" class="h-300"></canvas>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6 col-md-12">
                        <div class="card overflow-hidden">
                            <div class="card-header bg-red">
                                <h3 class="card-title text-white">Proportion Status Ticket</h3>
                            </div>

                            <div class="card-body">
                                <div class="row">
                                    <div class="d-flex order-lg-2 ml-auto float-right">
                                        <div class="w-75 mb-3">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text">
                                                        <i class="fas fa-calendar tx-16 lh-0 op-6"></i>
                                                    </div>
                                                </div><input id="input-date" class="form-control fc-datepicker"
                                                    placeholder="MM/DD/YYYY" type="text">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <canvas id="pieChart" class="donutShadow overflow-hidden"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <!---! Kolom Channel--->
                    <div class="col-xl-12 col-lg-12 col-md-12">
                        <div class="card overflow-hidden">
                            <div class="card-header bg-red">
                                <h3 class="card-title text-white">Summary Status Daily</h3>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="d-flex order-lg-2 ml-auto float-right">
                                        <div class="w-75 mb-3">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text">
                                                        <i class="fas fa-calendar tx-16 lh-0 op-6"></i>
                                                    </div>
                                                </div><input id="input-status" class="form-control fc-datepicker"
                                                    placeholder="MM/DD/YYYY" type="text">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                <canvas id="graphicTicket" height="300px"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php $this->load->view('temp/footer');?>
                    <script src="<?=base_url()?>assets/plugins/echart/echart.js"></script>
                    <script src="<?= base_url()?>assets/public/js/app/app-summary-ticket.js"></script>