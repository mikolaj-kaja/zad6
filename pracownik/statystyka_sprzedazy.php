<?php
// Start the session
session_start();

if( isset($_POST["logout"])) session_unset();
require_once('stopka.php');
?>

<!DOCTYPE html>
<html>
<head>
		<meta charset="UTF-8">
		<title>Kaja</title>
		<style>
		#error {
			color: red;
		}
		#correct {
			color: green;
		}
		</style>
</head>
<body>
<p>Statystyka sprzedaży</p>
<?php

		$polaczenie = mysqli_connect(localhost, root, Password1, zad6);
		if (!$polaczenie) {
				echo "Błąd połączenia z MySQL." . PHP_EOL;
				echo "Errno: " . mysqli_connect_errno() . PHP_EOL; echo "Error: " . mysqli_connect_error() . PHP_EOL; exit;
		}
		$rezultat = mysqli_query($polaczenie, "SELECT count(ID) FROM users") or die ("Błąd 2 zapytania do bazy: $dbname");
		while ($wiersz = mysqli_fetch_array ($rezultat)) {
				$klienci=$wiersz[0];
				echo "Liczba klientów: ".$klienci;
		}
		$rezultat = mysqli_query($polaczenie, "SELECT count(ID) FROM users WHERE typ_uslugi	 LIKE 'podstawowy' ") or die ("Błąd 2 zapytania do bazy: $dbname");
		while ($wiersz = mysqli_fetch_array ($rezultat)) {
				$podstawowy=$wiersz[0];
				echo "<br/>Kupionych pakietów podstawowych: ".$podstawowy.". Jest to ~".$podstawowy/$klienci."% sprzedaży";
		}
		$rezultat = mysqli_query($polaczenie, "SELECT count(ID) FROM users WHERE typ_uslugi	 LIKE 'rozszerzony' ") or die ("Błąd 2 zapytania do bazy: $dbname");
		while ($wiersz = mysqli_fetch_array ($rezultat)) {
				$rozszerzony=$wiersz[0];
				echo "<br/>Kupionych pakietów rozszerzonych: ".$rozszerzony.". Jest to ~".$rozszerzony/$klienci."% sprzedaży";
		}
?>

</body>
</html>