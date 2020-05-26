<?php 
	if(isset($_POST['send'])){
	$connect = mysqli_connect('localhost' , 'root' , '' , 'transporting');
	$email  = $_POST['email'];
	// echo $email;
	$insert = "INSERT INTO subscribers (email)VALUES('$email')";
	mysqli_query($connect , $insert);
	echo "<script>alert('Your Subscription was Successful check your email')</script>";
	header('refresh:0;url=http://localhost/transporting/%7findex.php');
 }else{
 	echo 'Wrong';
 }
 ?>