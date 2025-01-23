<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSS-->
    <link rel="stylesheet" type="text/css" href="/admin/template/css/main.css">
    <link rel="stylesheet" type="text/css" href="/admin/template/css/table.css">
    <title>Адмінчастина</title>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries-->
    <!--if lt IE 9
    script(src='https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js')
    script(src='https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js')
    -->
</head>
<body class="sidebar-mini fixed">
<div class="wrapper">
    <!-- Navbar-->
    <header class="main-header hidden-print"><a class="logo" href="index.php">Vali</a>
        <nav class="navbar navbar-static-top">
            <!-- Sidebar toggle button--><a class="sidebar-toggle" href="#" data-toggle="offcanvas"></a>
            <!-- Navbar Right Menu-->
            <div class="navbar-custom-menu">
                <ul class="top-nav">
                    <!--Notification Menu-->
                    <!--<li class="dropdown notification-menu"><a class="dropdown-toggle" href="#" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-bell-o fa-lg"></i></a>
                        <ul class="dropdown-menu">
                            <li class="not-head">You have 4 new notifications.</li>
                            <li><a class="media" href="javascript:;"><span class="media-left media-icon"><span class="fa-stack fa-lg"><i class="fa fa-circle fa-stack-2x text-primary"></i><i class="fa fa-envelope fa-stack-1x fa-inverse"></i></span></span>
                                    <div class="media-body"><span class="block">Lisa sent you a mail</span><span class="text-muted block">2min ago</span></div></a></li>
                            <li><a class="media" href="javascript:;"><span class="media-left media-icon"><span class="fa-stack fa-lg"><i class="fa fa-circle fa-stack-2x text-danger"></i><i class="fa fa-hdd-o fa-stack-1x fa-inverse"></i></span></span>
                                    <div class="media-body"><span class="block">Server Not Working</span><span class="text-muted block">2min ago</span></div></a></li>
                            <li><a class="media" href="javascript:;"><span class="media-left media-icon"><span class="fa-stack fa-lg"><i class="fa fa-circle fa-stack-2x text-success"></i><i class="fa fa-money fa-stack-1x fa-inverse"></i></span></span>
                                    <div class="media-body"><span class="block">Transaction xyz complete</span><span class="text-muted block">2min ago</span></div></a></li>
                            <li class="not-footer"><a href="#">See all notifications.</a></li>
                        </ul>
                    </li> -->
                    <!-- User Menu-->
                    <?php if (isset($_SESSION['userId'])){ ?>
                    <li class="dropdown"><a class="dropdown-toggle" href="#" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-user fa-lg"></i></a>
                        <ul class="dropdown-menu settings-menu">
                            <li><a href="/admin/user/setting"><i class="fa fa-cog fa-lg"></i>Налаштування</a></li>
                            <li><a href="exit.php"><i class="fa fa-sign-out fa-lg"></i>Вихід</a></li>
                        </ul>
                    </li>
                    <?php } ?>
                </ul>
            </div>
        </nav>
    </header>
    <!-- Side-Nav-->
    <aside class="main-sidebar hidden-print">
        <section class="sidebar">
            <div class="user-panel">
                <div class="pull-left image">
                    <img class="img-circle" src="/admin/imagesAvatar/<?php if (isset($_SESSION['userAvatar'])){ print_r($_SESSION['userAvatar']); }?>" alt="">
                </div>
                <div class="pull-left info">
                    <p><?php if (isset($_SESSION['userName'])){ print_r($_SESSION['userName']); }?></p>
                    <p class="designation" ><?php if (isset($_SESSION['userRule'])){ if ($_SESSION['userRule']==1){echo "Адміністратор";} elseif ($_SESSION['userRule']==0){echo "Оператор";} } else{echo "Зайдіть в аккаунт";} ?></p>
                    <br>
                </div>
            </div>
            <!-- Sidebar Menu-->
            <ul class="sidebar-menu">
                <?php if (isset($_SESSION['userId'])){ ?>
                <li><a href="/admin/category/add"><i class="fa fa-dashboard"></i><span>Додати класс</span></a></li>
                <li><a href="/admin/tovar/add"><i class="fa fa-pie-chart"></i><span>Додати товар</span></a></li>
                <li><a href="/admin/category/show"><i class="fa fa-pie-chart"></i><span>Управління классами</span></a></li>
                <li><a href="/admin/tovar/show/0"><i class="fa fa-pie-chart"></i><span>Управління товарами</span></a></li>
                <li><a href="/admin/coupon/generate"><i class="fa fa-pie-chart"></i><span>Генерація купонів</span></a></li>
                <li><a href="/admin/order/managment"><i class="fa fa-pie-chart"></i><span>Управління замовленнями</span></a></li>
                <li><a href="/admin/order/archiv"><i class="fa fa-pie-chart"></i><span>Архів замовлень</span></a></li>
                <li><a href="/admin/order/client"><i class="fa fa-pie-chart"></i><span>Інформація про покупців</span></a></li>
                <?php if($_SESSION['userRule'] == 1){ echo '<li><a href="/admin/user/registration"><i class="fa fa-pie-chart"></i><span>Реєстрація users</span></a></li>';}?>
                <?php } ?>
                <?php if(!isset($_SESSION['userId'])){ echo '<li><a href="/admin/user/login"><i class="fa fa-pie-chart"></i><span>Вхід в аккаунт</span></a></li>';}?>
            </ul>
        </section>
    </aside>
    <div class="content-wrapper">
        <div class="page-title">
            <div>
                <h1><i class="fa fa-dashboard"></i> Адмінчастина</h1>
            </div>
            <div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div>