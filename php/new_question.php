<?php
// Grab User submitted information
$qusName = $_POST["qusName"];
$qus = $_POST["qus"];
$ipDesc = $_POST["ipDesc"];
$opDesc = $_POST["opDesc"];
$samIp = $_POST["samIp"];
$samOp = $_POST["samOp"];
$input = $_POST["input"];
$output = $_POST["output"];
//$mark = $_POST["mark"];
$level = $_POST["level"];
$filename = $_FILES["file"]["name"];

include("localdb.php");


//$filename = "question/".$_POST["file"];

switch($level)
{
	case 'Easy': 
		$level = 1; break;
	case 'Medium': 
		$level = 2; break;
	case 'Hard': 
		$level = 3; break;
	case 'Super Hard': 
		$level = 4; break;
}

$mark = $level * 5;

echo $_FILES["file"]["type"];


if (($_FILES["file"]["type"] == "application/pdf"))
 {
  if ($_FILES["file"]["error"] > 0) {
    echo "Return Code: " . $_FILES["file"]["error"] . "<br>";
  } 
  else {
    echo "Upload: " . $_FILES["file"]["name"] . "<br>";
    echo "Type: " . $_FILES["file"]["type"] . "<br>";
    echo "Size: " . ($_FILES["file"]["size"] / 1024) . " kB<br>";
    echo "Temp file: " . $_FILES["file"]["tmp_name"] . "<br>";
    if (file_exists("http://localhost/opc/upload/" . $_FILES["file"]["name"])) {
      echo $_FILES["file"]["name"] . " already exists. ";
    } else {
      move_uploaded_file($_FILES["file"]["tmp_name"],
      "http://localhost/opc/upload/" . $_FILES["file"]["name"]);
      echo "Stored in: " . "http://localhost/opc/upload/" . $_FILES["file"]["name"];
    }
  }
} else {
  die("Invalid file");
}

$sql = "INSERT INTO `questions_input` VALUES ('' , '$qusName' , '$qus' , '$samIp' , '$input' , '$samOp' , '$output','$mark','$level','$ipDesc','$opDesc','$filename')";


$result = mysql_query($sql) or die(mysql_error());

if($result= TRUE)
{
		
	print '<script type="text/javascript">alert(" Question Added");</script>';
}
else
{
	echo "Invaild Registration";
}
?>