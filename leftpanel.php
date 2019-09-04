<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">


<!--
Neaty HTML Template
http://www.templatemo.com/tm-501-neaty
-->
    <!-- load stylesheets -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400">  <!-- Google web font "Open Sans" -->
    <link rel="stylesheet" href="../css/bootstrap.min.css">                                      <!-- Bootstrap style -->
    <link rel="stylesheet" href="../css/magnific-popup.css">                                <!-- Magnific pop up style, http://dimsemenov.com/plugins/magnific-popup/ -->
    <link rel="stylesheet" href="../css/templatemo-style.css">                                   <!-- Templatemo style -->

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
          <![endif]-->
</head>
    <body>
        <div class="container">
            <div class="row">
                <div class="tm-left-right-container">
                    <!-- Left column: logo and menu -->
                    <div class="tm-blue-bg tm-left-column">
                        <div class="tm-logo-div text-xs-center">
                            <a href="index.php"><img src="img/tm-neaty-logo.png" alt="Logo"></a>
                            <h1 class="tm-site-name">ShopKartz</h1>
                        </div>
                        <nav class="tm-main-nav">
                            <ul class="tm-main-nav-ul">
                                <?php
                                   // session_start();
                                    if(isset($_COOKIE['username']) && !empty($_COOKIE['username']))
                                    {
                                        echo '<li class="tm-nav-item">';
                                        echo "Hi " . $_COOKIE['username'] . "!" ;
                                        echo '</li>';
                                    }
                                    if(isset($_GET['category']))
                                    {
                                        echo '<li class="tm-nav-item">
                                            <a href="#view_products" class="tm-nav-item-link">View product</a>
                                        </li>';
                                    }
                                    else if(isset($_POST['cartvalue']) || isset($_POST['deleteproduct']))
                                    {
                                        echo '<li class="tm-nav-item">
                                            <a href="#show_cart" class="tm-nav-item-link">Show cart</a>
                                        </li>';
                                    }
                                    else
                                    {
                                        echo '<li class="tm-nav-item">
                                            <a href="#welcome" class="tm-nav-item-link">Welcome</a>
                                        </li>';
                                    }
                                ?>
                                <li class="tm-nav-item">
                                    <a href="#about" class="tm-nav-item-link">About Us</a>
                                </li>
                                <li class="tm-nav-item">
                                    <a href="#beautyproducts" class="tm-nav-item-link">Beauty Products</a>
                                </li>
                                <li class="tm-nav-item">
                                    <a href="#foodservices" class="tm-nav-item-link">Food Services</a>
                                </li>
                                <li class="tm-nav-item">
                                    <a href="#resortandspa" class="tm-nav-item-link">Resort and Spa</a>
                                </li>
                                <li class="tm-nav-item">
                                    <a href="#gadgets" class="tm-nav-item-link">Gadgets</a>
                                </li>
                                <li class="tm-nav-item">
                                    <a href="#contact" class="tm-nav-item-link">Contact Us</a>
                                </li>
                                <li class="tm-nav-item">
                                <a href="#maps" class="tm-nav-item-link">
                                    <img src="img/x.jpg" alt="Gmaps" width="40px"/>
                                </a>
                                </li>
                            </ul>
                        </nav>
                    </div> <!-- Left column: logo and menu -->

                    <!-- Right column: content -->

                </div>
            </div> <!-- row -->
        </div> <!-- container -->

</body>
</html>
