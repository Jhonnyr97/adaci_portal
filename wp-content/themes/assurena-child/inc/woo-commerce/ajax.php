<?php
 

/**
 *  Get Company on dropdoean base on enter ser words
 **/

add_action("wp_ajax_adaci_company_data_get", "adaci_company_data_get");
add_action("wp_ajax_nopriv_adaci_company_data_get", "adaci_company_data_get");

function adaci_company_data_get() {
    $response = array();
    $response['status'] = 'false';
	$agency = '%'.$_POST['agency'].'%';
	
	$table_name = 'adaci_company_data';
	global $wpdb; 
	$results = $wpdb->get_results( "SELECT * FROM $table_name where business_name LIKE  '".$agency."' ");
    if(!empty($results)){

    	$response['compnay'][] = '<option value="" > Select Compnay </option>';
    	$response['address'][] = '<option value="" > Select Address </option>';
    	foreach ($results as $result) {
    		
    		$response['compnay'][] = '<option value='.$result->ID.' data-id='.$result->ID.'> '.$result->business_name.' </option>';
    		$response['address'][] = '<option value='.$result->ID.' data-id='.$result->ID.'> '.$result->address.' </option>';
    	}
        $response['status'] = 'true';
    }
    	

	 echo wp_json_encode($response);
	 die();
}
add_action("wp_ajax_adaci_company_address_data_get", "adaci_company_address_data_get");
add_action("wp_ajax_nopriv_adaci_company_address_data_get", "adaci_company_address_data_get");

function adaci_company_address_data_get() {
	$business_name_id = $_POST['business_name'];
	
	$table_name = 'adaci_company_data';
	global $wpdb; 
	$results = $wpdb->get_results( "SELECT * FROM $table_name where ID  = ".$business_name_id." ");

	$response = array();
	/*$response['compnay'][] = '<option value="" > Select Compnay </option>';*/
	$response['address'][] = '<option value="" > Select Address </option>';
	foreach ($results as $result) {
		
		/*$response['compnay'][] = '<option value='.$result->ID.' data-id='.$result->ID.'> '.$result->business_name.' </option>';*/
		$response['address'][] = '<option value='.$result->ID.' data-id='.$result->ID.'> '.$result->address.' </option>';
	}

	 echo wp_json_encode($response);
	 die();
}



add_action("wp_ajax_adaci_company_data_insert", "adaci_company_data_insert");
add_action("wp_ajax_nopriv_adaci_company_data_insert", "adaci_company_data_insert");

function adaci_company_data_insert() {
  
	$business_name = $_POST['business_name'];
	$fiscal_code = $_POST['fiscal_code'];
	$vat_number = $_POST['vat_number'];
	$number_of_employees = $_POST['number_of_employees'];
	$commodity_area = $_POST['commodity_area'];
	$turnover_class = $_POST['turnover_class'];
	$company_purchased_value = $_POST['company_purchased_value'];
	$note = $_POST['note'];
	$address = $_POST['address'];
	$postal_code = $_POST['postal_code'];
	$common = $_POST['common'];
	$province = $_POST['province'];
	$region = $_POST['region'];
	$country = $_POST['country'];
	$generic_business_phone = $_POST['generic_business_phone'];
	$generic_business_fax = $_POST['generic_business_fax'];
	$generic_business_email = $_POST['generic_business_email'];

	global $wpdb; 
     
  $table_name = 'adaci_company_data';     
  $result = $wpdb->insert($table_name, array('business_name' => $business_name, 'fiscal_code' => $fiscal_code, 'vat_number' => $vat_number, 'number_of_employees' => $number_of_employees,'commodity_area' => $commodity_area, 'turnover_class' => $turnover_class,'company_purchased_value' => $company_purchased_value, 'note' => $note, 'address' => $address,'postal_code' => $postal_code, 'common' => $common,'province' => $province,'region' => $region, 'country' => $country, 'gen_business_phone' => $generic_business_phone,'gen_business_fax' => $generic_business_fax, 'gen_business_email' => $generic_business_email)); 



  if($result){
  	$response['status'] = 'success';
  }else{
  	$response['status'] = 'fail';
  }
  echo wp_json_encode($response);

  die();
}




add_action("wp_ajax_save_account_personal_details", "save_account_personal_details");
add_action("wp_ajax_nopriv_save_account_personal_details", "save_account_personal_details");



