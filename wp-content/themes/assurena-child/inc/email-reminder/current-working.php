<?php 

/**
 * Register a custom menu page for working postion send mail.
 */
function adaci_email_reminder_working_postion(){
    add_menu_page(__( 'Email Reminder', 'textdomain' ),'Email Reminder','manage_options','email-reminder','adaci_email_reminder_menu_page','dashicons-email',6 ); 
}
add_action( 'admin_menu', 'adaci_email_reminder_working_postion' );
 
/**
 * Display a custom menu page
 */
function adaci_email_reminder_menu_page(){
    esc_html_e( 'Admin Page Test', 'textdomain' );  
}





function adaci_check_mail_send($userID,$companyTable,$mailBetweenDay,$emailReminderSend){

	$theUser = get_user_by( 'id', $userID );
	$email = $theUser->data->user_email;
	$joinDate = get_user_meta($userID, 'from_the_date', true);
	$changeDate = date("d-m-Y", strtotime($joinDate));

	$companyID = get_user_meta($userID,'select_company',true);
	global $wpdb; 
	$result = $wpdb->get_results( "SELECT * FROM $companyTable where ID = ".$companyID." ");
	
	$display_name = ($theUser->data->display_name) ? $theUser->data->display_name : get_user_meta($userID,'first_name',true)." ".get_user_meta($userID,'first_name',true);

	$to = $email;
    $subject = 'Current Working Postion';
    $message = '<p>Hi ,'.$display_name.'</p>
	<p>You working on <strong>'.$result[0]->business_name.'</strong> Company last 1 year so kindly update your current working position if needed.</p>';

    $result = wp_mail( $to, $subject, $message );      
    if($result){
    	
    	$nextEmailDate = (get_user_meta($userID, 'next_email_date', true)) ? date('d-m-Y', strtotime(get_user_meta($userID, 'next_email_date', true). ' + '.$mailBetweenDay.'days')) : date('d-m-Y', strtotime(date('d-m-Y'). ' + '.$mailBetweenDay.'days'));

    	update_user_meta($userID,'next_email_date',$nextEmailDate);
    	$sendMail = get_user_meta($userID,$emailReminderSend,true);
    	$sendMail = (empty($sendMail)) ? 1 : $sendMail + 1;
    	update_user_meta($userID,$emailReminderSend,$sendMail);
        
    }else{
        echo "error log insert";
    }
}



// See http://codex.wordpress.org/Plugin_API/Filter_Reference/cron_schedules
add_filter( 'cron_schedules', 'adaci_every_twenty_four_hours' );
function adaci_every_twenty_four_hours( $schedules ) {
    $schedules['every_twenty_four_hours_working_position'] = array(
            'interval'  => 86400,
            'display'   => __( 'Every 24 Hours Working Position', 'textdomain' )
    );
    return $schedules;
}

// Schedule an action if it's not already scheduled
if ( ! wp_next_scheduled( 'adaci_every_twenty_four_hours' ) ) {
    wp_schedule_event( time(), 'every_twenty_four_hours_working_position', 'adaci_every_twenty_four_hours' );
}

// Hook into that action that'll fire every 24 hours
add_action( 'adaci_every_twenty_four_hours', 'every_twenty_four_event_working_position_function' );
function every_twenty_four_event_working_position_function() {

	
		$mailBetweenDay = 2;
		$companyTable = "adaci_company_data";
		$userID = 32;
		$sendMailTotal = 3;
		
			
			$last_date = get_user_meta($userID, 'to_the_date',true);
			$emailReminderSend = "email_reminder_send";
			if($last_date == "current"){
				if(get_user_meta($userID, 'next_email_date', true) == date('d-m-Y') && get_user_meta($userID, $emailReminderSend, true) <= $sendMailTotal){

					adaci_check_mail_send($userID,$companyTable,$mailBetweenDay,$emailReminderSend);	

				}elseif(get_user_meta($userID, 'email_reminder_send', true) == null){
					
					adaci_check_mail_send($userID,$companyTable,$mailBetweenDay,$emailReminderSend);

				}
			}
	
	
    
}