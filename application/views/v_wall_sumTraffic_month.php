<div class=" app-content">
    <div class="side-app">
        <div class="page-header d-flex p-2 bd-highlight">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active" aria-current="page">
                    <h4 class="page-title"><i class="fe fe-monitor mr-1"></i>Wallboard</h4>
                </li>
                <li class="breadcrumb-item active mt-2" aria-current="page">Traffic Interval</li>
                <li class="breadcrumb-item active mt-2" aria-current="page">Traffic by Month</li>
            </ol>
            <div class="d-flex bd-highlight">
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
                    <div class="card-body" id="barWallTrafficMonthDiv">
                        <canvas id="barWallTrafficMonth"></canvas>

                    </div>
                </div>
            </div>
            <div class="col-md-12 col-lg-8">
                <div class="card">
                    <div class="card-header-small">
                        <h5 class="card-title-small card-pt10">Traffic by Interval Monthly (Hours)</h5>
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
                    <div class="card-body" id="lineWallsumTrafficMonthDiv">
                        <canvas id="lineWallsumTrafficMonth"></canvas>
                    </div>
                </div>
            </div>
            <div class="col-md-12 col-lg-12">
                <div class="card">
                    <div class="card-header-small">
                        <h5 class="card-title-small card-pt10">Table Traffic Interval by Channel</h5>
                    </div>
                    <div class="table-responsive table-bordered" style="padding:5px;">
                        <table class="table card-table table-striped table-vcenter table-hover table-pt10 fontNunito12"
                            style="font-size:12px" id="wall-month-tbl">
                            <thead class="text-center bg-head table-sm">
                                <tr>
                                    <td rowspan="3" class="text-white font-weight-extrabold">Date</td>
                                    <!-- <td rowspan="2" class="text-white font-weight-extrabold">Total<br>Agent</td> -->
                                    <td colspan="13" class="text-white font-weight-extrabold">Channel</td>
                                </tr>
                                <tr>
                                    <!-- <td class="bg-column" rowspan="2">Voice</td> -->
                                    <td colspan="6" class="text-white font-weight-extrabold">RTC</td>
                                    <td colspan="6" class="text-white font-weight-extrabold">Non RTC</td>
                                <tr>
                                    <td class="bg-column">Live Chat</td>
                                    <td class="bg-column">Twitter DM</td>
                                    <td class="bg-column">Messenger</td>
                                    <td class="bg-column">Whatsapp</td>
                                    <td class="bg-column">Line</td>
                                    <td class="bg-column">Telegram</td>
                                    <td class="bg-column">Chat Bot</td>
                                    <td class="bg-column">Instagram</td>
                                    <td class="bg-column">Facebook</td>
                                    <td class="bg-column">Twitter</td>
                                    <td class="bg-column">Email</td>
                                    <td class="bg-column">SMS</td>
                                </tr>
                            </thead>
                            <tbody class="table-sm text-center" id="mytbody">

                            </tbody>
                            <tfoot class="bg-total font-weight-extrabold text-center" id="mytfoot">
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php $this->load->view('temp/footer');?>
    <!--Plugin -->
    <script src="<?=base_url()?>assets/public/js/app/app-wall-sumTraffic-month.js"></script>