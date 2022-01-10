<?php 

$myconn = mysqli_connect("localhost", "root", "", "busreservation");

if (!$myconn) {
    die("<script>alert('Connection Failed.')</script>");
}

?>