<!-- Global Loader-->
<div id="global-loader"><img src="<?= base_url()?>assets/images/svgs/loader.svg" alt="loader"></div>
<div class="page">
    <div class="page-main">
        <div class=" app-content mt-6">
            <div class="side-app">
                <div class="page-header d-flex p-2 bd-highlight">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item active" aria-current="page">
                            <h4 class="page-title"><i class="fe fe-grid mr-1"></i>Wallboard</h4>
                        </li>
                        <li class="breadcrumb-item active mt-2" aria-current="page">Summary Traffic by Today</li>
                    </ol>
                </div>
                <!--Page Header-->
            </div>

            <!----First Rows--->

            <!---Next Rows---->
            <div class="row">
                <div class="col-md-12 col-lg-4">
                    <div class="card">
                        <div class="card-header-small bg-red">
                            <h5 class="card-title-small card-pt10">Summary Traffic by Channel</h5>
                        </div>
                        <div class="card-body" id="barWallTrafficDayDiv">
                            <canvas id="barWallTrafficDay"></canvas>

                        </div>
                    </div>
                </div>
                <div class="col-md-12 col-lg-8">
                    <div class="card">
                        <div class="card-header-small bg-red">
                            <h5 class="card-title-small card-pt10">Traffic by Interval</h5>
                        </div>
                        <div class="card-body" id="lineWallsumTrafficDayDiv">
                            <canvas id="lineWallsumTrafficDay" class="h-400"></canvas>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 col-lg-12">
                    <div class="card">
                        <div class="card-header-small bg-red">
                            <h5 class="card-title-small card-pt10">Traffic Interval by Channel</h5>
                        </div>
                        <div class="table-responsive table-bordered" style="padding:5px;">
                            <table class="table card-table table-striped table-vcenter table-hover table-pt10" style="font-size:12px" id="wall-today-tbl">
                                <thead class="text-center text-white" style="background:#072f50;">
                                    <tr>
                                        <td rowspan="2" class="font-weight-extrabold">Time</td>
                                        <td rowspan="2" class="font-weight-extrabold">Total<br>Agent</td>
                                        <td colspan="12" class="font-weight-extrabold">Channel</td>
                                    </tr>
                                    <tr>
                                        <td class="bg-column">Facebook</td>
                                        <td class="bg-column">Whatsapp</td>
                                        <td class="bg-column">Twitter</td>
                                        <td class="bg-column">Email</td>
                                        <td class="bg-column">Telegram</td>
                                        <td class="bg-column">Line</td>
                                        <td class="bg-column">Voice</td>
                                        <td class="bg-column">Instagram</td>
                                        <td class="bg-column">Messenger</td>
                                        <td class="bg-column">Twitter DM</td>
                                        <td class="bg-column">Live Chat</td>
                                        <td class="bg-column">SMS</td>
                                    </tr>
                                </thead>
                                <tbody class="table-sm text-center" id="mytbody">
                                    
                                </tbody>
                                <tfoot class="bg-total table-sm font-weight-extrabold text-center" id="mytfoot">
                                   
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <?php $this->load->view('temp/footer');?>
            <!--Plugin -->
            <script src="<?=base_url()?>assets/public/js/app/app-wall-sumTraffic-day.js"></script>