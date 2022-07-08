<?php

// 1. Register new endpoint (URL) for My Account page
// Note: Re-save Permalinks or it will give 404 error
  
function bbloomer_add_premium_support_endpoint() {
    add_rewrite_endpoint( 'anagraficacliente', EP_ROOT | EP_PAGES );
    add_rewrite_endpoint( 'curriculum', EP_ROOT | EP_PAGES );
    add_rewrite_endpoint( 'newsletter', EP_ROOT | EP_PAGES );
}
  
add_action( 'init', 'bbloomer_add_premium_support_endpoint' );
  
// ------------------
// 2. Add new query var
  
function bbloomer_premium_support_query_vars( $vars ) {
    $vars[] = 'anagraficacliente';
    $vars[] = 'curriculum';
    $vars[] = 'newsletter';
    return $vars;
}
  
add_filter( 'query_vars', 'bbloomer_premium_support_query_vars', 0 );
  
// ------------------
// 3. Insert the new endpoint into the My Account menu
  
function bbloomer_add_premium_support_link_my_account( $items ) {
    $items['anagraficacliente'] = 'PERSONAL DATA';
    $items['curriculum'] = 'WORKING POSITION';
    $items['newsletter'] = 'Newsletter Manage';
    return $items;
}

add_filter( 'woocommerce_account_menu_items', 'bbloomer_add_premium_support_link_my_account' );
  
// ------------------
// 4. Add content to the new tab
  
