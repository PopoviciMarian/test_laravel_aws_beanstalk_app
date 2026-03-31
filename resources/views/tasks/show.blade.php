@extends('layouts.app')
@section('title', $task->title)

@section('content')
<div class="card">
    <div style="display: flex; justify-content: space-between; align-items: flex-start; margin-bottom: 1rem;">
        <h2>{{ $task->title }}</h2>
        <span class="badge badge-{{ $task->status }}">
            {{ str_replace('_', ' ', ucfirst($task->status)) }}
        </span>
    </div>
    @if ($task->description)
        <p style="color: #4b5563; margin-bottom: 1rem;">{{ $task->description }}</p>
    @endif
    <p style="font-size: 0.8rem; color: #9ca3af; margin-bottom: 1.5rem;">
        Created {{ $task->created_at->format('M d, Y \a\t g:i A') }}
        &middot; Updated {{ $task->updated_at->format('M d, Y \a\t g:i A') }}
    </p>
    <div class="actions">
        <a href="{{ route('tasks.edit', $task) }}" class="btn btn-secondary btn-sm">Edit</a>
        <form action="{{ route('tasks.destroy', $task) }}" method="POST" onsubmit="return confirm('Delete this task?')">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
        </form>
        <a href="{{ route('tasks.index') }}" class="btn btn-secondary btn-sm" style="margin-left: auto;">Back to list</a>
    </div>
</div>
@endsection
