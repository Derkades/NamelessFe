<?php 
/*
 * Made by Derkades
 * https://github.com/Derkades
 *
 * License: MIT
 */

// Initialise the fe addon
// We've already checked to see if it's enabled

require('language.php');
require('config.php');

// Enabled, add links to navbar
$navbar_array[] = array('fe' => $fe_language['nav_icon'] . $fe_language['nav_text']);
