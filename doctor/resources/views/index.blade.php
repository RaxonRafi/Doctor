@extends('layout.header')
@section('content')

<div class="container mt-5">
    <div class="row">
        <div class="col-12">

              @if(session('success'))
                  <div class=" alert alert-success">
                    {{session('success')}}
                    </div>

              @endif

        <div class="card" >
            <div class="card-header bg-info">
                <h5 class="card-title">Doctor Registration Form</h5>
            </div>
            <div class="card-body">
               <form action="{{route('store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                    <div class="form-group">
                        <label>Name</label>
                        <input type="name" class="form-control" placeholder="Enter Your Name" name="name">
                        @error('name')
                        <span class="text-danger">{{$message}}</span>
                        @enderror

                    </div>
                    <div class="form-group">
                        <label>Email address</label>
                        <input type="email" class="form-control" placeholder="Enter Your email" name="email">
                        @error('email')
                        <span class="text-danger">{{$message}}</span>
                        @enderror

                    </div>
                    <div class="form-group">
                        <label>Phone</label>
                        <input type="phone" class="form-control"  placeholder="Enter your Phone Number" name="phone">
                        @error('phone')
                        <span class="text-danger">{{$message}}</span>
                        @enderror

                    </div>
                     <div class="form-group">
                        <label>Upload Picture</label>
                        <input type="file" class="form-control" name="picture">
                        @error('picture')
                        <span class="text-danger">{{$message}}</span>
                        @enderror

                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
             </form>
            </div>
            </div>

        </div>


    </div>
</div>


@endsection


