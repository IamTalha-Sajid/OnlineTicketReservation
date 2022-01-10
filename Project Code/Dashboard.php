<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Dashboard</title>
        <link rel="stylesheet" href="StyleDashboard.css">
        <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
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
        <div class="container">
            <div class="navigation">
                <ul>
                    <li>
                        <a href="Dashboard.php">
                            <span class="Icon"><i class="fas fa-bus"></i></span>
                            <span class="Title"><h2>WAINS</h2></span>
                        </a>
                    </li>
                    <li>
                        <a href="Dashboard.php">
                            <span class="Icon"><i class="fas fa-home"></i></span>
                            <span class="Title">Dashboard</span>
                        </a>
                    </li>
                    <li>
                        <a href="DashboardAddSchedule.php">
                            <span class="Icon"><i class="fas fa-plus-circle"></i></span>
                            <span class="Title">Add Schedule</span>
                        </a>
                    </li>
                    <li>
                        <a href="DashboardSchedule.php">
                            <span class="Icon"><i class="fas fa-eye"></i></span>
                            <span class="Title">View Schedule</span>
                        </a>
                    </li>
                    <li>
                        <a href="DashboardAddBus.php">
                            <span class="Icon"><i class="fas fa-folder-plus"></i></span>
                            <span class="Title">Add Bus</span>
                        </a>
                    </li>
                    <li>
                        <a href="DashboardBus.php">
                            <span class="Icon"><i class="fas fa-bus"></i></span>
                            <span class="Title">View Buses</span>
                        </a>
                    </li>
                    <li>
                        <a href="Report.php">
                            <span class="Icon"><i class="far fa-file-chart-line"></i></span>
                            <span class="Title">Report</span>
                        </a>
                    </li>
                    <li>
                        <a href="logout.php">
                            <span class="Icon"><i class="fas fa-sign-out-alt"></i></span>
                            <span class="Title">Sign Out</span>
                        </a>
                    </li>
                </ul>
            </div>

            <div class="main">
                <div class="topbar">
                    <div class="toggle" onclick="toggleMenu()"><i class="fas fa-bars"></i></div>
                    <div class="search">
                        <label>
                            
                        </label>
                    </div>
                    <div class="user">
                        <img src="user2.jpg">
                    </div>
                </div>

                <?php

                include 'DBConnect.php';

                $selectmyquery = "SELECT * FROM reservation";
                
                $query1 = mysqli_query($myconn,$selectmyquery);

                $TR = 0;

                while (mysqli_fetch_assoc($query1)){
                    $TR++;
                }

                $selectmyquery = "SELECT DISTINCT CONCAT(Origin, CONCAT(' - ', Destination)) as 'Routel' FROM schedule";
                
                $query2 = mysqli_query($myconn,$selectmyquery);

                $TRO = 0;

                while (mysqli_fetch_assoc($query2)){
                    $TRO++;
                }

                $selectmyquery = "SELECT * FROM bus";
                
                $query3 = mysqli_query($myconn,$selectmyquery);

                $TB = 0;

                while (mysqli_fetch_assoc($query3)){
                    $TB++;
                }

                $selectmyquery = "SELECT * FROM Reservation JOIN Schedule on Reservation.ScheduleId = Schedule.ScheduleId";
                
                $query4 = mysqli_query($myconn,$selectmyquery);

                $qty= 0;
                
                while ($num = mysqli_fetch_assoc ($query4)) {
                
                    $qty += $num['Fare'];
                    
                }

                ?>

                <div class="cardbox">
                    <div class="card">
                        <div>
                            <div class="numbers" id="TR"><?php echo $TR ?></div>
                            <div class="cardname">Total Reservations</div>
                        </div>
                        <div class="iconBox">
                            <i class="fas fa-clipboard-check"></i>
                        </div>
                    </div>
                    <div class="card">
                        <div>
                            <div class="numbers"><?php echo $TRO ?></div>
                            <div class="cardname">Functional Routes</div>
                        </div>
                        <div class="iconBox">
                            <i class="fas fa-road"></i>
                        </div>
                    </div>
                    <div class="card">
                        <div>
                            <div class="numbers"><?php echo $TB ?></div>
                            <div class="cardname">Functional Buses</div>
                        </div>
                        <div class="iconBox">
                            <i class="fas fa-bus"></i>
                        </div>
                    </div>
                    <div class="card">
                        <div>
                            <div class="numbers"><?php echo $qty; ?></div>
                            <div class="cardname">Total Income</div>
                        </div>
                        <div class="iconBox">
                            <i class="fad fa-money-check-alt"></i>
                        </div>
                    </div>
                </div>

                <div class="details">
                    <div class="recentOrders">
                        <div class="cardHeader">
                            <h2>Recent Orders</h2>
                            <a href="#" class="btn">View All</a>
                        </div>
                        <table>
                            <thead>
                                <tr>
                                    <td>Origin</td>
                                    <td>Destination</td>
                                    <td>Price</td>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                include 'DBConnect.php';

                                $selectquery = "SELECT * FROM Reservation JOIN Schedule on schedule.ScheduleId = Reservation.ScheduleId";

                                $query = mysqli_query($myconn,$selectquery);

                                $nums = mysqli_num_rows($query);

                                while($res = mysqli_fetch_array($query)){
                                
                                ?>

                                    <tr>
                                        <td><?php echo $res['Origin']?></td>
                                        <td><?php echo $res['Destination']?></td>
                                        <td><?php echo $res['Fare']?></td>
                                    </tr>

                                <?php

                                }

                                ?>

                            </tbody>
                        </table>
                    </div>
                    <div class="recentCustomer">
                        <div class="cardHeader">
                            <h2>Recent Customers</h2>
                        </div>
                        <table>
                            <tbody>
                            <?php
                                include 'DBConnect.php';

                                $selectquery = "SELECT DISTINCT UserName FROM Reservation JOIN Users on users.UserId = Reservation.UserId JOIN Schedule on Reservation.ScheduleId = Schedule.ScheduleId";

                                $query = mysqli_query($myconn,$selectquery);

                                $nums = mysqli_num_rows($query);

                                while($res = mysqli_fetch_array($query)){
                                
                                ?>
                                <tr>
                                    <td width="60px"><div class="imgBx"><img src="user3.jpg"></div></td>
                                    <td><h4><?php echo $res['UserName']?></td>
                                </tr>

                                <?php

                                }

                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    <script>
        function toggleMenu(){
            let toggle = document.querySelector('.toggle');
            let navigation = document.querySelector('.navigation');
            let main = document.querySelector('.main');
            toggle.classList.toggle('active')
            navigation.classList.toggle('active')
            main.classList.toggle('active')
        }
        function info(){
            var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function(){
            if( this.readyState == 4 && this.status == 200){
                document.getElementById('TR').innerHTML = this.responseText;
            }
        }
        xmlhttp.open("GET","TR.php?Origin="+Origin+"&Destination="+Destination,true);
        xmlhttp.send();
        }
    </script>

    </body>
</html>