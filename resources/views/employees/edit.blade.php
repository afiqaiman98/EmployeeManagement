<!-- resources/views/employees/edit.blade.php -->
<x-app-layout>

<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

</head>
    <div class="container mt-5">
        <h1>Edit Employee</h1>

        <form method="POST" action="{{ route('employees.update', $employee->id) }}">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="name" class="form-label">Name:</label>
                <input type="text" class="form-control" name="name" value="{{ $employee->name }}" required>
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email:</label>
                <input type="email" class="form-control" name="email" value="{{ $employee->email }}" required>
            </div>

            <div class="mb-3">
                <label for="department" class="form-label">Department:</label>
                <select class="form-select" name="department">
                    <option value="Finance" {{ $employee->department == 'Finance' ? 'selected' : '' }}>Finance</option>
                    <option value="Sales" {{ $employee->department == 'Sales' ? 'selected' : '' }}>Sales</option>
                    <option value="Engineering" {{ $employee->department == 'Engineering' ? 'selected' : '' }}>Engineering</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Password:</label>
                <input type="password" class="form-control" name="password">
            </div>

            <button type="submit" class="btn btn-warning">Update Employee</button>
        </form>

        <a href="{{ route('employees.index') }}" class="btn btn-secondary mt-3">Back to Employee List</a>
    </x-app-layout>


