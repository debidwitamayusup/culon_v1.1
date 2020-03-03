<div class=" app-content">
    <div class="side-app">
        <div class="page-header d-flex p-2 bd-highlight">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active" aria-current="page">
                    <h4 class="page-title"><i class="fe fe-monitor mr-1"></i>Wallboard</h4>
                </li>
                <li class="breadcrumb-item active mt-2" aria-current="page">Summary Traffic by Week</li>
            </ol>
            <div class="d-flex bd-highlight">
                <div class="ml-auto p-2 bd-highlight mt-2 h6">Layanan </div>
                <div class="p-2 bd-highlight">
                    <select class="form-control-sm" style="border-color:#efecec;font-size:12px" id="layanan_name">
                        <!-- <option value="#">Layanan</option> -->
                    </select>
                </div>
            </div>
        </div>

        <!--Page Header-->
        <!---Next Rows---->
        <div class="row mt-2">
            <div class="col-md-12 col-lg-4">
                <div class="card">
                    <div class="card-header-small">
                        <h5 class="card-title-small card-pt10">Summary Traffic by Channel</h5>
                    </div>
                    <div class="card-body" id="barWallTrafficWeekDiv">
                        <canvas id="barWallTrafficWeek"></canvas>
                    </div>
                </div>
            </div>
            <div class="col-md-12 col-lg-8">
                <div class="card">
                    <div class="card-header-small">
                        <h5 class="card-title-small card-pt10">Traffic Interval Weekly (Hours)</h5>
                    </div>
                    <!-- <div class="card-body">
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
                                            <input type="checkbox" class="custom-control-input checklist-channel"
                                                id="list-channel[]" name="example-checkbox2" value="Whatsapp">
                                            <span class="custom-control-label">Whatsapp</span>
                                        </label>
                                        <label class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input checklist-channel"
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
                                            <input type="checkbox" class="custom-control-input checklist-channel"
                                                id="list-channel[]" name="example-checkbox2" value="Facebook">
                                            <span class="custom-control-label">Facebook</span>
                                        </label>
                                        <label class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input checklist-channel"
                                                id="list-channel[]" name="example-checkbox2" value="Email">
                                            <span class="custom-control-label">Email</span>
                                        </label>
                                        <label class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input checklist-channel"
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
                                            <input type="checkbox" class="custom-control-input checklist-channel"
                                                id="list-channel[]" name="example-checkbox2" value="Line">
                                            <span class="custom-control-label">Line</span>
                                        </label>
                                        <label class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input checklist-channel"
                                                id="list-channel[]" name="example-checkbox2" value="Voice">
                                            <span class="custom-control-label">Voice</span>
                                        </label>
                                        <label class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input checklist-channel"
                                                id="list-channel[]" name="example-checkbox2" value="Instagram">
                                            <span class="custom-control-label">Instagram</span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group m-0">
                                    <div class="custom-controls-stacked">
                                        <label class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input checklist-channel"
                                                id="list-channel[]" name="example-checkbox2" value="Messenger">
                                            <span class="custom-control-label">Messenger</span>
                                        </label>
                                        <label class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input checklist-channel"
                                                id="list-channel[]" name="example-checkbox2" value="Twitter DM">
                                            <span class="custom-control-label">Twitter DM</span>
                                        </label>
                                        <label class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input checklist-channel"
                                                id="list-channel[]" name="example-checkbox2" value="Live Chat">
                                            <span class="custom-control-label">Live Chat</span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group m-0">
                                    <div class="custom-controls-stacked">
                                        <label class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input checklist-channel"
                                                id="list-channel[]" name="example-checkbox2" value="SMS">
                                            <span class="custom-control-label">SMS</span>
                                        </label>
                                        <label class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input checklist-channel"
                                                id="list-channel[]" name="example-checkbox2" value="ChatBot">
                                            <span class="custom-control-label">Chat Bot</span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> -->
                    <div class="card-body" id="lineWallsumTrafficWeekDiv">
                        <canvas id="lineWallsumTrafficWeek"></canvas>
                    </div>
                </div>
            </div>
            <div class="col-md-12 col-lg-6">
                <div class="card">
                    <div class="card-header-small">
                        <h5 class="card-title-small card-pt10">Table Traffic Weekly</h5>
                    </div>
                    <div class="table-responsive table-bordered" style="padding:5px;">
                        <table class="table card-table table-striped table-vcenter table-hover table-pt10 fontNunito10"
                            id="mytable">
                            <thead class="text-center text-white bg-head" style="font-size:11px;">
                                <tr>
                                    <td rowspan="2" class="text-middle">No</td>
                                    <td rowspan="2" class="text-middle" width="100">Channel</td>
                                    <td colspan="7">Day</td>
                                </tr>
                                <tr>
                                    <td>Mon</td>
                                    <td>Tue</td>
                                    <td>Wed</td>
                                    <td>Thu</td>
                                    <td>Fri</td>
                                    <td>Sat</td>
                                    <td>Sun</td>
                                </tr>
                            </thead>
                            <tbody class="table-sm text-center" style="font-size:10px !important;" id="mytbody">

                            </tbody>
                            <tfoot class="text-center font-weight-extrabold bg-total" id="mytfoot">

                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-md-12 col-lg-6">
                <div class="card">
                    <div class="card-header-small">
                        <h5 class="card-title-small card-pt10">Traffic Interval Weekly (Daily)</h5>
                    </div>
                    <div class="card-body" id="echartWeekDiv">
                        <div id="echartWeek" class="chartsh-wall overflow-hidden" style="width:100%"></div>
                    </div>
                    <!-- Chart yang baru -->
                    <!-- <div class="card-body">
                            <canvas id="BarWallSummaryWeek" width="600" height="415"></canvas>
                        </div> -->
                </div>
            </div>
        </div>
    </div>
    <?php $this->load->view('temp/footer');?>
    <!--Plugin -->
    <script src="<?=base_url()?>assets/public/js/app/app-wall-sumTraffic-week.js"></script>