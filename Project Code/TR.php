<?php
    session_start();
    if(!(isset($_SESSION['UserId']) && !empty($_SESSION['UserId']))){
        header("Location:login.html");
    }

    $myconn= mysqli_connect("localhost","root","","busreservation");


	$myquery = "SELECT COUNT * FROM Reservation";

	$myresult = mysqli_query($myconn,$myquery);

    echo $myresult;
    