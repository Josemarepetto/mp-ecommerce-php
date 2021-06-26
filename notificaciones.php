<?php
require './vendor/autoload.php';
MercadoPago\SDK::setAccessToken("APP_USR-6317427424180639-042414-47e969706991d3a442922b0702a0da44-469485398");
    echo "<h2>Notificaciones</h2><br>";

        header("Content-Type: application/json");

  if (isset($_SERVER['HTTP_ORIGIN'])) {
    header("Access-Control-Allow-Origin: {$_SERVER['HTTP_ORIGIN']}");
    header('Access-Control-Allow-Credentials: true');
    header('Access-Control-Max-Age: 86400');    // cache for 1 day
  }

  error_reporting(E_ALL);
  ini_set('display_errors', TRUE);
  ini_set('display_startup_errors', TRUE);

 
    $data = json_decode(file_get_contents("php://input"));

    echo $data;


    // $json = file_get_contents('php://input');
    // $data = json_decode($json,true);
    // echo $data;


    // if($data->type!=null){
    //     $type = $json_data->type;
    //     switch($type) {
    //     case "payment":
    //         $payment = MercadoPago\Payment.find_by_id($_POST["id"]);
    //         echo $payment;
    //         break;
    //     case "plan":
    //         $plan = MercadoPago\Plan.find_by_id($_POST["id"]);
    //         break;
    //     case "subscription":
    //         $plan = MercadoPago\Subscription.find_by_id($_POST["id"]);
    //         break;
    //     case "invoice":
    //         $plan = MercadoPago\Invoice.find_by_id($_POST["id"]);
    //         break;
    // }
    // }
    
?>