function save_account_personal_details(){
	$formdata = $_POST['formdata'];
    parse_str($formdata, $_POST);
        
    $customer_id = $_POST['user_id'];
    if (isset($_POST['title'])) {
       update_user_meta($customer_id, 'title', sanitize_text_field($_POST['title']));
   }

   if (isset($_POST['billing_first_name'])) {
      update_user_meta($customer_id, 'billing_first_name', sanitize_text_field($_POST['billing_first_name']));
      update_user_meta($customer_id, 'first_name', sanitize_text_field($_POST['billing_first_name']));
   }

   if (isset($_POST['middle_name'])) {
       update_user_meta($customer_id, 'middle_name', sanitize_text_field($_POST['middle_name']));
   }

   if (isset($_POST['billing_last_name'])) {
      update_user_meta($customer_id, 'billing_last_name', sanitize_text_field($_POST['billing_last_name']));
      update_user_meta($customer_id, 'last_name', sanitize_text_field($_POST['billing_last_name']));
   }

   if (isset($_POST['date_of_birth'])) {
       update_user_meta($customer_id, 'date_of_birth', sanitize_text_field($_POST['date_of_birth']));
   }

   if (isset($_POST['place_of_birth'])) {
       update_user_meta($customer_id, 'place_of_birth', sanitize_text_field($_POST['place_of_birth']));
   }

   if (isset($_POST['country_of_birth'])) {
       update_user_meta($customer_id, 'country_of_birth', sanitize_text_field($_POST['country_of_birth']));
   }

   if (isset($_POST['province_of_birth'])) {
       update_user_meta($customer_id, 'province_of_birth', sanitize_text_field($_POST['province_of_birth']));
   }

   if (isset($_POST['gender'])) {
       update_user_meta($customer_id, 'gender', sanitize_text_field($_POST['gender']));
   }

   if (isset($_POST['tax_code'])) {
       update_user_meta($customer_id, 'tax_code', sanitize_text_field($_POST['tax_code']));
   }

   if (isset($_POST['billing_address_1'])) {
       update_user_meta($customer_id, 'billing_address_1', sanitize_text_field($_POST['billing_address_1']));
   }

   if (isset($_POST['billing_address_2'])) {
       update_user_meta($customer_id, 'billing_address_2', sanitize_text_field($_POST['billing_address_2']));
   }

   if (isset($_POST['billing_postcode'])) {
       update_user_meta($customer_id, 'billing_postcode', sanitize_text_field($_POST['billing_postcode']));
   }

   if (isset($_POST['billing_city'])) {
       update_user_meta($customer_id, 'billing_city', sanitize_text_field($_POST['billing_city']));
   }

   if (isset($_POST['billing_country'])) {
       update_user_meta($customer_id, 'billing_country', sanitize_text_field($_POST['billing_country']));
   }

   if (isset($_POST['billing_state'])) {
       update_user_meta($customer_id, 'billing_state', sanitize_text_field($_POST['billing_state']));
   }

   if (isset($_POST['region_residence'])) {
       update_user_meta($customer_id, 'region_residence', sanitize_text_field($_POST['region_residence']));
   }

   if (isset($_POST['company_data'])) {
       update_user_meta($customer_id, 'company_data', sanitize_text_field($_POST['company_data']));
   }

   if (isset($_POST['summary'])) {
       update_user_meta($customer_id, 'summary', sanitize_text_field($_POST['summary']));
   }

   if (isset($_POST['cv'])) {
       update_user_meta($customer_id, 'cv', sanitize_text_field($_POST['cv']));
   }

   if (isset($_POST['photo'])) {
       update_user_meta($customer_id, 'photo', sanitize_text_field($_POST['photo']));
   }

   if (isset($_POST['languages'])) {
       update_user_meta($customer_id, 'languages', sanitize_text_field($_POST['languages']));
   }

   if (isset($_POST['educational_qualification'])) {
       update_user_meta($customer_id, 'educational_qualification', sanitize_text_field($_POST['educational_qualification']));
   }

   if (isset($_POST['study_address'])) {
       update_user_meta($customer_id, 'study_address', sanitize_text_field($_POST['study_address']));
   }

   if (isset($_POST['job_position'])) {
       update_user_meta($customer_id, 'job_position', sanitize_text_field($_POST['job_position']));
   }

   if (isset($_POST['linkedin_url'])) {
       update_user_meta($customer_id, 'linkedin_url', sanitize_text_field($_POST['linkedin_url']));
   }

   if (isset($_POST['preferred_correspondence_address_1'])) {
       update_user_meta($customer_id, 'preferred_correspondence_address_1', sanitize_text_field($_POST['preferred_correspondence_address_1']));
   }

   if (isset($_POST['preferred_correspondence_address_2'])) {
       update_user_meta($customer_id, 'preferred_correspondence_address_2', sanitize_text_field($_POST['preferred_correspondence_address_2']));
   }

   if (isset($_POST['agency'])) {
       update_user_meta($customer_id, 'agency', sanitize_text_field($_POST['agency']));
   }

   if (isset($_POST['select_company'])) {
       update_user_meta($customer_id, 'select_company', sanitize_text_field($_POST['select_company']));
   }

   if (isset($_POST['select_address'])) {
       update_user_meta($customer_id, 'select_address', sanitize_text_field($_POST['select_address']));
   }

   if (isset($_POST['business_name'])) {
       update_user_meta($customer_id, 'business_name', sanitize_text_field($_POST['business_name']));
   }

   if (isset($_POST['fiscal_code'])) {
       update_user_meta($customer_id, 'fiscal_code', sanitize_text_field($_POST['fiscal_code']));
   }

   if (isset($_POST['vat_number'])) {
       update_user_meta($customer_id, 'vat_number', sanitize_text_field($_POST['vat_number']));
   }

   if (isset($_POST['number_of_employees'])) {
       update_user_meta($customer_id, 'number_of_employees', sanitize_text_field($_POST['number_of_employees']));
   }

   if (isset($_POST['commodity_area'])) {
       update_user_meta($customer_id, 'commodity_area', sanitize_text_field($_POST['commodity_area']));
   }
   
   if (isset($_POST['turnover_class'])) {
       update_user_meta($customer_id, 'turnover_class', sanitize_text_field($_POST['turnover_class']));
   }
   if (isset($_POST['address'])) {
       update_user_meta($customer_id, 'address', sanitize_text_field($_POST['address']));
   }
   if (isset($_POST['postal_code'])) {
       update_user_meta($customer_id, 'postal_code', sanitize_text_field($_POST['postal_code']));
   }
   if (isset($_POST['common'])) {
       update_user_meta($customer_id, 'common', sanitize_text_field($_POST['common']));
   }
   if (isset($_POST['province'])) {
       update_user_meta($customer_id, 'province', sanitize_text_field($_POST['province']));
   }
   if (isset($_POST['region'])) {
       update_user_meta($customer_id, 'region', sanitize_text_field($_POST['region']));
   }
   if (isset($_POST['country'])) {
       update_user_meta($customer_id, 'country', sanitize_text_field($_POST['country']));
   }
   if (isset($_POST['generic_business_phone'])) {
       update_user_meta($customer_id, 'generic_business_phone', sanitize_text_field($_POST['generic_business_phone']));
   }
   if (isset($_POST['generic_business_fax'])) {
       update_user_meta($customer_id, 'generic_business_fax', sanitize_text_field($_POST['generic_business_fax']));
   }   
   if (isset($_POST['generic_business_email'])) {
       update_user_meta($customer_id, 'generic_business_email', sanitize_text_field($_POST['generic_business_email']));
   }   
   if (isset($_POST['note'])) {
       update_user_meta($customer_id, 'note', sanitize_text_field($_POST['note']));
   }  
   if (isset($_POST['landline_business_phone'])) {
       update_user_meta($customer_id, 'landline_business_phone', sanitize_text_field($_POST['landline_business_phone']));
   }        
   if (isset($_POST['business_mobile'])) {
       update_user_meta($customer_id, 'business_mobile', sanitize_text_field($_POST['business_mobile']));
   } 
   if (isset($_POST['professional_qualification'])) {
       update_user_meta($customer_id, 'professional_qualification', sanitize_text_field($_POST['professional_qualification']));
   } 
   if (isset($_POST['business_mobile'])) {
       update_user_meta($customer_id, 'business_mobile', sanitize_text_field($_POST['business_mobile']));
   } 
   if (isset($_POST['professional_qualification'])) {
       update_user_meta($customer_id, 'professional_qualification', sanitize_text_field($_POST['professional_qualification']));
   }   
   if (isset($_POST['company_function'])) {
       update_user_meta($customer_id, 'company_function', sanitize_text_field($_POST['company_function']));
   }  
   if(isset($_POST['supplies-purchased'])){
        update_user_meta($customer_id, 'supplies-purchased', sanitize_text_field($_POST['supplies-purchased']));
   } 
   if (isset($_POST['personal_purchased_value'])) {
       update_user_meta($customer_id, 'personal_purchased_value', sanitize_text_field($_POST['personal_purchased_value']));
   }    
   if (isset($_POST['from_the_date'])) {
       update_user_meta($customer_id, 'from_the_date', sanitize_text_field($_POST['from_the_date']));
   }
   if (isset($_POST['to_the_date'])) {
       update_user_meta($customer_id, 'to_the_date', sanitize_text_field($_POST['to_the_date']));
   }
   if (isset($_POST['private_email'])) {
       update_user_meta($customer_id, 'private_email', sanitize_text_field($_POST['private_email']));
   }
   if (isset($_POST['private_tel'])) {
       update_user_meta($customer_id, 'private_tel', sanitize_text_field($_POST['private_tel']));
   }
   if (isset($_POST['billing_phone'])) {
       update_user_meta($customer_id, 'billing_phone', sanitize_text_field($_POST['billing_phone']));
   }
   $response = array("status" => "true");
   echo wp_json_encode($response);  
   die();
}

