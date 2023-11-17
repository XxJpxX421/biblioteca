<?php
require_once 'C:\xampp\htdocs\biblioteca\vendor\autoload.php';

session_start();

if (empty($_SESSION['nome']) && empty($_SESSION['email'])) {
    header('Location: login.php');
    exit();
}
?>