function bbloomer_premium_support_content() {
   echo '<h3>PERSONAL DATA</h3><p>PERSONAL DATA</p>';
   //echo do_shortcode( ' /* your shortcode here */ ' );
   global $current_user;

   $all_meta_for_user = get_user_meta( $current_user->ID );
   $user = wp_get_current_user();
 /*  echo "<pre>";
  print_r( $all_meta_for_user ); echo "</pre>"; die();*/
   ?>
   	<form class="woocommerce-EditPersonalForm anagraficacliente" method="post" id="woocommerce-personal-form" action="#">
	    <div class="name cstm-row">
		   <p class="small">
		      <label for="title">Title*</label>
		      <select name="title" id="title" class="required-field">
		         <option value="<?php echo $all_meta_for_user['title'][0]; ?>"><?php echo $all_meta_for_user['title'][0]; ?></option> 
		         <option value="Avv." title="Avv.">Avv.</option>
		         <option value="Dott." title="Dott.">Dott.</option>
		         <option value="Dott.ssa" title="Dott.ssa">Dott.ssa</option>
		         <option value="Geom." title="Geom.">Geom.</option>
		         <option value="Ing." title="Ing.">Ing.</option>
		         <option value="Prof." title="Prof.">Prof.</option>
		         <option value="Prof.ssa" title="Prof.ssa">Prof.ssa</option>
		         <option value="Sig." title="Sig.">Sig.</option>
		         <option value="Sig.ra" title="Sig.ra">Sig.ra</option>
		      </select>
		    <input type="hidden" name="user_id" value="<?php echo $current_user->ID; ?>">
		   </p>
		   <p class="medium">
		      <label for="billing_first_name">First Name*</label>
		      <input type="text" id="billing_first_name" name="billing_first_name" class="required-field" value="<?php echo $all_meta_for_user['billing_first_name'][0]; ?>">
		   </p>
		   <p class="medium">
		      <label for="middle_name">Middle Name</label>
		      <input type="text" id="middle_name" name="middle_name" value="<?php echo $all_meta_for_user['middle_name'][0]; ?>">
		   </p>
		   <p class="medium">
		      <label for="billing_last_name">Surname*</label>
		      <input type="text" id="billing_last_name" name="billing_last_name" class="required-field" value="<?php echo $all_meta_for_user['billing_last_name'][0]; ?>">
		      
		   </p>
		</div>
		<div class="birth-detail cstm-row">
			<p>
	            <label for="reg_email">Preferential Email*</label>
	            <input type="email" id="reg_email" name="email" class="required-field" value="<?php echo $current_user->user_email; ?>">
	                  
	        </p>
	        <p>
	          <label for="place_of_birth">Place of Birth*</label>
	          <input type="text" name="place_of_birth" id="place_of_birth" class="required-field" value="<?php echo $all_meta_for_user['place_of_birth'][0]; ?>">
	          
	       </p>
	       <p>
	       <label for="date_of_birth">Date of Birth*</label>
	       <input type="date" id="date_of_birth" name="date_of_birth" class="required-field" value="<?php echo $all_meta_for_user['date_of_birth'][0]; ?>">
	       
	       </p>
	       
	       <?php $allCountries = getCountries(); ?>
	       <p>
	          <label for="country_of_birth">Country of Birth*</label>
	          <select name="country_of_birth" id="country_of_birth" class="required-field">
	             <option value="">Country of Birth</option>               
	             <?php foreach($allCountries as $countries){ ?>
	                <option value="<?php echo $countries->id; ?>" <?php if($all_meta_for_user['country_of_birth'][0] == $countries->id ): echo "selected"; endif; ?>><?php echo $countries->name; ?></option>
	             <?php } ?>
	          </select>
	          
	       </p>
	       <p>
	          <label for="province_of_birth">Province of Birth*</label>
	          <select name="province_of_birth" id="province_of_birth" class="required-field">
	             <option value="">Select Province</option>
	             <?php if($all_meta_for_user['province_of_birth'][0] == ""){ ?>
	             		<option value="<?php echo $all_meta_for_user['province_of_birth'][0]; ?>" selected ><?php echo $all_meta_for_user['province_of_birth'][0]; ?> </option>
	             <?php }?>
	          </select>
	          
	       </p>  
	    </div>
	    <div class="info cstm-row">
	       <p class="cstm-radio">
	          <span>Sex:*</span>
	          <input type="radio" id="male" name="gender" value="male" <?php if($all_meta_for_user['gender'][0] == "male"): echo "checked"; endif; ?>>
	          <label for="male">Male</label><br>
	          <input type="radio" id="female" name="gender" value="female" <?php if($all_meta_for_user['gender'][0] == "female"): echo "checked"; endif; ?>>
	          <label for="female">Female</label><br>
	          <input type="radio" id="other" name="gender" value="other" <?php if($all_meta_for_user['gender'][0] == "other"): echo "checked"; endif; ?>>
	          <label for="other">Other</label>
	          <span class="error" style="flex-basis: 100%;"></span>
	       </p>
	       <p>
	          <label for="tax_code">Tax Code*</label>
	          <input type="text" name="tax_code" id="tax_code" class="required-field">
	          
	       </p>
	    </div>
	    <div class="residence-address cstm-row">
	       <p>
	          <label for="billing_address_1">Residence Address Line 1*</label>
	          <input type="text" id="billing_address_1" name="billing_address_1" class="required-field" value="<?php echo $all_meta_for_user['billing_address_1'][0]; ?>">
	          
	       </p>
	       <!-- <p>
	          <label for="billing_address_2">Residence Address Line 2</label>
	          <input type="text" id="billing_address_2" name="billing_address_2">
	       </p> -->
	       <p>
	          <label for="billing_postcode">Postcode of Residence*</label>
	          <input type="text" id="billing_postcode" name="billing_postcode" class="required-field" value="<?php echo $all_meta_for_user['billing_postcode'][0]; ?>">
	          
	       </p>
	       <p>
	          <label for="billing_city">Municipality of Residence*</label>
	          <input type="text" id="billing_city" name="billing_city" class="required-field" value="<?php echo $all_meta_for_user['billing_city'][0]; ?>">
	          
	       </p>
	       <p>
	          <label for="billing_country">Country of Residence*</label>
	          <select name="billing_country" id="billing_country" class="required-field">
	             <option value="">Select Country</option>
	             <?php foreach($allCountries as $countries){ ?>
	                <option value="<?php echo $countries->iso2; ?>" data-id="<?php echo $countries->id; ?>"><?php echo $countries->name; ?></option>
	             <?php } ?>
	          </select>
	       </p>
	       <p>
	          <label for="billing_state">Province of Residence*</label>
	          <select name="billing_state" id="billing_state" class="required-field">
	             <option value="">Select Province</option>
	          </select>
	          
	       </p>
	       <p>
	          <label for="region-residenc_">Region of Residence*</label>
	          <input type="text" id="region_residence" name="region_residence" class="required-field" value="<?php echo $all_meta_for_user['region_residence'][0]; ?>">
	          
	       </p>
	       <p>
	          <label for="billing_country">Country of Residence*</label>
	          <select name="billing_country" id="billing_country" class="required-field">
	             <option value="">Select Country</option>
	             <?php foreach($allCountries as $countries){ ?>
	                <option value="<?php echo $countries->iso2; ?>" data-id="<?php echo $countries->id; ?>"><?php echo $countries->name; ?></option>
	             <?php } ?>
	          </select>
	       </p>
	       <p>
	          <label for="billing_phone">Preferential Telephone*</label>
	          <input type="tel" id="billing_phone" name="billing_phone" class="required-field" value="<?php echo $all_meta_for_user['billing_phone'][0]; ?>">  
	       </p>
	       <p>
	          <label for="private_email">Private Email</label>
	          <input type="email" id="private_email" name="private_email" value="<?php echo $all_meta_for_user['private_email'][0]; ?>">
	       </p>
	       <p>
	          <label for="private_tel">Private Telephone</label>
	          <input type="tel" id="private_tel" name="private_tel" value="<?php echo $all_meta_for_user['private_tel'][0]; ?>">
	       </p>
	    </div>
	    <div class="bio cstm-row">
	       <p class="full-width">
	          <label for="languages" style="flex-basis:100%">Languages*</label>
	          <?php 
	          $languages = array("Albanese","Arabo","Bulgaro","Cinese","Francese","Giapponese","Inglese","Polacco","Portoghese","Russo","Spagnolo","Tedesco","Ucraino"); 
	          foreach($languages as $language): ?>
	          	<label class="language-options"><input type="checkbox" name="languages[]" value="<?php echo $language; ?>" /><?php echo $language; ?></label>
	          <?php endforeach; ?>
	          <span class="error" style="flex-basis:100%"></span>
	       </p>
	       <p>
	          <label for="educational_qualification">Educational Qualification*</label>
	          <select name="educational_qualification" id="educational_qualification" class="required-field">
	          	<option value="">Educational Qualification</option>
	          	<?php $educationalQualifications = array("Licenza media","Diploma Maturità","Laureando","Diploma Universitario","Laurea breve (3 anni)","Laurea (5 anni)","Altro"); ?>
	          	<?php foreach($educationalQualifications as $educationalQualification): ?>
	             		<option value="<?php echo $educationalQualification; ?>" <?php if($all_meta_for_user['educational_qualification'][0] == $educationalQualification): echo "selected"; endif; ?>><?php echo $educationalQualification; ?></option>
	             <?php endforeach; ?>
	             
	          </select>
	          
	       </p>
	       <p>
	          <label for="study_address">Study Address*</label>
	          <select name="study_address" id="study_address" class="required-field">
	          	<option value="">Study Address</option>
	          	<?php $studyAddress = array("economico","fisica","matematica","statistica","geometra","informatico","ingegneria","legale","liceo","lingue","perito","ragioneria","scientifico","umanistico","altro"); ?>
	          	<?php foreach($studyAddress as $studyAddres): ?>
	             		<option value="<?php echo $studyAddres; ?>" <?php if($all_meta_for_user['study_address'][0] == $studyAddres): echo "selected"; endif; ?>><?php echo $studyAddres; ?></option>
	             <?php endforeach; ?>
	          </select>
	          
	       </p>
	       <p>
	          <label for="job_position">Job Position*</label>
	          <?php $jobPositions = array("Altro","Consulente","Deceduto","Impiegato","Imprenditore","Libero professionista","Non occupato","Operaio","Stagista","Studente"); ?>
	          <select name="job_position" id="job_position" class="required-field">
	             <option value="">Job Position</option>
	             <?php foreach($jobPositions as $jobPosition): ?>
	             		<option value="<?php echo $jobPosition; ?>" <?php if($all_meta_for_user['job_position'][0] == $jobPosition): echo "selected"; endif; ?>><?php echo $jobPosition; ?></option>
	             <?php endforeach; ?>
	          </select>
	          
	       </p>
	       <p>
	          <label for="linkedin_url">Linkedin URL</label>
	          <input type="text" id="linkedin_url" name="linkedin_url" value="<?php echo $all_meta_for_user['linkedin_url'][0]; ?>">
	       </p>
	      <!--  <p>
	          <label for="preferred_correspondence_address_1">Preferred Correspondence Address Line 1</label>
	          <input type="text" id="preferred_correspondence_address_1" name="preferred_correspondence_address_1">
	       </p>
	       <p>
	          <label for="preferred_correspondence_address_2">Preferred Correspondence Address Line 2</label>
	          <input type="text" id="preferred_correspondence_address_2" name="preferred_correspondence_address_2">
	       </p> -->
	    </div>
	    <div class="upload-file cstm-row">
	       <p>
	          <label for="cv">Select a CV:</label>
	          <input type="file" id="cv" name="cv" accept=".jpg,.jpeg,.png,.pdf">
	          
	       </p>
	       <p>
	          <label for="photo">Select a Photo:</label>
	          <input type="file" id="photo" name="photo" accept=".jpg,.jpeg,.png,.pdf">
	          
	       </p>
	    </div>
	 <p>
		<?php wp_nonce_field( 'save_account_details', 'save-account-details-nonce' ); ?>
		
		<button type="button" class="woocommerce-Button button" id="personal_data_save" name="save_account_personal_details" value="<?php esc_attr_e( 'Save changes', 'woocommerce' ); ?>"><?php esc_html_e( 'Save changes', 'woocommerce' ); ?></button>
		<p style="color: green; display: none;"  id="personal_data_status">Dati personali inseriti correttamente</p>
		<input type="hidden" name="action" value="save_account_personal_details" />
	</p>
	</form>
<?php }
  
