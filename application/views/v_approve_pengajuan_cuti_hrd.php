<div class=" app-content">
    <div class="side-app">
        <div class="page-header d-flex p-2 bd-highlight">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active" aria-current="page">
                    <h4 class="page-title"><i class="fe fe-book mr-1"></i>Layanan Karyawan</h4>
                </li>
                <li class="breadcrumb-item active mt-2" aria-current="page">Approve Pengajuan cuti HRD</li>
            </ol>
        </div>
        <!--Page Header-->

        <!----First Rows--->
        <div class="row">
            <div class="col-md-12 col-lg-12">
                <div class="card">
                    <div class="card-header-small">
                        <h5 class="card-title-small card-pt10">Daftar Approval Pengajuan Cuti</h5>
                    </div>
                    <div class="card-body">
                        <div class="row mb-2">
                            <div class="col-xs-auto">
                                <div class="input-group" style="width:150px">
                                   
                           
                            <!-- <div class="col-sm-auto ml-1">
                                    <div class="form-group row">
                                        <select class="form-control" id="channelName">
                                             <option value="">All Channel</option>
                                             <option value="12">Whatsapp</option>
                                             <option value="6">Facebook</option>
                                             <option value="8">Twitter</option>
                                             <option value="11">Instagram</option>
                                             <option value="13">Twitter DM</option>
                                             <option value="7">Messenger</option>
                                             <option value="5">Telegram</option>
                                             <option value="10">Line</option>
                                             <option value="2">Email</option>
                                             <option value="1">Voice</option>
                                             <option value="3">Live Chat</option>
                                             <option value="4">SMS</option>
                                             <option value="15">Chatbot</option>
                                        </select>
                                    </div>
                                </div> -->

                            <!-- <div class="col-xs-auto ml-1">
                                <button class="btn btn-sm btn-dark" type="button" style="height:35px" id="btn-go"><i
                                        class="fas fa-filter"></i></button>

                            </div> -->
                           <!-- <div class="col-xs-auto ml-1">
                                <button class="btn btn-sm btn-primary" type="button" style="height:35px" id="btn-tambah"><i
                                        class="fas fa-download mr-2"></i>Tambah Pengajuan</button>

                            </div> -->
                        </div>
                    </div>
                    <div class="table-responsive" style="padding:6px">
                        <table class="table table-striped table-bordered fontNunito10" width="100%" id="listPengajuanTbl">
                            <thead class="bg-head text-white text-center">
                                <tr>
                                    <td class="border-bottom-0">No.</td>
                                    <td class="border-bottom-0">Nomor Induk</td>
                                    <td class="border-bottom-0">Nama</td>
                                    <td class="border-bottom-0" width="200px">Nama Cuti</td>
                                    <td class="border-bottom-0">Durasi Cuti</td>
                                    <td class="border-bottom-0">Dari Tgl</td>
                                    <td class="border-bottom-0">Ke Tgl</td>
                                    <!-- <td class="border-bottom-0">Approve Pemohon</td>
                                    <td class="border-bottom-0">Approve Pengganti</td> -->
                                    <td class="border-bottom-0">Approve Leader</td>
                                    <!-- <td class="border-bottom-0">Approve Kabag</td> -->
                                    <td class="border-bottom-0">Approve HRD</td>
                                    <td class="border-bottom-0">Aksi</td>
                                </tr>
                            </thead>
                            <tbody id="mytbody">
                                <tr>
                                    <td colspan="13" class="text-center">No Data</td>
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
    <script src="<?=base_url()?>assets/public/js/app/app-approval-pengajuan-hrd-dashboard.js"></script>