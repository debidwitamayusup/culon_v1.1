<div class=" app-content">
    <div class="side-app">
        <div class="page-header d-flex p-2 bd-highlight">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active" aria-current="page">
                    <h4 class="page-title"><i class="fe fe-book mr-1"></i>Report</h4>
                </li>
                <li class="breadcrumb-item active mt-2" aria-current="page">Summary Traffic</li>
            </ol>
        </div>
        <!--Page Header-->

        <!----First Rows--->
        <div class="row">
            <div class="col-md-12 col-lg-12">
                <div class="card">
                    <div class="card-header-small">
                        <h5 class="card-title-small card-pt10">Summary Traffic</h5>
                    </div>
                    <div class="card-body">
                        <div class="row mb-2">
                            <div class="col-xs-auto ml-1">
                                <div class="input-group" style="width:140px">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <i class="fa fa-calendar tx-16 lh-0 op-6"></i>
                                        </div>
                                    </div><input class="form-control fc-datepicker" placeholder="Start Date"
                                        type="text" id="start-date">
                                </div>
                            </div>
                            <div class="col-sm-auto h6 mt-3">to</div>
                            <div class="col-xs-auto">
                                <div class="input-group" style="width:140px">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <i class="fa fa-calendar tx-16 lh-0 op-6"></i>
                                        </div>
                                    </div><input class="form-control fc-datepicker" placeholder="End Date" type="text" id="end-date">
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
                            <div class="col-xs-auto ml-1">
                                <button class="btn btn-sm btn-grey" type="button" style="height:35px" id="btn-go"><i
                                        class="fas fa-filter"></i></button>

                            </div>
                            <div class="col-xs-auto ml-1">
                                <button class="btn btn-sm btn-primary" type="button" style="height:35px" id="btn-export"><i
                                        class="fas fa-download mr-2"></i>Export</button>

                            </div>
                        </div>
                    </div>
                    <div class="table-responsive" style="padding:5px !important;">
                        <table id="tableSummaryTraffic" class="table table-striped table-bordered fontNunito9">
                            <thead class="bg-head text-center text-white">
                                <tr>
                                    <td rowspan="2" class="wd-15p border-bottom-0 align-middle" width="20">No</td>
                                    <td rowspan="2" class="wd-15p border-bottom-0 align-middle">Date</td>
                                    <td colspan="2" class="wd-15p border-bottom-0">Email</td>
                                    <td colspan="2" class="wd-15p border-bottom-0">Live Chat</td>
                                    <td colspan="2" class="wd-15p border-bottom-0">Telegram</td>
                                    <td colspan="2" class="wd-15p border-bottom-0">Facebook</td>
                                    <td colspan="2" class="wd-15p border-bottom-0">Messenger</td>
                                    <td colspan="2" class="wd-15p border-bottom-0">Twitter</td>
                                    <td colspan="2" class="wd-15p border-bottom-0">Line</td>
                                    <td colspan="2" class="wd-15p border-bottom-0">Instagram</td>
                                    <td colspan="2" class="wd-15p border-bottom-0">Whatsapp</td>
                                    <td colspan="2" class="wd-15p border-bottom-0">Twitter DM</td>
                                    <td colspan="2" class="wd-15p border-bottom-0">Chatbot</td>
                                    <td colspan="2" class="wd-15p border-bottom-0">Voice</td>
                                    <td colspan="2" class="wd-15p border-bottom-0">SMS</td>
                                </tr>
                                <tr>
                                <td>COF</td>
                                <td>SCR</td>
                                <td>COF</td>
                                <td>SCR</td>
                                <td>COF</td>
                                <td>SCR</td>
                                <td>COF</td>
                                <td>SCR</td>
                                <td>COF</td>
                                <td>SCR</td>
                                <td>COF</td>
                                <td>SCR</td>
                                <td>COF</td>
                                <td>SCR</td>
                                <td>COF</td>
                                <td>SCR</td>
                                <td>COF</td>
                                <td>SCR</td>
                                <td>COF</td>
                                <td>SCR</td>
                                <td>COF</td>
                                <td>SCR</td>
                                <td>COF</td>
                                <td>SCR</td>
                                <td>COF</td>
                                <td>SCR</td>
                                </tr>
                            </thead>
                            <tbody id="#mytbody">
                                <!-- <tr>
                                    <td class="text-center">1</td>
                                    <td class="text-center">2019-10-01</td>
                                    <td class="text-right">90</td>
                                    <td class="text-center">90%</td>
                                    <td class="text-right">90</td>
                                    <td class="text-center">90%</td>
                                    <td class="text-right">90</td>
                                    <td class="text-center">90%</td>
                                    <td class="text-right">90</td>
                                    <td class="text-center">90%</td>
                                    <td class="text-right">90</td>
                                    <td class="text-center">90%</td>
                                    <td class="text-right">90</td>
                                    <td class="text-center">90%</td>
                                    <td class="text-right">90</td>
                                    <td class="text-center">90%</td>
                                    <td class="text-right">90</td>
                                    <td class="text-center">90%</td>
                                    <td class="text-right">90</td>
                                    <td class="text-center">90%</td>
                                    <td class="text-right">90</td>
                                    <td class="text-center">90%</td>
                                    <td class="text-right">90</td>
                                    <td class="text-center">90%</td>
                                    <td class="text-right">90</td>
                                    <td class="text-center">90%</td>
                                    <td class="text-right">90</td>
                                    <td class="text-center">90%</td>
                                </tr>
                                <tr>
                                    <td class="text-center">2</td>
                                    <td class="text-center">2019-10-01</td>
                                    <td class="text-right">90</td>
                                    <td class="text-center">90%</td>
                                    <td class="text-right">90</td>
                                    <td class="text-center">90%</td>
                                    <td class="text-right">90</td>
                                    <td class="text-center">90%</td>
                                    <td class="text-right">90</td>
                                    <td class="text-center">90%</td>
                                    <td class="text-right">90</td>
                                    <td class="text-center">90%</td>
                                    <td class="text-right">90</td>
                                    <td class="text-center">90%</td>
                                    <td class="text-right">90</td>
                                    <td class="text-center">90%</td>
                                    <td class="text-right">90</td>
                                    <td class="text-center">90%</td>
                                    <td class="text-right">90</td>
                                    <td class="text-center">90%</td>
                                    <td class="text-right">90</td>
                                    <td class="text-center">90%</td>
                                    <td class="text-right">90</td>
                                    <td class="text-center">90%</td>
                                    <td class="text-right">90</td>
                                    <td class="text-center">90%</td>
                                    <td class="text-right">90</td>
                                    <td class="text-center">90%</td>
                                </tr>
                                <tr>
                                    <td class="text-center">3</td>
                                    <td class="text-center">2019-10-01</td>
                                    <td class="text-right">90</td>
                                    <td class="text-center">90%</td>
                                    <td class="text-right">90</td>
                                    <td class="text-center">90%</td>
                                    <td class="text-right">90</td>
                                    <td class="text-center">90%</td>
                                    <td class="text-right">90</td>
                                    <td class="text-center">90%</td>
                                    <td class="text-right">90</td>
                                    <td class="text-center">90%</td>
                                    <td class="text-right">90</td>
                                    <td class="text-center">90%</td>
                                    <td class="text-right">90</td>
                                    <td class="text-center">90%</td>
                                    <td class="text-right">90</td>
                                    <td class="text-center">90%</td>
                                    <td class="text-right">90</td>
                                    <td class="text-center">90%</td>
                                    <td class="text-right">90</td>
                                    <td class="text-center">90%</td>
                                    <td class="text-right">90</td>
                                    <td class="text-center">90%</td>
                                    <td class="text-right">90</td>
                                    <td class="text-center">90%</td>
                                    <td class="text-right">90</td>
                                    <td class="text-center">90%</td>
                                </tr>
                                <tr>
                                    <td class="text-center">4</td>
                                    <td class="text-center">2019-10-01</td>
                                    <td class="text-right">90</td>
                                    <td class="text-center">90%</td>
                                    <td class="text-right">90</td>
                                    <td class="text-center">90%</td>
                                    <td class="text-right">90</td>
                                    <td class="text-center">90%</td>
                                    <td class="text-right">90</td>
                                    <td class="text-center">90%</td>
                                    <td class="text-right">90</td>
                                    <td class="text-center">90%</td>
                                    <td class="text-right">90</td>
                                    <td class="text-center">90%</td>
                                    <td class="text-right">90</td>
                                    <td class="text-center">90%</td>
                                    <td class="text-right">90</td>
                                    <td class="text-center">90%</td>
                                    <td class="text-right">90</td>
                                    <td class="text-center">90%</td>
                                    <td class="text-right">90</td>
                                    <td class="text-center">90%</td>
                                    <td class="text-right">90</td>
                                    <td class="text-center">90%</td>
                                    <td class="text-right">90</td>
                                    <td class="text-center">90%</td>
                                    <td class="text-right">90</td>
                                    <td class="text-center">90%</td>
                                </tr>
                                <tr>
                                    <td class="text-center">5</td>
                                    <td class="text-center">2019-10-01</td>
                                    <td class="text-right">90</td>
                                    <td class="text-center">90%</td>
                                    <td class="text-right">90</td>
                                    <td class="text-center">90%</td>
                                    <td class="text-right">90</td>
                                    <td class="text-center">90%</td>
                                    <td class="text-right">90</td>
                                    <td class="text-center">90%</td>
                                    <td class="text-right">90</td>
                                    <td class="text-center">90%</td>
                                    <td class="text-right">90</td>
                                    <td class="text-center">90%</td>
                                    <td class="text-right">90</td>
                                    <td class="text-center">90%</td>
                                    <td class="text-right">90</td>
                                    <td class="text-center">90%</td>
                                    <td class="text-right">90</td>
                                    <td class="text-center">90%</td>
                                    <td class="text-right">90</td>
                                    <td class="text-center">90%</td>
                                    <td class="text-right">90</td>
                                    <td class="text-center">90%</td>
                                    <td class="text-right">90</td>
                                    <td class="text-center">90%</td>
                                    <td class="text-right">90</td>
                                    <td class="text-center">90%</td>
                                </tr> -->
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <?php $this->load->view('temp/footer');?>
    <!--Plugin -->
    <script src="<?=base_url()?>assets/public/js/app/app-report-summary-traffic.js"></script>