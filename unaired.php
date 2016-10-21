<?php
	require("helper.php");

	$episodeID = $_GET['episodeID'];
	$ep2id = $episodeID + 1;
	$rows = db_select("SELECT * FROM `Episodes` WHERE `EpisodeID` = $episodeID");

	if ($rows === false) {
    	$error = db_error();
	} 
	
	$rows2 = db_select("SELECT * FROM `Episodes` WHERE `EpisodeID` = $ep2id");

	if ($rows2 === false) {
    	$error = db_error();
	} 
	
	$season2 = $rows2[0][Season];

	$title = $rows[0][Title];
	$desc = $rows[0][Description];
	$season = $rows[0][Season];
	$story = $rows[0][Story];
	$type = $rows[0][Type];
		// TW/NW/SJAminisodes/minisodes/TAG/TVM = 0, SJA = 1, WoL = 2, CW = 3
?>

<!DOCTYPE html>
<html>
<head>
	<link type="text/css" rel="stylesheet" href="episodes style.css">
	<link type="text/css" rel="stylesheet" href="link-colors.css">
	<script language="JavaScript"; src="boxes sort.js"></script>
	<title><?php echo strip_tags($title); ?> | HelpMeWatchWho</title>
</head>

<?php include("header.php"); ?>

<body onLoad="sortEpisodes();">
<div id="everything">
<div id="left">
	<h1><?php echo $season; ?>: <?php echo $title; ?></h1>
	
	<?php
		if ($story != '') {
			echo "<h3>Story&nbsp;No.&nbsp; $story</h3>";
		};
	?>
	
	<p><?php echo $desc; ?></p>
	
	<img <?php echo "src='Screencaps/" . $episodeID . ".jpg'"; ?>/>
	
	<br>
	
	<p>This episode has not aired yet.</p>
	

	
	</div>

<div id ="right">
	<?php
		right();
	?>
</div>
</div>
</body>
</html>
