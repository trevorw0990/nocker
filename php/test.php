<?php

$json='Stripe\Customer JSON: { "id": "cus_7g6IslhyWM2kbx", "object": "customer", "account_balance": 0, "created": 1452197452, "currency": "usd", "default_source": "card_17Qk5sBw3fK7DZiipD8d2wVl", "delinquent": false, "description": null, "discount": null, "email": "twatson@iiqconsulting.com", "livemode": false, "metadata": [], "shipping": null, "sources": { "object": "list", "data": [ { "id": "card_17Qk5sBw3fK7DZiipD8d2wVl", "object": "card", "address_city": null, "address_country": null, "address_line1": null, "address_line1_check": null, "address_line2": null, "address_state": null, "address_zip": null, "address_zip_check": null, "brand": "Visa", "country": "US", "customer": "cus_7g6IslhyWM2kbx", "cvc_check": "pass", "dynamic_last4": null, "exp_month": 10, "exp_year": 2020, "fingerprint": "OhLwtwGIyTZff76O", "funding": "credit", "last4": "4242", "metadata": [], "name": "twatson@iiqconsulting.com", "tokenization_method": null } ], "has_more": false, "total_count": 1, "url": "\/v1\/customers\/cus_7g6IslhyWM2kbx\/sources" }, "subscriptions": { "object": "list", "data": [ { "id": "sub_7g6IE0kuoaF1Bh", "object": "subscription", "application_fee_percent": null, "cancel_at_period_end": false, "canceled_at": null, "current_period_end": 1483819852, "current_period_start": 1452197452, "customer": "cus_7g6IslhyWM2kbx", "discount": null, "ended_at": null, "metadata": [], "plan": { "id": "one_year_subscription", "object": "plan", "amount": 20000, "created": 1452195835, "currency": "usd", "interval": "year", "interval_count": 1, "livemode": false, "metadata": [], "name": "One Year Subscription", "statement_descriptor": "Nocker Payment", "trial_period_days": null }, "quantity": 1, "start": 1452197452, "status": "active", "tax_percent": null, "trial_end": null, "trial_start": null } ], "has_more": false, "total_count": 1, "url": "\/v1\/customers\/cus_7g6IslhyWM2kbx\/subscriptions" } }';

echo $json;


echo "<br>";
echo "<br>";
echo "<br>";
echo "<br>";
echo "<br>";
echo "<br>";

$stripper = str_replace("Stripe\Customer JSON:", "", $json);

echo $stripper;
echo "<br>";


$encoded = json_decode($stripper, true);

echo $encoded['id'];


?>
