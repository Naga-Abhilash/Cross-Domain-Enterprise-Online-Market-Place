<!DOCTYPE html>
<html>
<head>
     <?php include "leftpanel.php"; ?> 
    <title>My Activities</title>
    <style>
th, td {
  padding: 10px;
  text-align: left;
}

</style>
</head>
    <body>
        <div class="container">
            <div class="row">
                <div class="tm-left-right-container">
                    
            <?php
                if(isset($_COOKIE['username']) && !empty($_COOKIE['username']))
                {
                    echo "<a href='logout.php' class='tm-nav-item-link' style='float:right; margin-right:20px; font-size:24px;' >Logout</a>";
                    echo "<a href='cart.php' class='tm-nav-item-link' style='float:right; margin-right:20px;font-size:24px;' > \t ViewCart</a>";
                }
             ?>
                echo "<br>";
                echo "<br>";
                echo "<br>";
                   <!-- Right column: content -->
                    <div class="tm-right-column">
                    
                        <!--My activities display -->
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
                            if(isset($_COOKIE['username'])) 
                            {
                                $user = $_COOKIE['username'];
                                 $sql="SELECT * FROM tracking_users WHERE username='$user' ORDER BY action_date DESC";
                                 $result = mysqli_query($conn,$sql);
                            ?>
                            <table style="width:100%">
                                <tr>
                                    <th>Activity</th>
                                    <th>Date</th>
                                </tr>
                                <?php 
                                while($row = mysqli_fetch_array($result)){
                                    
                                echo "<tr>";
                                    if($row['action'] =='Visited'){
                                        $url = "productPage.php?category='" . $row['category'] . "'&product='" . $row['product_name'] . "'";
                                        echo "<td>Visited <a href=$url>" . $row['product_name'] . "</a></td>";
                                    }
                                    else
                                    {
                                       echo "<td>" . $row['action'] . "</td>";
                                    }
                                    echo "<td>" . $row['action_date'] . "</td>";
                                echo "</tr>";
                                }
                            }
                       ?>
                         </table>
                         <br><br><br><br>
                        <?php include "rightpanel.php"; ?>
                    </div> <!-- Right column: content -->
                </div>
            </div> <!-- row -->
        </div> <!-- container -->

</body>
</html>
