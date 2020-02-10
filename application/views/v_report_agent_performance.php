<!-- Global Loader-->
<div id="global-loader"><img src="<?= base_url()?>assets/images/svgs/loader.svg" alt="loader"></div>
<div class="page">
    <div class="page-main">
        <div class=" app-content mt-6">
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
                        <div class="card-header-small">
                            <h5 class="card-title-small card-pt10">Agent Performance</h5>
                        </div>
                        <div class="card-body">
                            <div class="row mb-2">
                            <div class="col-xs-auto ml-1">
                                    <div class="input-group" style="width:130px">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                <i class="fa fa-calendar tx-16 lh-0 op-6"></i>
                                            </div>
                                        </div><input class="form-control fc-datepicker" placeholder="Start Date" type="text">
                                    </div>
                                </div>
                                <div class="col-xs-auto ml-1">
                                    <div class="input-group" style="width:130px">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                <i class="fa fa-calendar tx-16 lh-0 op-6"></i>
                                            </div>
                                        </div><input class="form-control fc-datepicker" placeholder="End Date" type="text">
                                    </div>
                                </div>
                                <div class="col-sm-auto ml-3">
                                    <div class="form-group row">
                                        <select class="form-control" id="channelName">
                                             <option value="">All Channel</option>
                                             <option value="12">Whatsapp</option>
                                             <option value="6">Facebook</option>
                                             <option value="8">Twitter</option>
                                             <option value="11">Instagram</option>
                                             <option value="13">Twitter DM</option>
                                             <option value="7">Messenger</option>
                                             <option value="5">Telegram</option>
                                             <option value="10">Line</option>
                                             <option value="2">Email</option>
                                             <option value="1">Voice</option>
                                             <option value="3">Live Chat</option>
                                             <option value="4">SMS</option>
                                             <option value="15">Chatbot</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-xs-auto ml-1">
                                    <button class="btn btn-sm btn-dark" type="button" style="height:35px" id="btn-go"><i
                                            class="fas fa-filter"></i></button>

                                </div>
                                <div class="col-xs-auto ml-1">
                                    <button class="btn btn-sm btn-primary" type="button" style="height:35px"
                                        id="btn-go"><i class="fas fa-download mr-2"></i>Export</button>

                                </div>
                            </div>
                            <div class="table-responsive">
                                <table id="reportAgentPerformance" class="table table-striped table-bordered fontNunito11">
                                    <thead class="bg-head text-center text-white">
                                        <tr>
                                            <th class="wd-15p border-bottom-0" width="130">Date</th>
                                            <th class="wd-15p border-bottom-0">Total Agent</th>
                                            <th class="wd-15p border-bottom-0">AHT</th>
                                            <th class="wd-15p border-bottom-0">SHT</th>
                                            <th class="wd-15p border-bottom-0">SCR</th>
                                            <th class="wd-15p border-bottom-0">Last Day</th>
                                            <th class="wd-15p border-bottom-0">Today</th>
                                            <th class="wd-15p border-bottom-0">Handled</th>
                                            <th class="wd-15p border-bottom-0">Unhandled</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="text-center">2020-01-01</td>
                                            <td class="text-right">100</td>
                                            <td class="text-center">00:30:00</td>
                                            <td class="text-center">00:30:00</td>
                                            <td class="text-center">00:30:00</td>
                                            <td class="text-right">200</td>
                                            <td class="text-right">200</td>
                                            <td class="text-right">200</td>
                                            <td class="text-right">200</td>
                                        </tr>
                                        <tr>
                                            <td class="text-center">2020-01-01</td>
                                            <td class="text-right">100</td>
                                            <td class="text-center">00:30:00</td>
                                            <td class="text-center">00:30:00</td>
                                            <td class="text-center">00:30:00</td>
                                            <td class="text-right">200</td>
                                            <td class="text-right">200</td>
                                            <td class="text-right">200</td>
                                            <td class="text-right">200</td>
                                        </tr>
                                        <tr>
                                            <td class="text-center">2020-01-01</td>
                                            <td class="text-right">100</td>
                                            <td class="text-center">00:30:00</td>
                                            <td class="text-center">00:30:00</td>
                                            <td class="text-center">00:30:00</td>
                                            <td class="text-right">200</td>
                                            <td class="text-right">200</td>
                                            <td class="text-right">200</td>
                                            <td class="text-right">200</td>
                                        </tr>
                                        <tr>
                                            <td class="text-center">2020-01-01</td>
                                            <td class="text-right">100</td>
                                            <td class="text-center">00:30:00</td>
                                            <td class="text-center">00:30:00</td>
                                            <td class="text-center">00:30:00</td>
                                            <td class="text-right">200</td>
                                            <td class="text-right">200</td>
                                            <td class="text-right">200</td>
                                            <td class="text-right">200</td>
                                        </tr>
                                        <tr>
                                            <td class="text-center">2020-01-01</td>
                                            <td class="text-right">100</td>
                                            <td class="text-center">00:30:00</td>
                                            <td class="text-center">00:30:00</td>
                                            <td class="text-center">00:30:00</td>
                                            <td class="text-right">200</td>
                                            <td class="text-right">200</td>
                                            <td class="text-right">200</td>
                                            <td class="text-right">200</td>
                                        </tr>
                                        <tr>
                                            <td class="text-center">2020-01-01</td>
                                            <td class="text-right">100</td>
                                            <td class="text-center">00:30:00</td>
                                            <td class="text-center">00:30:00</td>
                                            <td class="text-center">00:30:00</td>
                                            <td class="text-right">200</td>
                                            <td class="text-right">200</td>
                                            <td class="text-right">200</td>
                                            <td class="text-right">200</td>
                                        </tr>
                                        <tr>
                                            <td class="text-center">2020-01-01</td>
                                            <td class="text-right">100</td>
                                            <td class="text-center">00:30:00</td>
                                            <td class="text-center">00:30:00</td>
                                            <td class="text-center">00:30:00</td>
                                            <td class="text-right">200</td>
                                            <td class="text-right">200</td>
                                            <td class="text-right">200</td>
                                            <td class="text-right">200</td>
                                        </tr>
                                        <tr>
                                            <td class="text-center">2020-01-01</td>
                                            <td class="text-right">100</td>
                                            <td class="text-center">00:30:00</td>
                                            <td class="text-center">00:30:00</td>
                                            <td class="text-center">00:30:00</td>
                                            <td class="text-right">200</td>
                                            <td class="text-right">200</td>
                                            <td class="text-right">200</td>
                                            <td class="text-right">200</td>
                                        </tr>
                                        <tr>
                                            <td class="text-center">2020-01-01</td>
                                            <td class="text-right">100</td>
                                            <td class="text-center">00:30:00</td>
                                            <td class="text-center">00:30:00</td>
                                            <td class="text-center">00:30:00</td>
                                            <td class="text-right">200</td>
                                            <td class="text-right">200</td>
                                            <td class="text-right">200</td>
                                            <td class="text-right">200</td>
                                        </tr>
                                        <tr>
                                            <td class="text-center">2020-01-01</td>
                                            <td class="text-right">100</td>
                                            <td class="text-center">00:30:00</td>
                                            <td class="text-center">00:30:00</td>
                                            <td class="text-center">00:30:00</td>
                                            <td class="text-right">200</td>
                                            <td class="text-right">200</td>
                                            <td class="text-right">200</td>
                                            <td class="text-right">200</td>
                                        </tr>
                                        <tr>
                                            <td class="text-center">2020-01-01</td>
                                            <td class="text-right">100</td>
                                            <td class="text-center">00:30:00</td>
                                            <td class="text-center">00:30:00</td>
                                            <td class="text-center">00:30:00</td>
                                            <td class="text-right">200</td>
                                            <td class="text-right">200</td>
                                            <td class="text-right">200</td>
                                            <td class="text-right">200</td>
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
            <script src="<?=base_url()?>assets/public/js/app/app-report-agent-performance.js"></script>