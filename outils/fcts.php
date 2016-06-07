<?php

error_reporting(E_ALL);
ini_set('display_errors', TRUE);
ini_set('display_startup_errors', TRUE);
date_default_timezone_set('Europe/London');

define('EOL',(PHP_SAPI == 'cli') ? PHP_EOL : '<br />');


	function loadData($filename)
	{
		$data_r=null;
		if (($handle = fopen($filename, "r")) !== FALSE) {  
			$i = 0;
			while (($data = fgetcsv($handle, 0, ",")) !== FALSE) {   
				$data_r[$i] = $data;
				$i++;
			} 
		fclose($handle);
		}
		return $data_r;
	}

	//test
	//$data = loadData("timeline.csv");
	//echo '<pre>';print_r($data);echo '</pre>';
?>
