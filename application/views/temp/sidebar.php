<!-- Sidebar menu-->
<div class="app-sidebar__overlay" data-toggle="sidebar"></div>
<aside class="app-sidebar">
	<ul class="side-menu">
		<li class="slide">
			<a class="side-menu__item" data-toggle="slide" href="#">
				<i class="side-menu__icon si si-chart icon-resize"></i>
				<span class="side-menu__label label-icon-resize">Wallboard</span>
				<i class="angle fas fa-angle-right"></i>
			</a>
			<ul class="slide-menu">
				<!-- <li><a class="slide-item" href="<?=base_url()?>main/average">ART / AHT / AST</a></li>
				<li><a class="slide-item" href="<?=base_url()?>main/average_duration">Average Duration</a></li> -->
				<li><a class="slide-item" href="<?=base_url()?>main/monitoring_status">Monitoring Ticket Status</a></li>
				<li><a class="slide-item" href="<?=base_url()?>main/summary_ticket_time">Summary Ticket by Time</a></li>
			</ul>
		</li>
		<li class="slide">
			<a class="side-menu__item" data-toggle="slide" href="#" aria-expanded="true">
				<i class="side-menu__icon si si-user icon-resize"></i>
				<span class="side-menu__label label-icon-resize">Dashboard</span>
				<i class="angle fas fa-angle-right"></i>
			</a>
			<ul class="slide-menu">
				<li><a class="slide-item" href="<?= base_url()?>main">Summary Traffic Channel</a></li>
				<li class="slide submenu" id="accordion">
					<a href="#collapseOne" class="slide-item" data-toggle="collapse" aria-expanded="true"
						aria-controls="collapseOne"> Traffic Interval
						<i class="angle not-absolute2 fas fa-angle-right"></i>
					</a>
					<div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordion"
						style="">
						<div class="slide-item ml-2" id="submenu"><a href="<?=base_url()?>main/this_day">Daily</a></div>
						<div class="slide-item ml-2"><a href="<?=base_url()?>main/this_month">Monthly</a></div>
						<div class="slide-item ml-2"><a href="<?=base_url()?>main/this_year">Yearly</a></div>
					</div>
				</li>
				<li><a class="slide-item" href="<?= base_url()?>main/agent_performance">Agent Performance</a></li>
				<li class="slide submenu" id="accordion">
					<a href="#collapseKIP" class="slide-item" data-toggle="collapse" aria-expanded="true"
						aria-controls="collapseKIP"> Operation Performance
						<i class="angle not-absolute fas fa-angle-right"></i></a>
					<div id="collapseKIP" class="collapse" aria-labelledby="headingOne" data-parent="#accordion"
						style="">
						<div class="slide-item ml-2"><a href="<?=base_url()?>main/kip">KIP</a></div>
						<div class="slide-item ml-2"><a href="<?=base_url()?>main/traffic_category">Traffic Category</a>
						</div>
						<div class="slide-item ml-2"><a href="<?=base_url()?>main/nfcr">FCR / N-FCR</a></div>
						</div>
					</div>
				</li>
				<li><a class="slide-item" href="<?=base_url()?>main/summary_ticket">Summary Ticket / Unit</a></li>
				<li><a class="slide-item" href="<?=base_url()?>main/summary_ticket_category">Summary Status Ticket / Kategori</a></li>
			</ul>
		</li>
		<li class="slide">
			<a class="side-menu__item" data-toggle="slide" href="#">
				<i class="side-menu__icon si si-briefcase icon-resize"></i>
				<span class="side-menu__label label-icon-resize">Report</span>
				<i class="angle fas fa-angle-right"></i>
			</a>
			<ul class="slide-menu">
				<li><a class="slide-item" href="index.html">Summary Traffic</a></li>
				<li><a class="slide-item" href="index2.html">Traffic Interval</a></li>
				<li><a class="slide-item" href="index3.html">Average Time</a></li>
				<li><a class="slide-item" href="index4.html">Case In / Out</a></li>
			</ul>
		</li>
	</ul>
</aside>