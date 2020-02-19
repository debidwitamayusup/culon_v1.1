<div class=" app-content">
    <div class="side-app">
        <div class="page-header d-flex p-2 bd-highlight">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active" aria-current="page">
                    <h4 class="page-title"><i class="fe fe-book mr-1"></i>Report</h4>
                </li>
                <li class="breadcrumb-item active mt-2" aria-current="page">Agent Log</li>
            </ol>
        </div>
        <!--Page Header-->

        <!----First Rows--->
        <div class="row">
            <div class="col-md-12 col-lg-12">
                <div class="card">
                    <div class="card-header-small">
                        <h5 class="card-title-small card-pt10">Agent Log</h5>
                    </div>
                    <div class="card-body">
                        <div class="row mb-2">
                            <div class="col-xs-auto ml-1">
                                <div class="input-group" style="width:130px">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <i class="fa fa-calendar tx-16 lh-0 op-6"></i>
                                        </div>
                                    </div><input class="form-control fc-datepicker" placeholder="Start Date"
                                        type="text">
                                </div>
                            </div>
                            <div class="col-sm-auto h6 mt-3">to</div>
                            <div class="col-xs-auto">
                                <div class="input-group" style="width:130px">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <i class="fa fa-calendar tx-16 lh-0 op-6"></i>
                                        </div>
                                    </div><input class="form-control fc-datepicker" placeholder="End Date" type="text">
                                </div>
                            </div>
                            <div class="col-sm-auto ml-2">
                                <div class="form-group row">
                                    <select class="form-control" id="layanan_name">
                                        <option value="ShowAll">All Layanan</option>
                                        <option value="1">Telkom</option>
                                        <option value="2">Telkomsel</option>
                                        <option value="3">BRI</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-auto ml-1">
                                <div class="form-group row">
                                    <select class="form-control" id="skill">
                                        <option value="ShowAll">Skill</option>
                                        <option value="1">All</option>
                                        <option value="2">Voice</option>
                                        <option value="3">Sosmed</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-xs-auto ml-1">
                                <button class="btn btn-sm btn-dark" type="button" style="height:35px" id="btn-go"><i
                                        class="fas fa-filter"></i></button>

                            </div>
                            <div class="col-xs-auto ml-1">
                                <button class="btn btn-sm btn-primary" type="button" style="height:35px" id="btn-go"><i
                                        class="fas fa-download mr-2"></i>Export</button>

                            </div>
                        </div>
                    </div>
                    <div class="table-responsive" style="padding:8px !important;">
                        <table id="tableAgent" class="table table-striped table-bordered fontNunito11">
                            <thead class="bg-head text-white align-middle text-center">
                                <tr>
                                    <td rowspan="2" class="wd-15p border-bottom-0 align-middle" width="20">No</td>
                                    <td rowspan="2" class="wd-15p border-bottom-0 align-middle">Date</td>
                                    <td rowspan="2" class="wd-15p border-bottom-0 align-middle">Agent ID</td>
                                    <td rowspan="2" class="wd-15p border-bottom-0 align-middle">Agent Name</td>
                                    <td rowspan="2" class="wd-15p border-bottom-0 align-middle">Skill</td>
                                    <td rowspan="2" class="wd-15p border-bottom-0 align-middle">Login Time</td>
                                    <td rowspan="2" class="wd-15p border-bottom-0 align-middle">Logout Time</td>
                                    <td rowspan="2" class="wd-15p border-bottom-0 align-middle">Staffed Time</td>
                                    <td colspan="5" class="wd-15p border-bottom-1">AUX</td>
                                </tr>
                                <tr>
                                    <td>Istirahat</td>
                                    <td>Ibadah</td>
                                    <td>Briefing</td>
                                    <td>Lain-lain</td>
                                    <td>Total</td>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="text-center">1</td>
                                    <td class="text-center">2019-01-10</td>
                                    <td class="text-center">AD2061</td>
                                    <td class="text-left">No Name</td>
                                    <td class="text-center">All</td>
                                    <td class="text-center">00:01:00</td>
                                    <td class="text-center">00:01:00</td>
                                    <td class="text-center">00:01:00</td>
                                    <td class="text-center">00:01:00</td>
                                    <td class="text-center">00:01:00</td>
                                    <td class="text-center">00:01:00</td>
                                    <td class="text-center">00:01:00</td>
                                    <td class="text-center">00:01:00</td>
                                </tr>
                                <tr>
                                    <td class="text-center">2</td>
                                    <td class="text-center">2019-01-10</td>
                                    <td class="text-center">AD2061</td>
                                    <td class="text-left">No Name</td>
                                    <td class="text-center">All</td>
                                    <td class="text-center">00:01:00</td>
                                    <td class="text-center">00:01:00</td>
                                    <td class="text-center">00:01:00</td>
                                    <td class="text-center">00:01:00</td>
                                    <td class="text-center">00:01:00</td>
                                    <td class="text-center">00:01:00</td>
                                    <td class="text-center">00:01:00</td>
                                    <td class="text-center">00:01:00</td>
                                </tr>
                                <tr>
                                    <td class="text-center">3</td>
                                    <td class="text-center">2019-01-10</td>
                                    <td class="text-center">AD2061</td>
                                    <td class="text-left">No Name</td>
                                    <td class="text-center">All</td>
                                    <td class="text-center">00:01:00</td>
                                    <td class="text-center">00:01:00</td>
                                    <td class="text-center">00:01:00</td>
                                    <td class="text-center">00:01:00</td>
                                    <td class="text-center">00:01:00</td>
                                    <td class="text-center">00:01:00</td>
                                    <td class="text-center">00:01:00</td>
                                    <td class="text-center">00:01:00</td>
                                </tr>
                                <tr>
                                    <td class="text-center">4</td>
                                    <td class="text-center">2019-01-10</td>
                                    <td class="text-center">AD2061</td>
                                    <td class="text-left">No Name</td>
                                    <td class="text-center">All</td>
                                    <td class="text-center">00:01:00</td>
                                    <td class="text-center">00:01:00</td>
                                    <td class="text-center">00:01:00</td>
                                    <td class="text-center">00:01:00</td>
                                    <td class="text-center">00:01:00</td>
                                    <td class="text-center">00:01:00</td>
                                    <td class="text-center">00:01:00</td>
                                    <td class="text-center">00:01:00</td>
                                </tr>
                                <tr>
                                    <td class="text-center">5</td>
                                    <td class="text-center">2019-01-10</td>
                                    <td class="text-center">AD2061</td>
                                    <td class="text-left">No Name</td>
                                    <td class="text-center">All</td>
                                    <td class="text-center">00:01:00</td>
                                    <td class="text-center">00:01:00</td>
                                    <td class="text-center">00:01:00</td>
                                    <td class="text-center">00:01:00</td>
                                    <td class="text-center">00:01:00</td>
                                    <td class="text-center">00:01:00</td>
                                    <td class="text-center">00:01:00</td>
                                    <td class="text-center">00:01:00</td>
                                </tr>
                                <tr>
                                    <td class="text-center">6</td>
                                    <td class="text-center">2019-01-10</td>
                                    <td class="text-center">AD2061</td>
                                    <td class="text-left">No Name</td>
                                    <td class="text-center">All</td>
                                    <td class="text-center">00:01:00</td>
                                    <td class="text-center">00:01:00</td>
                                    <td class="text-center">00:01:00</td>
                                    <td class="text-center">00:01:00</td>
                                    <td class="text-center">00:01:00</td>
                                    <td class="text-center">00:01:00</td>
                                    <td class="text-center">00:01:00</td>
                                    <td class="text-center">00:01:00</td>
                                </tr>
                                <tr>
                                    <td class="text-center">7</td>
                                    <td class="text-center">2019-01-10</td>
                                    <td class="text-center">AD2061</td>
                                    <td class="text-left">No Name</td>
                                    <td class="text-center">All</td>
                                    <td class="text-center">00:01:00</td>
                                    <td class="text-center">00:01:00</td>
                                    <td class="text-center">00:01:00</td>
                                    <td class="text-center">00:01:00</td>
                                    <td class="text-center">00:01:00</td>
                                    <td class="text-center">00:01:00</td>
                                    <td class="text-center">00:01:00</td>
                                    <td class="text-center">00:01:00</td>
                                </tr>
                                <tr>
                                    <td class="text-center">8</td>
                                    <td class="text-center">2019-01-10</td>
                                    <td class="text-center">AD2061</td>
                                    <td class="text-left">No Name</td>
                                    <td class="text-center">All</td>
                                    <td class="text-center">00:01:00</td>
                                    <td class="text-center">00:01:00</td>
                                    <td class="text-center">00:01:00</td>
                                    <td class="text-center">00:01:00</td>
                                    <td class="text-center">00:01:00</td>
                                    <td class="text-center">00:01:00</td>
                                    <td class="text-center">00:01:00</td>
                                    <td class="text-center">00:01:00</td>
                                </tr>
                                <tr>
                                    <td class="text-center">9</td>
                                    <td class="text-center">2019-01-10</td>
                                    <td class="text-center">AD2061</td>
                                    <td class="text-left">No Name</td>
                                    <td class="text-center">All</td>
                                    <td class="text-center">00:01:00</td>
                                    <td class="text-center">00:01:00</td>
                                    <td class="text-center">00:01:00</td>
                                    <td class="text-center">00:01:00</td>
                                    <td class="text-center">00:01:00</td>
                                    <td class="text-center">00:01:00</td>
                                    <td class="text-center">00:01:00</td>
                                    <td class="text-center">00:01:00</td>
                                </tr>
                                <tr>
                                    <td class="text-center">10</td>
                                    <td class="text-center">2019-01-10</td>
                                    <td class="text-center">AD2061</td>
                                    <td class="text-left">No Name</td>
                                    <td class="text-center">All</td>
                                    <td class="text-center">00:01:00</td>
                                    <td class="text-center">00:01:00</td>
                                    <td class="text-center">00:01:00</td>
                                    <td class="text-center">00:01:00</td>
                                    <td class="text-center">00:01:00</td>
                                    <td class="text-center">00:01:00</td>
                                    <td class="text-center">00:01:00</td>
                                    <td class="text-center">00:01:00</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php $this->load->view('temp/footer');?>
    <!--Plugin -->
    <script src="<?=base_url()?>assets/public/js/app/app-report-agent-log.js"></script>