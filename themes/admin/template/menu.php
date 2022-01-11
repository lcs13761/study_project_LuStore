<?php

use Source\Models\Auth;

?>
<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-dark sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <div class="dropdown">
        <a class="sidebar-brand  dropdown-toggle d-flex align-items-center justify-content-center" href="#"
           id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <img class="img-profile  icon-circle "
                 src="<?= Auth::auth()->photo ?? theme('assets/img/undraw_profile.svg', CONF_VIEW_ADMIN)  ?>">
            <div class="sidebar-brand-text mx-3"><?= Auth::auth()->name ?></div>
        </a>
        <div class="dropdown-menu dropdown-menu-right shadow " aria-labelledby="userDropdown">
            <a class="dropdown-item" href="#">
                <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                Perfil
            </a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="logout">
                <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                Sair
            </a>
        </div>
    </div>
    <!-- Divider -->
    <hr class="sidebar-divider my-0">
    <!-- Nav Item - Dashboard -->
    <li class="nav-item">
        <a class="nav-link" href="<?= url('/admin');?>">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>
    <!-- Divider -->
    <hr class="sidebar-divider">
    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link" href="<?= url('product.index') ?>">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>Produtos</span></a>
    </li>
    <!-- Nav Item - Charts -->
    <li class="nav-item">
        <a class="nav-link" href="<?= url('category.index') ?>">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>Categorias</span></a>
    </li>
    <!-- Nav Item - Charts -->
    <li class="nav-item">
        <a class="nav-link" href="<?= url('user.index') ?>">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>Administradores</span></a>
    </li>
    <!-- Nav Item - Tables -->
    <li class="nav-item">
        <a class="nav-link" href="<?= url('home') ?>">
            <i class="fas fa-fw fa-table"></i>
            <span>Volta Para o Site</span></a>
    </li>
    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">
    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>
</ul>
<!-- End of Sidebar -->