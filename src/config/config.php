<?php
$dirInt = "biblioteca/src";
define('DIRPAGE' , "http://{$_SERVER['HTTP_HOST']}/{$dirInt}");

$bar=(substr($_SERVER['DOCUMENT_ROOT'],-1)=='/')?"":"/";
define('DIRREQ' , "{$_SERVER['DOCUMENT_ROOT']}{$bar}{$dirInt}");
// Configurações do banco de dados
$host = 'localhost';
$dbname = 'biblioteca';
$username = 'root';
$password = '';

// Conexão PDO
try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erro ao conectar: " . $e->getMessage());
}
?>