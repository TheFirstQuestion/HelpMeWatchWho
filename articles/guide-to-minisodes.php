<?php require("../header.php"); ?>
<link type="text/css" rel="stylesheet" href="articles style.css">
<link type="text/css" rel="stylesheet" href="/link-colors.css">
<title>Guide to Minisodes | HelpMeWatchWho</title>

<div id="everything">



<div id="head">
	<h1>Guide to Minisodes</h1>
	<img src="images/minisodes.jpg" id="headingImg" />
</div>


<h2>What is a Minisode?</h2>

<p>"Minisode" is a slang term for a mini-episode. Over the years, <em>Doctor Who</em> has released many short episodes that add additional information about characters or plot, or fill in missing details, or explain references. Some just provide humor. They complement the main show, and they're just plain fun to watch.</p>

<div class="imgWrapper"><img src="images/clara in the tardis.gif" /></div>

<p>Here at HelpMeWatchWho, we separate minisodes into 3 types: true minisodes, Alien Files, and "other." Alien Files are the easiest to classify; they are in-character descriptions of aliens encountered by the Doctor or Sarah Jane. Alien Files are narrated by Captain Jack Harkness, River Song, or a member of Sarah Jane's crew.</p>

<div class="imgWrapper"><img src="images/sja alien files.jpg" /></div>

<p>The "minisodes" category includes short episodes produced by the BBC. Generally, these can be found as DVD extras and/or on the BBC website itself. They are live action and scripted just like a scene from the show, and involve the real actors. While the BBC has never definitively stated what is "canon" in <em>Doctor Who</em>, minisodes are almost certainly so. This category includes things like the <a href="http://localhost/episodes.php?episodeID=16&seasonID=1">Series Nine Prologue</a>, which gives important details about the first episodes of Series Nine.</p>

<div class="imgWrapper"><img src="images/last day.jpg" /></div>

<p>The "other" category consist of things created by the BBC, but released in a different way than a normal minisode. For example, <a href="/episodes.php?episodeID=294&seasonID=30">Attack of the Graske</a> was released by the BBC as a DVD extra, but it's a interactive adventure. This category includes the Doctor Who Adventure Games, which have been stated to be canon by the BBC.</p>

<div class="imgWrapper"><img src="images/adventure games.jpg" /></div>



<br><br><br>

<h2>What to Watch</h2>

<p>If you're watching <em>Doctor Who</em> for the first time, you should watch the minisodes. Even if you've already watched <em>Doctor Who</em>, you'll still enjoy watching them. Alien Files are nice to watch just for a little review of the background of aliens, but they don't provide any additional information. We suggest watching them just for completion's sake, but they aren't necessary to understand the show. "Other" episodes are fun to watch or play; they're not really relevant to the show, but they're nice to experience.</p>

<div class="imgWrapper"><img src="images/mine.gif" /></div>

<p>For your convenience, every minisode is listed below.</p>

<p class="note"><strong>Reminder:</strong> <span class="M">minisodes</span> are orange, <span class="AF">Alien Files</span> are green, and <span class="other">other</span> episodes are yellow.</p>

	<?php
		include_once("../simple_html_dom.php");
		$target_url = "../list.php";
		$html = new simple_html_dom();
		$html->load_file($target_url);
		
		$links = array();
		foreach($html->find('a') as $a) {
			$links[] = $a;
		}
		
	?>

<h2>Classic Who</h2><br><br>
<div class="indent">
	<?php
		foreach ($links as $b) {
			//$c = $b->href;
			if ($b->hasAttribute('class') && strstr($b->getAttribute('class'), 'CW')) {
				if (strstr($b->getAttribute('class'), 'M')) {
					if (!(strpos($b, "<h3>"))) {
						echo $b . "<br>";
					}
				} else if (strstr($b->getAttribute('class'), 'other')) {
					if (!(strpos($b, "<h3>"))) {
						echo $b . "<br>";
					}
				} else if (strstr($b->getAttribute('class'), 'AF')) {
					if (!(strpos($b, "<h3>"))) {
						echo $b . "<br>";
					}
				}	
			}
		}
	?>
</div>

<br><br><h2>New Who</h2><br><br>
<div class="indent">
	<?php
		foreach ($links as $b) {
			//$c = $b->href;
			if ($b->hasAttribute('class') && (strstr($b->getAttribute('class'), 'NW'))) {
				if (strstr($b->getAttribute('class'), 'M')) {
					echo $b . "<br>";
				} else if (strstr($b->getAttribute('class'), 'other')) {
					echo $b . "<br>";
				} else if (strstr($b->getAttribute('class'), 'AF')) {
					echo $b . "<br>";
				}
			}
		}
	?>
</div>




<br><br><h2>Torchwood</h2><br><br>
<div class="indent">
	<?php
		foreach ($links as $b) {
			//$c = $b->href;
			if ($b->hasAttribute('class') && (strstr($b->getAttribute('class'), 'TW'))) {
				if (strstr($b->getAttribute('class'), 'M')) {
					echo $b . "<br>";
				} else if (strstr($b->getAttribute('class'), 'other')) {
					echo $b . "<br>";
				} else if (strstr($b->getAttribute('class'), 'AF')) {
					echo $b . "<br>";
				}
			}
		}
	?>
</div>




<br><br><h2>Sarah Jane Adventures</h2><br><br>
<div class="indent">
	<?php
		foreach ($links as $b) {
			//$c = $b->href;
			if ($b->hasAttribute('class') && (strstr($b->getAttribute('class'), 'SJA'))) {
				if (strstr($b->getAttribute('class'), 'M')) {
					echo $b . "<br>";
				} else if (strstr($b->getAttribute('class'), 'other')) {
					echo $b . "<br>";
				} else if (strstr($b->getAttribute('class'), 'AF')) {
					echo $b . "<br>";
				}
			}
		}
	?>
</div>


<br><br><h2>Class</h2><br><br>
<div class="indent">
	<?php
		foreach ($links as $b) {
			//$c = $b->href;
			if ($b->hasAttribute('class') && (strstr($b->getAttribute('class'), 'CL'))) {
				if (strstr($b->getAttribute('class'), 'M')) {
					echo $b . "<br>";
				} else if (strstr($b->getAttribute('class'), 'other')) {
					echo $b . "<br>";
				} else if (strstr($b->getAttribute('class'), 'AF')) {
					echo $b . "<br>";
				}
			}
		}
		echo "<p>No minisodes have aired yet!</p>";
	?>
</div>






	<?php
		$html->clear();
    	unset($html);
	?>





</div>
