<div class=" app-content">
    <div class="side-app">
        <div class="page-header d-flex p-2 bd-highlight">
            <div class="flex-grow-1 bd-highlight">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active" aria-current="page">
                        <h4 class="page-title"><i class="fe fe-grid mr-1"></i>Wallboard</h4>
                    </li>
                    <li class="breadcrumb-item active mt-2" aria-current="page">Agent Monitoring
                    </li>
                </ol>
            </div>
            <!--Page Header-->
        </div>

        <div class="row">
            <div class="col-md-12 col-lg-12">
                <div class="card">
                <div class="d-flex bd-highlight">
                    <div class="ml-auto p-2 bd-highlight mt-3 h6">Tenant </div>
                    <div class="p-2 bd-highlight">
                        <select class="form-control">
                            <option value="#">All Tenant</option>
                        </select>
                    </div>
                </div>
                    <div class="table-responsive table-bordered" style="padding:5px 8px 12px 8px;">
                        <table class="table card-table table-striped table-vcenter table-hover table-pt10 fontNunito12"
                            style="width:100%" id="tableWallAgent">
                            <thead class="text-center text-white bg-head">
                                <tr>
                                    <td>No</td>
                                    <td>Agent ID</td>
                                    <td>Name</td>
                                    <td>State</td>
                                    <td>In Service</td>
                                    <td>Total Handled</td>
                                    <td>ART</td>
                                    <td>AHT</td>
                                </tr>
                            </thead>
                            <tbody class="table-sm text-center">
                                <tr>
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
    <script src="<?=base_url()?>assets/public/js/app/app-wall-agent-monitoring.js"></script>