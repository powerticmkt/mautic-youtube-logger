<?php
/*
* Plugin Name: Mautic Youtube Logger
* Description: Register Youtube plays on Mautic Timeline
* Version: 1.0.0
* Author: Powertic
* Author URI: https://powertic.com
*/

function mautic_youtube( $atts ) {

	// Attributes
	$atts = shortcode_atts(
		array(
			'videoId' => 'NpEaa2P7qZI',
			'mauticUrl' => 'https://mautic.org',
			'height' => '500',
		),
		$atts,
		'mautic_youtube'
	);

	$res = include 'iframe.php';

	return $res;

}
add_shortcode( 'mautic_youtube', 'mautic_youtube' );
