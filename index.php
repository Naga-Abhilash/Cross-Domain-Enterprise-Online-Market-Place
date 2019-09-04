<!DOCTYPE html>
<html>
<head>
      <?php include "leftpanel.php"; ?>
    <title>ShopKartz</title>
</head>
    <body>
        <div class="container">
            <div class="row">
                <div class="tm-left-right-container">
                    
            <?php
            
           //session_start();
                if(isset($_COOKIE['username']) && !empty($_COOKIE['username']))
                {
                    echo "<a href='logout.php' class='tm-nav-item-link' style='float:right; margin-right:20px; font-size:24px;' >\t Logout</a>";
                    echo "<a href='myactivities.php' class='tm-nav-item-link' style='float:right; margin-right:20px;font-size:24px;' > \t MyActivities</a>";
                    echo "<a href='cart.php' class='tm-nav-item-link' style='float:right; margin-right:20px;font-size:24px;' > \t ViewCart</a>";
                }
                else
                {
            ?>
            <!-- Gmail login -->
            
            <button class= "login-signup" onclick="location='google_login/index.php'" style="width:150px;"> Gmail login</button>
            
        <!-- Login -->
            <button class= "login-signup" onclick="document.getElementById('modal-wrapper-login').style.display='block'" style="width:120px;">
            Login</button>

            <div id="modal-wrapper-login" class="modal">

              <form class="modal-content animate" action="loginDAO.php" method="POST">

                <div class="imgcontainer">
                  <span onclick="document.getElementById('modal-wrapper-login').style.display='none'" class="close" title="Close PopUp">&times;</span>
                  <img src="../img/avatar.png" alt="Avatar" class="avatar">
                  <h1 style="text-align:center">Welcome Back</h1>
                </div>

                <div class="container">
                  <input type="text" placeholder="Enter Username" name="username" required>
                  <input type="password" placeholder="Enter Password" name="password" required>
                  <button type="submit" class="login-signup">Login</button>
                  <input type="checkbox" style="margin:26px 30px;"> Remember me
                  <a href="#" style="text-decoration:none; float:right; margin-right:34px; margin-top:26px;">Forgot Password ?</a>
                </div>

              </form>

            </div>


            <!-- Sign up -->
            <button class="login-signup" onclick="document.getElementById('modal-wrapper').style.display='block'" style="width:120px; ">
            Sign UP</button>

            <div id="modal-wrapper" class="modal">

              <form class="modal-content animate" action="signup.php" method="post">

                <div class="imgcontainer">
                  <span onclick="document.getElementById('modal-wrapper').style.display='none'" class="close" title="Close PopUp">&times;</span>
                  <img src="../img/avatar.png" alt="Avatar" class="avatar">
                  <h1 style="text-align:center">Please fill the following details</h1>
                </div>

                <div class="container">
                  <input type="text" placeholder="Enter Username" name="uname" required>
                  <input type="password" placeholder="Enter Password" name="psw" required>
                  <input type="email" placeholder="Enter email" name="email" required>
                  <input type="text" placeholder="Enter phone number xxx-xxx-xxxx" name="phone" required>
                  <button type="submit" class="login-signup">SIGN UP</button>
                  <input type="checkbox" style="margin:26px 30px;"> Remember me
                  <a href="#" style="text-decoration:none; float:right; margin-right:34px; margin-top:26px;">Forgot Password ?</a>
                </div>

              </form>

            </div><br><br>
            <?php
                }
                ?>
                <br>
                <br>
                   <!-- Right column: content -->
                    <div class="tm-right-column">
                        <?php
                            if(isset($_GET['registered']))
                            {
                                if($_GET['registered']==1)
                                {
                                    echo "User signed up successfully, please login!";
                                }
                                else
                                {
                                    echo "Unable to register as user already exists for this username!";
                                }
                            }
                        ?>
                            <!-- Slide show -->
                           <div class="slideshow-container">

                            <div class="mySlides fade">
                              <div class="numbertext">1 / 4</div>
                              <img src="img/makeup.jpg" style="width:100%">
                              <div class="text">Express yourself</div>
                            </div>
                            
                            <div class="mySlides fade">
                              <div class="numbertext">2 / 4</div>
                              <img src="img/food.jpg" style="width:100%">
                              <div class="text">Delicacies</div>
                            </div>
                            
                            <div class="mySlides fade">
                              <div class="numbertext">3 / 4</div>
                              <img src="img/gadget.png" style="width:100%">
                              <div class="text">Latest gadgets</div>
                            </div>
                            
                            <div class="mySlides fade">
                              <div class="numbertext">4 / 4</div>
                              <img src="img/resort1.jpg" style="width:100%">
                              <div class="text">Luxurious Resort</div>
                            </div>
                            
                            
                            </div>
                            <br>
                            
                            <div style="text-align:center">
                              <span class="dot" onclick="currentSlide(1)"></span> 
                              <span class="dot" onclick="currentSlide(2)"></span> 
                              <span class="dot" onclick="currentSlide(3)"></span>
                              <span class="dot" onclick="currentSlide(4)"></span>
                            </div>

                       
                        <div class="tm-content-div">
                            <!-- Welcome section -->
                            <section id="welcome" class="tm-section">
                                <header>
                                    <h2 class="tm-blue-text tm-welcome-title tm-margin-b-45">Welcome to Shopkartz</h2>
                                </header>
                                <p> Shopkartz marketplace is determined to provide best class Products where you can customize each product of what you like and we deliver them to you without any hazzle.
                                  We are backed by some of the pioneers of the industry who will give you the perfect recommendations from our side.` </p>
                                  <p>El mercado de Shopkartz está determinado a proporcionar productos de la mejor clase en los que puede personalizar cada producto de su agrado y se lo entregamos sin ningún problema.
                                  Estamos respaldados por algunos de los pioneros de la industria que le dan las recomendaciones perfectas de nuestro lado.</p>
                            </section>
                            
                            <?php echo "<a href='mostpopular.php' class='tm-nav-item-link' style='float:right; margin-right:10px;' > Most popular products</a>"; ?>
                            
                            <?php echo "<a href='mostvisited.php' class='tm-nav-item-link' style='float:right; margin-right:20px;' > Most visited products</a>"; ?>
                           
                        </div>
                        <?php include "rightpanel.php"; ?>
                    </div> <!-- Right column: content -->
                </div>
            </div> <!-- row -->
        </div> <!-- container -->

</body>
</html>
