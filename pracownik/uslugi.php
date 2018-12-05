<?php
// Start the session
session_start();
require_once('stopka.php');
		
		if(isset($_POST["ekstra"])) {
				$link = mysqli_connect(localhost, root, Password1, zad6);
				if(!$link) { echo"Błąd: ". mysqli_connect_errno()." ".mysqli_connect_error(); }
				$id=$_SESSION["user_id"];
				mysqli_query($link, "UPDATE users SET typ_uslugi = 'rozszerzony' WHERE ID LIKE '$id'");
		}
		
		if(isset($_POST["podstawowy"])) {
				$link = mysqli_connect(localhost, root, Password1, zad6);
				if(!$link) { echo"Błąd: ". mysqli_connect_errno()." ".mysqli_connect_error(); }
				$id=$_SESSION["user_id"];
				mysqli_query($link, "UPDATE users SET typ_uslugi = 'podstawowy' WHERE ID LIKE '$id'");
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

<p>Kup nową usługę</p>

<?php
		echo "Witaj " . $_SESSION["user"] . "!";
?>
<br />
<br />
<a href=panel.php />Panel główny</a>
<br />
<br />

<table>
<tr><td>
<form method="post">
<fieldset>
<legend>Usługa podstawowa</legend>
		<p>Pakiet podstawowy</p>
		Prędkość niska
		<br />
		Cena niska
		<br /><br />
		<input type="hidden" name="podstawowy">
		<input type="submit" value="Kup">
		<br />
		<?php if(isset($_POST["podstawowy"])) {echo '<span id="correct">Kupiono</span>';} ?>
		<br />
</fieldset>
</form>
</td><td>
<form method="post">
<fieldset>
<legend>Usługa podstawowa</legend>
		<p>Pakiet rozszerzony</p>
		Prędkość wysoka
		<br />
		Cena wysoka
		<br /><br />
		<input type="hidden" name="ekstra">
		<input type="submit" value="Kup">
		<br />
		<?php if(isset($_POST["ekstra"])) {echo '<span id="correct">Kupiono</span>';} ?>
		<br />
</fieldset>
</form>
</td></tr></table>

</body>
</html>