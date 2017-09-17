<?php

$host = "localhost";
$db_user = "Administrator";
$db_password = "P@ssw0rd";
$db_name = "user_db";

$con = mysqli_connect($host,$db_user,$db_password,$db_name);

if($con)
{
	echo "Connection success.....";
}
else
{
	echo " connection aborted";
}
?>