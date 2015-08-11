<html xmlns="http://www.w3.org/1999/xhtml">
<head>
</head>
<body bgcolor="#000099" style="color:#FFF">
<?php
  session_start();
  include("php/localdb.php");
  $email = $_SESSION['email'];
  $result = mysql_query("SELECT * FROM `user_details` WHERE `email` = '$email' LIMIT 1");
  $row = mysql_fetch_array($result);
  $name = $row['full_name'];
  $mark = $row['email'];
?>
  
</body>
</html>