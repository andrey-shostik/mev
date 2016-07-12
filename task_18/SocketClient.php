<?php

class SocketClient
{
    private $name;

    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * send socket with message to server
     * @return object
     */
    public function sendMessage()
    {
        while (true) {
            $message = readline('Type your message: ');
            $socket = stream_socket_client('tcp://127.0.0.1:2000');
            fwrite($socket, $this->name . ': ' . $message);
            fclose($socket);
        }

        return $socket;
    }
}

$client = new SocketClient();
$name = $client->setName(readline('Type your name: '));

$client->sendMessage($name);
