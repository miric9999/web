<?php

session_start();

include '../includes/config.php';

$id = $_GET['id'];

$conn->query(
    "DELETE FROM news WHERE id=$id"
);

header("Location: news-list.php");
exit();