
@extends('user')

@section('title')
    @lang('Loan history')
@stop

@section('content')
    @include('user.breadcrumb')



    <section id="transaction">
        <div class="container" id="withdraw-log">
            <div class="row justify-content-center">
                <div class="col-md-10 col-lg-12 text-center">
                    <div class="heading-title">
                        <h2>
                            @lang('Loan history')
                        </h2>
                        <div class="sectionSeparator"></div>

                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-12 col-lg-12">
                    <div class="tab1">

                        <div class="tab-content" id="pills-tabContent">
                            <div class="tab-pane fade active show" id="pills-deposit" role="tabpanel" aria-labelledby="pills-deposit-tab">
                                <div class="table-responsive">
                                    <table class="table table-hover text-center">
                                        <thead>
                                        <tr>
                                            <th class="text-center">@lang('Package name')</th>
                                            <th class="text-center">@lang('Amount')</th>
                                            <th class="text-center">@lang('Payable')</th>
                                            <th class="text-center">@lang('Last date')</th>
                                            <th class="text-center">@lang('Status')</th>
                                            <th class="text-center">@lang('action')</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @if($loanPackages->count() == 0)
                                            <tr>
                                                <td colspan="5"><h2>@lang('No Data Available')</h2></td>
                                            </tr>
                                        @endif
                                        @foreach($loanPackages as $log)
                                            <tr>
                                                <td>
                                                    @php
                                                        $loanPakName = \App\LoanPackage::find($log->loan_packages_id);
                                                    @endphp

                                                    {{$loanPakName->name}}
                                                </td>
                                                <td>{{$log->amount}} {{$gnl->cur}}</td>
                                                <td>{{$log->amount + $log->charge}} {{$gnl->cur}}</td>
                                                <td>@if($log->status == 0) @lang('pending') @else {{$log->return_date}} @endif</td>

                                                <td>@if($log->status == 0) @lang('pending')  @elseif($log->status == 1) @lang('approve') @elseif($log->status == 2) @lang('paid') @elseif($log->status == 3) @lang('reject') @endif</td>
                                                <td><button type="button" data-name="{{__($loanPakName->name)}}" data-gate="{{$log->id}}" data-toggle="modal" @if($log->status == 1)  data-target="#depoModal" @endif class="btn btn-outline-info  btn-sm depoButton">@lang('repay')</button></td>
                                            </tr>
                                        @endforeach
                                        </tbody>

                                    </table>

                                </div>
                            </div>

                        </div>

                    </div>

                </div>
                <div class="d-flex justify-content-end">
                    {{$loanPackages->links()}}
                </div>
            </div>

        </div>

    </section>


    <!-- Modal -->
    <div class="modal fade" id="depoModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="ModalLabel"></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{route('user.loan.repay')}}" method="POST">
                        @csrf
                        <input type="hidden" name="id" id="gateWay"/>
                        <div class="form-group">
                            <h4> <label>@lang('Enter repay Amount')</label></h4>
                            <div class="input-group-append">
                                <input type="text" name="amount" class="form-control form-control-lg"/>
                                <span class="input-group-text">{{$gnl->cur}}</span>
                            </div>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn viweBtn" style="width:100%;">@lang('Repay loan')</button>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">@lang('Close')</button>
                </div>
            </div>
        </div>
    </div>


@endsection
@section('script')
    <script>

        $(document).ready(function(){
            $(document).on('click','.depoButton', function(){
                $('#ModalLabel').text($(this).data('name'));
                $('#gateWay').val($(this).data('gate'));
            });
        });
    </script>

@endsection
