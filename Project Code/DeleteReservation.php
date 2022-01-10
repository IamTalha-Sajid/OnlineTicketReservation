<?php

include 'DBConnect.php';

$ReservationId = $_GET['ReservationId'];

$deletequery = " DELETE from Reservation WHERE ReservationId=$ReservationId";

$query = mysqli_query($myconn,$deletequery);

header('location:MyReservation.php');

?>