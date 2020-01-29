<!-- Global Loader-->
<div id="global-loader"><img src="<?= base_url()?>assets/images/svgs/loader.svg" alt="loader"></div>
<div class="page">
    <div class="page-main">
        <div class=" app-content mt-6">
            <div class="side-app">
                <div class="page-header d-flex p-2 bd-highlight">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item active" aria-current="page">
                            <h4 class="page-title"><i class="fe fe-grid mr-1"></i>Wallboard</h4>
                        </li>
                        <li class="breadcrumb-item active mt-2" aria-current="page">Summary Traffic by Today</li>
                    </ol>
                </div>
               <!--  <div class="d-flex bd-highlight">
                    <div class="ml-auto p-2 bd-highlight mt-3 h6">Layanan </div>
                    <div class="p-2 bd-highlight">
                        <select class="form-control" id="channel_name">
                            <option value="#">Layanan</option>
                        </select>
                    </div>
                </div> -->
                <!--Page Header-->
            </div>

            <!----First Rows--->

            <!---Next Rows---->
            <div class="row">
                <div class="col-md-12 col-lg-4">
                    <div class="card">
                        <div class="card-header-small">
                            <h5 class="card-title-small card-pt10">Summary Traffic by Channel</h5>
                        </div>
                        <div class="card-body" id="barWallTrafficDayDiv">
                            <canvas id="barWallTrafficDay"></canvas>

                        </div>
                    </div>
                </div>
                <div class="col-md-12 col-lg-8">
                    <div class="card">
                        <div class="card-header-small">
                            <h5 class="card-title-small card-pt10">Traffic by Interval</h5>
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
                        </div>
                        <div class="card-body" id="lineWallsumTrafficDayDiv">
                            <canvas id="lineWallsumTrafficDay" class="h-400"></canvas>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 col-lg-12">
                    <div class="card">
                        <div class="card-header-small">
                            <h5 class="card-title-small card-pt10">Traffic Interval by Channel</h5>
                        </div>
                        <div class="table-responsive table-bordered" style="padding:5px 5px 12px 5px;">
                            <table class="table card-table table-striped table-vcenter table-hover table-pt10"
                                style="font-size:12px" id="wall-today-tbl">
                                <thead class="text-center bg-head">
                                    <tr>
                                        <td rowspan="2" class="font-weight-extrabold text-white">Time</td>
                                        <td rowspan="2" class="font-weight-extrabold text-white">Total<br>Agent</td>
                                        <td colspan="13" class="font-weight-extrabold text-white">Channel</td>
                                    </tr>
                                    <tr>
                                        <td class="bg-column">Facebook</td>
                                        <td class="bg-column">Whatsapp</td>
                                        <td class="bg-column">Twitter</td>
                                        <td class="bg-column">Email</td>
                                        <td class="bg-column">Telegram</td>
                                        <td class="bg-column">Line</td>
                                        <td class="bg-column">Voice</td>
                                        <td class="bg-column">Instagram</td>
                                        <td class="bg-column">Messenger</td>
                                        <td class="bg-column">Twitter DM</td>
                                        <td class="bg-column">Live Chat</td>
                                        <td class="bg-column">SMS</td>
                                        <td class="bg-column">Chat Bot</td>
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
            <?php $this->load->view('temp/footer');?>
            <!--Plugin -->
            <script src="<?=base_url()?>assets/public/js/app/app-wall-sumTraffic-day.js"></script>