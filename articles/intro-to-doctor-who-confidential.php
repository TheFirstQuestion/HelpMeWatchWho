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
	$html->clear();
    unset($html);


	

	




?>

	</ul>

<br><br><br>


<a name="TWD"></a>
<div id="head">
	<h1><em>Torchwood Declassified</em></h1>
	<img src="images/tdc logo.jpg" id="headingImg" />
</div>






</div>
