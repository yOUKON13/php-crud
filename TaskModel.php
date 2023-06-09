<?php
require_once "database.php";

class TaskModel {
    public function __construct()
    {
        Database::Init();
    }

    public function GetAll(): array
    {
        $query = Database::$connection->query("SELECT * FROM tasks");
        return $query->fetchAll();
    }

    public function Create(string $task_message): array
    {
        $query = Database::$connection->query("INSERT INTO tasks (task_message, task_time) VALUES ('$task_message', '". date("Y-m-d h:m:s", time()) . "')");
        return $query->fetch();
    }

    public function Delete($task_id): array
    {
        $query = Database::$connection->query("DELETE FROM tasks WHERE task_id=$task_id");
        return $query->fetch();
    }

    public function Update($task_id, $task_message): array
    {
        $query = Database::$connection->query("UPDATE tasks SET task_message='$task_message' WHERE task_id=$task_id");
        return $query->fetch();
    }
}
?>