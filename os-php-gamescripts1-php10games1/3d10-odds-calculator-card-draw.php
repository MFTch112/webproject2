<?php

/*
 * 3d10-odds-calculator.php
 * by Duane O'Brien - http://chaoticneutral.net
 * written for IBM DeveloperWorks
 */

/* Start by copying in everything we did for the deck generator 
 * In part 2, we'll abstract this out so it's a little easier to use.
 */

$suits = array (
    "Spades", "Hearts", "Clubs", "Diamonds"
);

$faces = array (
    "Two", "Three", "Four", "Five", "Six", "Seven", "Eight",
    "Nine", "Ten", "Jack", "Queen", "King", "Ace"
);


$deck = array();

foreach ($suits as $suit) {
    foreach ($faces as $face) {
        $deck[] = array('face'=>$face,'suit'=>$suit);
    }
}


shuffle($deck);

/* Next, we declare a function to calculate the odds of a given card */

function calculate_odds($draw, $deck) {
    $remaining = count($deck);
    $odds = 0;
    foreach ($deck as $card) {
        if (  ($draw['face'] == $card['face'] && $draw['suit'] == $card['suit'] ) ||
              ($draw['face'] == '' && $draw['suit'] == $card['suit'] ) ||
              ($draw['face'] == $card['face'] && $draw['suit'] == '' ) ) {
            $odds++;
        }
    }
    return $odds . ' in ' . $remaining;
}

/* Now build up a couple hands so we can calculate reasonable odds. */

for ($i = 0; $i < 5; $i++) {
    $hands[1][] = implode(" of ", array_shift($deck));
    $hands[2][] = implode(" of ", array_shift($deck));
}

echo "Hand 1 : " . implode(", ", $hands[1]) . "<br />\n";
echo "Hand 2 : " . implode(", ", $hands[2]) . "<br />\n";

/* Now, simulate some hand drawing */

$draw = array('face' => 'Ace', 'suit' => 'Spades');

echo implode(" of ", $draw) . ' : ' . calculate_odds($draw, $deck) . "<br />\n";

$draw = array('face' => '', 'suit' => 'Spades');

echo implode(" of ", $draw) . ' : ' . calculate_odds($draw, $deck) . "<br />\n";

$draw = array('face' => 'Ace', 'suit' => '');

echo implode(" of ", $draw) . ' : ' . calculate_odds($draw, $deck) . "<br />\n";

?>