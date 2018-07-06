<?php

/*
 * 3d10-name-generator.php
 * by Duane O'Brien - http://chaoticneutral.net
 * written for IBM DeveloperWorks
 */

/*
 * I've included some good name files that can be used to see the name generator.
 * One name per line, so you need to explode on newlines.
 */

$male = explode("\n", file_get_contents('names.male.txt'));
$female = explode("\n", file_get_contents('names.female.txt'));
$last = explode("\n", file_get_contents('names.last.txt'));

/* Shuffle the name arrays, or you'll get the same results every time */

shuffle($male);
shuffle($female);
shuffle($last);

/* Now dump out ten names, alternating male and female */

for ($i = 0; $i <= 10; $i++) {
    echo $male[$i] . ' ' . $last[$i] . "<br />\n";
    echo $female[$i] . ' ' . $last[$i] . "<br />\n";
}

?>