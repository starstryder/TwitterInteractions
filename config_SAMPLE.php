<?php
// CONNECT TO MYSQL SERVER ------------------------------------------------------------------------
$servername = "SERVER";
$username = "USERNAME";
$password = "PASS";
$dbname = "AppTutDB";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Test connection
test_conn($conn);


// CONNECT to TWITTER -----------------------------------------------------------------------------
// Set access tokens here - see: https://dev.twitter.com/apps/
$settings = array(
    'oauth_access_token' => "TOKEN",
    'oauth_access_token_secret' => "SECRET",
    'consumer_key' => "KEY",
    'consumer_secret' => "SECRET"
);

$twitter = new TwitterAPIExchange($settings);
$requestMethod = 'GET';

// Set initial user
$username   = "TWITTERACCOUNT";