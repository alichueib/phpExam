<?php
session_start();

if(isset($_SESSION['counter'])){
    $_SESSION['counter']=$_SESSION['counter']+1;
}else{
    $_SESSION['counter']=0;
}

echo '<h1>Planets</h1>';

require_once 'connect.php';

$query='SELECT P.P_ID,P.P_Name,P.P_discoveryDate
        FROM planets  P';

$stmt=$pdo->prepare($query);
$stmt->execute();
$result=$stmt->fetchAll(PDO::FETCH_ASSOC);
if(!$result){
    echo '<p>Nothing to show</p>';
}else{
    ?>
    <p>The planets of the solar system ordered by their discovery dates are:</p>
    <table border="2">
        <tr>
            <td>Planet Name</td>
            <td>Discovery Date</td>
            <td>Moons</td>
        </tr>
    <?php
    foreach($result as $row){
        ?>
        <tr>
            <td>
                <a href="Planet.php?pid=<?php print $row['P_ID']?>">
                    <?php print $row['P_Name'] ?>
                </a>
            </td>
            <td>
                <?php print $row['P_discoveryDate'] ?>
            </td>
            <?php
            if($_SESSION['counter']>=3){
                ?>
            <td>
                <a href="moons.php?pid=<?php print $row['P_ID']?>&pname=<?php print $row['P_Name']?>&log=0">
                    Click to Show 
                </a>
            </td>
            <?php
            }else{
            ?>
            <td>
                <a href="moons.php?pid=<?php print $row['P_ID']?>&pname=<?php print $row['P_Name']?>&log=1">
                    Click to Show 
                </a>
            </td>
            <?php
            }?>
        </tr>
        <?php
    }
    echo '</table><br>
          <a href="changeRadius.php">Change Radius</a><br>
          <a href="logout.php" style="color:red">Logout</a> 
        ';
}
