<!DOCTYPE html>
<html>
<head>
	
</head>
<body>


<?php

$servername = "localhost";
$username = "alcaj";
$password = "KnarkKnark123"; //KnarkKnark123
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
//db insertion
//sql injection protection
$produkterIn = array(
    $_POST['produkt1In'],
    $_POST['produkt2In'],
    $_POST['produkt3In'],
    $_POST['produkt4In'],
    $_POST['produkt5In'],
    $_POST['produkt6In'],
    $_POST['produkt7In'],
    $_POST['produkt8In'],
    $_POST['produkt9In'],
    $_POST['produkt10In'],
);
$hackCheck = 0;
foreach ($produkterIn as $element) {
    if (is_numeric($element) or $element == "") {
      //  echo "'{$element}' is numeric", PHP_EOL;
        $hackCheck = $hackCheck += 1;
      //  echo "hackCheck";
      //  echo $hackCheck;
    } else {
       // echo "'{$element}' is NOT numeric", PHP_EOL;
    }
}

mysqli_query($conn, "CREATE TEMPORARY TABLE bestall LIKE Saker ");
if ($hackCheck == 10) {

$mailInput = mysqli_real_escape_string($conn, $_POST['mailIn']);
$kodInput = mysqli_real_escape_string($conn, $_POST['kodIn']);
$produkt1Input = mysqli_real_escape_string($conn, $_POST['produkt1In']);
$produkt2Input = mysqli_real_escape_string($conn, $_POST['produkt2In']);
$produkt3Input = mysqli_real_escape_string($conn, $_POST['produkt3In']);
$produkt4Input = mysqli_real_escape_string($conn, $_POST['produkt4In']);
$produkt5Input = mysqli_real_escape_string($conn, $_POST['produkt5In']);
$produkt6Input = mysqli_real_escape_string($conn, $_POST['produkt6In']);
$produkt7Input = mysqli_real_escape_string($conn, $_POST['produkt7In']);
$produkt8Input = mysqli_real_escape_string($conn, $_POST['produkt8In']);
$produkt9Input = mysqli_real_escape_string($conn, $_POST['produkt9In']);
$produkt10Input = mysqli_real_escape_string($conn, $_POST['produkt10In']);

//End of injection protection

    if (mysqli_query($conn, "INSERT into bestall (produkt1, produkt2,produkt3,produkt4,produkt5,produkt6,produkt7,produkt8,produkt9,produkt10, mail , kod) 
        VALUES ('$produkt1Input', '$produkt2Input', '$produkt3Input', '$produkt4Input', '$produkt5Input', '$produkt6Input', '$produkt7Input', '$produkt8Input', '$produkt9Input', '$produkt10Input', '$mailInput', '$kodInput')")) {
       // printf("%d Row inserted.\n", mysqli_affected_rows($conn));
    }
}

//db confirmation
if ($connCheck === TRUE) {
    echo "<script>alert('Tack för din order!');</script>";
    echo "<script>setTimeout(\"location.href = '/index.html';\",00);</script>"; 

} else {
    header( 'http://alcaj.ssis.nu/404.html') ;
}
//

mysqli_close($conn);
// End of DB
//array for the mail product print
$produkter = array('Cola 20kr * ', $_POST['produkt1In'],'Fanta 20kr * ',$_POST['produkt2In'],'Fanta Exotic 20kr * ',$_POST['produkt3In'],'Julmust 20kr * ',$_POST['produkt4In'],'Mountain Dew 20kr * ',$_POST['produkt5In'],'Sprite 20kr * ',$_POST['produkt6In'],'Chips (gärddfil) 20kr * ',$_POST['produkt7In'],'Chips Chips 20kr * ',$_POST['produkt8In'],'Doritos 20kr * ',$_POST['produkt9In'],'Billys 10kr * ',$_POST['produkt10In'] );
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
   ->setTo(array($_POST['mailIn'] => "Mottagare"))     
   ->setBody($str, 'text/html');
$result = $mailer->send($message);
// end of mailer



?>

</body>
</html>
