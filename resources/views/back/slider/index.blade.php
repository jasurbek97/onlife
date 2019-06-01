@extends('back.layout.layout')

@section('title',trans('admin.photo.title'))
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12 ml-2 mt-2 mb-4">
                <div class="row">
                    <div>
                        <button type="button" class="btn btn-default btn-info" data-toggle="modal" data-target="#modal-default">
                            @lang('admin.add')
                        </button>
                    </div>
                </div>
            </div>
        </div>
        @if(Session::get('info'))
            <div class="row">
                <div class="col-md-12 mt-2">
                    <div class="row">
                        <div class="alert w-100 alert-info">
                            <i class="fas fa-info-circle"></i> {{ Session::get('info') }}
                        </div>
                    </div>
                </div>
            </div>
        @endif
        <table class="table">
            <thead class="thead-light">
            <tr>
                <th scope="col">#</th>
                <th scope="col"> @lang('admin.photo.title')</th>
                <th scope="col"> @lang('admin.posts.body')</th>
                <th scope="col" >@lang('admin.action')</th>
            </tr>
            </thead>
            <tbody>
            @foreach($sliders as $slider)
                <tr>
                    <th scope="row">{{$loop->iteration}}</th>
                    <td>
                        @if($slider->getImage())
                        <img  src="/{{$slider->getImage()}}"  width="100px" class="pull-right">
                         @endif
                    </td>
                    <td>
                        {!! str_limit($slider->getBody(),50) !!}
                    </td>
                    <td>
                        <a href="{{route('slider.edit',$slider->id)}}"   data-placement="top"  title="@lang('admin.edit')" class="btn btn-primary btn-sm">
                            <i class="fas fa-edit"></i>
                        </a>
                        <a href="{{ route('slider.delete', $slider->id ) }}" data-toggle="tooltip" data-placement="top" title="@lang('admin.delete')" onclick="return confirm('@lang('admin.are_you_deleted')')" class="btn btn-danger pull-right btn-sm">
                            <i class="fas fa-trash"></i>
                        </a>
                    </td>
                </tr>
            @endforeach

            </tbody>
        </table>








        <div class="modal fade " id="modal-default">
            <div class="modal-dialog">
                <div class="modal-content">
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
                            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Закрыть</button>
                            <button type="submit" class="btn btn-primary">Сохранить изменения</button>
                        </div>
                    </form>

                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>

    </div>
@endsection
@push('js')
    <script src="/vendor/back/ckeditor-2/ckeditor.js"></script>
    <script>
        CKEDITOR.replace( 'editor');
    </script>
@endpush


