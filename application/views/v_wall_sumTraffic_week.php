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
                        <li class="breadcrumb-item active mt-2" aria-current="page">Summary Traffic by Week</li>
                    </ol>
                </div>
                <!--Page Header-->
            </div>

            <!----First Rows--->

            <!---Next Rows---->
            <div class="row">
                <div class="col-md-12 col-lg-4">
                    <div class="card">
                        <div class="card-header-small">
                            <h5 class="card-title-small card-pt10">Summary Traffic by Channel</h5>
                        </div>
                        <div class="card-body" id="barWallTrafficWeekDiv">
                            <canvas id="barWallTrafficWeek"></canvas>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 col-lg-8">
                    <div class="card">
                        <div class="card-header-small">
                            <h5 class="card-title-small card-pt10">Traffic Interval Weekly (Hours)</h5>
                        </div>
                        <div class="card-body" id="lineWallsumTrafficWeekDiv">
                            <canvas id="lineWallsumTrafficWeek" class="h-400"></canvas>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 col-lg-6">
                    <div class="card">
                        <div class="card-header-small">
                            <h5 class="card-title-small card-pt10">Table Traffic Weekly</h5>
                        </div>
                        <div class="table-responsive table-bordered" style="padding:5px;">
                            <table class="table card-table table-striped table-vcenter table-hover table-pt10" id="mytable">
                                <thead class="text-center text-white bg-head" style="font-size:11px;">
                                    <tr>
                                        <td rowspan="2" class="text-middle">No</td>
                                        <td rowspan="2" class="text-middle">Channel</td>
                                        <td colspan="7">Day</td>
                                    </tr>
                                    <tr>
                                        <td>Sun</td>
                                        <td>Mon</td>
                                        <td>Tue</td>
                                        <td>Wed</td>
                                        <td>Thu</td>
                                        <td>Fri</td>
                                        <td>Sat</td>
                                    </tr>
                                </thead>
                                <tbody class="text-center" style="font-size:10px !important;" id="mytbody">
                                   
                                </tbody>
                                <tfoot class="text-center font-weight-extrabold bg-total" id="mytfoot">
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 col-lg-6">
                    <div class="card">
                        <div class="card-header-small">
                            <h5 class="card-title-small card-pt10">Traffic Interval Weekly (Daily)</h5>
                        </div>
                        <div class="card-body">
                            <div id="echartWeek" class="chartsh-wall overflow-hidden"></div>
                        </div>
                    </div>
                </div>
            </div>
            <?php $this->load->view('temp/footer');?>
            <!--Plugin -->
            <script src="<?=base_url()?>assets/public/js/app/app-wall-sumTraffic-week.js"></script>