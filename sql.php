<?php
    $dbServername="localhost"; //since the file is already on  the server
    $dbUsername="mfain3";       //your username
    $dbPassword="mfain3";       //your username
    $dbName="mfain3";           //Database will be your username (I don't think we have permissions to create new databases, but we can create tables)
    $conn = mysqli_connect($dbServername,$dbUsername,$dbPassword,$dbName) or die("unable to connect to $dbServername");
    $scoreUser=$_SESSION['Fname'];
    $scoreScore=$_SESSION['wins'];
    $insert="INSERT INTO scores(user, score) VALUES(\"$scoreUser\",$scoreScore);";      //The insert query
    $sql= "SELECT TOP 10 * FROM scores ORDER BY score DESC;";                                      //The Select Query
    
?>