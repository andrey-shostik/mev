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
     * @return boolean
     */
    public function sendMessage()
    {
        $message = '';

        while ($message != ':q') {
            $message = readline('Type your message: ');

            if($socket = stream_socket_client('tcp://127.0.0.1:2000')) {
                $boolean = true;
            } else {
                $boolean = false;
            }
            fwrite($socket, $this->name . ': ' . $message);
            fclose($socket);
        }

        return $boolean;
    }
}

$client = new SocketClient();
$name = $client->setName(readline('Type your name: '));

$client->sendMessage($name);
