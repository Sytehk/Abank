@extends('layout')

@section('title')
    @lang('Sign in')
@endsection

@section('content')

@include('frontend.breadcrumb')

    <section id="paymentMethod">
        <div class="container">
           

            <div class="row calculate justify-content-center">
                <div class="col-md-10 col-lg-8">
                    <div class="box">

                        <form method="post" action="{{route('login')}}">
                            @csrf
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-row">
                                        <div class="form-group col-md-12">

                                            <input type="text" name="username" class="myForn" placeholder="@lang('Username')" required>
                                        </div>
                                        <div class="form-group col-md-12">

                                            <input type="password"  name="password" class="myForn" placeholder="@lang('Password')" required>
                                        </div>
                                    </div>
                                </div>


                                        <div class="form-group padding-top-10 col-md-12">
                                            <button class="btn" type="submit">@lang('Sign in')</button>
                                        </div>
                            </div>
                        </form>
                        <button type="button" data-toggle="modal" data-target="#lostPassword" class="forget-text-btn">@lang('Forget password?')</button>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <style>
        .forget-text-btn {
            text-transform: capitalize;
            font-size: 16px;
            background-color: transparent;
            border: none;
            color: #ffffff;
            cursor: pointer;
        }
        .forget-text-btn:focus {
            box-shadow: none;
            outline:none;
        }
    </style>



<div class="modal fade" id="lostPassword" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">@lang('Enter your email')</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="get" action="{{route('sendResetPassMail')}}">
                    <div class="row">
                        <div class="form-group col-md-12">
                            <input class="form-control" type="email" name="resetEmail" placeholder="@lang('Email')">
                        </div>
                    </div>
                    <div class="tile-footer">
                        <button class="btn btn-info btn-md btn-block"  type="submit">@lang('RESET PASSWORD')</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>



@endsection