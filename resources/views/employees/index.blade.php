<!-- resources/views/employees/index.blade.php -->
<x-app-layout>

<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>

<div class="container mt-5">
    <h1 class="mb-4">Employee List</h1>
    <a href="{{ route('employees.create') }}" class="btn btn-primary">Add New Employee</a>

    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Department</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($employees as $employee)
        <tr>
            <td>{{ $employee->id }}</td>
            <td>{{ $employee->name }}</td>
            <td>{{ $employee->email }}</td>
            <td>{{ $employee->department }}</td>


            @if ($employee->usertype == 'admin')
            <td>ADMIN</td>
            @else
            <td>
                <a href="{{ route('employees.show', $employee->id) }}" class="btn btn-info btn-sm">View</a>
                <a href="{{ route('employees.edit', $employee->id) }}" class="btn btn-warning btn-sm">Edit</a>
                
                <!-- Add the delete button -->
                <form action="{{ route('employees.destroy', $employee->id) }}" method="POST" style="display: inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this employee?')">Delete</button>
                </form>
            </td>
            @endif
        </tr>
@endforeach

        </tbody>
    </table>
</div>

<!-- Include Bootstrap JS and Popper.js before closing </body> tag -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.1/dist/umd/popper.min.js" integrity="sha384-xzBw8zTz1R7U6HyEedEg8e0PMSpbJkD+Pb5QZ8OQq8CzPjMTK87A9d9P4QKfd3e" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.min.js" integrity="sha384-EV1v7HhhLVBfS4e7goGxp4FZt77jzFb8gOjkoCjG6Agh3Dpu6b3deaf6S8blR6hj" crossorigin="anonymous"></script>
</x-app-layout>

