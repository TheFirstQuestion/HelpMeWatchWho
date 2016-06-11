<?php
	require("helper.php");

	$episodeID = $_GET['episodeID'];
	$ep2id = $episodeID + 1;
	$rows = db_select("SELECT * FROM `Episodes` WHERE `EpisodeID` = $episodeID");

	if($rows === false) {
    	$error = db_error();
	} 

	$title = $rows[0][Title];
	$desc = $rows[0][Description];
	$season = $rows[0][Season];
	$story = $rows[0][Story];
	$type = $rows[0][Type];
		// TW/NW/SJAminisodes/minisodes/TAG = 0, SJA = 1, WoL = 2
?>

<!DOCTYPE html>
<html>
<head>
	<link type="text/css" rel="stylesheet" href="episodes style.css">
	<link href="http://fonts.googleapis.com/css?family=Josefin+Sans:600|Maven+Pro" rel="stylesheet" type="text/css">
	<script language="JavaScript"; src="boxes sort.js"></script>
	<title><?php echo $season; ?>: <?php echo strip_tags($title); ?></title>
</head>
<body onLoad="sortEpisodes();">

<a href="./index.html">BACK</a>

<div id="left">
	<h1><?php echo $season; ?>: <?php echo $title; ?></h1>
	
	<?php
	if ($story != '') {
		echo "<h3>Story&nbsp;No.&nbsp; $story</h3>";
	};
	?>
	
	<p><?php echo $desc; ?></p>

	<img <?php echo "src='Images/" . $episodeID . ".jpg'"; ?>/>
	
	<h2>Where To Watch<?php if ($type == 1) { echo " Part One"; } ?></h2>
	<ul>
	<?php
		$wtw = db_select("SELECT * FROM `WhereToWatch` WHERE `LinkID` = $episodeID");
		if($wtw === false) {
    		$error = db_error();
		}
		foreach($wtw as $x) {
			echo "<li><a href='" . $x[Link] . "'>" . $x[Source] . "</a></li>";
		}
	?>
	</ul>
	
	<?php
		if ($type == 1) {
			echo "<h2>Where To Watch Part Two</h2><ul>";
			$wtwb = db_select("SELECT * FROM `WhereToWatch` WHERE `LinkID` = $ep2id");
			if($wtwb === false) {
    			$error = db_error();
    			// Handle error - inform administrator, log to file, show error page, etc.
			}
			foreach($wtwb as $x) {
				echo "<li><a href='" . $x[Link] . "'>" . $x[Source] . "</a></li>";
			}
			echo "</ul>";
		}
	?>
	
	<?php
		if ($type == 2) {
			echo "<h2>Full Story</h2><ul><li><a href='http://www.dailymotion.com/video/xpepwe_torchwood-miracle-day-web-of-lies-complete-story-dvd-subita_shortfilms'>DailyMotion</a></li></ul></div>";
		}
	?>

	<?php
		$bts = db_select("SELECT * FROM `BehindTheScenes` WHERE `LinkID` = $episodeID");
		if ($bts != null) {
			echo "<h2>Behind the Scenes Videos</h2><ul>";
			if($bts === false) {
    			$error = db_error();
			}
			foreach($bts as $x) {
				echo "<li><a href='" . $x[Link] . "'>" . $x[Title] . "</a></li>";
			}
			echo "</ul>";
		}
	?>
	
	</div>

<div id ="right">
	<?php
		right();
	?>
</div>

</body>
</html>