add_action( 'woocommerce_account_anagraficacliente_endpoint', 'bbloomer_premium_support_content' );

/**
 * My Account Working Postion Menu
 */ 

function bbloomer_premium_support_content_curriculum() {
   echo '<h3>WORKING POSITION</h3><p>WORKING POSITION</p>'; ?>
	<?php echo get_template_part( 'template-parts/woocommerce/my-account/working-postion-menu'); ?>

<?php }
  
add_action( 'woocommerce_account_curriculum_endpoint', 'bbloomer_premium_support_content_curriculum' );

function adaci_my_account_newsletter(){ 
	$user = wp_get_current_user();
	?>

	<form  method="post" id="user_subscription">
    <div class="bio cstm-row" bis_skin_checked="1">
        
        <h2 class="legend">Newsletter iscrizione</h2><br/><br/>
       	<p class="full-width"> 
              <label><input type="checkbox" name="is_subscribed" id="subscription"  title="DESIDERO RICEVERE LE NEWSLETTER" class="checkbox" <?php if(get_user_meta($user->ID, 'is_subscribed',true) == 1){ echo "checked"; } ?>> DESIDERO RICEVERE LE NEWSLETTER</label>
              <span class="error" style="flex-basis:100%"></span>
           </p>
    </div>
    <div class="buttons-set" bis_skin_checked="1">
        <p class="back-link"><a href="<?php echo get_site_url('my-account'); ?>"><small>« </small>Indietro</a></p>
        <button type="button" title="Salva" class="button" id="newsletter_subscription"><span><span>Salva</span></span></button>
    </div>
</form>
	
<?php }
add_action( 'woocommerce_account_newsletter_endpoint', 'adaci_my_account_newsletter' );




