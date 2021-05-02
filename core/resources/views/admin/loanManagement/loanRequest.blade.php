@extends('admin')

@section('title', 'Loan request')

@section('content')
    <main class="app-content">
        <div class="app-title">
            <div>
                <h1> Loan request </h1>
            </div>
        </div>
        <div class="tile">

            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                    @if($loanRequests->count() == 0)
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
                            <th class="text-center">Days</th>
                            <th class="text-center">Amount</th>
                            <th class="text-center">Charge</th>
                            <th class="text-center">Receivable</th>
                            <th class="text-center">Status</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($loanRequests as $data)
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
                                $loanPakName = \App\LoanPackage::find($data->loan_packages_id)
                                @endphp
                                {{$loanPakName->name}}
                            </td>

                            <td class="text-center">{{$data->days}}</td>
                            <td class="text-center">{{$gnl->cur_symbol}}{{$data->amount}}</td>
                            <td class="text-center">{{$gnl->cur_symbol}}{{$data->charge}}</td>
                            <td class="text-center">{{$gnl->cur_symbol}}{{$data->amount + $data->charge }}</td>
                            <td class="text-center">
                                @if($data->status == 1) <span class="badge badge-info">active</span>
                                @elseif($data->status == 2) <span class="badge badge-success">paid</span>
                                @elseif($data->status == 3) <span class="badge badge-danger">reject</span>
                                @else <span class="badge badge-warning">pending</span>
                                @endif
                            </td>
                            <td class="text-center">

                                @if ($data->status == 0)
                                    <button type="button" class="btn btn-info edit" data-toggle="modal"
                                            data-name="{{$loanPakName->name}}" data-gate="{{$data->id}}"
                                            data-status="{{$data->status}}"
                                            data-target="#exampleModalCenter">
                                        <i class="fa fa-edit"></i>
                                    </button>
                                    @else
                                    <button type="button" class="btn btn-info ">
                                        <i class="fa fa-edit"></i>
                                    </button>
                                @endif


                            </td>
                        </tr>

                    @endforeach
                    @endif
                    </tbody>
                </table>
            </div>
            <div class="d-flex flex-row-reverse">
                {{$loanRequests->links()}}
            </div>
        </div>



    </main>




    {{--///edit modal - start/////--}}

    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">

                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <form class="row" method="post"  action="{{route('admin.loan.request.update')}}">
                        @csrf
                        <input type="hidden" name="id" id="id"/>
                        <div class="form-group col-md-12">
                            <label class="control-label">Name</label>
                            <input class="form-control form-control-lg"  id="name" disabled>
                        </div>
                        <div class="form-group col-md-12">
                            <label >Status</label>
                            <select class="form-control form-control-lg" name="status" id="status" required>
                                <option value="1">active</option>
                                <option value="3">reject</option>
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

