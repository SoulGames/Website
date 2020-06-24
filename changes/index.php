<!DOCTYPE html>
<html lang="en">
<head>
	<title>SoulGames | Change Log</title>

	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta charset="utf-8">
	<meta name="theme-color" content="#FFA500">
	<link rel="shortcut icon" type="image/png" href="../src/img/logo.png"/>

	<!-- SEO -->
	<meta name="title" content="SoulGames.DE | Change Log">
	<meta name="description" content="Dies ist die offiziele Webseite von dem SoulGames.DE Server Netwerk.">
	<meta name="keywords" content="Soulgames, Soulgames.de, RPG, Sevrver, Soulgames RPG, Minecraft RPG, Minecraft RPG Server, SoulGames Netzwerk">
	<meta name="robots" content="index, follow">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<meta name="language" content="German">
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
</head>
<body>

	<button onclick="topFunction()" id="myBtn" title="Go to top"><i class="fas fa-arrow-up"></i></button> 
	
	<!-- Navbar -->
	<div class="topnav" id="myTopnav">
		<div class="max-width">
			<a href="https://SoulGames.DE" class="left"><i class="fas fa-home"></i></a>
			<a href="../team" class="left">Team</a>
			<a href="https://forum.SoulGames.de" class="left">Forum</a>
			<a href="../news" class="left">News</a>
			<a href="../changes/" class="left">Change Log</a>
			<a href="../beta/" class="left">Beta Access</a>
			<a href="https://invite.teamspeak.com/SoulGames" class="fab fa-teamspeak right" ></a>
			<a href="https://discord.gg/E6xHYky" class="fab fa-discord right" ></a>
			<a href="https://instagram.com/SoulGames_RPG" class="fab fa-instagram right" ></a>
		  	<a href="https://twitter.com/soulgames_rpg" class="fab fa-twitter right"></a>
			<a href="javascript:void(0);" style="font-size:15px;" class="icon" onclick="myFunction()">&#9776;</a>
		</div>
	</div>

	<header id="head" class="parallax">
		<h1 href="..">SoulGames</h1>
		<h3>Dein RPG Netzwerk</h3>
	</header>

	<noscript>
		<section id="banner" class="parallax">
		</section>
		<section id="about">
			<div class="alert alert-warning" role="alert">
				<b>Dein Browser hat JavaScript deaktiviert</b>. Ein paar Funktionen können deswegen nicht aktiviert werden.
			</div>
		</section>
	</noscript>

	<section id="gamemodes">
		<h1 id="impressum">Change Log</h1>
		<hr><br>
	
		<div class="row fixed-width">
			<div class="col-md ">
            <?php 
                require("../admin/mysql.php");

                $stmt = $mysql->prepare("SELECT * FROM `changelog` ORDER BY `changelog`.`CREATED_AT` DESC");
                $stmt->execute();

                $changes = $stmt->rowCount();
                if($changes == 0) {
                    echo "Es wurden keine Änderungen gefunden.";
                } else {
                    while($row = $stmt->fetch()) {
					?>
                    <h1><?php echo htmlentities($row["TITLE"]) ?></h1>
					<p><?php 
						$new_string = str_replace("\n", "<br>", $row["CHANGENEWS"]);
						echo $new_string;
					?></p>
					<p><?php echo date("d.m.Y", $row["CREATED_AT"]) ?></p>
					<p>Kategorie: <?php echo htmlentities($row["CAT"]) ?></p>
					<hr>
                    <?php
                }
            }
            ?>
			</div>
		</div>
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