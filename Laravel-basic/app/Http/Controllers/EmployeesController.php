<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\employee;
class EmployeesController extends Controller
{
    public function employees_list(){
        $employees = DB::table('employees')->get();
        return view('employees',compact ('employees'));
    }

    public function employee_add(Request $request){
        
        //add data
        $employee =  new employee;
        $employee->Name = $request->input('employee_name');
        $employee->Department = $request->input('department');
        $employee->save();
        return redirect()->back()->with('success', 'Done!');
    }

    public function employee_delete(Request $request){
        $id = $request->input('employee_id');
        $deleted= DB::delete('delete from employees where EmployeeID = ?',[$id]);
        return redirect()->back()->with('success_delete', 'Done!');
    }
}

