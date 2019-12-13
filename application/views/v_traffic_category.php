<body class="app  sidebar-mini">

    <!-- Global Loader-->
    <div id="global-loader"><img src="<?= base_url()?>assets/images/svgs/loader.svg" alt="loader"></div>
    <div class="page">
        <div class="page-main">
            <div class=" app-content mt-7">
                <div class="side-app">
                    <div class="page-header">
                        <h4 class="page-title"><i class="fe fe-home mr-1"></i>Dashboard</h4>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#"></a></li>
                            <li class="breadcrumb-item active" aria-current="page">Operation Performance</li>
                            <li class="breadcrumb-item active" aria-current="page">Traffic Category per Channel</li>
                        </ol>
                        <div class="card-options d-none d-sm-block">
                            <div class="btn-group btn-sm">
                                <a href="#" class="btn btn-light btn-sm" id="btn-day">
                                    <span class="">Day</a></span>
                                <a href="#" class="btn btn-light btn-sm" id="btn-month">
                                    <span class="">Month</a></span>
                                <a href="#" class="btn btn-light btn-sm" id="btn-year">
                                    <span class="">Year</a></span>
                            </div>
                        </div>
                    </div>
                    <!--Page Header-->
                </div>
                <!----Baris Pertama----!-->
                <div class="row">
                    <div class="col-xl-4 col-lg-4 col-md-12">
                        <div class="card overflow-hidden">
                            <div class="card-header-small bg-red">
                                <h6 class="card-title-small text-white">Summary Category</h6>
                            </div>
                            <div class="card-body">
                                <canvas id="pieTCategory" class="donutShadow overflow-hidden"></canvas>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8 col-md-12">
                        <div class="card">
                            <div class="card-header-small bg-red">
                                <h6 class="card-title-small text-white">Summary Category per Channel</h6>
                            </div>
                            <div class="body">
                                <div class="row ml-1 mr-1 mt-1">
                                    <div class="col-lg-4 col-md-12">
                                        <div class="expanel expanel-primary">
                                            <div class="expanel-heading">
                                                <h3 class="expanel-title">Information</h3>
                                            </div>
                                            <div class="card-body">
                                                <div id="echartInfoTraffic" class="chartsh-horizontal overflow-hidden">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-12">
                                        <div class="expanel expanel-primary">
                                            <div class="expanel-heading">
                                                <h3 class="expanel-title">Complaint</h3>
                                            </div>
                                            <div class="card-body">
                                                <div id="echartCompTraffic" class="chartsh-horizontal overflow-hidden">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-12">
                                        <div class="expanel expanel-primary">
                                            <div class="expanel-heading">
                                                <h3 class="expanel-title">Request</h3>
                                            </div>
                                            <div class="card-body">
                                                <div id="echartReqTraffic" class="chartsh-horizontal overflow-hidden">
                                                </div>
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
                                <h6 class="card-title-small text-white">Summary by Channel</h6>
                            </div>
                            <div class="card-body">
                                <div id="echartTraffic" class="chartsh-category overflow-hidden"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table card-table table-vcenter text-nowrap ">
                                        <thead class="bg-primary text-center">
                                            <tr>
                                                <th>ID</th>
                                                <th>CHANNEL</th>
                                                <th>INFORMATION</th>
                                                <th>COMPLAINT</th>
                                                <th>REQUEST</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td class="text-center">1</td>
                                                <td class="text-sm font-weight-600 ">Instagram</td>
                                                <td class="text-sm font-weight-600 text-center">90</td>
                                                <td class="text-sm font-weight-600 text-center">100</td>
                                                <td class="text-sm font-weight-600 text-center">90</td>
                                            </tr>
                                            <tr>
                                                <td class="text-center">2</td>
                                                <td class="text-sm font-weight-600">Whatsapp</td>
                                                <td class="text-sm font-weight-600 text-center">90</td>
                                                <td class="text-sm font-weight-600 text-center">100</td>
                                                <td class="text-sm font-weight-600 text-center">90</td>
                                            </tr>
                                            <tr>
                                                <td class="text-center">3</td>
                                                <td class="text-sm font-weight-600">Line</td>
                                                <td class="text-sm font-weight-600 text-center">90</td>
                                                <td class="text-sm font-weight-600 text-center">100</td>
                                                <td class="text-sm font-weight-600 text-center">90</td>
                                            </tr>
                                            <tr>
                                                <td class="text-center">4</td>
                                                <td class="text-sm font-weight-600">Voice</td>
                                                <td class="text-sm font-weight-600 text-center">90</td>
                                                <td class="text-sm font-weight-600 text-center">100</td>
                                                <td class="text-sm font-weight-600 text-center">90</td>
                                            </tr>
                                            <tr>
                                                <td class="text-center">5</td>
                                                <td class="text-sm font-weight-600">Facebook</td>
                                                <td class="text-sm font-weight-600 text-center">90</td>
                                                <td class="text-sm font-weight-600 text-center">100</td>
                                                <td class="text-sm font-weight-600 text-center">90</td>
                                            </tr>
                                            <tr>
                                                <td>6</td>
                                                <td class="text-sm font-weight-600">Messenger</td>
                                                <td class="text-sm font-weight-600 text-center">90</td>
                                                <td class="text-sm font-weight-600 text-center">100</td>
                                                <td class="text-sm font-weight-600 text-center">90</td>
                                            </tr>
                                            <tr>
                                                <td class="text-center">7</td>
                                                <td class="text-sm font-weight-600">Twitter DM</td>
                                                <td class="text-sm font-weight-600 text-center">90</td>
                                                <td class="text-sm font-weight-600 text-center">100</td>
                                                <td class="text-sm font-weight-600 text-center">90</td>
                                            </tr>
                                            <tr>
                                                <td class="text-center">8</td>
                                                <td class="text-sm font-weight-600">Twitter</td>
                                                <td class="text-sm font-weight-600 text-center">90</td>
                                                <td class="text-sm font-weight-600 text-center">100</td>
                                                <td class="text-sm font-weight-600 text-center">90</td>
                                            </tr>
                                            <tr>
                                                <td class="text-center">9</td>
                                                <td class="text-sm font-weight-600">Telegram</td>
                                                <td class="text-sm font-weight-600 text-center">90</td>
                                                <td class="text-sm font-weight-600 text-center">100</td>
                                                <td class="text-sm font-weight-600 text-center">90</td>
                                            </tr>
                                            <tr>
                                                <td class="text-center">10</td>
                                                <td class="text-sm font-weight-600">Live Chat</td>
                                                <td class="text-sm font-weight-600 text-center">90</td>
                                                <td class="text-sm font-weight-600 text-center">100</td>
                                                <td class="text-sm font-weight-600 text-center">90</td>
                                            </tr>
                                            <tr>
                                                <td class="text-center">11</td>
                                                <td class="text-sm font-weight-600">Email</td>
                                                <td class="text-sm font-weight-600 text-center">90</td>
                                                <td class="text-sm font-weight-600 text-center">100</td>
                                                <td class="text-sm font-weight-600 text-center">90</td>
                                            </tr>
                                            <tr>
                                                <td class="text-center">12</td>
                                                <td class="text-sm font-weight-600">SMS</td>
                                                <td class="text-sm font-weight-600 text-center">90</td>
                                                <td class="text-sm font-weight-600 text-center">100</td>
                                                <td class="text-sm font-weight-600 text-center">90</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php $this->load->view('temp/footer');?>
                <!-- <script src="<?= base_url()?>assets/public/js/app/api.js"></script> -->
                <script src="<?= base_url()?>assets/public/js/app/app_traffic_category.js"></script>