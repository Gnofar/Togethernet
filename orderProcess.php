<!DOCTYPE html>
<html>
<head>
	
</head>
<body>


<?php

$servername = "localhost";
$username = "root";
$password = ""; //KnarkKnark123
$dbname = "alcaj";

//connection
$conn = new mysqli($servername, $username, $password, $dbname);
// check conn
if ($conn->connect_error) {
	die("Connection failed: " . $conn->connection_error);
}
//db insertion
$sql = "INSERT INTO bestall (produkt1, produkt2, produkt3, produkt4, produkt5, produkt6, produkt7, produkt8, produkt9, produkt10, mail, kod )
VALUES ('$_POST[produkt1In]', '$_POST[produkt2In]', '$_POST[produkt3In]', '$_POST[produkt4In]', '$_POST[produkt5In]', '$_POST[produkt6In]', '$_POST[produkt7In]', '$_POST[produkt8In]', '$_POST[produkt9In]', '$_POST[produkt10In]', '$_POST[mailIn]', '$_POST[kodIn]')";

//db confirmation
if ($conn->query($sql) === TRUE) {
    echo "<script>alert('Tack för din order!');</script>";
    echo "<script>setTimeout(\"location.href = '/index.html';\",00);</script>"; 

} else {
    header( 'http://alcaj.ssis.nu/404.html') ;
}
// End of DB
//array for the mail product print
$produkter = array('Cola: ', $_POST['produkt1In'],'Fanta: ',$_POST['produkt2In'],'Fanta Exotic: ',$_POST['produkt3In'],'Julmust: ',$_POST['produkt4In'],'Mountain Dew: ',$_POST['produkt5In'],'Sprite: ',$_POST['produkt6In'],'Chips (gärddfil): ',$_POST['produkt7In'],'Chips Chips: ',$_POST['produkt8In'],'Doritos: ',$_POST['produkt9In'],'Billys: ',$_POST['produkt10In'] );
//compose mail
$str = "                                          
    <h1>
    Tack för din beställning!
</h1>
<p>
    Saker du behöver veta nu:
</p>
<ul>
    <li>
        För att betala med Swish, skicka [summa] till: 070-72-18-288
    </li>
    <li>
        Läs noga på <a href='lan.ssis.nu/index.html#section2'> FAQ sidan</a> för mer information hur försäljningen och förbeställningen fungerar under LAN-natten och dessförinnan.
    </li>
</ul>
<p>Du har beställt: </p>";
    
    for ($x = 1; $x < 20; $x+=2) {
         
            if ($produkter[$x] > 0) {
                $str .= $produkter[$x-=1]; //-=1
                $str .= $produkter[$x+=1]; //+=1
                $str .= "<br>"; 
            }
    }
    
$str .= "<p>
    Hoppas dina Doritos smakar, vi ses den andra december (2/12)!
</p>
<p>
Med vänlig hälsning vi på Togethernet
</p>
<img src='http://lan.ssis.nu/img/logo-text.png'>";

// Start Mailer

require_once 'swiftmailer/lib/swift_required.php';

$transport = \Swift_SmtpTransport::newInstance('smtp.gmail.com', 465,'ssl')->setUsername('togethernet@stockholmscience.se')->setPassword("TogethernetKillMePlz2016");

//$mailFile = file_get_contents("mail.txt");


$mailer = \Swift_Mailer::newInstance($transport);
$message = \Swift_Message::newInstance('Tack för din beställning!')
   ->setFrom(array('togethernet@stockholmscience.se' => 'Togethernet'))
   ->setTo(array($_POST['mailIn'] => "Mottagare"))      // HÄR BÖRJAR ALLT DÖ, DAVID
   ->setBody($str, 'text/html');
$result = $mailer->send($message);
// end of mailer



?>

</body>
</html>
