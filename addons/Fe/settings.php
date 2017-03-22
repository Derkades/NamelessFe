<?php 
/*
 * Made by Derkades
 * https://github.com/Derkades
 *
 * License: MIT
 */

// Settings for the Fe addon

// Ensure user is logged in, and is admin
if($user->isLoggedIn()){
	if($user->canViewACP($user->data()->id)){
		if($user->isAdmLoggedIn()){
			// Can view
		} else {
			Redirect::to('/admin');
			die();
		}
	} else {
		Redirect::to('/');
		die();
	}
} else {
	Redirect::to('/');
	die();
}

// Display information first
?>
<h3>Addon: Fe</h3>
Author: Derkades<br>
Version: 1.0.0<br>
Displays top balance for players. To modify database information and other cool settings, go to addons/Fe/config.php