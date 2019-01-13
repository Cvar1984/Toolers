<?php
require_once ('phar://main.phar/main.class.php');
$adm=new Adminfinder();

// check if argumen vector is exist
if(!(isset($argv[1]) && isset($argv[2]))) {
  fprintf(STDERR,RED.'Error : '.REDBG.$argv[0].' http://example.gov list.txt'.WHITE."\n");
  exit(1);
}

// check if argument 1 contain http / https
if(!preg_match("/^http|^https/", $argv[1])) {
  $argv[1]='http://'.$argv[1];
}

// check if file is exist
if(!file_exists($argv[2])) {
  fprintf(STDERR,RED.'Error : '.REDBG.__DIR__.'/'.$argv[2].WHITE.RED.' Not found'.WHITE."\n");
  exit(1);
}

// explode string to listed string
$list=explode("\n", file_get_contents(__DIR__.'/'.$argv[2]));

// for loop main function
for($x=0;$x<sizeof($list);$x++) {
  $site[$x] = $argv[1].'/'.$list[$x];
  echo $adm->curl($site[$x]);
}
