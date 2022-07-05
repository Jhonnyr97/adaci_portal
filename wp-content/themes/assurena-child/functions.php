<?php
	
function stl_child_scripts() {
	wp_enqueue_style( 'stl-parent-style', get_template_directory_uri(). '/style.css' );

}
add_action( 'wp_enqueue_scripts', 'stl_child_scripts' );

/**
 * Your code here.
 *
 */

 if ( ! defined( 'ADACI_C_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( 'ADACI_C_VERSION', '1.1.8' );
}

/**
 *  Custom Login Form define 
 */
 define('CustomLogin', true);

require get_stylesheet_directory() . '/inc/woo-commerce/registration-form.php';
require get_stylesheet_directory() . '/inc/woo-commerce/ajax.php';
/*if($_SERVER['REMOTE_ADDR'] == '14.102.161.106'){*/

	require get_stylesheet_directory() . '/inc/woo-commerce/woo_custom_hooks.php';
	require get_stylesheet_directory() . '/inc/woo-commerce/resgistration-multi-from.php';

/*}*/


function custom_scripts() {
	// Custom JS
	wp_enqueue_script( 'custom-js', get_stylesheet_directory_uri() . '/js/custom.js', array(), ADACI_C_VERSION , true );
	
	// validation js
	if(is_page('registration') || is_page('multi-step-form') || is_page('checkout-2') || is_page('my-account')) {
		wp_enqueue_script( 'validator-js', get_stylesheet_directory_uri() . '/js/jquery.validate.min.js', array(), ADACI_C_VERSION , true );
		
	}

	//custom ajax
	wp_enqueue_script( 'ajax-js', get_stylesheet_directory_uri().'/js/custom-ajax.js', array(), ADACI_C_VERSION , false );
	wp_localize_script( 'ajax-js', 'custom_ajax', array( 'ajaxurl' => admin_url( 'admin-ajax.php' )));
	$url = get_site_url()."/my-account";
	wp_localize_script( 'ajax-js', 'my_account', array( 'link' => $url ));
}
add_action( 'wp_enqueue_scripts', 'custom_scripts' );


function getCountries(){
	global $wpdb;
      $query = "SELECT * FROM adaci_countries";
      $result = $wpdb->get_results( $query );
      return $result;
}


function get_state_by_country(){
	global $wpdb;
	$response = array('success' => true);
	$country_id = $_POST['country_id'];
	$query = "SELECT * FROM adaci_states WHERE country_id='$country_id'";
	// print_r($query);
	$allStates = $wpdb->get_results( $query );
	// print_r($allStates);
	// die;
	ob_start();
	foreach($allStates as $states){ ?>
		<option value="<?php echo $states->name; ?>"><?php echo $states->name; ?></option>
	 <?php } 
	$html = ob_get_clean();
	$response['html'] = $html;
	wp_send_json($response);
	die();
}
add_action('wp_ajax_get_state_by_country', 'get_state_by_country');
add_action('wp_ajax_nopriv_get_state_by_country', 'get_state_by_country');

function cc_mime_types( $mimes ){
  $mimes['svg'] = 'image/svg+xml';
  return $mimes;
}
add_filter( 'upload_mimes', 'cc_mime_types' );



// add_action( 'woocommerce_before_order_notes', 'my_custom_checkout_field' );
function my_custom_checkout_field( $checkout ) {

	woocommerce_form_field( 'title', array(
        'type'          => 'select',
	'required' 	=> 'true',
        'class'         => array('title-class form-row-wide'),
        'label'         => __('Title'),
	'options'  	=> array( // options for <select> or <input type="radio" />
	 ''    		=> 'Title', // empty values means that field is not selected
			'Avv.'	=> 'Avv.', // 'value'=>'Name'
			            'Dott.'	=> 'Dott.',
			             'Geom.'	=> 'Geom.',
			              'Ing.'	=> 'Ing.',
			             'Prof.ssa'	=> 'Prof.ssa',
			             'Ing.'	=> 'Ing.',
			             'Sig.ra'	=> 'Sig.ra'
		)
        ), $checkout->get_value( 'title' ));

	woocommerce_form_field( 'surname', array(
        'type'          => 'text',
	'required' 	=> 'true',
        'class'         => array('surname-class form-row-wide'),
        'label'         => __('Surname*'),
        ), $checkout->get_value( 'surname' ));
	

    woocommerce_form_field( 'date_of_birth', array(
        'type'          => 'date',
				'required' 	=> 'true',
        'class'         => array('dob-class form-row-wide'),
        'label'         => __('Date of Birth'),
        'placeholder'   => __(''),
        ), $checkout->get_value( 'date_of_birth' ));


		woocommerce_form_field( 'place_of_birth', array(
	        'type'          => 'text',
		'required' 	=> 'true',
	        'class'         => array('place_of_birth form-row-wide'),
	        'label'         => __('Place of Birth'),
	        ), $checkout->get_value( 'place_of_birth' ));

		
	woocommerce_form_field( 'country_of_birth', array(
        'type'          => 'select',
			'required'    	=> 'true',
        'class'         => array('country_of_birth-class form-row-wide'),
        'label'         => __('Country of Birth'),
		'options'     => array(
        'Y' => __('YES'),
        'N' => __('NO')
        )), $checkout->get_value( 'country_of_birth' ));


	woocommerce_form_field( 'province_of_birth', array(
        'type'          => 'select',
	'required' 	=> 'true',
        'class'         => array('province_of_birth-class form-row-wide'),
        'label'         => __('Province of Birth'),
	'options'  	=> array( // options for <select> or <input type="radio" />
	 ''    		=> 'Please select', // empty values means that field is not selected
			'ingen_kontakt_person'	=> 'No contact person', // 'value'=>'Name'
			            'Regine'	=> 'Employee 1',
			             'mei_mei'	=> 'Employee 2'
		)
        ), $checkout->get_value( 'province_of_birth' ));
	woocommerce_form_field( 'gender', array(
'type' => 'radio',
'class' => array( 'gender_class', 'update_totals_on_change' ),
	'required' 	=> 'true',
'label' => __('Sex'),
'options' => array(
'Male' => 'Male',
'Female' => 'Female',
'Other' => 'Other',
),
), $checkout->get_value( 'gender' ) );

	woocommerce_form_field( 'tax_code', array(
        'type'          => 'text',
				'required' 	=> 'true',
        'class'         => array('tax-code-class form-row-wide'),
        'label'         => __('Tax Code'),
        ), $checkout->get_value( 'tax_code' ));

	woocommerce_form_field( 'address_of_residence_1', array(
        'type'          => 'text',
				'required' 	=> 'true',
        'class'         => array('tax-code-class form-row-wide'),
        'label'         => __('Residence Address Line 1'),
        ), $checkout->get_value( 'address_of_residence_1' ));

		woocommerce_form_field( 'address_of_residence_2', array(
        'type'          => 'text',
				'required' 	=> 'true',
        'class'         => array('tax-code-class form-row-wide'),
        'label'         => __('Residence Address Line 2'),
        ), $checkout->get_value( 'address_of_residence_2' ));

				woocommerce_form_field( 'postcode_of_residence', array(
        'type'          => 'text',
				'required' 	=> 'true',
        'class'         => array('tax-code-class form-row-wide'),
        'label'         => __('Postcode of Residence'),
        ), $checkout->get_value( 'postcode_of_residence' ));

				woocommerce_form_field( 'municipality_of_residence', array(
        'type'          => 'text',
				'required' 	=> 'true',
        'class'         => array('tax-code-class form-row-wide'),
        'label'         => __('Municipality of Residence'),
        ), $checkout->get_value( 'municipality_of_residence' ));

		woocommerce_form_field( 'country_residence', array(
        'type'          => 'select',
	'required' 	=> 'true',
        'class'         => array('province_of_birth-class form-row-wide'),
        'label'         => __('Country of Residence'),
	'options'  	=> array( // options for <select> or <input type="radio" />
	 ''    		=> 'Please select', // empty values means that field is not selected
			'ingen_kontakt_person'	=> 'No contact person', // 'value'=>'Name'
			            'Regine'	=> 'Employee 1',
			             'mei_mei'	=> 'Employee 2'
		)
        ), $checkout->get_value( 'country_residence' ));


		woocommerce_form_field( 'province_of_birth', array(
        'type'          => 'select',
	'required' 	=> 'true',
        'class'         => array('province_of_birth-class form-row-wide'),
        'label'         => __('Province of Birth'),
	'options'  	=> array( // options for <select> or <input type="radio" />
	 ''    		=> 'Select Province', // empty values means that field is not selected
			'ingen_kontakt_person'	=> 'No contact person', // 'value'=>'Name'
			            'Regine'	=> 'Employee 1',
			             'mei_mei'	=> 'Employee 2'
		)
        ), $checkout->get_value( 'province_of_birth' ));

		woocommerce_form_field( 'region_residence', array(
        'type'          => 'text',
				'required' 	=> 'true',
        'class'         => array('tax-code-class form-row-wide'),
        'label'         => __('Region of Residence'),
        ), $checkout->get_value( 'region_residence' ));
}

// add_action( 'woocommerce_admin_order_data_after_billing_address', 'my_custom_checkout_field_display_admin_order_meta', 10, 1 );
function my_custom_checkout_field_display_admin_order_meta($order){
    	echo '<p><strong>'.__('Over 18').':</strong> ' . get_post_meta( $order->id, 'Over 18', true ) . '</p>';
	echo '<p><strong>'.__('Foreningen').':</strong> ' . get_post_meta( $order->id, 'Foreningen', true ) . '</p>';
	echo '<p><strong>'.__('Antall personer').':</strong> ' . get_post_meta( $order->id, 'Antall personer', true ) . '</p>';
}


	add_filter ( 'woocommerce_account_menu_items', 'customized_woocommerce_account_menu_items' );


function customized_woocommerce_account_menu_items( $menu_links ){
	
	// $menu_links['TAB ID HERE'] = 'NEW TAB NAME HERE';
	$menu_links['dashboard'] = 'Account Dashboard';
	$menu_links['edit-account'] = 'Account Information';


	

	return $menu_links;
}


// add_filter( 'woocommerce_get_endpoint_url', 'woocommerce_get_custom_endpoint_url', 10, 4 );
function woocommerce_get_custom_endpoint_url( $url, $endpoint, $value, $permalink ){
 
	if( $endpoint === 'personal-data' ) {
		$url = site_url().'my-account/personal-data';
	}
	return $url;
 
}

/**
 * Custom Login OTP Generator
 */

function adaci_login_otp_generator(){

	  $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
	  $charactersLength = strlen($characters);
	  $randomString = '';
	  for ($i = 0; $i < 8; $i++) {
	      $randomString .= $characters[rand(0, $charactersLength - 1)];
	  }
	  return $randomString;
}


/**
 *  Set url for send 
 */ 
function get_user_activation_url($user_id){
	
	 $resend_timestamp = get_user_meta( $user_id, 'alg_wc_ev_activation_email_sent', true );
		$nonce_required   = true;
		$url_params       = array( 'alg_wc_ev_user_id' => $user_id );
		if ( $nonce_required ) {
			$url_params['alg_wc_ev_nonce'] = wp_create_nonce( "resend-{$user_id}-{$resend_timestamp}" );
		}
		$data = add_query_arg( $url_params, get_option( 'alg_wc_ev_resend_verification_url', '' ) );

		return $data;
		
}
