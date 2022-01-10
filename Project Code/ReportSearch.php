<?php
            include 'DBConnect.php';

            $selectquery = $_GET["query"];

            $query = mysqli_query($myconn,$selectquery);

            $nums = mysqli_num_rows($query);
            echo "
            <div class='detailsReservation'>
            <div class='recentReservation'>
                <div class='cardHeader'>
                    <h2>RESERVATION REPORT</h2>
                    
                </div>
            <table>
            <thead>
                <tr>
                    <th>User Name</th>
                    <th>Origin</th>
                    <th>Destination</th>
                    <th>Seat Number</th>
                    <th>BusNo</th>
                    <th>Date</th>
                </tr>
            </thead>
            <tbody>";

            while($res = mysqli_fetch_array($query)){

                echo"
                <tr>
                    <td>".$res['UserName']."</td>
                    <td>".$res['Origin']."</td>
                    <td>".$res['Destination']."</td>
                    <td>".$res['SeatNo']."</td>
                    <td>".$res['BusNo']."</td>
                    <td>".$res['Dep_Date']."</td>
                </tr>";
            }
            echo"
            </tbody>
        </table>
        </div>
    </div>";

            ?>