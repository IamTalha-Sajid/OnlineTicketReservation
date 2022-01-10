<?php
	$UserName = $_GET["UserName"];
	$Pin = $_GET["Pin"];
	$myconn= mysqli_connect("localhost","root","","busreservation");
	$myquery = "SELECT * FROM users WHERE UserName='$UserName' AND Pin='$Pin'";
	$myresult = mysqli_query($myconn,$myquery);
    $num = mysqli_num_rows($myresult);
	if($num > 0)
	{
		$row=mysqli_fetch_array($myresult);
		
		session_start();
		$_SESSION['UserId'] = $row['UserId'];
		$_SESSION['UserName'] = $row['UserName'];
		$_SESSION['Email'] = $row['Email'];
		echo "true";
	}
	else
		echo "In-Valid Username or Password";
?>
