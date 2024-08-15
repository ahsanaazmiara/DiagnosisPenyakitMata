<?php

$id_users=$_GET['id'];

$sql = "DELETE FROM users WHERE id_users='$id_users'";
if ($conn->query($sql) === TRUE) {
    header("Location:?page=users");
}
$conn->close();