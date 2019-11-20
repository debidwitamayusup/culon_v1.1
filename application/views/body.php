

	<body class="app">

		<!-- Global Loader-->
		<div id="global-loader"><img src="<?= base_url()?>assets/images/svgs/loader.svg" alt="loader"></div>

		<div class="page">
			<div class="page-main">

				
			<div class=" app-content" style="margin-left:100px;">
					<div class="side-app">

						<!--Page Header-->
						
						<div class="row">
						<div class="col-xl-3 col-lg-4 col-md-12">
								<div class="card">
									<div class="card-body">
										<div class="row mb-3">
											<div class="col">
												<h6 class="text-muted mb-0 mt-1">Total Case </h6>
											</div>
											<div class="col col-auto">
												<a class="btn btn-sm btn-white border">View Details</a>
											</div>
										</div>
										<div class="row">
											<div class="col">
												<div class="dash-2">
													<h2 class="mb-2"><span class="counter font-weight-extrabold num-font">500</span></h2>
													<span class="text-muted"><span class="font-weight-bold"><i class="fas fa-arrow-circle-up text-success"></i> 5%</span>  Total Case Increased </span>
												</div>
											</div>
											<div class="col col-auto">
												<span class="sparkline_bar3"></span>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="col-xl-3 col-lg-4 col-md-12">
								<div class="card">
									<div class="card-body">
										<div class="row mb-3">
											<div class="col">
												<h6 class="text-muted mb-0 mt-1">Total Case In</h6>
											</div>
											<div class="col col-auto">
												<a class="btn btn-sm btn-white border">View Details</a>
											</div>
										</div>
										<div class="row">
											<div class="col">
												<div class="dash-2">
													<h2 class="mb-2"><span class="counter font-weight-extrabold num-font">500</span></h2>
													<span class="text-muted"><span class="font-weight-bold"><i class="fas fa-arrow-circle-down text-danger"></i> 5%</span>  Case In Increased </span>
												</div>
											</div>
											<div class="col col-auto">
												<span class="sparkline_bar2"></span>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="col-xl-3 col-lg-4 col-md-12">
								<div class="card">
									<div class="card-body">
										<div class="row mb-3">
											<div class="col">
												<h6 class="text-muted mb-0 mt-1">Total Case Out</h6>
											</div>
											<div class="col col-auto">
												<a class="btn btn-sm btn-white border">View Details</a>
											</div>
										</div>
										<div class="row">
											<div class="col">
												<div class="dash-2">
													<h2 class="mb-2"><span class="counter font-weight-extrabold num-font">300</span></h2>
													<span class="text-muted"><span class="font-weight-bold"><i class="fas fa-arrow-circle-down text-danger"></i> 10%</span>  Case Out Decresed</span>
												</div>
											</div>
											<div class="col col-auto">
												<span class="sparkline_bar3"></span>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="col-xl-3 col-lg-4 col-md-12">
								<div class="card">
									<div class="card-body">
										<div class="row mb-3">
											<div class="col">
												<h6 class="text-muted mb-0 mt-1">Total Agent</h6>
											</div>
											<div class="col col-auto">
												<a class="btn btn-sm btn-white border">View Details</a>
											</div>
										</div>
										<div class="row">
											<div class="col">
												<div class="dash-2">
													<h2 class="mb-3"><span class="counter font-weight-extrabold num-font">50</span></h2>
												</div>
											</div>
											
										</div>
									</div>
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-md-12">
								<div class="card overflow-hidden">
									<div class="card-header">
										<h3 class="card-title">Website Activities</h3>
										<div class="card-options d-none d-sm-block">
											<div class="btn-group btn-sm">
												<button type="button" class="btn btn-light btn-sm">
													<span class="">Day</span>
												</button>
												<button type="button" class="btn btn-light btn-sm">
													<span class="">Month</span>
												</button>
												<button type="button" class="btn btn-light btn-sm">
													<span class="">Year</span>
												</button>
											</div>
										</div>
									</div>
									<div class="card-body">
										<div class="row">
											<div class="col-xl-12">
												<div class="card-body overflow-hidden">
													<canvas id="lineChart" class="chart-dropshadow h-350 overflow-hidden"></canvas>
												</div>
											</div>
										</div>
									</div>
									<div class="card-body">
										<div class="row website-section">
											<div class="col-xl-3 text-center mb-5 mb-lg-0">
												<p class="mb-1 text-muted">Daily Visitors</p>
												<h2 class=" mb-3 font-weight-extrabold num-font">6,254</h2>
												<div class="progress progress-md h-1">
													<div class="progress-bar progress-bar-striped progress-bar-animated bg-primary w-70"></div>
												</div>
											</div>
											<div class="col-xl-3 text-center mb-5 mb-lg-0">
												<p class="mb-1 text-muted">Returning Visitors</p>
												<h2 class=" mb-3 font-weight-extrabold num-font">1254</h2>
												<div class="progress progress-md h-1">
													<div class="progress-bar progress-bar-striped progress-bar-animated bg-secondary w-70"></div>
												</div>
											</div>
											<div class="col-xl-3 text-center mb-5 mb-lg-0">
												<p class="mb-1 text-muted">Page Views</p>
												<h2 class="mb-3 font-weight-extrabold num-font">24,325</h2>
												<div class="progress progress-md h-1">
													<div class="progress-bar progress-bar-striped progress-bar-animated bg-pink w-70"></div>
												</div>
											</div>
											<div class="col-xl-3 text-center ">
												<p class="mb-1 text-muted">Today Subscribers</p>
												<h2 class="mb-3 font-weight-extrabold num-font">357</h2>
												<div class="progress progress-md h-1">
													<div class="progress-bar progress-bar-striped progress-bar-animated bg-warning w-70"></div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-xl-4 col-lg-4 col-md-12">
								<div class="card overflow-hidden">
									<div class="card-header">
										<h3 class="card-title">Web Traffic</h3>
										<div class="card-options">
											<span class="dropdown-toggle fs-16" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="true"><i class="fe fe-more-vertical " ></i></span>
											<ul class="dropdown-menu dropdown-menu-right" role="menu">
												<li><a href="#"><i class="si si-plus mr-2"></i>Add</a></li>
												<li><a href="#"><i class="si si-trash mr-2"></i>Remove</a></li>
												<li><a href="#"><i class="si si-eye mr-2"></i>View</a></li>
												<li><a href="#"><i class="si si-settings mr-2"></i>More</a></li>
											</ul>
										</div>
									</div>
									<div class="card-body">
										<canvas id="pieChart" class="donutShadow overflow-hidden"></canvas>
									</div>
								</div>
							</div>
							<div class="col-xl-4 col-lg-4 col-md-12">
								<div class="card overflow-hidden">
									<div class="card-header">
										<h3 class="card-title">Yearly Earnings</h3>
										<div class="card-options">
											<span class="dropdown-toggle fs-16" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="true"><i class="fe fe-more-vertical " ></i></span>
											<ul class="dropdown-menu dropdown-menu-right" role="menu">
												<li><a href="#"><i class="si si-plus mr-2"></i>Add</a></li>
												<li><a href="#"><i class="si si-trash mr-2"></i>Remove</a></li>
												<li><a href="#"><i class="si si-eye mr-2"></i>View</a></li>
												<li><a href="#"><i class="si si-settings mr-2"></i>More</a></li>
											</ul>
										</div>
									</div>
									<div class="card-body">
										<div id="graph5" class="chart-dropshadow chartwidget"></div>
									</div>
								</div>
							</div>
							<div class="col-xl-4 col-lg-4 col-md-12">
								<div class="card">
									<div class="card-header">
										<h3 class="card-title">Product Sales</h3>
										<div class="card-options">
											<a class="btn btn-white border btn-sm btn-icon mr-2" href="#"><i class="fas fa-chevron-left"></i></a>
											<a class="btn btn-white border btn-sm btn-icon" href="#"><i class="fas fa-chevron-right"></i></a>
										</div>
									</div>
									<div class="card-body">
										<h2 class="mb-1 num-font">$1,87,595</h2>
										<span class="text-muted">15% Higher Of Previous Month</span>
										<div class="row mt-5">
											<div class="col-sm-12">
												<div class="mb-0">
													<h4 class="mb-2 d-block">
														<span class="fs-16">Total Expences</span>
														<span class="float-right num-font">$1587</span>
													</h4>
													<div class="progress progress-md h-1 mb-1">
														<div class="progress-bar progress-bar-striped progress-bar-animated bg-primary w-30"></div>
													</div>
													<span>12% of your Goals</span>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="card">
									<div class="card-body">
										<div class="row mb-3">
											<div class="col">
												<h6 class="text-muted mb-0 mt-1">Total Net Profit</h6>
											</div>
											<div class="col col-auto">
												<a class="btn btn-sm btn-white border">View Details</a>
											</div>
										</div>
										<div class="row">
											<div class="col">
												<div class="dash-2">
													<h2 class="mb-2">$<span class="counter font-weight-extrabold num-font">99,425</span></h2>
													<span class="text-muted"><span class="font-weight-bold"><i class="fas fa-arrow-circle-down text-danger"></i> 13%</span>  Net Profit Incresed </span>
												</div>
											</div>
											<div class="col col-auto">
												<span class="sparkline_bar4"></span>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-xl-12">
								<div class="card">
									<div class="card-header">
										<h3 class="card-title">Invoice List</h3>
										<div class="card-options d-none d-sm-block">
											<div class="btn-group btn-sm">
												<button type="button" class="btn btn-light btn-sm">
													<span class="">Day</span>
												</button>
												<button type="button" class="btn btn-light btn-sm">
													<span class="">Month</span>
												</button>
												<button type="button" class="btn btn-light btn-sm">
													<span class="">Year</span>
												</button>
											</div>
										</div>
									</div>
									<div class="card-body">
										<div class="table-responsive border-top mb-0">
											<table class="table table-bordered table-hover mb-0 text-nowrap">
												<thead>
													<tr>
														<th>Invoice ID</th>
														<th>Category</th>
														<th>Purchase Date</th>
														<th>Price</th>
														<th>Due Date</th>
														<th>Action</th>
													</tr>
												</thead>
												<tbody>
													<tr>
														<td>#INV-<span class="num-font">348</span></td>
														<td>Resturant</td>
														<td class="num-font">07-12-2019</td>
														<td class="font-weight-semibold fs-16 num-font">$89</td>
														<td class="num-font">17-12-2019</td>
														<td>
															<a class="btn btn-primary btn-sm text-white mb-1" data-toggle="tooltip" data-original-title="View"><i class="fas fa-eye"></i></a>
															<a class="btn btn-secondary btn-sm text-white mb-1" data-toggle="tooltip" data-original-title="Delete"><i class="far fa-trash-alt"></i></a><br>
														</td>
													</tr>
													<tr>
														<td>#INV-<span class="num-font">186</span></td>
														<td>Rela Estate</td>
														<td class="num-font">02-12-2019</td>
														<td class="font-weight-semibold fs-16 num-font">$14,276</td>
														<td class="num-font">14-12-2019</td>
														<td>
															<a class="btn btn-primary btn-sm text-white mb-1" data-toggle="tooltip" data-original-title="View"><i class="fas fa-eye"></i></a>
															<a class="btn btn-secondary btn-sm text-white mb-1" data-toggle="tooltip" data-original-title="Delete"><i class="far fa-trash-alt"></i></a><br>
														</td>
													</tr>
													<tr>
														<td>#INV-<span class="num-font">831</span></td>
														<td>Jobs</td>
														<td class="num-font">30-11-2019</td>
														<td class="font-weight-semibold fs-16 num-font">$25,000</td>
														<td class="num-font">04-12-2019</td>
														<td>
															<a class="btn btn-primary btn-sm text-white mb-1" data-toggle="tooltip" data-original-title="View"><i class="fas fa-eye"></i></a>
															<a class="btn btn-secondary btn-sm text-white mb-1" data-toggle="tooltip" data-original-title="Delete"><i class="far fa-trash-alt"></i></a><br>
														</td>
													</tr>
													<tr>
														<td>#INV-<span class="num-font">672</span></td>
														<td>Education</td>
														<td class="num-font">25-18-2019</td>
														<td class="font-weight-semibold fs-16 num-font">$50.00</td>
														<td class="num-font">07-12-2019</td>
														<td>
															<a class="btn btn-primary btn-sm text-white mb-1" data-toggle="tooltip" data-original-title="View"><i class="fas fa-eye"></i></a>
															<a class="btn btn-secondary btn-sm text-white mb-1" data-toggle="tooltip" data-original-title="Delete"><i class="far fa-trash-alt"></i></a><br>
														</td>
													</tr>
													<tr>
														<td>#INV-<span class="num-font">428</span></td>
														<td>Electornics</td>
														<td class="num-font">24-11-2019</td>
														<td class="font-weight-semibold fs-16 num-font">$99.99</td>
														<td class="num-font">11-12-2019</td>
														<td>
															<a class="btn btn-primary btn-sm text-white mb-1" data-toggle="tooltip" data-original-title="View"><i class="fas fa-eye"></i></a>
															<a class="btn btn-secondary btn-sm text-white mb-1" data-toggle="tooltip" data-original-title="Delete"><i class="far fa-trash-alt"></i></a><br>
														</td>
													</tr>
													<tr>
														<td>#INV-<span class="num-font">543</span></td>
														<td>Vechicle</td>
														<td class="num-font">22-11-2019</td>
														<td class="font-weight-semibold fs-16 num-font">$145</td>
														<td class="num-font">12-12-2019</td>
														<td>
															<a class="btn btn-primary btn-sm text-white mb-1" data-toggle="tooltip" data-original-title="View"><i class="fas fa-eye"></i></a>
															<a class="btn btn-secondary btn-sm text-white mb-1" data-toggle="tooltip" data-original-title="Delete"><i class="far fa-trash-alt"></i></a><br>
														</td>
													</tr>
													<tr>
														<td>#INV-<span class="num-font">986</span></td>
														<td>Pet &amp; Animals</td>
														<td class="num-font">18-11-2019</td>
														<td class="font-weight-semibold fs-16 num-font">$378</td>
														<td class="num-font">07-12-2019</td>
														<td>
															<a class="btn btn-primary btn-sm text-white mb-1" data-toggle="tooltip" data-original-title="View"><i class="fas fa-eye"></i></a>
															<a class="btn btn-secondary btn-sm text-white mb-1" data-toggle="tooltip" data-original-title="Delete"><i class="far fa-trash-alt"></i></a><br>
														</td>
													</tr>
												</tbody>
											</table>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>

					<!--Sidebar-right-->
					<div class="sidebar sidebar-right sidebar-animate">
						<div class="p-2 mb-4">
							<a href="#" class="text-right float-right" data-toggle="sidebar-right" data-target=".sidebar-right"><i class="fe fe-x"></i></a>
						</div>
						<div class="panel panel-primary">
							<div class="tab-menu-heading border-0">
								<div class="tabs-menu ">
									<!-- Tabs -->
									<ul class="nav panel-tabs">
										<li class=""><a href="#side1" class="active" data-toggle="tab"><i class="fas fa-bell"></i> Notifications</a></li>
										<li><a href="#side2" data-toggle="tab"><i class="fas fa-comments"></i> Chat</a></li>
										<li><a href="#side3" data-toggle="tab"><i class="fas fa-user-friends"></i> Friends</a></li>
									</ul>
								</div>
							</div>
							<div class="panel-body tabs-menu-body p-0 border-0">
								<div class="tab-content">
									<div class="tab-pane active " id="side1">
										<div class="list-group list-group-flush ">
											<div class="list-group-item d-flex  align-items-center">
												<div class="mr-3">
													<span class="avatar avatar-lg brround cover-image" data-image-src="../assets/images/users/5.jpg"><span class="avatar-status bg-green"></span></span>
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
													<span class="avatar avatar-lg brround cover-image" data-image-src="../assets/images/users/4.jpg"></span>
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
													<span class="avatar avatar-lg brround cover-image" data-image-src="../assets/images/users/3.jpg"><span class="avatar-status bg-green"></span></span>
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
													<span class="avatar avatar-lg brround cover-image" data-image-src="../assets/images/users/2.jpg"><span class="avatar-status bg-green"></span></span>
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
													<span class="avatar avatar-lg brround cover-image" data-image-src="../assets/images/users/1.jpg"></span>
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
													<span class="avatar avatar-lg brround cover-image" data-image-src="../assets/images/users/9.jpg"><span class="avatar-status bg-green"></span></span>
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
													<input class="form-control header-search" type="search" placeholder="Search..." aria-label="Search">
												</div>
											</form>
											<div class="list-group-item d-flex  align-items-center">
												<div class="mr-2">
													<span class="avatar avatar-md brround cover-image" data-image-src="../assets/images/users/2.jpg"><span class="avatar-status bg-green"></span></span>
												</div>
												<div class="">
													<div class="font-weight-semibold">Mozelle Belt</div>
												</div>
												<div class="ml-auto">
													<a href="#" class="btn btn-sm btn-light"><i class="fab fa-facebook-messenger"></i></a>
												</div>
											</div>
											<div class="list-group-item d-flex  align-items-center">
												<div class="mr-2">
													<span class="avatar avatar-md brround cover-image" data-image-src="../assets/images/users/1.jpg"></span>
												</div>
												<div class="">
													<div class="font-weight-semibold">Florinda Carasco</div>
												</div>
												<div class="ml-auto">
													<a href="#" class="btn btn-sm btn-light"><i class="fab fa-facebook-messenger"></i></a>
												</div>
											</div>
											<div class="list-group-item d-flex  align-items-center">
												<div class="mr-2">
													<span class="avatar avatar-md brround cover-image" data-image-src="../assets/images/users/9.jpg"><span class="avatar-status bg-green"></span></span>
												</div>
												<div class="">
													<div class="font-weight-semibold">Alina Bernier</div>
												</div>
												<div class="ml-auto">
													<a href="#" class="btn btn-sm btn-light"><i class="fab fa-facebook-messenger"></i></a>
												</div>
											</div>
											<div class="list-group-item d-flex  align-items-center">
												<div class="mr-2">
													<span class="avatar avatar-md brround cover-image" data-image-src="../assets/images/users/3.jpg"><span class="avatar-status bg-green"></span></span>
												</div>
												<div class="">
													<div class="font-weight-semibold">Zula Mclaughin</div>
												</div>
												<div class="ml-auto">
													<a href="#" class="btn btn-sm btn-light"><i class="fab fa-facebook-messenger"></i></a>
												</div>
											</div>
											<div class="list-group-item d-flex  align-items-center">
												<div class="mr-2">
													<span class="avatar avatar-md brround cover-image" data-image-src="../assets/images/users/4.jpg"></span>
												</div>
												<div class="">
													<div class="font-weight-semibold">Isidro Heide</div>
												</div>
												<div class="ml-auto">
													<a href="#" class="btn btn-sm btn-light"><i class="fab fa-facebook-messenger"></i></a>
												</div>
											</div>
											<div class="list-group-item d-flex  align-items-center">
												<div class="mr-2">
													<span class="avatar avatar-md brround cover-image" data-image-src="../assets/images/users/5.jpg"><span class="avatar-status bg-green"></span></span>
												</div>
												<div class="">
													<div class="font-weight-semibold">Mozelle Belt</div>
												</div>
												<div class="ml-auto">
													<a href="#" class="btn btn-sm btn-light"><i class="fab fa-facebook-messenger"></i></a>
												</div>
											</div>
											<div class="list-group-item d-flex  align-items-center">
												<div class="mr-2">
													<span class="avatar avatar-md brround cover-image" data-image-src="../assets/images/users/6.jpg"></span>
												</div>
												<div class="">
													<div class="font-weight-semibold">Florinda Carasco</div>
												</div>
												<div class="ml-auto">
													<a href="#" class="btn btn-sm btn-light"><i class="fab fa-facebook-messenger"></i></a>
												</div>
											</div>
											<div class="list-group-item d-flex  align-items-center">
												<div class="mr-2">
													<span class="avatar avatar-md brround cover-image" data-image-src="../assets/images/users/8.jpg"></span>
												</div>
												<div class="">
													<div class="font-weight-semibold">Alina Bernier</div>
												</div>
												<div class="ml-auto">
													<a href="#" class="btn btn-sm btn-light"><i class="fab fa-facebook-messenger"></i></a>
												</div>
											</div>
											<div class="list-group-item d-flex  align-items-center">
												<div class="mr-2">
													<span class="avatar avatar-md brround cover-image" data-image-src="../assets/images/users/7.jpg"></span>
												</div>
												<div class="">
													<div class="font-weight-semibold">Isidro Heide</div>
												</div>
												<div class="ml-auto">
													<a href="#" class="btn btn-sm btn-light"><i class="fab fa-facebook-messenger"></i></a>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!--/Sidebar-right-->

					<!--footer-->
					<footer class="footer">
						<div class="container">
							<div class="row align-items-center flex-row-reverse">
								<div class="col-md-12 col-sm-12 text-center">
									Copyright © 2019 <a href="#">Spaner</a>. Designed by <a href="https://spruko.com/">Spruko Technologies Pvt.Ltd</a> All rights reserved.
								</div>
							</div>
						</div>
					</footer>
					<!-- End Footer-->

				</div>
			</div>
		</div>

		<!-- Back to top -->
		<a href="#top" id="back-to-top"><i class="fas fa-angle-up "></i></a>
