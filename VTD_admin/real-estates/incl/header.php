
<a href="index.html" class="logo"><img class="img-fluid able-logo" src="<?=$s->asset(null,"public/assets/images/logo.png")?>" alt="Theme-logo"> </a>
<nav class="navbar navbar-static-top">
    <!-- Sidebar toggle button-->
    <a href="#!" data-toggle="offcanvas" class="sidebar-toggle"></a>
    <!-- Navbar Right Menu-->
    <div class="navbar-custom-menu">
        <ul class="top-nav">
            <!--Notification Menu-->
            <li class="dropdown pc-rheader-submenu message-notification search-toggle">
                <a href="#!" id="morphsearch-search" class="drop icon-circle txt-white"> <i class="icofont icofont-search-alt-1"></i> </a>
            </li>
            <li class="dropdown notification-menu">
                <a href="#!" data-toggle="dropdown" aria-expanded="false" class="dropdown-toggle"> <i class="icon-bell"></i> <span class="badge badge-danger header-badge">9</span> </a>
                <ul class="dropdown-menu">
                    <li class="not-head">You have <b class="text-primary">4</b> new notifications.</li>
                    <li class="bell-notification">
                        <a href="javascript:;" class="media"> <span class="media-left media-icon">
                <img class="img-circle" src="<?=$s->asset(null,"public/assets/images/avatar-1.png")?>" alt="User Image">
              </span>
                            <div class="media-body"><span class="block">Lisa sent you a mail</span><span class="text-muted block-time">2min ago</span> </div>
                        </a>
                    </li>
                    <li class="bell-notification">
                        <a href="javascript:;" class="media"> <span class="media-left media-icon">
                <img class="img-circle" src="<?=$s->asset(null,"public/assets/images/avatar-2.png")?>" alt="User Image">
              </span>
                            <div class="media-body"><span class="block">Server Not Working</span><span class="text-muted block-time">20min ago</span> </div>
                        </a>
                    </li>
                    <li class="bell-notification"> <a href="javascript:;" class="media"><span class="media-left media-icon">
                <img class="img-circle" src="<?=$s->asset(null,"public/assets/images/avatar-3.png")?>" alt="User Image">
              </span>
                                <div class="media-body"><span class="block">Transaction xyz complete</span><span class="text-muted block-time">3 hours ago</span></div></a> </li>
                    <li class="not-footer"> <a href="#!">See all notifications.</a> </li>
                </ul>
            </li>
            <!-- chat dropdown -->
            <li class="pc-rheader-submenu ">
                <a href="#!" class="drop icon-circle displayChatbox"> <i class="icon-bubbles"></i> <span class="badge badge-danger header-badge blink">5</span> </a>
            </li>
            <!-- window screen -->
            <li class="pc-rheader-submenu">
                <a href="#!" class="drop icon-circle" onclick="javascript:toggleFullScreen()"> <i class="icon-size-fullscreen"></i> </a>
            </li>
            <!-- User Menu-->
            <li class="dropdown">
                <a href="#!" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle drop icon-circle drop-image"> <span><img class="img-circle " src="<?=$s->asset(null,"public/assets/images/avatar-1.png")?>" style="width:40px;" alt="User Image"></span> <span>John <b>Doe</b> <i class=" icofont icofont-simple-down"></i></span> </a>
                <ul class="dropdown-menu settings-menu">
                    <li><a href="#!"><i class="icon-settings"></i> Settings</a> </li>
                    <li><a href="#!"><i class="icon-user"></i> Profile</a> </li>
                    <li><a href="message.html"><i class="icon-envelope-open"></i> My Messages</a> </li>
                    <li class="p-0">
                        <div class="dropdown-divider m-0"></div>
                    </li>
                    <li><a href="lock-screen.html"><i class="icon-lock"></i> Lock Screen</a> </li>
                    <li><a href="#!"><i class="icon-logout"></i> Logout</a> </li>
                </ul>
            </li>
        </ul>
        <!-- search -->
        <div id="morphsearch" class="morphsearch">
            <form class="morphsearch-form">
                <input class="morphsearch-input" type="search" placeholder="Search..." />
                <button class="morphsearch-submit" type="submit">Search</button>
            </form>
            <div class="morphsearch-content">
                <div class="dummy-column">
                    <h2>People</h2>
                    <a class="dummy-media-object" href="#!"> <img class="round" src="http://0.gravatar.com/avatar/81b58502541f9445253f30497e53c280?s=50&amp;d=identicon&amp;r=G" alt="Sara Soueidan" />
                        <h3>Sara Soueidan</h3> </a>
                    <a class="dummy-media-object" href="#!"> <img class="round" src="http://1.gravatar.com/avatar/9bc7250110c667cd35c0826059b81b75?s=50&amp;d=identicon&amp;r=G" alt="Shaun Dona" />
                        <h3>Shaun Dona</h3> </a>
                </div>
                <div class="dummy-column">
                    <h2>Popular</h2>
                    <a class="dummy-media-object" href="#!"> <img src="<?=$s->asset(null,"public/assets/images/avatar-1.png")?>" alt="PagePreloadingEffect" />
                        <h3>Page Preloading Effect</h3> </a>
                    <a class="dummy-media-object" href="#!"> <img src="<?=$s->asset(null,"public/assets/images/avatar-1.png")?>" alt="DraggableDualviewlideshow" />
                        <h3>Draggable Dual-view Slideshow</h3> </a>
                </div>
                <div class="dummy-column">
                    <h2>Recent</h2>
                    <a class="dummy-media-object" href="#!"> <img src="<?=$s->asset(null,"public/assets/images/avatar-1.png")?>" alt="TooltipStylesInspiration" />
                        <h3>Tooltip Styles Inspiration</h3> </a>
                    <a class="dummy-media-object" href="#!"> <img src="<?=$s->asset(null,"public/assets/images/avatar-1.png")?>" alt="NotificationStyles" />
                        <h3>Notification Styles Inspiration</h3> </a>
                </div>
            </div>
            <!-- /morphsearch-content --><span class="morphsearch-close"><i class="icofont icofont-search-alt-1"></i></span> </div>
        <!-- search end -->
    </div>
</nav>
