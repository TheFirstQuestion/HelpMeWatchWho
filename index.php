<?php require("header.php"); ?>
<title>Home | HelpMeWatchWho</title>
<link type="text/css" rel="stylesheet" href="index style.css">


<div id="everything">

<!--*********************left box*************************************-->
<div id="left" class="box">
	<h2>Not sure where to start?</h2><img src="Images/map.jpg" /><br><br>
		<span>New to Who? Check out the <a href="/articles/intro-to-doctor-who.php">Introduction to Doctor Who</a>.</span><br><br>
		<img src="Images/doctor who.jpg" /><br>
		<span>Think you've seen it all? Check out the <a href="/articles/guide-to-minisodes.php">Guide to Minisodes</a>.</span><br><br>
		<img src="Images/minisodes.jpg" /><br>
		<span>Finished with the new series, and begging for more? Check out the <a href="/articles/intro-to-spin-offs.php">Spin-offs</a> page.</span><br><br>
		<img src="Images/spin off.jpg" /><br>
		<span>You know the show. But do you know how it's made? Check out the <a href="/articles/intro-to-doctor-who-confidential.php">Doctor Who Confidential</a> page. Or try Torchwood's counterpart, <a href="/articles/intro-to-doctor-who-confidential.php#TWD">Torchwood Declassified</a>.</span><br><br>
		<img src="Images/confidential.jpg" /><br>
		<span>Ready to delve into the history of Who? Check out the <a href="/articles/intro-to-classic-who.php">Introduction to Classic Who</a>.</span><br><br>
		<img src="Images/classic.jpg" /><br>
		<span>So you're an expert now, huh? How about those Big Finish Audios? Or the Doctor Who Adventure Games? Check out the <a href="/articles/intro-to-other-media.php">Other Media</a> page.</span><br><br>
		<img src="Images/other media.jpg" />
</div>






<!--***********************center box*******************************************-->
<div id="center" class="box">
	<h2>What's new in the Whoniverse?</h2>
	<img src="Images/banner.jpg" />
	<p>(this will be the HMWW Twitter feed; info about what's happening)</p>
</div>







<!--*********************right box*************************************-->
<div id="right" class="box">
	<!-- Reminder: change width to 100%, change height to auto, border to FFFFFF-->
	<h2>Next <em>Doctor Who</em> episode airs in:</h2>
	<div class="tc_div_84856" style="width:100%;height:auto;border:1px solid #FFFFFF"><a title="Countdown" href="http://www.tickcounter.com/widget/countdown/1482667200000/europe-london/wdhms/FFFFFF2C00FF2C00FF2C00FF/0/FFFFFF1/">Countdown</a><a title="Countdown" href="http://www.tickcounter.com/">Countdown</a></div><script type="text/javascript">(function(){ var s=document.createElement('script');s.src="http://www.tickcounter.com/loader.js";s.async='async';s.onload=function() { tc_widget_loader('tc_div_84856', 'Countdown', 650, ["1482667200000","europe-london","dhms","FFFFFF2C00FF2C00FF2C00FF","0","FFFFFF1",""]);};s.onreadystatechange=s.onload;var head=document.getElementsByTagName('head')[0];head.appendChild(s);}());</script>
	
	
	<br><br>
	<?php
		// Presets for scraper
		include_once("simple_html_dom.php");
		$target_url = "list.php";
		$html = new simple_html_dom();
		$html->load_file($target_url);
		
		// Put every link on list.php in array
		$links = array();
		foreach($html->find('a.NW') as $a) {
			$links[] = $a;
		}

		// Initialize variables
		$len = count($links);
		$ref;
		$i = 0;
		$state = -42;

		// Searches for most recently aired episode -- last to point to episodes.php
		while ($state == -42) {
			$ref = $links[$len - $i]->href;
			if (strpos($ref, 'episodes.php') !== false) {
				$state = $i - 1;
			}
			$i++;
		}
		
		// Echoes the first episode that hasn't aired yet
		echo $links[$len - $state];
		
		$epID = $links[$len - $state]->href;
		
		$pos = strpos($epID, "=");
		// Gets episode ID to load the picture
		$ID = substr($epID, $pos + 1, 3);
		
		
	?>
	<br><br>
	<img <?php echo "src='Screencaps/" . $ID . ".jpg'"; ?>/>
	<br><br>
	<h3>Recent episodes:</h3>
	<?php
		$count = 0;
		$i = 0;
		// Runs until goes through every episode or prints 4
		while ($count < 4 && $i < $len + 1) {
			$ref = $links[$len - $i]->href;
			// If it has aired (points to episodes.php), echo it
			if (strpos($ref, 'episodes.php') !== false) {
				echo $links[$len - $i] . "<br>";
				$count++;
			}
			$i++;
		}
		
		// If no episodes have aired yet
		if ($state == -42) {
			$state = $len;
		}
		
	?>
	
	<br><br>
	<!-- Reminder: change width to 100%, change height to auto, border to FFFFFF-->
	<h2>Next <em>Class</em> episode airs in:</h2>
<div class="tc_div_11672" style="width:100%;height:auto;border:1px solid #FFFFFF"><a title="Countdown" href="//www.tickcounter.com/widget/countdown/1478941200000/europe-london/dhms/FFFFFF404040404040404040/650/C0C0C01/">Countdown</a><a title="Countdown" href="https://www.tickcounter.com/">Countdown</a></div><script type="text/javascript">(function(){ var s=document.createElement('script');s.src="//www.tickcounter.com/loader.js";s.async='async';s.onload=function() { tc_widget_loader('tc_div_11672', 'Countdown', 650, ["1478941200000","europe-london","dhms","FFFFFF404040404040404040","650","FFFFFF1",""]);};s.onreadystatechange=s.onload;var head=document.getElementsByTagName('head')[0];head.appendChild(s);}());</script>
	<br>
	<?php
		// Puts all links on list.php in array
		$linksCL = array();
		foreach($html->find('a.CL') as $aCL) {
			$linksCL[] = $aCL;
		}

		$lenCL = count($linksCL);
		$refCL;
		$iCL = 0;
		$stateCL = -42;

		// Goes through all episodes until it find that points to episodes.php
		while ($stateCL == -42 && $iCL < $lenCL) {
			$refCL = $linksCL[$lenCL - $iCL]->href;
			if (strpos($refCL, 'episodes.php') !== false) {
				$stateCL = $iCL - 1;
			}
			$iCL++;
		}
		
		//If no episodes have aired yet
		if ($stateCL == -42) {
			$stateCL = $lenCL;
		}
		
		// Echoes the next episode to air
		echo $linksCL[$lenCL - $stateCL];
		
		$epIDCL = $linksCL[$lenCL - $stateCL]->href;
		$posCL = strpos($epIDCL, "=");
		// Gets episode ID for picture
		$IDCL = substr($epIDCL, $posCL + 1, 3);
	?>
	
	<br><br>
	<img <?php echo "src='Screencaps/" . $IDCL . ".jpg'"; ?>/>
	<br><br>
	<h3>Recent episodes:</h3>
	<?php
		$countCL = 0;
		$iCL = 0;

		// Loops until all episodes are found or 4 have been printed
		while ($countCL < 4 && $iCL < $lenCL + 1) {
			$refCL = $linksCL[$lenCL - $iCL]->href;
			// If it has aired (points to episodes.php), print it
			if (strpos($refCL, 'episodes.php') !== false) {
				echo $linksCL[$lenCL - $iCL] . "<br>";
				$countCL++;
			}
			$iCL++;
		}
	?>
	
</div>
</div>
