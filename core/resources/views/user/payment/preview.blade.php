



@extends('user')
@section('deposit', 'active')
@section('title')
    @lang('Deposit Preview')
@stop
@section('breadcrumb-title')
    @lang('Deposit Preview')
@stop
@section('content')
    @include('user.breadcrumb')






    <section id="investors">
        <div class="container">
            
            <div class="row justify-content-center">
                <div class="col-md-6 col-lg-6">
                    <form  class="contact-form" method="POST" action="{{ route('user.deposit.confirm') }}">
                        @csrf
                        <input type="hidden" name="gateway" value="{{$data->gateway_id}}"/>
                        <div class="box">
                            <div class="row justify-content-center">
                                <div class="col-md-8">
                                    <div class="image">
                                        <img class="img-fluid" src="{{asset('assets/image/gateway')}}/{{$data->gateway_id}}.jpg" style="width:100%;"/>
                                    </div>
                                </div>

                            </div>

                            <div class="info">
                                <ul class="list-group text-center">

                                    <li class="list-group-item">Amount: <strong>{{$data->amount}} {{$gnl->cur}}</strong></li>
                                    <li class="list-group-item">Charge: <strong>{{$data->charge}} {{$gnl->cur}}</strong></li>
                                    <li class="list-group-item">Payable: <strong>{{$data->charge + $data->amount}} {{$gnl->cur}}</strong></li>
                                    <li class="list-group-item">In USD: <strong>${{$data->usd_amo}}</strong></li>

                                </ul>
                                <div class="panel-footer">
                                    <button   id="btn-confirm"  type="submit"  class="btn viweBtn" style="width:100%;">
                                        Pay Now
                                    </button>
                                </div>
                            </div>
                        </div>
                        </form>
                    </div>
            </div>
        </div>
    </section>




@endsection


@section('script')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>

    @if($data->gateway_id == 107)
        <form action="{{ route('ipn.paystack') }}" method="POST">
            @csrf
            <script
                    src="//js.paystack.co/v1/inline.js"
                    data-key="{{ $data->gateway->val1 }}"
                    data-email="{{Auth::user()->email}}"
                    data-amount="{{ round($data->usd_amo/$data->gateway->val7, 2)*100 }}"
                    data-currency="NGN"
                    data-ref="{{ $data->trx }}"
                    data-custom-button="btn-confirm"
            >
            </script>
        </form>
    @elseif($data->gateway_id == 108)
        <script src="//voguepay.com/js/voguepay.js"></script>
        <script>
            closedFunction = function() {

            }
            successFunction = function(transaction_id) {
                window.location.href = '{{ url('user/vogue/purchase') }}/' + transaction_id + '/success';
            }
            failedFunction=function(transaction_id) {
                window.location.href = '{{ url('user/vogue/purchase') }}/' + transaction_id + '/error';
            }

            function pay(item, price) {
                //Initiate voguepay inline payment
                Voguepay.init({
                    v_merchant_id: "{{ $data->gateway->val1 }}",
                    total: price,
                    notify_url: "{{ route('ipn.voguepay') }}",
                    cur: 'USD',
                    merchant_ref: "{{ $data->trx }}",
                    memo:'Buy ICO',
                    recurrent: true,
                    frequency: 10,
                    developer_code: '5af93ca2913fd',
                    store_id:"{{ $data->user_id }}",
                    custom: "{{ $data->trx }}",

                    closed:closedFunction,
                    success:successFunction,
                    failed:failedFunction
                });
            }

            $(document).ready(function () {
                $(document).on('click', '.viweBtn', function (e) {
                    e.preventDefault();
                    pay('Buy', {{ $data->usd_amo }});
                });
            })
        </script>

    @endif

@endsection


