@extends('layout')

@section('home', 'active')
@section('title')
    @lang('Home')
@endsection
@section('style')

    <link rel="stylesheet"   href="{{asset('assets/frontend/css/magnific-popup.css')}}">

    <link rel="stylesheet" type="text/css" href="{{asset('assets/frontend/css/animate.css')}}">
@stop

@section('content')


<section id="welcomeArea" class="hero-area owl-carousel">

    @foreach($slider as $data)
        <div class="single-hero-area dark-overlay" style="background: url({{asset('assets/image/banner/'.$data->banner)}}) no-repeat">
            <div class="hero-content">
                <div class="table-cell col-md-10 col-lg-8">
                    <h1>{{__($data->title)}}</h1>
                    <h2>{{__($data->subtitle)}}</h2>
                    <a href="{{$data->btn_link}}" class="bttn-mid btn-fill">{{__($data->btn_name)}}</a>
                </div>
            </div>

        </div>
    @endforeach

</section>

<!-- counter-section start -->
<section class="counter-section">
    <div class="container">
        <div class="row mb-none-30">
            <div class="col-lg-4 col-sm-4">
                <div class="counter-item shadow mb-30">
                    <div class="icon">
                        <i class="fas fa-users"></i>
                    </div>
                    <div class="content">
                        <span class="counter">{{$totalUser}}</span>
                        <span class="caption">@lang('Total member')</span>
                    </div>
                </div>
            </div><!-- counter-item -->
            <div class="col-lg-4 col-sm-4">
                <div class="counter-item shadow mb-30">
                    <div class="icon">
                        <i class="far fa-arrow-alt-circle-down"></i>
                    </div>
                    <div class="content">
                        <span class="counter">{{$gnl->cur_symbol}}{{$totalDeposit}} </span>
                        <span class="caption">@lang('Total deposit')</span>
                    </div>
                </div>
            </div><!-- counter-item -->

            <div class="col-lg-4 col-sm-4">
                <div class="counter-item shadow mb-30">
                    <div class="icon">
                        <i class="far fa-arrow-alt-circle-up"></i>
                    </div>
                    <div class="content">
                        <span class="counter">{{$gnl->cur_symbol}}{{$totalwid}}</span>
                        <span class="caption">@lang('Total withdraws')</span>
                    </div>
                </div>
            </div>


            <!-- counter-item -->
        </div>
    </div>
</section>
<!-- counter-section end -->

<section  id="aboutUs" class="about-content-area about-padding">

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10 col-lg-8 text-center">
            <div class="heading-title">
                <h2>
                    {{__($gnl->about_title)}}
                </h2>
                <div class="sectionSeparator"></div>
                <p>
                    {{__($gnl->about_subtitle)}}
                </p>
            </div>
        </div>
    </div>
</div>

</section>

<section  class="about-content-area">

    <div class="video-btn">
        <a href="{{$gnl->video_link}}" class="video-play-btn mfp-iframe"><i class="fas fa-play"></i></a>
    </div>
    <div class="container-fluid p-0">
        <div class="row m-0">
            <div class="col-lg-6 p-0 left-content-area left-content-bg"  style="background-image: url({{asset('assets/image/video-banner.jpg')}}); background-size: cover;">
                <div class="left-content-area left-content-bg" ></div>
            </div>
            <div class="col-lg-6 p-0">
                <div class="right-content-area bg-gray">
                    <div class="heading-title">
                        <h2>
                            {{__($gnl->video_section_title)}}
                        </h2>

                        <p style="padding-top: 30px">
                            {{ __($gnl->video_section_dec) }}
                        </p>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>





<!-- Feature Area Start -->
<section id="services">
    <div class="container" id="feature" >
        <div class="row justify-content-center">
            <div class="col-md-10 col-lg-8 text-center">
                <div class="heading-title">
                    <h2>
                      {{__($gnl->service_title)}}
                    </h2>
                    <div class="sectionSeparator"></div>
                    <p>
                        {{__($gnl->service_subtitle)}}
                    </p>
                </div>
            </div>
        </div>
        <div class="row">
            @foreach($services as $service)
            <div class="col-lg-4 col-md-6">
                <div class="box">
                    <div class="topHeader d-flex">
                        <i class=" {{$service->icon}}"></i>
                        <div class="title d-flex align-self-center">
                            <div class="title d-flex align-self-center">
                                <h3>
                                    {{__($service->name)}}
                                </h3>
                            </div>
                        </div>
                    </div>
                    <div class="body">
                        <div class="content">
                            <p>
                                {{ __($service->description) }}
                            </p>

                        </div>
                    </div>
                </div>
            </div>
                @endforeach

        </div>
    </div>
