<?php
if( $argc < 2 ){
  echo "コマンドライン引数を指定してください\n";
  exit(0);
}
$contents = file($argv[1]);
$pattern = '/https?:\/{2}[\w\/:%#\$&\?\(\)~\.=\+\-]+/';
$url_array = array();
$host_tmp_array = array();
$counter = 0;

foreach ($contents as $number => $content) {
    preg_match($pattern, $content, $url_data);
    if(!empty($url_data)){
      array_push($url_array,$url_data[0]);
    }
}

sort($url_array);

foreach ($url_array as $url) {
    $host = parse_url( $url, PHP_URL_HOST );
    array_push($host_tmp_array,$host);
}

$host_array = array_unique($host_tmp_array);

foreach ($host_array as $host) {
    $result = preg_grep("/".$host."/",$url_array);
    
    $counter = count($result);
    echo "origin=" . $host ." total=" .$counter . "\n";
    foreach ($result as $rs) {
        echo $rs."\n";
      }
    echo "\n";
}