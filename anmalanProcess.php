<!DOCTYPE html>
<html>
<head>
	
</head>
<body>


<?php

$servername = "localhost";
$username = "alcaj";
$password = "KnarkKnark1337";
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

$tempName = mysqli_real_escape_string($conn, $_POST['nameIn']);
$tempMail = mysqli_real_escape_string($conn, $_POST['mailIn']);
$charCheck = TRUE;

if (strlen($tempName) < 5 || strlen($tempName) > 30 ) {
    $charCheck = false; 
}
if (strlen($tempMail) < 5 || strlen($tempMail) > 30) {
    $charCheck = false;
}

if (strpos($tempMail, '@stockholmscience.se') !== false) {
    echo 'donde esta la pizzeria';
} else {
    $charCheck = false;
}

if ($charCheck === false) {    
    echo "<script>setTimeout(\"location.href = '/index.html#section3';\",00);</script>"; 
    echo "<script>alert('Någon information verkar vara ogiltig');</script>";
    exit();
}

    //doublets check
    $check=mysqli_query($conn,"select * from togethernet where mail='$tempMail'");
    $checkrows=mysqli_num_rows($check);

   if($checkrows>0) {
    echo "<script>setTimeout(\"location.href = '/index.html#section3';\",00);</script>";
    echo "<script>alert('Du verkar redan vara anmäld. Tror du att detta inte stämmer ta kontakt med någon i Togethernet');</script>";
     exit();
    }


   
$nameInput = mysqli_real_escape_string($conn, $_POST['nameIn']);
$mailInput = mysqli_real_escape_string($conn, $_POST['mailIn']);
$payInput = mysqli_real_escape_string($conn, $_POST['payIn']);
$kodInput = mysqli_real_escape_string($conn, $kodIn);


if (mysqli_query($conn, "INSERT into togethernet (namn, mail, betalning, kod) VALUES ('$nameInput', '$mailInput','$payInput', '$kodInput')")) {
    //printf("%d Row inserted.\n", mysqli_affected_rows($conn));
}

//db confirmation

$dbFolk = 183; // Behöver manuellt uppdateras atm. Hur många ligger i db innan anmälan öppnar.?

if ($connCheck === TRUE) {
	  $last_id = $conn->insert_id;
               // echo $last_id;
    	if ($last_id <= $dbFolk + 100) {
    		echo "<script>alert('Tack för din anmälan! Vänligen se din mail för att kontrollera din anmälans status.');</script>";
   		 	echo "<script>setTimeout(\"location.href = '/index.html';\",00);</script>";
    	} else {
    		echo "<script>alert('Det ser ut att vara fullt:(');</script>";
    		echo "<script>setTimeout(\"location.href = '/sorry.html';\",00);</script>"; 
    	}

} else {
    echo "<script>setTimeout(\"location.href = '/404.html';\",00);</script>";
}
mysqli_close($conn);
// End of DB
//compose mail
$str = "                                          
    <h1>
    Nu är nästan allt klart!
	</h1>
<p>
    Din anmälan är nu registrerad.
</p>
<br>
<p>
    För att de som anmälde sig utan att komma in på föregående lan enklare ska ha tillgång till det
    kommande lanet så kommer dessa individer att ha förtur till platser. Detta är en process som
    drar igång automatiskt när anmälningarna överskrider 100. Denna process är sist in först ut baserad
    så desto tidigare du anmält dig desto säkrare sitter du.
</p>
<br>
<p> Om du anmälde dig till det föregående lanet utan att komma in så kommer du finnas med på denna prioritetslista
    och därav ha en garanterad plats.
</p>
<br>
<p>
    Inom de närmaste dagarna kommer du att få ytterligare ett mail
    med information om din anmälans status. 
</p>
<br>
<p>
Med vänlig hälsning vi på Togethernet
</p>
<img src='http://lan.ssis.nu/logo-text.png'>";



// start of Mailer
if ($last_id <= $dbFolk + 100) {
require_once 'swiftmailer/lib/swift_required.php';

$transport = \Swift_SmtpTransport::newInstance('smtp.gmail.com', 465,'ssl')->setUsername('togethernet@stockholmscience.se')->setPassword("TogethernetKillMePlz2016");

$mailer = \Swift_Mailer::newInstance($transport);
$message = \Swift_Message::newInstance('Nu är allt nästan klart!')
   ->setFrom(array('togethernet@stockholmscience.se' => 'Togethernet'))
   ->setTo(array($mailInput => "Mottagare"))
   ->setBody($str, 'text/html');
$result = $mailer->send($message);
}

?>

</body>
</html>


