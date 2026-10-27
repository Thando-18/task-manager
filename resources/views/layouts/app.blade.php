<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Task Manager')</title>
    <style>
        :root { --bg:#f4f6f8; --card:#fff; --text:#1f2937; --muted:#6b7280; --primary:#2563eb; --danger:#dc2626; --border:#e5e7eb; }
        * { box-sizing: border-box; }
        body { margin:0; font-family: system-ui, -apple-system, Segoe UI, Roboto, sans-serif; background:var(--bg); color:var(--text); }
        header { background:var(--primary); color:#fff; padding:16px 24px; }
        header a { color:#fff; text-decoration:none; font-weight:600; font-size:1.2rem; }
        main { max-width:960px; margin:24px auto; padding:0 16px; }
        .card { background:var(--card); border:1px solid var(--border); border-radius:8px; padding:20px; overflow-x:auto; }
        .top { display:flex; justify-content:space-between; align-items:center; margin-bottom:16px; }
        h1 { margin:0; font-size:1.4rem; }
        .btn { display:inline-block; padding:8px 14px; border-radius:6px; border:0; background:var(--primary); color:#fff; text-decoration:none; cursor:pointer; font-size:.9rem; }
        .btn-secondary { background:#6b7280; }
        .btn-danger { background:var(--danger); }
        .btn-sm { padding:5px 10px; font-size:.8rem; }
        table { width:100%; border-collapse:collapse; }
        th, td { text-align:left; padding:10px 8px; border-bottom:1px solid var(--border); vertical-align:top; }
        th { font-size:.8rem; text-transform:uppercase; color:var(--muted); }
        .actions { display:flex; gap:6px; }
        .badge { padding:3px 8px; border-radius:999px; font-size:.75rem; font-weight:600; white-space:nowrap; }
        .badge-pending { background:#fef3c7; color:#92400e; }
        .badge-in_progress { background:#dbeafe; color:#1e40af; }
        .badge-completed { background:#d1fae5; color:#065f46; }
        .overdue { color:var(--danger); font-weight:600; }
        .alert { padding:10px 14px; border-radius:6px; margin-bottom:16px; }
        .alert-success { background:#d1fae5; color:#065f46; }
        .field { margin-bottom:16px; }
        label { display:block; font-weight:600; margin-bottom:6px; }
        input, textarea, select { width:100%; padding:9px 10px; border:1px solid var(--border); border-radius:6px; font:inherit; }
        input.invalid, textarea.invalid, select.invalid { border-color:var(--danger); }
        .error { color:var(--danger); font-size:.85rem; margin-top:4px; }
        .empty { text-align:center; color:var(--muted); padding:30px 0; }
        .pagination { margin-top:16px; }
        .pagination svg { width:16px; height:16px; }
        form.inline { display:inline; }
    </style>
</head>
<body>
    <header><a href="{{ route('tasks.index') }}">Task Manager</a></header>
    <main>
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        @yield('content')
    </main>
</body>
</html>
