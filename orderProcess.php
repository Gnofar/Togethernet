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
$sql = "INSERT INTO bestall (produkt1, produkt2, produkt3, produkt4, produkt5, produkt6, produkt7, produkt8, produkt9, produkt10, produkt11, produkt12 )
VALUES ('$_POST[produkt1In]', '$_POST[produkt2In]', '$_POST[produkt3In]', '$_POST[produkt4In]', '$_POST[produkt5In]', '$_POST[produkt6In]', '$_POST[produkt7In]', '$_POST[produkt8In]', '$_POST[produkt9In]', '$_POST[produkt10In]', '$_POST[produkt11In]', '$_POST[produkt12In]')";

echo $_POST['produkt1In'];

//db confirmation
if ($conn->query($sql) === TRUE) {
    echo "<script>alert('Tack för din order!');</script>";
    //echo "<script>setTimeout(\"location.href = '/#section3';\",00);</script>"; //insert new link here 

} else {
    header( 'http://alcaj.ssis.nu/404.html' ) ;
}
// End of DB
// Start Mailer

require_once 'swiftmailer/lib/swift_required.php';

$transport = \Swift_SmtpTransport::newInstance('smtp.gmail.com', 465,'ssl')->setUsername('alcaj@stockholmscience.se')->setPassword("MuchoSafeYes123");

$mailer = \Swift_Mailer::newInstance($transport);
$message = \Swift_Message::newInstance('Tack för din beställning!')
   ->setFrom(array('alcaj@stockholmscience.se' => 'Togethernet'))
   ->setTo(array($_POST['mailIn'] => "Mottagare"))
   ->setBody("<h1>Tack!</h1> <br> <p style='color: green;'>Du har beställt saker</p>", 'text/html');
$result = $mailer->send($message);
// end of mailer



?>

</body>
</html>