/**
 *  Insert Comapny with user id my account working postion 
 */ 

add_action("wp_ajax_adaci_user_working_postion_company", "adaci_user_working_postion_company");
add_action("wp_ajax_nopriv_adaci_user_working_postion_company", "adaci_user_working_postion_company");

function adaci_user_working_postion_company() {
  
    $formdata = $_POST['from_data'];
 
    /*print_r($formdata);*/

    parse_str($formdata, $_POST);



    /*parse_str($formdata, $_POST);*/
  /*   echo "<pre>";
    print_r($_POST);
    echo "</pre>";*/


    global $wpdb;
 
    $table_name = "adaci_working_position_user";
 
    $charset_collate = $wpdb->get_charset_collate();
 
    $sql = "CREATE TABLE IF NOT EXISTS $table_name (
      id bigint(20) NOT NULL AUTO_INCREMENT,
      user_id bigint(20) NOT NULL,
      select_company bigint(20) NULL,
      select_address bigint(20) NULL,
      landline_business_phone varchar(250) NULL,
      business_mobile varchar(250) NULL,
      professional_qualification varchar(250) NULL,
      company_function varchar(250) NULL,
      supplies_purchased varchar(500) NULL,
      personal_purchased_value varchar(250) NULL,
      from_the_date varchar(250) NULL,
      to_the_date varchar(250) NULL,
      PRIMARY KEY id (id)
    ) $charset_collate;";
 
    require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
    dbDelta($sql);
    $supplies = implode(', ', $_POST['supplies-purchased']);
    


    $user = wp_get_current_user();
    $result = $wpdb->insert($table_name, array('user_id' => $user->ID, 'select_company' => $_POST['select_company'], 'select_address' => $_POST['select_address'], 'landline_business_phone' => $_POST['landline_business_phone'], 'business_mobile' => $_POST['business_mobile'], 'professional_qualification' => $_POST['professional_qualification'], 'company_function' => $_POST['company_function'], 'supplies_purchased' => $supplies, 'personal_purchased_value' => $_POST['personal_purchased_value'], 'from_the_date' => $_POST['from_the_date'], 'to_the_date' => $_POST['to_the_date'])); 



  if($result){
    $response['status'] = 'success';
  }else{
    $response['status'] = 'fail';
  }
  echo wp_json_encode($response);

  die();
}


