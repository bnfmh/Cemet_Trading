<?php
require "init.php";

$username = $_POST["username"];
$password = $_POST["password"];

$sql = "select name,email from user_info where username like '$username' and password like '$password'";

$result = mysqli_query($con,$sql) or die("error:".mysqli_error($con));
$response = array();
if(mysqli_num_rows($result)>0)
{
	$row = mysqli_fetch_row($result);
	$name = $row[0];
	$email = $row[1];
	$code = "login success";
	array_push($response,array("code"=>$code,"name"=>$name,"email"=>$email));
	echo json_encode($response);
}
else{
	$code = "login failed";
	$message = "user not found.try again";
	array_push($response,array("code"=>$code,"message"=>$message));
	echo json_encode($response);
}
mysqli_close($con);

 
?>