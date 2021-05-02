
@extends('user')

@section('title')
    @lang('Transactions')
@stop

@section('content')
    @include('user.breadcrumb')



    <section id="transaction">
        <div class="container" id="withdraw-log">
            <div class="row justify-content-center">
                <div class="col-md-10 col-lg-12 text-center">
                    <div class="heading-title">
                        <h2>
                            @lang('Transaction history')
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
                                            <th class="text-center">@lang('TRX')</th>
                                            <th class="text-center">@lang('Date')</th>
                                            <th class="text-center">@lang('Description')</th>
                                            <th class="text-center">@lang('Amount')</th>
                                            <th class="text-center">@lang('After Balance')</th>

                                        </tr>
                                        </thead>
                                        <tbody>
                                        @if($logs->count() == 0)
                                            <tr>
                                                <td colspan="5"><h2>@lang('No Data Available')</h2></td>
                                            </tr>
                                        @endif
                                        @foreach($logs as $log)
                                            <tr>
                                                <td>{{$log->trxid}}</td>
                                                <td>{{\Carbon\Carbon::parse($log->created_at)->format('Y-m-d, h:i a')}}</td>
                                                <td>{{$log->details}}</td>
                                                <td>{{$log->amount}} {{$gnl->cur}}</td>
                                                <td>{{$log->balance }} {{$gnl->cur}}</td>
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
                    {{$logs->links()}}
                </div>
            </div>

        </div>

    </section>



@endsection
@section('script')

@endsection
