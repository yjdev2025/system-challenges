<?php
if( $argc < 2 ){
  echo "コマンドライン引数を指定してください\n";
  exit(0);
}
$contents = file($argv[1]);
$pattern = '/https?:\/{2}[\w\/:%#\$&\?\(\)~\.=\+\-]+/';
$url_array = array();
$result_array = array();

foreach ($contents as $number => $content) {
    preg_match($pattern, $content, $url_data);
    if(!empty($url_data)){
      array_push($url_array,$url_data[0]);
    }
}
$result_array = array_unique($url_array);
sort($result_array);

foreach ($result_array as $url) {
    echo $url."\n";
}