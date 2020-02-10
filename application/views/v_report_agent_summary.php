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
                        <li class="breadcrumb-item active mt-2" aria-current="page">Agent Summary</li>
                    </ol>
                </div>
                <!--Page Header-->
            </div>

            <!----First Rows--->
            <div class="row">
                <div class="col-md-12 col-lg-12">
                    <div class="card">
                        <div class="card-header-small">
                            <h5 class="card-title-small card-pt10">Agent Summary</h5>
                        </div>
                        <div class="card-body">
                            <div class="row mb-2">
                            <div class="col-xs-auto">
                                    <div class="input-group" style="width:150px">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                <i class="fa fa-calendar tx-16 lh-0 op-6"></i>
                                            </div>
                                        </div><input class="form-control fc-datepicker" placeholder="DD/MM/YYYY"
                                            type="text">
                                    </div>
                                </div>
                                <div class="col-sm-auto ml-3">
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
                        </div>
                        <div class="table-responsive" style="padding:6px">
                            <table class="table table-striped table-bordered fontNunito10" width="100%">
                                <thead class="bg-head text-white text-center">
                                    <tr>
                                        <td class="border-bottom-0">Date</td>
                                        <td class="border-bottom-0">ID Agent</td>
                                        <td class="border-bottom-0">Instagram</td>
                                        <td class="border-bottom-0">FB</td>
                                        <td class="border-bottom-0">Telegram</td>
                                        <td class="border-bottom-0">Line</td>
                                        <td class="border-bottom-0">Messenger</td>
                                        <td class="border-bottom-0">Twitter</td>
                                        <td class="border-bottom-0">Twitter DM</td>
                                        <td class="border-bottom-0">Email</td>
                                        <td class="border-bottom-0">SMS</td>
                                        <td class="border-bottom-0">Voice</td>
                                        <td class="border-bottom-0">Chatbot</td>
                                        <td class="border-bottom-0">Live Chat</td>
                                        <td class="border-bottom-0">WA</td>
                                        <td class="border-bottom-0">Total Create</td>
                                        <td class="border-bottom-0">AHT</td>
                                        <td class="border-bottom-0">Total Handling</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="text-center">2020-01-01</td>
                                        <td class="text-center">AD205A</td>
                                        <td class="text-center">200</td>
                                        <td class="text-center">200</td>
                                        <td class="text-center">200</td>
                                        <td class="text-center">200</td>
                                        <td class="text-center">200</td>
                                        <td class="text-center">200</td>
                                        <td class="text-center">200</td>
                                        <td class="text-center">200</td>
                                        <td class="text-center">200</td>
                                        <td class="text-center">200</td>
                                        <td class="text-center">200</td>
                                        <td class="text-center">200</td>
                                        <td class="text-center">200</td>
                                        <td class="text-center">200</td>
                                        <td class="text-center">200</td>
                                        <td class="text-center">200</td>
                                    </tr>
                                    <tr>
                                        <td class="text-center">2020-01-01</td>
                                        <td class="text-center">AD205A</td>
                                        <td class="text-center">200</td>
                                        <td class="text-center">200</td>
                                        <td class="text-center">200</td>
                                        <td class="text-center">200</td>
                                        <td class="text-center">200</td>
                                        <td class="text-center">200</td>
                                        <td class="text-center">200</td>
                                        <td class="text-center">200</td>
                                        <td class="text-center">200</td>
                                        <td class="text-center">200</td>
                                        <td class="text-center">200</td>
                                        <td class="text-center">200</td>
                                        <td class="text-center">200</td>
                                        <td class="text-center">200</td>
                                        <td class="text-center">200</td>
                                        <td class="text-center">200</td>
                                    </tr>
                                    <tr>
                                        <td class="text-center">2020-01-01</td>
                                        <td class="text-center">AD205A</td>
                                        <td class="text-center">200</td>
                                        <td class="text-center">200</td>
                                        <td class="text-center">200</td>
                                        <td class="text-center">200</td>
                                        <td class="text-center">200</td>
                                        <td class="text-center">200</td>
                                        <td class="text-center">200</td>
                                        <td class="text-center">200</td>
                                        <td class="text-center">200</td>
                                        <td class="text-center">200</td>
                                        <td class="text-center">200</td>
                                        <td class="text-center">200</td>
                                        <td class="text-center">200</td>
                                        <td class="text-center">200</td>
                                        <td class="text-center">200</td>
                                        <td class="text-center">200</td>
                                    </tr>
                                    <tr>
                                        <td class="text-center">2020-01-01</td>
                                        <td class="text-center">AD205A</td>
                                        <td class="text-center">200</td>
                                        <td class="text-center">200</td>
                                        <td class="text-center">200</td>
                                        <td class="text-center">200</td>
                                        <td class="text-center">200</td>
                                        <td class="text-center">200</td>
                                        <td class="text-center">200</td>
                                        <td class="text-center">200</td>
                                        <td class="text-center">200</td>
                                        <td class="text-center">200</td>
                                        <td class="text-center">200</td>
                                        <td class="text-center">200</td>
                                        <td class="text-center">200</td>
                                        <td class="text-center">200</td>
                                        <td class="text-center">200</td>
                                        <td class="text-center">200</td>
                                    </tr>
                                    <tr>
                                        <td class="text-center">2020-01-01</td>
                                        <td class="text-center">AD205A</td>
                                        <td class="text-center">200</td>
                                        <td class="text-center">200</td>
                                        <td class="text-center">200</td>
                                        <td class="text-center">200</td>
                                        <td class="text-center">200</td>
                                        <td class="text-center">200</td>
                                        <td class="text-center">200</td>
                                        <td class="text-center">200</td>
                                        <td class="text-center">200</td>
                                        <td class="text-center">200</td>
                                        <td class="text-center">200</td>
                                        <td class="text-center">200</td>
                                        <td class="text-center">200</td>
                                        <td class="text-center">200</td>
                                        <td class="text-center">200</td>
                                        <td class="text-center">200</td>
                                    </tr>
                                    <tr>
                                        <td class="text-center">2020-01-01</td>
                                        <td class="text-center">AD205A</td>
                                        <td class="text-center">200</td>
                                        <td class="text-center">200</td>
                                        <td class="text-center">200</td>
                                        <td class="text-center">200</td>
                                        <td class="text-center">200</td>
                                        <td class="text-center">200</td>
                                        <td class="text-center">200</td>
                                        <td class="text-center">200</td>
                                        <td class="text-center">200</td>
                                        <td class="text-center">200</td>
                                        <td class="text-center">200</td>
                                        <td class="text-center">200</td>
                                        <td class="text-center">200</td>
                                        <td class="text-center">200</td>
                                        <td class="text-center">200</td>
                                        <td class="text-center">200</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
            <?php $this->load->view('temp/footer');?>
            <!--Plugin -->
            <script src="<?=base_url()?>assets/public/js/app/app-report-agent-summary.js"></script>