<?php
include("templates/header.htm");

$action = $_GET['action'];
$action = basename($action);
include("templates/$action.htm");

include("templates/footer.htm");
?>
