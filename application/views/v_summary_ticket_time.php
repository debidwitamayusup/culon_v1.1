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
                                <h4 class="page-title"><i class="fe fe-home mr-1"></i>Dashboard</h4>
                            </li>
                            <li class="breadcrumb-item active mt-2" aria-current="page">Ticketing </li>
                            <li class="breadcrumb-item active mt-2" aria-current="page">Ticketing by Time
                            </li>
                        </ol>
                    </div>
                </div>
                <!--Page Header-->
                <!----Baris Pertama----!-->

                <!-- <div class="row"> -->
                <!-- </div> -->
                <!-- <div class="row">
                    <div class="col-md-12">
                        <div class="card overflow-hidden border-0">
                            <div class="card-header-small bg-red">
                                <h5 class="card-title-small card-pt10">Summary Status Ticket / Unit</h5>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="summ_status_ticket_unit" class="table table-striped table-bordered">
                                        <thead class="text-center">
                                            <tr>
                                                <th rowspan="2" class="align-middle">No</th>
                                                <th rowspan="2" class="align-middle">Unit</th>
                                                <th colspan="8" class="text-center">Status</th>
                                            </tr>
                                            <tr>
                                                <th>New</th>
                                                <th>Open</th>
                                                <th>On Progress</th>
                                                <th>Resolve</th>
                                                <th>Reopen</th>
                                                <th>Pending</th>
                                                <th>Close</th>
                                                <th>Reject</th>
                                                <th class="font-weight-extrabold">Total</th>
                                            </tr>
                                        </thead>
                                        <tbody style="font-size:12px !important;" id="mytbody"> -->
                <!-- <tr>
                                                <td class="text-center">1</td>
                                                <td class="text-left">Call Center</td>
                                                <td class="text-right">10</td>
                                                <td class="text-right">10</td>
                                                <td class="text-right">10</td>
                                                <td class="text-right">10</td>
                                                <td class="text-right">10</td>
                                                <td class="text-right">10</td>
                                                <td class="text-right">10</td>
                                                <td class="text-right font-weight-extrabold">60</td>
                                            </tr>
                                            <tr>
                                                <td class="text-center">2</td>
                                                <td class="text-left">CRM</td>
                                                <td class="text-right">10</td>
                                                <td class="text-right">10</td>
                                                <td class="text-right">10</td>
                                                <td class="text-right">10</td>
                                                <td class="text-right">10</td>
                                                <td class="text-right">10</td>
                                                <td class="text-right">10</td>
                                                <td class="text-right font-weight-extrabold">60</td>
                                            </tr>
                                            <tr>
                                                <td class="text-center">3</td>
                                                <td class="text-left">Credit Control</td>
                                                <td class="text-right">10</td>
                                                <td class="text-right">10</td>
                                                <td class="text-right">10</td>
                                                <td class="text-right">10</td>
                                                <td class="text-right">10</td>
                                                <td class="text-right">10</td>
                                                <td class="text-right">10</td>
                                                <td class="text-right font-weight-extrabold">60</td>
                                            </tr>
                                            <tr>
                                                <td class="text-center">4</td>
                                                <td class="text-left">Post Link</td>
                                                <td class="text-right">10</td>
                                                <td class="text-right">10</td>
                                                <td class="text-right">10</td>
                                                <td class="text-right">10</td>
                                                <td class="text-right">10</td>
                                                <td class="text-right">10</td>
                                                <td class="text-right">10</td>
                                                <td class="text-right font-weight-extrabold">60</td>
                                            </tr>
                                            <tr>
                                                <td class="text-center">5</td>
                                                <td class="text-left">Keuangan</td>
                                                <td class="text-right">10</td>
                                                <td class="text-right">10</td>
                                                <td class="text-right">10</td>
                                                <td class="text-right">10</td>
                                                <td class="text-right">10</td>
                                                <td class="text-right">10</td>
                                                <td class="text-right">10</td>
                                                <td class="text-right font-weight-extrabold">60</td>
                                            </tr>
                                            <tr>
                                                <td class="text-center">6</td>
                                                <td class="text-left">Provider Relation</td>
                                                <td class="text-right">10</td>
                                                <td class="text-right">10</td>
                                                <td class="text-right">10</td>
                                                <td class="text-right">10</td>
                                                <td class="text-right">10</td>
                                                <td class="text-right">10</td>
                                                <td class="text-right">10</td>
                                                <td class="text-right font-weight-extrabold">60</td>
                                            </tr>
                                            <tr>
                                                <td class="text-center">7</td>
                                                <td class="text-left">Clean Non Health</td>
                                                <td class="text-right">10</td>
                                                <td class="text-right">10</td>
                                                <td class="text-right">10</td>
                                                <td class="text-right">10</td>
                                                <td class="text-right">10</td>
                                                <td class="text-right">10</td>
                                                <td class="text-right">10</td>
                                                <td class="text-right font-weight-extrabold">60</td>
                                            </tr>
                                            <tr>
                                                <td class="text-center">8</td>
                                                <td class="text-left">Claim Health</td>
                                                <td class="text-right">10</td>
                                                <td class="text-right">10</td>
                                                <td class="text-right">10</td>
                                                <td class="text-right">10</td>
                                                <td class="text-right">10</td>
                                                <td class="text-right">10</td>
                                                <td class="text-right">10</td>
                                                <td class="text-right font-weight-extrabold">60</td>
                                            </tr>
                                            <tr>
                                                <td class="text-center">9</td>
                                                <td class="text-left">Agency Help Line</td>
                                                <td class="text-right">10</td>
                                                <td class="text-right">10</td>
                                                <td class="text-right">10</td>
                                                <td class="text-right">10</td>
                                                <td class="text-right">10</td>
                                                <td class="text-right">10</td>
                                                <td class="text-right">10</td>
                                                <td class="text-right font-weight-extrabold">60</td>
                                            </tr>
                                            <tr>
                                                <td class="text-center">10</td>
                                                <td class="text-left">Data Control</td>
                                                <td class="text-right">10</td>
                                                <td class="text-right">10</td>
                                                <td class="text-right">10</td>
                                                <td class="text-right">10</td>
                                                <td class="text-right">10</td>
                                                <td class="text-right">10</td>
                                                <td class="text-right">10</td>
                                                <td class="text-right font-weight-extrabold">60</td>
                                            </tr> -->
                <!-- </tbody>
                                    </table>
                                </div> -->
                <!-- table-responsive -->
                <!-- </div>
                        </div>
                    </div>
                </div> -->
                <div class="row">
                    <div class="col-xl-4 col-lg-4 col-md-12">
                        <div class="card overflow-hidden">
                            <div class="card-header-small bg-red">
                                <h5 class="card-title-small card-pt10">Ticket Non Close</h5>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <canvas id="pieTicketTime" class="donutShadow overflow-hidden"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 col-lg-8">
                        <div class="card">
                            <div class="card-header-small bg-red">
                                <h5 class="card-title-small card-pt10">Ticketing by Time</h5>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="tablesummary" class="table table-striped table-bordered">
                                        <thead class="text-center">
                                            <tr>
                                                <th>No</th>
                                                <th>Unit</th>
                                                <th>1 - 2 Hari</th>
                                                <th>3 - 5 Hari</th>
                                                <th> > 5 Hari</th>
                                                 <!-- <th class="font-weight-extrabold">Total</th> -->
                                            </tr>
                                        </thead>
                                        <tbody class="text-center" style="font-size:12px !important;">
                                            <!-- <tr>
                                                <td class="text-center">1</td>
                                                <td class="text-left">CRM</td>
                                                <td class="text-right">10</td>
                                                <td class="text-right">10</td>
                                                <td class="text-right">10</td>
                                                <td class="text-right font-weight-extrabold">60</td>
                                            </tr>
                                            <tr>
                                                <td class="text-center">2</td>
                                                <td class="text-left">Data Control</td>
                                                <td class="text-right">10</td>
                                                <td class="text-right">10</td>
                                                <td class="text-right">10</td>
                                                <td class="text-right font-weight-extrabold">60</td>
                                            </tr>
                                            <tr>
                                                <td class="text-center">3</td>
                                                <td class="text-left">Keuangan</td>
                                                <td class="text-right">10</td>
                                                <td class="text-right">10</td>
                                                <td class="text-right">10</td>
                                                <td class="text-right font-weight-extrabold">60</td>
                                            </tr>
                                            <tr>
                                                <td class="text-center">4</td>
                                                <td class="text-left">Post Link</td>
                                                <td class="text-right">10</td>
                                                <td class="text-right">10</td>
                                                <td class="text-right">10</td>
                                                <td class="text-right font-weight-extrabold">60</td>
                                            </tr>
                                            <tr>
                                                <td class="text-center">5</td>
                                                <td class="text-left">Provider</td>
                                                <td class="text-right">10</td>
                                                <td class="text-right">10</td>
                                                <td class="text-right">10</td>
                                                <td class="text-right font-weight-extrabold">60</td>
                                            </tr> -->

                                        </tbody>
                                        <tfoot class="text-right font-weight-extrabold bg-total">
                                            <tr>
                                                <!-- <td colspan="2">Total</td> -->
                                                <!-- <td id="totHari1">10</td>
                                                <td>10</td>
                                                <td>10</td> -->
                                                <!-- <td>60</td> -->
                                                <td colspan="2"></td><td></td><td></td><td></td><td></td>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- <script src="<?=base_url()?>assets/public/js/app/app-sum-ticket-time.js"></script> -->
                <?php $this->load->view('temp/footer');?>
                <script src="<?= base_url()?>assets/public/js/app/app-summary-ticket-time.js"></script>