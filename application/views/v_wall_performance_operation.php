<div class=" app-content">
    <div class="side-app">
        <div class="page-header d-flex p-2 bd-highlight">
            <div class="flex-grow-1 bd-highlight">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active" aria-current="page">
                        <h4 class="page-title"><i class="fe fe-monitor mr-1"></i>Wallboard</h4>
                    </li>
                    <li class="breadcrumb-item active mt-2" aria-current="page">Summary Performance Operation
                    </li>
                </ol>
            </div>
            <!-- </div> -->
            <div class="d-flex bd-highlight">
                <!-- <div class="ml-auto p-2 bd-highlight mt-3 h6">Layanan </div>
                <div class="p-2 bd-highlight">
                    <select class="form-control" id="layanan_name">
                       
                    </select>
                </div> -->
            </div>
            <!--Page Header-->
        </div>

        <div class="row mt-2">
            <div class="col-md-12 col-lg-12">
                <div class="card">
                    <div class="card-header-small">
                        <h5 class="card-title-small card-pt10">Summary Performance Operation</h5>
                    </div>
                    <div class="table-responsive table-bordered" style="padding:5px 5px 12px 5px;">
                        <table class="table card-table table-striped table-vcenter table-hover table-pt10 fontNunito9"
                            style="font-size:9px; width:100%" id="tabelCOFByChannel">
                            <thead class="text-center bg-head">
                                <tr>
                                    <td rowspan="2" class="font-weight-extrabold text-white">No</td>
                                    <td rowspan="2" class="font-weight-extrabold text-white">Services</td>
                                    <td colspan="12" class="font-weight-extrabold text-white">COF by Channel
                                    </td>
                                    <td rowspan="2" class="font-weight-extrabold text-white">Total COF</td>
                                    <td rowspan="2" class="font-weight-extrabold text-white">ART</td>
                                    <td rowspan="2" class="font-weight-extrabold text-white">AHT</td>
                                    <td rowspan="2" class="font-weight-extrabold text-white">AST</td>
                                    <td rowspan="2" class="font-weight-extrabold text-white">SCR</td>
                                </tr>
                                <tr>
                                    <td class="bg-column">Facebook</td>
                                    <td class="bg-column">Whatsapp</td>
                                    <td class="bg-column">Twitter</td>
                                    <td class="bg-column">Email</td>
                                    <td class="bg-column">Telegram</td>
                                    <td class="bg-column">Line</td>
                                    <td class="bg-column">Voice</td>
                                    <td class="bg-column">Instagram</td>
                                    <td class="bg-column">Messenger</td>
                                    <td class="bg-column">Twitter DM</td>
                                    <td class="bg-column">Live Chat</td>
                                    <td class="bg-column">SMS</td>
                                </tr>
                            </thead>
                            <tbody class="table-sm text-center" id="mytbody">
                                </tr>
                            </tbody>
                            <tfoot class="table-sm bg-total font-weight-extrabold" id="mytfoot">
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12 col-lg-12">
                <div class="card">
                    <div class="card-header-small">
                        <h5 class="card-title-small card-pt10">Summary Status Ticket</h5>
                    </div>
                    <div class="table-responsive table-bordered" style="padding:5px 5px 12px 5px;">
                        <table class="table card-table table-striped table-vcenter table-hover table-pt10 fontNunito10" id="tableStatusTicket">
                            <thead class="text-center bg-head">
                                <tr>
                                    <td rowspan="2" class="font-weight-extrabold text-white">No</td>
                                    <td rowspan="2" class="font-weight-extrabold text-white">Services</td>
                                    <td colspan="3" class="font-weight-extrabold text-white">KIP (CWC)</td>
                                    <td colspan="8" class="font-weight-extrabold text-white">Ticketing</td>
                                </tr>
                                <tr>
                                    <td class="bg-column">Informasi</td>
                                    <td class="bg-column">Komplain</td>
                                    <td class="bg-column">Request</td>
                                    <td class="bg-column2">New</td>
                                    <td class="bg-column2">Open</td>
                                    <td class="bg-column2">Reject</td>
                                    <td class="bg-column2">On Progress</td>
                                    <td class="bg-column2">Reopen</td>
                                    <td class="bg-column2">Pending</td>
                                    <td class="bg-column2">Resolved</td>
                                </tr>
                            </thead>
                            <tbody class="table-sm text-center" id="mytbody2">
                                <!-- <tr>
                                    <td>1</td>
                                    <td class="text-left">Telkom</td>
                                    <td class="text-right">50</td>
                                    <td class="text-right">50</td>
                                    <td class="text-right">50</td>
                                    <td class="text-right">50</td>
                                    <td class="text-right">50</td>
                                    <td class="text-right">50</td>
                                    <td class="text-right">50</td>
                                    <td class="text-right">50</td>
                                    <td class="text-right">50</td>
                                    <td class="text-right">50</td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td class="text-left">BRI</td>
                                    <td class="text-right">50</td>
                                    <td class="text-right">50</td>
                                    <td class="text-right">50</td>
                                    <td class="text-right">50</td>
                                    <td class="text-right">50</td>
                                    <td class="text-right">50</td>
                                    <td class="text-right">50</td>
                                    <td class="text-right">50</td>
                                    <td class="text-right">50</td>
                                    <td class="text-right">50</td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td class="text-left">Pegadaian</td>
                                    <td class="text-right">50</td>
                                    <td class="text-right">50</td>
                                    <td class="text-right">50</td>
                                    <td class="text-right">50</td>
                                    <td class="text-right">50</td>
                                    <td class="text-right">50</td>
                                    <td class="text-right">50</td>
                                    <td class="text-right">50</td>
                                    <td class="text-right">50</td>
                                    <td class="text-right">50</td>
                                </tr>
                                <tr>
                                    <td>4</td>
                                    <td class="text-left">Garuda</td>
                                    <td class="text-right">50</td>
                                    <td class="text-right">50</td>
                                    <td class="text-right">50</td>
                                    <td class="text-right">50</td>
                                    <td class="text-right">50</td>
                                    <td class="text-right">50</td>
                                    <td class="text-right">50</td>
                                    <td class="text-right">50</td>
                                    <td class="text-right">50</td>
                                    <td class="text-right">50</td>
                                </tr>
                                <tr>
                                    <td>6</td>
                                    <td class="text-left">XXXX</td>
                                    <td class="text-right">50</td>
                                    <td class="text-right">50</td>
                                    <td class="text-right">50</td>
                                    <td class="text-right">50</td>
                                    <td class="text-right">50</td>
                                    <td class="text-right">50</td>
                                    <td class="text-right">50</td>
                                    <td class="text-right">50</td>
                                    <td class="text-right">50</td>
                                    <td class="text-right">50</td>
                                </tr>
                                <tr>
                                    <td>7</td>
                                    <td class="text-left">XXXX</td>
                                    <td class="text-right">50</td>
                                    <td class="text-right">50</td>
                                    <td class="text-right">50</td>
                                    <td class="text-right">50</td>
                                    <td class="text-right">50</td>
                                    <td class="text-right">50</td>
                                    <td class="text-right">50</td>
                                    <td class="text-right">50</td>
                                    <td class="text-right">50</td>
                                    <td class="text-right">50</td>
                                </tr>
                                <tr>
                                    <td>8</td>
                                    <td class="text-left">XXXX</td>
                                    <td class="text-right">50</td>
                                    <td class="text-right">50</td>
                                    <td class="text-right">50</td>
                                    <td class="text-right">50</td>
                                    <td class="text-right">50</td>
                                    <td class="text-right">50</td>
                                    <td class="text-right">50</td>
                                    <td class="text-right">50</td>
                                    <td class="text-right">50</td>
                                    <td class="text-right">50</td>
                                </tr>
                                <tr>
                                    <td>9</td>
                                    <td class="text-left">XXXX</td>
                                    <td class="text-right">50</td>
                                    <td class="text-right">50</td>
                                    <td class="text-right">50</td>
                                    <td class="text-right">50</td>
                                    <td class="text-right">50</td>
                                    <td class="text-right">50</td>
                                    <td class="text-right">50</td>
                                    <td class="text-right">50</td>
                                    <td class="text-right">50</td>
                                    <td class="text-right">50</td>
                                </tr>
                                <tr>
                                    <td>10</td>
                                    <td class="text-left">XXXX</td>
                                    <td class="text-right">50</td>
                                    <td class="text-right">50</td>
                                    <td class="text-right">50</td>
                                    <td class="text-right">50</td>
                                    <td class="text-right">50</td>
                                    <td class="text-right">50</td>
                                    <td class="text-right">50</td>
                                    <td class="text-right">50</td>
                                    <td class="text-right">50</td>
                                    <td class="text-right">50</td>
                                    <td class="text-right">50</td> -->
                                </tr>
                            </tbody>
                            <tfoot class="bg-total font-weight-extrabold text-center" id="mytfoot2">
                                <tr>
                                    <td colspan="2">Total</td>
                                    <td class="text-right">50</td>
                                    <td class="text-right">50</td>
                                    <td class="text-right">50</td>
                                    <td class="text-right">50</td>
                                    <td class="text-right">50</td>
                                    <td class="text-right">50</td>
                                    <td class="text-right">50</td>
                                    <td class="text-right">50</td>
                                    <td class="text-right">50</td>
                                    <td class="text-right">50</td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php $this->load->view('temp/footer');?>
    <!--Plugin -->
    <script src="<?=base_url()?>assets/public/js/app/app-wall-performance-operation.js"></script>