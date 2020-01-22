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
                            <table class="table card-table table-striped table-vcenter table-hover table-pt10" style="font-size:12px" id="mytable">
                                <thead class="text-center text-white" style="background:#072f50;">
                                    <tr>
                                        <td class="font-weight-extrabold">Channel</td>
                                        <td rowspan="2" class="bg-column">Whatsapp</td>
                                        <td rowspan="2" class="bg-column">Facebook</td>
                                        <td rowspan="2" class="bg-column">Twitter</td>
                                        <td rowspan="2" class="bg-column">Twitter DM</td>
                                        <td rowspan="2" class="bg-column">Messenger</td>
                                        <td rowspan="2" class="bg-column">Instagram</td>
                                        <td rowspan="2" class="bg-column">Line</td>
                                        <td rowspan="2" class="bg-column">Telegram</td>
                                        <td rowspan="2" class="bg-column">Email</td>
                                        <td rowspan="2" class="bg-column">Voice</td>
                                        <td rowspan="2" class="bg-column">SMS</td>
                                        <td rowspan="2" class="bg-column">Live Chat</td>
                                    </tr>
                                    <tr>
                                        <td class="font-weight-extrabold">Time</td>
                                    </tr>
                                </thead>
                                <tbody class="text-center">
                                    <tr>
                                        <td class="bg-rows font-weight-extrabold">00:00</td>
                                        <td>200</td>
                                        <td>400</td>
                                        <td>500</td>
                                        <td>600</td>
                                        <td>700</td>
                                        <td>800</td>
                                        <td>900</td>
                                        <td>200</td>
                                        <td>300</td>
                                        <td>400</td>
                                        <td>500</td>
                                        <td>600</td>
                                    </tr>
                                    <tr>
                                        <td class="bg-rows font-weight-extrabold">01:00</td>
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
                                        <td class="bg-rows font-weight-extrabold">02:00</td>
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
                                        <td class="bg-rows font-weight-extrabold">03:00</td>
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
                                        <td class="bg-rows font-weight-extrabold">04:00</td>
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
                                        <td class="bg-rows font-weight-extrabold">05:00</td>
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
                                        <td class="bg-rows font-weight-extrabold">07:00</td>
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
                                        <td class="bg-rows font-weight-extrabold">08:00</td>
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
                                        <td class="bg-rows font-weight-extrabold">09:00</td>
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
                                        <td class="bg-rows font-weight-extrabold">10:00</td>
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
                                        <td class="bg-rows font-weight-extrabold">11:00</td>
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
                                        <td class="bg-rows font-weight-extrabold">12:00</td>
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
                                        <td class="bg-rows font-weight-extrabold">13:00</td>
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
                                        <td class="bg-rows font-weight-extrabold">14:00</td>
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
                                        <td class="bg-rows font-weight-extrabold">15:00</td>
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
                                        <td class="bg-rows font-weight-extrabold">16:00</td>
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
                                        <td class="bg-rows font-weight-extrabold">17:00</td>
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
                                        <td class="bg-rows font-weight-extrabold">18:00</td>
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
                                        <td class="bg-rows font-weight-extrabold">19:00</td>
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
                                        <td class="bg-rows font-weight-extrabold">20:00</td>
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
                                        <td class="bg-rows font-weight-extrabold">21:00</td>
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
                                        <td class="bg-rows font-weight-extrabold">22:00</td>
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
                                        <td class="bg-rows font-weight-extrabold">23:00</td>
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
                                    <td class="bg-rows font-weight-extrabold">24:00</td>
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
                                <tfoot class="bg-total font-weight-extrabold text-right">
                                    <tr>
                                    <td>TOTAL</td>
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
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <?php $this->load->view('temp/footer');?>
            <!--Plugin -->
            <script src="<?=base_url()?>assets/public/js/app/app-wall-sumTraffic-day.js"></script>