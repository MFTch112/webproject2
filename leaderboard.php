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
    <style>
     tr, td { 
         border: 1px solid black; 

     }
     </style> 
    <!-- <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" /> -->
    
</head>
<body>
    <h1> Leaderboard:</h1>
    <?php 
    echo "<table>";
    echo "<tr><td>test" . "</td></tr></table>" ;
    global $conn ; 
        // save("player1",10,"c10.jpg",250);
    $sql= "SELECT * FROM leaderboard;";
    $result = mysqli_query($conn,$sql);
    // $rowCheck= mysql_num_rows($result);
    // if($rowCheck>0){
        echo "<table>";
        while($row = mysqli_fetch_assoc($result)){
            echo "<tr><td>" . $row['name'] . "</td><td>" . $row['score'] . "</td><td>" . $row['img'] . "</td><td>" . $row['dmg'] . "</td></tr>";
        
        }
        echo "</table>";
    // }

    ?>  
    
    
    </body>
</html>