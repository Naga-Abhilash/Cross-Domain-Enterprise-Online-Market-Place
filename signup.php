<?php
$servername = "localhost";
$username = "id9560178_marketadmin";
$dbpassword = "admin";
$dbname = "id9560178_marketplacedb";

// Create connection
$conn = mysqli_connect($servername, $username, $dbpassword, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$username = $_POST['uname'];
$cellphone = $_POST['phone'];
$email = $_POST['email'];
$password = $_POST['psw'];

$search = "SELECT username FROM users WHERE username=?";
$stmt = $conn->prepare($search);
     $stmt->bind_param("s", $username);
     $stmt->execute();
     $stmt->bind_result($username);
     $stmt->store_result();
     $result_count = $stmt->num_rows;
     if ($result_count==0)
     {
        $insert = "INSERT INTO users (username,email,password,phone) values('$username','$email','$password','$cellphone')";
        $insertaql=mysqli_query($conn,$insert);
        
			header("Location: index.php?registered=1"); 
     }
     else
     {
			header("Location: index.php?registered=0"); 
     }
$stmt->close();
$conn->close();

?>