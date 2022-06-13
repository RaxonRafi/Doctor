@extends('layout.header')
@section('content')
<div class="container m-5">
    <div class="row">
        <div class="col-12">
            <div class="card">
                @if (session('delete'))
                     <div class="alert alert-danger">
                        {{session('delete')}}
                     </div>
                @endif

                <div class="card-header bg-info">
                    <h5 class="card-title">List Of Registered Doctors</h5>
                </div>
                <div class="card-body">
                   <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Sl No.</th>
                                <th>Name</th>
                                <th>Phone</th>
                                <th>Email</th>
                                <th>Photo</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($lists as $list)
                        <tr>

                                <td>{{$list->id}}</td>
                                <td>{{$list->name}}</td>
                                <td>{{$list->phone}}</td>
                                <td>{{$list->email}}</td>
                                <td>
                                    <img width="100px" src="{{asset('uploads/photo')}}/{{$list->picture}}" alt="">
                                </td>
                                <td>


                                <a href="{{url('doctor/delete')}}/{{$list->id}}" type="button" class="btn btn-outline-danger">Delete</a>
                                <a href="{{url('doctor/edit')}}/{{$list->id}}" type="button" class="btn btn-outline-info">Edit</a>
                                </td>
                            </tr>
                           @endforeach
                        </tbody>
                   </table>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection

