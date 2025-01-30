// delete_task.php

<?php
require 'config.php';

if (isset($_GET['task_id'])) {
    $task_id = $_GET['task_id'];
    
    $stmt = $db->prepare("DELETE FROM task WHERE task_id = :task_id");
    $stmt->bindParam(':task_id', $task_id, PDO::PARAM_INT);
    $stmt->execute();
    
    header("Location: index.php");
    exit;
}
?>
