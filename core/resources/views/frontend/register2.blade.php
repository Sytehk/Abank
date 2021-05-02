


@extends('layout')

@section('title')
    @lang('Sign up')
@endsection

@section('style')
    <link rel="stylesheet" href="{{asset('assets/user/css/select2.min.css')}}">
@endsection

@section('content')
    <link href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet" />

    @include('frontend.breadcrumb')

    <section id="paymentMethod">
        <div class="container">

            <div class="row calculate justify-content-center">
                <div class="col-md-12 col-lg-10">
                    <div class="box">

                        <form method="post" action="{{route('register')}}">
                            @csrf
                            <div class="row">
                                <div class="col-md-12">
                                    <div style="text-align: center; margin-bottom: 10px;"><label>Please select the accounts you would like to open.</label></div>

                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <select name="bank_sel" class="form-control js-example-basic-single"  id="acct_sel" required>
                                                <option value="" selected="selected">@lang('Account Selection')</option>
                                                <option value="">@lang('Online Savings Account')</option>
                                                <option value="">@lang('Online Checking Account')</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <select name="bank_type" class="form-control js-example-basic-single"  id="acct_type" required>
                                                <option value="" selected="selected">@lang('Account Type')</option>
                                                <option value="">@lang('Individual Application')</option>
                                            </select>
                                        </div>

                                        <div class="col-md-12" style="text-align: center; margin-bottom: 5px; margin-top: 13px;"><label>Personal Information.</label></div>

                                        <div class="form-group col-md-2" style="padding-top: 15px;">
                                            <select name="prefixx" class="form-control js-example-basic-single"  id="prefixx" required>
                                                <option value="" selected="selected">@lang('Prefix')</option>
                                                <option value="">@lang('Mr.')</option>
                                                <option value="">@lang('Mrs.')</option>
                                                <option value="">@lang('Dr.')</option>
                                                <option value="">@lang('Miss')</option>
                                                <option value="">@lang('Ms.')</option>

                                            </select>
                                        </div>
                                        <div class="form-group col-md-4">

                                            <input type="text" name="first_name" class="myForn" placeholder="@lang('First Name')" required>
                                        </div>
                                        <div class="form-group col-md-3">

                                            <input type="text" name="middle_name" class="myForn" placeholder="@lang('Middle Name')" required>
                                        </div>
                                        <div class="form-group col-md-3">

                                            <input type="text"  name="last_name" class="myForn" placeholder="@lang('Last Name')"  required>
                                        </div>

                                        <label style="padding-top: 15px; margin-right: 5px;">Social Security Number :</label>
                                        <div class="form-group col-md-1">
                                            <input type="text"  name="ssn1" class="myForn" maxlength="3" placeholder="@lang('000')"  required>
                                        </div>

                                        <div class="form-group col-md-1">

                                            <input type="text"  name="ssn1" class="myForn" maxlength="2" placeholder="@lang('00')"  required>
                                        </div>
                                        <div class="form-group col-md-1">

                                            <input type="text"  name="ssn1" class="myForn" maxlength="4" placeholder="@lang('0000')"  required>
                                        </div>

                                        <div class="col-md-12"></div>
                                        <label style="padding-top: 15px; margin-right: 5px;">Date of Birth (MM/DD/YYYY) :</label>
                                        <div class="form-group col-md-1">
                                            <input type="text"  name="dobm" class="myForn" placeholder="@lang('MM')"  required>
                                        </div>

                                        <div class="form-group col-md-1">

                                            <input type="text"  name="dobd" class="myForn" placeholder="@lang('DD')"  required>
                                        </div>
                                        <div class="form-group col-md-1">

                                            <input type="text"  name="doby" class="myForn" placeholder="@lang('YYYY')"  required>
                                        </div>

                                        <div class="form-group col-md-6">

                                            <input type="text"  name="phone" class="myForn" placeholder="@lang('Phone Number')"  required>
                                        </div>

                                        <div class="form-group col-md-6">
                                            <input type="email"  name="email" class="myForn" placeholder="@lang('Email')"  required>
                                        </div>


                                        <div class="form-group col-md-12">

                                            <input type="text" name="username" class="myForn" placeholder="@lang('Username')"  required>
                                        </div>
                                        <div class="form-group col-md-6">

                                            <input type="password"  name="password" class="myForn" placeholder="@lang('Password')"  required>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <input type="password"   class="myForn" name="password_confirmation"  placeholder="@lang('Confirm Password')"  required>
                                        </div>
                                        <div class="form-group col-md-12">

                                            <input type="text" name="address" class="myForn" placeholder="@lang('Street Address')"  required>
                                        </div>
                                        <div class="form-group col-md-4">

                                            <input type="text" name="city" class="myForn" placeholder="@lang('City')"  required>
                                        </div>
                                        <div class="form-group col-md-4">

                                            <input type="text" name="state" class="myForn" placeholder="@lang('State')"  required>
                                        </div>
                                        <div class="form-group col-md-4">

                                            <input type="text" name="zip" class="myForn" placeholder="@lang('Zip Code')"  required>
                                        </div>

                                        <div class="col-md-12" style="text-align: center; margin-bottom: 10px; margin-top: 10px;"><label>Identity Information.</label></div>

                                        <div class="form-group col-md-4">

                                            <input type="text" name="city" class="myForn" placeholder="@lang('Mothers Maiden Name')"  required>
                                        </div>

                                    </div>
                                </div>

                                        <div class="form-group padding-top-10 col-md-12">
                                            <button class="btn" type="submit">@lang('Register')</button>
                                        </div>

                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>


@endsection
@section('script')

    <script src="{{asset('assets/user/js/select2.min.js')}}"></script>
    <script>
        $(document).ready(function() {
            $('.js-example-basic-single').select2();
        });
    </script>
@stop
