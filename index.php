<?php require("header.php"); ?>
<title>Home | HelpMeWatchWho</title>
<link type="text/css" rel="stylesheet" href="index style.css">


<div id="everything">

<!--*********************left box*************************************-->
<div id="left" class="box">
	<h2>Not sure where to start?</h2><img src="Images/map.jpg" /><br><br>
	<div class="leftText">
		<span>New to Who? Check out the <a href="#">Introduction to Doctor Who</a>.</span><br>
	</div>
		<img src="Images/doctor who.jpg" />
	<div class="leftText">
		<span>Think you've seen it all? Check out the <a href="#">Guide to Minisodes</a>.</span><br>
	</div>
		<img src="Images/minisodes.jpg" />
	<div class="leftText">
		<span>Finished with the new series, and begging for more? Check out the <a href="#">Spin-offs</a> page.</span><br><br>
	</div>
		<img src="Images/spin off.jpg" />
	<div class="leftText">
		<span>You know the show. But do you know how it's made? Check out the <a href="#">Doctor Who Confidential</a> page. Or try Torchwood's counterpart, <a href="#">Torchwood Declassified</a>.</span><br><br>
	</div>
		<img src="Images/confidential.jpg" />
	<div class="leftText">
		<span>Ready to delve into the history of Who? Check out the <a href="#">Introduction to Classic Who</a>.</span><br><br>
	</div>
		<img src="Images/classic.jpg" />
	<div class="leftText">
		<span>So you're an expert now, huh? How about those Big Finish Audios? Or the Doctor Who Adventure Games? Check out the <a href="#">Other Media</a> page.</span><br><br>
	</div>
		<img src="Images/other media.jpg" />
</div>






<!--***********************center box****************-->
<div id="center" class="box">
	<h2>What's new in the Whoniverse?</h2>
	<img src="Images/banner.jpg" />
	<p>(this will be the HMWW Twitter feed; info about what's happening)</p>
</div>







<!--*********************right box*************************************-->
<div id="right" class="box">
	<h2>Next <i>Doctor Who</i> episode airs in:</h2>
	<div class="tc_div_84856" style="width:100%;height:auto;border:1px solid #FFFFFF"><a title="Countdown" href="http://www.tickcounter.com/widget/countdown/1482667200000/europe-london/wdhms/FFFFFF2C00FF2C00FF2C00FF/0/FFFFFF1/">Countdown</a><a title="Countdown" href="http://www.tickcounter.com/">Countdown</a></div><script type="text/javascript">(function(){ var s=document.createElement('script');s.src="http://www.tickcounter.com/loader.js";s.async='async';s.onload=function() { tc_widget_loader('tc_div_84856', 'Countdown', 650, ["1482667200000","europe-london","dhms","FFFFFF2C00FF2C00FF2C00FF","0","FFFFFF1",""]);};s.onreadystatechange=s.onload;var head=document.getElementsByTagName('head')[0];head.appendChild(s);}());</script>



	<br>
	<?php
		include_once("simple_html_dom.php");
		$target_url = "list.php";
		$html = new simple_html_dom();
		$html->load_file($target_url);
		
		$links = array();
		foreach($html->find('a.NW') as $a) {
			$links[] = $a;
		}

		$len = count($links);
		$ref;
		$i = 0;
		$state = -42;

		while ($state == -42) {
			$ref = $links[$len - $i]->href;
			if (strpos($ref, 'episodes.php') !== false) {
				$state = $i - 1;
			}
			$i++;
		}
		
		echo $links[$len - $state];
		
		$epID = $links[$len - $state]->href;
		
		
	?>
	<br><br>
	<img <?php echo "src='Screencaps/" . $epID . ".jpg'"; ?>/>
	<br><br>
	<h3>Recent episodes:</h3>
	<?php
		$count = 0;
		$i = 0;
		
		while ($count < 4 && $i < $len) {
			$ref = $links[$len - $i]->href;
			if (strpos($ref, 'episodes.php') !== false) {
				echo $links[$len - $i] . "<br>";
				$count++;
			}
			$i++;
		}
	?>
	
	<br><br>
	
	<h2>Next <i>Class</i> episode airs in:</h2>
	<div class="tc_div_26900" style="width:100%;height:auto;border:1px solid #FFFFFF"><a title="Countdown" href="http://www.tickcounter.com/widget/countdown/1478001600000/europe-london/dhms/FFFFFF404040404040404040/650/FFFFFF1/">Countdown</a><a title="Countdown" href="http://www.tickcounter.com/">Countdown</a></div><script type="text/javascript">(function(){ var s=document.createElement('script');s.src="http://www.tickcounter.com/loader.js";s.async='async';s.onload=function() { tc_widget_loader('tc_div_26900', 'Countdown', 650, ["1478001600000","europe-london","dhms","FFFFFF404040404040404040","0","FFFFFF1",""]);};s.onreadystatechange=s.onload;var head=document.getElementsByTagName('head')[0];head.appendChild(s);}());</script>
	<br>
	
	<?php
		$linksCL = array();
		foreach($html->find('a.CL') as $aCL) {
			$linksCL[] = $aCL;
		}

		$lenCL = count($linksCL);
		$refCL;
		$iCL = 0;
		$stateCL = -42;

		while ($stateCL == -42 && $iCL < $lenCL) {
			$refCL = $linksCL[$lenCL - $iCL]->href;
			if (strpos($refCL, 'episodes.php') !== false) {
				$stateCL = $iCL - 1;
			}
			$iCL++;
		}
		//If no episodes have aired yet
		if ($stateCL == -42) {
			$stateCL = 8;
		}
		
		echo $linksCL[$lenCL - $stateCL];
		
		$epIDCL = $linksCL[$lenCL - $stateCL]->href;
	?>
	
	<br><br>
	<img <?php echo "src='Screencaps/" . $epIDCL . ".jpg'"; ?>/>
	<br><br>
	<h3>Recent episodes:</h3>
	<?php
		$countCL = 0;
		$iCL = 0;
		
		while ($countCL < 4 && $iCL < $lenCL) {
			$refCL = $linksCL[$lenCL - $iCL]->href;
			if (strpos($refCL, 'episodes.php') !== false) {
				echo $linksCL[$lenCL - $iCL] . "<br>";
				$countCL++;
			}
			$iCL++;
		}
		
		if ($countCL == 0) {
			echo "No episodes have aired yet!";
		}
	?>
	
</div>
<br><BR><BR>
<?php
	$rand = mt_rand(1, 6);
?>

	<!--<img class="companion" <?php echo "src='Images/Companions/" . $rand . ".jpg'"; ?>/>-->


</div>
