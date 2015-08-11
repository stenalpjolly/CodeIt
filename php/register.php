<?php

include("localdb.php");

// Grab User submitted information
$full_name = $_POST["full_name"];
$email = $_POST["email"];
$pass = hash('md5',$_POST["pass"]);
$phone = $_POST["phone"];
$college = $_POST["college"];

function UniqueRandomNumbersWithinRange($min, $max, $quantity) {
    $numbers = range($min, $max);
    shuffle($numbers);
    return array_slice($numbers, 0, $quantity);
}

$array =  UniqueRandomNumbersWithinRange(0,24,10);

$sql = "INSERT INTO `user_details` VALUES ('$full_name', '$email', '$pass', '$phone', '$college', '0', '1','0')";

$result = mysql_query($sql) or die(mysql_error());

$sql ="";


if($result== TRUE)
{
	for($i=0;$i<10;$i++)
	{
		$sql_request_easy = "Select qusID,level from questions_input where level='1' limit ".$array[$i].",1;";
		$result = mysql_query($sql_request_easy) or die(mysql_error());
		$row = mysql_fetch_array($result);
		$qusID[1][$i] = $row["qusID"];
		$level[1][$i] = $row["level"];
		
		$sql_request_medium = "Select qusID,level from questions_input where level='2' limit ".$array[$i].",1;";
		$result = mysql_query($sql_request_medium) or die(mysql_error());
		$row = mysql_fetch_array($result);
		$qusID[2][$i] = $row["qusID"];
		$level[2][$i] = $row["level"];
		
		$sql_request_hard = "Select qusID,level from questions_input where level='3' limit ".$array[$i].",1;";
		$result = mysql_query($sql_request_hard) or die(mysql_error());
		$row = mysql_fetch_array($result);
		$qusID[3][$i] = $row["qusID"];
		$level[3][$i] = $row["level"];
		
		$sql_request_super_hard = "Select qusID,level from questions_input where level='4' limit ".$array[$i].",1;";
		$result = mysql_query($sql_request_super_hard) or die(mysql_error());
		$row = mysql_fetch_array($result);
		$qusID[4][$i] = $row["qusID"];
		$level[4][$i] = $row["level"];
	}
	for($i=0;$i<10;$i++)
	{
		for($j=1;$j<=4;$j++)
		{
  			$sql = "INSERT INTO `questions_assigned` VALUES ('', '$email','".($qusID[$j][$i])."','".($level[$j][$i])."','0');";
			$result = mysql_query($sql) or die(mysql_error());
			echo $array[$j][$i]."\n";
		}
	}
	    $Message = "Successful Registration";
 		header("Location: ../index.php?Message=" . urlencode($Message));
		
}
else
{
	echo "Invaild Registration";
}
?>