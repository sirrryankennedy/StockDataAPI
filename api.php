<?php

require_once("StockData.php");
require_once("config.php");
$StockData = new StockData;

if($_GET['key'] ===STOCKKEY) {
	
	$stock = array();
	$stock['ticker']=$_GET['ticker'];
	$stock['days']=$_GET['days'];
	echo json_encode($StockData->run($stock));
} else{
	echo "Not Authorized";
}
