<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
    <style>
    </style>
  </head>
  <body>
<a class="btn btn-default" href="index.html">back</a>
<div class="flex">

<?php
function sumprod($arr1,$arr2)
{
  $sum=0.0;
  foreach ($arr1 as $key => $value) {
    $sum += $value*$arr2[$key];
  }
  return $sum;
}
function sumsqr($arr)
{
  $sum=0.0;
  foreach ($arr as $num) {
    $sum += $num*$num;
  }
  return $sum;
}

//INITIALIZATION
$Matrix = array(
  array('A' => 0.0,'B' => 0.0,'C' => 0.0,'D' => 0.0,'E' => 0.0),//file1
  array('A' => 0.0,'B' => 0.0,'C' => 0.0,'D' => 0.0,'E' => 0.0),//file2
  array('A' => 0.0,'B' => 0.0,'C' => 0.0,'D' => 0.0,'E' => 0.0)//file3
);
//REMOVE SPACES
$file1 =str_split(preg_replace('/\s/','',file_get_contents("files/file1.txt", true)));
$file2 =str_split(preg_replace('/\s/','',file_get_contents("files/file2.txt", true)));
$file3 =str_split(preg_replace('/\s/','',file_get_contents("files/file3.txt", true)));

$df=array('A' => 0.00,'B' => 0.00,'C' => 0.00,'D' => 0.00,'E' => 0.00);
//CALCULATING FRECUENCIES AND DF
foreach ($file1 as $c ) {
  $Matrix[0][$c] += 1;
  $df[$c] += 1;
}
foreach ($file2 as $c ) {
  $Matrix[1][$c] += 1;
  $df[$c] += 1;
}
foreach ($file3 as $c ) {
  $Matrix[2][$c] += 1;
  $df[$c] += 1;
}
//TF
foreach ($Matrix as $key1 => $val) {
  $max = max($val);
  foreach ($val as $key2 => $value) {
    $Matrix[$key1][$key2] = $value/$max;
  }
}
//IDF
foreach ($df as $key => $value) {
  $df[$key]=log(3/$value,2);
}
//CALCULATING  tf*idf
foreach ($Matrix as $key1 => $val) {
  foreach ($val as $key2 => $tf) {
    $Matrix[$key1][$key2] = $tf*$df[$key2];
  }
}

$query = str_split(strtoupper($_GET['query']));
$qMatrix = array('A' => 0.0,'B' => 0.0,'C' => 0.0,'D' => 0.0,'E' => 0.0);
foreach ($query as $value) {
  $qMatrix[$value] += 1;
}
$qMax = max($qMatrix);
foreach ($qMatrix as $key => $value) {
  $qMatrix[$key] = $value/$qMax * $df[$key];
} 

// COSINE SIMILARITY
$qsumsqr = sumsqr($qMatrix);
$docs = array('d1' => 0,'d2'=>1,'d3'=>2);
foreach ($docs as $key => $value) {
  $docs[$key] = round(sumprod($Matrix[$value],$qMatrix)/sqrt(sumsqr($Matrix[$value])*$qsumsqr),3);
}
arsort($docs);
foreach ($docs as $key => $value) {
  echo $key.' : '.$value .'<br>';
}


 ?>
</div>
</body>
</html>
