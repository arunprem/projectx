@extends('admin.admin_master')
@section('admin')
    <div class="page-content">
        <div class="container-fluid">
            <div class="col-md-6 col-xl-6">
                <div class="card">
                    <br>
                    <center>
                        <img class="rounded-circle avatar-xl" src="{{ asset('backend/uploads/admin_images/'.$adminData->profile_image) }}"
                            alt="Card image cap">
                    </center>
                    <div class="card-body">
                        <h4 class="card-title"> Name : {{ $adminData->name }}</h4>
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">Username: {{ $adminData->username }}</li>
                        <li class="list-group-item">Email: {{ $adminData->email }}</li>
                    </ul>
                    <div class="card-body">
                        <a type="button" class="btn btn-info waves-effect waves-light" href="{{route('edit.profile')}}">Edit Profile</a>

                    </div>
                </div>
            </div><!-- end col -->
        </div>
    </div>
@endsection
