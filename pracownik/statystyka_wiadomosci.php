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
<p>Statystyka wiadomości</p>
<?php

		$polaczenie = mysqli_connect(localhost, root, Password1, zad6);
		if (!$polaczenie) {
				echo "Błąd połączenia z MySQL." . PHP_EOL;
				echo "Errno: " . mysqli_connect_errno() . PHP_EOL; echo "Error: " . mysqli_connect_error() . PHP_EOL; exit;
		}

		$rezultat = mysqli_query($polaczenie, "SELECT count(ID) FROM wiadomosci WHERE kto LIKE 'user' ") or die ("Błąd 2 zapytania do bazy: $dbname");
		while ($wiersz = mysqli_fetch_array ($rezultat)) {
				echo "Wiadomości użytkowników: ".$wiersz[0];
		}
		$rezultat = mysqli_query($polaczenie, "SELECT count(ID) FROM wiadomosci WHERE kto LIKE 'pracownik' ") or die ("Błąd 2 zapytania do bazy: $dbname");
		while ($wiersz = mysqli_fetch_array ($rezultat)) {
				echo "<br/>Wiadomości pracowników: ".$wiersz[0];
		}
		
		echo "<br /><br /><a href=wiadomosci1.php />Pokaż wszystkie wiadomości użytkowników</a><br />";
		echo "<br /><a href=wiadomosci2.php />Pokaż wszystkie wiadomości pracowników</a><br />";	
?>

</body>
</html>