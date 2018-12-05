<?php
		if( !isset($_SESSION["user_name"]) || !isset($_SESSION["user_id"]) || $_SESSION["user_type"]!=="user" || !isset($_SESSION["typ_uslugi"]) ){
				session_unset();
				header("Location: http://utp.mikolajkaja.pl/zad6/logowanie.php");
		}
?>