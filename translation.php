<?php
/*
 * Update with your own locate
 * EXAMPLE : if your language is german name a folder de_DE inside locale folder. 
 * ********* create another folder inside de_DE called LC_MESSAGES.
 * ********* put the scripteen.mo and scripteen.po files inside
 * ********* then edit the lines bellow
 */
 
//EDIT BELLOW WITH YOUR OWN
putenv('LC_ALL=en_US');
setlocale(LC_ALL, 'en_US');

// DO NOT EDIT THIS
bindtextdomain("scripteen", getcwd() . "/locale");

// DO NOT EDIT THIS
textdomain("scripteen");

?>