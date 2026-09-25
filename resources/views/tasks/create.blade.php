<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Task · Personal Task Manager</title>

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            min-height: 100vh;
            font-family: Arial, Helvetica, sans-serif;
            background: #0f172a;
            color: #e2e8f0;
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
            color: white;
            font-size: 20px;
            font-weight: bold;
        }

        .brand h2 {
            margin: 0;
            color: white;
            font-size: 19px;
        }

        .brand small {
            color: #94a3b8;
        }

        .container {
            max-width: 850px;
            margin: 45px auto;
            padding: 0 22px 50px;
        }

        .page-heading {
            margin-bottom: 24px;
        }

        .page-heading h1 {
            margin: 0 0 7px;
            font-size: 30px;
            color: #f8fafc;
        }

        .page-heading p {
            margin: 0;
            color: #94a3b8;
        }

        .form-card {
            background: #172033;
            border: 1px solid #2d3a4f;
            border-radius: 18px;
            padding: 28px;
            box-shadow: 0 20px 45px rgba(0, 0, 0, 0.18);
        }

        .field {
            margin-bottom: 22px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            color: #f8fafc;
            font-size: 14px;
            font-weight: bold;
        }

        .hint {
            color: #64748b;
            font-weight: normal;
            font-size: 12px;
        }

        input,
        textarea,
        select {
            width: 100%;
            padding: 13px 14px;
            border: 1px solid #334155;
            border-radius: 10px;
            background: #111827;
            color: #f8fafc;
            font-size: 15px;
        }

        input:focus,
        textarea:focus,
        select:focus {
            outline: none;
            border-color: #7c3aed;
            box-shadow: 0 0 0 3px rgba(124, 58, 237, 0.15);
        }

        textarea {
            min-height: 140px;
            resize: vertical;
        }

        .row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 18px;
        }

        .buttons {
            display: flex;
            gap: 10px;
            margin-top: 8px;
            padding-top: 20px;
            border-top: 1px solid #293548;
        }

        .save-button,
        .cancel-button {
            border-radius: 9px;
            padding: 11px 18px;
            font-size: 14px;
            font-weight: bold;
            text-decoration: none;
        }

        .save-button {
            border: none;
            background: linear-gradient(135deg, #6366f1, #7c3aed);
            color: white;
            cursor: pointer;
            box-shadow: 0 8px 18px rgba(99, 102, 241, 0.22);
        }

        .cancel-button {
            background: #263244;
            border: 1px solid #334155;
            color: #cbd5e1;
        }

        .error-box {
            background: #451a1a;
            border: 1px solid #7f1d1d;
            color: #fecaca;
            padding: 16px;
            border-radius: 10px;
            margin-bottom: 20px;
        }

        .error-box ul {
            margin-bottom: 0;
        }

        @media (max-width: 650px) {
            .row {
                grid-template-columns: 1fr;
            }

            .buttons {
                flex-direction: column;
            }

            .save-button,
            .cancel-button {
                width: 100%;
                text-align: center;
            }
        }
    </style>
</head>

<body>

<div class="topbar">
    <div class="topbar-inner">

        <div class="brand-icon">✓</div>

        <div class="brand">
            <h2>Personal Task Manager</h2>
            <small>Stay organized. Get things done.</small>
        </div>

    </div>
</div>

<div class="container">

    <div class="page-heading">
        <h1>Create a New Task</h1>
        <p>Add the details below and keep your work organized.</p>
    </div>

    @if ($errors->any())
        <div class="error-box">
            <strong>Please fix the following:</strong>

            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="form-card">

        <form action="{{ route('tasks.store') }}" method="POST">
            @csrf

            <div class="field">
                <label for="task_name">
                    Task Name
                    <span class="hint">— required</span>
                </label>

                <input
                    id="task_name"
                    type="text"
                    name="task_name"
                    value="{{ old('task_name') }}"
                    placeholder="What needs to be done?"
                    required>
            </div>

            <div class="field">
                <label for="description">
                    Description
                    <span class="hint">— optional</span>
                </label>

                <textarea
                    id="description"
                    name="description"
                    placeholder="Add more details about this task...">{{ old('description') }}</textarea>
            </div>

            <div class="row">

                <div class="field">
                    <label for="status">Status</label>

                    <select id="status" name="status" required>
                        <option
                            value="Pending"
                            {{ old('status', 'Pending') === 'Pending' ? 'selected' : '' }}>
                            Pending
                        </option>

                        <option
                            value="Completed"
                            {{ old('status') === 'Completed' ? 'selected' : '' }}>
                            Completed
                        </option>
                    </select>
                </div>

                <div class="field">
                    <label for="due_date">Due Date</label>

                    <input
                        id="due_date"
                        type="date"
                        name="due_date"
                        value="{{ old('due_date') }}"
                        required>
                </div>

            </div>

            <div class="buttons">

                <button type="submit" class="save-button">
                    Create Task
                </button>

                <a href="{{ route('tasks.index') }}" class="cancel-button">
                    Cancel
                </a>

            </div>

        </form>

    </div>

</div>

</body>
</html>
