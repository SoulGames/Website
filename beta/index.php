<!DOCTYPE html>
<html lang="en">
<head>
	<title>SoulGames | Impressum</title>

	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta charset="utf-8">
	<meta name="theme-color" content="#FFA500">
	<link rel="shortcut icon" type="image/png" href="../src/img/logo.png"/>

	<!-- SEO -->
	<meta name="title" content="SoulGames.DE | Impressum">
	<meta name="description" content="Dies ist die offiziele Webseite von dem SoulGames.DE Server Netwerk.">
	<meta name="keywords" content="Soulgames, Soulgames.de, RPG, Sevrver, Soulgames RPG, Minecraft RPG, Minecraft RPG Server, SoulGames Netzwerk">
	<meta name="robots" content="index, follow">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<meta name="language" content="English">
	<meta name="revisit-after" content="1 days">
	<meta name="author" content="NoNamePro &amp; StackNeverFlow">

	<!-- Custom CSS for this template -->
	<link rel="stylesheet" type="text/css" href="../src/css/main.css">

	<!-- Font -->
	<link href="https://fonts.googleapis.com/css?family=PT+Sans" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=PT+Sans:700" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=PT+Sans:400" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet"> 

	<!-- Bootstrap -->
	<link rel="stylesheet" type="text/css" href="../src/css/bootstrap/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="../js/bootstrap/bootstrap.min.js">

	<!-- Font Awesome -->
	<script src="https://kit.fontawesome.com/eb905d3d74.js" crossorigin="anonymous"></script>
	
	<!-- Get Theme from URL Parameter and enable theme -->
	<script>
		var head = document.getElementsByTagName('HEAD')[0];
		
		const queryString = window.location.search;
		const urlParams = new URLSearchParams(queryString);
		
		const theme = urlParams.get('theme')
		
		var link = document.createElement('link');
		link.rel = stylesheet;
		link.type = 'text/css';
		
		link.href = 'src/css/themes/' + theme + '.css';  
		
		head.appendChild(link);

		console.log(theme + " theme enabled!");
	</script>

	<!-- Maintenance Check -->
	<script src="../src/js/maintenance.js"></script>
</head>
<body>
	<button onclick="topFunction()" id="myBtn" title="Go to top"><i class="fas fa-arrow-up"></i></button> 
	
	<!-- Navbar -->
	<div class="topnav" id="myTopnav">
		<div class="max-width">
			  <a href="../team" class="left">Team</a>
			  <a href="https://forum.SoulGames.de" class="left">Forum</a>
			  <a href="../news" class="left">News</a>
			  <a href="../changes/" class="left">Change Log</a>
			  <a href="#" class="left">Beta Access</a>
			  <a href="https://invite.teamspeak.com/SoulGames" class="fab fa-teamspeak right" target="_blank"></a>
			  <a href="https://discord.gg/E6xHYky" class="fab fa-discord right" target="_blank"></a>
			  <a href="https://instagram.com/SoulGames_RPG" class="fab fa-instagram right" target="_blank"></a>
		  	  <a href="https://twitter.com/soulgames_rpg" class="fab fa-twitter right" target="_blank"></a>
			  <a href="javascript:void(0);" style="font-size:15px;" class="icon" onclick="myFunction()">&#9776;</a>
		</div>
	</div>

	<header id="head" class="parallax">
		<h1 href="..">SoulGames</h1>
		<h3>Dein RPG Netzwerk</h3>
	</header>

	<section id="gamemodes">
		<h1 id="beta">Beta Access</h1>
		<hr><br>
		  
		
	<?php
      if(isset($_POST["submit"])){
        require("mysql.php");
        $stmt = $mysql->prepare("SELECT * FROM beta WHERE BETAPW = :betapw");
        $stmt->bindParam(":betapw", $_POST["betapw"]);
        $stmt->execute();
        $count = $stmt->rowCount();
        if($count == 1){
          $row = $stmt->fetch();
          if($_POST["betapw"] == $row["BETAPW")){
			require("../admin/mysql.php");
			
        	$stmt = $mysql->prepare("INSERT INTO beta (USERNAME, isBETA) VALUES (:username, :isB)");
        	$stmt->bindParam(":username", $_POST[username], PDO::PARAM_STR);
        	$stmt->bindParam(":isB", true, PDO::PARAM_BOOL);
          } else {
            echo `<div class="alert alert-danger"><strong>Betakey</strong>Der Betakey ist falsch.</div>`;
          }
        } else {
			echo `<div class="alert alert-danger"><strong>Betakey</strong>Der Betakey ist falsch.</div>`;
        }
      }
    ?>

		<form action="index.php" method="post">
		<div class="row fixed-width">
			<div class="col-md ">
				<div class="input-group mb-3">
					<div class="input-group-prepend">
					  <span class="input-group-text" id="basic-addon1">Username</span>
					</div>
					<input name="username" type="text" class="form-control" placeholder="Dein Minecraft Name" aria-label="Username" aria-describedby="basic-addon1">
				  </div>

				  <div class="input-group mb-3">
					<div class="input-group-prepend">
					  <span class="input-group-text" id="basic-addon1">Betakey</span>
					</div>
					<input name="betapw" type="text" class="form-control" placeholder="XXXX-XXXX-XXXX-XXXX" aria-label="Betakey" aria-describedby="basic-addon1">
				  </div>
			</div>
		</div>

		<button type="submit" class="btn btn-primary">Betakey einlösen</button>
		</form>

	</section>

	<section id="banner2" class="parallax">
	</section>

	<footer>
		<div class="footer">
			<div class="copyright-notice">
				<p>&copy; SoulGames <script>document.write(new Date().getFullYear())</script></p>
				<a href="../kontakt">Kontakt</a> | <a href="../impressum">Impressum</a>
			</div>
		</div>
	</footer>

	<!-- Smooth Scrolling Script (from https://goo.gl/uWLqWu) | Do not touch if you don't know what you're doing! Now in local dir-->
	<script src="../src/js/jquery/jquery.min.js"></script>
	<script>
		$(document).ready(function(){
		  // Add smooth scrolling to all links
		  $("a").on('click', function(event) {

		    // Make sure this.hash has a value before overriding default behavior
		    if (this.hash !== "") {
		      // Prevent default anchor click behavior
		      event.preventDefault();

		      // Store hash
		      var hash = this.hash;

		      // Using jQuery's animate() method to add smooth page scroll
		      // The optional number (800) specifies the number of milliseconds it takes to scroll to the specified area
		      $('html, body').animate({
		        scrollTop: $(hash).offset().top
		      }, 100, function(){
		   
		        // Add hash (#) to URL when done scrolling (default click behavior)
		        window.location.hash = hash;
		      });
		    } // End if
		  });
		});
	</script>
	<!-- End Smooth Scrolling Script -->

	<script>
		function myFunction() {
		    var x = document.getElementById("myTopnav");
		    if (x.className === "topnav") {
		        x.className += " responsive";
		    } else {
		        x.className = "topnav";
		    }
		}
	</script>

	<script>
	// When the user scrolls down 20px from the top of the document, show the button
	window.onscroll = function() {scrollFunction()};

	function scrollFunction() {
	    if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
	        document.getElementById("myBtn").style.display = "block";
	    } else {
	        document.getElementById("myBtn").style.display = "none";
	    }
	}

	// When the user clicks on the button, scroll to the top of the document
	function topFunction() {
	    document.body.scrollTop = 0;
	    document.documentElement.scrollTop = 0;
	}
	</script>

</body>
</html>
