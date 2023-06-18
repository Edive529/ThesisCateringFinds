<?php
    include("./config.php");



          $token = $_POST["stripeToken"];
          $contact_name = $_POST["c_name"];
          $token_card_type = $_POST["stripeTokenType"];
          $phone = $_POST["phone"];
          $email = $_POST["stripeEmail"];
          $address = $_POST["address"];
          $amount = $_POST["amount"];
          $desc = $_POST["product_name"];

          $stripe = new \Stripe\StripeClient('sk_test_51NIkXMSGeKy7WLs6bxSx9nJI5gytzyDJ7YnYK13AeCCwpuRzrBi4mjjtr6zgcAMt0NziY8tpaPVsjJdJCswsty5700D9443m68');

          $paymentIntent = $stripe->paymentIntents->create([
            'amount' => str_replace(",", "", $amount) * 100,
            'currency' => 'php',
            'description' => $desc,
            'payment_method_types' => ['card'],
            'metadata' => [
              'name' => $contact_name,
              'payment_type' => $token_card_type
            ],
          ]);

          if ($paymentIntent) {
            header("Location: success.php?amount=$amount");
          }



?>
