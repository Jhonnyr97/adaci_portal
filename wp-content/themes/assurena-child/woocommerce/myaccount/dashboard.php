<?php
/**
 * My Account Dashboard
 *
 * Shows the first intro screen on the account dashboard.
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/dashboard.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 4.4.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

$allowed_html = array(
	'a' => array(
		'href' => array(),
	),
);
?>

<h2> MY DASHBOARD </h2>
<br>

<p>
	<strong>Hi <?php  echo esc_html( $current_user->display_name ); ?>!</strong>
</p>

<p>
From your account dashboard, you have the ability to see a snapshot of your account's recent activity and update your account information. Select a link below to view or edit the information.
</p>
<!-- <p>
	<?php
	printf(
		/* translators: 1: user display name 2: logout url */
		wp_kses( __( 'Hello %1$s (not %1$s? <a href="%2$s">Log out</a>)', 'woocommerce' ), $allowed_html ),
		'<strong>' . esc_html( $current_user->display_name ) . '</strong>',
		esc_url( wc_logout_url() )
	);
	?>
</p> -->

<!-- <pre> -->
	<?php $customer = new WC_Customer( $current_user->ID ); ?>
<?php  


?>
<?php // print_r($current_user); ?>
<!-- </pre> -->

<h5 class="under-line">ACCOUNT INFORMATION</h5>
<br><br>

<div class="custm-row">
	
	<div class="contact-info">
		<h6>CONTACT INFORMATION</h6>
		<a href="<?php echo site_url().'/my-account/edit-account/'; ?>">EDIT</a>
		<p><?php echo esc_html( $current_user->display_name ); ?></p>
		<p><?php echo esc_html( $current_user->user_email ); ?></p>
		<a href="<?php echo site_url().'/my-account/edit-account/'; ?>">Change account password</a>
	</div>
	<div class="newsletter">
		<h6>NEWSLETTER</h6>
		<a href="<?php echo site_url().'/my-account/newsletter/'; ?>">EDIT</a>
		<p>You are not subscribed to any newsletter at the moment.</p>
	</div>
</div>
<div class="address">
	<h5>ADDRESS BOOK</h5>
	<a href="<?php echo site_url().'/my-account/edit-address/'; ?>">Manage Address</a>
	<div class="custm-row">
		<div class="billing-add">
			<h6>DEFAULT BILLING ADDRESS</h6>
			<?php if($customer->get_billing_address_1() != '' ){ ?>
				<p> <?php echo $customer->get_billing_address_1(); ?> </p>
				<p> <?php echo $customer->get_billing_address_2(); ?> </p> 
				<p> <?php echo $customer->get_billing_city(); ?> </p> 
				<p> <?php echo $customer->get_billing_state(); ?> </p> 
				<p> <?php echo $customer->get_billing_country(); ?> </p> 
				<p> <?php echo $customer->get_billing_postcode(); ?> </p>
			<?php } else { ?>
				<p>You haven't set a default billing address.	</p>
			<?php } ?>
			<a href="<?php echo site_url().'/my-account/edit-address/'; ?>">Change address</a>
		</div>
		<div class="shipping-add">
			<h6>DEFAULT SHIPPING ADDRESS</h6>
			<?php if($customer->get_shipping_address_1() != '' ){ ?>
				<p> <?php echo $customer->get_shipping_address_1(); ?> </p>
				<p> <?php echo $customer->get_shipping_address_2(); ?> </p> 
				<p> <?php echo $customer->get_shipping_city(); ?> </p> 
				<p> <?php echo $customer->get_shipping_state(); ?> </p> 
				<p> <?php echo $customer->get_shipping_country(); ?> </p> 
				<p> <?php echo $customer->get_shipping_postcode(); ?> </p>
			<?php } else { ?>
				<p>You haven't set a default shipping address.</p>	
			<?php } ?>
			<a href="<?php echo site_url().'/my-account/edit-address/'; ?>">Change address</a>
		</div>
	</div>
</div>





<!-- <p>
	<?php
	/* translators: 1: Orders URL 2: Address URL 3: Account URL. */
	$dashboard_desc = __( 'From your account dashboard you can view your <a href="%1$s">recent orders</a>, manage your <a href="%2$s">billing address</a>, and <a href="%3$s">edit your password and account details</a>.', 'woocommerce' );
	if ( wc_shipping_enabled() ) {
		/* translators: 1: Orders URL 2: Addresses URL 3: Account URL. */
		$dashboard_desc = __( 'From your account dashboard you can view your <a href="%1$s">recent orders</a>, manage your <a href="%2$s">shipping and billing addresses</a>, and <a href="%3$s">edit your password and account details</a>.', 'woocommerce' );
	}
	printf(
		wp_kses( $dashboard_desc, $allowed_html ),
		esc_url( wc_get_endpoint_url( 'orders' ) ),
		esc_url( wc_get_endpoint_url( 'edit-address' ) ),
		esc_url( wc_get_endpoint_url( 'edit-account' ) )
	);
	?>
</p> -->

<?php
	/**
	 * My Account dashboard.
	 *
	 * @since 2.6.0
	 */
	do_action( 'woocommerce_account_dashboard' );

	/**
	 * Deprecated woocommerce_before_my_account action.
	 *
	 * @deprecated 2.6.0
	 */
	do_action( 'woocommerce_before_my_account' );

	/**
	 * Deprecated woocommerce_after_my_account action.
	 *
	 * @deprecated 2.6.0
	 */
	do_action( 'woocommerce_after_my_account' );

/* Omit closing PHP tag at the end of PHP files to avoid "headers already sent" issues. */
