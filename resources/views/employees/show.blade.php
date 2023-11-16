<!-- resources/views/employees/show.blade.php -->
<x-app-layout>

<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

</head>

    <div class="container mt-5">
        <h1>Employee Details</h1>

        <div class="card">
            <div class="card-body">
                <p><strong>ID:</strong> {{ $employee->id }}</p>
                <p><strong>Name:</strong> {{ $employee->name }}</p>
                <p><strong>Email:</strong> {{ $employee->email }}</p>
                <p><strong>Department:</strong> {{ $employee->department }}</p>
            </div>
        </div>

        <a href="{{ route('employees.index') }}" class="btn btn-secondary mt-3">Back to Employee List</a>
    </div>
</x-app-layout>