/**
 *  Insert Comapny with user id my account working postion 
 */ 

add_action("wp_ajax_adaci_user_working_postion_company_save", "adaci_user_working_postion_company_save");
add_action("wp_ajax_nopriv_adaci_user_working_postion_company_save", "adaci_user_working_postion_company_save");

function adaci_user_working_postion_company_save() {

    $formdata = $_POST['from_data'];
    parse_str($formdata, $_POST);

    global $wpdb;
    $user = wp_get_current_user();
    $comapny_data = array();

    for ($i=0; $i < count($_POST['company_id']); $i++) { 
         
        foreach($_POST as $key => $data){
            
            if(isset($data[$_POST['company_id'][$i]])){

                $comapny_data[$_POST['company_id'][$i]][$key] = $data[$_POST['company_id'][$i]];
            }
        }      
    } 
   
    $table_name = "adaci_working_position_user";
    foreach($comapny_data as $key => $comapny){
        if($key == "default"){
           
            $supplies = "";
            if(isset($comapny['supplies_purchased'])){
                $supplies = implode(',', $comapny['supplies_purchased']);
            }

            update_user_meta($user->ID,'landline_business_phone',$comapny['landline_business_phoned']);
            update_user_meta($user->ID,'business_mobile',$comapny['business_mobile']);
            update_user_meta($user->ID,'professional_qualification',$comapny['professional_qualification']);
            update_user_meta($user->ID,'company_function',$comapny['company_function']);
            update_user_meta($user->ID,'supplies-purchased',$supplies);
            update_user_meta($user->ID,'personal_purchased_value',$comapny['personal_purchased_value']);
            update_user_meta($user->ID,'from_the_date',$comapny['from_the_date']);
            update_user_meta($user->ID,'to_the_date',$comapny['to_the_date']);
      
        }else{
            $supplies = "";
            if(isset($comapny['supplies_purchased'])){
                $supplies = implode(',', $comapny['supplies_purchased']);
            }
        
            $result = $wpdb->update($table_name, array('landline_business_phoned' => $comapny['landline_business_phoned'], 'business_mobile' => $comapny['business_mobile'], 'professional_qualification' => $comapny['professional_qualification'], 'company_function' => $comapny['company_function'], 'supplies_purchased' => $supplies,'personal_purchased_value' => $comapny['personal_purchased_value'], 'from_the_date' => $comapny['from_the_date'], 'to_the_date' => $comapny['to_the_date']), array('id' => $key));
            print_r($result);
            echo "hello";
        }
    }

    $response['status'] = 'success';
    echo wp_json_encode($response);
     die();
}



