<?php 
    include 'functions.php';
    session_start();
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
    .recoveryText{
        font-size:2em;
        color: red;
    }
    
    .winText{
        opacity: 0;
        color:yellow;
        text-align: center;
        font-size: 2em;
        -webkit-animation: fadein 6s; /* Safari, Chrome and Opera > 12.1 */
        -moz-animation: fadein 6s; /* Firefox < 16 */
            -o-animation: fadein 6s; /* Opera < 12.1 */
                animation: fadein 6s;
    }
    .charscreen{     
        margin:auto;
        width: 50%;
        border: 3px solid salmon;
        background: gray;
        opacity: .9;
    }

    @keyframes fadein {
        0% { opacity: 0; }
        50% {opacity: 1;}
        100% {opacity: 0;}
    }
    /* Firefox < 16 */
    @-moz-keyframes fadein {
        0% { opacity: 0; }
        50% {opacity: 1;}
        100% {opacity: 1;}
    }
    /* Safari, Chrome and Opera > 12.1 */
    @-webkit-keyframes fadein {
        0% { opacity: 0; }
        50% {opacity: 1;}
        100% {opacity: 1;}
    }

    </style>
</head>
<body class-"body2">
    <?php include 'header.php' ?>

    <div class="container">
        <p class="winText">VICTORY!</p>
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
                    echo "<br><br><p class=\"recoveryText\">You have rested and recovered <strong>".$_SESSION['recovery']."</strong>hp</p>";
                    if($_SESSION['levelUp']==true){
                        echo "<p class=\"recoveryText\">Your Defense has increased</p>";
                    }
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