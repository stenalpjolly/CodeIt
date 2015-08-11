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

    <li> <a href="?data=1#" class="menu">HOME</a></li>
    <li> <a href="?data=2#" class="menu">Add Question</a></li>
    <li> <a href="?data=3#" class="menu">View Status</a></li>
    <li> <a href="?data=4#" class="menu">Edit/Delete Question</a></li>
    
    </ul> <hr /></td>
  </tr>
  <tr>

    <td class="content">
    <div class="data_content">
    <?php
	if(isset($_GET["data"]))
	{
		$data = $_GET["data"];
		switch ($data)
		{
			case 1:
			  echo '<center>';
			  echo '<p style="margin-top:100px;"><h3>Welcome '.$_SESSION["username"].'</h3></p>';
			  echo '</center>';
			  break;
			case 2:
			  ?>
        <p align="justify" style="margin-top:10px;">
                <form action="php/new_question.php" method="POST" enctype="multipart/form-data" style="margin-left:150px">
                  Question Name : <br />
                  <input name="qusName" type="text" id="qusName" style="width:1000px" />
                  <br />
                  Question :<br />
                  <textarea name="qus" rows="7" id="qus" style="width:1000px"></textarea>
                  <br />
                  Input Description :<br />
                  <textarea name="ipDesc" rows="5" id="ipDesc" style="width:1000px"></textarea>
                  <br />
                  Output Description :<br /><textarea name="opDesc" rows="5" id="opDesc" style="width:1000px"></textarea>
                  <br />
                  Sample Input :<br /><textarea name="samIp" rows="5" id="samIp" style="width:1000px"></textarea>
                  <br />
                  Sample Output :<br /><textarea name="samOp" rows="5" id="samOp" style="width:1000px"></textarea>
                  <br />
                  Input :<br /><textarea name="input" rows="5" id="input" style="width:1000px"></textarea>
                  <br />
                  Output :<br /><textarea name="output" rows="5" id="output" style="width:1000px"></textarea>
                  <br />
<!--                  Mark <br />
                  <select name="mark" id="mark" style="width:1000px">
                    <option>5</option>
                    <option>10</option>
                    <option>15</option>
                    <option>20</option>
                  </select>
                  <br /> -->
                  Level :<br />
                  <select name="level" id="level" style="width:1000px">
                    <option>Easy</option>
                    <option>Medium</option>
                    <option>Hard</option>
                    <option>Super Hard</option>
                  </select>
                  <br />
                  PDF :<br /><input type="file" name="file" id="file" value="Browse"/>
                  <p align="left"><input name="submit" type="submit" value="SUBMIT" />&nbsp;&nbsp;<input name="cancel" type="button" value="CANCEL" /></p>
        </form>
              </p>
			  <?php
			  break;
			case 3:
			  echo "Request for 3";
			  break;
			default:
			  header("Location : index.php?vaild=-1");
		}
	}
	else
       header("Location: index.php?valid=-1");
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
</body>
</html>