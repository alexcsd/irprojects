<?php
$alpha = ['A','B','C','D','E'];
//A button create 3 files from random alpha

//files names to create
$file1 ="files/file1.txt";
$file2 ="files/file2.txt";
$file3 ="files/file3.txt";

//create them
$h1 = fopen($file1, 'w') or die('Cannot open file:  '.$file1);
$h2 = fopen($file2, 'w') or die('Cannot open file:  '.$file2);
$h3 = fopen($file3, 'w') or die('Cannot open file:  '.$file3);

//create random data

$data1 = $data2 = $data3 ="";
for ($i = 0;$i<mt_rand(1,400);$i++){
	$data1 .= $alpha[mt_rand(0,count($alpha)-1)];
}
for ($i = 0;$i<mt_rand(1,400);$i++){
	$data2 .= $alpha[mt_rand(0,count($alpha)-1)];
}
for ($i = 0;$i<mt_rand(1,400);$i++){
	$data3 .= $alpha[mt_rand(0,count($alpha)-1)];
}
//save in files

fwrite($h1, $data1);
fwrite($h2, $data2);
fwrite($h3, $data3);

//close files

fclose($h1);
fclose($h2);
fclose($h3);

//an input text for search
//button for search
//search by <A:0.2,B:0.4> this is the query default 1 -- <A,B>
//order results by frequency
//
header("Location: index.html");
die();
?>
