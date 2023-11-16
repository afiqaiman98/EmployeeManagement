<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $employees = User::all();
        return view('employees.index', compact('employees'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('employees.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users|max:255',
            'usertype' => 'nullable|string|max:255', // Adjust as needed
            'department' => 'nullable|in:Finance,Sales,Engineering',
            'password' => 'required|string|min:8',
        ]);
    
        $employee = new User();
        $employee->name = $request->name;
        $employee->email = $request->email;
        $employee->usertype = 'employee'; // Adjust as needed
        $employee->email_verified_at = now();
        $employee->department = $request->department;
        $employee->password = Hash::make($request->password);
        $employee->save();
    
        return redirect()->route('employees.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $employee)
    {
        return view('employees.show', compact('employee'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $employee)
    {
        return view('employees.edit', compact('employee'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $employee)
    {
        $employee->update($request->all());

        return redirect()->route('employees.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $employee)
    {
        $employee->delete();

        return redirect()->route('employees.index');
    }
}
