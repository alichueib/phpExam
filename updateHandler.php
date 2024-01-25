<?php
$planet= $_POST['chosenPlanet'];
$moon= $_POST['chosenMoon'];
$radius= $_POST['newRadius'];
if(!isset($planet) || !isset($moon) || !isset($radius)){
    header('refresh:3, url='.$_SERVER['HTTP_REFERER']);
    die('The entered data is missing!');
}else{
    if($radius<=0){
        header('refresh:2, url='.$_SERVER['HTTP_REFERER']);
        die('A radius should be greater than zero!');
    }else{
        try{
            require_once 'connect.php';
            $query='UPDATE Moons
                    SET M_Radius=:rad
                    WHERE M_ID=:mid 
                    AND Planet_ID=:pid';
            $stmt=$pdo->prepare($query);
            $stmt->bindParam(':mid',$moon);
            $stmt->bindParam(':pid',$planet);
            $stmt->bindParam(':rad',$radius);
            $stmt->execute();

            header('refresh:3,url='.$_SERVER['HTTP_REFERER']);
            echo '<h1>Radius Modified Successfully</h1>';
        }catch(Exception $e){
            echo 'Unexpected Error '.$e->getMessage();
        }
    }
}