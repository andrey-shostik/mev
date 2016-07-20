<?php

namespace App\Task18;

class SocketServer
{
    /**
     * Connect to socket
     * @return object of stream
     */
    private function connection()
    {
        if ($socket_server = stream_socket_server('tcp://127.0.0.1:2000')) {
            echo "Server is launched\n";
        } else {
            echo "Error\n";
        }

        return $socket_server;
    }

    /**
     * Print messages that was to get from client
     * @return object
     */
    public function showMessages()
    {
        $server_socket = $this->connection();

        while (true) {
            $socket = stream_socket_accept($server_socket, -1);
            echo fread($socket, 1024), "\n";
            fclose($socket);
        }
        fclose($server_socket);
    }
}

$server = new SocketServer();
$server->showMessages();
