@extends('admin/admin_master')

@section('main')
<div class="card p-3">
   
    <h2>Add Employee</h2>
    <form action="{{route('admin/employee/submit')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="">First Name</label>
            <input type="text" name="firstname" class="form-control" placeholder="Enter firstname">
            @error('firstname')
            <span class="text-danger">{{$message}}</span>
            @enderror
        </div>
        <div class="form-group">
            <label for="">Lastname</label>
            <input type="text" name="lastname" class="form-control" placeholder="Enter lastname">
            @error('lastname')
            <span class="text-danger">{{$message}}</span>
            @enderror
        </div>
        <div class="form-group">
            <label for="">Company</label>
            <select name="company_id" class="form-control" id="">
                <option value="">Select Company</option>
                @foreach($data as $value)
                    <option value="{{$value->id}}">{{$value->name}}</option>
                @endforeach
            </select>
            @error('company_id')
            <span class="text-danger">{{$message}}</span>
            @enderror
        </div>
        <div class="form-group">
            <label for="">Email</label>
            <input type="email" name="email" class="form-control" placeholder="Enter Email">
            @error('email')
            <span class="text-danger">{{$message}}</span>
            @enderror
        </div>
        
        <div class="form-group">
            <label for="">Phone</label>
            <input type="number" name="phone" class="form-control" placeholder="Enter Mobile No.">
            @error('phone')
            <span class="text-danger">{{$message}}</span>
            @enderror
        </div>
        <button class="w-100 mt-3" type="submit" style="background:#f96332;color:white;outline:none;border:none;padding:10px 50px;border-radius:25px;">Save</button>
    </form>
</div>

@endsection