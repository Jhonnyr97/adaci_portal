<fieldset>
    <div class="form-card">
        <div class="row">
            <div class="col-7">
                <h2 class="fs-title">Login data:</h2>
            </div>
            <div class="col-5">
                <h2 class="steps">Step 4 - 4</h2>
            </div>
        </div>
        <div class="contact cstm-row">
             <p>
                <label for="<?php if(is_checkout()){ echo "billing_email"; } else { echo "reg_email";  } ?> reg_email">Preferential Email*</label>
                <?php if(is_checkout()){ ?>
                   <input type="email" id="billing_email" name="billing_email" class="required-field">
                <?php } else {?>
                   <input type="email" id="reg_email" name="email" class="required-field">
                <?php } ?>
             </p>
             <p>
                <label for="billing_phone">Preferential Telephone*</label>
                <input type="tel" id="billing_phone" name="billing_phone" class="required-field">  
             </p>
             <p>
                <label for="private_email">Private Email</label>
                <input type="email" id="private_email" name="private_email">
             </p>
             <p>
                <label for="private_tel">Private Telephone</label>
                <input type="tel" id="private_tel" name="private_tel">
             </p>
          </div>
    </div>
    <?php do_action( 'woocommerce_register_form' ); 
    wp_nonce_field( 'woocommerce-register', 'woocommerce-register-nonce' ); ?>
    <button type="submit" class="woocommerce-Button woocommerce-button button woocommerce-form-register__submit next action-button" name="register" value="<?php esc_attr_e( 'Register', 'woocommerce' ); ?>"><?php esc_html_e( 'Register', 'woocommerce' ); ?></button>
    <?php do_action( 'woocommerce_register_form_end' ); ?>
</fieldset>