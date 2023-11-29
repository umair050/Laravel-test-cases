<!-- resources/views/tasks/index.blade.php -->

<h1>Tasks</h1>

<ul>
    @foreach($tasks as $task)
        <li>{{ $task->title }} - {{ $task->description }}</li>
    @endforeach
</ul>
