<section class="sidebar" id="sidebar-scroll">
    <div class="user-panel">
        <div class="f-left image"><img src="<?=$s->asset(null,"public/assets/images/avatar-1.png")?>" alt="User Image" class="img-circle"> </div>
        <div class="f-left info">
            <p>John Doe</p>
            <p class="designation">UX Designer <i class="icofont icofont-caret-down m-l-5"></i> </p>
        </div>
    </div>
    <!-- sidebar profile Menu-->
    <ul class="nav sidebar-menu extra-profile-list">
        <li>
            <a class="waves-effect waves-dark" href="profile.html"> <i class="icon-user"></i> <span class="menu-text">View Profile</span> <span class="selected"></span> </a>
        </li>
        <li>
            <a class="waves-effect waves-dark" href="javascript:void(0)"> <i class="icon-settings"></i> <span class="menu-text">Settings</span> <span class="selected"></span> </a>
        </li>
        <li>
            <a class="waves-effect waves-dark" href="javascript:void(0)"> <i class="icon-logout"></i> <span class="menu-text">Logout</span> <span class="selected"></span> </a>
        </li>
    </ul>
    <!-- Sidebar Menu-->
    <ul class="sidebar-menu">
        <li class="nav-level">Navigation</li>
        
        <li class="treeview"><a class="waves-effect waves-dark" href="#!"><i class="icofont icofont-company"></i><span>Menu Level 1</span><i class="icon-arrow-down"></i></a>
            <ul class="treeview-menu">
                <li>
                    <a class="waves-effect waves-dark" href="#!"> <i class="icon-arrow-right"></i> Level Two </a>
                </li>
                <li class="treeview">
                    <a class="waves-effect waves-dark" href="#!"> <i class="icon-arrow-right"></i> <span>Level Two</span> <i class="icon-arrow-down"></i> </a>
                    <ul class="treeview-menu">
                        <li>
                            <a class="waves-effect waves-dark" href="#!"> <i class="icon-arrow-right"></i> Level Three </a>
                        </li>
                        <li>
                            <a class="waves-effect waves-dark" href="#!"> <i class="icon-arrow-right"></i> <span>Level Three</span> <i class="icon-arrow-down"></i> </a>
                            <ul class="treeview-menu">
                                <li>
                                    <a class="waves-effect waves-dark" href="#!"> <i class="icon-arrow-right"></i> Level Four </a>
                                </li>
                                <li>
                                    <a class="waves-effect waves-dark" href="#!"> <i class="icon-arrow-right"></i> Level Four </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li>
            </ul>
        </li>
    </ul>
</section>