<?php
    session_start();
    include "functions.php";    
    $boolDefend=false;
    $heroDefend=false;
    $_SESSION['levelUp']=false;
    switch ($_SESSION['wins']) {
        case 5:
            $_SESSION['weapon']=array_rand($GLOBALS['enhancedWeapons']);
            $_SESSION['defense']+=2;
            $_SESSION['levelUp']=true;
            break;
        case 10:
            $char['weapon']=array_rand($GLOBALS['epicWeapons']);
            $_SESSION['defense']+=4;
            $_SESSION['levelUp']=true;
        break;
    }

    if(!isset($_POST['combat'])){
        $fodder=charCreate($rules, $enemy);
        $_SESSION['fodName']=$fodder['name'];
        $_SESSION['fodHealth']=$fodder['health'];
        $_SESSION['fodWeapon']=$fodder['weapon'];
        $_SESSION['fodPortrait']=$fodder['portrait'];
        $_SESSION['fodDefense']=$fodder['defense'];
    }
    else{
        /***************************** Attacking ******************************************/
        if($_POST['combat']=='attack'){ 
            $damage=getDamage($GLOBALS['fullWeaponList'], $_SESSION['weapon']);
            $behavior=rand(1,4);   //-------------------25% chance for enemy to defend
            if($behavior>1){
                $fodDamage=getDamage($GLOBALS['fullWeaponList'], $_SESSION['fodWeapon']);
                $_SESSION['health']-=$fodDamage;
                $_SESSION['fodHealth']-=$damage;
            }
            else{
                //echo "enemy defends";
                $boolDefend=true;
                $negativeCheck=($damage-$_SESSION['fodDefense']);
                if($negativeCheck<0){   //prevents defense stat from giving back health on negative damage values
                    $damage=0;
                }
                else{
                    $damage=$negativeCheck;
                }
                
                $_SESSION['fodHealth']-=$damage;
            }
        }
        /***************************** Defending ******************************************/ 
        //todo
        elseif($_POST['combat']=='defend'){
            $heroDefend=true;
            $behavior=rand(1,4);   //-------------------25% chance for enemy to defend
            if($behavior>1){
                $fodDamage=getDamage($GLOBALS['fullWeaponList'], $_SESSION['fodWeapon']);
                $negativeCheck=$fodDamage-$_SESSION['defense'];
                if($negativeCheck<0){   //prevents defense stat from giving back health on negative damage values
                    $fodDamage=0;
                }
                else{
                    $fodDamage=$negativeCheck;
                } 
                $_SESSION['health']-=$fodDamage;
            }
            else{
                $boolDefend=true;     
            }
        }
        else{
            echo "test3";
        }
        /******************************* Health Check ***************************************/
        if($_SESSION['health']<=0){
            //include 'sql.php';
            //mysqli_query($conn, $insert);
            session_unset();

            header('location:deathscreen.php');
            exit();
        }
        /******************************** Currency for Consumables upon victory ******************************/
        elseif($_SESSION['fodHealth']<=0){
            $_SESSION['recovery']=rand(10,15)+$_SESSION['wins'];
            $_SESSION['health']+=$_SESSION['recovery'];
            $_SESSION['wins']++;
            header('location:rest.php');
            exit();
        }
        
    }
   
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
        background-image: url("./images/combat.jpg");
        background-size: cover;
    }
    span{
        color: gold;
    }
    img{
        border: 1px solid black;
    }
    h2{
        font-family: 'Chela One', cursive;
    }
    .header{
        flex: 0 0 20%;
        background: black;
        color: white;
        text-align: center;
        font-family: 'Markazi Text', serif;
        font-size: 2em;   
    } 
    .header span{
        color:gray;
        font-size: 2.5em;
    }
    .container{
        flex: 1 1 80%;
    }
    .dialogueBox{
        margin: auto;
        width: 50%;
        border: 1px solid black;
        height: 100px;
        text-align: center;
    }
    .dialogueText{
        color: orangered;
        font-size: 2em;
    }
    .center{
        margin: auto;
        width: 60%;
        height: 400px;
        margin-top:5%;
        background: gray;
        opacity: .9;
    }
    .heroStats{
        background: orangered;
        float: left;
        color: white;
    }
    .enemyStats{
        background: orangered;
        float: right;
        color: white;
    }
    .decision{
    display:none;
    }

    input#dec1[type=radio] + label{
        /* background-image: url("./images/c1.jpg");
        background-size: cover; */
        background: gold;
        width: 100px;
        border: 3px solid white;
        display:inline-block;
        padding: 0 0 0 0px;
    }
    input#dec2[type=radio] + label{
        /* background-image: url("./images/c1.jpg");
        background-size: cover; */
        background: gold;
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
       border: 3px solid orangered;
        width: 100px;
        display:inline-block;
        padding: 0 0 0 0px;
    }
    input#dec2[type=radio]:checked + label{
        border: 3px solid orangered;
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
            <img src="<?php echo $_SESSION['portrait'] ?>" style="float: left; width: 150px; height: 200px;">
            <img src=<?php echo $_SESSION['fodPortrait']?> style="float: right; width: 150px; height: 200px;">

            <?php 
                echo "<div class=\"heroStats\"><p>Health: ".$_SESSION['health']."<br> Defense: ". $_SESSION['defense'].
                "<br>Max Damage: ".maxDamage($GLOBALS['fullWeaponList'], $_SESSION['weapon'])."</p></div>";
                echo "<div class=\"enemyStats\"><p>Health: ".$_SESSION['fodHealth']."<br> Defense: ". $_SESSION['fodDefense'].
                "<br>Max Damage: ".maxDamage($GLOBALS['fullWeaponList'], $_SESSION['fodWeapon'])."</p></div>";
                echo "<h2 style=\"text-align:center;\"><span>".$_SESSION['Fname']."</span><br>  vs.  <br><span>".$_SESSION['fodName']."</span></h2><br>";
                $temparr=$basicWeapons['sword-b'];
            ?>
            <br>
            <div class="dialogueBox">
                <?php 
                if(isset($_POST['combat'])){ 
                    echo "<br><div class=\"dialogueText\">";
                    if($heroDefend==true){
                        echo "- you defend<br>";
                    }
                    else{
                        echo "- you did $damage damage <br>";
                    }
                    if($boolDefend==true){
                        echo "- enemy defends";
                    }
                    else{
                        echo"- enemy did $fodDamage damage";
                    }
                    echo "</div>";
                }
                ?>
            </div>
            <br><br>
            <div class="submissionContainer">
                <form action="combat.php" method="post">
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