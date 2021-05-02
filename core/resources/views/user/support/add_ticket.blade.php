@extends('user')
@section('title')
    {{__($pt)}}
@stop
@section('content')

@include('user.breadcrumb')



<section id="paymentMethod">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10 col-lg-8 text-center">
                <div class="heading-title padding-bottom-70">
                    <h2>
                      {{__($pt)}}
                    </h2>
                    <div class="sectionSeparator"></div>

                </div>
            </div>
        </div>

        <div class="row calculate justify-content-center">
            <div class="col-md-10 col-lg-10">
                <div class="box">

                    <form method="post" action="{{route('user.ticket.store')}}">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="col-md-12 text-center" id="message">

                                </div>
                                <div class="form-row">


                                    <div class="form-group col-md-12">
                                        <label>@lang('Subject')</label>
                                        <input type="text"  value="{{ old('subject') }}" name="subject" class="myForn"  autocomplete="off" required>
                                    </div>

                                    <div class="form-group col-md-12">
                                        <label for="exampleFormControlTextarea1">Detail</label>
                                        <textarea class="form-control" name="detail"   id="exampleFormControlTextarea1" rows="10">{{ old('detail') }}</textarea>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-row">

                                            <div class="form-group col-md-12">
                                                <button class="btn" type="submit">@lang('Send Message')</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>







@endsection
