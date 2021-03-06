<?php
function db_connect() {

    // Define connection as a static variable, to avoid connecting more than once
    static $connection;

    // Try and connect to the database, if a connection has not been established yet
    if(!isset($connection)) {
         // Load configuration as an array. Use the actual location of your configuration file
         // On Linux: /var/www/config.ini
         // On Mac: /Applications/MAMP/config.ini
        $config = parse_ini_file('/var/www/config.ini');
        $connection = mysqli_connect('localhost', $config['username'], $config['password'], 'Who_List');
    }

    // If connection was not successful, handle the error
    if($connection === false) {
        // Handle error - notify administrator, log to a file, show an error screen, etc.
        echo "ERROR";
        return mysqli_connect_error();
    }
    return $connection;
}

function db_query($query) {
    // Connect to the database
    $connection = db_connect();

    // Query the database
    $result = mysqli_query($connection,$query);

    return $result;
}

function db_error() {
    $connection = db_connect();
    echo "ERROR";
    return mysqli_error($connection);
}

function db_select($query) {
    $rows = array();
    $result = db_query($query);

    // If query failed, return `false`
    if($result === false) {
        return false;
    }

    // If query was successful, retrieve all the rows into an array
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;  //An array of arrays
}

function db_quote($value) {
    $connection = db_connect();
    return "'" . mysqli_real_escape_string($connection,$value) . "'";
}

function right() {
	include_once("simple_html_dom.php");
	$target_url = "list.php";
	$html = new simple_html_dom();
	$html->load_file($target_url);
	foreach($html->find('div[id]') as $element) {
		compareSeason($element);
	};
	$html->clear();
    unset($html);
}

function compareSeason($x) {
	$seasonID = $_GET['seasonID'];
	if ($x->id==$seasonID) {
        echo $x;
    }
}

function classicRight() {
	include_once("simple_html_dom.php");
	$target_url = "list.php";
	$html = new simple_html_dom();
	$html->load_file($target_url);
	foreach($html->find('div[id]') as $element) {
		compareSerial($element);
	};
	$html->clear();
    unset($html);
}

function compareSerial($x) {
	$serialID = $_GET['serialID'];
	if ($x->id==$serialID) {
		echo $x->find('h2')[0];
		echo "<br>";
        foreach($x->find('a h3') as $element) {
			echo $element->parent();
			echo "<br>";
		};
    }
}


?>
