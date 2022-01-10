<?php

include 'DBConnect.php';

$ScheduleId = $_GET['ScheduleId'];

$deletequery = " DELETE from schedule WHERE ScheduleId=$ScheduleId";

$query = mysqli_query($myconn,$deletequery);

header('location:DashboardSchedule.php');

?>