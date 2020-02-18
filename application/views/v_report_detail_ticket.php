<div class=" app-content">
    <div class="side-app">
        <div class="page-header d-flex p-2 bd-highlight">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active" aria-current="page">
                    <h4 class="page-title"><i class="fe fe-book mr-1"></i>Report</h4>
                </li>
                <li class="breadcrumb-item active mt-2" aria-current="page">Detail Ticket</li>
            </ol>
        </div>
        <!--Page Header-->

        <!----First Rows--->

        <div class="row">
            <div class="col-md-12 col-lg-12">
                <div class="card overflow-hidden">
                    <div class="card-header-small">
                        <h5 class="card-title-small card-pt10">Detail Ticket</h5>
                    </div>
                    <div class="card-body">
                        <div class="row mb-2">
                            <div class="col-xs-auto ml-1">
                                <div class="input-group" style="width:150px">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <i class="fa fa-calendar tx-16 lh-0 op-6"></i>
                                        </div>
                                    </div><input class="form-control fc-datepicker" id="start-date"
                                        placeholder="Start Date" type="text">
                                </div>
                            </div>
                            <div class="col-sm-auto h6 mt-3">to</div>
                            <div class="col-xs-auto">
                                <div class="input-group" style="width:130px">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <i class="fas fa-calendar tx-16 lh-0 op-6"></i>
                                        </div>
                                    </div><input class="form-control fc-datepicker" id="end-date" placeholder="End Date"
                                        type="text">
                                </div>
                            </div>
                            <div class="col-sm-auto ml-3">
                                <div class="form-group row">
                                    <select class="form-control" id="tenantName">
                                        <option value="">All Tenant</option>
                                        <option value="12">Whatsapp</option>
                                        <option value="6">Facebook</option>
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
                        <div class="table-responsive" style="padding:10px 8px 10px 8px;">
                            <table class="table table-striped table-bordered fontNunito12" id="tableDetailTicket"
                                width="100%">
                                <thead class="bg-head text-white text-center">
                                    <tr>
                                        <th width="20">No</th>
                                        <th>Create Date</th>
                                        <th>Ticket ID</th>
                                        <th>Cust Name</th>
                                        <th>Channel</th>
                                        <th>Status</th>
                                        <th>Unit PIC</th>
                                    </tr>
                                </thead>
                                <tbody class="table-sm text-center">
                                    <tr>
                                        <td class="text-center">1</td>
                                        <td class="text-center">2020-01-19</td>
                                        <td class="text-center">TD002</td>
                                        <td class="text-center">Name</td>
                                        <td class="text-center">ALL</td>
                                        <td class="text-center">Open</td>
                                        <td class="text-center">CC</td>
                                    </tr>
                                    <tr>
                                        <td class="text-center">2</td>
                                        <td class="text-center">2020-01-19</td>
                                        <td class="text-center">TD002</td>
                                        <td class="text-center">Name</td>
                                        <td class="text-center">ALL</td>
                                        <td class="text-center">Open</td>
                                        <td class="text-center">CC</td>
                                    </tr>
                                    <tr>
                                        <td class="text-center">3</td>
                                        <td class="text-center">2020-01-19</td>
                                        <td class="text-center">TD002</td>
                                        <td class="text-center">Name</td>
                                        <td class="text-center">ALL</td>
                                        <td class="text-center">Open</td>
                                        <td class="text-center">CC</td>
                                    </tr>
                                    <tr>
                                        <td class="text-center">4</td>
                                        <td class="text-center">2020-01-19</td>
                                        <td class="text-center">TD002</td>
                                        <td class="text-center">Name</td>
                                        <td class="text-center">ALL</td>
                                        <td class="text-center">Open</td>
                                        <td class="text-center">CC</td>
                                    </tr>
                                    <tr>
                                        <td class="text-center">5</td>
                                        <td class="text-center">2020-01-19</td>
                                        <td class="text-center">TD002</td>
                                        <td class="text-center">Name</td>
                                        <td class="text-center">ALL</td>
                                        <td class="text-center">Open</td>
                                        <td class="text-center">CC</td>
                                    </tr>
                                    <tr>
                                        <td class="text-center">6</td>
                                        <td class="text-center">2020-01-19</td>
                                        <td class="text-center">TD002</td>
                                        <td class="text-center">Name</td>
                                        <td class="text-center">ALL</td>
                                        <td class="text-center">Open</td>
                                        <td class="text-center">CC</td>
                                    </tr>
                                    <tr>
                                        <td class="text-center">7</td>
                                        <td class="text-center">2020-01-19</td>
                                        <td class="text-center">TD002</td>
                                        <td class="text-center">Name</td>
                                        <td class="text-center">ALL</td>
                                        <td class="text-center">Open</td>
                                        <td class="text-center">CC</td>
                                    </tr>
                                    <tr>
                                        <td class="text-center">8</td>
                                        <td class="text-center">2020-01-19</td>
                                        <td class="text-center">TD002</td>
                                        <td class="text-center">Name</td>
                                        <td class="text-center">ALL</td>
                                        <td class="text-center">Open</td>
                                        <td class="text-center">CC</td>
                                    </tr>
                                    <tr>
                                        <td class="text-center">9</td>
                                        <td class="text-center">2020-01-19</td>
                                        <td class="text-center">TD002</td>
                                        <td class="text-center">Name</td>
                                        <td class="text-center">ALL</td>
                                        <td class="text-center">Open</td>
                                        <td class="text-center">CC</td>
                                    </tr>
                                    <tr>
                                        <td class="text-center">10</td>
                                        <td class="text-center">2020-01-19</td>
                                        <td class="text-center">TD002</td>
                                        <td class="text-center">Name</td>
                                        <td class="text-center">ALL</td>
                                        <td class="text-center">Open</td>
                                        <td class="text-center">Unit I</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php $this->load->view('temp/footer');?>
    <!--Plugin -->
    <script src="<?=base_url()?>assets/public/js/app/app-report-detail-ticket.js"></script>