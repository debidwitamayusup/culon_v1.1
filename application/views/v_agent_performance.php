<div class=" app-content">
    <div class="side-app">
        <div class="page-header d-flex bd-highlight">
            <div class="flex-grow-1 bd-highlight">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active" aria-current="page">
                        <h4 class="page-title"><i class="fe fe-grid mr-1"></i>Dashboard</h4>
                    </li>
                    <li class="breadcrumb-item active mt-2" aria-current="page">Agent Performance</li>
                </ol>

            </div>
            <div class="bd-highlight" id="layanan_name_parent" style="margin-right: 9px; margin-bottom: 30px;">
                <select class="form-control-sm" style="border-color:#efecec;font-size:12px" id="layanan_name">

                </select>
            </div>
            <div class="bd-highlight">
                <div class="d-flex align-items-end flex-column bd-highlight">
                    <div class="bd-highlight">
                        <div class="card-options d-none d-sm-block">
                            <div class="btn-group text-center btn-sm">
                                <a href="#" class="btn btn-light btn-sm" id="btn-day">
                                    <span class="">Day</a></span>
                                <a href="#" class="btn btn-light btn-sm" id="btn-month">
                                    <span class="">Month</a></span>
                                <a href="#" class="btn btn-light btn-sm" id="btn-year">
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
                    <div>
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

        <!---Next Rows---->
        <div class="row" style="margin-right:0px; margin-left:-4px;">
            <div class="col-md-3">
                <div class="card">
                    <div class="card-header-small">
                        <h5 class="card-title-small card-pt10">Performance by Skill</h5>
                    </div>
                    <div class="table-wrapper-scroll-y my-custom-scrollbar table-responsive table-pt10">
                        <table class="table card-table table-striped table-vcenter table-hover table-pt10 fontNunito9"
                            style="height:310px" id="tableSkill">
                            <thead class="text-center text-white bg-head">
                                <tr>
                                    <td>Skill</td>
                                    <td>ART</td>
                                    <td>AHT</td>
                                    <td>AST</td>
                                </tr>
                            </thead>
                            <tbody class="text-center" id="mytbody_skill">

                            </tbody>
                        </table>
                    </div>
                    <!-- table-responsive -->
                </div>
            </div>
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header-small">
                        <h5 class="card-title-small card-pt10">Best Agent Performance</h5>
                    </div>
                    <div class="card-body height-agent">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="card height-card">
                                    <div class="card-header-small bg-red">
                                        <h6 class="card-title-small card-pt10" id="drawCOF">The Best 5 COF</h6>
                                    </div>
                                    <div class="card-body" id="classDrawCOF" style="padding:10px">
                                        <div class="row mb-3" id="dataDrawCOF">

                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="card height-card">
                                    <div class="card-header-small bg-red">
                                        <h6 class="card-title-small card-pt10" id="drawAHT">The Best 5 AHT</h6>
                                    </div>
                                    <div class="card-body" id="classDrawAHT" style="padding:10px">
                                        <div class="row mb-3" id="dataDrawAHT">

                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="card height-card">
                                    <div class="card-header-small bg-red">
                                        <h6 class="card-title-small card-pt10" id="drawART">The Best 5 ART</h6>
                                    </div>
                                    <div class="card-body" id="classDrawART" style="padding:10px">
                                        <div class="row mb-3" id="dataDrawART">

                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row" style="margin-right:0px; margin-left:-4px;">
            <div class="col-md-12 col-lg-12">
                <div class="card">
                    <div class="card-header-small">
                        <h5 class="card-title-small card-pt10">Summary Agent Performance Skill</h5>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="tableAgent" class="table table-striped table-bordered fontNunito12"
                                style="width:100%">
                                <thead class="text-center text-white bg-head">
                                    <tr>
                                        <th class="wd-15p border-bottom-0">No</th>
                                        <th class="wd-15p border-bottom-0" style="width:10%">Agent ID</th>
                                        <th class="wd-15p border-bottom-0" style="width:30%">Agent Name</th>
                                        <th class="wd-15p border-bottom-0">Skill</th>
                                        <th class="wd-15p border-bottom-0">COF
                                        </th>
                                        <th class="wd-15p border-bottom-0" style="width:10%">ART</th>
                                        <th class="wd-15p border-bottom-0" style="width:10%">AHT</th>
                                        <th class="wd-15p border-bottom-0" style="width:10%">AST</th>
                                    </tr>
                                </thead>
                                <tbody style="font-size:12px !important;" id="mytbody">
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
    <script src="<?=base_url()?>assets/public/js/app/app-agent-performance.js"></script>