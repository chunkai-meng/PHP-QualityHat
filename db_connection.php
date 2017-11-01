<?php
$mysqli = new mysqli("localhost", "mengc06", "05011981", "mengc06mysql3");
if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}
?>
