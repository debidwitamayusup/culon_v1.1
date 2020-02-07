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
                        <li class="breadcrumb-item active mt-2" aria-current="page">Agent Log</li>
                    </ol>
                </div>
                <!--Page Header-->
            </div>

            <!----First Rows--->
            <div class="row">
                <div class="col-md-12 col-lg-12">
                    <div class="card">
                        <div class="card-header-small">
                            <h5 class="card-title-small card-pt10">Agent Log</h5>
                        </div>
                        <div class="card-body">
                            <div class="row mb-2">
                                <div class="col-xs-auto ml-1">
                                    <div class="input-group" style="width:130px">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                <i class="fa fa-calendar tx-16 lh-0 op-6"></i>
                                            </div>
                                        </div><input class="form-control fc-datepicker" placeholder="Date From"
                                            type="text">
                                    </div>
                                </div>
                                <div class="col-xs-auto ml-1">
                                    <div class="input-group" style="width:130px">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                <i class="fa fa-calendar tx-16 lh-0 op-6"></i>
                                            </div>
                                        </div><input class="form-control fc-datepicker" placeholder="Date To"
                                            type="text">
                                    </div>
                                </div>
                                <div class="col-sm-auto ml-2">
                                    <div class="form-group row">
                                        <select class="form-control" id="agent_name">
                                            <option value="ShowAll">All Agent</option>
                                            <option value="agent1">Agent 1</option>
                                            <option value="agent2">Agent 2</option>
                                            <option value="agent3">Agent 3</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-auto ml-1">
                                    <div class="form-group row">
                                        <select class="form-control" id="channel_name">
                                            <option value="ShowAll">All Channel</option>
                                            <option value="Whatsapp">Whatsapp</option>
                                            <option value="Twitter">Twitter</option>
                                            <option value="Facebook">Facebook</option>
                                            <option value="Email">Email</option>
                                            <option value="Telegram">Telegram</option>
                                            <option value="Line">Line</option>
                                            <option value="Voice">Voice</option>
                                            <option value="Instagram">Instagram</option>
                                            <option value="Messenger">Messenger</option>
                                            <option value="Twitter DM">Twitter DM</option>
                                            <option value="Live Chat">Live Chat</option>
                                            <option value="SMS">SMS</option>
                                            <option value="Chatbot">Chatbot</option>
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
                                <table id="tableAgent" class="table table-striped table-bordered fontNunito10">
                                    <thead class="bg-head text-white align-middle text-center">
                                        <tr>
                                            <th class="wd-15p border-bottom-0" width="130">Date
                                            </th>
                                            <th class="wd-15p border-bottom-0">ID Agent</th>
                                            <th class="wd-15p border-bottom-0">Nama</th>
                                            <th class="wd-15p border-bottom-0">ART</th>
                                            <th class="wd-15p border-bottom-0">AHT</th>
                                            <th class="wd-15p border-bottom-0">AST</th>
                                            <th class="wd-15p border-bottom-0">Login Time</th>
                                            <th class="wd-15p border-bottom-0">Logout Time</th>
                                            <th class="wd-15p border-bottom-0">Duration</th>
                                        </tr>
                                    </thead>
                                    <tbody style="font-size:12px !important;">
                                        <tr>
                                            <td class="text-center">2020-01-01</td>
                                            <td class="text-center">AD2061</td>
                                            <td class="text-center">No Name</td>
                                            <td class="text-center">00:00:00</td>
                                            <td class="text-center">00:00:00</td>
                                            <td class="text-center">00:00:00</td>
                                            <td class="text-center">00:00:00</td>
                                            <td class="text-center">00:00:00</td>
                                            <td class="text-center">00:00:00</td>
                                        </tr>
                                        <tr>
                                            <td class="text-center">2020-01-01</td>
                                            <td class="text-center">AD2061</td>
                                            <td class="text-center">No Name</td>
                                            <td class="text-center">00:00:00</td>
                                            <td class="text-center">00:00:00</td>
                                            <td class="text-center">00:00:00</td>
                                            <td class="text-center">00:00:00</td>
                                            <td class="text-center">00:00:00</td>
                                            <td class="text-center">00:00:00</td>
                                        </tr>
                                        <tr>
                                            <td class="text-center">2020-01-01</td>
                                            <td class="text-center">AD2061</td>
                                            <td class="text-center">No Name</td>
                                            <td class="text-center">00:00:00</td>
                                            <td class="text-center">00:00:00</td>
                                            <td class="text-center">00:00:00</td>
                                            <td class="text-center">00:00:00</td>
                                            <td class="text-center">00:00:00</td>
                                            <td class="text-center">00:00:00</td>
                                        </tr>
                                        <tr>
                                            <td class="text-center">2020-01-01</td>
                                            <td class="text-center">AD2061</td>
                                            <td class="text-center">No Name</td>
                                            <td class="text-center">00:00:00</td>
                                            <td class="text-center">00:00:00</td>
                                            <td class="text-center">00:00:00</td>
                                            <td class="text-center">00:00:00</td>
                                            <td class="text-center">00:00:00</td>
                                            <td class="text-center">00:00:00</td>
                                        </tr>
                                        <tr>
                                            <td class="text-center">2020-01-01</td>
                                            <td class="text-center">AD2061</td>
                                            <td class="text-center">No Name</td>
                                            <td class="text-center">00:00:00</td>
                                            <td class="text-center">00:00:00</td>
                                            <td class="text-center">00:00:00</td>
                                            <td class="text-center">00:00:00</td>
                                            <td class="text-center">00:00:00</td>
                                            <td class="text-center">00:00:00</td>
                                        </tr>
                                        <tr>
                                            <td class="text-center">2020-01-01</td>
                                            <td class="text-center">AD2061</td>
                                            <td class="text-center">No Name</td>
                                            <td class="text-center">00:00:00</td>
                                            <td class="text-center">00:00:00</td>
                                            <td class="text-center">00:00:00</td>
                                            <td class="text-center">00:00:00</td>
                                            <td class="text-center">00:00:00</td>
                                            <td class="text-center">00:00:00</td>
                                        </tr>
                                        <tr>
                                            <td class="text-center">2020-01-01</td>
                                            <td class="text-center">AD2061</td>
                                            <td class="text-center">No Name</td>
                                            <td class="text-center">00:00:00</td>
                                            <td class="text-center">00:00:00</td>
                                            <td class="text-center">00:00:00</td>
                                            <td class="text-center">00:00:00</td>
                                            <td class="text-center">00:00:00</td>
                                            <td class="text-center">00:00:00</td>
                                        </tr>
                                        <tr>
                                            <td class="text-center">2020-01-01</td>
                                            <td class="text-center">AD2061</td>
                                            <td class="text-center">No Name</td>
                                            <td class="text-center">00:00:00</td>
                                            <td class="text-center">00:00:00</td>
                                            <td class="text-center">00:00:00</td>
                                            <td class="text-center">00:00:00</td>
                                            <td class="text-center">00:00:00</td>
                                            <td class="text-center">00:00:00</td>
                                        </tr>
                                        <tr>
                                            <td class="text-center">2020-01-01</td>
                                            <td class="text-center">AD2061</td>
                                            <td class="text-center">No Name</td>
                                            <td class="text-center">00:00:00</td>
                                            <td class="text-center">00:00:00</td>
                                            <td class="text-center">00:00:00</td>
                                            <td class="text-center">00:00:00</td>
                                            <td class="text-center">00:00:00</td>
                                            <td class="text-center">00:00:00</td>
                                        </tr>
                                        <tr>
                                            <td class="text-center">2020-01-01</td>
                                            <td class="text-center">AD2061</td>
                                            <td class="text-center">No Name</td>
                                            <td class="text-center">00:00:00</td>
                                            <td class="text-center">00:00:00</td>
                                            <td class="text-center">00:00:00</td>
                                            <td class="text-center">00:00:00</td>
                                            <td class="text-center">00:00:00</td>
                                            <td class="text-center">00:00:00</td>
                                        </tr>
                                        <tr>
                                            <td class="text-center">2020-01-01</td>
                                            <td class="text-center">AD2061</td>
                                            <td class="text-center">No Name</td>
                                            <td class="text-center">00:00:00</td>
                                            <td class="text-center">00:00:00</td>
                                            <td class="text-center">00:00:00</td>
                                            <td class="text-center">00:00:00</td>
                                            <td class="text-center">00:00:00</td>
                                            <td class="text-center">00:00:00</td>
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
            <script src="<?=base_url()?>assets/public/js/app/app-report-agent-log.js"></script>