<div class=" app-content">
    <div class="side-app">
        <div class="page-header d-flex p-2 bd-highlight">
            <div class="flex-grow-1 bd-highlight">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active" aria-current="page">
                        <h4 class="page-title"><i class="fe fe-grid mr-1"></i>Wallboard</h4>
                    </li>
                    <li class="breadcrumb-item active mt-2" aria-current="page">MENU BARU
                    </li>
                </ol>
            </div>
            <!-- </div> -->
            <div class="d-flex bd-highlight">
                <div class="ml-auto p-2 bd-highlight mt-3 h6">Tenant </div>
                <div class="p-2 bd-highlight">
                    <select class="form-control" id="tenant_name">
                        <option value="#">TELKOMSEL</option>
                        <option value="#">BRI</option>
                        <option value="#">TELKOMCARE</option>
                    </select>
                </div>
            </div>
            <!--Page Header-->
        </div>

        <div class="row">
            <div class="col-md-12 col-lg-12">
                <div class="card">
                    <div class="table-responsive table-bordered" style="padding:5px 5px 12px 5px;">
                        <table class="table card-table table-striped table-vcenter table-hover table-pt10 fontNunito9"
                            style="font-size:9px; width:100%" id="tabelCOFByChannel">
                            <thead class="text-center bg-head">
                                <tr>
                                    <td>No</td>
                                    <td>Agent ID</td>
                                    <td>Nama</td>
                                    <td>State</td>
                                    <td>In Service</td>
                                    <td>Total Handled</td>
                                    <td>ART</td>
                                    <td>AHT</td>
                                </tr>
                            </thead>
                            <tbody class="table-sm text-center" id="mytbody">
                                <tr>
                                    <td>1</td>
                                    <td>9999</td>
                                    <td>Alice</td>
                                    <td>Idle</td>
                                    <td>5</td>
                                    <td>20</td>
                                    <td>00:02:10</td>
                                    <td>00:02:10</td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>9999</td>
                                    <td>Alice</td>
                                    <td>Idle</td>
                                    <td>5</td>
                                    <td>20</td>
                                    <td>00:02:10</td>
                                    <td>00:02:10</td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td>9999</td>
                                    <td>Alice</td>
                                    <td>Idle</td>
                                    <td>5</td>
                                    <td>20</td>
                                    <td>00:02:10</td>
                                    <td>00:02:10</td>
                                </tr>
                                <tr>
                                    <td>4</td>
                                    <td>9999</td>
                                    <td>Alice</td>
                                    <td>Idle</td>
                                    <td>5</td>
                                    <td>20</td>
                                    <td>00:02:10</td>
                                    <td>00:02:10</td>
                                </tr>
                                <tr>
                                    <td>5</td>
                                    <td>9999</td>
                                    <td>Alice</td>
                                    <td>Idle</td>
                                    <td>5</td>
                                    <td>20</td>
                                    <td>00:02:10</td>
                                    <td>00:02:10</td>
                                </tr>
                                <tr>
                                    <td>6</td>
                                    <td>9999</td>
                                    <td>Alice</td>
                                    <td>Idle</td>
                                    <td>5</td>
                                    <td>20</td>
                                    <td>00:02:10</td>
                                    <td>00:02:10</td>
                                </tr>
                                <tr>
                                    <td>7</td>
                                    <td>9999</td>
                                    <td>Alice</td>
                                    <td>Idle</td>
                                    <td>5</td>
                                    <td>20</td>
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
    <!-- <script src="<?=base_url()?>assets/public/js/app/app-NTAH-APAAN.js"></script> -->