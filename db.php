<?php


    $dbServername="localhost";
    $dbUsername="cau1";
    $dbPassword="cau1";
    $dbName="cau1";
    $sqlName=$_SESSION['Fname'];
    $sqlScore=$_SESSION['wins'];
    $sqlImg=$_SESSION['portrait'];
    $sqlDmg=$_SESSION['damage'];
    $conn = mysqli_connect($dbServername,$dbUsername,$dbPassword,$dbName); 
    $insert="INSERT INTO leaderboard(name, score, img, dmg) VALUES(\"$sqlName\",$sqlScore, \"$sqlImg\", $sqlDmg);";      //The insert query

?>
