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

<p>Panel pracownika</p>
<?php echo "Witaj " . $_SESSION["user_name"] . "!"; ?>

<form method="post">
		<input type="hidden" name="logout">
		<input type="submit" value="Wyloguj się">
</form>
<?php
if(!$_SESSION["manager"]){
		echo "<br /><a href=pytanie.php />Odpowiedz na pytania użytkowników</a><br />";
		require_once("sprzedaj_pakiet.php");
}

if($_SESSION["manager"]){
		require_once("oceny.php");
		require_once("statystyka_wiadomosci.php");
		require_once("statystyka_sprzedazy.php");
}
?>

</body>
</html>