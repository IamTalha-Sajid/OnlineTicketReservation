<?php

include 'DBConnect.php';

$BusId = $_GET['BusId'];

$deletequery = " DELETE from bus WHERE BusId=$BusId";

$query = mysqli_query($myconn,$deletequery);

header('location:DashboardBus.php');

?>