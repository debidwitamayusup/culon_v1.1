<!-- Global Loader-->
<div id="global-loader"><img src="<?= base_url()?>assets/images/svgs/loader.svg" alt="loader"></div>
<div class="page">
    <div class="page-main">
        <div class=" app-content mt-6">
            <div class="side-app">
                <div class="page-header d-flex p-2 bd-highlight">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item active" aria-current="page">
                            <h4 class="page-title"><i class="fe fe-book mr-1"></i>Report</h4>
                        </li>
                        <li class="breadcrumb-item active mt-2" aria-current="page">Summary Performance Agent</li>
                    </ol>
                </div>
                <!--Page Header-->
            </div>
            <!-- tabel 1 -->
            <div class="row">
                <div class="col-md-12 col-lg-12 col-xl-12">
                    <div class="card">
                        <div class="card-header-small">
                            <h5 class="card-title-small card-pt10">Summary Performance Agent</h5>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-xs-auto ml-1">
                                    <div class="input-group" style="width:150px">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                <i class="fas fa-calendar tx-16 lh-0 op-6"></i>
                                            </div>
                                        </div><input class="form-control fc-datepicker" placeholder="Start Date"
                                            type="text" id="start-date">
                                    </div>
                                </div>
                                <div class="col-sm-auto h6 mt-3">to</div>
                                <div class="col-xs-auto">
                                    <div class="input-group" style="width:150px">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                <i class="fas fa-calendar tx-16 lh-0 op-6"></i>
                                            </div>
                                        </div><input class="form-control fc-datepicker" placeholder="End Date"
                                            type="text" id="end-date">
                                    </div>
                                </div>
                                <div class="col-sm-auto ml-3">
                                    <div class="form-group row">
                                        <select class="form-control" id="layanan_name">
                                            <!-- <option value="ShowAll">Semua Layanan</option>
                                            <option value="1">Telkom Care</option>
                                            <option value="2">BRI</option>
                                            <option value="3">Telkomsel</option> -->
                                        </select>
                                    </div>
                                </div>

                                <div class="col-xs-auto ml-1">
                                    <button class="btn btn-sm btn-dark" type="button" style="height:35px" id="btn-go"><i
                                            class="fas fa-filter"></i></button>

                                </div>
                                <div class="col-xs-auto ml-1">
                                    <button class="btn btn-sm btn-primary" type="button" style="height:35px"
                                        id="btn-export"><i class="fas fa-download mr-2"></i>Export</button>

                                </div>
                            </div>
                        </div>
                        <div class="table-responsive" style="padding:12px;">
                            <table id="tableOperation1" class="table table-striped table-bordered fontNunito12"
                                width="100%">
                                <thead class="text-white bg-head">
                                    <tr>
                                        <td class="wd-15p border-bottom-0 text-center" width="20">No</td>
                                        <td class="wd-15p border-bottom-0 text-center">Agent ID</td>
                                        <td class="wd-15p border-bottom-0 text-center">Agent Name</td>
                                        <td class="wd-15p border-bottom-0 text-center">Skill</td>
                                        <td class="wd-15p border-bottom-0 text-center">COF</td>
                                        <td class="wd-15p border-bottom-0 text-center">ART</td>
                                        <td class="wd-15p border-bottom-0 text-center">AHT</td>
                                        <td class="wd-15p border-bottom-0 text-center">AST</td>
                                        <td class="wd-15p border-bottom-0 text-center">SCR</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- <tr>
                                        <td class="text-center">1</td>
                                        <td class="text-center">TD0025</td>
                                        <td class="text-center">Agent Name</td>
                                        <td class="text-center">200</td>
                                        <td class="text-center">200</td>
                                        <td class="text-right">00:00:00</td>
                                        <td class="text-right">00:00:00</td>
                                        <td class="text-right">00:00:00</td>
                                        <td class="text-right">100%</td>
                                    </tr>
                                    <tr>
                                        <td class="text-center">2</td>
                                        <td class="text-center">TD0025</td>
                                        <td class="text-center">Agent Name</td>
                                        <td class="text-center">200</td>
                                        <td class="text-center">200</td>
                                        <td class="text-right">00:00:00</td>
                                        <td class="text-right">00:00:00</td>
                                        <td class="text-right">00:00:00</td>
                                        <td class="text-right">100%</td>
                                    </tr>
                                    <tr>
                                        <td class="text-center">3</td>
                                        <td class="text-center">TD0025</td>
                                        <td class="text-center">Agent Name</td>
                                        <td class="text-center">200</td>
                                        <td class="text-center">200</td>
                                        <td class="text-right">00:00:00</td>
                                        <td class="text-right">00:00:00</td>
                                        <td class="text-right">00:00:00</td>
                                        <td class="text-right">100%</td>
                                    </tr>
                                    <tr>
                                        <td class="text-center">4</td>
                                        <td class="text-center">TD0025</td>
                                        <td class="text-center">Agent Name</td>
                                        <td class="text-center">200</td>
                                        <td class="text-center">200</td>
                                        <td class="text-right">00:00:00</td>
                                        <td class="text-right">00:00:00</td>
                                        <td class="text-right">00:00:00</td>
                                        <td class="text-right">100%</td>
                                    </tr>
                                    <tr>
                                        <td class="text-center">5</td>
                                        <td class="text-center">TD0025</td>
                                        <td class="text-center">Agent Name</td>
                                        <td class="text-center">200</td>
                                        <td class="text-center">200</td>
                                        <td class="text-right">00:00:00</td>
                                        <td class="text-right">00:00:00</td>
                                        <td class="text-right">00:00:00</td>
                                        <td class="text-right">100%</td>
                                    </tr>
                                    <tr>
                                        <td class="text-center">6</td>
                                        <td class="text-center">TD0025</td>
                                        <td class="text-center">Agent Name</td>
                                        <td class="text-center">200</td>
                                        <td class="text-center">200</td>
                                        <td class="text-right">00:00:00</td>
                                        <td class="text-right">00:00:00</td>
                                        <td class="text-right">00:00:00</td>
                                        <td class="text-right">100%</td>
                                    </tr>
                                    <tr>
                                        <td class="text-center">7</td>
                                        <td class="text-center">TD0025</td>
                                        <td class="text-center">Agent Name</td>
                                        <td class="text-center">200</td>
                                        <td class="text-center">200</td>
                                        <td class="text-right">00:00:00</td>
                                        <td class="text-right">00:00:00</td>
                                        <td class="text-right">00:00:00</td>
                                        <td class="text-right">100%</td>
                                    </tr>
                                    <tr>
                                        <td class="text-center">8</td>
                                        <td class="text-center">TD0025</td>
                                        <td class="text-center">Agent Name</td>
                                        <td class="text-center">200</td>
                                        <td class="text-center">200</td>
                                        <td class="text-right">00:00:00</td>
                                        <td class="text-right">00:00:00</td>
                                        <td class="text-right">00:00:00</td>
                                        <td class="text-right">100%</td>
                                    </tr>
                                    <tr>
                                        <td class="text-center">9</td>
                                        <td class="text-center">TD0025</td>
                                        <td class="text-center">Agent Name</td>
                                        <td class="text-center">200</td>
                                        <td class="text-center">200</td>
                                        <td class="text-right">00:00:00</td>
                                        <td class="text-right">00:00:00</td>
                                        <td class="text-right">00:00:00</td>
                                        <td class="text-right">100%</td>
                                    </tr>
                                    <tr>
                                        <td class="text-center">10</td>
                                        <td class="text-center">TD0025</td>
                                        <td class="text-center">Agent Name</td>
                                        <td class="text-center">200</td>
                                        <td class="text-center">200</td>
                                        <td class="text-right">00:00:00</td>
                                        <td class="text-right">00:00:00</td>
                                        <td class="text-right">00:00:00</td>
                                        <td class="text-right">100%</td>
                                    </tr> -->
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <?php $this->load->view('temp/footer');?>
            <!--Plugin -->
            <script src="<?=base_url()?>assets/public/js/app/app-report-perform-agent.js"></script>