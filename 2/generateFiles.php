<?php
$alpha = ['A','B','C','D','E'];
//A button create 3 files from random alpha
$fileNames = ["files/file1.txt","files/file2.txt","files/file3.txt"];


//create them
$doc1 = fopen($fileNames[0], 'w') or die('Cannot open file:  '.$fileNames[0]);
$doc2 = fopen($fileNames[1], 'w') or die('Cannot open file:  '.$fileNames[1]);
$doc3 = fopen($fileNames[2], 'w') or die('Cannot open file:  '.$fileNames[2]);

//create random data

$string1 = $string2 = $string3 ="";
for ($i = 0;$i<mt_rand(10,400);$i++){
	$string1 .= $alpha[mt_rand(0,count($alpha)-1)];
}
fwrite($doc1, $string1);
for ($i = 0;$i<mt_rand(10,400);$i++){
	$string2 .= $alpha[mt_rand(0,count($alpha)-1)];
}
fwrite($doc2, $string2);
for ($i = 0;$i<mt_rand(10,400);$i++){
	$string3 .= $alpha[mt_rand(0,count($alpha)-1)];
}
fwrite($doc3, $string3);


//close files

fclose($doc1);
fclose($doc2);
fclose($doc3);

header("Location: index.html");
die();
?>
