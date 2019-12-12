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
				<li><a class="slide-item" href="index.html">Summary Traffic</a></li>
				<li><a class="slide-item" href="index2.html">Traffic Interval</a></li>
				<li><a class="slide-item" href="index3.html">Average Time</a></li>
				<li><a class="slide-item" href="index4.html">Case In / Out</a></li>
			</ul>
		</li>
		<li class="slide">
			<a class="side-menu__item" data-toggle="slide" href="#">
				<i class="side-menu__icon si si-home icon-resize"></i>
				<span class="side-menu__label label-icon-resize">Dashboard</span>
				<i class="angle fas fa-angle-right"></i>
			</a>
			<ul class="slide-menu">
				<li><a class="slide-item" href="<?= base_url()?>main">Summary Traffic by Channel</a></li>
				<li class="slide submenu" id="accordion">
					<a href="#collapseOne" class="slide-item" data-toggle="collapse" aria-expanded="true"
						aria-controls="collapseOne"> Traffic Interval </a>
					<div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordion"
						style="">
						<div class="slide-item ml-3"><a href="<?=base_url()?>main/this_day">Daily</a></div>
						<div class="slide-item ml-3"><a href="<?=base_url()?>main/this_month">Monthly</a></div>
						<div class="slide-item ml-3"><a href="<?=base_url()?>main/this_year">Yearly</a></div>
					</div>
				</li>
				<li><a class="slide-item" href="<?= base_url()?>main/average">ART / AHT / AST</a></li>
				<li class="slide submenu" id="accordion">
					<a href="#collapseKIP" class="slide-item" data-toggle="collapse" aria-expanded="true"
						aria-controls="collapseKIP"> Operation Performance </a>
					<div id="collapseKIP" class="collapse" aria-labelledby="headingOne" data-parent="#accordion"
						style="">
						<div class="slide-item ml-3"><a href="<?=base_url()?>main/kip">KIP</a></div>
						<div class="slide-item ml-3"><a href="<?=base_url()?>main/traffic_category">Traffic Category</a></div>
						
					</div>
				</li>
			</ul>
		</li>
		<li class="slide">
			<a class="side-menu__item" data-toggle="slide" href="#">
				<i class="side-menu__icon si si-user icon-resize"></i>
				<span class="side-menu__label label-icon-resize">Agent Performance</span>
				<i class="angle fas fa-angle-right"></i>
			</a>
			<ul class="slide-menu">
				<li><a class="slide-item" href="<?=base_url()?>main/agent_performance">Total Handling Call</a></li>
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
<!--side-menu-->