</section>
<!-- Feature Area End -->



<!-- Transaction Area Start -->
<section id="transaction">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10 col-lg-8 text-center">
                <div class="heading-title">
                    <h2>
                        {{__($gnl->latest_tran_title)}}
                    </h2>
                    <div class="sectionSeparator"></div>
                    <p>
                        {{__($gnl->latest_tran_des)}}
                    </p>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="tab1">
                    <ul class="nav nav-pills" id="pills-tab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="pills-deposit-tab" data-toggle="pill" href="#pills-deposit" role="tab"
                               aria-controls="pills-deposit" aria-selected="true">
                                <p>
                                    @lang('deposit')
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="pills-withdraw-tab" data-toggle="pill" href="#pills-withdraw" role="tab" aria-controls="pills-withdraw"
                               aria-selected="false">
                                <p>
                                    @lang('withdraw')
                                </p>
                            </a>
                        </li>
                    </ul>
                    <div class="tab-content" id="pills-tabContent">
                        <div class="tab-pane fade show active" id="pills-deposit" role="tabpanel" aria-labelledby="pills-deposit-tab">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th>
                                            @lang('Name')
                                        </th>
                                        <th>
                                            @lang('Amount')
                                        </th>

                                        <th>
                                            @lang('Gateway')
                                        </th>
                                        <th>
                                            @lang('Status')
                                        </th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($deps as $depo)


                                        <tr>

                                            <td>
                                                <div class="media">
                                                    <div class="content">
                                                        <p>
                                                            {{$depo->userName->name}}
                                                        </p>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                {{$depo->amount}} {{$gnl->cur}}
                                            </td>


                                            @if($depo->type == 1)
                                            <td>
                                            {{__($depo->gateway->name)}}
                                            </td>
                                            @else
                                                @php
                                                    $mdepo = \App\GatewayManual::find($depo->gateway_id);
                                                @endphp
                                                <td>
                                                    {{__($mdepo->name)}}
                                                </td>

                                                @endif

                                            <td>
                                                <span class="badge {{$depo->status==1?'badge-success':'badge-warning'}}">{{$depo->status==1?'Complete':'Pending'}}</span>
                                            </td>
                                        </tr>
                                    @endforeach


                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="pills-withdraw" role="tabpanel" aria-labelledby="pills-withdraw-tab">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th> @lang('Name')</th>
                                        <th> @lang('Amount')</th>
                                        <th> @lang('Method')</th>
                                        <th> @lang('Status')</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @if(count($logs)==0)
                                        <tr >
                                            <td class="text-center" colspan="7"><h2>@lang('No Data Available')</h2></td>
                                        </tr>
                                    @endif
                                    @foreach($logs as $log)
                                        <tr>
                                            <td>
                                                <div class="media">
                                                    <div class="content">
                                                        <p>
                                                            {{$log->user->name}}
                                                        </p>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>{{$log->amount}} {{$gnl->cur}}</td>
                                            <td>{{__($log->wmethod->name)}}</td>
                                            <td> <span class="badge badge-success">@lang('Approve')</span></td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Transaction Area End -->


<!-- Investors Area Start -->
<section id="investors">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10 col-lg-8 text-center">
                <div class="heading-title">
                    <h2>
                        {{_($gnl->investor_title)}}
                    </h2>
                    <div class="sectionSeparator"></div>
                    <p>
                        {{_($gnl->investor_des)}}
                    </p>
                </div>
            </div>
        </div>
        <div class="row">
            @foreach($investors as $investor)
            <div class="col-sm-6 col-md-4 col-lg-3">
                <div class="box">
                    <div class="image">
                        <img class="img-fluid" src="{{asset('assets/image/investor/'.$investor->image)}}" alt="">
                        <div class="social_icon">
                            <ul>
                                <li>
                                    <a href="@if($investor->tw_link != NULL) {{$investor->tw_link}} @else # @endif">
                                        <i class="fab fa-twitter"></i>
                                    </a>
                                </li>

                                <li>
                                    <a href="@if($investor->fb_link != NULL) {{$investor->fb_link}} @else # @endif">
                                        <i class="fab fa-facebook-f"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="@if($investor->linkedin != NULL) {{$investor->linkedin}} @else # @endif">
                                        <i class="fab fa-linkedin-in"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="fab fa-pinterest"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="info">
                        <h5>{{$investor->name}}
                        </h5>
                        <p>{{__($investor->designation)}}</p>
                    </div>
                </div>
            </div>
                @endforeach

        </div>
    </div>
</section>
<!-- Investors Area End -->



