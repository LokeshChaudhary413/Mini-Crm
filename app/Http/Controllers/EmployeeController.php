<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    
    public function index()
    {
        //
    }

    public function create()
    {
        $result['data'] = DB::table('companies')->get();
        return view('admin/employee/addEmployee',$result);
    }

    public function store(Request $request)
    {
        // return $request->post();
        $request->validate([
            'firstname'=>'required',
            'lastname'=>'required',
        ]);

        $model = new Employee();
        $model->firstName = $request->input('firstname');
        $model->lastName = $request->input('lastname');
        $model->company_id = $request->input('company_id');
        $model->email = $request->input('email');
        $model->phone = $request->input('phone');
        $model->save();
        $request->session()->flash('msg','Employee Added Successfully');
        return redirect("admin/employees");
    }

    public function show(Employee $employee)
    {

        $result['data'] = DB::table('employees')
        ->join('companies', 'companies.id', '=', 'employees.company_id')
        ->select('employees.*', 'companies.name')
        ->paginate(10);
        return view('admin/employee/employeesList',$result);
    }

    public function edit(Employee $employee, $id)
    {
        
        $result['data'] = Employee::find($id);
        $result['companies'] = DB::table('companies')->get();
        return view('admin/employee/editEmployee',$result);
    }

    public function update(Request $request, Employee $employee)
    {
        echo "update";
        $request->validate([
            'firstname'=>'required',
            'lastname'=>'required',
        ]);

        $model = Employee::find($request->input('update_id'));
        $model->firstName = $request->input('firstname');
        $model->lastName = $request->input('lastname');
        $model->company_id = $request->input('company_id');
        $model->email = $request->input('email');
        $model->phone = $request->input('phone');
        $model->save();
        $request->session()->flash('msg','Employee Updated Successfully');
        return redirect("admin/employees");
    }

    public function destroy(Request $request,$id)
    {
        Employee::find($id)->delete();
        $request->session()->flash('msg','Record Deleted');
        return redirect("admin/employees");
    }
}
