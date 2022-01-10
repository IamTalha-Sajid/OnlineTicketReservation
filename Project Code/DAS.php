<?php

	$Origin = $_GET["Origin"];
	$Destination = $_GET["Destination"];
    $Departure = $_GET["Departure_time"];
	$Fare = $_GET["Fare"];
    $BusId = $_GET["BusId"];
	$Datel = $_GET["Dep_Date"];
	$myconn= mysqli_connect("localhost","root","","busreservation");
	$myquery = "SELECT * FROM schedule WHERE Origin='$Origin' AND Destination='$Destination' AND Departure_time='$Departure' AND Dep_Date='$Datel'";
	$myresult = mysqli_query($myconn,$myquery);
    $num = mysqli_num_rows($myresult);
	if($num > 0)
		echo "Same Schedule Exist";
	else{
		$myquery = "INSERT INTO schedule(Origin, Destination, Departure_time, Fare, BusId, Dep_Date) VALUES('$Origin','$Destination','$Departure','$Fare',$BusId,'$Datel')";
		if(mysqli_query($myconn,$myquery))
			echo "Schedule Added Successfully";
		else
			echo mysqli_error($myconn);
	}
?>
