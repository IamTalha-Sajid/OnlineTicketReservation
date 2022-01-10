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

                <section class="booking">
                    <h1>Add Buses</h1>
                    <p1>Add All the Functional Buses from Here</p1>
                    <br><br>
                    <div class="row">
                        <div class="BusType">
                            <label class="bt">Bus Type</label><br><br>
                            <select name="BusType" class="Dropdown" name="BusType" style="text-align-last: center;">
                            <option>Bus Type</option>
                            <option>Large</option>
                            <option>Small</option>
                            </select> 
                        </div>
                        <div class="BusNo">
                            <label class="bt">Bus Number</label><br><br>
                            <input type="text" name="BusNo" class="fr">  
                        </div>
                        <div class="TotalSeats">
                            <label class="bt">Total Seats</label><br><br>
                            <input type="text" name="TotalSeats" class="fr">  
                        </div>
                    </div>
                    <input type="button" value="Add Bus" onclick="AddBus()" class="hero-btn blue-btn">
                    <!-- <a href="#" class="hero-btn blue-btn" onclick="AddSchedule()">Add Schedule</a> -->
                </section>

            </div>
        </div>

    <script>
        function AddBus(){
            BusNo = document.getElementsByName("BusNo")[0].value;
            BusType = document.getElementsByName("BusType")[0].value;
            TotalSeats = document.getElementsByName("TotalSeats")[0].value;
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function(){
				if( this.readyState == 4 && this.status == 200){
					alert(this.responseText);
					window.location.reload(true);
				}
			}
	        xmlhttp.open("GET","DAB.php?BusNo="+BusNo+"&BusType="+BusType+"&TotalSeats="+TotalSeats,true);
	        xmlhttp.send();
        }


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