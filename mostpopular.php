<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
      <?php include "leftpanel.php"; ?>
    <meta charset="utf-8">
    <title> Most Popular</title>
  </head>
  <body>
    <div class="container">
        <div class="row">
      
        <div class="tm-right-column">
             <div class="tm-content-div">
        
        <div class="tm-gallery-container">
    <section  class="tm-section">

      <?php

      $servername = "localhost";
      $username = "id9560178_marketadmin";
      $dbpassword = "admin";
      $dbname = "id9560178_marketplacedb";

      $conn = mysqli_connect($servername, $username, $dbpassword, $dbname);

      if ($conn->connect_error)
      {
          die("Connection failed: " . $conn->connect_error);
      }
    ?>
    </section>
         </div>
        <div class="tm-gallery-container">
    <section   class="tm-section">
    
      <?php
      //Market place products
      $mostpopular = "SELECT * FROM products ORDER BY rating_avg DESC LIMIT 5";
      $mostpopularresult = mysqli_query($conn, $mostpopular);
      echo '<header><h2 class="tm-blue-text tm-section-title tm-margin-b-30">Most popular market place products</h2></header>';
      while($row = mysqli_fetch_array($mostpopularresult))
      {
        $category="'";
        $product="'";
        $image = $row['product_image'];
        $category.=$row['category'];
        $product.=$row['product_name'];
        $category.="'";
        $product.="'";
         
         
        echo "<div class='tm-img-container tm-img-container-1'>";
        
        echo '<a href="productPage.php?category='.$category.'&product='.$product.'"><img src="img/'.$image.'.jpg" alt="image" class="img-fluid" width="400px"/></a>';

        echo "</div>";

      }

    ?>
    </section>
     </div>
        <div class="tm-gallery-container">
    <section   class="tm-section">

    <?php
      // Beauty Products
      echo '<header><h2 class="tm-blue-text tm-section-title tm-margin-b-30">Most popular Beauty products</h2></header>';
      $mostpopular = "SELECT * FROM products Where category='makeup' ORDER BY rating_avg DESC LIMIT 5";
      $mostpopularresult = mysqli_query($conn, $mostpopular);
      while($row = mysqli_fetch_array($mostpopularresult))
      {
        $category="'";
        $product="'";
        $image = $row['product_image'];
        $category.=$row['category'];
        $product.=$row['product_name'];
        $category.="'";
        $product.="'";

        echo "<div class='tm-img-container tm-img-container-1'>";

        echo '<a href="productPage.php?category='.$category.'&product='.$product.'"><img src="img/'.$image.'.jpg" alt="image" class="img-fluid" width="400px"/></a>';

        echo "</div>";

      }

      ?>
      </section>
         </div>
        <div class="tm-gallery-container">
      <section   class="tm-section">

      <?php
      // Food Services
      echo '<header><h2 class="tm-blue-text tm-section-title tm-margin-b-30">Most popular Food products</h2></header>';
      $mostpopular = "SELECT * FROM products Where category='paradise' ORDER BY rating_avg DESC LIMIT 5";
      $mostpopularresult = mysqli_query($conn, $mostpopular);
      while($row = mysqli_fetch_array($mostpopularresult))
      {
        $category="'";
        $product="'";
        $image = $row['product_image'];
        $category.=$row['category'];
        $product.=$row['product_name'];
        $category.="'";
        $product.="'";

        echo "<div class='tm-img-container tm-img-container-1'>";

        echo '<a href="productPage.php?category='.$category.'&product='.$product.'"><img src="img/'.$image.'.jpg" alt="image" class="img-fluid" width="400px"/></a>';

        echo "</div>";

      }
      ?>
      </section>
      </div>
        <div class="tm-gallery-container">
      <section   class="tm-section">

      <?php


      //Resort and Spa
      echo '<header><h2 class="tm-blue-text tm-section-title tm-margin-b-30">Most popular Resort Services</h2></header>';
      $mostpopular = "SELECT * FROM products Where category='resort' ORDER BY rating_avg DESC LIMIT 5";
      $mostpopularresult = mysqli_query($conn, $mostpopular);
      
      while($row = mysqli_fetch_array($mostpopularresult))
      {
        $category="'";
        $product="'";
        $image = $row['product_image'];
        $category.=$row['category'];
        $product.=$row['product_name'];
        $category.="'";
        $product.="'";

        echo "<div class='tm-img-container tm-img-container-1'>";

        echo '<a href="productPage.php?category='.$category.'&product='.$product.'"><img src="img/'.$image.'.jpg" alt="image" class="img-fluid" width="400px"/></a>';

        echo "</div>";

      }
      ?>
      </section>
        </div>
        
        
        <div class="tm-gallery-container">
        <section   class="tm-section">

      <?php

      // Gadgets section
      echo '<header><h2 class="tm-blue-text tm-section-title tm-margin-b-30">Most popularGadgets</h2></header>';
      $mostpopular = "SELECT * FROM products Where category='gadgets' ORDER BY rating_avg DESC LIMIT 5";
      $mostpopularresult = mysqli_query($conn, $mostpopular);
      while($row = mysqli_fetch_array($mostpopularresult))
      {
        $category="'";
        $product="'";
        $image = $row['product_image'];
        $category.=$row['category'];
        $product.=$row['product_name'];
        $category.="'";
        $product.="'";

        echo "<div class='tm-img-container tm-img-container-1'>";

        echo '<a href="productPage.php?category='.$category.'&product='.$product.'"><img src="img/'.$image.'.jpg" alt="image" class="img-fluid" width="400px"/></a>';

        echo "</div>";

      }
      ?>
      </section>
       </div>
       </div>
       <?php include "rightpanel.php"; ?>
    </div>
   </div></div>
  </body>
</html>
