<?php

include("localdb.php");

// Grab User submitted information
$username = $_POST["username"];
$pass = hash('md5',$_POST["users_pass"]);

session_start();

if (!isset($_SESSION['CREATED'])) {
    $_SESSION['CREATED'] = time();
}
else if (time() - $_SESSION['CREATED'] > 30) {
    // session started more than 30 minutes ago
    session_regenerate_id(true);    // change session ID for the current session and invalidate old session ID
    $_SESSION['CREATED'] = time();  // update creation time
}

$result = mysql_query("SELECT * FROM admin_details WHERE username = '$username'") or die("Sorry, your credentials are not valid, Please try again.");

$row = mysql_fetch_array($result);

if(!empty($row))
{
 if($row["username"]==$username && $row["password"]==$pass)
 {
  	$_SESSION["username"] = $username;
    header("Location: ../valid-admin.php?data=1");
 }
 else
    header("Location: ../index.php?valid=-12");
}
else
    header("Location: ./index.php?valid=-1");
?>