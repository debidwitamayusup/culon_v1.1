<!-- Global Loader-->
<div id="global-loader"><img src="<?= base_url()?>assets/images/svgs/loader.svg" alt="loader"></div>
<div class="page">
    <div class="page-main">
        <div class=" app-content mt-7">
            <div class="side-app">
                <div class="page-header">
                    <h4 class="page-title"><i class="fe fe-home mr-1"></i>Dashboard</h4>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#"></a></li>
                        <li class="breadcrumb-item active" aria-current="page">Summary Traffic Channel</li>
                    </ol>
                    <div class="card-options d-none d-sm-block">
                        <div class="btn-group btn-sm">
                            <a href="<?=base_url()?>main/this_day" class="btn btn-light btn-sm">
                                <span class="">Day</a></span>
                            <a href="<?=base_url()?>main/this_month" class="btn btn-light btn-sm">
                                <span class="">Month</a></span>
                            <a href="<?=base_url()?>main/this_year" class="btn btn-light btn-sm">
                                <span class="">Year</a></span>
                        </div>
                    </div>
                </div>
                <!--Page Header-->
            </div>
            <!----Baris Pertama----!-->
            <div class="row">
                <div class="col-xl-5 col-lg-5 col-md-12">
                    <div class="card overflow-hidden">
                        <div class="card-header">
                            <h3 class="card-title">Summary Traffic Channel</h3>
                        </div>
                        <div class="card-body">
                            <div class="canvas-con">
                                <div class="canvas-con-inner">
                                    <canvas id="pieChart" height="250px" class="donutShadow overflow-hidden"></canvas>
                                </div>
                                <div id="legend" class="legend-con"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <!---! Kolom Channel--->
                <div class="col-xl-7 col-lg-7 col-md-12">
                    <div class="card overflow-hidden">
                        <div class="card-header">
                            <h3 class="card-title">Interaction</h3>
                        </div>
                        <div class="card-body">
                            <div id="retres" class="row"></div>
                        </div>
                    </div>
                </div>
            </div>
                
            <!---Baris Kedua!-->
            <div class="row">
                <div class="col-md-12 col-xl-4 col-lg-6 text-center">
                    <div class="card">
                        <div class="card-header bg-red">
                            <h3 class="card-title text-white">Total Interaction</h3>
                        </div>
                        <div class="card-body">
                            <h2 class="mb-1 num-font" id="total-interaction"></h2>
                            <span class="text-muted">15% Higher Of Previous Month</span>
                            <div class="row mt-5">
                                <div class="col-sm-12">
                                    <div class="mb-0">
                                        <h4 class="mb-2 d-block">
                                            <span class="fs-16">Total Expences</span>
                                            <span class="float-right num-font">$1587</span>
                                        </h4>
                                        <div class="progress progress-md h-1 mb-1">
                                            <div
                                                class="progress-bar progress-bar-striped progress-bar-animated bg-primary w-30">
                                            </div>
                                        </div>
                                        <span>12% of your Goals</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 col-xl-4 col-lg-6 text-center">
                    <div class="card">
                        <div class="card-header bg-red">
                            <h3 class="text-white card-title">Unique Customer</h3>
                        </div>
                        <div class="card-body">
                            <h2 class="mb-1 num-font" id="unique-customer"></h2>
                            <span class="text-muted">15% Higher Of Previous Month</span>
                            <div class="row mt-5">
                                <div class="col-sm-12">
                                    <div class="mb-0">
                                        <h4 class="mb-2 d-block">
                                            <span class="fs-16">Total Expences</span>
                                            <span class="float-right num-font">$1587</span>
                                        </h4>
                                        <div class="progress progress-md h-1 mb-1">
                                            <div
                                                class="progress-bar progress-bar-striped progress-bar-animated bg-primary w-30">
                                            </div>
                                        </div>
                                        <span>12% of your Goals</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 col-xl-4 col-lg-6 text-center">
                    <div class="card">
                        <div class="card-header bg-red">
                            <h3 class="card-title text-white">Average Customer</h3>
                        </div>
                        <div class="card-body">
                            <h2 class="mb-1 num-font" id="avg-customer"></h2>
                            <span class="text-muted">15% Higher Of Previous Month</span>
                            <div class="row mt-5">
                                <div class="col-sm-12">
                                    <div class="mb-0">
                                        <h4 class="mb-2 d-block">
                                            <span class="fs-16">Total Expences</span>
                                            <span class="float-right num-font">$1587</span>
                                        </h4>
                                        <div class="progress progress-md h-1 mb-1">
                                            <div
                                                class="progress-bar progress-bar-striped progress-bar-animated bg-primary w-30">
                                            </div>
                                        </div>
                                        <span>12% of your Goals</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card box-widget widget-user">
                        <div class="card-header bg-red">
                            <h3 class="card-title text-white">Unique Customer per Channel</h3>
                        </div>
                        <div class="box-footer">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="row" id="retres-unique">
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--Sidebar-right-->
        <div class="sidebar sidebar-right sidebar-animate">
            <div class="p-2 mb-4">
                <a href="#" class="text-right float-right" data-toggle="sidebar-right"
                    data-target=".sidebar-right"><i class="fe fe-x"></i></a>
            </div>
            <div class="panel panel-primary">
                <div class="tab-menu-heading border-0">
                    <div class="tabs-menu ">
                        <!-- Tabs -->
                        <ul class="nav panel-tabs">
                            <li class=""><a href="#side1" class="active" data-toggle="tab"><i
                                        class="fas fa-bell"></i> Notifications</a></li>
                            <li><a href="#side2" data-toggle="tab"><i class="fas fa-comments"></i> Chat</a></li>
                            <li><a href="#side3" data-toggle="tab"><i class="fas fa-user-friends"></i> Friends</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="panel-body tabs-menu-body p-0 border-0">
                    <div class="tab-content">
                        <div class="tab-pane active " id="side1">
                            <div class="list-group list-group-flush ">
                                <div class="list-group-item d-flex  align-items-center">
                                    <div class="mr-3">
                                        <span class="avatar avatar-lg brround cover-image"
                                            data-image-src="../assets/images/users/5.jpg"><span
                                                class="avatar-status bg-green"></span></span>
                                    </div>
                                    <div>
                                        <strong>Madeleine</strong> Hey! there I' am available....
                                        <div class="small text-muted">
                                            3 hours ago
                                        </div>
                                    </div>
                                </div>
                                <div class="list-group-item d-flex  align-items-center">
                                    <div class="mr-3">
                                        <span class="avatar avatar-lg brround cover-image"
                                            data-image-src="../assets/images/users/4.jpg"></span>
                                    </div>
                                    <div>
                                        <strong>Anthony</strong> New product Launching...
                                        <div class="small text-muted">
                                            5 hour ago
                                        </div>
                                    </div>
                                </div>
                                <div class="list-group-item d-flex  align-items-center">
                                    <div class="mr-3">
                                        <span class="avatar avatar-lg brround cover-image"
                                            data-image-src="../assets/images/users/3.jpg"><span
                                                class="avatar-status bg-green"></span></span>
                                    </div>
                                    <div>
                                        <strong>Olivia</strong> New Schedule Realease......
                                        <div class="small text-muted">
                                            45 mintues ago
                                        </div>
                                    </div>
                                </div>
                                <div class="list-group-item d-flex  align-items-center">
                                    <div class="mr-3">
                                        <span class="avatar avatar-lg brround cover-image"
                                            data-image-src="../assets/images/users/2.jpg"><span
                                                class="avatar-status bg-green"></span></span>
                                    </div>
                                    <div>
                                        <strong>Madeleine</strong> Hey! there I' am available....
                                        <div class="small text-muted">
                                            3 hours ago
                                        </div>
                                    </div>
                                </div>
                                <div class="list-group-item d-flex  align-items-center">
                                    <div class="mr-3">
                                        <span class="avatar avatar-lg brround cover-image"
                                            data-image-src="../assets/images/users/1.jpg"></span>
                                    </div>
                                    <div>
                                        <strong>Anthony</strong> New product Launching...
                                        <div class="small text-muted">
                                            5 hour ago
                                        </div>
                                    </div>
                                </div>
                                <div class="list-group-item d-flex  align-items-center">
                                    <div class="mr-3">
                                        <span class="avatar avatar-lg brround cover-image"
                                            data-image-src="../assets/images/users/9.jpg"><span
                                                class="avatar-status bg-green"></span></span>
                                    </div>
                                    <div>
                                        <strong>Olivia</strong> New Schedule Realease......
                                        <div class="small text-muted">
                                            45 mintues ago
                                        </div>
                                    </div>
                                </div>
                                <div class="pt-4 text-center">
                                    <a href="#" class="btn btn-primary">View more</a>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane  " id="side2">
                            <div class="list d-flex align-items-center border-bottom p-4">
                                <div class="">
                                    <span class="avatar bg-primary brround avatar-md">CH</span>
                                </div>
                                <div class="wrapper w-100 ml-3">
                                    <p class="mb-0 d-flex">
                                        <b>New Websites is Created</b>
                                    </p>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="d-flex align-items-center">
                                            <i class="mdi mdi-clock text-muted mr-1"></i>
                                            <small class="text-muted ml-auto">30 mins ago</small>
                                            <p class="mb-0"></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="list d-flex align-items-center border-bottom p-4">
                                <div class="">
                                    <span class="avatar bg-danger brround avatar-md">N</span>
                                </div>
                                <div class="wrapper w-100 ml-3">
                                    <p class="mb-0 d-flex">
                                        <b>Prepare For the Next Project</b>
                                    </p>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="d-flex align-items-center">
                                            <i class="mdi mdi-clock text-muted mr-1"></i>
                                            <small class="text-muted ml-auto">2 hours ago</small>
                                            <p class="mb-0"></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="list d-flex align-items-center border-bottom p-4">
                                <div class="">
                                    <span class="avatar bg-info brround avatar-md">S</span>
                                </div>
                                <div class="wrapper w-100 ml-3">
                                    <p class="mb-0 d-flex">
                                        <b>Decide the live Discussion</b>
                                    </p>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="d-flex align-items-center">
                                            <i class="mdi mdi-clock text-muted mr-1"></i>
                                            <small class="text-muted ml-auto">3 hours ago</small>
                                            <p class="mb-0"></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="list d-flex align-items-center border-bottom p-4">
                                <div class="">
                                    <span class="avatar bg-warning brround avatar-md">K</span>
                                </div>
                                <div class="wrapper w-100 ml-3">
                                    <p class="mb-0 d-flex">
                                        <b>Meeting at 3:00 pm</b>
                                    </p>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="d-flex align-items-center">
                                            <i class="mdi mdi-clock text-muted mr-1"></i>
                                            <small class="text-muted ml-auto">4 hours ago</small>
                                            <p class="mb-0"></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="list d-flex align-items-center border-bottom p-4">
                                <div class="">
                                    <span class="avatar bg-success brround avatar-md">R</span>
                                </div>
                                <div class="wrapper w-100 ml-3">
                                    <p class="mb-0 d-flex">
                                        <b>Prepare for Presentation</b>
                                    </p>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="d-flex align-items-center">
                                            <i class="mdi mdi-clock text-muted mr-1"></i>
                                            <small class="text-muted ml-auto">1 days ago</small>
                                            <p class="mb-0"></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="list d-flex align-items-center border-bottom p-4">
                                <div class="">
                                    <span class="avatar bg-pink brround avatar-md">MS</span>
                                </div>
                                <div class="wrapper w-100 ml-3">
                                    <p class="mb-0 d-flex">
                                        <b>Prepare for Presentation</b>
                                    </p>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="d-flex align-items-center">
                                            <i class="mdi mdi-clock text-muted mr-1"></i>
                                            <small class="text-muted ml-auto">1 days ago</small>
                                            <p class="mb-0"></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="list d-flex align-items-center border-bottom p-4">
                                <div class="">
                                    <span class="avatar bg-purple brround avatar-md">L</span>
                                </div>
                                <div class="wrapper w-100 ml-3">
                                    <p class="mb-0 d-flex">
                                        <b>Prepare for Presentation</b>
                                    </p>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="d-flex align-items-center">
                                            <i class="mdi mdi-clock text-muted mr-1"></i>
                                            <small class="text-muted ml-auto">45 mintues ago</small>
                                            <p class="mb-0"></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="list d-flex align-items-center p-4">
                                <div class="">
                                    <span class="avatar bg-blue brround avatar-md">U</span>
                                </div>
                                <div class="wrapper w-100 ml-3">
                                    <p class="mb-0 d-flex">
                                        <b>Prepare for Presentation</b>
                                    </p>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="d-flex align-items-center">
                                            <i class="mdi mdi-clock text-muted mr-1"></i>
                                            <small class="text-muted ml-auto">2 days ago</small>
                                            <p class="mb-0"></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane  " id="side3">
                            <div class="list-group list-group-flush ">
                                <form class="form-inline p-4">
                                    <div class="search-element">
                                        <input class="form-control header-search" type="search"
                                            placeholder="Search..." aria-label="Search">
                                    </div>
                                </form>
                                <div class="list-group-item d-flex  align-items-center">
                                    <div class="mr-2">
                                        <span class="avatar avatar-md brround cover-image"
                                            data-image-src="../assets/images/users/2.jpg"><span
                                                class="avatar-status bg-green"></span></span>
                                    </div>
                                    <div class="">
                                        <div class="font-weight-semibold">Mozelle Belt</div>
                                    </div>
                                    <div class="ml-auto">
                                        <a href="#" class="btn btn-sm btn-light"><i
                                                class="fab fa-facebook-messenger"></i></a>
                                    </div>
                                </div>
                                <div class="list-group-item d-flex  align-items-center">
                                    <div class="mr-2">
                                        <span class="avatar avatar-md brround cover-image"
                                            data-image-src="../assets/images/users/1.jpg"></span>
                                    </div>
                                    <div class="">
                                        <div class="font-weight-semibold">Florinda Carasco</div>
                                    </div>
                                    <div class="ml-auto">
                                        <a href="#" class="btn btn-sm btn-light"><i
                                                class="fab fa-facebook-messenger"></i></a>
                                    </div>
                                </div>
                                <div class="list-group-item d-flex  align-items-center">
                                    <div class="mr-2">
                                        <span class="avatar avatar-md brround cover-image"
                                            data-image-src="../assets/images/users/9.jpg"><span
                                                class="avatar-status bg-green"></span></span>
                                    </div>
                                    <div class="">
                                        <div class="font-weight-semibold">Alina Bernier</div>
                                    </div>
                                    <div class="ml-auto">
                                        <a href="#" class="btn btn-sm btn-light"><i
                                                class="fab fa-facebook-messenger"></i></a>
                                    </div>
                                </div>
                                <div class="list-group-item d-flex  align-items-center">
                                    <div class="mr-2">
                                        <span class="avatar avatar-md brround cover-image"
                                            data-image-src="../assets/images/users/3.jpg"><span
                                                class="avatar-status bg-green"></span></span>
                                    </div>
                                    <div class="">
                                        <div class="font-weight-semibold">Zula Mclaughin</div>
                                    </div>
                                    <div class="ml-auto">
                                        <a href="#" class="btn btn-sm btn-light"><i
                                                class="fab fa-facebook-messenger"></i></a>
                                    </div>
                                </div>
                                <div class="list-group-item d-flex  align-items-center">
                                    <div class="mr-2">
                                        <span class="avatar avatar-md brround cover-image"
                                            data-image-src="../assets/images/users/4.jpg"></span>
                                    </div>
                                    <div class="">
                                        <div class="font-weight-semibold">Isidro Heide</div>
                                    </div>
                                    <div class="ml-auto">
                                        <a href="#" class="btn btn-sm btn-light"><i
                                                class="fab fa-facebook-messenger"></i></a>
                                    </div>
                                </div>
                                <div class="list-group-item d-flex  align-items-center">
                                    <div class="mr-2">
                                        <span class="avatar avatar-md brround cover-image"
                                            data-image-src="../assets/images/users/5.jpg"><span
                                                class="avatar-status bg-green"></span></span>
                                    </div>
                                    <div class="">
                                        <div class="font-weight-semibold">Mozelle Belt</div>
                                    </div>
                                    <div class="ml-auto">
                                        <a href="#" class="btn btn-sm btn-light"><i
                                                class="fab fa-facebook-messenger"></i></a>
                                    </div>
                                </div>
                                <div class="list-group-item d-flex  align-items-center">
                                    <div class="mr-2">
                                        <span class="avatar avatar-md brround cover-image"
                                            data-image-src="../assets/images/users/6.jpg"></span>
                                    </div>
                                    <div class="">
                                        <div class="font-weight-semibold">Florinda Carasco</div>
                                    </div>
                                    <div class="ml-auto">
                                        <a href="#" class="btn btn-sm btn-light"><i
                                                class="fab fa-facebook-messenger"></i></a>
                                    </div>
                                </div>
                                <div class="list-group-item d-flex  align-items-center">
                                    <div class="mr-2">
                                        <span class="avatar avatar-md brround cover-image"
                                            data-image-src="../assets/images/users/8.jpg"></span>
                                    </div>
                                    <div class="">
                                        <div class="font-weight-semibold">Alina Bernier</div>
                                    </div>
                                    <div class="ml-auto">
                                        <a href="#" class="btn btn-sm btn-light"><i
                                                class="fab fa-facebook-messenger"></i></a>
                                    </div>
                                </div>
                                <div class="list-group-item d-flex  align-items-center">
                                    <div class="mr-2">
                                        <span class="avatar avatar-md brround cover-image"
                                            data-image-src="../assets/images/users/7.jpg"></span>
                                    </div>
                                    <div class="">
                                        <div class="font-weight-semibold">Isidro Heide</div>
                                    </div>
                                    <div class="ml-auto">
                                        <a href="#" class="btn btn-sm btn-light"><i
                                                class="fab fa-facebook-messenger"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--/Sidebar-right-->