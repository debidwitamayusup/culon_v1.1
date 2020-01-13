<!-- Global Loader-->
    <div id="global-loader"><img src="<?= base_url()?>assets/images/svgs/loader.svg" alt="loader"></div>
    <div class="page">
        <div class="page-main">
            <div class=" app-content mt-7">
                <div class="side-app">
                    <div class="page-header d-flex p-2 bd-highlight">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item active" aria-current="page">
                                <h4 class="page-title"><i class="fe fe-book mr-1"></i>Report</h4>
                            </li>
                            <li class="breadcrumb-item active mt-2" aria-current="page">Agent Performance</li>
                        </ol>
                    </div>
                    <!--Page Header-->
                </div>

                <!----First Rows--->
                <div class="row">
                    <div class="col-md-12 col-lg-12">
                        <div class="card">
                            <div class="card-header-small bg-red">
                                <h5 class="card-title-small card-pt10">Agent Performance</h5>
                            </div>
                            <div class="card-body">
                                <div class="row mb-5">
                                    <div class="col-md-3">
                                        <div class="w-75 input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                    <i class="fe fe-chrome tx-16 lh-0 op-6"></i>
                                                </div>
                                            </div>
                                            <select name="select-status" id="select-status" class="w-50 form-control">
                                                <option value="#">All Status</option>
                                                <option value="1">New</option>
                                                <option value="2">Open</option>
                                                <option value="3">Reject</option>
                                                <option value="4">On Progress</option>
                                                <option value="5">Pending</option>
                                                <option value="6">Reopen</option>
                                                <option value="7">Resolve</option>
                                                <option value="8">Close</option>
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
                                    <div class="col-md-3">
                                        <div class="w-75 input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                    <i class="fas fa-calendar tx-16 lh-0 op-6"></i>
                                                </div>
                                            </div><input class="form-control fc-datepicker" placeholder="MM/DD/YYYY"
                                                type="text">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <button type="button" class="btn btn-dark"><i
                                                class="fe fe-download mr-2"></i>Export</button>
                                    </div>
                                </div>
                                <div class="table-responsive">
                                    <table id="example-2" class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th class="wd-15p border-bottom-0">No</th>
                                                <th class="wd-15p border-bottom-0" width="130">Date</th>
                                                <th class="wd-15p border-bottom-0">Agent ID</th>
                                                <th class="wd-15p border-bottom-0">Channel</th>
                                                <th class="wd-15p border-bottom-0">AHT</th>
                                                <th class="wd-15p border-bottom-0">SHT</th>
                                                <th class="wd-15p border-bottom-0">SCR</th>
                                                <th class="wd-15p border-bottom-0">COF</th>
                                            </tr>
                                        </thead>
                                        <tbody style="font-size:12px !important;">
                                            <tr>
                                                <td class="text-center">1</td>
                                                <td class="text-center">2020-01-01 10:18:40</td>
                                                <td class="text-center">AD205A</td>
                                                <td class="text-center">Facebook</td>
                                                <td class="text-right">00:30:00</td>
                                                <td class="text-right">00:30:00</td>
                                                <td class="text-right">00:30:00</td>
                                                <td class="text-right">00:30:00</td>
                                            </tr>
                                            <tr>
                                                <td class="text-center">2</td>
                                                <td class="text-center">2020-01-01 10:18:40</td>
                                                <td class="text-center">AD205A</td>
                                                <td class="text-center">Facebook</td>
                                                <td class="text-right">00:30:00</td>
                                                <td class="text-right">00:30:00</td>
                                                <td class="text-right">00:30:00</td>
                                                <td class="text-right">00:30:00</td>
                                            </tr>
                                            <tr>
                                                <td class="text-center">3</td>
                                                <td class="text-center">2020-01-01 10:18:40</td>
                                                <td class="text-center">AD205A</td>
                                                <td class="text-center">Facebook</td>
                                                <td class="text-right">00:30:00</td>
                                                <td class="text-right">00:30:00</td>
                                                <td class="text-right">00:30:00</td>
                                                <td class="text-right">00:30:00</td>
                                            </tr>
                                            <tr>
                                                <td class="text-center">4</td>
                                                <td class="text-center">2020-01-01 10:18:40</td>
                                                <td class="text-center">AD205A</td>
                                                <td class="text-center">Facebook</td>
                                                <td class="text-right">00:30:00</td>
                                                <td class="text-right">00:30:00</td>
                                                <td class="text-right">00:30:00</td>
                                                <td class="text-right">00:30:00</td>
                                            </tr>
                                            <tr>
                                                <td class="text-center">5</td>
                                                <td class="text-center">2020-01-01 10:18:40</td>
                                                <td class="text-center">AD205A</td>
                                                <td class="text-center">Facebook</td>
                                                <td class="text-right">00:30:00</td>
                                                <td class="text-right">00:30:00</td>
                                                <td class="text-right">00:30:00</td>
                                                <td class="text-right">00:30:00</td>
                                            </tr>
                                            <tr>
                                                <td class="text-center">6</td>
                                                <td class="text-center">2020-01-01 10:18:40</td>
                                                <td class="text-center">AD205A</td>
                                                <td class="text-center">Facebook</td>
                                                <td class="text-right">00:30:00</td>
                                                <td class="text-right">00:30:00</td>
                                                <td class="text-right">00:30:00</td>
                                                <td class="text-right">00:30:00</td>
                                            </tr>
                                            <tr>
                                                <td class="text-center">7</td>
                                                <td class="text-center">2020-01-01 10:18:40</td>
                                                <td class="text-center">AD205A</td>
                                                <td class="text-center">Facebook</td>
                                                <td class="text-right">00:30:00</td>
                                                <td class="text-right">00:30:00</td>
                                                <td class="text-right">00:30:00</td>
                                                <td class="text-right">00:30:00</td>
                                            </tr>
                                            <tr>
                                                <td class="text-center">8</td>
                                                <td class="text-center">2020-01-01 10:18:40</td>
                                                <td class="text-center">AD205A</td>
                                                <td class="text-center">Facebook</td>
                                                <td class="text-right">00:30:00</td>
                                                <td class="text-right">00:30:00</td>
                                                <td class="text-right">00:30:00</td>
                                                <td class="text-right">00:30:00</td>
                                            </tr>
                                            <tr>
                                                <td class="text-center">9</td>
                                                <td class="text-center">2020-01-01 10:18:40</td>
                                                <td class="text-center">AD205A</td>
                                                <td class="text-center">Facebook</td>
                                                <td class="text-right">00:30:00</td>
                                                <td class="text-right">00:30:00</td>
                                                <td class="text-right">00:30:00</td>
                                                <td class="text-right">00:30:00</td>
                                            </tr>
                                            <tr>
                                                <td class="text-center">10</td>
                                                <td class="text-center">2020-01-01 10:18:40</td>
                                                <td class="text-center">AD205A</td>
                                                <td class="text-center">Facebook</td>
                                                <td class="text-right">00:30:00</td>
                                                <td class="text-right">00:30:00</td>
                                                <td class="text-right">00:30:00</td>
                                                <td class="text-right">00:30:00</td>
                                            </tr>
                                            <tr>
                                                <td class="text-center">11</td>
                                                <td class="text-center">2020-01-01 10:18:40</td>
                                                <td class="text-center">AD205A</td>
                                                <td class="text-center">Facebook</td>
                                                <td class="text-right">00:30:00</td>
                                                <td class="text-right">00:30:00</td>
                                                <td class="text-right">00:30:00</td>
                                                <td class="text-right">00:30:00</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php $this->load->view('temp/footer');?>
                <!--Plugin -->
                <script src="<?=base_url()?>assets/public/js/app/app-agent-performance.js"></script>