<?php
namespace App\Services;

use App\Models\Task;

class TaskService
{
    public function getAllTasks()
    {
        // dd(request('id'));
        $taskId = request('id');
        return Task::find($taskId);
    }

    public function getTaskById($taskId)
    {
        return Task::find($taskId);
    }

    public function createTask()
    {
        // $data = request->all();
        return Task::create([
            'title' => request('title'),
            'description' => request('description'),
        ]);
    }

    public function updateTask($taskId, $data)
    {
        $task = Task::find($taskId);

        if ($task) {
            $task->update($data);
            return $task;
        }

        return null; // or handle accordingly
    }

    public function deleteTask($taskId)
    {
        $task = Task::find($taskId);

        if ($task) {
            $task->delete();
            return true;
        }

        return false; // or handle accordingly
    }
}
