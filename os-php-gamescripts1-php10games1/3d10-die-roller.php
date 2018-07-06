<?php

/*
 * 3d10-die-roller.php
 * by Duane O'Brien - http://chaoticneutral.net
 * written for IBM DeveloperWorks
 */

/* A really basic function to simulate rolling a simple die with N sides */

function roll($sides) {
    return mt_rand(1,$sides);
}

/* Next we put in a sloppy bit of form to allow you to pick the number of sides, and roll away */

?>
<form method="post">
Sides : <input type="text" name="sides" value="<?php echo @$_POST['sides'] ?>"/> 
Result : <?php echo roll((int) @$_POST['sides'])  ?> 
<input type="submit" value="roll" />
</form>