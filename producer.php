<?php
require_once __DIR__ . '/vendor/autoload.php';
use PhpAmqpLib\Connection\AMQPStreamConnection;
use PhpAmqpLib\Message\AMQPMessage;

//on recupere les informations envoyees par le service 
$message = $_POST['message'];
$topic = $_POST['topic'];

//on etablie la connexion avec le serveur RabbitMQ et on ouvre un canal
$connection = new AMQPStreamConnection('localhost', 5672, 'guest', 'guest');
$channel = $connection->channel();

//on ouvre l'echange de type "topic" 
//si l'echange n'exite pas, il sera cree automatiquement en fonction de ses parametres
$channel->exchange_declare('informations', 'topic', true, false, false);

//on definit une cle de routage des messages
$routing_key = $topic;

//on cree le message et on l'envoie 
$req = "INSERT INTO `informations`(`topic`,`message`) VALUES('$topic','$message')";

$msg = new AMQPMessage($req);

$channel->basic_publish($msg, 'informations', $routing_key);

echo ' [x] Sent ', $routing_key, ':', $message, "\n";

//on ferme la connexion apres l'envoi
$channel->close();
$connection->close();

?>