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

    <?php 
    if(isset($_POST["submit"])){
        require("../mysql.php");
        $stmt = $mysql->prepare("INSERT INTO changelog (TITLE, CHANGENEWS, CREATED_AT, CAT) VALUES (:title, :change, :now, :cat)");
        $stmt->bindParam(":title", $_POST[title], PDO::PARAM_STR);
        $stmt->bindParam(":change", $_POST[change], PDO::PARAM_STR);
        $stmt->bindParam(":cat", $_POST[cat], PDO::PARAM_STR);
        
        $now = time();
        $stmt->bindParam(":now", $now, PDO::PARAM_STR);

        $stmt->execute();
        echo "Der Change Log wurde erfolgreich geupdated.";
    }
    ?>

    <center>
        <img src="../../src/img/logo.png" alt="SoulGames.de RPG">
        <h1>Erstelle einen Changelog</h1>
    </center>

    <form action="index.php" method="post">
        <input class="form-control" type="text" name="title" placeholder="Title" required><br>
        <textarea class="form-control" name="change" cols="30" rows="10" required></textarea><br>

        <div class="input-group mb-3">
            <div class="input-group-prepend">
            <label class="input-group-text" for="inputGroupSelect01">Thema</label>
        </div>
        <select name="cat" class="custom-select" id="inputGroupSelect01" required>
            <option selected value="Allgemein">Allgemein</option>
            <option value="Webseite">Webseite</option>
            <option value="Discord">Discord</option>
            <option value="Twitter">Twitter</option>
            <option value="Minecraft-Allgemein">Minecraft Allgemein</option>
            <option value="Freebuild">Freebuild</option>
        </select>
        </div>  <br>

        <button class="btn btn-primary btn-lg btn-block" type="submit" name="submit">Veröffentlichen</button>
    </form>
    <br>
    <a href="../logout.php"><button class="btn btn-danger btn-lg btn-block" type="button" name="submit">Logout</button></a>
    </div>
</body>
</html>