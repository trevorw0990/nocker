<?php
// Set your secret key: remember to change this to your live secret key in production
// See your keys here https://dashboard.stripe.com/account/apikeys

require_once('/var/www/html/aws-for-noc/vendor/stripe/stripe-php/init.php');

\Stripe\Stripe::setApiKey("sk_test_9Q8KIYBurnsWcoJ52CQ33rAE");

// Get the credit card details submitted by the form
$token = $_POST['stripeToken'];

// Create the charge on Stripe's servers - this will charge the user's card
try {
  $charge = \Stripe\Charge::create(array(
    "amount" => 20000, // amount in cents, again
    "currency" => "usd",
    "source" => $token,
    "description" => "Example charge"
    ));
} catch(\Stripe\Error\Card $e) {
  // The card has been declined
}

?>
