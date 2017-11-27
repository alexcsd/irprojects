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

// foreach ($adjMatrix['A'] as $key => $value) {
//   $file =str_split(preg_replace('/\s/','',file_get_contents("files/".$key.".txt", true)));
//   foreach ($file as $value) {
//     $adjMatrix[$key][$value] += 1;
//   }
// }




$adjMatrix = array(
  'A' => array('A' => 0,'B' => 0,'C' => 0,'D' => 0,'E' => 0),
  'B' => array('A' => 0,'B' => 0,'C' => 0,'D' => 0,'E' => 0),
  'C' => array('A' => 0,'B' => 0,'C' => 0,'D' => 0,'E' => 0),
  'D' => array('A' => 0,'B' => 0,'C' => 0,'D' => 0,'E' => 0),
  'E' => array('A' => 0,'B' => 0,'C' => 0,'D' => 0,'E' => 0)
);


$A =str_split(preg_replace('/\s/','',file_get_contents("files/A.txt", true)));
$B =str_split(preg_replace('/\s/','',file_get_contents("files/B.txt", true)));
$C =str_split(preg_replace('/\s/','',file_get_contents("files/C.txt", true)));
$D =str_split(preg_replace('/\s/','',file_get_contents("files/D.txt", true)));
$E =str_split(preg_replace('/\s/','',file_get_contents("files/E.txt", true)));

foreach ($A as $value) {
  if ($value == 'A')
    continue;
  $adjMatrix['A'][$value] = 1;
}
foreach ($B as $value) {
  if ($value == 'B')
    continue;
  $adjMatrix['B'][$value] = 1;
}
foreach ($C as $value) {
  if ($value == 'C')
    continue;
  $adjMatrix['C'][$value] = 1;
}
foreach ($D as $value) {
  if ($value == 'D')
    continue;
  $adjMatrix['D'][$value] = 1;
}
foreach ($E as $value) {
  if ($value == 'E')
    continue;
  $adjMatrix['E'][$value] = 1;
}


$keys=array_keys($adjMatrix);
foreach($adjMatrix[$keys[0]] as $k=>$v){  // only iterate first "row"
  $transpose[]=array_combine($keys,array_column($adjMatrix,$k));  // store each "column" as an associative "row"
}

$hub = array('A' => 1,'B' => 1, 'C' => 1, 'D' => 1, 'E' => 1);

$auth = array('A' => 0,'B' => 0, 'C' => 0, 'D' => 0, 'E' => 0);


foreach ($adjMatrix as $k => $v) {
  echo $k;
  foreach ($hub as $key => $value) {
    // $auth[$key] = $v * $value;
  }
}

arsort($hub);
echo "Hub <hr>";
foreach ($hub as $key => $value) {
  echo $key .' : '.$value.'<br>';
}

var_dump($adjMatrix, $transpose);










 ?>
</div>
</body>
</html>
