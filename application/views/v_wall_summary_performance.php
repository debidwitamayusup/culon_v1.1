<div class=" app-content">
    <div class="side-app">
        <div class="page-header d-flex p-2 bd-highlight">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active" aria-current="page">
                    <h4 class="page-title"><i class="fe fe-monitor mr-1"></i>Wallboard</h4>
                </li>
                <li class="breadcrumb-item active mt-2" aria-current="page">Summary Performance Realtime</li>
            </ol>
        </div>
        <!-- <div class="d-flex bd-highlight">
            <div class="ml-auto p-2 bd-highlight mt-3 h6">Layanan </div>
            <div class="p-2 bd-highlight">
                <select class="form-control" id="channel_name">
                    <option value="#">Layanan</option>
                </select>
            </div>
        </div> -->
        <!---Next Rows---->
        <div class="row margin0-4">
            <div class="col-md-12 col-lg-12">
                <div class="card">
                    <div class="card-header-small">
                        <h5 class="card-title-small card-pt10">Realtime</h5>
                    </div>
                    <div class="row mt-2 mb-2" style="padding: 0px 7px 0px 7px;">
                        <div class="col-md-6">
                            <div class="table-responsive table-bordered" style="padding:2px;">
                                <table
                                    class="table card-table table-striped table-vcenter table-hover table-pt10 fontNunito9"
                                    id="mytable_1">
                                    <thead class="text-center text-white bg-head" id="mythead_1">
                                        <tr>
                                            <td>No</td>
                                            <td>Tenant</td>
                                            <td>Queue</td>
                                            <td>ART<br>(Waiting Time)</td>
                                            <td>AHT</td>
                                            <td>AST</td>
                                            <td>MSG IN</td>
                                            <td>MSG OUT</td>
                                            <td>ABD</td>
                                            <td>Handling</td>
                                            <td>Offered</td>
                                            <td>SCR</td>
                                        </tr>
                                    </thead>
                                    <tbody class="table-sm" id="mytbody_1">
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="table-responsive table-bordered" style="padding:2px;">
                                <table
                                    class="table card-table table-striped table-vcenter table-hover table-pt10 fontNunito9"
                                    id="mytable_2">
                                    <thead class="text-center text-white bg-head" id="mythead_2">
                                        <tr>
                                            <td>No</td>
                                            <td>Tenant</td>
                                            <td>Queue</td>
                                            <td>ART<br>(Waiting Time)</td>
                                            <td>AHT</td>
                                            <td>AST</td>
                                            <td>MSG IN</td>
                                            <td>MSG OUT</td>
                                            <td>ABD</td>
                                            <td>Handling</td>
                                            <td>Offered</td>
                                            <td>SCR</td>
                                        </tr>
                                    </thead>
                                    <tbody class="table-sm" id="mytbody_2">
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="row" id="rowDiv">
                            <!-- <div class="col-md-3">
                                <h6 class="font12" id="totalCOF">Total COF : 8181</h6>
                            </div>
                            <div class="col-md-3">
                                <h6 class="font12" id="rataSCR">Rata-rata SCR : 40%</h6>
                            </div>
                            <div class="col-md-3">
                                <h6 class="font12" id="avgWaiting">Average Waiting : 00:09:00</h6>
                            </div>
                            <div class="col-md-3">
                                <h6 class="font12" id="avgHT">Average Handling Time : 00:09:00</h6>
                            </div> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row margin0-4">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header-small">
                        <h5 class="card-title-small card-pt10">Summary Traffic Today</h5>
                    </div>
                    <div class="row mt-2" style="padding-left:4px; padding-right:4px">
                        <div class="col-lg-4 col-md-12">
                            <div class="card">
                                <div class="card-pie">
                                    <div class="canvas-con">
                                        <div id="legend" class="legend-con"></div>
                                        <div class="canvas-con-inner mb-3" id="canvas-pie">
                                            <canvas id="pieChartChannel" class="donutShadow overflow-hidden"></canvas>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-8 col-md-12">
                            <div class="card">
                                <div class="table-responsive table-bordered" style="padding:2px;">
                                    <table
                                        class="table card-table table-striped table-vcenter table-hover table-pt10 fontNunito9"
                                        id="table_channel">
                                        <thead class="text-center text-white bg-head">
                                            <tr>
                                                <td>No</td>
                                                <td>Channel</td>
                                                <td>Queue</td>
                                                <td>ART<br>(Waiting Time)</td>
                                                <td>AHT</td>
                                                <td>AST</td>
                                                <td>MSG IN</td>
                                                <td>MSG OUT</td>
                                                <td>ABD</td>
                                                <td>Handling</td>
                                                <td>Offered</td>
                                                <td>SCR</td>
                                            </tr>
                                        </thead>
                                        <tbody class="table-md" id="table_channel_body">
                                            <!-- <tr>
                                                <td class="text-center">1</td>
                                                <td class="text-left">Whatsapp</td>
                                                <td class="text-right">190</td>
                                                <td class="text-center">00:00:00</td>
                                                <td class="text-center">00:00:00</td>
                                                <td class="text-center">00:00:00</td>
                                                <td class="text-right">90</td>
                                                <td class="text-right">90</td>
                                                <td class="text-right">90</td>
                                                <td class="text-right">90</td>
                                                <td class="text-right">90</td>
                                                <td class="text-right">90</td>
                                            </tr>
                                            <tr>
                                                <td class="text-center">2</td>
                                                <td class="text-left">Whatsapp</td>
                                                <td class="text-right">190</td>
                                                <td class="text-center">00:00:00</td>
                                                <td class="text-center">00:00:00</td>
                                                <td class="text-center">00:00:00</td>
                                                <td class="text-right">90</td>
                                                <td class="text-right">90</td>
                                                <td class="text-right">90</td>
                                                <td class="text-right">90</td>
                                                <td class="text-right">90</td>
                                                <td class="text-right">90</td>
                                            </tr>
                                            <tr>
                                                <td class="text-center">3</td>
                                                <td class="text-left">Whatsapp</td>
                                                <td class="text-right">190</td>
                                                <td class="text-center">00:00:00</td>
                                                <td class="text-center">00:00:00</td>
                                                <td class="text-center">00:00:00</td>
                                                <td class="text-right">90</td>
                                                <td class="text-right">90</td>
                                                <td class="text-right">90</td>
                                                <td class="text-right">90</td>
                                                <td class="text-right">90</td>
                                                <td class="text-right">90</td>
                                            </tr>
                                            <tr>
                                                <td class="text-center">4</td>
                                                <td class="text-left">Whatsapp</td>
                                                <td class="text-right">190</td>
                                                <td class="text-center">00:00:00</td>
                                                <td class="text-center">00:00:00</td>
                                                <td class="text-center">00:00:00</td>
                                                <td class="text-right">90</td>
                                                <td class="text-right">90</td>
                                                <td class="text-right">90</td>
                                                <td class="text-right">90</td>
                                                <td class="text-right">90</td>
                                                <td class="text-right">90</td>
                                            </tr>
                                            <tr>
                                                <td class="text-center">5</td>
                                                <td class="text-left">Whatsapp</td>
                                                <td class="text-right">190</td>
                                                <td class="text-center">00:00:00</td>
                                                <td class="text-center">00:00:00</td>
                                                <td class="text-center">00:00:00</td>
                                                <td class="text-right">90</td>
                                                <td class="text-right">90</td>
                                                <td class="text-right">90</td>
                                                <td class="text-right">90</td>
                                                <td class="text-right">90</td>
                                                <td class="text-right">90</td>
                                            </tr>
                                            <tr>
                                                <td class="text-center">6</td>
                                                <td class="text-left">Whatsapp</td>
                                                <td class="text-right">190</td>
                                                <td class="text-center">00:00:00</td>
                                                <td class="text-center">00:00:00</td>
                                                <td class="text-center">00:00:00</td>
                                                <td class="text-right">90</td>
                                                <td class="text-right">90</td>
                                                <td class="text-right">90</td>
                                                <td class="text-right">90</td>
                                                <td class="text-right">90</td>
                                                <td class="text-right">90</td>
                                            </tr>
                                            <tr>
                                                <td class="text-center">7</td>
                                                <td class="text-left">Whatsapp</td>
                                                <td class="text-right">190</td>
                                                <td class="text-center">00:00:00</td>
                                                <td class="text-center">00:00:00</td>
                                                <td class="text-center">00:00:00</td>
                                                <td class="text-right">90</td>
                                                <td class="text-right">90</td>
                                                <td class="text-right">90</td>
                                                <td class="text-right">90</td>
                                                <td class="text-right">90</td>
                                                <td class="text-right">90</td>
                                            </tr>
                                            <tr>
                                                <td class="text-center">8</td>
                                                <td class="text-left">Whatsapp</td>
                                                <td class="text-right">190</td>
                                                <td class="text-center">00:00:00</td>
                                                <td class="text-center">00:00:00</td>
                                                <td class="text-center">00:00:00</td>
                                                <td class="text-right">90</td>
                                                <td class="text-right">90</td>
                                                <td class="text-right">90</td>
                                                <td class="text-right">90</td>
                                                <td class="text-right">90</td>
                                                <td class="text-right">90</td>
                                            </tr>
                                            <tr>
                                                <td class="text-center">9</td>
                                                <td class="text-left">Whatsapp</td>
                                                <td class="text-right">190</td>
                                                <td class="text-center">00:00:00</td>
                                                <td class="text-center">00:00:00</td>
                                                <td class="text-center">00:00:00</td>
                                                <td class="text-right">90</td>
                                                <td class="text-right">90</td>
                                                <td class="text-right">90</td>
                                                <td class="text-right">90</td>
                                                <td class="text-right">90</td>
                                                <td class="text-right">90</td>
                                            </tr>
                                            <tr>
                                                <td class="text-center">10</td>
                                                <td class="text-left">Whatsapp</td>
                                                <td class="text-right">190</td>
                                                <td class="text-center">00:00:00</td>
                                                <td class="text-center">00:00:00</td>
                                                <td class="text-center">00:00:00</td>
                                                <td class="text-right">90</td>
                                                <td class="text-right">90</td>
                                                <td class="text-right">90</td>
                                                <td class="text-right">90</td>
                                                <td class="text-right">90</td>
                                                <td class="text-right">90</td>
                                            </tr>
                                            <tr>
                                                <td class="text-center">11</td>
                                                <td class="text-left">Whatsapp</td>
                                                <td class="text-right">190</td>
                                                <td class="text-center">00:00:00</td>
                                                <td class="text-center">00:00:00</td>
                                                <td class="text-center">00:00:00</td>
                                                <td class="text-right">90</td>
                                                <td class="text-right">90</td>
                                                <td class="text-right">90</td>
                                                <td class="text-right">90</td>
                                                <td class="text-right">90</td>
                                                <td class="text-right">90</td>
                                            </tr>
                                            <tr>
                                                <td class="text-center">12</td>
                                                <td class="text-left">Whatsapp</td>
                                                <td class="text-right">190</td>
                                                <td class="text-center">00:00:00</td>
                                                <td class="text-center">00:00:00</td>
                                                <td class="text-center">00:00:00</td>
                                                <td class="text-right">90</td>
                                                <td class="text-right">90</td>
                                                <td class="text-right">90</td>
                                                <td class="text-right">90</td>
                                                <td class="text-right">90</td>
                                                <td class="text-right">90</td>
                                            </tr>
                                            <tr>
                                                <td class="text-center">13</td>
                                                <td class="text-left">Whatsapp</td>
                                                <td class="text-right">190</td>
                                                <td class="text-center">00:00:00</td>
                                                <td class="text-center">00:00:00</td>
                                                <td class="text-center">00:00:00</td>
                                                <td class="text-right">90</td>
                                                <td class="text-right">90</td>
                                                <td class="text-right">90</td>
                                                <td class="text-right">90</td>
                                                <td class="text-right">90</td>
                                                <td class="text-right">90</td>
                                            </tr>
                                            <tr>
                                                <td class="text-center">14</td>
                                                <td class="text-left">Whatsapp</td>
                                                <td class="text-right">190</td>
                                                <td class="text-center">00:00:00</td>
                                                <td class="text-center">00:00:00</td>
                                                <td class="text-center">00:00:00</td>
                                                <td class="text-right">90</td>
                                                <td class="text-right">90</td>
                                                <td class="text-right">90</td>
                                                <td class="text-right">90</td>
                                                <td class="text-right">90</td>
                                                <td class="text-right">90</td>
                                            </tr>
                                            <tr>
                                                <td class="text-center">15</td>
                                                <td class="text-left">Whatsapp</td>
                                                <td class="text-right">190</td>
                                                <td class="text-center">00:00:00</td>
                                                <td class="text-center">00:00:00</td>
                                                <td class="text-center">00:00:00</td>
                                                <td class="text-right">90</td>
                                                <td class="text-right">90</td>
                                                <td class="text-right">90</td>
                                                <td class="text-right">90</td>
                                                <td class="text-right">90</td>
                                                <td class="text-right">90</td>
                                            </tr>
                                            <tr>
                                                <td class="text-center">16</td>
                                                <td class="text-left">Whatsapp</td>
                                                <td class="text-right">190</td>
                                                <td class="text-center">00:00:00</td>
                                                <td class="text-center">00:00:00</td>
                                                <td class="text-center">00:00:00</td>
                                                <td class="text-right">90</td>
                                                <td class="text-right">90</td>
                                                <td class="text-right">90</td>
                                                <td class="text-right">90</td>
                                                <td class="text-right">90</td>
                                                <td class="text-right">90</td>
                                            </tr> -->
                                        </tbody>
                                        <tfoot class="table-sm bg-total" id="table_channel_foot">
                                            <!-- <tr class="font-bold">
                                            <td colspan="2" class="text-center">Total</td>
                                            <td class="text-right">900</td>
                                            <td class="text-center">00:00:00</td>
                                            <td class="text-center">00:00:00</td>
                                            <td class="text-center">00:00:00</td>
                                            <td class="text-right">900</td>
                                            <td class="text-right">900</td>
                                            <td class="text-right">900</td>
                                            <td class="text-right">900</td>
                                            <td class="text-right">900</td>
                                            <td class="text-right">90%</td>
                                        </tr> -->
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row" style="padding-left:4px; padding-right:4px">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header-small">
                                    <h5 class="card-title-small card-pt10">Traffic by Layanan</h5>
                                </div>
                                <div class="card-body" id="BarWallPerformanceDiv">
                                    <canvas id="BarWallPerformance" class="h-400"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <?php $this->load->view('temp/footer');?>
    <!--Plugin -->
    <script src="<?=base_url()?>assets/public/js/app/app-wall-summary-performance.js"></script>