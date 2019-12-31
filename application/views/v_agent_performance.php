<body class="app  sidebar-mini">

    <!-- Global Loader-->
    <div id="global-loader"><img src="<?= base_url()?>assets/images/svgs/loader.svg" alt="loader"></div>
    <div class="page">
        <div class="page-main">
            <div class=" app-content mt-7">
                <div class="side-app">
                    <div class="page-header d-flex p-2 bd-highlight">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item active" aria-current="page">
                                <h4 class="page-title"><i class="fe fe-user mr-1"></i>Agent Performance</h4>
                            </li>
                            <li class="breadcrumb-item active mt-2" aria-current="page">Total Handling</li>
                        </ol>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header-small bg-red">
                                    <h5 class="card-title-small card-pt10">Agent Performance</h5>
                                </div>
                                <div class="d-flex p-2 bd-highlight">
                                    <div class="wd-100 ml-1">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                    <i class="fas fa-calendar tx-16 lh-0 op-6"></i>
                                                </div>
                                            </div>
                                            <div class="col-lg-6"><input id="input-date"
                                                    class="form-control fc-datepicker" placeholder="MM/DD/YYYY"
                                                    type="text">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12 col-md-12">
                                        <div class="card-body">
                                            <div class="table-responsive">
                                                <table id="example-2" class="table table-striped table-bordered">
                                                    <thead>
                                                        <tr>
                                                            <th class="wd-15p border-bottom-0">ID</th>
                                                            <th class="wd-15p border-bottom-0" width="130">Agent Name
                                                            </th>
                                                            <th class="wd-15p border-bottom-0">ART</th>
                                                            <th class="wd-15p border-bottom-0">AHT</th>
                                                            <th class="wd-15p border-bottom-0">AST</th>
                                                            <th class="wd-15p border-bottom-0" width="93">Total Session
                                                            </th>
                                                            <th class="wd-15p border-bottom-0" width="93">Message In
                                                            </th>
                                                            <th class="wd-15p border-bottom-0" width="93">Message Out
                                                            </th>
                                                        </tr>
                                                    </thead>
                                                    <tbody style="font-size:12px !important;">
                                                        <tr>
                                                            <td class="text-center">1</td>
                                                            <td class="text-left">
                                                                <a href="<?=base_url()?>main/agent_interval">Agent
                                                                    Name</a>
                                                            </td>
                                                            <td class="text-right">
                                                                00:00:00
                                                            </td>
                                                            <td class="text-right">
                                                                00:00:00
                                                            </td>
                                                            <td class="text-right">
                                                                00:00:00
                                                            </td>
                                                            <td class="text-right">
                                                                100
                                                            </td>
                                                            <td class="text-right">
                                                                100
                                                            </td>
                                                            <td class="text-right">
                                                                100
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="text-center">2</td>
                                                            <td class="text-left">
                                                                <a href="<?=base_url()?>main/agent_interval">Agent
                                                                    Name</a>
                                                            </td>
                                                            <td class="text-right">
                                                                00:00:00
                                                            </td>
                                                            <td class="text-right">
                                                                00:00:00
                                                            </td>
                                                            <td class="text-right">
                                                                00:00:00
                                                            </td>
                                                            <td class="text-right">
                                                                100
                                                            </td>
                                                            <td class="text-right">
                                                                100
                                                            </td>
                                                            <td class="text-right">
                                                                100
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="text-center">3</td>
                                                            <td class="text-left">
                                                                <a href="<?=base_url()?>main/agent_interval">Agent
                                                                    Name</a>
                                                            </td>
                                                            <td class="text-right">
                                                                00:00:00
                                                            </td>
                                                            <td class="text-right">
                                                                00:00:00
                                                            </td>
                                                            <td class="text-right">
                                                                00:00:00
                                                            </td>
                                                            <td class="text-right">
                                                                100
                                                            </td>
                                                            <td class="text-right">
                                                                100
                                                            </td>
                                                            <td class="text-right">
                                                                100
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="text-center">4</td>
                                                            <td class="text-left">
                                                                <a href="<?=base_url()?>main/agent_interval">Agent
                                                                    Name</a>
                                                            </td>
                                                            <td class="text-right">
                                                                00:00:00
                                                            </td>
                                                            <td class="text-right">
                                                                00:00:00
                                                            </td>
                                                            <td class="text-right">
                                                                00:00:00
                                                            </td>
                                                            <td class="text-right">
                                                                100
                                                            </td>
                                                            <td class="text-right">
                                                                100
                                                            </td>
                                                            <td class="text-right">
                                                                100
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="text-center">5</td>
                                                            <td class="text-left">
                                                                <a href="<?=base_url()?>main/agent_interval">Agent
                                                                    Name</a>
                                                            </td>
                                                            <td class="text-right">
                                                                00:00:00
                                                            </td>
                                                            <td class="text-right">
                                                                00:00:00
                                                            </td>
                                                            <td class="text-right">
                                                                00:00:00
                                                            </td>
                                                            <td class="text-right">
                                                                100
                                                            </td>
                                                            <td class="text-right">
                                                                100
                                                            </td>
                                                            <td class="text-right">
                                                                100
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php $this->load->view('temp/footer');?>
                <script src="<?=base_url()?>assets/public/js/app/app-agent-performance.js"></script>