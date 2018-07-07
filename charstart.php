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
            $_SESSION['defense']=0;
            $_SESSION['currency']=0;
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
    .header span{
        color:gray;
        font-size: 2.5em;    
    }  
    .container{ 
      flex: 1 1 80%;
    }
    .charscreen{
        margin:auto;
        border: 3px solid salmon;
    }
    td{
        border: 1px solid black;
        border-collapse: collapse;
    }
    .cPortrait{
        height:300px;
        width:250px;
    }
    </style>
</head>
<body class-"body2">
    <?php include 'header.php' ?>

    <div class="container">
        <div class="charscreen">
            <img class="cPortrait" src="<?php echo $_SESSION['portrait'] ?>">
            <div class="ctext">
                <?php echo "<p></p>" 
                ?>
            </div>
            <input type="radio" name="dialogue">
        </div>
        
        <table>
            <?php 
                /*
                var_dump($_SESSION);
                $npc = file('names.txt');
                shuffle($npc);
                foreach ($npc as $line) {
                    echo $line."<br>";
                }
                echo "$npc[1] <br>";            
                var_dump($_POST);
                //$w=$_POST['weapon'];
               // echo "<br> $w <br>";
                foreach($_POST as $things){
                    echo "$things<br>";
                }
                
                foreach ($weapons as $weapon) {
                    list($count, $sides) = explode('d', $weapon['roll']);
                    $result = 0;
                    for ($i = 0; $i < $count;$i++) {
                        $result = $result + roll($sides);
                    }
                    echo "<tr><td>" . $weapon['name'] . "</td><td>" 
                . $weapon['roll'];
                    if ($weapon['bonus'] > 0) {
                        echo "+" . $weapon['bonus'];
                        $result = $result + $weapon['bonus'];
                    }
                    echo "</td><td>" . $result . "</td></tr>";
                }
                */
            ?>
        </table>
        <form method="post" action="">
          
            <br>
            <input type="submit" name="submit">
        </form>
    </div>
</body>
</html>