<?php

namespace App\Http\Controllers;

use App\Models\Auth;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function index()
    {
        return view('admin.login');
    }

    public function auth(Request $request)
    {
        $email = $request->post('email');
        $password = $request->post('password');

        $result = Auth::where(['email'=>$email, 'password'=> $password])->get(); 
        if(isset($result['0']->id)){
            $request->session()->put('ADMIN_LOGIN',true);
            $request->session()->put('ADMIN_ID',$result['0']->id);
            $request->session()->put('ADMIN_NAME',$result['0']->name);
            $request->session()->put('USER_TYPE',$result['0']->user_type);
            return redirect('admin/dashboard');
        }else{
            $request->session()->flash('error','Please Enter Valid Login Details');
            return redirect('/');
        }
    }

    public function dashboard()
    {
        return view('admin.dashboard');
    }

    public function register()
    {
        return view('admin/register');
    }

    public function register_process(Request $request)
    {
        // return $request->post();
        $request->validate([
            'name'=>'required',
            'email'=>'required|email|unique:auths',
            'gender'=>'required',
            'password'=>'required',
        ]);

            $model = new Auth();
            $model->name = $request->input('name');
            $model->email = $request->input('email');
            $model->gender = $request->input('gender');
            $model->password = $request->input('password');
            $model->save();
            $request->session()->flash('msg','Registration Successfull');
            return redirect('/');
        }
    
    public function logout()
    {
        session()->forget('ADMIN_ID');
        return redirect('/');
    }
}
