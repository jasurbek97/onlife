@extends('back.layout.layout')

@section('title',trans('admin.posts.title'))
@section('content')
    <div class="container">
        <div class="box box-info">
            <div class="box-header ui-sortable-handle" style="cursor: move;">
                <i class="fa fa-envelope"></i>

                <h3 class="box-title">@lang('admin.posts.create')</h3>
            </div>
            <div class="box-body">
                <form action="{{route('post.store')}}" method="POST" enctype="multipart/form-data">
                    <label>@lang('admin.posts.title')</label>
                    <div class="form-group">
                        <input type="text" class="form-control @error('title') is-invalid @enderror" name="title"  placeholder="@lang('admin.posts.name')" required>
                    </div>

                    @error('title')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror

                    @csrf

                    <label>@lang('admin.photo.title')</label>
                    <div class="form-group">
                        <input type="file" class="btn btn-info mr-4  @error('image') is-invalid @enderror" onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])" role="button" name="image" required>
                        <img id="blah" src="https://www.mhs.com/Portals/1/images/noimage.png"  width="50px" class="pull-right">
                    </div>
                    @error('image')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror


                    <div class="form-group">
                        <textarea name="body" class="form-control  @error('body') is-invalid @enderror " rows="5" id="editor"></textarea>
                    </div>


                    @error('body')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                    <div class="box-footer clearfix">
                        <button type="submit" class="pull-right btn btn-primary" id="sendEmail">@lang('admin.add')
                            <i class="fa fa-arrow-circle-right"></i></button>
                    </div>
                </form>
            </div>


        </div>

    </div>
@endsection
@push('js')
    <script src="/vendor/back/ckeditor-2/ckeditor.js"></script>
    <script>
        CKEDITOR.replace( 'editor');
    </script>
@endpush
