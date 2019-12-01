<?php

/*
Plugin Name: _ANDYP - W3 Total Cache - Stats to Grafana
Plugin URI: http://londonparkour.com
Description: Uses the filters on W3TC to output the stats for grafana.
Version: 1.0
Author: Andy Pearson
Author URI: http://londonparkour.com
*/


$metrics = json_decode( get_site_option( 'w3tc_stats_history'));

$file = plugin_dir_path( __FILE__ ) . '/w3tc_stats.log'; 
$open = fopen( $file, "a" ); 
$write = fputs( $open, $metrics ); 
fclose( $open );