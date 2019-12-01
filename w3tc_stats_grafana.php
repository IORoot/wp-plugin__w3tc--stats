<?php

/*
Plugin Name: _ANDYP - W3 Total Cache - Stats to Grafana
Plugin URI: http://londonparkour.com
Description: Uses the filters on W3TC to output the stats for grafana.
Version: 1.0
Author: Andy Pearson
Author URI: http://londonparkour.com
*/

/*                                                                              
*   ┌─────────────────────────────────────────────────────────────────────────┐ 
*   │                                                                         │░
*   │          &triggerstats on the URL line will run this function.          │░
*   │                                                                         │░
*   │ It will get the contents of the 'w3tc_stats_history' MySQL field in the │░
*   │               options table and (over)write the log file.               │░
*   │                                                                         │░
*   │                     This file is run from crontab.                      │░
*   │                                                                         │░
*   └─────────────────────────────────────────────────────────────────────────┘░
*    ░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░
*/

if (array_key_exists('triggerstats', $_GET)){

    $filename = plugin_dir_path( __FILE__ ) . '/w3tc_stats.log';
    $output = '';

    // get array of entries.
    $data = json_decode(get_site_option( 'w3tc_stats_history'));

    // Iterate over every entry of the array
    foreach ($data as $entry) {
        $output .= $entry."\n";
    }

    // output to the file.
    file_put_contents($filename, $output);
}