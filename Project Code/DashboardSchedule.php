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


                <div class="detailsSchedule">
                    <div class="recentSchedule">
                        <div class="cardHeader">
                            <h2>Recent Schedule</h2>
                            <a href="#" class="btn">View All</a>
                        </div>
                        <table>
                            <thead>
                                <tr>
                                    <th>Origin</th>
                                    <th>Destination</th>
                                    <th>Departure</th>
                                    <th>Fare</th>
                                    <th>Bus Number</th>
                                    <th>Bus Type</th>
                                    <th>Date</th>
                                    <th>Operation</th>
                                </tr>
                            </thead>
                            <tbody>

                            <?php
                            include 'DBConnect.php';

                            $selectquery = "SELECT * FROM schedule JOIN bus on schedule.BusId = bus.BusId";

                            $query = mysqli_query($myconn,$selectquery);

                            $nums = mysqli_num_rows($query);

                            while($res = mysqli_fetch_array($query)){
                            
                            ?>

                                <tr>
                                    <td><?php echo $res['Origin']?></td>
                                    <td><?php echo $res['Destination']?></td>
                                    <td><?php echo $res['Departure_time']?></td>
                                    <td><?php echo $res['Fare']?></td>
                                    <td><?php echo $res['BusNo']?></td>
                                    <td><?php echo $res['BusType']?></td>
                                    <td><?php echo $res['Dep_Date']?></td>
                                    <td><a href="DeleteSchedule.php?ScheduleId=<?php echo $res['ScheduleId']; ?>" data-toggle="tooltip" data-placement="buttom" title="DELETE"></title></data-toggle><i class="fas fa-trash" style="text-align-last: center;"></i></a></td>
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
    </script>

    </body>
</html>