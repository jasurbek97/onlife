@extends('back.layout.layout')

@section('title',"Панель управления")

@section('content')

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
            <th>@lang('admin.orders.name')</th>
            <th>@lang('admin.orders.phone')</th>
            <th>@lang('admin.orders.email')</th>
            <th>@lang('admin.action')</th>
        </tr>
        </thead>
        <tbody>
     @foreach($orders as $order)
        <tr>
            <td> {{$order->id}}
                @if(!$order->getNewOrder())
                <span class="pull-right-container">
                <small class=" label pull-right btn-success">new</small>
                </span>
                @endif
            </td>
            <td> {{$order->getName()}}</td>
            <td> {{$order->getPhone()}}</td>
            <td> {{$order->getEmail()}}</td>
            <td>
                <a href="{{route('order.show',$order->id)}}"  data-placement="top"  title="@lang('admin.seen')" class="btn btn-primary btn-sm">
                    <i class="fas fa-eye"></i>
                </a>
                <button type="button" data-toggle="modal"  data-id="{{$order->id}}" data-target="#modal-default" data-placement="top"  title="@lang('admin.settings.description')" class="btn btn-primary btn-sm button_order">
                    <i class="fas fa-file"></i>
                </button>
                <a href="{{ route('order.delete', $order->id ) }}" data-toggle="tooltip" data-placement="top" title="@lang('admin.delete')" onclick="return confirm('@lang('admin.are_you_deleted')')" class="btn btn-danger btn-sm">
                    <i class="fas fa-trash"></i>
                </a>
            </td>

        </tr>
         @endforeach
        </tbody>
    </table>


    <div class="modal fade" id="modal-default">
        <div class="modal-dialog">
            <div class="modal-content">
                <form method="POST" action="{{route('order.update')}}" enctype="multipart/form-data">
                    <div class="modal-body">
                        <div class="row">
                            <div class="box box-primary">
                                <div class="box-body">
                                    @csrf
                                    @method('PUT')
                                    <div class="form-group" id="result">

                                        <label for="exampleInputFile">@lang('admin.note')</label>
                                        <textarea class="form-control" id="note" name="note" rows="5"></textarea>
                                    </div>
                                    <input type="hidden" name="order_id" id="order_id" value="">

                                </div>
                                <!-- /.box-body -->


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
            $('#example').DataTable({
                "order": [[ 1200, "desc" ]]
                });
        } );


        $(".button_order").on('click', function(){
            var id = $(this).data('id');
            $("#order_id").val(id);
        });

        $('.button_order').on('click',function(e){
            var id = $(this).data('id');
            $.ajax({
                url: "/dashboard/order/create/" + id,
                method: 'GET',
                success: function(data){
                    $('#note').val(data.note);
                }
            });
        });


    </script>

@endpush
