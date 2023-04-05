<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<!-- BEGIN: Head-->

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="Modern admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities with bitcoin dashboard.">
    <meta name="keywords" content="admin template, modern admin template, dashboard template, flat admin template, responsive admin template, web app, crypto dashboard, bitcoin dashboard">
    <meta name="author" content="PIXINVENT">
    <title>Pedidos</title>
    <link rel="stylesheet" href="//cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css" />
    <link rel="stylesheet" type="text/css" href="../../app-assets/fonts/material-icons/material-icons.css">

    <!-- BEGIN: Theme CSS-->
    <link rel="stylesheet" type="text/css" href="../../app-assets/css/material.css">
    <link rel="stylesheet" type="text/css" href="../../app-assets/css/components.css">
    <link rel="stylesheet" type="text/css" href="../../app-assets/css/bootstrap-extended.css">
    <link rel="stylesheet" type="text/css" href="../../app-assets/css/material-extended.css">
    <link rel="stylesheet" type="text/css" href="../../app-assets/css/material-colors.css">
    <!-- END: Theme CSS-->

</head>
<!-- END: Head-->

<!-- BEGIN: Body-->

<body class="horizontal-layout horizontal-menu horizontal-menu-padding material-horizontal-layout material-layout 2-columns  " data-open="click" data-menu="horizontal-menu" data-col="2-columns">


    <!-- BEGIN: Main Menu-->

    <div class="header-navbar navbar-expand-sm navbar navbar-horizontal navbar-fixed navbar-dark navbar-without-dd-arrow navbar-shadow" role="navigation" data-menu="menu-wrapper">
        <div class="navbar-container main-menu-content container center-layout" data-menu="menu-container">
            <ul class="nav navbar-nav" id="main-menu-navigation" data-menu="menu-navigation">
                <li class="dropdown nav-item" data-menu="dropdown"><a class="dropdown-toggle nav-link"  data-toggle="dropdown"><i class="material-icons">settings_input_svideo</i><span>Clientes</span></a>
                    <ul class="dropdown-menu">
                        <li class="active" data-menu=""><a class="dropdown-item" href="dashboard-ecommerce.html" data-toggle=""><span data-i18n="eCommerce">Lista de Clientes</span></a>
                        </li>
                        <li class="active" data-menu=""><a class="dropdown-item" href="dashboard-ecommerce.html" data-toggle=""><span data-i18n="eCommerce">Adicionar Cliente</span></a>
                        </li>
                    </ul>
                </li>
                <li class="dropdown nav-item" data-menu="dropdown"><a class="dropdown-toggle nav-link" href="#" data-toggle="dropdown"><i class="material-icons">apps</i><span>Pedidos</span></a>
                    <ul class="dropdown-menu">
                        <li data-menu=""><a class="dropdown-item" href="app-todo.html" data-toggle=""><span data-i18n="ToDo">Lista de Pedidos</span></a>
                        </li>
                        <li data-menu=""><a class="dropdown-item" href="app-email.html" data-toggle=""><span data-i18n="Email">Novo Pedido</span></a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
    <!-- END: Main Menu-->

    <!-- BEGIN: Content-->
    <div class="app-content container center-layout mt-2">
        <div class="content-header row">
        </div>
        <div class="content-overlay"></div>
        <div class="content-wrapper">
            <div class="content-body">
                <!-- eCommerce statistic -->
                <div class="row">
                    <div class="col-xl-3 col-lg-6 col-12">
                        <div class="card pull-up">
                            <div class="card-content">
                                <div class="card-body">
                                    <div class="media d-flex">
                                        <div class="media-body text-left">
                                            <h2 style="color: black;">Pedidos</h2>
                                        </div>
                                        <div>
                                            <i class="la la-home" style="font-size: 40px;"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> 
                    </div>
                    <div class="col-xl-3 col-lg-6 col-12">
                        <div class="form-actions pb-0">
                            <button type="button"  data-toggle="modal" id="btnModalPedidos"  class="btn round btn-outline-black black block btn-lg ">
                            <i class="la la-home"></i>
                            Novo Pedido </button>
                        </div>
                    </div>
                </div>
                <!--/ eCommerce statistic -->

                <!-- Products sell and New Orders -->
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Pedidos</h4>
                                <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                                <div class="heading-elements">
                                </div>
                            </div>
                            <div class="card-content">
                                <div class="table-responsive">
                                    <table id="idTablePedidos" class="table table table-striped table-hover">
                                        <thead>
                                            <tr>
                                                <th>Cliente</th>
                                                <th>Valor Pedido</th>
                                                <th>Local de Entrega</th>
                                                <th>Valor Frete</th>
                                                <th>Data de Entrega</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Active Orders -->
            </div>
        </div>
    </div>
    <!-- END: Content-->
    <div class="modal fade" id="idModalPedidos" data-idpedido="" tabindex="-1" role="dialog" aria-hidden="true" data-backdrop="true"></div>

    <div class="sidenav-overlay"></div>
    <div class="drag-target"></div>

    <!-- BEGIN: Footer-->
    <footer class="footer footer-transparent footer-light navbar-shadow">
        <p class="clearfix blue-grey lighten-2 text-sm-center mb-0 px-2 container center-layout"><span class="float-md-left d-block d-md-inline-block">Copyright &copy; 2019 <a class="text-bold-800 grey darken-2" href="https://1.envato.market/modern_admin" target="_blank">PIXINVENT</a></span><span class="float-md-right d-none d-lg-block">Hand-crafted & Made with<i class="ft-heart pink"></i><span id="scroll-top"></span></span></p>
    </footer>
    <!-- END: Footer-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
    <!-- <script src="http://code.jquery.com/jquery-migrate-1.2.1.min.js"></script> -->
    <script src="../javaScript/pedidos.js"></script>


</body>
<!-- END: Body-->

</html>


  
