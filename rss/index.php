<?php
	header('Content-Type: application/xml');
?>
<?xml version="1.0" encoding="UTF-8" ?>
<rss version="2.0">
<channel>
	<title>SoulGames</title>
  	<link>https://soulgames.de/changes/</link>
  	<description>Change Log</description>
	<category>Minecraft</category>
	<language>de-de</language>
    <?php 
     	require("../admin/mysql.php");
		
		$stmt = $mysql->prepare("SELECT * FROM changelog");
		$stmt->execute();

		$counter = $stmt->rowCount();
		if($counter == 0) {
			echo "";
		} else {
			while($row = $stmt->fetch()) {
				?>
					<item>
						<title><?php echo htmlentities($row["TITLE"]) ?></title>
						<description><?php echo htmlentities($row["CHANGENEWS"]) ?></description>
						<author>Dein SoulGames Team</author>
						<category><?php echo htmlentities($row["CAT"]) ?></category>
					</item>
				<?php
			}
		}
	?>
</channel>
</rss>
