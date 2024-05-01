<?php
@session_start();
// if(!isset($_POST['_token'])){
// $_SESSION['_token'] = md5(time(). rand(0,9999));}
// $session_token=$_SESSION['_token'];


$db_host = "localhost";
$db_user = "ibgnapyt_sdp";
$db_password = "syOg0QhqneCf";
$db_name = "ibgnapyt_uni";


$db= new PDO("mysql:host=localhost;dbname=ibgnapyt_uni; charset=utf8mb4",'ibgnapyt_sdp','syOg0QhqneCf');


$conn=mysqli_connect("$db_host", "$db_user", "$db_password", "$db_name");
$conn->set_charset("utf8");
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

try{

	$db= new PDO("mysql:host=$db_host;dbname=$db_name; charset=utf8mb4",''.$db_user.'',''.$db_password.'');

  }
  catch(PDOExpception $e){

	  echo $e->getMessage();
  }
?>


<?php 
	date_default_timezone_set("Asia/Baku");

 $bugunu = date('Y-m-d');
 $busaat = date('H:i:s');
 

			
			
					
			?>