<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
    <style>
    html,body{
      height: 100%;
      background: gray;
    }
      .flex{
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100%;
      }
      #form *{
        margin: 10px;
        text-align: center;
        display: flex;
        justify-content: center;
      }
      a{
        color:white;
        font-family: cursive;
        font-weight: bold;
        text-decoration: none;
      }
    </style>
  </head>
  <body>
<a href="index.html">back</a>
<div class="flex">

<?php
//calculate
$d1 = array('A' => 0,'B' => 0,'C' => 0,'D' => 0,'E' => 0);
$d2 = array('A' => 0,'B' => 0,'C' => 0,'D' => 0,'E' => 0);
$d3 = array('A' => 0,'B' => 0,'C' => 0,'D' => 0,'E' => 0);

$file1 =str_split(preg_replace('/\s/','',file_get_contents("files/file1.txt", true)));
$file2 =str_split(preg_replace('/\s/','',file_get_contents("files/file2.txt", true)));
$file3 =str_split(preg_replace('/\s/','',file_get_contents("files/file3.txt", true)));

foreach ($file1 as $c ) {
  $d1[$c] += 1/count($file1);
}
foreach ($file2 as $c ) {
  $d2[$c] += 1/count($file2);
}
foreach ($file3 as $c ) {
  $d3[$c] += 1/count($file3);
}

$score = array('d1' => 0,'d2' => 0,'d3' => 0 );

$q = $_GET['query'];

$f  =$query= [];

$f = explode(';',$q);

foreach ($f  as $k) {
  # code...
  $first =[];
  $first = explode(':',$k);
  array_push($query,[$first[0],(isset($first[1]))? $first[1]:1]);
}
foreach ($query as $i) {
  $score['d1'] += $d1[$i[0]]*$i[1];
  $score['d2'] += $d2[$i[0]]*$i[1];
  $score['d3'] += $d3[$i[0]]*$i[1];
}
echo"<br />";
arsort($score);
echo "Ranking is :";
echo"<br />";
foreach ($score as $document => $score  ) {
  echo "$document is $score";
  echo"<br />";
}
 ?>
</div>
</body>
</html>
