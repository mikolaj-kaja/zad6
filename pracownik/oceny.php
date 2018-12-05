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
<p>Oceny pracowników</p>
<?php

		$polaczenie = mysqli_connect(localhost, root, Password1, zad6);
		if (!$polaczenie) {
				echo "Błąd połączenia z MySQL." . PHP_EOL;
				echo "Errno: " . mysqli_connect_errno() . PHP_EOL; echo "Error: " . mysqli_connect_error() . PHP_EOL; exit;
		}

		$pracownik1 = $pracownik2 = $pracownik3 = $licznik1 = 0;
		$rezultat = mysqli_query($polaczenie, "SELECT * FROM oceny") or die ("Błąd 2 zapytania do bazy: $dbname");
		while ($wiersz = mysqli_fetch_array ($rezultat)) {
				if($wiersz[2]==="pracownik1"){
						$pracownik1 = $pracownik1 + $wiersz[3];
						$licznik1 = $licznik1 + 1;
				}
				if($wiersz[2]==="pracownik2"){
						$pracownik2 = $pracownik2 + $wiersz[3];
						$licznik2 = $licznik2 + 1;
				}
				if($wiersz[2]==="pracownik3"){
						$pracownik3 = $pracownik3 + $wiersz[3];
						$licznik3 = $licznik3 + 1;
				}
		}
		echo "pracownik1 - " . $pracownik1/$licznik1 . "<br/>pracownik2 - " . $pracownik2/$licznik2 . "<br/>pracownik3 - " . $pracownik3/$licznik3 . "<br/>";
?>

</body>
</html>