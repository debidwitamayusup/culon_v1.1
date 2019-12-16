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
                    <div class="col-xl-3 col-lg-4 col-md-12">
                        <div class="card overflow-hidden">
                            <div class="card-body" id="canvas-pie">
                                <canvas id="pieTCategory" class="donutShadow overflow-hidden"></canvas>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-9 col-md-12">
                        <div class="card">
                            <div class="body">
                                <div class="row ml-1 mr-1 mt-1">
                                    <div class="col-lg-4 col-md-12">
                                        <div class="expanel expanel-primary">
                                            <div class="expanel-heading">
                                                <h3 class="expanel-title" id="category1"></h3>
                                            </div>
                                            <div class="card-body" id="canvas-cat1">
                                                <div id="echartInfoTraffic" class="chartsh-horizontal overflow-hidden">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-12">
                                        <div class="expanel expanel-primary">
                                            <div class="expanel-heading">
                                                <h3 class="expanel-title" id="category2"></h3>
                                            </div>
                                            <div class="card-body" id="canvas-cat2">
                                                <div id="echartCompTraffic" class="chartsh-horizontal overflow-hidden">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-12">
                                        <div class="expanel expanel-primary">
                                            <div class="expanel-heading">
                                                <h3 class="expanel-title" id="category3"></h3>
                                            </div>
                                            <div class="card-body" id="canvas-cat3">
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
                            <div class="card-header">
                                <h3 class="card-title">Summary by Channel</h3>
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
                                    <table class="table card-table table-vcenter text-nowrap" id="table_avg_traffic">
                                        <thead class="bg-primary text-center" id="mythead_avg_traffic">
                                            <!-- <tr>
                                                <th>ID</th>
                                                <th>CHANNEL</th>
                                                <th>INFORMATION</th>
                                                <th>COMPLAINT</th>
                                                <th>REQUEST</th>
                                            </tr> -->
                                        </thead>
                                        <tbody class="text-center" id="mytbody_avg_traffic">
                                           <!--  <tr>
                                                <td>1</td>
                                                <td class="text-sm font-weight-600">Instagram</td>
                                                <td class="text-sm font-weight-600">90</td>
                                                <td class="text-sm font-weight-600">100</td>
                                                <td class="text-sm font-weight-600">90</td>
                                            </tr>
                                            <tr>
                                                <td>2</td>
                                                <td class="text-sm font-weight-600">Whatsapp</td>
                                                <td class="text-sm font-weight-600">90</td>
                                                <td class="text-sm font-weight-600">100</td>
                                                <td class="text-sm font-weight-600">90</td>
                                            </tr>
                                            <tr>
                                                <td>3</td>
                                                <td class="text-sm font-weight-600">Line</td>
                                                <td class="text-sm font-weight-600">90</td>
                                                <td class="text-sm font-weight-600">100</td>
                                                <td class="text-sm font-weight-600">90</td>
                                            </tr>
                                            <tr>
                                                <td>4</td>
                                                <td class="text-sm font-weight-600">Voice</td>
                                                <td class="text-sm font-weight-600">90</td>
                                                <td class="text-sm font-weight-600">100</td>
                                                <td class="text-sm font-weight-600">90</td>
                                            </tr>
                                            <tr>
                                                <td>5</td>
                                                <td class="text-sm font-weight-600">Facebook</td>
                                                <td class="text-sm font-weight-600">90</td>
                                                <td class="text-sm font-weight-600">100</td>
                                                <td class="text-sm font-weight-600">90</td>
                                            </tr>
                                            <tr>
                                                <td>6</td>
                                                <td class="text-sm font-weight-600">Messenger</td>
                                                <td class="text-sm font-weight-600">90</td>
                                                <td class="text-sm font-weight-600">100</td>
                                                <td class="text-sm font-weight-600">90</td>
                                            </tr>
                                            <tr>
                                                <td>7</td>
                                                <td class="text-sm font-weight-600">Twitter DM</td>
                                                <td class="text-sm font-weight-600">90</td>
                                                <td class="text-sm font-weight-600">100</td>
                                                <td class="text-sm font-weight-600">90</td>
                                            </tr>
                                            <tr>
                                                <td>8</td>
                                                <td class="text-sm font-weight-600">Twitter</td>
                                                <td class="text-sm font-weight-600">90</td>
                                                <td class="text-sm font-weight-600">100</td>
                                                <td class="text-sm font-weight-600">90</td>
                                            </tr>
                                            <tr>
                                                <td>9</td>
                                                <td class="text-sm font-weight-600">Telegram</td>
                                                <td class="text-sm font-weight-600">90</td>
                                                <td class="text-sm font-weight-600">100</td>
                                                <td class="text-sm font-weight-600">90</td>
                                            </tr>
                                            <tr>
                                                <td>10</td>
                                                <td class="text-sm font-weight-600">Live Chat</td>
                                                <td class="text-sm font-weight-600">90</td>
                                                <td class="text-sm font-weight-600">100</td>
                                                <td class="text-sm font-weight-600">90</td>
                                            </tr>
                                            <tr>
                                                <td>11</td>
                                                <td class="text-sm font-weight-600">Email</td>
                                                <td class="text-sm font-weight-600">90</td>
                                                <td class="text-sm font-weight-600">100</td>
                                                <td class="text-sm font-weight-600">90</td>
                                            </tr>
                                            <tr>
                                                <td>12</td>
                                                <td class="text-sm font-weight-600">SMS</td>
                                                <td class="text-sm font-weight-600">90</td>
                                                <td class="text-sm font-weight-600">100</td>
                                                <td class="text-sm font-weight-600">90</td>
                                            </tr> -->
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