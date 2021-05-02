@extends('admin')

@section('title')
    {{$pt}}
@stop

@section('content')




    <main class="app-content">
        <div class="app-title">
            <div>
                <h1><i class="icon fa fa-desktop"></i> {{$pt}} </h1>
            </div>


        </div>


        <div class="raw">
            <div class="col-lg-12">
                <div class="tile">
                    <div class="table-responsive">
                        <table class="table table-hover text-center">
                            <thead>
                            <tr>
                                <th> @lang('Username')</th>
                                <th> @lang('Amount')</th>
                                <th> @lang('Charge')</th>
                                <th> @lang('Method')</th>
                                <th> @lang('Request At')</th>
                                <th> @lang('Status')</th>
                                <th> @lang('Action')</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if(count($reqs)==0)
                                <tr>
                                    <td colspan="8"><h2>@lang('No Data Available')</h2></td>
                                </tr>
                            @endif
                            @foreach($reqs as $log)
                                <tr>
                                    <td> <a href="{{route('admin.userDetails',$log->userName->id)}}"> {{$log->userName->username}} </a></td>
                                    <td>{{$log->amount}} {{$gnl->cur}}</td>
                                    <td>{{$log->charge}} {{$gnl->cur}}</td>
                                    <td>
                                        @php
                                            $mg = \App\GatewayManual::find($log->gateway_id);
                                        @endphp

                                        {{$mg->name}}
                                    </td>
                                    <td>{{$log->created_at->diffForHumans()}}</td>
                                    <td>@if($log->status == 3) <span class="badge badge-warning">@lang('Pending')</span> @elseif($log->status == 1) <span class="badge badge-success">@lang('Approve')</span>   @elseif($log->status == 2) <span class="badge badge-danger">@lang('Reject')</span>   @endif</td>

                                    <td>
                                     <a href="{{route('admin.single.manual.deposit', $log->id)}}"  class="btn btn-info "  ><i class="fa fa-eye"></i> View
                                     </a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>

                        </table>
                        <div class="d-flex flex-row-reverse">
                            {{$reqs->links()}}
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
                        <input type="hidden" name="deposit" id="withdrawApprove"/>

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
                        <input type="hidden" name="deposit" id="withdrawReject"/>

                        <div class="modal-footer">
                            <button type="submit" class="btn btn-danger">@lang('Reject')</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">@lang('Close')</button>
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
            $(document).on('click','.approveButton', function(){
                $('#withdrawApprove').val($(this).data('gate'));
            });
            $(document).on('click','.rejectButton', function(){
                $('#withdrawReject').val($(this).data('gate'));
            });
        });
    </script>

@endsection
