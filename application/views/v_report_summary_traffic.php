<div class=" app-content" id="app-content">
    <div class="side-app">
        <div class="page-header d-flex p-2 bd-highlight">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active" aria-current="page">
                    <h4 class="page-title"><i class="si si-layers mr-1"></i>Report</h4>
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
                        <div class="row">
                            <div class="col-xs-auto ml-1">
                                <div class="input-group" style="width:140px">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <i class="fa fa-calendar tx-16 lh-0 op-6"></i>
                                        </div>
                                    </div><input class="form-control fc-datepicker" placeholder="Start Date" type="text"
                                        id="start-date">
                                </div>
                            </div>
                            <div class="col-sm-auto h6 mt-3">to</div>
                            <div class="col-xs-auto">
                                <div class="input-group" style="width:140px">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <i class="fa fa-calendar tx-16 lh-0 op-6"></i>
                                        </div>
                                    </div><input class="form-control fc-datepicker" placeholder="End Date" type="text"
                                        id="end-date">
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
                                <button class="btn btn-sm btn-primary" type="button" style="height:35px"
                                    id="btn-export"><i class="fas fa-download mr-2"></i>Export</button>

                            </div>
                        </div>
                    </div>
                    <!-- <div id="index_native" class="box"></div> -->
                    <div class="row">
                        <div class="col-xs-auto ml-2 mt-1">
                            Show
                        </div>
                        <div class="col-xs-auto ml-1">
                            <div class="form-group-row">
                                <select class="form-control-sm" id="pagingFilter">
                                    <option value="10">10</option>
                                    <option value="25">25</option>
                                    <option value="50">50</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-xs-auto mt-1 ml-1">
                        entries
                    </div>
                    </div>
                    
                    <div class="table-responsive" style="padding:1px !important;">
                        <table id="tableSummaryTraffic" class="table table-striped table-bordered fontNunito9" style="width:100%">
                            <thead class="bg-head text-center text-white">
                                <tr>
                                    <td rowspan="2" class="wd-15p border-bottom-0 align-middle" width="20">No</td>
                                    <td rowspan="2" class="wd-15p border-bottom-0 align-middle">Date</td>
                                    <td colspan="2" class="wd-15p border-bottom-0">Voice</td>
                                    <td colspan="2" class="wd-15p border-bottom-0">Email</td>
                                    <td colspan="2" class="wd-15p border-bottom-0">Live Chat</td>
                                    <td colspan="2" class="wd-15p border-bottom-0">SMS</td>
                                    <td colspan="2" class="wd-15p border-bottom-0">Telegram</td>
                                    <td colspan="2" class="wd-15p border-bottom-0">Facebook</td>
                                    <td colspan="2" class="wd-15p border-bottom-0">Messenger</td>
                                    <td colspan="2" class="wd-15p border-bottom-0">Twitter</td>
                                    <td colspan="2" class="wd-15p border-bottom-0">Line</td>
                                    <td colspan="2" class="wd-15p border-bottom-0">Instagram</td>
                                    <td colspan="2" class="wd-15p border-bottom-0">Whatsapp</td>
                                    <td colspan="2" class="wd-15p border-bottom-0">Twitter DM</td>
                                    <td colspan="2" class="wd-15p border-bottom-0">Chatbot</td>
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
                            <tbody id="mytbody">
                            </tbody>
                        </table>
                    </div>
                    <div class="d-flex bd-highlight mb-2">
                        <div id="showing" class="p-2 bd-highlight">Showing 0 to 0 of 0 entries</div>
                        <div class="ml-auto p-2 bd-highlight">

                            <ul class="pagination" id="paging">
                                
                            </ul>
                        </div>
                    </div>
                    <!-- <div class="col-md-12 col-xl-4">


                    </div> -->
                </div>
            </div>
        </div>
    </div>
    <style>
        .pagination a {
            color: black;
            float: left;
            padding: 8px 16px;
            text-decoration: none;
            transition: background-color .3s;
        }

        .pagination a.active {
            background-color: dodgerblue;
            color: white;
        }

        .pagination a:hover:not(.active) {
            background-color: #ddd;
        }
    </style>
    <?php $this->load->view('temp/footer');?>
    <!--Plugin -->
    <script src="<?=base_url()?>assets/public/js/app/app-report-summary-traffic.js"></script>
    <!-- <script src="<?=base_url()?>assets/js/paginator.js"></script> -->