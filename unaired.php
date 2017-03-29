<?php
	require("helper.php");

	// Use db_quote to escape string and prevent SQL injection
	$episodeID = db_quote($_GET['episodeID']);
	$rows = db_select("SELECT * FROM `Episodes` WHERE `EpisodeID` = $episodeID");

	if ($rows === false) {
    	$error = db_error();
	}

	$title = $rows[0][Title];
	$desc = $rows[0][Description];
	$season = $rows[0][Season];
	$story = $rows[0][Story];
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


	<?php
		//Remove quotes from the episodeID used in the picture link
		$epIDnoQuotes = str_replace("'", "", $episodeID);
	?>

	<p><?php echo $desc; ?></p>

	<img <?php echo "src='Screencaps/" . $epIDnoQuotes . ".jpg'"; ?>/>

	<br>

	<h2>This episode has not aired yet.</h2>



	</div>

<div id ="right">
	<?php
		right();
	?>
</div>
</div>
</body>
</html>
