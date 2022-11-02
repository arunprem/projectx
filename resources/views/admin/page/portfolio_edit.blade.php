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
                                <li class="breadcrumb-item active">Portfolio Edit</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
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
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Edit Portfolio</h4>
                            <p class="card-title-desc">Portfolio<code class="highlighter-rouge">.can be
                                    Updated</code>
                            <form method="post" action="{{ route('portfolio.update') }}" enctype="multipart/form-data">
                                @csrf
                                <input class="form-control" name="id" value="{{ $portfolio_edit->id }}" type="hidden">
                                <div class="row mb-3">
                                    <label for="title-input" class="col-sm-2 col-form-label">Name</label>
                                    <div class="col-sm-4">
                                        <input class="form-control" name="name" type="text"
                                            value="{{ $portfolio_edit->portfolio_name }}" placeholder="Name"
                                            id="title-input">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="title-input" class="col-sm-2 col-form-label">Short Title</label>
                                    <div class="col-sm-6">
                                        <input class="form-control" name="short_title" type="text"
                                            value="{{ $portfolio_edit->portfoli_title }}" placeholder="Short Title"
                                            id="title-input">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="title-input" class="col-sm-2 col-form-label">Description</label>
                                    <div class="col-sm-8">
                                        <textarea class="form-control" id="elm1" name="description" rows="3" cols="25"> 
                                          {{ $portfolio_edit->portfoli_description }}  </textarea>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="portfolioImage-input" class="col-sm-2 col-form-label">Portfolio
                                        Images</label>
                                    <div class="col-sm-4">
                                        <input class="form-control" name="portfolio_image" type="file" value=""
                                            id="portFolioImage-input">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="portfolio_image-input" class="col-sm-2 col-form-label"></label>
                                    <div class="col-sm-10">
                                        <img id="showImage" class="rounded avatar-lg" src="{{ url('images/no_image.jpg') }}"
                                            alt="Card image cap">
                                    </div>
                                </div>
                                <input type="submit" value="Save" class="btn btn-info waves-effect waves-light" />
                            </form>

                        </div>
                    </div>
                </div> <!-- end col -->
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            $('#portFolioImage-input').change(function(e) {
                var imageReader = new FileReader();
                imageReader.onload = function(e) {
                    $('#showImage').attr('src', e.target.result);
                }
                imageReader.readAsDataURL(e.target.files['0']);
            })
        });
    </script>
@endsection
