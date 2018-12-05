<?php
		if( !isset($_SESSION["user_name"]) || !isset($_SESSION["user_id"]) || $_SESSION["user_type"]!=="pracownik" ){
				session_unset();
				header("Location: http://utp.mikolajkaja.pl/zad6/logowanie2.php");
		}
?>