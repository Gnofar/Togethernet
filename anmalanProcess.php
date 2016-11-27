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
	$connCheck = false;
} else {
	$connCheck = TRUE;
	//echo "conn working";
}
//start of string code gen
function generateRandomString($length = 5) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

$kodIn = generateRandomString();
//end of string gen
//db insertion

mysqli_query($conn, "CREATE TEMPORARY TABLE togethernet LIKE Saker ");



$nameInput = mysqli_real_escape_string($conn, $_POST['nameIn']);
$mailInput = mysqli_real_escape_string($conn, $_POST['mailIn']);
$payInput = mysqli_real_escape_string($conn, $_POST['payIn']);
$kodInput = mysqli_real_escape_string($conn, $kodIn);


if (mysqli_query($conn, "INSERT into togethernet (namn, mail, betalning, kod) VALUES ('$nameInput', '$mailInput','$payInput', '$kodInput')")) {
    //printf("%d Row inserted.\n", mysqli_affected_rows($conn));
}

//db confirmation
if ($connCheck === TRUE) {
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
mysqli_close($conn);
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


$str .=  "För köp av varor i våran shop behöver du följande kod. Alla köp med denna kod kopplas direkt till dig.";
$str .=  "<br>";
$str .=  "<br>";
$str .=  $kodInput;
$str .=  "<br>";

   
$str .= "<p>Hoppas du kommer och att det blir kul, vi ses den andra december (2/12)!
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
   ->setTo(array($mailInput => "Mottagare"))
   ->setBody($str, 'text/html');
$result = $mailer->send($message);
}

?>

</body>
</html>


