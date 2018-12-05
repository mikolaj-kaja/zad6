<?php
// Start the session
session_start();
require_once('stopka.php');

if (isset($_POST)){
		$polaczenie = mysqli_connect(localhost, root, Password1, zad6);
		if (!$polaczenie) {
				echo "Błąd połączenia z MySQL." . PHP_EOL;
				echo "Errno: " . mysqli_connect_errno() . PHP_EOL; echo "Error: " . mysqli_connect_error() . PHP_EOL; exit;
		}
		$user=$_SESSION["user_name"];
		$pracownik=$_POST['pracownik'];
		$ocena=$_POST['ocena'];
		mysqli_query($polaczenie, "INSERT INTO oceny (user, pracownik, ocena) VALUES ('$user', '$pracownik','$ocena')") or die ("Błąd 2 zapytania do bazy: $dbname");
}
		header("Location: http://utp.mikolajkaja.pl/zad6/klient/pytanie.php");
?>