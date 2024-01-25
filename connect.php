<?php

$dsn='mysql:host=localhost;dbname=phpexam';
$dbusername='alichueib';
$dbpwd='password123';

try{
    $pdo=new PDO($dsn,$dbusername,$dbpwd);
    $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
}catch(PDOException $e){
    echo 'Connection Failed '.$e->getMessage();
}