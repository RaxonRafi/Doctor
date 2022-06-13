@extends('layout.header')
@section('content')
<div class="container mt-5">
    <div class="row">
        <div class="col-12">
       @if (session('success'))
       <div class="alert alert-success">
        {{session('success')}}
       </div>

       @endif
            <div class="card">
                <div class="card-header bg-info">
                  <h1>Update Info</h1>
                </div>
                <div class="card-body">
                    <form  action="{{url('doctor/info/update')}}/{{$doctor_info->id}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" class="form-control" value="{{$doctor_info->name}}"  name="name">

                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" class="form-control" value="{{$doctor_info->email}}"  name="email">

                    </div>
                    <div class="form-group">
                        <label>Phone</label>
                        <input type="phone" class="form-control"  value="{{$doctor_info->phone}} "name="phone">

                    </div>
                    <div class="form-group">
                        <label>Picture</label>
                        <input type="file" class="form-control" name="picture">
                        <img width="100px" src="{{asset('uploads/photo')}}/{{$doctor_info->picture}}" alt="">

                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
