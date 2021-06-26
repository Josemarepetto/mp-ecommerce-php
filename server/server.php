<?php
require '../vendor/autoload.php';

//MercadoPago\SDK::setPublicKey("APP_USR-7eb0138a-189f-4bec-87d1-c0504ead5626");
MercadoPago\SDK::setAccessToken("APP_USR-6317427424180639-042414-47e969706991d3a442922b0702a0da44-469485398");
MercadoPago\SDK::setIntegratorId("dev_24c65fb163bf11ea96500242ac130004");

        if(isset($_POST['title']) && isset($_POST['price']) && $_POST['unit'] && $_POST['img']){
            $titulo = $_POST['title'];
            $precio = $_POST['price'];
            $cant = $_POST['unit'];
            $img = $_POST['unit'];
            echo getIdPreferencia($titulo, $cant, $precio, $img);
        }

        function getIdPreferencia($titulo, $cantidad, $precio_unitario, $imagen){
        $preference = new MercadoPago\Preference();

        $item = new MercadoPago\Item();
        $item->id="1234";
        $item->title = $titulo;
        $item->description="Dispositivo móvil de Tienda e-commerce";
        $item->quantity = $cantidad;
        $item->currency_id= "ARS";
        $item->unit_price = $precio_unitario;
        $item->picture_url=$imagen;
        //Configuro External Reference solicitada
        $preference-> external_reference="josemarepetto@gmail.com";
        //Configuro URL para recibir notificaciones
        $preference->notification_url="https://josemarepetto-mp-ecommerce-php.herokuapp.com//notificaciones.php";
        $preference->items = array($item);

        //Metodos de Pago EXCLUIDOS
        $preference->payment_methods = array(
            "excluded_payment_methods" => array(
              array("id" => "amex")
            ),
            "excluded_payment_types" => array(
              array("id" => "atm")
            ),
            "installments" => 6
          );

        //Informacion del Pagador
        $payer = new MercadoPago\Payer();
        $payer->id="471923173";
        $payer->name = "Lalo";
        $payer->surname = "Landa";
        $payer->email = "test_user_63274575@testuser.com";
        $payer->date_created = "Fecha actual";
        $payer->phone = array(
          "area_code" => "11",
          "number" => "22223333"
        );
        $payer->address = array(
          "street_name" => "Falsa",
          "street_number" => 123,
          "zip_code" => "1111"
        );

        $preference->back_urls = array(
            "success" => "https://josemarepetto-mp-ecommerce-php.herokuapp.com/resultado.php",
            "failure" => "https://josemarepetto-mp-ecommerce-php.herokuapp.com/resultado.php", 
            "pending" => "https://josemarepetto-mp-ecommerce-php.herokuapp.com/resultado.php"
        );
        $preference->auto_return = "approved"; 

        

        $preference->save();

        $response = array(
            'init_point' => $preference->init_point,
        ); 
        $initPoint = json_encode($response);
        $key="init_point";
        $data = json_decode($initPoint)->$key;
        return $data;
        }
?>
