<?php
if($_GET['log']==0){
    header('refresh:3,url='.$_SERVER['HTTP_REFERER']);
    die("You can no longer see the moons today. Come again tomorrow");
}else{
echo '<p>'. $_GET['pname'] .' moons are:</p>';
?>

    <table>
        <tr>
            <td>Moon's Name</td>
            <td>Radius</td>
            <td></td>
        </tr>
        <?php
            require_once 'connect.php';
            $query= 'SELECT *
                     FROM Moons
                     WHERE Planet_ID=:pid
                    ';
            $stmt=$pdo->prepare($query);
            $stmt->bindParam(':pid',$_GET['pid']);
            $stmt->execute();
            $result=$stmt->fetchAll(PDO::FETCH_ASSOC);
            foreach($result as $row){
                if(!$result){
                    echo '<p>No results were found</p>';
                }else{
                    echo '
                    <form action="updateMoonName.php?mid='.$row['M_ID'].'" method="POST">
                    <tr>
                        <td>'.$row['M_Name'].'</td>
                        <td>'.$row['M_Radius'].'</td>
                        <td>
                            <input type="text" name="enteredName">
                        </td>
                        <td>
                            <input type="submit" value="Update '. $row['M_Name'] .' name" name="submit">
                        </td>
                    </tr>
                    </form>
                    ';
                }
            }
        
            echo '</table>
                <br><a href="Planets.php">Back to Planets</a>
                ';

}