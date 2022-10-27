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
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Home</a></li>
                                <li class="breadcrumb-item active">Home Slider Edit</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Edit Home page</h4>
                            <p class="card-title-desc">Home Slider <code class="highlighter-rouge">.can be
                                    updated</code>
                            <form method="post" action="{{ route('homeslider.save') }}" enctype="multipart/form-data">
                                @csrf
                                <input name="id" type="hidden" value="{{$homeSection->id}}"/>
                                <div class="row mb-3">
                                    <label for="title-input" class="col-sm-2 col-form-label">Title</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" name="title" type="text"
                                            value="{{ $homeSection->title }}" placeholder="title" id="title-input">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="title-input" class="col-sm-2 col-form-label">Description</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" name="short_title" type="text"
                                            value="{{ $homeSection->short_title }}" placeholder="Description"
                                            id="title-input">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="title-input" class="col-sm-2 col-form-label">Video url</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" name="video_url" type="text"
                                            value="{{ $homeSection->video_url }}" placeholder="url" id="title-input">
                                    </div>
                                </div>


                                <div class="row mb-3">
                                    <label for="sliderImage-input" class="col-sm-2 col-form-label">Home Slider
                                        Image</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" name="slider_image" type="file" value=""
                                            id="sliderImage-input">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="sliderImage-input" class="col-sm-2 col-form-label"></label>
                                    <div class="col-sm-10">
                                        <img id="showImage" class="rounded avatar-lg"
                                            src="{{ !empty($homeSection->home_slide) ? url($homeSection->home_slide) : url('images/no_image.jpg') }}"
                                            alt="Card image cap">
                                    </div>
                                </div>
                                <input type="submit" value="Update Home Slider"
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
            $('#sliderImage-input').change(function(e) {
                var imageReader = new FileReader();
                imageReader.onload = function(e) {
                    $('#showImage').attr('src', e.target.result);
                }
                imageReader.readAsDataURL(e.target.files['0']);
            })
        });
    </script>
@endsection
