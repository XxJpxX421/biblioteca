<?php 
require_once 'C:\xampp\htdocs\biblioteca\vendor\autoload.php';
session_start();
unset($_SESSION['nome']);
session_destroy();
header('Location: login.php');
exit();