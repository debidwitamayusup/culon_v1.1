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
				<li><a class="slide-item" href="<?=base_url()?>main/wall_summary_traffic">Summary Traffic</a></li>
				<li><a class="slide-item" href="<?=base_url()?>main/wall_sumTraffic_day">Traffic by Today</a></li>
				<li><a class="slide-item" href="<?=base_url()?>main/wall_sumTraffic_week">Traffic by Week</a></li>
				<li><a class="slide-item" href="<?=base_url()?>main/wall_sumTraffic_month">Traffic by Month</a></li>
				<hr>
				<li><a class="slide-item" href="<?=base_url()?>main/wall_status_nonClose">Summary Status Today (Non
						Close)</a></li>
				<li><a class="slide-item" href="<?=base_url()?>main/wall_ticket_Close">Summary Ticket (Close)</a></li>
				<hr>
				<li><a class="slide-item" href="<?=base_url()?>main/wall_performance_operation">Summary Performance
						Operation</a></li>

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
				<li><a class="slide-item" href="<?=base_url()?>main/summary_traffic">Summary Traffic</a></li>
				<hr>
				<li><a class="slide-item" href="<?=base_url()?>main/this_day">Traffic Interval Daily</a></li>
				<li><a class="slide-item" href="<?=base_url()?>main/this_month">Traffic Interval Monthly</a></li>
				<li><a class="slide-item" href="<?=base_url()?>main/this_year">Traffic Interval Yearly</a></li>
				<hr>

				<li><a class="slide-item" href="<?=base_url()?>main/kip">KIP</a></li>
				<li><a class="slide-item" href="<?=base_url()?>main/performance_channel">Performance by Channel</a></li>
				<li><a class="slide-item" href="<?=base_url()?>main/agent_performance">Agent Performance</a></li>

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
				<li><a class="slide-item" href="<?=base_url()?>main/report_summary_close_ticket">Summary Close
						Ticket</a></li>
				<li><a class="slide-item" href="<?=base_url()?>main/report_detail_ticket">Detail Ticket</a></li>
				<li><a class="slide-item" href="<?=base_url()?>main/report_summary_interval">Summary Interval</a></li>
				<li><a class="slide-item" href="<?=base_url()?>main/report_agent_log">Agent Log</a></li>
				<li><a class="slide-item" href="<?=base_url()?>main/report_agent_performance">Agent Performance</a></li>
				<li><a class="slide-item" href="<?=base_url()?>main/report_agent_summary">Agent Summary</a></li>
				<li><a class="slide-item" href="<?=base_url()?>main/report_performance_agent">Summary Performance
						Agent</a></li>
				<li><a class="slide-item" href="<?=base_url()?>main/report_performance_operation">Summary Performance
						Operation</a></li>
			</ul>
		</li>
	</ul>
</aside>

<body class="app sidebar-mini sidenav-toggled">
	<!-- <body class="sidenav-toggled"> -->