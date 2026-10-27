@extends('layouts.app')

@section('title', 'All Tasks')

@section('content')
    <div class="top">
        <h1>All Tasks</h1>
        <a href="{{ route('tasks.create') }}" class="btn">+ Add Task</a>
    </div>

    <div class="card">
        <table>
            <thead>
                <tr>
                    <th>#</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Due Date</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($tasks as $task)
                    <tr>
                        <td>{{ $task->id }}</td>
                        <td><strong>{{ $task->title }}</strong></td>
                        <td>{{ \Illuminate\Support\Str::limit($task->description, 60) }}</td>
                        <td class="{{ $task->is_overdue ? 'overdue' : '' }}">
                            {{ $task->due_date->format('d M Y') }}
                            @if ($task->is_overdue) <small>(overdue)</small> @endif
                        </td>
                        <td><span class="badge badge-{{ $task->status }}">{{ $task->status_label }}</span></td>
                        <td>
                            <div class="actions">
                                <a href="{{ route('tasks.edit', $task) }}" class="btn btn-sm">Edit</a>
                                <form method="POST" action="{{ route('tasks.destroy', $task) }}" class="inline"
                                      onsubmit="return confirm('Delete this task?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="6" class="empty">No tasks yet. Click "Add Task" to create one.</td></tr>
                @endforelse
            </tbody>
        </table>

        <div class="pagination">{{ $tasks->links() }}</div>
    </div>
@endsection
