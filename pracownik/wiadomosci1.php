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
<br />
<a href=panel.php />Panel główny</a>
<br />
<p>Wiadomości użytkowników</p>
<?php

		$polaczenie = mysqli_connect(localhost, root, Password1, zad6);
		if (!$polaczenie) {
				echo "Błąd połączenia z MySQL." . PHP_EOL;
				echo "Errno: " . mysqli_connect_errno() . PHP_EOL; echo "Error: " . mysqli_connect_error() . PHP_EOL; exit;
		}
?>

<TABLE BORDER=1>
<TR><TD>Nick</TD><TD width="600">Wiadomość</TD><TD width="60">Godzina</TD></TR>
		
<?php
		$rezultat = mysqli_query($polaczenie, "SELECT * FROM wiadomosci WHERE kto LIKE 'user' ") or die ("Błąd 2 zapytania do bazy: $dbname");
		while ($wiersz = mysqli_fetch_array ($rezultat)) {
				$time = strtotime($wiersz[3]);
				$time = date('H:i:s', $time);
				print '<TR><TD>' . $wiersz[1] . '</TD><TD>' . $wiersz[2] . '</TD><TD bgcolor="yellow">' . $time . '</TD></TR>';
		}
		print "</TABLE>";
?>

</body>
</html>