<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WAINS TRANSPORT</title>
    <link rel="stylesheet" href="Style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
</head>
<body>
<?php
    session_start();
    if(!(isset($_SESSION['UserId']) && !empty($_SESSION['UserId']))){
        header("Location:login.html");
    }
?>
    <section class="sub-header">
        <nav> <br>
            <div class="nav-link" id="menu">
                <i class="fas fa-times" onclick="hidemenu()" style="margin-left: 10px; margin-top: 6px;"></i>
                <ul>
                    <li><a href="home.php">HOME</a></li>
                    <li><a href="About.php">ABOUT</a></li>
                    <li><a href="Booking.php">BOOKING</a></li>
                    <li><a href="MyReservation.php">MY RESERVATION</a></li>
                    <li><a href="Contact.php">CONTACT</a></li>
                    <li><a href="logout.php">LOGOUT</a></li>
                </ul>
            </div>
            <i class="fas fa-bars" onclick="showmenu()"></i>
            
        </nav>

        <h1>MY RESERVATION</h1>

    </section>

<!-------- Table -------->
    
<div class="detailsReservation">
    <div class="recentReservation">
        <div class="cardHeader">
            <h2>My Reservation</h2><br>
        </div>
        <table>
            <thead>
                <tr>
                    <th>User Name</th>
                    <th>Origin</th>
                    <th>Destination</th>
                    <th>Departure</th>
                    <th>Fare</th>
                    <th>Seat Number</th>
                    <th>Date</th>
                    <th>Delete</th>
                    <th>Print</th>
                </tr>
            </thead>
            <tbody>

            <?php
            include 'DBConnect.php';

            $selectquery = "SELECT * FROM Reservation JOIN Schedule on schedule.ScheduleId = Reservation.ScheduleId WHERE reservation.userId = ".$_SESSION['UserId'];

            $query = mysqli_query($myconn,$selectquery);

            $nums = mysqli_num_rows($query);

            while($res = mysqli_fetch_array($query)){
            
            ?>

                <tr>
                    <td><?php echo $_SESSION['UserName']?></td>
                    <td><?php echo $res['Origin']?></td>
                    <td><?php echo $res['Destination']?></td>
                    <td><?php echo $res['Departure_time']?></td>
                    <td><?php echo $res['Fare']?></td>
                    <td><?php echo $res['SeatNo']?></td>
                    <td><?php echo $res['Dep_Date']?></td>
                    <td><a href="DeleteReservation.php?ReservationId=<?php echo $res['ReservationId']; ?>" data-toggle="tooltip" data-placement="buttom" title="DELETE"></title></data-toggle><i class="fas fa-trash" style="text-align-last: center;"></i></a></td>
                    <td><a href="PrintTicket.php?ReservationId=<?php echo $res['ReservationId']; ?>" data-toggle="tooltip" data-placement="buttom" title="PRINT"></title></data-toggle><i class="fas fa-print" style="text-align-last: center;"></i></a></td>
                </tr>

            <?php

            }

            ?>

            </tbody>
        </table>
    </div>
</div>

<!-------- Footer -------->

    <section class="footer">
        <h5>About Us</h5>
        <p1>WAINS TRANSPORT provide transportation and logistics services all over Pakistan <br>
            with a track record of outstanding comfort, security and responsibility, playing<br>
            a vital role in economic growth of country.</p1>
        <div class="icons">
            <i class="fab fa-facebook-f"></i>
            <i class="fab fa-twitter"></i>
            <i class="fab fa-instagram"></i>
            <i class="fab fa-linkedin-in"></i>
        </div>
        <p1>Made by Talha Sajid</p1>
    </section>

<!-------- Javascript -------->
<script>

    function showmenu(){
        var c = document.getElementById("menu")
        c.style.right = "0"
    }

    function hidemenu(){
        var c = document.getElementById("menu")
        c.style.right = "-200px"
    }
</script>

</body>
</html>