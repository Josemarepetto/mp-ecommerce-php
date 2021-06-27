<?php

    require './vendor/autoload.php';
    MercadoPago\SDK::setAccessToken("APP_USR-6317427424180639-042414-47e969706991d3a442922b0702a0da44-469485398");
    class webhook{

      public function __construct(){
        $json= file_get_contents('php://input');
        $decoded = json_decode($json, true);

        //Salvo el Body del Json
        ob_start();
        var_dump($decoded);
        $input = ob_get_contents();
        ob_end_clean();

        //Grabo en archivo
        file_put_contents('./inputs.log',$input . PHP_EOL, FILE_APPEND);
      }
    }
    new webhook();
?>
