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
                        <div class="card-body">
                            <canvas id="barWallTrafficDay"></canvas>

                        </div>
                    </div>
                </div>
                <div class="col-md-12 col-lg-8">
                    <div class="card">
                        <div class="card-header-small bg-red">
                            <h5 class="card-title-small card-pt10">Traffic by Interval</h5>
                        </div>
                        <div class="card-body">
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
                            <table class="table card-table table-striped table-vcenter table-hover table-pt10" style="font-size:12px">
                                <thead class="text-center text-white" style="background:#072f50;">
                                    <tr>
                                        <td>Channel</td>
                                        <td rowspan="2">Whatsapp</td>
                                        <td rowspan="2">Facebook</td>
                                        <td rowspan="2">Twitter</td>
                                        <td rowspan="2">Twitter DM</td>
                                        <td rowspan="2">Messenger</td>
                                        <td rowspan="2">Instagram</td>
                                        <td rowspan="2">Line</td>
                                        <td rowspan="2">Telegram</td>
                                        <td rowspan="2">Email</td>
                                        <td rowspan="2">Voice</td>
                                        <td rowspan="2">SMS</td>
                                        <td rowspan="2">Live Chat</td>
                                    </tr>
                                    <tr>
                                        <td>Time</td>
                                    </tr>
                                </thead>
                                <tbody class="text-center">
                                    <tr>
                                        <td class="bg-rows">00:00</td>
                                        <td>200</td>
                                        <td>200</td>
                                        <td>200</td>
                                        <td>200</td>
                                        <td>200</td>
                                        <td>200</td>
                                        <td>200</td>
                                        <td>200</td>
                                        <td>200</td>
                                        <td>200</td>
                                        <td>200</td>
                                        <td>200</td>
                                    </tr>
                                    <tr>
                                        <td class="bg-rows">01:00</td>
                                        <td>200</td>
                                        <td>200</td>
                                        <td>200</td>
                                        <td>200</td>
                                        <td>200</td>
                                        <td>200</td>
                                        <td>200</td>
                                        <td>200</td>
                                        <td>200</td>
                                        <td>200</td>
                                        <td>200</td>
                                        <td>200</td>
                                    </tr>
                                    <tr>
                                        <td class="bg-rows">02:00</td>
                                        <td>200</td>
                                        <td>200</td>
                                        <td>200</td>
                                        <td>200</td>
                                        <td>200</td>
                                        <td>200</td>
                                        <td>200</td>
                                        <td>200</td>
                                        <td>200</td>
                                        <td>200</td>
                                        <td>200</td>
                                        <td>200</td>
                                    </tr>
                                    <tr>
                                        <td class="bg-rows">03:00</td>
                                        <td>200</td>
                                        <td>200</td>
                                        <td>200</td>
                                        <td>200</td>
                                        <td>200</td>
                                        <td>200</td>
                                        <td>200</td>
                                        <td>200</td>
                                        <td>200</td>
                                        <td>200</td>
                                        <td>200</td>
                                        <td>200</td>
                                    </tr>
                                    <tr>
                                        <td class="bg-rows">04:00</td>
                                        <td>200</td>
                                        <td>200</td>
                                        <td>200</td>
                                        <td>200</td>
                                        <td>200</td>
                                        <td>200</td>
                                        <td>200</td>
                                        <td>200</td>
                                        <td>200</td>
                                        <td>200</td>
                                        <td>200</td>
                                        <td>200</td>
                                    </tr>
                                    <tr>
                                        <td class="bg-rows">05:00</td>
                                        <td>200</td>
                                        <td>200</td>
                                        <td>200</td>
                                        <td>200</td>
                                        <td>200</td>
                                        <td>200</td>
                                        <td>200</td>
                                        <td>200</td>
                                        <td>200</td>
                                        <td>200</td>
                                        <td>200</td>
                                        <td>200</td>
                                    </tr>
                                    <tr>
                                        <td class="bg-rows">06:00</td>
                                        <td>200</td>
                                        <td>200</td>
                                        <td>200</td>
                                        <td>200</td>
                                        <td>200</td>
                                        <td>200</td>
                                        <td>200</td>
                                        <td>200</td>
                                        <td>200</td>
                                        <td>200</td>
                                        <td>200</td>
                                        <td>200</td>
                                    </tr>
                                    <tr>
                                        <td class="bg-rows">07:00</td>
                                        <td>200</td>
                                        <td>200</td>
                                        <td>200</td>
                                        <td>200</td>
                                        <td>200</td>
                                        <td>200</td>
                                        <td>200</td>
                                        <td>200</td>
                                        <td>200</td>
                                        <td>200</td>
                                        <td>200</td>
                                        <td>200</td>
                                    </tr>
                                    <tr>
                                        <td class="bg-rows">08:00</td>
                                        <td>200</td>
                                        <td>200</td>
                                        <td>200</td>
                                        <td>200</td>
                                        <td>200</td>
                                        <td>200</td>
                                        <td>200</td>
                                        <td>200</td>
                                        <td>200</td>
                                        <td>200</td>
                                        <td>200</td>
                                        <td>200</td>
                                    </tr>
                                    <tr>
                                        <td class="bg-rows">09:00</td>
                                        <td>200</td>
                                        <td>200</td>
                                        <td>200</td>
                                        <td>200</td>
                                        <td>200</td>
                                        <td>200</td>
                                        <td>200</td>
                                        <td>200</td>
                                        <td>200</td>
                                        <td>200</td>
                                        <td>200</td>
                                        <td>200</td>
                                    </tr>
                                    <tr>
                                        <td class="bg-rows">10:00</td>
                                        <td>200</td>
                                        <td>200</td>
                                        <td>200</td>
                                        <td>200</td>
                                        <td>200</td>
                                        <td>200</td>
                                        <td>200</td>
                                        <td>200</td>
                                        <td>200</td>
                                        <td>200</td>
                                        <td>200</td>
                                        <td>200</td>
                                    </tr>
                                    <tr>
                                        <td class="bg-rows">11:00</td>
                                        <td>200</td>
                                        <td>200</td>
                                        <td>200</td>
                                        <td>200</td>
                                        <td>200</td>
                                        <td>200</td>
                                        <td>200</td>
                                        <td>200</td>
                                        <td>200</td>
                                        <td>200</td>
                                        <td>200</td>
                                        <td>200</td>
                                    </tr>
                                    <tr>
                                        <td class="bg-rows">12:00</td>
                                        <td>200</td>
                                        <td>200</td>
                                        <td>200</td>
                                        <td>200</td>
                                        <td>200</td>
                                        <td>200</td>
                                        <td>200</td>
                                        <td>200</td>
                                        <td>200</td>
                                        <td>200</td>
                                        <td>200</td>
                                        <td>200</td>
                                    </tr>
                                    <tr>
                                        <td class="bg-rows">13:00</td>
                                        <td>200</td>
                                        <td>200</td>
                                        <td>200</td>
                                        <td>200</td>
                                        <td>200</td>
                                        <td>200</td>
                                        <td>200</td>
                                        <td>200</td>
                                        <td>200</td>
                                        <td>200</td>
                                        <td>200</td>
                                        <td>200</td>
                                    </tr>
                                    <tr>
                                        <td class="bg-rows">14:00</td>
                                        <td>200</td>
                                        <td>200</td>
                                        <td>200</td>
                                        <td>200</td>
                                        <td>200</td>
                                        <td>200</td>
                                        <td>200</td>
                                        <td>200</td>
                                        <td>200</td>
                                        <td>200</td>
                                        <td>200</td>
                                        <td>200</td>
                                    </tr>
                                    <tr>
                                        <td class="bg-rows">15:00</td>
                                        <td>200</td>
                                        <td>200</td>
                                        <td>200</td>
                                        <td>200</td>
                                        <td>200</td>
                                        <td>200</td>
                                        <td>200</td>
                                        <td>200</td>
                                        <td>200</td>
                                        <td>200</td>
                                        <td>200</td>
                                        <td>200</td>
                                    </tr>
                                    <tr>
                                        <td class="bg-rows">16:00</td>
                                        <td>200</td>
                                        <td>200</td>
                                        <td>200</td>
                                        <td>200</td>
                                        <td>200</td>
                                        <td>200</td>
                                        <td>200</td>
                                        <td>200</td>
                                        <td>200</td>
                                        <td>200</td>
                                        <td>200</td>
                                        <td>200</td>
                                    </tr>
                                    <tr>
                                        <td class="bg-rows">17:00</td>
                                        <td>200</td>
                                        <td>200</td>
                                        <td>200</td>
                                        <td>200</td>
                                        <td>200</td>
                                        <td>200</td>
                                        <td>200</td>
                                        <td>200</td>
                                        <td>200</td>
                                        <td>200</td>
                                        <td>200</td>
                                        <td>200</td>
                                    </tr>
                                    <tr>
                                        <td class="bg-rows">18:00</td>
                                        <td>200</td>
                                        <td>200</td>
                                        <td>200</td>
                                        <td>200</td>
                                        <td>200</td>
                                        <td>200</td>
                                        <td>200</td>
                                        <td>200</td>
                                        <td>200</td>
                                        <td>200</td>
                                        <td>200</td>
                                        <td>200</td>
                                    </tr>
                                    <tr>
                                        <td class="bg-rows">19:00</td>
                                        <td>200</td>
                                        <td>200</td>
                                        <td>200</td>
                                        <td>200</td>
                                        <td>200</td>
                                        <td>200</td>
                                        <td>200</td>
                                        <td>200</td>
                                        <td>200</td>
                                        <td>200</td>
                                        <td>200</td>
                                        <td>200</td>
                                    </tr>
                                    <tr>
                                        <td class="bg-rows">20:00</td>
                                        <td>200</td>
                                        <td>200</td>
                                        <td>200</td>
                                        <td>200</td>
                                        <td>200</td>
                                        <td>200</td>
                                        <td>200</td>
                                        <td>200</td>
                                        <td>200</td>
                                        <td>200</td>
                                        <td>200</td>
                                        <td>200</td>
                                    </tr>
                                    <tr>
                                        <td class="bg-rows">21:00</td>
                                        <td>200</td>
                                        <td>200</td>
                                        <td>200</td>
                                        <td>200</td>
                                        <td>200</td>
                                        <td>200</td>
                                        <td>200</td>
                                        <td>200</td>
                                        <td>200</td>
                                        <td>200</td>
                                        <td>200</td>
                                        <td>200</td>
                                    </tr>
                                    <tr>
                                        <td class="bg-rows">22:00</td>
                                        <td>200</td>
                                        <td>200</td>
                                        <td>200</td>
                                        <td>200</td>
                                        <td>200</td>
                                        <td>200</td>
                                        <td>200</td>
                                        <td>200</td>
                                        <td>200</td>
                                        <td>200</td>
                                        <td>200</td>
                                        <td>200</td>
                                    </tr>
                                    <tr>
                                        <td class="bg-rows">23:00</td>
                                        <td>200</td>
                                        <td>200</td>
                                        <td>200</td>
                                        <td>200</td>
                                        <td>200</td>
                                        <td>200</td>
                                        <td>200</td>
                                        <td>200</td>
                                        <td>200</td>
                                        <td>200</td>
                                        <td>200</td>
                                        <td>200</td>
                                    </tr>
                                    <tr>
                                        <td class="bg-rows">24:00</td>
                                        <td>200</td>
                                        <td>200</td>
                                        <td>200</td>
                                        <td>200</td>
                                        <td>200</td>
                                        <td>200</td>
                                        <td>200</td>
                                        <td>200</td>
                                        <td>200</td>
                                        <td>200</td>
                                        <td>200</td>
                                        <td>200</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <?php $this->load->view('temp/footer');?>
            <!--Plugin -->
            <script src="<?=base_url()?>assets/public/js/app/app-wall-sumTraffic-day.js"></script>