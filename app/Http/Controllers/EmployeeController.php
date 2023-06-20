<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class EmployeeController extends Controller
{
    public function index()
    {
        $this->authorize('view', User::class);

        $employees = User::where('role', 'karyawan')->get();

        return view('employees.index', compact('employees'));
    }

    public function create()
    {
        $this->authorize('create', User::class);

        return view('employees.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|unique:users|email:dns|max:255',
            'password' => 'required|min:5|max:255',
            'phone_number' => 'required|numeric|digits_between:10,13|unique:users',
            'address' => 'required|max:255',
        ]);

        $validatedData['uuid'] = Str::uuid();
        $validatedData['role'] = 'karyawan';
        $validatedData['password'] = bcrypt($validatedData['password']);

        User::create($validatedData);

        return redirect('employees')->with('success', 'Karyawan berhasil ditambahkan');
    }


    public function edit(User $employee)
    {
        $this->authorize('update', $employee);

        return view('employees.edit', compact('employee'));
    }

    public function update(Request $request, User $employee)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email:dns|max:255|unique:users,email,' . $employee->uuid . ',uuid',
            'phone_number' => 'required|numeric|digits_between:10,13|unique:users,phone_number,' . $employee->uuid . ',uuid',
            'address' => 'required|max:255',
        ]);

        $employee->update($validatedData);

        return redirect('employees')->with('success', 'Karyawan berhasil diubah');
    }

    public function destroy(User $employee)
    {
        $this->authorize('delete', $employee);

        $employee->delete();

        return redirect('employees')->with('success', 'Karyawan berhasil dihapus');
    }
}
