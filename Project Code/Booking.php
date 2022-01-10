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

        <h1>BOOK NOW</h1>

    </section>

<!-------- Contact -------->
    
<section class="booking">
    <h1>Select Route</h1>
    <p1>Choose The Origin and Destination of your Route</p1>
    <br><br>
    <div class="rowb">
        <div class="Origin">
            <select name="Origin" class="Dropdown" style="text-align-last: center;">
            <option>Origin - Destination</option>
                <?php    
                    $myconn= mysqli_connect("localhost","root","","busreservation");
                    $query = "SELECT DISTINCT CONCAT(Origin, CONCAT(' - ', Destination)) as 'Routel' FROM schedule";
                    $result = mysqli_query($myconn, $query);

                    if($result)
                        {
                        while($row=mysqli_fetch_array($result))
                            {
                                $Route = $row["Routel"];
                                echo"<option>$Route</option>";
                            }
                        }
                ?>
            </select><br>
            <input type="button" value="Search Bus" onclick="SearchRoute()" class="hero-btn blue-btn" style="margin-top: 50px;">
        </div>
        <span id="spnTable">

        </span>
            
    </div>
</section>

<span id="spnTable">

</span>



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
    function SearchRoute(){
        Bus = document.getElementsByName("Origin")[0].value;
        const myArr = Bus.split(" - ");
        Origin = myArr[0];
        Destination = myArr[1];

        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function(){
            if( this.readyState == 4 && this.status == 200){
                document.getElementById('spnTable').innerHTML = this.responseText;
            }
        }
        xmlhttp.open("GET","Search.php?Origin="+Origin+"&Destination="+Destination,true);
        xmlhttp.send();
    }
    function ReserveSeat(ScheduleId){
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function(){
            if( this.readyState == 4 && this.status == 200){
                alert(this.responseText);
                location.href = "Booking.php";
            }
        }
        xmlhttp.open("GET","Ticket.php?ScheduleId="+ScheduleId,true);
        xmlhttp.send();
    }

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