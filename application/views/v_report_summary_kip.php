<div class=" app-content">
    <div class="side-app">
        <div class="page-header d-flex p-2 bd-highlight">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active" aria-current="page">
                    <h4 class="page-title"><i class="fe fe-book mr-1"></i>Report</h4>
                </li>
                <li class="breadcrumb-item active mt-2" aria-current="page">Summary KIP</li>
            </ol>
        </div>
        <!--Page Header-->

        <!----First Rows--->
        <div class="row">
            <div class="col-md-12 col-lg-12">
                <div class="card">
                    <div class="card-header-small">
                        <h5 class="card-title-small card-pt10">Summary KIP</h5>
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
                                        type="text" id="start-date">
                                </div>
                            </div>
                            <div class="col-sm-auto h6 mt-3">to</div>
                            <div class="col-xs-auto">
                                <div class="input-group" style="width:130px">
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
                            <div class="col-sm-auto ml-1">
                                <div class="form-group row">
                                    <select class="form-control" id="channel_name">
                                        <option value="">All Channel</option>
                                        <option value="12">Whatsapp</option>
                                        <option value="6">Facebook</option>
                                        <option value="8">Twitter</option>
                                        <option value="13">Twitter DM</option>
                                        <option value="11">Instagram</option>
                                        <option value="7">Messenger</option>
                                        <option value="5">Telegram</option>
                                        <option value="10">Line</option>
                                        <option value="2">Email</option>
                                        <option value="1">Voice</option>
                                        <option value="3">Live Chat</option>
                                        <option value="4">SMS</option>
                                        <option value="15">Chatbot</option>
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

                        <div class="table-responsive">
                            <table id="tableReportKIP" class="table table-sm table-striped table-bordered fontNunito12">
                                <thead class="bg-head text-center text-white">
                                    <tr>
                                        <th class="wd-15p border-bottom-0" width="20">No</th>
                                        <th class="wd-15p border-bottom-0">Kategori</th>
                                        <th class="wd-15p border-bottom-0">Jumlah</th>
                                    </tr>
                                </thead>
                                <tbody id="mytbody">
                                    <!-- <tr>
                                        <td class="text-center">1</td>
                                        <td class="text-center">Kategori</td>
                                        <td class="text-right">90</td>
                                    </tr>
                                    <tr>
                                        <td class="text-center">2</td>
                                        <td class="text-center">Kategori</td>
                                        <td class="text-right">90</td>
                                    </tr>
                                    <tr>
                                        <td class="text-center">3</td>
                                        <td class="text-center">Kategori</td>
                                        <td class="text-right">90</td>
                                    </tr>
                                    <tr>
                                        <td class="text-center">4</td>
                                        <td class="text-center">Kategori</td>
                                        <td class="text-right">90</td>
                                    </tr>
                                    <tr>
                                        <td class="text-center">5</td>
                                        <td class="text-center">Kategori</td>
                                        <td class="text-right">90</td>
                                    </tr>
                                    <tr>
                                        <td class="text-center">6</td>
                                        <td class="text-center">Kategori</td>
                                        <td class="text-right">90</td>
                                    </tr>
                                    <tr>
                                        <td class="text-center">7</td>
                                        <td class="text-center">Kategori</td>
                                        <td class="text-right">90</td>
                                    </tr>
                                    <tr>
                                        <td class="text-center">8</td>
                                        <td class="text-center">Kategori</td>
                                        <td class="text-right">90</td>
                                    </tr>
                                    <tr>
                                        <td class="text-center">9</td>
                                        <td class="text-center">Kategori</td>
                                        <td class="text-right">90</td>
                                    </tr>
                                    <tr>
                                        <td class="text-center">10</td>
                                        <td class="text-center">Kategori</td>
                                        <td class="text-right">90</td>
                                    </tr> -->
                                </tbody>
                                <tfoot class="bg-total text-right " id="mytfoot">
                                    <!-- <th colspan="2" class="wd-15p border-bottom-0 font-weight-extrabold" width="20">Total</th>
                                    <th class="wd-15p border-bottom-0 font-weight-extrabold">90</th> -->
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php $this->load->view('temp/footer');?>
    <!--Plugin -->
    <script src="<?=base_url()?>assets/public/js/app/app-report-summary-kip.js"></script>