<!DOCTYPE html>
<html lang="en">

<head>
    <title>Todo List</title>
    <link rel="stylesheet" type="text/css" href="style.css" />
</head>

<body>
    <nav>
        <a class="heading" href="#">ToDo App</a>
    </nav>
    <div class="container">
        <div class="input-area">
            <form method="POST" action="add_task.php">
                <input type="text" name="task" 
                     placeholder="Write your tasks here..." required />
                <button class="btn" name="add">
                    Add Task
                </button>
            </form>
        </div>
        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Tasks</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                require 'config.php';
                try {
                    // Fetch all tasks from database
                    $stmt = $db->query("SELECT * FROM task ORDER BY task_id ASC");
                    $tasks = $stmt->fetchAll(PDO::FETCH_ASSOC);
                    $count = 1;
                    
                    foreach ($tasks as $task) {
                ?>
                        <tr class="border-bottom">
                            <td><?php echo $count++; ?></td>
                            <td><?php echo htmlspecialchars($task['task']); ?></td>
                            <td><?php echo htmlspecialchars($task['status']); ?></td>
                            <td colspan="2" class="action">
                                <?php if ($task['status'] !== 'Done') : ?>
                                    <a href="update_task.php?task_id=<?php echo $task['task_id']; ?>" 
                                       class="btn-completed" 
                                       title="Mark Complete">
                                        ✓
                                    </a>
                                <?php endif; ?>
                                <a href="delete_task.php?task_id=<?php echo $task['task_id']; ?>" 
                                   class="btn-remove" 
                                   title="Delete Task"
                                   onclick="return confirm('Are you sure you want to delete this task?')">
                                    ✗
                                </a>
                            </td>
                        </tr>
                <?php
                    }
                } catch (PDOException $e) {
                    echo '<tr><td colspan="4">Error loading tasks: ' . htmlspecialchars($e->getMessage()) . '</td></tr>';
                }
                ?>
            </tbody>
        </table>
    </div>
</body>

</html>