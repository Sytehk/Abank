@extends('admin')

@section('title', 'Fixed Deposit Package')

@section('content')
    <main class="app-content">
        <div class="app-title">
            <div>
                <h1> Fixed Deposit Package </h1>
            </div>
             <button   class="btn btn-info" data-toggle="modal" data-target="#addLoan"><i class="fa fa-plus"></i> Add new</button>


        </div>
        <div class="tile">

            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                    @if($depPaks->count() == 0)
                        <tr>
                            <td class="text-center">
                                <h2>No data found </h2>
                            </td>
                        </tr>
                    @else
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th class="text-center">Deposit Limit</th>
                            <th class="text-center">Days</th>
                            <th class="text-center">Return</th>
                            <th class="text-center">Status</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($depPaks as $data)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$data->name}}</td>

                            <td class="text-center">{{$gnl->cur_symbol}}{{$data->min_amount}} - {{$gnl->cur_symbol}}{{$data->max_amount}}</td>
                            <td class="text-center">{{$data->days}}</td>
                            <td class="text-center">{{$data->percent_return}} %</td>
                            <td class="text-center">
                                @if($data->status == 1) <span class="badge badge-success">active</span>
                                @else <span class="badge badge-danger">deactivate</span>
                                @endif

                            </td>
                            <td class="text-center">

                                <button type="button" class="btn btn-info edit" data-toggle="modal"

                                        data-name="{{$data->name}}" data-gate="{{$data->id}}"

                                        data-min_amount="{{$data->min_amount}}" data-max_amount="{{$data->max_amount}}"

                                        data-days="{{$data->days}}"

                                        data-percent_charge="{{$data->percent_return}}" data-status="{{$data->status}}"

                                        data-target="#exampleModalCenter">
                                    <i class="fa fa-edit"></i>
                                </button>
                            </td>
                        </tr>

                    @endforeach
                    @endif
                    </tbody>
                </table>
            </div>
            <div class="d-flex flex-row-reverse">
            {{$depPaks->links()}}
            </div>
        </div>



    </main>


    {{--/// added modal - start/////--}}
    <div class="modal fade bd-example-modal-lg" id="addLoan" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Are you sure, you want to delete this?</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <form class="row" method="post"  action="{{route('admin.deposit.pak.add')}}">
                        @csrf

                        <div class="form-group col-md-12">
                            <label class="control-label">Name</label>
                            <input class="form-control form-control-lg" type="text" name="name"  required>
                        </div>


                        <div class="form-group col-md-6">
                            <label class="control-label">Deposit For</label>
                            <div class="form-group">
                                <div class="input-group">

                                    <input class="form-control form-control-lg" type="number"  name="days"  required>
                                    <div class="input-group-append"><span class="input-group-text">Days</span></div>
                                </div>
                            </div>
                        </div>



                        <div class="form-group col-md-6">
                            <label class="control-label">Min amount</label>
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-prepend"><span class="input-group-text">{{$gnl->cur_symbol}}</span></div>
                                    <input class="form-control form-control-lg" type="number" name="min_amount"   required>
                                    <div class="input-group-append"><span class="input-group-text">{{$gnl->cur}}</span></div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group col-md-6">
                            <label class="control-label">Max amount</label>
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-prepend"><span class="input-group-text">{{$gnl->cur_symbol}}</span></div>
                                    <input class="form-control form-control-lg" type="number"  name="max_amount"  required>
                                    <div class="input-group-append"><span class="input-group-text">{{$gnl->cur}}</span></div>
                                </div>
                            </div>
                        </div>




                        <div class="form-group col-md-6">
                            <label class="control-label">Return</label>
                            <div class="form-group">
                                <div class="input-group">

                                    <input class="form-control form-control-lg" type="text" name="return"   required>
                                    <div class="input-group-append"><span class="input-group-text">%</span></div>
                                </div>
                            </div>
                        </div>



                        <div class="form-group col-md-6">
                            <label >Status</label>
                            <select class="form-control form-control-lg" name="status" >
                                <option value="1">Active</option>
                                <option value="0">Deactivate</option>
                            </select>
                        </div>

                        <div class="modal-footer col-md-12">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>


                    </form>


                </div>

            </div>
        </div>
    </div>







    {{--///edit modal - start/////--}}

    <div class="modal fade bd-example-modal-lg" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Are you sure, you want to delete this?</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                                <form class="row" method="post"  action="{{route('admin.deposit.pak.update')}}">
                                    @csrf
                                    <input type="hidden" name="id" id="id"/>
                                    <div class="form-group col-md-12">
                                        <label class="control-label">Name</label>
                                        <input class="form-control form-control-lg" type="text" name="name" id="name" required>
                                    </div>


                                    <div class="form-group col-md-6">
                                        <label class="control-label">Deposit For</label>
                                        <div class="form-group">
                                            <div class="input-group">

                                                <input class="form-control form-control-lg" type="number"  name="days" id="days"  required>
                                                <div class="input-group-append"><span class="input-group-text">Days</span></div>
                                            </div>
                                        </div>
                                    </div>



                                    <div class="form-group col-md-6">
                                        <label class="control-label">Min amount</label>
                                        <div class="form-group">
                                            <div class="input-group">
                                                <div class="input-group-prepend"><span class="input-group-text">{{$gnl->cur_symbol}}</span></div>
                                                <input class="form-control form-control-lg" type="number" name="min_amount"  id="min_amount" required>
                                                <div class="input-group-append"><span class="input-group-text">{{$gnl->cur}}</span></div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label class="control-label">Max amount</label>
                                        <div class="form-group">
                                            <div class="input-group">
                                                <div class="input-group-prepend"><span class="input-group-text">{{$gnl->cur_symbol}}</span></div>
                                                <input class="form-control form-control-lg" type="number"  name="max_amount" id="max_amount" required>
                                                <div class="input-group-append"><span class="input-group-text">{{$gnl->cur}}</span></div>
                                            </div>
                                        </div>
                                    </div>




                                    <div class="form-group col-md-6">
                                        <label class="control-label">Return</label>
                                        <div class="form-group">
                                            <div class="input-group">

                                                <input class="form-control form-control-lg" type="text" name="return"  id="percent_charge" required>
                                                <div class="input-group-append"><span class="input-group-text">%</span></div>
                                            </div>
                                        </div>
                                    </div>



                                    <div class="form-group col-md-6">
                                        <label >Status</label>
                                        <select class="form-control form-control-lg" name="status" id="status">
                                            <option value="1">Active</option>
                                            <option value="0">Deactivate</option>
                                        </select>
                                    </div>

                                    <div class="modal-footer col-md-12">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Save changes</button>
                                    </div>


                                </form>


                </div>

            </div>
        </div>
    </div>


@endsection

@section('script')
    <script>
        $(document).ready(function(){

            $(document).on('click','.edit', function(){

                $('#id').val($(this).data('gate'));
                $('#name').val($(this).data('name'));
                $('#min_amount').val($(this).data('min_amount'));
                $('#max_amount').val($(this).data('max_amount'));
                $('#days').val($(this).data('days'));
                $('#fixed_charge').val($(this).data('fixed_charge'));
                $('#percent_charge').val($(this).data('percent_charge'));
                $('#status').val($(this).data('status'));

            });
        });
    </script>

@endsection

