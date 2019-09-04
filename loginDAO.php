<?php
$firstname = $_POST['username'];
$password = $_POST['password'];
$key = base64_encode($firstname.";".$password);
header("Location: /authenticateUser.php?key=$key&site=market");
?>