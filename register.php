<?php
require "init.php";

$name = $_POST["name"];
$username = $_POST["username"];
$email = $_POST["email"];
$password = $_POST["password"];

$sql = "select * from user_info where email like '$email'";

$result = mysqli_query($con,$sql);
$response = array();

if(mysqli_num_rows($result)>0)
{
	$code = "reg_failed";
	$message = "user already exist.";
	array_push($response,array("code"=>$code,"message"=>$message));
	echo json_encode($response);
}
else
{
	$sql = "insert into user_info(name,email,username,password) values('$name','$email','$username','$password')";
	$result = mysqli_query($con,$sql) or die("error:".mysqli_error($con));
	$code = "reg_success";
	$message = "thank you for your registeration. now you can login.";
	array_push($response,array("code"=>$code,"message"=>$message));
	echo json_encode($response);
	
}

mysqli_close($con);
?>