<?php require("../header.php"); ?>
<link type="text/css" rel="stylesheet" href="articles style.css">
<title>Introduction to Minisodes</title>

<div id="everything">



<div id="head">
	<h1>Introduction to Minisodes</h1>
	<img src="images/minisodes.jpg" id="headingImg" />
</div>

<?php
		include_once("../simple_html_dom.php");
		$target_url = "../list.php";
		$html = new simple_html_dom();
		$html->load_file($target_url);
		
		$links = array();
		foreach($html->find('a') as $a) {
			$links[] = $a;
		}

		foreach ($links as $b) {
			$c = $b->href;
			if ($b->hasAttribute('class') && strstr($b->getAttribute('class'), 'M')) {
				echo $b . "<br>";
			} else if ($b->hasAttribute('class') && strstr($b->getAttribute('class'), 'other')) {
				echo $b . "<br>";
			} else if ($b->hasAttribute('class') && strstr($b->getAttribute('class'), 'AF')) {
				echo $b . "<br>";
			}
			
		}
		
		
		
		$html->clear();
    	unset($html);
	?>








</div>
