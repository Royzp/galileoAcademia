
<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button">
                <i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="../views/pantalla_principal.php" class="nav-link"> <i class="fa fa-home" aria-hidden="true">Inicio</i></a>
        </li>

    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <!-- Navbar Search -->
        <li class="nav-item">
            <a class="nav-link" data-widget="navbar-search" href="#" role="button">
                <i class="fas fa-search"></i>
            </a>
            <div class="navbar-search-block">
                <form class="form-inline">
                    <div class="input-group input-group-sm">
                        <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
                        <div class="input-group-append">
                            <button class="btn btn-navbar" type="submit">
                                <i class="fas fa-search"></i>
                            </button>
                            <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                <i class="fas fa-expand-arrows-alt"></i>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
                <i class="fa fa-power-off"></i>
            </a>
        </li>
    </ul>
</nav>
<!-- /.navbar -->

<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4" style="background: #ffff;">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link p-0" style="border-bottom: 0px;">
        <img src="../views/dist/img/gali.png" class="w-100">
    </a>
    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="" align="center">
            <div class="image">
                <img src="../views/dist/img/docente.png" style="
                                                                    height: 40px;
                                                                    width: auto;
                                                                    margin: 8px;
                                                                ">
            </div>
            <div class="info" align="center">
                <a href="#" style="color: black;font-weight: bold;"><?php echo $_SESSION['nombre']; ?></a>
                <!-- <span class="hidden-xs"><?php echo $_SESSION['nombre']; ?></span> -->
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">

            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

                <!-- <li class="nav-item menu-open">
                    <a href="#" class="nav-link active" style="background: #f9571a;">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Control Accesos
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="../views/registro_usuarios.php" class="nav-link active">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Registro Usuarios</p>
                            </a>
                        </li>
                    </ul>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="../views/lista_usuarios.php" class="nav-link active">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Lista de Usuarios</p>
                            </a>
                        </li>
                    </ul>
                </li> -->


                <li class="nav-header" style="color:black;font-weight: bold;">PANEL PRINCIPAL</li>

                <li class="nav-item" >
                    <a href="registro_alumno.php" class="nav-link" style="color: white;">
                        <i class="nav-icon fas fa-file"></i>
                        <p>Matricula</p>
                    </a>
                </li>

                <li class="nav-item" >
                    <a href="lista_matriculas.php" class="nav-link" style="color: white;">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Lista de Matriculas
                        </p>
                    </a>
                </li>




                <!-- Nueva Variables -->


                <!-- <li class="nav-item" >
                    <a href="lista_items.php" class="nav-link" style="color: white;">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Lista de Items
                        </p>
                    </a>
                </li> -->

                <li class="nav-item" >
                    <a href="venta_items.php" class="nav-link" style="color: white;">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Venta de Items
                            <!-- <span class="badge badge-info right">2</span> -->
                        </p>
                    </a>
                </li>

                <li class="nav-item" >
                    <a href="lista_egresos.php" class="nav-link" style="color: white;">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Lista de Egresos
                            <!-- <span class="badge badge-info right">2</span> -->
                        </p>
                    </a>
                </li>

                <li class="nav-header" style="color:black;font-weight: bold;">REPORTES</li>

                <!-- <li class="nav-item" >
                    <a href="dashboard.php" class="nav-link" style="color: white;">
                        <i class="nav-icon fa fa-calendar"></i>
                        <p>Indicadores</p>
                    </a>
                </li> -->
                <li class="nav-item" >
                    <a href="lista_recibo.php" class="nav-link" style="color: white;">
                        <i class="nav-icon fa fa-calendar"></i>
                        <p>Recibos emitidos</p>
                    </a>
                </li>
                <li class="nav-item" >
                    <a href="lista_recibo_extornado.php" class="nav-link" style="color: white;">
                        <i class="nav-icon fa fa-calendar"></i>
                        <p>Recibos extornados</p>
                    </a>
                </li>


                <!-- Fin -->

            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark" style="height: 280px;">
    <!-- Control sidebar content goes here -->
    <div class="p-3" align="center">
        <h3>ACAD.GALILEO</h3>
        <hr style="background: #FE0000;">
        <img src="../views/dist/img/docente.png" width="100" height="100">

        <h6><?php echo $_SESSION['nombre']; ?></h6>
        <hr style="background: #FE0000;">
        <div style="background: #FE0000;
              height: 30px;
               width: 160px; ">

            <a href="salir.php"> <img src="../views/dist/img/iu.png" width="20" height="20">CERRAR SESION</a>
        </div>

    </div>
</aside>
<!-- /.control-sidebar -->