<?php

$conn = new mysqli("localhost", "root",'root','bursary');
if ($conn->connect_error) {
    die("Error in connection" . $conn->error);
}
//$conn->close();

