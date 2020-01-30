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
                            <li class="breadcrumb-item active mt-2" aria-current="page">Operation Performance</li>
                            <li class="breadcrumb-item active mt-2" aria-current="page">Summary Traffic Category per
                                Channel</li>
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
                                    <input id="input-date-filter" class="w-50 ml-auto form-control fc-datepicker"
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
                                            <option value="12" selected>December</option>
                                        </select>
                                    </div>
                                    <div>
                                        <select name="select-year-on-month" id="select-year-on-month"
                                            class="form-control">
                                            <option value="2020">2020</option>
                                            <option value="2019" selected>2019</option>
                                            <!--  -->
                                        </select>
                                    </div>
                                </div>

                                <!-- yearly -->
                                <div id="filter-year" class="mt-1 mr-0">
                                    <select name="select-year-only" id="select-year-only" class="form-control">
                                        <option value="2020">2020</option>
                                        <option value="2019" selected>2019</option>
                                        <!--  -->
                                    </select>
                                </div>
                            </div>

                        </div>
                    </div>
                    <!--Page Header-->
                </div>
                <!----Baris Pertama----!-->
                <div class="row">
                    <div class="col-xl-5 col-lg-5 col-md-12">
                        <div class="card overflow-hidden">
                            <div class="card-header-small bg-red">
                                <h5 class="card-title-small card-pt10">Summary Category</h5>
                            </div>
                            <div class="card-body card-ptss mt-7" id="canvas-pie">
                                <canvas id="pieTCategory" class="donutShadow overflow-hidden h-200"></canvas>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-7 col-lg-7 col-md-12">
                        <div class="card">
                            <div class="card-header-small bg-red">
                                <h5 class="card-title-small card-pt10">Summary Traffic per Category per Channel</h5>
                            </div>
                            <div class="card-body" id="Summary-channel">
                                <div id="echartTraffic" class="chartsh-category overflow-hidden"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <!-- <div class="card">
                            <div class="card-header-small bg-red">
                                <h5 class="card-title-small pt-10">Summary Category per Channel</h5>
                            </div> -->

                        <div class="row">
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-lg-4 col-md-12">
                                        <div class="card overflow-hidden border-0">
                                            <div class="card-header-small bg-red">
                                                <h6 class="card-title-small card-pt10" id="category1"></h6>
                                            </div>
                                            <div class="card-body" id="canvas-cat1">
                                                <div id="echartInfoTraffic" class="chartsh-horizontal overflow-hidden">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-12">
                                        <div class="card overflow-hidden border-0">
                                            <div class="card-header-small bg-red">
                                                <h6 class="card-title-small card-pt10" id="category2"></h6>
                                            </div>
                                            <div class="card-body" id="canvas-cat2">
                                                <div id="echartCompTraffic" class="chartsh-horizontal overflow-hidden">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-12">
                                        <div class="card overflow-hidden border-0">
                                            <div class="card-header-small bg-red">
                                                <h6 class="card-title-small card-pt10" id="category3"></h6>
                                            </div>
                                            <div class="card-body" id="canvas-cat3">
                                                <div id="echartReqTraffic" class="chartsh-horizontal overflow-hidden">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- </div> -->
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header-small bg-red">
                                <h5 class="card-title-small card-pt10">Table per Category per Channel</h5>
                            </div>
                            <div class="table-responsive table-bordered table-pt10">
                                <table class="table card-table table-vcenter text-nowrap" id="table_avg_traffic">
                                    <thead class="bg-gray1 text-white text-center" id="mythead_avg_traffic">
                                    </thead>
                                    <tbody style="font-size:12px !important;" id="mytbody_avg_traffic">
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <?php $this->load->view('temp/footer');?>
                <!-- <script src="<?= base_url()?>assets/public/js/app/api.js"></script> -->
                <script src="<?= base_url()?>assets/public/js/app/app_traffic_category.js"></script>