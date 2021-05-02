@extends('admin')
@section('mgateway', 'active')
@section('title')
    {{$pt}}
@stop
@section('style')
    <link rel="stylesheet" type="text/css" href="{{asset('assets\fileInput\bootstrap-fileinput.css')}}">

@stop

@section('content')


    <main class="app-content">
        <div class="app-title">
            <div>
                <h1><i class="icon fa fa-desktop"></i> {{$pt}}</h1>
            </div>

            <div class="app-search">
                <button class="btn btn-circle  btn-primary" data-toggle="modal" data-target="#newMethod">
                    <i class="fa fa-plus"></i> New Method
                </button>
            </div>
        </div>
        <div class="tile">
            <div class="row">
                @foreach($gateways as $gateway)
                    <div class="col-md-4" style="margin-top:10px;">
                        <div class="card text-white {{$gateway->status==1?'bg-dark':'bg-secondary'}}">
                            <div class="card-header text-center">
                                {{$gateway->main_name}}
                            </div>
                            <div class="card-body">
                                <form method="post" action="{{route('admin.manugatewayUpdate', $gateway)}}"
                                      enctype="multipart/form-data">
                                    @csrf()
                                    @method('put')
                                    <div class="form-group text-center">
                                        <div class="fileinput fileinput-new" data-provides="fileinput">
                                            <div class="fileinput-new thumbnail" style="width: 150px; height: 150px;">
                                                <img src="{{ asset('assets/image/manual_gateway') }}/{{$gateway->image}}"
                                                     alt="*"/>
                                            </div>
                                            <div class="fileinput-preview fileinput-exists thumbnail"
                                                 style="max-width: 150px; max-height: 150px;">
                                            </div>
                                            <div>
                                    <span class="btn btn-success btn-file">
                                        <span class="fileinput-new"> Change Logo </span>
                                        <span class="fileinput-exists"> Change </span>
                                        <input type="file" name="image">
                                    </span>
                                                <a href="javascript:;" class="btn red fileinput-exists"
                                                   data-dismiss="fileinput"> Remove </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="status">Status</label>
                                        <select class="form-control" name="status">
                                            <option value="1" {{ $gateway->status == "1" ? 'selected' : '' }}>Active
                                            </option>
                                            <option value="0" {{ $gateway->status == "0" ? 'selected' : '' }}>Deactive
                                            </option>
                                        </select>
                                    </div>
                                    <button class="btn btn-info btn-block btn-sm" type="button" data-toggle="collapse"
                                            data-target="#collapseExample{{$gateway->id}}" aria-expanded="false"
                                            aria-controls="collapseExample">
                                        <i class="fa fa-eye"></i> DETAILS
                                    </button>
                                    <div class="collapse" id="collapseExample{{$gateway->id}}">
                                        <hr/>
                                        <div class="form-group">
                                            <label>Name of Gateway</label>
                                            <input type="text" value="{{$gateway->name}}" class="form-control" id="name"
                                                   name="name">
                                        </div>

                                        <div class="form-group">
                                            <label>Method Currency
                                            </label>
                                            <div class="input-group">

                                                <input type="text" value="{{$gateway->method_cur}}" class="form-control"
                                                       id="rate" name="method_cur">

                                            </div>
                                        </div>

                                        <hr/>
                                        <div class="form-group">
                                            <label>Rate</label>
                                            <div class="input-group">
                                                <div class="input-group-append">
                                        <span class="input-group-text">
                                            1 USD =
                                        </span>
                                                </div>
                                                <input type="text" value="{{$gateway->rate}}" class="form-control"
                                                       id="rate" name="rate">
                                                <div class="input-group-prepend">
                                        <span class="input-group-text">
                                           {{$gateway->method_cur}}
                                        </span>
                                                </div>
                                            </div>
                                        </div>


                                        <hr/>
                                        <div class="card text-center text-dark">
                                            <div class="card-header">
                                                Deposit Limit
                                            </div>
                                            <div class="card-body">

                                                <div class="form-group">
                                                    <label for="minamo">Minimum Amount</label>
                                                    <div class="input-group">
                                                        <input type="text" value="{{$gateway->minamo}}"
                                                               class="form-control" id="minamo" name="minamo">
                                                        <div class="input-group-append">
                                                <span class="input-group-text">
                                                    {{ $gnl->cur }}
                                                </span>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label for="maxamo">Maximum Amount</label>
                                                    <div class="input-group">
                                                        <input type="text" value="{{$gateway->maxamo}}"
                                                               class="form-control" id="maxamo" name="maxamo">
                                                        <div class="input-group-append">
                                                <span class="input-group-text">
                                                    {{ $gnl->cur }}
                                                </span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                        <hr/>
                                        <div class="card text-center text-dark">
                                            <div class="card-header">
                                                Deposit Charge
                                            </div>
                                            <div class="card-body">
                                                <div class="form-group">
                                                    <label for="chargefx">Fixed Charge</label>
                                                    <div class="input-group">
                                                        <input type="text" value="{{$gateway->fixed_charge}}"
                                                               class="form-control" id="chargefx" name="fixed_charge">
                                                        <div class="input-group-append">
                                                <span class="input-group-text">
                                                    {{ $gnl->cur }}
                                                </span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="chargepc">Charge in Percentage</label>
                                                    <div class="input-group">
                                                        <input type="text" value="{{$gateway->percent_charge}}"
                                                               class="form-control" id="chargepc" name="percent_charge">
                                                        <div class="input-group-append">
                                                <span class="input-group-text">
                                                    {{ $gnl->cur }}
                                                </span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <hr/>
                                        <div class="form-group">
                                            <label>Account Information</label>
                                            <div class="input-group">

                                                <textarea type="text" name="dec" class="form-control" rows="5">{{$gateway->dec}}</textarea>

                                            </div>
                                        </div>


                                    </div>


                                    <hr/>

                                    <div class="form-group">
                                        <button type="submit" class="btn btn-success btn-block">Update</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

    </main>



    <div id="newMethod" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">New </h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>

                </div>
                <div class="modal-body">
                    <form method="post" action="{{route('admin.manugateway-create')}}" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group">
                            <label>Name of Gateway</label>
                            <input type="text" class="form-control" id="name" name="name">
                        </div>
                        <div class="form-group">
                            <label>Method Currency</label>
                            <div class="input-group">

                                <input type="text" class="form-control" id="rate" name="method_cur">
                                <div class="input-group-prepend">
                                            <span class="input-group-text">
                                             <i class="fa fa-money"></i>
                                            </span>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Rate</label>
                            <div class="input-group">
                                <div class="input-group-append">
                                            <span class="input-group-text">
                                                1 USD =
                                            </span>
                                </div>
                                <input type="text" class="form-control" id="rate" name="rate">
                                <div class="input-group-prepend">
                                            <span class="input-group-text">
                                               Method Currency
                                            </span>
                                </div>
                            </div>
                        </div>
                        <hr/>
                        <div class="card text-center text-dark">
                            <div class="card-header">
                                Limit
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="minamo">Minimum Amount</label>
                                            <div class="input-group">
                                                <input type="text" class="form-control" id="minamo" name="minamo">
                                                <div class="input-group-append">
                                                            <span class="input-group-text">
                                                                {{ $gnl->cur }}
                                                            </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="maxamo">Maximum Amount</label>
                                            <div class="input-group">
                                                <input type="text" class="form-control" id="maxamo" name="maxamo"
                                                       required>
                                                <div class="input-group-append">
                                                            <span class="input-group-text">
                                                                {{ $gnl->cur }}
                                                            </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr/>
                        <div class="card text-center text-dark">
                            <div class="card-header">
                                Charge
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="chargefx">Fixed Charge</label>
                                            <div class="input-group">
                                                <input type="text" class="form-control" id="chargefx"
                                                       name="fixed_charge" required>
                                                <div class="input-group-append">
                                                            <span class="input-group-text">
                                                                {{ $gnl->cur }}
                                                            </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="chargepc">Charge in Percentage</label>
                                            <div class="input-group">
                                                <input type="text" class="form-control" id="chargepc"
                                                       name="percent_charge" required>
                                                <div class="input-group-append">
                                                            <span class="input-group-text">
                                                                {{ $gnl->cur }}
                                                            </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr/>


                        <div class="form-group">
                            <label for="file">Image</label>
                            <input type="file" class="form-control" id="file" name="image">
                        </div>
                        <hr/>

                        <div class="form-group">
                            <label for="dec">Account Information</label>
                            <textarea type="text" rows="5" placeholder="Payment Details ( Where User Pay You )"
                                      class="form-control" name="dec"></textarea>
                        </div>
                        <hr/>
                        <div class="form-group">
                            <label for="status">Status</label>
                            <select class="form-control" name="status">
                                <option value="1">Active</option>
                                <option value="0">Deactive</option>
                            </select>
                        </div>


                        <hr/>
                        <div class="form-group">
                            <button type="submit" class="btn btn-success btn-block">Create</button>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                </div>
            </div>

        </div>
    </div>

@endsection

@section('script')
    <script type="text/javascript" src="{{asset('assets\fileInput\bootstrap-fileinput.js')}}"></script>

@stop
