            <?php
            include 'DBConnect.php';
            $Origin = $_GET["Origin"];
	        $Destination = $_GET["Destination"];
            $CurrentDate = date("Y-m-d");
            $selectquery = "SELECT * FROM schedule JOIN bus on schedule.BusId = bus.BusId WHERE schedule.Origin = '$Origin' AND schedule.Destination = '$Destination' AND schedule.Dep_Date > '$CurrentDate'";

            $query = mysqli_query($myconn,$selectquery);

            $nums = mysqli_num_rows($query);
            echo "
            <div class='detailsReservation'>
            <div class='recentReservation'>
                <div class='cardHeader'>
                    <h2>Available Buses</h2>
                </div>
            <table>
            <thead>
                <tr>
                    <th>Origin</th>
                    <th>Destination</th>
                    <th>Departure</th>
                    <th>Fare</th>
                    <th>Date</th>
                    <th>Operation</th>
                </tr>
            </thead>
            <tbody>";

            while($res = mysqli_fetch_array($query)){

                echo"
                <tr>
                    <td>".$res['Origin']."</td>
                    <td>".$res['Destination']."</td>
                    <td>".$res['Departure_time']."</td>
                    <td>".$res['Fare']."</td>
                    <td>".$res['Dep_Date']."</td>
                    <td><a href='javascript:ReserveSeat(" . $res['ScheduleId'] . ")' data-toggle='tooltip' data-placement='buttom' title='BOOK SEAT'></title></data-toggle><img src='https://img.icons8.com/fluency/48/000000/add-ticket.png'/></a></td>
                </tr>";
            }
            echo"
            </tbody>
        </table>
        </div>
        </div>";

            ?>