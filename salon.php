<?php
require "server.php";
require_once __DIR__ . '/vendor/autoload.php';
use PhpAmqpLib\Connection\AMQPStreamConnection;

$connection = new AMQPStreamConnection('localhost', 5672, 'guest', 'guest');
$channel = $connection->channel();

$channel->exchange_declare('informations', 'topic', true, false, false);

list($queue_name, ,) = $channel->queue_declare("", false, false, true, false);

$binding_keys = array('maison.salon.*', 'maison.douche.couleur');

foreach ($binding_keys as $binding_key) {
    $channel->queue_bind($queue_name, 'informations', $binding_key);
}

echo " [*] Waiting for logs. To exit press CTRL+C\n";

$callback = function ($msg) {
    echo ' [x] ', $msg->delivery_info['routing_key'], ':', $msg->body, "\n";
    $con = conn();
    $res = $con->exec($msg->body);
};

$channel->basic_consume($queue_name, '', false, true, false, false, $callback);

while ($channel) {
    $channel->wait();
}

$channel->close();
$connection->close();

?>