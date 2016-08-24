<?php require("header.php"); ?>
<title>Home | HelpMeWatchWho</title>
<link type="text/css" rel="stylesheet" href="index style.css">


<div id="everything">

<div id="left" class="box">
	<h2>Not sure where to start?</h2><img src="Images/map.jpg" /><br><br>
	<div id="leftText">
		<span>New to Who? Check out the <a href="#">Introduction to Doctor Who</a>.</span><br><br>
		<span>Think you've seen it all? Check out the <a href="#">Guide to Minisodes</a>.</span><br><br>
		<span>Finished with the new series, and begging for more? Check out the <a href="#">Spin-offs</a> page.</span><br><br>
		<span>You know the show. But do you know how it's made? Check out the <a href="#">Doctor Who Confidential</a> page. Or try Torchwood's counterpart, <a href="#">Torchwood Declassified</a>.</span><br><br>
		<span>Ready to delve into the history of Who? Check out the <a href="#">Introduction to Classic Who</a>.</span><br><br>
		<span>So you're an expert now, huh? How about those Big Finish Audios? Or the Doctor Who Adventure Games? Check out the <a href="#">Other Media</a> page.</span><br><br>
	</div>
</div>

<div id="center" class="box">
	<h2>What's new in the Whoniverse?</h2>
	<img src="Images/banner.jpg" />
	<p>(this will be the HMWW Twitter feed; info about what's happening)</p>
</div>

<div id="right" class="box">
	<h2>Next episode airs in:</h2>
	<iframe src="http://free.timeanddate.com/countdown/i5alabcw/n136/cf12/cm0/cu4/ct4/cs1/ca0/co0/cr0/ss0/cac00f/cpc0f0/pct/tcfff/fs100/szw800/szh337/iso2016-12-25T12:00:00" allowTransparency="true" frameborder="0"></iframe>
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
	<h2>Recent episodes:</h2>
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
	
	<!--<img src="Images/class.jpg" />-->
	
</div>
<br><BR><BR>
<?php
	$rand = mt_rand(1, 6);
?>

	<!--<img class="companion" <?php echo "src='Images/Companions/" . $rand . ".jpg'"; ?>/>-->


</div>
