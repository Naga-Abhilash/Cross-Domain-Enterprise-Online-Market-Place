<?php
if (isset($_COOKIE['username']))
{
    $user = $_COOKIE['username'];
}
$category = $_POST['category'];
$product = $_POST['product'];
$star = $_POST['star'];
$review = $_POST['review'];

$servername = "localhost";
$username = "id9560178_marketadmin";
$password = "admin";
$database = "id9560178_marketplacedb";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$query = "INSERT INTO rating (username, product_name, category, star, review)
VALUES ('$user', '$product', '$category', $star, '$review' )";
$results = mysqli_query($conn, $query);

if ( $results)
{
     header("Location: productPage.php?category='$category'&product='$product'&re=true");
}
else 
{
  header("Location: productPage.php?category='$category'&product='$product'&re=false");
}

?>