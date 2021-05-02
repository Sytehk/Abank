
@extends('layout')

@section('title', 'Change  password')
@section('breadcrumb-title')
    @lang('Change Password')
    @stop

@section('content')

    @include('frontend.breadcrumb')





    <section id="paymentMethod">
        <div class="container">


            <div class="row calculate justify-content-center">
                <div class="col-md-10 col-lg-8">
                    <div class="box">

                        <form method="post" action="{{route('user.resetPassword')}}">
                            @csrf
                            <input type="hidden" name="email" value="{{$ps->email}}">
                            <input type="hidden" name="code" value="{{$ps->token}}">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-row">
                                        <div class="form-group col-md-12">

                                            <input type="password" name="password" class="myForn" placeholder="@lang('Password')" required>
                                        </div>
                                        <div class="form-group col-md-12">

                                            <input type="password"  name="password_confirmation" class="myForn" placeholder="@lang('Confirm Password')" required>
                                        </div>
                                    </div>
                                </div>


                                <div class="form-group padding-top-10 col-md-12">
                                    <button class="btn" type="submit">@lang('Change')</button>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
