@extends('admin.admin_master')
@section('admin')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Dashboard</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Profle</a></li>
                                <li class="breadcrumb-item active">Profile Edit</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Edit Profile</h4>
                            <p class="card-title-desc">Profle details <code class="highlighter-rouge">.can be updated</code>
                            <form method="post" action="{{ route('store.profile') }}" enctype="multipart/form-data">
                                @csrf
                                <div class="row mb-3">
                                    <label for="name-input" class="col-sm-2 col-form-label">Name</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" name="name" type="text"
                                            value="{{ $editProfileData->name }}" placeholder="Name" id="name-input">
                                    </div>
                                </div>
                                <!-- end row -->
                                <div class="row mb-3">
                                    <label for="username-input" class="col-sm-2 col-form-label">Username</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" name="username" type="text"
                                            value="{{ $editProfileData->username }}" placeholder="Username"
                                            id="username-input">
                                    </div>
                                </div>
                                <!-- end row -->
                                <div class="row mb-3">
                                    <label for="email-input" class="col-sm-2 col-form-label">Email</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" name="email" type="email"
                                            value="{{ $editProfileData->email }}" placeholder="somthing@example.com"
                                            id="email-input">
                                    </div>
                                </div>


                                <div class="row mb-3">
                                    <label for="profileImage-input" class="col-sm-2 col-form-label">Profile Image</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" name="profile_image" type="file"
                                            value="{{ $editProfileData->profile_image }}" id="profileImage-input">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="profileImage-input" class="col-sm-2 col-form-label"></label>
                                    <div class="col-sm-10">
                                        <img id="showImage" class="rounded avatar-lg"
                                            src="{{!empty($editProfileData->profile_image)? url('backend/uploads/admin_images/'.$editProfileData->profile_image):url('images/no_image.jpg') }}" alt="Card image cap">
                                    </div>
                                </div>
                                <input type="submit" value="Update Profile"
                                    class="btn btn-info waves-effect waves-light" />
                            </form>

                        </div>
                    </div>
                </div> <!-- end col -->
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            $('#profileImage-input').change(function(e) {
                var imageReader = new FileReader();
                imageReader.onload = function(e) {
                    $('#showImage').attr('src', e.target.result);
                }
                imageReader.readAsDataURL(e.target.files['0']);
            })
        });
    </script>
@endsection
