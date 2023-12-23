<!-- Start Header Area -->
<?php
define('USUARIO_ROL', 1);
?>
<header class="header_area sticky-header">
    <div class="main_menu">
        <nav class="navbar navbar-expand-lg navbar-light main_box">
            <div class="container">
                <!-- Brand and toggle get grouped for better mobile display -->
                <a class="navbar-brand logo_h" href="index.html"><img src="<?= ASSETS_IMG ?>logo.png" alt=""></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <span>
                    <h3><?= isset($title) ? strtoupper($title) : '' ?></h3>
                </span>
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse offset" id="navbarSupportedContent">
                    <ul class="nav navbar-nav menu_nav ml-auto">
                        <?php if (USUARIO_ROL <= 2) : ?>
                            <li class="nav-item"><a class="nav-link" href="<?= base_url('/') ?>"><i class="fas fa-boxes"></i> ADMINISTRACION</a></li>
                            <li class="nav-item submenu dropdown">
                                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">PRODUCTOS</a>
                                <ul class="dropdown-menu">
                                    <li class="nav-item"><a class="nav-link" href="<?= base_url('admin/productos/listado') ?>">Listado de Productos</a></li>
                                    <li class="nav-item"><a class="nav-link" href="<?= base_url('admin/productos/nuevo') ?>">Nuevo Producto</a></li>
                                </ul>
                            </li>
                            <li class="nav-item submenu dropdown">
                                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">CATEGORIAS</a>
                                <ul class="dropdown-menu">
                                    <li class="nav-item"><a class="nav-link" href="<?= base_url('admin/categorias/listado') ?>">Listado de Categorias</a></li>
                                    <li class="nav-item"><a class="nav-link" href="<?= base_url('admin/categorias/nueva') ?>">Nueva Categoria</a></li>
                                </ul>
                            </li>
                        <?php endif; ?>

                        <li class="nav-item"><a class="nav-link" href="<?= base_url('/') ?>">Home</a></li>
                        <li class="nav-item submenu dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Catalogo</a>
                            <ul class="dropdown-menu">
                                <li class="nav-item"><a class="nav-link" href="<?= base_url('productos') ?>">Todos Los Productos</a></li>
                                <li class="nav-item"><a class="nav-link" href="<?= base_url('categorias') ?>">Categorias</a></li>
                            </ul>
                        </li>
                        <li class="nav-item"><a class="nav-link" href="<?= base_url('login') ?>">Iniciar Sesion</a></li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <li class="nav-item"><a href="#" class="cart"><span class="ti-bag"></span></a></li>
                        <li class="nav-item">
                            <button class="search"><span class="lnr lnr-magnifier" id="search"></span></button>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
    <div class="search_input" id="search_input_box">
        <div class="container">
            <form class="d-flex justify-content-between">
                <input type="text" class="form-control" id="search_input" placeholder="Search Here">
                <button type="submit" class="btn"></button>
                <span class="lnr lnr-cross" id="close_search" title="Close Search"></span>
            </form>
        </div>
    </div>
</header>
<!-- End Header Area -->