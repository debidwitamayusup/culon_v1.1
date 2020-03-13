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
                    <select class="form-control-sm select-tenant" style="border-color:#efecec;font-size:12px" id="layanan_name">
                        <!-- <option value="#">All Tenant</option> -->
                    </select>
                </div>
            </div>
        </div>

        <div class="row margin0-4">
            <div class="col-md-12 col-lg-12">
                <div class="card">
                    <div class="table-responsive table-bordered" style="padding:5px 8px 12px 8px;">
                        <table class="table card-table table-striped table-vcenter table-hover table-pt10 fontNunito12"
                            style="width:100%" id="tableWallAgent">
                            <thead class="text-white bg-head">
                                <tr>
                                    <td style="width:12px" class="text-center">No</td>
                                    <td style="width:60px" class="text-center">Agent ID</td>
                                    <td style="width:140px" class="text-center">Name</td>
                                    <td style="width:127px" class="text-center">Tenant</td>
                                    <td style="width:30px" class="text-center">State</td>
                                    <td style="width:54px" class="text-center">In Service</td>
                                    <td style="width:82px" class="text-center">Total Handled</td>
                                    <td style="width:70px" class="text-center">ART</td>
                                    <td style="width:70px" class="text-center">AHT</td>
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