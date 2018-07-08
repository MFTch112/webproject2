<?php 
    $linkto='charstart.php';
 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style.css">
    <title>Main Page</title>
    
</head>
<body>
    <?php include 'header.php' ?>
    <div class="outerContainer">
        <div class="innerContainer">
            <h3>Enter Character Information Below:</h3>
            <form action="<?php echo htmlspecialchars($linkto)?>" method="post">
                Name: <input type="text" required name="Fname"><br><br>
                Please Select Character Portrait:<br>
                <div class="portraitBox">
                    <input type="radio" name='portrait' required value="./images/c30.jpg" id="prt1"/><label for="prt1"></label> 
                    <input type="radio" name='portrait' required value="./images/c10.png" id="prt2"/><label for="prt2"></label> 
                    <input type="radio" name='portrait' required value="./images/c3.jpg" id="prt3"/><label for="prt3"></label> <br>
                    <input type="radio" name='portrait' required value="./images/c4.jpg" id="prt4"/><label for="prt4"></label>
                    <input type="radio" name='portrait' required value="./images/c5.jpg" id="prt5"/><label for="prt5"></label> 
                    <input type="radio" name='portrait' required value="./images/c6.png" id="prt6"/><label for="prt6"></label> <br>
                    <input type="radio" name='portrait' required value="./images/c7.jpg" id="prt7"/><label for="prt7"></label> 
                    <input type="radio" name='portrait' required value="./images/c8.jpg" id="prt8"/><label for="prt8"></label>
                    <input type="radio" name='portrait' required value="./images/c9.jpg" id="prt9"/><label for="prt9"></label>
                </div>    
                <br><br>
                Please select starting weapon:
                <select name="weapon" size="1">
                    <option value="axe-b">Basic Axe</option>
                    <option value="sword-b">Basic Sword</option>
                    <option value="bow-b">Basic Bow</option>
                </select><br>
                <input type="submit" value="Submit" name="submit">
            </form>
            <br><br>
            <a href="leaderboard.php" class="LB">Leaderboard</a>
        </div>
    </div>
</body>
</html>