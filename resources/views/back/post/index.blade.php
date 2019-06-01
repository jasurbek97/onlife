@extends('back.layout.layout')

@section('title',trans('admin.posts.title'))
@section('content')
    <div class="container">
    <div class="row">
        <div class="col-md-12 ml-2 mt-2 mb-4">
            <div class="row">
                <div>
                    <a href="{{route('post.create')}}" class="btn btn-primary btn-lg active" role="button" aria-pressed="true">@lang('admin.add')</a>
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
    <table id="example" class="display" style="width:100%">
        <thead>
        <tr>
            <th>#</th>
            <th>@lang('admin.posts.title')</th>
            <th>@lang('admin.posts.image')</th>
            <th>@lang('admin.action')</th>
        </tr>
        </thead>
        <tbody>
        @foreach($posts as $post)
            <tr>
                <td> {{$post->id}}</td>
                <td> {!!str_limit($post->getTitle(),50)  !!}</td>
                <td>
                    <img  src="/{{$post->getImage()}}"  width="50px" class="pull-right">
                  </td>

                <td>
                    <a href="{{route('post.edit',$post->id)}}"  data-placement="top"  title="@lang('admin.edit')" class="btn btn-primary btn-sm">
                        <i class="fas fa-edit"></i>
                    </a>

                    <a href="{{ route('post.delete', $post->id ) }}" data-toggle="tooltip" data-placement="top" title="@lang('admin.delete')" onclick="return confirm('@lang('admin.are_you_deleted')')" class="btn btn-danger btn-sm">
                        <i class="fas fa-trash"></i>
                    </a>
                </td>

            </tr>
        @endforeach
        </tbody>
    </table>
    </div>

@endsection
@push('css')
    <link rel="stylesheet" href="/vendor/back/datatable/jquery.dataTables.min.css">
@endpush
@push('js')
    <script src="/vendor/back/datatable/jquery-3.3.1.js"></script>
    <script src="/vendor/back/datatable/jquery.dataTables.min.js"></script>
    <script>

        $('#myModal').on('shown.bs.modal', function () {
            $('#myInput').trigger('focus')
        });

        $(document).ready(function() {
            $('#example').DataTable();
        } );


        $(".button_order").on('click', function(){
            var id = $(this).data('id');
            $("#product_id").val(id);
        });
    </script>

@endpush

