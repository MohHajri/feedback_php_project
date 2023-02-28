<?php
if (!defined('DB_SERVER')) {
    define('DB_SERVER', 'localhost');
}

if (!defined('DB_USER')) {
    define('DB_USER', 'Hajri');
}

if (!defined('DB_PASSWORD')) {
    define('DB_PASSWORD', 'QWERqwer123');
}

if (!defined('DB_NAME')) {
    define('DB_NAME', 'feedback');
}

  // Make the connection:
    $conn = new mysqli(DB_SERVER, DB_USER, DB_PASSWORD, DB_NAME);

  // If no connection, trigger an error:
    if ($conn->connect_error) trigger_error('Database connection failed: '  . $conn->connect_error, E_USER_ERROR);

    echo 'Connection established!';


 