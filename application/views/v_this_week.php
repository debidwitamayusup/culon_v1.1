<!-- Global Loader-->
<div id="global-loader"><img src="<?= base_url()?>assets/images/svgs/loader.svg" alt="loader"></div>
<div class="page">
    <div class="page-main">
        <div class=" app-content mt-7">
            <div class="side-app">
                <div class="page-header d-flex p-2 bd-highlight">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item active" aria-current="page">
                            <h4 class="page-title"><i class="fe fe-home mr-1"></i>Dashboard</h4>
                        </li>
                        <li class="breadcrumb-item active mt-2" aria-current="page">Traffic Interval</li>
                        <li class="breadcrumb-item active mt-2" aria-current="page">Yearly</li>
                    </ol>
                </div>
                <!--Page Header-->
            </div>
            <!----Baris Pertama----!-->
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header-small bg-red">
                            <h5 class="card-title-small card-pt10">Graphic Interval Yearly</h5>
                        </div>
                        <div class="card-body">
                            <div class="row mb-5">
                                <div class="col-md-3">
                                    <div class="w-75 input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                <i class="fe fe-calendar tx-16 lh-0 op-6"></i>
                                            </div>
                                        </div>
                                        <select name="select-week" id="select-status" class="w-50 form-control">
                                            <option value="1">Week 1</option>
                                            <option value="2">Week 2</option>
                                            <option value="3">Week 3</option>
                                            <option value="4">Week 4</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="w-75 input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                <i class="fe fe-calendar tx-16 lh-0 op-6"></i>
                                            </div>
                                        </div>
                                        <select name="select-month" id="select-status" class="w-50 form-control">
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
                                </div>
                                <div class="col-md-3">
                                    <div class="w-75 input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                <i class="fe fe-calendar tx-16 lh-0 op-6"></i>
                                            </div>
                                        </div>
                                        <select name="select-year" id="select-status" class="w-50 form-control">
                                            <option value="1">2020</option>
                                            <option value="2">2019</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="w-75 input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                <i class="fe fe-activity tx-16 lh-0 op-6"></i>
                                            </div>
                                        </div>
                                        <select name="select-channel" id="select-channel" class="w-75 form-control">
                                            <option value="#">All Channel</option>
                                            <option value="1">Whatsapp</option>
                                            <option value="2">Instagram</option>
                                            <option value="3">Facebook</option>
                                            <option value="4">Twitter</option>
                                            <option value="5">Messenger</option>
                                            <option value="6">Telegram</option>
                                            <option value="7">Twitter DM</option>
                                            <option value="8">Email</option>
                                            <option value="9">Voice</option>
                                            <option value="10">Line</option>
                                            <option value="11">SMS</option>
                                            <option value="12">Live Chat</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <div id="echartGraphicWeek" class="chartsh overflow-hidden"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6 col-md-12">
                    <div class="card">
                        <div class="card-header-small bg-red">
                            <h5 class="card-title-small card-pt10">Summary Traffic Interval All Channel</h5>
                        </div>
                        <div class="card-body">
                            <canvas id="barIntervalWeek"></canvas>

                        </div>
                    </div>
                </div>
                <div class="col-md-12 col-lg-6">
                    <div class="card">
                        <div class="card-header-small bg-red">
                            <h5 class="card-title-small card-pt10">Summary Service All Channel</h5>
                        </div>
                        <div class="table-responsive table-bordered table-pt10">
                            <table class="table card-table table-striped table-vcenter table-hover table-pt10"
                                id="table_avg_year">
                                <thead class="text-center text-white bg-gray1">
                                    <tr>
                                        <th>No</th>
                                        <th>Channel</th>
                                        <th>SCR</th>
                                        <th>ART</th>
                                        <th>AHT</th>
                                        <th>AST</th>
                                    </tr>
                                </thead>
                                <tbody style="font-size:12px !important;">
                                    <tr>
                                        <td class="text-center">1</td>
                                        <td>Whatsapp</td>
                                        <td class="text-center">95%</td>
                                        <td class="text-center">00:45:00</td>
                                        <td class="text-center">00:45:00</td>
                                        <td class="text-center">00:45:00</td>
                                    </tr>
                                    <tr>
                                        <td class="text-center">2</td>
                                        <td>Telegram</td>
                                        <td class="text-center">95%</td>
                                        <td class="text-center">00:45:00</td>
                                        <td class="text-center">00:45:00</td>
                                        <td class="text-center">00:45:00</td>
                                    </tr>
                                    <tr>
                                        <td class="text-center">3</td>
                                        <td>Email</td>
                                        <td class="text-center">95%</td>
                                        <td class="text-center">00:45:00</td>
                                        <td class="text-center">00:45:00</td>
                                        <td class="text-center">00:45:00</td>
                                    </tr>
                                    <tr>
                                        <td class="text-center">4</td>
                                        <td>Twitter</td>
                                        <td class="text-center">95%</td>
                                        <td class="text-center">00:45:00</td>
                                        <td class="text-center">00:45:00</td>
                                        <td class="text-center">00:45:00</td>
                                    </tr>
                                    <tr>
                                        <td class="text-center">5</td>
                                        <td>Twitter DM</td>
                                        <td class="text-center">95%</td>
                                        <td class="text-center">00:45:00</td>
                                        <td class="text-center">00:45:00</td>
                                        <td class="text-center">00:45:00</td>
                                    </tr>
                                    <tr>
                                        <td class="text-center">6</td>
                                        <td>Instagram</td>
                                        <td class="text-center">95%</td>
                                        <td class="text-center">00:45:00</td>
                                        <td class="text-center">00:45:00</td>
                                        <td class="text-center">00:45:00</td>
                                    </tr>
                                    <tr>
                                        <td class="text-center">7</td>
                                        <td>SMS</td>
                                        <td class="text-center">95%</td>
                                        <td class="text-center">00:45:00</td>
                                        <td class="text-center">00:45:00</td>
                                        <td class="text-center">00:45:00</td>
                                    </tr>
                                    <tr>
                                        <td class="text-center">8</td>
                                        <td>Live Chat</td>
                                        <td class="text-center">95%</td>
                                        <td class="text-center">00:45:00</td>
                                        <td class="text-center">00:45:00</td>
                                        <td class="text-center">00:45:00</td>
                                    </tr>
                                    <tr>
                                        <td class="text-center">9</td>
                                        <td>Line</td>
                                        <td class="text-center">95%</td>
                                        <td class="text-center">00:45:00</td>
                                        <td class="text-center">00:45:00</td>
                                        <td class="text-center">00:45:00</td>
                                    </tr>
                                    <tr>
                                        <td class="text-center">10</td>
                                        <td>Voice</td>
                                        <td class="text-center">95%</td>
                                        <td class="text-center">00:45:00</td>
                                        <td class="text-center">00:45:00</td>
                                        <td class="text-center">00:45:00</td>
                                    </tr>
                                    <tr>
                                        <td class="text-center">11</td>
                                        <td>Facebook</td>
                                        <td class="text-center">95%</td>
                                        <td class="text-center">00:45:00</td>
                                        <td class="text-center">00:45:00</td>
                                        <td class="text-center">00:45:00</td>
                                    </tr>
                                    <tr>
                                        <td class="text-center">12</td>
                                        <td>Messenger</td>
                                        <td class="text-center">95%</td>
                                        <td class="text-center">00:45:00</td>
                                        <td class="text-center">00:45:00</td>
                                        <td class="text-center">00:45:00</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <!-- table-responsive -->
                    </div>
                </div>
            </div>
            <?php $this->load->view('temp/footer');?>
            <!--Chart Plugin -->
            <script src="<?=base_url()?>assets/plugins/echart/echart.js"></script>
            <!--Chart--->

            <script src="<?=base_url()?>assets/public/js/app/app-traffic-week.js"></script>