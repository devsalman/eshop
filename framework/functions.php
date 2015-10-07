<?php

function assets($filepath)
{
    $serverName = $_SERVER['SERVER_NAME'];
    $serverPort = $_SERVER['SERVER_PORT'];

    return sprintf('http://%s:%d/public/assets/%s', $serverName, $serverPort, $filepath);
}
