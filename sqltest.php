<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <?php 
        include 'db.php';
        $stuff="INSERT INTO leaderboard(name, score, img, dmg) VALUES(\"test23\", 50, \"c03.jpg\", 2000);";      //The insert query
        mysqli_query($conn, $stuff);
    ?>
</body>
</html>