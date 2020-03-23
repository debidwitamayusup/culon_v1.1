<div class=" app-content">
    <div class="side-app">
        <div class="page-header d-flex bd-highlight">
            <div class="flex-grow-1 bd-highlight">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active" aria-current="page">
                        <h4 class="page-title"><i class="fe fe-grid mr-1"></i>Dashboard</h4>
                    </li>
                    <li class="breadcrumb-item active mt-2" aria-current="page">KIP</li>
                </ol>

            </div>
            <div class="bd-highlight" id="layanan_name_parent" style="margin-right: 9px; margin-bottom: 30px;">
                <select class="form-control-sm select-tenant" style="border-color:#efecec;font-size:12px"
                    id="layanan_name">

                </select>
            </div>
            <div class="bd-highlight">
                <div class="d-flex align-items-end flex-column bd-highlight">
                    <div class="bd-highlight">
                        <div class="card-options d-none d-sm-block">
                            <div class="btn-group text-center btn-sm">
                                <a href="javascript:remove_hash_from_url()" class="btn btn-light btn-sm" id="btn-day">
                                    <span class="">Day</a></span>
                                <a href="javascript:remove_hash_from_url()" class="btn btn-light btn-sm" id="btn-month">
                                    <span class="">Month</a></span>
                                <a href="javascript:remove_hash_from_url()" class="btn btn-light btn-sm" id="btn-year">
                                    <span class="">Year</a></span>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- daily -->
                <div id="filter-date" class="mt-1 mr-0" style="padding: 0px 0px 0px 3.3rem;">
                    <input id="input-date-filter" class="w-55 ml-auto form-control form-control-sm fc-datepicker"
                        placeholder="MM/DD/YYYY" type="text">
                </div>

                <!-- monthly -->
                <div id="filter-month" class="row mt-1 mr-0" style="padding: 0px 0px 0px 0.65rem;">
                    <div class="col-md-auto">
                        <select name="select-month" id="select-month" class="form-control form-control-sm">
                            <option value="1">January</option>
                            <option value="2">February</option>
                            <option value="3">March</option>
                            <option value="4">April</option>
                            <option value="5">May</option>
                            <option value="6">June</option>
                            <option value="7">July</option>
                            <option value="8">August</option>
                            <option value="9">September</option>
                            <option value="10">October</option>
                            <option value="11">November</option>
                            <option value="12">December</option>
                        </select>
                    </div>
                    <!-- Monthly -->
                    <div>
                        <select name="select-year-on-month" id="select-year-on-month"
                            class="form-control form-control-sm">
                        </select>
                    </div>
                    <!-- Monthly -->
                    <div>
                        <span class="col-auto">
                            <button class="btn btn-sm btn-dark" type="button" style="height:29px" id="btn-go"><i
                                    class="fe fe-arrow-right text-white"></i></button>
                        </span>
                    </div>
                </div>

                <!-- yearly -->
                <div id="filter-year" class="mt-1 mr-0" style="padding: 0px 0px 0px 9.87rem;">
                    <select name="select-year-only" id="select-year-only" class="form-control form-control-sm">
                    </select>
                </div>
                <!-- yearly -->
            </div>
        </div>
        <!----Baris Pertama----!-->
        <div class="row margin0-4">
            <div class="col-xl-5 col-lg-5 col-md-12">
                <div class="card">
                    <div class="card-header-small">
                        <h5 class="card-title-small card-pt10">Summary KIP</h5>
                    </div>
                    <div id="legend" class="legend-con"></div>
                    <div class="card-body">
                        <div id="canvas-pie">
                            <canvas id="pieKIP" class="mb-2"></canvas>
                        </div>
                        <div id="no-data" class="col-12 text-center" style="margin:120px 0px;">
                            <img src="<?=base_url()?>assets/images/brand/no_data.png" class="img-no-data" style="margin-top:0px;">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-7 col-md-12">
                <div class="card">
                    <div class="card-header-small">
                        <h5 class="card-title-small card-pt10">KIP per Channel</h5>
                    </div>

                    <!-- chart yang baru -->
                    <div class="card-body">
                        <div id="horizontalBarKIPDiv">
                            <canvas id="horizontalBarKIP" width="600" height="378"></canvas>
                        </div>
                        <div id="no-data2" class="col-12 text-center" style="margin:120px 0px;">
                            <img src="<?=base_url()?>assets/images/brand/no_data.png" class="img-no-data" style="margin-top:0px;">
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div class="row margin0-4">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row ml-1">
                            <div class="form-group row">
                                <select class="form-control" style="width:130px" id="channel_name">
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
                                    <!-- <option value="1">Voice</option> -->
                                    <option value="3">Live Chat</option>
                                    <option value="4">SMS</option>
                                    <option value="15">Chatbot</option>
                                </select>
                            </div>
                        </div>
                        <!-- chart baru -->
                        <!-- <div class="card-body">
                                <canvas id="horizontaklBarKomplain" class="h-300"></canvas>
                            </div> -->
                        <div id="row-sub-category">
                            <div class="row" id="content-sub-category"> </div>
                        </div>
                        <!-- <div id="no-data3" class="col-12 text-center">
                                <img src="<?=base_url()?>assets/images/brand/no_data.png" class="img-no-data"
                                    style="margin-top:0px; margin-bottom:4.3rem;">
                            </div> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php $this->load->view('temp/footer');?>
    <script src="<?= base_url()?>assets/public/js/app/app-kip.js"></script>