<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="css/style.css"/>
<link rel="stylesheet" href="http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css" />
<title>CodeIT || Online Programming Contest</title>
</head>

<body>
<?php
 session_start();
 if (time() - $_SESSION['CREATED'] > 1800) {
      session_destroy();
	  header("Location: index.php?valid=-1");
 }
 else
 {
	$_SESSION['CREATED'] = time(); 
 }
 if(isset($_GET['level']))
	 $level = $_GET['level'];
 else
   $level = 1;
 if ($level>4 or $level<1)
   $level = 1;
?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td class="header"><p style="color:#000"><strong>M A COLLEGE OF ENGINEERING, KOTHAMANGALAM<br />
    ONLINE PROGRAMMING CONTEST</strong></p>
    </td>
  </tr>
  <tr>
    <td class="nav">
    <hr />
    <ul class="menu">

    <li> <a href="?data=1#" class="menu">Home</a></li>
    <li> <a href="?data=2#" class="menu">Question</a></li>
    <li> <a href="?data=3#" class="menu">Submit answer</a></li>
    <li> <a href="?data=4#" class="menu">Contact Us</a></li>
    <li> <a href="?data=5#" class="menu">FAQ</a></li>
    
    </ul> <hr /></td>
  </tr>
  <tr>
    <td>
    <?php
  //session_start();
  include("php/localdb.php");
  $email = $_SESSION['email'];
  $result = mysql_query("SELECT * FROM `user_details` WHERE `email` = '$email' LIMIT 1");
  $row = mysql_fetch_array($result);
  $name = $row['full_name'];
  $mark = $row['marks'];
?>
    <center><br />
    <?php
	echo "Name : ".$name."&nbsp;&nbsp;&nbsp;&nbsp;||&nbsp;&nbsp;&nbsp;&nbsp;EmailID : ".$email."&nbsp;&nbsp;&nbsp;&nbsp;||&nbsp;&nbsp;&nbsp;&nbsp;Mark : <strong>".$mark."</strong>";
    ?></center>
    <hr /></td>
  </tr>
  <tr>

    <td class="content">
    <div id="data_content" class="data_content">
    <?php
	if(isset($_GET["data"]) or isset($_GET['level']))
	{
		if(isset($_GET["data"]))
     		$data = $_GET["data"];
		else
			$data = 2;
		switch ($data)
		{
			case 1:
			  echo '<center>';
			  echo '<p style="margin-top:15px;"><h3>Welcome '.$_SESSION["username"].'</h3></p><p style="text-decoration:underline"><h2>INSTRUCTIONS</h2></p>';
			   echo '</center>';
			  ?>
              <p align="left" class="qus_data" style="margin-left:17%;font-size:17px">"Code It" is an online individual event that comprises of questions of four difficulty levels. Each participant can attempt questions from any of the four levels at the same time.
</p>
<p align="left" class="qus_data" style="margin-left:17%;line-height:20px;font-size:17px">
1. It is an online individual event.<br />
2. Participants will have to register at the website before participating.<br />
3. The source code for the solution will have to be submitted.<br />
4. The problems will be of three difficulty levels - Easy, Medium, Hard and Super Hard.<br />
5. Points will be awarded according to the difficulty level.<br />
6. All code will have to be written from scratch. Participants may not take the aid of the internet or another participant's code.<br />
7. Instructions are subjected to change at anytime <br />

		     </p>
              <?php
			  break;
			case 2:
			  ?>
			  <div class="question-section" style="margin-left:17%;margin-top:30px">
              <p><h3>...QUESTION...</h3></p>
              <form name="diffcult" action="#">
                <select name="level" size="1" style="width:70%" onchange="this.form.submit()">
                <option value="1" <?php 
                if($level==1)
                  echo 'selected="selected"';
                 ?>>Easy</option>
                <option value="2"<?php 
                if($level==2)
                  echo 'selected="selected"';
                 ?>>Medium</option>
                <option value="3"<?php 
                if($level==3)
                  echo 'selected="selected"';
                 ?>>Hard</option>
                <option value="4"<?php 
                if($level==4)
                  echo 'selected="selected"';
                 ?>>Super Hard</option>
                </select><br /><br />
			  </form>
              <?php
			 // include("php/localdb.php");
			  $result = mysql_query("SELECT * FROM questions_assigned WHERE email = '".$_SESSION["email"]."' and level ='".$level."' and status='0' limit 1");// or die("Sorry, your credentials are not valid, Please try again.");
			  

			  $row = mysql_fetch_array($result);
			  
			  if(empty($row))
			  {
				  ?>
                  No More Questions avaliable in this section...If this is an error contact us.
                  <?php
			  }
			  else
			  {
				  $qusID = $row["questionID"];
				  $result = mysql_query("SELECT * FROM  `questions_input` WHERE  `qusID` =  '".$qusID."'") or die("Sorry, No Questions Available");
				  $row = mysql_fetch_array($result);
				  echo "Question ID: ".$qusID;
				  ?>
                  <div class="question qus_data">
                  <?php
				  echo $row["question"];
				  ?>
                  </div>
                  <div class="input-description qus_data">
                  <?php
				  echo $row["input_desc"];
				  ?>
                  </div>
                  <div class="output-description qus_data">
                  <?php
				  echo $row["output_desc"];
				  ?>                  
                  </div>
                  <div class="sample-input qus_data">
                  <?php
				  echo $row["sample_input"];
				  ?>                  
                  </div>
                  <div class="sample-output qus_data">
                  <?php
				  echo $row["sample_output"];
				  ?>                  
                  </div>
                  <?php
			  }
			  ?>
              </div>
              <?php
			  break;
			case 3:
			  ?>
              <!--------------------------------Compiler ------------------->
              <div id="wrapper" class="wapper" style="margin-top:50px;">
                <form id="code" action="#" method="post" style="margin-left:23%">
                    <div>
                    	<label for="questionID">Question ID: </label><input id="questionID" name="questionID" type="text" />
                    </div>
                    <div>
                        <label for="lang">Select Language:</label><br />
                        <select name="lang" id="lang" class="span6">
                            <option value="11" selected="selected">C (gcc-4.8.1)</option>
                            <option value="27">C# (mono-2.8)</option>
                            <option value="1">C++ (gcc-4.8.1)</option>
                            <option value="44">C++11 (gcc-4.8.1)</option>
                            <option value="10">Java (sun-jdk-1.7.0_25)</option>
                        </select> 
                    </div> 
                    
                    <div>
                        <label for="source">Source Code:</label><br />
                        <textarea class="span6" cols="40" rows="15" name="source" id="source" placeholder="Paste/Type Code Here"></textarea>
                    </div>
                    
                    <div style="width:70%;margin-top:10px;"><center>
                        <input type="submit" name="submit" class="btn btn-success btn-large" value="Submit" />
                        </center>
                    </div>
                </form>
                
                <div id="response">
                    <center>
                    <div class="output"></div>
                    </center>
                </div>
              <!--------------------------------/Compiler------------------->
              <?php
			  break;
			default:
			  header("Location : index.php?vaild=-1");
		}
	}
//	else
//       header("Location: index.php?valid=-15");
	?></div>
    </td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td colspan="3">&nbsp;</td>
  </tr>
</table>
   </div>
    </td>
  </tr>
</table>
<script type="text/javascript" src="js/jquery-1.11.0.min.js"></script>
<script src="js/script.js"></script>
</body>
</html>