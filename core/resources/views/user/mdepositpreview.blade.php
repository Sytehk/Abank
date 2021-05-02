



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






    <section id="investors" style="padding-bottom: 0">
        <div class="container">

            <div class="row justify-content-center">
                <div class="col-md-6 col-lg-6">

                                <form  class="contact-form" method="POST" action="{{ route('user.mdeposit.confirm') }}"  enctype="multipart/form-data">


                                    @csrf
                                    <input type="hidden" name="gateway" value="{{$data->gateway_id}}"/>
                                    <div class="box">
                                        <div class="row justify-content-center">
                                            <div class="col-md-8">
                                                <div class="image">

                                                        @php

                                                            $manual = \App\GatewayManual::find($data->gateway_id);

                                                        @endphp
                                                        <img class="img-fluid" src="{{asset('assets/image/manual_gateway')}}/{{$manual->image}}" style="width:100%;"/>

                                                </div>
                                            </div>

                                        </div>

                                        <div class="info">
                                            <ul class="list-group text-center">

                                                <li class="list-group-item">@lang('Deposit Amount'): <strong>{{$data->amount}} {{$gnl->cur}}</strong></li>
                                                <li class="list-group-item">@lang('Deposit Charge'): <strong>{{$data->charge}} {{$gnl->cur}}</strong></li>
                                                <li class="list-group-item">@lang('Total Amount'): <strong>{{$data->charge + $data->amount}} {{$gnl->cur}}</strong></li>
                                                <li class="list-group-item">@lang('Rate') : <strong> 1 {{$gnl->cur}} = {{$manual->rate}} {{$manual->method_cur}}  </strong></li>
                                                <li class="list-group-item">@lang('Total Send') : <strong>{{($data->charge + $data->amount) * $manual->rate }} {{$manual->method_cur}}</strong> @lang('to get amount'): <strong> {{$data->amount}} {{$gnl->cur}}</strong></li>

                                            </ul>

                                            <br>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <h5> <label>@lang('Sending Details of Method:') {{__($manual->name)}} </label></h5>

                                                    <span class="list-group-item">@lang('Send Amount') : <strong>{{($data->charge + $data->amount) * $manual->rate }} {{$manual->method_cur}}</strong>
                                                    <br>
                                                    <br>
                                                        {{$manual->dec}}
                                                    </span>

                                                </div>
                                            </div>
                                            <hr/>

                                            <div class="col-md-12">
                                                <div class="form-group  text-left">

                                                    <label>@lang('Select Image')</label>
                                                    <input type="file"  class="form-control" name="image">
                                                    <hr/>
                                                <label>@lang('Message')</label>
                                                    <textarea placeholder="message" class="form-control" rows="3" name="message" required></textarea>


                                                </div>
                                            </div>


                                            <div class="panel-footer">
                                                <button   id="btn-confirm"  type="submit"  class="btn viweBtn" style="width:100%;">
                                                   @lang('Pay Now')
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



