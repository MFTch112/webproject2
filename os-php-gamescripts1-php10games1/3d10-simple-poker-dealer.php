<?php

/*
 * 3d10-simple-poker-dealer.php
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

$hand = array();

if (empty($_POST)) {
    
    for ($i = 0; $i < 5; $i++) {
        $hand[] = array_shift($deck);
    }

    $handstr = serialize($hand);
    $deckstr= serialize($deck);
    ?>
<form method='post'>
<input type='hidden' name='handstr' value = '<?php echo $handstr ?>' />
<input type='hidden' name='deckstr' value = '<?php echo $deckstr ?>' />
<?php

foreach ($hand as $index =>$card) {
    echo "<input type='checkbox' name='card[" . $index . "]' /> " . $card['face'] . ' of ' . $card['suit'] . "<br />";
}

?>
<input type='submit' value='draw' />
</form>
<?php

} else {
    $hand = unserialize($_POST['handstr']);
    $deck = unserialize($_POST['deckstr']);
    for ($i = 0; $i < 5; $i++) {
        if (isset($_POST['card'][$i])) {
            $hand[$i] = array_shift($deck);
        }
    }

    foreach ($hand as $index =>$card) {
        echo $card['face'] . ' of ' . $card['suit'] . "<br />";
    }
    echo "<a href='3d10-simple-poker-dealer.php'>Try Again</a>";
    
}

?>