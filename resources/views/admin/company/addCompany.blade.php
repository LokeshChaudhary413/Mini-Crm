@extends('admin/admin_master')

@section('main')
<div class="card p-3">
   
    <h2>Add Company</h2>
    <form action="{{route('admin/company/submit')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="">Name</label>
            <input type="text" name="name" class="form-control" placeholder="Enter Company Name">
            @error('name')
            <span class="text-danger">{{$message}}</span>
            @enderror
        </div>
        <div class="form-group">
            <label for="">Email`</label>
            <input type="email" name="email" class="form-control" placeholder="Enter Email">
            @error('email')
            <span class="text-danger">{{$message}}</span>
            @enderror
        </div>
        <div class="">
            <label for="">Logo</label>
            <input type="file" name="logo" class="form-control">
            @error('logo')
            <span class="text-danger">{{$message}}</span>
            @enderror
        </div>
        
        <div class="form-group">
            <label for="">Website</label>
            <input type="text" name="website" class="form-control" placeholder="website url">
            <!-- @error('website')
            <span class="text-danger">{{$message}}</span>
            @enderror -->
        </div>
        <button class="w-100 mt-3" type="submit" style="background:#f96332;color:white;outline:none;border:none;padding:10px 50px;border-radius:25px;">Save</button>
    </form>
</div>

@endsection