@extends('admin/admin_master')

@section('main')
<!-- <button type="button" style="background: #fd7e14;color:white;outline:none;border:none;padding:10px 50px;border-radius:25px;" data-toggle="modal" data-target="#exampleModal">Add Blog</button> -->
<div class="row">
  <div class="col-lg-12 col-md-12 col-sm-12 col-12">
    <div class="card py-3">
    <h3 class="text-center">Employees Detail</h3>
      <div class="card-body">
        <span class="flash_msg" id="notify" style="color:green;font-weight:600;font-size:18px;">{{session('msg')}}</span>
        <a href="{{url('admin/employee/addEmployee')}}" style="background: #fd7e14;color:white;outline:none;border:none;padding:10px 50px;border-radius:25px">Add Employee</a>
        <div class="table-responsive">
          <table class="table">
            <thead>
              <th>First Name</th>
              <th>Last Name</th>
              <th>Company</th>
              <th>Email</th>
              <th>Phone</th>
              <th>Action</th>
            </thead>
            <tbody>
                @if($data)
                    @foreach($data as $value)
                    <tr>
                        <td>{{$value->firstName}}</td>
                        <td>{{$value->lastName}}</td>
                        <td>{{$value->name}}</td>
                        <td>{{$value->email}}</td>
                        <td>{{$value->phone}}</td>
                        <td>
                            <a href="{{url('admin/employee/editEmployee/'.$value->id)}}" style="background: #fd7e14;color:white;outline:none;border:none;padding:10px 30px;border-radius:25px;">Edit</a>
                            <a href="{{url('admin/employee/deleteEmployee/'.$value->id)}}" style="background: #fd7e14;color:white;outline:none;border:none;padding:10px 30px;border-radius:25px;">Delete</a>
                        </td>
                    </tr>
                    @endforeach
                @else
                    <p>No Record Found</p>
                @endif
            </tbody>
          </table>
          <span>
            {{$data->links()}}
          </span>
          <style>
            .w-5{
              display: none;
            }
            .text-sm{
              margin-top:1rem;
            }
          </style>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection