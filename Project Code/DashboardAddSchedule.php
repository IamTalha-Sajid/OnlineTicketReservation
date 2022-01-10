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
                    <h1>Add Schedule</h1>
                    <p1>These will be Shown to the User During Reservation</p1>
                    <br><br>
                    <div class="row">
                        <div class="Origin">
                            <label class="bt">Origin</label><br><br>
                            <select name="Origin" class="Dropdown" name="Origin" style="text-align-last: center;">
                                <option>Origin</option>
                                <option>Multan</option>
                                <option>Burewala</option>
                                <option>Rawalpindi</option>
                            </select>
                        </div>
                        <div class="Destination">
                            <label class="bt">Destination</label><br><br>
                            <select name="Destination" class="Dropdown" name="Destination" style="text-align-last: center;">
                                <option>Destination</option>
                                <option>Multan</option>
                                <option>Burewala</option>
                                <option>Rawalpindi</option>
                            </select>
                        </div>
                        <div class="DepTime">
                            <label class="bt">Departure</label><br><br>
                            <input type="time" name="Departure_time" class="dept">  
                        </div>
                        <div class="Fare">
                            <label class="bt">Fare</label><br><br>
                            <input type="text" name="Fare" class="fr">  
                        </div>
                        <div class="BusType">
                            <label class="bt">Bus</label><br><br>
                            <select name="BusType" class="Dropdown" name="BusType" style="text-align-last: center;">
                            <option>Bus Type</option>

                            <?php
                            
                            $myconn= mysqli_connect("localhost","root","","busreservation");
                            $query = "SELECT CONCAT(BusNo, CONCAT(' - ', BusType)) as 'Bus' FROM bus";
                            $result = mysqli_query($myconn, $query);

                            if($result)
                            {
                             while($row=mysqli_fetch_array($result))
                                {
                                $Bus1 = $row["Bus"];
                                echo"<option>$Bus1</option>";
                                }
                            }

                            ?>
                            </select> 
                        </div>
                        <div class="Fare">
                            <label class="bt">Date</label><br><br>
                            <input type="date" class="dt" name="Dep_Date">  
                        </div>
                    </div>
                    <input type="button" value="Add Schedule" onclick="AddSchedule()" class="hero-btn blue-btn">
                    <!-- <a href="#" class="hero-btn blue-btn" onclick="AddSchedule()">Add Schedule</a> -->
                </section>

            </div>
        </div>

    <script>
        function AddSchedule(){
            Bus = document.getElementsByName("BusType")[0].value;
            const myArr = Bus.split(" - ");
            BusNo = myArr[0];
            BusType = myArr[1];
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function(){
				if( this.readyState == 4 && this.status == 200){
					if(this.responseText == "-1")
                    {
                        alert(this.responseText);
                    }
					else
                    {
                        BusId = this.responseText;
                        Origin = document.getElementsByName("Origin")[0].value;
                        Destination = document.getElementsByName("Destination")[0].value;
                        Departure = document.getElementsByName("Departure_time")[0].value;
                        Fare = document.getElementsByName("Fare")[0].value;
                        Datel = document.getElementsByName("Dep_Date")[0].value;
                        var xmlhttp = new XMLHttpRequest();
                        xmlhttp.onreadystatechange = function(){
				            if( this.readyState == 4 && this.status == 200){
            					alert(this.responseText);
			            		window.location.reload(true);
            				}
			            }
            	        xmlhttp.open("GET","DAS.php?Origin="+Origin+"&Destination="+Destination+"&Departure_time="+Departure+"&Fare="+Fare+"&BusId="+BusId+"&Dep_Date="+Datel,true);
	                    xmlhttp.send();
                    }
						
				}
			}
	        xmlhttp.open("GET","getBusId.php?BusNo="+BusNo+"&BusType="+BusType,true);
	        xmlhttp.send();
            return;
		}

        function toggleMenu(){
            let toggle = document.querySelector('.toggle');
            let navigation = document.querySelector('.navigation');
            let main = document.querySelector('.main');
            toggle.classList.toggle('active')
            navigation.classList.toggle('active')
            main.classList.toggle('active')
        }

        // Finding Date
        // function myfundate(){
        //     var today = new Date();
        //     var dd = today.getDate();
        //     var mm = today.getMonth()+1; //January is 0 so need to add 1 to make it 1!
        //     var yyyy = today.getFullYear();
        //     if(dd<10){
        //     dd='0'+dd
        //     } 
        //     if(mm<10){
        //     mm='0'+mm
        //     } 

        //     today = mm+'-'+dd+'-'+yyyy;
        //     alert(today);
        //     document.getElementById("datefield").min = "Today";
        // }
        
    </script>

    </body>
</html>