<?php
$host = "localhost";
$name = "adminboard";
$user = "root";
$passwort = "";
// replace the data with your mysql data
try{
    $mysql = new PDO("mysql:host=$host;dbname=$name", $user, $passwort);
} catch (PDOException $e){
	error_log("SQL Error: ".$e->getMessage());
	header('Location: /error');
	exit;
}
?>