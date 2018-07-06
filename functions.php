<?php 
function roll ($sides) {
    return mt_rand(1,$sides);
}
function sessionPost($array){
    $array['name']=$_SESSION['name'];
    $array['health']=$_SESSION['health'];
    $array['defense']=$_SESSION['defense'];
}
//weapon list as array
$weapons = array (
    'axe-b' => array (
        'name' => 'Basic Axe',
        'roll' => '1d6',
        'bonus' => '0',
    ),
    'sword-B' => array (
        'name' => 'Basic Sword',
        'roll' => '1d6',
        'bonus' => '4',
    ),
    'bow-B' => array (
        'name' => 'Basic Bow',
        'roll' => '2d5',
        'bonus' => '0',
    ),
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
$character = array(
    'name' => null,
    'health' => '36',
    'defense' => '0',
);

?>
