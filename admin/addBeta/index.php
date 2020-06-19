<?php
session_start();
if(!isset($_SESSION["username"])){
  header("Location: ../index.php");
  exit;
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
        $stmt = $mysql->prepare("INSERT INTO betakeys (BETAPW) VALUES (:betapw)");
        $stmt->bindParam(":betapw", $_POST[betapw], PDO::PARAM_STR);

        $stmt->execute();

        echo "Der Key wurde erfolgreich hinzugefügt.";
    }
    ?>

    <center>
        <img src="../../src/img/logo.png" alt="SoulGames.de RPG">
        <h1>Erstelle einen neuen Betakey</h1>
    </center>

    <form action="index.php" method="post">
        <div class="row fixed-width">
			<div class="col-md ">
				  <div class="input-group mb-3">
					<div class="input-group-prepend">
					  <span class="input-group-text" id="basic-addon1">Betakey</span>
                    </div>
                    <input name="betapw" type="text" class="form-control" placeholder="XXXX-XXXX-XXXX-XXXX" aria-label="Betakey" aria-describedby="basic-addon1" required>
				</div>
			</div>
		</div>

        <button class="btn btn-primary btn-lg btn-block" type="submit" name="submit">Erstellen</button>
    </form>
    <br>
    <a href="../logout.php"><button class="btn btn-danger btn-lg btn-block" type="button" name="submit">Logout</button></a>
    </div>
</body>
</html>