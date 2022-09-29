<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employees = Employee::all();

        return view('karyawan.table', compact('employees'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $agama = ["Islam", "Katolik", "Protestan", "Buddha", "Hindu", "Konghucu"];

        return view('karyawan.create', [
            'categories' => Category::all(),
            'agama' => $agama
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $newData = $request->validate([
            'nip' => 'required|max:12',
            'nik' => 'required|max:12',
            'nama' => 'required|max:100',
            'jenis_kelamin' => 'required',
            'tempat_lahir' => 'required|max:100',
            'tanggal_lahir' => 'required|date',
            'telpon' => 'required|max:12',
            'agama' => 'required|max:15',
            'status_nikah' => 'required',
            'alamat' => 'required',
            'golongan_id' => 'required',
            'foto' => 'nullable|image|file',

        ]);

        if ($request->file('foto')) {
            $newData['foto'] = $request->file('foto')->store('foto-pribadi');
        }

        Employee::create($newData);

        return redirect('/employee')->with('success', 'You did it man!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function show(Employee $employee)
    {
        return view('karyawan.details', [
            'employee' => $employee,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function edit(Employee $employee)
    {
        $agama = ["Islam", "Katolik", "Protestan", "Buddha", "Hindu", "Konghucu"];


        return view('karyawan.edit', [
            'categories' => Category::all(),
            'employee' => $employee,
            'agama' => $agama
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Employee $employee)
    {
        $rules = [
            'nip' => 'required|max:12',
            'nik' => 'required|max:12',
            'nama' => 'required|max:100',
            'jenis_kelamin' => 'required',
            'tempat_lahir' => 'required|max:100',
            'tanggal_lahir' => 'required|date_format:Y-m-d',
            'telpon' => 'required|max:12',
            'agama' => 'required|max:15',
            'status_nikah' => 'required',
            'alamat' => 'required',
            'golongan_id' => 'required',
            'foto' => 'nullable|image|file'
        ];



        $updateData = $request->validate($rules);

        if ($request->file('foto')) {
            if ($request->oldFoto) {
                Storage::delete($request->oldFoto);
            }
            $updateData['foto'] = $request->file('foto')->store('foto-pribadi');
        }

        Employee::where('id', $employee->id)
            ->update($updateData);

        return redirect('/employee')->with('success', 'Change is normal');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function destroy(Employee $employee)
    {
        if ($employee->foto) {
            Storage::delete($employee->foto);
        }


        Employee::destroy($employee->id);

        return redirect('/employee');
    }
}
