<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
      <?php include "leftpanel.php"; ?>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <div class="container">
        <div class="row">
      
        <div class="tm-right-column">
             <div class="tm-content-div">
        
        <div class="tm-gallery-container">
    <section id="welcome" class="tm-section">

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
    <section  class="tm-section">
    
      <?php
      //Market place products
      $mostVisited = "SELECT * FROM products ORDER BY visit_count DESC LIMIT 5";
      $mostVisitedresult = mysqli_query($conn, $mostVisited);
      echo '<header><h2 class="tm-blue-text tm-section-title tm-margin-b-30">Most visited market place products</h2></header>';
      while($row = mysqli_fetch_array($mostVisitedresult))
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
    <section class="tm-section">

    <?php
      // Beauty Products
      echo '<header><h2 class="tm-blue-text tm-section-title tm-margin-b-30">Most visited Beauty products</h2></header>';
      $mostVisited = "SELECT * FROM products Where category='makeup' ORDER BY visit_count DESC LIMIT 5";
      $mostVisitedresult = mysqli_query($conn, $mostVisited);
      while($row = mysqli_fetch_array($mostVisitedresult))
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
      <section  class="tm-section">

      <?php
      // Food Services
      echo '<header><h2 class="tm-blue-text tm-section-title tm-margin-b-30">Most visited Food products</h2></header>';
      $mostVisited = "SELECT * FROM products Where category='paradise' ORDER BY visit_count DESC LIMIT 5";
      $mostVisitedresult = mysqli_query($conn, $mostVisited);
      while($row = mysqli_fetch_array($mostVisitedresult))
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
      <section  class="tm-section">

      <?php


      //Resort and Spa
      echo '<header><h2 class="tm-blue-text tm-section-title tm-margin-b-30">Most visited Resort Services</h2></header>';
      $mostVisited = "SELECT * FROM products Where category='resort' ORDER BY visit_count DESC LIMIT 5";
      $mostVisitedresult = mysqli_query($conn, $mostVisited);
      
      while($row = mysqli_fetch_array($mostVisitedresult))
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
        <section class="tm-section">

      <?php

      // Gadgets section
      echo '<header><h2 class="tm-blue-text tm-section-title tm-margin-b-30">Most visited Gadgets</h2></header>';
      $mostVisited = "SELECT * FROM products Where category='gadgets' ORDER BY visit_count DESC LIMIT 5";
      $mostVisitedresult = mysqli_query($conn, $mostVisited);
      while($row = mysqli_fetch_array($mostVisitedresult))
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
