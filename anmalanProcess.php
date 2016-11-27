<!DOCTYPE html>
<html>
<head>
	
</head>
<body>


<?php

$servername = "localhost";
$username = "root";
$password = "";
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
	  $last_id = $conn->insert_id;
               // echo $last_id;
    	if ($last_id <= 100) {
    		echo "<script>alert('Tack för din anmälan! Vi tar dig nu vidare till Shoppen');</script>";
   		 	echo "<script>setTimeout(\"location.href = '/shop.html';\",00);</script>";
    	} else {
    		echo "<script>alert('Det ser ut att vara fullt:(');</script>";
    		echo "<script>setTimeout(\"location.href = '/sorry.html';\",00);</script>"; 
    	}

} else {
    header( 'http://alcaj.ssis.nu/404.html') ;
}
// End of DB
//compose mail
$str = "                                          
    <h1>
    Tack för din anmälan!
	</h1>
<p>
    Saker du behöver veta nu:
</p>
<ul>
    <li>
        För att betala med Swish, skicka 100kr till: 070-72-18-288
    </li>
    <li>
        Läs noga på <a href='lan.ssis.nu/index.html#section2'> FAQ sidan </a> för mer information om vad som tillåts på Togethernet under LAN-natten
    </li>
</ul>";

function generateRandomString($length = 5) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}
$str .=  "För köp av varor i våran shop behöver du följande kod. Alla köp med denna kod kopplas direkt till dig.";
$str .=  "<br>";
$str .=  "<br>";
$str .=  generateRandomString();
$str .=  "<br>";

   
$str .= "Hoppas du kommer och att det blir kul, vi ses den andra december (2/12)!
</p>
<p>
Med vänlig hälsning vi på Togethernet
</p>
<img src='http://lan.ssis.nu/img/logo-text.png'>";



// start of Mailer
if ($last_id <= 100) {
require_once 'swiftmailer/lib/swift_required.php';

$transport = \Swift_SmtpTransport::newInstance('smtp.gmail.com', 465,'ssl')->setUsername('togethernet@stockholmscience.se')->setPassword("TogethernetKillMePlz2016");

$mailer = \Swift_Mailer::newInstance($transport);
$message = \Swift_Message::newInstance('Tack för din anmälan!')
   ->setFrom(array('togethernet@stockholmscience.se' => 'Togethernet'))
   ->setTo(array($_POST['mailIn'] => "Mottagare"))
   ->setBody($str, 'text/html');
$result = $mailer->send($message);
}

?>

</body>
</html>
