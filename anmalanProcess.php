<!DOCTYPE html>
<html>
<head>
	
</head>
<body>


<?php

$servername = "localhost";
$username = "alcaj";
$password = "KnarkKnark123";
$dbname = "alcaj";

//connection
$conn = new mysqli($servername, $username, $password, $dbname);
// check conn
if ($conn->connect_error) {
	die("Connection failed: " . $conn->connection_error);
}
//db insertion
$sql = "INSERT INTO togethernet (namn, mail, betalning)
VALUES ('$_POST[nameIn]', '$_POST[mailIn]', '$_POST[payIn]')";

//db confirmation
if ($conn->query($sql) === TRUE) {
    echo "<script>alert('Tack för din anmälan!');</script>";
    echo "<script>setTimeout(\"location.href = '/#section3';\",00);</script>"; 

} else {
    header( 'http://alcaj.ssis.nu/404.html' ) ;
}
// End of DB

// start of Mailer

require_once 'swiftmailer/lib/swift_required.php';

$transport = \Swift_SmtpTransport::newInstance('smtp.gmail.com', 465,'ssl')->setUsername('alcaj@stockholmscience.se')->setPassword("MuchoSafeYes123");

$mailer = \Swift_Mailer::newInstance($transport);
$message = \Swift_Message::newInstance('Tack för din anmälan!')
   ->setFrom(array('alcaj@stockholmscience.se' => 'Togethernet'))
   ->setTo(array($_POST['mailIn'] => "Mottagare"))
   ->setBody("<h1>Welcome</h1> <br> <p style='color: green;'>Tack för din anmälan</p>", 'text/html');
$result = $mailer->send($message);


?>

</body>
</html>
