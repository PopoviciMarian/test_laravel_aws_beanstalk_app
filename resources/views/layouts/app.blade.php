<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task Manager-2 - @yield('title')</title>
    <style>
        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }
        body { font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif; background: #f3f4f6; color: #1f2937; line-height: 1.6; }
        .container { max-width: 800px; margin: 0 auto; padding: 2rem 1rem; }
        header { background: #4f46e5; color: white; padding: 1.5rem 0; margin-bottom: 2rem; }
        header .container { display: flex; justify-content: space-between; align-items: center; padding-top: 0; padding-bottom: 0; }
        header h1 { font-size: 1.5rem; font-weight: 700; }
        header a { color: white; text-decoration: none; background: rgba(255,255,255,0.2); padding: 0.5rem 1rem; border-radius: 0.375rem; font-size: 0.875rem; transition: background 0.2s; }
        header a:hover { background: rgba(255,255,255,0.3); }
        .card { background: white; border-radius: 0.5rem; box-shadow: 0 1px 3px rgba(0,0,0,0.1); padding: 1.5rem; margin-bottom: 1rem; }
        .alert { padding: 0.75rem 1rem; border-radius: 0.375rem; margin-bottom: 1rem; font-size: 0.875rem; }
        .alert-success { background: #d1fae5; color: #065f46; border: 1px solid #a7f3d0; }
        .form-group { margin-bottom: 1rem; }
        .form-group label { display: block; font-weight: 600; margin-bottom: 0.25rem; font-size: 0.875rem; color: #374151; }
        .form-group input, .form-group textarea, .form-group select {
            width: 100%; padding: 0.625rem 0.75rem; border: 1px solid #d1d5db; border-radius: 0.375rem;
            font-size: 0.9375rem; font-family: inherit; transition: border-color 0.2s;
        }
        .form-group input:focus, .form-group textarea:focus, .form-group select:focus { outline: none; border-color: #4f46e5; box-shadow: 0 0 0 3px rgba(79,70,229,0.1); }
        .form-group textarea { resize: vertical; min-height: 100px; }
        .form-group .error { color: #dc2626; font-size: 0.8rem; margin-top: 0.25rem; }
        .btn { display: inline-block; padding: 0.625rem 1.25rem; border-radius: 0.375rem; font-size: 0.875rem; font-weight: 600; text-decoration: none; border: none; cursor: pointer; transition: all 0.2s; font-family: inherit; }
        .btn-primary { background: #4f46e5; color: white; }
        .btn-primary:hover { background: #4338ca; }
        .btn-secondary { background: #6b7280; color: white; }
        .btn-secondary:hover { background: #4b5563; }
        .btn-danger { background: #dc2626; color: white; }
        .btn-danger:hover { background: #b91c1c; }
        .btn-sm { padding: 0.375rem 0.75rem; font-size: 0.8rem; }
        .actions { display: flex; gap: 0.5rem; align-items: center; }
        table { width: 100%; border-collapse: collapse; }
        th, td { text-align: left; padding: 0.75rem; border-bottom: 1px solid #e5e7eb; }
        th { font-size: 0.75rem; text-transform: uppercase; letter-spacing: 0.05em; color: #6b7280; font-weight: 600; }
        .badge { display: inline-block; padding: 0.2rem 0.6rem; border-radius: 9999px; font-size: 0.75rem; font-weight: 600; }
        .badge-pending { background: #fef3c7; color: #92400e; }
        .badge-in_progress { background: #dbeafe; color: #1e40af; }
        .badge-completed { background: #d1fae5; color: #065f46; }
        .empty-state { text-align: center; padding: 3rem 1rem; color: #9ca3af; }
        .empty-state p { font-size: 1.1rem; margin-bottom: 1rem; }
    </style>
</head>
<body>
    <header>
        <div class="container">
            <h1>Task Manager-2</h1>
            <a href="{{ route('tasks.create') }}">+ New Task</a>
        </div>
    </header>
    <div class="container">
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        @yield('content')
    </div>
</body>
</html>
