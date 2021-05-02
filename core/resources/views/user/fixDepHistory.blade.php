
@extends('user')

@section('title')
    @lang('Fixed deposit history')
@stop

@section('content')
    @include('user.breadcrumb')


    <section id="transaction">
        <div class="container" id="withdraw-log">
            <div class="row justify-content-center">
                <div class="col-md-10 col-lg-12 text-center">
                    <div class="heading-title">
                        <h2>
                            @lang('Fixed deposit history')
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
                                            <th class="text-center">@lang('Dps name')</th>
                                            <th class="text-center">@lang('Amount')</th>
                                            <th class="text-center">@lang('Deposit date')</th>
                                            <th class="text-center">@lang('Return date')</th>
                                            <th class="text-center">@lang('Receivable ')</th>
                                            <th class="text-center">@lang('Status')</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @if($fixDeps->count() == 0)
                                            <tr>
                                                <td colspan="5"><h2>@lang('No Data Available')</h2></td>
                                            </tr>
                                        @endif
                                        @foreach($fixDeps as $log)
                                            <tr>
                                                <td>
                                                    @php
                                                        $dipPakName = \App\FixDepositPak::find($log->fix_deposit_paks_id);
                                                    @endphp

                                                    {{$dipPakName->name}}
                                                </td>
                                                <td>{{$log->amount}} {{$gnl->cur}}</td>
                                                <td>{{$log->created_at}}</td>
                                                <td>{{$log->return_date}}</td>
                                                <td>{{$log->return_total}} {{$gnl->cur}}</td>
                                                <td>@if($log->status == 0) @lang('waiting')  @elseif($log->status == 1) @lang('complete') @endif</td>
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
                    {{$fixDeps->links()}}
                </div>
            </div>

        </div>

    </section>


@endsection
@section('script')


@endsection