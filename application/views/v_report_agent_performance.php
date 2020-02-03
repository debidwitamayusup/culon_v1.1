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
                                <div class="col-sm-auto h6 mt-3">Agent ID</div>
                                <div class="col-sm-auto">
                                    <div class="form-group row">
                                        <select class="form-control" id="agent_name">
                                            <option value="ShowAll">All Agent</option>
                                            <option value="agent1">Agent 1</option>
                                            <option value="agent2">Agent 2</option>
                                            <option value="agent3">Agent 3</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-auto h6 mt-3 ml-3">Channel</div>
                                <div class="col-sm-auto">
                                    <div class="form-group row">
                                        <select class="form-control" id="agent_name">
                                            <option value="ShowAll">All Channel</option>
                                            <option value="1">Whatsapp</option>
                                            <option value="2">Facebook</option>
                                            <option value="3">Twitter</option>
                                            <option value="4">Instagram</option>
                                            <option value="5">Twitter DM</option>
                                            <option value="6">Messenger</option>
                                            <option value="7">Telegram</option>
                                            <option value="8">Line</option>
                                            <option value="9">Email</option>
                                            <option value="10">Voice</option>
                                            <option value="11">Live Chat</option>
                                            <option value="12">SMS</option>
                                            <option value="13">Chatbot</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-xs-auto ml-3">
                                    <div class="input-group" style="width:150px">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                <i class="fa fa-calendar tx-16 lh-0 op-6"></i>
                                            </div>
                                        </div><input class="form-control fc-datepicker" placeholder="DD/MM/YYYY" type="text">
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
                                <table id="tableAgentPerformance" class="table table-striped table-bordered fontNunito12">
                                    <thead class="bg-head text-white">
                                        <tr>
                                            <th class="wd-15p border-bottom-0">No</th>
                                            <th class="wd-15p border-bottom-0" width="130">Date</th>
                                            <th class="wd-15p border-bottom-0">Total Agent</th>
                                            <th class="wd-15p border-bottom-0">AHT</th>
                                            <th class="wd-15p border-bottom-0">SHT</th>
                                            <th class="wd-15p border-bottom-0">SCR</th>
                                            <th class="wd-15p border-bottom-0">Handled</th>
                                            <th class="wd-15p border-bottom-0">Saldo</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="text-center">1</td>
                                            <td class="text-center">2020-01-01 10:18:40</td>
                                            <td class="text-center">AD205A</td>
                                            <td class="text-right">00:30:00</td>
                                            <td class="text-right">00:30:00</td>
                                            <td class="text-right">00:30:00</td>
                                            <td class="text-right">200</td>
                                            <td class="text-right">200</td>
                                        </tr>
                                        <tr>
                                            <td class="text-center">2</td>
                                            <td class="text-center">2020-01-01 10:18:40</td>
                                            <td class="text-center">AD205A</td>
                                            <td class="text-right">00:30:00</td>
                                            <td class="text-right">00:30:00</td>
                                            <td class="text-right">00:30:00</td>
                                            <td class="text-right">200</td>
                                            <td class="text-right">200</td>
                                        </tr>
                                        <tr>
                                            <td class="text-center">3</td>
                                            <td class="text-center">2020-01-01 10:18:40</td>
                                            <td class="text-center">AD205A</td>
                                            <td class="text-right">00:30:00</td>
                                            <td class="text-right">00:30:00</td>
                                            <td class="text-right">00:30:00</td>
                                            <td class="text-right">200</td>
                                            <td class="text-right">200</td>
                                        </tr>
                                        <tr>
                                            <td class="text-center">4</td>
                                            <td class="text-center">2020-01-01 10:18:40</td>
                                            <td class="text-center">AD205A</td>
                                            <td class="text-right">00:30:00</td>
                                            <td class="text-right">00:30:00</td>
                                            <td class="text-right">00:30:00</td>
                                            <td class="text-right">200</td>
                                            <td class="text-right">200</td>
                                        </tr>
                                        <tr>
                                            <td class="text-center">5</td>
                                            <td class="text-center">2020-01-01 10:18:40</td>
                                            <td class="text-center">AD205A</td>
                                            <td class="text-right">00:30:00</td>
                                            <td class="text-right">00:30:00</td>
                                            <td class="text-right">00:30:00</td>
                                            <td class="text-right">200</td>
                                            <td class="text-right">200</td>
                                        </tr>
                                        <tr>
                                            <td class="text-center">6</td>
                                            <td class="text-center">2020-01-01 10:18:40</td>
                                            <td class="text-center">AD205A</td>
                                            <td class="text-right">00:30:00</td>
                                            <td class="text-right">00:30:00</td>
                                            <td class="text-right">00:30:00</td>
                                            <td class="text-right">200</td>
                                            <td class="text-right">200</td>
                                        </tr>
                                        <tr>
                                            <td class="text-center">7</td>
                                            <td class="text-center">2020-01-01 10:18:40</td>
                                            <td class="text-center">AD205A</td>
                                            <td class="text-right">00:30:00</td>
                                            <td class="text-right">00:30:00</td>
                                            <td class="text-right">00:30:00</td>
                                            <td class="text-right">200</td>
                                            <td class="text-right">200</td>
                                        </tr>
                                        <tr>
                                            <td class="text-center">8</td>
                                            <td class="text-center">2020-01-01 10:18:40</td>
                                            <td class="text-center">AD205A</td>
                                            <td class="text-right">00:30:00</td>
                                            <td class="text-right">00:30:00</td>
                                            <td class="text-right">00:30:00</td>
                                            <td class="text-right">200</td>
                                            <td class="text-right">200</td>
                                        </tr>
                                        <tr>
                                            <td class="text-center">9</td>
                                            <td class="text-center">2020-01-01 10:18:40</td>
                                            <td class="text-center">AD205A</td>
                                            <td class="text-right">00:30:00</td>
                                            <td class="text-right">00:30:00</td>
                                            <td class="text-right">00:30:00</td>
                                            <td class="text-right">200</td>
                                            <td class="text-right">200</td>
                                        </tr>
                                        <tr>
                                            <td class="text-center">10</td>
                                            <td class="text-center">2020-01-01 10:18:40</td>
                                            <td class="text-center">AD205A</td>
                                            <td class="text-right">00:30:00</td>
                                            <td class="text-right">00:30:00</td>
                                            <td class="text-right">00:30:00</td>
                                            <td class="text-right">200</td>
                                            <td class="text-right">200</td>
                                        </tr>
                                        <tr>
                                            <td class="text-center">11</td>
                                            <td class="text-center">2020-01-01 10:18:40</td>
                                            <td class="text-center">AD205A</td>
                                            <td class="text-right">00:30:00</td>
                                            <td class="text-right">00:30:00</td>
                                            <td class="text-right">00:30:00</td>
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