/**
 * Update image when registion from submit
 **/ 

add_action( 'user_register', 'bbloomer_save_woo_account_registration_fields', 1 );
  
function bbloomer_save_woo_account_registration_fields( $customer_id ) {
	 require_once( ABSPATH . 'wp-admin/includes/image.php' );
      require_once( ABSPATH . 'wp-admin/includes/file.php' );
      require_once( ABSPATH . 'wp-admin/includes/media.php' );

   if ( isset( $_FILES['photo'] ) ) {
     
      $attachment_id = media_handle_upload( 'photo', 0 );
      if ( is_wp_error( $attachment_id ) ) {
         update_user_meta( $customer_id, 'user_image', $_FILES['photo'] . ": " . $attachment_id->get_error_message() );
      } else {
         update_user_meta( $customer_id, 'user_image', wp_get_attachment_url($attachment_id) );
      }
   }
   if ( isset( $_FILES['cv'] ) ) {
     
      $attachment_id = media_handle_upload( 'cv', 0 );
      if ( is_wp_error( $attachment_id ) ) {
         update_user_meta( $customer_id, 'user_cv', $_FILES['cv'] . ": " . $attachment_id->get_error_message() );
      } else {
         update_user_meta( $customer_id, 'user_cv', wp_get_attachment_url($attachment_id) );
      }
   }
}
 
// --------------
// 4. Add enctype to form to allow image upload
 
add_action( 'woocommerce_register_form_tag', 'bbloomer_enctype_custom_registration_forms' );
 
function bbloomer_enctype_custom_registration_forms() {
   echo 'enctype="multipart/form-data"';
}


/**
 * Show Custom validation error
 */ 
/*function wooc_validate_extra_register_fields( $username, $email, $validation_errors ) {
	

    if ( isset( $_POST['billing_first_name'] ) && empty( $_POST['billing_first_name'] ) ) {
        $validation_errors->add( 'first_name_error', __( '<strong>Error</strong>: First Name is required!.', 'woocommerce' ) );
    }

    if ( isset( $_POST['last_name'] ) && empty( $_POST['last_name'] )  ) {
        $validation_errors->add( 'last_name_error', __( '<strong>Error</strong>: Last Name is required!.', 'woocommerce' ) );
    }
    return $validation_errors;
}

add_action( 'woocommerce_register_post', 'wooc_validate_extra_register_fields', 10, 3 );*/