<?php
if (isset($_POST['submit']) && $_POST['msg'] != '') {
    $host = "ocpp-test1.herokuapp.com";
    $port = 80;
    $socket = socket_create(AF_INET, SOCK_STREAM, 0) or die('socket not created');
    socket_connect($socket, $host, $port) or die('Socket not connect');
    $msg = $_POST['msg'] ;
    socket_write($socket, $msg, strlen($msg));

    $reply=socket_read($socket, 1024);
    $reply=trim($reply);
    echo $reply;
    socket_close($socket);
}

?>

<form method="post">
    <input type="text" name="msg">
    <input type="submit" name="submit">
</form>