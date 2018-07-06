<?php 
include 'functions.php';
    session_start();
    if(!isset($_POST["submit"]) && !isset($_SESSION['started'])){
        header('location:index.php'); //if name is empty, start back at index
    }
   else{
        $name=$_POST['Fname'];
        $portrait=$_POST['portrait'];
        $w=$_POST['weapon'];
        $_SESSION['started']=true;
        $_SESSION['name']=$name;
        $_SESSION['weapon']=$w;
        $_SESSION['portrait']=$portrait;
        $_SESSION['defense']=0;
        $_SESSION['currency']=0;
        $_SESSION['wins']=0;
   }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
    <style>
        td{
            border: 1px solid black;
            border-collapse: collapse;
        }
    </style>
</head>
<body>
    <div class="container">
        <input type="radio" name="dialogue">
    </div>
    <?php include 'header.php' ?>
    <table>
        <?php 
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
        ?>
    </table>
    <form method="post" action="">
      
        <br>
        <input type="submit" name="submit">
    </form>
</body>
</html>