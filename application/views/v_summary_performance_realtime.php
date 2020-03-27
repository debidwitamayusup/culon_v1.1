<div class=" app-content" id="app-content">
    <div class="side-app">
        <div class="page-header d-flex bd-highlight">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active" aria-current="page">
                    <h4 class="page-title"><i class="fe fe-grid mr-1"></i>Dashboard</h4>
                </li>
                <li class="breadcrumb-item active mt-2" aria-current="page">Summary Performance Realtime</li>
            </ol>
            <div class="d-flex align-items-end flex-column bd-highlight">
                <div class="bd-highlight">
                    <div class="card-options d-none d-sm-block">
                        <div class="btn-group text-center btn-sm">
                            <a href="javascript:remove_hash_from_url()" class="btn btn-light btn-sm" id="btn-day">
                                <span class="">Day</a></span>
                            <a href="javascript:remove_hash_from_url()" class="btn btn-light btn-sm" id="btn-month">
                                <span class="">Month</a></span>
                            <a href="javascript:remove_hash_from_url()" class="btn btn-light btn-sm" id="btn-year">
                                <span class="">Year</a></span>
                        </div>
                    </div>
                </div>
                <div class="bd-highlight">
                    <!-- daily -->
                    <div id="filter-date" class="mt-1 mr-0">
                        <input id="input-date-filter" class="w-55 ml-auto form-control form-control-sm fc-datepicker"
                            placeholder="MM/DD/YYYY" type="text">
                    </div>

                    <!-- monthly -->
                    <div id="filter-month" class="row mt-1 mr-0">
                        <div class="col-md-auto">
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
                    <div id="filter-year" class="mt-1 mr-0">
                        <select name="select-year-only" id="select-year-only" class="form-control form-control-sm">
                        </select>
                    </div>
                    <!-- yearly -->
                </div>
            </div>
        </div>
        <!---Next Rows---->
        <div class="row margin0-4">
            <div class="col-md-12 col-lg-12">
                <div class="card">
                    <div class="card-header-small">
                        <h5 class="card-title-small card-pt10">Realtime</h5>
                    </div>
                    <div class="row no-gutterss" style="padding: 4px;">
                        <div class="col-md-4">
                            <div class="table-responsive table-bordered" style="padding:2px;">
                                <table
                                    class="table card-table table-striped table-vcenter table-hover table-pt10 fontNunito9"
                                    id="mytable_1" style="height:350px">
                                    <thead class="text-center text-white bg-head" id="mythead_1">
                                        <tr>
                                            <td>No</td>
                                            <td>Layanan</td>
                                            <td>ART</td>
                                            <td>AHT</td>
                                            <td>AST</td>
                                            <td>COF</td>
                                            <td>SCR</td>
                                        </tr>
                                    </thead>
                                    <tbody class="table-sm" id="mytbody_1">
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="table-responsive table-bordered" style="padding:2px;">
                                <table
                                    class="table card-table table-striped table-vcenter table-hover table-pt10 fontNunito9"
                                    id="mytable_2" style="height:350px">
                                    <thead class="text-center text-white bg-head" id="mythead_2">
                                        <tr>
                                            <td>No</td>
                                            <td>Layanan</td>
                                            <td>ART</td>
                                            <td>AHT</td>
                                            <td>AST</td>
                                            <td>COF</td>
                                            <td>SCR</td>
                                        </tr>
                                    </thead>
                                    <tbody class="table-sm" id="mytbody_2">
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="table-responsive table-bordered" style="padding:2px;">
                                <table
                                    class="table card-table table-striped table-vcenter table-hover table-pt10 fontNunito9"
                                    id="mytable_3" style="height:350px">
                                    <thead class="text-center text-white bg-head" id="mythead_3">
                                        <tr>
                                            <td>No</td>
                                            <td>Layanan</td>
                                            <td>ART</td>
                                            <td>AHT</td>
                                            <td>AST</td>
                                            <td>COF</td>
                                            <td>SCR</td>
                                        </tr>
                                    </thead>
                                    <tbody class="table-sm" id="mytbody_3">
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Pagination -->
                    <ul class="pagination  justify-content-end" style="padding: 0px 7px 0px 7px;" id="paging">
                        <!-- <li class="page-item page-prev disabled">
                            <a class="page-link" href="#" tabindex="-1">Prev</a>
                        </li>
                        <li class="page-item active"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item"><a class="page-link" href="#">4</a></li>
                        <li class="page-item"><a class="page-link" href="#">5</a></li>
                        <li class="page-item page-next">
                            <a class="page-link" href="#">Next</a>
                        </li> -->
                    </ul>
                    <div class="card-footer">
                        <div class="row text-center" id="rowDiv">
                            <!-- <div class="col-md-3">
                                <h6 class="font12" id="totalCOF">Total COF : 8181</h6>
                            </div>
                            <div class="col-md-3">
                                <h6 class="font12" id="rataSCR">Rata-rata SCR : 40%</h6>
                            </div>
                            <div class="col-md-3">
                                <h6 class="font12" id="avgWaiting">Average Waiting : 00:09:00</h6>
                            </div>
                            <div class="col-md-3">
                                <h6 class="font12" id="avgHT">Average Handling Time : 00:09:00</h6>
                            </div> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row margin0-4">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header-small">
                        <h5 class="card-title-small card-pt10">Summary Traffic Today</h5>
                    </div>
                    <div class="row mt-2" style="padding-left:4px; padding-right:4px">
                        <div class="col-lg-4 col-md-12">
                            <div class="card">
                                <div class="card-pie">
                                    <div class="canvas-con">
                                        <div id="legend" class="legend-con" style="margin-top:12px; margin-left:5px"></div>
                                        <div class="canvas-con-inner" id="canvas-pie">
                                            <canvas id="pieChartChannel" class="donutShadow overflow-hidden mb-6"></canvas>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-8 col-md-12">
                            <div class="card">
                                <div class="card-body" id="lineWallSumPerformDiv">
                                    <canvas id="lineWallSumPerform"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row" style="padding-left:4px; padding-right:4px">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header-small">
                                    <h5 class="card-title-small card-pt10">Traffic by Layanan</h5>
                                </div>
                                <div class="card-body" id="BarWallPerformanceDiv">
                                    <canvas id="BarWallPerformance" class="h-400"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <?php $this->load->view('temp/footer');?>
    <!--Plugin -->
    <script src="<?=base_url()?>assets/public/js/app/app-summary-performance-realtime.js"></script>