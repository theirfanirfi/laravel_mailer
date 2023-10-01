<header class="header black-bg">
    <div class="sidebar-toggle-box">
        <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
    </div>
    <!--logo start-->
    <a href="{{ URL::to('/bitH-dashboard') }}" class="logo"><b>XtraMailer</b></a>
    <!--logo end-->
    <div class="nav notify-row" id="top_menu">
        <!--  notification start -->
        <ul class="nav top-menu">
            <!-- settings start -->

            <!-- inbox dropdown end -->
        </ul>
        <!--  notification end -->
    </div>
    <div class="top-menu">
        <ul class="nav pull-right top-menu">
            <li><a class="logoutimg" href="{{ URL::to('/bitH-logout') }}"><img src="../images/user-thumbnail.png.gif"> </a></li>

        </ul>
        <ul class="nav pull-right top-menu">

            <li>
                <span class="countspan"></span>
                <a class="logoutimg" ><img src="../images/icon-ios7-bell-512.png"> </a></li>
               </ul>
    </div>
</header>