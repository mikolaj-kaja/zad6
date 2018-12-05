<?php
// Start the session
session_start();

if( isset($_POST["logout"])) session_unset();
require_once('stopka.php');

		if(isset($_POST)) {
				$link = mysqli_connect(localhost, root, Password1, zad6);
				if(!$link) { echo"Błąd: ". mysqli_connect_errno()." ".mysqli_connect_error(); }
				$typ_uslugi=$_POST["usluga"];
				$user_name=$_POST["user"];
				mysqli_query($link, "UPDATE users SET typ_uslugi='$typ_uslugi' WHERE user LIKE '$user_name'") or die ("Błąd 3 zapytania do bazy: $dbname");
		}

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
<?php
		$polaczenie = mysqli_connect(localhost, root, Password1, zad6);
		if (!$polaczenie) {
				echo "Błąd połączenia z MySQL." . PHP_EOL;
				echo "Errno: " . mysqli_connect_errno() . PHP_EOL; echo "Error: " . mysqli_connect_error() . PHP_EOL; exit;
		}
?>

<p>Użytkownicy i ich usługi</p>
<?php
		print "<table><tr><td>Użytkownik</td><td>Aktualny pakiet</td></tr>";
		$rezultat = mysqli_query($polaczenie, "SELECT * FROM users") or die ("Błąd 1 zapytania do bazy: $dbname");
				while ($wiersz = mysqli_fetch_array ($rezultat)) {
					print "<tr><td>$wiersz[1]</td><td>$wiersz[3]</td></tr>";
				}
		print "</table>";
?>

<br/><br/>
<form method="post">
<fieldset>
<legend>Sprzedaj pakiet</legend>
		<select name="user">
		<?php
		$rezultat = mysqli_query($polaczenie, "SELECT * FROM users") or die ("Błąd 2 zapytania do bazy: $dbname");
				while ($wiersz = mysqli_fetch_array ($rezultat)) {
					print "<option value='$wiersz[1]'>$wiersz[1]</option>";
				}
		?>
		</select>
		<select name="usluga">
				<option value='podstawowy'>Pakiet podstawowy</option>
				<option value='rozszerzony'>Pakiet rozszerzony</option>
		</select>
		<input type="submit" value="Sprzedaj">
</fieldset>
</form>

</body>
</html>