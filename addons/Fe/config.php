<?php
$fe_config = array(
	//Database configuration
	'database_address' => '',
	'database_name' => '',
	'database_user' => '',
	'database_password' => '',
	'table_name' => 'fe_accounts',

	//Optional configuration
	'display_errors' => true, //If true: "Access denied for user EXAMPLE@LOCALHOST". If false: "Failed to connect."
	'max_players' => 10,
	'show_title' => true,
	'title_text' => 'Top 10 richest players',
	'show_uuid' => false,
	'money_format' => '${bal}',
	'image_url' => 'https://minotar.net/helm/{name}/30.png'
);
?>