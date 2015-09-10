<?php
class StockData {
	
	public function run($stock) {
	$ticker= $stock['ticker'];
	$days = $stock['days'];
	if($days == "all") { $days = "100000000";}


	$file =file("http://real-chart.finance.yahoo.com/table.csv?s=$ticker");
		
	foreach($file as $line) {
		$clean = explode(",",$line);
		$tstamp = strtotime($clean[0]);
		if($tstamp != false || is_numeric($clean[5]) != false) { 
			$data['date']=strtotime($clean[0]);
			$data['fdate']=$clean[0];
			$data['open']=round($clean[1],2);
			$data['high']=round($clean[2],2);
			$data['low']=round($clean[3],2);
			$data['close']=round($clean[4],2);
			$data['volume']=round($clean[5],2);
			$data['adjusted_close']=round($clean[6],2);
			$final[] = $data;
			
		}
		if(count($final) == $days) {
			return $final; 
			break;
		}
			

			
	} 
	return $final;	
	}

	
}

?>






