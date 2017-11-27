<?php
$alpha = ['A','B','C','D','E'];
//A button create 3 files from random alpha
$fileNames = $alpha;

$docs = [];

foreach ($fileNames as $key => $value) {
	array_push($docs,fopen($value,'w') or die('Cannot open file:  '.$value)); 
}

foreach ($docs as $key => $value) {
	for ($i = 0;$i<mt_rand(0,10);$i++){
		$string .= $alpha[mt_rand(0,count($alpha)-1)];
	}
	fwrite($doc[$key], $string);
	fclose($doc[$key]);
}

header("Location: index.html");
die();
?>
