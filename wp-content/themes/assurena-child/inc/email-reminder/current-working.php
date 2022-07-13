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
function adaci_email_reminder_menu_page(){  ?>
	<div class="notice notice-success is-dismissible" style="display: none;"> 
		<p><strong>Settings saved.</strong></p>
		<button type="button" class="notice-dismiss">
			<span class="screen-reader-text">Dismiss this notice.</span>
		</button>
	</div>
	<h1 class="wp-heading-inline">Email Notification For Working Position</h1>

    <form action="<?php echo admin_url('admin.php?page=email-reminder'); ?>" method="post" name="email_reminder_form" id="email_reminder_form">
        <table class="form-table">
        	 <tr class="form-field form-required">
                <th scope="row"><label for="email_send"><?php _e('Email Send'); ?></label></th>
                <td><input name="email_send" type="radio" id="email_send" value="before" aria-required="true" <?php echo (get_option('email_send') == 'before') ? "checked" : ""; ?> /><label for="before"><?php _e('Before'); ?></label>&nbsp;
                	<input name="email_send" type="radio" id="email_send" value="after" aria-required="true" <?php echo (get_option('email_send') == 'after') ? "checked" : ""; ?> /><label for="before"><?php _e('After'); ?></label></td>
            </tr>
            <tr class="form-field">
                <th scope="row"><label for="send_mail_days"><?php _e('Select Day Before or After '); ?></label></th>
                <td><select name="send_mail_days" id="send_mail_days">
                    <?php


                    for ($i=1; $i <=30 ; $i++) { 
                    	if ( $i == get_option('send_mail_days')) // preselect specified role
                            $p = "\n\t<option selected='selected' value='" . esc_attr($i) . "'>$i</option>";
                        else
                            $r .= "\n\t<option value='" . esc_attr($i) . "'>$i</option>";
                    }
                    echo $p . $r;
                    ?>
                    </select>
                </td>
            </tr>
            <tr class="form-field form-required">
                <th scope="row"><label for="email_subject"><?php _e('Email Subject'); ?></label></th>
                <td><input name="email_subject" type="text" id="email_subject" value="<?php echo get_option('email_subject'); ?>" aria-required="true" style="width: 35%;"/></td>
            </tr>
            <tr class="form-field form-required">
                <th scope="row"><label for="email_short_content"><?php _e('Email Short Content'); ?></label></th>
                <td><textarea name="email_short_content" type="text" id="email_short_content" cols="5" rows="8" style="width: 35%;"> <?php echo get_option('email_short_content'); ?> </textarea>  </td>
            </tr>
        </table>
        <?php submit_button( __( 'Save '), 'primary', 'emailremindersave' ); ?>
    </form> <?php 

    if(isset($_POST['emailremindersave'])){ 

    	update_option( 'email_send', $_POST['email_send'] );
    	update_option( 'send_mail_days', $_POST['send_mail_days'] );
    	update_option( 'email_subject', $_POST['email_subject'] );
    	update_option( 'email_short_content', $_POST['email_short_content'] );
    	update_option( 'email_reminder_message', 1);
    	wp_safe_redirect(admin_url('admin.php?page=email-reminder&message-email=success'));
    	
    }
    	

    

}
if($_REQUEST['message-email'] == "success" && get_option('email_reminder_message') == 1){
	update_option( 'email_reminder_message', 0);
	add_action( 'admin_notices', 'sample_admin_notice__success' );
}

function sample_admin_notice__success() {
    ?>
    <div class="notice notice-success is-dismissible">
        <p><strong><?php _e( 'Settings Successfully Saved.', 'sample-text-domain' ); ?></strong></p>
    </div>
    <?php
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
    $subject = get_option('email_subject');
    $message = '<p>Hi ,'.$display_name.'</p>
	<p>You working on <strong>'.$result[0]->business_name.'</strong> Company last 1 year so kindly update your current working position if needed.</p>'
	.get_option('email_short_content');


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