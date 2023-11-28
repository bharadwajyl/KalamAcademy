<?php
$conn = new mysqli("localhost", "username", "pssd", "db");
if ($conn->connect_error) {
    print_r("error: Database failure");
}
?>
