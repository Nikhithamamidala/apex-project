<?php
// Establish database connection
$con = new mysqli('localhost:3306', 'root', '', 'crudoperations');

// Check connection
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}
