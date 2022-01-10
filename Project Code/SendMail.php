<?php

	$Name = $_GET["Name"];
	$Email = $_GET["Email"];
    $Subject = $_GET["Subject"];
    $Message = $_GET["Message"];

    $email_from = 'talhasajid048@gmail.com';

    $email_subject = 'New Form Submission';

    $email_body = "User Name : $Name.\n".
                  "User Email : $Email.\n".
                  "Subject : $Subject.\n".
                  "Message : $Message.\n";

    $to = 'talhasajid048@gmail.com';

    $header = "From : $email_from\r\n";

    $header .= "Reply-To: $Email \r\n";

    mail($t0,$email_subject,$email_body,$header);

    echo "Email Sent Successfully";

?>