<!-- Sidebar menu-->
<div class="app-sidebar__overlay" data-toggle="sidebar"></div>
<aside class="app-sidebar">
	<div class="side-tab-body p-0 border-0" id="sidemenu-Tab">
		<div class="first-sidemenu">
			<ul class="resp-tabs-list hor_1">
				<li data-toggle="tooltip" data-placement="right" id="wallboard" title="Wallboard"
					class="resp-tab-active">
					<div class="side-menutext"><i class="side-menu__icon fe fe-monitor"></i>
						<h6 class="font10 mt-1 text-white">Wallboard</h6><span class="side-menu__label">Wallboard</span>
					</div>
				</li>
				<li data-toggle="tooltip" data-placement="right" id="dashboard" title="Dashboard">
					<div class="side-menutext"><i class="side-menu__icon fe fe-grid"></i>
						<h6 class="font10 mt-1 text-white">Dashboard</h6><span class="side-menu__label">Dashboard</span>
					</div>
				</li>

				<li data-toggle="tooltip" data-placement="right" title="Report">
					<div class="side-menutext"><i class="side-menu__icon si si-layers" style="line-height:2.4"></i>
						<h6 class="font10 mt-1 text-white">Report</h6><span class="side-menu__label">Report</span>
					</div>
				</li>
			</ul>
		</div>
		<div class="second-sidemenu">
			<div class="d-flex bd-highlight">
				<div class="ml-auto bd-highlight">
					<a aria-label="Hide Sidebar" class="app-sidebar__toggle float-right" data-toggle="sidebar"
						href="#"></a>
				</div>
			</div>
			<div class="resp-tabs-container hor_1">
				<div class="resp-tab-content-active">
					<div class="row">
						<div class="col-md-12">
							<!-- <h5 class="mt-3 mb-4"><i class="side-menu__icon-custom fe fe-grid mr-1"></i>Wallboard</h5> -->
							<a class="slide-item" href="<?=base_url()?>main/wall_monitoring_realtime">Monitoring
								Realtime</a>
							<a class="slide-item" href="<?=base_url()?>main/wall_summary_performance"> Summary
								Performance Realtime</a>
							<a class="slide-item" href="<?=base_url()?>main/wall_agent_monitoring">Agent Monitoring</a>
							<a class="slide-item" href="<?=base_url()?>main/wall_summary_traffic">Summary Traffic
								Today</a>
							<a class="slide-item" href="<?=base_url()?>main/wall_performance_operation"> Summary
								Performance Operation</a>

							<div class="side-menu p-0">
								<div class="slide submenu">
									<a class="side-menu__item" data-toggle="slide" href="#"><span
											class="side-menu__label"> Traffic Interval</span><i
											class="angle fa fa-angle-down"></i></a>
									<ul class="slide-menu submenu-list">
										<li>
											<a href="<?=base_url()?>main/wall_sumTraffic_day" class="slide-item">Traffic
												by Today</a>
										</li>
										<li>
											<a href="<?=base_url()?>main/wall_sumTraffic_week"
												class="slide-item">Traffic by This Week</a>
										</li>
										<li>
											<a href="<?=base_url()?>main/wall_sumTraffic_month"
												class="slide-item">Traffic by This Month</a>
										</li>
									</ul>
								</div>
								<div class="slide submenu">
									<a class="side-menu__item" data-toggle="slide" href="#"><span
											class="side-menu__label"> Ticket</span><i
											class="angle fa fa-angle-down"></i></a>
									<ul class="slide-menu submenu-list">
										<li>
											<a href="<?=base_url()?>main/wall_status_nonClose"
												class="slide-item">Summary Status Today (Non Close)</a>
										</li>
										<li>
											<a href="<?=base_url()?>main/wall_ticket_Close" class="slide-item">Summary
												Ticket (Close)</a>
										</li>

									</ul>
								</div>
							</div>


						</div>
					</div>
				</div>
				<div>
					<div class="row">
						<div class="col-md-12">
							<!-- <h5 class="mt-3 mb-4"><i class="side-menu__icon-custom fe fe-home mr-1"></i></i>Dashboard
							</h5> -->
							<a href="<?=base_url()?>main/home" class="slide-item" id="dashboard">Traffic by Channel</a>
							<a href="<?=base_url()?>main/summary_traffic" class="slide-item">Summary Traffic</a>
							<a href="<?=base_url()?>main/summary_performance_realtime" class="slide-item">Summary
								Performance Realtime</a>
							<div class="side-menu p-0">
								<div class="slide submenu">
									<a class="side-menu__item" data-toggle="slide" href="#"><span
											class="side-menu__label">Traffic Interval</span><i
											class="angle fa fa-angle-down"></i></a>
									<ul class="slide-menu submenu-list">
										<li>
											<a href="<?=base_url()?>main/this_day" class="slide-item">Traffic Interval
												Daily</a>
										</li>
										<li>
											<a href="<?=base_url()?>main/this_month" class="slide-item">Traffic Interval
												Monthly</a>
										</li>
										<li>
											<a href="<?=base_url()?>main/this_year" class="slide-item">Traffic Interval
												Yearly</a>
										</li>
									</ul>
								</div>
							</div>
							<div class="side-menu p-0">
								<div class="slide submenu">
									<a class="side-menu__item" data-toggle="slide" href="#"><span
											class="side-menu__label">Operation Performance</span><i
											class="angle fa fa-angle-down"></i></a>
									<ul class="slide-menu submenu-list">
										<li>
											<a href="<?=base_url()?>main/kip" class="slide-item">KIP</a>
										</li>
										<li>
											<a href="<?=base_url()?>main/performance_channel"
												class="slide-item">Performance by Channel</a>
										</li>
										<li>
											<a href="<?=base_url()?>main/agent_performance" class="slide-item">Agent
												Performance</a>
										</li>
									</ul>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div>
					<div class="row">
						<div class="col-md-12">
							<!-- <h5 class="mt-3 mb-4"><i class="side-menu__icon-custom fe fe-book mr-1"></i>Report</h5> -->
							<a href="<?=base_url()?>main/report_agent_log" class="slide-item">Agent Log</a>
							<a href="<?=base_url()?>main/report_agent_performance" class="slide-item">Agent
								Performance</a>
							<a href="<?=base_url()?>main/report_operation_performance" class="slide-item">Operation
								Performance</a>
							<a href="<?=base_url()?>main/report_summary_traffic" class="slide-item">Summary Traffic</a>
							<a href="<?=base_url()?>main/report_summary_channel" class="slide-item">Summary Channel</a>
							<a href="<?=base_url()?>main/report_summary_interval" class="slide-item">Summary
								Interval</a>
							<a href="<?=base_url()?>main/report_summary_interval_month" class="slide-item">Summary
								Interval by Month</a>
							<a href="<?=base_url()?>main/report_summary_kip" class="slide-item">Summary KIP</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</aside>
<!--sidemenu end-->