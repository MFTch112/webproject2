<?php 
include 'functions.php';
    session_start();
    $required=array('Fname','portrait','weapon', 'submit');
    foreach($required as $req){ 
        if(!isset($_POST[$req]) && $_SESSION['started']!=true){
            header('location:index.php'); ////loops through each post variable to see if set. If not, and session not started, go back to index
        }
          
        elseif(isset($_POST[$req])){
            $_SESSION['started']=true;
            $_SESSION[$req]=$_POST[$req];
            $_SESSION['health']=25;
            $_SESSION['defense']=3;
            $_SESSION['wins']=0;
        }
    }

;
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
    @import url('https://fonts.googleapis.com/css?family=Chela+One|Markazi+Text');

    body{
        margin: 0;
        padding: 0;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-content: center;
        background:beige;
        background-image: url("./images/hall.jpg");
        background-size: cover;
    }.header{

        flex: 0 0 20%;
        background: black;
        color: white;
        text-align: center;
        font-family: 'Markazi Text', serif;
        font-size: 2em;   
    }
    .largetxt{
        font-family: 'Chela One', cursive;
        font-size: 2em;
        color: white;
        text-align: center;
    } 
    .header span{
        color:gray;
        font-size: 2.5em;    
    }  
    .container{ 
      flex: 1 1 80%;
    }
    .charscreen{
        margin:auto;
        margin-top: 5%;
        width: 50%;
        border: 3px solid salmon;
        background: gray;
        opacity: .9;
    }
    td{
        border: 1px solid black;
        border-collapse: collapse;
    }
    .cPortrait{
        height:300px;
        width:250px;
    }
    .statStuff{
        color:white;
        font-size: 1.5em;
    }
    </style>
</head>
<body class-"body2">
    <?php include 'header.php' ?>

    <div class="container">
        <div class="charscreen" style="overflow:hidden;">
            <img class="cPortrait" style="float:left;" src="<?php echo $_SESSION['portrait'] ?>">
            <div class="ctext">
                <?php
                    $temp1=$GLOBALS['fullWeaponList'];
                    $temp2=$temp1[$_SESSION['weapon']];
                    $maxDamage=maxDamage($GLOBALS['fullWeaponList'], $_SESSION['weapon']);
                    echo "<p class=\"statStuff\">Name: ".$_SESSION['Fname'].
                        "<br>Weapon: ".$temp2['name'].
                        "<br> Max Damage: ".$maxDamage.
                        "<br> Health: ".$_SESSION['health']."</p>"; 
                ?>
            </div>
        </div>
        <form method="post" action="combat.php">
          
            <br>
           <p class="largetxt">
               Click to Enter Arena: <input type="submit" name="submit">
           </p>
        </form>
    </div>
</body>
</html>