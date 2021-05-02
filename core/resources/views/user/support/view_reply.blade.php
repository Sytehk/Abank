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
                           {{__($pt)}}: #{{$ticket_object->ticket}} - {{__($ticket_object->subject)}}
                        </h2>
                        <div class="sectionSeparator"></div>

                    </div>
                </div>
            </div>

            <div class="row calculate justify-content-center">
                <div class="col-md-10 col-lg-10">
                    <div class="box">
                        <form class="contact-form" action="{{route('user.store.customer.reply', $ticket_object->ticket)}}" method="post">
                            @csrf
                            <div class="row">
                                @foreach($ticket_data as $data)
                                    @if($data->type != 1)
                                        <fieldset class="col-md-12" style="margin-bottom: 10px;">
                                            <div class="card" style="border-radius: 15px;">
                                                <div class="card-body">
                                                    <legend><span style="color: #0e76a8">Admin</span> , <small> {{\Carbon\Carbon::parse($data->created_at)->diffForHumans()}}</small></legend>


                                                    <div class="panel panel-danger">
                                                        <div class="panel-body">
                                                            <p> @php echo $data->comment; @endphp</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </fieldset>
                                    @else
                                        <fieldset class="col-md-12" style="margin-bottom: 10px;">
                                            <div class="card" style="border-radius: 15px;">
                                                <div class="card-body">
                                                    <legend><span style="color: #0e76a8">{{Auth::user()->name}}</span> , <small> {{\Carbon\Carbon::parse($data->created_at)->diffForHumans()}}</small></legend>


                                                    <div class="panel panel-danger">
                                                        <div class="panel-body">
                                                            <p> @php echo $data->comment; @endphp</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </fieldset>
                                    @endif
                                @endforeach



                                <div class="col-xl-12 col-lg-12">
                                    <div class="form-group">
                                        <label for="InputName">Reply<span class="requred">:</span></label>
                                        <textarea class="form-control" name="comment" rows="10" required=""></textarea>
                                    </div>
                                </div>


                                <div class="col-xl-12 col-lg-12">
                                    <div class="row d-flex">
                                        <div class="col-xl-12 col-lg-12">
                                            <button type="submit" style="width: 100%" class="login-button btn-contact">Submit</button>
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





@stop