/**
* Custom Login Ajax Function
*/


add_action("wp_ajax_adaci_custom_login_for_user", "adaci_custom_login_for_user");
add_action("wp_ajax_nopriv_adaci_custom_login_for_user", "adaci_custom_login_for_user");

function adaci_custom_login_for_user() {
    $response = array('status' => 201); 
    $formdata = $_POST['from_data'];
    parse_str($formdata, $_POST);

    
    if(!empty($_POST['username'])){
        
         $user = get_user_by( 'email', $_POST['username'] );
       
         if(get_user_meta($user->ID,'alg_wc_ev_is_activated', true) == 1){

            $OTP = adaci_login_otp_generator();
         
            $to = $_POST['username'];
            $subject = 'Adaci IT Website Login OTP';
            $message = 'Your OTP is '.$OTP.' for login Adaci IT Website';
            global $wpdb;
            $resultOTP = $wpdb->update($wpdb->users, array('OTP' => $OTP), array('ID' => $user->ID));
            if($resultOTP){

                $result = wp_mail( $to, $subject, $message );        
                if($result){
                    $otp_send = '<div class="assurena_module_message_box type_error closable wpb_animate_when_almost_visible wpb_right-to-left right-to-left wpb_start_animation animated" bis_skin_checked="1">
                            <div class="message_icon_wrap" role="alert" bis_skin_checked="1"><i class="message_icon "></i></div>
                            <div class="message_content" bis_skin_checked="1">
                                <div class="message_text" bis_skin_checked="1"> 
                                    <ul class="woocommerce-error" role="alert">
                                        <li>Check your Entered Email or Phone Number for OTP Verification.</li>
                                    </ul>
                                </div>
                            </div>
                            <span class="message_close_button"></span>
                        </div>';
                    $response = array('status' => 200, 'send' => $otp_send); 
                }else{
                    $otp_send = '<div class="assurena_module_message_box type_error closable wpb_animate_when_almost_visible wpb_right-to-left right-to-left wpb_start_animation animated" bis_skin_checked="1">
                            <div class="message_icon_wrap" role="alert" bis_skin_checked="1"><i class="message_icon "></i></div>
                            <div class="message_content" bis_skin_checked="1">
                                <div class="message_text" bis_skin_checked="1"> 
                                    <ul class="woocommerce-error" role="alert">
                                        <li>Please try again.</li>
                                    </ul>
                                </div>
                            </div>
                            <span class="message_close_button"></span>
                        </div>';
                    $response = array('status' => 201, 'notsend' => $otp_send);
                }

            }
         }else{
            
            $activate_html = '<div class="assurena_module_message_box type_error closable wpb_animate_when_almost_visible wpb_right-to-left right-to-left wpb_start_animation animated" bis_skin_checked="1">
                            <div class="message_icon_wrap" role="alert" bis_skin_checked="1"><i class="message_icon "></i></div>
                            <div class="message_content" bis_skin_checked="1">
                                <div class="message_text" bis_skin_checked="1"> 
                                    <ul class="woocommerce-error" role="alert">
                                                            <li>
                                                Your account has to be activated before you can login. You can resend the email with verification link by clicking <a href="'.get_user_activation_url($user->ID).'">here</a>.                 </li>
                                                    </ul>
                                </div>
                            </div>
                            <span class="message_close_button"></span>
                        </div>';
            /*alg_wc_ev_add_notice("hello");*/
            $response = array('status' => 401, 'activate_url' => $activate_html);
         }
                   
    }elseif(!empty($_POST['phone_number'])){

        $phone = trim($_POST['phone_number']);
        $users = get_users(array('meta_key' => 'business_mobile','meta_value' => '+1 (358) 197-5428','meta_compare' => '='));

        /*if($users){

            $OTP = adaci_login_otp_generator();
            $payload = { 
                  "message_type": "Adaci Login OTP", 
                  "message": $OTP,
                  "recipient": [
                      $phone
                  ],
                  "sender": "Adaci IT",
                  "returnCredits": true
              };
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, 'https://smspanel.aruba.it/API/v1.0/REST/sms');
            curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                'Content-type: application/json',
                'user_key: USER_KEY',
                // Use this when using session key authentication
                'Session_key: SESSION_KEY',
                // When using Access Token authentication, use this instead:
                // 'Access_token: UserParam{access_token}'
            ));

            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
            $response = curl_exec($ch);
            $info = curl_getinfo($ch);
            curl_close($ch);
            if ($info['http_code'] != 201) {
                echo('Error! http code: ' . $info['http_code'] . ', body message: ' . $response);
            }else {

                $obj = json_decode($response);
                print_r($obj);
            }
        }*/

    }else{

        $response = array('status' => 401);
    }        
    
   echo wp_json_encode($response);

    exit();
}


