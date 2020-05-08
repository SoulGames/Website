<?php
session_start();
if(!isset($_SESSION["username"])){
  header("Location: index.php");
  exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SoulGames | Adminboard</title>
    <link rel="stylesheet" type="text/css" href="../src/css/bootstrap/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="../src/js/bootstrap/bootstrap.min.js">
</head>
<body>

    <?php 
    if(isset($_POST["submit"])){
        require("mysql.php");
        $stmt = $mysql->prepare("INSERT INTO changelog (TITLE, CHANGENEWS, CREATED_AT) VALUES (:title, :change, :now)");
        $stmt->bindParam(":title", $_POST[title], PDO::PARAM_STR);
        $stmt->bindParam(":change", $_POST[change], PDO::PARAM_STR);
        
        $now = time();
        $stmt->bindParam(":now", $now, PDO::PARAM_STR);

        $stmt->execute();
        echo "Der Change Log wurde erfolgreich geupdated.";
    }

    ?>
    <div class="container mx-auto">
    <center><h1>Erstelle einen Changelog</h1></center>
    <form action="addchange.php" method="post">
        <input class="form-control" type="text" name="title" placeholder="Title" required><br>
        <textarea class="form-control" name="change" cols="30" rows="10" required></textarea><br>
        <button class="btn btn-primary btn-lg btn-block" type="submit" name="submit">Veröffentlichen</button>
    </form>
    <br>
    <a href="logout.php"><button class="btn btn-danger btn-lg btn-block" type="button" name="submit">Logout</button></a>
    </div>
</body>
</html>