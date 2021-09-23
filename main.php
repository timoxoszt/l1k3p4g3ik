<?php
	require "fbsdk/src/Facebook/autoload.php";
	session_start();
	$fb = new Facebook\Facebook([
	  'app_id'                => '682359065970471',
	  'app_secret'            => 'cabd262a1fff484d479a4bea676312ed',
	  'default_graph_version' => 'v12',
	]);
?>