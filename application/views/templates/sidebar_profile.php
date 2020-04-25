        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url(''); ?>">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-project-diagram"></i>
                </div>
                <div class="sidebar-brand-text mx-3">Project</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider">



            <!-- Heading -->
            <div class="sidebar-heading">
                Dashboard
            </div>

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link p-2" href="<?= base_url(''); ?>">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>


            <!-- Divider -->
            <hr class="sidebar-divider mt-3">


            <!-- Heading -->
            <div class="sidebar-heading">
                My profile
            </div>

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link p-2" href="<?= base_url('user_profile/index'); ?>">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Profile</span></a>
            </li>


            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link p-2" href="<?= base_url('user_profile/changepassword'); ?>">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Change Password</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider mt-3">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->