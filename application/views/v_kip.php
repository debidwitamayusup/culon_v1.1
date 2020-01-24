<!-- Global Loader-->
<div id="global-loader"><img src="<?= base_url()?>assets/images/svgs/loader.svg" alt="loader"></div>
<div class="page">
    <div class="page-main">
        <div class=" app-content mt-6">
            <div class="side-app">
                <div class="page-header d-flex bd-highlight">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item active" aria-current="page">
                            <h4 class="page-title"><i class="fe fe-home mr-1"></i>Dashboard</h4>
                        </li>
                        <!-- <li class="breadcrumb-item active mt-2" aria-current="page">Operation Performance</li> -->
                        <li class="breadcrumb-item active mt-2" aria-current="page">KIP</li>
                    </ol>
                    <div class="d-flex align-items-end flex-column bd-highlight">
                        <div class="bd-highlight">
                            <div class="card-options d-none d-sm-block">
                                <div class="btn-group text-center btn-sm">
                                    <a href="#" class="btn btn-light btn-sm" id="btn-day">
                                        <span class="">Day</a></span>
                                    <a href="#" class="btn btn-light btn-sm" id="btn-month">
                                        <span class="">Month</a></span>
                                    <a href="#" class="btn btn-light btn-sm" id="btn-year">
                                        <span class="">Year</a></span>
                                </div>
                            </div>
                        </div>
                        <div class="bd-highlight">
                            <!-- daily -->
                            <div id="filter-date" class="mt-1 mr-0">
                                <input id="input-date-filter" class="w-55 ml-auto form-control fc-datepicker"
                                    placeholder="MM/DD/YYYY" type="text">
                            </div>

                            <!-- monthly -->
                            <div id="filter-month" class="row mt-1 mr-0">
                                <div class="col-md-auto">
                                    <select name="select-month" id="select-month" class="form-control">
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
                                <div>
                                    <select name="select-year-on-month" id="select-year-on-month" class="form-control">
                                        <option value="2020">2020</option>
                                        <option value="2019">2019</option>
                                        <!-- <option value="2018">2018</option>
                                            <option value="2017">2017</option>
                                            <option value="2016">2016</option>
                                            <option value="2015">2015</option> -->
                                    </select>
                                </div>
                            </div>

                            <!-- yearly -->
                            <div id="filter-year" class="mt-1 mr-0">
                                <select name="select-year-only" id="select-year-only" class="form-control">
                                    <option value="2020">2020</option>
                                    <option value="2019" selected>2019</option>
                                    <!-- <option value="2018">2018</option>
                                    <option value="2017">2017</option>
                                    <option value="2016">2016</option>
                                    <option value="2015">2015</option> -->
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!----Baris Pertama----!-->
            <div class="row">
                <div class="col-xl-5 col-lg-5 col-md-12">
                    <div class="card">
                        <div class="card-header-small">
                        
                            <h5 class="card-title-small card-pt10">Summary KIP</h5>
                        </div>
                        <div id="legend" class="legend-con"></div>
                        <div class="card-body" id="canvas-pie">
                            <canvas id="pieKIP" class="donutShadow overflow-hidden"></canvas>
                        </div>
                    </div>
                </div>
                <div class="col-lg-7 col-md-12">
                    <div class="card">
                        <div class="card-header-small">
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
                                        <option value="">Show All</option>
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
            <?php $this->load->view('temp/footer');?>
            <script src="<?= base_url()?>assets/public/js/app/app-kip.js"></script>