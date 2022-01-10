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

                <div class="groupbox">
                <fieldset>
                    <legend>SEARCH</legend>
                    <div class="rows">
                        <div class="row1">
                            <div class="cb">
                            <input type="checkbox" id="searchbd" name="searchbd" value="Search By Date">
                            <label for="search" class="sbd"> Search By Date</label><br>
                            </div>
                            <div class="Fare">
                                <label class="bt">Starting Date</label><br>
                                <input type="date" class="dt" name="Start_Date">  
                            </div>
                            <div class="Fare">
                                <label class="bt">Ending Date</label><br>
                                <input type="date" class="dt" name="End_Date">  
                            </div><br>
                        </div>
                        <div class="row2">
                            <div class="cb">
                            <input type="checkbox" id="searchbr" name="searchbr" value="Search By Date">
                            <label for="search" class="sbr"> Search By Route</label><br>
                            </div>
                            <div class="Fare">
                            <label class="bt">Origin</label><br>
                            <select name="Origin" class="Dropdown" name="Origin" style="text-align-last: center;">
                                <option>Origin</option>
                                <option>Multan</option>
                                <option>Burewala</option>
                                <option>Rawalpindi</option>
                            </select>
                            </div>
                            <div class="Fare">
                            <label class="bt">Destination</label><br>
                            <select name="Destination" class="Dropdown" name="Destination" style="text-align-last: center;">
                                <option>Destination</option>
                                <option>Multan</option>
                                <option>Burewala</option>
                                <option>Rawalpindi</option>
                            </select>
                            </div><br>
                        </div>
                        <div class="row3">
                            <div class="cb">
                            <input type="checkbox" id="searchbb" name="searchbb" value="Search By Bus Number">
                            <label for="search" class="sbr"> Search By Bus Number</label><br>
                            </div>
                            <div class="Fare">
                            <label class="bt">Bus Number</label><br>
                            <select name="BusType" class="Dropdown" name="BusType" style="text-align-last: center;">
                            <option>Bus Number</option>

                            <?php
                            
                            $myconn= mysqli_connect("localhost","root","","busreservation");
                            $query = "SELECT * FROM bus";
                            $result = mysqli_query($myconn, $query);

                            if($result)
                            {
                             while($row=mysqli_fetch_array($result))
                                {
                                $BusN = $row["BusNo"];
                                echo"<option>$BusN</option>";
                                }
                            }

                            ?>
                            </select> 
                            </div>
                        </div>
                     </div>
                     <input type="button" value="SEARCH" onclick="SearchReport()" class="hero-btn blue-btn" style="text-align: center; margin: 15px;">
                     <input type='button' name='submit' value='PRINT' onclick="printIt(document.getElementById('spanTable').innerHTML)" class='hero-btn blue-btn' style="text-align: center; margin: 15px;">
                </fieldset>
                </div>
                <span id="spanTable">

                </span>
            </div>
        </div>

    <script>
        function SearchReport(){
            var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function(){
            if( this.readyState == 4 && this.status == 200){
                document.getElementById('spanTable').innerHTML = this.responseText;
            }
        }
        var query = "SELECT * FROM Reservation JOIN Schedule on schedule.ScheduleId = Reservation.ScheduleId JOIN users on users.UserId = Reservation.UserId JOIN bus on bus.BusId = Schedule.BusId WHERE true";
        if(document.getElementById('searchbd').checked){
            var Start_Date = document.getElementsByName("Start_Date")[0].value;
            var End_Date = document.getElementsByName("End_Date")[0].value;
            query = query + " and Schedule.Dep_Date >= '"+ Start_Date +"' and Schedule.Dep_Date <= '"+ End_Date +"'";
        }
        if(document.getElementById('searchbr').checked){
            var Origin = document.getElementsByName("Origin")[0].value;
            var Destination = document.getElementsByName("Destination")[0].value;
            query = query + " and Schedule.Origin = '" + Origin + "' and Schedule.Destination = '" + Destination + "'";
        }
        if(document.getElementById('searchbb').checked){
            var BusNo = document.getElementsByName("BusType")[0].value;
            query = query + " and Bus.BusNo = '" + BusNo + "'";
        }
        xmlhttp.open("GET","ReportSearch.php?query="+query,true);
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

        function printIt(printThis) {
            var win = window.open();
            self.focus();
            win.document.open();
            win.document.write('<html><body>');
            win.document.write(printThis);
            win.document.write('</body></html>');
            win.document.close();
            win.print();
            }
    </script>

    </body>
</html>