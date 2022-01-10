<html>
    <head>
        <title>Ticket Print</title>
	    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no">
	    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	    <meta name="HandheldFriendly" content="true">
	    <link rel="stylesheet" href="StyleTicket.css">
	    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    </head>
    <?php

    include 'DBConnect.php';

    $ResId = $_GET['ReservationId'];

    $Printquery = " SELECT * from reservation JOIN schedule on reservation.scheduleId = schedule.scheduleId JOIN users on users.userId = reservation.userId JOIN bus on schedule.busId = bus.busId WHERE Reservation.ReservationId = $ResId";
    
    $query = mysqli_query($myconn,$Printquery);

    while($res = mysqli_fetch_array($query)){

    ?>
    <body class="main">

    <section class="Ticket">
        <fieldset>
            <legend>TICKET</legend>
            <div class="Title">
                <h2>WAINS TRANSPORT</h2>
            </div>
            <div class="route">
                <h4><?php echo $res['Origin']?></h4>
                <i class="fad fa-long-arrow-alt-right"></i>
                <h4><?php echo $res['Destination']?></h4>
            </div>
            <div class="row">
                <div class="row1">
                    <div class="name">
                        <h3>Costumer Name</h3>
                        <h5><?php echo $res['UserName']?></h5>
                    </div><br><br>
                    <div class="DepTime">
                        <h3>Departure</h3>
                        <h5><?php echo $res['Departure_time']?></h5>
                    </div><br><br>
                    <div class="Bus">
                        <h3>Bus Number</h3>
                        <h5><?php echo $res['BusNo']?></h5>
                    </div>
                </div>
                <div class="row2">
                    <div class="Fare">
                        <h3>Fare</h3>
                        <h5><?php echo $res['Fare']?>/-</h5>
                    </div><br><br>
                    <div class="Date">
                        <h3>Date</h3>
                        <h5><?php echo $res['Dep_Date']?></h5>
                    </div><br><br>
                    <div class="Seat">
                        <h3>Seat Number</h3>
                        <h5><?php echo $res['SeatNo']?></h5>
                    </div>
                </div>
            </div>
            <h4 class="msg">Have a Safe Journey</h4>
        </fieldset>
    </section>

    <section class="PrintButton">
        <!-- <input type='button' name='submit' value='PRINT' onclick="printIt(document.getElementById('Ticket').innerHTML)" class='hero-btn blue-btn' style="text-align: center; margin: 15px;"> -->
    </section>

    <?php

    }

    ?>

    </body>
    <script>
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
</html>