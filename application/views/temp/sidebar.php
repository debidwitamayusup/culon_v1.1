Sidebar menu-->
<div class="app sidebar-mini" data-toggle="sidebar"></div>
<aside class="app-sidebar">
	<ul class="side-menu">
		<li class="slide">
			<a class="side-menu__item" data-toggle="slide" href="#">
				<i class="side-menu__icon fe fe-grid icon-resize"></i>
				<span class="side-menu__label label-icon-resize">Wallboard</span>
				<i class="angle fas fa-angle-right"></i>
			</a>
			<ul class="slide-menu">
				<!-- <li><a class="slide-item" href="<?=base_url()?>main/average">ART / AHT / AST</a></li>
				<li><a class="slide-item" href="<?=base_url()?>main/average_duration">Average Duration</a></li> -->
				<!-- <li><a class="slide-item" href="<?=base_url()?>main/wall_summary_traffic">Summary Channel</li> -->
				<!-- <li><a class="slide-item" href="<?=base_url()?>main/monitoring_status">Monitoring Ticket Status</a></li>
				<li><a class="slide-item" href="<?=base_url()?>main/monitoring_ticket_time">Monitoring Ticket by
						Time</a></li>
				<li><a class="slide-item" href="<?=base_url()?>main/summary_inout_sla">Summary in / out SLA</a></li> -->
				<li><a class="slide-item" href="<?=base_url()?>main/wall_summary_traffic">Summary Traffic</a></li>
				<li><a class="slide-item" href="<?=base_url()?>main/wall_sumTraffic_day">Traffic by Today</a></li>
				<li><a class="slide-item" href="<?=base_url()?>main/wall_sumTraffic_week">Traffic by Week</a></li>
				<li><a class="slide-item" href="<?=base_url()?>main/wall_sumTraffic_month">Traffic by Month</a></li>
				<hr>
				<li><a class="slide-item" href="<?=base_url()?>main/wall_status_nonClose">Summary Status Today (Non Close)</a></li>
				<li><a class="slide-item" href="<?=base_url()?>main/wall_ticket_Close">Summary Ticket (Close)</a></li>
				<hr>
				<li><a class="slide-item" href="<?=base_url()?>main/wall_performance_operation">Summary Performance Operation</a></li>
				<!-- <li><a class="slide-item" href="<?=base_url()?>main/wall_ticket_Close">Summary Ticket (Close)</a></li> -->
			</ul>
		</li>
		<li class="slide">
			<a class="side-menu__item" data-toggle="slide" href="#" aria-expanded="true">
				<i class="side-menu__icon fe fe-home icon-resize"></i>
				<span class="side-menu__label label-icon-resize">Dashboard</span>
				<i class="angle fas fa-angle-right"></i>
			</a>
			
			<ul class="slide-menu" id="accordion">
				<li><a class="slide-item" href="<?= base_url()?>main/home">Traffic by Channel</a></li>
				<hr>
				<!-- <div class="sidebar-heading">Traffic Interval</div> -->
				<li><a class="slide-item" href="<?=base_url()?>main/this_day">Traffic Interval Daily</a></li>
				<li><a class="slide-item" href="<?=base_url()?>main/this_month">Traffic Interval Monthly</a></li>
				<li><a class="slide-item" href="<?=base_url()?>main/this_year">Traffic Interval Yearly</a></li>
				<hr>
				<!-- sub menu accordion -->
				<!-- <li class="slide">
					<a href="#collapseOne" class="slide-item" data-toggle="collapse" aria-expanded="true"
						aria-controls="collapseOne"> Traffic Interval
						<i class="angle not-absolute2 fas fa-angle-right"></i>
					</a>
					<div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordion"
						style="" id="ul-menu">
						<div class="slide-item ml-2"><a href="<?=base_url()?>main/this_day">Daily</a></div>
						<div class="slide-item ml-2"><a href="<?=base_url()?>main/this_month">Monthly</a></div>
						<div class="slide-item ml-2"><a href="<?=base_url()?>main/this_year">Yearly</a></div>
					</div>
				</li> -->
				<!-- <li><a class="slide-item" href="<?= base_url()?>main/agent_performance">Agent Performance</a></li> -->
				<!-- <li class="slide submenu" id="accordion">
					<a href="#collapseAgent" class="slide-item" data-toggle="collapse" aria-expanded="true"
						aria-controls="collapseAgent"> Agent Performance
						<i class="angle not-absolute2 fas fa-angle-right"></i></a>
					<div id="collapseAgent" class="collapse" aria-labelledby="headingOne" data-parent="#accordion"
						style="">
						<div class="slide-item ml-2"><a href="<?=base_url()?>main/traffic_performance">Traffic
								Performance</a></div>
						<div class="slide-item ml-2"><a href="<?=base_url()?>main/summary_agent">Summary Agent
								Performance</a></div>
					</div>
					</div>
				</li> -->
				<!-- <li class="slide">
					<a href="#collapsePerformance" class="slide-item" data-toggle="collapse" aria-expanded="true"
						aria-controls="collapsePerformance"> Operation Performance
						<i class="angle not-absolute fas fa-angle-right"></i></a>
					<div id="collapsePerformance" class="collapse" aria-labelledby="headingOne" data-parent="#accordion"
						style="" id="ul-menu">
						<div class="slide-item ml-2"><a href="<?=base_url()?>main/kip">KIP</a></div> -->
						<!-- <div class="slide-item ml-2"><a href="<?=base_url()?>main/traffic_category">Traffic Category</a>
						</div>
						<div class="slide-item ml-2"><a href="<?=base_url()?>main/nfcr">FCR / N-FCR</a></div> -->
						<!-- <div class="slide-item ml-2"><a href="<?=base_url()?>main/performance_channel">Performance by Channel</a></div>
						<div class="slide-item ml-2"><a href="<?=base_url()?>main/agent_performance">Agent Performance</a></div>
					</div>
					</div>
				</li> -->
				<li><a class="slide-item" href="<?=base_url()?>main/kip">KIP</a></li>
				<li><a class="slide-item" href="<?=base_url()?>main/performance_channel">Performance by Channel</a></li>
				<li><a class="slide-item" href="<?=base_url()?>main/agent_performance">Agent Performance</a></li>
				<!-- <hr>
				<li><a class="slide-item" href="<?=base_url()?>main/report_detail_cwc">CWC</a></li> -->
				<!-- <li class="slide submenu">
					<a href="#collapseTicket" class="slide-item" data-toggle="collapse" aria-expanded="true"
						aria-controls="collapseTicket"> Ticketing
						<i class="angle not-absolute fas fa-angle-right" style="margin-left:104px"></i></a>
					<div id="collapseTicket" class="collapse" aria-labelledby="headingOne" data-parent="#accordion"
						style="">
						<div class="slide-item ml-2"><a href="<?=base_url()?>main/summary_ticket">Ticketing by Unit</a></div>
						<div class="slide-item ml-2"><a href="<?=base_url()?>main/summary_ticket_category">Summary
								Status Ticket / Kategori</a></div>
						<div class="slide-item ml-2"><a href="<?=base_url()?>main/summary_ticket_time">Ticketing by Time</a></div>
					</div>
					</div>
				</li> -->
			</ul>
		</li>
		<li class="slide">
			<a class="side-menu__item" data-toggle="slide" href="#">
				<i class="side-menu__icon fe fe-book icon-resize"></i>
				<span class="side-menu__label label-icon-resize">Report</span>
				<i class="angle fas fa-angle-right"></i>
			</a>
			<ul class="slide-menu">
				<li><a class="slide-item" href="<?=base_url()?>main/report_summary_channel">Summary Channel</a></li>
				<li><a class="slide-item" href="<?=base_url()?>main/report_summary_ticket">Summary Ticket</a></li>
				<li><a class="slide-item" href="<?=base_url()?>main/report_summary_interval">Summary Interval</a></li>
				<li><a class="slide-item" href="<?=base_url()?>main/report_agent_log">Agent Log</a></li>
				<li><a class="slide-item" href="<?=base_url()?>main/report_agent_performance">Agent Performance</a></li>
				<li><a class="slide-item" href="#">Agent Summary</a></li>
				<li><a class="slide-item" href="#">Detail Ticket</a></li>
				<li class="slide"><a class="slide-item" href="#">Detail CWC</a></li>
			</ul>
		</li>
	</ul>
</aside>
<body class="app sidebar-mini sidenav-toggled">
<!-- <body class="sidenav-toggled"> -->