/**
* User OTP Verifictaion and login.
*/



add_action("wp_ajax_adaci_user_otp_verification", "adaci_user_otp_verification");
add_action("wp_ajax_nopriv_adaci_user_otp_verification", "adaci_user_otp_verification");

function adaci_user_otp_verification(){

    $formdata = $_POST['from_data'];
    parse_str($formdata, $_POST);
    $response = array('status' => 'fail'); 

    if($_POST['otp_verification']){
        
        $user = get_user_by( 'email', $_POST['user_authentication'] );
        global $wpdb;        
        $OTP = $wpdb->get_results("SELECT OTP FROM $wpdb->users WHERE ID = ".$user->ID." ");
        
        if(empty($OTP)){

            $emptyOTP = '<div class="assurena_module_message_box type_error closable wpb_animate_when_almost_visible wpb_right-to-left right-to-left wpb_start_animation animated" bis_skin_checked="1">
                            <div class="message_icon_wrap" role="alert" bis_skin_checked="1"><i class="message_icon "></i></div>
                            <div class="message_content" bis_skin_checked="1">
                                <div class="message_text" bis_skin_checked="1"> 
                                    <ul class="woocommerce-error" role="alert">
                                        <li>Please try again for login.</li>
                                    </ul>
                                </div>
                            </div>
                            <span class="message_close_button"></span>
                        </div>';
            $response = array('status' => 'fail', 'invalid' => $emptyOTP, 'again' => true);
            $response = "fail";

        }else{

            if($_POST['otp_verification'] == $OTP[0]->OTP){
                global $wpdb;          
                $resultOTP = $wpdb->update($wpdb->users, array('OTP' => ""), array('ID' => $user->ID));
                if($resultOTP){
                       // log in automatically 
                    if ( !is_user_logged_in() ) {
                       
                         $user_id = $user->ID;
                         $user = get_user_by( 'id', $user_id ); 
                         $user_id = $user->ID;
                         $user_login = $user->data->user_login;
                       
                         wp_set_current_user( $user_id, $user_login );                    
                         wp_set_auth_cookie( $user_id );                    
                         do_action( 'wp_login', $user_login, $user ); 
                         
                    }
                    $response = array('status' => 'success', 'redirect' => get_permalink( get_option('woocommerce_myaccount_page_id')));

                }else{
                    $emptyOTP = '<div class="assurena_module_message_box type_error closable wpb_animate_when_almost_visible wpb_right-to-left right-to-left wpb_start_animation animated" bis_skin_checked="1">
                                    <div class="message_icon_wrap" role="alert" bis_skin_checked="1"><i class="message_icon "></i></div>
                                    <div class="message_content" bis_skin_checked="1">
                                        <div class="message_text" bis_skin_checked="1"> 
                                            <ul class="woocommerce-error" role="alert">
                                                <li>Please try again for login.</li>
                                            </ul>
                                        </div>
                                    </div>
                                    <span class="message_close_button"></span>
                                </div>';
                    $response = array('status' => 'fail', 'invalid' => $emptyOTP);
                    $response = "fail";
                }             
            }else{  

                $emptyOTP = '<div class="assurena_module_message_box type_error closable wpb_animate_when_almost_visible wpb_right-to-left right-to-left wpb_start_animation animated" bis_skin_checked="1">
                                    <div class="message_icon_wrap" role="alert" bis_skin_checked="1"><i class="message_icon "></i></div>
                                    <div class="message_content" bis_skin_checked="1">
                                        <div class="message_text" bis_skin_checked="1"> 
                                            <ul class="woocommerce-error" role="alert">
                                                <li>Please Enter Valid OTP for Verification.</li>
                                            </ul>
                                        </div>
                                    </div>
                                    <span class="message_close_button"></span>
                                </div>';
                $response = array('status' => 'fail', 'invalid' => $emptyOTP);
            }
        }
    }else{
        $emptyOTP = '<div class="assurena_module_message_box type_error closable wpb_animate_when_almost_visible wpb_right-to-left right-to-left wpb_start_animation animated" bis_skin_checked="1">
                            <div class="message_icon_wrap" role="alert" bis_skin_checked="1"><i class="message_icon "></i></div>
                            <div class="message_content" bis_skin_checked="1">
                                <div class="message_text" bis_skin_checked="1"> 
                                    <ul class="woocommerce-error" role="alert">
                                        <li>Please Enter OTP for Verification.</li>
                                    </ul>
                                </div>
                            </div>
                            <span class="message_close_button"></span>
                        </div>';
        $response = array('status' => 'fail', 'invalid' => $emptyOTP);

        
    }
    echo wp_json_encode($response);
    die();
}


/**
 * Resnd OTP Custo Login
 */ 


add_action("wp_ajax_adaci_user_resend_otp", "adaci_user_resend_otp");
add_action("wp_ajax_nopriv_adaci_user_resend_otp", "adaci_user_resend_otp");

function adaci_user_resend_otp(){

     $formdata = $_POST['from_data'];
     parse_str($formdata, $_POST);
     $response = "";
     if($_POST['user_authentication']){
        $user = get_user_by( 'email', $_POST['user_authentication'] );
        global $wpdb; 
        $OTP = adaci_login_otp_generator();
         
         $to = $_POST['user_authentication'];
        $subject = 'Adaci IT Website Login OTP';
        $message = 'Your OTP is '.$OTP.' for login Adaci IT Website';
        global $wpdb;
        $resultOTP = $wpdb->update($wpdb->users, array('OTP' => $OTP), array('ID' => $user->ID));
        if($resultOTP){

            $result = wp_mail( $to, $subject, $message );        
            if($result){
                $response = "success"; 
            }else{
                $response = "fail132";
            }

        }

     }
     echo $response;
     die();
}