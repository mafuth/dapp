<?php
use Ratchet\MessageComponentInterface;
use Ratchet\ConnectionInterface;

class dataExchange implements MessageComponentInterface {
    protected $clients;

    public function __construct() {
        $this->clients = new \SplObjectStorage;
    }

    public function onOpen(ConnectionInterface $conn) {
        // Store the new connection to send messages to later
        $this->clients->attach($conn);

        echo "New connection! ({$conn->resourceId})\n";
    }

    public function onMessage(ConnectionInterface $from, $msg) {
        $numRecv = count($this->clients) - 1;
        //echo sprintf('Connection %d sent "%s" to %d other connection%s' . "\n"
        //   , $from->resourceId, $msg, $numRecv, $numRecv == 1 ? '' : 's');

        $msgData = json_decode(base64_decode($msg),true);
        if($msgData['type'] == 'auth'){
            $auth = array();
            $auth['type'] = 'auth';
            $auth['resourceId'] = $from->resourceId;
            foreach ($this->clients as $client) {
                if ($from == $client) {
                    $client->send(base64_encode(json_encode($auth)));
                    echo '('.$client->resourceId.') was authourised'."\n";
                }
            }
        }else{
            foreach ($this->clients as $client) {
                if ($client->resourceId == $msgData['to']) {
                    $client->send($msg);
                    echo '('.$from->resourceId.') sent data to ('.$msgData['to'].')'."\n";
                }
            }
        }
    }

    public function onClose(ConnectionInterface $conn) {
        // The connection is closed, remove it, as we can no longer send it messages
        $this->clients->detach($conn);

        echo "Connection {$conn->resourceId} has disconnected\n";
    }

    public function onError(ConnectionInterface $conn, \Exception $e) {
        echo "An error has occurred: {$e->getMessage()}\n";

        $conn->close();
    }
}
