<?php

include("localdb.php");

// Grab User submitted information
$email = $_POST["users_email"];
$pass = hash('md5',$_POST["users_pass"]);


session_start();

if (!isset($_SESSION['CREATED'])) {
    $_SESSION['CREATED'] = time();
}
else if (time() - $_SESSION['CREATED'] > 10) {
    // session started more than 30 minutes ago
    session_regenerate_id(true);    // change session ID for the current session and invalidate old session ID
    $_SESSION['CREATED'] = time();  // update creation time
}

$result = mysql_query("SELECT * FROM user_details WHERE email = '$email'") or die("Sorry, your credentials are not valid, Please try again.");

$row = mysql_fetch_array($result);

if(!empty($row))
{
 if($row["email"]==$email && $row["password"]==$pass)
 {
	$_SESSION["username"] = $row["full_name"];
	$_SESSION["email"] = $row["email"];
    header("Location: ../homepage.php?data=1");
 }
 else
    header("Location: ../index.php?valid=-1");
}
else
    header("Location: ../index.php?valid=-1");
?>