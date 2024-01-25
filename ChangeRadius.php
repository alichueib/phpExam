<html lang="en">
<head>
    <script type="text/javascript" src="showMoon.js"></script>
</head>
<body>
    <h1>Choose a Planet then a moon</h1>
    <?php
        require_once 'connect.php';
        $query='SELECT P_ID,P_Name FROM Planets';
        $stmt=$pdo->prepare($query);
        $stmt->execute();
        $result=$stmt->fetchAll(PDO::FETCH_ASSOC);
        if($result){
            ?>
            <form action="updateHandler.php" method="POST">
            planet
            <select name='chosenPlanet' onchange="showMoon(this.value,'Drop')">
            <option selected > Choose Planet</option>
            <?php
            foreach($result as $row){
                echo '<option value="'.$row['P_ID'].'">'. $row['P_Name'] .'</option>';
            }
            echo '</select><br>';
            ?>
            <div id="Drop">
                Moon<select>
                        <option selected disabled>Choose a moon</option>
                    </select>
                </div>
            Enter the new Radius
            <input type="number" name='newRadius'><br>
            <input type="submit" name="submit" value="Save"><br>
            <?php
        }
    ?>
    <a href='Planets.php'>Back to Planets</a>
</body>
</html>