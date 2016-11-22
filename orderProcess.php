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
$sql = "INSERT INTO order (namn, mail, produkt1, produkt2, produkt3)
VALUES ('$_POST[nameIn]', '$_POST[mailIn]', '$_POST[produkt1In]', '$_POST[produkt2In]', '$_POST[produkt3In]')";

//db confirmation
if ($conn->query($sql) === TRUE) {
    echo "<script>alert('Tack för din order!');</script>";
    echo "<script>setTimeout(\"location.href = '/#section3';\",00);</script>"; //insert new link here 

} else {
    header( 'http://alcaj.ssis.nu/404.html' ) ;
}
// End of DB




?>

</body>
</html>
