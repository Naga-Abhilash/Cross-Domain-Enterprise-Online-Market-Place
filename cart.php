<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
      <?php include "leftpanel.php"; ?>
    <title></title>
  </head>
  <body>
<div class="container">
        <div class="row">
      
        <div class="tm-right-column">
             <div class="tm-content-div">
    <section id="show_cart">
    <?php
        
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
      //$result = mysqli_query($conn,$sql);

      if(isset($_COOKIE['username']))
      {
        $username = $_COOKIE['username'];
        echo "<a href='logout.php' class='tm-nav-item-link' style='float:right; margin-right:20px; font-size:24px;' >\t Logout</a>";
        echo "<a href='myactivities.php' class='tm-nav-item-link' style='float:right; margin-right:20px;font-size:24px;' > \t MyActivities</a>";
          if(isset($_POST['cartvalue']))
          {
              $category= $_POST['category'];
            $product=$_POST['product'];
                $quantity=$_POST['quantity'];
              $sql2 = "select * from products where product_name = '$product'";
              $result2 = mysqli_query($conn, $sql2);
              //print_r($result2);
              $row2 = mysqli_fetch_array($result2);
    
              $price=$row2['product_cost'];
                
                
              $sql3 = "select * from cart where username = '$username' and product_name = '$product'";
              $result3 = mysqli_query($conn, $sql3);
              $row3 = mysqli_num_rows($result3);
              $fetchCart=mysqli_fetch_array($result3);
              if ($row3<1)
              {
                  $totalPrice =$price * $quantity;
                  $sql4 = "INSERT INTO cart (category,product_name,username,price,quantity,total)
                  VALUES ('$category','$product','$username',$price,$quantity,$totalPrice)";
                   $result4 = mysqli_query($conn, $sql4);
              }
              else
              {
                  
                  $newquantity=$fetchCart['quantity']+$quantity;
                  $newtotal=$fetchCart['total']+($quantity*$fetchCart['price']);
                   
                  $updateQuantsql= "UPDATE cart set quantity=$newquantity where username = '$username' and product_name = '$product'";
                  $updateTotalsql= "UPDATE cart set total=$newtotal where username = '$username' and product_name = '$product'";
                  $updateQuantity = mysqli_query($conn, $updateQuantsql);
                  $updateTotal = mysqli_query($conn, $updateTotalsql);
                  
              }
              
          }
          
          else if(isset($_POST['deleteproduct']))
          {
              $delproduct=$_POST['delproduct'];
              
              $deleteQuantsql= "DELETE from cart where username = '$username' and product_name = '$delproduct'";
              $deleteQuantity = mysqli_query($conn, $deleteQuantsql);
          }
          else if(isset($_POST['placeorder']))
          {
                
                
                $minno = 1234234123;
                $maxno = 9999999999;
                $orderno = mt_rand($minno, $maxno);
                
                $checkid = mysqli_query($conn,"SELECT * FROM userorder WHERE order_id='$orderno'") or die("Failed to connect to database");
                
                $checkrow=mysqli_num_rows($checkid);
                
                if($checkrow>0)
                {
                    $orderno = mt_rand($minno, $maxno);
                }
                
                $getcart = "select * from cart where username = '$username'";
                $getcartresult = mysqli_query($conn, $getcart);
                
                
              while($rown = mysqli_fetch_array($getcartresult))
              {
                  
                $getcartcategory=$rown['category'];
                $getcartproduct=$rown['product_name'];
                $getcartprice=$rown['price'];
                $getcartquantity=$rown['quantity'];
                $getcarttotal=$rown['total'];
                
                $ordercreatesql="INSERT into userorder (username,order_id) values('$username',$orderno)";
                
                $ordercreate=mysqli_query($conn,$ordercreatesql);
                $ordersql="INSERT into orders (category,product_name,order_id,quantity,price,total) values('$getcartcategory','$getcartproduct',$orderno,$getcartquantity,$getcartprice,$getcarttotal)";
                $orders=mysqli_query($conn,$ordersql);
                
                $deletecartsql="delete from cart where username='$username' and product_name='$getcartproduct'";
                $deletecart=mysqli_query($conn,$deletecartsql);
                echo "<br>";
                echo "Your order has been placed successfully. We will call back to confirm your order. Thank you"; echo "<br>";
              }
          }
            
          $cart = "select * from cart where username = '$username'";
          $cartresult = mysqli_query($conn, $cart);
          $row = mysqli_num_rows($cartresult);
          
          if($row>0)
          {
              echo "<br><br><br><br>";
              echo "Your Cart:";
                echo "<br><br>";
              $cart = "select * from cart where username = '$username'";
              $cartresult = mysqli_query($conn, $cart);
              echo "<table border='1px' >";
              echo "<tr>";
              echo "<th> category </th>";
              echo "<th> product </th>";
              echo "<th> price </th>";
              echo "<th> quantity </th>";
              echo "<th> total </th>";
              echo "<th> delete </th>";
              echo "</tr>";
              while($row = mysqli_fetch_array($cartresult))
              {
                  $rowcategory=$row['category'];
                  $rowproduct=$row['product_name'];
                  
                  $price=$row['price'];
                  $quantity=$row['quantity'];
                  $total=$row['total'];
        
                  echo "<tr>";
                  echo "<td> $rowcategory </td>";
                  echo "<td> $rowproduct </td>";
                  echo "<td> $price </td>";
                  echo "<td> $quantity </td>";
                  echo "<td> $total </td>";
    
                  echo '<td>
                        <form action="cart.php" method="post">
                        <input type="hidden" name="delproduct" value='.$row['product_name'] .'>
                        <button type="submit" name="deleteproduct">Delete</button>
                        </form>
                    </td>';
       
                  echo "</tr>";
              }
              echo "</table>";
              $grandtotal = "select sum(total) as grandtotal from cart where username = '$username'";
              $carttotal = mysqli_query($conn, $grandtotal);
              $grand= mysqli_fetch_array($carttotal);
        
              echo '<p> Grand Total:' .$grand['grandtotal'].' </p>'; 
              
              echo '<form action="cart.php" method="post">
                        <input type="hidden" name="delproduct" value='.$row['product_name'] .'>
                        <button type="submit" name="placeorder" class= "login-signup" style="width:200px;">Place order</button>
                        </form>';
          }
          else
          {
              echo "<br><br>";
              echo "Your Cart is empty. Please add products to place order";
          }
            
            
    // past orders
    $oquery = "SELECT order_id FROM userorder WHERE username='$username'";
    $oarr = mysqli_query($conn,$oquery);

    ?>
    <br>
    <br>
    <h3>Past Orders: </h3>
    <table style="width:100%" border='1px' >
                                <tr>
                                    <th>Order ID</th>
                                    <th>Product Name</th>
                                    <th>Quantity</th>
                                    <th>Price</th>
                                    <th>Total</th>
                                </tr>
    
    <?php
    while($orderidarr = mysqli_fetch_array($oarr))
    {
    
     $poquery="SELECT * FROM orders WHERE order_id=" . $orderidarr['order_id'];
        $poarr = mysqli_query($conn,$poquery);
   
                                echo "<tr>";
                                while($order = mysqli_fetch_array($poarr)){
                                    
                                    echo "<td>" . $order['order_id'] . "</td>";
                                    echo "<td>" . $order['product_name'] . "</td>";
                                    echo "<td>" . $order['quantity'] . "</td>";
                                    echo "<td>" . $order['price'] . "</td>";
                                    echo "<td>" . $order['total'] . "</td>";
                                
            } // while for fetching order details in an order id
            echo "</tr>";
     } //while for fetching order ids
                       ?>
                         </table>
        
        <?php
    
    //past orders
          
        }
      else
      {
          echo "<br><br>";
          echo "Please login to add products to cart.";
      }
    ?>
    </section>
    </div>
    <?php include "rightpanel.php"; ?>
    </div>
    </div></div>
  </body>
</html>