<div class=" app-content">
    <div class="side-app">
        <div class="page-header d-flex bd-highlight">
            <div class="flex-grow-1 bd-highlight">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active" aria-current="page">
                        <h4 class="page-title"><i class="fe fe-grid mr-1"></i>Dashboard</h4>
                    </li>
                    <li class="breadcrumb-item active mt-2" aria-current="page">Performance by Channel</li>
                </ol>

            </div>
            <div class="bd-highlight" id="layanan_name_parent" style="margin-right: 9px; margin-bottom: 30px;">
                <select class="form-control-sm" style="border-color:#efecec;font-size:12px" id="layanan_name">

                </select>
            </div>
            <div class="bd-highlight">
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
                </div>
                <!-- daily -->
                <div id="filter-date" class="mt-1 mr-0" style="padding: 0px 0px 0px 3.3rem;">
                    <input id="input-date-filter" class="w-55 ml-auto form-control form-control-sm fc-datepicker"
                        placeholder="MM/DD/YYYY" type="text">
                </div>

                <!-- monthly -->
                <div id="filter-month" class="row mt-1 mr-0" style="padding: 0px 0px 0px 0.65rem;">
                    <div>
                        <select name="select-month" id="select-month" class="form-control form-control-sm">
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
                    <!-- Monthly -->
                    <div>
                        <select name="select-year-on-month" id="select-year-on-month"
                            class="form-control form-control-sm">
                        </select>
                    </div>
                    <!-- Monthly -->
                    <div>
                        <span class="col-auto">
                            <button class="btn btn-sm btn-dark" type="button" style="height:29px" id="btn-go"><i
                                    class="fe fe-arrow-right text-white"></i></button>
                        </span>
                    </div>
                </div>

                <!-- yearly -->
                <div id="filter-year" class="mt-1 mr-0" style="padding: 0px 0px 0px 9.87rem;">
                    <select name="select-year-only" id="select-year-only" class="form-control form-control-sm">
                    </select>
                </div>
                <!-- yearly -->
            </div>
        </div>
        <!--Page Header-->
        <div class="row margin0-4">
            <div class="col-md-12 col-lg-5">
                <div class="card" style="height:425px">
                    <div class="card-header-small">
                        <h5 class="card-title-small card-pt10">Summary Service</h5>
                    </div>
                    <div class="card-body" style="margin:70px 0px 60px 0px !important" id="barServiceDiv">
                        <canvas id="barService"></canvas>

                    </div>
                </div>
            </div>
            <div class="col-md-12 col-lg-7">
                <div class="card">
                    <div class="card-header-small">
                        <h5 class="card-title-small card-pt10">Summary Services by Channel</h5>
                    </div>
                    <!-- chart yang baru -->
                    <div class="card-body" id="horizontalBarPerformanceChannelDiv">
                        <canvas id="horizontalBarPerformanceChannel" width="600" height="350"></canvas>
                    </div>
                    <!-- <div class="card-body" id="echartServiceDiv">
                            <div id="echartService" class="chartsh-services overflow-hidden" style="width : 100%"></div>
                        </div> -->
                </div>
            </div>
            <div class="col-md-12 col-lg-12">
                <div class="card">
                    <div class="card-header-small">
                        <h5 class="card-title-small card-pt10">Summary Average Service All Channel</h5>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="tablesPerformance" class="table table-striped table-bordered fontNunito12"
                                style="width:100%">
                                <thead class="text-center text-white bg-head">
                                    <tr>
                                        <th class="wd-15p border-bottom-0">No</th>
                                        <th class="wd-15p border-bottom-0">Date</th>
                                        <th class="wd-15p border-bottom-0">ART</th>
                                        <th class="wd-15p border-bottom-0">AHT</th>
                                        <th class="wd-15p border-bottom-0">AST</th>
                                        <th class="wd-15p border-bottom-0 text-center">SCR</th>
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
    </div>
    <?php $this->load->view('temp/footer');?>
    <!--Plugin -->
    <script src="<?=base_url()?>assets/public/js/app/app-performance-channel.js"></script>