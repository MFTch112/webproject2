<?php

/*
 * 3d10-deck-shuffler.php
 * by Duane O'Brien - http://chaoticneutral.net
 * written for IBM DeveloperWorks
 */

/* First, we have the suits */

$suits = array (
    "Spades", "Hearts", "Clubs", "Diamonds"
);

/* Next, we declare the faces*/

$faces = array (
    "Two", "Three", "Four", "Five", "Six", "Seven", "Eight",
    "Nine", "Ten", "Jack", "Queen", "King", "Ace"
);

/* Now build the deck by combining the faces and suits. */

$deck = array();

foreach ($suits as $suit) {
    foreach ($faces as $face) {
        $deck[] = array('face'=>$face,'suit'=>$suit);
    }
}

/* Next, you can shuffle up the deck and pull a random card. */

shuffle($deck);

$card = array_shift($deck);

echo $card['face'] . ' of ' . $card['suit'] . "\n";

?>