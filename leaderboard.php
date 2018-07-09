<?php 

        require_once ("db.php");
        include ("functions.php");    
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <!-- <meta http-equiv="X-UA-Compatible" content="IE=edge"> -->
    <title>Leaderboard</title>
    <link rel="stylesheet" href="leaderboard.css">
    <link href="https://fonts.googleapis.com/css?family=Playfair+Display+SC:400,700,900" rel="stylesheet">

    <!-- <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" /> -->

</head>

<body>

    <div id="center">
        <h1> Hall of the Fallen </h1>
        <p>
        Welcome to the Hall of the Fallen.   
        Here lies the ten greatest warriors the world has known.</br>
        Their bodies may have perished but the memory of their deeds will 
        live on. 
        </p>

    <hr/>
        <?php    
           global $conn ; 
        // save("player1",10,"c10.jpg",250);
    $sql= "SELECT * FROM leaderboard ORDER BY score DESC;";
    $result = mysqli_query($conn,$sql);
    // $rowCheck= mysql_num_rows($result);
    // if($rowCheck>0){
        echo "<table>
        <caption>
        Top 10 Warriors Ordered by Enemies Slain
        </caption>
        <tr><th>Rank</th><th>Portrait</th><th>Name</th><th>Damage Dealt</th><th>Score (Enemies Defeated)</th></tr>";
        $rank=1;
        while($row = mysqli_fetch_assoc($result)){
            
            echo '<tr><td>' . $rank . '</td><td><img src="images/' . $row['img'] . '"></td><td>' . $row['name'] . '</td><td>' . $row['dmg'] . '</td><td>' . $row['score'] . "</td></tr>";
            $rank++;

        //set number of high scores to display
            if($rank>10){
                break;
            }
        }
        echo "</table>";
    // }

    ?>
        
        <a href="index.php">Start A New Game</a>
    <br/>
    <hr/>
    </div>

</body>

</html>