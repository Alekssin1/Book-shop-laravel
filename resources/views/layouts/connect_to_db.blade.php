<?php
$conn = new mysqli("127.0.0.1", "root", "root", "books", 3309);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$conn->select_db("books");
$result = $conn->query("SELECT DATABASE()");
$row = $result->fetch_row();
?>
