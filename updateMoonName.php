<?php
    if(isset($_GET['mid']) && isset($_POST['enteredName'])){
        try{

            require_once 'connect.php';
            $query="UPDATE Moons
                    SET M_Name=:mname
                    WHERE M_ID=:mid";
            $stmt=$pdo->prepare($query);
            $stmt->bindParam(':mname',$_POST['enteredName']);
            $stmt->bindParam('mid',$_GET['mid']);
            $stmt->execute();

            echo '<p>Update was done successfully</p>';
            echo '<a href="'.$_SERVER['HTTP_REFERER'].'">Back</a>';
        }catch(Exception $e){
            echo '<p>Query could not be done</p>';
        }
    }