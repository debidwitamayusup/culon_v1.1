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
                            <li class="breadcrumb-item active" aria-current="page">Summary FCR N-FCR </li>
                        </ol>
                        <div class="card-options d-none d-sm-block">
                            <!-- <div class="btn-group btn-sm">
                                <a href="#" class="btn btn-light btn-sm" id="btn-day">
                                    <span class="">Day</a></span>
                                <a href="#" class="btn btn-light btn-sm" id="btn-month">
                                    <span class="">Month</a></span>
                                <a href="#" class="btn btn-light btn-sm" id="btn-year">
                                    <span class="">Year</a></span>
                            </div> -->
                        </div>
                    </div>
                    <!--Page Header-->
                </div>
                <!----Baris Pertama----!-->
                <div class="row">
                    <div class="col-xl-3 col-lg-3 col-md-12">
                        <div class="card overflow-hidden">
                            <div class="card-header">
                                <h3 class="card-title">Summary FCR N-FCR</h3>
                            </div>
                            <div class="card-body">
                                <canvas id="pieNFCR" class="donutShadow overflow-hidden"></canvas>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-9 col-md-12"> 
                         <div class="card overflow-hidden">
                           <!-- <div class="card-body"> -->
                                <div class="row"> 
                                    <div class="col-lg-4 col-md-12">
                                        <div class="card overflow-hidden border-0">
                                            <div class="card-header">
                                                <h3 class="card-title">Information</h3>
                                            </div>
                                            <div class="card-body">
                                                <div id="echartNFCR-info" class="chartsh overflow-hidden"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-12">
                                        <div class="card overflow-hidden border-0">
                                            <div class="card-header">
                                                <h3 class="card-title">Complaint</h3>
                                            </div>
                                            <div class="card-body">
                                                <div id="echartNFCR-comp" class="chartsh overflow-hidden"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-12">
                                        <div class="card overflow-hidden border-0">
                                            <div class="card-header">
                                                <h3 class="card-title">Request</h3>
                                            </div>
                                            <div class="card-body">
                                                <div id="echartNFCR-req" class="chartsh overflow-hidden"></div>
                                            </div>
                                        </div>
                                    </div>
                                <!-- </div>-->
                            </div> 
                        </div>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-xl-3 col-lg-3 col-md-12">
                        <div class="card overflow-hidden">
                            <div class="card-header">
                                <h3 class="card-title">Summary Traffic FCR N-FCR by Channel</h3>
                            </div>
                            <div class="card-body" id="chart-percentage">
                                <div id="echartNFCR-summary" class="chartsh overflow-hidden"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-9 col-md-12"> 
                        <div class="card overflow-hidden">
                            <div class="card-header">
                                <h3 class="card-title">Average Interval</h3>
                            </div>
                            <div class="table-responsive">
                                <table class="table card-table table-vcenter table-hover" id="table-avg-interval">
                                    <thead>
                                        <tr>
                                            <th rowspan="2">No</th>
                                            <th rowspan="2">Channel</th>
                                            <th colspan="2" class="bg-orange align-content-md-center text-white">Information</th>
                                            <th colspan="2" class="bg-red text-white">Complaint</th>
                                            <th colspan="2" class="bg-blue text-white">Request</th>
                                        </tr>
                                        <tr>
                                            <th class="bg-green text-white">FCR</th>
                                            <th class="bg-blue-dark text-white">N-FCR</th>
                                            <th class="bg-green text-white">FCR</th>
                                            <th class="bg-blue-dark text-white">N-FCR</th>
                                            <th class="bg-green text-white">FCR</th>
                                            <th class="bg-blue-dark text-white">N-FCR</th>
                                        </tr>
                                    </thead>
                                    <tbody id="mytbody">
                                        <tr>
                                            <td>1</td>
                                            <td>Instagram</td>
                                            <td>50</td>
                                            <td>50</td>
                                            <td>50</td>
                                            <td>50</td>
                                            <td>50</td>
                                            <td>50</td>
                                        </tr>
                                        <tr>
                                            <td>2</td>
                                            <td>Whatsapp</td>
                                            <td>50</td>
                                            <td>50</td>
                                            <td>50</td>
                                            <td>50</td>
                                            <td>50</td>
                                            <td>50</td>
                                        </tr>
                                        <tr>
                                            <td>3</td>
                                            <td>Line</td>
                                            <td>50</td>
                                            <td>50</td>
                                            <td>50</td>
                                            <td>50</td>
                                            <td>50</td>
                                            <td>50</td>
                                        </tr>
                                        <tr>
                                            <td>4</td>
                                            <td>Voice</td>
                                            <td>50</td>
                                            <td>50</td>
                                            <td>50</td>
                                            <td>50</td>
                                            <td>50</td>
                                            <td>50</td>
                                        </tr>
                                        <tr>
                                            <td>5</td>
                                            <td>Facebook</td>
                                            <td>50</td>
                                            <td>50</td>
                                            <td>50</td>
                                            <td>50</td>
                                            <td>50</td>
                                            <td>50</td>
                                        </tr>
                                        <tr>
                                            <td>6</td>
                                            <td>Messenger</td>
                                            <td>50</td>
                                            <td>50</td>
                                            <td>50</td>
                                            <td>50</td>
                                            <td>50</td>
                                            <td>50</td>
                                        </tr>
                                        <tr>
                                            <td>7</td>
                                            <td>Twitter DM</td>
                                            <td>50</td>
                                            <td>50</td>
                                            <td>50</td>
                                            <td>50</td>
                                            <td>50</td>
                                            <td>50</td>
                                        </tr>
                                        <tr>
                                            <td>8</td>
                                            <td>Twitter Post</td>
                                            <td>50</td>
                                            <td>50</td>
                                            <td>50</td>
                                            <td>50</td>
                                            <td>50</td>
                                            <td>50</td>
                                        </tr>
                                        <tr>
                                            <td>9</td>
                                            <td>Live Chat</td>
                                            <td>50</td>
                                            <td>50</td>
                                            <td>50</td>
                                            <td>50</td>
                                            <td>50</td>
                                            <td>50</td>
                                        </tr>
                                        <tr>
                                            <td>10</td>
                                            <td>Telegram</td>
                                            <td>50</td>
                                            <td>50</td>
                                            <td>50</td>
                                            <td>50</td>
                                            <td>50</td>
                                            <td>50</td>
                                        </tr>
                                        <tr>
                                            <td>11</td>
                                            <td>SMS</td>
                                            <td>50</td>
                                            <td>50</td>
                                            <td>50</td>
                                            <td>50</td>
                                            <td>50</td>
                                            <td>50</td>
                                        </tr>
                                        <tr>
                                            <td>12</td>
                                            <td>Email</td>
                                            <td>50</td>
                                            <td>50</td>
                                            <td>50</td>
                                            <td>50</td>
                                            <td>50</td>
                                            <td>50</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <!-- table-responsive -->
                        </div>
                    </div>
                </div>
                <?php $this->load->view('temp/footer');?>
                <!-- <script src="<?= base_url()?>assets/public/js/app/api.js"></script> -->
                <script src="<?= base_url()?>assets/public/js/app/app-nfcr.js"></script>