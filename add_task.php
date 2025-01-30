// add_task.php

<?php
require 'config.php';
if (isset($_POST['add']) && !empty($_POST['task'])) {
    try {
        $stmt = $db->prepare("INSERT INTO task (task, status) VALUES (:task, 'Pending')");
        $stmt->bindParam(':task', $_POST['task']);
        $stmt->execute();
        header('Location: index.php');
        exit;
    } catch(PDOException $e) {
        die("Error adding task: " . $e->getMessage());
    }
}
header('Location: index.php');
?>
