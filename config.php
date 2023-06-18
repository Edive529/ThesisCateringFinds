<?php
    require_once "stripe-php-master/init.php";

    $stripeDetails = array(
        "secretKey" => "sk_test_51NIkXMSGeKy7WLs6bxSx9nJI5gytzyDJ7YnYK13AeCCwpuRzrBi4mjjtr6zgcAMt0NziY8tpaPVsjJdJCswsty5700D9443m68",
        "publishableKey" => "pk_test_51NIkXMSGeKy7WLs6P4GQfu5DuePNId864WbrdeQQptQ5XYAHHYL6QEkBx4sxqu3PCnnT7LqVlXmM0aWf8yYUlQ2e00yVJZ3M7T"
    );

    \Stripe\Stripe::setApiKey($stripeDetails["secretKey"]);
?>
