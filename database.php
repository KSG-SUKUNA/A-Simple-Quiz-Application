<?php
session_start();
$conn = new mysqli("localhost", "root", "", "quiz_app");
if ($conn->connect_error) {
    die("DB connection failed: " . $conn->connect_error);
}
?>
