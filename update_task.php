// update_task.php

<?php
require 'config.php';
if (isset($_GET['task_id'])) {
    try {
        $stmt = $db->prepare("UPDATE task SET status = 'Done' WHERE task_id = :task_id");
        $stmt->bindParam(':task_id', $_GET['task_id'], PDO::PARAM_INT);
        $stmt->execute();
    } catch(PDOException $e) {
        die("Error updating task: " . $e->getMessage());
    }
}
header('Location: index.php');
?>
