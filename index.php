<?php require("header.php"); ?>
<title>Home | HelpMeWatchWho</title>
<link type="text/css" rel="stylesheet" href="index style.css">


<div id="everything">

<div id="left" class="box">
	<h2>Not sure where to start?</h2>
	<span>New to Who? Check out the <a href="#">Introduction to Doctor Who</a>.</span><br><br>
	<span>Think you've seen it all? Check out the <a href="#">Guide to Minisodes</a>.</span><br><br>
	<span>Finished with the new series, and begging for more? Check out the <a href="#">Spin-offs</a> page.</span><br><br>
	<span>You know the show. But do you know how it's made? Check out the <a href="#">Doctor Who Confidential</a> page. Or try Torchwood's counterpart, <a href="#">Torchwood Declassified</a>.</span><br><br>
	<span>Ready to delve into the history of Who? Check out the <a href="#">Introduction to Classic Who</a>.</span><br><br>
	<span>So you're an expert now, huh? How about those Big Finish Audios? Or the Doctor Who Adventure Games? Check out the <a href="#">Other Media</a> page.</span><br><br>
</div>

<div id="center" class="box">
	<h2>What's new in the Whoniverse?</h2>
	
	<p>(this will be the HMWW Twitter feed; info about what's happening)</p>
</div>

<div id="right" class="box">
	<h2>Next episode airs in:</h2>
	<iframe src="http://free.timeanddate.com/countdown/i5alabcw/n136/cf12/cm0/cu4/ct4/cs1/ca0/co0/cr0/ss0/cac00f/cpc0f0/pct/tcfff/fs100/szw800/szh337/iso2016-12-25T12:00:00" allowTransparency="true" frameborder="0"></iframe>
	<br>
	<a href="#">(The Christmas Special)</a>
	<br><br><br><br>
	<h2>Recent episodes:</h2>
	<?php  // *** This will need to be worked out -- only episodes that have a valid link? 
		include_once("simple_html_dom.php");
		$target_url = "list.php";
		$html = new simple_html_dom();
		$html->load_file($target_url);
		$everything = $html->find('div[id=everything]');
		//echo $everything[0];
		$a = $everything[0]->last_child();
		$b = $a->last_child(); //line break
		$c = $b->prev_sibling();
		$d = $c->prev_sibling(); //line break
		$e = $d->prev_sibling();
		$f = $e->prev_sibling(); //line break
		$g = $f->prev_sibling();
		$h = $g->prev_sibling(); //line break
		$i = $h->prev_sibling();
		echo $c . "<br>" . $e . "<br>" . $g . "<br>" . $i;
	?>
	
</div>

</div>
