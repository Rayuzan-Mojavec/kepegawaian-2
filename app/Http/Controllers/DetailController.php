<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;

class DetailController extends Controller
{
    public function index()
    {
        $employees = Employee::all();

        return view('collective.details', compact('employees'));
    }
}
