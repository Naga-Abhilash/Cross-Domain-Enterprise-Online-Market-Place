<?php

if(!isset($_COOKIE['username'])) {
    echo "Cookie named '" . $cookie_name . "' is not set!";
} else {
    // db connection to track user logout activity
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
    $user=$_COOKIE['username'];
    setcookie('username', "", time() - 3600,'/');
    $trackingUserSql = "INSERT INTO tracking_users (username,action,action_date)
                  VALUES ('$user','Logout',NOW())";
    $trackingUserResult = mysqli_query($conn, $trackingUserSql);
}
if(!isset($_COOKIE['marketuser'])) {
    echo "Cookie named '" . $cookie_name . "' is not set!";
} else {
    setcookie('marketuser', "", time() - 3600,'/');
}


if(isset($_GET['site']))
{
    if($site==="makeup")
	{
	    header("Location: http://janakidwadasi.xyz/goGirls/index.php");
	    exit();
	}
}
else
{
        header("Location: index.php"); /* Redirect browser */
        exit();
}

?>