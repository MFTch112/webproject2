<?php

/*
 * 3d10-lotto-picker.php
 * by Duane O'Brien - http://chaoticneutral.net
 * written for IBM DeveloperWorks
 */

$picks = explode("\n", file_get_contents("lotto.won.txt"));

if (!empty($_POST)) {
    $pick = explode(",", $_POST['pick']);
    if (count($pick) == 6) {
        $picks[] = $_POST['pick'];
        file_put_contents("lotto.won.txt", implode("\n", $picks) );
    }
}

$numbers = array_fill(1,40,0);

foreach ($picks as $pick) {
    $pick = explode(",", $pick);
    foreach ($pick as $number) {
        $numbers[$number]++;
    }
}

asort($numbers);

$pick = array_slice($numbers,0,6,true);

echo implode(',',array_keys($pick)) . "\n";

?>
<form method='post'>
<input name='pick' />
<input type='submit' value='enter a winning pick' />
</form>