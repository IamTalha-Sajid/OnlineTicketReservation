<?php
	$UserName = $_GET["UserName"];
	$Pin = $_GET["Pin"];
	$Email = $_GET["Email"];

	//Checking for Empty Fields
	if(empty($UserName) || empty($Pin) || empty($Email)){
		echo "Please fill all Fields";
		return;
	}

	//Checking So No one can SignUp as Admin
	if($UserName == "admin"){
		echo "OOPS! You Can't Create Account As Admin";
		return;
	}

    //PHP
	$myconn= mysqli_connect("localhost","root","","busreservation");
	$myquery = "SELECT * FROM users WHERE UserName='$UserName'";
	$myresult = mysqli_query($myconn,$myquery);
    $num = mysqli_num_rows($myresult);
	if($num > 0)
		echo "Username Already Exist";
	else{
		$myquery = "INSERT INTO users(UserName, Pin, Email) VALUES('$UserName','$Pin','$Email')";
		if(mysqli_query($myconn,$myquery))
			echo "Registered sucessfully";
		else
			echo mysqli_error($myconn);
	}
?>
