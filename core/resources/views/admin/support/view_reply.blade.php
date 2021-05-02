@extends('admin')
@section('content')



    <main class="app-content">
        <div class="wrapper">


                <div class="content">

                    <div class="card mb-4 content-main-div">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-10">
                                    <h3><b>Title: {{$ticket_object->ticket}} - {{$ticket_object->subject}}</b></h3>
                                </div>
                                <div class="col-md-2">
                                    <div class="float-right">
                                        @if($ticket_object->status == 1)
                                            <button class="btn btn-warning"> Opened</button>
                                        @elseif($ticket_object->status == 2)
                                            <button type="button" class="btn btn-success">  Answered </button>
                                        @elseif($ticket_object->status == 3)
                                            <button type="button" class="btn btn-info"> Customer Reply </button>
                                        @elseif($ticket_object->status == 9)
                                            <button type="button" class="btn btn-danger">  Closed </button>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card mb-4">
                        <div class="card-body">
                            <form method="POST" action="{{route('admin.store.admin.reply', $ticket_object->ticket)}}" accept-charset="UTF-8" class="form-horizontal form-bordered">
                                {{csrf_field()}}
                                <div class="form-group">
                                    <div class="col-md-12">
                                        @foreach($ticket_data as $data)
                                            <div class="card-body">
                                                <fieldset class="col-md-12">
                                                    @if($data->type == 1)
                                                        <legend><span style="color: #0e76a8">

                                        @php
                                            $user = \App\SupportTicket::where('ticket',$ticket_object->ticket)->first();
                                    $username = \App\User::find($user->user_id);
                                        @endphp
                                                                {{$username->email}}


                                    </span> , <small>{{ \Carbon\Carbon::parse($data->updated_at)->format('F dS, Y - h:i A') }}</small></legend>
                                                    @else
                                                        <legend><span style="color: #0e76a8">{{Auth::guard('admin')->user()->name}}</span> , <small>{{ \Carbon\Carbon::parse($data->updated_at)->format('F dS, Y - h:i A') }}</small></legend>
                                                    @endif
                                                    <div class="card card-danger">
                                                        <div class="card-body" style="background:#F5F5F5;">
                                                            <p>@php echo  $data->comment; @endphp</p>
                                                        </div>
                                                    </div>

                                                </fieldset>

                                                <br>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-12 bold">Reply: </label>
                                    <div class="col-md-12">
                                        <textarea class="form-control" name="comment" rows="10"></textarea>
                                    </div>
                                </div>
                                <div class="form-actions">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <button type="submit" class="btn btn-info col-md-12"><i class="fa fa-check"></i> Post</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

        </div>



    </main>

<script type="text/javascript">
    $("#supportTicket").addClass("active");
</script>
<script>
    bkLib.onDomLoaded(function () {
        new nicEditor({iconsPath: '../assets/admin/img/nicEditorIcons.gif'}).panelInstance('email_template');
    });
</script>
@endsection
