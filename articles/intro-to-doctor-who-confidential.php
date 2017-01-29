<?php require("../header.php"); ?>
<link type="text/css" rel="stylesheet" href="articles style.css">
<title>Introduction to Doctor Who Confidential | HelpMeWatchWho</title>

<div id="everything">

<div id="head">
	<h1>Introduction to <em>Doctor Who Confidential</em></h1>
	<img src="images/dwc logo.jpg" id="headingImg" />
</div>

<p>When <em>Doctor Who</em> returned in 2005, the BBC created a companion program called <em>Doctor Who Confidential</em>. After each new episode of the main show aired, viewers were treated to a 30-40 minute documentary behind the scenes of that episode. Each episode of <em>Confidential</em> included interviews with cast and crew, footage from behind the scenes, and discussions about the episode.</p>

<div class="imgWrapper"><img src="images/dwc interview 1.jpg" /><img src="images/dwc interview 2.jpg" /></div>

<p><em>Confidential</em> continued to accompany <em>Doctor Who</em> through seasons 1-6, when it was definitively cancelled. Episodes were released on DVD in "cut-down" form; they were 10-15 minutes long and had licensed music and discussion of Classic Who removed.</p>

<div class="imgWrapper"><img src="images/dwc 1.jpg" /><img src="images/dwc 2.jpg" /></div>

<p>Due to popular demand, the BBC created a new behind-the-scenes show for season 8 called <em>Doctor Who Extra</em>. For season 8, each episode was about 10 minutes long and included interviews and exclusive footage from the <em>Doctor Who</em> episode, just like <em>Confidential</em>. For season 9, the format changed to several shorter 1-2 minute clips per episode.</p>

<div class="imgWrapper"><img src="images/dwe 1.jpg" /><img src="images/dwe 2.jpg" /></div>

<p>Watching <em>Confidential</em>, even if you've already seen all of <em>Doctor Who</em>, can be very worthwhile. The purpose of the show is to take an in-depth look at the episode and provide more information about it: how special effects were created, characterization, how actors were cast, connections to <em>Doctor Who</em> history, and many other pieces of information.</p>

<div class="imgWrapper"><img src="images/dwc 3.jpg" /><img src="images/dwc 4.jpg" /></div>

<p><em>Confidential</em> and <em>Extra</em> episodes are as follows (<em>Doctor Who</em> episode in parentheses):</p>
	
	<ul>

<?php

	require("../helper.php");
	include_once("../simple_html_dom.php");
	$target_url = "../list.php";
	$html = new simple_html_dom();
	$html->load_file($target_url);
	
	
	// Get all links with class NW only
	foreach($html->find('a[class="NW"]') as $a) {
		if (strpos($a->class, 'M') == false) {
			if (strpos($a->class, 'AF') == false) {
				if (strpos($a->class, 'other') == false) {
					// Get the episode ID via the url
					$equal = explode("=", $a->href, 2);
					$first = $equal[1];
					$ID = explode("&", $first, 2)[0];
					
					// Get extra/confidential episodes from database that match current episode
					$episodes = db_select("SELECT * FROM `BehindTheScenes` WHERE `LinkID` = $ID AND (`Title` LIKE '%Confidential%' OR `Title` LIKE '%Extra%')");
					
					foreach ($episodes as $i) {
						$epID = $i[LinkID];
						$ep = db_select("SELECT * FROM `Episodes` WHERE `EpisodeID` = $epID");
						echo "<li><a href='" . $i[Link] . "'>" . $i[Title] . "</a> (" . $ep[0][Season] . " " . $ep[0][Title] . ")</li>";
					}
				}
			}	
		}
	};

?>

	</ul>




<a name="TWD"></a>
<br><br><br>
<div id="head">
	<h1><em>Torchwood Declassified</em></h1>
	<img src="images/tdc logo.jpg" id="headingImg" />
</div>

<p>In the same vein, the spin-off <em>Torchwood</em> was also accompanied by a behind-the-scenes show, called <em>Torchwood Declassified</em>. Each episode gave viewers an in-depth look at a <em>Torchwood</em> episode, providing more detail and information. Unlike <em>Confidential</em>, however, episodes of <em>Torchwood Declassified</em> were only about ten minutes long.</p>

<div class="imgWrapper"><img src="images/twd 1.jpg" /><img src="images/twd 2.jpg" /></div>

<p>The show aired alongside <em>Torchwood</em> for two seasons. A special 30-minute episode accompanied the whole of <em>Children of Earth</em>, the third season, and two episodes were released on DVD for the fourth season, <em>Miracle Day</em>.</p>

<div class="imgWrapper"><img src="images/twd 3.jpg" /><img src="images/twd 4.png" /></div>

<p>Like <em>Confidential</em>, <em>Torchwood Declassified</em> can be a worthwhile watch, especially if you've seen all the episodes.</p>

<p><em>Torchwood Declassified</em> episodes are as follows (<em>Torchwood</em> episode in parentheses):</p>

	<ul>

<?php

	// Get all links with class TW only
	foreach($html->find('a[class="TW"]') as $a) {
		if (strpos($a->class, 'M') == false) {
			if (strpos($a->class, 'AF') == false) {
				if (strpos($a->class, 'other') == false) {
					// Get the episode ID via the url
					$equal = explode("=", $a->href, 2);
					$first = $equal[1];
					$ID = explode("&", $first, 2)[0];
					
					// Get declassified episodes from database that match current episode
					$episodes = db_select("SELECT * FROM `BehindTheScenes` WHERE `LinkID` = $ID AND (`Title` LIKE '%Declassified%')");
					
					foreach ($episodes as $i) {
						$epID = $i[LinkID];
						$ep = db_select("SELECT * FROM `Episodes` WHERE `EpisodeID` = $epID");
						echo "<li><a href='" . $i[Link] . "'>" . $i[Title] . "</a> (" . $ep[0][Season] . " " . $ep[0][Title] . ")</li>";
					}
				}
			}	
		}
	};
	$html->clear();
    	unset($html);
?>

	</ul>
	

</div>
