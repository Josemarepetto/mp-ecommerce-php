<?php
require './vendor/autoload.php';
MercadoPago\SDK::setAccessToken("APP_USR-6317427424180639-042414-47e969706991d3a442922b0702a0da44-469485398");
    echo "<h2>Notificaciones</h2><br>";
    $data = file_get_contents('php://input');
    $json_data = json_decode($data);

        $type = $json_data->type;
        switch($type) {
        case "payment":
            $payment = MercadoPago\Payment.find_by_id($_POST["id"]);
            echo $payment;
            break;
        case "plan":
            $plan = MercadoPago\Plan.find_by_id($_POST["id"]);
            break;
        case "subscription":
            $plan = MercadoPago\Subscription.find_by_id($_POST["id"]);
            break;
        case "invoice":
            $plan = MercadoPago\Invoice.find_by_id($_POST["id"]);
            break;
    }
    
    
?>
