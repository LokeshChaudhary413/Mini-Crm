<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    
    public function index()
    {
        //
    }

  
    public function create()
    {
        return view('admin/company/addCompany');
    }

   
    public function store(Request $request)
    {
        // return $request->post();
        $request->validate([
            'name'=>'required',
        ]);

        $model = new Company();
        $model->name = $request->input('name');
        $model->email = $request->input('email');
        $model->website = $request->input('website');
        if($request->hasFile('logo')){
            $image = $request->file('logo');
            $ext = $image->extension();
            $image_name = time().'.'.$ext;
            $image->storeAs('/public',$image_name);
            $model->logo=$image_name;
        }
        $model->save();
        $request->session()->flash('msg','Company Added Successfully');
        return redirect("admin/companies");
    }

    public function show(Company $company)
    {
        $result['data'] = Company::paginate(10);
        return view('admin/company/companyList',$result);
    }

    
    public function edit(Company $company,$id)
    {
        $result['data'] = Company::find($id);
        return view('admin/company/editCompany',$result);
    }

    
    public function update(Request $request, Company $company)
    {
        $request->validate([
            'name'=>'required',
        ]);

        $model = Company::find($request->post('update_id'));
        $model->name = $request->input('name');
        $model->email = $request->input('email');
        $model->website = $request->input('website');
        if($request->hasFile('logo')){
            $image = $request->file('logo');
            $ext = $image->extension();
            $image_name = time().'.'.$ext;
            $image->storeAs('/public',$image_name);
            $model->logo=$image_name;
        }
        $model->save();
        $request->session()->flash('msg','Company Updated Successfully');
        return redirect("admin/companies");
    }

    public function destroy(Company $company,$id)
    {
        Company::find($id)->delete();
        $request->session()->flash('msg','Record Deleted');
        return redirect("admin/companies");
    }
}
