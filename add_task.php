// add_task.php

<?php
require 'config.php';
if (isset($_POST['add'])) {
    if (!empty($_POST['task'])) {
        $task = $_POST['task'];
        
        $stmt = $db->prepare("INSERT INTO task (task, status) VALUES (:task, 'Pending')");
        $stmt->bindParam(':task', $task);
        $stmt->execute();
        
        header('Location: index.php');
        exit;
    }
}
?>
