
<!DOCTYPE html>
<html>
  <head>
    <?php include "leftpanel.php"; ?> 
    <script>
        function isUserLoggedIn(form){
            usern = form.user.value;
            if(usern === ""){
                alert("Please login to add review!")
                return false;
            }
            return true;
        }
    </script>
    
    </head>
    <body>
        
       
        <div class="tm-right-column">
             <div class="tm-content-div">
            <section id="view_products">
    
 
            <?php
                // fecthing get variables
                $query = $_SERVER['PHP_SELF'];
                $path = pathinfo( $query );
                $elem = basename($path['basename'], '.php');
                $category = $_GET['category'];
                $product = $_GET['product'];
                
                $re = false;
                if(isset($_GET['re']))
                {
                    $re = true;
                }
                
            //check if user cookie exists
            $userval="";
            if(isset($_COOKIE['username']))
            {
                 $userval = $_COOKIE['username'];
            }
            
            // db connection to increment visit count
            $servername = "localhost";
            $username = "id9560178_marketadmin";
            $dbpassword = "admin";
            $dbname = "id9560178_marketplacedb";
            
            // Create connection
            $conn = mysqli_connect($servername, $username, $dbpassword, $dbname);
            
            // Check connection
            if ($conn->connect_error)
            {
                die("Connection failed: " . $conn->connect_error);
            } 
            
            $select="SELECT * FROM products WHERE category=$category and product_name=$product";
            $run = mysqli_query($conn,$select);
            $runs = mysqli_fetch_array($run);
            
            $newcount=$runs['visit_count'];
            $newcount=$newcount+1;
            
            $update = "UPDATE products SET visit_count='$newcount' WHERE product_name=$product";
            $result = mysqli_query($conn, $update);
            
            // if user is logged in then show logout, else showing login
            
            if(isset($_COOKIE['username']) && !empty($_COOKIE['username']))
            {
                echo "<a href='logout.php' class='tm-nav-item-link' style='float:right; margin-right:20px; font-size:24px;' >\t Logout</a>";
                    echo "<a href='myactivities.php' class='tm-nav-item-link' style='float:right; margin-right:20px;font-size:24px;' > \t MyActivities</a>";
                    echo "<a href='cart.php' class='tm-nav-item-link' style='float:right; margin-right:20px;font-size:24px;' > \t ViewCart</a>";
            }
            else
            {
                
            ?>
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
    
                  <form class="modal-content animate" action="/signup.php">
    
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
    
                </div>
                <?php
            }
            echo "<br>";
            echo "<br>";
            echo "<br>";
              
     // show product details
     
        $sql="SELECT * FROM products WHERE category=$category and product_name=$product";
                $result = mysqli_query($conn,$sql);
                
                $row = mysqli_fetch_array($result);
                $image = $row['product_image'];
                echo "<div align='center'><b><font size='6px'; color='red'>". $row['product_name'] . "</font></b></div>";
                echo "<br>";
                echo '<img src="img/'.$image.'.jpg" alt="primer" class="img-fluid" width="400px style="margin-left:500px;" "/>';
                echo "<b>Price: </b>". $row['product_cost'];
                echo "<br>";
                echo "Average Rating: ".$row['rating_avg'];
                
         
                echo '<form class="" action="cart.php" method="post">
    
                  <select class="" name="quantity">
                    <option value="0">select Quantity</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                  </select>
                    <input type="hidden" name="product" value= ' . $product . '>
                <input type="hidden" name="category" value= ' . $category . '>
                  <button type="submit" name="cartvalue">Add to cart</button>
    
                </form>';
               
                echo "<br>";
                
                // show thank after adding review
                if($re)
                {
                    echo "Thank you for the review!";
                }
                
                
                $alreadyReviewed = false;           
                if(isset($_COOKIE['username'])){
                    $un = $_COOKIE['username'];
                $trackingUserProductSql = "INSERT INTO tracking_users (username,action,action_date,product_name,category)
                  VALUES ('$un','Visited',NOW(),$product,$category)";
                $trackingUserProductResult = mysqli_query($conn, $trackingUserProductSql);
                $verify = "SELECT * from rating WHERE username= '$un' AND product_name =$product";
                $results = mysqli_query($conn, $verify);
                $num_rows = mysqli_num_rows($results);
                if ($num_rows > 0)
                {
                  $alreadyReviewed = true;
                }
                else 
                {
                  $alreadyReviewed = false;
                }  
                }
    
                // check to verify if user already provided review
              if($alreadyReviewed)
              {
                $getreviews = "SELECT * from rating WHERE username= '$un' AND product_name =$product";
                
                $urs = mysqli_query($conn, $getreviews);
                $rev = mysqli_fetch_array($urs);
                echo "Your rating and review!"; echo "<br>";
                echo "Rating:".$rev['star'] ;
                echo "<br>";
                echo "Review:".$rev['review'];
                echo "<br>";
              }
              else
              {
                echo '<form onsubmit="return isUserLoggedIn(this)" action="addreview.php" method="post">
                  <label><b>Rating: </b></label>
                  <input type="radio" name="star" value="1" required>1
                  <input type="radio" name="star" value="2">2
                  <input type="radio" name="star" value="3">3
                  <input type="radio" name="star" value="4">4
                  <input type="radio" name="star" value="5">5 <br>
                  <label>write review here:</label><br>
                  <textarea rows = "5" cols = "50" name = "review"> </textarea><br>
                <input type="hidden" name="product" value= ' . $product . '>
                <input type="hidden" name="category" value= ' . $category . '>
                <input type="hidden" name="user" value= ' . $userval . '>
                  <button type="submit" name="submitreview">Submit</button>
    
                </form>';
              }
              $result->close();
               echo "<a href='mostpopular.php' class='tm-nav-item-link' style='float:right; margin-right:10px;' > Most popular products</a>";
               echo "<a href='mostvisited.php' class='tm-nav-item-link' style='float:right; margin-right:20px;' > Most visited products</a>"; 
                           
     ?>
</section>
</div>
<?php include "rightpanel.php"; ?>
</div>

</body>
</html>