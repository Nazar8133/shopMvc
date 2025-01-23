<?php
require_once (ROOT."/controllers/MenuController.php");
require_once (ROOT."/controllers/CategoryController.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="<?=$pageList['metaDiscription']?>">
    <meta name="keywords" content="<?=$pageList['metaKeywords']?>">
    <title><?=$pageList['metaTitle']?></title>
    <meta name="author" content="">
    <!--Less styles -->
    <!-- Other Less css file //different less files has different color scheam
     <link rel="stylesheet/less" type="text/css" href="themes/less/simplex.less">
     <link rel="stylesheet/less" type="text/css" href="themes/less/classified.less">
     <link rel="stylesheet/less" type="text/css" href="themes/less/amelia.less">  MOVE DOWN TO activate
     -->
    <!--<link rel="stylesheet/less" type="text/css" href="themes/less/bootshop.less">
    <script src="themes/js/less.js" type="text/javascript"></script> -->

    <!-- Bootstrap style -->
    <link id="callCss" rel="stylesheet" href="/template/css/bootstrap.min.css" media="screen"/>
    <link href="/template/themes/css/base.css" rel="stylesheet" media="screen"/>
    <link rel="stylesheet" href="/template/css/style.css">
    <!-- Bootstrap style responsive -->
    <link href="/template/css/bootstrap-responsive.min.css" rel="stylesheet"/>
    <link href="/template/themes/css/font-awesome.css" rel="stylesheet" type="text/css">
    <!-- Google-code-prettify -->
    <link href="/template/themes/js/google-code-prettify/prettify.css" rel="stylesheet"/>
    <!-- fav and touch icons -->
    <link rel="shortcut icon" href="/template/themes/images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="/template/themes/images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="/template/themes/images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="/template/themes/images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="/template/themes/images/ico/apple-touch-icon-57-precomposed.png">
</head>
<body>
<div id="header">
    <div class="container">
        <div id="welcomeLine" class="row">
            <div class="span6"></div>
            <div class="span6">
                <div class="pull-right">
                    <?php if (isset($_SESSION['basket']) && count($_SESSION['basket'])>0){
                        $kolvo=0;
                        for ($i=0; $i<count($_SESSION['basket']); $i++){
                            $kolvo+=$_SESSION['basket'][$i]['kolvo'];
                        }
                    }
                    else{
                        $kolvo=0;
                    }
                    ?>
                    <!--<a href="/order"><span class="btn btn-mini btn-primary"><i class="icon-shopping-cart icon-white"></i> [  ] Кількість товарі в кошику </span> </a> -->
                    <a href="/order"><?=$kolvo?><img src="/photo/basketPhoto.png" width="25px" height="25px"></a>
                </div>
            </div>
        </div>
        <!-- Navbar ================================================== -->
        <div id="logoArea" class="navbar">
            <a id="smallScreen" data-target="#topMenu" data-toggle="collapse" class="btn btn-navbar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </a>
            <div class="navbar-inner">
                <a class="brand" href="/page/index"><img src="/template/themes/images/logo.png" alt="Bootsshop"/></a>
                <!--<form class="form-inline navbar-search" method="post" action="search.php" >
                    <input class="srchTxt" type="text" name="searchTovar">
                    <button type="submit" id="submitButton" class="btn btn-primary">Go</button>
                </form>-->
                <ul id="topMenu" class="nav pull-right">
                    <?php
                        $menuPage=new MenuController();
                        $menuList=$menuPage->pageMenu();
                        foreach ($menuList as $tmp): ?>
                            <li class=''><a href='<?php if ($tmp['page']=='catalog'){ echo '/catalog/0/1/null/null';} else{ echo '/page/'.$tmp['page'];}?>'><?=$tmp['name']?></a></li>
                    <?php endforeach; ?>

                    <!--<li class="">
                        <a href="#login" role="button" data-toggle="modal" style="padding-right:0"><span class="btn btn-large btn-success">Login</span></a>
                        <div id="login" class="modal hide fade in" tabindex="-1" role="dialog" aria-labelledby="login" aria-hidden="false" >
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                <h3>Login Block</h3>
                            </div>
                            <div class="modal-body">
                                <form class="form-horizontal loginFrm">
                                    <div class="control-group">
                                        <input type="text" id="inputEmail" placeholder="Email">
                                    </div>
                                    <div class="control-group">
                                        <input type="password" id="inputPassword" placeholder="Password">
                                    </div>

                                </form>
                                <button type="submit" class="btn btn-success">Sign in</button>
                                <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
                            </div>
                        </div>
                    </li>-->
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- Header End======================================================================
<div id="carouselBlk">
	<div id="myCarousel" class="carousel slide">
		<div class="carousel-inner">
		  <div class="item active">
		  <div class="container">
			<a href="register.html"><img style="width:100%" src="themes/images/carousel/1.png" alt="special offers"/></a>
			<div class="carousel-caption">
				  <h4>Second Thumbnail label</h4>
				  <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
				</div>
		  </div>
		  </div>
		  <div class="item">
		  <div class="container">
			<a href="register.html"><img style="width:100%" src="themes/images/carousel/2.png" alt=""/></a>
				<div class="carousel-caption">
				  <h4>Second Thumbnail label</h4>
				  <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
				</div>
		  </div>
		  </div>
		  <div class="item">
		  <div class="container">
			<a href="register.html"><img src="themes/images/carousel/3.png" alt=""/></a>
			<div class="carousel-caption">
				  <h4>Second Thumbnail label</h4>
				  <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
				</div>

		  </div>
		  </div>
		   <div class="item">
		   <div class="container">
			<a href="register.html"><img src="themes/images/carousel/4.png" alt=""/></a>
			<div class="carousel-caption">
				  <h4>Second Thumbnail label</h4>
				  <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
				</div>

		  </div>
		  </div>
		   <div class="item">
		   <div class="container">
			<a href="register.html"><img src="themes/images/carousel/5.png" alt=""/></a>
			<div class="carousel-caption">
				  <h4>Second Thumbnail label</h4>
				  <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
			</div>
		  </div>
		  </div>
		   <div class="item">
		   <div class="container">
			<a href="register.html"><img src="themes/images/carousel/6.png" alt=""/></a>
			<div class="carousel-caption">
				  <h4>Second Thumbnail label</h4>
				  <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
				</div>
		  </div>
		  </div>
		</div>
		<a class="left carousel-control" href="#myCarousel" data-slide="prev">&lsaquo;</a>
		<a class="right carousel-control" href="#myCarousel" data-slide="next">&rsaquo;</a>
	  </div>
</div>-->
<div id="mainBody">
    <div class="container">
        <div class="row">
            <!-- Sidebar ================================================== -->
            <div id="sidebar" class="span3">
                <!--<div class="well well-small"><a id="myCart" href="product_summary.html"><img src="themes/images/ico-cart.png" alt="cart">3 Items in your cart  <span class="badge badge-warning pull-right">$155.00</span></a></div> -->
                <ul id="sideManu" class="nav nav-tabs nav-stacked">
                    <li><a href="/catalog/0/1/null/null">Показати всі</a></li>
                    <?php
                        $categoryController=new CategoryController();
                        $categoryList=$categoryController->actionCategorySearch();
                        foreach ($categoryList as $item):
                    ?>
                    <li><a href="/catalog/<?=$item['id']?>/1/null/null"><?=$item['type']?></a></li>
                    <?php endforeach; ?>
                    <br>
                    <br>

                    <form action="/catalog/0/1/null/null" method="post">
                        <label>Пошук</label>
                        <input type="text" name="searchTovar"><br>
                        <?php if (isset($_SESSION['searchTovar']) && !empty($_SESSION['searchTovar'])){ ?>
                        Ваш пошук:<br>
                        "<?=$_SESSION['searchTovar']?>"<br>
                        <input type="submit" name="deleteSearch" value="Очистити пошук">
                        <?php } ?>
                        <label>Ціна від</label>
                        <input type="number" name="searchPriceOt">
                        <?php if (isset($_SESSION['searchPriceOt']) && !empty($_SESSION['searchPriceOt'])){ ?>
                        <br>Фільтр ціни від: <?=$_SESSION['searchPriceOt']?><br>
                            <input type="submit" name="deleteSearchPriceOt" value="Очистити фільтр">
                        <?php } ?>
                        <label>до</label>
                        <input type="number" name="searchPriceDo">
                        <?php if (isset($_SESSION['searchPriceDo']) && !empty($_SESSION['searchPriceDo'])){ ?>
                            <br>Фільтр ціни до: <?=$_SESSION['searchPriceDo']?><br>
                            <input type="submit" name="deleteSearchPriceDo" value="Очистити фільтр"><br>
                        <?php } ?>
                        <br><input type="submit" name="knopka" value="Пошук">
                    </form>
                </ul>
            </div>

            <!-- Sidebar end=============================================== -->
            <div class="checkout-container">
            <ul class="thumbnails">
            <h3><?=$pageList['title']?></h3><br>
            <?=$pageList['fullContent']?>
