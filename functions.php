<?php 
function roll ($sides) {
    return mt_rand(1,$sides);
}
function sessionPost($array){
    $array['name']=$_SESSION['Fname'];
    $array['health']=$_SESSION['health'];
    $array['defense']=$_SESSION['defense'];
}
//weapon list as array
$GLOBALS['basicWeapons'] = array (
    'axe-b' => array (
        'name' => 'Basic Axe',
        'roll' => '1d6',
        'bonus' => '0',
    ),
    'sword-b' => array (
        'name' => 'Basic Sword',
        'roll' => '1d6',
        'bonus' => '4',
    ),
    'bow-B' => array (
        'name' => 'Basic Bow',
        'roll' => '2d5',
        'bonus' => '0',
    ));
$enhancedWeapons = array(
    'axe-E' => array (
        'name' => 'Enhanced Axe',
        'roll' => '1d12',
        'bonus' => '0',
    ),
    'sword-E' => array (
        'name' => 'Buster Sword',
        'roll' => '1d12',
        'bonus' => '0',
    ),
    'bow-E' => array (
        'name' => 'Predator Bow',
        'roll' => '2d9',
        'bonus' => '0',
    ),    
);

$enemy = array(
    'Fname' => null,
    'name' => null,
    'health' =>  null,
    'defense' => null,
    'weapon'=> null,
    'portrait'=>null,
);

$rules = array(
    'health' => '4d8',
    'defense'=> '1d5',
);
function charCreate($rules, $char, $weapon){
    $nametxt = file('names.txt');
    $titletxt =file('titles.txt');
    $portraittxt=file('portraits.txt');
    $npc=array_rand($nametxt);
    $title=array_rand($titletxt);
    $portrait=array_rand($portraittxt);
    $char['name']="$nametxt[$npc] $titletxt[$title]";
    $char['weapon']=array_rand($weapon);
    $char['portrait']=$portraittxt[$portrait];
    foreach ($rules as $stat=>$rule) {       
        if (preg_match("/^[0-9]+$/", $rule)) {
            // This is only a number, and is therefore a static value
            $char[$stat] = $rule;
        } 
        else if (preg_match("/^([0-9]+)d([0-9]+)/", $rule, $matches)) {
            // This is a die roll
            $val = 0;
            for ($n = 0;$n<$matches[1];$n++) {
                $val = $val + roll($matches[2]);
            }
            $char[$stat] = $val;
        } 
        /*else if (preg_match("/^([a-z]+)\/([0-9]+)$/", $rule, $matches)) {
            // This is a derived value of some kind.
            $character[$stat] = $character[$matches[1]] / $matches[2];
        }
        echo $stat . ' : ' . $character[$stat] . "<br />\n"; */
        $defrand=rand(1,3);
        if($defrand>1){
            $char['defense']=0;
        }
    }

    return $char;

}
function getDamage($weapons, $single){
    $temp=$weapons[$single];
    list($count, $sides) = explode('d', $temp['roll']);
    $result = 0;
    for ($i = 0; $i < $count;$i++) {
        $result = $result + roll($sides);
    }
    return $result;
    //echo "$single: $result";
}
function enemyAction(){
    $temp=rand(1,3);
    //finish
}
function fight($en){
    $charDamage=getDamage($basicWeapons, $_SESSION['weapon']);
}
    
    /*
    foreach ($weapons as $weapon) {        
        if($single==$weapon){
            echo "test";
            list($count, $sides) = explode('d', $weapon['roll']);
            $result = 0;
            for ($i = 0; $i < $count;$i++) {
                $result = $result + roll($sides);
            }
            echo "$single: $result";
        }
        
        echo "<tr><td>" . $weapon['name']."</td><td>".$weapon['roll'];
        if ($weapon['bonus'] > 0) {
            echo "+" . $weapon['bonus'];
            $result = $result + $weapon['bonus'];
        }
        echo "</td><td>" . $result . "</td></tr>";
    }
    */

function writesave($name,$portrait,$score) {
    $data= $name.','.$portrait.','.$score.PHP_EOL;    
    //a for appending to savefile
    $fh=fopen('save.txt','a');
    fwrite($fh,$data);
}


function readsave(){
    include 'save.txt';
    $fh=fopen('save.txt','r');
   
    while(!feof($fh)){
        $array = explode("\n", fread($fh, filesize('save.txt')));
    }
    fclose();
    return $array;
}
?>
