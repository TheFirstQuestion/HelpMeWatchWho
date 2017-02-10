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
		// TW/NW/SJAminisodes/minisodes/TAG/TVM/CL = 0, SJA = 1, WoL = 2, CW = 3
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
	<h1><?php echo $season; ?><?php if ($type == 1) { echo "/" . $season2; } ?>: <?php echo $title; ?></h1>
	
	<?php
		if ($story != '') {
			echo "<h3>Story&nbsp;No.&nbsp; $story</h3>";
		};
	?>
	
	<p><?php echo $desc; ?></p>
	
	<img <?php echo "src='Screencaps/" . $episodeID . ".jpg'"; ?>/>
	
	<br>
	
	
	<?php
		if ($type == 3) {
			$a = db_select("SELECT * FROM `CW Episodes` WHERE `LinkID` = $episodeID");
			foreach ($a as $x) {
				$t = $x[Title];
				
				if (strpos($t, 'Part ') !== false) {
					echo "<h2>Where To Watch " . $t . "</h2>";
				} else {
					echo "<h2>Where To Watch <i>" . $t . "</i></h2>";
				}
				
				
				
				$epID = $x[EpisodeID];
				$m = $x[Missing];
				
				
				// For testing/data entry purposes only
				//echo " " . $epID;
				
				if ($m) {
					echo "<span id='missing'>(missing)</span>";
				}
				
				echo "<br>";
				
				$wtw = db_select("SELECT * FROM `CW WhereToWatch` WHERE `LinkID` = $epID");
				if ($wtw === false) {
					$error = db_error();
				}
		
				if (empty($wtw)) {
					echo "<p>We haven't found this episode online yet.</p>";
				} else {
					echo "<ul>";
					foreach($wtw as $x) {
						echo "<li><a href='" . $x[Link] . "'>" . $x[Source] . "</a></li>";
					}
					echo "</ul>";
				}
			}
		} else {
			echo "<h2>Where To Watch";
			if ($type == 1) {
				 echo " Part One"; 
			}
			echo "</h2>";
			
			$wtw = db_select("SELECT * FROM `WhereToWatch` WHERE `LinkID` = $episodeID");
			if ($wtw === false) {
				$error = db_error();
			}
		
			if (empty($wtw)) {
				echo "<p>We haven't found this episode online yet.</p>";
			} else {
				echo "<ul>";
				foreach($wtw as $x) {
					echo "<li><a href='" . $x[Link] . "'>" . $x[Source] . "</a></li>";
				}
				echo "</ul>";
			}
			
			if ($type == 1) {
				echo "<h2>Where To Watch Part Two</h2>";
				$wtwb = db_select("SELECT * FROM `WhereToWatch` WHERE `LinkID` = $ep2id");
				if($wtwb === false) {
					$error = db_error();
				}
			
				if (empty($wtwb)) {
					echo "<p>We haven't found this episode online yet.</p>";
				} else {
					echo "<ul>";
					foreach($wtwb as $x) {
						echo "<li><a href='" . $x[Link] . "'>" . $x[Source] . "</a></li>";
					}
					echo "</ul>";
				}
			
			}
			
			if ($type == 2) {
				echo "<h2>Full Story</h2><ul><li><a href='http://www.dailymotion.com/video/xpepwe_torchwood-miracle-day-web-of-lies-complete-story-dvd-subita_shortfilms'>DailyMotion</a></li></ul></div>";
			}
		}
		
		
		$bts = db_select("SELECT * FROM `BehindTheScenes` WHERE `LinkID` = $episodeID");
			if ($bts != null) {
				echo "<br><h2>Behind the Scenes Videos</h2><ul>";
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
		if(isset($_GET['serialID'])) {
			classicRight();
		} else {
			right();
		}
	?>
</div>
</div>
</body>
</html>
