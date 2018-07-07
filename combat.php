<?php
    session_start();
    include "functions.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
    body{
        margin: 0;
        padding: 0;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-content: center;
        background:beige;
        background-image: url("./images/combat.jpg");
        background-size: cover;
    }
    .header{
        flex: 0 0 20%;
        background: black;
        color: white;
        text-align: center;
        font-family: 'Markazi Text', serif;
        font-size: 2em;   
    } 
    .container{
        flex: 1 1 80%;
    }
    .center{
        margin: auto;
        width: 60%;
        height: 300px;
        margin-top:10%;
        background: gray;
        opacity: .9;
    }
    .decision{
    display:none;
    }

    input#dec1[type=radio] + label{
        /* background-image: url("./images/c1.jpg");
        background-size: cover; */
        background: red;
        width: 100px;
        border: 3px solid white;
        display:inline-block;
        padding: 0 0 0 0px;
    }
    input#dec2[type=radio] + label{
        /* background-image: url("./images/c1.jpg");
        background-size: cover; */
        background: red;
        width: 100px;
        border: 3px solid white;
        display:inline-block;
        padding: 0 0 0 0px;
    }
    input#dec1[type=radio]:checked + label{
        /*
        border-color: yellow;
        border-style: solid;
       */
       border: 3px solid yellow;
        width: 100px;
        display:inline-block;
        padding: 0 0 0 0px;
    }
    input#dec2[type=radio]:checked + label{
        border: 3px solid yellow;
        width: 100px;
        display:inline-block;
        padding: 0 0 0 0px;
    }
    label{
        text-align: center;
        font-size:2em;
        font-style: bold;
    }
    .submissionContainer{
        margin:auto;
        width:50%;
        border: 1px solid black;
        text-align: center;
    }
    </style>
</head>
<body>
    <?php include "header.php";
    ?>
    <div class="container">
        <div class="center">
            <img src="<?php echo $_SESSION['portrait'] ?>" style="float: left; width: 150; height: 200px;">
            <img src="./images/c5.jpg" style="float: right; width: 150px; height: 200px;">

            <?php 
                $fodder=charCreate($rules, $enemy, $basicWeapons);
                echo "<h2 style=\"text-align:center;\">".$_SESSION['Fname']."  vs.  ".$fodder['name']."</h2><br>";
                echo $fodder['name']."<br>";  
                echo $fodder['weapon']."<br>"; 
                echo $fodder['health']."<br>"; 
                echo $fodder['defense']."<br>"; 
                $temparr=$basicWeapons['sword-b'];
               // echo $temparr['roll'];
                getDamage($basicWeapons, $_SESSION['weapon']);

            ?>
            <br><br><br>
            <div class="submissionContainer" style:"clear: both;">
                <form action="" method="post">
                    <input class="decision" type="radio" required name="combat" value="attack" id="dec1"><label for="dec1"><strong>Attack</strong></label>
                    &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                    <input class="decision" type="radio" required name="combat" value="defend" id="dec2"><label for="dec2"><strong>Defend</strong></label>
                    <input type="hidden" name="postback" value=true><br><br>
                    <input type="submit">
                </form>
            </div>
        </div>
    </div>
    
</body>
</html>