<!-- FAQ Area Start -->
<section id="faq">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10 col-lg-8 text-center">
                <div class="heading-title">
                    <h2>
                       {{__($gnl->faq_title)}}
                    </h2>
                    <div class="sectionSeparator"></div>
                    <p>
                        {{__($gnl->faq_subtitle)}}
                    </p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="faq-accordian">
                    <div class="panel-group accordion" id="accordionId">

                        <div class="row">
                            <div class="col-12">
                                <div class="faq-accordian">
                                    <div class="panel-group accordion" id="accordionId">
                                        <div class="row">
                                            <div class="col-md-12">
                                                @foreach($faqs as $faq)

                                                    @endforeach

                                            </div>
                                            <div class="col-md-12">
                                                @foreach($faqs as $faq)
                                                <div class="panel panel-default">
                                                    <div class="panel-heading" id="headingOne">
                                                        <h4 class="panel-title">
                                                            <a  data-toggle="collapse" data-target="#collapse{{$faq->id}}"  aria-expanded="false"    aria-controls="collapse{{$faq->id}}">
                                                                {{__($faq->title)}}</a>
                                                        </h4>
                                                    </div>
                                                    <div id="collapse{{$faq->id}}" class="collapse" aria-labelledby="headingOne" data-parent="#accordionId">
                                                        <div class="panel-body">
                                                         <p>
                                                             {{ __($faq->description)}}
                                                         </p>
                                                        </div>
                                                    </div>
                                                </div>
                                                @endforeach


                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- FAQ Area End -->


<section id="wcu">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10 col-lg-8 text-center">
                <div class="heading-title">
                    <h2>
                        {{__($gnl->blog_title)}}
                    </h2>
                    <div class="sectionSeparator"></div>
                    <p>
                        {{__($gnl->blog_subtitle)}}
                    </p>
                </div>
            </div>
        </div>
        <div class="row">
            @foreach($blogs as $blog)
            <div class="col-md-4">
                <div class="box">
                    <div class="img">
                        <a href="{{route('single.blog',[$blog->id, strtolower(urlencode($blog->title))])}}">  <img class="img-fluid" src="{{asset('assets/image/blog/'.$blog->image)}}" alt=""> </a>
                    </div>
                    <div class="content">
                        <a href="{{route('single.blog',[$blog->id, strtolower(urlencode($blog->title))])}}"> <h3>
                           {{__($blog->title)}}
                        </h3> </a>
                        <p>
                            {{__(str_limit( $blog->description, $limit = 150, $end = '....')) }}
                        </p>

                    </div>
                </div>
            </div>
                @endforeach


        </div>
    </div>
</section>



<!-- brand begin-->

<!-- brand end -->
@endsection
@section('script')
    <script src="{{asset('assets/frontend/js/jquery.magnific-popup.js')}}"></script>

    <script>

        // banner content animation
        $(".hero-area").on("translate.owl.carousel", function() {
            $(".hero-content h3").removeClass("animated fadeIn").css("opacity", "0"),
                $(".hero-content h2").removeClass("animated flipInX").css("opacity", "0"),
                $(".hero-content p").removeClass("animated fadeIn").css("opacity", "0"),
                $(".hero-content a").removeClass("animated flipInX").css("opacity", "0")
        }),
            $(".hero-area").on("translated.owl.carousel", function() {
                $(".hero-content h3").addClass("animated fadeIn").css("opacity", "1"),
                    $(".hero-content h2").addClass("animated flipInX").css("opacity", "1"),
                    $(".hero-content p").addClass("animated fadeIn").css("opacity", "1"),
                    $(".hero-content a").addClass("animated flipInX").css("opacity", "1")
            });

        //======================================
        //========== magnificPopup video ============
        //======================================
        $('.mfp-iframe').magnificPopup({
            type: 'video'
        });
        $('.image-popup').magnificPopup({
            type: 'image'
        });


    </script>
    <script>
        $('.hero-area').owlCarousel({
            loop:true,
            dots: true,
            mouseDrag: true,
            autoplay: true,
            animateOut: 'fadeOut',
            animateIn: 'fadeIn',
            autoplayTimeout: 10000,
            smartSpeed: 1000,
            nav:false,
            responsive:{
                0:{
                    items:1
                },
                600:{
                    items:1
                },
                1000:{
                    items:1
                }
            }
        });

        // Partner Slider
        $('.single-partners').owlCarousel({
            loop:true,
            dots: false,
            autoplay: true,
            margin:30,
            smartSpeed: 1500,
            responsive:{
                0:{
                    items:2
                },
                600:{
                    items:3
                },
                1000:{
                    items:5
                }
            }
        });

    </script>
@stop
