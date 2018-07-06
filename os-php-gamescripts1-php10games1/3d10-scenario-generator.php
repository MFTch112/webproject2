<?php

/*
 * 3d10-scenario-generator.php
 * by Duane O'Brien - http://chaoticneutral.net
 * written for IBM DeveloperWorks
 */

/* Start off by opening up files containing the various aspects of a scenario */

$settings = explode("\n", file_get_contents('scenario.settings.txt'));
$objectives = explode("\n", file_get_contents('scenario.objectives.txt'));
$antagonists = explode("\n", file_get_contents('scenario.antagonists.txt'));
$complications = explode("\n", file_get_contents('scenario.complications.txt'));

/* Now mix them all up, and spit out the elements, combined. */

shuffle($settings);
shuffle($objectives);
shuffle($antagonists);
shuffle($complications);

echo $settings[0] . ' ' . $objectives[0] . ' ' . $antagonists[0] . ' ' . $complications[0] . "<br />\n";

?>