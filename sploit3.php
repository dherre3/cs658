<?php
include 'main.php';
if($argc==1)
{
  echo "No url provided";
  exit();
}else{
  $mainUrl = $argv[1];
}
//Makes sure user is logged out
logout($mainUrl);
comment($mainUrl, "7", "I am commenting unauthenticated");
?>
