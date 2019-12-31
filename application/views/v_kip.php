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
                            <div id="filter-date" class="mt-1">
                                <input id="input-date-filter" class="form-control fc-datepicker" placeholder="MM/DD/YYYY" type="text">
                            </div>
                            <div id="filter-month" class="mt-1">
                                <!-- <input id="input-month-filter" class="form-control fc-datepicker" placeholder="MM/YYYY" type="text"> -->
                                <div class="form-group">
                                    <select name="select-month" id="select-month" class="form-control">
                                        <option value="1">January</option>
                                        <option value="2" selected>February</option>
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
                                    <select name="select-year-on-month" id="select-year-on-month" class="form-control">
                                        <option value="2020">2020</option>
                                        <option value="2019" selected>2019</option>
                                        <option value="2018">2018</option>
                                        <option value="2017">2017</option>
                                        <option value="2016">2016</option>
                                        <option value="2015">2015</option>
                                    </select>
                                </div>
                            </div>
                            <div id="filter-year" class="mt-1">
                                <div class="form-group">
                                    <select name="select-year-only" id="select-year-only" class="form-control">
                                        <option value="2020">2020</option>
                                        <option value="2019" selected>2019</option>
                                        <option value="2018">2018</option>
                                        <option value="2017">2017</option>
                                        <option value="2016">2016</option>
                                        <option value="2015">2015</option>
                                    </select>
                                </div>
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
                    </div> 
                </div>-->
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
                <!-- <div class="row">
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
                </div> -->
            </div>

            <?php $this->load->view('temp/footer');?>
            <!-- <script src="<?= base_url()?>assets/public/js/app/api.js"></script> -->
            <script src="<?= base_url()?>assets/public/js/app/app-kip.js"></script>