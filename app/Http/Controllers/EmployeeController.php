<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function index()
    {
        $employees = Employee::all();
        return view('employees.index', compact('employees'));
    }

    public function create()
    {
        return view('employees.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|min:5|max:20',
            'age' => 'required|integer|min:21',
            'address' => 'required|min:10|max:40',
            'phone' => 'required|regex:/^08\d{7,10}$/'
        ]);
        
        Employee::create($validated);
        return redirect()->route('employees.index')->with('success', 'Karyawan berhasil ditambahkan!');
    }

    public function edit(Employee $employee)
    {
        return view('employees.edit', compact('employee'));
    }

    public function update(Request $request, Employee $employee)
    {
        $validated = $request->validate([
            'name' => 'required|min:5|max:20',
            'age' => 'required|integer|min:21',
            'address' => 'required|min:10|max:40',
            'phone' => 'required|regex:/^08\d{7,10}$/'
        ]);
        
        $employee->update($validated);
        return redirect()->route('employees.index')->with('success', 'Data karyawan berhasil diperbarui!');
    }

    public function destroy(Employee $employee)
    {
        $employee->delete();
        return redirect()->route('employees.index')->with('success', 'Karyawan berhasil dihapus!');
    }
}
