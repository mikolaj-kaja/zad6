<?php
// Start the session
session_start();
require_once('stopka.php');
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8" />
<title>Kaja</title>
</head>
<body>

<?php

		$dbhost="127.0.0.1";
		$dbuser="root";
		$dbpassword="Password1";
		$dbname="zad6";
		$dbtable = "wiadomosci";

		$polaczenie = mysqli_connect($dbhost, $dbuser, $dbpassword, $dbname);
		if (!$polaczenie) {
				echo "Błąd połączenia z MySQL." . PHP_EOL;
				echo "Errno: " . mysqli_connect_errno() . PHP_EOL; echo "Error: " . mysqli_connect_error() . PHP_EOL; exit;
		}

		$rezultat = mysqli_query($polaczenie, "SELECT * FROM $dbtable") or die ("Błąd 2 zapytania do bazy: $dbname");
?>
<p>Chat z pracownikiem</p>

<br />
<a href=panel.php />Panel główny</a>
<br />

<!--Dodaj okno z drugim dokumentem-->
		<iframe src='dodaj.php' style='border:none;height:60px;width:750px'></iframe>
<form method="post" action="ocena.php">
<fieldset>
<legend>Oceń pracownika</legend>
		<select name="pracownik">
		<?php
		$rezultat2 = mysqli_query($polaczenie, "SELECT * FROM pracownicy") or die ("Błąd 2 zapytania do bazy: $dbname");
				while ($wiersz = mysqli_fetch_array ($rezultat2)) {
					print "<option value='$wiersz[1]'>$wiersz[1]</option>";
				}
		?>
		</select>
		<br><br>
		<input type="radio" name="ocena" value="1"> 1<br>
		<input type="radio" name="ocena" value="2"> 2<br>
		<input type="radio" name="ocena" value="3"> 3<br>
		<input type="radio" name="ocena" value="4"> 4<br>
		<input type="radio" name="ocena" value="5"> 5<br>
		<input type="submit" value="Oceń">
</fieldset>
</form>
		
		<TABLE BORDER=1>
		<TR><TD>Nick</TD><TD width="600">Wiadomość</TD><TD width="60">Godzina</TD></TR>
		
<?php
		while ($wiersz = mysqli_fetch_array ($rezultat)) {
				$time = strtotime($wiersz[3]);
				$time = date('H:i:s', $time);
				print '<TR><TD>' . $wiersz[1] . '</TD><TD>' . $wiersz[2] . '</TD><TD bgcolor="yellow">' . $time . '</TD></TR>';
		}
		print "</TABLE>";
?>
<br/>
</body>
</html>