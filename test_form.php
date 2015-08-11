<?php
  include("php/localdb.php");
  for($i=0;$i<24;$i++)
  {
	  $sql = "INSERT INTO  `dbmain`.`questions_input` (
`qusID` ,
`qusName` ,
`question` ,
`sample_input` ,
`input` ,
`sample_output` ,
`output` ,
`mark` ,
`level` ,
`input_desc` ,
`output_desc` ,
`pdf_link`
)
VALUES (
NULL ,  'asd".$i."',  'asd',  'sd',  'AS',  'asd',  'ASD',  '1',  '1',  'SADS',  'ASD',  '23'
);";
$result = mysql_query($sql) or die(mysql_error());
  }
  for($i=25;$i<49;$i++)
  {
	  $sql = "INSERT INTO  `dbmain`.`questions_input` (
`qusID` ,
`qusName` ,
`question` ,
`sample_input` ,
`input` ,
`sample_output` ,
`output` ,
`mark` ,
`level` ,
`input_desc` ,
`output_desc` ,
`pdf_link`
)
VALUES (
NULL ,  'asd".$i."',  'asd',  'sd',  'AS',  'asd',  'ASD',  '1',  '2',  'SADS',  'ASD',  '23'
);";
$result = mysql_query($sql) or die(mysql_error());
  }
  for($i=50;$i<74;$i++)
  {
	  $sql = "INSERT INTO  `dbmain`.`questions_input` (
`qusID` ,
`qusName` ,
`question` ,
`sample_input` ,
`input` ,
`sample_output` ,
`output` ,
`mark` ,
`level` ,
`input_desc` ,
`output_desc` ,
`pdf_link`
)
VALUES (
NULL ,  'asd".$i."',  'asd',  'sd',  'AS',  'asd',  'ASD',  '1',  '3',  'SADS',  'ASD',  '23'
);";
$result = mysql_query($sql) or die(mysql_error());
  }
  for($i=75;$i<99;$i++)
  {
	  $sql = "INSERT INTO  `dbmain`.`questions_input` (
`qusID` ,
`qusName` ,
`question` ,
`sample_input` ,
`input` ,
`sample_output` ,
`output` ,
`mark` ,
`level` ,
`input_desc` ,
`output_desc` ,
`pdf_link`
)
VALUES (
NULL ,  'asd".$i."',  'asd',  'sd',  'AS',  'asd',  'ASD',  '1',  '4',  'SADS',  'ASD',  '23'
);";
$result = mysql_query($sql) or die(mysql_error());
  }
?>