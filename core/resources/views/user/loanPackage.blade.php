
@extends('user')

@section('title')
    @lang('Loan package')
@stop

@section('content')
    @include('user.breadcrumb')





    <section id="package">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-10 col-lg-8 text-center">
                    <div class="heading-title">
                        <h2>
                            @lang('Fixed deposit package')
                        </h2>
                        <div class="sectionSeparator"></div>

                    </div>
                </div>
            </div>
            <div class="row">
                @foreach($loanPackages as $data)
                    <div class="col-lg-4">
                        <div class="priceBox normal">
                            <div class="header">
                                <h3>
                                    {{__($data->name)}}
                                </h3>

                            </div>
                            <div class="list">
                                <ul>
                                    <li>
                                        <p>
                                        @lang('Amount') : <strong> {{$gnl->cur_symbol}}{{$data->min_amount}} - {{$gnl->cur_symbol}}{{$data->max_amount}}</strong>
                                        </p>
                                    </li>
                                    <li> <p>
                                             @lang('Days') : <strong> {{$data->days}}</strong>
                                        </p>
                                    </li>
                                    <li>
                                        <p>
                                             @lang('Charge') : <strong> @lang('Fixed charge') {{$gnl->cur_symbol}}{{$data->fixed_charge}} @lang('and') {{$data->percent_charge}}% @lang('from your total amount') </strong>
                                        </p>
                                    </li>


                                </ul>
                            </div>
                            <div class="footer">

                            </div>
                            <div class="depoButton button" data-name="{{__($data->name)}}" data-gate="{{$data->id}}" data-toggle="modal"  data-target="#depoModal">
                                <a href="#">
                                    @lang('Choose')
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach

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
                    <form action="{{route('user.loan.store')}}" method="POST">
                        @csrf
                        <input type="hidden" name="id" id="gateWay"/>
                        <div class="form-group">
                            <h4> <label>@lang('Enter loan Amount')</label></h4>
                            <div class="input-group-append">
                                <input type="text" name="amount" class="form-control form-control-lg"/>
                                <span class="input-group-text">{{$gnl->cur}}</span>
                            </div>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn viweBtn" style="width:100%;">@lang('Send loan request')</button>
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