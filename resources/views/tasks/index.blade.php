@extends('layouts.app')
@section('title', 'All Tasks')

@section('content')
<div class="card">
    @if ($tasks->isEmpty())
        <div class="empty-state">
            <p>No tasks yet.</p>
            <a href="{{ route('tasks.create') }}" class="btn btn-primary">Create your first task</a>
        </div>
    @else
        <table>
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Status</th>
                    <th>Created</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($tasks as $task)
                <tr>
                    <td><a href="{{ route('tasks.show', $task) }}">{{ $task->title }}</a></td>
                    <td>
                        <span class="badge badge-{{ $task->status }}">
                            {{ str_replace('_', ' ', ucfirst($task->status)) }}
                        </span>
                    </td>
                    <td>{{ $task->created_at->format('M d, Y') }}</td>
                    <td>
                        <div class="actions">
                            <a href="{{ route('tasks.edit', $task) }}" class="btn btn-secondary btn-sm">Edit</a>
                            <form action="{{ route('tasks.destroy', $task) }}" method="POST" onsubmit="return confirm('Delete this task?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                            </form>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
@endsection
