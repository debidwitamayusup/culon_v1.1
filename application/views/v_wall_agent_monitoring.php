<div class=" app-content">
    <div class="side-app">
        <div class="page-header d-flex p-2 bd-highlight">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active" aria-current="page">
                    <h4 class="page-title"><i class="fe fe-monitor mr-1"></i>Wallboard</h4>
                </li>
                <li class="breadcrumb-item active mt-2" aria-current="page">Agent Monitoring</li>
            </ol>
            <div class="d-flex bd-highlight">
                <div class="p-2 bd-highlight">
                    <select class="form-control-sm" style="border-color:#efecec;font-size:12px" id="layanan_name">
                        <!-- <option value="#">All Tenant</option> -->
                    </select>
                </div>
            </div>
        </div>

        <div class="row mt-2">
            <div class="col-md-12 col-lg-12">
                <div class="card">
                    <div class="table-responsive table-bordered" style="padding:5px 8px 12px 8px;">
                        <table class="table card-table table-striped table-vcenter table-hover table-pt10 fontNunito12"
                            style="width:100%" id="tableWallAgent">
                            <thead class="text-center text-white bg-head">
                                <tr>
                                    <td style="width:16px">No</td>
                                    <td style="width:48px">Agent ID</td>
                                    <td style="width:134px">Name</td>
                                    <td style="width:127px">Tenant</td>
                                    <td style="width:30px">State</td>
                                    <td style="width:54px">In Service</td>
                                    <td style="width:82px">Total Handled</td>
                                    <td style="width:70px">ART</td>
                                    <td style="width:70px">AHT</td>
                                </tr>
                            </thead>
                            <tbody class="table-sm">
                                <!-- <tr>
                                    <td>1</td>
                                    <td class="text-center">1230</td>
                                    <td class="text-left">Randy</td>
                                    <td>Idle</td>
                                    <td class="text-right">5</td>
                                    <td class="text-right">20</td>
                                    <td>00:02:10</td>
                                    <td>00:02:10</td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td class="text-center">1230</td>
                                    <td class="text-left">Randy</td>
                                    <td>Idle</td>
                                    <td class="text-right">5</td>
                                    <td class="text-right">20</td>
                                    <td>00:02:10</td>
                                    <td>00:02:10</td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td class="text-center">1230</td>
                                    <td class="text-left">Randy</td>
                                    <td>Idle</td>
                                    <td class="text-right">5</td>
                                    <td class="text-right">20</td>
                                    <td>00:02:10</td>
                                    <td>00:02:10</td>
                                </tr>
                                <tr>
                                    <td>4</td>
                                    <td class="text-center">1230</td>
                                    <td class="text-left">Randy</td>
                                    <td>Idle</td>
                                    <td class="text-right">5</td>
                                    <td class="text-right">20</td>
                                    <td>00:02:10</td>
                                    <td>00:02:10</td>
                                </tr>
                                <tr>
                                    <td>5</td>
                                    <td class="text-center">1230</td>
                                    <td class="text-left">Randy</td>
                                    <td>Idle</td>
                                    <td class="text-right">5</td>
                                    <td class="text-right">20</td>
                                    <td>00:02:10</td>
                                    <td>00:02:10</td>
                                </tr>
                                <tr>
                                    <td>6</td>
                                    <td class="text-center">1230</td>
                                    <td class="text-left">Randy</td>
                                    <td>Idle</td>
                                    <td class="text-right">5</td>
                                    <td class="text-right">20</td>
                                    <td>00:02:10</td>
                                    <td>00:02:10</td>
                                </tr>
                                <tr>
                                    <td>7</td>
                                    <td class="text-center">1230</td>
                                    <td class="text-left">Randy</td>
                                    <td>Idle</td>
                                    <td class="text-right">5</td>
                                    <td class="text-right">20</td>
                                    <td>00:02:10</td>
                                    <td>00:02:10</td>
                                </tr>
                                <tr>
                                    <td>8</td>
                                    <td class="text-center">1230</td>
                                    <td class="text-left">Randy</td>
                                    <td>Idle</td>
                                    <td class="text-right">5</td>
                                    <td class="text-right">20</td>
                                    <td>00:02:10</td>
                                    <td>00:02:10</td>
                                </tr>
                                <tr>
                                    <td>9</td>
                                    <td class="text-center">1230</td>
                                    <td class="text-left">Randy</td>
                                    <td>Idle</td>
                                    <td class="text-right">5</td>
                                    <td class="text-right">20</td>
                                    <td>00:02:10</td>
                                    <td>00:02:10</td>
                                </tr>
                                <tr>
                                    <td>10</td>
                                    <td class="text-center">1230</td>
                                    <td class="text-left">Randy</td>
                                    <td>Idle</td>
                                    <td class="text-right">5</td>
                                    <td class="text-right">20</td>
                                    <td>00:02:10</td>
                                    <td>00:02:10</td>
                                </tr>
                                <tr>
                                    <td>11</td>
                                    <td class="text-center">1230</td>
                                    <td class="text-left">Randy</td>
                                    <td>Idle</td>
                                    <td class="text-right">5</td>
                                    <td class="text-right">20</td>
                                    <td>00:02:10</td>
                                    <td>00:02:10</td>
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
    <script src="<?=base_url()?>assets/public/js/app/app-wall-agent-monitoring.js"></script>