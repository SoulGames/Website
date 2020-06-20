<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>SoulGames | Adminboard</title>
    <link rel="stylesheet" type="text/css" href="../src/css/bootstrap/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="../src/js/bootstrap/bootstrap.min.js">
  </head>
  <body>
    <div class="container mx-auto">

    <center>
      <img src="../src/img/logo.png" alt="SoulGames.de RPG">
      <h1>Anmelden</h1>
    </center>

      <?php
      if(isset($_POST["submit"])){
        require("mysql.php");
        $stmt = $mysql->prepare("SELECT * FROM accounts WHERE USERNAME = :user");
        $stmt->bindParam(":user", $_POST["username"]);
        $stmt->execute();
        $count = $stmt->rowCount();
        if($count == 1){
          $row = $stmt->fetch();
          if(password_verify($_POST["pw"], $row["PASSWORD"])){
            session_start();
            $_SESSION["username"] = $row["USERNAME"];
            header("Location: addChange/index.php");
          } else {
            echo `Der Login ist fehlgeschlagen.`;
          }
        } else {
          echo `Der Login ist fehlgeschlagen.`;
        }
      }
      ?>
        <form action="index.php" method="post">
        <input class="form-control" type="text" name="username" placeholder="Username" required><br>
        <input class="form-control" type="password" name="pw" placeholder="Passwort" required><br>
        <button class="btn btn-primary" type="submit" name="submit">Einloggen</button>
    </form>
    </div>
  </body>
</html>
