@extends('back.layout.layout')

@section('title',trans('admin.photo.title'))
@section('content')

<div class="container">
    <form method="POST" action="{{route('slider.store')}}" enctype="multipart/form-data">
        <div class="modal-body">
            <div class="row">
                <div class="box-body">
                    @csrf
                    <div class="form-group">
                        <label for="exampleInputFile" >@lang('admin.photo.title') </label>
                        <input type="file" id="exampleInputFile" class="btn btn-primary @error('image') is-invalid @enderror " name="image">
                    </div>

                    @error('image')
                    <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                         </span>
                    @enderror

                    <div class="form-group">
                        <label for="exampleInputFile">@lang('admin.posts.body') </label>
                        <textarea class="form-control @error('body') is-invalid @enderror " id="editor" name="body"></textarea>
                    </div>
                    @error('body')
                    <span class="invalid-feedback" role="alert">
                                                     <strong>{{ $message }}</strong>
                                         </span>
                    @enderror

                </div>
            </div>

        </div>
        <div class="modal-footer">
            <button type="submit" class="btn btn-primary">Сохранить изменения</button>
        </div>
    </form>
</div>

@endsection
@push('js')
    <script src="/vendor/back/ckeditor-2/ckeditor.js"></script>
    <script>
        CKEDITOR.replace( 'editor');
    </script>
@endpush
