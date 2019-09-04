<?php

function redirect($url, $value, $key) {
  $html = "<html><body><form id='form' action='$url' method='post'>";
    $html .= "<input type='hidden' name='status' value=$value>";
    $html .= "<input type='hidden' name='marketuser' value=$key>";
  $html .= "</form><script>document.getElementById('form').submit();</script>";
  $html .= "</body></html>";
  print($html);
}

$servername = "localhost";
        $username = "id9560178_marketadmin";
        $password = "admin";
        $database = "id9560178_marketplacedb";
        //$conn = new mysqli($servername, $username, $password, $database);
        $conn = mysqli_connect($servername, $username, $password, $database);

//session_start();

	$site = $_GET['site'];
	if($site==="makeup")
	{
	    $key = $_GET['key'];
	    
	    
        $userkey = base64_decode($key);
        $userinfo = explode(";", $userkey);
        $user = $userinfo[0];
        $PASS = $userinfo[1];
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
	    $query = "SELECT * from users WHERE username= '$user' AND password ='$PASS' ;";
        $results = mysqli_query($db, $query);
        //echo mysqli_num_rows($result);
        if ($results->num_rows > 0)
	    {
	        $cookie_name = "marketuser";
            $cookie_value = $key;
            setcookie($cookie_name, $cookie_value, time() + (86400 * 30), '/'); // 86400 = 1 day
            setcookie("username", $user, time() + (86400 * 30), '/'); // 86400 = 1 day
            redirect("http://janakidwadasi.xyz/goGirls/index.php", "success", $key);	        
	    }
	    else
	    {
	        redirect("http://janakidwadasi.xyz/goGirls/index.php", "failure", "");	 
	    }
	    

	}
	else if($site==="market")
	{
	    $key = $_GET['key'];
      //  echo $key;
$userkey = base64_decode($key);
$userinfo = explode(";", $userkey);
$user = $userinfo[0];
$PASS = $userinfo[1];
//echo "<br>";
//echo $user;
//echo "<br>";
//echo $PASS;
//echo "<br>";
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
	    $query = "SELECT * from users WHERE username='$user' and password='$PASS'";
        $results = mysqli_query($conn, $query);
        $num_rows = mysqli_num_rows($results);
        //echo $num_rows;
        if ($num_rows > 0)
	    {
	      // $_SESSION['marketuser'] = $key;
	        $cookie_name = "marketuser";
            $cookie_value = $key;
            setcookie($cookie_name, $cookie_value, time() + (86400 * 30), '/'); // 86400 = 1 day
            $userkey = base64_decode($key);
	        $userinfo = explode(";", $userkey);
	        $user = $userinfo[0];
            setcookie("username", $user, time() + (86400 * 30), '/'); // 86400 = 1 day
            $trackingUserSql = "INSERT INTO tracking_users (username,action,action_date)
                  VALUES ('$user','Login',NOW())";
            $trackingUserResult = mysqli_query($conn, $trackingUserSql);
            // $_SESSION['username'] = $user;
	    }
        header("Location: index.php");	    
	}

?>