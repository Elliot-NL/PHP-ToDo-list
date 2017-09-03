<?php
session_start();
$_SESSION['user_id'] = 1;
// Fake login
$db = new PDO('msql:dbname=todo;host=localhost', 'root', 'root');
// Alternative
if(!isset($_SESSION['user_id'])){
	die('You are not signed in.');
}