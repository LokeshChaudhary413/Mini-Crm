@extends('admin/admin_master')

@section('main')
<div class="card p-3">
    <h2>Add Company</h2>
    <form action="{{url('admin/company/update')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="">Name</label>
            <input type="hidden" name="update_id" value="{{$data->id}}">
            <input type="text" name="name" class="form-control" value="{{$data->name}}" placeholder="Enter Company Name">
            @error('name')
            <span class="text-danger">{{$message}}</span>
            @enderror
        </div>
        <div class="form-group">
            <label for="">Email`</label>
            <input type="email" name="email" class="form-control" value="{{$data->email}}" placeholder="Enter Email">
        </div>
        <div class="">
            <label for="">Logo</label>
            <input type="file" name="logo" class="form-control">
            @if($data->logo)
                <img src="{{asset('/storage/'.$data->logo)}}" width="100" height="100" alt="">
            @endif
        </div>
        
        <div class="form-group">
            <label for="">Website</label>
            <input type="text" name="website" class="form-control" value="{{$data->website}}" placeholder="website url">
            <!-- @error('website')
            <span class="text-danger">{{$message}}</span>
            @enderror -->
        </div>
        <button class="w-100 mt-3" type="submit" style="background:#f96332;color:white;outline:none;border:none;padding:10px 50px;border-radius:25px;">Save</button>
    </form>
</div>

@endsection