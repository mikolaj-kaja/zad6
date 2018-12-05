<?php
// Start the session
session_start();

function secure_input($data) {
  	$data = trim($data);
  	$data = stripslashes($data);
  	$data = htmlspecialchars($data);
  	return $data;
}
		$password_status="";
if( !empty($_POST) )
{
		$user=secure_input($_POST['user']);
		$pass=secure_input($_POST['pass']);
		$ipaddress=$_SERVER["REMOTE_ADDR"];
		$user_agent=$_SERVER["HTTP_USER_AGENT"];
				$link = mysqli_connect(localhost, root,Password1, zad6);
				if(!$link) { echo"Błąd: ". mysqli_connect_errno()." ".mysqli_connect_error(); }
				$result = mysqli_query($link, "SELECT * FROM pracownicy WHERE user='$user' AND pass='$pass' LIMIT 1");
				
				$rekord = mysqli_fetch_array($result);
				if(!$rekord) {
						echo "<br/><span id='error'>Błędne dane</span>";
						mysqli_query($link, "INSERT INTO logowanie (user, czas, IP, user_agent, udane) VALUES ('$user',now(),'$ipaddress', '$user_agent', 'Nie')");
				} else {
						$password_status = "<br/><span id='correct'>Zalogowano</span>";
						$_SESSION["user_name"]=$user;
						$_SESSION["user_id"]=$rekord[0];
						$_SESSION["user_type"]="pracownik";
						$_SESSION["manager"]=$rekord[3];
						mysqli_query($link, "INSERT INTO logowanie (user, czas, IP, user_agent, udane) VALUES ('$user',now(),'$ipaddress', '$user_agent', 'Tak')");
						
						header("Location: http://utp.mikolajkaja.pl/zad6/pracownik/panel.php");
				}
				mysqli_close($link);
}
?>