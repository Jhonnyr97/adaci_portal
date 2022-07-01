<?php
/**
 * Checkout Form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/checkout/form-checkout.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.5.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

do_action( 'woocommerce_before_checkout_form', $checkout );

// If checkout registration is disabled and not logged in, the user cannot checkout.
if ( ! $checkout->is_registration_enabled() && $checkout->is_registration_required() && ! is_user_logged_in() ) {
	echo esc_html( apply_filters( 'woocommerce_checkout_must_be_logged_in_message', __( 'You must be logged in to checkout.', 'woocommerce' ) ) );
	return;
}

?>

<form name="checkout" method="post" class="checkout woocommerce-checkout" action="<?php echo esc_url( wc_get_checkout_url() ); ?>" enctype="multipart/form-data">

	<?php /*if ( $checkout->get_checkout_fields() ) : ?>

		<?php do_action( 'woocommerce_checkout_before_customer_details' ); ?>

		<div class="col2-set" id="customer_details">
			<div class="col-1">
				<?php do_action( 'woocommerce_checkout_billing' ); ?>
			</div>

			<div class="col-2">
				<?php do_action( 'woocommerce_checkout_shipping' ); ?>
			</div>
		</div>

		<?php do_action( 'woocommerce_checkout_after_customer_details' ); ?>

	<?php endif; */ ?>
	<div class="col2-set" id="customer_details">
		<div class="accordion-single js-acc-single">
		   <div class="accordion-single-item js-acc-item">
		      <h2 class="accordion-single-title js-acc-single-trigger">PERSONAL DATA</h2>
		      <div class="accordion-single-content">
		        
		       <?php echo get_template_part( 'woocommerce/checkout/form-personal'); ?>
		      </div>
		    </div>
		   <div class="accordion-single-item js-acc-item">
		      <h2 class="accordion-single-title js-acc-single-trigger">COMPANY</h2>
		      <div class="accordion-single-content">
		        <?php echo get_template_part( 'woocommerce/checkout/form-compnay'); ?>
		        
		      </div>
		    </div>
		   <div class="accordion-single-item js-acc-item">
		      <h2 class="accordion-single-title js-acc-single-trigger">WORKING POSITION</h2>
		      <div class="accordion-single-content">
		        <?php echo get_template_part( 'woocommerce/checkout/form-working-data'); ?>
		      </div>
		    </div>
		    <div class="accordion-single-item js-acc-item">
		      <h2 class="accordion-single-title js-acc-single-trigger">Login</h2>
		      <div class="accordion-single-content">
		        <div class="contact cstm-row">
		             <p>
		                <label for="billing_email">Preferential Email*</label>
		               
		                   <input type="email" id="billing_email" name="billing_email" class="required-field">
		               
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
		    </div>
		</div>
		<div class="col-2">
				<?php do_action( 'woocommerce_checkout_shipping' ); ?>
			</div>
	</div>
	
	<?php do_action( 'woocommerce_checkout_before_order_review_heading' ); ?>
	
	<h3 id="order_review_heading"><?php esc_html_e( 'Your order', 'woocommerce' ); ?></h3>
	
	<?php do_action( 'woocommerce_checkout_before_order_review' ); ?>

	<div id="order_review" class="woocommerce-checkout-review-order">
		<?php do_action( 'woocommerce_checkout_order_review' ); ?>
	</div>

	<?php do_action( 'woocommerce_checkout_after_order_review' ); ?>

</form>

<?php do_action( 'woocommerce_after_checkout_form', $checkout ); ?>
<style type="text/css">
	* {
  margin: 0;
  padding: 0;
}

.accordion-single-item.is-open .accordion-single-content {
    height: auto;
}
.accordion-single-content{
	height: 0;
}

.contents{
  max-width: 400px;
  padding: 0 40px;
  margin: 0 auto;
}

.accordion-single  {
  border-bottom: 1px solid #efefef;
  margin-top: 10px;
}

.accordion-single-title {
  border-top: 1px solid #efefef;
  padding: 20px;
  cursor: pointer;
  position: relative;
  font-size: 20px;
  margin: 0;
}

.accordion-single-title::after{
  content: "";
  position: absolute;
  top: 25px;
  right: 25px;
  width: 0;
  height: 0;
  border: 8px solid transparent;
  border-top-color: #666;
  transition: transform .2s ease;
}

.accordion-single-content {
  height: 0;
  overflow: hidden;
  transition: max-height .3s ease-in-out;
}

.accordion-single-content p {
  padding: 20px;
}



.accordion-single-item.is-open .accordion-single-title::after  {
  transform: rotate(180deg);
}
.accordion-single-item.is-open .accordion-single-content {
    height: auto;
}

</style>

<script type="text/javascript">
	const accSingle = document.querySelector('.js-acc-single');
const items     = accSingle.querySelectorAll('.js-acc-item');
const accSingleTriggers = accSingle.querySelectorAll('.js-acc-single-trigger');

// 最初の要素を開いておく
const firstChild = accSingle.firstElementChild;
firstChild.classList.add('is-open');

accSingleTriggers.forEach(trigger => trigger.addEventListener('click', toggleAccordion));

function toggleAccordion() {
  const thisItem = this.parentNode;

  items.forEach(item => {
    if (thisItem == item) {
      thisItem.classList.toggle('is-open');
      return;
    }
    item.classList.remove('is-open');
  });
}
</script>