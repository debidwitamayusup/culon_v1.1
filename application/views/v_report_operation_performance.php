<div class=" app-content">
    <div class="side-app">
        <div class="page-header d-flex p-2 bd-highlight">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active" aria-current="page">
                    <h4 class="page-title"><i class="si si-layers mr-1"></i>Report</h4>
                </li>
                <li class="breadcrumb-item active mt-2" aria-current="page">Operation Performance</li>
            </ol>
        </div>
        <!--Page Header-->
        <div class="row mt-2">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header-small">
                        <div class="row">
                            <div class="col-xs-auto ml-1">
                                <div class="input-group" style="width:140px">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <i class="fa fa-calendar tx-16 lh-0 op-6"></i>
                                        </div>
                                    </div><input class="form-control fc-datepicker" id="start-date" placeholder="Start Date"
                                        type="text">
                                </div>
                            </div>
                            <div class="col-sm-auto h6 mt-3">to</div>
                            <div class="col-xs-auto">
                                <div class="input-group" style="width:140px">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <i class="fa fa-calendar tx-16 lh-0 op-6"></i>
                                        </div>
                                    </div><input class="form-control fc-datepicker" id="end-date" placeholder="End Date" type="text">
                                </div>
                            </div>
                            <div class="col-sm-auto ml-1">
                                <div class="form-group row">
                                    <select class="form-control" id="layanan_name">
                                        <!-- <option value="">All Layanan</option>
                                        <option value="oct_telkomcare">Telkom Care</option>
                                        <option value="oct_bri">BRI</option>
                                        <option value="oct_telkomsel">Telkomsel</option> -->
                                    </select>
                                </div>
                            </div>
                            <div class="col-xs-auto ml-1">
                                <button class="btn btn-sm btn-grey" type="button" style="height:35px" id="btn-go"><i
                                        class="fas fa-filter"></i></button>

                            </div>
                            <div class="col-xs-auto ml-1">
                                <button class="btn btn-sm btn-primary" type="button" style="height:35px"
                                    id="btn-export"><i class="fas fa-download mr-2"></i>Export</button>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 col-lg-12 col-xl-12">
                <div class="card">
                    <div class="card-header-small">
                        <h5 class="card-title-small card-pt10">Summary by Date</h5>
                    </div>
                    <div class="table-responsive" style="padding:12px;">
                        <table id="tableOperationPerform1" class="table table-sm table-striped table-bordered fontNunito12"
                            width="100%">
                            <thead class="text-center text-white bg-head">
                                <tr>
                                    <td class="wd-15p border-bottom-0 text-center" width="20">No</td>
                                    <td class="wd-15p border-bottom-0 text-center">Date</td>
                                    <td class="wd-15p border-bottom-0 text-center">Offered</td>
                                    <td class="wd-15p border-bottom-0 text-center">Handled</td>
                                    <td class="wd-15p border-bottom-0 text-center">Unhandled</td>
                                    <td class="wd-15p border-bottom-0 text-center">ART</td>
                                    <td class="wd-15p border-bottom-0 text-center">AHT</td>
                                    <td class="wd-15p border-bottom-0 text-center">AST</td>
                                    <td class="wd-15p border-bottom-0 text-center">SCR</td>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- <tr>
                                    <td class="text-center">1</td>
                                    <td class="text-center">2020-01-01</td>
                                    <td class="text-right">200</td>
                                    <td class="text-right">200</td>
                                    <td class="text-right">200</td>
                                    <td class="text-center">00:00:00</td>
                                    <td class="text-center">00:00:00</td>
                                    <td class="text-center">00:00:00</td>
                                    <td class="text-center">100%</td>
                                </tr>
                                <tr>
                                    <td class="text-center">2</td>
                                    <td class="text-center">2020-01-01</td>
                                    <td class="text-right">200</td>
                                    <td class="text-right">200</td>
                                    <td class="text-right">200</td>
                                    <td class="text-center">00:00:00</td>
                                    <td class="text-center">00:00:00</td>
                                    <td class="text-center">00:00:00</td>
                                    <td class="text-center">100%</td>
                                </tr>
                                <tr>
                                    <td class="text-center">3</td>
                                    <td class="text-center">2020-01-01</td>
                                    <td class="text-right">200</td>
                                    <td class="text-right">200</td>
                                    <td class="text-right">200</td>
                                    <td class="text-center">00:00:00</td>
                                    <td class="text-center">00:00:00</td>
                                    <td class="text-center">00:00:00</td>
                                    <td class="text-center">100%</td>
                                </tr>
                                <tr>
                                    <td class="text-center">4</td>
                                    <td class="text-center">2020-01-01</td>
                                    <td class="text-right">200</td>
                                    <td class="text-right">200</td>
                                    <td class="text-right">200</td>
                                    <td class="text-center">00:00:00</td>
                                    <td class="text-center">00:00:00</td>
                                    <td class="text-center">00:00:00</td>
                                    <td class="text-center">100%</td>
                                </tr>
                                <tr>
                                    <td class="text-center">5</td>
                                    <td class="text-center">2020-01-01</td>
                                    <td class="text-right">200</td>
                                    <td class="text-right">200</td>
                                    <td class="text-right">200</td>
                                    <td class="text-center">00:00:00</td>
                                    <td class="text-center">00:00:00</td>
                                    <td class="text-center">00:00:00</td>
                                    <td class="text-center">100%</td>
                                </tr>
                                <tr>
                                    <td class="text-center">5</td>
                                    <td class="text-center">2020-01-01</td>
                                    <td class="text-right">200</td>
                                    <td class="text-right">200</td>
                                    <td class="text-right">200</td>
                                    <td class="text-center">00:00:00</td>
                                    <td class="text-center">00:00:00</td>
                                    <td class="text-center">00:00:00</td>
                                    <td class="text-center">100%</td>
                                </tr>
                                <tr>
                                    <td class="text-center">6</td>
                                    <td class="text-center">2020-01-01</td>
                                    <td class="text-right">200</td>
                                    <td class="text-right">200</td>
                                    <td class="text-right">200</td>
                                    <td class="text-center">00:00:00</td>
                                    <td class="text-center">00:00:00</td>
                                    <td class="text-center">00:00:00</td>
                                    <td class="text-center">100%</td>
                                </tr>
                                <tr>
                                    <td class="text-center">7</td>
                                    <td class="text-center">2020-01-01</td>
                                    <td class="text-right">200</td>
                                    <td class="text-right">200</td>
                                    <td class="text-right">200</td>
                                    <td class="text-center">00:00:00</td>
                                    <td class="text-center">00:00:00</td>
                                    <td class="text-center">00:00:00</td>
                                    <td class="text-center">100%</td>
                                </tr>
                                <tr>
                                    <td class="text-center">8</td>
                                    <td class="text-center">2020-01-01</td>
                                    <td class="text-right">200</td>
                                    <td class="text-right">200</td>
                                    <td class="text-right">200</td>
                                    <td class="text-center">00:00:00</td>
                                    <td class="text-center">00:00:00</td>
                                    <td class="text-center">00:00:00</td>
                                    <td class="text-center">100%</td>
                                </tr>
                                <tr>
                                    <td class="text-center">9</td>
                                    <td class="text-center">2020-01-01</td>
                                    <td class="text-right">200</td>
                                    <td class="text-right">200</td>
                                    <td class="text-right">200</td>
                                    <td class="text-center">00:00:00</td>
                                    <td class="text-center">00:00:00</td>
                                    <td class="text-center">00:00:00</td>
                                    <td class="text-center">100%</td>
                                </tr>
                                <tr>
                                    <td class="text-center">10</td>
                                    <td class="text-center">2020-01-01</td>
                                    <td class="text-right">200</td>
                                    <td class="text-right">200</td>
                                    <td class="text-right">200</td>
                                    <td class="text-center">00:00:00</td>
                                    <td class="text-center">00:00:00</td>
                                    <td class="text-center">00:00:00</td>
                                    <td class="text-center">100%</td>
                                </tr> -->
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 col-lg-12 col-xl-12">
                <div class="card">
                    <div class="card-header-small">
                        <h5 class="card-title-small card-pt10">Summary by Skill</h5>
                    </div>
                    <div class="table-responsive" style="padding:12px;">
                        <table id="tableOperationPerform2" class="table table-sm table-striped table-bordered fontNunito12"
                            width="100%">
                            <thead class="text-center text-white bg-head">
                                <tr>
                                    <td class="wd-15p border-bottom-0 text-center" width="20">No</td>
                                    <td class="wd-15p border-bottom-0 text-center">Skill ID</td>
                                    <td class="wd-15p border-bottom-0 text-center">Skill Name</td>
                                    <td class="wd-15p border-bottom-0 text-center">Offered</td>
                                    <td class="wd-15p border-bottom-0 text-center">Handled</td>
                                    <td class="wd-15p border-bottom-0 text-center">Unhandled</td>
                                    <td class="wd-15p border-bottom-0 text-center">ART</td>
                                    <td class="wd-15p border-bottom-0 text-center">AHT</td>
                                    <td class="wd-15p border-bottom-0 text-center">AST</td>
                                    <td class="wd-15p border-bottom-0 text-center">SCR</td>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="text-center">1</td>
                                    <td class="text-center">1</td>
                                    <td class="text-left">All</td>
                                    <td class="text-right">200</td>
                                    <td class="text-right">200</td>
                                    <td class="text-right">200</td>
                                    <td class="text-center">00:00:00</td>
                                    <td class="text-center">00:00:00</td>
                                    <td class="text-center">00:00:00</td>
                                    <td class="text-center">100%</td>
                                </tr>
                                <tr>
                                    <td class="text-center">2</td>
                                    <td class="text-center">2</td>
                                    <td class="text-left">Voice</td>
                                    <td class="text-right">200</td>
                                    <td class="text-right">200</td>
                                    <td class="text-right">200</td>
                                    <td class="text-center">00:00:00</td>
                                    <td class="text-center">00:00:00</td>
                                    <td class="text-center">00:00:00</td>
                                    <td class="text-center">100%</td>
                                </tr>
                                <tr>
                                    <td class="text-center">3</td>
                                    <td class="text-center">3</td>
                                    <td class="text-left">Sosmed</td>
                                    <td class="text-right">200</td>
                                    <td class="text-right">200</td>
                                    <td class="text-right">200</td>
                                    <td class="text-center">00:00:00</td>
                                    <td class="text-center">00:00:00</td>
                                    <td class="text-center">00:00:00</td>
                                    <td class="text-center">100%</td>
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
    <script src="<?=base_url()?>assets/public/js/app/app-report-operation-performance.js"></script>