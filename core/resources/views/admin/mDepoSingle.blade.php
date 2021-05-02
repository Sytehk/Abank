@extends('admin')
@section('mgateway', 'active')
@section('title')
    Manual Deposit Request
@stop
@section('style')
    <link rel="stylesheet" type="text/css" href="{{asset('assets\fileInput\bootstrap-fileinput.css')}}">

@stop

@section('content')
    <main class="app-content">
        <div class="app-title">
            <div>
                <h1><i class="icon fa fa-desktop"></i></h1>
            </div>


        </div>
        <div class="tile">

            <div class="row">
                <div class="col-md-12">

                    @if (count($errors) > 0)
                        <div class="row">
                            <div class="col-md-12">
                                <div class="alert alert-danger alert-dismissible">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
                                        &times;
                                    </button>
                                    <strong class="col-md-12"><i class="fa fa-exclamation-triangle"
                                                                 aria-hidden="true"></i> Alert!</strong>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    @endif

                    @php
                        $depo_manul = \App\GatewayManual::find($data->gateway_id);
                    @endphp

                    <div class="card">
                        <div class="card-header">
                            <strong> Manual Deposit Request</strong>
                            <span class="float-right">Transaction ID: {{$data->trx}}</span>
                        </div>
                        <div class="card-body text-center">
                            <h5 class="card-title">Deposit Request From <br> <a
                                        href="{{route('admin.userDetails',$data->user_id)}}">{{$data->userName->username}}</a>
                                -{{$data->userName->name}} - {{$data->userName->email}} </h5>
                            <br>


                            <h2 class="card-title">Deposit Method: {{$depo_manul->name}} </h2>


                            <br>

                            <h3 class="card-title">Send Amount: {{$data->usd_amo}}  {{$depo_manul->method_cur}} </h3>
                            <br>

                                <h2 class="card-title">Total Amount: {{$data->amount+$data->charge}}  {{$gnl->cur}}</h2>
                            <br>

                                <h2 class="card-title">charge: {{$data->charge}}  {{$gnl->cur}} </h2>
                            <br>
                                <h4 class="card-title">User will get Amount: {{$data->amount}}  {{$gnl->cur}}
                                </h4>
                            <br>


                            @if($data->status == 3)

                                <button class="btn btn-success approveButton" data-toggle="modal"  data-target="#approveModal" ><i class="fa fa-check "></i> Approve</button>
                                <button  class="btn btn-danger rejectButton" data-toggle="modal"    data-target="#rejectModal" ><i class="fa fa-times"></i>  Reject</button>


                            @elseif($data->status == 2)

                                <button type="button" class="btn btn-danger disabled bold uppercase"> ACTION ALREADY REJECT </button>
                            @elseif($data->status == 1)

                                <button type="button" class="btn btn-success disabled bold uppercase"> ACTION ALREADY TAKEN </button>


                                @endif
                            <br>
                            <br>

                            <hr/>

                            <h4 class="card-title text-left">Message:
                            </h4>
                            <div class="card-body text-left">
                                <p class="card-text">{{$data->account}}  </p>
                            </div>
                            <hr/>
                            <div class="card" style="width: 18rem;">
                             <a href="{{asset('assets/image/m_deposit/'. $data->verify_image)}}" >  <img src="{{asset('assets/image/m_deposit/'. $data->verify_image)}}" class="card-img-top" alt="*"> </a>

                            </div>


                        </div>
                        <div class="card-footer text-muted">

                        </div>
                    </div>


                </div>
            </div>

        </div>
    </main>


    <div class="modal fade" id="approveModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="ModalLabel">@lang('Are you sure you want to approve this?')</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{route('admin.rDeposit.approve')}}" method="POST">
                        @csrf
                        <input type="hidden" name="deposit" value="{{$data->id}}"/>

                        <div class="modal-footer">

                            <button type="submit" class="btn btn-success">@lang('Approve')</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">@lang('Close')</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
    <div class="modal fade" id="rejectModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="ModalLabel">@lang('Are you sure you want to reject this?')</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{route('admin.rDeposit.reject')}}" method="POST">
                        @csrf
                        <input type="hidden" name="deposit" value="{{$data->id}}"/>

                        <div class="modal-footer">
                            <button type="submit" class="btn btn-danger">@lang('Reject')</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">@lang('Close')</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>


@stop