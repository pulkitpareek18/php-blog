
<?php

session_start();

if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
    $loggedin = true;
} else {
    $loggedin = false;
}

function isValidURL($url)
{
    if (filter_var($url, FILTER_VALIDATE_URL)) {
        return true;
    } else {
        return false;  
    }
}

/*
The Function str_contains() is introduced in PHP 8 so on our server PHP 7 is working that's why have to define function using different method
 */

// function isYtUrl($url){
//     if(str_contains($url,"youtube.com")){
//         return true;
//     }else{
//         return false;
//     }
// }

function isYtUrl($url){
    if(strpos($url, "youtube.com")){
        return true;
    }else{
        return false;
    }
}

// if (strpos($haystack, $needle) !== false) {
//     // haystack contains needle
//   }

function YtLinkToThumbnail($url){
    $thumbnail_url = substr($url, strpos($url, "embed/")+6);
    return "https://i.ytimg.com/vi/$thumbnail_url/maxresdefault.jpg";
}



?>