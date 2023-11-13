<?php 
require_once 'C:\xampp\htdocs\biblioteca\vendor\autoload.php';
session_start();
unset($_SESSION['usuarioEmail']);
header('Location: login.php');
exit();