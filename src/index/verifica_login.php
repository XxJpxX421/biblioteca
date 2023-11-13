<?php
require_once 'C:\xampp\htdocs\biblioteca\vendor\autoload.php';
if(!$_SESSION['usuarioEmail'] or !$_SESSION['usuarioNomedeUsuario']) {
    header('Location: login.php');
    exit();
}