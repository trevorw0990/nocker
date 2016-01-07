<?php
// Set your secret key: remember to change this to your live secret key in production
// See your keys here https://dashboard.stripe.com/account/apikeys

require_once('/var/www/html/nocker/vendor/stripe/stripe-php/init.php');

\Stripe\Stripe::setApiKey("sk_test_9Q8KIYBurnsWcoJ52CQ33rAE");

// Get the credit card details submitted by the form
$token = $_POST['stripeToken'];

// Create the charge on Stripe's servers - this will charge the user's card
#try {
#  $charge = \Stripe\Charge::create(array(
#    "amount" => 20000, // amount in cents, again
#    "currency" => "usd",
#    "source" => $token,
#    "description" => "Example charge"
#    ));
#} catch(\Stripe\Error\Card $e) {
#  // The card has been declined
#}

#if( is_user_logged_in() )
#	$customer_id = get_user_meta( get_current_user_id(), '_stripe_customer_id', true );
#else
$customer_id = false;
 
if( !$customer_id ) {
 
	// create a new customer if our current user doesn't have one
	$customer = \Stripe\Customer::create(array(
			'card' => $token,
			'email' => strip_tags(trim($_POST['email']))
		)
	);
 
}
if( $customer_id ) {
 
	$charge = Stripe_Charge::create(array(
			'amount' => $amount, // amount in cents
			'currency' => 'usd',
			'customer' => $customer_id
		)
	);
 
} else {
	// the customer wasn't found or created, throw an error
	throw new Exception( __( 'A customer could not be created, or no customer was found.', 'pippin' ) );
}



?>
