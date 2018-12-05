<?php
// Start the session
session_start();
require_once('stopka.php');

		function secure_input($data) {
  			$data = trim($data);
  			$data = stripslashes($data);
  			$data = htmlspecialchars($data);
  			return $data;
		}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

if(empty($_POST["post"])){
		$err = "Wprowadz wiadomość!";
}else{
		$err = "";
		$godzina = date('H:i:s', time()+60*60*2); //GMC+2
		$post = secure_input($_POST['post']);
		$nick = $_SESSION["user_name"];
// ZAPISYWANIE DO BAZY DANYCH
		
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

		mysqli_query($polaczenie, "INSERT INTO $dbtable (Nick,text,time,kto) VALUES ('$nick','$post',now(),'pracownik')" ) or die ("Błąd 1 zapytania do bazy: $dbname");
		mysql_close();
		}
}

?>
<form method="POST">
		Wiadomość: <input type="text" name="post" maxlength="255" size="255"><br/>
		<input type="submit" value="Wyślij" />
		<?php echo "<span style='color:red'>$err<span>"; ?>
</form>
