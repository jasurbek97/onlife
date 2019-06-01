@extends('back.layout.layout')

@section('title',trans('admin.photo.title'))
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12 ml-2 mt-2 mb-4">
                <div class="row">
                    <div>
                            <form action="{{route('photo.store')}}" method="POST" enctype="multipart/form-data">
                                <input type="file" role="button" class="btn btn-primary btn-sm active mr-4" name="photo" placeholder="@lang('admin.add')"required>
                                 @csrf
                                <button type="submit" class="btn btn-primary btn-md active">
                                    @lang('admin.add')
                                </button>
                            </form>
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
                <th scope="col" class="btn pull-right" >@lang('admin.delete')</th>
            </tr>
            </thead>
            <tbody>
            @foreach($photos as $photo)
            <tr>
                <th scope="row">{{$loop->iteration}}</th>
                <td>
                    <img  src="/{{$photo->getImage()}}"  width="100px" class="pull-right">
                </td>

                <td>
                    <a href="{{ route('photo.delete', $photo->id ) }}" data-toggle="tooltip" data-placement="top" title="@lang('admin.delete')" onclick="return confirm('@lang('admin.are_you_deleted')')" class="btn btn-danger btn-sm">
                        <i class="fas fa-trash"></i>
                    </a>
                </td>
            </tr>
             @endforeach

            </tbody>
        </table>
    </div>
@endsection



