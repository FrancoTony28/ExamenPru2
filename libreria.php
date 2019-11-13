<?php
session_start();

/*********************************************************/
$primary = array();
$primary["01"]  = array(
  "nombre" => "Azul",
  "precio" => 300
);

$primary["02"]  = array(
  "nombre" => "Amarillo",
  "precio" => 300
);

$primary["03"]  = array(
  "nombre" => "Blanco",
  "precio" => 100
);
$primary["04"]  = array(
  "nombre" => "Negro",
  "precio" => 200
);
$primary["05"]  = array(
  "nombre" => "Rojo",
  "precio" => 300
);
/*********************************************************/
$secundary = array();
$secundary["06"]  = array(
  "nombre" => "Rosada",
  "precio" => 300
);

$secundary["07"]  = array(
  "nombre" => "Verde",
  "precio" => 300
);

$secundary["08"]  = array(
  "nombre" => "Magenta",
  "precio" => 300
);
$secundary["09"]  = array(
  "nombre" => "Naranja",
  "precio" => 200
);
$secundary["10"]  = array(
  "nombre" => "Violeta",
  "precio" => 300
);

/***************************************************************/
$gender = array();
$gender["male"] = array(
"description" => "Masculino"
);

$gender["female"] = array(
"description" => "Femenino"
);

/***************************************************************/
$type = array();
$type["water"] = array(
"priceFactor" => 1,
"description" => "Agua"
);

$type["oil"] = array(
"priceFactor" => 1.1,
"description" => "Aceite"
);





/// Funciones para Crear la orden de compra
function addToOrder($client, $edad, $tPintura, $primaria, $secundaria){
    global $type;
    global $primary;
    global $secundary;

    $orderCompra = array(
      "Cliente" => array(
        "nombre" => $client,
        "edad" => $edad,
        "tipo" => $type[$tPintura]["description"]
      ),
      "PinturaPrimaria" => $primary[$primaria],
      "PinturaSecundaria" => $secundary[$secundaria],
      "Precio" => $primary[$primaria]["precio"] +  ($secundary[$secundaria]["precio"] * $type[$tPintura]["priceFactor"])
    );
    return $orderCompra;
}

function addToOrdersCollection($order)
{
    $orderCollection = array();
    if (isset($_SESSION["orderCollection"])) {
        $orderCollection = $_SESSION["orderCollection"];
    }
    $orderCollection[] = $order;
    $_SESSION["orderCollection"] = $orderCollection;
}

function obtenerOrdenes() {
    $orderCollection = array();
    if (isset($_SESSION["orderCollection"])) {
        $orderCollection = $_SESSION["orderCollection"];
    }
    return $orderCollection;
}
?>
