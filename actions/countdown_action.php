<?php

if (!isset($_POST['msd_countdown_submit'])) return;


if (!isset($_POST['msd-countdown-date']))
{
	$msd_countdown_start = false;
} else {
	$msd_countdown_start = $_POST['msd-countdown-date'];
}

if (!isset($_POST['msd-countdown-image']))
{
	$msd_countdown_bd_image = false;
} else {
	$msd_countdown_bd_image = $_POST['msd-countdown-image'];
}


$countdown_data = array(
	'post_name' 	=> $msd_countdown_start,  // The name (slug) for your post	
	'post_type'		=> MSD_COUNTDOWN,
	'post_status'   => 'publish'
);

$countdown_id = wp_insert_post($countdown_data);

add_post_meta($countdown_id, "msd-countdown-date", $msd_countdown_start);
add_post_meta($countdown_id, "msd-countdown-image", $msd_countdown_bd_image);

update_option("MSD_COUNTDOWN", $countdown_id);

//echo "<pre>";var_dump(get_post($countdown_id)); die();

 