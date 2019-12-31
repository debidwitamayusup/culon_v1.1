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
                        <!-- <div class="d-flex flex-column">
                            <div class="p-2 bd-highlight">Day</div>
                            <div class="p-2 bd-highlight">
                                <input id="input-date" class="form-control fc-datepicker" placeholder="MM/DD/YYYY"
                                    type="text">
                            </div>
                        </div>
                        <div class="d-flex flex-column">
                            <div class="p-2 bd-highlight">Month</div>
                            <div class="p-2 bd-highlight">
                                <input id="input-date" class="form-control fc-datepicker" placeholder="MM/DD/YYYY"
                                    type="text">
                            </div>
                        </div>
                        <div class="d-flex flex-column">
                            <div class="p-2 bd-highlight">Year</div>
                            <div class="p-2 bd-highlight">
                                <input id="input-date" class="form-control fc-datepicker" placeholder="MM/DD/YYYY"
                                    type="text">
                            </div>
                        </div> -->
                    </div>
                    <!--Page Header-->
                </div>
                <!----Baris Pertama----!-->
                <!-- <div class="row">
                    <div class="col-xs-2">
                        <div class="form-group">
                            <label>Tanggal (DatePicker)</label>
                            <input type="text" class="form-control datepicker" />
                        </div>
                    </div>
                    <div class="col-xs-2">
                        <div class="form-group">
                            <label>Bulan (MonthPicker)</label>
                            <input type="text" class="form-control monthpicker" />
                        </div>
                    </div>
                    <div class="col-xs-2">
                        <div class="form-group">
                            <label>Tahun (YearPicker)</label>
                            <input type="text" class="form-control yearpicker" />
                        </div>
                    </div> -->
                    <!-- <div class="col-xs-3">
                        <div class="form-group">
                            <label>Periode Tahun (YearRangePicker)</label>

                            <div class="input-group">
                                <input type="text" class="form-control startyear" />
                                <span class="input-group-addon">s/d</span>
                                <input type="text" class="form-control endyear" />
                            </div>
                        </div>
                    </div> -->
                </div>
                <div class="row">
                    <div class="col-xl-5 col-lg-5 col-md-12">
                        <div class="card">
                            <div class="card-header-small bg-red">
                                <h5 class="card-title-small card-pt10">Summary KIP</h5>
                            </div>
                            <div class="card-body" id="canvas-pie">
                                <canvas id="pieKIP" class="donutShadow overflow-hidden"></canvas>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-7 col-md-12">
                        <div class="card">
                            <div class="card-header-small bg-red">
                                <h5 class="card-title-small card-pt10">KIP per Channel</h5>
                            </div>
                            <div class="card-body" id="content-chart-kip">
                                <div id="echartKIP"></div>
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
                                        </select>
                                    </div>
                                </div>
                                <div id="row-sub-category">
                                    <div class="row" id="content-sub-category">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
            <div class="col-xs-2">
                <div class="form-group">
                    <label>Tanggal (DatePicker)</label>
                    <input type="text" class="form-control datepicker" />
                </div>
            </div>
            <div class="col-xs-3">
                <div class="form-group">
                    <label>Periode Tanggal (DateRangePicker)</label>

                    <div class="input-group">
                        <input type="text" class="form-control startdate" />
                        <span class="input-group-addon">s/d</span>
                        <input type="text" class="form-control enddate" />
                    </div>
                </div>
            </div>
            <div class="col-xs-2">
                <div class="form-group">
                    <label>Bulan (MonthPicker)</label>
                    <input type="text" class="form-control monthpicker" />
                </div>
            </div>
            <div class="col-xs-2">
                <div class="form-group">
                    <label>Tahun (YearPicker)</label>
                    <input type="text" class="form-control yearpicker" />
                </div>
            </div>
            <div class="col-xs-3">
                <div class="form-group">
                    <label>Periode Tahun (YearRangePicker)</label>

                    <div class="input-group">
                        <input type="text" class="form-control startyear" />
                        <span class="input-group-addon">s/d</span>
                        <input type="text" class="form-control endyear" />
                    </div>
                </div>
            </div>
        </div>
            </div>

            <?php $this->load->view('temp/footer');?>
            <!-- <script src="<?= base_url()?>assets/public/js/app/api.js"></script> -->
            <script src="<?= base_url()?>assets/public/js/app/app-kip.js"></script>