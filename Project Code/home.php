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
        if($_SESSION['UserName'] == 'admin'){
            header("Location:Dashboard.php");
        }
    ?>
    <section class="header">
        <nav> <br>
            <div class="nav-link" id="menu">
                <i class="fas fa-times" onclick="hidemenu()" style="margin-left: 10px; margin-top: 6px;"></i>
                <ul>
                    <li><a href="Home.php">HOME</a></li>
                    <li><a href="About.php">ABOUT</a></li>
                    <li><a href="Booking.php">BOOKING</a></li>
                    <li><a href="MyReservation.php">MY RESERVATION</a></li>
                    <li><a href="Contact.php">CONTACT</a></li>
                    <li><a href="logout.php">LOGOUT</a></li>
                </ul>
            </div>
            <i class="fas fa-bars" onclick="showmenu()"></i>
        </nav>

        <div class="textbox">
            <h1>BEST BUS SERVICE OF PAKISTAN</h1>
            <p>
                Raise to the Destination <br> With Satisfied Costumers
            </p>
            <a href="Booking.html" class="hero-btn">Visit Us To Know More</a>
        </div>

    </section>

<!-------- Routes -------->

    <section class="route">
        <h1>What We Offer!</h1>
        <p1>Following are the things we offer</p1>

        <div class="row">
            <div class="course-col">
                <h3>REFRESHMENT</h3>
                <p1>Our Refreshment is a Compulsory thing. It Includes Snacks and all sorts of Drinks. And We cover that in your Bus Fare so You Don't have to Worry About Anything.</p1>
            </div>
            <div class="course-col">
                <h3>STAFF</h3>
                <p1>We Have The Best Staff. From our Drivers to Security Guards. We offer the best. They work with the Zeal and Spirit.</p1>
            </div>
            <div class="course-col">
                <h3>BUSES</h3>
                <p1>When It Comes to the catagories we provide you Something more than anyone else.We Have Exective Class Buses along with Bussiness Class and Best of them the First Class.</p1>
            </div>
        </div>
    </section>

<!-------- Destination -------->
    <section class="Routes">
        <h1>Our Main Destinations</h1>
        <p1>We Provide Our Best Services on the Following Routes</p1>

        <div class="row">
            <div class="campus-col">
                <img src="Multan.jfif">
                <div class="layer">
                    <h3>MULTAN</h3>
                </div>
            </div>
            <div class="campus-col">
                <img src="Burewala.png">
                <div class="layer">
                    <h3>BUREWALA</h3>
                </div>
            </div>
            <div class="campus-col">
                <img src="Rawalpindi.jfif">
                <div class="layer">
                    <h3>RAWALPINDI</h3>
                </div>
            </div>
        </div>
    </section>

<!-------- Testimonials -------->

    <section class="testimonials">
        <h1>What Our Costumers Say!</h1>
        <p1>Here are Some of the Reviews from Our Few Loyal Costumers</p1>

        <div class="row">
            <div class="test-col">
                <img src="user1.jpg">
                <div>
                    <p>One of the Best Experience I have had in a while. Extremely Satisfied by the Luxury bus and the Refreshment service.</p>
                    <h4>Mahnoor Ch</h4>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="far fa-star"></i>
                </div>
            </div>
            <div class="test-col">
                <img src="user2.jpg">
                <div>
                    <p> Bus service was excellent. Customer service was great. Buses were clean and comfy. Free hot beverages were very good as well. Really enjoyed their great service.</p>
                    <h4>Talha Sajid</h4>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star-half-alt"></i>
                </div>
            </div>
        </div>
    </section>

<!-------- Call to Action -------->

    <section class="cta">
        <h1>Book Your Online Tickets <br> From Anywhere in Pakistan</h1>
        <a href="Booking.php" class="hero-btn">BOOK NOW</a>
    </section>

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