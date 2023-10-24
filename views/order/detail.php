<h1>Detalles del Pedido</h1>

<h3>Datos del Envio</h3><br>
Provincia: <?= $order->privincia ?><br>
Ciudad: <?= $order->localidad ?><br>
Direccion: <?= $order->direccion ?><br><br>

<?php Utils::getOrderTable( $order, $products ) ?>