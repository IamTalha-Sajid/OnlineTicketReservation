<?php

	$BusNo = $_GET["BusNo"];
	$BusType = $_GET["BusType"];
	$myconn= mysqli_connect("localhost","root","","busreservation");
	$myquery = "SELECT BusId FROM bus WHERE BusNo = '$BusNo' AND BusType = '$BusType'";
	$myresult = mysqli_query($myconn,$myquery);
	if($myresult)
    {
        $row=mysqli_fetch_array($myresult);
        echo $row["BusId"];
    }
	else
		echo "-1";
?>