@extends('admin')

@section('title', 'Deposit History')

@section('content')
    <main class="app-content">
        <div class="app-title">
            <div>
                <h1>Deposit History </h1>
            </div>



        </div>
        <div class="tile">

            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                    @if($deps->count() == 0)
                        <tr>
                            <td class="text-center">
                                <h2>No data found </h2>
                            </td>
                        </tr>
                    @else
                        <tr>
                            <th>#</th>
                            <th>Username</th>
                            <th class="text-center">package Name</th>
                            <th class="text-center">Return date</th>
                            <th class="text-center">Amount</th>
                            <th class="text-center">total Return</th>
                            <th class="text-center">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($deps as $data)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>
                                @php
                                $user = \App\User::find($data->user_id);
                                @endphp
                                <a href="{{route('admin.userDetails',$data->user_id)}}">  {{$user->username}}     </a>
                            </td>
                             <td class="text-center">
                                @php
                                $depPakName = \App\FixDepositPak::find($data->fix_deposit_paks_id)
                                @endphp
                                {{$depPakName->name}}
                            </td>

                            <td class="text-center">{{$data->return_date}}</td>
                            <td class="text-center">{{$gnl->cur_symbol}}{{$data->amount}}</td>
                            <td class="text-center">{{$gnl->cur_symbol}}{{$data->return_total}}</td>
                            <td class="text-center">
                                @if($data->status == 1) <span class="badge badge-success">success</span>
                                @else <span class="badge badge-warning">waiting</span>
                                @endif
                        </tr>

                    @endforeach
                    @endif
                    </tbody>
                </table>
            </div>
            <div class="d-flex flex-row-reverse">

            </div>
        </div>



    </main>





    {{--///edit modal - start/////--}}

    <div class="modal fade bd-example-modal-lg" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <form class="row" method="post"  action="{{route('admin.loan.pak.update')}}">
                        @csrf
                        <input type="hidden" name="id" id="id"/>
                        {{--<div class="form-group col-md-12">--}}
                            {{--<label class="control-label">Name</label>--}}
                            {{--<input class="form-control form-control-lg" type="text" name="name" id="name" required>--}}
                        {{--</div>--}}

                        <div class="form-group col-md-6">
                            <label >Status</label>
                            <select class="form-control form-control-lg" name="status" id="status">
                                <option value="1">Active</option>
                                <option value="0">pending</option>
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

                $('#status').val($(this).data('status'));

            });
        });
    </script>

@endsection

