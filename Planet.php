<?php

if(isset($_COOKIE['previous'])){
    echo 'Previosly visited '.$_COOKIE['previous'];
}

require_once 'connect.php';

$query='SELECT * 
        FROM Planets
        WHERE P_ID=:pid';
$stmt=$pdo->prepare($query);
$stmt->bindParam(':pid',$_GET['pid']);
$stmt->execute();

$result=$stmt->fetch(PDO::FETCH_ASSOC);

echo
'
    <h1>'. $result['P_Name'] .'</h1>
    <a href="deletePicture.php?pid='.$result['P_ID'].'"> 
        <img src="images/'. $_GET['pid'] .'.jpg" height=200 width=200 alt="Planet Pic">
    </a>
    <p>
        discoverd on '. $result['P_discoveryDate'].' and it has a weight of '. $result['P_WEIGHT'].' kg
    </p>
    <a href="'.$_SERVER['HTTP_REFERER'].'">Back</a>
';
setcookie('previous',$result['P_Name']);