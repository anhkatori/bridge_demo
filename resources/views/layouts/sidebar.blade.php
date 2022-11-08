<div class="main-menu menu-fixed menu-dark menu-accordion menu-shadow" data-scroll-to-active="true">
    <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
            <li class=" navigation-header">
                <span>General</span><i class=" ft-minus" data-toggle="tooltip" data-placement="right"
                                       data-original-title="General"></i>
            </li>
            <li class=" nav-item {{ Request::is('backend') ? 'active' : '' }}">
                <a href="/backend/dashboard" class="">
                    <i class="ft-home"></i><span class="menu-title" data-i18n="">Dashboard</span>
                </a>
            </li>
        </ul>
    </div>
</div>
