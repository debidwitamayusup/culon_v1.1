<!-- Global Loader-->
    <div id="global-loader"><img src="<?= base_url()?>assets/images/svgs/loader.svg" alt="loader"></div>
    <div class="page">
        <div class="page-main">
            <div class=" app-content mt-7">
                <div class="side-app">
                    <div class="page-header d-flex bd-highlight">
                        <div class="flex-grow-1 bd-highlight">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item active" aria-current="page">
                                    <h4 class="page-title"><i class="fe fe-grid mr-1"></i>WallBoard</h4>
                                </li>
                                <li class="breadcrumb-item active mt-2" aria-current="page">Monitoring Ticket by Time
                                </li>
                            </ol>
                        </div>
                        <div class="bd-highlight text-right">
                            <div class="d-flex align-items-end flex-column bd-highlight">
                                <div class="card-options d-none d-sm-block">
                                    <div class="btn-group btn-sm">
                                        <a href="<?=base_url()?>main/monitoring_ticket_time" class="btn btn-red btn-sm"
                                            id="btn-day">
                                            <span class="">Day</a></span>
                                        <a href="<?=base_url()?>main/monitoring_ticket_time_w"
                                            class="btn btn-light btn-sm" id="btn-week">
                                            <span class="">Week</a></span>
                                        <a href="<?=base_url()?>main/monitoring_ticket_time_m"
                                            class="btn btn-light btn-sm" id="btn-month">
                                            <span class="">Month</a></span>
                                        <a href="<?=base_url()?>main/monitoring_ticket_time_y"
                                            class="btn btn-light btn-sm" id="btn-year">
                                            <span class="">Year</a></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--Page Header-->
                    <!----Baris Pertama----!-->
                    <div class="row">
                        <div class="col-xl-12 col-lg-12 col-md-12">
                            <div class="card overflow-hidden">
                                <div class="card-header-small bg-red">
                                    <h5 class="card-title-small card-pt10">Summary Ticket / Unit</h5>
                                </div>
                                <div class="card-body">
                                    <!-- <div class="row mb-3">
                                        <div class="col-md-3">
                                            <div class="w-75 input-group">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text">
                                                        <i class="fas fa-calendar tx-16 lh-0 op-6"></i>
                                                    </div>
                                                </div><input class="form-control fc-datepicker" placeholder="MM/DD/YYYY"
                                                type="text">
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text">
                                                        <i class="fe fe-chrome tx-16 lh-0 op-6"></i>
                                                    </div>
                                                </div>
                                                <select name="select-month" id="select-month" class="form-control">
                                                    <option value="#">All Status</option>
                                                    <option value="1">New</option>
                                                    <option value="2">Open</option>
                                                    <option value="3">Reject</option>
                                                    <option value="4">On Progress</option>
                                                    <option value="5">Pending</option>
                                                    <option value="6">Reopen</option>
                                                    <option value="7">Resolve</option>
                                                    <option value="8">Close</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div> -->
                                    <div class="row mb-3">
                                        <div class="col-md-3">
                                            <div class="w-75 input-group">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text">
                                                        <i class="fas fa-calendar tx-16 lh-0 op-6"></i>
                                                    </div>
                                                </div>
                                                <input class="form-control fc-datepicker" placeholder="MM/DD/YYYY"
                                                    type="text">
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text">
                                                        <i class="fe fe-chrome tx-16 lh-0 op-6"></i>
                                                    </div>
                                                </div>
                                                <select name="select-month" id="select-month" class="form-control">
                                                    <option value="#">All Status</option>
                                                    <option value="1">New</option>
                                                    <option value="2">Open</option>
                                                    <option value="3">Reject</option>
                                                    <option value="4">On Progress</option>
                                                    <option value="5">Pending</option>
                                                    <option value="6">Reopen</option>
                                                    <option value="7">Resolve</option>
                                                    <option value="8">Close</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <canvas id="TimeLineChart" class="h-400"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <!---! Kolom Channel--->
                        <div class="col-lg-5 col-md-12">
                            <div class="card overflow-hidden">
                                <div class="card-header-small bg-red">
                                    <h5 class="card-title-small card-pt10">Status Ticket / Kategori</h5>
                                </div>
                                <div class="card-body">
                                    <canvas id="pieMonitoringTime" class="donutShadow overflow-hidden"></canvas>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-7 col-md-12">
                            <div class="card overflow-hidden">
                                <div class="card-header-small bg-red">
                                    <h5 class="card-title-small card-pt10">Status Ticket</h5>
                                </div>
                                <div class="card-body">
                                    <div id="echartTicketTime" class="chartsh overflow-hidden"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php $this->load->view('temp/footer');?>
                <script src="<?= base_url()?>assets/public/js/app/app-monitoring-time.js"></script>