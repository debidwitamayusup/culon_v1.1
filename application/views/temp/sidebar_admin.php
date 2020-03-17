<!-- Sidebar menu-->
<div class="app-sidebar__overlay" data-toggle="sidebar"></div>
<aside class="app-sidebar">
    <div class="side-tab-body p-0 border-0" id="sidemenu-Tab">
        <div class="first-sidemenu">
            <ul class="resp-tabs-list hor_1">
                <li data-toggle="tooltip" data-placement="right" title="Administration">
                    <div class="side-menutext"><img src="<?=base_url()?>assets/images/brand/icon-admin3.png" style="padding:8px" class="side-menu__icon">
                        <h6 class="font8 mt-1 text-white">Administration</h6><span class="side-menu__label">Administration</span>
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
                <div id=parent_menu>
                    <div class="row">
                        <div class="col-md-12">
                            <h5 class="font-weight-extrabold"><img src="<?=base_url()?>assets/images/brand/icon-admin3.png" class="side-menu__icon-custom mr-1" style="padding:8px !important">Administration</h5>
                            <hr class="alert-dark-grey mb-1">
                            <a class="slide-item" href="<?=base_url()?>admin/admin_user">User</a>
                            <a class="slide-item" hidden href="<?=base_url()?>admin/edit_user">User</a>
                            <a class="slide-item" hidden href="<?=base_url()?>admin/add_user">User</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</aside>
<!--sidemenu end-->