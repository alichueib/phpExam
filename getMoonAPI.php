<?php
    if(isset($_GET['pid'])){
        try{
            require_once 'connect.php';
            $query='SELECT M_ID,M_Name
                    FROM Moons
                    WHERE Planet_ID=:pid';
            $stmt=$pdo->prepare($query);
            $stmt->bindParam(':pid',$_GET['pid']);
            $stmt->execute();
            $result=$stmt->fetchAll(PDO::FETCH_ASSOC);
            if($result){
                echo json_encode($result);
            }else{
                echo json_encode([]);
            }
        }catch(Exception $e){
            echo "<p>We were not able to got the json array</p>";
        }
    }