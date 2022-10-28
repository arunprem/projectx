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
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Home</a></li>
                                <li class="breadcrumb-item active">About section</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Edit About us page</h4>
                            <p class="card-title-desc">About Us<code class="highlighter-rouge">.can be
                                    updated</code>
                            <form method="post" action="{{ route('about.save') }}" enctype="multipart/form-data">
                                @csrf
                                <input name="id" type="hidden" value="{{ $aboutSection->id }}" />
                                <div class="row mb-3">
                                    <label for="title-input" class="col-sm-2 col-form-label">Title</label>
                                    <div class="col-sm-4">
                                        <input class="form-control" name="title" type="text"
                                            value="{{ $aboutSection->title_about }}" placeholder="title" id="title-input">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="title-input" class="col-sm-2 col-form-label">Short Description</label>
                                    <div class="col-sm-6">
                                        <input class="form-control" name="short_description" type="text"
                                            value="{{ $aboutSection->short_description }}" placeholder="Description"
                                            id="title-input">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="title-input" class="col-sm-2 col-form-label">Description</label>
                                    <div class="col-sm-8">
                                        <textarea class="form-control" id="description" name="long_description" rows="3" cols="25"> {{ $aboutSection->long_description }}
                                            </textarea>
                                    </div>
                                </div>


                                <div class="row mb-3">
                                    <label for="aboutImage-input" class="col-sm-2 col-form-label">About us
                                        Images</label>
                                    <div class="col-sm-4">
                                        <input class="form-control" multiple="multiple" name="about_images[]" type="file" value=""
                                            id="aboutImage-input">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="about-input" class="col-sm-2 col-form-label"></label>
                                    <div class="col-sm-10">
                                        <img id="showImage" class="rounded avatar-lg"
                                            src="{{ !empty($aboutSection->about_iamge) ? url($aboutSection->about_image) : url('images/no_image.jpg') }}"
                                            alt="Card image cap">
                                    </div>
                                </div>
                                <input type="submit" value="Update About us"
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
            $('#aboutImage-input').change(function(e) {
                var imageReader = new FileReader();
                imageReader.onload = function(e) {
                    $('#showImage').attr('src', e.target.result);
                }
                imageReader.readAsDataURL(e.target.files['0']);
            })
        });
    </script>
@endsection
