<?php 
/*
 * Made by Derkades
 * https://github.com/Derkades
 *
 * License: MIT
 */

$page = $members_language['nav_icon'] . $members_language['nav_text']; // for navbar

// Ensure the addon is enabled
if(!in_array('Fe', $enabled_addon_pages)){
	// Not enabled, redirect to homepage
	echo '<script data-cfasync="false">window.location.replace(\'/\');</script>';
	die();
}
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="description" content="Member list for the <?php echo $sitename; ?> community">
		<meta name="author" content="<?php echo $sitename; ?>">
		<meta name="theme-color" content="#454545">

		<?php 

		if(isset($custom_meta)){
			echo $custom_meta; 
		}

		// Generate header and navbar content
		// Page title
		$title = $members_language['members'];
		
		require('core/includes/template/generate.php');
		?>
		
	</head>

  	<body>
		<?php
		// Load navbar
		$smarty->display('styles/templates/' . $template . '/navbar.tpl');
		?>

		<div class="container">	
			<div class="row">
				<div class="col-md-13">
					<?php
						$con = mysqli_connect($fe_config['database_address'], $fe_config['database_user'], $fe_config['database_password'], $fe_config['database_name']);

						if (mysqli_connect_errno()){
							echo '<h3 class="text-center">Failed to connect to MySQL';
							if ($fe_config['display_errors']){
								echo ': ' . mysqli_connect_error();
							}
							echo '</h3>';
							die();
						}
					?>
 					
 					<?php
 						if ($fe_config['show_title']){
 							$title_text = $fe_config['title_text'];
 							echo "<h2 class=\"text-center\">$title_text</h2><hr>";
 						}
 					?>
					
					<div class="well">
						<table class="table table-bordered table-striped table-hover">
							<thead>
								<tr>
									<th>#</th>
									<th>Head</th>
									<th>Name</th>
									<?php if ($fe_config['show_uuid']) echo '<th>UUID</th>'; ?>
									<th>Balance</th>
								</tr>
							</thead>
							<tbody>
							<?php
							   	$num = 0;
						
							    $result = mysqli_query($con, 'SELECT * FROM `' . $fe_config['table_name'] . '` ORDER BY `money` DESC LIMIT ' . $fe_config['max_players'] );
						
							    if (!$result && $fe_config['display_errors']) {
								   die("ERROR: Server did not return any data. " . mysqli_error($con));
							    }
						 
							   	while ($row = mysqli_fetch_array($result)) {
									$num++;
									$uuid = $row['uuid'];
									$name = $row['name'];
									$money = $row['money'];
									$image_url = str_replace('{name}', $name, $fe_config['image_url']);
									$image = "<img src=\"$image_url\" alt=\"$name's head\">";
									$money_formatted = str_replace('{bal}', $money, $fe_config['money_format']);
						 
									echo "<tr>
											<td>$num</td>
											<td>$image</td>
											<td>$name</td>";

						 			if ($fe_config['show_uuid']){
						 				echo "<td>$uuid</td>";
						 			}

									echo "<td>$money_formatted</td>
									</tr>";
								}
						
								mysqli_close($con);
								?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
	  	</div>	  
	
		<?php
		// Footer
		require('core/includes/template/footer.php');
		$smarty->display('styles/templates/' . $template . '/footer.tpl');
		
		// Scripts 
		require('core/includes/template/scripts.php');
		?>
  	</body>
</html>