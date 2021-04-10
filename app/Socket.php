<?php


namespace MyApp;

use PDO;
use Exception;

use Ratchet\MessageComponentInterface;
use Ratchet\ConnectionInterface;
use React\EventLoop\LoopInterface;


class Socket implements MessageComponentInterface

{
    public function __construct($httpHost = '0.0.0.0', $port = 8080, $address = '0.0.0.0', LoopInterface $loop = null)
    {
        $this->clients = new \SplObjectStorage;
    }

    public function onOpen(ConnectionInterface $conn)
    {

        // Store the new connection in $this->clients
        $this->clients->attach($conn);

        echo "New connection! ({$conn->resourceId})\n";
    }

    public function onMessage(ConnectionInterface $from, $msg)
    {

        foreach ($this->clients as $client) {

            if ($from->resourceId == $client->resourceId) {
                continue;
            }
            global $myObj;
            /*require 'config.php';

            try {

                $db = new PDO("mysql:host=$host", $user, $password, $options);
                $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                $sth = ($db->query("SELECT * FROM AmbulanceDetails WHERE amb_status = 'on_duty' LIMIT 1 "))->fetch();
                //$locations = $sth->fetchAll();
                //echo($sth['amb_driver']);

                echo json_decode(json_encode($sth, JSON_UNESCAPED_SLASHES|JSON_UNESCAPED_UNICODE));
                
            } catch (Exception $e) {
                echo $e->getMessage();
            }*/

            /*$myObj->name = "John";
            $myObj->age = 30;
            $myObj->city = "New York";

            $myJSON = json_encode($myObj);

            echo $myJSON;*/
            echo "Client $from->resourceId said $msg";
            //$client->send($myJSON );
            //$client->send(json_encode($sth, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE));
            $client->send("Client $from->resourceId said $msg");
        }
    }

    public function onClose(ConnectionInterface $conn)
    {
        $this->clients->detach($conn);

        echo "Connection {$conn->resourceId} has disconnected\n";
    }

    public function onError(ConnectionInterface $conn, \Exception $e)
    {
        echo "An error has occurred: {$e->getMessage()}\n";

        $conn->close();
    }
}
