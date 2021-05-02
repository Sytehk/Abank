@extends('user')
@section('title', 'Support Tickets')
@section('content')

@include('user.breadcrumb')






    <section id="transaction" >
        <div class="container" id="deposit-log">
            <div class="col-md-12">
                <a href="{{route('user.add.new.ticket')}}" class="btn btn-warning btn-block btn-lg waves-effect waves-light" style="color: #fff ; margin-bottom: 50px;"><b>@lang('New Ticket')</b></a>
            </div>

            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="tab1">
                        <div class="tab-content" id="pills-tabContent">
                            <div class="tab-pane fade active show" id="pills-deposit" role="tabpanel" aria-labelledby="pills-deposit-tab">
                                <div class="table-responsive">
                                    <table class="table table-hover text-center ">
                                        <thead>
                                        <tr>
                                            <th class="text-center">@lang('Ticket Subject')</th>
                                            <th class="text-center">@lang('Last Activity')</th>
                                            <th class="text-center">@lang('Status')</th>
                                            <th class="text-center">@lang('Priority')</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @if(count($all_ticket)==0)
                                            <tr>
                                                <td colspan="4" class="text-center">@lang('No Data Available')</td>
                                            </tr>
                                        @endif
                                        @foreach($all_ticket as $data)
                                            <tr>
                                                <td>
                                                    <a style="color: #56cae9" href="{{route('user.ticket.customer.reply', $data->ticket )}}"><b>{{$data->subject}}</b></a>
                                                    <br>
                                                    <small>@lang('Ticket ID'): {{$data->ticket}}</small>
                                                </td>
                                                <td>{{ \Carbon\Carbon::parse($data->created_at)->diffForHumans() }}<br><small style="color: #fff !important;" class="text-muted">{{ \Carbon\Carbon::parse($data->created_at)->format('F dS, Y - h:i A') }}</small></td>
                                                <td>
                                                    @if($data->status == 1)
                                                        <h4> <span class="badge badge-warning"> @lang('Opened')</span></h4>
                                                    @elseif($data->status == 2)
                                                        <h4> <span  class="badge badge-success">  @lang('Answered') </span></h4>
                                                    @elseif($data->status == 3)
                                                        <h4><span  class="badge badge-info"> @lang('Customer Reply') </span></h4>
                                                    @elseif($data->status == 9)
                                                        <h4><span  class="badge badge-danger">  @lang('Closed') </span></h4>
                                                    @endif
                                                </td>
                                                <td>
                                                    <a class="btn btn-success waves-effect waves-light"  href="{{route('user.ticket.customer.reply', $data->ticket )}}"><i class="fa fa-eye"></i></a>
                                                    <a class="btn btn-danger waves-effect waves-light" href="{{route('user.ticket.close', $data->ticket)}}"><i class="fa fa-times"></i> @lang('Close Ticket')</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>

                                    </table>


                                </div>
                                <div class="row justify-content-end">
                                    {{$all_ticket->links()}}
                                </div>
                            </div>

                        </div>

                    </div>

                </div>

            </div>


        </div>

    </section>
















@endsection
@section('script')

@stop
