<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Task;
use App\Services\TaskService;

class TaskController extends Controller
{
    // TaskController.php

    protected $taskService;

    public function __construct(TaskService $taskService)
    {
        $this->taskService = $taskService;
    }

public function index()
{
    return $tasks = $this->taskService->getAllTasks();
    
    // return view('tasks.index', compact('tasks'));
}

public function create()
{
    return view('tasks.create');
}

public function store()
{
    // $task = Task::create($request->all());
    return $task = $this->taskService->createTask();
    // return redirect()->route('tasks.index');
}

public function edit(Task $task)
{
    return view('tasks.edit', compact('task'));
}

public function update(Request $request, Task $task)
{
    $task->update($request->all());
    return redirect()->route('tasks.index');
}

public function destroy(Task $task)
{
    $task->delete();
    return redirect()->route('tasks.index');
}

}
