<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Personal Task Manager</title>

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: Arial, Helvetica, sans-serif;
            background: #0f172a;
            color: #e2e8f0;
            min-height: 100vh;
        }

        .topbar {
            background: #111827;
            border-bottom: 1px solid #263244;
            padding: 18px 32px;
        }

        .topbar-inner {
            max-width: 1150px;
            margin: auto;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .brand {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .brand-icon {
            width: 42px;
            height: 42px;
            border-radius: 12px;
            background: linear-gradient(135deg, #6366f1, #8b5cf6);
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
            font-size: 20px;
            color: white;
        }

        .brand h2 {
            margin: 0;
            font-size: 19px;
            color: white;
        }

        .brand small {
            color: #94a3b8;
        }

        .container {
            max-width: 1150px;
            margin: 40px auto;
            padding: 0 22px 50px;
        }

        .hero {
            background: linear-gradient(135deg, #1e293b, #172033);
            border: 1px solid #2d3a4f;
            border-radius: 18px;
            padding: 30px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 25px;
            margin-bottom: 24px;
        }

        .hero h1 {
            margin: 0 0 8px;
            color: white;
            font-size: 30px;
        }

        .hero p {
            margin: 0;
            color: #94a3b8;
        }

        .add-button {
            background: linear-gradient(135deg, #6366f1, #7c3aed);
            color: white;
            text-decoration: none;
            padding: 12px 20px;
            border-radius: 10px;
            font-weight: bold;
            white-space: nowrap;
            box-shadow: 0 8px 20px rgba(99, 102, 241, 0.25);
        }

        .stats {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 16px;
            margin-bottom: 24px;
        }

        .stat-card {
            background: #172033;
            border: 1px solid #2d3a4f;
            border-radius: 14px;
            padding: 20px;
        }

        .stat-label {
            color: #94a3b8;
            font-size: 14px;
            margin-bottom: 8px;
        }

        .stat-number {
            font-size: 28px;
            font-weight: bold;
            color: white;
        }

        .success {
            background: #12382f;
            border: 1px solid #1f6b56;
            color: #a7f3d0;
            padding: 14px 16px;
            border-radius: 10px;
            margin-bottom: 20px;
        }

        .section-title {
            margin: 0 0 14px;
            color: white;
            font-size: 19px;
        }

        .task-list {
            display: grid;
            gap: 14px;
        }

        .task-card {
            background: #172033;
            border: 1px solid #2d3a4f;
            border-radius: 15px;
            padding: 20px;
            transition: transform 0.2s ease, border-color 0.2s ease;
        }

        .task-card:hover {
            transform: translateY(-2px);
            border-color: #475569;
        }

        .task-header {
            display: flex;
            justify-content: space-between;
            gap: 20px;
            align-items: flex-start;
        }

        .task-name {
            margin: 0 0 8px;
            color: #f8fafc;
            font-size: 19px;
        }

        .task-description {
            margin: 0;
            color: #94a3b8;
            line-height: 1.5;
        }

        .status {
            display: inline-flex;
            padding: 6px 11px;
            border-radius: 999px;
            font-size: 12px;
            font-weight: bold;
        }

        .status.pending {
            background: #422f13;
            color: #fcd34d;
        }

        .status.completed {
            background: #12382f;
            color: #6ee7b7;
        }

        .task-info {
            display: flex;
            gap: 18px;
            flex-wrap: wrap;
            margin-top: 15px;
            color: #94a3b8;
            font-size: 13px;
        }

        .actions {
            display: flex;
            flex-wrap: wrap;
            gap: 9px;
            margin-top: 18px;
            padding-top: 16px;
            border-top: 1px solid #293548;
        }

        .actions form {
            margin: 0;
        }

        button,
        .edit-button {
            border: none;
            border-radius: 8px;
            padding: 9px 13px;
            font-size: 13px;
            font-weight: bold;
            cursor: pointer;
            text-decoration: none;
        }

        .status-button {
            background: #0f766e;
            color: white;
        }

        .edit-button {
            background: #2563eb;
            color: white;
        }

        .delete-button {
            background: #7f1d1d;
            color: #fecaca;
        }

        .empty {
            background: #172033;
            border: 1px dashed #475569;
            border-radius: 15px;
            padding: 55px 20px;
            text-align: center;
        }

        .empty-icon {
            width: 60px;
            height: 60px;
            margin: 0 auto 15px;
            border-radius: 18px;
            background: #263244;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 25px;
        }

        .empty h3 {
            margin: 0 0 7px;
            color: white;
        }

        .empty p {
            margin: 0;
            color: #94a3b8;
        }

        @media (max-width: 700px) {
            .hero {
                flex-direction: column;
                align-items: flex-start;
            }

            .stats {
                grid-template-columns: 1fr;
            }

            .task-header {
                flex-direction: column;
            }

            .add-button {
                width: 100%;
                text-align: center;
            }
        }
    </style>
</head>

<body>

<div class="topbar">
    <div class="topbar-inner">
        <div class="brand">
            <div class="brand-icon">✓</div>

            <div>
                <h2>Personal Task Manager</h2>
                <small>Stay organized. Get things done.</small>
            </div>
        </div>
    </div>
</div>

<div class="container">

    <div class="hero">
        <div>
            <h1>My Task Dashboard</h1>
            <p>Plan your work, track your progress, and finish tasks on time.</p>
        </div>

        <a href="{{ route('tasks.create') }}" class="add-button">
            + Add New Task
        </a>
    </div>

    @if (session('success'))
        <div class="success">
            ✓ {{ session('success') }}
        </div>
    @endif

    <div class="stats">
        <div class="stat-card">
            <div class="stat-label">Total Tasks</div>
            <div class="stat-number">{{ $tasks->count() }}</div>
        </div>

        <div class="stat-card">
            <div class="stat-label">Pending</div>
            <div class="stat-number">
                {{ $tasks->where('status', 'Pending')->count() }}
            </div>
        </div>

        <div class="stat-card">
            <div class="stat-label">Completed</div>
            <div class="stat-number">
                {{ $tasks->where('status', 'Completed')->count() }}
            </div>
        </div>
    </div>

    <h2 class="section-title">Your Tasks</h2>

    @forelse ($tasks as $task)

        <div class="task-list">

            <div class="task-card">

                <div class="task-header">
                    <div>
                        <h3 class="task-name">
                            {{ $task->task_name }}
                        </h3>

                        <p class="task-description">
                            {{ $task->description ?: 'No description provided.' }}
                        </p>
                    </div>

                    <span class="status {{ $task->status === 'Completed' ? 'completed' : 'pending' }}">
                        {{ $task->status }}
                    </span>
                </div>

                <div class="task-info">
                    <span>
                        📅 Due:
                        {{ $task->due_date->format('M d, Y') }}
                    </span>

                    <span>
                        #{{ $task->id }}
                    </span>
                </div>

                <div class="actions">

                    <form action="{{ route('tasks.status', $task) }}" method="POST">
                        @csrf
                        @method('PATCH')

                        <input
                            type="hidden"
                            name="status"
                            value="{{ $task->status === 'Completed' ? 'Pending' : 'Completed' }}">

                        <button type="submit" class="status-button">
                            {{ $task->status === 'Completed' ? 'Mark Pending' : 'Mark Completed' }}
                        </button>
                    </form>

                    <a href="{{ route('tasks.edit', $task) }}" class="edit-button">
                        Edit Task
                    </a>

                    <form action="{{ route('tasks.destroy', $task) }}" method="POST">
                        @csrf
                        @method('DELETE')

                        <button type="submit" class="delete-button">
                            Delete
                        </button>
                    </form>

                </div>

            </div>

        </div>

    @empty

        <div class="empty">
            <div class="empty-icon">✓</div>
            <h3>No tasks yet</h3>
            <p>Create your first task and start getting things done.</p>
        </div>

    @endforelse

</div>

</body>
</html>
