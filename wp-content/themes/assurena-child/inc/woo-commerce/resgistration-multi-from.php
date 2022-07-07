<?php
	add_shortcode( 'wc_reg_form_bbloomer_form', 'bbloomer_separate_registration_multistep_form' );
   
   function bbloomer_separate_registration_multistep_form() {
      if(!is_checkout()){ 
         if ( is_admin() ) return;
         if ( is_user_logged_in() ) return;
      } ?>
      <div class="woocommerce-notices-wrapper" bis_skin_checked="1"></div>
      <div class="container-fluid">
    	<div class="row justify-content-center">
        	<div class="col-11 col-sm-10 col-md-10 col-lg-6 col-xl-5 text-center p-0 mt-3 mb-2">
            	<div class="card px-0 pt-4 pb-0 mt-3 mb-3">
            		<!-- <h2 id="heading">Sign Up Your User Account</h2>
                	<p>Fill all form field to go to next step</p> -->
                	
                	<?php if(!is_checkout()){ ?>
      					<form method="post" id="msform" class="woocommerce-form woocommerce-form-register register" <?php do_action( 'woocommerce_register_form_tag' ); ?>>
         				<?php }
         				do_action( 'woocommerce_register_form_start' );  ?>
         					<ul id="progressbar">
		                        <li class="active" id="personal"><strong>PERSONAL DATA</strong></li>
		                        <li id="payment"><strong>COMPANY</strong></li>
		                        <li id="confirm"><strong>WORKING POSITION</strong></li>
		                        <li id="account"><strong>Login data</strong></li>
		                    </ul>
		                    <div class="progress">
		                        <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuemin="0" aria-valuemax="100"></div>
		                    </div> <br> <!-- fieldsets -->
		                    
		                    <?php echo get_template_part( 'template-parts/multi-form-personal-data'); ?>

		                    <?php echo get_template_part( 'template-parts/multi-form-company-data'); ?>
		                    
		                    <?php echo get_template_part( 'template-parts/multi-from-working-data'); ?>

		                    <?php echo get_template_part( 'template-parts/multi-from-login-data'); ?>

		                    <?php do_action( 'woocommerce_register_form_end' ); ?>
         				</form>

            	</div>
            </div>
        </div>


    <?php }