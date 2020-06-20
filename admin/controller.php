<?php
session_start();
if(!isset($_SESSION["username"])){
    if(!isset($_SESSION["pw"])) {
    require("../mysql.php");
    $stmt = $mysql->prepare("SELECT * FROM accounts WHERE PASSWORD = :passw");
    $stmt->bindParam(":passw", $_SESSION["pw"]);
    $stmt->execute();
    $row = $stmt->fetch();
    if(!$_SESSION["pw"] == $row["PASSWORD"]) {
        header("Location: ../index.php");
        exit;
    }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SoulGames | Adminboard</title>
    <link rel="stylesheet" type="text/css" href="../../src/css/bootstrap/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="../../src/js/bootstrap/bootstrap.min.js">
</head>
<body>

    <div class="container mx-auto">

    <center>
        <img src="../../src/img/logo.png" alt="SoulGames.de RPG">
        <h1>Admin Control Panel</h1>
        <br>
    </center>

    <a href="addChange"><button class="btn btn-primary btn-lg btn-block" type="submit" name="submit">Changelog hinzufügen</button></a>

    <br>
    <a href="addBeta"><button class="btn btn-primary btn-lg btn-block" type="submit" name="submit">Betakey hinzufügen</button></a>

    <br>
    <a href="addUser"><button class="btn btn-primary btn-lg btn-block" type="submit" name="submit">Admin Account hinzufügen</button></a>

    <br>
    <a href="../logout.php"><button class="btn btn-secondary btn-lg btn-block" type="button" name="submit">Logout</button></a>
    </div>
</body>
</html>