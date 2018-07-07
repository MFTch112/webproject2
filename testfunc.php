<?php
include functions.php;
include save.txt;

save("jeff","portrait1","500");


$array=readsave();


function getsave(){
    //returns save.txt content as string
$fh = "save.txt";
$str=file_get_contents($fh);
return $str;
}
echo hello;
?>