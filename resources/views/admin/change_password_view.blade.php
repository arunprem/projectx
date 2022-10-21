@extends('admin.admin_master')
@section('admin')
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Dashboard</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Profile</a></li>
                                <li class="breadcrumb-item active">Change Password</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-6">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Change Password</h4>

                            @if (count($errors))
                                @foreach ($errors->all() as $error)
                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                        <i class="mdi mdi-block-helper me-2"></i>
                                        {{ $error }}
                                        <button type="button" class="btn-close" data-bs-dismiss="alert"
                                            aria-label="Close"></button>
                                    </div>
                                @endforeach
                            @endif

                            <form method="post" action="{{ route('changepassword.save') }}">
                                @csrf
                                <div class="row mb-3">
                                    <label for="old-password-input" class="col-sm-2 col-form-label">Old Password</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" name="oldPassword" type="password" value=""
                                            id="old-password-input" placeholder="old password">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="new-password-input" class="col-sm-2 col-form-label">New Password</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" name="newPassword" type="password" value=""
                                            id="new-password-input" placeholder="new password">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="confirm-password-input" class="col-sm-2 col-form-label">Confirm
                                        Password</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="password" name="confirmPassword" value=""
                                            id="confirm-password-input" placeholder="confirm password">
                                    </div>
                                </div>
                                <input type="submit" value="Change Password"
                                    class="btn btn-info waves-effect waves-light" />
                            </form>
                        </div>
                    </div>
                </div> <!-- end col -->
            </div>
        </div>
    </div>
@endsection
