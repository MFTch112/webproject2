<?php 

function roll ($sides) {
    return mt_rand(1,$sides);
}
function sessionPost($array){
    $array['name']=$_SESSION['Fname'];
    $array['health']=$_SESSION['health'];
    $array['defense']=$_SESSION['defense'];
}
$GLOBALS['fullWeaponList']=array(
    'axe-b' => array (
        'name' => 'Basic Axe',
        'roll' => '2d4',
        
    ),
    'sword-b' => array (
        'name' => 'Basic Sword',
        'roll' => '3d2',
        
    ),
    'bow-b' => array (
        'name' => 'Basic Bow',
        'roll' => '2d5',
        
    ),
    'axe-E' => array (
        'name' => 'Enhanced Axe',
        'roll' => '3d4',
        
    ),
    'sword-E' => array (
        'name' => 'Buster Sword',
        'roll' => '4d4',
        
    ),
    'bow-E' => array (
        'name' => 'Predator Bow',
        'roll' => '4d5',
        
    ),
    'axe-L' => array (
        'name' => 'Enhanced Axe',
        'roll' => '6d3',
        
    ),
    'sword-L' => array (
        'name' => 'Buster Sword',
        'roll' => '5d4',
        
    ),
    'bow-L' => array (
        'name' => 'Predator Bow',
        'roll' => '5d6',
        
    ), 
);
//weapon list as array
$GLOBALS['basicWeapons'] = array (
    'axe-b' => array (
        'name' => 'Basic Axe',
        'roll' => '2d4',
        
    ),
    'sword-b' => array (
        'name' => 'Basic Sword',
        'roll' => '3d2',
        
    ),
    'bow-b' => array (
        'name' => 'Basic Bow',
        'roll' => '2d5',
        
    ));

$GLOBALS['enhancedWeapons'] = array(
    'axe-E' => array (
        'name' => 'Enhanced Axe',
        'roll' => '3d4',
        
    ),
    'sword-E' => array (
        'name' => 'Buster Sword',
        'roll' => '4d4',
        
    ),
    'bow-E' => array (
        'name' => 'Predator Bow',
        'roll' => '4d5',
    ),    
);
$GLOBALS['epicWeapons'] = array(
    'axe-L' => array (
        'name' => 'Enhanced Axe',
        'roll' => '6d3',
        
    ),
    'sword-L' => array (
        'name' => 'Buster Sword',
        'roll' => '5d4',
        
    ),
    'bow-L' => array (
        'name' => 'Predator Bow',
        'roll' => '5d6',
    )
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
function charCreate($rules, $char){
    $nametxt = file('names.txt');
    $titletxt =file('titles.txt');
    $portraittxt=file('portraits.txt');
    $npc=array_rand($nametxt);
    $title=array_rand($titletxt);
    $portrait=array_rand($portraittxt);
    $char['name']="$nametxt[$npc] $titletxt[$title]";
    if($_SESSION['wins']<5){
        $char['weapon']=array_rand($GLOBALS['basicWeapons']);
    }
    elseif($_SESSION['wins']<10){
        $char['weapon']=array_rand($GLOBALS['enhancedWeapons']);
    }
    else{
        $char['weapon']=array_rand($GLOBALS['epicWeapons']);
    }
    $char['portrait']=$portraittxt[$portrait];
    foreach ($rules as $stat=>$rule) {       
        if (preg_match("/^([0-9]+)d([0-9]+)/", $rule, $matches)) {
            // This is a die roll
            $val = 0;
            for ($n = 0;$n<$matches[1];$n++) {
                $val = $val + roll($matches[2]);
            }
            $char[$stat] = $val+($_SESSION['wins']*2);
        }      
        $defrand=rand(1,4);
        if($defrand==1){
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
function maxDamage($weapons, $single){
    $temp=$weapons[$single];
    list($count, $sides) = explode('d', $temp['roll']);
    $result = $count * $sides;
    return $result;
}
function enemyAction(){
    $temp=rand(1,3);
    
}
    
   

function writeSave($name,$portrait,$score) {
    
    $data= $name.','.$portrait.','.$score.PHP_EOL;    
    //a for appending to savefile
    $fh=fopen('save.txt','a');
    fwrite($fh,$data);
}


function getSave(){
    //returns save.txt in "," delimited array
    $fh = "save.txt";
    $str=file_get_contents($fh);
    $array = explode(",",$str);
    return $array;
}

function save($name,$score,$img,$dmg){
      global $conn ;     
        $insert="INSERT INTO leaderboard(name, score, img, dmg) VALUES ( '{$name}','{$score}','{$img}','{$dmg}' );";
        mysqli_query($conn,$insert);

}




  ?>

