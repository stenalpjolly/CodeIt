<?php
//error_reporting(0);
session_start();

include("php/localdb.php");

$result_sql = mysql_query("SELECT api_user,balance FROM admin_details order by balance desc limit 1") or die("Sorry, your credentials are not valid, Please try again.");

$row = mysql_fetch_array($result_sql);

if( empty($result_sql) )
  echo json_encode( "Something not right" );
/////////////////////////////////

$user = $row["api_user"];
$balance = $row["balance"] - 1;

$pass = 'Hack2H377**';
$code = '';
$input = '';
$run = true;
$private = false;

$email = $_SESSION["email"];
$questionID = $_POST["questionID"];


$result_sql = mysql_query("UPDATE admin_details SET balance='$balance' WHERE api_user='$user'") or die("Sorry, your credentials are not valid, Please try again.");

if(!$result_sql)
    echo json_encode( "Something not right" );
	
$result_sql = mysql_query("SELECT * FROM  `questions_assigned` WHERE  `email` =  '$email' AND  `questionID` = $questionID AND  `status` =0");

if(mysql_num_rows($result_sql) > 0)
   $valid_question = TRUE;
else
   $valid_question = FALSE;
   
$subStatus = array(
    0 => 'Success',
    1 => 'Compiled',
    3 => 'Running',
    11 => 'Compilation Error',
    12 => 'Runtime Error',
    13 => 'Timelimit exceeded',
    15 => 'Success',
    17 => 'memory limit exceeded',
    19 => 'illegal system call',
    20 => 'internal error'
);

$error = array(
    'status' => 'error',
    'output' => 'Something went wrong :('
);

//echo json_encode( array( 'hi', 1 ) ); exit;
//print_r( $_POST ); exit;

$result_sql =  mysql_query("SELECT * FROM `questions_input` WHERE `qusID` = '$questionID'") or die("Invaild Question");

$result_array = mysql_fetch_array($result_sql);

$required_output = $result_array['output'];

if ( !empty($required_output) && $valid_question){//isset( $_POST['process'] ) && $_POST['process'] == 1 ) {

    $lang = isset( $_POST['lang'] ) ? intval( $_POST['lang'] ) : 11;
    $input = trim( $result_array['input'] );
	$mark = $result_array['mark'];
    $code = trim( $_POST['source'] );

    $client = new SoapClient( "http://ideone.com/api/1/service.wsdl" );

    //create new submission
    $result = $client->createSubmission( $user, $pass, $code, $lang, $input, $run, $private );

    //if submission is OK, get the status
    if ( $result['error'] == 'OK' ) {
        $status = $client->getSubmissionStatus( $user, $pass, $result['link'] );
        if ( $status['error'] == 'OK' ) {

            //check if the status is 0, otherwise getSubmissionStatus again
            while ( $status['status'] != 0 ) {
                sleep( 3 ); //sleep 3 seconds
                $status = $client->getSubmissionStatus( $user, $pass, $result['link'] );
            }

            //finally get the submission results
            $details = $client->getSubmissionDetails( $user, $pass, $result['link'], true, true, true, true, true );
            if ( $details['error'] == 'OK' ) {
                //print_r( $details );
                if ( $details['status'] < 0 ) {
                    $status = 'waiting for compilation';
                } else {
                    $status = $subStatus[$details['status']];
                }
				$print_output = "";
				
			    if (trim($details['output']) == trim($required_output))
				{
				 	$result = mysql_query("UPDATE `questions_assigned` SET `status` =1 WHERE  `email` =  '$email' AND  `questionID` = $questionID") or die("Sorry, Something went wrong");
					$result =  mysql_query("UPDATE `user_details` SET marks = marks+$mark WHERE `email` = '$email'") or die("Sorry, Something went wrong");
				    $print_output = "Congratulation..Your Answer is right";
				}
				else
					$print_output = "Sorry, Wrong Output..Try Again..You can do it..";
					
                $data = array(
                    'status' => 'success',
                    'meta' => "Status: $status | Memory: {$details['memory']} | Returned value: {$details['status']} | Time: {$details['time']}s",
                    'output' => htmlspecialchars( $print_output ),
                    'raw' => $details
                );
                
				
				
                if( $details['cmpinfo'] ) {
                    $data['cmpinfo'] = $details['cmpinfo'];
                }
                
                echo json_encode( $data );
            } else {
                //we got some error :(
                //print_r( $details );
                echo json_encode( $error );
            }
        } else {
            //we got some error :(
            //print_r( $status );
            echo json_encode( $error );
        }
    } else {
        //we got some error :(
        //print_r( $result );
        echo json_encode( $error );
    }
}
else 
{
       //we got some error :(
        //print_r( $result );
		$error = array(
			'status' => 'error',
			'output' => 'Invalid Question'
		);
       echo json_encode( $error );
}
