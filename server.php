<?php
$host = "127.0.0.1";
$port = 80;
$socket = socket_create(AF_INET, SOCK_STREAM, 0) or die('socket not created');
$result = socket_bind($socket, $host, $port) or die('Sockect not Bind');
$result = socket_listen($socket, 3) or die('socket not listen');

do {
    $accept = socket_accept($socket) or die('socket not accept');
    $msg = socket_read($accept, 1024);
    $msg = trim($msg);
    echo $msg."\n";

    echo "Enter reply";
    $reply=fgets(STDIN);
    socket_write($accept, $reply, strlen($reply));
} while (true);


socket_close($accept);
socket_close($socket);
