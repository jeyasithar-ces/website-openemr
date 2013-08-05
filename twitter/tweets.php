<?php
session_start();
require_once("twitteroauth/twitteroauth/twitteroauth.php"); //Path to twitteroauth library
 
$twitteruser = "openemr";
$notweets = 20;
$consumerkey = "3370eD4T3HvQ7tDYRu53Kg";
$consumersecret = "up4ay60b6NYhkKTEorJbt3o4xViQdTCI6xDbfH7z38";
$accesstoken = "19060256-EEE2UHOaJQkphi66sAt7plTD2fND83HzqbLvyZqOj";
$accesstokensecret = "XwS78sXXdD2OUocLLVkfel6yejnUoDric6dIjV8Gw24";
 
function getConnectionWithAccessToken($cons_key, $cons_secret, $oauth_token, $oauth_token_secret) {
  $connection = new TwitterOAuth($cons_key, $cons_secret, $oauth_token, $oauth_token_secret);
  return $connection;
}
 
$connection = getConnectionWithAccessToken($consumerkey, $consumersecret, $accesstoken, $accesstokensecret);
 
$tweets = $connection->get("https://api.twitter.com/1.1/statuses/user_timeline.json?screen_name=".$twitteruser."&count=".$notweets);
 
echo json_encode($tweets);
?>
