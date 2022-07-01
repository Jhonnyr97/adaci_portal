<?php 
global $current_user;
$user = wp_get_current_user();
print_r()

global $wpdb;

$results = $wpdb->get_results("SELECT * FROM  'adaci_working_position_user' WHERE user_id = 29 ");

echo "suraj";

/*
$company = $wpdb->get_results("SELECT * FROM adaci_company_data WHERE ID = ".$company_id." "); */

/*print_r($results);*/


?>

