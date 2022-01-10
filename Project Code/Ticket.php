<?php
    session_start();
    if(!(isset($_SESSION['UserId']) && !empty($_SESSION['UserId']))){
        header("Location:login.html");
    }

    $Sid = $_GET["ScheduleId"];
    $UserId = $_SESSION['UserId'];
    $myconn= mysqli_connect("localhost","root","","busreservation");


	$myquery = "SELECT bus.TotalSeats FROM schedule join bus on schedule.BusId = bus.BusId WHERE schedule.ScheduleId = $Sid";
	$myresult = mysqli_query($myconn,$myquery);
    $res = mysqli_fetch_array($myresult);
    $TotalSeats = $res['TotalSeats'];

    $myquery = "SELECT COUNT(SeatNo) as 'Allocated' FROM reservation join schedule on reservation.ScheduleId = schedule.ScheduleId WHERE schedule.ScheduleId = $Sid";
	$myresult = mysqli_query($myconn,$myquery);
    $res = mysqli_fetch_array($myresult);
    $Allocated = $res['Allocated'];

    if($Allocated == $TotalSeats){
        echo "No seat available";
        return;
    }
    for($i=1; $i<=$TotalSeats; $i++){
        $myquery = "SELECT 'SeatNo' FROM reservation join schedule on reservation.ScheduleId = schedule.ScheduleId WHERE schedule.ScheduleId = $Sid AND SeatNo = $i";
        $myresult = mysqli_query($myconn,$myquery);
        $Available = mysqli_num_rows($myresult);
        if($Available == 0){
            break;
        }
    }
    $SeatNo = $i;

    $myquery = "INSERT INTO reservation(ScheduleId, UserId, SeatNo) VALUES($Sid, $UserId, $SeatNo)";
    if(mysqli_query($myconn,$myquery)){
        echo "Dear " . $_SESSION['UserName'];
        echo "\nSeat No. " . $SeatNo . " is reserved for you sucessfully";
    }
	else
		echo mysqli_error($myconn);
?>