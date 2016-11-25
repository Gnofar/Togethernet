<!DOCTYPE html>
<html>
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
$sql = "INSERT INTO bestall (produkt1, produkt2, produkt3, produkt4, produkt5, produkt6, produkt7, produkt8, produkt9, produkt10, mail )
VALUES ('$_POST[produkt1In]', '$_POST[produkt2In]', '$_POST[produkt3In]', '$_POST[produkt4In]', '$_POST[produkt5In]', '$_POST[produkt6In]', '$_POST[produkt7In]', '$_POST[produkt8In]', '$_POST[produkt9In]', '$_POST[produkt10In]', '$_POST[mailIn]')";

//USE PDO IN FUTURE

$produkter = array($_POST['produkt1In'],$_POST['produkt2In'],$_POST['produkt3In'],$_POST['produkt4In'],$_POST['produkt5In'],$_POST['produkt6In'],$_POST['produkt7In'],$_POST['produkt8In'],$_POST['produkt9In'],$_POST['produkt10In'] );

    echo $_POST['produkt1In'];

    for ($x = 0; $x < 10; $x++) {
    	//if ($produkter[$x] > 0) {
			echo $produkter[$x];
		//}
    }


$saker = array(2, 3, 4, 25, 4);

for ($x = 0; $x < 5; $x++) {
    	if ($saker[$x] > 0) {
			echo $saker[$x];
		}
    }


?>


</body>
</html>
