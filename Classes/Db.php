<?php
session_start();
require_once('User.php');
require_once('Wall_Of_Fame.php');

$_SESSION['user'] = new User;
// $_SESSION['wall'] = new Walloffame;

$dsn = "mysql:host=localhost;dbname=memory";
$userDB = 'root';
$passDB = '';
$bdd = new PDO("$dsn", "$userDB", "$passDB");
$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
