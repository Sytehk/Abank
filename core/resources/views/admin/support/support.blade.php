@extends('admin')
@section('title', 'Support Ticket')
@section('content')



    <main class="app-content">
        <div class="app-title">
            <div>
                <h1><i class="fa fa-fa-list"></i> Support Ticket List</h1>
            </div>
             </div>
        <div class="tile">
            <div class="table-responsive">
                <table id="table" class="table table-hover table-bordered" cellspacing="0" width="100%">
                    <thead>
                    <tr>
                        <th> Ticket Id </th>
                        <th> Username</th>
                        <th> Subject </th>
                        <th> Raised Time </th>
                        <th> Last Reply </th>
                        <th> Status </th>
                        <th> Action </th>
                    </tr>
                    </thead>
                    <tbody>


                    @forelse($all_ticket as $data)
                        <tr>
                            <td>{{$data->ticket}}</td>
                            <td><b><a href="{{route('admin.userDetails',$data->id)}}">{{$data->user->username}}</a></b></td>
                            <td><b>{{$data->subject}}</b></td>
                            <td>{{ \Carbon\Carbon::parse($data->created_at)->format('F dS, Y - h:i a') }}</td>
                            <td>{{ \Carbon\Carbon::parse($data->updated_at)->format('F dS, Y - h:i a') }}</td>
                            <td>
                                @if($data->status == 1)
                                    <button class="btn btn-warning"> Opened</button>
                                @elseif($data->status == 2)
                                    <button type="button" class="btn btn-success">  Answered </button>
                                @elseif($data->status == 3)
                                    <button type="button" class="btn btn-info"> Customer Reply </button>
                                @elseif($data->status == 9)
                                    <button type="button" class="btn btn-danger">  Closed </button>
                                @endif
                            </td>
                            <td>
                                <a class="btn btn-primary" href="{{route('admin.ticket.admin.reply', $data->ticket )}}">View</a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="10" class="text-center">No Information</td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
                {{ $all_ticket->render() }}
                <div class="d-flex flex-row-reverse">

                </div>
            </div>
        </div>



    </main>





<script>
    $("#supportTicket").addClass("active");
</script>
@endsection
