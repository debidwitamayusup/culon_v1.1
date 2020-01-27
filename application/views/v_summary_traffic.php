		<!-- Global Loader-->
		<div id="global-loader"><img src="<?= base_url()?>assets/images/svgs/loader.svg" alt="loader"></div>
		<div class="page">
		    <div class="page-main">
		        <div class=" app-content mt-6">
		            <div class="side-app">
		                <div class="page-header d-flex bd-highlight">
		                    <div class="flex-grow-1 bd-highlight">
		                        <ol class="breadcrumb">
		                            <li class="breadcrumb-item active" aria-current="page">
		                                <h4 class="page-title"><i class="fe fe-home mr-1"></i>Dashboard</h4>
		                            </li>
		                            <li class="breadcrumb-item active mt-2" aria-current="page">Summary Traffic
		                            </li>
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
		                                    <input id="input-date-filter"
		                                        class="w-55 ml-auto form-control form-control-sm fc-datepicker"
		                                        placeholder="MM/DD/YYYY" type="text">
		                                </div>

		                                <!-- monthly -->
		                                <div id="filter-month" class="row mt-1 mr-0">
		                                    <div class="col-md-auto">
		                                        <select name="select-month" id="select-month"
		                                            class="form-control form-control-sm">
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
		                                        <select name="select-year-on-month" id="select-year-on-month"
		                                            class="form-control form-control-sm">
		                                            <!-- <option value="2020">2020</option>
												<option value="2019">2019</option> -->
		                                            <!-- <option value="2018">2018</option>
                                            <option value="2017">2017</option>
                                            <option value="2016">2016</option>
                                            <option value="2015">2015</option> -->
		                                        </select>
		                                    </div>
		                                    <div>
		                                        <span class="col-auto">
		                                            <button class="btn btn-sm btn-dark mt-1" type="button"><i
		                                                    class="fe fe-arrow-right text-white"></i></button>
		                                        </span>
		                                    </div>
		                                </div>

		                                <!-- yearly -->
		                                <div id="filter-year" class="mt-1 mr-0">
		                                    <select name="select-year-only" id="select-year-only"
		                                        class="form-control form-control-sm">
		                                        <!-- <option value="2020">2020</option>
											<option value="2019" selected>2019</option> -->
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
		                <!--Page Header-->
		                <!-- </div> -->
		                <!----Baris Pertama----!-->
		                <div class="row">
		                    <div class="col-xl-6 col-lg-6 col-md-12">
		                        <div class="card overflow-hidden">
		                            <div class="card-header-small">
		                                <h5 class="card-title-small card-pt10">Summary by Channel</h5>
		                            </div>
		                            <div class="card-pie">
		                                <div class="canvas-con">
		                                    <div id="legend" class="legend-con"></div>
		                                    <div class="canvas-con-inner" id="canvas-pie">
		                                        <canvas id="pieWallSummaryTraffic"
		                                            class="donutShadow overflow-hidden"></canvas>
		                                    </div>

		                                </div>
		                            </div>
		                        </div>
		                    </div>
		                    <div class="col-xl-6 col-lg-6 col-md-12">
		                        <div class="card overflow-hidden">
		                            <div class="card-header-small">
		                                <h5 class="card-title-small card-pt10">Traffic by Services OPS</h5>
		                            </div>
		                            <div class="card-body">
		                                <div id="echartWallSummaryTraffic" class="chartsh-traffic-ops overflow-hidden"></div>
		                            </div>
		                        </div>
		                    </div>
		                </div>
		                <div class="row">
		                    <!---! Kolom Channel--->
		                    <div class="col-xl-12 col-lg-12 col-md-12">
		                        <div class="card overflow-hidden">
		                            <div class="card-header-small">
		                                <h5 class="card-title-small card-pt10">Interval Today (Hours)</h5>
		                            </div>
		                            <div class="card-body">
		                                <div class="row">
		                                    <div class="col-md-2">
		                                        <div class="form-group m-0">
		                                            <div class="custom-controls-stacked">
		                                                <label class="custom-control custom-checkbox">
		                                                    <input type="checkbox" class="custom-control-input all-checklist"
		                                                        id="check-all-channel" name="check-all" value="All">
		                                                    <span class="custom-control-label">Show All</span>
		                                                </label>
		                                                <label class="custom-control custom-checkbox">
		                                                    <input type="checkbox"
		                                                        class="custom-control-input checklist-channel"
		                                                        id="list-channel[]" name="example-checkbox2" value="Whatsapp">
		                                                    <span class="custom-control-label">Whatsapp</span>
		                                                </label>
		                                                <label class="custom-control custom-checkbox">
		                                                    <input type="checkbox"
		                                                        class="custom-control-input checklist-channel"
		                                                        id="list-channel[]" name="example-checkbox2" value="Twitter">
		                                                    <span class="custom-control-label">Twitter</span>
		                                                </label>
		                                            </div>
		                                        </div>
		                                    </div>
		                                    <div class="col-md-2">
		                                        <div class="form-group m-0">
		                                            <div class="custom-controls-stacked">
		                                                <label class="custom-control custom-checkbox">
		                                                    <input type="checkbox"
		                                                        class="custom-control-input checklist-channel"
		                                                        id="list-channel[]" name="example-checkbox2" value="Facebook">
		                                                    <span class="custom-control-label">Facebook</span>
		                                                </label>
		                                                <label class="custom-control custom-checkbox">
		                                                    <input type="checkbox"
		                                                        class="custom-control-input checklist-channel"
		                                                        id="list-channel[]" name="example-checkbox2" value="Email">
		                                                    <span class="custom-control-label">Email</span>
		                                                </label>
		                                                <label class="custom-control custom-checkbox">
		                                                    <input type="checkbox"
		                                                        class="custom-control-input checklist-channel"
		                                                        id="list-channel[]" name="example-checkbox2" value="Telegram">
		                                                    <span class="custom-control-label">Telegram</span>
		                                                </label>
		                                            </div>
		                                        </div>
		                                    </div>
		                                    <div class="col-md-2">
		                                        <div class="form-group m-0">
		                                            <div class="custom-controls-stacked">
		                                                <label class="custom-control custom-checkbox">
		                                                    <input type="checkbox"
		                                                        class="custom-control-input checklist-channel"
		                                                        id="list-channel[]" name="example-checkbox2" value="Line">
		                                                    <span class="custom-control-label">Line</span>
		                                                </label>
		                                                <label class="custom-control custom-checkbox">
		                                                    <input type="checkbox"
		                                                        class="custom-control-input checklist-channel"
		                                                        id="list-channel[]" name="example-checkbox2" value="Voice">
		                                                    <span class="custom-control-label">Voice</span>
		                                                </label>
		                                                <label class="custom-control custom-checkbox">
		                                                    <input type="checkbox"
		                                                        class="custom-control-input checklist-channel"
		                                                        id="list-channel[]" name="example-checkbox2"
		                                                        value="Instagram">
		                                                    <span class="custom-control-label">Instagram</span>
		                                                </label>
		                                            </div>
		                                        </div>
		                                    </div>
		                                    <div class="col-md-2">
		                                        <div class="form-group m-0">
		                                            <div class="custom-controls-stacked">
		                                                <label class="custom-control custom-checkbox">
		                                                    <input type="checkbox"
		                                                        class="custom-control-input checklist-channel"
		                                                        id="list-channel[]" name="example-checkbox2"
		                                                        value="Messenger">
		                                                    <span class="custom-control-label">Messenger</span>
		                                                </label>
		                                                <label class="custom-control custom-checkbox">
		                                                    <input type="checkbox"
		                                                        class="custom-control-input checklist-channel"
		                                                        id="list-channel[]" name="example-checkbox2"
		                                                        value="Twitter DM">
		                                                    <span class="custom-control-label">Twitter DM</span>
		                                                </label>
		                                                <label class="custom-control custom-checkbox">
		                                                    <input type="checkbox"
		                                                        class="custom-control-input checklist-channel"
		                                                        id="list-channel[]" name="example-checkbox2"
		                                                        value="Live Chat">
		                                                    <span class="custom-control-label">Live Chat</span>
		                                                </label>
		                                            </div>
		                                        </div>
		                                    </div>
		                                    <div class="col-md-2">
		                                        <div class="form-group m-0">
		                                            <div class="custom-controls-stacked">
		                                                <label class="custom-control custom-checkbox">
		                                                    <input type="checkbox"
		                                                        class="custom-control-input checklist-channel"
		                                                        id="list-channel[]" name="example-checkbox2" value="SMS">
		                                                    <span class="custom-control-label">SMS</span>
		                                                </label>
		                                            </div>
		                                        </div>
		                                    </div>
		                                </div>
		                            </div>
		                            <div class="card-body">
		                                <canvas id="lineWallSummaryTraffic" class="h-400"></canvas>
		                            </div>
		                        </div>
		                    </div>
		                </div>
		                <?php $this->load->view('temp/footer');?>
		                <script src="<?= base_url()?>assets/public/js/app/app-dash-summary-traffic.js"></script>