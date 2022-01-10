<?php

	$BusNo = $_GET["BusNo"];
	$BusType = $_GET["BusType"];
    $TotalSeats = $_GET["TotalSeats"];
	$myconn= mysqli_connect("localhost","root","","busreservation");
	$myquery = "SELECT * FROM bus WHERE BusNo='$BusNo'";
	$myresult = mysqli_query($myconn,$myquery);
    $num = mysqli_num_rows($myresult);
	if($num > 0)
		echo "Same Bus Exist";
	else{
		$myquery = "INSERT INTO bus(BusNo, BusType, TotalSeats) VALUES('$BusNo','$BusType','$TotalSeats')";
		if(mysqli_query($myconn,$myquery))
			echo "Bus Added Successfully";
		else
			echo mysqli_error($myconn);
	}
?>